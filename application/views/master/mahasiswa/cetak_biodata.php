<!DOCTYPE html>
<html>
<head>
	<title>Cetak Biodata</title>
</head>
<body onload="print()">
	
	<table align="center" border="0" cellspacing="0" cellpadding="5" width="80%">
		<tr>
			<th colspan="3">Bioadata Anggota Peserta Bimtek IBI</th>
		</tr>
		<tr>
			<th colspan="3">&nbsp;</th>
		</tr>
		<tr>
			<td style="width: 40%">&nbsp;</td>
			<td style="width: 1%">&nbsp;</td>
			<td><img src="<?= base_url('assets/pasfoto/'.$biodata['pas_foto'])?>" width="150px"></td>
		</tr>
		<tr valign="top">
			<td style="width: 20%">No Peserta</td>
			<td style="width: 1%">:</td>
			<td><?= $biodata['no_peserta'] ?></td>
		</tr>
		<tr valign="top">
			<td style="width: 20%">No Induk KTP</td>
			<td style="width: 1%">:</td>
			<td><?= $biodata['nik'] ?></td>
		</tr>
		<tr valign="top">
			<td style="width: 20%">NAMA</td>
			<td style="width: 1%">:</td>
			<td><?= $biodata['nama_b'] ?></td>
		</tr>		
		<tr valign="top">
			<td>TEMPAT / TANGGAL LAHIR</td>
			<td>:</td>
			<td><?= $biodata['tempat_lahir'].' / '.tgl_indo($biodata['tgl_lahir']) ?></td>
		</tr>
		<tr valign="top">
			<td>AGAMA</td>
			<td>:</td>
			<td><?= $biodata['agama'] ?></td>
		</tr>
		<tr valign="top">
			<td>PEKERJAAN</td>
			<td>:</td>
			<td><?= $biodata['pekerjaan'] ?></td>
		</tr>
		<tr valign="top">
			<td>NO KTA</td>
			<td>:</td>
			<td><?= $biodata['no_kta'] ?></td>
		</tr>
		<tr valign="top">
			<td>NO STR</td>
			<td>:</td>
			<td><?= $biodata['no_str'] ?></td>
		</tr>
		<tr valign="top">
			<td>BERLAKU S/D (tgl)</td>
			<td>:</td>
			<td><?= tgl_indo($biodata['berlaku']) ?></td>
		</tr>
		<tr valign="top">
			<td>TEMPAT TUGAS</td>
			<td>:</td>
			<td><?= $biodata['tempat_tugas'] ?></td>
		</tr>
		
		<tr valign="top"> 
			<td>RANTING</td>
			<td>:</td>
			<td><?= $biodata['ranting'] ?></td>
		</tr>
		<tr valign="top">
			<td>NO HANDPONE</td>
			<td>:</td>
			<td><?= $biodata['no_hp'] ?></td>
		</tr>
		<tr valign="top">
			<td>EMAIL</td>
			<td>:</td>
			<td><?= $biodata['email'] ?></td>
		</tr>
		
		<tr valign="top">
			<td>ALAMAT</td>
			<td>:</td>
			<td><?= $biodata['alamat'] ?></td>
		</tr>
	</table>
</body>
</html>