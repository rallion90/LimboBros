<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;

use App\Product;

use App\Municipality;

use Illuminate\Http\Request;

use Auth;

use Cart;

use App\Order;

use Mail;

use Alert;

//use SweetAlert;

use App\Providers\SweetAlertServiceProvider;

use App\Mail\OrderMail;

class CustomerController extends Controller
{
    //
    public function index(){
        $product = new Product;
        $active_product = $product::where('product_stock', '!=', 0)->where('tag_deleted', '=', 0)->take(3)->get();
    	return view('Customer.index', compact('active_product'));
    }

    public function product_details($id){
        $product = new Product;
        $get_product = $product::where('product_stock', '!=', 0)->where('product_id', '=', $id)->where('tag_deleted', '=', 0)->first();
        return view('Customer.product_detail', compact('get_product'));
    }

    public function cart(){
    	return view('Customer.cart');
    }

    public function products(){
        $products = new Product;
        $get_product = $products::where('product_stock', '!=', 0)->where('tag_deleted', '=', 0)->get();
    	return view('Customer.product_list', compact('get_product'));
    }

    public function product_filter($id){
        $products = new Product;
        $get_product = $products::where('product_category', '=', $id)->where('tag_deleted', '=', 0)->get();
        return view('Customer.product_list', compact('get_product'));

    }

    public function checkout(){
        if(Cart::isEmpty()){
            return redirect()->route('customer.index');
        }

        return view('Customer.checkout');
    }

    public function cod(Request $request){
        $order = new Order;

        $request->validate([
            'firstname' => 'required|max:60',
            'lastname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'zipcode' => 'required',
            'province' => 'required|not_in:0',
            'municipality' => 'required|not_in:0',
            'barangay' => 'required|not_in:0',
            'street' => 'required',
        ]);

        $six_digit_random_number = mt_rand(100000000, 999999999);
        
        foreach(Cart::getContent() as $cart){
            $data = array(
                'user_id' => Auth::guard('customer')->user()->customer_id,
                'product_id' => $cart->id,
                'product_name' => $cart->name,
                'product_price' => $cart->price,
                'product_quantity' => $cart->quantity,
                'customer' => $request->firstname." ".$request->lastname,
                'contact_number' => $request->phone,
                'zipcode' => $request->zipcode,
                'email' => $request->email,
                'province' => $request->province,
                'municipality' => $request->municipality,
                'barangay' => $request->barangay,
                'street' => $request->street,
                'order_number' => $six_digit_random_number,
                'order_type' => 1,
                'order_status' => 0,
            );

            $insert = $order::insert($data);
        }

        Cart::clear();   

        return redirect()->route('customer.index')->with('orderSuccess', 'Your Order has been Recieved. Please wait for the sellers confirmation');
        //ilalagay sa foreach ang insertion ng data         
    }







    function location(Request $request){
        /*$municipality = new Municipality;
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = $municipality::
           where($select, $value)
           ->groupBy($dependent)
           ->get();
        $output = '<option value="">Select '.ucfirst($dependent).'</option>';
        foreach($data as $row)
        {
          $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
        }

        echo $output;*/

        dd($request->all());

    }
}
