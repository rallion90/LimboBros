<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;

use App\Product;

use App\Customer;

use Hash;

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
        $active_product = $product::where('product_stock', '!=', 0)->where('tag_deleted', '=', 0)->take(10)->get();
    	return view('Customer.index', compact('active_product'));
    }

    public function product_details($id){
        $product = new Product;
        $get_product = $product::where('product_stock', '!=', 0)->where('product_id', '=', $id)->where('tag_deleted', '=', 0)->first();

        $get_related_product = $product::where('product_stock', '!=', 0)->where('product_id', '=', $id)->where('tag_deleted', '=', 0)->get();
        return view('Customer.product_detail')->with('get_product', $get_product)->with('related_product', $get_related_product);
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

        return $this->paymentSuccess();  

        
        //ilalagay sa foreach ang insertion ng data         
    }

    public function paymentSuccess(){
        return redirect()->route('customer.index')->with('orderSuccess', 'Your Order has been Recieved. Please wait for the sellers confirmation');
    }

    public function orderTracking(){
        return view('Customer.tracking');
    }

    public function orderStatus(){
        return view('Customer.status');
    }

    public function myOrders(){
        $orders = Order::where('user_id', '=', Auth::guard('customer')->user()->customer_id)->orderBy('created_at', 'DESC')->get();
        return view('Customer.my_order')->with('orders', $orders);
    }

    public function customer_register(){
        return view('Customer.register');
    }

    public function customer_registerTrigger(Request $request){
        $request->validate([
            'firstname' => 'required|max:60',
            'middlename' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'password' => 'min:6|required|required_with:password_confirmation|same:confirmPassword',
            'confirmPassword' => 'required|min:6'
        ]);

        Customer::create([
            'customer_fname' => $request->firstname,
            'customer_mname' => $request->middlename,
            'customer_lname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('customer.login')->with('success', 'Account Register Succesfully');
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
