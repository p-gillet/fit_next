@extends('layouts.main')

@section('title', $tableName)

@section('content')

<h1>Table <?= $tableName?></h1>

<a class="btn btn-add" href="/">Ajouter une ligne</a>

<table class="table">
<thead>
   <tr>
   <?php foreach ($fields as $field): ?>
      <th><?=$field?></th>
   <?php endforeach; ?>
   <th><!-- Modifier --></th>
   <th><!-- Supprimer --></th>
   </tr>
</thead>

<tbody>
   <?php foreach ($data as $row): ?>
      <tr>
      <?php foreach ($fields as $field): ?>
      <td><?=$row->$field?></td>
      <?php endforeach; ?>
      <td class="modifyDelete modify">Modifier</td>
      <td class="modifyDelete delete">Supprimer</td>
      </tr>
   <?php endforeach; ?>
</tbody>
</table>

<style>
   td {
      background-color: #fff;
      padding: 10px;
      transition: .5s;
   }

   tr:nth-child(even) > td {
      background-color: #fee;
   }

   tr:hover > td {
      background-color: bisque;
      transition: .1s;
   }

   .table {
      margin-top: 30px;
      border-collapse: collapse;
   }

   .modifyDelete {
      font-weight: 1000;
      user-select: none;
   }

   .modifyDelete:hover {
      cursor: pointer;
   }

   .modify {
      color: orange;
   }

   .delete {
      color: red;
   }

   .modify:hover {
      background-color: orange;
      color: white;
   }

   .delete:hover {
      background-color: red;
      color: white;
   }

   /*!!!!!!*/
   .btn-add {
      border-style: solid !important;
      border-width: 2px;
      border-color: green;
   }
   .btn-add:hover {
      background-color: green !important;
      color: white !important;
   }
</style>