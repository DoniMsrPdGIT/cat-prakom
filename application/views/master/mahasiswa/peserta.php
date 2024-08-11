<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')?>">


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
            <div class="alert alert-warning alert-dismissible">
                <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> -->
                <h4><i class="icon fa fa-warning"></i> NOTICE..!!</h4>
                <font style="color: #F0FFF0;"><b>NB : Jika ingin melakukan reset data ujian jika terjadi kendala saat ujian, admin dapat memilih peserta lalu menekan <b style="color: red;"><i>N I K</i></b>, nanti akan di arahkan ke halaman list ujian, silahkan pilih daftar ujian yang akan di reset.</b></font>
            </div>
        </div>
        <table id="example1" class="w-100 table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th style="width: 5px;">No.</th>
                    <th>NIK</th>
					<th>Telegram</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Nomor Peserta</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach ($view as $key => $p) {
                 ?>
                <tr>
                    <td><?= $key+1 ?></td>
                    <td><a href="<?= base_url("DataPeserta/lihat/$p->id_mahasiswa")?>"><?= $p->nim ?></a></td>
					<td><a href="<?= $p->usr_telegram ?>" target="_BLANK"><?= $p->usr_telegram ?></a></td>
                    <td><?= $p->nama ?></td>
                    <td><?= $p->email ?></td>
                    <td><?= $p->no_peserta ?></td>
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
