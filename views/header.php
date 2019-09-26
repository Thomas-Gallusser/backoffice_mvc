<?php
  require('conf/settings.php');
  require('lib/database.lib.php');
  require('models/work.php');
?>
<html lang="fr" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="author" lang="fr" content="Eddy MORLON, Thomas Gallusser">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StartupRR</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styleBackOffice.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/progressBar.css">
</head>

<body>

  <?php
    if (!isset($_GET['p'])) $_GET['p'] = 1;
    if (showHeader()) {
  ?>
  <header id="header">
    <section id="logo" class="col-12 p-5">
        <img src="img/header.png"/>
    </section>
  </header>
  <?php
  }
  ?>
