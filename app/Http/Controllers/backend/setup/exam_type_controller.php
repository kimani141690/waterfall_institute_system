<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\exam_type;

class exam_type_controller extends Controller
{
    public function view_exam_type(){
        $data['all_data'] = exam_type::all();
        return view('backend.setup.exam_type.view_exam_type',$data);
    }

    public function add_exam_type(){
        return view('backend.setup.exam_type.add_exam_type');

    }

    public function store_exam_type(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:exam_types,name',
            
        ]);

        $data = new exam_type();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Exam type added successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('exam.type.view')->with($notification);

    
    }

    public function edit_exam_type($id){
        $edit_data = exam_type::find($id);
        return view('backend.setup.exam_type.edit_exam_type',compact('edit_data'));
    }

    public function update_exam_type(Request $request, $id){
        $data = exam_type::find($id);
     
     $validatedData = $request->validate([
    		'name' => 'required|unique:exam_types,name,'.$data->id
    		
    	]);

    	
    	$data->name = $request->name;
    	$data->save();

    	$notification = array(
    		'message' => 'Exam type updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('exam.type.view')->with($notification);
    }

    public function delete_exam_type($id){
        $user = exam_type::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Exam type deleted successfully.',
            'alert-type' => 'info'
        );

        return redirect()->route('exam.type.view')->with($notification);
    }

    
}
