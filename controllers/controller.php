<?php

// Index
function getPage(){
  require('views/base.php');
}

// Admin
function getAdmin(){
  if(!isset($_SESSION['admin']))
    require('views/admin.php');
  else
    header("Location: index.php?backoffice=1");
}

// backoffice
function getBackOffice(){
  if(isset($_SESSION['admin'])){

    // Menu
    require('views/menuBackOffice.php');

    //////////////////////////////////////////////////////
    //   TYPE = 1 : Article                            //
    //   SEE = 1 : See an article                      //
    //   ADD = 1 : Add an article                      //
    //   EDIT = 1 : Modify an article                  //
    /////////////////////////////////////////////////////

    // Content
    if(isset($_GET['type'])){
      if($_GET['type'] == 1){
        if(isset($_GET['see']))
          require('views/seeArticles.php');
        elseif(isset($_GET['add']))
          require('views/workForm.php');
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
