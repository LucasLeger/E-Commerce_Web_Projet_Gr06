<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }
    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }
}
