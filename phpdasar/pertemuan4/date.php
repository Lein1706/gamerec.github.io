<?php 
// Date
// Untuk menampilkan tanggal dengan format tertentu
	// echo date("l, d-M-Y");
// mengatus timezone
date_default_timezone_set("Asia/Jakarta");

// Time
// UNIX Timestamp / EPOCH time
// detik yang sudah berlalu sejak 1 Januari 1970
// echo time();
// echo date("l, d-M-Y", time()+60*60*24*58);

// mktime
// untuk membuat sendiri waktu mulai detiknya
// mktime(0,0,0,0,0,0) ada 6 parameter
// urutannya = jam, menit, detik, bulan, tanggal ,tahun
// echo date("l, d-M-Y", mktime(0,0,0,7,31,2000));


// strtotime
// echo date("l, d-M-Y", strtotime("17 juni 2001"));

echo date("l, d-M-Y, H.i.s"), "\n";
 ?>