<?php 
// $_GET
$games = [
	[
		"nama" => "GTA V",
		"genre" => "Action, Adventure, Multiplayer, Singleplayer",
		"deskripsi" => "Grand Theft Auto V (GTA 5) adalah permainan aksi-petualangan 2013 yang dikembangkan oleh Rockstar North dan diterbitkan oleh Rockstar Games. Grand Theft Auto Online, mode multipemain online permainan ini, memungkinkan hingga 30 pemain dapat bermain dalam berbagai mode kooperatif dan kompetitif yang berbeda.",
		"tahun" => "2013",
		"gambar" => "GTAV.jpg"
	],
	[
		"nama" => "DOTA 2",
		"genre" => "Action, Multiplayer, MOBA",
		"deskripsi" => "Dota 2 adalah sebuah permainan arena pertarungan daring multipemain, dan merupakan sekuel dari Defense of the Ancients mod pada Warcraft 3: Reign of Chaos dan Warcraft 3: The Frozen Throne. DotA 2 dikembangkan oleh Valve Corporation, terbit juli 2013 dota 2 dapat dimainkan secara gratis pada sistem operasi Microsoft Windows, OS X and Linux. Dota 2 dapat dimainkan secara eksklusif melalui distributor resmi valve, Steam.",
		"tahun" => "2013",
		"gambar" => "DOTA2.jpg"
	]
]
?>
<!DOCTYPE html>
<html>
<head>
	<title>GET</title>
</head>
<body>
<h1>Daftar Game</h1>
<ul>
<?php foreach ($games as $game) : ?>
	<li>
	<a href="latihan2.php?nama=<?= $game["nama"] ?>&genre=<?= $game["genre"] ?>&deskripsi=<?= $game["deskripsi"] ?>&tahun=<?= $game["tahun"] ?>&gambar=<?= $game["gambar"] ?>"><?= $game["nama"] ?></a>
	</li>
<?php endforeach; ?>
</ul>



</body>
</html>
