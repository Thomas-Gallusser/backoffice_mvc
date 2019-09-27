<?php ob_start();
if(isset($_GET['id']) && is_numeric($_GET['id'])){
  $user = User::withId($_GET['id']);
?>

<div class="h5 py-4 text-center font-weight-bold">Modifier l'article</div>

<form action="controllers/editUser.php" method="POST" class="workForm" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleFormControlInput1" class="font-weight-bold">ID</label>
    <input type="text" name="id" class="form-control" id="exampleFormControlInput1" disabled value="<?= $user->getId(); ?>">
  </div>
  <hr class="my-3">
  <div class="form-group">
    <label for="exampleFormControlInput2" class="font-weight-bold">Login</label>
    <input type="text" name="login" class="form-control" id="exampleFormControlInput2" placeholder="login*" value="<?= $user->getLogin(); ?>">
  </div>
  <hr class="my-3">
  <div class="form-group">
    <label for="exampleFormControlInput3" class="font-weight-bold">Password</label>
    <input type="text" name="psw" class="form-control" id="exampleFormControlInput3" placeholder="password" value="">
  </div>
  <hr class="my-3">
  <div class="form-group">
    <label for="exampleFormControlInput2" class="font-weight-bold">Permission - </label><span class="text-center font-italic"> 1 = administrateur, 2 = rédacteur</span>
    <input type="number" name="perm" class="form-control" id="exampleFormControlInput2" placeholder="permission*" required value="<?= $user->getPermission(); ?>" min="1" max="2">
  </div>
  <hr class="my-3">
  <div class="form-group">
    <button class="form-control btn-primary">Modifier l'utilisateur</button>
  </div>
</form>

<?php
}
else {
  echo 'aucun article';
}

$content = ob_get_clean(); ?>
