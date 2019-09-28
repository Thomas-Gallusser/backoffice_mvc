<?php session_start();

require('controllers/controller.php');
require('views/header.php');

if (!empty($_SESSION['install'])) {
  unlink('install.php');
  unset($_SESSION['install']);
} else if (file_exists('install.php')) header('Location: install.php');


if(isset($_GET['admin']))
  getAdmin();
elseif(isset($_GET['backoffice']))
  getBackOffice();
elseif(isset($_GET['view']))
  getArticle();
else
  getPage();

require('views/footer.php');
