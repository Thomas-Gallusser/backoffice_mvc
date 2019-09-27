<?php ob_start();

if(isset($_GET['error']))
  echo '<div class="alert alert-danger py-2 my-4 text-center font-weight-bold">Informations incorrects !</div>';
?>

<div class="h5 py-4 text-center font-weight-bold">Ajouter un article</div>
<form action="controllers/addWork.php" method="POST" class="workForm" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleFormControlInput1" class="font-weight-bold">Titre de l'article</label>
    <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="titre*" required <?php if(!empty($_GET['atitle'])) echo 'value="'. $_GET['atitle'].'"'; ?>>
  </div>
  <!-- <hr class="my-3" /> -->
  <!-- <div class="form-group">
    <label for="exampleFormControlInput2" class="font-weight-bold">Groupe</label>
    <input type="text" name="groupe" class="form-control" id="exampleFormControlInput2" placeholder="groupe*" required <?php //if(!empty($_GET['agroupe'])) echo 'value="'. $_GET['agroupe'].'"'; ?>>
  </div>
  <hr class="my-3" />
  <div class="form-group">
    <label for="exampleFormControlInput3" class="font-weight-bold">Type</label>
    <input type="text" name="type" class="form-control" id="exampleFormControlInput3" placeholder="type*" required <?php //if(!empty($_GET['atype'])) echo 'value="'. $_GET['atype'].'"'; ?>>
  </div> -->
  <hr class="my-3">
  <div class="form-group">
    <label for="exampleFormControlTextarea1" class="font-weight-bold">Texte</label>
    <textarea class="form-control" name="commentary" id="exampleFormControlTextarea1" required><?php if(!empty($_GET['acommentary'])) echo $_GET['acommentary']; ?></textarea>
  </div>
  <hr class="my-3">
  <div class="row">

    <input name="galery" type="hidden" id="imgFromGalery" value="">
    <!-- Image chosen -->
    <div class="col-4 text-center">
      <img id="preview" src="img/default.jpg">
    </div>
    <!-- Galery to chose-->
    <div class="col-4">
      <div id="linkGalery" class="w-75 text-center rounded" onClick="toggleGalery()">
        Choisir depuis la galerie
      </div>
    </div>
    <!-- Direct upload image -->
    <div class="col-4">
      <label class="fileContainer rounded text-center">
        Upload direct
        <input type="file" name="img" onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])">
      </label>
    </div>
  </div>
  <hr class="my-3">

  <div class="form-group">
    <button class="form-control btn-primary">Ajouter l'article</button>
  </div>
</form>


<?php

$content = ob_get_clean();

$tableImg = [];
$handle = opendir('img/uploads/');
while($file = readdir($handle)){
  if($file !== '.' && $file !== '..'){
    array_push($tableImg, $file);
  }
}
$nbImg = count($tableImg);
?>
<script>
var tableImg = <?php echo json_encode($tableImg); ?>;
var nbImg = tableImg.length;
</script>
