<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RejDepartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;
use Illuminate\Validation\Rule;

class DepartmentsController extends Controller
{
    public function index(Request $request)
    {
    
        return view('admin.departments.index');
    }
	
	
	public function create(){
        $cat = RejDepartment::get();
        return view('admin.departments.create', compact('cat'));
    }

    public function store(Request $request){
        $input = $request->all();
       /* $validatedData = $request->validate([
            'name' => 'required',
            'name' => 'required|unique:App\Models\RejDepartment,name'
        ]);*/
       
        $input['name'] = $input['name'];
        $input['category'] = $input['category'];  
        RejDepartment::create($input);
        
        return redirect()->route('admin.settings')->with('success', 'RejDepartment added successfully.');
    }

    public function show($id){
        $user = RejDepartment::where('id',$id)->first();
                      
        return view('admin.departments.show', compact('user'));
    }

    public function edit($id){
        $department = RejDepartment::where('id', '=',$id)->first();
        return view('admin.departments.edit', compact('department','id'));
    }

    public function update(Request $request, $id){
       $input = $request->all();
       /* $validatedData = $request->validate([
            'name' => 'required',
            'name' => [
                              'required',
                              Rule::unique('rej_departments', 'name')->ignore($id),
                            ]
        ]);*/
 

        $updateHotalInfo = array(
            'name' => $input['name'],
            'category' => $input['category']
        );
        RejDepartment::where('id',$id)->update($updateHotalInfo);
       
          return redirect()->route('admin.settings')
            ->with('success', 'RejDepartment Information Updated Successfully!!');
    }

    public function deleteDepartment(Request $request,$id){
        $product = \DB::table('rej_departments')->where('id', $id)->delete();
        if (!$product) {
            return redirect()->back()->with('error', 'RejDepartment not found.');
        }
        return redirect()->route('admin.settings')->with('success', 'RejDepartment deleted successfully.');
    }
	
	public function getDepartmentCat(Request $request){
        $department = RejDepartment::where('id',$request->rej_dept_id)->first();
		$departmentcat = RejDepartment::where('name', 'LIKE', '%' . $department->name . '%')->groupBy('category')->orderBy('category', 'asc')->get();
        return response()->json($departmentcat); 
    }
	
	
}