<?php
  session_start();

  require('../conf/settings.php');
  require('../lib/database.lib.php');
  require('../models/work.php');

  if (!empty($_POST['title']) && !empty($_POST['commentary']) && !empty($_POST['groupe']) && !empty($_POST['type'])) {

    $getArticle = Work::withId($_SESSION['id']);
    unset($_SESSION['id']);

    if (strpos($_FILES['img']["type"], 'image/') !== false) {
      $file = $_FILES['img'];
      $img_blob= addslashes(file_get_contents($file["tmp_name"]));
    } else {
      $img_blob = addslashes($getArticle->getImage());
    }

    $instArticle = [
        "id" => $getArticle->getId(),
        "nom" => $_POST['title'],
        "groupe" => $_POST['groupe'],
        "type" => $_POST['type'],
        "likes" => $getArticle->getLikes(),
        "image" => $img_blob,
        "article" => $_POST['commentary']
    ];

    $newArticle = Work::withData($instArticle);
    $newArticle->edit();

    header('Location: ../index.php?backoffice=1&type=1&see=1');
    exit();
  }

  $id = $_SESSION['id'];
  unset($_SESSION['id']);
  header('Location: ../index.php?backoffice=1&type=1&edit=1&id=' . $id);
  exit();
?>
