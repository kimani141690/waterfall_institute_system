<?php

namespace App\Http\Controllers\backend\employee;

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

use App\Models\employee_salary_log;
use App\Models\designation;

use App\Models\employee_leave_purpose;
use App\Models\employee_leave;

use App\Models\employee_attendance;

class employee_attendance_controller extends Controller
{
    public function attendance_view(){
        // $data['all_data'] = employee_attendance::orderBy('id','desc')->get();
        $data['all_data'] = employee_attendance::select('date')->groupBy('date')->orderBy('id','DESC')->get();
        return view('backend.employee.employee_attendance.employee_attendance_view',$data);
    }

    public function attendance_add(){
        $data['employees'] = User::where('user_type','employee')->get();
    	return view('backend.employee.employee_attendance.employee_attendance_add',$data);

    }
    public function attendance_store(Request $request){
       employee_attendance::where('date', date('Y-m-d', strtotime($request->date)))->delete();
    	$countemployee = count($request->employee_id);
    	for ($i=0; $i <$countemployee ; $i++) { 
    		$attendance_status = 'attendance_status'.$i;
    		$attend = new employee_attendance();
    		$attend->date = date('Y-m-d',strtotime($request->date));
    		$attend->employee_id = $request->employee_id[$i];
    		$attend->attendance_status = $request->$attendance_status;
    		$attend->save();
    	} // end For Loop

 		$notification = array(
    		'message' => 'Employee attendance data updateds successfully!',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('employee.attendance.view')->with($notification);

    }
    public function attendance_edit($date){
        $data['edit_data'] = employee_attendance::where('date',$date)->get();
    	$data['employees'] = User::where('user_type','employee')->get();
    	return view('backend.employee.employee_attendance.employee_attendance_edit',$data);

    }

    public function attendance_details($date){
    	$data['details'] = employee_attendance::where('date',$date)->get();
    	return view('backend.employee.employee_attendance.employee_attendance_details',$data);

    }
}
