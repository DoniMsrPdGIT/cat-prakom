<!DOCTYPE html>
<html>
<head>
	<title>Cetak Biodata</title>
</head>
<body>
	
	<table align="center" border="1" cellspacing="0" cellpadding="5" width="100%">
		<tr>
			<th colspan="12">Bioadata Anggota Peserta Bimtek IBI</th>
		</tr>
		<tr valign="top">
			<td rowspan="2">No</td>
			<td rowspan="2">No Peserta</td>
			<td rowspan="2">Nama</td>
			<td rowspan="2">Ranting</td>
			<th colspan="3">Ujian (60%)</th>
			<th colspan="3">Kepesertaan (40%)</th>
			<td rowspan="2">Nilai Akhir</td>
			<td rowspan="2">Kelulusan</td>
		</tr>
		
		<tr>
			<td>Pre Test</td>
			<td>Post Test</td>
			<td>Total</td>
			<td>Disiplin</td>
			<td>Prilaku</td>
			<td>Total</td>
		</tr>
		<?php 
			$no=1;
			foreach ($mahasiswa as $mhs) {
		 ?>
		<tr>
			<td><?= $no++; ?></td>
			<td><?= $mhs->no_peserta ?></td>
			<td><?= $mhs->nama ?></td>
			<td><?= $mhs->ranting ?></td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>1</td>
			<td>1</td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>