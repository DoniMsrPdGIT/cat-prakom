<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Narasumber extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->ion_auth->logged_in()){
			redirect('auth');
		}
		$this->load->model('Master_model', 'master');
		$this->load->model('Dashboard_model', 'dashboard');
		$this->load->model('Narsumber_model');
    }

    public function index(){
    	$data = [
			'user' => $this->ion_auth->user()->row(),
			'judul'	=> 'Narasumber',
			'subjudul' => 'Data Narasumber'
		];
		$data['view'] = $this->Narsumber_model->view();
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('narasumber/data');
		$this->load->view('_templates/dashboard/_footer.php');
    }
    public function viewadd(){
    	$data = [
			'user' => $this->ion_auth->user()->row(),
			'judul'	=> 'Narasumber',
			'subjudul' => 'Tambah Narasumber'
		];
		$data['angkatan'] = $this->master->viewangakatan();
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('narasumber/add');
		$this->load->view('_templates/dashboard/_footer.php');
    }

    public function add(){
    	$nm = $this->input->post('nama');
    	$angkatan = $this->input->post('angkatan');
    	$materi = $this->input->post('materi');
    	$hari = $this->input->post('hari');
    	$tgl = $this->input->post('tgl');

    	$add = array('id_kelas' => $angkatan,
    				 'nm_narsum' => $nm,
    				 'materi' => $materi,
    				 'hari' => $hari,
    				 'tgl' => $tgl );

    	$this->Narsumber_model->add($add);
    	redirect('Narasumber');
    }

    public function viewedit(){
    	$id = $this->uri->segment('3');
    	$data = [
			'user' => $this->ion_auth->user()->row(),
			'judul'	=> 'Narasumber',
			'subjudul' => 'Edit Narasumber'
		];
		$data['angkatan'] = $this->master->viewangakatan();
		$data['idangakatan'] = $this->Narsumber_model->angkatanid($id);
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('narasumber/edit');
		$this->load->view('_templates/dashboard/_footer.php');
    }

    public function edit(){
    	$id = $this->input->post('id');
    	$nm = $this->input->post('nama');
    	$angkatan = $this->input->post('angkatan');
    	$materi = $this->input->post('materi');
    	$hari = $this->input->post('hari');
    	$tgl = $this->input->post('tgl');

    	$edit = array('id_kelas' => $angkatan,
    				 'nm_narsum' => $nm,
    				 'materi' => $materi,
    				 'hari' => $hari,
    				 'tgl' => $tgl );
    	$id_n = array('id_narasumber' => $id );
    	$this->Narsumber_model->edit_n($edit, $id_n);

    	redirect('Narasumber');
    }

    public function delete($id){
		$id = array('id_narasumber' => $id );
		$this->Narsumber_model->del($id);
	    redirect('Narasumber','refresh');
	}
	public function penilaian(){
	    $user = $this->ion_auth->user()->row();
    	$data = [
			'user' => $this->ion_auth->user()->row(),
			'judul'	=> 'Narasumber',
			'subjudul' => 'Penilaian Narasumber'
		];
		if($this->ion_auth->is_admin()) : 
	    	$data['penilaian'] = $this->Narsumber_model->penilaian();
		endif;
		if( $this->ion_auth->in_group('mahasiswa') ) : 
		    $id = $user->id;
		    $data['penilaian'] = $this->Narsumber_model->penilaian_id($id);
		endif;
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('narasumber/penilaian');
		$this->load->view('_templates/dashboard/_footer.php');
    }
    public function nilai(){
        $user = $this->ion_auth->user()->row();
    	$data = [
			'user' => $this->ion_auth->user()->row(),
			'judul'	=> 'Narasumber',
			'subjudul' => 'Penilaian Narasumber'
		]; 
		$id = $user->username;
		$id_m = $this->db->query("SELECT * FROM mahasiswa where nim='".$id."'")->row_array();
		$cek_id_k = $id_m['kelas_id'];
		$data['angkatan'] = $this->master->viewangakatan();
		$data['view'] = $this->Narsumber_model->viewcekid($cek_id_k);
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('narasumber/form_nilai');
		$this->load->view('_templates/dashboard/_footer.php');
    }
    function datanarasum(){
			// Ambil data ID Provinsi yang dikirim via ajax post
			$id = $this->input->post('id_angkatan');
			$narsum = $this->Narsumber_model->angkatanid($id);
			// Buat variabel untuk menampung tag-tag option nya
			// Set defaultnya dengan tag option Pilih
			$lists = "<option value=''>Pilih</option>";
			foreach($narsum as $data){
				$lists .= "<option value='".$data->id_narasumber."'>".$data->nm_narsum."</option>"; // Tambahkan tag option ke variabel $lists
			}
			$callback = array('list_narasumber'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
			echo json_encode($callback); // konversi varibael $callback menjadi JSON
	}
	function addnilai(){
		$id 	  = $this->input->post('id');
// 		$nama 	  = $this->input->post('nama');
// 		$materi   = $this->input->post('materi');
// 		$sikap 	  = $this->input->post('sikap');
// 		$penyampaian = $this->input->post('penyampaian');
// 		$penguasaan  = $this->input->post('penguasaan');
// 		$waktu = $this->input->post('waktu');
// 		$saran = $this->input->post('saran');

// 		$nilai = array('id_mahasiswa' => $id,
// 					   'id_narasumber' => $nama,
// 					   'penampilan' => $sikap,
// 					   'penyampaian' => $penyampaian,
// 					   'penguasaan' => $penguasaan,
// 					   'ketepatan' => $waktu,
// 					   'saran' => $saran, );

// 		$this->Narsumber_model->input_nilai($nilai);
		
		// INSERT PERULANGAN
		$nama 	  = $this->input->post('nama');
		$materi   = $this->input->post('materi');
		$sikap 	  = $this->input->post('sikap');
		$penyampaian = $this->input->post('penyampaian');
		$penguasaan  = $this->input->post('penguasaan');
		$waktu = $this->input->post('waktu');
		$saran = $this->input->post('saran');
		// $jumlah_fungsi = count($fungsi);
		$data1 = array();

			$x=0;
		foreach($nama as $key => $value) {

			array_push($data1, array('id_mahasiswa' => $id,
			                         'id_narasumber' => $nama[$x],
			                         'penampilan' => $sikap[$x],
			                         'penyampaian' => $penyampaian[$x],
			                         'penguasaan' => $penguasaan[$x],
			                         'ketepatan' => $waktu[$x],
			                         'saran' => $saran[$x]));
			$x++;
		}

		$this->db->insert_batch('penilaian_narsum',$data1);
		
		
		redirect('Narasumber/view_nilai','refresh');
	}
	public function deletepenilaian($id){
		$id = array('id_penilaian' => $id );
		$this->Narsumber_model->delnilai($id);
	    redirect('Narasumber/view_nilai','refresh');
	}
	public function rangking(){
    	$data = [
			'user' => $this->ion_auth->user()->row(),
			'judul'	=> 'Narasumber',
			'subjudul' => 'Data Peringkat Narasumber'
		];
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('narasumber/rangking');
		$this->load->view('_templates/dashboard/_footer.php');
    }
    
    public function view_nilai(){
        $user = $this->ion_auth->user()->row();
    	$data = [
			'user' => $this->ion_auth->user()->row(),
			'judul'	=> 'Narasumber',
			'subjudul' => 'Data Penilaian Narasumber'
		];
		$id = $user->username;
		$id_m = $this->db->query("SELECT * FROM mahasiswa where nim='".$id."'")->row_array();
    	$cek_id = $id_m['id_mahasiswa'];
		
		$data['view_nilai'] = $this->Narsumber_model->tampil($cek_id);
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('narasumber/view_peserta');
		$this->load->view('_templates/dashboard/_footer.php');
    }
    public function edit_nilai(){
        $id = $this->uri->segment('3');
        $user = $this->ion_auth->user()->row();
    	$data = [
			'user' => $this->ion_auth->user()->row(),
			'judul'	=> 'Narasumber',
			'subjudul' => 'Edit Penilaian Narasumber'
		]; 
		
		$data['view_nilai'] = $this->Narsumber_model->tampilid($id);
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('narasumber/edit_nilai');
		$this->load->view('_templates/dashboard/_footer.php');
    }
    
    function editnilai(){
        $id_n = $this->input->post('id_edit');
        
        $sikap = $this->input->post('sikap');
        $penyampaian = $this->input->post('penyampaian');
        $penguasaan = $this->input->post('penguasaan');
        $ketepatan = $this->input->post('waktu');
        $saran = $this->input->post('saran');
        
        $nilai_edit = array('penampilan' => $sikap,
                            'penyampaian' => $penyampaian,
                            'penguasaan' => $penguasaan,
                            'ketepatan' => $ketepatan,
                            'saran' => $saran);
        $id_ed = array('id_penilaian' => $id_n);
        
        $this->Narsumber_model->edit_nilai($nilai_edit, $id_ed);
	    redirect('Narasumber/view_nilai','refresh');
        
    }
    
    
}