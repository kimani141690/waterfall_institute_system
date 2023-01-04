<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;




class student_marks extends Model
{
    public function student(){
        return $this->belongsTo(User::class,'student_id','id');
    }

    public function assign_unit(){
        return $this->belongsTo(assign_unit::class,'assign_unit_id','id');
    }

    public function year(){
        return $this->belongsTo(student_year::class,'year_id','id');
    }

    public function student_course(){
        return $this->belongsTo(student_course::class,'course_id','id');
    }

    public function exam_type(){
        return $this->belongsTo(exam_type::class,'exam_type_id','id');
    }
}
