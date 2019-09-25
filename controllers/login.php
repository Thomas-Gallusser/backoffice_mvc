<?php session_start();

if(isset($_POST['login']) && !empty($_POST['login']) && isset($_POST['pwd']) && !empty($_POST['pwd'])){
  // Delete illegal characters
  $login = preg_replace('/[^a-zA-Z0-9_]/', '',$_POST['login']);

  $sel1 = "*1m+";
  $sel2 = "i59);";

  // Db connect
  require('../lib/database.lib.php');
  require('../conf/settings.php');
  $conn = Database::getInstance();

  // Get login informations for the specific User
  $row = $conn->prep_exec('SELECT id, password
                          FROM users
                          WHERE login = "'.$login.'" ;');

  // Verification of password with db
  if($row['password'] == hash("sha256",$sel1.$_POST['pwd'].$sel2)){
    $_SESSION['user'] = $row['id'];
    $_SESSION['admin'] = 1;
    header("Location: ../index.php?backoffice=1");
  }
  else{
    var_dump($row);
    header("Location: ../index.php?admin=1&error=1");
  }
}
