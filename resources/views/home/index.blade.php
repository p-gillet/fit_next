@extends('layouts.main')

@section('title', 'Accueil')

@section('content')
<div class="container">
   <div class="header">
      <h1>Fonctionalités</h1>
      <div class="tables">
         <a class="tableLink" href="/features/addNewClient">Ajouter une personne (abonné/coach/employé)</a>
         <a class="tableLink" href="/features/organizeCourse">Organisation des cours collectifs</a>
      </div>
   </div>

   <div class="header">
      <h1>Afficher une table</h1>
      <div class="tables">
         <?php foreach ($models as $model): ?>
            <a class="tableLink" href="/<?= $model?>"><?= $model ?></a>
         <?php endforeach; ?>
      </div>
   </div>

   <div class="header">
      <h1>Afficher une vue</h1>
      <div class="tables">
         <?php foreach ($views as $view): ?>
            <a class="tableLink" href="/view/<?= $view?>"><?= $view ?></a>
         <?php endforeach; ?>
      </div>
   </div>
</div>

<style>
   .container {
      display: flex;
   }

   .header {
      flex-grow: 1;
   }
   
   .tables {
      display: flex;
      flex-direction: column;
   }

   .tableLink {
      text-decoration: none;
      transition: 0.2s;
      padding: 5px;
      margin: 5px;
      border-radius: 5px;
      background-color: white;
   }

   .tableLink:hover {
      color: white;
      background-color: coral;
   }
</style>