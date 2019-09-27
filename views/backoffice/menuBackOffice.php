<?php ob_start(); ?>

<div class="sidenav">
  <button class="dropdown-btn active">Articles
    <i class="fa fa-caret-down"></i>
  </button>
<<<<<<< HEAD
  <div class="dropdown-container" style="display:none">
    <a href="?backoffice&type=1&see&p=1">Voir tous les articles</a>
    <a href="?backoffice&type=1&add">Ajouter un article</a>
=======
  <div class="dropdown-container" style="display:block">
    <a href="index.php?backoffice&type=1&see=1&p=1">Voir tous les articles</a>
    <a href="index.php?backoffice&type=1&add=1">Ajouter un article</a>
>>>>>>> 835437119caa134ed11f222e8b9b2d58a7876804
  </div>

  <button class="dropdown-btn">Gestion d'utilisateurs
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container" style="display:none">
      <a href="?backoffice&type=1&new">Créer un utilisateur</a>
      <a href="?backoffice&type=1&user">Liste des utilisateurs</a>
  </div>

  <a class="disconnect" href="controllers/disconnect.php">Déconnexion</a>
</div>

<?php $menu = ob_get_clean(); ?>
