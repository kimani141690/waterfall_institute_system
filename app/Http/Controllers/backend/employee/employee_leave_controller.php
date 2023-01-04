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

class employee_leave_controller extends Controller
{
    public function leave_view(){
        $data['all_data'] = employee_leave::orderBy('id','desc')->get();
        return view ('backend.employee.employee_leave.employee_leave_view',$data);
    }

    public function leave_add(){
        $data['employees']= User::where('user_type','employee')->get();
        $data['leave_purpose'] = employee_leave_purpose::all();
        return view('backend.employee.employee_leave.employee_leave_add',$data);
    }

    public function leave_store(Request $request){
        if ($request->leave_purpose_id == "0") {
    		$leavepurpose = new employee_leave_purpose();
    		$leavepurpose->name = $request->name;
    		$leavepurpose->save();
    		$leave_purpose_id = $leavepurpose->id;
    	}else{
    		$leave_purpose_id = $request->leave_purpose_id;
    	}

    	$data = new employee_leave();
    	$data->employee_id = $request->employee_id;
    	$data->leave_purpose_id = $leave_purpose_id;
    	$data->start_date = date('Y-m-d',strtotime($request->start_date));
    	$data->end_date = date('Y-m-d',strtotime($request->end_date));
    	$data->save();

    	$notification = array(
    		'message' => 'Employee leave data inserted successfully.',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('employee.leave.view')->with($notification);


    }

    public function leave_edit($id){
        $data['edit_data'] = employee_leave::find($id);
    	$data['employees'] = User::where('user_type','employee')->get();
    	$data['leave_purpose'] = employee_leave_purpose::all();
    	return view('backend.employee.employee_leave.employee_leave_edit',$data);
    }

    public function leave_update(Request $request,$id){

        if ($request->leave_purpose_id == "0") {
    		$leavepurpose = new employee_leave_purpose();
    		$leavepurpose->name = $request->name;
    		$leavepurpose->save();
    		$leave_purpose_id = $leavepurpose->id;
    	}else{
    		$leave_purpose_id = $request->leave_purpose_id;
    	}

    	$data = employee_leave::find($id);
    	$data->employee_id = $request->employee_id;
    	$data->leave_purpose_id = $leave_purpose_id;
    	$data->start_date = date('Y-m-d',strtotime($request->start_date));
    	$data->end_date = date('Y-m-d',strtotime($request->end_date));
    	$data->save();

    	$notification = array(
    		'message' => 'Employee Leave Data Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('employee.leave.view')->with($notification);

    }

    public function leave_delete($id){
        $leave = employee_leave::find($id);
    	$leave->delete();

    	$notification = array(
    		'message' => 'Employee Leave Data Deleted Successfully.',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('employee.leave.view')->with($notification);
    }
}
