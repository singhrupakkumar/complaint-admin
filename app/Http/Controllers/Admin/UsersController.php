<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    public function index(Request $request)
    {
    
        return view('admin.users.index');
    }
	
	
	public function create(){
        $cat = User::get();
        return view('admin.users.create', compact('cat'));
    }

    public function store(Request $request){
        $input = $request->all();
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:App\Models\User,email',
			'role_type' => 'required',
            'password' => 'required'
        ]);
       
        $input['name'] = $input['name'];
        $input['email'] = $input['email'];
        $input['role_type'] = $input['role_type'];
        $input['password'] = Hash::make($input['password']);
        $input['phone'] = $input['phone']; 
		$input['is_email'] = isset($input['is_email'])?$input['is_email']:0;

        User::create($input);
        
        return redirect()->route('admin.settings')->with('success', 'User added successfully.');
    }

    public function show($id){
        $user = User::where('id',$id)->first();
                      
        return view('admin.users.show', compact('user'));
    }

    public function edit($id){
        $user =User::where('id', '=',$id)->first();
        return view('admin.users.edit', compact('user','id'));
    }

    public function update(Request $request, $id){
		
	   $user = User::where('id',$id)->first();
       $input = $request->all();
	  // dd($input);
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => [
                              'required',
                              Rule::unique('users', 'email')->ignore($id),
                            ]
        ]);
 
		
        $updateHotalInfo = array(
            'name' => $input['name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
			'is_email' => isset($request->is_email) ? $request->is_email : 0,  
			'password' => isset($request->password) ? bcrypt($request->password) : $user->password,
            'role_type' => $input['role_type']
        );
        User::where('id',$id)->update($updateHotalInfo);
       
          return redirect()->route('admin.settings')
            ->with('success', 'User Information Updated Successfully!!');
    }

    public function deleteProductItem(Request $request){
        $product = \DB::table('users')->where('id', $request->id)->delete();
        if (!$product) {
            return redirect()->back()->with('error', 'User not found.');
        }
        return redirect()->route('admin.settings')->with('success', 'User deleted successfully.');
    }
}