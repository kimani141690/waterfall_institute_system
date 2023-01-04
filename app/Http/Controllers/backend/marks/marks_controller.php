<?php

namespace App\Http\Controllers\backend\marks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\assign_student;
use App\Models\discount_student;
use App\Models\student_course;
use App\Models\exam_type;
use App\Models\student_group;
use App\Models\student_shift;
use App\Models\student_year;
use Illuminate\Support\Facades\DB;
use PDF;

use App\Models\student_marks;
use App\Models\assign_unit;

class marks_controller extends Controller
{
    public function marks_add(){
        $data['courses'] = student_course::all();
        $data['years'] = student_year::all();
        $data['exam_types'] = exam_type::all();

        return view('backend.marks.marks_add',$data);
    }

    public function marks_store(Request $request){
        $studentcount = $request->student_id;
    	if ($studentcount) {
    		for ($i=0; $i <count($request->student_id) ; $i++) { 
    		$data = New student_marks();
    		$data->year_id = $request->year_id;
    		$data->course_id = $request->course_id;
    		$data->assign_unit_id = $request->assign_unit_id;
    		$data->exam_type_id = $request->exam_type_id;
    		$data->student_id = $request->student_id[$i];
    		$data->id_no = $request->id_no[$i];
    		$data->marks = $request->marks[$i];
    		$data->save();

    		} // end for loop
    	}// end if conditon

			$notification = array(
    		'message' => 'Student marks inserted successfully.',
    		'alert-type' => 'success'
    	);

    	return redirect()->back()->with($notification);


    }
}
