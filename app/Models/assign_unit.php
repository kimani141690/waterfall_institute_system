<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assign_unit extends Model
{
    public function student_course(){
        return $this->belongsTo(student_course::class,'course_id','id');
    }

   
}
