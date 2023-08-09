<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;
use Illuminate\Validation\Rule;

class CustcodesController extends Controller
{
    public function index(Request $request)
    {
    
        return view('admin.custcodes.index');
    }
	
	
	public function create(){
        $cat = CustCode::get();
        return view('admin.custcodes.create', compact('cat'));
    }

    public function store(Request $request){
        $input = $request->all();
        $validatedData = $request->validate([
            'code' => 'required',
            'code' => 'required|unique:App\Models\CustCode,code'
        ]);
       
        $input['code'] = $input['code'];
        CustCode::create($input);
        
        return redirect()->route('admin.settings')->with('success', 'CustCode added successfully.');
    }

    public function show($id){
        $user = CustCode::where('id',$id)->first();
                      
        return view('admin.custcodes.show', compact('user'));
    }

    public function edit($id){
        $user = CustCode::where('id', '=',$id)->first();
        return view('admin.custcodes.edit', compact('user','id'));
    }

    public function update(Request $request, $id){
       $input = $request->all();
        $validatedData = $request->validate([
            'code' => 'required',
            'code' => [
                              'required',
                              Rule::unique('cust_codes', 'code')->ignore($id),
                            ]
        ]);
 

        $updateHotalInfo = array(
            'code' => $input['code']
        );
        CustCode::where('id',$id)->update($updateHotalInfo);
       
          return redirect()->route('admin.settings')
            ->with('success', 'CustCode Information Updated Successfully!!');
    }

    public function deleteTank(Request $request,$id){
        $product = \DB::table('cust_codes')->where('id', $id)->delete();
        if (!$product) {
            return redirect()->back()->with('error', 'CustCode not found.');
        }
        return redirect()->route('admin.settings')->with('success', 'CustCode deleted successfully.');
    }
}