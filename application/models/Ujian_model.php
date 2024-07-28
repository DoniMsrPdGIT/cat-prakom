<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ujian_model extends CI_Model {
    
    public function getDataUjian($id)
    {
        $this->datatables->select('a.id_ujian, a.token, a.nama_ujian, b.nama_matkul, a.jumlah_soal, CONCAT(a.tgl_mulai, " <br/> (", a.waktu, " Menit)") as waktu, a.jenis');
        $this->datatables->from('m_ujian a');
        $this->datatables->join('matkul b', 'a.matkul_id = b.id_matkul');
        if($id!==null){
            $this->datatables->where('dosen_id', $id);
        }
	     $this->db->order_by('a.id_ujian','ASC');
        return $this->datatables->generate();
    }
    
    public function getListUjian($id, $kelas)
    {
        $tgl = date('Y-m-d');
        $this->datatables->select("a.id_ujian, e.nama_dosen, d.nama_kelas, a.nama_ujian, b.nama_matkul, a.jumlah_soal, CONCAT(a.tgl_mulai, ' <br/> (', a.waktu, ' Menit)') as waktu,  (SELECT COUNT(id) FROM h_ujian h WHERE h.mahasiswa_id = {$id} AND h.ujian_id = a.id_ujian) AS ada,(SELECT COUNT(id) FROM h_ujian h WHERE h.mahasiswa_id = {$id} AND ujian_id>='35' AND ujian_id<='96') AS tot_toman, h.nilai, h.jml_benar , h.id, {$id} AS mahasiswa_id");
        $this->datatables->from('m_ujian a');
        $this->datatables->join('matkul b', 'a.matkul_id = b.id_matkul');
        $this->datatables->join('kelas_dosen c', "a.dosen_id = c.dosen_id");
        $this->datatables->join('kelas d', 'c.kelas_id = d.id_kelas');
        $this->datatables->join('dosen e', 'e.id_dosen = c.dosen_id');
	   $this->datatables->join('h_ujian h', "a.id_ujian = h.ujian_id AND h.mahasiswa_id = {$id} ",'LEFT');
        $this->datatables->where('d.id_kelas', $kelas);
        //$this->datatables->where('DATE(a.tgl_mulai)', $tgl);
		//$this->datatables->where('h.mahasiswa_id', $id);
		$this->datatables->where('a.token!=', 'TOLIV');
        $this->datatables->where('a.token!=', 'SOSIO');
        $this->datatables->where('a.token!=', 'MANAJ');
        $this->datatables->where('a.token!=', 'WAWAN');
        $this->datatables->where('a.token!=', 'KDTIU');
        $this->datatables->where('a.token!=', 'KDTWK');
        $this->datatables->where('a.token!=', 'KDTKP');
		$this->datatables->group_by('a.id_ujian');
		$this->db->order_by('a.id_ujian','ASC');
        return $this->datatables->generate();
    }
	
	 public function getListUjianLive($id, $kelas)
    {
        $tgl = date('Y-m-d');
        $this->datatables->select("a.id_ujian, e.nama_dosen, d.nama_kelas, a.nama_ujian, b.nama_matkul, a.jumlah_soal, CONCAT(a.tgl_mulai, ' <br/> (', a.waktu, ' Menit)') as waktu,  (SELECT COUNT(id) FROM h_ujian h WHERE h.mahasiswa_id = {$id} AND h.ujian_id = a.id_ujian) AS ada, h.nilai, h.jml_benar , h.id");
        $this->datatables->from('m_ujian a');
        $this->datatables->join('matkul b', 'a.matkul_id = b.id_matkul');
        $this->datatables->join('kelas_dosen c', "a.dosen_id = c.dosen_id");
        $this->datatables->join('kelas d', 'c.kelas_id = d.id_kelas');
        $this->datatables->join('dosen e', 'e.id_dosen = c.dosen_id');
	   $this->datatables->join('h_ujian h', "a.id_ujian = h.ujian_id AND h.mahasiswa_id = {$id} ",'LEFT');
        $this->datatables->where('d.id_kelas', $kelas);
        //$this->datatables->where('DATE(a.tgl_mulai)', $tgl);
		$this->datatables->where('a.token', 'TOLIV');
		$this->datatables->group_by('a.id_ujian');
		$this->db->order_by('a.id_ujian','DESC');
        return $this->datatables->generate();
    }

    public function getListUjianSosio($id, $kelas)
    {
        $tgl = date('Y-m-d');
        $this->datatables->select("a.id_ujian, e.nama_dosen, d.nama_kelas, a.nama_ujian, b.nama_matkul, a.jumlah_soal, CONCAT(a.tgl_mulai, ' <br/> (', a.waktu, ' Menit)') as waktu,  (SELECT COUNT(id) FROM h_ujian h WHERE h.mahasiswa_id = {$id} AND h.ujian_id = a.id_ujian) AS ada,(SELECT COUNT(id) FROM h_ujian h WHERE h.mahasiswa_id = {$id} AND ujian_id>='401' AND ujian_id<='480') AS tot_toman, h.nilai, h.jml_benar , h.id, {$id} AS mahasiswa_id");
        $this->datatables->from('m_ujian a');
        $this->datatables->join('matkul b', 'a.matkul_id = b.id_matkul');
        $this->datatables->join('kelas_dosen c', "a.dosen_id = c.dosen_id");
        $this->datatables->join('kelas d', 'c.kelas_id = d.id_kelas');
        $this->datatables->join('dosen e', 'e.id_dosen = c.dosen_id');
	   $this->datatables->join('h_ujian h', "a.id_ujian = h.ujian_id AND h.mahasiswa_id = {$id} ",'LEFT');
        $this->datatables->where('d.id_kelas', $kelas);
        //$this->datatables->where('DATE(a.tgl_mulai)', $tgl);
		$this->datatables->where('a.token', 'SOSIO');
		$this->datatables->group_by('a.id_ujian');
		$this->db->order_by('a.id_ujian','DESC');
        return $this->datatables->generate();
    }

    public function getListUjianManaj($id, $kelas)
    {
        $tgl = date('Y-m-d');
        $this->datatables->select("a.id_ujian, e.nama_dosen, d.nama_kelas, a.nama_ujian, b.nama_matkul, a.jumlah_soal, CONCAT(a.tgl_mulai, ' <br/> (', a.waktu, ' Menit)') as waktu,  (SELECT COUNT(id) FROM h_ujian h WHERE h.mahasiswa_id = {$id} AND h.ujian_id = a.id_ujian) AS ada,(SELECT COUNT(id) FROM h_ujian h WHERE h.mahasiswa_id = {$id} AND ujian_id>='6461' AND ujian_id<='6540') AS tot_toman, h.nilai, h.jml_benar , h.id, {$id} AS mahasiswa_id");
        $this->datatables->from('m_ujian a');
        $this->datatables->join('matkul b', 'a.matkul_id = b.id_matkul');
        $this->datatables->join('kelas_dosen c', "a.dosen_id = c.dosen_id");
        $this->datatables->join('kelas d', 'c.kelas_id = d.id_kelas');
        $this->datatables->join('dosen e', 'e.id_dosen = c.dosen_id');
	   $this->datatables->join('h_ujian h', "a.id_ujian = h.ujian_id AND h.mahasiswa_id = {$id} ",'LEFT');
        $this->datatables->where('d.id_kelas', $kelas);
        //$this->datatables->where('DATE(a.tgl_mulai)', $tgl);
		$this->datatables->where('a.token', 'MANAJ');
		$this->datatables->group_by('a.id_ujian');
		$this->db->order_by('a.id_ujian','DESC');
        return $this->datatables->generate();
    }

    public function getListUjianWawan($id, $kelas)
    {
        $tgl = date('Y-m-d');
        $this->datatables->select("a.id_ujian, e.nama_dosen, d.nama_kelas, a.nama_ujian, b.nama_matkul, a.jumlah_soal, CONCAT(a.tgl_mulai, ' <br/> (', a.waktu, ' Menit)') as waktu,  (SELECT COUNT(id) FROM h_ujian h WHERE h.mahasiswa_id = {$id} AND h.ujian_id = a.id_ujian) AS ada,(SELECT COUNT(id) FROM h_ujian h WHERE h.mahasiswa_id = {$id} AND ujian_id>='6588' AND ujian_id<='6667') AS tot_toman, h.nilai, h.jml_benar , h.id, {$id} AS mahasiswa_id");
        $this->datatables->from('m_ujian a');
        $this->datatables->join('matkul b', 'a.matkul_id = b.id_matkul');
        $this->datatables->join('kelas_dosen c', "a.dosen_id = c.dosen_id");
        $this->datatables->join('kelas d', 'c.kelas_id = d.id_kelas');
        $this->datatables->join('dosen e', 'e.id_dosen = c.dosen_id');
	   $this->datatables->join('h_ujian h', "a.id_ujian = h.ujian_id AND h.mahasiswa_id = {$id} ",'LEFT');
        $this->datatables->where('d.id_kelas', $kelas);
        //$this->datatables->where('DATE(a.tgl_mulai)', $tgl);
		$this->datatables->where('a.token', 'WAWAN');
		$this->datatables->group_by('a.id_ujian');
		$this->db->order_by('a.id_ujian','DESC');
        return $this->datatables->generate();
    }

    public function getListUjianTiu($id, $kelas)
    {
        $tgl = date('Y-m-d');
        $this->datatables->select("a.id_ujian, e.nama_dosen, d.nama_kelas, a.nama_ujian, b.nama_matkul, a.jumlah_soal, CONCAT(a.tgl_mulai, ' <br/> (', a.waktu, ' Menit)') as waktu,  (SELECT COUNT(id) FROM h_ujian h WHERE h.mahasiswa_id = {$id} AND h.ujian_id = a.id_ujian) AS ada,(SELECT COUNT(id) FROM h_ujian h WHERE h.mahasiswa_id = {$id} AND ((ujian_id>='6698' AND ujian_id<='6722')||(ujian_id>='6834' AND ujian_id<='6843'))) AS tot_toman, h.nilai, h.jml_benar , h.id, {$id} AS mahasiswa_id");
        $this->datatables->from('m_ujian a');
        $this->datatables->join('matkul b', 'a.matkul_id = b.id_matkul');
        $this->datatables->join('kelas_dosen c', "a.dosen_id = c.dosen_id");
        $this->datatables->join('kelas d', 'c.kelas_id = d.id_kelas');
        $this->datatables->join('dosen e', 'e.id_dosen = c.dosen_id');
	   $this->datatables->join('h_ujian h', "a.id_ujian = h.ujian_id AND h.mahasiswa_id = {$id} ",'LEFT');
        $this->datatables->where('d.id_kelas', $kelas);
        //$this->datatables->where('DATE(a.tgl_mulai)', $tgl);
		$this->datatables->where('a.token', 'KDTIU');
		$this->datatables->group_by('a.id_ujian');
		$this->db->order_by('a.id_ujian','DESC');
        return $this->datatables->generate();
    }

    public function getListUjianTwk($id, $kelas)
    {
        $tgl = date('Y-m-d');
        $this->datatables->select("a.id_ujian, e.nama_dosen, d.nama_kelas, a.nama_ujian, b.nama_matkul, a.jumlah_soal, CONCAT(a.tgl_mulai, ' <br/> (', a.waktu, ' Menit)') as waktu,  (SELECT COUNT(id) FROM h_ujian h WHERE h.mahasiswa_id = {$id} AND h.ujian_id = a.id_ujian) AS ada,(SELECT COUNT(id) FROM h_ujian h WHERE h.mahasiswa_id = {$id} AND ((ujian_id>='6668' AND ujian_id<='6692')||(ujian_id>='6819' AND ujian_id<='6828'))) AS tot_toman, h.nilai, h.jml_benar , h.id, {$id} AS mahasiswa_id");
        $this->datatables->from('m_ujian a');
        $this->datatables->join('matkul b', 'a.matkul_id = b.id_matkul');
        $this->datatables->join('kelas_dosen c', "a.dosen_id = c.dosen_id");
        $this->datatables->join('kelas d', 'c.kelas_id = d.id_kelas');
        $this->datatables->join('dosen e', 'e.id_dosen = c.dosen_id');
	   $this->datatables->join('h_ujian h', "a.id_ujian = h.ujian_id AND h.mahasiswa_id = {$id} ",'LEFT');
        $this->datatables->where('d.id_kelas', $kelas);
        //$this->datatables->where('DATE(a.tgl_mulai)', $tgl);
		$this->datatables->where('a.token', 'KDTWK');
		$this->datatables->group_by('a.id_ujian');
		$this->db->order_by('a.id_ujian','DESC');
        return $this->datatables->generate();
    }

    public function getListUjianTkp($id, $kelas)
    {
        $tgl = date('Y-m-d');
        $this->datatables->select("a.id_ujian, e.nama_dosen, d.nama_kelas, a.nama_ujian, b.nama_matkul, a.jumlah_soal, CONCAT(a.tgl_mulai, ' <br/> (', a.waktu, ' Menit)') as waktu,  (SELECT COUNT(id) FROM h_ujian h WHERE h.mahasiswa_id = {$id} AND h.ujian_id = a.id_ujian) AS ada,(SELECT COUNT(id) FROM h_ujian h WHERE h.mahasiswa_id = {$id} AND ((ujian_id>='6728' AND ujian_id<='6752')||(ujian_id>='6865' AND ujian_id<='6874'))) AS tot_toman, h.nilai, h.jml_benar , h.id, {$id} AS mahasiswa_id");
        $this->datatables->from('m_ujian a');
        $this->datatables->join('matkul b', 'a.matkul_id = b.id_matkul');
        $this->datatables->join('kelas_dosen c', "a.dosen_id = c.dosen_id");
        $this->datatables->join('kelas d', 'c.kelas_id = d.id_kelas');
        $this->datatables->join('dosen e', 'e.id_dosen = c.dosen_id');
	   $this->datatables->join('h_ujian h', "a.id_ujian = h.ujian_id AND h.mahasiswa_id = {$id} ",'LEFT');
        $this->datatables->where('d.id_kelas', $kelas);
        //$this->datatables->where('DATE(a.tgl_mulai)', $tgl);
		$this->datatables->where('a.token', 'KDTKP');
		$this->datatables->group_by('a.id_ujian');
		$this->db->order_by('a.id_ujian','DESC');
        return $this->datatables->generate();
    }

    public function getUjianById($id)
    {
        $this->db->select('*');
        $this->db->from('m_ujian a');
        $this->db->join('dosen b', 'a.dosen_id=b.id_dosen');
        $this->db->join('matkul c', 'a.matkul_id=c.id_matkul');
        $this->db->where('id_ujian', $id);
        return $this->db->get()->row();
    }

    public function getIdDosen($nip)
    {
        $this->db->select('id_dosen, nama_dosen')->from('dosen')->where('nip', $nip);
        return $this->db->get()->row();
    }

    public function getJumlahSoal($dosen)
    {
        $this->db->select('COUNT(id_soal) as jml_soal');
        $this->db->from('tb_soal');
        $this->db->where('dosen_id', $dosen);
        return $this->db->get()->row();
    }

    public function getIdMahasiswa($nim)
    {
        $this->db->select('*');
        $this->db->from('mahasiswa a');
        $this->db->join('kelas b', 'a.kelas_id=b.id_kelas');
        $this->db->join('jurusan c', 'b.jurusan_id=c.id_jurusan');
        $this->db->where('nim', $nim);
        return $this->db->get()->row();
    }

    public function HslUjian($id, $mhs)
    {
        $this->db->select('*, UNIX_TIMESTAMP(tgl_selesai) as waktu_habis');
        $this->db->from('h_ujian');
        $this->db->where('ujian_id', $id);
        $this->db->where('mahasiswa_id', $mhs);
        return $this->db->get();
    }

    public function getSoal($id)
    {
        $ujian = $this->getUjianById($id);
        $order = $ujian->jenis==="acak" ? 'rand()' : 'id_soal';
        $this->db->select('id_soal, soal, file, tipe_file, opsi_a, opsi_b, opsi_c, opsi_d, opsi_e, jawaban,pembahasan');
        if($id>='401' && $id<='480'){
        $this->db->from('tb_soal_sosiokultural');
        }elseif($id>='6461' && $id<='6540'){
        $this->db->from('tb_soal_manajerial');
        }elseif($id>='6588' && $id<='6667'){
        $this->db->from('tb_soal_wawancara');
        }elseif(($id>='6668' && $id<='6692') || ($id>='6819' && $id<='6828')){
            $this->db->from('tb_soal_twk');
            }elseif(($id>='6698' && $id<='6722')||($id>='6834' && $id<='6843')){
                $this->db->from('tb_soal_tiu');
                }elseif(($id>='6728' && $id<='6752')||($id>='6865' && $id<='6874')){
                    $this->db->from('tb_soal_tkp');
                    }else{
        $this->db->from('tb_soal');
        }
        $this->db->where('dosen_id', $ujian->dosen_id);
        $this->db->where('matkul_id', $ujian->matkul_id);
        $this->db->order_by($order);
        $this->db->limit($ujian->jumlah_soal);
        return $this->db->get()->result();
    }

    public function ambilSoal($pc_urut_soal1, $pc_urut_soal_arr,$Kodeujian)
    {
        if($Kodeujian>='401' && $Kodeujian<='480'){
            $this->db->select("*, {$pc_urut_soal1} AS jawaban, jawaban AS kunci_soal_opsi, (SELECT CASE
            WHEN jawaban = 'A' THEN opsi_a
            WHEN jawaban = 'B' THEN opsi_b
            WHEN jawaban = 'C' THEN opsi_c
            WHEN jawaban = 'D' THEN opsi_d
            ELSE opsi_e
        END
        FROM tb_soal_sosiokultural WHERE id_soal='{$pc_urut_soal_arr}' ) as kunci_soal_ket
        
        ");
                $this->db->from('tb_soal_sosiokultural');
                $this->db->where('id_soal', $pc_urut_soal_arr);
                return $this->db->get()->row();
        }elseif($Kodeujian>='6461' && $Kodeujian<='6540'){
            $this->db->select("*, {$pc_urut_soal1} AS jawaban, jawaban AS kunci_soal_opsi, (SELECT CASE
            WHEN jawaban = 'A' THEN opsi_a
            WHEN jawaban = 'B' THEN opsi_b
            WHEN jawaban = 'C' THEN opsi_c
            WHEN jawaban = 'D' THEN opsi_d
            ELSE opsi_e
        END
        FROM tb_soal_manajerial WHERE id_soal='{$pc_urut_soal_arr}' ) as kunci_soal_ket
        
        ");
                $this->db->from('tb_soal_manajerial');
                $this->db->where('id_soal', $pc_urut_soal_arr);
                return $this->db->get()->row();
        }elseif($Kodeujian>='6588' && $Kodeujian<='6667'){
            $this->db->select("*, {$pc_urut_soal1} AS jawaban, jawaban AS kunci_soal_opsi, (SELECT CASE
            WHEN jawaban = 'A' THEN opsi_a
            WHEN jawaban = 'B' THEN opsi_b
            WHEN jawaban = 'C' THEN opsi_c
            WHEN jawaban = 'D' THEN opsi_d
            ELSE opsi_e
        END
        FROM tb_soal_wawancara WHERE id_soal='{$pc_urut_soal_arr}' ) as kunci_soal_ket
        
        ");
                $this->db->from('tb_soal_wawancara');
                $this->db->where('id_soal', $pc_urut_soal_arr);
                return $this->db->get()->row();
        }elseif((($Kodeujian>='6668' && $Kodeujian<='6692')||($Kodeujian>='6819' && $Kodeujian<='6828'))){
            $this->db->select("*, {$pc_urut_soal1} AS jawaban, jawaban AS kunci_soal_opsi, (SELECT CASE
            WHEN jawaban = 'A' THEN opsi_a
            WHEN jawaban = 'B' THEN opsi_b
            WHEN jawaban = 'C' THEN opsi_c
            WHEN jawaban = 'D' THEN opsi_d
            ELSE opsi_e
        END
        FROM tb_soal_twk WHERE id_soal='{$pc_urut_soal_arr}' ) as kunci_soal_ket
        
        ");
                $this->db->from('tb_soal_twk');
                $this->db->where('id_soal', $pc_urut_soal_arr);
                return $this->db->get()->row();
        }elseif((($Kodeujian>='6698' && $Kodeujian<='6722')||($Kodeujian>='6834' && $Kodeujian<='6843'))){
            $this->db->select("*, {$pc_urut_soal1} AS jawaban, jawaban AS kunci_soal_opsi, (SELECT CASE
            WHEN jawaban = 'A' THEN opsi_a
            WHEN jawaban = 'B' THEN opsi_b
            WHEN jawaban = 'C' THEN opsi_c
            WHEN jawaban = 'D' THEN opsi_d
            ELSE opsi_e
        END
        FROM tb_soal_tiu WHERE id_soal='{$pc_urut_soal_arr}' ) as kunci_soal_ket
        
        ");
                $this->db->from('tb_soal_tiu');
                $this->db->where('id_soal', $pc_urut_soal_arr);
                return $this->db->get()->row();
        }elseif((($Kodeujian>='6728' && $Kodeujian<='6752')||($Kodeujian>='6865' && $Kodeujian<='6874'))){
            $this->db->select("*, {$pc_urut_soal1} AS jawaban, jawaban AS kunci_soal_opsi, (SELECT CASE
            WHEN jawaban = 'A' THEN opsi_a
            WHEN jawaban = 'B' THEN opsi_b
            WHEN jawaban = 'C' THEN opsi_c
            WHEN jawaban = 'D' THEN opsi_d
            ELSE opsi_e
        END
        FROM tb_soal_tkp WHERE id_soal='{$pc_urut_soal_arr}' ) as kunci_soal_ket
        
        ");
                $this->db->from('tb_soal_tkp');
                $this->db->where('id_soal', $pc_urut_soal_arr);
                return $this->db->get()->row();
        }else{
            $this->db->select("*, {$pc_urut_soal1} AS jawaban, jawaban AS kunci_soal_opsi, (SELECT CASE
            WHEN jawaban = 'A' THEN opsi_a
            WHEN jawaban = 'B' THEN opsi_b
            WHEN jawaban = 'C' THEN opsi_c
            WHEN jawaban = 'D' THEN opsi_d
            ELSE opsi_e
        END
        FROM tb_soal WHERE id_soal='{$pc_urut_soal_arr}' ) as kunci_soal_ket
        
        ");
                $this->db->from('tb_soal');
                $this->db->where('id_soal', $pc_urut_soal_arr);
                return $this->db->get()->row();
        }
       
    }

    public function getJawaban($id_tes)
    {
        $this->db->select('list_jawaban');
        $this->db->from('h_ujian');
        $this->db->where('id', $id_tes);
        return $this->db->get()->row()->list_jawaban;
    }

    public function getUjianIdById($id_tes)
{
    $this->db->select('ujian_id');
    $this->db->from('h_ujian');
    $this->db->where('id', $id_tes);
    return $this->db->get()->row()->ujian_id;
}

public function getSoalWithBobot($id,$soal)
{
    $this->db->select(" 
        REPLACE(
            SUBSTRING_INDEX(
                SUBSTRING_INDEX(bobot, '".$id."', -1),
                ',',
                1
            ),
            ':',
            ''
        ) AS bobot_selected
    ");
    $this->db->from('tb_soal_sosiokultural');
    $this->db->where('id_soal', $soal);
    return $this->db->get()->row();
}
public function getSoalWithBobotManaj($id,$soal)
{
    $this->db->select(" 
        REPLACE(
            SUBSTRING_INDEX(
                SUBSTRING_INDEX(bobot, '".$id."', -1),
                ',',
                1
            ),
            ':',
            ''
        ) AS bobot_selected
    ");
    $this->db->from('tb_soal_manajerial');
    $this->db->where('id_soal', $soal);
    return $this->db->get()->row();
}
public function getSoalWithBobotWawan($id,$soal)
{
    $this->db->select(" 
        REPLACE(
            SUBSTRING_INDEX(
                SUBSTRING_INDEX(bobot, '".$id."', -1),
                ',',
                1
            ),
            ':',
            ''
        ) AS bobot_selected
    ");
    $this->db->from('tb_soal_wawancara');
    $this->db->where('id_soal', $soal);
    return $this->db->get()->row();
}
public function getSoalWithBobotTKP($id,$soal)
{
    $this->db->select(" 
        REPLACE(
            SUBSTRING_INDEX(
                SUBSTRING_INDEX(bobot, '".$id."', -1),
                ',',
                1
            ),
            ':',
            ''
        ) AS bobot_selected
    ");
    $this->db->from('tb_soal_tkp');
    $this->db->where('id_soal', $soal);
    return $this->db->get()->row();
}

    public function getHasilUjian($nip = null)
    {
        $this->datatables->select('b.id_ujian, b.nama_ujian, b.jumlah_soal, CONCAT(b.waktu, " Menit") as waktu, b.tgl_mulai');
        $this->datatables->select('c.nama_matkul, d.nama_dosen');
        $this->datatables->from('h_ujian a');
        $this->datatables->join('m_ujian b', 'a.ujian_id = b.id_ujian');
        $this->datatables->join('matkul c', 'b.matkul_id = c.id_matkul');
        $this->datatables->join('dosen d', 'b.dosen_id = d.id_dosen');
        $this->datatables->group_by('b.id_ujian');
        if($nip !== null){
            $this->datatables->where('d.nip', $nip);
        }
        return $this->datatables->generate();
    }

    public function HslUjianById($id, $dt=false)
    {
        if($dt===false){
            $db = "db";
            $get = "get";
        }else{
            $db = "datatables";
            $get = "generate";
        }
        
        $this->$db->select('d.id, a.nama, b.nama_kelas, c.nama_jurusan, d.jml_benar, d.nilai, a.no_peserta');
        $this->$db->from('mahasiswa a');
        $this->$db->join('kelas b', 'a.kelas_id=b.id_kelas');
        $this->$db->join('jurusan c', 'b.jurusan_id=c.id_jurusan');
        // $this->$db->join('biodata_mahasiswa e', 'a.nim=e.nik');
        $this->$db->join('h_ujian d', 'a.id_mahasiswa=d.mahasiswa_id');
        $this->$db->where(['d.ujian_id' => $id]);
        $this->db->order_by("nilai","desc");
        //$this->db->order_by("a.no_peserta","desc");
        return $this->$db->$get();
    }

    public function bandingNilai($id)
    {
        $this->db->select_min('nilai', 'min_nilai');
        $this->db->select_max('nilai', 'max_nilai');
        $this->db->select_avg('FORMAT(FLOOR(nilai),0)', 'avg_nilai');
        $this->db->where('ujian_id', $id);
        return $this->db->get('h_ujian')->row();
    }

}