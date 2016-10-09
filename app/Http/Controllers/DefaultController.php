<?php

namespace App\Http\Controllers;

use App\Models\Contacts;

use App\Models\Settings;

use Illuminate\Http\Request;

use App\Http\Requests;

class DefaultController extends Controller
{
    public function index()
    {
        $contacts = Contacts::find(1);
        $settings = Settings::find(1); 
        return view('default.index',
        ['contacts' => $contacts],
        ['settings' => $settings]);
        
    }
}