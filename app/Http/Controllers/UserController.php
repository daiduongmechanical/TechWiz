<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    protected $fillable = ['fullName', 'email', 'password', 'dob', 'role'];

    public function index()
    {
        $admins = User::all();

        return view('user.Management', compact('admins'));
    }

    public function show($id)
    {
        $admin = User::findOrFail($id);
        return view('admin.show', compact('admin'));
    }

    public function edit($id)
    {
        $admin = User::findOrFail($id);
        return view('user.editAdmin', compact('admin'));
    }

    public function postEdit(Request $request)
    {
        $id = $request->input('id');
    
        // Validate the input data here, e.g., using the $request->validate() method
    
        $dataToUpdate = $request->only('fullName', 'email', 'password', 'dob', 'role');
    
        User::where('id', $id)->update($dataToUpdate);
    
        return redirect()->route('admin.index')->with('success', 'Admin information updated successfully.');
    }

    public function destroy($id)
    {
        $admin = User::findOrFail($id);
        $admin->delete();
        
        return redirect()->route('admin.Management')->with('success', 'Admin deleted successfully.');
    }
}



