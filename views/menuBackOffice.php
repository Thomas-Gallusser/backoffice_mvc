<?php ob_start(); ?>

<div class="sidenav">
  <button class="dropdown-btn">Articles
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="#">Voir tous les articles</a>
    <a href="index.php?backoffice=1&type=1&see=1">Ajouter un article</a>
    <a href="#">Modifier un article</a>
    <a href="#">Supprimer un article</a>
  </div>
  <a class="disconnect" href="controllers/disconnect.php">Déconnexion</a>
</div>

<?php $menu = ob_get_clean(); ?>
