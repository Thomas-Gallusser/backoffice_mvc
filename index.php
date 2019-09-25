<?php

include('header.php');

if(!isset($_GET['page']))
  include('base.php');
else
  include('base.php'); // a modifier quand on aura la page d'un article

include('footer.php');
