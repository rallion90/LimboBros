<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Product;

use App\Category;

use App\Order;

use App\FinishOrder;

use DB;

use Mail;

use App\Mail\OrderMail;

use Carbon;

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
        //$get_cod = $order::where('order_type', '=', 1)->where('order_status', '=', 0)->where('tag_deleted', '=', 0)->get();
        $get_cod = DB::table('orders')
                 ->select('order_number')
                 ->where('order_type', '=', 1)
                 ->where('tag_deleted', '=', 0)
                 ->where('order_status', '=', 0)
                 ->groupBy('order_number')
                 ->orderBy('created_at')
                 ->get();

        $get_deliver = DB::table('orders')
                 ->select('order_number')
                 ->where('order_type', '=', 1)
                 ->where('tag_deleted', '=', 0)
                 ->where('order_status', '=', 1)
                 ->groupBy('order_number')
                 ->orderBy('created_at')
                 ->get();          
        

        return view('Admin.cod')->with('get_cod', $get_cod)->with('get_deliver', $get_deliver);
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

    public function succesful(){
        
        $order_success = FinishOrder::where('tag_deleted', '=', 0)->get();        

        return view('Admin.successful_order')->with('succesful_deliver', $order_success);
    }

    public function details($id){
        $order = new Order;
        $get_order = $order::where('order_number', '=', $id)->get();
        $get_info = $order::where('order_number', '=', $id)->limit(1)->first();
        $sum = 0;


        foreach($get_order as $order_total){
            $sum += ($order_total->product_quantity * $order_total->product_price);
        }

        return view('Admin.order')->with('get_order', $get_order)->with('id', $id)->with('get_info', $get_info)->with('sum', $sum);
    }

    public function confirm_order($id){
        $order = new Order;
        $update = $order::where('order_number', '=', $id)->update([
            'order_status' => 1
        ]);

        if($update){
            $get_order2 = $order::where('order_number', '=', $id)->get();

            $total = 0;
            $email = "";
            $order_number = "";
            $customer_name = "";
            foreach($get_order2 as $order_total){
                $total += ($order_total->product_quantity * $order_total->product_price);
                $email = $order_total->email;
                $order_number = $order_total->order_number;
                $customer_name = $order_total->customer;
                $product_id = $order_total->product_id;

                DB::table('products')
                ->where('product_id', '=', $product_id)
                ->decrement('product_stock', $order_total->product_quantity);

            }

            Mail::to($email)->send(new OrderMail($get_order2, $total, $order_number, $customer_name));

            
            return redirect()->route('admin.cod')->with('success', 'Order Succesfully Confirmed');
            

            
        }
    }

    public function paypalOrders(){
        $orders = new Order;
        $get_paypal = $orders::where('order_type', '=', 2)->where('order_status', '=', 0)->where('tag_deleted', '=', 0)->groupBy('order_number')->get();

        $get_deliver = DB::table('orders')
                 ->select('order_number')
                 ->where('order_type', '=', 2)
                 ->where('tag_deleted', '=', 0)
                 ->where('order_status', '=', 1)
                 ->groupBy('order_number')
                 ->orderBy('created_at')
                 ->get();

        return view('Admin.paypal_orders')->with('get_paypal', $get_paypal)->with('get_deliver', $get_deliver);
    }

    public function orderRecieved($id){
    
        Order::where('order_number', '=', $id)->update([
            'order_status' => 2,
            'tag_deleted' => 1,
        ]);

        $orders = Order::where('order_number', '=', $id)->get();

        $total = 0;
        foreach($orders as $order){
            $total += ($order->product_quantity * $order->product_price);
        }

        $order_data = array(
            'order_number' => $id,
            'total' => $total,
            'delivered_at' => Carbon::now()->toDateTimeString(),
        );

        FinishOrder::insert($order_data);

        return redirect()->route('customer.index');

    }

    public function paypalConfirm($id){
        $order = new Order;
        $update = $order::where('order_number', '=', $id)->update([
            'order_status' => 1
        ]);

        if($update){
            $get_order2 = $order::where('order_number', '=', $id)->get();

            $total = 0;
            $email = "";
            $order_number = "";
            $customer_name = "";
            foreach($get_order2 as $order_total){
                $total += ($order_total->product_quantity * $order_total->product_price);
                $email = $order_total->email;
                $order_number = $order_total->order_number;
                $customer_name = $order_total->customer;
                $product_id = $order_total->product_id;

                DB::table('products')
                ->where('product_id', '=', $product_id)
                ->decrement('product_stock', $order_total->product_quantity);

            }

            Mail::to($email)->send(new OrderMail($get_order2, $total, $order_number, $customer_name));

            
            return redirect()->route('admin.cod')->with('success', 'Order Succesfully Confirmed');
        }    
    }

    

}
