<?php

namespace App\Http\Controllers\Products;

use App\Models\Categories;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    // Catalog - categories page
    public function catalog()
    {
        $categories = Categories::all();
        return view('products.catalog', ['categories'=>$categories]);
    }

    // Category - products list
    public function category($name)
    {
        $category = Categories::where('category', $name)->first;
        $categories = Categories::all();
        return view('products.list', ['categories'=>$categories,'category'=>$category]);
    }

    // Product detail
    public function product($name)
    {
        return view('products.product');
    }
}
