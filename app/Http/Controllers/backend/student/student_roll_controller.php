<?php

namespace App\Http\Controllers\backend\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\assign_student;
use App\Models\discount_student;
use App\Models\student_course;
use App\Models\student_group;
use App\Models\student_shift;
use App\Models\student_year;
use Illuminate\Support\Facades\DB;
use PDF;

class student_roll_controller extends Controller
{
    public function student_roll_view(){

        $data['courses'] = student_course::all();
        $data['years'] = student_year::all();

        return view('backend.student.roll_generate.roll_generate_view',$data);


            
    }

    public function getstudents(Request $request){
        // dd('ooookkk');
        $all_data = assign_student::with(['student'])->where('course_id',$request->course_id)->where('year_id',$request->year_id)->get();
        // dd($all_data->toArray());
        return response()->json($all_data);

    }

    public function student_roll_store(Request$request){

        $course_id = $request->course_id;
        $year_id = $request->year_id;

        if($request->student_id !=null){
for ($i=0; $i<count($request->student_id); $i++) {
    assign_student::where('course_id', $request->course_id)->where('year_id', $request->year_id)->where('student_id', $request->student_id[$i])->update(['roll'=>$request->roll[$i]]);
}
            }else{
                $notification = array(
                    'message' => 'Sorry there are no students in selected course and year.',
                    'alert-type' => 'error'
                );
        
                   return redirect()->back()->with($notification);
            

        } // End if condition
        $notification = array(
    		'message' => 'Well done, roll generated successfully.',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('roll.generate.view')->with($notification);



    } // End Method
}
