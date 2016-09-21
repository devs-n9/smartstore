<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    public $timestamps = false;
    protected $guarded = [''];

    // scopes begin

    public function scopegetTop10($query)
    {
        return $query->orderBy('rating')->limit(10)->get();
    }
    // scopes end

    // relations begin
    public function category()
    {
        return $this->hasOne('App\Models\Categories', 'id', 'category_id');
    }

    public function brand()
    {
        return $this->hasOne('App\Models\Brands', 'id', 'brand_id');
    }

    public function images()
    {
        return $this->hasMany('App\Models\ProductImages', 'id', 'product_id');
    }
    // relations end


    public function getProduct($id)
    {
        return $this->where('id', $id)->get();
    }
}
