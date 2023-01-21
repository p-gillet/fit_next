@extends('layouts.main')

@section('title', 'Création dans '.$tableName)

@section('content')

<a href="/<?=$tableName?>">Retour à la la liste des valeurs de <?= $tableName?></a>

<h1>Création d'une entrée dans la table <?= $tableName?></h1>

<form action="/<?=$tableName?>/store" method="POST">
   <?php foreach ($fields as $field): ?>
      <div class="form-elem">
         <label for="<?=$field?>"><?=$field?> : </label>
         <input name="<?=$field?>" placeholder="<?=$field?>"/>
      </div>
   <?php endforeach; ?>
   <input class="btn btn-submit" type="submit" value="Créer une entrée"/>
</form>

<style>
.form-elem {
   position: relative;
   width: 100%;
   display: block;
}

.form-elem > label {
   display: block;
   font-size: 22px;
   padding: 5px;
}

.form-elem > input {
   font-size: 22px;
   width: 100%;
   border-style: solid;
   border-color: black;
   border-width: 2px;
   height: 50px;
   padding: 5px;
   margin-bottom: 20px;
}

.btn-submit {
   font-size: 25px;
   width: 100%;
   margin-bottom: 50px;
   border-color: green !important;
   border-style: solid !important;
   cursor: pointer;
}

.btn-submit:hover {
   color: white !important;
   background-color: green !important;
}
</style>