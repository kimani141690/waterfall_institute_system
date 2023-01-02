<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\assign_unit;
use App\Models\student_course;
use App\Models\course_unit;
use App\Models\student_year;

class assign_unit_controller extends Controller
{
    public function view_assign_unit(){
           $data['all_data'] = assign_unit::all();
        //    $data['all_data'] = assign_unit::select('fee_category_id')->groupBy('fee_category_id')->get();
           return view('backend.setup.assign_unit.view_assign_unit',$data);
    }

    public function add_assign_unit(){
        $data['assign_units'] = assign_unit::all();
        $data['courses'] = student_course::all();
        $data['years'] = student_year::all();

        return view('backend.setup.assign_unit.add_assign_unit',$data);
    }
}
