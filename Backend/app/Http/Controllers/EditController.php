<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditController extends Controller
{
    public function edit()
{
    $user = \App\Models\User::first();
    if (!$user) {
        abort(404, 'No user found in the database.');
    }
    return view('edit', compact('user'));
}
public function update(Request $request, $id)
{
    // Validate input (adjust rules as needed)
    $validated = $request->validate([
        'first_name'      => ['required', 'string', 'max:255', 'regex:/^[A-Za-z ]+$/'],
        'last_name'       => ['required', 'string', 'max:255', 'regex:/^[A-Za-z ]+$/'],
        'email'           => 'required|email',
        'country_code'    => 'required|string|max:10',
        'contact_number'  => 'required|string|max:20',
        'address'         => 'nullable|string|max:500',
        'emirate'         => 'nullable|string|max:255',
        'area'            => 'nullable|string|max:255',
        'password'        => [
            'nullable',
            'confirmed',
            'regex:/^(?=.*[0-9])(?=.*[^A-Za-z0-9]).{8,}$/',
        ],
    ], [
        'first_name.regex' => 'First name may only contain letters and spaces.',
        'last_name.regex' => 'Last name may only contain letters and spaces.',
        'password.regex' => 'Password must be at least 8 characters, contain at least one number and one special character.',
    ]);

    // Find user
    $user = \App\Models\User::findOrFail($id);

    // Update fields
    $user->first_name = $validated['first_name'];
    $user->last_name = $validated['last_name'];
    $user->email = $validated['email'];
    $user->country_code = $validated['country_code'];
    $user->contact_number = $validated['contact_number'];
    $user->address = $validated['address'];
    $user->emirate = $validated['emirate'];
    $user->area = $validated['area'];

    // Only update password if provided
    if (!empty($validated['password'])) {
        $user->password = bcrypt($validated['password']);
    }
    $user->save();

    return redirect()->back()->with('success', 'Profile updated successfully!');
}
}