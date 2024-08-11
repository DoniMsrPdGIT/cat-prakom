
  <!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')?>">
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">List <?= $subjudul ?></h3>
        
        <div class="box-tools pull-right">
            <!--<form action="<?= base_url('Biodata/cetak_all')?>" method="POST" target="_blank">-->
            <?= form_open_multipart('Biodata/cetak_all'); ?>
                <select type="text" name="kelas">
                    <option value="">--Kelas--</option>
                    <?php
                        foreach($kelas as $k){
                    echo "<option value='$k->id_kelas'>$k->nama_kelas</option>";
                    
                    }?>
                </select>
                <button type="submit" class="btn btn-primary btn-md"><i class="fa fa-print"></i></button>
                <?=form_close();?>
            <!--</form>-->
            
        </div>
    </div>
    <div class="box-body">
        <div class="table-responsive">
            <table id="example1" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>NO ANGGOTA</th>
                        <th>NAMA</th>
                        <th>RANTING</th>
                        <th>Alamat</th>    
                        <th>Aksi</th>              
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no=1;
                        foreach ($biodata as $biodata) {
                     ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $biodata->no_peserta ?></td>
                        <td><?= $biodata->nama_b ?></td>
                        <td><?= $biodata->ranting ?></td>
                        <td><?= $biodata->alamat ?></td>
                        <td style="width: 5%;"><a href="<?= base_url("Biodata/cetak_biodata/$biodata->id_biodata")?>" target='_blank' class="btn btn-primary btn-md"><i class="fa fa-print"></i></a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
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