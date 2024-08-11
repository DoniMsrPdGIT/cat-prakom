<?= form_open_multipart('Mahasiswa/aksi_berkas'); ?>
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Form <?=$subjudul?></h3>
        <div class="box-tools pull-right">
            <a href="<?=base_url()?>dosen" class="btn btn-sm btn-flat btn-warning">
                <i class="fa fa-arrow-left"></i> Batal
            </a>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
                <div class="form-group">
                    <label for="nama_dosen">Anggota</label>
                    <select type="text" class="form-control" name="anggota" placeholder="Judul Modul">
                        <option>--Pilh Anggota--</option>
                        <?php 
                            foreach ($anggota as $agt) {
                                echo"<option value='$agt->id_mahasiswa'>$agt->nama</option>";
                            }
                         ?>
                    </select>
                    <small class="help-block"></small>
                </div>
                <div class="form-group">
                    <label for="nama_dosen">Judul</label>
                    <input type="text" class="form-control" name="judul" placeholder="Judul Berkas">
                    <small class="help-block"></small>
                </div>
                <div class="form-group">
                    <label for="nama_dosen">Berkas</label>
                    <input type="file" class="form-control" name="berkas">
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