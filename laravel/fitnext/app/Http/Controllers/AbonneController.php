<?php

namespace App\Http\Controllers;

use App\Models\Abonne;

class AbonneController extends Controller
{
    public function show($id){
        return view('abonne.show', [
            'abonne' => Abonne::findOrFail($id)
        ]);
    }
}
