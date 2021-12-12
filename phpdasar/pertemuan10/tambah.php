<?php
require 'functions.php';

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ){
	

	// cek apakah data berhasil di tambahkan atau tidak
	if( tambah($_POST) > 0 ){
		echo "
		<script>
			alert('data berhasil ditambahkan!');
			document.location.href = 'index.php';
		</script>
		";
	} else {
		echo "
			<script>
			alert('data gagal ditambahkan!');
			document.location.href= 'index.php';
			</script>
		";
	}

}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah data game</title>
</head>
<body>
	<h1>Tambah data game</h1>

	<form action="" method="post">
		<ul>
			<li>
				<label for="nama">Nama : </label>
				<input type="text" name="nama" id="nama" required>
			</li>
			<li>
				<label for="genre">Genre : </label>
				<input type="text" name="genre" id="genre" required>
			</li>
			<li>
				<label for="deskripsi">Deskripsi : </label>
				<input type="text" name="deskripsi" id="deskripsi" required>
			</li>
			<li>
				<label for="tahun">Tahun : </label>
				<input type="text" name="tahun" id="tahun" required>
			</li>
			<li>
				<label for="gambar">Gambar : </label>
				<input type="text" name="gambar" id="gambar" required>
			</li>
			
				<button type="submit" name="submit">Tambah Data !!</button>
			
		</ul>

	</form>

</body>
</html>