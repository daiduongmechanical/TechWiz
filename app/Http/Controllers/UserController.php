<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
