<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Models\Brands;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use App;
use Storage;

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

    public function test()
    {
        dd(Storage::disk('uploads')->allDirectories());
        dump(config('custom')['brands_img']);
    }
}
