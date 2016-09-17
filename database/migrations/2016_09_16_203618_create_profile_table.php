<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileTable extends Migration
{
    
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->increments('id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('lastname');
            $table->string('sex');
            $table->int('age');
            $table->string('avatar');
            $table->string('tel');
            $table->string('address');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('status_id')->references('id')->on('status');
        });
    }

    
    public function down()
    {
       Schema::drop('profile');
    }
}
