<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use App\Models\course_unit;
use App\Models\Lesson;
use App\Models\Room;
use App\Models\student_course;
use App\Services\CalendarService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class lesson_controller extends Controller
{
    public function view_lessons(CalendarService $calendarService)
    {

        $all_data = DB::table('lessons')
        ->join('users', 'lessons.lecturer_id', '=', 'users.id')
        ->join('course_units', 'lessons.course_unit_id', '=', 'course_units.id')
        ->join('rooms', 'lessons.room_id', '=', 'rooms.id')
        ->select('lessons.id as id', 'users.name as lecturer_name', 'course_units.unit as unit_name',
         'rooms.name as room_name', 'lessons.start_time as start_time', 'lessons.end_time as end_time', 'lessons.weekday as weekday')
        ->get();

        // dd($all_data);
        return view('backend.setup.lesson.view_lessons', ['all_data' => $all_data]);
    }

    public function course_select()
    {
        $data['courses'] = student_course::all();
        return view('backend.setup.lesson.course_select', $data);
    }

    public function add_lesson(Request $req)
    {
        $rooms = DB::table('rooms')->select("*")->get();
        $units = DB::table('course_units')
        ->where('course_id', '=', $req->course_id)
        ->get();
        $lecturers = DB::table('users')->where('user_type', 'lecturer')
            ->select('users.id', 'users.name')
            ->get();

        $weekDays = Lesson::WEEK_DAYS;

        return view('backend.setup.lesson.add_lesson', ['rooms' => $rooms, 'units' => $units, 'lecturers' => $lecturers, 'weekDays' => $weekDays]);
    }

    public function store_lesson(Request $request)
    {
        if (auth()->user()->user_type != 'admin') {
            abort(403, 'Forbidden!!!');
        }

        $data = $request->validate([
            'room_id' => 'required',
            'lecturer_id' => 'required',
            'course_unit_id' => 'required',
            'weekday' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $lesson = new Lesson();
        $lesson->room_id = $request->room_id;
        $lesson->lecturer_id = $request->lecturer_id;
        $lesson->course_unit_id = $request->course_unit_id;
        $lesson->weekday = $request->weekday;
        $lesson->start_time = $request->start_time;
        $lesson->end_time = $request->end_time;

        $lesson->save();

        $notification = array(
            'message' => 'Lesson added successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('lesson.view')->with($notification);
    }

    public function edit_lesson($id)
    {
        $edit_data = Lesson::find($id);
        return view('backend.setup.lesson.edit_lesson', compact('edit_data'));
    }

    public function update_lesson($id)
    {
    }

    public function delete_lesson($id)
    {
        $lesson = Lesson::find($id);
        $lesson->delete();

        $notification = array(
            'message' => 'Lesson deleted successfully.',
            'alert-type' => 'info'
        );

        return redirect()->route('lesson.view')->with($notification);
    }
}
