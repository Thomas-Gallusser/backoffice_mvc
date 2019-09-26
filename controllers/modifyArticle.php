<?php
  session_start();

  require('../conf/settings.php');
  require('../lib/database.lib.php');
  require('../models/work.php');

  if (!empty($_POST['title']) && !empty($_POST['commentary']) && !empty($_POST['groupe']) && !empty($_POST['type'])) {

    $getArticle = Work::withId($_POST['id']);

    if (strpos($_FILES['img']["type"], 'image/') !== false) {
      $file = $_FILES['img'];
      $url = $file = $_FILE['img']['name'];
      move_uploaded_file($file["tmp_name"]);
    } else {
      $url = $getArticle->getImage();
    }

    $instArticle = [
        "id" => $getArticle->getId(),
        "nom" => $_POST['title'],
        "groupe" => $_POST['groupe'],
        "type" => $_POST['type'],
        "likes" => $getArticle->getLikes(),
        "image" => $url,
        "article" => $_POST['commentary']
    ];

    $newArticle = Work::withData($instArticle);
    $newArticle->edit();

    header('Location: ../index.php?backoffice=1&type=1&add=1&nbr=1');
    exit();
  }

  header('Location: ../index.php?backoffice=1&type=1&edit=1&id=' . $_POST['id']);
  exit();
?>
