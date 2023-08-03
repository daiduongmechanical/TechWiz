<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {

        return view('test2');
    }


    public function showList()
    {

        return view('test3');
    }

    public function listUsers()
    {
        $user = User::where('role', 0)->get();
        return view('user.userManagement')->with('user', $user);
    }

    public function detailUser($id)
    {
        $user = User::find($id);
        return view('user.detailUser')->with('user', $user);
    }

    public function blockUser($id)
    {
        $success = "";
        $user = User::find($id);
        if ($user->block === 1) {
            $user->block = false;
            $success = "Restore user successfully";
        } else {
            $user->block = true;
            $success = "Block user successfully";
        }
        $user->save();

        Session()->put('success', $success);

        return back();
    }
}
