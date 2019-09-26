<?php session_start();

if(isset($_SESSION['admin'])){
  require('../conf/settings.php');
  require('../lib/database.lib.php');
  require('../models/work.php');

  if (!empty($_POST['title']) && !empty($_POST['commentary'])) {

    $getArticle = Work::withId($_POST['id']);

    if ($_SESSION['permission'] == 1) {
      $grp = $_POST['groupe'];
      $type = $_POST['type'];
    } else {
      $grp = $getArticle->getGroupe();
      $type = $getArticle->getType();
    }

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
        "groupe" => $grp,
        "type" => $type,
        "likes" => $getArticle->getLikes(),
        "image" => $url,
        "article" => $_POST['commentary']
    ];

    $newArticle = Work::withData($instArticle);
    $newArticle->edit();

    header('Location: ../index.php?backoffice=1&type=1&see=1&p=1');
  }

  header('Location: ../index.php?backoffice=1&type=1&edit=1&id=' . $_POST['id']);
}
else {
  header("Location: index.php?admin=1&error=1");
}
?>
