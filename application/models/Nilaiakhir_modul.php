<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilaiakhir_modul extends CI_Model {
	public function view(){
		return $this->db->query("SELECT * FROM mahasiswa m LEFT JOIN biodata_mahasiswa bm 
			ON m.nim=bm.nik LEFT JOIN ranting r ON bm.ranting=r.id_ranting")->result();
	}
}