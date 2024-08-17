<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">

		<!-- Sidebar user panel (optional) -->
		<div class="user-panel">
			<div class="pull-left image">
				<img src="<?=base_url()?>assets/dist/img/user1.png" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
				<p><?=$user->username?></p>
				<small><?=$user->email?></small>
			</div>
		</div>
		
		<ul class="sidebar-menu" data-widget="tree">
			<li class="header">MAIN MENU</li>
			<!-- Optionally, you can add icons to the links -->
			<?php 
			$page = $this->uri->segment(1);
			$page2 = $this->uri->segment(2);
			$master = ["jurusan", "kelas", "matkul", "dosen", "mahasiswa"];
			$relasi = ["kelasdosen", "jurusanmatkul"];
			$users  = ["users"];
			?>
			<li class="<?= $page === 'dashboard' ? "active" : "" ?>"><a href="<?=base_url('dashboard')?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
			<?php if($this->ion_auth->is_admin()) : ?>
			<li class="treeview <?= in_array($page, $master)  ? "active menu-open" : ""  ?>">
				<a href="#"><i class="fa fa-folder"></i> <span>Data Master</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li class="<?=$page==='jurusan'?"active":""?>">
						<a href="<?=base_url('jurusan')?>">
							<i class="fa fa-circle-o"></i> 
							Profesi
						</a>
					</li>
					<li class="<?=$page==='kelas'?"active":""?>">
						<a href="<?=base_url('kelas')?>">
							<i class="fa fa-circle-o"></i>
							Angkatan
						</a>
					</li>
					<li class="<?=$page==='matkul'?"active":""?>">
						<a href="<?=base_url('matkul')?>">
							<i class="fa fa-circle-o"></i>
							Tema Pelatihan/Formasi
						</a>
					</li>
					<li class="<?=$page==='dosen'?"active":""?>">
						<a href="<?=base_url('dosen')?>">
							<i class="fa fa-circle-o"></i>
							Pelatihan/Admin Formasi 
						</a>
					</li>
					<li class="<?=$page==='mahasiswa'?"active":""?>">
						<a href="<?=base_url('mahasiswa')?>">
							<i class="fa fa-circle-o"></i>
							Anggota
						</a>
					</li>
				</ul>
			</li>
			<li class="treeview <?= in_array($page, $relasi)  ? "active menu-open" : ""  ?>">
				<a href="#"><i class="fa fa-link"></i> <span>Relasi</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li class="<?=$page==='kelasdosen'?"active":""?>">
						<a href="<?=base_url('kelasdosen')?>">
							<i class="fa fa-circle-o"></i>
							Angkatan - Pelatihan
						</a>
					</li>
					<li class="<?=$page==='jurusanmatkul'?"active":""?>">
						<a href="<?=base_url('jurusanmatkul')?>">
							<i class="fa fa-circle-o"></i>
							Profesi - Tema Pelatihan
						</a>
					</li>
				</ul>
			</li>
			<li class="<?=$page==='Biodata'?"active":""?>">
				<a href="<?=base_url('Biodata/rekap')?>" rel="noopener noreferrer">
					<i class="fa fa-user-md"></i> <span>Biodata Anggota</span>
				</a>
			</li>
			<?php endif; ?>
			<?php if( $this->ion_auth->is_admin() || $this->ion_auth->in_group('dosen') ) : ?>
			<li class="<?=$page==='soal'?"active":""?>">
				<a href="<?=base_url('soal')?>" rel="noopener noreferrer">
					<i class="fa fa-file-text-o"></i> <span>Bank Soal</span>
				</a>
			</li>
			<li class="<?=$page==='soal_tiu'?"active":""?>">
				<a href="<?=base_url('soal_tiu')?>" rel="noopener noreferrer">
					<i class="fa fa-file-text-o"></i> <span>Bank Soal TIU</span>
				</a>
			</li>
			<li class="<?=$page==='soal_twk'?"active":""?>">
				<a href="<?=base_url('soal_twk')?>" rel="noopener noreferrer">
					<i class="fa fa-file-text-o"></i> <span>Bank Soal TWK</span>
				</a>
			</li>
			<li class="<?=$page==='soal_tkp'?"active":""?>">
				<a href="<?=base_url('soal_tkp')?>" rel="noopener noreferrer">
					<i class="fa fa-file-text-o"></i> <span>Bank Soal TKP</span>
				</a>
			</li>
			<li class="<?=$page==='soal_sosiokultural'?"active":""?>">
				<a href="<?=base_url('soal_sosiokultural')?>" rel="noopener noreferrer">
					<i class="fa fa-file-text-o"></i> <span>Bank Soal Sosiokultural</span>
				</a>
			</li>
			<li class="<?=$page==='soal_manajerial'?"active":""?>">
				<a href="<?=base_url('soal_manajerial')?>" rel="noopener noreferrer">
					<i class="fa fa-file-text-o"></i> <span>Bank Soal Manajerial</span>
				</a>
			</li>
			<li class="<?=$page==='soal_wawancara'?"active":""?>">
				<a href="<?=base_url('soal_wawancara')?>" rel="noopener noreferrer">
					<i class="fa fa-file-text-o"></i> <span>Bank Soal Wawancara</span>
				</a>
			</li>
			<?php endif; ?>
			
			<?php if( $this->ion_auth->is_admin() ) : ?>
			<li class="<?=$page==='DataPeserta'?"active":""?>">
				<a href="<?=base_url('DataPeserta')?>" rel="noopener noreferrer">
					<i class="glyphicon glyphicon-user"></i> <span>Data Peserta</span>
				</a>
			</li>
			<?php endif; ?>
			
			
			<?php if( $this->ion_auth->in_group('dosen') ) : ?>
			<li class="<?=$page==='ujian'?"active":""?>">
				<a href="<?=base_url('ujian/master')?>" rel="noopener noreferrer">
					<i class="fa fa-chrome"></i> <span>Ujian</span>
				</a>
			</li>
			<?php endif; ?>
			<?php if( $this->ion_auth->in_group('mahasiswa') ) : ?>
			<?php  if($user->last_name!='' ){  ?>
				<?php if($user->activation_code=='1' ){ ?>
			<li class="<?=$page2==='list'?"active":""?>">
				<a href="<?=base_url('ujian/list')?>" rel="noopener noreferrer">
					<i class="fa fa-chrome"></i> <span>Tryout Teknis</span>
				</a>
			</li>
			<li class="<?=$page2==='list_sosio'?"active":""?>">
				<a href="<?=base_url('ujian/list_sosio')?>" rel="noopener noreferrer">
					<i class="fa fa-universal-access"></i> <span>Tryout Sosiokultural</span>
				</a>
			</li>
			<li class="<?=$page2==='list_manaj'?"active":""?>">
				<a href="<?=base_url('ujian/list_manaj')?>" rel="noopener noreferrer">
					<i class="fa fa-asterisk"></i> <span>Tryout Manajerial</span>
				</a>
			</li>
			<li class="<?=$page2==='list_wawan'?"active":""?>">
				<a href="<?=base_url('ujian/list_wawan')?>" rel="noopener noreferrer">
					<i class="fa fa-bolt"></i> <span>Tryout Wawancara</span>
				</a>
			</li>
			<li class="<?=$page2==='list_live'?"active":""?>">
				<a href="<?=base_url('ujian/list_live')?>" rel="noopener noreferrer">
					<i class="fa fa-heart"></i> <span>Live Competition </span>
				</a>
			</li>
			<?php }elseif($user->activation_code=='2' ){ ?>
			<li class="<?=$page2==='list_tiu'?"active":""?>">
				<a href="<?=base_url('ujian/list_tiu')?>" rel="noopener noreferrer">
					<i class="fa fa-universal-access"></i> <span>Tryout TIU</span>
				</a>
			</li>
			<li class="<?=$page2==='list_twk'?"active":""?>">
				<a href="<?=base_url('ujian/list_twk')?>" rel="noopener noreferrer">
					<i class="fa fa-asterisk"></i> <span>Tryout TWK</span>
				</a>
			</li>
			<li class="<?=$page2==='list_tkp'?"active":""?>">
				<a href="<?=base_url('ujian/list_tkp')?>" rel="noopener noreferrer">
					<i class="fa fa-bolt"></i> <span>Tryout TKP</span>
				</a>
			</li>
			<?php }elseif($user->activation_code=='3' ){ ?>
			<li class="<?=$page2==='list'?"active":""?>">
				<a href="<?=base_url('ujian/list')?>" rel="noopener noreferrer">
					<i class="fa fa-chrome"></i> <span>Tryout SKB</span>
				</a>
			</li>
			<li class="<?=$page2==='list_tiu'?"active":""?>">
				<a href="<?=base_url('ujian/list_tiu')?>" rel="noopener noreferrer">
					<i class="fa fa-universal-access"></i> <span>Tryout TIU</span>
				</a>
			</li>
			<li class="<?=$page2==='list_twk'?"active":""?>">
				<a href="<?=base_url('ujian/list_twk')?>" rel="noopener noreferrer">
					<i class="fa fa-asterisk"></i> <span>Tryout TWK</span>
				</a>
			</li>
			<li class="<?=$page2==='list_tkp'?"active":""?>">
				<a href="<?=base_url('ujian/list_tkp')?>" rel="noopener noreferrer">
					<i class="fa fa-bolt"></i> <span>Tryout TKP</span>
				</a>
			</li>
			<li class="<?=$page2==='list_live'?"active":""?>">
				<a href="<?=base_url('ujian/list_live')?>" rel="noopener noreferrer">
					<i class="fa fa-heart"></i> <span>Live Competition </span>
				</a>
			</li>
			<?php }?>

			
			<?php }else{?>
			<li class="<?=$page==='ujian'?"active":""?>">
				<a href="<?=base_url('dashboard')?>" rel="noopener noreferrer">
					<i class="fa fa-chrome"></i> <span>Ujian (Isi Survei dulu ya)</span>
				</a>
			</li>
			
			<?php }?>
			<?php $user = $this->ion_auth->user()->row(); ?>
			<li class="<?=$page==='Biodata'?"active":""?>">
				<a href="<?=base_url('Biodata')?>" rel="noopener noreferrer">
					<i class="fa fa-user-md"></i> <span>Biodata Anggota</span>
				</a>
			</li>
			<!--<li class="<?=$page==='view_nilai'?"active":""?>">
				<a href="<?=base_url('Narasumber/view_nilai')?>" rel="noopener noreferrer">
					<i class="fa fa-users"></i> <span>Penilaian Narasumber</span>
				</a>
			</li>-->
			<?php endif; ?>
			<?php if( !$this->ion_auth->in_group('mahasiswa') ) : ?>
			<li class="header">REPORTS</li>
			<li class="<?=$page==='hasilujian'?"active":""?>">
				<a href="<?=base_url('hasilujian')?>" rel="noopener noreferrer">
					<i class="fa fa-clipboard"></i> <span>Hasil Ujian</span>
				</a>
			</li>
			<!--<li class="<?=$page==='nilaiakhir'?"active":""?>">-->
			<!--	<a href="<?=base_url('nilaiakhir/export_excel')?>" rel="noopener noreferrer" target="_blank">-->
			<!--		<i class="fa fa-file"></i> <span>Nilai Akhir</span>-->
			<!--	</a>-->
			<!--</li>-->
			<?php endif; ?>
			<?php if($this->ion_auth->is_admin()) : ?>
			<li class="header">ADMINISTRATOR</li>
			<li class="<?=$page==='Narasumber'?"active":""?>">
				<a href="<?=base_url('Narasumber')?>" rel="noopener noreferrer">
					<i class="fa fa-street-view"></i> <span>Narasumber</span>
				</a>
			</li>
			<li class="<?=$page==='users'?"active":""?>">
				<a href="<?=base_url('users')?>" rel="noopener noreferrer">
					<i class="fa fa-users"></i> <span>User Management</span>
				</a>
			</li>
			
			<!-- 
			<li class="<?=$page==='settings'?"active":""?>">
				<a href="<?=base_url('settings')?>" rel="noopener noreferrer">
					<i class="fa fa-cog"></i> <span>Settings</span>
				</a>
			</li> -->
			<?php endif; ?>
			<li class="header">MODUL</li>
			<?php if($this->ion_auth->is_admin()) : ?>
			<!-- <li class="<?=$page==='Mahasiswa/berkas'?"active":""?>">
				<a href="<?=base_url('Mahasiswa/berkas')?>" rel="noopener noreferrer">
					<i class="glyphicon glyphicon-folder-close"></i> <span>Berkas</span>
				</a>
			</li> -->
			<?php endif; ?>
			<!--<li class="<?=$page==='sertifikat'?"active":""?>">
				<a href="<?=base_url('Sertifikat')?>" rel="noopener noreferrer">
					<i class="glyphicon glyphicon-book"></i> <span>Sertifikat</span>
				</a>
			</li>-->
			
			<li class="<?=$page==='C_Modul'?"active":""?>">
				<a href="<?=base_url('C_Modul')?>" rel="noopener noreferrer">
					<i class="glyphicon glyphicon-book"></i> <span>eBook PDF</span>
				</a>
			</li>
			
			<li class="<?=$page2==='video'?"active":""?>">
				<a href="<?=base_url('C_Modul/video')?>" rel="noopener noreferrer">
					<i class="glyphicon glyphicon-facetime-video"></i> <span>Video Materi Belajar</span>
				</a>
			</li>
		</ul>

	</section>
	<!-- /.sidebar -->
</aside>