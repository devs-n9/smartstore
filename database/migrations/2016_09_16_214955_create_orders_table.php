<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
     public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->int('count');
            $table->text('description');
            $table->foreign('delivery_id')->references('id')->on('delivery');
            $table->foreign('payment_id')->references('id')->on('payment');
            $table->timestamps('date_create');
            $table->string('pay_status');
        });
    }

    
    public function down()
    {
       Schema::drop('orders');
    }
}
