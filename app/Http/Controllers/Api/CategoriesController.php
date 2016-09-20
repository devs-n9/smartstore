<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Models\Categories;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;


class CategoriesController extends Controller
{
     public function getAllCategories()
    {
        return response()->json(Products::AllProducts());
    }
     
}


