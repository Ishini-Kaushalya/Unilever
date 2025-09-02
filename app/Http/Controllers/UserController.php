<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email',
            'tel_no'     => 'nullable|string|max:15',
            'department' => 'required|string|max:100',
            'role'       => 'required|string|max:50',
        ]);

        User::create([
            'name'       => $request->name,
            'email'      => $request->email,
            'password'   => Hash::make('password123'), // default password
            'tel_no'     => $request->tel_no,
            'department' => $request->department,
            'role'       => $request->role,
        ]);

        return redirect()->back()->with('success', 'User added successfully!');
    }
}
