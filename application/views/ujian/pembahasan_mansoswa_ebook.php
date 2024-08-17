<div class="row">
    <div class="col-sm-12">
        <div class="alert bg-yellow">
            <h4>Formasi Jabatan<i class="pull-right fa fa-graduation-cap"></i></h4>
            <span class="d-block"> Tes Wawancara</span>                
        </div>
    </div>
    <div class="col-sm-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><?=$subjudul?></h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
          
			<?php
				$url = $this->uri->segment('3');
				$hitung=strlen($url);
				if($hitung=='24'){
				$id_ujian=substr($url,11,5);	
                }elseif($hitung=='23'){
				$id_ujian=substr($url,11,4);	
				}elseif($hitung=='22'){
				$id_ujian=substr($url,11,3);	
				}elseif($hitung=='21'){
				$id_ujian=substr($url,11,2);	
				}elseif($hitung=='20'){
				$id_ujian=substr($url,11,1);	
				}
				
              		// get ujian_id
$ujian_id = $this->ujian->getUjianIdById($id_ujian);

						$x_soal = $this->db->query("SELECT CONCAT(list_soal) AS id_soal,REGEXP_REPLACE(REPLACE(REPLACE(CONCAT(list_jawaban), ':N', ''), ':Y', ''), '[0-9]+:', '') AS jawaban_pil , mahasiswa_id FROM h_ujian WHERE id='$id_ujian' ")->result();
