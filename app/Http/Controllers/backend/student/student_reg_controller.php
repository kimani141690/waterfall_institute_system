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

class student_reg_controller extends Controller
{
    public function student_reg_view(){
        $data['courses'] = student_course::all();
        $data['years'] = student_year::all();

        $data['year_id'] = student_year::orderBy('id','desc')->first()->id;
        $data['course_id'] = student_course::orderBy('id','desc')->first()->id;
        // dd($data['course_id']);

        $data['all_data'] = assign_student::where('year_id',$data['year_id'])->where('course_id',$data['course_id'])->get();
        
        return view('backend.student.student_reg.student_view',$data);
    }

    public function student_reg_add(){
        $data['courses'] = student_course::all();
        $data['years'] = student_year::all();
        $data['groups'] = student_group::all();
        $data['shifts'] = student_shift::all();

        return view('backend.student.student_reg.student_add',$data);
    }

    public function student_reg_store(Request $request){
        DB::transaction(function() use($request){
            // $check_year = student_year::find($request->year_id)->name;
            $student = User::where('user_type','student')->orderBy('id','DESC')->first();
    
            if ($student == null) {
                $first_reg = 101;
                $student_id = $first_reg+1;
                if ($student_id < 1010) {
                    $id_no = '000'.$student_id;
                }elseif ($student_id < 10100) {
                    $id_no = '00'.$student_id;
                }elseif ($student_id < 101000) {
                    $id_no = '0'.$student_id;
                }
            }else{
         $student = User::where('user_type','student')->orderBy('id','DESC')->first()->id;
             $student_id = $student+1;
             if ($student_id < 10) {
                    $id_no = '000'.$student_id;
                }elseif ($student_id < 100) {
                    $id_no = '00'.$student_id;
                }elseif ($student_id < 1000) {
                    $id_no = '0'.$student_id;
                }
    
            } // end else 
    
            // $final_id_no = $check_year.$id_no;
            $final_id_no = $id_no;
            $user = new User();
            $code = rand(0000,9999);
            $user->id_no = $final_id_no;
            $user->password = bcrypt($code);
            $user->user_type = 'student';
            $user->code = $code;
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d',strtotime($request->dob));
    
            if ($request->file('image')) {
                $file = $request->file('image');
                $file_name = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/student_images'),$file_name);
                $user['image'] = $file_name;
            }
             $user->save();
    
              $assign_student = new assign_student();
              $assign_student->student_id = $user->id;
              $assign_student->year_id = $request->year_id;
              $assign_student->course_id = $request->course_id;
              $assign_student->group_id = $request->group_id;
              $assign_student->shift_id = $request->shift_id;
              $assign_student->save();
    
              $discount_student = new discount_student();
              $discount_student->assign_student_id = $assign_student->id;
              $discount_student->fee_category_id = '1';
              $discount_student->discount = $request->discount;
              $discount_student->save();
    
            });
    
    
            $notification = array(
                'message' => 'Student registered successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->route('student.registration.view')->with($notification);
    
        } // End Method 

        public function student_course_year(Request $request){

            $data['courses'] = student_course::all();
            $data['years'] = student_year::all();
    
            $data['year_id'] = $request->year_id;
            $data['course_id'] = $request->course_id;
            // dd($data['course_id']);
    
            $data['all_data'] = assign_student::where('year_id',$request->year_id)->where('course_id',$request->course_id)->get();
            
            return view('backend.student.student_reg.student_view',$data);

        }

        public function student_reg_edit($student_id){
        $data['courses'] = student_course::all();
        $data['years'] = student_year::all();
        $data['groups'] = student_group::all();
        $data['shifts'] = student_shift::all();

        $data['edit_data'] = assign_student::with(['student','discount'])->where('student_id',$student_id)->first();
        // dd($data['edit_data']->toArray());

        return view('backend.student.student_reg.student_edit',$data);

        }

        public function student_reg_update(Request $request, $student_id){
            DB::transaction(function() use($request,$student_id){
              
        
               
        
                $user =User::where('id',$student_id)->first();          
           
                $user->name = $request->name;
                $user->fname = $request->fname;
                $user->mname = $request->mname;
                $user->mobile = $request->mobile;
                $user->address = $request->address;
                $user->gender = $request->gender;
                $user->religion = $request->religion;
                $user->dob = date('Y-m-d',strtotime($request->dob));
        
                if ($request->file('image')) {
                    $file = $request->file('image');
                    @unlink(public_path('upload/student_images/'.$user->image));
                    $file_name = date('YmdHi').$file->getClientOriginalName();
                    $file->move(public_path('upload/student_images'),$file_name);
                    $user['image'] = $file_name;
                }
                 $user->save();
        
                  $assign_student = assign_student::where('id',$request->id)->where('student_id',$student_id)->first();
               
                  $assign_student->year_id = $request->year_id;
                  $assign_student->course_id = $request->course_id;
                  $assign_student->group_id = $request->group_id;
                  $assign_student->shift_id = $request->shift_id;
                  $assign_student->save();
        
                  $discount_student = discount_student::where('assign_student_id',$request->id)->first();
                  $discount_student->discount = $request->discount;
                  $discount_student->save();
        
                });
        
        
                $notification = array(
                    'message' => 'Student registration updated successfully.',
                    'alert-type' => 'success'
                );
        
                return redirect()->route('student.registration.view')->with($notification);
        

        }
        public function student_reg_promotion($student_id){

            $data['courses'] = student_course::all();
            $data['years'] = student_year::all();
            $data['groups'] = student_group::all();
            $data['shifts'] = student_shift::all();
    
            $data['edit_data'] = assign_student::with(['student','discount'])->where('student_id',$student_id)->first();
            // dd($data['edit_data']->toArray());
    
            return view('backend.student.student_reg.student_promotion',$data);
        }

        public function student_update_promotion(Request $request,$student_id){
            DB::transaction(function() use($request,$student_id){
              
        
               
        
                $user =User::where('id',$student_id)->first();          
           
                $user->name = $request->name;
                $user->fname = $request->fname;
                $user->mname = $request->mname;
                $user->mobile = $request->mobile;
                $user->address = $request->address;
                $user->gender = $request->gender;
                $user->religion = $request->religion;
                $user->dob = date('Y-m-d',strtotime($request->dob));
        
                if ($request->file('image')) {
                    $file = $request->file('image');
                    @unlink(public_path('upload/student_images/'.$user->image));
                    $file_name = date('YmdHi').$file->getClientOriginalName();
                    $file->move(public_path('upload/student_images'),$file_name);
                    $user['image'] = $file_name;
                }
                 $user->save();
        
                  $assign_student = new assign_student();
               
                  $assign_student->student_id = $student_id;
                  $assign_student->year_id = $request->year_id;
                  $assign_student->course_id = $request->course_id;
                  $assign_student->group_id = $request->group_id;
                  $assign_student->shift_id = $request->shift_id;
                  $assign_student->save();
        
                  $discount_student = new discount_student;
                  $discount_student->assign_student_id = $assign_student->id;
                  $discount_student->fee_category_id = '1';
                  $discount_student->discount = $request->discount;
                  $discount_student->save();
        
                });
        
        
                $notification = array(
                    'message' => 'Student promoted successfully.',
                    'alert-type' => 'success'
                );
        
                return redirect()->route('student.registration.view')->with($notification);

        }

        public function student_reg_details($student_id){
            $data['details'] = assign_student::with(['student','discount'])->where('student_id',$student_id)->first();

            $pdf = PDF::loadView('backend.student.student_reg.student_details_pdf', $data);
            return $pdf->download('student_details.pdf');


        }

        
       

    }
