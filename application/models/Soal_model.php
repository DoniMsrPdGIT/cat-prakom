<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soal_model extends CI_Model {
    
    public function getDataSoal($id, $dosen)
    {
        $this->datatables->select('a.id_soal, a.soal,a.pembahasan, FROM_UNIXTIME(a.created_on) as created_on, FROM_UNIXTIME(a.updated_on) as updated_on, b.nama_matkul, c.nama_dosen');
        if($id>='1' && $id<='10'){
        $this->datatables->from('tb_soal_sosiokultural a');
        }elseif($id>='11' && $id<='20'){
        $this->datatables->from('tb_soal_manajerial a');
        }elseif($id>='21' && $id<='30'){
        $this->datatables->from('tb_soal_wawancara a');
        }else{
            $this->datatables->from('tb_soal a');
        }
        $this->datatables->join('matkul b', 'b.id_matkul=a.matkul_id');
        $this->datatables->join('dosen c', 'c.id_dosen=a.dosen_id');
        if ($id!==null && $dosen===null) {
            $this->datatables->where('a.matkul_id', $id);            
        }else if($id!==null && $dosen!==null){
            $this->datatables->where('a.dosen_id', $dosen);
        }
        return $this->datatables->generate();
    }

    public function getSoalById($ujian_id,$id_soal)
    {
        if($ujian_id>='1' && $ujian_id<='10'){
        return $this->db->get_where('tb_soal_sosiokultural', ['id_soal' => $id_soal])->row();
        }else if($ujian_id>='11' && $ujian_id<='20'){
        return $this->db->get_where('tb_soal_manajerial', ['id_soal' => $id_soal])->row();
        }else if($ujian_id>='21' && $ujian_id<='30'){
        return $this->db->get_where('tb_soal_wawancara', ['id_soal' => $id_soal])->row();
        }else{
        return $this->db->get_where('tb_soal', ['id_soal' => $id_soal])->row();
        }
    }


    public function getMatkulDosen($nip)
    {
        $this->db->select('matkul_id, nama_matkul, id_dosen, nama_dosen');
        $this->db->join('matkul', 'matkul_id=id_matkul');
        $this->db->from('dosen')->where('nip', $nip);
        return $this->db->get()->row();
    }

    public function getAllDosen()
    {
        $this->db->select('*');
        $this->db->from('dosen a');
        $this->db->join('matkul b', 'a.matkul_id=b.id_matkul');
        return $this->db->get()->result();
    }
}