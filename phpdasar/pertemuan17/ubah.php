<?php
session_start();

if( !isset($_SESSION["login"]) ){
	header("Location: login.php");
	exit;
}

require 'functions.php';

// ambil data di url
$id = $_GET["id"];
// query data berdasarkan idnya
$games = query("SELECT * FROM games WHERE id = $id")[0]
;


// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ){
	

	// cek apakah data berhasil di tambahkan atau tidak
	if( ubah($_POST) > 0 ){
		echo "
		<script>
			alert('data berhasil diubah!');
			document.location.href = 'index.php';
		</script>
		";
	} else {
		echo "
			<script>
			alert('data gagal diubah!');
			</script>
		";
	}

}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Ubah data game</title>
</head>
<body>
	<h1>Ubah data game</h1>

	<form action="" method="post" enctype="multipart/form-data" > 
		<input type="hidden" name="id" value="<?= $games["id"]; ?>">
		<input type="hidden" name="gambarLama" value="<?= $games["gambar"]; ?>">
		<ul>
			<li>
				<label for="nama">Nama : </label>
				<input type="text" name="nama" id="nama" required value="<?= $games["nama"] ?>">
			</li>
			<li>
				<label for="genre">Genre : </label>
				<input type="text" name="genre" id="genre" required value="<?= $games["genre"] ?>">
			</li>
			<li>
				<label for="deskripsi">Deskripsi : </label>
				<input type="text" name="deskripsi" id="deskripsi" required value="<?= $games["deskripsi"] ?>">
			</li>
			<li>
				<label for="tahun">Tahun : </label>
				<input type="text" name="tahun" id="tahun" required value="<?= $games["tahun"] ?>">
			</li>
			<li>
				<label for="gambar">Gambar : </label> <br>
				<img src="img/<?= $games['gambar']; ?>" width = "50"><br>
				<input type="file" name="gambar" id="gambar">
			</li>
			
				<button type="submit" name="submit">Ubah Data !!</button>

				<button><a href="index.php" style="color: black; text-decoration: none">Kembali !</a></button>
			
		</ul>

	</form>

</body>
</html>