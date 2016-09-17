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
}
