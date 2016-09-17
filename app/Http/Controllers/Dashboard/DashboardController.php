<?php

namespace App\Http\Controllers\Dashboard;

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
}
