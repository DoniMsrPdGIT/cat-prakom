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
        <div class="mt-2 mb-4">
            <a href="<?= base_url('Mahasiswa/addberkas') ?>" class="btn btn-sm bg-purple btn-flat"><i class="fa fa-plus"></i> Tambah Data</a>
        </div>
        <?= form_open('dosen/delete', array('id' => 'bulk')) ?>
        <table id="example1" class="w-100 table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th style="width: 5px;">No.</th>
                    <th>Anggota</th>
                    <th>Judul</th>
                    <th>Berkas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $no=1;
                    foreach ($berkas as $bks) {
                 ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $bks->nama ?></td>
                    <td><?= $bks->nama_berkas ?></td>
                    <td><a href="<?= base_url('uploads/berkas/'.$bks->file)?>"><img src="<?= base_url('assets/logo/pdf.png')?>" style="width: 50px;"></a></td>
                    <td style="width: 5px;"><a href="<?= base_url('Mahasiswa/del_berkas/'.$bks->id_berkas.'/'.$bks->file)?>" class="btn btn-danger btn-md"><i class="fa fa-trash"></i></a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?= form_close() ?>
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