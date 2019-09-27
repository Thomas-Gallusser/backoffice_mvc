<?php

function showHeader() {
  if (isset($_GET['admin']) || isset($_GET['backoffice'])){
    return false;
  }
  return true;
}

// Index
function getPage(){
  require('views/base.php');
}

// article
function getArticle(){
  require('views/view.php');
}

// Admin
function getAdmin(){
  if(!isset($_SESSION['admin']))
    require('views/backoffice/admin.php');
  else
    header("Location: ?backoffice");
}

// backoffice
function getBackOffice(){
  if(isset($_SESSION['admin'])){
    // Menu
    require('views/backoffice/menuBackOffice.php');

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
          require('views/backoffice/seeArticles.php');
        elseif(isset($_GET['add']))
          require('views/backoffice/workForm.php');
        elseif(isset($_GET['edit']))
          require('views/backoffice/modifyArticle.php');
        elseif(isset($_GET['new']))
          require('views/backoffice/addUser.php');
        elseif(isset($_GET['user']))
          require('views/backoffice/viewUser.php');
        elseif(isset($_GET['useredit']))
          require('views/backoffice/editUser.php');
      }
    }

    require('views/backoffice/backoffice.php');
  }
  else {
    header("Location: ?admin=1&error=1");
  }
}
