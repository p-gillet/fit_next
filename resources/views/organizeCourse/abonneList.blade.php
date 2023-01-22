@extends('layouts.main')

@section('title', 'Table', 'organizeCourse')

@section('content')

<a href="/" class="goBack">Retour à la page d'accueil</a>

<h1>Cours organisés</h1>

<a class="btn btn-add" href="/features/organizeCourse/create">Créer une entrée</a>

<form action="/features/organizeCourse/estvenu/{{ $cours->numcours }}" method="POST">
<table class="table">
<thead>
    <tr>
        <th>Numéro AVS</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Est venu</th>
    </tr>
</thead>

<tbody>
@foreach($abonnes as $row)
      <tr>
         <td>{{ $row->numavs }}</td>
            <td>{{ $row->nom }}</td>
            <td>{{ $row->prenom }}</td>
            <td><label for="{{ $row->numavs }}"><input id="{{ $row->numavs }}" type="checkbox" @if($row->estvenu){ checked="checked" } @endif name="{{ $row->numavs }}"></td>
      </tr>
@endforeach
</tbody>
</table>
<button type="submit">Enregistrer</button>
</form>

<script>
   const onEdit = ($key) => {
      window.location.href='/features/organizeCourse/edit/' + $key + '';
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