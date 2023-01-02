<div class="container">
  <div class="row">
    
        <?php foreach ($adresses as $adresse): ?>
        <div class="col-md-4">
          <h1 class="text-center mt-3"><?= $adresse->rue ?></h1>
        </div>
        <?php endforeach; ?>
  </div>
</div>
