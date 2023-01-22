<?php

namespace App\Http\Controllers;
use App\Models\Coach;
use App\Models\CoursCollectif;
use App\Models\Coach_coursCollectif;
use App\Models\Personne;
use App\Models\Local;
use App\Models\Adresse;
use Illuminate\Http\Request;

class OrganizeCourseController extends Controller
{
   // TODO Miguel
   public function index() {
      return view('organizeCourse.index', [
         'cours' => CoursCollectif::all()
      ]);
   }

   public function create() {
      return view('organizeCourse.create', [
         'coaches' => Personne::whereIn('numavs', Coach::select('numavs')->get())->get(),
         'locals' => Local::join('adresse', 'adresse.numadresse', '=', 'local.numadresse')->get(),
      ]);
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request) {
      $coursCollectif = new CoursCollectif();
      $coursCollectif->typecours = $request->input('typecours');
      $coursCollectif->heurecours = $request->input('heurecours');
      $coursCollectif->datecours = $request->input('datecours');
      $coursCollectif->numlocal = $request->input('local');
      $coursCollectif->save();
      $numcours = $coursCollectif->numcours;


      // attach coaches to course
      $coursCollectif->coaches()->attach($request->input('coach'), ['numcours' => $numcours]);
      // same page but with success message
      return $this->index()->with('success', 'Cours organisé avec succès!');
   }
}
