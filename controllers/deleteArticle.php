<?php session_start();

if(isset($_SESSION['admin'])){
  require('../conf/settings.php');
  require('../lib/database.lib.php');
  require('../models/work.php');

  $delArticle = Work::withId($_GET['id']);
  $delArticle->delete();
  header('Location: ../?backoffice&type=1&see&p='.$_GET['p']);
}
else {
  header("Location: ?admin&error");
}
?>
