<?php session_start();

require('views/header.php');

if(isset($_GET['page']))
  require('views/base.php');
elseif(isset($_GET['admin']))
  require('views/admin.php');
elseif(isset($_GET['backoffice'])){
  if(isset($_SESSION['admin'])){

    // Menu
    require('views/menuBackOffice.php');

    //////////////////////////////////////////////////////
    //   TYPE = 1 : Article                            //
    //   SEE = 1 : See an article                      //
    //   ADD = 1 : Add an article                      //
    //   MODIFY = 1 : Modify an article                //
    //   DELETE = 1 : Delete an article                //
    /////////////////////////////////////////////////////

    // Content
    if(isset($_GET['type'])){
      if($_GET['type'] == 1){
        require('views/workForm.php');
      }
    }

    require('views/backoffice.php');
  }
  else {
    header("Location: index.php?admin=1&error=1");
  }
}
else
  require('views/base.php'); // a modifier quand on aura la page d'un article

require('views/footer.php');
