<?php

namespace App\Services;

use Carbon\Carbon;

class TimeService
{
    public function generateTimeRange($from, $to)
    {
        $time = Carbon::parse($from);
        $time_range = [];

        do {
            array_push($time_range, [
                'start' => $time->format("H:i:s"),
                'end' => $time->addMinutes(30)->format("H:i:s")
            ]);
        }
        while ($time->format("H:i:s") !== $to);

        return $time_range;
    }
}
