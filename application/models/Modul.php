<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modul extends CI_Model {
	function view($kelas_id){
		$kelas_id = $this->db->escape($kelas_id);
		return $this->db->query("SELECT * FROM modul WHERE FIND_IN_SET($kelas_id, kelas_id) AND status='1' ORDER BY urut ASC")->result();
	}
	function video($kelas_id){
		$kelas_id = $this->db->escape($kelas_id);
		return $this->db->query("SELECT * FROM video WHERE FIND_IN_SET($kelas_id, kelas_id) AND status='1' ORDER BY urut ASC")->result();
	}
	function addvideo($add){
		return $this->db->insert('video', $add);
	}
	function addmodul($add){
		return $this->db->insert('modul', $add);
	}
	function delete($id){
		return $this->db->delete('modul', $id);
	}
	function deletevideo($id){
		return $this->db->delete('video', $id);
	}
	function viewberkas(){
		return $this->db->query("SELECT * FROM berkas_anggota ba LEFT JOIN mahasiswa mhs ON ba.id_anggota=mhs.id_mahasiswa")->result();
	}
	function addberkas($add){
		return $this->db->insert('berkas_anggota', $add);
	}
	function delberkas($id){
		return $this->db->delete('berkas_anggota', $id);
	}
}