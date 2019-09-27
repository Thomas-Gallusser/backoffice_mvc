<?php ob_start(); ?>

<div class="sidenav">
  <button class="dropdown-btn">Articles
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container" style="display:none">
    <a href="?backoffice&type=1&see&p=1">Voir tous les articles</a>
    <a href="?backoffice&type=1&add">Ajouter un article</a>
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
