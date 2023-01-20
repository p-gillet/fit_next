<?php

namespace App\Http\Controllers;

use App\Models\ProgrammeIndividuel;

class ProgrammeIndividuelController extends Controller
{
    public function show($id){
        return view('programmeIndividuel.show', [
            'programmeIndividuel' => ProgrammeIndividuel::findOrFail($id)
        ]);
    }

    public function index(){
        return view('programmeIndividuel.index', [
            'programmeIndividuels' => ProgrammeIndividuel::all()
        ]);
    }

    public function create(){
        return view('programmeIndividuel.create');
    }

    public function store(){
        $programmeIndividuel = new ProgrammeIndividuel();
        $programmeIndividuel->nom = request('nom');
        $programmeIndividuel->save();
        return redirect('/programmeIndividuels');
    }
}
