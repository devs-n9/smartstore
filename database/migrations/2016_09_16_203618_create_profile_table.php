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
            $table->integer('status_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('lastname');
            $table->string('sex');
            $table->integer('age');
            $table->string('avatar');
            $table->string('tel');
            $table->string('address');
            $table->integer('city_id')->unsigned();
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('status_id')->references('id')->on('status');
        });
    }

    
    public function down()
    {
       Schema::drop('profile');
    }
}
