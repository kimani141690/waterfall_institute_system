<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fee_category_amount extends Model
{
    public function fee_category(){
        return $this->belongsTo(fee_category::class,'fee_category_id','id');
    }
    public function student_course(){
        return $this->belongsTo(student_course::class,'course_id','id');
    }

}
