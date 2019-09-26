<?php
 require('../conf/settings.php');
 require('../lib/database.lib.php');
 require('../models/work.php');

 $articles = Work::getPartI(12,($_GET['p'] - 1) * 12);

 foreach($articles as $article){
 echo '<div class="col-xs-12 col-sm-6 col-md-4 col-lg-2 portfolio">
        <div class="container-fluid hov">

          <div class="row iconsPortf">
            <div class="pos test">
              <a href="#sample">
                <img src="img/backicon.png">
                <div class="centered fas fa-link"></div>
              </a>
            </div>

            <div class="pos search">
              <a href="#sample">
                <img src="img/backicon.png">
                <div class="centered fas fa-search"></div>
              </a>
            </div>

          </div>

          <div class="row infosPortf">
            <div class="col-12">
              <p class="bold">' . $article->getNom() . '</p>
              <p>' . $article->getGroupe() . ' / ' . $article->getType() . '</p>
              <p>♥ ' . $article->getLikes() . '</p>
            </div>
          </div>

        </div>
      </div>';
    }

?>
