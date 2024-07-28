<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biodata extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->ion_auth->logged_in()){
			redirect('auth');
		}
		// $this->load->model('Master_model', 'master');
		$this->load->model('Biodata_model');
    }

    public function index(){
    	$user = $this->ion_auth->user()->row();
		$data = [
			'user' => $this->ion_auth->user()->row(),
			'judul'	=> 'Anggota',
			'subjudul' => 'Biodata Anggota',
		];
		$cek_id = $user->username;
		if ($this->ion_auth->is_admin()) {
			$data['biodata'] = $this->Biodata_model->view();
		}else{
			$data['bioanggota'] = $this->Biodata_model->viewanggota($cek_id);
			$data['ranting'] = $this->Biodata_model->ranting();
		}
		
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('master/mahasiswa/biodata');
		$this->load->view('_templates/dashboard/_footer.php');
	}
		public function rekap(){
		$data = [
			'user' => $this->ion_auth->user()->row(),
			'judul'	=> 'Anggota',
			'subjudul' => 'Biodata Anggota',
		];

		$data['biodata'] = $this->Biodata_model->view();
		$data['kelas']   = $this->db->query('SELECT * FROM kelas')->result();
	
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('master/mahasiswa/biodata_a');
		$this->load->view('_templates/dashboard/_footer.php');
	}

	public function cetak_biodata(){
		$id = $this->uri->segment('3');
		$data['biodata'] = $this->Biodata_model->viewid($id);
		$this->load->view('master/mahasiswa/cetak_biodata', $data);
	}
	
	public function cetak_all(){
	    $id = $this->input->post('kelas');
	    $data['cetak'] = $this->Biodata_model->c_all($id);
		$this->load->view('master/mahasiswa/cetak_all', $data);
	}
	
	public function editsurvei(){
		$id        = $this->input->post('id');
		
		$melamar      = $this->input->post('melamar');
		$testimoni     = $this->input->post('testimoni');
		$nim     = $this->input->post('nik');
		$email     = $this->input->post('email');
		$kelas_id     = $this->input->post('kelas');
		$kelas = array('kelas_id'=> $kelas_id);
			$survei = array('last_name'=> $melamar,
							  'first_name'   => $testimoni,
							  'remember_selector'=>$kelas_id
							  );


		$id_e = array('username' => $id );
		$this->Biodata_model->edit_survei($survei, $id_e);

		$this->Biodata_model->edit_kelas($kelas, $nim,$email);
		redirect('Dashboard','refresh');
	}
	
	public function editbiodata(){
		$id        = $this->input->post('id');
		$nik       = $this->input->post('nik');
		$nm    	   = $this->input->post('nama');
		$tmpt 	   = $this->input->post('tempat');
		$tgl_lahir = $this->input->post('tgl');
		
		$alamat    = $this->input->post('alamat');
		
		$kerja     = $this->input->post('kerja');
	
		$nohp      = $this->input->post('nope');
		$email     = $this->input->post('email');
		$telegram     = $this->input->post('telegram');
		
		$foto      = $this->input->post('foto');
		$janda_lama= $this->input->post('foto_lama');
		$tgl 	 = date('dmYhis');

			$nama_file = 'PAS_FOTO';
			$acak= random_string('alnum', 10);
			$angka= random_string('numeric', 5);
			
			$config['file_name'] = $nama_file.'_'.$acak.'_'.$tgl;
			$config['upload_path'] ='assets/pasfoto/';
			$config['allowed_types'] = 'jpg|JPG|png|PNG|jpeg|JPEG';
			$config['max_size'] = '9999999999'; // kb
			
	     	// $this->upload->initialize($config);
			

			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('foto')){
					// echo "Gagal upload Bro..."; die();
					$file_foto = $janda_lama;
				}else{
					$file_foto = $this->upload->data('file_name');
			}

			$biodata = array('nik' 	    => $nik,
							  'nama_b'        => $nm,
							  'tempat_lahir'=> $tmpt,
							  'tgl_lahir'   => $tgl_lahir,
							  
							  'alamat' 	    => $alamat,
							 
							  'pekerjaan'   => $kerja,
							 
							  'no_hp'   	=> $nohp,
							  'email'	    => $email,
							  'usr_telegram'	    => $telegram,
							 
							  'pas_foto' 	=> $file_foto,);
		

		$id_e = array('id_biodata' => $id );
		$this->Biodata_model->edit($biodata, $id_e);
		redirect('Biodata','refresh');
	}
	
	public function add_biodata(){
// 		$no       = $this->input->post('no');
		$nik       = $this->input->post('nik');
		$nm    	   = $this->input->post('nama');
		$tmpt 	   = $this->input->post('tempat');
		$tgl_lahir = $this->input->post('tgl');
		$no_kta    = $this->input->post('no_kta');
		$no_str    = $this->input->post('no_str');
		$alamat    = $this->input->post('alamat');
		$agama 	   = $this->input->post('agama');
		$kerja     = $this->input->post('kerja');
		$berlaku   = $this->input->post('berlaku');
		$nohp      = $this->input->post('nope');
		$email     = $this->input->post('email');
		$tugas     = $this->input->post('tugas');
		$ranting      = $this->input->post('ranting');
		$tgl 	 = date('dmYhis');

		$nama_file = 'FOTO_LAMA';
		$acak= random_string('alnum', 10);
		$angka= random_string('numeric', 5);
		
		$config['file_name'] = $nama_file.'_'.$acak.'_'.$tgl;
		$config['upload_path'] ='assets/pasfoto/';
		$config['allowed_types'] = 'jpg|JPG|png|PNG|jpeg|JPEG';
		$config['max_size'] = '9999999999'; // kb

		// $this->upload->initialize($config);
		
		$this->load->library('upload', $config);
     
		if(!$this->upload->do_upload('foto')){
				echo "Gagal upload Bro..."; die();
			}else{
				$file = $this->upload->data('file_name');
		}
// Biodata Anggota
		$register = array('nik' 	    => $nik,
						  'nama_b'        => $nm,
						  'tempat_lahir'=> $tmpt,
						  'tgl_lahir'   => $tgl_lahir,
						  'no_kta'      => $no_kta,
						  'no_str'      => $no_str,
						  'no_str'      => $no_str,
						  'alamat' 	    => $alamat,
						  'agama'  		=> $agama,
						  'pekerjaan'   => $kerja,
						  'berlaku'     => $berlaku,
						  'no_hp'   	=> $nohp,
						  'email'	    => $email,
						  'tempat_tugas'=> $tugas,
						  'ranting' 	=> $ranting,
						  'pas_foto' 	=> $file,);

		$this->Biodata_model->tambah_anggota($register);
		$this->session->set_flashdata('message',
				'<div class="pad margin no-print">
			      <div class="callout callout-info" style="margin-bottom: 0!important;">
			        <h4><i class="fa fa-info"></i> Note:</h4>
			        <b>Registrasi berhasil... Silahkan tunggu informasi username dan password dari Admin..</b>
			      </div>
			    </div>');
		redirect('Biodata','refresh');
	}
}