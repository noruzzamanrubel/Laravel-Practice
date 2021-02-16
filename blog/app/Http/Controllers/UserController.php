<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\user;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('user', compact('user'));
    }
}
