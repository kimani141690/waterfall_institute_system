<?php

namespace App\Http\Controllers\backend\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\assign_student;
use App\Models\discount_student;
use App\Models\fee_category_amount;
use App\Models\student_course;
use App\Models\student_group;
use App\Models\student_shift;
use App\Models\student_year;
use Illuminate\Support\Facades\DB;
use PDF;

class semester_fee_controller extends Controller
{
    public function semester_fee_view(){
        $data['courses'] = student_course::all();
        $data['years'] = student_year::all();

        return view('backend.student.semester_fee.semester_fee_view',$data);


    }
    public function sem_fee_course_data(Request $request){
        $course_id = $request->course_id;
        $year_id = $request->year_id;
        if ($year_id !='') {
            $where[] = ['year_id','like',$year_id.'%'];
        }
        if ($course_id !='') {
            $where[] = ['course_id','like',$course_id.'%'];
        }
        $all_student = assign_student::with(['discount'])->where($where)->get();
        // dd($allStudent);
        $html['thsource']  = '<th>SL</th>';
        $html['thsource'] .= '<th>ID No</th>';
        $html['thsource'] .= '<th>Student Name</th>';
        $html['thsource'] .= '<th>Roll No</th>';
        $html['thsource'] .= '<th>Semester Fee</th>';
        $html['thsource'] .= '<th>Discount </th>';
        $html['thsource'] .= '<th>Student Fee </th>';
        $html['thsource'] .= '<th>Action</th>';


        foreach ($all_student as $key => $v) {
            $registrationfee = fee_category_amount::where('fee_category_id','2')->where('course_id',$v->course_id)->first();
            $color = 'success';
            $html[$key]['tdsource']  = '<td>'.($key+1).'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['student']['id_no'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['student']['name'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v->roll.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$registrationfee->amount.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['discount']['discount'].'%'.'</td>';
            
            $originalfee = $registrationfee->amount;
            $discount = $v['discount']['discount'];
            $discounttablefee = $discount/100*$originalfee;
            $finalfee = (float)$originalfee-(float)$discounttablefee;

            $html[$key]['tdsource'] .='<td>'.'Ksh '.$finalfee.'</td>';
            $html[$key]['tdsource'] .='<td>';
            $html[$key]['tdsource'] .='<a class="btn btn-sm btn-'.$color.'" title="PaySlip" target="_blanks" href="'.route("student.semester.fee.payslip").'?course_id='.$v->course_id.'&student_id='.$v->student_id.'&semester='.$request->semester.'">Fee Slip</a>';
            $html[$key]['tdsource'] .= '</td>';

        }  
       return response()->json(@$html);

    }

    public function sem_fee_payslip(Request $request){
        $student_id= $request->student_id;
    $course_id = $request->course_id;
    $data['semester'] = $request->semester;

    $data['details'] = assign_student::with(['student','discount'])->where('student_id',$student_id)->where('course_id',$course_id)->first();
    
    $pdf = PDF::loadView('backend.student.semester_fee.semester_fee_pdf', $data);
    return $pdf->download('semester_fee.pdf');

    }
}
