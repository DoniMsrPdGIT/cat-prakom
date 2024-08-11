<?= form_open_multipart('Sertifikat/edit'); ?>
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"><?=$subjudul?></h3>
        <div class="box-tools pull-right">
            <a href="<?=base_url()?>sertifikat" class="btn btn-sm btn-flat btn-warning">
                <i class="fa fa-arrow-left"></i> Batal
            </a>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="form-group">
                    <label for="nama_dosen">Sertifikat <?= $edit['nama'].' - '.$edit['nim'] ?></label>
                    <small class="help-block"></small>
                </div>

                <div class="form-group">
                    <iframe src="<?= base_url("uploads/sertifikat/".$edit['file_sertifikat'])?>" style="width:100%; height:500px;" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<?=form_close();?>

<script src="<?=base_url()?>assets/dist/js/app/master/dosen/add.js"></script>