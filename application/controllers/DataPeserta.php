<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataPeserta extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->ion_auth->logged_in()){
			redirect('auth');
		}
		// $this->load->model('Master_model', 'master');
		$this->load->model('DataPesertaModel');
    }

    function index(){
		$data = [
			'user' => $this->ion_auth->user()->row(),
			'judul'	=> 'Anggota',
			'subjudul' => 'Data Peserta Ujian Sertifikasi'
		];
		$data['view'] = $this->DataPesertaModel->view();

		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('master/mahasiswa/peserta');
		$this->load->view('_templates/dashboard/_footer.php');
	}

	function lihat(){
		$idunik = $this->uri->segment('3');

		$data = [
			'user' => $this->ion_auth->user()->row(),
			'judul'	=> 'Data Peserta Ujian Sertifikasi',
			'subjudul' => 'List ujian yang di ikuti'
		];
		$data['list'] = $this->DataPesertaModel->listujian($idunik);

		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('master/mahasiswa/listujian');
		$this->load->view('_templates/dashboard/_footer.php');
	}

	function reset($id){
		$kdunik = array('id' => $id );
		$this->DataPesertaModel->reset($kdunik);
		$this->session->set_flashdata('message',
			'<div class="alert alert-white bg-gd-sun alert-dismissible" role="alert" style="background-color:#FF0000">
		      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		      	<span aria-hidden="true">&times;</span>
		      </button><font color="white">Data Berhasil Di Hapus..!</font>
		    </div>');

		$idunik = $this->uri->segment('4');
		redirect("DataPeserta/lihat/$idunik");
	}
	
	function reset_toman($id){
		$hitung=strlen($id);
		if($hitung=='24'){
		$id_hujian=substr($id,11,5);	
		}elseif($hitung=='23'){
		$id_hujian=substr($id,11,4);	
		}elseif($hitung=='22'){
		$id_hujian=substr($id,11,3);	
		}elseif($hitung=='21'){
		$id_hujian=substr($id,11,2);	
		}elseif($hitung=='20'){
		$id_hujian=substr($id,11,1);	
		}

		$mahasiswa_id=substr($id,11,4);
		$kdunik = array('mahasiswa_id' => $mahasiswa_id );
		$kduniksoal = array('id' => $id_hujian );
		$this->DataPesertaModel->reset($kduniksoal);
		$this->session->set_flashdata('message',
			'<div class="alert alert-white bg-gd-sun alert-dismissible" role="alert" style="background-color:#FF0000">
		      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		      	<span aria-hidden="true">&times;</span>
		      </button><font color="white">Data Berhasil Di Hapus..!</font>
		    </div>');

		$idunik = $this->uri->segment('4');
		redirect("ujian/list");
	}

	function reset_sosio($id){
		$hitung=strlen($id);
		if($hitung=='24'){
		$id_hujian=substr($id,11,5);	
		}elseif($hitung=='23'){
		$id_hujian=substr($id,11,4);	
		}elseif($hitung=='22'){
		$id_hujian=substr($id,11,3);	
		}elseif($hitung=='21'){
		$id_hujian=substr($id,11,2);	
		}elseif($hitung=='20'){
		$id_hujian=substr($id,11,1);	
		}

		$mahasiswa_id=substr($id,11,4);
		$kdunik = array('mahasiswa_id' => $mahasiswa_id );
		$kduniksoal = array('id' => $id_hujian );
		$this->DataPesertaModel->reset($kduniksoal);
		$this->session->set_flashdata('message',
			'<div class="alert alert-white bg-gd-sun alert-dismissible" role="alert" style="background-color:#FF0000">
		      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		      	<span aria-hidden="true">&times;</span>
		      </button><font color="white">Data Berhasil Di Hapus..!</font>
		    </div>');

		$idunik = $this->uri->segment('4');
		redirect("ujian/list_sosio");
	}
	function reset_manaj($id){
		$hitung=strlen($id);
		if($hitung=='24'){
		$id_hujian=substr($id,11,5);	
		}elseif($hitung=='23'){
		$id_hujian=substr($id,11,4);	
		}elseif($hitung=='22'){
		$id_hujian=substr($id,11,3);	
		}elseif($hitung=='21'){
		$id_hujian=substr($id,11,2);	
		}elseif($hitung=='20'){
		$id_hujian=substr($id,11,1);	
		}

		$mahasiswa_id=substr($id,11,4);
		$kdunik = array('mahasiswa_id' => $mahasiswa_id );
		$kduniksoal = array('id' => $id_hujian );
		$this->DataPesertaModel->reset($kduniksoal);
		$this->session->set_flashdata('message',
			'<div class="alert alert-white bg-gd-sun alert-dismissible" role="alert" style="background-color:#FF0000">
		      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		      	<span aria-hidden="true">&times;</span>
		      </button><font color="white">Data Berhasil Di Hapus..!</font>
		    </div>');

		$idunik = $this->uri->segment('4');
		redirect("ujian/list_manaj");
	}
	function reset_wawan($id){
		$hitung=strlen($id);
		if($hitung=='24'){
		$id_hujian=substr($id,11,5);	
		}elseif($hitung=='23'){
		$id_hujian=substr($id,11,4);	
		}elseif($hitung=='22'){
		$id_hujian=substr($id,11,3);	
		}elseif($hitung=='21'){
		$id_hujian=substr($id,11,2);	
		}elseif($hitung=='20'){
		$id_hujian=substr($id,11,1);	
		}

		$mahasiswa_id=substr($id,11,4);
		$kdunik = array('mahasiswa_id' => $mahasiswa_id );
		$kduniksoal = array('id' => $id_hujian );
		$this->DataPesertaModel->reset($kduniksoal);
		$this->session->set_flashdata('message',
			'<div class="alert alert-white bg-gd-sun alert-dismissible" role="alert" style="background-color:#FF0000">
		      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		      	<span aria-hidden="true">&times;</span>
		      </button><font color="white">Data Berhasil Di Hapus..!</font>
		    </div>');

		$idunik = $this->uri->segment('4');
		redirect("ujian/list_wawan");
	}
	function reset_tiu($id){
		$hitung=strlen($id);
		if($hitung=='24'){
		$id_hujian=substr($id,11,5);	
		}elseif($hitung=='23'){
		$id_hujian=substr($id,11,4);	
		}elseif($hitung=='22'){
		$id_hujian=substr($id,11,3);	
		}elseif($hitung=='21'){
		$id_hujian=substr($id,11,2);	
		}elseif($hitung=='20'){
		$id_hujian=substr($id,11,1);	
		}

		$mahasiswa_id=substr($id,11,4);
		$kdunik = array('mahasiswa_id' => $mahasiswa_id );
		$kduniksoal = array('id' => $id_hujian );
		$this->DataPesertaModel->reset($kduniksoal);
		$this->session->set_flashdata('message',
			'<div class="alert alert-white bg-gd-sun alert-dismissible" role="alert" style="background-color:#FF0000">
		      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		      	<span aria-hidden="true">&times;</span>
		      </button><font color="white">Data Berhasil Di Hapus..!</font>
		    </div>');

		$idunik = $this->uri->segment('4');
		redirect("ujian/list_tiu");
	}
	function reset_twk($id){
		$hitung=strlen($id);
		if($hitung=='24'){
		$id_hujian=substr($id,11,5);	
		}elseif($hitung=='23'){
		$id_hujian=substr($id,11,4);	
		}elseif($hitung=='22'){
		$id_hujian=substr($id,11,3);	
		}elseif($hitung=='21'){
		$id_hujian=substr($id,11,2);	
		}elseif($hitung=='20'){
		$id_hujian=substr($id,11,1);	
		}

		$mahasiswa_id=substr($id,11,4);
		$kdunik = array('mahasiswa_id' => $mahasiswa_id );
		$kduniksoal = array('id' => $id_hujian );
		$this->DataPesertaModel->reset($kduniksoal);
		$this->session->set_flashdata('message',
			'<div class="alert alert-white bg-gd-sun alert-dismissible" role="alert" style="background-color:#FF0000">
		      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		      	<span aria-hidden="true">&times;</span>
		      </button><font color="white">Data Berhasil Di Hapus..!</font>
		    </div>');

		$idunik = $this->uri->segment('4');
		redirect("ujian/list_twk");
	}
	function reset_tkp($id){
		$hitung=strlen($id);
		if($hitung=='24'){
		$id_hujian=substr($id,11,5);	
		}elseif($hitung=='23'){
		$id_hujian=substr($id,11,4);	
		}elseif($hitung=='22'){
		$id_hujian=substr($id,11,3);	
		}elseif($hitung=='21'){
		$id_hujian=substr($id,11,2);	
		}elseif($hitung=='20'){
		$id_hujian=substr($id,11,1);	
		}

		$mahasiswa_id=substr($id,11,4);
		$kdunik = array('mahasiswa_id' => $mahasiswa_id );
		$kduniksoal = array('id' => $id_hujian );
		$this->DataPesertaModel->reset($kduniksoal);
		$this->session->set_flashdata('message',
			'<div class="alert alert-white bg-gd-sun alert-dismissible" role="alert" style="background-color:#FF0000">
		      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		      	<span aria-hidden="true">&times;</span>
		      </button><font color="white">Data Berhasil Di Hapus..!</font>
		    </div>');

		$idunik = $this->uri->segment('4');
		redirect("ujian/list_tkp");
	}
}
