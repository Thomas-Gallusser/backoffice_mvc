<?php session_start();

if(isset($_SESSION['admin'])){
  require('../conf/settings.php');
  require('../lib/database.lib.php');
  require('../models/user.php');

  if (!empty($_POST['id']) && !empty($_POST['login']) && !empty($_POST['perm'])) {

    $instUser = User::withId($_POST['id']);

    if ($_SESSION['permission'] == 1) {
      $login = $_POST['id'];
      $psd = $_POST['psw'];
      $perm = $_POST['perm'];
      if (empty($_POST['psw'])) $psd = $instUser->getPassword();

      $instUser = [
          "id" => $getArticle->getId(),
          "login" => $login,
          "password" => $psw,
          "permission" => $perm,
      ];

      $editUser = User::withData($instUser);
      $editUser->edit();

      header('Location: ../index.php?backoffice&type=1&user');
      exit();
    }
  }

  header('Location: ../index.php?backoffice&type=1&useredit&id=' . $_POST['id']);
  exit();
}
else {
  header("Location: index.php?admin=1&error=1");
}
?>
