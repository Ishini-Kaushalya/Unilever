<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    // Show profile (view only)
    public function show(Request $request)
    {
        $user = $request->user();
        return view('profile.show', compact('user'));
    }

    // Show edit form
    public function edit(Request $request)
    {
        $user = $request->user();
        return view('profile.edit', compact('user'));
    }

    // Update user profile
    public function update(Request $request)
    {
        $user = $request->user();

        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|max:255|unique:users,email,'.$user->id,
            'tel_no' => 'nullable|string|max:20',
            'department' => 'nullable|string|max:255',
            'role' => 'nullable|string|max:255',
        ]);

        $user->update($validated);

        return redirect()->route('profile.show')->with('status', 'Profile updated successfully!');
    }
}
