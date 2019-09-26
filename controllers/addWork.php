<?php session_start();

if(isset($_SESSION['admin'])){
  require('../conf/settings.php');
  require('../lib/database.lib.php');
  require('../models/work.php');

  if (!empty($_POST['title']) && !empty($_POST['commentary']) && !empty($_POST['groupe']) && !empty($_POST['type']) && ($_FILES['img']['size'] > 0 || !empty($_POST['galery']))) {

    if ($_FILES['img']['size'] > 0) {
      $file = $_FILES['img'];
      if (strpos($file["type"], 'image/') !== false){
        $url = uniqid('i_') . '.' . pathinfo($file["name"],PATHINFO_EXTENSION);
        move_uploaded_file($file["tmp_name"], '../img/uploads/'.$url);
      }
    } else {
      $splt = explode('img/uploads/',$_POST['galery']);
      $url = end($splt);
    }

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

      header('Location: ../index.php?backoffice=1&type=1&see=1&p=1');
      exit();
  }

  header('Location: ../index.php?backoffice=1&type=1&add=1&atitle='. $_POST["title"] .'&agroupe='. $_POST["groupe"] .'&acommentary='. $_POST["commentary"] .'&atype='. $_POST["type"] .'');
}
else {
  header("Location: index.php?admin=1&error=1");
}
?>
