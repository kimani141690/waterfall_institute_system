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
}
