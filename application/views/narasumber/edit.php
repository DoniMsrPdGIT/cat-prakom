<?= form_open_multipart('Narasumber/edit'); ?>
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Form <?=$subjudul?></h3>
        <div class="box-tools pull-right">
            <a href="<?=base_url()?>Narasumber" class="btn btn-sm btn-flat btn-warning">
                <i class="fa fa-arrow-left"></i> Batal
            </a>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
                <div class="form-group">
                    <label for="nama_dosen">Nama Narasumber</label>
                    <input type="text" class="form-control" name="nama" placeholder="Judul Berkas" value="<?= $idangakatan['nm_narsum'] ?>">
                    <input type="hidden" class="form-control" name="id" placeholder="Judul Berkas" value="<?= $idangakatan['id_narasumber'] ?>">
                    <small class="help-block"></small>
                </div>
                <div class="form-group">
                    <label for="nama_dosen">Angkatan</label>
                    <select type="text" class="form-control" name="angkatan" placeholder="Angkatan">
                        <option>--Pilih Angkatan--</option>
                        <?php 
                            $no=1;
                            foreach ($angkatan as $akt) {
                                if ($akt->id_kelas==$idangakatan['id_kelas']) {
                                    $cek = 'selected';
                                }else{
                                    $cek ='';
                                }
                                echo"<option value='$akt->id_kelas' $cek>$akt->nama_kelas</option>";
                            }
                         ?>
                    </select>
                    <small class="help-block"></small>
                </div>
                <div class="form-group">
                    <label for="nama_dosen">Materi</label>
                    <input type="text" class="form-control" name="materi" placeholder="Materi" value="<?= $idangakatan['materi'] ?>">
                    <small class="help-block"></small>
                </div>
                <div class="form-group">
                    <label for="nama_dosen">Hari</label>
                    <select type="text" class="form-control" name="hari" placeholder="Materi">
                        <option>--Pilih Hari--</option>
                        <?php 
                        if ($idangakatan['hari']=='Senin') {
                            $cek ="selected";
                         ?>
                        <option value="Senin" <?= $cek ?>>Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jum'at">Jum'at</option>
                        <option value="Sabtu">Sabtu</option>
                        <option value="Minggu">Minggu</option>
                    <?php }else if ($idangakatan['hari']=='Selasa') {
                            $cek ="selected";
                         ?>
                        <option value="Senin" >Senin</option>
                        <option value="Selasa" <?= $cek ?>>Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jum'at">Jum'at</option>
                        <option value="Sabtu">Sabtu</option>
                        <option value="Minggu">Minggu</option> ?>
                    <?php } else if ($idangakatan['hari']=='Rabu') {
                            $cek ="selected";
                         ?>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu" <?= $cek ?>>Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jum'at">Jum'at</option>
                        <option value="Sabtu">Sabtu</option>
                        <option value="Minggu">Minggu</option> ?>
                    <?php } else if ($idangakatan['hari']=='Kamis') {
                            $cek ="selected";
                         ?>
                        <option value="Senin" >Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis" <?= $cek ?>>Kamis</option>
                        <option value="Jum'at">Jum'at</option>
                        <option value="Sabtu">Sabtu</option>
                        <option value="Minggu">Minggu</option> ?>
                    <?php } else if ($idangakatan['hari']=="Jum'at") {
                            $cek ="selected";
                         ?>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jum'at" <?= $cek ?>>Jum'at</option>
                        <option value="Sabtu">Sabtu</option>
                        <option value="Minggu">Minggu</option> ?>
                    <?php } else if ($idangakatan['hari']=="Sabtu") {
                            $cek ="selected";
                         ?>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jum'at">Jum'at</option>
                        <option value="Sabtu" <?= $cek ?>>Sabtu</option>
                        <option value="Minggu">Minggu</option> ?>
                    <?php } else {
                            $cek ="selected";
                         ?>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jum'at">Jum'at</option>
                        <option value="Sabtu">Sabtu</option>
                        <option value="Minggu" <?= $cek ?>>Minggu</option> ?>
                    <?php } ?>
                    </select>
                    <small class="help-block"></small>
                </div>
                <div class="form-group">
                    <label for="nama_dosen">Tanggal</label>
                    <input type="date" class="form-control" name="tgl" placeholder="Materi" value="<?= $idangakatan['tgl'] ?>">
                    <small class="help-block"></small>
                </div>
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
    </div>
</div>
<?=form_close();?>

<script src="<?=base_url()?>assets/dist/js/app/master/dosen/add.js"></script>