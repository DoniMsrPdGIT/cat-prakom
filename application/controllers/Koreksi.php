<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Koreksi extends CI_Controller {

	public function __construct(){
		parent::__construct();
	
		$this->load->library(['datatables', 'form_validation']);// Load Library Ignited-Datatables
		$this->load->helper('my');// Load Library Ignited-Datatables
		$this->load->model('Master_model', 'master');
		$this->load->model('Soal_model', 'soal');
        $this->load->model('Ujian_model', 'ujian');
		$this->form_validation->set_error_delimiters('','');
	}

    public function akses_mahasiswa()
    {
        if ( !$this->ion_auth->in_group('mahasiswa') ){
			show_error('Halaman ini khusus untuk mahasiswa mengikuti ujian, <a href="'.base_url('dashboard').'">Kembali ke menu awal</a>', 403, 'Akses Terlarang');
		}
    }

	
    public function update() {
        $this->akses_mahasiswa();
        $text = $this->input->post('text');
        $id_soal = $this->input->post('id_soal');
        $id = $this->input->post('id_ujian');
        $this->db->where('id_soal', $id_soal);
        if($id>='401' && $id<='480'){
            $this->db->update('tb_soal_sosiokultural', array('koreksi' => $text));
            }elseif($id>='6461' && $id<='6540'){
                $this->db->update('tb_soal_manajerial', array('koreksi' => $text));
            }elseif($id>='6588' && $id<='6667'){
                $this->db->update('tb_soal_wawancara', array('koreksi' => $text));
            }elseif(($id>='6668' && $id<='6692') || ($id>='6819' && $id<='6828')){
                $this->db->update('tb_soal_twk', array('koreksi' => $text));
            }elseif(($id>='6698' && $id<='6722')||($id>='6834' && $id<='6843')){
                $this->db->update('tb_soal_tiu', array('koreksi' => $text));
            }elseif(($id>='6728' && $id<='6752')||($id>='6865' && $id<='6874')){
                $this->db->update('tb_soal_tkp', array('koreksi' => $text));
            }else{
                $this->db->update('tb_soal', array('koreksi' => $text));
            }
        echo 'Berhasil mengupdate data!';
      }

   
}