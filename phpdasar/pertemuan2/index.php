<?php 
// Pertemuan 2 - PHP Dasar
// Sintaks PHP

// Standar Output
// echo, print - untuk mencetak tulisan atau variabel
// print_r - untuk mencetak isi array tapi bisa string juga
// var_dump - untuk melihat isi dari variabel

// Penulisan sintaks PHP
// 1. kita bisa ketik PHP di dalam HTML
// 2. kit abisa ketik HTML di dalam PHP

// Variabel dan Tipe Data
// Variabel
// Nama ariabel tidak boleh diawal dengan angka, tetapi boleh mengandung angka
// $nama = "Daniel";
// echo "Halo, nama saya $nama";

// Operator
// aritmatika
// + - * / %
// $x = 10;
// $y = 20;
// echo $x + $y;

// Operator pengganbung string (concatenation / concat)
// .
// $nama_depan = "Daniel";
// $nama_belakang = "Ganteng";
// echo $nama_depan . " " . $nama_belakaang;

// Operator Assignment
// =, +=, -=, *=, /=, %=, .=
// $x = 1;
// $x += 5;
// echo $x;
// $nama = "Daniel";
// $nama .=" ";
// $nama .="Ganteng";
// echo $nama;

// Operator Perbandingan
// <, >, <=, >=, ==, !=
// var_dump(1 == "1");

// Operator mengecek tipe data (Operator Identitas)
//  ===, !==
// var_dump(1 === "1");

// Operator Logika
//  &&, ||, !
// $x = 30;
// var_dump($x < 20 || $x % 2 == 0);




// Contoh PHP di dalam HTML
$nama = "Daniel";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Belajar PHP</title>
</head>
<body>
	<h1>Halo, Selamat Datang <?php echo $nama; ?></h1>

</body>
</html>