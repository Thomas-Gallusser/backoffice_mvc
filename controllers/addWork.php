<?php

  if (isset($_POST['title']) && isset($_POST['commentary']) && isset($_POST['groupe']) && isset($_POST['type']) && isset($_FILES['img'])) {

    $file = $_FILES["img"];
    if (strpos($file["type"], 'image/') !== false){
      move_uploaded_file($file['tmp_name'], '../img/' . uniqid("upld_") . '.' . pathinfo($file["name"],PATHINFO_EXTENSION));

      
    }

  }

?>
