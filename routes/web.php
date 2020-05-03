<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('customer')->group(function(){
	//customer here
	Route::get('login', 'Customer\CustomerLoginController@LoginForm')->name('customer.login');
	Route::post('login', 'Customer\CustomerLoginController@Login')->name('customer.login.submit');
	Route::get('index', 'Customer\CustomerController@index')->name('customer.index');
	//Route::get('cart', 'Customer\CustomerController@cart')->name('customer.cart');
	Route::get('products', 'Customer\CustomerController@products')->name('customer.product');
	Route::get('products/{id}', 'Customer\CustomerController@product_filter')->name('customer.product_filter');
	Route::get('product_details/{id}', 'Customer\CustomerController@product_details')->name('customer.product_details');
	Route::post('addCart', 'CartController@addCart')->name('customer.addCart');
	Route::post('updateCart', 'CartController@updateCart')->name('customer.updateCart');
	Route::get('removeCart/{id}', 'CartController@removeCart')->name('customer.removeCart');
	Route::get('cart', 'CartController@Cart')->name('customer.cart');
	Route::get('checkout', 'Customer\CustomerController@checkout')->name('customer.checkout');
	Route::post('cash_on_delivery', 'Customer\CustomerController@cod')->name('customer.cod');
	Route::get('track_order', 'Customer\CustomerController@orderTracking')->name('customer.orderTracking');
	Route::get('status', 'Customer\CustomerController@orderStatus')->name('customer.orderStatus');


	Route::post('location', 'Customer\CustomerController@location')->name('location');

});

Route::prefix('admin')->group(function(){
	//admin here
	Route::get('login', 'Admin\AdminLoginController@LoginForm')->name('admin.login');
	Route::post('login', 'Admin\AdminLoginController@Login')->name('admin.login.submit');
	Route::middleware('auth:admin')->group(function(){
		Route::get('index', 'Admin\AdminController@index')->name('admin.index');
		Route::get('register_product', 'Admin\AdminController@register_product')->name('admin.register_product');
		Route::get('product_list', 'Admin\AdminController@product_list')->name('admin.product_list');
		Route::get('edit_product/{id}', 'Admin\AdminController@edit_product')->name('admin.edit_product');
		Route::get('cash_on_delivery', 'Admin\AdminController@cash_on_delivery')->name('admin.cod');
		Route::get('delete_product/{id}', 'Admin\AdminController@productDelete')->name('admin.deleteProduct');
		Route::get('add_stock/{id}', 'Admin\AdminController@add_stock')->name('admin.addStock');
		Route::get('category', 'Admin\AdminController@category')->name('admin.category');

		Route::post('add_product', 'Admin\AdminController@add_product')->name('addProduct');
		Route::post('edit_product_trigger', 'Admin\AdminController@productTrigger')->name('admin.editProductTrigger');
		Route::post('add_stock_trigger/{id}', 'Admin\AdminController@addStockTrigger')->name('admin.addStockTrigger');
		Route::post('add_category', 'Admin\AdminController@addCategory')->name('admin.addCategory');
		Route::get('succesful_order', 'Admin\AdminController@succesful')->name('admin.success');
		Route::get('order_details/{id}', 'Admin\AdminController@details');
		Route::get('confirm_order/{id}', 'Admin\AdminController@confirm_order');
		Route::get('order_recieved/{id}', 'Admin\AdminController@orderRecieved');

	});	
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
