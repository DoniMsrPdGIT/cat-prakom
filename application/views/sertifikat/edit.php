<?= form_open_multipart('Sertifikat/edit'); ?>
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Form <?=$subjudul?></h3>
        <div class="box-tools pull-right">
            <a href="<?=base_url()?>Sertifikat" class="btn btn-sm btn-flat btn-warning">
                <i class="fa fa-arrow-left"></i> Batal
            </a>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
                <div class="form-group">
                    <label for="nama_dosen">Peserta</label>
                    <input type="hidden" class="form-control" name="id" placeholder="Materi" value="<?= $edit['id_sertifikat'] ?>">
                    <input type="hidden" class="form-control" name="nim" placeholder="Materi" value="<?= $edit['nim'] ?>">
                    <select type="text" class="form-control chosen-select" name="peserta" placeholder="Peserta" disabled="">
                        <option>--Pilih Peserta--</option>
                        <?php 
                            $no=1;
                            foreach ($peserta as $p) {
                                if ($p->nim==$edit['nim']) {
                                    $cek = "selected";
                                }else{
                                    $cek ="";
                                }
                                echo"<option value='$p->nim' $cek>$p->nama".'-'."$p->nim</option>";
                            }
                         ?>
                    </select>
                    <small class="help-block"></small>
                </div>
                <div class="form-group">
                    <label for="nama_dosen">Sertifikat</label>
                    <input type="file" class="form-control" name="sertifikat" placeholder="Materi">
                    <input type="hidden" class="form-control" name="sertifikat_lama" placeholder="Materi" value="<?= $edit['file_sertifikat'] ?>">
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