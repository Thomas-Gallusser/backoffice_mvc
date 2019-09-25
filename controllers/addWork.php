<?php
  require('../conf/settings.php');
  require('../lib/database.lib.php');
  require('../models/work.php');

  if (isset($_POST['title']) && isset($_POST['commentary']) && isset($_POST['groupe']) && isset($_POST['type']) && isset($_FILES['img'])) {

    $file = $_FILES["img"];
    if (strpos($file["type"], 'image/') !== false){
      $imgId = uniqid("upld_") . '.' . pathinfo($file["name"],PATHINFO_EXTENSION);
      move_uploaded_file($file['tmp_name'], '../img/' . $imgId);

      $newArticle = new Work(0, $_POST['title'], $_POST['groupe'], $_POST['type'], 0, $imgId, $_POST['commentary']);
      $newArticle->create();
    }

  }

?>
