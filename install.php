<?php
  session_start();

  $error = 0;
  if (!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['db']) && !empty($_POST['idb']) && !empty($_POST['hdb'])) {

    $conn = '';
    try {
      $conn = new PDO("mysql:host=".$_POST['hdb'], $_POST['idb'], $_POST['pdb']);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $conn->exec('CREATE DATABASE IF NOT EXISTS `'. $_POST["db"].'`');

      $conn = new PDO("mysql:host=".$_POST['hdb'].";dbname=".$_POST['db'], $_POST['idb'], $_POST['pdb']);

      $conn->exec('DROP TABLE IF EXISTS `st_users`;');
      $conn->exec('CREATE TABLE IF NOT EXISTS `st_users` (`id` smallint(5) NOT NULL AUTO_INCREMENT,`login` varchar(20) NOT NULL, `password` varchar(64) NOT NULL, `permission` tinyint(1) NOT NULL, PRIMARY KEY (`id`)) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;');

      $conn->exec('DROP TABLE IF EXISTS `st_works`;');
      $conn->exec('CREATE TABLE IF NOT EXISTS `st_works` (`id` smallint(5) NOT NULL AUTO_INCREMENT,`nom` varchar(40) NOT NULL,`author_id` smallint(5) NOT NULL,`publication` DATETIME NOT NULL,`likes` smallint(5) NOT NULL,`image` varchar(40) NOT NULL,`article` text NOT NULL,PRIMARY KEY (`id`)) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;');

      $conn->exec('INSERT INTO st_users (login, password, permission) VALUES ("'.$_POST["login"].'","'.hash("sha256","*1m+".$_POST["password"]."i59);").'",1);');

      $_SESSION['install'] = 1;

      $fp = fopen('conf/settings.php', 'w');
      fwrite($fp, "<?php
  define('DB_HOST', '".$_POST['hdb']."');
  define('DB_NAME', '".$_POST['db']."');
  define('DB_USER', '".$_POST['idb']."');
  define('DB_PWD', '".$_POST['pdb']."');
?>");
      fclose($fp);
      header('Location: ./');
      exit();

    }catch(PDOException $e){
      echo $e->getMessage();
      if ($e->getCode() == 2002) $error=2; // Host inexistant
      if ($e->getCode() == 1045) $error=3; // Mauvais identifiants
    }
  } else if (!empty($_POST['login']) || !empty($_POST['password']) || !empty($_POST['db']) || !empty($_POST['idb']) || !empty($_POST['hdb'])) {
    $error = 1;
  }

?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Installation du site</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <header>
      <div class="container">
        <h1 class="text-center mt-4 mb-5">Installation du site</h1>
        <?php
          if(!empty($error == 1))
            echo '<div class="alert alert-danger py-2 my-4 text-center font-weight-bold">Tout les champs ne sont pas remplies !</div>';
          else if(!empty($error == 2))
            echo '<div class="alert alert-danger py-2 my-4 text-center font-weight-bold">Impossible de ce connecter à l\'host.</div>';
          else if(!empty($error == 3))
            echo '<div class="alert alert-danger py-2 my-4 text-center font-weight-bold">Identifiants de la base de donnée incorrects.</div>';
        ?>
        <form method="post">
          <div class="form-group">
            <input type="login" class="form-control" name="login" placeholder="pseudo*" required>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="mot de passe*" required>
          </div>
          <div class="form-group">
              <input type="text" class="form-control" name="idb" placeholder="Identifiant à la base de donnée*" required>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="pdb" placeholder="Mot de passe de la base de donnée">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="hdb" placeholder="Host base de donnée*" required>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="db" placeholder="Nom de la base de donnée*" required>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary mt-3">Installer</button>
          </div>
        </form>
      </div>
    </header>

    <main>
    </main>
  </body>
</html>
