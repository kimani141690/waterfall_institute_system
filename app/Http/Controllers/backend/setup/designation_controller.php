<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use App\Models\designation;
use Illuminate\Http\Request;

class designation_controller extends Controller
{
    public function view_designation(){
        $data['all_data'] = designation::all();
        return view('backend.setup.designation.view_designation', $data);
    }

    public function add_designation(){
        return view('backend.setup.designation.add_designation');

    }

    public function store_designation(Request $request){
        
        $validatedData = $request->validate([
            'name' => 'required|unique:designations,name',
        ]);

        $data = new designation();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Designation added successfully.',
            'alert-type' => 'success'
        );

        return redirect()->route('designation.view')->with($notification);
    }

    public function edit_designation($id){
        $edit_data = designation::find($id);
        return view('backend.setup.designation.edit_designation', compact('edit_data'));
    }

    public function update_designation(Request $request, $id){
        $data = designation::find($id);


        $validatedData = $request->validate([
            'name' => 'required|unique:designations,name,' . $data->id
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Designation updated successfully.',
            'alert-type' => 'success'
        );

        return redirect()->route('designation.view')->with($notification);
    }

    public function delete_designation($id){
        $user = designation::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Designation deleted successfully.',
            'alert-type' => 'info'
        );

        return redirect()->route('designation.view')->with($notification);

    }
}
