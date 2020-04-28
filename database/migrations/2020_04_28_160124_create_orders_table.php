<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('order_id');
            //customer details
            $table->string('product_name');
            $table->string('product_price');
            $table->string('product_quantity');
            $table->string('customer');
            $table->string('contact_number');
            $table->integer('zipcode');
            $table->string('email');
            $table->string('province');
            $table->string('municipality');
            $table->string('barangay');
            $table->string('street');
            $table->integer('order_number');
            $table->integer('order_type');
            $table->integer('order_status');
            //end customer details

            //if order type 2 then payment is required or else 1 paypal
            $table->string('tnx_number')->nullable();
            $table->string('receipt_number')->nullable();
            $table->string('payment_id')->nullable();
            //endpaypal

            $table->timestamp('created_at');
            $table->string('created_by')->nullable();
            $table->integer('tag_deleted')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
