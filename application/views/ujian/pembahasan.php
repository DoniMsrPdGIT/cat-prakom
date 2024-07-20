<div class="row">
	<div class="col-sm-3">
        <div class="alert bg-green">
            <h4>Kelas<i class="pull-right fa fa-building-o"></i></h4>
            <span class="d-block"> <?=$mhs->nama_kelas?> </span>                
        </div>
    </div>
    <div class="col-sm-3">
        <div class="alert bg-blue">
            <h4>Jurusan<i class="pull-right fa fa-graduation-cap"></i></h4>
            <span class="d-block"> <?=$mhs->nama_jurusan?></span>                
        </div>
    </div>
    <div class="col-sm-3">
        <div class="alert bg-yellow">
            <h4>Tanggal<i class="pull-right fa fa-calendar"></i></h4>
            <span class="d-block"> <?=strftime('%A, %d %B %Y')?></span>                
        </div>
    </div>
    <div class="col-sm-3">
        <div class="alert bg-red">
            <h4>Jam<i class="pull-right fa fa-clock-o"></i></h4>
            <span class="d-block"> <span class="live-clock"><?=date('H:i:s')?></span></span>                
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
				

						$x_soal = $this->db->query("SELECT CONCAT(list_soal) AS id_soal,REGEXP_REPLACE(REPLACE(REPLACE(CONCAT(list_jawaban), ':N', ''), ':Y', ''), '[0-9]+:', '') AS jawaban_pil , mahasiswa_id FROM h_ujian WHERE id='$id_ujian' ")->result();
foreach ($x_soal as $x) { 
$id_soal=$x->id_soal;
$id_mhs=$x->mahasiswa_id;

$jawab_pil=$x->jawaban_pil;
$soal_urut_ok = $this->db->query("SELECT * FROM tb_soal WHERE id_soal IN ($id_soal) ORDER BY FIELD(id_soal,$id_soal)")->result();


		$id  = '1609';
		

$myArray = explode(',', $jawab_pil);
$colors = array($myArray);

$arr_opsi = array("a","b","c","d","e");

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
		&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge bg-red">Tryout CAT | eBook PDF | Video Materi | Kunjungi www.CAT-Prakom.com</span>
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
				for ($j = 0; $j < $this->config->item('jml_opsi'); $j++) {
					$opsi 			= "opsi_".$arr_opsi[$j];
					$file 			= "file_".$arr_opsi[$j];
					$checked 		= $arr_jawab == strtoupper($arr_opsi[$j]) ? "checked" : "";
                    $checked_user   = $value[$no-1] == strtoupper($arr_opsi[$j])? "checked" : "";
					$pilihan_opsi 	= !empty($s->$opsi) ? $s->$opsi : "";
				//	$tampil_media_opsi = (is_file(base_url().$path.$s->$file) || $s->$file != "") ? tampil_media($path.$s->$file) : "";
                if ($checked_user==$checked) {
                    echo '<div class="funkyradio-success" >
                    <input type="radio"  value="'.strtoupper($arr_opsi[$j]).'"  '.$checked.'  > 
                    <label for="opsi_'.strtolower($arr_opsi[$j]).'_'.$s->id_soal.'">
                        <div class="huruf_opsi">'.$arr_opsi[$j].'</div>
                        <p>'.$pilihan_opsi.'</p>
                        <div class="w-25"></div>
                    </label>';
                }else{
                    if ($checked_user) {
                        echo '<div class="funkyradio-danger" >
                    <input type="radio" value="'.strtoupper($arr_opsi[$j]).'"  '.$checked_user.'  > 
                    <label for="opsi_'.strtolower($arr_opsi[$j]).'_'.$s->id_soal.'">
                        <div class="huruf_opsi">'.$arr_opsi[$j].'</div>
                        <p>'.$pilihan_opsi.'</p>
                        <div class="w-25"></div>
                    </label>';
                    }else{
                        echo '<div class="funkyradio-success" >
                        <input type="radio"  value="'.strtoupper($arr_opsi[$j]).'"  '.$checked.'  > 
                        <label for="opsi_'.strtolower($arr_opsi[$j]).'_'.$s->id_soal.'">
                            <div class="huruf_opsi">'.$arr_opsi[$j].'</div>
                            <p>'.$pilihan_opsi.'</p>
                            <div class="w-25"></div>
                        </label>';
                    }
                }
            echo '</div>';
						
				}
				for ($j = 0; $j < $this->config->item('jml_opsi'); $j++) {
					$pilihan_opsi 	= !empty($s->$opsi) ? $s->$opsi : "";
				$pilihan_anda 		= $arr_jawab == strtoupper($value[$no-1]) ? "&nbsp;<span class='label label-success'>Jawaban Anda Benar</span>" : "&nbsp;<span class='label label-danger'>Jawaban Anda Salah</span>";
					}
				
    echo '<div class="alert alert-default">
	<span class="label label-default">ID Member CAT-Prakom : '.$id_mhs.'</span>
  <span class="label label-primary"> Anda Memilih Pilihan '.$value[$no-1].'</span>'.$pilihan_anda.'
          <hr/><strong>Pembahasan :</strong> <br/>'.implode('</p><p>', preg_split('/\R+/', $s->pembahasan)).'
        </div></div></div>';
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

