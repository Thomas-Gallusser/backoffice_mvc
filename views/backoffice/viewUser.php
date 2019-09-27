<?php ob_start(); ?>

<div class="h5 py-4 text-center font-weight-bold">Liste de tous les articles</div>

<table class="table table-striped border text-center">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nom</th>
      <th>Permission</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
    // On récupère les articles, on récupère la page actuel on retire 1 et multiplie par 10 pour récupérer la bonne fourchette d'articles
    $partUser = User::getPart(10,($_GET['p'] - 1) * 10);

    foreach($partUser as $user){
      ?>
      <tr>
        <td><?= $user->getId(); ?></td>
        <td><?= $user->getLogin(); ?></td>
        <td><?= $user->getPermission(); ?></td>
        <td>
          <?php
          if($_SESSION['permission'] == 1){
            ?>
          <a href="backoffice&type=1&useredit&id=<?= $user->getId(); ?>"><i class="fas fa-edit" title="Modifier"></i></a>
            <a href="controllers/deleteUser.php?id=<?= $user->getId(); ?>&p=<?= $_GET['p']; ?>" class="ml-2"><i class="fas fa-trash" title="Supprimer"></i></a>
            <?php
          }
          ?>
        </td>
      </tr>
    <?php
    }
    ?>
  </tbody>
</table>

<?php

  $nbrArray = User::getCntArticle() / 10;
  if ($nbrArray > 1) {
    for ($i = 1; $i < $nbrArray+1; $i++) {
      echo '<a href="index.php?>backoffice&type=1&seeuser=1&p='.$i.'">'.$i.'</a>';
      if ($i <$nbrArray) echo ' - ';
    }
  }

  $content = ob_get_clean();
?>
