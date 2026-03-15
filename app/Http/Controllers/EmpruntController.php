<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livre;
use App\Models\Emprunt;

class EmpruntController extends Controller
{

public function index()
{
$livres = Livre::where('disponible', true)->get();
return view('emprunt', compact('livres'));
}

public function store(Request $request)
{
Emprunt::create([
'user_id' => 1,
'livre_id' => $request->livre_id,
'date_emprunt' => now()
]);

Livre::where('id', $request->livre_id)
->update(['disponible'=>false]);

return redirect('/livres');
}

public function retour()
{
    $livres = Livre::where('disponible', false)->get();

    return view('retour', compact('livres'));
}

public function storeRetour(Request $request)
{
    Livre::where('id', $request->livre_id)
        ->update(['disponible' => true]);

    return redirect('/livres');
}

}
