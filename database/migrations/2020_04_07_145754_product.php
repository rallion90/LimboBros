<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Product extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('product_id');
            $table->string('product_image');
            $table->string('product_name');
            $table->string('product_category');
            $table->integer('product_stock');
            $table->integer('product_price');
            $table->integer('product_length');
            $table->integer('product_width');
            $table->integer('product_weight');
            $table->string('product_description');
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
        //
    }
}
