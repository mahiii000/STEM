namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    public function show()
    {
        return view('technology'); // This loads resources/views/technology.blade.php
    }
}
