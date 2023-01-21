@extends('layouts.main')

@section('title', 'table')

@section('content')
<div class="container">
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
         <p>a</p>
         <p>b</p>
         <p>c</p>
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
      margin: 5px 50px 5px 50px;
      border-radius: 5px;
      background-color: white;
   }

   .tableLink:hover {
      color: white;
      background-color: coral;
   }
</style>