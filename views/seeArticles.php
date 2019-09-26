<?php ob_start();

$allArticles = Work::getAll();
?>

<div class="h5 py-4 text-center font-weight-bold">Liste de tous les articles</div>

<table class="table table-striped border text-center">
  <thead>
    <tr>
      <th>Titre</th>
      <th>Groupe</th>
      <th>Type</th>
      <th>Likes</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
    // foreach($allArticles as $article){
    //   echo '<tr>
    //     <td>'.$article->getNom().'</td>
    //     <td>'.$article->getGroupe().'</td>
    //     <td>'.$article->getType().'</td>
    //     <td>'.$article->getLikes().'</td>
    //     <td>
    //       <a href="index.php?backoffice=1&type=1&edit=1&id='.$article->getId().'"><i class="fas fa-edit" title="Modifier"></i></a>
    //       <a href="controllers/deleteArticle.php?id='.$article->getId().'" class="ml-2"><i class="fas fa-trash" title="Supprimer"></i></a>
    //     </td>
    //   </tr>';
    // }

    // On récupère les articles, on récupère la page actuel on retire 1 et multiplie par 10 pour récupérer la bonne fourchette d'articles
    $partArticle = Work::getPart(10,($_GET['p'] - 1) * 10);

    foreach($partArticle as $article){
      echo '<tr>
        <td>'.$article->getNom().'</td>
        <td>'.$article->getGroupe().'</td>
        <td>'.$article->getType().'</td>
        <td>'.$article->getLikes().'</td>
        <td>
          <a href="index.php?backoffice=1&type=1&edit=1&id='.$article->getId().'"><i class="fas fa-edit" title="Modifier"></i></a>
          <a href="controllers/deleteArticle.php?id='.$article->getId().'&p='.$_GET['p'].'" class="ml-2"><i class="fas fa-trash" title="Supprimer"></i></a>
        </td>
      </tr>';
    }
    ?>
  </tbody>
</table>

<?php

  $nbrArray = Work::getCntArticle() / 10;
  for ($i = 1; $i < $nbrArray; $i++) {
    echo '<a href="index.php?backoffice=1&type=1&see=1?p='.$i.'">'.$i.'</a>';
  }

  $content = ob_get_clean();
?>
