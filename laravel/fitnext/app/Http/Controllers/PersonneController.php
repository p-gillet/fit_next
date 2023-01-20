<?php

namespace App\Http\Controllers;

use App\Models\Personne;

class PersonneController extends Controller
{
    public function show($id){
        return view('personne.show', [
            'personne' => Personne::findOrFail($id)
        ]);
    }

    public function index(){
        return view('personne.index', [
            'personnes' => Personne::all()
        ]);
    }

    public function create(){
        return view('personne.create');
    }

    public function store(){
        $personne = new Personne();
        $personne->nom = request('nom');
        $personne->prenom = request('prenom');
        $personne->datenaissance = request('datenaissance');
        $personne->save();
        return redirect('/personnes');
    }
}
