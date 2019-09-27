<?php session_start();

if(!empty($_POST['login']) && !empty($_POST['pwd'])){
  // Delete illegal characters
  $login = preg_replace('/[^a-zA-Z0-9_]/', '',$_POST['login']);

  $sel1 = "*1m+";
  $sel2 = "i59);";

  // Db connect
  require('../lib/database.lib.php');
  require('../conf/settings.php');
  require('../models/user.php');
  // $conn = Database::getInstance();
  // // Get login informations for the specific User
  // $row = $conn->prep_exec('SELECT id, login, password, permission FROM users WHERE login = "'.$login.'" ;');

  $getUser = User::withLogin($login);
  // Verification of password with db
  if($getUser->getPassword() == hash("sha256",$sel1.$_POST['pwd'].$sel2)){
    $_SESSION['user'] = $getUser->getId();
    $_SESSION['admin'] = 1;
    $_SESSION['permission'] = $getUser->getPermission();
    header("Location: ?backoffice");
    exit();
  } else {
    // var_dump($row);
    header("Location: ../admin&error");
  }
}
