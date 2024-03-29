<?php session_start();

if(isset($_SESSION['admin'])){
  require('../conf/settings.php');
  require('../lib/database.lib.php');
  require('../models/work.php');

  if (!empty($_POST['title']) && !empty($_POST['commentary'])) {

    $getArticle = Work::withId($_POST['id']);

    if ($_SESSION['permission'] == 1) {
      $publication = $_POST['groupe'];
      $author_id= $_POST['type'];
    } else {
      $publication = $getArticle->getPublication();
      $author_id= $getArticle->getAuthor_id();
    }

    if (strpos($_FILES['img']["type"], 'image/') !== false) {
      $file = $_FILES['img'];
      $url = uniqid('i_') . '.' . pathinfo($file["name"],PATHINFO_EXTENSION);
      move_uploaded_file($file["tmp_name"], '../img/uploads/'.$url);
    } else {
      $url = $getArticle->getImage();
    }

    $instArticle = [
        "id" => $getArticle->getId(),
        "nom" => $_POST['title'],
        "publication" => $publication,
        "author_id" => $author_id,
        "likes" => $getArticle->getLikes(),
        "image" => $url,
        "article" => $_POST['commentary']
    ];

    $newArticle = Work::withData($instArticle);
    $newArticle->edit();

    header('Location: ../?backoffice&type=1&modif&see&p=1');
    exit();
  }

  header('Location: ../?backoffice&type=1&error&edit&id=' . $_POST['id']);
  exit();
}
else {
  header("Location: index.php?admin&error");
}
?>
