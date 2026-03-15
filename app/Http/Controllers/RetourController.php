<?php 

namespace App\Http\Controllers;

use App\Models\Livre;
use Illuminate\Http\Request;

class RetourController extends Controller {
    public function index()
{
    $livres = Livre::where('disponible', false)->get();
    return view('retour', compact('livres'));
}

public function store(Request $request)
{
    Livre::where('id', $request->livre_id)
        ->update(['disponible' => true]);

    return redirect('/livres');
}
}

