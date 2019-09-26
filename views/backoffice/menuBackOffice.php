<?php ob_start(); ?>

<div class="sidenav">
  <button class="dropdown-btn">Articles
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container" style="display:none">
    <a href="index.php?backoffice&type=1&see=1&p=1">Voir tous les articles</a>
    <a href="index.php?backoffice&type=1&add=1">Ajouter un article</a>
  </div>

    <a href="index.php?backoffice&type=1&new">Créer un utilisateur</a>

  <a class="disconnect" href="controllers/disconnect.php">Déconnexion</a>
</div>

<?php $menu = ob_get_clean(); ?>
