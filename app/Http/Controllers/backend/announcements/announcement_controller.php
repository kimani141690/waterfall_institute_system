<?php

namespace App\Http\Controllers\backend\announcements;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class announcement_controller extends Controller
{
    public function view_announcements()
    {
        $user = Auth::user();
        $data['announcements'] = [];
        if ($user->user_type == 'student') {
            // $data['announcements'] = DB::table('announcements')
            //     ->select("*")->where('department', 'school')
            //     ->get();
            $data['announcements'] = Announcement::select("*")->where('department', '=', 'school')->get();
        } else if (isset($user->user_type)) {
            // $data['announcements'] = DB::table('announcements')
            //     ->select("*")->where('department', $user->department)
            //     ->orWhere('department', 'school')
            //     ->get();
            $data['announcements'] = Announcement::select("*")->where('department', '=', $user->department)->orWhere('department', '=', 'school')->get();

        } else {
            abort(400, 'Bad Request!');
        }

        return view('backend.announcements.view_announcements', $data);
    }

    public function add_announcement()
    {
        return view('backend.announcements.add_announcement');
    }

    public function store_announcement(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'announcement' => 'required',
            'department' => 'required',
        ]);

        $data = new Announcement();
        $data->title = $request->title;
        $data->announcement = $request->announcement;
        $data->department = $request->department;
        $data->save();

        $notification = array(
            'message' => 'Announcement posted successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('announcements.view')->with($notification);
    }

    public function edit_announcement($id){
        $edit_data = Announcement::find($id);
        return view('backend.announcements.edit_announcement',compact('edit_data'));
    }

    public function update_announcement(Request $request, $id)
    {
        $data = Announcement::find($id);

        $request->validate([
            'title' => 'required',
            'announcement' => 'required',
            'department' => 'required',
        ]);

        $data = new Announcement();
        $data->title = $request->title;
        $data->announcement = $request->announcement;
        $data->department = $request->department;
        $data->save();

        $notification = array(
            'message' => 'Announcement updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('backend.announcements.view')->with($notification);
    }

    public function delete_announcement($id){
        $announcement = Announcement::find($id);
        $announcement->delete();

        $notification = array(
            'message' => 'Announcement deleted successfully.',
            'alert-type' => 'info'
        );

        return redirect()->route('backend.announcements.view')->with($notification);
    }
}
