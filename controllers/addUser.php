<?php session_start();
  require('../conf/settings.php');
  require('../lib/database.lib.php');
  require('../models/user.php');

  if (!empty($_SESSION['permission']) && !empty($_POST['login']) && !empty($_POST['mdp'])) {

    $getUser = User::withLogin($_POST['login']);
    if ($_SESSION['permission'] == '1' && $getUser->getId() == null) {

      $instUser = [
          "id" => 0,
          "login" => $_POST['login'],
          "password" => $_POST['mdp'],
          "permission" => $_POST['perm']
      ];

      $getAdd = User::withData($instUser);
      $getAdd->create();

      header('Location: ../index.php?backoffice');
      exit();
    }
  }

  header('Location: ../index.php?backoffice&type=1&new');
  exit();
?>
