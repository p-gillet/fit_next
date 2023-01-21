<html>
   <div class="container">
      <div class="header">
         <h1>Afficher une table</h1>
         <div class="tables">
            <?php foreach ($models as $model): ?>
               <a href="/<?= $model?>"><?= $model ?></a>
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

   <?php require('global_style.php'); ?>
   
   <style>
      .container {
         display: flex;
         margin-left: 50px;
      }

      .header {
         flex-grow: 1;
      }
      
      .tables {
         display: flex;
         flex-direction: column;
      }

      a {
         text-decoration: none;
         transition: 0.2s;
         padding: 5px;
         margin: 5px 50px 5px 50px;
         border-radius: 5px;
         background-color: white;
      }

      a:hover {
         color: white;
         background-color: coral;
      }
   </style>
</html>