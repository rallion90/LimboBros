<?php
namespace App\Http;

use App\Product;

use App\FinishOrder;

use App\Category;

use App\Order;

use App\Province;

use App\Municipality;

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
		
		$get_province = Province::orderBy('provDesc', 'ASC')->get();

		return $get_province;
	}



	public static function category(){
		$get_category = Category::where('tag_deleted', '=', 0)->get();

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

	public static function PaypalPayment(){
		$order = new Order;
		$get_paypal_order = $order::where('order_type', '=', 2)->where('order_status', '=', 0)->get();

	
		return $get_paypal_order;
	}

	public static function getOrderCount(){
		$order = new Order;
		$count = $order::where('order_status', '=', 0)->where('tag_deleted', '=', 0)->count();

		return $count; 
	}

	public static function YearlyAnalytics(){
		$order = new Order;
		//$orders = $order::where('')

	}

	public static function SuccesfulOrders(){
		$count = FinishOrder::where('tag_deleted', '=', 0)->count();

		return $count;
	}

	public static function expectedSales(){
		$products = Product::where('tag_deleted', '=', 0)->get();

		$total = 0;

		foreach($products as $totals){
			$total += ($totals->product_stock * $totals->product_price);  
		}

		return $total;
	}

}