<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $primaryKey = 'order_id';

    protected $table = "orders";

    public $timestamps = false;

    protected $fillable = ['order_id', 'user_id', 
    	'product_name', 'product_price', 'product_quantity', 'customer', 'contact_number', 'zipcode', 'email', 'province', 'municipality', 'barangay', 'street', 'order_number', 'order_type', 'order_status', 'txn_number', 'receipt_number', 'payment_id', 'delivered_at'
    ];

    

    
}
