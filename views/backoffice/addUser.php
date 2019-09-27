<?php ob_start();

if(isset($_GET['error']))
  echo '<div class="alert alert-danger py-2 my-4 text-center font-weight-bold">Informations incorrects !</div>';
?>
<div class="h5 py-4 text-center font-weight-bold">Créer un utilisateur</div>

<form action="controllers/addUser.php" method="POST" class="workForm" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleFormControlInput1" class="font-weight-bold">Nom de l'utilisateur</label>
    <input type="text" name="login" class="form-control" id="exampleFormControlInput1" placeholder="nom d'utilisateur*" required>
  </div>
  <hr class="my-3">
  <div class="form-group">
    <label for="exampleFormControlInput2" class="font-weight-bold">Mot de passe</label>
    <input type="password" name="mdp" class="form-control" id="exampleFormControlInput2" placeholder="mot de passe*" required>
  </div>
  <hr class="my-3">
  <div class="form-group">
    <label for="exampleFormControlInput2" class="font-weight-bold">Permission - </label><span class="text-center font-italic"> 1 = administrateur, 2 = rédacteur</span>
    <input type="number" name="perm" class="form-control" id="exampleFormControlInput2" placeholder="permission*" required value="1" min="1" max="2">
  </div>

  <div class="form-group">
    <button class="form-control btn-primary">Créer l'utilisateur</button>
  </div>
</form>


<?php $content = ob_get_clean(); ?>
