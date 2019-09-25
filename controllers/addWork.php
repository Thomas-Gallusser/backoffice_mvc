<?php
  session_start();

  require('../conf/settings.php');
  require('../lib/database.lib.php');
  require('../models/work.php');

  if (!empty($_POST['title']) && !empty($_POST['commentary']) && !empty($_POST['groupe']) && !empty($_POST['type']) && !empty($_FILES['img'])) {

    $file = $_FILES["img"];
    if (strpos($file["type"], 'image/') !== false){
      $imgId = uniqid("upld_") . '.' . pathinfo($file["name"],PATHINFO_EXTENSION);
      move_uploaded_file($file['tmp_name'], '../img/' . $imgId);

      $instArticle = [
          "id" => 0,
          "nom" => $_POST['title'],
          "groupe" => $_POST['groupe'],
          "type" => $_POST['type'],
          "likes" => 0,
          "image" => $imgId,
          "article" => $_POST['commentary']
      ];

      $newArticle =Work::withData($instArticle);
      $newArticle->create();

      unlink($file['tmp_name']);

      header('Location: ../index.php?admin');
      exit();
    }
  }


  if (strpos($file["type"], 'image/') !== false) unlink($file['tmp_name']);

 $_SESSION['title'] = $_POST['title'];
 $_SESSION['groupe'] = $_POST['groupe'];
 $_SESSION['commentary'] = $_POST['commentary'];
 $_SESSION['type'] = $_POST['type'];

 header('Location: ../index.php?backoffice=1&type=1&see=1');
 exit();
?>
