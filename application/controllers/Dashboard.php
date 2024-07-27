<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->ion_auth->logged_in()){
			redirect('auth');
		}
		$this->load->model('Dashboard_model', 'dashboard');
		$this->load->model('Ujian_model', 'ujian');
		$this->load->model('Biodata_model');
		$this->user = $this->ion_auth->user()->row();
		
	}

	public function admin_box()
	{
		$box = [
			[
				'box' 		=> 'light-blue',
				'total' 	=> $this->dashboard->total('jurusan'),
				'title'		=> 'Jurusan',
				'nama'		=> 'Profesi',
				'icon'		=> 'graduation-cap'
			],
			[
				'box' 		=> 'olive',
				'total' 	=> $this->dashboard->total('kelas'),
				'title'		=> 'Kelas',
				'nama'		=> 'Angkatan',
				'icon'		=> 'building-o'
			],
			[
				'box' 		=> 'yellow-active',
				'total' 	=> $this->dashboard->total('dosen'),
				'title'		=> 'Dosen',
				'nama'		=> 'Pelatihan',
				'icon'		=> 'user-secret'
			],
			[
				'box' 		=> 'red',
				'total' 	=> $this->dashboard->total('mahasiswa'),
				'title'		=> 'Mahasiswa',
				'nama'		=> 'Anggota',
				'icon'		=> 'user'
			],
		];
		$info_box = json_decode(json_encode($box), FALSE);
		return $info_box;
	}

	public function index()
	{
		$user = $this->user;
		$data = [
			'users' => $this->ion_auth->user()->row(),
			'user' 		=> $user,
			'judul'		=> 'Dashboard',
			'subjudul'	=> 'Data Aplikasi',
			'mhs' 		=> $this->ujian->getIdMahasiswa($user->username),
		];

		if ( $this->ion_auth->is_admin() ) {
			$data['info_box'] = $this->admin_box();
		} elseif ( $this->ion_auth->in_group('dosen') ) {
			$matkul = ['matkul' => 'dosen.matkul_id=matkul.id_matkul'];
			$data['dosen'] = $this->dashboard->get_where('dosen', 'nip', $user->username, $matkul)->row();

			$kelas = ['kelas' => 'kelas_dosen.kelas_id=kelas.id_kelas'];
			$data['kelas'] = $this->dashboard->get_where('kelas_dosen', 'dosen_id' , $data['dosen']->id_dosen, $kelas, ['nama_kelas'=>'ASC'])->result();
		}else{
			$join = [
				'kelas b' 	=> 'a.kelas_id = b.id_kelas',
				'jurusan c'	=> 'b.jurusan_id = c.id_jurusan'
			];
			$data['mahasiswa'] = $this->dashboard->get_where('mahasiswa a', 'nim', $user->username, $join)->row();
		}

 if($user->last_name!='' ){ 
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('dashboard',$data);
		$this->load->view('_templates/dashboard/_footer.php');
		
 }else{
	$user = $this->ion_auth->user()->row();
		$data = [
			'user' => $this->ion_auth->user()->row(),
			'judul'		=> 'Dashboard',
			'subjudul'	=> 'Survei Peserta CAT-Prakom',
		];
		$cek_id = $user->username;
		if ($this->ion_auth->is_admin()) {
			$data['biodata'] = $this->Biodata_model->view();
		}else{
			$data['bioanggota'] = $this->Biodata_model->viewanggota($cek_id);
			$data['ranting'] = $this->Biodata_model->ranting();
		}
		
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('survei',$data);
		$this->load->view('_templates/dashboard/_footer.php'); 
 }
	}
	
		public function survei()
	{
		
		$user = $this->ion_auth->user()->row();
		$data = [
			'user' => $this->ion_auth->user()->row(),
			'judul'		=> 'Dashboard',
			'subjudul'	=> 'Survei Peserta CAT-Prakom',
		];
		$cek_id = $user->username;
		if ($this->ion_auth->is_admin()) {
			$data['biodata'] = $this->Biodata_model->view();
		}else{
			$data['bioanggota'] = $this->Biodata_model->viewanggota($cek_id);
			$data['ranting'] = $this->Biodata_model->ranting();
		}
		
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('survei',$data);
		$this->load->view('_templates/dashboard/_footer.php');
	}
	
	
}