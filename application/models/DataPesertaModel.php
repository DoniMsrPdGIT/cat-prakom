<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataPesertaModel extends CI_Model{

	function view(){
		$this->db->select('*');
		$this->db->from('mahasiswa m');
		$this->db->join('biodata_mahasiswa bm', 'm.nim=bm.nik', 'LEFT');
		$query = $this->db->get();
		return $query->result();
	}

	function listujian($idunik){
		$this->db->select('*');
		$this->db->from('h_ujian hj');
		$this->db->join('mahasiswa m', 'hj.mahasiswa_id=m.id_mahasiswa', 'LEFT');
		$this->db->join('m_ujian mj' , 'mj.id_ujian=hj.ujian_id');
		$this->db->where('m.id_mahasiswa', $idunik);

		$query = $this->db->get();
		return $query->result();
	}

	function reset($kdunik){
		return $this->db->delete('h_ujian', $kdunik);
	}
	
	function reset_toman($kdunik){
		 $this->db->where('ujian_id>=', '35');
		  $this->db->where('ujian_id<=', '6667');
		$this->db->delete('h_ujian', $kdunik);
	}
}