<?php 
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");


function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}


function tambah($data){
	global $conn;

	$nama = htmlspecialchars($data["nama"]);
	$genre = htmlspecialchars($data["genre"]);
	$deskripsi = htmlspecialchars($data["deskripsi"]);
	$tahun = htmlspecialchars($data["tahun"]);
	$gambar = htmlspecialchars($data["gambar"]);

	$query = "INSERT INTO game
				VALUES
				('','$nama','$genre','$deskripsi','$tahun','$gambar')
				";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


function hapus($id){
	global $conn;
	mysqli_query($conn,"DELETE FROM game WHERE id = $id");
	return mysqli_affected_rows($conn);
}

function ubah($data){
	global $conn;

	$id = $data["id"];
	$nama = htmlspecialchars($data["nama"]);
	$genre = htmlspecialchars($data["genre"]);
	$deskripsi = htmlspecialchars($data["deskripsi"]);
	$tahun = htmlspecialchars($data["tahun"]);
	$gambar = htmlspecialchars($data["gambar"]);

	$query = "UPDATE game SET
				nama = '$nama',
				genre = '$genre',
				deskripsi = '$deskripsi',
				tahun = '$tahun',
				gambar = '$gambar'
			 WHERE id = $id";


	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function cari($keyword) {
	$query = "SELECT * FROM game
				WHERE
			 nama LIKE '%$keyword%' OR
			 genre LIKE '%$keyword%' OR
			 deskripsi LIKE '%$keyword%' OR
			 tahun LIKE '%$keyword%'
			 ";
	return query($query);
}
?>