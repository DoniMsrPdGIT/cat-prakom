<?= form_open_multipart('C_Modul/aksi_video'); ?>
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
                    <label for="nama_dosen">Tema Judul</label>
                    <input type="text" class="form-control" name="tema" placeholder="Tema Video">
                    <small class="help-block"></small>
                </div>
               <div class="form-group">
                    <label for="nama_dosen">Deskrispi</label>
                    <input type="text" class="form-control" name="judul" placeholder="Judul Video">
                    <small class="help-block"></small>
                </div>
				<div class="form-group">
                    <label for="nama_dosen">URL Embed</label>
                    <input type="text" class="form-control" name="url" placeholder="URL Embed">
                    <small class="help-block"></small>
                </div>
				<div class="form-group">
                    <label for="nama_dosen">Youtube Channel</label>
                    <input type="text" class="form-control" name="ch_yt" placeholder="Hak Cipta">
                    <small class="help-block"></small>
                </div>
                 <div class="form-group">
                  <label for="nama_dosen">Cover Youtube</label>
                                <input type="file" name="fvideo" class="form-control">
                                <small class="help-block" style="color: #dc3545"></small>
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

