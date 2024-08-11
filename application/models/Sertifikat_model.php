<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sertifikat_model extends CI_Model{

	function view(){
		return $this->db->query("SELECT * FROM sertifikat s LEFT JOIN mahasiswa m ON s.nim=m.nim LEFT JOIN dosen d ON s.nim=d.nip")->result();
	}
	function viewp($cek_id){
		return $this->db->query("SELECT * FROM sertifikat s LEFT JOIN mahasiswa m ON s.nim=m.nim where s.nim=$cek_id")->row_array();
	}
	function viewd($cek_id){
		return $this->db->query("SELECT * FROM sertifikat s LEFT JOIN dosen d ON s.nim=d.nip where s.nim=$cek_id")->result();
	}
	function viewpeserta(){
		return $this->db->query("SELECT * FROM mahasiswa where nim not in(select nim from sertifikat) order by no_peserta asc")->result();
	}
	function viewpanitia(){
		return $this->db->query("SELECT * FROM dosen")->result();
	}
	function addserti($add){
		return $this->db->insert('sertifikat', $add);
	}
	function viewedit($id){
		return $this->db->query("SELECT * FROM sertifikat s LEFT JOIN mahasiswa m ON s.nim=m.nim where id_sertifikat=$id")->row_array();
	}
	function editserti($edit, $id_s){
		return $this->db->update("sertifikat", $edit, $id_s);
	}
	function delete($id){
		return $this->db->delete("sertifikat", $id);
	}
}