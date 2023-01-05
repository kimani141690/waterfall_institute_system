<?php

namespace App\Http\Controllers\api\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class user_api_controller extends Controller
{
    public function api_user_create(Request $request)
    {

        $request->validate([
            'email' => 'required|unique:users',
            'name' => 'required',
        ]);

        $data = new User();
        $data->user_type = $request->user_type;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();

        return "New user has been successfully created";
    }
    public function api_user_get(Request $req)
    {
        $id = $req->id;
        $user = User::find($id);

        if ($user) {
            return $user;
        } else {
            return "User Not Found";
        }
    }

    public function api_user_all()
    {
        return User::all();
    }

    public function api_user_get_email(Request $request)
    {
        $email = $request->email;
        $user = User::where("email", "like", "%" . $email . "%")->get();
        if ($user) {
            return $user;
        } else {
            return "No users found";
        }
    }

    public function api_user_update(Request $request)
    {

        $user = User::find($request->id);
        if ($user) {
            $user->user_type = $request->user_type;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();

            return $user;
        } else {
            return "Invalid user object";
        }
    }

    public function api_user_delete(Request $req)
    {

        $id = $req->id;
        $user = User::find($id);
        if ($user) {
            $email = $user->email;
            $user->delete();

            return "User " . $email . " has been deleted";
        } else {
            return "Cannot delete user: Invalid id";
        }
    }
}
