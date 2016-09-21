<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentTable extends Migration
{
   
    public function up()
    {
       Schema::create('payment', function (Blueprint $table) {
            $table->increments('id');
            $table->string('payment');
        });
    }

    
    public function down()
    {
        Schema::drop('payment');
    }
}
