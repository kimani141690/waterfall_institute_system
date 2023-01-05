<?php

namespace App\Http\Controllers\api\user;

use App\Http\Controllers\Controller;
use App\Models\assign_student;
use App\Models\assign_unit;
use Illuminate\Http\Request;

class default_api_controller extends Controller
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
