<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(User $user)
    {
        $users = User::all();
        return view('user.index')->with('users',$users);
    }
    public function edit(User $user)
    {
        if (Gate::denies('edit-users'))
        {
            return redirect()->route('user.index');
        }

        $roles = Role::all();

        return view('user.edit', [
            'user'=>$user,
            'roles'=>$roles
        ]);
    }

}
