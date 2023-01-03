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


class employee_reg_controller extends Controller
{
    public function employee_view(){
        $data['all_data'] = User::where('user_type','employee')->get();
        return view('backend.employee.employee_reg.employee_view',$data);

    }

    public function employee_add(){

        $data['designation']= designation::all();
        return view('backend.employee.employee_reg.employee_add',$data);

    }

    public function employee_store(Request $request){
        DB::transaction(function() use($request){
            $check_year =date('Ym',strtotime($request->join_date));
            // dd($check_year);
            $employee = User::where('user_type','employee')->orderBy('id','DESC')->first();
    
            if ($employee == null) {
                $first_reg = 101;
                $employee_id = $first_reg+1;
                if ($employee_id < 10) {
                    $id_no = '000'.$employee_id;
                }elseif ($employee_id < 100) {
                    $id_no = '00'.$employee_id;
                }elseif ($employee_id < 1000) {
                    $id_no = '0'.$employee_id;
                }
            }else{
         $employee = User::where('user_type','employee')->orderBy('id','DESC')->first()->id;
             $employee_id = $employee+1;
             if ($employee_id < 10) {
                    $id_no = '000'.$employee_id;
                }elseif ($employee_id < 100) {
                    $id_no = '00'.$employee_id;
                }elseif ($employee_id < 1000) {
                    $id_no = '0'.$employee_id;
                }
    
            } // end else 
    
            $final_id_no = $check_year.$id_no;
            $user = new User();
            $code = rand(0000,9999);
            $user->id_no = $final_id_no;
            $user->password = bcrypt($code);
            $user->user_type = 'employee';
            $user->code = $code;
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->salary = $request->salary;
            $user->designation_id = $request->designation_id;
            $user->dob = date('Y-m-d',strtotime($request->dob));
            $user->join_date = date('Y-m-d',strtotime($request->join_date));
    
            if ($request->file('image')) {
                $file = $request->file('image');
                $file_name = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/employee_images'),$file_name);
                $user['image'] = $file_name;
            }
             $user->save();
    
              $employee_salary = new employee_salary_log();
              $employee_salary->employee_id = $user->id;
              $employee_salary->effected_salary = date('Y-m-d',strtotime($request->join_date));
              $employee_salary->previous_salary = $request->salary;
              $employee_salary->present_salary = $request->salary;
              $employee_salary->increment_salary ='0';
              $employee_salary->save();
    
              
            });
    
    
            $notification = array(
                'message' => 'Employee registered successfully.',
                'alert-type' => 'success'
            );
    
            return redirect()->route('employee.registration.view')->with($notification);
    


    } // End method

    public function employee_edit($id){
        $data['edit_data'] = User::find($id);
        $data['designation']= designation::all();
        return view('backend.employee.employee_reg.employee_edit',$data);

    }

    public function employee_update(Request $request, $id){
       
    
            
            $user = User::find($id);
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->designation_id = $request->designation_id;
            $user->dob = date('Y-m-d',strtotime($request->dob));
    
            if ($request->file('image')) {
                $file = $request->file('image');
                @unlink(public_path('upload/employee_images/'.$user->image));
                $file_name = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/employee_images'),$file_name);
                $user['image'] = $file_name;
            }
             $user->save();   
    
    
            $notification = array(
                'message' => 'Employee updated successfully.',
                'alert-type' => 'success'
            );
    
            return redirect()->route('employee.registration.view')->with($notification);
    


    }
    public function employee_details($id){
        $data['details'] = User::find($id);
        
        $pdf = PDF::loadView('backend.employee.employee_reg.employee_details_pdf', $data);
        return $pdf->download('employee_details.pdf');


    }
}
