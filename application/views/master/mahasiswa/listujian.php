<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')?>">

<?php 
    $kodeunik = $this->uri->segment('3');
    $cekujian = $this->db->query("SELECT * FROM h_ujian  where mahasiswa_id=$kodeunik")->row_array();
    $cekpeserta = $this->db->query("SELECT * FROM mahasiswa where id_mahasiswa=$kodeunik")->row_array();
 ?>

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"><?= $subjudul ?></h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="box-body">
        <div class="mt-2 mb-3">
            <?php if (empty($cekujian)) { ?>
            <div class="alert alert-danger alert-dismissible">
                <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> -->
                <h4><i class="icon fa fa-warning"></i> NOTICE..!!</h4>
                <font style="color: #F0FFF0;"><b>PESERTA <?= $cekpeserta['nama'] ?> BELUM PERNAH MENGIKUTI UJIAN..</b></font>
            </div>
            <?php }else{ ?>
            <div class="alert alert-danger alert-dismissible">
                <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> -->
                <h4><i class="icon fa fa-warning"></i> NOTICE..!!</h4>
                <font style="color: #F0FFF0;"><b>NB : Pastikan data yang anda akan reset sudah benar. Karena data yang sudah di reset tidak bisa di kembalikan.</b></font>
            </div>
            <?php } ?>
        </div>
        <table id="example1" class="w-100 table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th style="width: 5px;">No.</th>
                    <th>Nama Ujian</th>
                    <th>Jumlah Soal</th>
                    <th>Nilai</th>
                    <th style="text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
            	<?php 
            		foreach ($list as $key => $l) {
            	 ?>
            	<tr>
            		<td><?= $key+1 ?></td>
            		<td><?= $l->nama_ujian ?></td>
            		<td><?= $l->jumlah_soal ?></td>
            		<td><?= $l->nilai ?></td>
            		<td style="width: 15px; text-align: center;"><a href="<?= base_url("DataPeserta/reset/$l->id/$l->mahasiswa_id")?>" class="btn btn-warning"><i class="fa fa-refresh"></i> Reset</a></td>
            	</tr>
           		<?php } ?>
            </tbody>
        </table>
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
