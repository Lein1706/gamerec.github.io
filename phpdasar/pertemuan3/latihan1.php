<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Lathian 1</title>
	<style>
		.warna-baris {
			background-color: silver; 
		}
		.warna-baris1 {
			background-color: pink;
		}
	</style>
</head>
<body>

<table border="1" cellpadding="15" cellspacing="1">
	<?php for( $i = 1; $i <= 5; $i++ ) : ?>
		<?php if( $i % 2 == 1) : ?>
		<tr class="warna-baris">
		<?php else : ?>
		<tr class="warna-baris1">
		<?php endif; ?>
			<?php for( $j = 1; $j <= 5; $j++ ) : ?>
				<td><?= "$i, $j"; ?></td>
			<?php endfor; ?>
		</tr>
	<?php endfor; ?>
</table>

</body>
</html>