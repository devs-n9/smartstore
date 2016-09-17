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
        return view('dashboard.add_product', ['categories' => Categories::all(), 'brands' => Brands::all()]);
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
        //$img_validator = Validator::make($request->photos);
        //'photos' => 'image|size:1024'
        dump($request->all());

        if(!$validator->fails()){
            dump($request->all());
        }else{
            dump($validator);
        }
    }
}
