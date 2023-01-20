<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
   public function index() {
      // List all models of DB

      // Get all files in directory
      $path = "../app/Models";
      $files = array_diff(scandir($path), array('.', '..'));
      foreach ($files as &$filename) {
         // remove .php
         $filename = substr($filename, 0, -4);

         // lowercase
         $filename = strtolower($filename);
      }

      return view('home.index', ['models' => $files]);
  }
}
