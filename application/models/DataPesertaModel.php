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
		  $this->db->where('ujian_id<=', '96');
		$this->db->delete('h_ujian', $kdunik);
	}
	function reset_sosio($kdunik){
		 $this->db->where('ujian_id>=', '401');
		  $this->db->where('ujian_id<=', '480');
		$this->db->delete('h_ujian', $kdunik);
	}
	function reset_manaj($kdunik){
		 $this->db->where('ujian_id>=', '6461');
		  $this->db->where('ujian_id<=', '6540');
		$this->db->delete('h_ujian', $kdunik);
	}
	function reset_wawan($kdunik){
		 $this->db->where('ujian_id>=', '6588');
		  $this->db->where('ujian_id<=', '6667');
		$this->db->delete('h_ujian', $kdunik);
	}
	function reset_twk($kdunik){
		// $this->db->where('ujian_id>=', '6668');
		//  $this->db->where('ujian_id<=', '6692');
		 $this->db->where('(ujian_id>= 6668 AND ujian_id<= 6692) OR (ujian_id>= 6819 AND ujian_id<= 6828)');
	   $this->db->delete('h_ujian', $kdunik);
   }
   function reset_tiu($kdunik){
	// $this->db->where('ujian_id>=', '6698');
	//  $this->db->where('ujian_id<=', '6722');
	 $this->db->where('(ujian_id>= 6698 AND ujian_id<= 6722) OR (ujian_id>= 6834 AND ujian_id<= 6843)');
   $this->db->delete('h_ujian', $kdunik);
}
function reset_tkp($kdunik){
	// $this->db->where('ujian_id>=', '6728');
	//  $this->db->where('ujian_id<=', '6752');
	$this->db->where('(ujian_id>= 6728 AND ujian_id<= 6752) OR (ujian_id>= 6865 AND ujian_id<= 6874)');
   $this->db->delete('h_ujian', $kdunik);
}
}
