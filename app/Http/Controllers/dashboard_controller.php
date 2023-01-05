<?php

namespace App\Http\Controllers;

use App\Models\course_unit;
use App\Models\student_course;
use Illuminate\Http\Request;
use App\Models\User;


class dashboard_controller extends Controller
{
    public function view_content(){
        $students= User::where('user_type','student')->count();
        $lecturers= User::where('user_type','lecturer')->count();
        $courses= student_course::count();
        $units= course_unit::count();
        return view('admin.index', compact('students','lecturers','courses','units'));
    }

    
}
