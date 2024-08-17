<?= form_open_multipart('C_Modul/aksi_modul'); ?>
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Form <?=$subjudul?></h3>
        <div class="box-tools pull-right">
            <a href="<?=base_url()?>C_Modul" class="btn btn-sm btn-flat btn-warning">
                <i class="fa fa-arrow-left"></i> Batal
            </a>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
                <div class="form-group">
                    <label for="nama_dosen">Judul</label>
                    <input type="text" class="form-control" name="judul" placeholder="Judul Modul">
                    <small class="help-block"></small>
                </div>
				 <div class="form-group">
                    <label for="nama_dosen">Deskripsi</label>
                    <input type="text" class="form-control" name="edisi" placeholder="Deskripsi singkat">
                    <small class="help-block"></small>
                </div>
                <!-- <div class="form-group">
                    <label for="nama_dosen">Modul</label>
                    <input type="file" class="form-control" name="modul">
                    <small class="help-block"></small>
                </div> -->
                <div class="form-group">
                    <label for="nama_dosen">URL Mediafire</label>
                    <input type="text" class="form-control" name="link" placeholder="URL Mediafire">
                    <small class="help-block"></small>
                </div>
                <div class="form-group">
                    <label for="nama_dosen">Status Aktif</label>
                    <select name="status" class="form-control">
                        <option value="0">Non-Aktif</option>
                        <option value="1" selected>Aktif</option>
                    </select>
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