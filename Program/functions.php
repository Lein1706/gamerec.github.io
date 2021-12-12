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

function cari($keyword) {
	$query = "SELECT * FROM game
				WHERE
			 namagame LIKE '%$keyword%' OR
			 genre LIKE '%$keyword%' OR
			 deskripsi LIKE '%$keyword%' OR
			 tahun LIKE '%$keyword%'
			 ";
	return query($query);
}


function registrasi($data) {
	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$email = strtolower(stripslashes($data["email"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);
	$game_id = stripslashes($data["game_id"]);

	// cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

	if( mysqli_fetch_assoc($result) ){
		echo "<script>
				alert('username sudah terdaftar!');
			</script>";

		return false;
	}

	// cek email sudah ada atau belum
	$result = mysqli_query($conn, "SELECT email FROM user WHERE email = '$email'");

	if( mysqli_fetch_assoc($result) ){
		echo "<script>
				alert('email sudah terdaftar!');
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
	mysqli_query($conn, "INSERT INTO `user` (`user_id`, `email`, `username`, `password`, `game_id`) VALUES('', '$email', '$username', '$password', '$game_id')");

	return mysqli_affected_rows($conn);
	}

	// akhir funtion regis

// function format rupiah
function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
 
 	return $hasil_rupiah;
}

function tambah($data){
	global $conn;

	$nama = htmlspecialchars($data["namagame"]);
	$genre = htmlspecialchars($data["genre"]);
	$deskripsi = htmlspecialchars($data["deskripsi"]);
	$tahun = htmlspecialchars($data["tahun"]);
	$popular = htmlspecialchars($data["popular"]);
	$harga = htmlspecialchars($data["harga"]);

	$result = mysqli_query($conn, "SELECT namagame FROM game WHERE namagame = '$nama'");

	if( mysqli_fetch_assoc($result) ){
		echo "<script>
				alert('Nama game sudah terdaftar!');
			</script>";

		return false;
	}

	
	// upload gambar
	$gambar = upload();
	if( !$gambar ) {
		return false;
	}

	$query = "INSERT INTO game
				VALUES
				('','$nama','$genre','$deskripsi','$tahun','$gambar','$popular','$harga')
				";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function upload() {

	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
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


function buy($data){
	global $conn;

	$user_id = $data["user_id"];
	$game_id = $data["game_id"];

	// cek apakah game sudah ada atau belum
	$result = mysqli_query($conn, "SELECT game_id FROM transaksi WHERE game_id = '$game_id'");

	if( mysqli_fetch_assoc($result) ){
		echo "<script>
				alert('game sudah terbeli !');
				</script>";

		return false;
	}

	// tambahkan transaksi baru ke database
	mysqli_query($conn, "INSERT INTO `transaksi`(`trans_id`, `user_id`, `game_id`) VALUES ('','$user_id','$game_id')");

	return mysqli_affected_rows($conn);
}