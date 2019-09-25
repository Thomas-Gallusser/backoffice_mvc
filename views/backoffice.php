<?php session_start();

if(isset($_SESSION['admin'])){
  echo $_SESSION['admin'];
  echo '<br />backoffice';
}
else {
  header("Location: ../index.php?admin=1&error=1");
}
