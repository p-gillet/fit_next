@extends('layouts.main')

@section('title', 'Table', 'organizeCourse')

@section('content')

<a href="/" class="goBack">Retour à la page d'accueil</a>

<h1>Cours organisés</h1>

<a class="btn btn-add" href="/features/organizeCourse/create">Créer un cours</a>

<table class="table">
<thead>
    <tr>
    <th>Type de cours</th>
    <th>Heure</th>
    <th>Date</th>
    <th>Local</th>
    <th><!-- Modifier --></th>
    <th><!-- Supprimer --></th>
   </tr>
</thead>

<tbody>
@foreach($cours as $row)
      <tr>
         <td>{{ $row->typecours }}</td>
            <td>{{ $row->heurecours }}</td>
            <td>{{ $row->datecours }}</td>
            <td>{{ $row->numlocal }}</td>
      <td class="modifyDelete modify" onClick="onEdit('<?=$row->getKey()?>')">Modifier</td>
      <td class="modifyDelete delete" onClick="onDelete('/features/organizeCourse/delete/{{ $row->numcours }}')">Supprimer</td>
      </tr>
      @endforeach
</tbody>
</table>

<script>
   const onEdit = ($key) => {
      window.location.href='/features/organizeCourse/edit/' + $key + '';
   }

   const onDelete = (url) => {
      window.location.href = url;
   }
</script>

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