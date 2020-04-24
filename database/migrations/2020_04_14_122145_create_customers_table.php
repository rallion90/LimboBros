<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('customer_id');
            $table->string('customer_fname');
            $table->string('customer_mname');
            $table->string('customer_lname');
            $table->string('customer_email')->unique();
            $table->string('customer_password');
            $table->timestamp('created_at');
            $table->string('created_by')->nullable();
            $table->integer('tag_deleted');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
