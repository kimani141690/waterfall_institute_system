<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assign_unit extends Model
{
    public function student_course(){
        return $this->belongsTo(student_course::class,'course_id','id');
    }

    public function student_year(){
        return $this->belongsTo(student_year::class,'year_id','id');
    }

    public function student_unit(){
        return $this->belongsTo(course_unit::class,'unit_id','id');
    }

   
}
