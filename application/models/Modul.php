<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modul extends CI_Model {
	function view(){
		return $this->db->query("SELECT * FROM modul")->result();
	}
	function video(){
		return $this->db->query("SELECT * FROM video")->result();
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