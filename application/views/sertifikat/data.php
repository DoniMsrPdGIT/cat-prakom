
   <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')?>">

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Master <?= $subjudul ?></h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="box-body">
      <?php if($this->ion_auth->is_admin()) : ?>
        <div class="mt-2 mb-4">
            <a href="<?= base_url('Sertifikat/viewadd/peserta') ?>" class="btn btn-sm bg-purple btn-flat"><i class="fa fa-plus"></i> Sertifikat Peserta</a>
            <a href="<?= base_url('Sertifikat/viewadd/panitia') ?>" class="btn btn-sm bg-primary btn-flat"><i class="fa fa-plus"></i> Sertifikat Panitia</a>
        </div>
        <?= form_open('dosen/delete', array('id' => 'bulk')) ?>
        <table id="example1" class="w-100 table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th style="width: 5px;">No.</th>
                    <th>No Peserta</th>
                    <th>Nama</th>
                    <th>Bagian</th>
                    <th>File</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
              <?php 
                $no=1;
                foreach ($view as $v) {
               ?>
                <tr>
                    <td style="width: 5px;"><?= $no++; ?></td>
                    <td><?= $v->no_peserta ?></td>
                    <?php 
                      if($v->level=='Peserta'){
                     ?>
                    <td><?= $v->nama .' - '.$v->nim?></td>
                    <?php 
                      }else{
                     ?>
                     <td><?= $v->nama_dosen .' - '.$v->nip ?></td>
                    <?php } ?>
                    <td><?= $v->level ?></td>
                    <td><a href="<?= base_url("uploads/sertifikat/$v->file_sertifikat")?>" target="_blank"><img src="<?= base_url('assets/logo/pdf.png')?>" style="width: 30px;"></a></td>
                    <td style="width: 80px;">
                      <a href="<?= base_url('Sertifikat/detail/'.$v->id_sertifikat)?>" class="btn btn-primary btn-xs" title="Detail"><i class="glyphicon glyphicon-search"></i></a>
                      <a href="<?= base_url('Sertifikat/viewedit/'.$v->id_sertifikat)?>" class="btn btn-warning btn-xs" title="Edit"><i class="fa fa-pencil"></i></a>
                      <a href="<?= base_url("Sertifikat/delete/$v->id_sertifikat/$v->file_sertifikat")?>" class="btn btn-danger btn-xs" title="Hapus"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
              <?php } ?>
            </tbody>
        </table>
        <?= form_close() ?>
        <?php endif; ?>
        <?php if( $this->ion_auth->in_group('mahasiswa') ) : ?>
        <?php 
            $id = $user->email;
            $mhs = $this->db->query("SELECT * FROM mahasiswa m LEFT JOIN users u ON m.email=u.email where m.email='".$id."'")->row_array();

            $nim = $mhs['nim'];

            $sertifikat = $this->db->query("SELECT * FROM sertifikat where nim='".$nim."'");
            $ada=$sertifikat->num_rows();

         ?>
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
              <?php 
                  if ($ada) {
               ?>
                <div class="form-group">
                    <label for="nama_dosen">Sertifikat <?= $view['nama'].' '.$view['nim'] ?></label>
                    <small class="help-block"></small>
                </div>

                <div class="form-group">
                    <iframe src="<?= base_url("uploads/sertifikat/".$view['file_sertifikat'])?>" style="width:100%; height:500px;" frameborder="0"></iframe>
                </div>
              <?php } else{ ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-warning"></i>Sertifikat Belum Ada.. SIlahkan tunggu sertifikat di upload..</h4>
                </div>
              <?php } ?>
            </div>
        </div>
        <?php endif; ?>


<!-- Dosen -->
        <?php if( $this->ion_auth->in_group('dosen') ) : ?>

          <?php 
            $id_d = $user->email;
            $dosen = $this->db->query("SELECT * FROM dosen d LEFT JOIN users u ON d.email=d.email where d.email='".$id_d."'")->row_array();

            $nip = $dosen['nip'];

            $sertifikat = $this->db->query("SELECT * FROM sertifikat where nim='".$nip."'");
            $ada_d=$sertifikat->num_rows();

         ?>

          <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
              <?php 
                  if ($ada_d) {
                      
                    foreach ($view as $key => $v) {
               ?>
                <div class="form-group">
                    <label for="nama_dosen">Sertifikat <?= $v->nama_dosen.' '.$v->nip ?></label>
                    <small class="help-block"></small>
                </div>

                <div class="form-group">
                    <iframe src="<?= base_url("uploads/sertifikat/".$v->file_sertifikat)?>" style="width:100%; height:500px;" frameborder="0"></iframe>
                </div>
              <?php } } else{ ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-warning"></i>Sertifikat Belum Ada.. SIlahkan tunggu sertifikat di upload..</h4>
                </div>
              <?php } ?>
            </div>
          </div>
        <?php endif; ?>
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