<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('preview');
            $table->text('content');
            $table->timestamps('created_at');
            $table->timestamps('updated_at');
        });
    }

    
    public function down()
    {
        Schema::drop('news');
    }
}
