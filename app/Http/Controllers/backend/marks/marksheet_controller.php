<?php

namespace App\Http\Controllers\backend\marks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\student_marks;
use App\Models\exam_type;
use App\Models\student_course;
use App\Models\student_year;
use App\Models\marks_grade;
use App\Models\assign_student;

class marksheet_controller extends Controller
{
    public function marksheet_view()
    {

        $data['years'] = student_year::orderBy('id', 'desc')->get();
        $data['courses'] = student_course::all();
        $data['exam_type'] = exam_type::all();
        return view('backend.marks.marksheet_view', $data);
    }

    public function marksheet_get(Request $request)
    {
        $year_id = $request->year_id;
        $course_id = $request->course_id;
        $exam_type_id = $request->exam_type_id;
        $id_no = $request->id_no;

        $count_fail = student_marks::where('year_id', $year_id)->where('course_id', $course_id)->where('exam_type_id', $exam_type_id)->where('id_no', $id_no)->where('marks', '<', '33')->get()->count();
        // dd($count_fail);
        $singleStudent = student_marks::where('year_id', $year_id)->where('course_id', $course_id)->where('exam_type_id', $exam_type_id)->where('id_no', $id_no)->first();
        if ($singleStudent == true) {

            $allMarks = student_marks::with(['assign_unit', 'year'])->where('year_id', $year_id)->where('course_id', $course_id)->where('exam_type_id', $exam_type_id)->where('id_no', $id_no)->get();
         // dd($allMarks->toArray());
            
            $allGrades = marks_grade::all();
            return view('backend.marks.marksheet_pdf', compact('allMarks', 'allGrades', 'count_fail'));
        } else {

            $notification = array(
                'message' => 'Sorry These Criteria Does not match',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }
    }
}
