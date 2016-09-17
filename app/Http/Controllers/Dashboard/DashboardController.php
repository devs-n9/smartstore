<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Brands;
use App\Models\Categories;
use Illuminate\Http\Request;
use Validator;

use App\Models\Products;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function ShowAllProducts()
    {
        $products = Products::all();
        return view('dashboard.products', ['products' => $products]);
    }

    public function editProduct($id)
    {
        return view('dashboard.edit_product', ['data' => Products::find($id)]);
    }

    public function addProductPage()
    {
        return view('dashboard.add_product', ['type' => '', 'message' => '', 'categories' => Categories::all(), 'brands' => Brands::all()]);
    }

    public function addProduct(Request $request)
    {
        $rule = [
            'product' => 'required|unique:products|max:255',
            'category' => 'required',
            'brand' => 'required',
            'short_description' => 'max:255',
            'price' => 'numeric',
            'count' => 'numeric',
            'photos.*.file' => 'image|max:1024'
        ];
        $validator = Validator::make($request->all(), $rule);

        //dump($request->all());

        if(!$validator->fails()){

            $product = $request->all();
            $photos = serialize($request->photos);

            Products::insert(['product' => $product['product'],
            'category_id' => $product['category'],
            'brand_id' => $product['brand'],
            'description' => $product['short_description'],
            'content' => $product['content'],
            'price' => $product['price'],
            'preview' => $photos,
            'count' => $product['count'],
            'rating' => 0]);

            $message = 'Product added successfully';
            $message_type = 'success';
        }else{
            $message = $validator->errors()->all();
            $message_type = 'danger';
        }
        return view('dashboard.add_product', ['type' => $message_type, 'message' => $message, 'categories' => Categories::all(), 'brands' => Brands::all()]);
    }
}
