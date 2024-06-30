<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Narsumber_model extends CI_Model{

	function view(){
		return $this->db->query("SELECT * FROM narasumber  n LEFT JOIN kelas k ON n.id_kelas=k.id_kelas")->result();
	}
	function viewcekid($cek_id_k){
		return $this->db->query("SELECT * FROM narasumber  n LEFT JOIN kelas k ON n.id_kelas=k.id_kelas where n.id_kelas=$cek_id_k")->result();
	}
	function add($add){
		return $this->db->insert('narasumber', $add);
	}
	function del($id){
		return $this->db->delete('narasumber', $id);
	}
	function angkatanid($id){
        return $this->db->query("SELECT * FROM narasumber where id_narasumber=$id")->row_array();
    }
    function edit_n($edit, $id_n){
    	return $this->db->update('narasumber', $edit, $id_n);
    }
    function penilaian(){
		return $this->db->query("SELECT * FROM penilaian_narsum pn LEFT JOIN narasumber n ON pn.id_narasumber=n.id_narasumber")->result();
	}
	function penilaian_id($id){
		return $this->db->query("SELECT * FROM penilaian_narsum pn LEFT JOIN narasumber n ON pn.id_narasumber=n.id_narasumber LEFT JOIN mahasiswa m ON pn.id_mahasiswa=m.id_mahasiswa where pn.id_mahasiswa=$id")->result();
	}
	function input_nilai($nilai){
		return $this->db->insert('penilaian_narsum', $nilai);
	}
	function delnilai($id){
		return $this->db->delete('penilaian_narsum', $id);
	}
	function rangking(){
		return $this->db->query("SELECT * FROM narasumber n LEFT JOIN penilaian_narsum pn ON n.id_narasumber=pn.id_narasumber group by n.id_narasumber")->result();
	}
	function tampil($cek_id){
	    return $this->db->query("SELECT * FROM penilaian_narsum pn LEFT JOIN narasumber n ON pn.id_narasumber=n.id_narasumber where id_mahasiswa=$cek_id")->result();
	}
	
	function tampilid($id){
	    return $this->db->query("SELECT * FROM penilaian_narsum pn LEFT JOIN narasumber n ON pn.id_narasumber=n.id_narasumber LEFT JOIN kelas k ON n.id_kelas=k.id_kelas  where id_penilaian=$id")->row_array();
	}
	
	function edit_nilai($nilai_edit, $id_ed){
	    return $this->db->update('penilaian_narsum', $nilai_edit, $id_ed);
	}
	
}