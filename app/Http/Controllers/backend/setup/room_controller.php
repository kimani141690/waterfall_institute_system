<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class room_controller extends Controller
{
    public function view_room()
    {
        $data['all_data'] = Room::all();
        return view('backend.setup.room.view_room', $data);
    }

    public function add_room()
    {
        return view('backend.setup.room.add_room');
    }

    public function store_room(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:rooms,name',
        ]);

        $data = new Room();
        $data->name = $request->name;
        $data->capacity = $request->capacity;
        $data->save();

        $notification = array(
            'message' => 'Room added successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('room.view')->with($notification);
    }

    public function edit_room($id)
    {
        $edit_data = Room::find($id);
        return view('backend.setup.room.edit_room', compact('edit_data'));
    }

    public function update_room(Request $request, $id)
    {
        $data = Room::find($id);

        $request->validate([
            'name' => 'required|unique:rooms,name,' . $data->id

        ]);

        $data->name = $request->name;
        $data->capacity = $request->capacity;
        $data->save();

        $notification = array(
            'message' => 'Room updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('room.view')->with($notification);
    }

    public function delete_room($id)
    {
        $room = Room::find($id);
        $room->delete();

        $notification = array(
            'message' => 'Room deleted successfully.',
            'alert-type' => 'info'
        );

        return redirect()->route('room.view')->with($notification);
    }
}
