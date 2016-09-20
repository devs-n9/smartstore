<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
   
    public function up()
    {
      Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product');
            $table->string('alias')->unique();
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->integer('brand_id')->unsigned();
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->text('description');
            $table->text('content');
            $table->decimal('price',6,2);
            $table->string('preview');
            $table->integer('count');
            $table->integer('rating');
            $table->timestamps('date_create');
        });  
    }

  
    public function down()
    {
       Schema::drop('products');
    }
}
