<?php
  session_start();

  require('../conf/settings.php');
  require('../lib/database.lib.php');
  require('../models/work.php');

  $delArticle = Work::withId($_GET['id']);
  $delArticle->delete();
  header('Location: ../index.php?backoffice=1&type=1&add=1&nbr='.$_GET['nbr']);
?>
