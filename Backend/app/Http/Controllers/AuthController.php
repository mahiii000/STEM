<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'regex:/^[A-Za-z ]+$/'],
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:20|unique:users,phone',
            'country' => 'required|string|max:100',
            'account_type' => 'required|string|in:student,teacher,other',
            'school_name' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:500',
            'password' => [
                'required',
                'string',
                'confirmed',
                'regex:/^(?=.*[0-9])(?=.*[^A-Za-z0-9]).{8,}$/',
            ],
        ], [
            'name.regex' => 'Name may only contain letters and spaces.',
            'email.unique' => 'The email has already been taken.',
            'phone.unique' => 'Phone Number is already used',
            'password.regex' => 'Password must be at least 8 characters and contain at least one number and one special character.',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'country' => $validated['country'],
            'account_type' => $validated['account_type'],
            'school_name' => $validated['school_name'] ?? null,
            'address' => $validated['address'] ?? null,
            'password' => Hash::make($validated['password']),
        ]);

        // Redirect to login page with success message
        return redirect()->route('signin')->with('status', 'Registration successful! Please log in.');
    }
}
