<?php

namespace App\Http\Controllers\backend;

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


class default_controller extends Controller
{
    public function get_unit(Request $request){
        $course_id = $request->course_id;
    	$all_data = assign_unit::with(['student_unit'])->where('course_id',$course_id)->get();
    	return response()->json($all_data);

    }

    public function get_students(Request $request){
        $year_id = $request->year_id;
    	$course_id = $request->course_id;
    	$all_data = assign_student::with(['student'])->where('year_id',$year_id)->where('course_id',$course_id)->get();
    	return response()->json($all_data);

    }
}
