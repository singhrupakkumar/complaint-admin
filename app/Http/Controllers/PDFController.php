<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\User;
use PDF;
use App\Models\Complain;
use App\Models\RejDepartment;
use Carbon\Carbon;
  
class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF(Request $request)
    {

        $department = new RejDepartment();
        $complain = Complain::with('rejdept');
        

		if ($request->from_date != null) {
              $complain = $complain->whereDate('rej_date', '>=', Carbon::parse($request->from_date))->whereDate('rej_date', '<=', Carbon::parse($request->to_date));
        }
		
		if ($request->rej_dept_id != null) {
              $complain = $complain->where('rej_dept_id',$request->rej_dept_id);
			  $department = $department->where('id',$request->rej_dept_id);
        }
		
		if ($request->category != null) {
              $complain = $complain->where('category',$request->category);
			  $department = $department->where('category',$request->category);
        }
		
		$complain = $complain->get();
		$department = $department->groupBy('category')->orderBy('category', 'asc')->get();
		
		$complainArray = [] ;
		if($complain->isNotEmpty()){
			foreach($complain as $ke => $complainlist){
				$complainArray[$complainlist->rej_dept_id][] = $complainlist;
			}
		}

        $data = [
            'title' => $request->rejectedbase==1?'REJECTED BASES':'CATEGORY REJECTED BASES',
            'date' => date('d/m/Y'),
            'complain' => $complainArray,
			'from_date' =>date('d/m/Y',strtotime($request->from_date)),
			'to_date' => date('d/m/Y',strtotime($request->to_date)),
			'cfrom_date' =>$request->from_date,
			'cto_date' => $request->to_date,
			'category' =>$request->category,
			'rej_dept_id' => $request->rej_dept_id,
            'department' => $department
        ];



        if($request->rejectedbase){
          $pdf = PDF::loadView('reportPdf', $data)->setPaper('a3', 'landscape')->setWarnings(false);
        }else{
          $pdf = PDF::loadView('catWisePdf', $data)->setPaper('a3', 'landscape')->setWarnings(false);
        } 
            
        
       
     	return $pdf->stream();
       // return $pdf->download('itsolutionstuff.pdf');
    }
}