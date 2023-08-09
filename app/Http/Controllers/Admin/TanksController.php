<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;
use Illuminate\Validation\Rule;

class TanksController extends Controller
{
    public function index(Request $request)
    {
    
        return view('admin.tanks.index');
    }
	
	
	public function create(){
        $cat = Tank::get();
        return view('admin.tanks.create', compact('cat'));
    }

    public function store(Request $request){
        $input = $request->all();
        $validatedData = $request->validate([
            'name' => 'required',
            'name' => 'required|unique:App\Models\Tank,name'
        ]);
       
        $input['name'] = $input['name'];
        Tank::create($input);
        
        return redirect()->route('admin.settings')->with('success', 'Tank added successfully.');
    }

    public function show($id){
        $user = Tank::where('id',$id)->first();
                      
        return view('admin.tanks.show', compact('user'));
    }

    public function edit($id){
        $user = Tank::where('id', '=',$id)->first();
        return view('admin.tanks.edit', compact('user','id'));
    }

    public function update(Request $request, $id){
       $input = $request->all();
        $validatedData = $request->validate([
            'name' => 'required',
            'name' => [
                              'required',
                              Rule::unique('tanks', 'name')->ignore($id),
                            ]
        ]);
 

        $updateHotalInfo = array(
            'name' => $input['name']
        );
        Tank::where('id',$id)->update($updateHotalInfo);
       
          return redirect()->route('admin.settings')
            ->with('success', 'Tank Information Updated Successfully!!');
    }

    public function deleteTank(Request $request,$id){
        $product = \DB::table('tanks')->where('id', $id)->delete();
        if (!$product) {
            return redirect()->back()->with('error', 'Tank not found.');
        }
        return redirect()->route('admin.settings')->with('success', 'Tank deleted successfully.');
    }
}