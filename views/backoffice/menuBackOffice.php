<?php ob_start(); ?>

<div class="sidenav">
  <button class="dropdown-btn active">Articles
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container" style="display:block">
    <a href="?backoffice&type=1&see&p=1">Voir tous les articles</a>
    <a href="?backoffice&type=1&add">Ajouter un article</a>
  </div>

  <button class="dropdown-btn active">Gestion d'utilisateurs
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container" style="display:block">
    <a href="?backoffice&type=1&user">Liste des utilisateurs</a>
    <a href="?backoffice&type=1&new">Créer un utilisateur</a>
  </div>

  <a class="disconnect" href="controllers/disconnect.php">Déconnexion</a>
</div>

<?php $menu = ob_get_clean(); ?>
