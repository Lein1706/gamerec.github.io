<?php 
// cek apakah tidak ada data di $_GET
if( !isset($_GET["nama"]) || 
	!isset($_GET["genre"]) ||
	!isset($_GET["deskripsi"]) ||
	!isset($_GET["tahun"]) ||
	!isset($_GET["gambar"])){
	
	// memindahkan user kehalaman lain (redirect)
	header("Location: Latihan1.php");
	exit;
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Detail Game</title>
</head>
<body>

<ul>
	<img src="img/<?= $_GET["gambar"] ?>">
	<li>Nama : <?= $_GET["nama"] ?></li>
	<li>Genre : <?= $_GET["genre"] ?></li>
	<li>Deskripsi : <?= $_GET["deskripsi"] ?></li>
	<li>Tahun : <?= $_GET["tahun"] ?></li>
</ul>

<a href="latihan1.php">Kembali ke daftar game</a>

</body>
</html>