<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sertifikat extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->ion_auth->logged_in()){
			redirect('auth');
		}
		// $this->load->model('Master_model', 'master');
		$this->load->model('Sertifikat_model');
    }
    public function index(){
    $user = $this->ion_auth->user()->row();
	$data = [
		'user' => $this->ion_auth->user()->row(),
		'judul'	=> 'Sertifikat',
		'subjudul' => 'Data Sertifikat Peserta'
	];
	$cek_id = $user->username;
	if ($this->ion_auth->is_admin()) {
		$data['view'] = $this->Sertifikat_model->view();
	}else if ($this->ion_auth->in_group('mahasiswa') ){
		$data['view'] = $this->Sertifikat_model->viewp($cek_id);
	}else if ($this->ion_auth->in_group('dosen') ){
		$data['view'] = $this->Sertifikat_model->viewd($cek_id);
	}
	
	$this->load->view('_templates/dashboard/_header.php', $data);
	$this->load->view('sertifikat/data');
	$this->load->view('_templates/dashboard/_footer.php');
    }

    public function detail(){
    	$data = [
			'user' => $this->ion_auth->user()->row(),
			'judul'	=> 'Sertifikat',
			'subjudul' => 'Detail Sertifikat Peserta'
		];
		$id = $this->uri->segment('3');
		$data['edit'] = $this->Sertifikat_model->viewedit($id);
		$data['peserta'] = $this->Sertifikat_model->viewpeserta();
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('sertifikat/detail', $data);
		$this->load->view('_templates/dashboard/_footer.php');
    }

    public function viewadd(){
		$id = $this->uri->segment('3');
		if ($id=='peserta') {
			$data = [
				'user' => $this->ion_auth->user()->row(),
				'judul'	=> 'Sertifikat',
				'subjudul' => 'Tambah Sertifikat Peserta'
			];
			$data['peserta'] = $this->Sertifikat_model->viewpeserta();
			$this->load->view('_templates/dashboard/_header.php', $data);
			$this->load->view('sertifikat/add', $data);
			$this->load->view('_templates/dashboard/_footer.php');
		}else if ($id=='panitia'){
			$data = [
				'user' => $this->ion_auth->user()->row(),
				'judul'	=> 'Sertifikat',
				'subjudul' => 'Tambah Sertifikat Panitia'
			];
			$data['panitia'] = $this->Sertifikat_model->viewpanitia();
			$this->load->view('_templates/dashboard/_header.php', $data);
			$this->load->view('sertifikat/panitia', $data);
			$this->load->view('_templates/dashboard/_footer.php');
		}
		
    }
    public function add(){
    	$level = $this->input->post('level');
    	$mhs = $this->input->post('peserta');
		$serti = $this->input->post('sertifikat');
		$tgl 	 = date('dmYhis');

		$nama_file = 'Sertifikat';
		$acak= random_string('alnum', 10);
		$angka= random_string('numeric', 5);
		
		$config['file_name'] = $nama_file.'_'.$mhs.'_'.$tgl;
		$config['upload_path'] ='uploads/sertifikat/';
		$config['allowed_types'] = 'PDF|pdf';
		$config['max_size'] = '9999999999'; // kb

		// $this->upload->initialize($config);
		
		$this->load->library('upload', $config);
     
		if(!$this->upload->do_upload('sertifikat')){
				echo "Gagal upload Bro..."; die();
			}else{
				$file = $this->upload->data('file_name');
		}

		$add = array('level' => $level ,'nim' => $mhs, 'file_sertifikat' => $file );
		$this->Sertifikat_model->addserti($add);
		redirect('Sertifikat','refresh');
	}

	public function viewedit(){
    	$data = [
			'user' => $this->ion_auth->user()->row(),
			'judul'	=> 'Sertifikat',
			'subjudul' => 'Edit Sertifikat Peserta'
		];
		$id = $this->uri->segment('3');
		$data['edit'] = $this->Sertifikat_model->viewedit($id);
		$data['peserta'] = $this->Sertifikat_model->viewpeserta();
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('sertifikat/edit', $data);
		$this->load->view('_templates/dashboard/_footer.php');
    }

    public function edit(){
    	$id = $this->input->post('id');
    	$mhs = $this->input->post('nim');
		$serti = $this->input->post('sertifikat');
		$ser_lama = $this->input->post('sertifikat_lama');
		$tgl 	 = date('dmYhis');

		$nama_file = 'Sertifikat';
		$acak= random_string('alnum', 10);
		$angka= random_string('numeric', 5);
		
		$config['file_name'] = $nama_file.'_'.$mhs.'_'.$tgl;
		$config['upload_path'] ='uploads/sertifikat/';
		$config['allowed_types'] = 'PDF|pdf';
		$config['max_size'] = '9999999999'; // kb

		// $this->upload->initialize($config);
		
		$this->load->library('upload', $config);
     
		if(!$this->upload->do_upload('sertifikat')){
				echo "Gagal upload Bro..."; die();
			}else{
				$file = $this->upload->data('file_name');
		}

		$path ='uploads/sertifikat/'.$ser_lama;
		unlink($path); 

		$edit = array('file_sertifikat' => $file );
		$id_s = array('id_sertifikat' => $id );
		$this->Sertifikat_model->editserti($edit, $id_s);
		redirect('Sertifikat','refresh');
	}

	function delete($id){
		$id_s = array('id_sertifikat' => $id );
		$file = $this->uri->segment('4');
		$this->Sertifikat_model->delete($id_s);
		$path ='uploads/sertifikat/'.$file;
		unlink($path); 
		redirect('Sertifikat','refresh');
	}

}