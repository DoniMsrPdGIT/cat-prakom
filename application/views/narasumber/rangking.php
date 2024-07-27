<?php 
  $email = $user->email;
  $mhs = $this->db->query("SELECT * FROM mahasiswa m LEFT JOIN users u ON m.email=u.email where m.email='".$email."'")->row_array();
  // $id_n = $mhs['id_mahasiswa'];
  if( $this->ion_auth->in_group('mahasiswa') ) :
  $cek = $this->db->query("SELECT * FROM penilaian_narsum where id_mahasiswa=$mhs[id_mahasiswa]");
  $ada=$cek->num_rows();
endif;
if($this->ion_auth->is_admin()) :
  $cek = $this->db->query("SELECT * FROM penilaian_narsum");
  $ada=$cek->num_rows();
endif;
 ?>
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
      <?php 
      if(!empty($ada)){
        }else{
       ?>
        <div class="mt-2 mb-4">
            <a href="<?= base_url('Narasumber/nilai') ?>" class="btn btn-sm bg-purple btn-flat"><i class="fa fa-plus"></i> Tambah Data</a>
        </div>
      <?php } ?>
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
                    <th>Rata-Rata</th>
                </tr>
            </thead>
            <tbody>
              <?php 
                $no=1;            
                if(empty($ada)){
                }else{

                // foreach ($view as $p) {
                  $jmlh_anggota = $this->db->query("SELECT COUNT(id_mahasiswa) as anggota FROM penilaian_narsum group by id_narasumber")->row_array();

                  if($this->ion_auth->is_admin()) :
                  $pn = $this->db->query("SELECT pn.id_narasumber, nm_narsum, materi, SUM(penampilan) as pn,SUM(penyampaian) as py,SUM(penguasaan) as pp,SUM(ketepatan) as kt,(((SUM(penampilan)/'$jmlh_anggota[anggota]')+(SUM(penyampaian)/'$jmlh_anggota[anggota]')+(SUM(penguasaan)/'$jmlh_anggota[anggota]')+(SUM(ketepatan)/'$jmlh_anggota[anggota]'))/4) as rata FROM penilaian_narsum pn LEFT JOIN narasumber n ON pn.id_narasumber=n.id_narasumber  group by pn.id_narasumber order by rata desc")->result();
                  endif;
                  if( $this->ion_auth->in_group('mahasiswa') ) :
                  $pn = $this->db->query("SELECT pn.id_narasumber, nm_narsum, materi, SUM(penampilan) as pn,SUM(penyampaian) as py,SUM(penguasaan) as pp,SUM(ketepatan) as kt,(((SUM(penampilan)/'$jmlh_anggota[anggota]')+(SUM(penyampaian)/'$jmlh_anggota[anggota]')+(SUM(penguasaan)/'$jmlh_anggota[anggota]')+(SUM(ketepatan)/'$jmlh_anggota[anggota]'))/4) as rata FROM penilaian_narsum pn LEFT JOIN narasumber n ON pn.id_narasumber=n.id_narasumber where pn.id_mahasiswa=$mhs[id_mahasiswa]  group by pn.id_narasumber order by rata desc")->result();
                endif;
                  foreach ($pn as $p) {
                    # code...
               ?>
                <tr>
                    <td><?= $no++; ?>.</td>
                    <?php if($this->ion_auth->is_admin()) : ?>
                    <td>
                      <!-- <a href="<?= base_url('Narasumber/deletepenilaian/'.$p->id_penilaian)?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a> -->
                    </td>
                    <?php endif; ?>
                    <td><?= $p->nm_narsum; ?></td>
                    <td><?= $p->materi; ?></td>
                    <td><?= $p->rata ?></td>
                </tr>
              <?php } }?>
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