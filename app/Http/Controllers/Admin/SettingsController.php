<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use URL;

class SettingsController extends Controller{
    public function index(Request $request){
       $setting = Setting::first();
       return view('admin.setting', compact('setting'));
    }

    public function store(Request $request){
        $input = $request->all();
    
        $validatedData = $request->validate([
            'email' => 'required',
            'phone' => 'required|numeric|digits_between:2,12',
            'address' => 'required',
            'logo' => 'mimes:jpeg,jpg,png|max:10000',
        ]);
       
        if ($request->hasFile('logo')) {
			
			$file = $request->file('logo');
			$imageName =   URL::to("/").'/attachments/'.time().$file->getClientOriginalName();
			$upload = $file->move(public_path('attachments'), $imageName); 
			$fileNameToStore = $imageName;

        }

        // if($request->hasFile('logo')){
        //     $hotalImg = $request->oldLogoImg;
        // }else{
        //     $hotalImg = $fileNameToStore;
        // }
       
        
        $settinUpdate = array(
            'email' => $input['email'],
            'logo' => isset($fileNameToStore) ? $fileNameToStore : $request->oldLogoImg,
            'phone' => $input['phone'],
            'address' => $input['address'],
        );
        $hotal = Setting::where('id', '1')->update($settinUpdate);
        
        return redirect()->route('admin.setting')->with('success', 'Setting successfully updated.');
    }
	
	public function dbBackup(Request $request){
        $input = $request->all();
    
        $validatedData = $request->validate([
            'database_backup' => 'required',
        ]);

        $settinUpdate = array(
            'database_backup' => $input['database_backup'],
			'is_database_backup' => isset($input['is_database_backup'])?$input['is_database_backup']:0
        );
		
        $hotal = Setting::where('id', '1')->update($settinUpdate);
        
        return redirect()->route('admin.settings')->with('success', 'Setting successfully updated.');
    }

  
}