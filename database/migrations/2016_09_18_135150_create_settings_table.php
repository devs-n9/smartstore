<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    
    public function up()
    {
         Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->string('keywords');
            $table->string('author');
            $table->string('title');
        });
    }

    
    public function down()
    {
        Schema::drop('settings');
    }
}
