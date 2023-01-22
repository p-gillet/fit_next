@extends('layouts.main')

@section('title', 'Table '.$tableName)

@section('content')

<a href="/" class="goBack">Retour à la page d'accueil</a>

<h1>Table "<?= $tableName?>"</h1>

<?php if ($keyName != null) :?>
<a class="btn btn-add" href="/<?=$tableName?>/create/<?=$keyName?>">Crée une entrée</a>
<?php endif;?>

<div><?= sizeof($data) > 0 ? '' : 'Cette table est vide !'?></div>

<table class="table">
<thead>
   <tr>
      <?php foreach ($fields as $field): ?>
         <th><?=$field?></th>
      <?php endforeach; ?>
      <?php if ($keyName != null) :?>
         <th><!-- Modifier --></th>
         <th><!-- Supprimer --></th>
      <?php endif;?>
   </tr>
</thead>

<tbody>
   <?php foreach ($data as $row): ?>
      <tr>
         <?php foreach ($fields as $field): ?>
            <td><?=$row[$field] == null ? 'NULL' : $row[$field]?></td>
         <?php endforeach; ?>
         <?php if ($keyName != null) :?>
            <td class="modifyDelete modify" onClick="onEdit('<?=$row[$keyName]?>')">Modifier</td>
            <td class="modifyDelete delete" onClick="onDelete('<?=$row[$keyName]?>')">Supprimer</td>
         <?php endif;?>
      </tr>
   <?php endforeach; ?>
</tbody>
</table>

<script>
   const onEdit = (keyValue) => {
      window.location.href='/<?=$tableName?>/edit/<?=$keyName?>/' + keyValue;
   }

   const onDelete = async (keyValue) => {
      await fetch('/<?=$tableName?>/delete', {
         method: 'delete',
         headers: {
            'Content-Type': "application/json"
         },
         body: JSON.stringify({
            keyName: '<?=$keyName?>',
            keyValue,
         })
      });

      // Refresh page
      window.location.href='/<?=$tableName?>';
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