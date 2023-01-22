<?php

namespace App\Http\Controllers;

use Schema;

use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;

use DB;

class TableController extends Controller
{
   public static function getModelClassFromName($modelName) {
      $modelClass = 'App\Models\\' . ucfirst($modelName);
      if (!class_exists($modelClass)) {
         return 'La table ' . $modelName . ' n\'existe pas !';
      }
      return $modelClass;
   }

   public function index($tableName) {
      $modelClass = $this->getModelClassFromName($tableName);
      $data = $modelClass::all();
      $dataArray = $data->toArray();
      $keyName = null;

      if (sizeof($dataArray) > 0) {
         $keyName = $data[0]->getKeyName();

         // Sort array based on key
         usort($dataArray, function ($a, $b) use ($keyName) {
            return strnatcmp($a[$keyName], $b[$keyName]);
         });
      }

      return view('tables.index', [
         'tableName' => $tableName,
         'data' => $dataArray,
         'keyName' => $keyName,
         'fields' => Schema::getColumnListing($tableName)
      ]);
   }

   public function create($tableName) {
      return view('tables.create', [
         'tableName' => $tableName,
         'fields' => Schema::getColumnListing($tableName)
      ]);
   }

   public function store($tableName) {
      switch($tableName) {
         case 'typeMateriel': 
            $typeMateriel = new TypeMateriel();
            $typeMateriel->nom = request('nom');
            $typeMateriel->save();
            break;
         case 'programmeIndividuel':
            $programmeIndividuel = new ProgrammeIndividuel();
            $programmeIndividuel->nom = request('nom');
            $programmeIndividuel->save();
            break;
         case 'personne':
            $materielfitness = new Personne();
            $personne->nom = request('nom');
            $personne->prenom = request('prenom');
            $personne->datenaissance = request('datenaissance');
            $personne->save();
            break;
         case 'materielFitness':
            $materielfitness = new MaterielFitness();
            $materielfitness->nom = request('nom');
            $materielfitness->marque = request('marque');
            $materielfitness->modele = request('modele');
            $materielfitness->save();
            break;
         case 'local':
            $local = new Local();
            $local->nom = request('nom');
            $local->save();
            break;
         case 'exercice':
            $exercice = new Exercice();
            $exercice->nom = request('nom');
            $exercice->save();
            break;
         case 'employe':
            $employe = new Employe();
            $employe->nom = request('nom');
            $employe->prenom = request('prenom');
            $employe->datenaissance = request('datenaissance');
            $employe->save();
            break;
         case 'coach':
            $coach = new Coach();
            $coach->nom = request('nom');
            $coach->save();
            break;
         case 'abonne':
            $coach = new Abonne();
            $coach->dateinscription = request('dateinscription');
            $coach->datefincontrat = request('datefincontrat');
            $coach->save();
            break;
         case 'addresse':
            $adresse = new Adresse();
            $adresse->ville = request('ville');
            $adresse->codepostale = request('codepostale');
            $adresse->rue = request('rue');
            $adresse->numeroderue = request('numeroderue');
            $adresse->save();
            break;
         default: return 'Table '.$tableName.' inconnue !';
      }

      return $this->index($tableName);
   }

   public function edit($tableName, $keyName, $keyValue) {
      $data = DB::select("SELECT * FROM ".$tableName." WHERE ".$keyName." = ".$keyValue.";")[0];

      return view('tables.edit', [
         'data' => $data,
         'keyName' => $keyName,
         'keyValue' => $keyValue,
         'tableName' => $tableName,
         'fields' => Schema::getColumnListing($tableName)
      ]);
   }

   public function update(Request $request, $tableName, $keyName, $keyValue) {
      $data = $request->all();

      // Build sql query
      $sqlQuery = "UPDATE ".$tableName." SET ";

      foreach ($data as $key => $val) {
         $sqlQuery .= $key."='".$val."', ";
      }
      // Remove useless ", "
      $sqlQuery = substr($sqlQuery, 0, -2);

      $sqlQuery .= " WHERE ".$keyName."='".$keyValue."';";

      // 100% without any SQL injection
      try {
         DB::statement($sqlQuery);
      } catch (\Throwable $e) {
         $this->addNotif('danger', $e->getMessage());
         return $e->getMessage();
      }

      $this->addNotif('success', 'Modification réussie dans "'.$tableName.'" ('.$keyName.'='.$keyValue.')');

      return redirect('/'.$tableName);
   }

   public function delete(Request $request, $tableName) {
      $availableTables = HomeController::getDBModels();

      if (!in_array($tableName , $availableTables)) {
         return 'La table '.$tableName.' n\'existe pas !';
      }

      $reqJson = json_decode($request->getContent());

      // Validate request body
      if(!property_exists($reqJson, 'keyValue') || !property_exists($reqJson, 'keyName')) {
         return 'Error, body request must be json and give "keyValue" and "keyName" attributes';
      }

      // 100% without any SQL injection
      try {
         DB::statement("DELETE FROM ".$tableName." WHERE ".$reqJson->keyName." = ".$reqJson->keyValue.";");
      } catch (\Throwable $e) {
         $this->addNotif('danger', $e->getMessage());
         return $e->getMessage();
      }

      $msg = 'Suppression réussie dans "'.$tableName.'" ('.$reqJson->keyName.'='.$reqJson->keyValue.')';
      $this->addNotif('success', $msg);
      return $mdg;
   }
}
