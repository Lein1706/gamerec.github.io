<?php 
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

// ambil data dari tabel atau query
$result = mysqli_query($conn, "SELECT * FROM game");

// ambil data (fetch) dari object result
// mysqli_fetch_row() // mengembalikan array numerik
// mysqli_fetch_assoc() // mengembalikan array assosiative
// mysqli_fetch_array() // mengembalikan keduanya
// mysqli_fetch_object()

// while($gem = mysqli_fetch_assoc($result)) {
// 	var_dump($gem["nama"]);
// }

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
</head>
<body>

	<h1>Daftar Game</h1>

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
		<?php while( $row = mysqli_fetch_assoc($result) )  : ?>
		<tr>
			<td><?= $i; ?></td>
			<td>
				<a href="">Edit</a> |
				<a href="">Hapus</a>
			</td>
			<td><img src="img/<?= $row["gambar"]; ?>" width="100"></td>
			<td><?= $row["nama"]; ?></td>
			<td><?= $row["genre"]; ?></td>
			<td><?= $row["deskripsi"]; ?></td>
			<td><?= $row["tahun"]; ?></td>
		</tr>
		<?php $i++; ?>
		<?php endwhile; ?>

	</table>

</body>
</html>