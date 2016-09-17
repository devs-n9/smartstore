<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusTable extends Migration
{
    
    public function up()
    {
       Schema::create('status', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status'); 
    }

    
    public function down()
    {
        Schema::drop('status');
    }
}
