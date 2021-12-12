<?php 
$mahasiswa = [
	["Daniel", "535180032", "Teknik Informatika", "daniel.535180032@stu.untar.ac.id"],
	["James", "535180007", "Teknik Informatika", "james.535180007@stu.untar.ac.id"],
	["William", "535180019", "Teknik Informatika", "william.535180019@stu.untar.ac.id"]
];

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Daftar Mahasiswa</title>
 </head>
 <body>

 <h1>Datar Mahasiswa</h1>

 <?php foreach( $mahasiswa as $mhs) :?>
 <ul>
 	<li>Nama : <?= $mhs[0]; ?></li>
 	<li>NIM : <?= $mhs[1]; ?></li>
 	<li>Jurusan : <?= $mhs[2]; ?></li>
 	<li>Email : <?= $mhs[3]; ?></li>
 </ul>
<?php endforeach; ?>

 </body>
 </html>