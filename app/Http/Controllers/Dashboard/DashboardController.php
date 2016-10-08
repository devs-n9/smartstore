<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Brands;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
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
	
	public function notify()
    {
        return view('dashboard.notify');
    }
	
	
}
