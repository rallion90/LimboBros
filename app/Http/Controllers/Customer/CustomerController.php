<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;

use App\Product;

use App\Municipality;

use Illuminate\Http\Request;

use Auth;

use Cart;

class CustomerController extends Controller
{
    //
    public function index(){
        $product = new Product;
        $active_product = $product::where('tag_deleted', '=', 0)->take(3)->get();
    	return view('Customer.index', compact('active_product'));
    }

    public function product_details($id){
        $product = new Product;
        $get_product = $product::where('product_id', '=', $id)->where('tag_deleted', '=', 0)->first();
        return view('Customer.product_detail', compact('get_product'));
    }

    public function cart(){
    	return view('Customer.cart');
    }

    public function products(){
        $products = new Product;
        $get_product = $products::where('tag_deleted', '=', 0)->get();
    	return view('Customer.product_list', compact('get_product'));
    }

    public function product_filter($id){
        $products = new Product;
        $get_product = $products::where('product_category', '=', $id)->where('tag_deleted', '=', 0)->get();
        return view('Customer.product_list', compact('get_product'));

    }

    public function checkout(){
        return view('Customer.checkout');
    }

    public function cod(Request $request){
        $six_digit_random_number = mt_rand(100000000, 999999999);
        echo $six_digit_random_number;


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
