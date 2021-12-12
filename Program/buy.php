<?php
session_start();
require 'functions.php';

if( !isset($_SESSION["login"]) ){
	header("Location: login.php");
	exit;
}



// ambil data di url
$game_id = $_GET["game_id"];
// query data berdasarkan idnya
$game = query("SELECT * FROM game WHERE game_id = $game_id")[0];

// ambil user id
$user_id = $_COOKIE['user_id'];
$result = mysqli_query($conn, "SELECT user_id FROM user WHERE user_id = $user_id");
$row = mysqli_fetch_assoc($result);


// memasukan data ke database
if ( isset($_POST["buy"]) ) {

  if( buy($_POST) > 0 ) {
    echo "<script>
            alert('game berhasil dibeli!');
          </script>";
  } else{
    echo mysqli_error($conn);
  }
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
            <h2 class="text-center"><strong>Buy Games</strong></h2>
            <hr>
          </div>
        </div>
        <div class="row">
          <!-- Mulai Form -->
		<form action="" method="post" enctype="multipart/form-data" > 
		<div class="row">
		  <div class="col-sm-4">
		      <img src="img/<?= $game['gambar']; ?>" width = "300">
		</div>
		<div class="col-sm-8 text-left">
		    <h1>Game : <?= $game["namagame"] ?></h1> <br>
		    <h3>Genre : <?= $game["genre"] ?></h3> <br>
		    <h4>Deskripsi : <?= $game["deskripsi"] ?></h4> <br>
		    <h4>Harga : <?= rupiah($game["harga"]) ?></h4>
        <?php if($game["usia"] == 0): ?>
		    <button type="submit" class="btn btn-primary" name="buy">Buy !!</button>
        <?php endif; ?>
        <?php if($game["usia"] == 1): ?>
        <button type="submit" class="btn btn-primary" name="buy" onclick="return confirm('“THIS GAME MAY CONTAIN CONTENT NOT APPROPRIATE FOR ALL AGES, OR MAY NOT BE APPROPRIATE FOR VIEWING AT WORK.”')">Buy !!</button>
        <?php endif; ?>
		</div>
		</div>
    <input type="hidden" name="user_id" value="<?= $row["user_id"]; ?>">
    <input type="hidden" name="game_id" value="<?= $game["game_id"]; ?>">
	</form>
          <!-- Akhir Form -->
        </div>
      </div>
    </section>
    <!-- Akhir Content Game -->


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