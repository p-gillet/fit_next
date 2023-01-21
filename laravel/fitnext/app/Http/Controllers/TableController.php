<?php

namespace App\Http\Controllers;

use Schema;

class TableController extends Controller
{
   public function index($tableName) {
      // Récupère la classe Model à partir du nom de la table
      $modelClass = 'App\Models\\' . ucfirst($tableName);
      if (!class_exists($modelClass)) {
         return 'La table ' . $tableName . ' n\'existe pas !';
      }

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

   public function delete($tableName) {
      //TODO

      return $this->index($tableName);
   }
}
