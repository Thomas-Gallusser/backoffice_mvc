<?php
  if (showHeader()) {
?>

<!-- Footer -->
<footer id="footer">
  <section id="copyright" class="col-12">
    <a href="?admin" class="py-0" style="color:#00a99d;">Administration</a>
    <p class="py-0">Copyright © 2014 Startuprr, All Rights Reserved.</p>
  </section>
</footer>

<?php if (!isset($_COOKIE['cookie'])) { ?>
<!-- Cookie bar -->
<div class="containerfluid bg-light-blue mediumText" id="cookieBar">
  <div class="row">
    <div class="col-9 col-sm-10 text-center font-weight-bold">En poursuivant votre navigation, vous acceptez le dépôt de cookies tiers afin de vous proposer des contenus et services adaptés à vos centres d'intérêts.</div>
    <div class="col-3 col-sm-2 text-left">
      <button class="btn bg-light btn-sm mt-2 font-weight-bold" onClick="acceptCookie()">Accepter</button>
    </div>
  </div>
</div>

<?php
  }
}
?>

<!-- Galery -->
<div id="galeryBg">
  <div id="galery">
    <div class="h5 text-center">Galerie d'images <i class="fas fa-window-close float-right" onClick="toggleGalery()"></i></div>
    <div id="contentGalery">
    </div>

    <nav aria-label="...">
      <ul class="pagination justify-content-center" id="paginGalery">
      </ul>
    </nav>

    <div class="w-25 m-auto">
      <button class="form-control btn-primary" onClick="toggleGalery()">Choisir</button>
    </div>
  </div>
</div>

<!-- Scroll button -->
<a onclick="topFunction()" class="text-center" id="myBtn" title="Go to top">&#9650;</a>
  <script src="https://apis.google.com/js/platform.js" async defer></script>
  <script src="https://kit.fontawesome.com/6fee70888d.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <?php
  if(isset($_GET['backoffice']) || isset($_GET['admin']))
    echo '<script src="scriptBackOffice.js"></script>';
  else
  echo '<script src="script.js"></script>';
  ?>
</body>

</html>
