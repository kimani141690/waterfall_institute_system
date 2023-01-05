<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    public $table = 'lessons';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'weekday',
        'class_id',
        'course_unit_id',
        'lecturer_id',
        'start_time',
        'end_time',
        'created_at',
        'updated_at',
    ];

    const WEEK_DAYS = [
        '1' => 'Monday',
        '2' => 'Tuesday',
        '3' => 'Wednesday',
        '4' => 'Thursday',
        '5' => 'Friday',
    ];

    public function getDifferenceAttribute()
    {
        return Carbon::parse($this->end_time)->diffInMinutes($this->start_time);
    }

    public function getStartTimeAttribute($value)
    {
        return $value ? Carbon::createFromFormat('H:i:s', $value)->format(config('panel.lesson_time_format')) : null;
    }

    public function setStartTimeAttribute($value)
    {
        $this->attributes['start_time'] = $value ? Carbon::createFromFormat(
            config('panel.lesson_time_format'),
            $value
        )->format('H:i:s') : null;
    }

    public function getEndTimeAttribute($value)
    {
        return $value ? Carbon::createFromFormat('H:i:s', $value)->format(config('panel.lesson_time_format')) : null;
    }

    public function setEndTimeAttribute($value)
    {
        $this->attributes['end_time'] = $value ? Carbon::createFromFormat(
            config('panel.lesson_time_format'),
            $value
        )->format('H:i:s') : null;
    }

    function class()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }

    public function lecturer()
    {
        return $this->belongsTo(User::class, 'lecturer_id');
    }

    public function units(){
        return $this->belongsTo(course_unit::class, 'course_unit_id');
    }

    public static function isTimeAvailable($weekday, $startTime, $endTime, $class, $lecturer, $lesson)
    {
        $lessons = self::where('weekday', $weekday)
            ->when($lesson, function ($query) use ($lesson) {
                $query->where('id', '!=', $lesson);
            })
            ->where(function ($query) use ($class, $lecturer) {
                $query->where('room_id', $class)
                    ->orWhere('lecturer_id', $lecturer);
            })
            ->where([
                ['start_time', '<', $endTime],
                ['end_time', '>', $startTime],
            ])
            ->count();

        return !$lessons;
    }

    public function scopeCalendarByRoleOrClassId($query)
    {
        return $query->when(!request()->input('room_id'), function ($query) {
            $query->when(auth()->user()->is_teacher, function ($query) {
                $query->where('lecturer_id', auth()->user()->id);
            })
                ->when(auth()->user()->is_student, function ($query) {
                    $query->where('room_id', auth()->user()->class_id ?? '0');
                });
        })
            ->when(request()->input('room_id'), function ($query) {
                $query->where('room_id', request()->input('room_id'));
            });
    }
}
