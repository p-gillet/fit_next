<?php

namespace App\Http\Controllers;

use App\Models\TypeMateriel;

class TypeMaterielController extends Controller
{
    public function show($id){
        return view('typeMateriel.show', [
            'typeMateriel' => TypeMateriel::findOrFail($id)
        ]);
    }

    public function index(){
        return view('typeMateriel.index', [
            'typeMateriels' => TypeMateriel::all()
        ]);
    }

    public function create(){
        return view('typeMateriel.create');
    }

    public function store(){
        $typeMateriel = new TypeMateriel();
        $typeMateriel->nom = request('nom');
        $typeMateriel->save();
        return redirect('/typeMateriels');
    }
}
