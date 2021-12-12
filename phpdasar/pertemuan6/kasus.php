<?php 
$games = [
	[
		"nama" => "GTA V",
		"genre" => "Action, Adventure, Multiplayer, Singleplayer",
		"deskripsi" => "Grand Theft Auto V (GTA 5) adalah permainan aksi-petualangan 2013 yang dikembangkan oleh Rockstar North dan diterbitkan oleh Rockstar Games. Grand Theft Auto Online, mode multipemain online permainan ini, memungkinkan hingga 30 pemain dapat bermain dalam berbagai mode kooperatif dan kompetitif yang berbeda.",
		"tahun" => "2013",
		"img" => "GTAV.jpg"
	],
	[
		"nama" => "DOTA 2",
		"genre" => "Action, Multiplayer, MOBA",
		"deskripsi" => "Dota 2 adalah sebuah permainan arena pertarungan daring multipemain, dan merupakan sekuel dari Defense of the Ancients mod pada Warcraft 3: Reign of Chaos dan Warcraft 3: The Frozen Throne. DotA 2 dikembangkan oleh Valve Corporation, terbit juli 2013 dota 2 dapat dimainkan secara gratis pada sistem operasi Microsoft Windows, OS X and Linux. Dota 2 dapat dimainkan secara eksklusif melalui distributor resmi valve, Steam.",
		"tahun" => "2013",
		"img" => "DOTA2.jpg"
	],
	[
		"nama" => "Splitgate",
		"genre" => "Action, FPS, Multiplayer, Shooting",
		"deskripsi" => "Splitgate merupakan sebuah game fps yang mengabungkan 2 game yaitu halo dan portal.",
		"tahun" => "2019",
		"img" => "Splitgate.jpg"
	]
]
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Daftar Game</title>
 </head>
 <body>
 	<h1>Daftar Game</h1>
	
	<?php foreach($games as $game) :?>
		<ul>
			<img src="img/<?=$game["img"]?> ">
			<li>Nama : <?= $game["nama"] ?></li>
			<li>Genre : <?= $game["genre"] ?></li>
			<li>Deskripsi : <?= $game["deskripsi"] ?></li>
			<li>Tahun Rilis : <?= $game["tahun"] ?></li>
		</ul>
	<?php endforeach; ?>


 </body>
 </html>
