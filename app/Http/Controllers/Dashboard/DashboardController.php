<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Brands;
use App\Models\Categories;
use Illuminate\Http\Request;

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
    public function editProduct($id){
        return view('dashboard.edit_product', ['data' => Products::find($id)]);
    }
    public function addProduct(){
        return view('dashboard.add_product', ['categories' => Categories::all(), 'brands' => Brands::all()]);
    }
}
