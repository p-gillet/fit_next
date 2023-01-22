<?php

namespace App\Http\Controllers;

use DB;

class ViewController extends Controller
{
   public static function getAllViews() {
      $viewsRaw =  DB::select("SELECT table_name AS view
      FROM information_schema.views
      WHERE table_schema NOT IN ('information_schema', 'pg_catalog');");

      $viewNames = [];
      foreach ($viewsRaw as $viewRaw) {
         array_push($viewNames, $viewRaw->view);
      }

      return $viewNames;
   }

   public static function getViewFields($viewName) {
      $fieldsRaw = DB::select("SELECT column_name
      FROM information_schema.columns
      WHERE table_name = '".$viewName."';");

      $fieldNames = [];
      foreach ($fieldsRaw as $fieldRaw) {
         array_push($fieldNames, $fieldRaw->column_name);
      }

      return $fieldNames;
   }

   public function index($viewName) {
      $availableViews = $this->getAllViews();
      
      if (!in_array($viewName, $availableViews)) {
         return 'La vue '.$viewName.' n\'existe pas !';
      }

      $data = DB::select("SELECT * FROM ".$viewName);
      
      return view('views.index', [
         'data' => $data,
         'viewName' => $viewName,
         'fields' => $this->getViewFields($viewName)
      ]);
   }
}
