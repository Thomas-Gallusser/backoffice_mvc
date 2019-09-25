<?php ob_start(); ?>

<div class="h5 py-4 text-center font-weight-bold">Ajouter un article</div>

<form action="controllers/addWork.php" method="POST" class="workForm">
  <div class="form-group">
    <label for="exampleFormControlInput1" class="font-weight-bold">Titre de l'article</label>
    <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="titre*" required>
  </div>
  <hr class="my-3" />
  <div class="form-group">
    <label for="exampleFormControlInput2" class="font-weight-bold">Groupe</label>
    <input type="text" name="groupe" class="form-control" id="exampleFormControlInput2" placeholder="groupe*" required>
  </div>
  <hr class="my-3" />
  <div class="form-group">
    <label for="exampleFormControlInput3" class="font-weight-bold">Type</label>
    <input type="text" name="type" class="form-control" id="exampleFormControlInput3" placeholder="type*" required>
  </div>
  <hr class="my-3" />
  <div class="form-group">
    <label for="exampleFormControlTextarea1" class="font-weight-bold">Texte</label>
    <textarea class="form-control" name="commentary" id="exampleFormControlTextarea1" required></textarea>
  </div>
  <hr class="my-3" />
  <div class="form-group">
    <label for="exampleFormControlFile1" class="font-weight-bold">Image</label>
    <input type="file" name="img" class="form-control-file">
  </div>
  <hr class="my-3" />
  <div class="form-group">
    <button class="form-control btn-primary">Ajouter l'article</button>
  </div>
</form>

<?php $content = ob_get_clean(); ?>
