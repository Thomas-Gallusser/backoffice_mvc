<?php session_start();

if(isset($_SESSION['admin'])){
  require('../conf/settings.php');
  require('../lib/database.lib.php');
  require('../models/user.php');

  $delArticle = User::withId($_GET['id']);
  $delArticle->delete();
  header('Location: ../?backoffice&type=1&user&p='.$_GET['p']);
}
else {
  header("Location: ?admin&error");
}
?>
