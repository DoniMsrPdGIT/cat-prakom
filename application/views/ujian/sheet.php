<?php
if(time() >= $soal->waktu_habis)
{
    if($soal->ujian_id>='401' && $soal->ujian_id<='480'){
        redirect('ujian/list_sosio', 'location', 301);
        }elseif($soal->ujian_id>='6461' && $soal->ujian_id<='6540'){
            redirect('ujian/list_manaj', 'location', 301);
        }elseif($soal->ujian_id>='6588' && $soal->ujian_id<='6667'){
            redirect('ujian/list_wawan', 'location', 301);
        } else if ((($soal->ujian_id >= '6668' && $soal->ujian_id <= '6692')||($soal->ujian_id >= '6819' && $soal->ujian_id <= '6828'))) {
            redirect('ujian/list_twk', 'location', 301);
          } else if ((($soal->ujian_id >= '6698' && $soal->ujian_id <= '6722')||($soal->ujian_id >= '6834' && $soal->ujian_id <= '6843'))) {
            redirect('ujian/list_tiu', 'location', 301);
          } else if ((($soal->ujian_id >= '6728' && $soal->ujian_id <= '6752')||($soal->ujian_id >= '6865' && $soal->ujian_id <= '6874'))) {
            redirect('ujian/list_tkp', 'location', 301);
    }else{
        redirect('ujian/list', 'location', 301);   
    }
}
?>
<div class="row">
    <div class="col-sm-3">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Navigasi Soal</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body text-center" id="tampil_jawaban">
            </div>
        </div>
    </div>
    <div class="col-sm-9">
        <?=form_open('', array('id'=>'ujian'), array('id'=> $id_tes));?>
        <?php 
        $id_tes_decr = $this->encryption->decrypt($id_tes);
        $ujian_id = $this->ujian->getUjianIdById($id_tes_decr);
        ?>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><span class="badge bg-blue">Soal #<span id="soalke"></span> </span></h3>
                <div class="box-tools pull-right">
                    <span class="badge bg-red">Sisa Waktu <span class="sisawaktu" data-time="<?=$soal->tgl_selesai?>"></span></span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <?=$html?>
            </div>
            <div class="box-footer text-center">
                <a class="action back btn btn-info" rel="0" onclick="return back();"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
                <a class="ragu_ragu btn btn-warning" rel="1" onclick="return tidak_jawab();">Ragu-ragu</a>
                <a class="action next btn btn-info" rel="2" onclick="return next();"><i class="glyphicon glyphicon-chevron-right"></i> Next</a>
                <a class="selesai action submit btn btn-danger" onclick="return simpan_akhir();"><i class="glyphicon glyphicon-stop"></i> Selesai</a>
                <input type="hidden" name="jml_soal" id="jml_soal" value="<?=$no; ?>">
            </div>
        </div>
        <?=form_close();?>
    </div>
</div>

<script type="text/javascript">
    var base_url        = "<?=base_url(); ?>";
    var id_tes          = "<?=$id_tes; ?>";
    var ujian_id          = "<?=$ujian_id; ?>";
    var widget          = $(".step");
    var total_widget    = widget.length;
</script>

<script src="<?=base_url()?>assets/dist/js/app/ujian/sheet.js"></script>