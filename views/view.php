<?php

if (!empty($_GET['id'])) {
  $getArticle = Work::withId($_GET['id']);

  if ($getArticle->getNom() != null) {

  $textes = explode('<br />',nl2br($getArticle->getArticle()));
  ?>
    <div class="container py-4">
      <div class="row">
        <div class="col-4">
          <img src="img/uploads/<?= $getArticle->getImage(); ?>" style="width:265;height:220px" />
        </div>
        <div class="col-8">
          <p class="h1"><?= $getArticle->getNom(); ?></p>
          <p class="articleAuthor pb-4">Par nomAuteur, le 01/01/2001 à 01:01</p>
          <?php
          for ($i=0, $v=count($textes); $i < $v ; $i++) {
            echo '<p>'.$textes[$i].'</p>';
          }
          ?>
        </div>
      </div>
    </div>
  <?php
} else {
    echo '<p>L\'article n\'existe pas !</p>';
  }
}

?>
