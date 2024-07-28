<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ujian extends CI_Controller {

	public $mhs, $user;

	public function __construct(){
		parent::__construct();
		if (!$this->ion_auth->logged_in()){
			redirect('auth');
		}
		$this->load->library(['datatables', 'form_validation']);// Load Library Ignited-Datatables
		$this->load->helper('my');
		$this->load->model('Master_model', 'master');
		$this->load->model('Soal_model', 'soal');
		$this->load->model('Ujian_model', 'ujian');
		$this->form_validation->set_error_delimiters('','');

		$this->user = $this->ion_auth->user()->row();
		$this->mhs 	= $this->ujian->getIdMahasiswa($this->user->username);
    }

    public function akses_dosen()
    {
        if ( !$this->ion_auth->in_group('dosen') ){
			show_error('Halaman ini khusus untuk dosen untuk membuat Test Online, <a href="'.base_url('dashboard').'">Kembali ke menu awal</a>', 403, 'Akses Terlarang');
		}
    }

    public function akses_mahasiswa()
    {
        if ( !$this->ion_auth->in_group('mahasiswa') ){
			show_error('Halaman ini khusus untuk mahasiswa mengikuti ujian, <a href="'.base_url('dashboard').'">Kembali ke menu awal</a>', 403, 'Akses Terlarang');
		}
    }

    public function output_json($data, $encode = true)
	{
        if($encode) $data = json_encode($data);
        $this->output->set_content_type('application/json')->set_output($data);
	}
	
	public function json($id=null)
	{
        $this->akses_dosen();

		$this->output_json($this->ujian->getDataUjian($id), false);
	}

    public function master()
	{
        $this->akses_dosen();
        $user = $this->ion_auth->user()->row();
        $data = [
			'user' => $user,
			'judul'	=> 'Ujian',
			'subjudul'=> 'Data Ujian',
			'dosen' => $this->ujian->getIdDosen($user->username),
		];
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('ujian/data');
		$this->load->view('_templates/dashboard/_footer.php');
	}

	public function add()
	{
		$this->akses_dosen();
		
		$user = $this->ion_auth->user()->row();

        $data = [
			'user' 		=> $user,
			'judul'		=> 'Ujian',
			'subjudul'	=> 'Tambah Ujian',
			'matkul'	=> $this->soal->getMatkulDosen($user->username),
			'dosen'		=> $this->ujian->getIdDosen($user->username),
		];

		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('ujian/add');
		$this->load->view('_templates/dashboard/_footer.php');
	}
	
	public function edit($id)
	{
		$this->akses_dosen();
		
		$user = $this->ion_auth->user()->row();

        $data = [
			'user' 		=> $user,
			'judul'		=> 'Ujian',
			'subjudul'	=> 'Edit Ujian',
			'matkul'	=> $this->soal->getMatkulDosen($user->username),
			'dosen'		=> $this->ujian->getIdDosen($user->username),
			'ujian'		=> $this->ujian->getUjianById($id),
		];

		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('ujian/edit');
		$this->load->view('_templates/dashboard/_footer.php');
	}

	public function convert_tgl($tgl)
	{
		$this->akses_dosen();
		return date('Y-m-d H:i:s', strtotime($tgl));
	}

	public function validasi()
	{
		$this->akses_dosen();
		
		$user 	= $this->ion_auth->user()->row();
		$dosen 	= $this->ujian->getIdDosen($user->username);
		$jml 	= $this->ujian->getJumlahSoal($dosen->id_dosen)->jml_soal;
		$jml_a 	= $jml + 1; // Jika tidak mengerti, silahkan baca user_guide codeigniter tentang form_validation pada bagian less_than

		$this->form_validation->set_rules('nama_ujian', 'Nama Ujian', 'required|alpha_numeric_spaces|max_length[50]');
		$this->form_validation->set_rules('jumlah_soal', 'Jumlah Soal', "required|integer|less_than[{$jml_a}]|greater_than[0]", ['less_than' => "Soal tidak cukup, anda hanya punya {$jml} soal"]);
		$this->form_validation->set_rules('tgl_mulai', 'Tanggal Mulai', 'required');
		$this->form_validation->set_rules('tgl_selesai', 'Tanggal Selesai', 'required');
		$this->form_validation->set_rules('waktu', 'Waktu', 'required|integer|max_length[4]|greater_than[0]');
		$this->form_validation->set_rules('jenis', 'Acak Soal', 'required|in_list[acak,urut]');
	}

	public function save()
	{
		$this->validasi();
		$this->load->helper('string');

		$method 		= $this->input->post('method', true);
		$dosen_id 		= $this->input->post('dosen_id', true);
		$matkul_id 		= $this->input->post('matkul_id', true);
		$nama_ujian 	= $this->input->post('nama_ujian', true);
		$jumlah_soal 	= $this->input->post('jumlah_soal', true);
		$tgl_mulai 		= $this->convert_tgl($this->input->post('tgl_mulai', 	true));
		$tgl_selesai	= $this->convert_tgl($this->input->post('tgl_selesai', true));
		$waktu			= $this->input->post('waktu', true);
		$jenis			= $this->input->post('jenis', true);
		$token 			= strtoupper(random_string('alpha', 5));

		if( $this->form_validation->run() === FALSE ){
			$data['status'] = false;
			$data['errors'] = [
				'nama_ujian' 	=> form_error('nama_ujian'),
				'jumlah_soal' 	=> form_error('jumlah_soal'),
				'tgl_mulai' 	=> form_error('tgl_mulai'),
				'tgl_selesai' 	=> form_error('tgl_selesai'),
				'waktu' 		=> form_error('waktu'),
				'jenis' 		=> form_error('jenis'),
			];
		}else{
			$input = [
				'nama_ujian' 	=> $nama_ujian,
				'jumlah_soal' 	=> $jumlah_soal,
				'tgl_mulai' 	=> $tgl_mulai,
				'terlambat' 	=> $tgl_selesai,
				'waktu' 		=> $waktu,
				'jenis' 		=> $jenis,
			];
			if($method === 'add'){
				$input['dosen_id']	= $dosen_id;
				$input['matkul_id'] = $matkul_id;
				$input['token']		= $token;
				$action = $this->master->create('m_ujian', $input);
			}else if($method === 'edit'){
				$id_ujian = $this->input->post('id_ujian', true);
				$action = $this->master->update('m_ujian', $input, 'id_ujian', $id_ujian);
			}
			$data['status'] = $action ? TRUE : FALSE;
		}
		$this->output_json($data);
	}

	public function delete()
	{
		$this->akses_dosen();
		$chk = $this->input->post('checked', true);
        if(!$chk){
            $this->output_json(['status'=>false]);
        }else{
            if($this->master->delete('m_ujian', $chk, 'id_ujian')){
                $this->output_json(['status'=>true, 'total'=>count($chk)]);
            }
        }
	}

	public function refresh_token($id)
	{
		$this->load->helper('string');
		$data['token'] = strtoupper(random_string('alpha', 5));
		$refresh = $this->master->update('m_ujian', $data, 'id_ujian', $id);
		$data['status'] = $refresh ? TRUE : FALSE;
		$this->output_json($data);
	}

	/**
	 * BAGIAN MAHASISWA
	 */

	public function list_json()
	{
		$this->akses_mahasiswa();
		
		$list = $this->ujian->getListUjian($this->mhs->id_mahasiswa, $this->mhs->kelas_id);
		$this->output_json($list, false);
	}
	
	public function list_live_json()
	{
		$this->akses_mahasiswa();
		
		$list = $this->ujian->getListUjianLive($this->mhs->id_mahasiswa, $this->mhs->kelas_id);
		$this->output_json($list, false);
	}

	public function list_sosio_json()
	{
		$this->akses_mahasiswa();
		
		$list = $this->ujian->getListUjianSosio($this->mhs->id_mahasiswa, $this->mhs->kelas_id);
		$this->output_json($list, false);
	}

	public function list_manaj_json()
	{
		$this->akses_mahasiswa();
		
		$list = $this->ujian->getListUjianManaj($this->mhs->id_mahasiswa, $this->mhs->kelas_id);
		$this->output_json($list, false);
	}
	
	public function list_wawan_json()
	{
		$this->akses_mahasiswa();
		
		$list = $this->ujian->getListUjianWawan($this->mhs->id_mahasiswa, $this->mhs->kelas_id);
		$this->output_json($list, false);
	}
	public function list_tiu_json()
	{
		$this->akses_mahasiswa();
		
		$list = $this->ujian->getListUjianTiu($this->mhs->id_mahasiswa, $this->mhs->kelas_id);
		$this->output_json($list, false);
	}
	public function list_twk_json()
	{
		$this->akses_mahasiswa();
		
		$list = $this->ujian->getListUjianTwk($this->mhs->id_mahasiswa, $this->mhs->kelas_id);
		$this->output_json($list, false);
	}
	public function list_tkp_json()
	{
		$this->akses_mahasiswa();
		
		$list = $this->ujian->getListUjianTkp($this->mhs->id_mahasiswa, $this->mhs->kelas_id);
		$this->output_json($list, false);
	}

	public function list()
	{
		$this->akses_mahasiswa();

		$user = $this->ion_auth->user()->row();
		
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Teknis',
			'subjudul'	=> 'List Kompetensi Teknis/Bidang',
			'mhs' 		=> $this->ujian->getIdMahasiswa($user->username),
		];
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('ujian/list');
		$this->load->view('_templates/dashboard/_footer.php');
	}
	
	public function list_live()
	{
		$this->akses_mahasiswa();

		$user = $this->ion_auth->user()->row();
		
		$data = [
			'user' 		=> $user,
			'judul'		=> 'TOLI',
			'subjudul'	=> 'List Live Competition',
			'mhs' 		=> $this->ujian->getIdMahasiswa($user->username),
		];
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('ujian/list_live');
		$this->load->view('_templates/dashboard/_footer.php');
	}

	public function list_sosio()
	{
		$this->akses_mahasiswa();

		$user = $this->ion_auth->user()->row();
		
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Sosiokultural',
			'subjudul'	=> 'List Sosiokultural',
			'mhs' 		=> $this->ujian->getIdMahasiswa($user->username),
		];
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('ujian/list_sosio');
		$this->load->view('_templates/dashboard/_footer.php');
	}

	public function list_manaj()
	{
		$this->akses_mahasiswa();

		$user = $this->ion_auth->user()->row();
		
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Manajerial',
			'subjudul'	=> 'List Manajerial',
			'mhs' 		=> $this->ujian->getIdMahasiswa($user->username),
		];
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('ujian/list_manaj');
		$this->load->view('_templates/dashboard/_footer.php');
	}

	public function list_wawan()
	{
		$this->akses_mahasiswa();

		$user = $this->ion_auth->user()->row();
		
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Wawancara',
			'subjudul'	=> 'List Wawancara',
			'mhs' 		=> $this->ujian->getIdMahasiswa($user->username),
		];
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('ujian/list_wawan');
		$this->load->view('_templates/dashboard/_footer.php');
	}
	public function list_tiu()
	{
		$this->akses_mahasiswa();

		$user = $this->ion_auth->user()->row();
		
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Tes Intelegensi Umum',
			'subjudul'	=> 'List Tes Intelegensi Umum',
			'mhs' 		=> $this->ujian->getIdMahasiswa($user->username),
		];
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('ujian/list_tiu');
		$this->load->view('_templates/dashboard/_footer.php');
	}
	public function list_twk()
	{
		$this->akses_mahasiswa();

		$user = $this->ion_auth->user()->row();
		
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Tes Wawasan Kebangsaan',
			'subjudul'	=> 'List Tes Wawasan Kebangsaan',
			'mhs' 		=> $this->ujian->getIdMahasiswa($user->username),
		];
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('ujian/list_twk');
		$this->load->view('_templates/dashboard/_footer.php');
	}
	public function list_tkp()
	{
		$this->akses_mahasiswa();

		$user = $this->ion_auth->user()->row();
		
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Tes Karakteristik Pribadi',
			'subjudul'	=> 'List Tes Karakteristik Pribadi',
			'mhs' 		=> $this->ujian->getIdMahasiswa($user->username),
		];
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('ujian/list_tkp');
		$this->load->view('_templates/dashboard/_footer.php');
	}
	
		public function pembahasan()
	{
		$this->akses_mahasiswa();

		$user = $this->ion_auth->user()->row();
		$data['id_ujian'] = $this->uri->segment('3');
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

		$data = [
			'user' 		=> $user,
			'judul'		=> 'Jawaban & Pembahasan',
			'subjudul'	=> 'List Jawaban & Pembahasan',
			'mhs' 		=> $this->ujian->getIdMahasiswa($user->username),
		];
		$this->load->view('_templates/dashboard/_header.php', $data);
		if(($ujian_id>='401' && $ujian_id<='6667')||((($ujian_id>='6728' && $ujian_id<='6752')||($ujian_id>='6865' && $ujian_id<='6874')))){
		$this->load->view('ujian/pembahasan_mansoswa',$data);
		}else{
		$this->load->view('ujian/pembahasan',$data);	
		}
		$this->load->view('_templates/dashboard/_footer.php');
	}
	
	public function token($id)
	{
		$this->akses_mahasiswa();
		$user = $this->ion_auth->user()->row();
		
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Ujian',
			'subjudul'	=> 'Token Ujian',
			'mhs' 		=> $this->ujian->getIdMahasiswa($user->username),
			'ujian'		=> $this->ujian->getUjianById($id),
			'encrypted_id' => urlencode($this->encryption->encrypt($id))
		];
		$this->load->view('_templates/topnav/_header.php', $data);
		$this->load->view('ujian/token');
		$this->load->view('_templates/topnav/_footer.php');
	}

	public function cektoken()
	{
		$id = $this->input->post('id_ujian', true);
		$token = $this->input->post('token', true);
		$cek = $this->ujian->getUjianById($id);
		
		$data['status'] = $token === $cek->token ? TRUE : FALSE;
		$this->output_json($data);
	}

	public function encrypt()
	{
		$id = $this->input->post('id', true);
		$key = urlencode($this->encryption->encrypt($id));
		// $decrypted = $this->encryption->decrypt(rawurldecode($key));
		$this->output_json(['key'=>$key]);
	}

	public function index()
	{
		$this->akses_mahasiswa();
		$key = $this->input->get('key', true);
		$id  = $this->encryption->decrypt(rawurldecode($key));
		
		$ujian 		= $this->ujian->getUjianById($id);
		$Kodeujian 		= $id;
		$soal 		= $this->ujian->getSoal($id);
		
		$mhs		= $this->mhs;
		$h_ujian 	= $this->ujian->HslUjian($id, $mhs->id_mahasiswa);
	
		$cek_sudah_ikut = $h_ujian->num_rows();

		if ($cek_sudah_ikut < 1) {
			$soal_urut_ok 	= array();
			$i = 0;
			foreach ($soal as $s) {
				$soal_per = new stdClass();
				$soal_per->id_soal 		= $s->id_soal;
				$soal_per->soal 		= $s->soal;
				$soal_per->file 		= $s->file;
				$soal_per->tipe_file 	= $s->tipe_file;
				$soal_per->opsi_a 		= $s->opsi_a;
				$soal_per->opsi_b 		= $s->opsi_b;
				$soal_per->opsi_c 		= $s->opsi_c;
				$soal_per->opsi_d 		= $s->opsi_d;
				$soal_per->opsi_e 		= $s->opsi_e;
				$soal_per->jawaban 		= $s->jawaban;
				$soal_per->pembahasan 		= $s->pembahasan;
				$soal_urut_ok[$i] 		= $soal_per;
				$i++;
			}
			$soal_urut_ok 	= $soal_urut_ok;
			$list_id_soal	= "";
			$list_jw_soal 	= "";
			if (!empty($soal)) {
				foreach ($soal as $d) {
					$list_id_soal .= $d->id_soal.",";
					$list_jw_soal .= $d->id_soal."::N,";
				}
			}
			$list_id_soal 	= substr($list_id_soal, 0, -1);
			$list_jw_soal 	= substr($list_jw_soal, 0, -1);
			if($mhs->jenis_waktu=='2'){
			$jenis_waktu=$ujian->waktu+60;	
			}elseif($mhs->jenis_waktu=='3'){
			$jenis_waktu=$ujian->waktu+120;	
			}else{
			$jenis_waktu=$ujian->waktu;	
			}
			$waktu_selesai 	= date('Y-m-d H:i:s', strtotime("+{$jenis_waktu} minute"));
			$time_mulai		= date('Y-m-d H:i:s');

			$input = [
				'ujian_id' 		=> $id,
				'mahasiswa_id'	=> $mhs->id_mahasiswa,
				'list_soal'		=> $list_id_soal,
				'list_jawaban' 	=> $list_jw_soal,
				'jml_benar'		=> 0,
				'nilai'			=> 0,
				'nilai_bobot'	=> 0,
				'tgl_mulai'		=> $time_mulai,
				'tgl_selesai'	=> $waktu_selesai,
				'status'		=> 'Y'
			];
			$this->master->create('h_ujian', $input);

			// Setelah insert wajib refresh dulu
			redirect('ujian/?key='.urlencode($key), 'location', 301);
		}
		
		$q_soal = $h_ujian->row();
		
		$urut_soal 		= explode(",", $q_soal->list_jawaban);
		$soal_urut_ok	= array();
		for ($i = 0; $i < sizeof($urut_soal); $i++) {
			$pc_urut_soal	= explode(":",$urut_soal[$i]);
			$pc_urut_soal1 	= empty($pc_urut_soal[1]) ? "''" : "'{$pc_urut_soal[1]}'";
			$ambil_soal 	= $this->ujian->ambilSoal($pc_urut_soal1, $pc_urut_soal[0],$Kodeujian);
			$soal_urut_ok[] = $ambil_soal; 
		}

		$detail_tes = $q_soal;
		$soal_urut_ok = $soal_urut_ok;

		$pc_list_jawaban = explode(",", $detail_tes->list_jawaban);
		$arr_jawab = array();
		foreach ($pc_list_jawaban as $v) {
			$pc_v 	= explode(":", $v);
			$idx 	= $pc_v[0];
			$val 	= $pc_v[1];
			$rg 	= $pc_v[2];

			$arr_jawab[$idx] = array("j"=>$val,"r"=>$rg);
		}

		$arr_opsi = array("a","b","c","d","e");
		$html = '';
		$no = 1;
		if (!empty($soal_urut_ok)) {
			foreach ($soal_urut_ok as $s) {
				$path = 'uploads/bank_soal/';
				$vrg = $arr_jawab[$s->id_soal]["r"] == "" ? "N" : $arr_jawab[$s->id_soal]["r"];
				$html .= '<input type="hidden" name="id_soal_'.$no.'" value="'.$s->id_soal.'">';
				$html .= '<input type="hidden" name="rg_'.$no.'" id="rg_'.$no.'" value="'.$vrg.'">';
				$html .= '<div class="step" id="widget_'.$no.'">';

				$html .= '<div class="text-center"><div class="w-25">'.tampil_media($path.$s->file).'</div></div>'.$s->soal.'<div class="funkyradio">';
				for ($j = 0; $j < $this->config->item('jml_opsi'); $j++) {
					$opsi 			= "opsi_".$arr_opsi[$j];
					$file 			= "file_".$arr_opsi[$j];
					$checked 		= $arr_jawab[$s->id_soal]["j"] == strtoupper($arr_opsi[$j]) ? "checked" : "";
					$pilihan_opsi 	= !empty($s->$opsi) ? $s->$opsi : "";
					$tampil_media_opsi = (is_file(base_url().$path.$s->$file) || $s->$file != "") ? tampil_media($path.$s->$file) : "";
					$html .= '<div class="funkyradio-success" onclick="return simpan_sementara();">
						<input type="radio" id="opsi_'.strtolower($arr_opsi[$j]).'_'.$s->id_soal.'" name="opsi_'.$no.'" value="'.strtoupper($arr_opsi[$j]).'" '.$checked.'> <label for="opsi_'.strtolower($arr_opsi[$j]).'_'.$s->id_soal.'"><div class="huruf_opsi">'.$arr_opsi[$j].'</div> <p>'.$pilihan_opsi.'</p><div class="w-25">'.$tampil_media_opsi.'</div></label></div>';
				}
//         $html .= '<hr>
//	       <div class="alert alert-success">
  //         <strong>Jawaban :</strong><br/> '.$s->kunci_soal_opsi.'. '.$s->kunci_soal_ket.'
//        </div>
//         <hr><div class="alert alert-default">
//          <strong>Pembahasan :</strong> <br/>'.implode('</p><p>', preg_split('/\R+/', $s->pembahasan)).'
//         </div>';

				$html .= '</div></div>';
				$no++;
			}
		}

		// Enkripsi Id Tes
		$id_tes = $this->encryption->encrypt($detail_tes->id);

		$data = [
			'user' 		=> $this->user,
			'mhs'		=> $this->mhs,
			'judul'		=> 'Ujian',
			'subjudul'	=> 'Lembar Ujian',
			'soal'		=> $detail_tes,
			'no' 		=> $no,
			'html' 		=> $html,
			'id_tes'	=> $id_tes
		];
		$this->load->view('_templates/topnav/_header.php', $data);
		$this->load->view('ujian/sheet');
		$this->load->view('_templates/topnav/_footer.php');
	}

	public function simpan_satu()
	{
		// Decrypt Id
		$id_tes = $this->input->post('id', true);
		$id_tes = $this->encryption->decrypt($id_tes);
		
		$input 	= $this->input->post(null, true);
		$list_jawaban 	= "";
		for ($i = 1; $i < $input['jml_soal']; $i++) {
			$_tjawab 	= "opsi_".$i;
			$_tidsoal 	= "id_soal_".$i;
			$_ragu 		= "rg_".$i;
			$jawaban_ 	= empty($input[$_tjawab]) ? "" : $input[$_tjawab];
			$list_jawaban	.= "".$input[$_tidsoal].":".$jawaban_.":".$input[$_ragu].",";
		}
		$list_jawaban	= substr($list_jawaban, 0, -1);
		$d_simpan = [
			'list_jawaban' => $list_jawaban
		];
		
		// Simpan jawaban
		$this->master->update('h_ujian', $d_simpan, 'id', $id_tes);
		$this->output_json(['status'=>true]);
	}

	public function simpan_akhir()
	{
		// Decrypt Id
		$id_tes = $this->input->post('id', true);
		$id_tes = $this->encryption->decrypt($id_tes);
		
// get ujian_id
$ujian_id = $this->ujian->getUjianIdById($id_tes);

		// Get Jawaban
		$list_jawaban = $this->ujian->getJawaban($id_tes);

		// Pecah Jawaban
		$pc_jawaban = explode(",", $list_jawaban);
		
		$jumlah_benar 	= 0;
		$jumlah_salah 	= 0;
		$jumlah_ragu  	= 0;
		$nilai_bobot 	= 0;
		$total_bobot	= 0;
		$bobot_selected_total = 0;
		$jumlah_soal	= sizeof($pc_jawaban);

		foreach ($pc_jawaban as $jwb) {
			$pc_dt 		= explode(":", $jwb);
			$id_soal 	= $pc_dt[0];
			$jawaban 	= $pc_dt[1];
			$ragu 		= $pc_dt[2];

			$cek_jwb 	= $this->soal->getSoalById($ujian_id,$id_soal);
			
			if(($ujian_id>='401' && $ujian_id<='480')){
			$cek_bobot = $this->ujian->getSoalWithBobot($jawaban,$id_soal);
			$opsi_selected=	$jawaban;
			$bobot_selected=substr($cek_bobot->bobot_selected, 0, 1);
			$bobot_selected_total += $bobot_selected;
			$total_bobot = $bobot_selected_total;
			}elseif(($ujian_id>='6461' && $ujian_id<='6540')){
				$cek_bobot = $this->ujian->getSoalWithBobotManaj($jawaban,$id_soal);
				$opsi_selected=	$jawaban;
				$bobot_selected=substr($cek_bobot->bobot_selected, 0, 1);
				$bobot_selected_total += $bobot_selected;
				$total_bobot = $bobot_selected_total;
				}elseif(($ujian_id>='6588' && $ujian_id<='6667')){
					$cek_bobot = $this->ujian->getSoalWithBobotWawan($jawaban,$id_soal);
					$opsi_selected=	$jawaban;
					$bobot_selected=substr($cek_bobot->bobot_selected, 0, 1);
					$bobot_selected_total += $bobot_selected;
					$total_bobot = $bobot_selected_total;
					}elseif((($ujian_id>='6728' && $ujian_id<='6752')||($ujian_id>='6865' && $ujian_id<='6874'))){
				$cek_bobot = $this->ujian->getSoalWithBobotTKP($jawaban,$id_soal);
				$opsi_selected=	$jawaban;
				$bobot_selected=substr($cek_bobot->bobot_selected, 0, 1);
				$bobot_selected_total += $bobot_selected;
				$total_bobot = $bobot_selected_total;
				}else{
			$total_bobot = $total_bobot + $cek_jwb->bobot;
			}
			

			$jawaban == $cek_jwb->jawaban ? $jumlah_benar++ : $jumlah_salah++;
		}

		//$nilai = ($jumlah_benar / $jumlah_soal)  * 100;
		if(($ujian_id>='401' && $ujian_id<='6667')||((($ujian_id>='6728' && $ujian_id<='6752')||($ujian_id>='6865' && $ujian_id<='6874')))){
		//$nilai = $jumlah_benar * 5;
		$nilai = $bobot_selected_total;
		$nilai_bobot = ($total_bobot / $jumlah_soal)  * 100;
		}else{
		$nilai = $jumlah_benar * 5;
		$nilai_bobot = ($total_bobot / $jumlah_soal)  * 100;	
		}

		$d_update = [
			'jml_benar'		=> $jumlah_benar,
			'nilai'			=> number_format(floor($nilai), 0),
			'nilai_bobot'	=> number_format(floor($nilai_bobot), 0),
			'status'		=> 'N',
			//'ujian_id' 		=> $ujian_id,
			//'opsi_selected' => $opsi_selected,
			//'bobot_selected' => $bobot_selected,
		];

		$this->master->update('h_ujian', $d_update, 'id', $id_tes);
		$this->output_json(['status'=>TRUE, 'data'=>$d_update, 'id'=>$id_tes]);
	}
}