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
//     public function index()
//    { 
//        return view('dashboard.settings.add_settings');
//    }
    
    public function createContacts()
    {
        $contacts = Contacts::all();
        return view('dashboard.settings.add_contacts', [
            'contacts' => $contacts
        ]);
    }
    
    public function createSettings()
    {
        $settings = Settings::all();
        return view('dashboard.settings.add_meta', [
            'settings' => $settings
        ]);
    }
    
    
     public function insertContacts(Request $request)
    {
        $contacts = [];
        $validator = Validator::make($request->all(), [
            'phone' => 'unique:contacts|required',
            'email' => 'unique:contacts|required',
            'address' => 'unique:contacts|required'
        ]);
        
        if (!$validator->fails()) {
            $data_con = $request->all();
            
            $contacts = $data_con['contacts'];
                
            unset($data_con['contacts']);
            
            $contacts = Contacts::create($data_con);
            Contacts::insert($contacts);
            
            return redirect('/dashboard.settings.index_contacts');
        }else{
            
            return view('dashboard.settings.add_contacts', [
                'errors' => $validator->errors()->all()
            ]);
        }
        
    }
    
    public function insertSettings(Request $request)
    {
        $setting = [];
        $validator = Validator::make($request->all(), [
            'description' => 'unique:settings|required',
            'keywords' => 'unique:settings|required',
            'author' => 'unique:settings|required',
            'title' => 'unique:settings|required'
        ]);
        
        if (!$validator->fails()) {
            
            $data_set = $request->all();
            
            $settings = $data_set['settings'];
            
            unset($data_set['settings']);
            
            $ettings = Settings::create($data_set);
            Settings::insert($settings);
            
            return redirect('/dashboard.settings.index_meta');
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
