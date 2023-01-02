<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\course_unit;
use App\Models\student_course;
use App\Models\student_year;

class course_unit_controller extends Controller
{
    public function view_student_unit(){

       
        // $data['all_data'] = course_unit::all();
        $data['all_data'] = course_unit::select('course_id')->groupBy('course_id')->get();
        return view('backend.setup.course_unit.view_course_unit',$data);
        
    }

    public function add_student_unit(){
        $data['courses'] = student_course::all();
        $data['years'] = student_year::all();

        return view('backend.setup.course_unit.add_course_unit',$data);
    }

    public function store_student_unit(Request $request){
        $count_year = count($request->year_id);
    	if ($count_year !=NULL) {
    		for ($i=0; $i <$count_year ; $i++) { 
    			$course_unit = new course_unit();
                $course_unit->course_id = $request->course_id;
    			$course_unit->year_id = $request->year_id[$i];
    			$course_unit->unit = $request->unit[$i];
    			$course_unit->save();

    		} // End For Loop
    	}// End If Condition

    	$notification = array(
    		'message' => 'Unit added successfully.',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('student.unit.view')->with($notification);

    }

    public function edit_student_unit($course_id){
        $data['edit_data'] = course_unit::where('course_id',$course_id)->orderBy('year_id','asc')->get();
    	// dd($data['edit_data']->toArray());
    	$data['courses'] = student_course::all();
    	$data['years'] = student_year::all();
    	return view('backend.setup.course_unit.edit_course_unit',$data);
    }

    public function update_student_unit(Request $request, $course_id){

		if ($request->year_id == NULL) {
       
			$notification = array(
				'message' => 'Sorry you did not select any unit.',
				'alert-type' => 'error'
			);
	
			return redirect()->route('course.unit.edit',$course_id)->with($notification);
				 
			}else{
				 
		$count_year = count($request->year_id);
		course_unit::where('course_id',$course_id)->delete(); 
				for ($i=0; $i <$count_year ; $i++) { 
					$course_unit = new course_unit();
					$course_unit->course_id = $request->course_id;
					$course_unit->year_id = $request->year_id[$i];
					$course_unit->unit = $request->unit[$i];
					$course_unit->save();
	
				} // End For Loop	 
	
			}// end Else
	
		   $notification = array(
				'message' => 'Data updated successfully.',
				'alert-type' => 'success'
			);
	
			return redirect()->route('student.unit.view')->with($notification);

	}

    public function details_student_unit($course_id){
        $data['details_data'] = course_unit::where('course_id',$course_id)->orderBy('year_id','asc')->get();

        return view('backend.setup.course_unit.details_course_unit',$data);
    }
}


