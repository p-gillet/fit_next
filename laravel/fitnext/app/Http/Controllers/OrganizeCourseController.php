<?php

namespace App\Http\Controllers;
use App\Models\Coach;
use App\Models\CoursCollectif;
use App\Models\Coach_coursCollectif;
use App\Models\Personne;
use App\Models\Local;
use App\Models\Adresse;
use App\Models\Abonne;
use Illuminate\Http\Request;

class OrganizeCourseController extends Controller
{
   // TODO Miguel
   public function index() {
      return view('organizeCourse.index', [
         'cours' => CoursCollectif::all()->each(function($cours) {
            $cours->coaches = $cours->coaches()->get();
         })
      ]);
   }

   // update
   public function edit($numcours) {
      $cours = CoursCollectif::find($numcours);
      return view('organizeCourse.edit', [
         'cours' => $cours,
         'coaches' => Personne::whereIn('numavs', Coach::select('numavs')->get())->get(),
         'abonnes' => Personne::whereIn('numavs', Abonne::select('numavs')->get())->get(),
         'selectedAbonnes' => $cours->abonnes()->get()->pluck('numavs')->toArray(),
         'selectedCoaches' => $cours->coaches()->get()->pluck('numavs')->toArray(),
         'locals' => Local::join('adresse', 'adresse.numadresse', '=', 'local.numadresse')->get()
      ]);
   }

   public function update(Request $request, $numcours) {
      $coursCollectif = CoursCollectif::find($numcours);
      $coursCollectif->typecours = $request->input('typecours');
      $coursCollectif->heurecours = $request->input('heurecours');
      $coursCollectif->datecours = $request->input('datecours');
      $coursCollectif->numlocal = $request->input('local');
      $coursCollectif->save();

      // detach all coaches from course
      $coursCollectif->coaches()->detach();
      // attach coaches to course
      $coursCollectif->coaches()->attach($request->input('coach'), ['numcours' => $numcours]);

      // detach all abonnes from course
      $coursCollectif->abonnes()->detach();
      // attach abonnes to course
      $coursCollectif->abonnes()->attach($request->input('abonne'), ['numcours' => $numcours]);
      // same page but with success message
      return $this->index()->with('success', 'Cours modifié avec succès!');
   }

   public function create() {
      return view('organizeCourse.create', [
         'coaches' => Personne::whereIn('numavs', Coach::select('numavs')->get())->get(),
         'abonnes' => Personne::whereIn('numavs', Abonne::select('numavs')->get())->get(),
         'locals' => Local::join('adresse', 'adresse.numadresse', '=', 'local.numadresse')->get(),
      ]);
   }

   public function delete($numcours){
      $coursCollectif = CoursCollectif::find($numcours);
      $coursCollectif->coaches()->detach();
      $coursCollectif->abonnes()->detach();
      $coursCollectif->delete();
      return $this->index()->with('success', 'Cours supprimé avec succès!');
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

   public function abonneList($numcours){
      $coursCollectif = CoursCollectif::find($numcours);
      return view('organizeCourse.abonneList', [
         'cours' => $coursCollectif,
         'abonnes' => $coursCollectif->abonnes()->get()
      ]);
   }
}
