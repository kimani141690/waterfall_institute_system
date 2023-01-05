<?php

namespace App\Services;

use App\Models\Lesson;
use App\Models\student_class;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CalendarService
{
    public function generateCalendarData($week_days)
    {
        $calendar_data = [];
        $time_start = '08:00:00';
        $time_end = '17:00:00';
        $time_range = (new TimeService)->generateTimeRange($time_start, $time_end);

        if (auth()->user()->user_type == 'admin') {
            $lessons = Lesson::all();
        } elseif (auth()->user()->user_type == 'lecturer') {
            $lessons = Lesson::where('lecturer_id', '=', auth()->user()->id)->get();
        } elseif (auth()->user()->user_type == 'student') {
            $lessons = student_class::where('student_id', '=', auth()->user()->id)
                ->rightJoin('lessons', 'student_lessons.lesson_id', 'lessons.id')
                ->get();
        } else {
            abort(403, 'Forbidden!');
        }

        foreach ($time_range as $time) {
            $time_text = $time['start'] . ' - ' . $time['end'];
            $calendar_data[$time_text] = [];

            foreach ($week_days as $index => $day) {
                $lesson = $lessons->where('weekday', $index)->where('start_time', $time['start'])->first();


                if ($lesson) {
                    $difference = Carbon::parse($lesson->start_time)->diffInMinutes($lesson->end_time);
                    $blockData = DB::table('lessons')
                        ->join('course_units', 'lessons.course_unit_id', '=', 'course_units.id')
                        ->join('users', 'lessons.lecturer_id', '=', 'users.id')
                        ->join('student_courses', 'course_units.course_id', '=', 'student_courses.id')
                        ->join('student_years', 'course_units.year_id', '=', 'student_years.id')
                        ->join('rooms', 'lessons.room_id', '=', 'rooms.id')
                        ->select('lessons.weekday as weekday', 'users.name as lecturer_name', 'course_units.unit as unit_name', 'student_courses.name as course', 'student_years.name as year', 'rooms.name as room')
                        ->where('lessons.lecturer_id', $lesson->lecturer_id)
                        ->where('lessons.course_unit_id', $lesson->units_id)
                        ->get();

                    array_push($calendar_data[$time_text], [
                        'lecturer_name' => $blockData[0]->lecturer_name,
                        'unit_name'   => $blockData[0]->unit_name,
                        'course' => $blockData[0]->course,
                        'semester' => $blockData[0]->year,
                        'room' => $blockData[0]->room,
                        'weekday' => $blockData[0]->weekday,
                        'rowspan'      => ($difference / 30)
                    ]);
                } else if (!$lessons->where('weekday', $index)->where('start_time', '<', $time['start'])->where('end_time', '>=', $time['end'])->count()) {
                    array_push($calendar_data[$time_text], 1);
                } else {
                    array_push($calendar_data[$time_text], 0);
                }
            }
        }

        return $calendar_data;
    }
}
