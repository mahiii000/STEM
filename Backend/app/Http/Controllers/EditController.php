<?php
namespace App\Http\Controllers;

class EditController extends Controller
{
    public function show()
    {
        return view('edit');  // loads resources/views/edit.blade.php
    }
}
