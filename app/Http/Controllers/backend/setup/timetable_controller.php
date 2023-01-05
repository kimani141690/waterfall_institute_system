<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use App\Models\course_unit;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class timetable_controller extends Controller
{
    public function create_class()
    {
        if (auth()->user()->user_type != 'admin') {
            abort(403, 'Forbidden!!!');
        }
        $units = course_unit::all();
        return view('admin.class.create', ['units' => $units]);
    }
    public function store_class(Request $request)
    {
        if (auth()->user()->user_type != 'admin') {
            abort(403, 'Forbidden!!!');
        }
        $data = $request->validate([
            'units_list_id' => 'required',
            'course' => 'required',
            'semester' => 'required',


        ]);

        $unit = course_unit::create($data);

        $unitId = $data['units_list_id'];

        $school = DB::table('units_lists')->select('school_id')->where('id', $unitId)->pluck('school_id');


        $unit_id = $unit['id'];

        $lecturers = DB::table('lecturers')->where('school_id', $school)
            ->join('users', 'lecturers.lecturer_id', '=', 'users.id')->select('users.id', 'users.name')
            ->get();

        return view('admin.class.create2', ['lecturers' => $lecturers, 'unit_id' => $unit_id]);
    }

    public function store_classroom(Request $request)
    {
        if (auth()->user()->user_type != 'admin') {
            abort(403, 'Forbidden!!!');
        }

        $class = $request->validate([
            'lecturer_id' => 'required',
            'units_id' => 'required',
            'weekday' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        // return $class    ;

        Lesson::create($class);


        return redirect('/admin')->with('message', 'Class created successfully');
    }
}
