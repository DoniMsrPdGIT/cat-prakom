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
		$mahasiswa_id=substr($id,11,4);
		$kdunik = array('mahasiswa_id' => $mahasiswa_id );
		$this->DataPesertaModel->reset_toman($kdunik);
		$this->session->set_flashdata('message',
			'<div class="alert alert-white bg-gd-sun alert-dismissible" role="alert" style="background-color:#FF0000">
		      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		      	<span aria-hidden="true">&times;</span>
		      </button><font color="white">Data Berhasil Di Hapus..!</font>
		    </div>');

		$idunik = $this->uri->segment('4');
		redirect("ujian/list");
	}
}