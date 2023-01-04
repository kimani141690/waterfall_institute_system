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


use App\Models\student_attendance;

class student_attendance_controller extends Controller
{
    public function attendance_view(){
        // $data['all_data'] = student_attendance::orderBy('id','desc')->get();
        $data['all_data'] = student_attendance::select('date')->groupBy('date')->orderBy('id','DESC')->get();

        return view('backend.student.student_attendance.student_attendance_view',$data);
    }

    public function attendance_add(){
        $data['students'] = User::where('user_type','student')->get();
    	return view('backend.student.student_attendance.student_attendance_add',$data);
    }

    public function attendance_store(Request $request){
        student_attendance::where('date', date('Y-m-d', strtotime($request->date)))->delete();
         $countstudent = count($request->student_id);
         for ($i=0; $i <$countstudent ; $i++) { 
             $attendance_status = 'attendance_status'.$i;
             $attend = new student_attendance();
             $attend->date = date('Y-m-d',strtotime($request->date));
             $attend->student_id = $request->student_id[$i];
             $attend->attendance_status = $request->$attendance_status;
             $attend->save();
         } // end For Loop
 
          $notification = array(
             'message' => 'Student attendance data updateds successfully!',
             'alert-type' => 'success'
         );
 
         return redirect()->route('student.attendance.view')->with($notification);
 
     }
     
     public function attendance_edit($date){
        $data['edit_data'] = student_attendance::where('date',$date)->get();
    	$data['students'] = User::where('user_type','student')->get();
    	return view('backend.student.student_attendance.student_attendance_edit',$data);

    }

    public function attendance_details($date){
    	$data['details'] = student_attendance::where('date',$date)->get();
    	return view('backend.student.student_attendance.student_attendance_details',$data);

    }
}
