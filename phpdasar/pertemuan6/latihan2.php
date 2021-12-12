<?php 
// $mahasiswa = [
// 	["Daniel","535180032","daniel.535180032@stu.untar.ac.id", "Teknik Informatika"],
// 	["William","535180021","william.535180021@stu.untar.ac.id", "Teknik Informatika" ]
// ];

// Array Associative
// definisinya sama seperti array numerik, kecuali
// key -> adalah string yang kita buat sendiri
$mahasiswa = [
	[
		"nama" => "Daniel",
		"nim" => "535180032",
		"email" => "daniel.535180032@stu.untar.ac.id",
		"jurusan" => "Teknik Informatika",
		"gambar" => "Daniel.jpg"
	],
	[	
		"nama" => "Delicia",
		"nim" => "625180049",
		"email" => "delicia.625180049@stu.untar.ac.id",
		"jurusan" => "Desain Komunikasi Visual",
		"gambar" => "Delicia.jpg"
	]
];
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Daftar Mahasiswa</title>
 </head>
 <body>
 	<h1>Daftar Mahasiswa</h1>

 	<?php foreach($mahasiswa as $mhs) :?>
 		<ul>
 			<li>
 				<img src="img/<?= $mhs["gambar"] ?>">
 			</li>
 			<li>Nama : <?= $mhs["nama"]  ?></li>
 			<li>NIM : <?= $mhs["nim"]  ?></li>
 			<li>Email : <?= $mhs["email"]  ?></li>
 			<li>Jurusan : <?= $mhs["jurusan"]  ?></li>
 		</ul>
 	<?php endforeach; ?>

 </body>
 </html>
