<?php

namespace App\Http\Controllers;

use App\Models\Exercice;

class ExerciceController extends Controller
{
    public function show($id){
        return view('exercice.show', [
            'exercice' => Exercice::findOrFail($id)
        ]);
    }

    public function index(){
        return view('exercice.index', [
            'exercices' => Exercice::all()
        ]);
    }

    public function create(){
        return view('exercice.create');
    }

    public function store(){
        $exercice = new Exercice();
        $exercice->nom = request('nom');
        $exercice->save();
        return redirect('/exercices');
    }
}
