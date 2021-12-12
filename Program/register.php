<?php 
session_start();

if( isset($_SESSION["login"]) ){
  header("Location: index.php");
  exit;
}


require 'functions.php';

$games = query("SELECT * FROM game ORDER BY game_id asc ");


if( isset($_POST["register"]) ) {

  if( registrasi($_POST) > 0 ) {
    echo "<script>
        alert('user baru berhasil ditambahkan!');
      </script>";
    header("Location: login.php");
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
    <style>
    label {
      display: block;
    }
  </style>

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
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-user"></i></a>
            <ul class="dropdown-menu">
              <li><a href="login.php">Login</a></li>
            </ul>
          </li>
        </ul>
        </div>

      </div>
    </nav>
    <!-- Akhir Navbar -->

    <section class="content" id="content">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <h2 class="text-center"><strong>Register</strong></h2>
            <hr>
          </div>
        </div>
        <div class="row">

          <!-- Content -->
        <form class="form-horizontal" action="" method="post">
          <div class="form-group">
            <label for="username" class="col-sm-2 control-label">Username</label>
            <div class="col-sm-10">
             <input type="username" class="form-control" id="username" placeholder="username" name="username" autocomplete="off" required>
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
             <input type="email" class="form-control" id="email" placeholder="email" name="email" autocomplete="off" required>
            </div>
          </div>
          <div class="form-group">
            <label for="password" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
             <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
            </div>
          </div>
          <div class="form-group">
            <label for="password2" class="col-sm-2 control-label">Confirm Password</label>
            <div class="col-sm-10">
             <input type="password" class="form-control" id="password2" placeholder="Password" name="password2" required>
            </div>
          </div>

          <!-- Dropdown -->
          <div class="form-group">
            <label for="game_id" class="col-sm-2 control-label">Favorite / Recent Game</label>
            <div class="col-sm-10">
            <div class="dropdown">
              <select class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" name="game_id">
                <span class="caret"></span>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu3">
                <!-- Mulai Looping -->
                <?php $i = 1; ?>
                <?php foreach($games as $row) : ?>
                  <option><?=$row["game_id"]?><?= ". " ?><?= $row["namagame"];?></option>
                <?php $i++; ?>
                <?php endforeach; ?>
                <!-- Akhir Looping -->
              </ul>
              </select>
            </div>
            </div>
            
          </div>
          <!-- Akhir Dropdown -->
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary" name="register">Register</button>
              <button class="btn btn-primary"><a href="login.php" style="color: white;">Have Account ?</a></button>
            </div>
          </div>
        </form>     
          <!-- akhir content -->
        </div>
      </div>
    </section>

    <!-- Register -->

    

    <!-- Akhir Register -->
    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.6.0.min.js"></script>\
    <script src="js/jquery.easing.1.3.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

    <script src="js/script.js"></script>
  </body>
</html>