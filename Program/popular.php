<?php

session_start();

if( !isset($_SESSION["login"]) ){
  header("Location: login.php");
  exit;
}


require 'functions.php'; 
$game = query("SELECT * FROM game WHERE popular != 0 ORDER BY namagame");

if( isset($_POST["cari"]) ){
  $game = cari($_POST["keyword"]);
}

?>


<!DOCTYPE html>
<html lang="en" id="home">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Games</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style1.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <!-- Navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>

          <a href="index.php" class="navbar-brand page-scroll">GAMES</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-left">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><strong>Store</strong></a>
            <ul class="dropdown-menu">
              <li><a href="allgames.php">All Games</a></li>
              <li><a href="newgames.php">New Releases</a></li>
              <li><a href="popular.php">Top Seller & Popular</a></li>
              <li><a href="rec.php">Recommendation</a></li>
            </ul>
          </li>
          <li><a href="library.php" class="page-scroll"><strong>Library</strong></a></li>
          <li><a href="about.php" class="page-scroll"><strong>About</strong></a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-user"></i></a>
            <ul class="dropdown-menu">
              <li><a href="logout.php">Logout</a></li>
            </ul>
          </li>
        </ul>
        <form class="navbar-form navbar-right" method="post" action="">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Search" name="keyword" autocomplete="off">
          </div>
          <button type="submit" class="btn btn-default" name="cari"><i class="glyphicon glyphicon-search"></i></button>
        </form>
        </div>

      </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Content Game -->
    <section class="content" id="content">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <h2 class="text-center"><strong>Popular Games</strong></h2>
            <hr>
          </div>
        </div>
        <div class="row">
          <!-- mulai looping -->
          <?php $i = 1; ?>
          <?php foreach($game as $row) : ?>
          <div class="col-sm-6 col-sm-4">
            <div class="thumbnail">
              <img src="img/<?= $row["gambar"]; ?>" alt="apex">
              <div class="caption">
                <h3><?= $row["namagame"]; ?></h3>
                <p><?= $row["deskripsi"]; ?></p>
                <p><a class="btn btn-primary" role="button" href="buy.php?game_id=<?= $row["game_id"]; ?>">Buy - <?= rupiah($row["harga"]); ?></a></p>
              </div>
            </div>
          </div>
          <?php $i++; ?>
          <?php endforeach; ?>
          <!-- akhir looping -->
        </div>
      </div>
    </section>
    <!-- Akhir Content Game -->



    <!-- Portfolio -->
    <section class="portfolio" id="portfolio">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <h2 class="text-center"><strong>Fan Art Games</strong></h2>
            <hr>
          </div>  
        </div>

        <div class="row">
            <div class="col-sm-4">
                <a href='' class="thumbnail">
                  <img src="img/FA21.jpg">
                </a>
            </div>
            <div class="col-sm-4">
                <a href='' class="thumbnail">
                  <img src="img/FA22.jpg">
                </a>
            </div>
            <div class="col-sm-4">
                <a href='' class="thumbnail">
                  <img src="img/FA23.jpg">
                </a>
            </div>
            <div class="col-sm-4">
                <a href='' class="thumbnail">
                  <img src="img/FA24.jpg">
                </a>
            </div>
            <div class="col-sm-4">
                <a href='' class="thumbnail">
                  <img src="img/FA25.jpg">
                </a>
            </div>
            <div class="col-sm-4">
                <a href='' class="thumbnail">
                  <img src="img/FA26.jpg">
                </a>
            </div>
        </div>
        </div>
      </div>
    </section>
    <!-- Akhir Portfolio -->


    <!-- Footer -->
    <footer>
      <div class="container text-center">
        <div class="row">
          <div class="col-sm-12">
            <p>&copy; 2021 | by. Daniel (535180032) </p>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <p>Universitas Tarumanagara</p>
          </div>
        </div>
      </div>  
    </footer>

    <!-- Akhir Footer -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.6.0.min.js"></script>\
    <script src="js/jquery.easing.1.3.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

    <script src="js/script.js"></script>
  </body>
</html>