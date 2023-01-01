<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\student_group;

class student_group_controller extends Controller
{
    public function view_group()
    {
        $data['all_data'] = student_group::all();
        return view('backend.setup.group.view_group', $data);
    }

    public function add_group()
    {
        return view('backend.setup.group.add_group');
    }

    public function store_group(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|unique:student_groups,name',

        ]);

        $data = new student_group();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student group inserted successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.group.view')->with($notification);
    }

    public function edit_group($id)
    {
        $edit_data = student_group::find($id);
        return view('backend.setup.group.edit_group', compact('edit_data'));
    }

    public function update_group(Request $request, $id)
    {

        $data = student_group::find($id);

        $validatedData = $request->validate([
            'name' => 'required|unique:student_groups,name,' . $data->id

        ]);


        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student group updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.group.view')->with($notification);
    }
}
