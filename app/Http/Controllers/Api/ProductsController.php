<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Models\Brands;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use App;

class ProductsController extends Controller
{
    public function getAllProducts()
    {
        return response()->json(Products::AllProducts());
    }

    public function getTop10()
    {
        return response()->json(Products::getTop10());
    }

    public function test(){

        dump(config('custom')['brands_img']);
    }
}
