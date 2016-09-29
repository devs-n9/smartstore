<?php

namespace App\Http\Controllers\Dashboard;

use Validator;
use App\Models\Contacts;
use App\Models\Settings;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
     public function index_contacts()
    { 
        $contacts = Contacts::all();
        return view('dashboard.settings.index_contacts', [
        'contacts' => $contacts
        ]);
    }
    
    
   public function index_settings()
    {
        $settings = Settings::find(1);
        return view('dashboard.settings.edit_meta', [
            'settings' => $settings
        ]);
    }
    
    
     public function insert_contacts(Request $request)
    {
        $contacts = [];
        $validator = Validator::make($request->all(), [
            'phone' => 'unique:contacts|required',
            'email' => 'unique:contacts|required',
            'address' => 'unique:contacts|required'
        ]);
        
        if (!$validator->fails()) {
            $data_con = $request->all();
            
            Contacts::create($data_con);
                        
            return redirect('/dashboard/settings/edit_contacts');
        }else{
            
            return view('dashboard.settings.add_contacts', [
                'errors' => $validator->errors()->all()
            ]);
        }
        
    }
    
    public function insert_settings(Request $request)
    {
        $settings = [];
        $validator = Validator::make($request->all(), [
            'description' => 'unique:settings|required',
            'keywords' => 'unique:settings|required',
            'author' => 'unique:settings|required',
            'title' => 'unique:settings|required'
        ]);
        
        if (!$validator->fails()) {
            
            $data_set = $request->all();
          
            Settings::create($data_set);
            
            return redirect('/dashboard/settings/edit_meta');
        }else{
            
            return view('dashboard.settings.add_meta', [
                'errors' => $validator->errors()->all()
            ]);
        }
        
    }
    
    
    public function editContacts($id)
    {
        $contacts = Contacts::find($id);
        return view('dashboard.settings.edit_contacts', [
            'contacts' => $contacts
        ]);
    }
    
    public function editSettings($id)
    {
        $settings = Settings::find($id);
        return view('dashboard.settings.edit_meta', [
            'settings' => $settings
        ]);
    }
    
    public function updateContacts(Request $request, $id)
    {
        $data_cont = $request->all();
        $contacts = Contacts::find($id);
        $contacts ->update($data_cont);
        return redirect('/dashboard.settings.index_contacts');
    }
    
    public function updateSettings(Request $request, $id)
    {
        $data_set = $request->all();
        $settings = Settings::find($id);
        $settings ->update($data_set);
        return redirect('/dashboard.settings.index_meta');
    }
    
     public function deleteSettings($id)
    {
        $post = Settings::where('id', $id)->delete();
        return redirect('/dashboard.settings.index_meta');
    }
    
}
