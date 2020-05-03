<?php
namespace App\Http;

use App\Product;

use App\Category;

use App\Order;

use App\Province;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Redirect;

use Cart;

use Carbon;

class Helper{

	public static function cart_number(){
		$cart_count = Cart::getContent();
		return $cart_count->count();
	}

	public static function province(){
		$province = new Province;
		$get_province = $province::get();

		return $get_province;
	}

	public static function category(){
		$category = new Category;

		$get_category = $category::where('tag_deleted', '=', 0)->get();

		return $get_category;
	}

	public static function lowStock(){
		$product = new Product;
		$low_stock_product = $product::where('product_stock', '<=', 5)->get();
		return $low_stock_product;
	}

	public static function newOrders(){
		$order = new Order;
		$check_timestamps = $order::get();
		return $check_timestamps;
	}

}
