<?php

namespace App\Http\Controllers\Products;

use App\Models\Categories;
use App\Models\ProductImages;
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
        $category = Categories::all()->where('alias', $alias)->first();
        $category_products = Products::all()->where('category_id', $category['id']);
        $categories = Categories::all();
        return view('products.category', ['categories'=>$categories,'category'=>$category,'category_products'=>$category_products]);
    }

    // Product detail
    public function product($alias)
    {
        $product = Products::all()->where('alias', $alias)->first();
        $images = ProductImages::all()->where('product_id', $product->id);
        $products = Products::all();
        $categories = Categories::all();
        $product_category = $categories->where('id', $product['category_id'])->first();
        return view('products.product', ['product'=>$product,'categories'=>$categories,'products'=>$products,'product_category'=>$product_category, 'images'=>$images]);
    }
}
