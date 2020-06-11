<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(User $user)
    {
        $users = User::where('id', Auth::user()->getAuthIdentifier())->get();
        return view('user.index')->with('users',$users);
    }
    public function edit(User $user)
    {
        $roles = Role::all();

        return view('user.edit', ['user'=>$user]);
    }
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required'],    
        ]);
        
        $user = User::where('id', Auth::user()->getAuthIdentifier())->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user ->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('user.index');
    }
}
