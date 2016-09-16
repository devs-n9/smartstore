<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleTable extends Migration
{
    
    public function up()
    {
       Schema::create('role', function (Blueprint $table) {
            $table->increments('id');
            $table->string('role'); 
    }

    
    public function down()
    {
        Schema::drop('role');
    }
}
