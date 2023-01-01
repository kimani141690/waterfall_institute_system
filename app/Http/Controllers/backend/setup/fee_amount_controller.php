<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\fee_category;
use App\Models\fee_category_amount;
use App\Models\student_course;

class fee_amount_controller extends Controller
{
    public function view_fee_amount(){

        // $data['all_data'] = fee_category_amount::all();
        $data['all_data'] = fee_category_amount::select('fee_category_id')->groupBy('fee_category_id')->get();
        return view('backend.setup.fee_amount.view_fee_amount',$data);
    }

    public function add_fee_amount(){
        $data['fee_categories'] = fee_category::all();
        $data['courses'] = student_course::all();

        return view('backend.setup.fee_amount.add_fee_amount',$data);
    }

    public function store_fee_amount(Request $request){

        $count_course = count($request->course_id);
    	if ($count_course !=NULL) {
    		for ($i=0; $i <$count_course ; $i++) { 
    			$fee_amount = new fee_category_amount();
    			$fee_amount->fee_category_id = $request->fee_category_id;
    			$fee_amount->course_id = $request->course_id[$i];
    			$fee_amount->amount = $request->amount[$i];
    			$fee_amount->save();

    		} // End For Loop
    	}// End If Condition

    	$notification = array(
    		'message' => 'Fee amount inserted successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('fee.amount.view')->with($notification);


    } // End store fee amount method

    public function edit_fee_amount($fee_category_id){

        $data['edit_data'] = fee_category_amount::where('fee_category_id',$fee_category_id)->orderBy('course_id','asc')->get();
    	// dd($data['edit_data']->toArray());
    	$data['fee_categories'] = fee_category::all();
    	$data['courses'] = student_course::all();
    	return view('backend.setup.fee_amount.edit_fee_amount',$data);

    }
}
