<?php if( $this->ion_auth->is_admin() ) : ?>
<div class="row">
    <?php foreach($info_box as $info) : ?>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-<?=$info->box?>">
        <div class="inner">
            <h3><?=$info->total;?></h3>
            <p><?=$info->nama;?></p>
        </div>
        <div class="icon">
            <i class="fa fa-<?=$info->icon?>"></i>
        </div>
        <a href="<?=base_url().strtolower($info->title);?>" class="small-box-footer">
            More info <i class="fa fa-arrow-circle-right"></i>
        </a>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<?php elseif( $this->ion_auth->in_group('dosen') ) : ?>

<div class="row">
    <div class="col-sm-4">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Informasi Akun</h3>
            </div>
            <table class="table table-hover">
                <tr>
                    <th>Nama</th>
                    <td><?=$dosen->nama_dosen?></td>
                </tr>
                <tr>
                    <th>NIP</th>
                    <td><?=$dosen->nip?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?=$dosen->email?></td>
                </tr>
                <tr>
                    <th>Tema Pelatihan</th>
                    <td><?=$dosen->nama_matkul?></td>
                </tr>
                <tr>
                    <th>Daftar Angkatan</th>
                    <td>
                        <ol class="pl-4">
                        <?php foreach ($kelas as $k) : ?>
                            <li><?=$k->nama_kelas?></li>
                        <?php endforeach;?>
                        </ol>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="box box-solid">
            <div class="box-header bg-purple">
                <h3 class="box-title">Pemberitahuan</h3>
            </div>
	
            <div class="box-body">
                <p>Fitur Website CAT CASN Prakom :<br />- 1.900++ Bank Soal, diacak by system🌟<br />- Soal selalu Update tiap hari🌟<br />- Tryout CAT dibagi per Sesi🌟<br />- Informasi Passing Grade tiap Sesi🌟<br />- PDF Soal Tryout dan Pembahasan<br />- PDF Materi Pembelajaran<br />- Ranking Peserta per Sesi secara Nasional, 🌟<br />- Tryout Tanpa Batas dan Flexible, tanpa Jadwal<br />- Dilengkapi Timer<br />- Ada Aplikasi Androidnya, join di group telegram untuk mendapatkan Aplikasinya.<br />- Group Telegram utk Sharing Materi dan Aplikasi CAT Prakom Android https://t.me/cat_prakom<br />- Sesuai kisi-kisi MenPanRB🌟<br />- Sesuai FR Peserta 2022🌟</p>
            </div>
						
        </div>
    </div>
</div>

<?php else : ?>

