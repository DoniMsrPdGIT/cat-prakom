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
            <a href="<?= base_url('Narasumber/viewadd') ?>" class="btn btn-sm bg-purple btn-flat"><i class="fa fa-plus"></i> Tambah Data</a>
            <a href="<?= base_url('Narasumber/rangking') ?>" class="btn btn-sm btn-default btn-flat"><i class="fa fa-trophy"></i> Rata-Rata</a>
        </div>
        <?= form_open('dosen/delete', array('id' => 'bulk')) ?>
        <table id="example1" class="w-100 table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th style="width: 5px;">No.</th>
                    <th>Narasumber</th>
                    <th>Kelas</th>
                    <th>Materi</th>
                    <th>Hari</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
              <?php 
                $no=1;
                foreach ($view as $v) {
                    if($v->hari==""){
                        $hari = "-";
                    }else{
                        $hari = $v->hari;
                    }
                    if($v->tgl==""){
                        $tgl = "-";
                    }else{
                        $tgl = tgl_indo($v->tgl);
                    }
               ?>
                <tr>
                    <td style="width: 5px;"><?= $no++; ?></td>
                    <td><?= $v->nm_narsum ?></td>
                    <td><?= $v->nama_kelas ?></td>
                    <td><?= $v->materi ?></td>
                    <td><?= $hari ?></td>
                    <td><?= $tgl ?></td>
                    <td style="width: 10px;">
                      <a href="<?= base_url('Narasumber/viewedit/'.$v->id_narasumber)?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                      <a href="<?= base_url('Narasumber/delete/'.$v->id_narasumber)?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                    </td>
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