<?php session_start();

require('views/header.php');

if(isset($_GET['page']))
  require('views/base.php');
elseif(isset($_GET['admin'])){
  if(!isset($_SESSION['admin']))
    require('views/admin.php');
  else
    header("Location: index.php?backoffice=1");
}
elseif(isset($_GET['backoffice'])){
  if(isset($_SESSION['admin'])){

    // Menu
    require('views/menuBackOffice.php');

    //////////////////////////////////////////////////////
    //   TYPE = 1 : Article                            //
    //   SEE = 1 : See an article                      //
    //   ADD = 1 : Add an article                      //
    //   EDIT = 1 : Modify an article                //
    /////////////////////////////////////////////////////

    // Content
    if(isset($_GET['type'])){
      if($_GET['type'] == 1){
        if(isset($_GET['see']))
          require('views/workForm.php');
        elseif(isset($_GET['add']))
          require('views/seeArticles.php');
        elseif(isset($_GET['edit']))
          require('views/modifyArticle.php');
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
