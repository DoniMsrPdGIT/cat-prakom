<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')?>">

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Master <?= $subjudul ?></h3>
        <div class="box-tools pull-right">
        <?php if($this->ion_auth->is_admin()) : ?>
            <a href="<?=base_url('Narasumber')?>" class="btn btn-sm btn-flat btn-warning">
                <i class="fa fa-arrow-left"></i> Back
            </a>
        <?php endif; ?>
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="box-body">
        <div class="mt-2 mb-4">
            <a href="<?= base_url('Narasumber/nilai') ?>" class="btn btn-sm bg-purple btn-flat"><i class="fa fa-plus"></i> Tambah Data</a>
            <a href="<?= base_url('Narasumber/rangking') ?>" class="btn btn-sm btn-default btn-flat"><i class="fa fa-trophy"></i> Rata-Rata</a>
        </div>
        <?= form_open('dosen/delete', array('id' => 'bulk')) ?>
        <div class="table-responsive">
        <table id="example1" class="w-100 table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <?php if($this->ion_auth->is_admin()) : ?>
                    <th style="width: 100px;" colspan="2">No.</th>
                    <?php endif; ?>
                    <?php if( $this->ion_auth->in_group('mahasiswa') ) : ?>
                    <th style="width: 100px;">No.</th>
                    <?php endif; ?>
                    <th>Narasumber</th>
                    <th>Materi</th>
                    <th>Penampilan/Sikap</th>
                    <th>Penyampaian Materi</th>
                    <th>Penguasaan Materi</th>
                    <th>Ketepatan Waktu</th>
                    <th>Saran</th>
                </tr>
            </thead>
            <tbody>
              <?php 
                $no=1;
                foreach ($penilaian as $p) {
                  $jmlh_anggota = $this->db->query("SELECT COUNT(id_mahasiswa) as anggota FROM penilaian_narsum group by id_narasumber")->row_array();
                  @$nilai = ($p->penampilan + $p->penyampaian + $p->penyampaian + $p->ketepatan);
                  @$rata  = $nilai / $jmlh_anggota['anggota'];
               ?>
                <tr>
                    <td><?= $no++; ?>.</td>
                    <?php if($this->ion_auth->is_admin()) : ?>
                    <td>
                      <a href="<?= base_url('Narasumber/deletepenilaian/'.$p->id_penilaian)?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                    </td>
                    <?php endif; ?>
                    <td><?= $p->nm_narsum ?></td>
                    <td><?= $p->materi ?></td>
                    <td><?= $p->penampilan ?></td>
                    <td><?= $p->penyampaian ?></td>
                    <td><?= $p->penguasaan ?></td>
                    <td><?= $p->ketepatan ?></td>
                    <td><?= $p->saran ?></td>
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