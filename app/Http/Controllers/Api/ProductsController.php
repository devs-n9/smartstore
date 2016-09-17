<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Products;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class ProductsController extends Controller
{
    public function getAllProducts(){
                return response()->json(Products::AllProducts()->get());
    }
}
