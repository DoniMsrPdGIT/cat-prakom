<div class="callout callout-info">
    <h4>Peraturan Ujian!</h4>
    <p>Seleksi <?=$mhs->nama_jurusan?>, dilaksanakan dengan menggunakan Sistem Computer Assisted Test
(CAT) dalam durasi waktu <?=$ujian->waktu?> menit dengan <?=$ujian->jumlah_soal?> Butir Soal Materi <?=$ujian->nama_ujian?></p>
</div>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Konfirmasi Data</h3>
    </div>
    <div class="box-body">
        <span id="id_ujian" data-key="<?=$encrypted_id?>"></span>
        <div class="row">
            <div class="col-sm-6">
                <table class="table table-bordered">
                    <tr>
                        <th>Nama</th>
                        <td><?=$mhs->nama?></td>
                    </tr>
                    <tr>
                        <th>Dosen</th>
                        <td><?=$ujian->nama_dosen?></td>
                    </tr>
                    <tr>
                        <th>Kelas/Jurusan</th>
                        <td><?=$mhs->nama_kelas?> / <?=$mhs->nama_jurusan?></td>
                    </tr>
                    <tr>
                        <th>Nama Ujian</th>
                        <td><?=$ujian->nama_ujian?></td>
                    </tr>
                    <tr>
                        <th>Jumlah Soal</th>
                        <td><?=$ujian->jumlah_soal?></td>
                    </tr>
                    <tr>
                        <th>Waktu</th>
                        <td><?=$ujian->waktu?> Menit</td>
                    </tr>
                    <tr>
                        <th>Terlambat</th>
                        <td>
                            <?=strftime('%d %B %Y', strtotime($ujian->terlambat))?> 
                            <?=date('H:i:s', strtotime($ujian->terlambat))?>
                        </td>
                    </tr>
                    <tr>
                        <th style="vertical-align:middle">Token</th>
                        <td>
                            <input autocomplete="off" id="token" placeholder="Token" type="text" value="<?= $ujian->token ?>" class="input-sm form-control">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-sm-6">
                <div class="box box-solid">
                    <div class="box-body pb-0">
                        <div class="callout callout-info">
                            <p>
                                Waktu boleh mengerjakan ujian adalah saat tombol "MULAI" berwarna hijau.
                            </p>
                        </div>
                        <?php
                        $mulai = strtotime($ujian->tgl_mulai);
                        $terlambat = strtotime($ujian->terlambat);
                        $now = time();
                        if($mulai > $now) : 
                        ?>
                        <div class="callout callout-success">
                            <strong><i class="fa fa-clock-o"></i> Ujian akan dimulai pada</strong>
                            <br>
                            <span class="countdown" data-time="<?=date('Y-m-d H:i:s', strtotime($ujian->tgl_mulai))?>">00 Hari, 00 Jam, 00 Menit, 00 Detik</strong><br/>
                        </div>
                        <?php elseif( $terlambat > $now ) : ?>
						<?php
						$n_ac = $this->db->query("SELECT COUNT(*) AS donasi, (SELECT COUNT(*) AS tot FROM h_ujian WHERE mahasiswa_id='$mhs->id_mahasiswa') AS trial FROM users u  WHERE u.activation_code!='0' AND u.username='$mhs->nim' ")->result();
