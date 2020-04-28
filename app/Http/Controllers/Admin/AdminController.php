<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Product;

use App\Category;

use App\Order;

class AdminController extends Controller
{
    //
    public function __construnct(){
    	$this->middleware('guest:admin');
    }

    public function index(){
    	return view('Admin.index');
    }

    public function register_product(){
        return view('Admin.register_product');
    }

    public function product_list(){
        $product = new Product();
        $get_product = $product::all();
    	return view('Admin.product_list', compact('get_product'));
    }

    public function cash_on_delivery(){
        $order = new Order;
        $get_cod = $order::where('order_type', '=', 1)->where('order_status', '=', 0)->where('tag_deleted', '=', 0)->get();
        return view('Admin.cod', compact('get_cod'));
    }

    public function add_product(Request $request){
        $product = new Product;

        if($files = $request->file('product_image')){
            $name = $files->getClientOriginalName();
            $files->move('image',$name);

            $data = array(
                'product_image' => $name,
                'product_name' => $request->item_name,
                'product_category' => $request->category,
                'product_stock' => $request->stock,
                'product_price' => $request->price,
                'product_length' => $request->length,
                'product_width' => $request->width,
                'product_weight' => $request->weight,
                'product_description' => $request->editor
            );

            $insert = $product::insert($data);

            if($insert){
                return back()->with('success', 'Added Succesfully');
            }
        }
    }

    public function edit_product($id){
        $product = new Product;
        $get_product = $product::where('product_id', '=', $id)->where('tag_deleted', '=', 0)->get();

        return view('Admin.edit_product', compact('get_product'));
    }

    public function productTrigger(Request $request){
        $product = new Product;

        if($files = $request->file('product_image')){
            $name = $files->getClientOriginalName();
            $files->move('image',$name);

            $update_product = $product::where('product_id', '=', $request->product_id)->where('tag_deleted', '=', 0)->update([
                'product_image' => $name,
                'product_name' => $request->item_name,
                'product_category' => $request->category,
                'product_stock' => $request->stock,
                'product_price' => $request->price,
                'product_length' => $request->length,
                'product_width' => $request->width,
                'product_weight' => $request->weight,
                'product_description' => $request->editor,
            ]);

            if($update_product){
                return back()->with('success', 'Product Succesfully Updated');
            }
        }
    }

    public function productDelete($id){
        $product = new Product;

        $delete = $product::where('product_id', $id)->delete();

        if($delete){
            return back()->with('success', 'Deleted Succesfully');
        }
    }

    public function add_stock($id){
        $product = new Product();

        $get_data = $product::where('product_id', '=', $id)->where('tag_deleted', '=', 0)->get();
        return view('Admin.add_stock', [

            'id' => $id,
            'data' => $get_data
        ]);
    }

    public function addStockTrigger(Request $request, $id){
        $product = new Product;

        $update_stock = $product::where('product_id', $id)->where('tag_deleted', '=', 0)->update([
            'product_stock' => $request->stock
        ]);

        if($update_stock){
            return back()->with('success', 'Stock Updated Succesfully');
        }
    }

    public function category(){
        $category = new Category;

        $get_category = $category::all();

        return view('Admin.category', compact('get_category'));
    }

    public function addCategory(Request $request){
        $category = new Category;
        $add_category = $category::insert(['category_name' => $request->category]); 

        if($add_category){
            return back()->with('success', 'Category Added Succesfully');
        }
    }
}
