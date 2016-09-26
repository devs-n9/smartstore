<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    protected $table = 'brands';
    public $timestamps = false;
    protected $guarded = [''];

    public function productsInBrand()
    {
        return $this->hasMany('App\Models\Products', 'brand_id', 'id');
    }
}
