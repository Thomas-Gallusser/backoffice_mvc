<?php ob_start();
if(isset($_GET['id']) && is_numeric($_GET['id'])){
  $article = Work::withId($_GET['id']);

  if(isset($_GET['error']))
    echo '<div class="alert alert-danger py-2 my-4 text-center font-weight-bold">Informations incorrects !</div>';
  ?>

<div class="h5 py-4 text-center font-weight-bold">Modifier l'article</div>

<form action="controllers/modifyArticle.php" method="POST" class="workForm" enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?= $article->getId(); ?>" />

  <div class="form-group">
    <label for="exampleFormControlInput1" class="font-weight-bold">Titre de l'article</label>
    <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="titre*" required value="<?= $article->getNom(); ?>">
  </div>
  <hr class="my-3" />
  <div class="form-group">
    <label for="exampleFormControlInput2" class="font-weight-bold">Date</label>
    <input type="text" name="groupe" class="form-control" id="exampleFormControlInput2" placeholder="groupe*"<?php if ($_SESSION['permission'] == '1') echo ' required '; else echo ' disabled '; ?>value="<?= $article->getPublication(); ?>">
  </div>
  <hr class="my-3" />
  <div class="form-group">
    <label for="exampleFormControlInput3" class="font-weight-bold">Auteur</label>
    <input type="text" name="type" class="form-control" id="exampleFormControlInput3" placeholder="type*"<?php if ($_SESSION['permission'] == '1') echo ' required '; else echo ' disabled '; ?>value="<?= $article->getAuthor_id(); ?>">
  </div>
  <hr class="my-3" />
  <div class="form-group">
    <label for="exampleFormControlTextarea1" class="font-weight-bold">Texte</label>
    <textarea class="form-control" name="commentary" id="exampleFormControlTextarea1" required><?= $article->getArticle(); ?></textarea>
  </div>
  <hr class="my-3" />
  <div class="form-group">
    <label for="exampleFormControlFile1" class="font-weight-bold">Image</label>
    <input type="file" name="img" class="form-control-file">
  </div>
  <hr class="my-3" />
  <div class="form-group">
    <button class="form-control btn-primary">Modifier l'article</button>
  </div>
</form>

<?php
}
else {
  echo 'aucun article';
}

$content = ob_get_clean(); ?>
