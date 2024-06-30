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
                <?= form_open_multipart('Biodata/editsurvei'); ?>
                <?php } ?>
                    <div class="form-group">
                        <label for="nim">NO PESERTA </label>
                        <input placeholder="No Peserta" type="hidden" name="id" class="form-control" value="<?= $bioanggota['no_hp'] ?>">
                        <input placeholder="No Peserta" type="text" name="no" class="form-control" value="<?= $bioanggota['no_peserta']?>" disabled>
                        <small class="help-block"></small>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">NAMA</label>
                        <input placeholder="Nama" type="text" name="nama" class="form-control" value="<?= $bioanggota['nama_b'] ?>" disabled>
                        <small class="help-block"></small>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Testimoni terhadap Layanan CAT-Prakom</label>
                        <textarea placeholder="Berikan testimoni /Ulasan/Review anda terkait adanya Layanan CAT-Prakom" type="text" name="testimoni" class="form-control"></textarea>
                        <small class="help-block"></small>
                    </div>
                   
            </div>

            <div class="col-sm-4 col-sm-offset-1">
                   <div class="form-group">
                        <label for="nama">No.HP</label>
                        <input placeholder="NIK" type="text" name="nik" class="form-control" value="<?= $bioanggota['nik'] ?>" minlength="16" maxlength="16" required disabled>
                        <small class="help-block"></small>
                    </div>
                    <div class="form-group">
                        <label for="nama_dosen">Melamar di Instansi Mana ? <font color="red">WAJIB ISI</font></label>
                        <input type="text" name="melamar" class="form-control" placeholder="contoh : Pemkot Medan/KPK/Kemenag/DPR RI" >
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
                        <button type="submit" class="btn btn-flat bg-purple"><i class="fa fa-save"></i> Simpan</button>
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