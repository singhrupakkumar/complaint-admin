<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\RejDepartment;
use App\Models\Complain;
use App\Models\Tank;
use App\Models\CustCode;
use App\Models\Setting;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
		$department = RejDepartment::groupBy('name')->orderBy('name', 'asc')->get();
		$sortby = $request->sort ? $request->sort : 'asc';
		$complain = Complain::with('rejdept');
		if ($request->rej_dept_id !== null) {
                $complain = $complain->where('rej_dept_id', $request->rej_dept_id);
        }
		
		if ($request->from_date != null) {
              $complain = $complain->whereDate('rej_date', '>=', Carbon::parse($request->from_date))->whereDate('rej_date', '<=', Carbon::parse($request->to_date));
        }
		
		$complain = $complain->orderBy('rej_date', $sortby)->paginate(10);
        return view('admin.dashboard', compact('complain','user','department'));
    }
	
	public function reports(Request $request)
    {
		$department = RejDepartment::groupBy('name')->orderBy('name', 'asc')->get();
        $user = Auth::user();
        return view('admin.reports', compact('user','department'));
    }
	
	public function settings(Request $request)
    {
        $user = Auth::user();
		$alluser = User::get();
		$department = RejDepartment::orderBy('name', 'asc')->get();
		$tank = Tank::orderBy('name', 'asc')->get();
		$custCode = CustCode::orderBy('code', 'asc')->get();
		$setting = Setting::where('id',1)->first();
        return view('admin.settings', compact('user','alluser','department','tank','custCode','setting'));  
    }
		
}