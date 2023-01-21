@extends('layouts.main')

@section('title', 'Vue '.$viewName)

@section('content')

<a href="/">Retour à la page d'accueil</a>

<h1>Vue "<?= $viewName?>"</h1>

<table class="table">
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

   th {
      padding-left: 15px;
      padding-right: 15px;
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
</style>