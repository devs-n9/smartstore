<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveryTable extends Migration
{
    public function up()
    {
       Schema::create('delivery', function (Blueprint $table) {
            $table->increments('id');
            $table->string('delivery'); 
    }

    
    public function down()
    {
        Schema::drop('delivery');
    }
}
