<?php

namespace App\Http;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';
    protected $guarded = [''];
    public $timestamps = false;

}