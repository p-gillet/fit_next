<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
   // List all models of DB
   public static function getDBModels() {
      // Get all files in directory
      $path = "../app/Models";
      $files = array_diff(scandir($path), array('.', '..'));
      foreach ($files as &$filename) {
         // remove .php
         $filename = substr($filename, 0, -4);

         // lowercase
         $filename = strtolower($filename);
      }

      return $files;
   }

   public function index() {
      return view('home.index', ['models' => $this->getDBModels()]);
  }
}
