<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditController extends Controller
{
    public function show()
{
    $user = auth()->user(); // or User::find($id) depending on your logic
    return view('edit', compact('user'));
}
}
