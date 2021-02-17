<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\user;
use App\Models\phone;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('user', compact('user'));
    }
}
