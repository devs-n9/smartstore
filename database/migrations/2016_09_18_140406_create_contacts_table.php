<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('phone');
            $table->string('email');
            $table->string('address');
        });
    }

   
    public function down()
    {
         Schema::drop('contacts');
    }
}
