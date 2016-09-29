<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('newscategories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('newscategory_id');
            $table->integer('news_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('newscategories');
    }
}

