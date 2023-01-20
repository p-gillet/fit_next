<?php

namespace App\Http\Controllers;

use App\Models\Local;

class LocalController extends Controller
{
    public function show($id){
        return view('local.show', [
            'local' => Local::findOrFail($id)
        ]);
    }

    public function index(){
        return view('local.index', [
            'locals' => Local::all()
        ]);
    }

    public function create(){
        return view('local.create');
    }

    public function store(){
        $local = new Local();
        $local->nom = request('nom');
        $local->save();
        return redirect('/locals');
    }
}
