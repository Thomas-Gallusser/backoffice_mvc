<?php ob_start();

try{ echo $_SESSION['title'] . '<br>'; } catch {}
try{ echo $_SESSION['commentary'] . '<br>'; } catch {}
try{ echo $_SESSION['groupe'] . '<br>'; } catch {}
try{ echo $_SESSION['type'] . '<br>'; } catch {}
?>

<div class="h5 py-4 text-center font-weight-bold">Ajouter un article</div>

<?php if (!empty($_SESSION['title']) || !empty($_SESSION['commentary']) || !empty($_SESSION['groupe']) || !empty($_SESSION['type'])) echo '<p class="text-danger">[ERREUR]: Un champ ou l\'image est manquant(e).</p>'; ?>
<form action="controllers/addWork.php" method="POST" class="workForm" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleFormControlInput1" class="font-weight-bold">Titre de l'article</label>
    <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="titre*" required <?php if(!empty($_SESSION['title'])) echo 'value="'. $_SESSION['title'].'"'; ?>>
  </div>
  <hr class="my-3" />
  <div class="form-group">
    <label for="exampleFormControlInput2" class="font-weight-bold">Groupe</label>
    <input type="text" name="groupe" class="form-control" id="exampleFormControlInput2" placeholder="groupe*" required<?php if(!empty($_SESSION['groupe'])) echo 'value="'. $_SESSION['groupe'].'"'; ?>>
  </div>
  <hr class="my-3" />
  <div class="form-group">
    <label for="exampleFormControlInput3" class="font-weight-bold">Type</label>
    <input type="text" name="type" class="form-control" id="exampleFormControlInput3" placeholder="type*" required<?php if(!empty($_SESSION['type'])) echo 'value="'. $_SESSION['type'].'"'; ?>>
  </div>
  <hr class="my-3" />
  <div class="form-group">
    <label for="exampleFormControlTextarea1" class="font-weight-bold">Texte</label>
    <textarea class="form-control" name="commentary" id="exampleFormControlTextarea1" required<?php if(!empty($_SESSION['commentary'])) echo 'value="'. $_SESSION['commentary'].'"'; ?>></textarea>
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

<?php
unset($_SESSION['title']);
unset($_SESSION['commentary']);
unset($_SESSION['groupe']);
unset($_SESSION['type']);
$content = ob_get_clean(); ?>
