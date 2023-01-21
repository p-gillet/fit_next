<a href="/">Retour à l'index</a>

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
