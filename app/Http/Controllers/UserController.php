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
        $user = User::find($id);
        $user->block = true;
        $user->save();
        $success = "Block user successfully";
        Session()->put('success', $success);

        return back();
    }
}
