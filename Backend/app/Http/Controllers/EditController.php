<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditController extends Controller
{
    public function edit()
    {
        $user = Auth::user(); // gets the currently logged in user
        if (!$user) {
            // Optionally, redirect to login or show an error
            return redirect()->route('signin')->with('status', 'Please sign in to edit your profile.');
        }
        return view('edit', compact('user'));
    }
}