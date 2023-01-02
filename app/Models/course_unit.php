<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course_unit extends Model
{
    public function course(){
        return $this->belongsTo(student_course::class,'course_id','id');
    }
    public function year(){
        return $this->belongsTo(student_year::class,'year_id','id');
    }
    

}
