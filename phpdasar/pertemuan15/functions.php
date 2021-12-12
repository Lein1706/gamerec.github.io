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
	
	// upload gambar
	$gambar = upload();
	if( !$gambar ) {
		return false;
	}

	$query = "INSERT INTO games
				VALUES
				('','$nama','$genre','$deskripsi','$tahun','$gambar')
				";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function upload() {

	$namaFile = $_FILES['gambar']['name'];
	$ukurnFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if( $error === 4 ){
		echo "<script>
				alert('masukkan gambar terlebih dahulu!');
			</script>";
		return false;
	}


	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'JPG'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ){
		echo "<script>
				alert('yang anda upload bukan gambar!!');
			</script>";
		return false;	
	}

	// cek jika ukurannya terlalu besar
	if( $ukuranFile > 1000000) {
		echo "<script>
				alert('ukuran gambar terlalu besar!');
			</script>";
		return false;		
	}

	// lolos pengecekan, gambar siap diupload
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

	return $namaFileBaru;

}


function hapus($id){
	global $conn;
	mysqli_query($conn,"DELETE FROM games WHERE id = $id");
	return mysqli_affected_rows($conn);
}

function ubah($data){
	global $conn;

	$id = $data["id"];
	$nama = htmlspecialchars($data["nama"]);
	$genre = htmlspecialchars($data["genre"]);
	$deskripsi = htmlspecialchars($data["deskripsi"]);
	$tahun = htmlspecialchars($data["tahun"]);
	$gambarLama = htmlspecialchars($data["gambarLama"]);

	// cek apakah user pilih gambar baru atau tidak
	if( $_FILES['gambar']['error'] === 4){
		$gambar = $gambarLama;
	} else {
		$gambar = upload();
	}
	

	$query = "UPDATE games SET
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
	$query = "SELECT * FROM games
				WHERE
			 nama LIKE '%$keyword%' OR
			 genre LIKE '%$keyword%' OR
			 deskripsi LIKE '%$keyword%' OR
			 tahun LIKE '%$keyword%'
			 ";
	return query($query);
}

function registrasi($data) {
	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	// cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");

	if( mysqli_fetch_assoc($result) ){
		echo "<script>
				alert('username sudah terdaftar!');
			</script>";

		return false;
	}


	// cek konfirmasi password
	if( $password !== $password2) {
		echo "<script>
				alert('konfirmasi password tidak sesuai!');
			</script>";
			return false;
		}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan userbaru ke database
	mysqli_query($conn, "INSERT INTO users VALUES('', '$username', '$password')");

	return mysqli_affected_rows($conn);

	}


?>