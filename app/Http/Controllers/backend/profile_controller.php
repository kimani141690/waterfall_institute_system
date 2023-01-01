<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;




class profile_controller extends Controller
{
    public function profile_view(){
        $id = Auth::user()->id;
    	$user = User::find($id);

    	return view('backend.user.view_profile',compact('user'));
    }

    public function profile_edit(){

        $id = Auth::user()->id;
    	$edit_data = User::find($id);

        return view('backend.user.edit_profile',compact('edit_data'));


    }
    public function profile_store(Request $request){

    	$data = User::find(Auth::user()->id);
    	$data->name = $request->name;
    	$data->email = $request->email;
    	$data->mobile = $request->mobile;
    	$data->address = $request->address;
    	$data->gender = $request->gender;

    	if ($request->file('image')) {
    		$file = $request->file('image');
    		@unlink(public_path('upload/user_images/'.$data->image));
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('upload/user_images'),$filename);
    		$data['image'] = $filename;
    	}
    	$data->save();

    	$notification = array(
    		'message' => 'User profile updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('profile.view')->with($notification);

    } // End Method 

    public function password_view(){
        return view('backend.user.edit_password');
    }

    public function password_update(Request $request){
        
    	$validatedData = $request->validate([
    		'oldpassword' => 'required',
    		'password' => 'required|confirmed',
    	]);

        
    	$hashedPassword = Auth::user()->password;
    	if (Hash::check($request->oldpassword,$hashedPassword)) {
    		$user = User::find(Auth::id());
    		$user->password = Hash::make($request->password);
    		$user->save();
    		Auth::logout();
    		return redirect()->route('login');
    	}else{
    		return redirect()->back();
    	}
    }
}
