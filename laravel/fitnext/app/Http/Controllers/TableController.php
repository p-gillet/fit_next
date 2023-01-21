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

      return view('tables.index', [
         'tableName' => $tableName,
         'data' => $modelClass::all(),
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
      //TODO

      return $this->index($tableName);
   }

   public function edit($tableName) {
      return view('tables.edit', [
         'tableName' => $tableName,
         'fields' => Schema::getColumnListing($tableName)
      ]);
   }

   public function update($tableName) {
      //TODO

      return $this->index($tableName);
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
         return $e->getMessage();
      }

      return 'Delete sucessfull ('.$reqJson->keyName.'='.$reqJson->keyValue.')';
   }
}
