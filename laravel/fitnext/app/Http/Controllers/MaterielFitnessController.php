<?php

namespace App\Http\Controllers;

use App\Models\MaterielFitness;

class MaterielFitnessController extends Controller
{
    public function show($id){
        return view('materielfitness.show', [
            'materielfitness' => MaterielFitness::findOrFail($id)
        ]);
    }

    public function index(){
        return view('materielfitness.index', [
            'materielfitnesss' => MaterielFitness::all()
        ]);
    }

    public function create(){
        return view('materielfitness.create');
    }

    public function store(){
        $materielfitness = new MaterielFitness();
        $materielfitness->nom = request('nom');
        $materielfitness->marque = request('marque');
        $materielfitness->modele = request('modele');
        $materielfitness->save();
        return redirect('/materielfitnesss');
    }
}
