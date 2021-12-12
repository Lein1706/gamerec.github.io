<?php 
require 'functions.php';
$games = query("SELECT * FROM game");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
</head>
<body>

	<h1>Daftar Game</h1>

	<a href="tambah.php">Tambah data game</a>
	<br><br>

	<table border="1" cellpadding="10" cellspacing="0">
		
		<tr>
			<th>No.</th>
			<th>Aksi</th>
			<th>Gambar</th>
			<th>Nama</th>
			<th>Genre</th>
			<th>Deskripsi</th>
			<th>Tahun</th>
		</tr>

		<?php $i = 1; ?>
		<?php foreach($games as $row) : ?>
		<tr>
			<td><?= $i; ?></td>
			<td>
				<a href="ubah.php?id=<?= $row["id"]; ?>">Edit</a> |
				<a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakinkahh ??')">Hapus</a>
			</td>
			<td><img src="img/<?= $row["gambar"]; ?>" width="100"></td>
			<td><?= $row["nama"]; ?></td>
			<td><?= $row["genre"]; ?></td>
			<td><?= $row["deskripsi"]; ?></td>
			<td><?= $row["tahun"]; ?></td>
		</tr>
		<?php $i++; ?>
		<?php endforeach; ?>

	</table>

</body>
</html>