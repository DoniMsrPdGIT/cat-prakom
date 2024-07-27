<?php 
    $id = $user->email;
    $mhs = $this->db->query("SELECT * FROM mahasiswa m LEFT JOIN users u ON m.email=u.email where m.email='".$id."'")->row_array();

    $kelas = $mhs['kelas_id'];
    $idm = $mhs['id_mahasiswa'];

    $narasumber = $this->db->query("SELECT * FROM narasumber m where m.id_kelas='".$kelas."'");
    $ada=$narasumber->num_rows();
    
    $cek_m = $this->db->query("SELECT * FROM penilaian_narsum where id_mahasiswa='".$idm."'");
    $cek_ada = $cek_m->num_rows();
    
    // $user = $this->ion_auth->user()->row();
    // $id = $user->id;
    // $id_m = $this->db->query("SELECT * FROM mahasiswa where nim='".$id."'")->row_array();

 ?>

<?= form_open_multipart('Narasumber/addnilai'); ?>
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Form <?=$subjudul?> </h3>
            <div class="box-tools pull-right">
                <font color="red" size="4">NB : * Isikan nilai mulai dari 10 sampai dengan 100.</font> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="<?=base_url()?>Narasumber/view_nilai" class="btn btn-sm btn-flat btn-warning text-right">
                <i class="fa fa-arrow-left"></i> Batal
            </a>
          </div>
        </div>
    </div>
    
    <?php if($cek_ada){ ?>
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-warning"></i>Sudah Melakukan Penilaian..!</h4>
        </div>
    <?php }else{ ?>
    
        <?php 
            if ($ada) {
         ?>
        <div class="box-body">
            <table class="table">
                <?php 
                    $no=1;
                    foreach ($view as $n) {
                 ?>
                <tr>
                    <th valign="middle" rowspan="2"><?= $no++; ?>.</th>
                    <td style="width: 10%;">
                        <input type="hidden" class="form-control" name="id" placeholder="Materi" value="<?= $mhs['id_mahasiswa'] ?>">
                        <input type="text" class="form-control" placeholder="Angkatan" value="<?= $n->nama_kelas ?>" disabled>
                    <th style="width: 45%;" colspan="3">
                        <input type="text" class="form-control" placeholder="Nama Narasumber" value="<?= $n->nm_narsum ?>" disabled>
                        <input type="hidden" class="form-control" name="nama[]" value="<?= $n->id_narasumber ?>"></th>
                    <td style="width: 45%;" colspan="1">
                        <input type="text" class="form-control" placeholder="Materi" value="<?= $n->materi ?>" disabled>
                </tr>
                <tr>
                    <td><input type="number" class="form-control" name="sikap[]" placeholder="Sikap" min="10" max="99" required></td>
                    <td><input type="number" class="form-control" name="penyampaian[]" placeholder="Penyampaian"  min="10" max="99" required></td>
                    <td><input type="number" class="form-control" name="penguasaan[]" placeholder="Penguasaan Materi" min="10" max="99" required></td>
                    <td><input type="number" class="form-control" name="waktu[]" placeholder="Ketepatan Waktu" min="10" max="99" required></td>
                    <td><textarea type="text" class="form-control" name="saran[]" placeholder="Saran"></textarea></td>
                </tr>
            <?php } ?>
            </table>
            <div class="form-group pull-right">
                <button type="reset" class="btn btn-flat btn-default">
                    <i class="fa fa-rotate-left"></i> Reset
                </button>
                <button type="submit" id="submit" class="btn btn-flat bg-purple">
                    <i class="fa fa-save"></i> Simpan
                </button>
            </div>
        </div>
        <?php }else{ ?>
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-warning"></i>Narasumber Belum Ada..!</h4>
        </div>
        <?php } ?>
<?php } ?>

</div>
<?=form_close();?>

<script>
  $(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
    
    $("#angkatan").change(function(){ // Ketika user mengganti atau memilih data provinsi
      $("#narsum").hide(); // Sembunyikan dulu combobox kota nya
      // $("#loading").show(); // Tampilkan loadingnya
    
      $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: "<?= base_url("Narasumber/datanarasum"); ?>", // Isi dengan url/path file php yang dituju
        data: {id_angkatan : $("#angkatan").val()}, // data yang akan dikirim ke file yang dituju
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ // Ketika proses pengiriman berhasil
          // $("#loading").hide(); // Sembunyikan loadingnya

          // set isi dari combobox kota
          // lalu munculkan kembali combobox kotanya
          $("#narsum").html(response.list_narasumber).show();

        },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
        }
      });
    });
</script>