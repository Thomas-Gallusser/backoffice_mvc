<div class="container h-100 w-25">
  <div class="row h-100 justify-content-center align-items-center">
    <form class="col-12" method="POST" action="controllers/login.php">
      <div class="h4 text-center pb-3">Connexion au Backoffice</div>

      <?php
      if(isset($_GET['error']))
        echo '<div class="alert alert-danger py-2 my-4 text-center font-weight-bold">Informations de connexion incorrects !</div>';
      ?>

      <div class="form-group">
        <label for="formGroupExampleInput">Login</label>
        <input type="text" name="login" class="form-control" id="formGroupExampleInput" required autofocus>
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput2">Mot de passe</label>
        <input type="password" name="pwd" class="form-control" id="formGroupExampleInput2" required>
      </div>
      <div class="form-group">
        <button class="form-control btn-primary">Connexion</button>
      </div>
    </form>
  </div>
</div>
