@extends('layouts.main')

@section('title', $tableName)

@section('content')

<h1>Affichage de la table <?= $tableName?></h1>

<table>
<thead>
   <tr>
   <?php foreach ($fields as $field): ?>
      <th><?=$field?></th>
   <?php endforeach; ?>
   </tr>
</thead>

<tbody>
   <?php foreach ($data as $row): ?>
      <tr>
      <?php foreach ($fields as $field): ?>
      <td><?=$row->$field?></td>
      <?php endforeach; ?>
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
      background-color: bisque !important;
      transition: .1s;
   }
</style>