<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function listUsers()
    {
        $user = User::where('is_admin', 0)->get();
        return view('admin.user.userManagement')->with('user', $user);
    }

    public function detailUser($id)
    {
        $user = User::find($id);
        return view('admin.user.detailUser')->with('user', $user);
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

    public function index()
    {
        $admins = User::where('is_admin', 1)->get();

        return view('admin.user.Management', compact('admins'));
    }



    public function edit($id)
    {
        $admin = User::findOrFail($id);
        return view('admin.user.editAdmin', compact('admin'));
    }

    public function postEdit(Request $request)
    {


        // Validate the input data here, e.g., using the $request->validate() method




        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($user->password !== $request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect()->route('admin.index')->with('success', 'Admin information updated successfully.');
    }
    public function destroy($id)
    {
        $admin = User::findOrFail($id);
        $admin->delete();

        return redirect()->route('admin.index')->with('success', 'Admin deleted successfully.');
    }
}
