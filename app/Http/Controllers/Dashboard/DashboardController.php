<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Orders;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

}