foreach ($n_ac as $t) { 
$donasi=$t->donasi;
$trial=$t->trial;
if($donasi == '0' && $trial=='0'){
	?>
                        <button id="btncek" data-id="<?=$ujian->id_ujian?>" class="btn btn-success btn-lg mb-4">
                            <i class="fa fa-pencil"></i> Mulai
                        </button>
<?php }elseif($donasi == '1' && $trial>='1'){
	?>
                        <button id="btncek" data-id="<?=$ujian->id_ujian?>" class="btn btn-success btn-lg mb-4">
                            <i class="fa fa-pencil"></i> Mulai
                        </button>
<?php }elseif($donasi == '1' && $trial>='0'){
	?>
                        <button id="btncek" data-id="<?=$ujian->id_ujian?>" class="btn btn-success btn-lg mb-4">
                            <i class="fa fa-pencil"></i> Mulai
                        </button>						
<?php }else{ ?>
						<style>
	.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 40%;
   border: 2px solid;
}
	</style>
<?php if(($user->activation_selector=='1' && $user->activation_code=='0' && $user->remember_selector!='15' )){ ?>
                           Silakan Donasi <del>Rp 100.000</del> <b>Rp 50.000</b>&nbsp;<span class="badge badge-danger">Alumni 2023</span>,untuk bisa mengakses Seluruh Sesi Ujian + Akses Modul eBook Materi + Fitur kedepannya.<br/>
						   <b>Donasi diperlukan guna Pengembangan Website CAT Prakom lebih baik.</b>
                        </div>
						<img src="../../assets/logo/qris_new.png" class="center"/>
						 <h4 align="center"><b>Rp 51.<?=substr($mhs->no_peserta,4,3)?></b></h4>
						<br/>
						 <div class="callout callout-danger">
                         Donasi dg Kode Unik [Nomor Peserta] => Rp. 50.000 + Nomor Peserta<br/>
						 == Nomor Peserta Anda adalah <?=$mhs->no_peserta?> ==<br/>
						 <b>Maka Donasi sebesar Rp. 51.<?=substr($mhs->no_peserta,4,3)?></b><br/>
						 Pembayaran via QRIS diatas, Otomatis Teraktivasi. <br/> 🌟🌟 Akun Berlaku Selama CASN 2024
                        </div>
						
  <div class="callout callout-warning">
                           Klik untuk Join di <b><a href="https://t.me/cat_prakom"><i class="fa fa-telegram" aria-hidden="true"></i>&nbsp;Group Telegram CAT-Prakom.com</a></b><br/>
						   Silakan Konfirmasi di grup jika sudah Donasi, namun belum Aktif dengan format :<br/>
						   DCP_NAMA_NOHP_KODEUNIK<br/><br/>
						   Contoh : DCP_Andini_081234567890_51<?=substr($mhs->no_peserta,4,3)?>
						   </br></br>
						   <b>Admin akan melakukan pengecekan terlebih dahulu</b>
                        </div>

                        <?php }elseif(($user->activation_selector=='0' && $user->activation_code=='0' && $user->remember_selector!='15')){ ?>
<div class="callout callout-warning">
                           Silakan Donasi <b>Rp 100.000</b>&nbsp;<span class="badge badge-danger">Non-Alumni 2023</span>, untuk bisa mengakses Seluruh Sesi Ujian + Akses Modul eBook Materi + Fitur kedepannya.<br/>
						   <b>Donasi diperlukan guna Pengembangan Website CAT Prakom lebih baik.</b>
                        </div>
						<img src="../../assets/logo/qris_new.png" class="center"/>
						 <h4 align="center"><b>Rp 101.<?=substr($mhs->no_peserta,4,3)?></b></h4>
						<br/>
						 <div class="callout callout-danger">
                         Donasi dg Kode Unik [Nomor Peserta] => Rp. 100.000 + Nomor Peserta<br/>
						 == Nomor Peserta Anda adalah <?=$mhs->no_peserta?> ==<br/>
						 <b>Maka Donasi sebesar Rp. 101.<?=substr($mhs->no_peserta,4,3)?></b><br/>
						 Pembayaran via QRIS diatas, Otomatis Teraktivasi. <br/> 🌟🌟 Akun Berlaku Selama CASN 2024
                        </div>
						
  <div class="callout callout-warning">
                           Klik untuk Join di <b><a href="https://t.me/cat_prakom"><i class="fa fa-telegram" aria-hidden="true"></i>&nbsp;Group Telegram CAT-Prakom.com</a></b><br/>
						   Silakan Konfirmasi di grup jika sudah Donasi, namun belum Aktif dengan format :<br/>
						   DCP_NAMA_NOHP_KODEUNIK<br/><br/>
						   Contoh : DCP_Andini_081234567890_101<?=substr($mhs->no_peserta,4,3)?>
						   </br></br>
						   <b>Admin akan melakukan pengecekan terlebih dahulu</b>
                        </div>
                        <?php }elseif($user->remember_selector=='15' && $user->activation_code=='0'){ ?>
							<div class="callout callout-warning">
                           Silakan Donasi pilih program, untuk bisa mengakses Seluruh Sesi Ujian + Akses Modul eBook Materi + Fitur kedepannya.<br/>
						   <b>Donasi diperlukan guna Pengembangan Website CAT Prakom lebih baik.</b>
                        </div>
						<img src="../../assets/logo/qris_new.png" class="center"/>
						 <h4 align="center"><b>Rp 71.<?=substr($mhs->no_peserta,4,3)?></b></h4>
						<br/>
						 <div class="callout callout-danger">
                         Donasi dg Kode Unik [Nomor Peserta] => Rp. 70.000 + Nomor Peserta<br/>
						 == Nomor Peserta Anda adalah <?=$mhs->no_peserta?> ==<br/>
						 <b>Maka Donasi sebesar Rp. 71.<?=substr($mhs->no_peserta,4,3)?></b><br/>
						 Pembayaran via QRIS diatas, Otomatis Teraktivasi. <br/> 🌟🌟 Akun Berlaku Selama CASN 2024
                        </div>
						
  <div class="callout callout-warning">
                           Klik untuk Join di <b><a href="https://t.me/cat_prakom"><i class="fa fa-telegram" aria-hidden="true"></i>&nbsp;Group Telegram CAT-Prakom.com</a></b><br/>
						   Silakan Konfirmasi di grup jika sudah Donasi, namun belum Aktif dengan format :<br/>
						   DCP_NAMA_NOHP_KODEUNIK<br/><br/>
						   Contoh : DCP_Andini_081234567890_35<?=substr($mhs->no_peserta,4,3)?>/71<?=substr($mhs->no_peserta,4,3)?>
						   </br></br>
						   <b>Admin akan melakukan pengecekan terlebih dahulu</b>
                        </div>
                            <?php } ?>	


<?php } }?>
                        <div class="callout callout-danger">
                            <i class="fa fa-clock-o"></i> <strong class="countdown" data-time="<?=date('Y-m-d H:i:s', strtotime($ujian->terlambat))?>">00 Hari, 00 Jam, 00 Menit, 00 Detik</strong><br/>
                            Batas waktu menekan tombol mulai.
                        </div>
                        <?php else : ?>
                        <div class="callout callout-danger">
                           Tryout Teknis Belum dibuka untuk Formasi PPPK, Halaman ini akan dibuka saat Pendaftaran PPPK dimulai.
                        </div>
                        <!-- <div class="callout callout-danger">
                            Waktu untuk menekan tombol <strong>"MULAI"</strong> sudah habis.<br/>
                            Silahkan hubungi dosen anda untuk bisa mengikuti ujian pengganti.
                        </div> -->
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?=base_url()?>assets/dist/js/app/ujian/token.js"></script>