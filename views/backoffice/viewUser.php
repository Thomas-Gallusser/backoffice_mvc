<?php ob_start();

  if(isset($_GET['success']))
    echo '<div class="alert alert-success py-2 my-4 text-center font-weight-bold">Utilisateur ajouté !</div>';
  if(isset($_GET['modif']))
    echo '<div class="alert alert-success py-2 my-4 text-center font-weight-bold">Modifications enregistrées !</div>';
?>

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

    if (count($partUser) == 0 && ($_GET['p'] > 1)) header('Location: ?backoffice&type=1&user&p=' . ($_GET['p'] -1));

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
          <a href="?backoffice&type=1&useredit&id=<?= $user->getId(); ?>"><i class="fas fa-edit" title="Modifier"></i></a>
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
    echo '<br><nav aria-label="...">
            <ul class="pagination justify-content-center">';

    for ($i = 1; $i < $nbrArray+1; $i++) {
      echo '<li class="page-item'.(($i==$_GET['p'])? ' active':'').'"><a href="index.php?backoffice&type=1&user&p='.$i.'" class="page-link">'.$i.'</a></li>';
    }

    echo '</ul>
        </nav>';
  }

  $content = ob_get_clean();
?>
