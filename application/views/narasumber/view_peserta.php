
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
            <a href="<?= base_url('Narasumber/nilai') ?>" class="btn btn-sm bg-purple btn-flat"><i class="fa fa-plus"></i> Tambah Data</a>
        </div>
        <div class="table-responsive">
        <table id="example1" class="w-100 table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Narasumber</th>
                    <th>Materi</th>
                    <th>Penampilan</th>
                    <th>Penyampaian</th>
                    <th>Penguasaan</th>
                    <th>Ketepatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $no=1;
                foreach ($view_nilai as $v) { 
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $v->nm_narsum ?></td>
                    <td><?= $v->materi ?></td>
                    <td><?= $v->penampilan ?></td>
                    <td><?= $v->penyampaian ?></td>
                    <td><?= $v->penguasaan ?></td>
                    <td><?= $v->ketepatan ?></td>
                    <td style="width: 40px;">
                      <a href="<?= base_url("Narasumber/edit_nilai/$v->id_penilaian")?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        </div>
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