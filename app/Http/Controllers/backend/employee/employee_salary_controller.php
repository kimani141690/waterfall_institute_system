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

class employee_salary_controller extends Controller
{
    public function salary_view(){
        $data['all_data'] = User::where('user_type','employee')->get();
        return view('backend.employee.employee_salary.employee_salary_view',$data);

    }

    public function salary_increment($id){
        $data['edit_data'] = User::find($id);
        return view('backend.employee.employee_salary.employee_salary_increment',$data);


    }
    public function update_increment(Request $request,$id){
        $user = User::find($id);
        $previous_salary = $user->salary;
        $present_salary = (float)$previous_salary+(float)$request->increment_salary; 
    	$user->salary = $present_salary;
    	$user->save();

    	$salaryData = new employee_salary_log();
    	$salaryData->employee_id = $id;
    	$salaryData->previous_salary = $previous_salary;
    	$salaryData->increment_salary = $request->increment_salary;
    	$salaryData->present_salary = $present_salary;
    	$salaryData->effected_salary = date('Y-m-d',strtotime($request->effected_salary));
    	$salaryData->save();

    	$notification = array(
    		'message' => 'Employee salary increment successfull.',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('employee.salary.view')->with($notification);
    }
}
