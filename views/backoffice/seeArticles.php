<?php ob_start();

  if(isset($_GET['success']))
  echo '<div class="alert alert-success py-2 my-4 text-center font-weight-bold">Article ajoutée !</div>';
  if(isset($_GET['modif']))
    echo '<div class="alert alert-success py-2 my-4 text-center font-weight-bold">Modifications enregistrées !</div>';
?>

<div class="h5 py-4 text-center font-weight-bold">Liste de tous les articles</div>

<table class="table table-striped border text-center">
  <thead>
    <tr>
      <th>Titre</th>
      <th>Date</th>
      <th>Auteur</th>
      <th>Likes</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
    // On récupère les articles, on récupère la page actuel on retire 1 et multiplie par 10 pour récupérer la bonne fourchette d'articles
    $partArticle = Work::getPart(10,($_GET['p'] - 1) * 10);

    foreach($partArticle as $article){
      ?>
      <tr>
        <td><?= $article->getNom(); ?></td>
        <td><?= $article->getPublication(); ?></td>
        <td><?= $article->getNomAuthor(); ?></td>
        <td><?= $article->getLikes(); ?></td>
        <td>
          <a href="?backoffice&type=1&edit&id=<?= $article->getId(); ?>"><i class="fas fa-edit" title="Modifier"></i></a>
          <?php
          if($_SESSION['permission'] == 1){
            ?>
            <a href="controllers/deleteArticle.php?id=<?= $article->getId(); ?>&p=<?= $_GET['p']; ?>" class="ml-2"><i class="fas fa-trash" title="Supprimer"></i></a>
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

  $nbrArray = Work::getCntArticle() / 10;
  if ($nbrArray > 1) {
    for ($i = 1; $i < $nbrArray+1; $i++) {
      echo '<a href="index.php?backoffice&type=1&see&p='.$i.'">'.$i.'</a>';
      if ($i <$nbrArray) echo ' - ';
    }
  }

  $content = ob_get_clean();
?>
