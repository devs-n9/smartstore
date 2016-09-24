<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
     public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('delivery_id')->unsigned();
            $table->integer('payment_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('count');
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
