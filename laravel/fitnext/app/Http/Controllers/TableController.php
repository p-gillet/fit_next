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

   public function create($tableName, $keyName) {
      return view('tables.create', [
         'keyName' => $keyName,
         'tableName' => $tableName,
         'fields' => Schema::getColumnListing($tableName)
      ]);
   }

   public function store(Request $request, $tableName, $keyName) {
      $data = $request->all();

      // Build sql query
      $sqlQuery = "INSERT INTO ".$tableName." (";

      foreach (array_keys($data) as $key) {
         $sqlQuery .= $key.", ";
      }
      // Remove useless ", "
      $sqlQuery = substr($sqlQuery, 0, -2);

      $sqlQuery .= ") VALUES (";

      foreach ($data as $val) {
         $sqlQuery .= "'".$val."', ";
      }
      // Remove useless ", "
      $sqlQuery = substr($sqlQuery, 0, -2);

      $sqlQuery .= ");";

      // 100% without any SQL injection
      try {
         DB::statement($sqlQuery);
      } catch (\Throwable $e) {
         $this->addNotif('danger', $e->getMessage());
         return redirect('/'.$tableName);
      }

      $this->addNotif('success', 'Création réussie dans "'.$tableName.'"');
      return redirect('/'.$tableName);
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
         return redirect('/'.$tableName);
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
