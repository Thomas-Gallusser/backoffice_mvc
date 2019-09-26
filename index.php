<?php session_start();

require('controllers/controller.php');

require('views/header.php');

if(isset($_GET['admin']))
  getAdmin();
elseif(isset($_GET['backoffice']))
  getBackOffice();
else
  getPage();

require('views/footer.php');
