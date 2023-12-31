<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use URL;

class ProfilesController extends Controller{

    public function index(Request $request){
       $profile = Profile::first();
       return view('admin.profile', compact('profile'));
    }
       
    public function store(Request $request){
        $input = $request->all();
    
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required|numeric|digits_between:2,12',
            'address' => 'required',
            'profile_image' => 'mimes:jpeg,jpg,png|max:10000',
        ]);
       
        if ($request->hasFile('profile_image')) {
			
			$file = $request->file('profile_image');
			$imageName =   URL::to("/").'/attachments/'.time().$file->getClientOriginalName();
			$upload = $file->move(public_path('attachments'), $imageName); 
			$fileNameToStore = $imageName;
        }

        
       
        
        $settinUpdate = array(
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'email' => $input['email'],
            'profile_image' => isset($fileNameToStore) ? $fileNameToStore : $request->old_profile_image,
            'phone' => $input['phone'],
            'address' => $input['address'],
        );
        $hotal = Profile::where('id', '1')->update($settinUpdate);
        
        return redirect()->route('admin.profile')->with('success', 'Profile Updated Successfully.');
    }

    public function index1(){
        return view('changePassword');
    } 

   
}