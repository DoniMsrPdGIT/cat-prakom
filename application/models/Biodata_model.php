<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biodata_model extends CI_Model {

	function tambah_anggota($register){
		return $this->db->insert('biodata_mahasiswa', $register);
	}
	function view(){
		return $this->db->query('SELECT * FROM biodata_mahasiswa bm LEFT JOIN mahasiswa m ON bm.nik=m.nim order by m.no_peserta asc')->result();
	}
	function viewid($id){
		return $this->db->query("SELECT * FROM biodata_mahasiswa bm LEFT JOIN mahasiswa m ON bm.nik=m.nim where id_biodata=$id")->row_array();
	}
	function ranting(){
		return $this->db->query('SELECT * FROM ranting')->result();
	}

	function viewanggota($cek_id){
		return $this->db->query("SELECT *, bm.usr_telegram AS telegram FROM biodata_mahasiswa bm LEFT JOIN users u ON bm.nik=u.username LEFT JOIN ranting r ON r.ranting=bm.ranting LEFT JOIN mahasiswa m ON bm.nik=m.nim where bm.nik=$cek_id")->row_array();
	}
	function edit($biodata, $id_e){
		return $this->db->update('biodata_mahasiswa',$biodata, $id_e);
	}
	
	function edit_survei($survei, $id_e){
		return $this->db->update('users',$survei, $id_e);
	}

	function edit_kelas($kelas, $nim, $email) {
		$this->db->where('nim', $nim);
		$this->db->where('email', $email);
		return $this->db->update('mahasiswa', $kelas);
	}
	function c_all($id){
	    return $this->db->query("SELECT * FROM biodata_mahasiswa bm LEFT JOIN mahasiswa m ON bm.nik=m.nim where m.kelas_id=$id order by m.no_peserta asc")->result();
	}
}
