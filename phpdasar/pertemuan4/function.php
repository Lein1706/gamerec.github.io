<?php 
date_default_timezone_set("Asia/Jakarta");
function salam($waktu = "Datang", $nama = "Daniel") {
	return "Selamat $waktu, $nama!";
}

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Latihan Function</title>
 </head>
 <body>
 	<?php if (date("H") < 10) : ?>
 	<h1><?= salam("Pagi"); ?></h1>
 	<?php elseif(date("H") < 15) : ?>
 	<h1><?= salam("Siang") ?></h1>
 	<?php elseif(date("H") <= 18) : ?>
 	<h1><?= salam("Sore") ?></h1>
 	<?php else : ?>
 	<h1><?= salam("Malam"); ?></h1>
 <?php endif; ?>
 </body>
 </html>