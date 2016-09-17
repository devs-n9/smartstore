<?php

namespace App\Http\Controllers\Cart;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function cart()
    {
        return view('cart.index');
    }
    
    public function checkout()
    {
        return view('cart.checkout');
    }
}
