<!DOCTYPE html>
<html>
<head>
	<title>Cetak Biodata</title>
</head>
<body onload="print()">
	<h2 align="center">Daftar Biodata Peserta Ujian</h2>
	<table align="center" border="1" cellspacing="0" cellpadding="5" width="80%">
		<tr>
			<th>No</th>
			<th>NIK</th>
			<th>Nama</th>
			<th>Nomor Peserta</th>
		</tr>
		<?php 
            $no=1;
            foreach ($cetak as $c) {
         ?>
		<tr>
			<td><?= $no++ ?></td>
			<td><?= $c->nik ?></td>
			<td><?= $c->nama_b ?></td>
			<td><?= $c->no_peserta ?></td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>