<?php
  session_start();

  require('../conf/settings.php');
  require('../lib/database.lib.php');
  require('../models/work.php');

  if (!empty($_POST['title']) && !empty($_POST['commentary']) && !empty($_POST['groupe']) && !empty($_POST['type']) && !empty($_FILES['img'])) {

    $file = $_FILES['img'];
    if (strpos($file["type"], 'image/') !== false){
      $url = uniqid('i_') . '.' . pathinfo($file["name"],PATHINFO_EXTENSION);
      move_uploaded_file($file["tmp_name"], '../img/uploads/'.$url);

      $instArticle = [
          "id" => 0,
          "nom" => $_POST['title'],
          "groupe" => $_POST['groupe'],
          "type" => $_POST['type'],
          "likes" => 0,
          "image" => $url,
          "article" => $_POST['commentary']
      ];

      $newArticle = Work::withData($instArticle);
      $newArticle->create();

      header('Location: ../index.php?backoffice=1&type=1&add=1&nbr=1');
      exit();
    }
  }

 header('Location: ../index.php?backoffice=1&type=1&see=1&atitle='. $_POST["title"] .'&agroupe='. $_POST["groupe"] .'&acommentary='. $_POST["commentary"] .'&atype='. $_POST["type"] .'');
 exit();
?>
