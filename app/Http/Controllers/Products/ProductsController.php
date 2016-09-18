<?php

namespace App\Http\Controllers\Products;

use App\Models\Categories;
use App\Models\Products;
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
    public function category($alias)
    {
        $category = Categories::where('alias', $alias)->first;
        $categories = Categories::all();
        return view('products.list', ['categories'=>$categories,'category'=>$category]);
    }

    // Product detail
    public function product($alias)
    {
        $product = Products::where('alias', $alias)->first;
        $products = Products::all();
        $categories = Categories::all();
        return view('products.product', ['product'=>$product,'categories'=>$categories,'products'=>$products]);
    }
}
