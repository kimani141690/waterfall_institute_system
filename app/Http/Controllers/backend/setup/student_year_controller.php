<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\student_year; 


class student_year_controller extends Controller
{
    public function view_year(){
    
            $data['all_data'] = student_year::all();
            return view('backend.setup.year.view_year',$data);
    
    }

    public function add_year(){
        return view('backend.setup.year.add_year');

    }

    public function store_year(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|unique:student_years,name',
            
        ]);

        $data = new student_year();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student year added successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.year.view')->with($notification);

    }

    public function edit_year($id){
        $edit_data = student_year::find($id);
        return view('backend.setup.year.edit_year',compact('edit_data'));


    }

    public function update_year(Request $request,$id){

		$data = student_year::find($id);
     
     $validatedData = $request->validate([
    		'name' => 'required|unique:student_years,name,'.$data->id
    		
    	]);

    	
    	$data->name = $request->name;
    	$data->save();

    	$notification = array(
    		'message' => 'Student uear updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('student.year.view')->with($notification);
    }

    
	 public function delete_year($id){
        $user = student_year::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Student year deleted successfully.',
            'alert-type' => 'info'
        );

        return redirect()->route('student.year.view')->with($notification);

    }
}

