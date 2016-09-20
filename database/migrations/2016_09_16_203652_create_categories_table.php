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
            $table->string('alias')->unique();
            $table->string('description');
            $table->text('content');
            $table->string('preview');
        });
    }

    
    public function down()
    {
        Schema::drop('categories');
    }
}
