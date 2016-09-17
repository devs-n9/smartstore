<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
       Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category')->unique();
        });
    }

    
    public function down()
    {
        Schema::drop('categories');
    }
}
