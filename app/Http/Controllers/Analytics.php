<?php

namespace App\Http\Controllers;

use App\FinishOrder;

use Illuminate\Http\Request;

use DB;

class Analytics extends Controller
{
    //
    public function YearlySales(){
    	/*$yearlySales = FinishOrder::select(
            DB::raw('sum(total) as sums'), 
            DB::raw("DATE_FORMAT(delivered_at,'%m') as monthKey")
  		)
  		->whereYear('delivered_at', date('Y'))
  		->groupBy('monthKey')
  		->orderBy('delivered_at', 'ASC')
  		->get();

  		return $yearlySales;*/

  		$users = DB::select('SELECT YEAR(delivered_at) as year, SUM(total) as sums FROM finish_orders GROUP BY YEAR(delivered_at)');



  		return view('admin.index', compact('users'));

		//return $orders;
    }

}
