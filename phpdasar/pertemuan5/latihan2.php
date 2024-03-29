<?php 
// untuk user melakukan pengulangan pada array
// for / foreach
$angka = [3,2,15,20,11,77,89, 8];
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Latihan 2</title>
 	<style>
 		.kotak{
 			width: 50px;
 			height: 50px;
 			background-color: salmon;
 			text-align: center;
 			line-height: 50px; 
 			margin: 3px;
 			float: left;
 		}
 		.clear {clear: both;}
 	</style>
 </head>
 <body>
	

	 <!-- Menggunakan FOR -->
 	<?php for( $i=0; $i < count($angka); $i++ ) {?>
		<div class="kotak"><?php echo $angka[$i] ?></div>
	<?php } ?>

	<div class="clear"></div>

	<!-- Menggunakan FOREACH -->
	<?php foreach ( $angka as $a ) { ?>
		<div class="kotak"><?php echo $a; ?></div>
	<?php } ?>

	<div class="clear"></div>

	<!-- Menggunakan FOREACH dengan template yang singkat -->
	<?php foreach( $angka as $a ) :?>
		<div class="kotak"><?= $a; ?></div>
	<?php endforeach; ?>





 </body>
 </html>