<?php

include('views/header.php');

if(isset($_GET['page']))
  include('views/base.php');
elseif(isset($_GET['admin']))
  include('views/admin.php');
elseif(isset($_GET['backoffice']))
  include('views/backoffice.php');
else
  include('views/base.php'); // a modifier quand on aura la page d'un article

include('views/footer.php');
