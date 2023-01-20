<?php

namespace App\Http\Controllers;

use App\Models\Employe;

class EmployeController extends Controller
{
    public function show($id){
        return view('employe.show', [
            'employe' => Employe::findOrFail($id)
        ]);
    }

    public function index(){
        return view('employe.index', [
            'employes' => Employe::all()
        ]);
    }

    public function create(){
        return view('employe.create');
    }

    public function store(){
        $employe = new Employe();
        $employe->nom = request('nom');
        $employe->prenom = request('prenom');
        $employe->datenaissance = request('datenaissance');
        $employe->save();
        return redirect('/employes');
    }
}
