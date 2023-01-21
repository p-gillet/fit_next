<?php

namespace App\Http\Controllers;

use App\Models\Coach;

class CoachController extends Controller
{
    public function show($id){
        return view('coach.show', [
            'coach' => Coach::findOrFail($id)
        ]);
    }

    public function index(){
        return view('coach.index', [
            'coachs' => Coach::all()
        ]);
    }

    public function create(){
        return view('coach.create');
    }

    public function store(){
        $coach = new Coach();
        $coach->nom = request('nom');
        $coach->save();
        return redirect('/coachs');
    }
}
