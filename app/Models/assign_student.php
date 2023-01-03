<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assign_student extends Model
{
    public function student(){
        return $this->belongsTo(User::class,'student_id','id');
    }
    public function discount(){
        return $this->belongsTo(discount_student::class,'id','assign_student_id');
    }
    public function student_course(){
        return $this->belongsTo(student_course::class,'course_id','id');
    }
    public function student_year(){
        return $this->belongsTo(student_year::class,'year_id','id');
    }
    public function group(){
        return $this->belongsTo(student_group::class,'group_id','id');
    }
    public function shift(){
        return $this->belongsTo(student_shift::class,'shift_id','id');
    }
   
}
