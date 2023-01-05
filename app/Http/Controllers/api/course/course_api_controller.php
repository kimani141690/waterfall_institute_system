<?php

namespace App\Http\Controllers\api\course;

use App\Http\Controllers\Controller;
use App\Models\student_course;
use Illuminate\Http\Request;

class course_api_controller extends Controller
{
    public function all_courses()
    {
        $data['all_data'] = student_course::all();
        return $data;
    }

    public function add_course(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:student_courses,name',
        ]);

        $data = new student_course();
        $data->name = $request->name;
        $data->course_code = $request->course_code;
        $data->save();

        return $data;
    }

    public function find_course(Request $req)
    {
        $course = student_course::find($req->id);

        if ($course) {
            return $course;
        } else {
            return "Course Not Found";
        }
    }

    public function update_course(Request $req)
    {
        $data = student_course::find($req->id);


        $req->validate([
            'name' => 'required|unique:student_courses,name,' . $data->id
        ]);

        $data->name = $req->name;
        $data->course_code = $req->course_code;
        $data->save();

        return $data;
    }

    public function delete_course(Request $req)
    {
        $course = student_course::find($req->id);
        $course_name = $course->name;
        $course->delete();

        return $course_name." deleted";
    }
}
