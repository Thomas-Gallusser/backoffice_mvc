<?php session_start();

if (!empy($_SESSION['install'])) {
  unlink(install.php);
  unset($_SESSION['install'])
}
if (file_exists('index.php')) header('Location: install.php');

require('controllers/controller.php');

require('views/header.php');

if(isset($_GET['admin']))
  getAdmin();
elseif(isset($_GET['backoffice']))
  getBackOffice();
elseif(isset($_GET['view']))
  getArticle();
else
  getPage();

require('views/footer.php');
