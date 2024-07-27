
<?= form_open_multipart('Narasumber/editnilai'); ?>
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
    
        <div class="box-body">
            <table class="table">
                <tr>
                    <th valign="middle" rowspan="2">1.</th>
                    <td style="width: 10%;">
                        <input type="hidden" class="form-control" name="id" placeholder="Materi" value="<?= $view_nilai['id_mahasiswa'] ?>">
                        <input type="hidden" class="form-control" name="id_edit" placeholder="Materi" value="<?= $view_nilai['id_penilaian'] ?>">
                        <input type="text" class="form-control" placeholder="Angkatan" value="<?= $view_nilai['nama_kelas'] ?>" disabled>
                    <th style="width: 45%;" colspan="3">
                        <input type="text" class="form-control" placeholder="Nama Narasumber" value="<?= $view_nilai['nm_narsum'] ?>" disabled>
                        <input type="hidden" class="form-control" name="nama[]" value="<?= $view_nilai['id_narasumber'] ?>"></th>
                    <td style="width: 45%;" colspan="1">
                        <input type="text" class="form-control" placeholder="Materi" value="<?= $view_nilai['materi'] ?>" disabled>
                </tr>
                <tr>
                    <td><input type="number" class="form-control" name="sikap" placeholder="Sikap" min="10" max="99" value="<?= $view_nilai['penampilan'] ?>"></td>
                    <td><input type="number" class="form-control" name="penyampaian" placeholder="Penyampaian"  min="10" max="99" value="<?= $view_nilai['penyampaian']?>"></td>
                    <td><input type="number" class="form-control" name="penguasaan" placeholder="Penguasaan Materi" min="10" max="99" value="<?= $view_nilai['penguasaan'] ?>"></td>
                    <td><input type="number" class="form-control" name="waktu" placeholder="Ketepatan Waktu" min="10" max="99" value="<?= $view_nilai['ketepatan'] ?>"></td>
                    <td><textarea type="text" class="form-control" name="saran" placeholder="Saran"><?= $view_nilai['saran'] ?></textarea></td>
                </tr>
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

</div>
<?=form_close();?>
