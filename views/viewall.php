
  <!-- Header image -->
  <header id="header">
    <section id="logo" class="col-12 p-5">
        <img src="img/header.png"/>
    </section>
  </header>

  <main>
    <!-- Menu -->
    <section id="menu" class="bg-light">
      <nav class="container navbar navbar-expand-lg bg-transparent navbar-dark">
        <a href="#menu">
          <img src="img/logo.png" alt="logo"/>
        </a>

        <button class="navbar-toggler ml-auto custom-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="row py-3 collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="#offer">OFFER</a></li>
                <li class="nav-item"><a class="nav-link" href="#feature">FEATURES</a></li>
                <li class="nav-item"><a class="nav-link" href="#skill">SKILL</a></li>
                <li class="nav-item"><a class="nav-link" href="#member">MEMBERS</a></li>
                <li class="nav-item"><a class="nav-link" href="#price">PRICE</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">CONTACT</a></li>
                <li class="nav-item"><a class="nav-link fas fa-search fa-flip-horizontal" href="#" style="color:#00a99d;"></a></li>
          </ul>
        </div>
      </nav>
    </section>

    <!-- Samples -->
    <section id="sample">
      <div class="text-center py-5 col-12">
        <p class="h3"><img src="img/doubleLines.png" class="hideSmall" /> <img src="img/arrow.png" /> <b>SAMPLE <span class="titleBlue">WORKS</span></b> <img src="img/arrow.png" class="rotate180" /> <img src="img/doubleLines.png" class="rotate180 hideSmall" /></p>
          <p class="txt-light-grey">Let's take a loot at some of the best of our works here, we love them and hope you too</p>
              <div class="container-fluid">
               <div class="row">


                   <?php
                     $articles = Work::getAll();

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

               </div>
              </div>
            </div>
    </section>

    <!-- Map -->
    <section id="contact" class="position-relative">
      <div class="containerfluid">
        <iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox=-74.21813964843751%2C40.54276511228886%2C-73.76495361328126%2C40.76702162667872&amp;layer=mapnik" style="border: 1px solid black"></iframe><br/>
      </div>

      <div id="contactForm" class="position-absolute bg-light rounded p-3 border">
        <div><input type="text" name="name" placeholder="Name" class="form-control rounded" /></div>
        <div><input type="text" name="mail" placeholder="Email" class="form-control rounded mt-2" /></div>
        <div><textarea name="message" placeholder="Message" class="form-control rounded noresize mt-2"></textarea></div>
        <div class="text-center"><button class="btn bg-light-blue rounded mt-2 font-weight-bold smallText w-100 text-light">SUBMIT MESSAGE</button></div>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer id="footer">
    <section id="copyright" class="col-12">
      <p>Copyright © 2014 Startuprr, All Rights Reserved.</p>
    </section>
  </footer>

  <!-- Cookie bar -->
  <div class="containerfluid bg-light-blue mediumText" id="cookieBar">
    <div class="row">
      <div class="col-9 col-sm-10 text-center font-weight-bold">En poursuivant votre navigation, vous acceptez le dépôt de cookies tiers afin de vous proposer des contenus et services adaptés à vos centres d'intérêts.</div>
      <div class="col-3 col-sm-2 text-left">
        <button class="btn bg-light btn-sm mt-2 font-weight-bold" onClick="acceptCookie()">Accepter</button>
      </div>
    </div>
  </div>
