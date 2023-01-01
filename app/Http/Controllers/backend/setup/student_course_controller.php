<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\student_course;

class student_course_controller extends Controller
{
    public function view_student()
    {
        $data['all_data'] = student_course::all();
        return view('backend.setup.student_course.view_course', $data);
    }

    public function student_course_add()
    {
        return view('backend.setup.student_course.add_course');
    }

    public function student_course_store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:student_courses,name',
        ]);

        $data = new student_course();
        $data->name = $request->name;
        $data->course_code = $request->course_code;
        $data->save();

        $notification = array(
            'message' => 'Course added successfully.',
            'alert-type' => 'success'
        );

        return redirect()->route('student.course.view')->with($notification);
    }

    public function student_course_edit($id)
    {
        $edit_data = student_course::find($id);
        return view('backend.setup.student_course.edit_course', compact('edit_data'));
    }

    public function student_course_update(Request $request, $id)
    {
        $data = student_course::find($id);


        $validatedData = $request->validate([
            'name' => 'required|unique:student_courses,name,' . $data->id
        ]);

        $data->name = $request->name;
        $data->course_code = $request->course_code;
        $data->save();

        $notification = array(
            'message' => 'Course updated successfully.',
            'alert-type' => 'success'
        );

        return redirect()->route('student.course.view')->with($notification);
    }

    public function student_course_delete($id){
        $user = student_course::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Course deleted successfully.',
            'alert-type' => 'info'
        );

        return redirect()->route('student.course.view')->with($notification);
    }
}
