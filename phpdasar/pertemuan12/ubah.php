<?php
require 'functions.php';

// ambil data di url
$id = $_GET["id"];
// query data berdasarkan idnya
$game = query("SELECT * FROM game WHERE id = $id")[0]
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

	<form action="" method="post">
		<input type="hidden" name="id" value="<?= $game["id"] ?>">
		<ul>
			<li>
				<label for="nama">Nama : </label>
				<input type="text" name="nama" id="nama" required value="<?= $game["nama"] ?>">
			</li>
			<li>
				<label for="genre">Genre : </label>
				<input type="text" name="genre" id="genre" required value="<?= $game["genre"] ?>">
			</li>
			<li>
				<label for="deskripsi">Deskripsi : </label>
				<input type="text" name="deskripsi" id="deskripsi" required value="<?= $game["deskripsi"] ?>">
			</li>
			<li>
				<label for="tahun">Tahun : </label>
				<input type="text" name="tahun" id="tahun" required value="<?= $game["tahun"] ?>">
			</li>
			<li>
				<label for="gambar">Gambar : </label>
				<input type="text" name="gambar" id="gambar" required value="<?= $game["gambar"] ?>">
			</li>
			
				<button type="submit" name="submit">Ubah Data !!</button>

				<button><a href="index.php" style="color: black; text-decoration: none">Kembali !</a></button>
			
		</ul>

	</form>

</body>
</html>