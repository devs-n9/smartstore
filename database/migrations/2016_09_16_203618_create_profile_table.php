<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileTable extends Migration
{
    
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('gender');
            $table->integer('age');
            $table->string('avatar');
            $table->string('tel');
            $table->string('address');
        });
    }

    
    public function down()
    {
       Schema::drop('profile');
    }
}
