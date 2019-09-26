<?php
  session_start();

  require('../conf/settings.php');
  require('../lib/database.lib.php');
  require('../models/work.php');

  if (!empty($_POST['title']) && !empty($_POST['commentary']) && !empty($_POST['groupe']) && !empty($_POST['type']) && !empty($_FILES['img'])) {

    $file = $_FILES['img'];
    $img_blob= file_get_contents($file["tmp_name"]);

    if (strpos($file["type"], 'image/') !== false){
      $instArticle = [
          "id" => 0,
          "nom" => $_POST['title'],
          "groupe" => $_POST['groupe'],
          "type" => $_POST['type'],
          "likes" => 0,
          "image" => addslashes($img_blob),
          "article" => $_POST['commentary']
      ];

      $newArticle = Work::withData($instArticle);
      $newArticle->create();

      header('Location: ../index.php?admin');
      exit();
    }
  }

 $_SESSION['title'] = $_POST['title'];
 $_SESSION['groupe'] = $_POST['groupe'];
 $_SESSION['commentary'] = $_POST['commentary'];
 $_SESSION['type'] = $_POST['type'];

 header('Location: ../index.php?backoffice=1&type=1&add=1');
 exit();
?>
