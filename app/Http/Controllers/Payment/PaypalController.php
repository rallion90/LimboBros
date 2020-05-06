<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;

use DB;

use Illuminate\Http\Request;

use PayPal\Rest\ApiContext;

use PayPal\Api\Amount;

use PayPal\Api\Details;

use PayPal\Api\Item;



use PayPal\Api\ItemList;

use PayPal\Api\Payer;

use PayPal\Api\Payment;

use PayPal\Api\RedirectUrls;

use PayPal\Api\Transaction;

use PayPal\Api\PaymentExecution;

use PayPal\Api\Invoice;

use Cart;

use Auth;

class PaypalController extends Controller
{
    //
    public function createPayment(Request $request){
    	$apiContext = new \PayPal\Rest\ApiContext(
          new \PayPal\Auth\OAuthTokenCredential(
            'AQTwAvDxqrsEWy1l7DhQ49gRF-E-mygfvqe5rsdZpAXQwjLVUB5ZSfl8_OFAZlc_DFb3DZPfn5_jcDWn',
            'EBkm03IA73Drp4MjeLjgZpkmXTXtWfDFBaKTGNcuhQSfKvoDMa6xgkAFW__CQTvhesbSGYrhvUC9t1bs'
          )
        );
 
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        $items = [];

        foreach(Cart::getContent() as $cart_items){
        	$item = new Item();
        	$item->setName($cart_items->name)
            	->setPrice($cart_items->price)
            	->setCurrency('USD')
            	->setSku($cart_items->id)
            	->setQuantity($cart_items->quantity);
        	$items[] = $item;
        }

        
		
        $itemList = new ItemList();
        $itemList->setItems($items);
        

        $amount = new Amount();
        $amount->setCurrency("USD")
            ->setTotal(Cart::getTotal());
            

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Payment description")
            ->setInvoiceNumber(uniqid());

        
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl("http://127.0.0.1:8000/customer/index")
            ->setCancelUrl("http://127.0.0.1:8000/customer/index");

        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));

        
            $payment->create($apiContext);
        

        //$approvalUrl = $payment->getApprovalLink();

        

        return $payment;
    }

    public function executePayment(Request $request){
        $six_digit_random_number = mt_rand(100000000, 999999999);

        $apiContext = new \PayPal\Rest\ApiContext(
          new \PayPal\Auth\OAuthTokenCredential(
            'AQTwAvDxqrsEWy1l7DhQ49gRF-E-mygfvqe5rsdZpAXQwjLVUB5ZSfl8_OFAZlc_DFb3DZPfn5_jcDWn',
            'EBkm03IA73Drp4MjeLjgZpkmXTXtWfDFBaKTGNcuhQSfKvoDMa6xgkAFW__CQTvhesbSGYrhvUC9t1bs'
          )
        );

        $paymentId = $request->paymentID;
        $payment = Payment::get($paymentId, $apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($request->payerID);

        


        try{
            $result = $payment->execute($execution, $apiContext);

            
            try {
                $payment = Payment::get($paymentId, $apiContext);
            }catch(Exception $ex){
                alert($ex);
                exit(1);
            }
        }catch(Exception $ex){
            alert($ex);
            exit(1);
        }

      
        
        
        foreach(Cart::getContent() as $items){
            $customer_info = array(
                "user_id" => Auth::guard('customer')->user()->customer_id,
                "product_id" => $items->id,
                "product_name" => $items->name,
                "product_price" => $items->price,
                "product_quantity" => $items->quantity,
                "customer" => $request->first_name." ".$request->last_name,
                "contact_number" => $request->number,
                "zipcode" => $request->zipcode,
                "email" => $request->email,
                "province" => 1,
                "municipality" => 1,
                "barangay" => 2,
                "street" => $request->street,
                "order_number" => $six_digit_random_number,
                "order_type" => 2,
                "order_status" => 0,
                "invoice_number" => $payment->transactions[0]->invoice_number,
                "receipt_number" => $payment->transactions[0]->invoice_number,
                "payment_id" => $payment->id
            );
            DB::table('orders')->insert($customer_info);
        }

        Cart::clear();


        

        return $this->paymentSuccess();
        
    }

    public function paymentSuccess(){
        return redirect()->route('customer.index')->with('orderSuccess', 'Your Order has been Recieved. Please wait for the sellers confirmation');
    }
}
