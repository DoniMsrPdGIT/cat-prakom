<?php if( $this->ion_auth->in_group('mahasiswa') ) : 
    $user = $this->ion_auth->user()->row();
    $cek_id = $user->username;
    $see = $this->db->query("SELECT * FROM biodata_mahasiswa where nik=$cek_id")->row_array();
    $see_id = $see['id_biodata'];
 endif; ?>
 
   <!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')?>">
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">List <?= $subjudul ?></h3>
        <div class="box-tools pull-right">
            <?php 
                if($see_id==""){
                    
                }else{ ?>
                <!--<a href="<?= base_url("Biodata/cetak_biodata/$see_id")?>" type="button" class="btn btn-warning btn-xs" target="_blank"><i class='fa fa-print'></i></a>-->
            <?php    }    ?>
            
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="box-body">
        <?php if( $this->ion_auth->in_group('mahasiswa') ) : ?>
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <?php if($see_id==""){ ?>
                    <?= form_open_multipart('Biodata/add_biodata'); ?>
                        <?php }else{ ?>
                <?= form_open_multipart('Biodata/editbiodata'); ?>
                <?php } ?>
                    <div class="form-group">
                        <label for="nim">NO PESERTA </label>
                        <input placeholder="No Peserta" type="hidden" name="id" class="form-control" value="<?= $bioanggota['id_biodata'] ?>">
                        <input placeholder="No Peserta" type="text" name="no" class="form-control" value="<?= $bioanggota['no_peserta']?>" disabled>
                        <small class="help-block"></small>
                    </div>
                    <div class="form-group">
                        <label for="nama">Password</label>
                        <input  placeholder="NIK" type="hidden" name="nik" class="form-control" value="<?= $bioanggota['nik'] ?>" minlength="16" maxlength="16" required>
						<input  placeholder="NIK" type="text" disabled class="form-control" value="<?= $bioanggota['nik'] ?>" minlength="16" maxlength="16" required>
                        <small class="help-block"></small>
                    </div>
                    <div class="form-group">
                        <label for="email">NAMA</label>
                        <input  placeholder="Nama" type="hidden" name="nama" class="form-control" value="<?= $bioanggota['nama_b'] ?>">
						 <input  placeholder="Nama" type="text" disabled class="form-control" value="<?= $bioanggota['nama_b'] ?>">
                        <small class="help-block"></small>
                    </div>
                    
                    <div class="form-group">
                        <label for="kelas">TEMPAT LAHIR</label>
                        <input  placeholder="Tempat Lahir" type="hidden" name="tempat" class="form-control" value="<?= $bioanggota['tempat_lahir'] ?>">
						<input  placeholder="Tempat Lahir" type="text" disabled class="form-control" value="<?= $bioanggota['tempat_lahir'] ?>">
                        <small class="help-block"></small>
                    </div>
                    <div class="form-group">
                        <label for="kelas">TANGGAL LAHIR</label>
                        <input placeholder="Tanggal Lahir" type="date" name="tgl" class="form-control" value="<?= $bioanggota['tgl_lahir'] ?>">
                        <small class="help-block"></small>
                    </div>
                   
                    <div class="form-group">
                        <label for="email">ALAMAT</label>
						<textarea  placeholder="Alamat" type="text" style="display:none;" name="alamat" class="form-control"><?= $bioanggota['alamat'] ?></textarea>
						  <textarea  placeholder="Alamat" type="text" disabled class="form-control"><?= $bioanggota['alamat'] ?></textarea>
                        <small class="help-block"></small>
                    </div>
                   
            </div>

            <div class="col-sm-4 col-sm-offset-1">
                    <!--<div class="form-group">
                        <label for="nim">PAS FOTO</label>
                        <img src="<?= base_url('assets/pasfoto/'.$bioanggota['pas_foto'])?>" width="150px">
                        <input type="file" name="foto" class="form-control">
                        <input type="hidden" name="foto_lama" value="<?= $bioanggota['pas_foto'] ?>" class="form-control">
                        <small class="help-block"></small>
                    </div>-->
                    
                    <div class="form-group">
                        <label for="email">PEKERJAAN</label>
                        <input placeholder="Pekerjaan" type="text" name="kerja" class="form-control" value="<?= $bioanggota['pekerjaan'] ?>">
                        <small class="help-block"></small>
                    </div>
                   
                    <div class="form-group">
                        <label for="email">NOMOR HANDPHONE</label>
                        <input   placeholder="Nomor Handphone" type="hidden" name="nope" class="form-control" value="<?= $bioanggota['no_hp'] ?>">
						<input  disabled placeholder="Nomor Handphone" type="text" class="form-control" value="<?= $bioanggota['no_hp'] ?>">
                        <small class="help-block"></small>
                    </div>
                    <div class="form-group">
                        <label for="email">EMAIL</label>
                        <input   placeholder="Email" type="hidden" name="email" class="form-control" value="<?= $bioanggota['email'] ?>">
						<input   placeholder="Email" type="text" disabled  class="form-control" value="<?= $bioanggota['email'] ?>">
                        <small class="help-block"></small>
                    </div>
					  <div class="form-group">
                        <label for="email">USERNAME TELEGRAM</label>
						 <input placeholder="Username Telegram" type="hidden" name="telegram" class="form-control" value="<?= $bioanggota['telegram'] ?>">
						 <?php 
						 if($bioanggota['telegram']==NULL){
						 ?>
						   <input placeholder="contoh : https://t.me/udinsedunia" type="text" name="telegram" class="form-control" >
						  <?php 
						 }else{
						 ?>
						   <input placeholder="Username Telegram" disabled type="text" class="form-control" value="<?= $bioanggota['telegram'] ?>">
						
						  <?php 
						 }
						 ?>
						 
                       
                        <small class="help-block"></small>
                    </div>
                   
                    <?php 
                if($see_id==""){ ?>
                    <div class="form-group pull-right">
                        <button type="reset" class="btn btn-flat btn-default"><i class="fa fa-rotate-left"></i> Reset</button>
                        <button type="submit" class="btn btn-flat bg-purple"><i class="fa fa-save"></i> Simpan</button>
                    </div>
               <?php  }else{ ?>
               <div class="form-group pull-right">
                        <button type="submit" class="btn btn-flat bg-purple"><i class="fa fa-save"></i> Update</button>
                    </div>
               <?php } ?>
                <?=form_close()?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>

<!-- <script src="<?= base_url() ?>assets/dist/js/app/master/mahasiswa/data.js"></script> -->
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