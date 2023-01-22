<?php

namespace App\Http\Controllers;

use App\Models\Adresse;
use App\Models\Personne;
use App\Models\Abonne;
use App\Models\Coach;
use App\Models\Employe;
use Illuminate\Http\Request;

class AddNewClientController extends Controller
{
   public function index() {

      return view('addNewClient.index', [
         'adresses' => Adresse::all()
      ]);
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request) {
      $personne = new Personne();
      $personne->numavs = $request->input('numavs');
      $personne->nom = $request->input('nom');
      $personne->prenom = $request->input('prenom');
      $personne->sexe = $request->input('sexe');
      $personne->numtelephone = $request->input('numtelephone');
      $personne->photo = $request->input('photo');
      $personne->datenaissance = $request->input('datenaissance');
      $personne->numadresse = $request->input('numadresse');
      $personne->save();
      
      if ($request->input('abonne') == 'on') {
         $abonne = new Abonne();
         $abonne->numavs = $request->input('numavs');
         $abonne->dateinscription = date('Y-m-d');
         $abonne->datefincontrat = $request->input('datefincontrat');
         $abonne->save();
      }

      if($request->input('employe') == 'on') {
         $employe = new Employe();
         $employe->numavs = $request->input('numavs');
         $employe->salaire = $request->input('salaire');
         $employe->tauxactivite = $request->input('tauxactivite');
         $employe->save();
      }

      if ($request->input('coach') == 'on') {
         $coach = new Coach();
         $coach->numavs = $request->input('numavs');
         $coach->certification = $request->input('certification');
         $coach->save();
      }

      return new Response('Client ajouté avec succès');
   }
}
