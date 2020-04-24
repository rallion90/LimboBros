<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductHeartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_hearts', function (Blueprint $table) {
            $table->increments('heart_id');
            $table->integer('user_id');
            $table->integer('product_id');
            $table->timestamp('created_at');
            $table->string('created_by')->nullable();
            $table->integer('tag_deleted')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_hearts');
    }
}
