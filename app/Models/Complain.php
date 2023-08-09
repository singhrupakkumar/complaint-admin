<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Carbon\Carbon;
class Complain extends Model
{
    use HasFactory;
    protected $table = 'complains'; 
    protected $guarded = [];
    protected $dates = ['deleted_at'];
	
	public function rejdept() {
        return $this->belongsTo('App\Models\RejDepartment', 'rej_dept_id');
    }

    public function custcode() {
        return $this->belongsTo('App\Models\CustCode', 'cust_code_id');
    }

    public static function getCountByCatAndMonth($cat){

      $users = Complain::select('id', 'rej_date')->where('category',$cat)
        ->get()
        ->groupBy(function($date) {
            //return Carbon::parse($date->created_at)->format('Y'); // grouping by years
            return Carbon::parse($date->rej_date)->format('m'); // grouping by months
        });

        $usermcount = [];
        $userArr = [];

        foreach ($users as $key => $value) {
            $usermcount[(int)$key] = count($value);
        }

        for($i = 1; $i <= 12; $i++){
            if(!empty($usermcount[$i])){
                $userArr[$i] = $usermcount[$i];    
            }else{
                $userArr[$i] = 0;    
            }
        }
        return $userArr;

    }


}