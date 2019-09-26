<?php

if (!empty($_GET['id'])) {
  $getArticle = Work::withId($_GET['id']);

  if ($getArticle->getNom() != null) {
    echo $getArticle->getNom() . '<br>';
    echo $getArticle->getArticle() . '<br>';
    echo $getArticle->getGroupe() . '<br>';
    echo $getArticle->getType() . '<br>';
    echo $getArticle->getLikes() . '<br>';
    echo $getArticle->getImage();
  } else {
    echo 'L\'article n\'existe pas !';
  }
}

?>