<div class="row">
    <div class="col-sm-4">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Informasi Akun</h3>
            </div>
            <table class="table table-hover">
                <tr>
                    <th>NIK</th>
                    <td><?=$mahasiswa->nim?></td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td><?=$mahasiswa->nama?></td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td><?=$mahasiswa->jenis_kelamin === 'L' ? "Laki-laki" : "Perempuan" ;?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?=$mahasiswa->email?></td>
                </tr>
                <tr>
                    <th>Profesi</th>
                    <td><?=$mahasiswa->nama_jurusan?></td>
                </tr>
                <tr>
                    <th>Angkatan</th>
                    <td><?=$mahasiswa->nama_kelas?></td>
                </tr>
            </table>
        </div>
    </div>
		<style>
	.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 30%;
   border: 2px solid;
}
	</style>
    <div class="col-sm-8">
        <div class="box box-solid">
          
         		<?php if($users->activation_code=='1' ){ ?>
				  <div class="box-header bg-purple">
                <h3 class="box-title">Pemberitahuan</h3>
            </div>
            <div class="box-body">
                 <div class="callout callout-success">
                            <p><font color="yellow" size="3px"><b>Selamat, <?=$mhs->nama?>. Aktivasi Akun Premium anda Berhasil<b></font>, <br/>Terima kasih atas donasinya.</p>
<p>✓Silakan jelajahi fitur Premium/Full Akses Paket PPPK ke :<br />
✅Tryout 30 Paket Soal Kompetensi Teknis/Bidang dengan 1.900++ Bank Soal terupdate<br />
✅Tryout 10 Paket Soal Sosiokultural<br />
✅Tryout 10 Paket Soal Manajerial<br />
✅Tryout 10 Paket Soal Wawancara<br />
✅10 eBook PDF Materi Belajar sesuai Kisi-kisi MenpanRB dan FR Peserta Ujian,&nbsp;<br />
✅5 eBook PDF Soal dan Pembahasan (Kmpetensi Teknis)&nbsp;<br />
✅Video Materi Belajar.&nbsp;<br />
✅Android CAT-Prakom download di Playstore</p>

                        </div>
						<!--
						<form method="post"  action="<?php echo "https://t.me/+EF4JX7tHUeI5NmM1"; ?>">
						<button  type="submit"  class="btn btn-danger btn-sm" >Join Group Private Telegram </button>
						<br/>Diskusi dan Membahas Materi Prakom dalam menghadapi Ujian PPPK 2024
						</form>	
						-->
            </div>
            <?php }elseif($users->activation_code=='2' ){ ?>
				  <div class="box-header bg-purple">
                <h3 class="box-title">Pemberitahuan</h3>
            </div>
            <div class="box-body">
                 <div class="callout callout-success">
                            <p><font color="yellow" size="3px"><b>Selamat, <?=$mhs->nama?>. Aktivasi Akun Premium anda Berhasil<b></font>, <br/>Terima kasih atas donasinya.</p>
<p>✓Silakan jelajahi fitur Premium Fokus SKD CPNS ke :<br />
✅Tryout 10 Paket Soal Tes Wawasan Kebangsaan (TWK)<br />
✅Tryout 10 Paket Soal Tes Intelegensi Umum (TIU)<br />
✅Tryout 10 Paket Soal Tes Karakteristik Pribadi (TKP)<br />
✅10 eBook PDF Materi Belajar sesuai Kisi-kisi MenpanRB dan FR Peserta Ujian,&nbsp;<br />
✅5 eBook PDF Soal dan Pembahasan (SKD)&nbsp;<br />
✅Video Materi Belajar.&nbsp;<br />
✅Android CAT-Prakom download di Playstore</p>

                        </div>
						<!--
						<form method="post"  action="<?php echo "https://t.me/+EF4JX7tHUeI5NmM1"; ?>">
						<button  type="submit"  class="btn btn-danger btn-sm" >Join Group Private Telegram </button>
						<br/>Diskusi dan Membahas Materi Prakom dalam menghadapi Ujian PPPK 2024
						</form>	
						-->
            </div>
            <?php }elseif($users->activation_code=='3' ){ ?>
				  <div class="box-header bg-purple">
                <h3 class="box-title">Pemberitahuan</h3>
            </div>
            <div class="box-body">
                 <div class="callout callout-success">
                            <p><font color="yellow" size="3px"><b>Selamat, <?=$mhs->nama?>. Aktivasi Akun Premium anda Berhasil<b></font>, <br/>Terima kasih atas donasinya.</p>
<p>✓Silakan jelajahi fitur Premium Full/Akses Paket CPNS ke :<br />
✅Tryout 10 Paket Soal Tes Wawasan Kebangsaan (TWK)<br />
✅Tryout 10 Paket Soal Tes Intelegensi Umum (TIU)<br />
✅Tryout 10 Paket Soal Tes Karakteristik Pribadi (TKP)<br />
✅10 eBook PDF Materi Belajar sesuai Kisi-kisi MenpanRB dan FR Peserta Ujian,&nbsp;<br />
✅5 eBook PDF Soal dan Pembahasan (Kompetensi Bidang)&nbsp;<br />
✅Video Materi Belajar.&nbsp;<br />
✅Android CAT-Prakom download di Playstore</p>

                        </div>
						<!--
						<form method="post"  action="<?php echo "https://t.me/+EF4JX7tHUeI5NmM1"; ?>">
						<button  type="submit"  class="btn btn-danger btn-sm" >Join Group Private Telegram </button>
						<br/>Diskusi dan Membahas Materi Prakom dalam menghadapi Ujian PPPK 2024
						</form>	
						-->
            </div>
            <?php }else{ ?> <!--BELUM AKTIVASI -->
                <?php if(($users->activation_selector=='1' && $users->activation_code=='0' && $users->remember_selector!='15' )){ ?>
                  <div class="box-header bg-purple">
                <h3 class="box-title">Tata Cara Donasi</h3>
            </div>
    <div class="callout callout-warning">
                           Silakan Donasi <del>Rp 100.000</del> <b><font color="yellow" size="5px">Rp 50.000</font><b>&nbsp;<span class="badge badge-danger">Alumni 2023</span>, untuk bisa mengakses Seluruh Fitur Website :<br/>
                <p>✅ Simulasi Tryout CAT Kompetensi Teknis/Bidang (30 Paket Soal)<br />
                ✅ Simulasi Tryout CAT Sosiokultural (10 Paket Soal)<br />
                ✅ Simulasi Tryout CAT Manajerial (10 Paket Soal)<br />
                ✅ Simulasi Tryout CAT Wawancara (10 Paket Soal)<br />
                ✅ eBook PDF Materi Belajar<br />
                ✅ eBook PDF Soal dan Pembahasan <br />
                ✅ Video Materi Belajar</p>
<p>✅ 1900++ Bank Soal, diacak by system<br />
✅ Soal selalu Update tiap hari sesuai FR &amp; Kisi-kisi MenpanRB<br />
✅ Paket Soal bisa di Reset dan Tryout bisa diulang terus-menerus<br />
✅ Informasi Passing Grade dan Ranking Nasional<br />
✅ Aktivasi Member Berlaku selama CASN 2024
                        </div>
                        
                        <img src="assets/logo/qris_new.png" class="center"/>
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
                        <?php }elseif(($users->activation_selector=='0' && $users->activation_code=='0' && $users->remember_selector!='15')){ ?>
				  <div class="box-header bg-purple">
                <h3 class="box-title">Tata Cara Donasi</h3>
            </div>
	<div class="callout callout-warning">
      
                           Silakan Donasi <b><font color="yellow" size="5px">Rp 100.000</font><b>&nbsp;<span class="badge badge-danger">Non-Alumni 2023</span>, untuk bisa mengakses Seluruh Fitur Website :<br/>
                           <p>✅ Simulasi Tryout CAT Kompetensi Teknis/Bidang (30 Paket Soal)<br />
                ✅ Simulasi Tryout CAT Sosiokultural (10 Paket Soal)<br />
                ✅ Simulasi Tryout CAT Manajerial (10 Paket Soal)<br />
                ✅ Simulasi Tryout CAT Wawancara (10 Paket Soal)<br />
                ✅ eBook PDF Materi Belajar<br />
                ✅ eBook PDF Soal dan Pembahasan <br />
                ✅ Video Materi Belajar</p>
<p>✅ 1900++ Bank Soal, diacak by system<br />
✅ Soal selalu Update tiap hari sesuai FR &amp; Kisi-kisi MenpanRB<br />
✅ Paket Soal bisa di Reset dan Tryout bisa diulang terus-menerus<br />
✅ Informasi Passing Grade dan Ranking Nasional<br />
✅ Aktivasi Member Berlaku selama CASN 2024
                        </div>
						
						<img src="assets/logo/qris_new.png" class="center"/>
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
				  <div class="box-header bg-purple">
                <h3 class="box-title">Tata Cara Donasi</h3>
            </div>
	<div class="callout callout-warning">
      
                           Silakan Donasi <b><font color="yellow" size="5px">Rp 35.000</font><b>&nbsp;<span class="badge badge-success">Paket Fokus SKD CPNS</span>, untuk bisa mengakses Seluruh Fitur Website :<br/>
                           <p>✅Tryout 10 Paket Soal Tes Wawasan Kebangsaan (TWK)<br />
✅Tryout 10 Paket Soal Tes Intelegensi Umum (TIU)<br />
✅Tryout 10 Paket Soal Tes Karakteristik Pribadi (TKP)<br />
                ✅ eBook PDF Materi Belajar<br />
                ✅ eBook PDF Soal dan Pembahasan <br />
                ✅ Video Materi Belajar</p>
<p>✅ 1900++ Bank Soal, diacak by system<br />
✅ Soal selalu Update tiap hari sesuai FR &amp; Kisi-kisi MenpanRB<br />
✅ Paket Soal bisa di Reset dan Tryout bisa diulang terus-menerus<br />
✅ Informasi Passing Grade dan Ranking Nasional<br />
✅ Aktivasi Member Berlaku selama CASN 2024
                        </div>
						
						<img src="assets/logo/qris_new.png" class="center"/>
						 <h4 align="center"><b>Rp 35.<?=substr($mhs->no_peserta,4,3)?></b></h4>
						<br/>
						 <div class="callout callout-danger">
                         Donasi dg Kode Unik [Nomor Peserta] => Rp. 35.000 + Nomor Peserta<br/>
						 == Nomor Peserta Anda adalah <?=$mhs->no_peserta?> ==<br/>
						 <b>Maka Donasi sebesar Rp. 35.<?=substr($mhs->no_peserta,4,3)?></b><br/>
						 Pembayaran via QRIS diatas, Otomatis Teraktivasi. <br/> 🌟🌟 Akun Berlaku Selama CASN 2024
                        </div>
						
  <div class="callout callout-warning">
                           Klik untuk Join di <b><a href="https://t.me/cat_prakom"><i class="fa fa-telegram" aria-hidden="true"></i>&nbsp;Group Telegram CAT-Prakom.com</a></b><br/>
						   Silakan Konfirmasi di grup jika sudah Donasi, namun belum Aktif dengan format :<br/>
						   DCP_NAMA_NOHP_KODEUNIK<br/><br/>
						   Contoh : DCP_Andini_081234567890_35<?=substr($mhs->no_peserta,4,3)?>
						   </br></br>
						   <b>Admin akan melakukan pengecekan terlebih dahulu</b>
                        </div>
				<?php } ?>
                <?php  } ?>  	
        </div>
    </div>
</div>

<?php endif; ?>