<html>
  <?php foreach ($models as $model): ?>
   <div class="col-md-4">
      <a class="text-center mt-3" href="/<?= $model?>"><?= $model ?></a>
   </div>
   <?php endforeach; ?>
</html>