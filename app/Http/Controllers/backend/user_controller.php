<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Mail\AcceptanceLetter;
use App\Models\student_applications;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class user_controller extends Controller
{
	public function user_view()
	{
		// dd('view user');

		// $all_data = User::all();

		$data['all_data'] = User::where('user_type', 'admin')->get();
		return view('backend.user.view_user', $data);
	}

	public function user_add()
	{
		return view('backend.user.add_user');
	}

	public function user_store(Request $request)
	{

		$validatedData = $request->validate([
			'email' => 'required|unique:users',
			'name' => 'required',
		]);

		$data = new User();
		$code = rand(0000, 9999);
		$data->user_type = 'admin';
		$data->role = $request->role;
		$data->name = $request->name;
		$data->email = $request->email;
		$data->password = bcrypt($code);
		$data->code = $code;
		$data->save();

		$notification = array(
			'message' => 'User Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('user.view')->with($notification);
	}


	//ACCEPTANCE LETTER
	//TODO: change user to be retrived from arguments
	public function send_acceptance_letter($id)
	{
		$user = student_applications::find($id);

		$data = new User();
		$code = rand(0000, 9999);
		$data->user_type = 'student';
		$data->name = $user->first_name . " " . $user->last_name;
		$data->email = $user->email;
		$data->password = bcrypt($code);
		$data->code = $code;
		$data->save();

		Mail::to($data)->send(new AcceptanceLetter($data));
		$user->delete();

		$notification = array(
			'message' => 'Email sent Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('applications.view')->with($notification);
	}

	public function user_edit($id)
	{

		$edit_data = User::find($id);
		return view('backend.user.edit_user', compact('edit_data'));
	}

	public function user_update(Request $request, $id)
	{

		$data = User::find($id);
		$data->name = $request->name;
		$data->email = $request->email;
		$data->role = $request->role;

		$data->save();

		$notification = array(
			'message' => 'User Updated Successfully',
			'alert-type' => 'info'
		);

		return redirect()->route('user.view')->with($notification);
	}

	public function user_delete($id)
	{

		$user = User::find($id);
		$user->delete();

		$notification = array(
			'message' => 'User deleted Successfully',
			'alert-type' => 'info'
		);

		return redirect()->route('user.view')->with($notification);
	}
}
