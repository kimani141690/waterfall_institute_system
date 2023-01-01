<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\student_shift;



class student_shift_controller extends Controller
{
    public function view_shift()
    {
        $data['all_data'] = student_shift::all();
        return view('backend.setup.shift.view_shift', $data);
    }

    public function add_shift()
    {
        return view('backend.setup.shift.add_shift');
    }

    public function store_shift(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:student_shifts,name',

        ]);

        $data = new student_shift();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student shift inserted successfully.',
            'alert-type' => 'success'
        );

        return redirect()->route('student.shift.view')->with($notification);
    }
    public function edit_shift($id)
    {
        $edit_data = student_shift::find($id);
        return view('backend.setup.shift.edit_shift', compact('edit_data'));
    }


    public function update_shift(Request $request, $id)
    {
        $data = student_shift::find($id);

        $validatedData = $request->validate([
            'name' => 'required|unique:student_shifts,name,' . $data->id

        ]);

        $data->name = $request->name;
    	$data->save();

    	$notification = array(
    		'message' => 'Student shift updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('student.shift.view')->with($notification);
    }

    public function delete_shift($id){
        $user = student_shift::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Student Shift Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('student.shift.view')->with($notification);

    }

    
}
