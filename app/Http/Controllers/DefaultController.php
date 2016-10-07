<?php

namespace App\Http\Controllers;

//use App\Models;

use Illuminate\Http\Request;

use App\Http\Requests;

class DefaultController extends Controller
{
    public function index()
    {
        return view('default.index');
        
        /*
        $contacts = Contacts::all();
        $settings = Settings::all();
        return view('default.index',
        ['contacts' => $contacts],
        ['settings' => $settings]);
        */
    }
}