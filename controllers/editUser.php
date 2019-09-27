<?php session_start();

if(isset($_SESSION['admin'])){
  require('../conf/settings.php');
  require('../lib/database.lib.php');
  require('../models/user.php');

  if (!empty($_POST['id']) && !empty($_POST['login']) && !empty($_POST['perm'])) {

    $myUser = User::withId($_POST['id']);

    if ($_SESSION['permission'] == 1) {

      $login = $_POST['login'];
      $psd = hash("sha256","*1m+".$_POST['psd']."i59);");
      $perm = $_POST['perm'];
      if (strlen($_POST['psd']) == 0) $psd = $myUser->getPassword();

      $instUser = [
          "id" => $myUser->getId(),
          "login" => $login,
          "password" => $psd,
          "permission" => $perm,
      ];

      $editUser = User::withData($instUser);
      $editUser->edit();

      header('Location: ../?backoffice&type=1&user');
      exit();
    }
  }

  header('Location: ../?backoffice&type=1&useredit&id=' . $_POST['id']);
  exit();
}
else {
  header("Location: index.php?admin=1&error=1");
}
?>
