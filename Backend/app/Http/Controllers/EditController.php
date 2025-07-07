<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class EditController extends Controller
{
    public function show()
{
    $user = auth()->user(); 
    return view('edit', compact('user')); 
}


    public function update(Request $request)
    {
        $user = Auth::user(); // Currently logged-in user

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'regex:/^[A-Za-z ]+$/'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'phone' => ['required', 'string', 'max:20', Rule::unique('users')->ignore($user->id)],
            'address' => 'nullable|string|max:500',
            'password' => [
                'nullable',
                'string',
                'confirmed',
                'regex:/^(?=.*[0-9])(?=.*[^A-Za-z0-9]).{8,}$/',
            ],
        ], [
            'name.regex' => 'Name may only contain letters and spaces.',
            'email.unique' => 'This email is already taken.',
            'phone.unique' => 'This phone number is already taken.',
            'password.regex' => 'Password must be at least 8 characters and contain at least one number and one special character.',
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->phone = $validated['phone'];
        $user->address = $validated['address'] ?? $user->address;

        // Update password only if filled
        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect()->back()->with('status', 'Profile updated successfully!');
    }
}
