 <!-- ComboSearch -->
  <link rel="stylesheet" href="<?= base_url('assets/dist/combo serach/docsupport/prism.css')?>">
  <link rel="stylesheet" href="<?= base_url('assets/dist/combo serach/chosen.css')?>">

<?= form_open_multipart('Sertifikat/add'); ?>
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
                    <input type="hidden" class="form-control" name="level" value="Panitia" data-placeholder="Peserta...">
                    <small class="help-block"></small>
                </div>
                <div class="form-group">
                    <label for="nama_dosen">Panitia</label>
                    <select type="text" class="form-control chosen-select" name="peserta" placeholder="Peserta">
                        <option>--Pilih Panitia--</option>
                        <?php 
                            $no=1;
                            foreach ($panitia as $p) {
                                echo"<option value='$p->nip'>$p->nip".' - '."$p->nama_dosen</option>";
                            }
                         ?>
                    </select>
                    <small class="help-block"></small>
                </div>
                <div class="form-group">
                    <label for="nama_dosen">Sertifikat</label>
                    <input type="file" class="form-control" name="sertifikat" placeholder="Materi">
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
<!-- Combo Search -->
<script src="<?= base_url('assets/dist/combo search/docsupport/jquery-3.2.1.min.js')?>" type="text/javascript"></script>
<script src="<?= base_url('assets/dist/combo serach/chosen.jquery.js')?>" type="text/javascript"></script>
<script src="<?= base_url('assets/dist/combo serach/docsupport/prism.js')?>" type="text/javascript" charset="utf-8"></script>
<script src="<?= base_url('assets/dist/combo serach/docsupport/init.js')?>" type="text/javascript" charset="utf-8"></script>
