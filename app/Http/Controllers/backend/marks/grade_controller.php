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
use App\Models\marks_grade;



class grade_controller extends Controller
{
    public function marks_grade_view(){

        $data['all_data'] = marks_grade::all();
    	return view('backend.marks.grade_marks_view',$data);

    }

    public function marks_grade_add(){
        return view('backend.marks.grade_marks_add');

    }

    public function marks_grade_store(Request $request){
        $data = new marks_grade();
    	$data->grade_name = $request->grade_name;
    	$data->grade_point = $request->grade_point;
    	$data->start_marks = $request->start_marks;
    	$data->end_marks = $request->end_marks;
    	$data->start_point = $request->start_point;
    	$data->end_point = $request->end_point;
    	$data->remarks = $request->remarks;
    	$data->save();

		$notification = array(
    		'message' => 'Grade Marks Inserted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('marks.entry.grade')->with($notification);

    }
}
