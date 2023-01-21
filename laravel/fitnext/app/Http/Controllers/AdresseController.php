<?php

namespace App\Http\Controllers;

use App\Models\Adresse;

class AdresseController extends Controller
{
    public function show($id){
    }

    public function index() {
        return view('tables.index', [
            'tableName' => 'adresse',
            'data' => Adresse::all(),
            'fields' => get_class_vars('App\Models\Adresse')['fillable'],
        ]);
    }

    public function create(){
        return view('adresse.create');
    }

    public function store(){
        $adresse = new Adresse();
        $adresse->ville = request('ville');
        $adresse->codepostale = request('codepostale');
        $adresse->rue = request('rue');
        $adresse->numeroderue = request('numeroderue');
        $adresse->save();
        return redirect('/adresses');
    }
}
