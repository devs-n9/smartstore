<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';

    public function scopeAllProducts($query)
    {
        return $query->get();
    }

    public function scopegetTop10($query)
    {
        return $query->orderBy('rating')->limit(10)->get();
    }

    public function category()
    {
        return $this->hasOne('App\Models\Categories', 'id', 'category_id');
    }

    public function brand()
    {
        return $this->hasOne('App\Models\Brands', 'id', 'brand_id');
    }

    public function getProduct($id)
    {
        return $this->where('id', $id)->get();
    }
}