foreach ($x_soal as $x) { 
$id_soal=$x->id_soal;
$id_mhs=$x->mahasiswa_id;

$jawab_pil=$x->jawaban_pil;
    if($ujian_id>='401' && $ujian_id<='480'){
    $soal_urut_ok = $this->db->query("SELECT * FROM tb_soal_sosiokultural WHERE id_soal IN ($id_soal) ORDER BY FIELD(id_soal,$id_soal)")->result();
    }else if($ujian_id>='6461' && $ujian_id<='6540'){
    $soal_urut_ok = $this->db->query("SELECT * FROM tb_soal_manajerial WHERE id_soal IN ($id_soal) ORDER BY FIELD(id_soal,$id_soal)")->result();
    }else if($ujian_id>='6588' && $ujian_id<='6667'){
    $soal_urut_ok = $this->db->query("SELECT * FROM tb_soal_wawancara WHERE id_soal IN ($id_soal) ORDER BY FIELD(id_soal,$id_soal)")->result();
    }else if((($ujian_id>='6728' && $ujian_id<='6752')||($ujian_id>='6865' && $ujian_id<='6874')|| ($ujian_id>='6895' && $ujian_id<='6904'))){
        $soal_urut_ok = $this->db->query("SELECT * FROM tb_soal_tkp WHERE id_soal IN ($id_soal) ORDER BY FIELD(id_soal,$id_soal)")->result();
        }



		$id  = '1609';
		

$myArray = explode(',', $jawab_pil);
$colors = array($myArray);

if(($ujian_id>='401' && $ujian_id<='480'||((($ujian_id>='6728' && $ujian_id<='6752')||($ujian_id>='6865' && $ujian_id<='6874')|| ($ujian_id>='6895' && $ujian_id<='6904'))))){
    $arr_opsi = array("a","b","c","d","e");
    }else if($ujian_id>='6461' && $ujian_id<='6667'){
        $arr_opsi = array("a","b","c","d");
    }


		$html = '';
		$no = 1;
		if (!empty($soal_urut_ok)) {
			foreach ($soal_urut_ok as $s) {
				foreach ($colors as $value) {

$arr_jawab = $s->jawaban;
//var_dump($value[$no-1]);
echo '<div class="row">
  
    <div class="col-sm-12">
        
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><span class="badge bg-blue">Soal '.$no.'</span> </span></h3>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge bg-red">Ayoo bergabung menjadi Member CAT-Prakom</span>
                <div class="box-tools pull-right">
                    <span class="badge bg-green">Jawaban & Pembahasan</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">';
              echo '<input type="hidden" name="id_soal_'.$no.'" value="'.$s->id_soal.'">';
echo '<input type="hidden" name="rg_'.$no.'" id="rg_'.$no.'">';
echo '<div class="step" id="widget_'.$no.'">';

				echo '<div class="text-center"><div class="w-25"></div></div>'.$s->soal.'<div class="funkyradio">';
                if($ujian_id>='401' && $ujian_id<='480'){
                    for ($j = 0; $j < $this->config->item('jml_opsi'); $j++) {
                        $opsi 			= "opsi_".$arr_opsi[$j];
                        $file 			= "file_".$arr_opsi[$j];
                        $checked 		= $arr_jawab == strtoupper($arr_opsi[$j]) ? "checked" : "";
                        $checked_user   = $value[$no-1] == strtoupper($arr_opsi[$j])? "checked" : "";
                        $pilihan_opsi 	= !empty($s->$opsi) ? $s->$opsi : "";
                        $cek_bobot = $this->ujian->getSoalWithBobot(strtoupper($arr_opsi[$j]),$s->id_soal);
                        $bobot_nilai=substr($cek_bobot->bobot_selected, 0, 1);
                    //	$tampil_media_opsi = (is_file(base_url().$path.$s->$file) || $s->$file != "") ? tampil_media($path.$s->$file) : "";
                   
                    
                        echo '<div class="funkyradio-success" >
                        <input type="radio"  value="'.strtoupper($arr_opsi[$j]).'"  '.$checked.'  > 
                        <label for="opsi_'.strtolower($arr_opsi[$j]).'_'.$s->id_soal.'">
                            <div class="huruf_opsi">'.$arr_opsi[$j].'</div>
                            <p><span class="label label-primary">'.$bobot_nilai.'</span>&nbsp;'.$pilihan_opsi.'</p>
                            <div class="w-25"></div>
                        </label>';
                  
                echo '</div>';
                            
                    }
                    
                    for ($j = 0; $j < $this->config->item('jml_opsi'); $j++) {
                        $pilihan_opsi 	= !empty($s->$opsi) ? $s->$opsi : "";
                    $pilihan_anda 		= $arr_jawab == strtoupper($value[$no-1]) ? "&nbsp;<span class='label label-success'>Jawaban Terbaik</span>" : "&nbsp;<span class='label label-warning'>Jawaban Biasa</span>";
                        }

                    }else if($ujian_id>='6461' && $ujian_id<='6540'){
                        for ($j = 0; $j < $this->config->item('jml_opsi_manwa'); $j++) {
                            $opsi 			= "opsi_".$arr_opsi[$j];
                            $file 			= "file_".$arr_opsi[$j];
                            $checked 		= $arr_jawab == strtoupper($arr_opsi[$j]) ? "checked" : "";
                            $checked_user   = $value[$no-1] == strtoupper($arr_opsi[$j])? "checked" : "";
                            $pilihan_opsi 	= !empty($s->$opsi) ? $s->$opsi : "";
                            $cek_bobot = $this->ujian->getSoalWithBobotManaj(strtoupper($arr_opsi[$j]),$s->id_soal);
                            $bobot_nilai=substr($cek_bobot->bobot_selected, 0, 1);
                        //	$tampil_media_opsi = (is_file(base_url().$path.$s->$file) || $s->$file != "") ? tampil_media($path.$s->$file) : "";
                       
                       
                            echo '<div class="funkyradio-success" >
                            <input type="radio"  value="'.strtoupper($arr_opsi[$j]).'"  '.$checked.'  > 
                            <label for="opsi_'.strtolower($arr_opsi[$j]).'_'.$s->id_soal.'">
                                <div class="huruf_opsi">'.$arr_opsi[$j].'</div>
                                <p><span class="label label-primary">'.$bobot_nilai.'</span>&nbsp;'.$pilihan_opsi.'</p>
                                <div class="w-25"></div>
                            </label>';
                       
                    echo '</div>';
                                
                        }
        
                        for ($j = 0; $j < $this->config->item('jml_opsi_manwa'); $j++) {
                            $pilihan_opsi 	= !empty($s->$opsi) ? $s->$opsi : "";
                        $pilihan_anda 		= $arr_jawab == strtoupper($value[$no-1]) ? "&nbsp;<span class='label label-success'>Jawaban Terbaik</span>" : "&nbsp;<span class='label label-warning'>Jawaban Biasa</span>";
                            }
                    }else if($ujian_id>='6588' && $ujian_id<='6667'){
                        for ($j = 0; $j < $this->config->item('jml_opsi_manwa'); $j++) {
                            $opsi 			= "opsi_".$arr_opsi[$j];
                            $file 			= "file_".$arr_opsi[$j];
                            $checked 		= $arr_jawab == strtoupper($arr_opsi[$j]) ? "checked" : "";
                            $checked_user   = $value[$no-1] == strtoupper($arr_opsi[$j])? "checked" : "";
                            $pilihan_opsi 	= !empty($s->$opsi) ? $s->$opsi : "";
                            $cek_bobot = $this->ujian->getSoalWithBobotWawan(strtoupper($arr_opsi[$j]),$s->id_soal);
                            $bobot_nilai=substr($cek_bobot->bobot_selected, 0, 1);
                        //	$tampil_media_opsi = (is_file(base_url().$path.$s->$file) || $s->$file != "") ? tampil_media($path.$s->$file) : "";
                       
                     
                            echo '<div class="funkyradio-success" >
                            <input type="radio"  value="'.strtoupper($arr_opsi[$j]).'"  '.$checked.'  > 
                            <label for="opsi_'.strtolower($arr_opsi[$j]).'_'.$s->id_soal.'">
                                <div class="huruf_opsi">'.$arr_opsi[$j].'</div>
                                <p><span class="label label-primary">'.$bobot_nilai.'</span>&nbsp;'.$pilihan_opsi.'</p>
                                <div class="w-25"></div>
                            </label>';
                   
                    echo '</div>';
                                
                        }
        
                        for ($j = 0; $j < $this->config->item('jml_opsi_manwa'); $j++) {
                            $pilihan_opsi 	= !empty($s->$opsi) ? $s->$opsi : "";
                        $pilihan_anda 		= $arr_jawab == strtoupper($value[$no-1]) ? "&nbsp;<span class='label label-success'>Jawaban Terbaik</span>" : "&nbsp;<span class='label label-warning'>Jawaban Biasa</span>";
                            }
                    }elseif((($ujian_id>='6728' && $ujian_id<='6752')||($ujian_id>='6865' && $ujian_id<='6874')|| ($ujian_id>='6895' && $ujian_id<='6904'))){
                        for ($j = 0; $j < $this->config->item('jml_opsi'); $j++) {
                            $opsi 			= "opsi_".$arr_opsi[$j];
                            $file 			= "file_".$arr_opsi[$j];
                            $checked 		= $arr_jawab == strtoupper($arr_opsi[$j]) ? "checked" : "";
                            $checked_user   = $value[$no-1] == strtoupper($arr_opsi[$j])? "checked" : "";
                            $pilihan_opsi 	= !empty($s->$opsi) ? $s->$opsi : "";
                            $cek_bobot = $this->ujian->getSoalWithBobotTKP(strtoupper($arr_opsi[$j]),$s->id_soal);
                            $bobot_nilai=substr($cek_bobot->bobot_selected, 0, 1);
                        //	$tampil_media_opsi = (is_file(base_url().$path.$s->$file) || $s->$file != "") ? tampil_media($path.$s->$file) : "";
                       
                    
                            echo '<div class="funkyradio-success" >
                            <input type="radio"  value="'.strtoupper($arr_opsi[$j]).'"  '.$checked.'  > 
                            <label for="opsi_'.strtolower($arr_opsi[$j]).'_'.$s->id_soal.'">
                                <div class="huruf_opsi">'.$arr_opsi[$j].'</div>
                                <p><span class="label label-primary">'.$bobot_nilai.'</span>&nbsp;'.$pilihan_opsi.'</p>
                                <div class="w-25"></div>
                            </label>';
                       
                    echo '</div>';
                                
                        }
                        
                        for ($j = 0; $j < $this->config->item('jml_opsi'); $j++) {
                            $pilihan_opsi 	= !empty($s->$opsi) ? $s->$opsi : "";
                        $pilihan_anda 		= $arr_jawab == strtoupper($value[$no-1]) ? "&nbsp;<span class='label label-success'>Jawaban Terbaik</span>" : "&nbsp;<span class='label label-warning'>Jawaban Biasa</span>";
                            }
    
                        }
			
				
    echo '<div class="alert alert-default">
	<span class="label label-default" style="text-align: center;">Bimbel & Tryout CAT | eBook PDF Soal dan Pembahasan | eBook PDF Materi | Video Materi | Kunjungi www.CAT-Prakom.com</span>
          <hr/><strong>Pembahasan :</strong> <br/>'.implode('</p><p>', preg_split('/\R+/', $s->pembahasan)).'
         <br/>';
       echo '
   <div class="form-group col-sm-12">
                                <textarea style="display:none;" rows="10" class="form-control koreksi-text ckeditor"></textarea>
                            </div>
  <input type="hidden" class="id-soal" value="'.$s->id_soal.'">
   <input type="hidden" class="id-ujian" value="'.$ujian_id.'">
   
  <button class="btn btn-sm btn-success p-0 btn-simpan-koreksi" style="display:none;" id="simpanKoreksiBtn">&nbsp;Simpan dan Ajukan Koreksi ke Admin&nbsp;</button>
</div>';
            echo '</div>
         
        </div>
    
    </div>
</div>';
				

				$no++;
			}
			}
		}
//}
}

?>
  
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    ajaxcsrf();
  $('.btn-koreksi').on('click', function() {
    var koreksiText = $(this).parents('.alert').find('.koreksi-text');
    var simpanKoreksiBtn = $(this).parents('.alert').find('.btn-simpan-koreksi');
    koreksiText.show();
    simpanKoreksiBtn.show();
  });

  $('.btn-simpan-koreksi').on('click', function() {
    var koreksiText = $(this).parents('.alert').find('.koreksi-text');
    var idSoal = $(this).parents('.alert').find('.id-soal').val();
    var idUjian = $(this).parents('.alert').find('.id-ujian').val();
    var text = koreksiText.val();
  
    $.ajax({
        type: "POST",
        url: base_url + "koreksi/update",
        data: {text: text, id_soal: idSoal, id_ujian :idUjian},
        success: function (data) {
            console.log(data);
            $(koreksiText).hide(); // Wrap koreksiText in a jQuery object
            $(simpanKoreksiBtn).hide(); // Wrap simpanKoreksiBtn in a jQuery object
        }
    });
  });
});
</script>