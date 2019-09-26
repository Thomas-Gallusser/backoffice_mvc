<?php ob_start(); ?>

<div class="h5 py-4 text-center font-weight-bold">Ajouter un article</div>

<?php if (!empty($_GET['atitle']) || !empty($_GET['acommentary']) || !empty($_GET['agroupe']) || !empty($_GET['atype'])) echo '<p class="text-danger">[ERREUR]: Un champ ou l\'image est manquant(e).</p>'; ?>
<form action="controllers/addWork.php" method="POST" class="workForm" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleFormControlInput1" class="font-weight-bold">Titre de l'article</label>
    <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="titre*" required <?php if(!empty($_GET['atitle'])) echo 'value="'. $_GET['atitle'].'"'; ?>>
  </div>
  <hr class="my-3" />
  <div class="form-group">
    <label for="exampleFormControlInput2" class="font-weight-bold">Groupe</label>
    <input type="text" name="groupe" class="form-control" id="exampleFormControlInput2" placeholder="groupe*" required <?php if(!empty($_GET['agroupe'])) echo 'value="'. $_GET['agroupe'].'"'; ?>>
  </div>
  <hr class="my-3" />
  <div class="form-group">
    <label for="exampleFormControlInput3" class="font-weight-bold">Type</label>
    <input type="text" name="type" class="form-control" id="exampleFormControlInput3" placeholder="type*" required <?php if(!empty($_GET['atype'])) echo 'value="'. $_GET['atype'].'"'; ?>>
  </div>
  <hr class="my-3" />
  <div class="form-group">
    <label for="exampleFormControlTextarea1" class="font-weight-bold">Texte</label>
    <textarea class="form-control" name="commentary" id="exampleFormControlTextarea1" required><?php if(!empty($_GET['acommentary'])) echo $_GET['acommentary']; ?></textarea>
  </div>
  <hr class="my-3" />
  <div class="row">
    <div class="col-4">
      <img id="preview" alt="Insérer une image" />
    </div>
    <div class="col-8">
      <div class="form-group">
        <label for="exampleFormControlFile1" class="font-weight-bold">Image</label>
        <input type="file" name="img" class="form-control-file" onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])">
      </div>
    </div>
  </div>
  <hr class="my-3" />
  <div class="form-group">
    <button class="form-control btn-primary">Ajouter l'article</button>
  </div>
</form>

<?php $content = ob_get_clean(); ?>
