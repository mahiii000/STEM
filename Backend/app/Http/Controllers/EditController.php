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
}