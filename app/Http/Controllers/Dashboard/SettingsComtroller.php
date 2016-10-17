<?php

namespace App\Http\Controllers\Dashboard;

use Validator;
use App\Models\Contacts;
use App\Models\Settings;
use Illuminate\Http\Request;
use App\Http\Requests;

class SettingsComtroller extends Controller
{
     public function index()
    { 
        return view('dashboard.settings.add_settings');
    }
    
    public function create()
    {
        $contacts = Contacts::all();
        $settings = Settings::all();
        return view('dashboard.settings.add_settings', [
            'contacts' => $contacts,
            'settings' => $settings
        ]);
    }
    
     public function insert(Request $request)
    {
        $contacts = [];
        $setting = [];
        $changes = [];
        $validator = Validator::make($request->all(), [
            'description' => 'unique:settings|required',
            'keywords' => 'unique:settings|required',
            'author' => 'unique:settings|required',
            'title' => 'unique:settings|required',
            'phone' => 'unique:contacts|required',
            'email' => 'unique:contacts|required',
            'address' => 'unique:contacts|required'
        ]);
        
        if (!$validator->fails()) {
            $data_con = $request->all();
            $data_set = $request->all();
            
            $contacts = $data_con['contacts'];
            $settings = $data_set['settings'];
            
            unset($data_con['contacts'] & $data_set['settings']);
            
            $contacts = Contacts::create($data_con);
            Contacts::insert($contacts);
            
            $ettings = Settings::create($data_set);
            Settings::insert($settings);
            
            return redirect('/dashboard.index.blade');
        }else{
            
            return view('dashboard.settings.add_settings', [
                'errors' => $validator->errors()->all()
            ]);
        }
        
    }
    
    public function edit($id)
    {
        $contacts = Contacts::find($id);
        $settings = Settings::find($id);
        return view('dashboard.settings.edit_settings', [
            'contacts' => $contacts,
            'settings' => $settings
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $data_cont = $request->all();
        $contacts = Contacts::find($id);
        $data_set = $request->all();
        $settings = Settings::find($id);
        $contacts ->update($data_cont);
        $settings ->update($data_set);
        return redirect('/dashboard.index.blade');
    }
    
}
