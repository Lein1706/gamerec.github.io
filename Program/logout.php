<?php 
session_start();
$_SESSION = [];
session_unset();
session_destroy();

setcookie('user_id', '',time() - 3600);
setcookie('key', '', time() - 3600);
setcookie('game_id', '', time() - 3600);

header("Location: login.php");

 ?>