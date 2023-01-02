<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\assign_unit;
use App\Models\student_course;
use App\Models\course_unit;
use App\Models\student_year;

class assign_unit_controller extends Controller
{
    public function view_assign_unit(){
        //    $data['all_data'] = assign_unit::all();
           $data['all_data'] = assign_unit::select('course_id')->groupBy('course_id')->get();
           return view('backend.setup.assign_unit.view_assign_unit',$data);
    }

    public function add_assign_unit(){
        $data['courses'] = student_course::all();
        $data['years'] = student_year::all();
        $data['units'] = course_unit::all();


        return view('backend.setup.assign_unit.add_assign_unit',$data);
    }

    public function store_assign_unit(Request $request){
        $count_year = count($request->year_id);
    	if ($count_year !=NULL) {
    		for ($i=0; $i <$count_year ; $i++) { 
    			$assign_unit = new assign_unit();
    			$assign_unit->course_id = $request->course_id;
    			$assign_unit->year_id = $request->year_id[$i];
    			$assign_unit->unit_id = $request->unit_id[$i];
    			$assign_unit->full_mark = $request->full_mark[$i];
    			$assign_unit->pass_mark = $request->pass_mark[$i];
    			$assign_unit->subjective_mark = $request->subjective_mark[$i];
    			$assign_unit->save();

    		} // End For Loop
    	}// End If Condition

    	$notification = array(
    		'message' => 'Unit assigned successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('assign.unit.view')->with($notification);
    }

    public function edit_assign_unit($course_id){
        $data['edit_data'] = assign_unit::where('course_id',$course_id)->orderBy('unit_id','asc')->get();
    	// dd($data['edit_data']->toArray());
        $data['courses'] = student_course::all();
        $data['years'] = student_year::all();
        $data['units'] = course_unit::all();

    	return view('backend.setup.assign_unit.edit_assign_unit',$data);
    }
}
