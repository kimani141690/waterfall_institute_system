<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use App\Models\course_unit;
use App\Models\Lesson;
use App\Services\CalendarService;
use App\Services\TimeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use PDF;

class timetable_controller extends Controller
{
    public function createTimeTablePDF(CalendarService $calendarService)
    {

        $weekDays     = Lesson::WEEK_DAYS;
        $calendarData = $calendarService->generateCalendarData($weekDays);

        // return view('admin.timetable', ['weekDays' => $weekDays, 'calendarData' => $calendarData]);
        $pdf = PDF::loadView('backend.timetable.timetable_pdf', ['weekDays' => $weekDays, 'calendarData' => $calendarData]);
        return $pdf->download('timetable.pdf');
        // dd($calendarData);
    }
}
