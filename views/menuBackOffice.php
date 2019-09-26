<?php ob_start(); ?>

<div class="sidenav">
  <button class="dropdown-btn active">Articles
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container" style="display:block">
<<<<<<< HEAD
    <a href="index.php?backoffice=1&type=1&add=1&nbr=1">Voir tous les articles</a>
    <a href="index.php?backoffice=1&type=1&see=1">Ajouter un article</a>
=======
    <a href="index.php?backoffice=1&type=1&see=1">Voir tous les articles</a>
    <a href="index.php?backoffice=1&type=1&add=1">Ajouter un article</a>
>>>>>>> 60d584767829e70c78a9803fa1ac7d0c47cac00d
  </div>

  <a class="disconnect" href="controllers/disconnect.php">Déconnexion</a>
</div>

<?php $menu = ob_get_clean(); ?>
