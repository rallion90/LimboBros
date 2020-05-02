<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Cart;

class CartController extends Controller
{
    //
    public function addCart(Request $request){
    	$add = Cart::add([
    		'id' => $request->product_id,
    		'name' => $request->product_name,
    		'price' => $request->product_price,
    		'quantity' => $request->product_quantity,
    	]);

    	if($add){
    		return back()->with('addSuccess', 'Item Added to Cart Succesfully!');
    	}
    }

    public function Cart(){
    	$cart_content = Cart::getContent();
    	//return $cart_content;
    	return view('Customer.cart', compact('cart_content'));
    }

    public function updateCart(Request $request){
        Cart::update($request->id, array(
            'quantity' => $request->quantity
        ));
        //return $request->all();

        return response()->json('Your Item Updated Succesfully');
    }

    public function removeCart($id){
        Cart::remove($id);
        return back();
    }
}
