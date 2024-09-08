<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Modul extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->ion_auth->logged_in()){
			redirect('auth');
		}
		// $this->load->model('Master_model', 'master');
		$this->load->model('Modul');
		$this->load->model('Ujian_model', 'ujian');
    }

public function index(){
	//$this->akses_mahasiswa();
		$user = $this->ion_auth->user()->row();
		$kelas_id=$user->remember_selector;
		$data = [
			'user' => $this->ion_auth->user()->row(),
			'mhs' 		=> $this->ujian->getIdMahasiswa($user->username),
			'judul'	=> 'Modul',
			'subjudul' => 'List Modul'
		];
		$data['view_modul'] = $this->Modul->view($kelas_id);
 		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('modul/up_modul/data',$data);
		$this->load->view('_templates/dashboard/_footer.php');
	}
	
	public function video(){
	//$this->akses_mahasiswa();
		$user = $this->ion_auth->user()->row();
		$kelas_id=$user->remember_selector;
		$data = [
			'user' => $this->ion_auth->user()->row(),
			'mhs' 		=> $this->ujian->getIdMahasiswa($user->username),
			'judul'	=> 'Video Materi Belajar',
			'subjudul' => 'List Video'
		];
		$data['view_video'] = $this->Modul->video($kelas_id);
 		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('modul/video/data',$data);
		$this->load->view('_templates/dashboard/_footer.php');
	}
	
	public function addvideo(){
		$data = [
			'user' => $this->ion_auth->user()->row(),
				'judul'	=> 'Video Materi Belajar',
			'subjudul' => 'List Video'
		];
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('modul/video/add');
		$this->load->view('_templates/dashboard/_footer.php');
	}
	
	public function addmodul(){
		$data = [
			'user' => $this->ion_auth->user()->row(),
			'judul'	=> 'Modul',
			'subjudul' => 'Add Modul'
		];
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('modul/up_modul/add');
		$this->load->view('_templates/dashboard/_footer.php');
	}

public function aksi_video(){
	$judul= $this->input->post('judul');
		$tema = $this->input->post('tema');
		$url= $this->input->post('url');
		$ch_yt= $this->input->post('ch_yt');

	$acak= random_string('alnum', 20);
		
	$config['file_name'] = 'thumbnails_'.$acak;
	$config['upload_path'] ='uploads/youtube/';
	$config['allowed_types'] = 'JPG|jpg|PNG|png|JPEG|jpeg';
	$config['max_size'] = '9999999999'; // kb

	//$this->upload->initialize($config);
		
	$this->load->library('upload', $config);
     
	if(!$this->upload->do_upload('fvideo')){
	echo "Gagal upload Bro..."; die();
	}else{
	$file = $this->upload->data('file_name');
	}
		
		
		$add = array('tema' => $tema, 'judul_video' => $judul, 'url' => $url, 'channel_youtube' => $ch_yt, 'foto' => $file );
		$this->Modul->addvideo($add);
		redirect('C_Modul/video','refresh');
	}

	public function aksi_modul(){
		$nm = $this->input->post('judul');
		$edisi = $this->input->post('edisi');
		$link = $this->input->post('link');
		$status = $this->input->post('status');
		$tgl 	 = date('dmYhis');

		// $nama_file = 'CAT-Prakom_eBook';
		// $acak= random_string('alnum', 5);
		// $angka= random_string('numeric', 5);
		
		// $config['file_name'] = $nama_file.'_'.$acak.'_'.$nm;
		// $config['upload_path'] ='uploads/modul/';
		// $config['allowed_types'] = 'PDF|doc|ppt|xls|pdf';
		// $config['max_size'] = '9999999999'; // kb

		// // $this->upload->initialize($config);
		
		// $this->load->library('upload', $config);
     
		// if(!$this->upload->do_upload('modul')){
		// 		echo "Gagal upload Bro..."; die();
		// 	}else{
		// 		$file = $this->upload->data('file_name');
		// }

		$add = array('nama_modul' => $nm, 'edisi' => $edisi , 'link' => $link , 'status' => $status );
		$this->Modul->addmodul($add);
		redirect('C_Modul','refresh');
	}

	public function del_modul($id){
		$id = array('id_modul' => $id );
		$file = $this->uri->segment('4');
		$this->Modul->delete($id);
		// $path ='./uploads/modul/'.$file;
	    // unlink($path);
	    redirect('C_Modul','refresh');
	}
	public function berkas(){
		$data = [
			'user' => $this->ion_auth->user()->row(),
			'judul'	=> 'Berkas',
			'subjudul' => 'List Berkas Anggota'
		];
		$data['view_modul'] = $this->Modul->view();
		$data['berkas'] = $this->Modul->viewberkas();
 		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('modul/berkas/data');
		$this->load->view('_templates/dashboard/_footer.php');
	}
	public function addberkas(){
		$data = [
			'user' => $this->ion_auth->user()->row(),
			'judul'	=> 'Berkas',
			'subjudul' => 'Add Berka'
		];
		$data['anggota'] = $this->master->tampil_anggota();
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('modul/berkas/add');
		$this->load->view('_templates/dashboard/_footer.php');
	}
	public function aksi_berkas(){
		$anggota = $this->input->post('anggota');
		$judul = $this->input->post('judul');
		$tgl 	 = date('dmYhis');

		$nama_file = 'Modul';
		$acak= random_string('alnum', 10);
		$angka= random_string('numeric', 5);
		
		$config['file_name'] = $nama_file.'_'.$acak.'_'.$tgl;
		$config['upload_path'] ='uploads/berkas/';
		$config['allowed_types'] = 'PDF|pdf';
		$config['max_size'] = '9999999999'; // kb

		// $this->upload->initialize($config);
		
		$this->load->library('upload', $config);
     
		if(!$this->upload->do_upload('berkas')){
				echo "Gagal upload Bro..."; die();
			}else{
				$file = $this->upload->data('file_name');
		}

		$add = array('id_anggota' => $anggota, 'nama_berkas' => $judul ,
					 'file'=> $file);
		$this->Modul->addberkas($add);
		redirect('C_Modul/berkas','refresh');
	}
	public function del_berkas($id){
		$id = array('id_berkas' => $id );
		$file = $this->uri->segment('4');
		$this->Modul->delberkas($id);
		$path ='./uploads/berkas/'.$file;
	    unlink($path);
	    redirect('C_Modul/berkas','refresh');
	}
}