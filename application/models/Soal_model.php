<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soal_model extends CI_Model {
    
    public function getDataSoal($id, $dosen)
    {
        $this->datatables->select('a.id_soal, a.soal,a.pembahasan, FROM_UNIXTIME(a.created_on) as created_on, FROM_UNIXTIME(a.updated_on) as updated_on, b.nama_matkul, c.nama_dosen');
        if($id>='401' && $id<='480'){
        $this->datatables->from('tb_soal_sosiokultural a');
        }elseif($id>='6461' && $id<='6540'){
        $this->datatables->from('tb_soal_manajerial a');
        }elseif($id>='6588' && $id<='6667'){
        $this->datatables->from('tb_soal_wawancara a');
        }elseif(($id>='6668' && $id<='6692') || ($id>='6819' && $id<='6828')){
        $this->datatables->from('tb_soal_twk a');
        }elseif(($id>='6698' && $id<='6722')||($id>='6834' && $id<='6843')){
        $this->datatables->from('tb_soal_tiu a');
        }elseif(($id>='6728' && $id<='6752')||($id>='6865' && $id<='6874')){
        $this->datatables->from('tb_soal_tkp a');
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

    public function getDataSoalTiu($id, $dosen)
    {
        $this->datatables->select('a.id_soal, a.soal,a.pembahasan, FROM_UNIXTIME(a.created_on) as created_on, FROM_UNIXTIME(a.updated_on) as updated_on, b.nama_matkul, c.nama_dosen');
        $this->datatables->from('tb_soal_tiu a');
        $this->datatables->join('matkul b', 'b.id_matkul=a.matkul_id');
        $this->datatables->join('dosen c', 'c.id_dosen=a.dosen_id');
        if ($id!==null && $dosen===null) {
            $this->datatables->where('a.matkul_id', $id);            
        }else if($id!==null && $dosen!==null){
            $this->datatables->where('a.dosen_id', $dosen);
        }
        return $this->datatables->generate();
    }

    public function getDataSoalTwk($id, $dosen)
    {
        $this->datatables->select('a.id_soal, a.soal,a.pembahasan, FROM_UNIXTIME(a.created_on) as created_on, FROM_UNIXTIME(a.updated_on) as updated_on, b.nama_matkul, c.nama_dosen');
        $this->datatables->from('tb_soal_twk a');
        $this->datatables->join('matkul b', 'b.id_matkul=a.matkul_id');
        $this->datatables->join('dosen c', 'c.id_dosen=a.dosen_id');
        if ($id!==null && $dosen===null) {
            $this->datatables->where('a.matkul_id', $id);            
        }else if($id!==null && $dosen!==null){
            $this->datatables->where('a.dosen_id', $dosen);
        }
        return $this->datatables->generate();
    }

    public function getDataSoalTkp($id, $dosen)
    {
        $this->datatables->select('a.id_soal, a.soal,a.pembahasan, FROM_UNIXTIME(a.created_on) as created_on, FROM_UNIXTIME(a.updated_on) as updated_on, b.nama_matkul, c.nama_dosen');
        $this->datatables->from('tb_soal_tkp a');
        $this->datatables->join('matkul b', 'b.id_matkul=a.matkul_id');
        $this->datatables->join('dosen c', 'c.id_dosen=a.dosen_id');
        if ($id!==null && $dosen===null) {
            $this->datatables->where('a.matkul_id', $id);            
        }else if($id!==null && $dosen!==null){
            $this->datatables->where('a.dosen_id', $dosen);
        }
        return $this->datatables->generate();
    }

    public function getDataSoalSosiokultural($id, $dosen)
    {
        $this->datatables->select('a.id_soal, a.soal,a.pembahasan, FROM_UNIXTIME(a.created_on) as created_on, FROM_UNIXTIME(a.updated_on) as updated_on, b.nama_matkul, c.nama_dosen');
        $this->datatables->from('tb_soal_sosiokultural a');
        $this->datatables->join('matkul b', 'b.id_matkul=a.matkul_id');
        $this->datatables->join('dosen c', 'c.id_dosen=a.dosen_id');
        if ($id!==null && $dosen===null) {
            $this->datatables->where('a.matkul_id', $id);            
        }else if($id!==null && $dosen!==null){
            $this->datatables->where('a.dosen_id', $dosen);
        }
        return $this->datatables->generate();
    }
    public function getDataSoalManajerial($id, $dosen)
    {
        $this->datatables->select('a.id_soal, a.soal,a.pembahasan, FROM_UNIXTIME(a.created_on) as created_on, FROM_UNIXTIME(a.updated_on) as updated_on, b.nama_matkul, c.nama_dosen');
        $this->datatables->from('tb_soal_manajerial a');
        $this->datatables->join('matkul b', 'b.id_matkul=a.matkul_id');
        $this->datatables->join('dosen c', 'c.id_dosen=a.dosen_id');
        if ($id!==null && $dosen===null) {
            $this->datatables->where('a.matkul_id', $id);            
        }else if($id!==null && $dosen!==null){
            $this->datatables->where('a.dosen_id', $dosen);
        }
        return $this->datatables->generate();
    }
    public function getDataSoalWawancara($id, $dosen)
    {
        $this->datatables->select('a.id_soal, a.soal,a.pembahasan, FROM_UNIXTIME(a.created_on) as created_on, FROM_UNIXTIME(a.updated_on) as updated_on, b.nama_matkul, c.nama_dosen');
        $this->datatables->from('tb_soal_wawancara a');
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
        if($ujian_id>='401' && $ujian_id<='480'){
        return $this->db->get_where('tb_soal_sosiokultural', ['id_soal' => $id_soal])->row();
        }else if($ujian_id>='6461' && $ujian_id<='6540'){
        return $this->db->get_where('tb_soal_manajerial', ['id_soal' => $id_soal])->row();
        }else if($ujian_id>='6588' && $ujian_id<='6667'){
        return $this->db->get_where('tb_soal_wawancara', ['id_soal' => $id_soal])->row();
        }else if(($ujian_id>='6668' && $ujian_id<='6692')||($ujian_id>='6619' && $ujian_id<='6828')){
            return $this->db->get_where('tb_soal_twk', ['id_soal' => $id_soal])->row();
            }else if(($ujian_id>='6698' && $ujian_id<='6722')||($ujian_id>='6834' && $ujian_id<='6843')){
                return $this->db->get_where('tb_soal_tiu', ['id_soal' => $id_soal])->row();
                }else if(($ujian_id>='6728' && $ujian_id<='6752')||($ujian_id>='6865' && $ujian_id<='6874')){
                    return $this->db->get_where('tb_soal_tkp', ['id_soal' => $id_soal])->row();
                    }else{
        return $this->db->get_where('tb_soal', ['id_soal' => $id_soal])->row();
        }
    }

    public function getSoalByIdSoal($id)
    {
        return $this->db->get_where('tb_soal', ['id_soal' => $id])->row();
    }

    public function getSoalByIdSoalTiu($id)
    {
        return $this->db->get_where('tb_soal_tiu', ['id_soal' => $id])->row();
    }

    public function getSoalByIdSoalTwk($id)
    {
        return $this->db->get_where('tb_soal_twk', ['id_soal' => $id])->row();
    }

    public function getSoalByIdSoalTkp($id)
    {
        return $this->db->get_where('tb_soal_tkp', ['id_soal' => $id])->row();
    }
    public function getSoalByIdSoalSosiokultural($id)
    {
        return $this->db->get_where('tb_soal_sosiokultural', ['id_soal' => $id])->row();
    }
    public function getSoalByIdSoalManajerial($id)
    {
        return $this->db->get_where('tb_soal_manajerial', ['id_soal' => $id])->row();
    }
    public function getSoalByIdSoalWawancara($id)
    {
        return $this->db->get_where('tb_soal_wawancara', ['id_soal' => $id])->row();
    }
    public function getMatkulDosen($nip)
    {
        $this->db->select('matkul_id, nama_matkul, id_dosen, nama_dosen');
        $this->db->join('matkul_dasar', 'matkul_id=id_matkul');
        $this->db->from('dosen')->where('nip', $nip);
        return $this->db->get()->row();
    }
    public function getMatkulDosenDasar($nip,$jenis)
    {
        $this->db->select('matkul_id, nama_matkul, id_dosen, nama_dosen');
        $this->db->join('matkul_dasar', 'matkul_id=id_matkul');
        $this->db->from('dosen')->where('nip', $nip)->where('jenis', $jenis);
        return $this->db->get()->row();
    }

    public function getAllDosen()
    {
        $this->db->select('*');
        $this->db->from('dosen a');
        $this->db->join('matkul b', 'a.matkul_id=b.id_matkul');
        return $this->db->get()->result();
    }
    public function getAllDosenDasar($jenis)
    {
        $this->db->select('*');
        $this->db->from('dosen a');
        $this->db->join('matkul_dasar b', 'a.matkul_id=b.id_matkul');
        $this->db->where('jenis', $jenis);
        return $this->db->get()->result();
    }
}