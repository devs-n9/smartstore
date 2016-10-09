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
    //show view with contact's information
    public function index_contacts()
    { 
        $contacts = Contacts::all();
        return view('dashboard.settings.index_contacts', [
        'contacts' => $contacts
        ]);
    }
    
   //show view with meta tag's information 
   public function index_settings()
    {
        $settings = Settings::find(1);
        return view('dashboard.settings.edit_meta', [
            'settings' => $settings
        ]);
    }
    
    //show view for adding contacts
    public function add_contacts()
    {
        $contacts = Contacts::all();
        return view('dashboard.settings.add_contacts', [
        'contacts' => $contacts
        ]);
    }
    
    //add contacts to DB
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
    
    //add meta tags to DB
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
    
    //show view for changing contact information by $id
    public function edit_contacts($id)
    {
        $contacts = Contacts::find($id);
        return view('dashboard.settings.edit_contacts', [
            'contacts' => $contacts
        ]);
    }
    
    //update contact's information by $id
    public function update_contacts(Request $request, $id)
    {
        $data_cont = $request->all();
        $contacts = Contacts::find($id);
        $contacts ->update($data_cont);
        return redirect('/dashboard/settings/index_contacts');
    }
    
    //delete contact's informations by $id
    public function delete_contacts($id)
    {
        $contacts = Contacts::where("ID", $id)->first();
        $contacts->delete();
        $contacts = Contacts::all();
        return view("dashboard.settings.index_contacts", ["contacts"=>$contacts]);
    }
    
}
