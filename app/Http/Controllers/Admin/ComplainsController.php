<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Complain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;
use Illuminate\Validation\Rule;
use App\Models\RejDepartment;
use App\Models\Tank;
use App\Models\CustCode;
use App\Models\User;
use URL,Validator;

class ComplainsController extends Controller
{
    public function index(Request $request)
    {
    
        return view('admin.complains.index');
    }
	
	
	public function create(){
	
		$department = RejDepartment::groupBy('name')->orderBy('name', 'asc')->get();
		$tank = Tank::orderBy('name', 'asc')->get();
		$custCode = CustCode::orderBy('code', 'asc')->get();
        return view('admin.complains.add', compact('department','tank','custCode')); 
    }

    public function store(Request $request){  
        $input = $request->all();
        $validatedData = $request->validate([
            //'title' => 'required',
			'orginator_name' => 'required',
			'rej_date' => 'required|date|after:prod_date',
			'prod_date' => 'required|date|before:rej_date',
			'prod_time' => 'required',
			'job_number' => 'required',
			'cir' => 'required',
			'length' => 'required',
			'cyl_number' => 'required',
			'mt' => 'required',
			'attachments' => 'max:1024'
           // 'title' => 'required|unique:App\Models\Complain,title'
        ]);
		
		$images = [] ;
		if ($request->hasFile('attachments')) {
			

			  $image = $request->file('attachments');
			  
			  foreach ($image as $files) {
				$imageName =   URL::to("/").'/attachments/'.time().$files->getClientOriginalName();
				$upload = $files->move(public_path('attachments'), $imageName); 
				$images[] = $imageName;
			  }
			
			
			
        }
		
		$input['title'] = $input['category'].' '.$input['prod_date'].' '.$input['prod_time'];  
		$input['attachments'] = json_encode($images);
        Complain::create($input);
		$allemails = User::where('is_email',1)->pluck('email')->toArray();
		$allemails = implode(',',$allemails);
		$to = $allemails ;
		$subject = "New Gravure Internal Complain.";

		$message = '<!doctypehtml><html xmlns=http://www.w3.org/1999/xhtml><meta content="text/html; charset=utf-8"http-equiv=Content-Type><meta content="IE=edge"http-equiv=X-UA-Compatible><meta content="width=device-width,initial-scale=1"name=viewport><title>CAPITOL GRAVURE CYLINDER SDN. BHD.</title><style></style><body style="background-color:#f2f2f2;margin:0;padding:40px 0;color:#484848;font-size:15px;font-weight:400"><table border=0 cellpadding=0 cellspacing=0 style=width:100%><tr><td><table border=0 cellpadding=0 cellspacing=0 style="max-width:600px;width:100%;margin:0 auto;background-color:#fff"><tr><td style=background-color:#0179ff;text-align:center><a href=#><img src=https://dev.twentyfirstgen.com/complaint-admin/public/attachments/1686849010capitol_gravure_logo.jpg width=120></a><tr><td style=padding-left:24px;padding-right:24px;padding-bottom:10px><h3 style=text-align:center>New Gravure Internal Complain.</h3><p>Title: <span style=font-weight:400;color:#0179ff>'.$request->title.'</span><p>Orginator Name: <span style=font-weight:400;color:#0179ff>'.$request->orginator_name.'</span><p>Complain Date: <span style=font-weight:400;color:#0179ff>'.date('d/m/Y').'</span><p>Prod Date: <span style=font-weight:400;color:#0179ff>'.date('d/m/Y',strtotime($request->prod_date)).'</span><p>Rej.Dept: <span style=font-weight:400;color:#0179ff>'.date('d/m/Y',strtotime($request->rej_date)).'</span><tr><td style=padding:24px;text-align:right><p style=font-weight:600;text-align:right;margin:0>Regards<p style=text-align:right;margin:0>Gravure Internal Complain<tr><td style=padding:24px;background-color:#0179ff><p style=text-align:center;color:#fff;font-size:12px>2023 © CAPITOL GRAVURE CYLINDER SDN. BHD.</table></table>';

		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		// More headers
		$headers .= 'From: <webmaster@example.com>' . "\r\n";
		//$headers .= 'Cc: rupak.bca111@gmail.com' . "\r\n";

		mail($to,$subject,$message,$headers);
        
        return redirect()->route('admin.dashboard')->with('success', 'Complain added successfully.');
    }

    public function show($id){
        $user = Complain::where('id',$id)->first();
                      
        return view('admin.complains.show', compact('user'));
    }

    public function edit($id){
        $complain = Complain::where('id', '=',$id)->first();
		$department = RejDepartment::groupBy('name')->orderBy('name', 'asc')->get();
		$tank = Tank::orderBy('name', 'asc')->get();
		$custCode = CustCode::orderBy('code', 'asc')->get();
        return view('admin.complains.edit', compact('complain','id','department','tank','custCode'));
    }

    public function update(Request $request, $id){
       $input = $request->all();

        $validatedData = $request->validate([
            //'title' => 'required',
			'rej_date' => 'required|date|after:prod_date',
			'prod_date' => 'required|date|before:rej_date'
           /* 'title' => [
						  'required',
						  Rule::unique('complains', 'title')->ignore($id),
						]*/
        ]);
		
		
		$fileNameToStore = [];
		if ($request->hasFile('attachments')) {

              $image = $request->file('attachments');
			  foreach ($image as $files) {
				  	  if($files->getSize() > 1000000){
						return redirect()->back()->with('error', 'File size not allow greater than 1 mb');
					  }
					   
				$imageName =   URL::to("/").'/attachments/'.time().$files->getClientOriginalName();
				$upload = $files->move(public_path('attachments'), $imageName); 
				$fileNameToStore[] = $imageName;
			  }
        }
        if($request->hasFile('attachments') != null){
            $hotalImg = $fileNameToStore;
        }else{
            $hotalImg = $request->oldProductImg;
        }
 

        $updateHotalInfo = array(
           // 'title' => $input['title'],
			'orginator_name' => $input['orginator_name'],
			'rej_dept_id' => $input['rej_dept_id'],
			'rej_date' => $input['rej_date'],
			'prod_date' => $input['prod_date'],
			'prod_time' => $input['prod_time'],
			'tank' => $input['tank'],
			'cust_code_id' => $input['cust_code_id'],
			'job_number' => $input['job_number'],
			'cir' => $input['cir'],
			'length' => $input['length'],
			'cyl_number' => $input['cyl_number'],
			'mt' => $input['mt'],
			'category' => $input['category'],
			'remarks' => $input['remarks'],
			'attachments' => isset($fileNameToStore) ?  json_encode($fileNameToStore) : $input['oldProductImg']
        );
        Complain::where('id',$id)->update($updateHotalInfo);
       
          return redirect()->route('admin.dashboard')
            ->with('success', 'Complain Information Updated Successfully!!');
    }

    public function deleteTank(Request $request,$id){
        $product = \DB::table('complains')->where('id', $id)->delete();
        if (!$product) {
            return redirect()->back()->with('error', 'Complain not found.');
        }
        return redirect()->route('admin.dashboard')->with('success', 'Complain deleted successfully.');
    }
}