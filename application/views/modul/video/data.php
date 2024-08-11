   <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')?>">

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Master <?= $subjudul ?></h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" aria-expanded="false" ><i class="fa fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="box-body">
<?php if( $this->ion_auth->is_admin() || $this->ion_auth->in_group('dosen') ) : ?>       
	   <div class="mt-2 mb-4">
            <a href="<?= base_url('C_Modul/addvideo') ?>" class="btn btn-sm bg-purple btn-flat"><i class="fa fa-plus"></i> Tambah Data</a>
        </div>
		<?php endif; ?>
		<?php if($user->activation_code=='1' ){ ?>
				<!-- keterangan modul-->
				 <div class="callout callout-warning">
                        Video Materi Belajar akan diperbaharui setiap waktu, sesuai Tema Materi Ujian sesuai Kisi-kisi MenpanRB. Jadi pantau terus website CAT-Prakom.com<br/>
						   <b>Terima kasih telah donasi.</b>
                        </div>
						
								<?php 
            	$no=1;
            		foreach ($view_video as $vm) {
            	 ?>
         <!-- Default box -->
    <div class="box box-solid collapsed-box">
        <div class="box-header">
            <h3 class="box-title"><i class="fa fa-youtube" aria-hidden="true"></i>&nbsp;<?php echo $vm->tema; ?></h3>
            <div class="box-tools pull-right">
                <button class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-plus"></i></button>
            </div>
        </div>
        <div style="display: none;" class="box-body">
		<iframe width="100%" height="355" src="<?php echo $vm->url; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe><hr/>
		   <i class="fa fa-play" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $vm->judul_video; ?><br/>
           <i class="fa fa-youtube-play" aria-hidden="true"></i> &nbsp;<?php echo $vm->channel_youtube; ?>
		
            
        </div><!-- /.box-body -->
    </div><!-- /.box -->
	<?php 
					}
					?>
                    <?php }elseif($user->activation_code=='2' ){ ?>
				<!-- keterangan modul-->
				 <div class="callout callout-warning">
                        Video Materi Belajar akan diperbaharui setiap waktu, sesuai Tema Materi Ujian sesuai Kisi-kisi MenpanRB. Jadi pantau terus website CAT-Prakom.com<br/>
						   <b>Terima kasih telah donasi.</b>
                        </div>
						
								<?php 
            	$no=1;
            		foreach ($view_video as $vm) {
            	 ?>
         <!-- Default box -->
    <div class="box box-solid collapsed-box">
        <div class="box-header">
            <h3 class="box-title"><i class="fa fa-youtube" aria-hidden="true"></i>&nbsp;<?php echo $vm->tema; ?></h3>
            <div class="box-tools pull-right">
                <button class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-plus"></i></button>
            </div>
        </div>
        <div style="display: none;" class="box-body">
		<iframe width="100%" height="355" src="<?php echo $vm->url; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe><hr/>
		   <i class="fa fa-play" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $vm->judul_video; ?><br/>
           <i class="fa fa-youtube-play" aria-hidden="true"></i> &nbsp;<?php echo $vm->channel_youtube; ?>
		
            
        </div><!-- /.box-body -->
    </div><!-- /.box -->
	<?php 
					}
					?>
                     <?php }elseif($user->activation_code=='3' ){ ?>
				<!-- keterangan modul-->
				 <div class="callout callout-warning">
                        Video Materi Belajar akan diperbaharui setiap waktu, sesuai Tema Materi Ujian sesuai Kisi-kisi MenpanRB. Jadi pantau terus website CAT-Prakom.com<br/>
						   <b>Terima kasih telah donasi.</b>
                        </div>
						
								<?php 
            	$no=1;
            		foreach ($view_video as $vm) {
            	 ?>
         <!-- Default box -->
    <div class="box box-solid collapsed-box">
        <div class="box-header">
            <h3 class="box-title"><i class="fa fa-youtube" aria-hidden="true"></i>&nbsp;<?php echo $vm->tema; ?></h3>
            <div class="box-tools pull-right">
                <button class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-plus"></i></button>
            </div>
        </div>
        <div style="display: none;" class="box-body">
		<iframe width="100%" height="355" src="<?php echo $vm->url; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe><hr/>
		   <i class="fa fa-play" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $vm->judul_video; ?><br/>
           <i class="fa fa-youtube-play" aria-hidden="true"></i> &nbsp;<?php echo $vm->channel_youtube; ?>
		
            
        </div><!-- /.box-body -->
    </div><!-- /.box -->
	<?php 
					}
					?>
					<?php }else{ ?>
					<style>
	.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 20%;
   border: 2px solid;
}
	</style>
	 <div class="callout callout-warning">
                           Video Materi Belajar akan diperbaharui setiap waktu, sesuai Tema Materi Ujian sesuai Kisi-kisi MenpanRB. Jadi pantau terus website CAT-Prakom.com<br/>
						   <b>Konsep Penyusunan Bank Soal CAT-Prakom bersumber dari :</b><br/>
- FR Ujian CPNS SKB Prakom 2021<br/>
- FR Ujian PPPK Teknis Prakom 2022 & 2023<br/>
- Kisi-kisi permenpanRB<br/>
- Pengembangan materi/garis besar terkait Kisi-kisi dan FR
                        </div>
						
                        <?php if(($user->activation_selector=='1' && $user->activation_code=='0' && $user->remember_selector!='15' )){ ?>
<div class="callout callout-warning">
                           Silakan Donasi <del>Rp 100.000</del> <b>Rp 50.000</b>&nbsp;<span class="badge badge-danger">Alumni 2023</span>,untuk bisa mengakses Seluruh Sesi Ujian + Akses Modul eBook Materi + Fitur kedepannya.<br/>
						   <b>Donasi diperlukan guna Pengembangan Website CAT Prakom lebih baik.</b>
                        </div>
						<img src="../assets/logo/qris_new.png" class="center"/>
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
						<img src="../assets/logo/qris_new.png" class="center"/>
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
                           Silakan Donasi <b>Rp 35.000</b>&nbsp;<span class="badge badge-success">Paket Fokus SKD CPNS</span>, untuk bisa mengakses Seluruh Sesi Ujian + Akses Modul eBook Materi + Fitur kedepannya.<br/>
						   <b>Donasi diperlukan guna Pengembangan Website CAT Prakom lebih baik.</b>
                        </div>
						<img src="../assets/logo/qris_new.png" class="center"/>
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
					<?php } ?>
					
					
			
	
	       
    </div>
</div>

<!-- jQuery 3 -->
<script src="<?= base_url('assets/bower_components/jquery/dist/jquery.min.js')?>"></script>
<script src="<?= base_url('assets/bower_components/datatables.net/js/jquery.dataTables.min.js')?>"></script>
<script src="<?= base_url('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')?>"></script>

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>