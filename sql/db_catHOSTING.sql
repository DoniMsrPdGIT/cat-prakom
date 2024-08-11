/*
SQLyog Ultimate v12.4.1 (64 bit)
MySQL - 5.7.33 : Database - db_cat
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


/*Table structure for table `berkas_anggota` */

DROP TABLE IF EXISTS `berkas_anggota`;

CREATE TABLE `berkas_anggota` (
  `id_berkas` int(11) NOT NULL AUTO_INCREMENT,
  `id_anggota` int(11) NOT NULL,
  `nama_berkas` varchar(50) NOT NULL,
  `file` text NOT NULL,
  PRIMARY KEY (`id_berkas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `berkas_anggota` */

/*Table structure for table `biodata_mahasiswa` */

DROP TABLE IF EXISTS `biodata_mahasiswa`;

CREATE TABLE `biodata_mahasiswa` (
  `id_biodata` int(11) NOT NULL AUTO_INCREMENT,
  `no_peserta` varchar(50) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama_b` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_kta` varchar(50) NOT NULL,
  `no_str` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `agama` varchar(50) NOT NULL,
  `pekerjaan` text NOT NULL,
  `berlaku` date NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tempat_tugas` text NOT NULL,
  `ranting` varchar(40) NOT NULL,
  `pas_foto` text NOT NULL,
  PRIMARY KEY (`id_biodata`)
) ENGINE=InnoDB AUTO_INCREMENT=521 DEFAULT CHARSET=latin1;

/*Data for the table `biodata_mahasiswa` */

insert  into `biodata_mahasiswa`(`id_biodata`,`no_peserta`,`nik`,`nama_b`,`tempat_lahir`,`tgl_lahir`,`no_kta`,`no_str`,`alamat`,`agama`,`pekerjaan`,`berlaku`,`no_hp`,`email`,`tempat_tugas`,`ranting`,`pas_foto`) values 
(138,'','1301105201690001','AFRIDA','Pasar Lakitan','1972-09-30','03.08.0139','030252117-1360032','Pasar lakitan','Islam','PNS','2022-10-11','081277060443','afridaida1969@gmail.com','Lakitan selatan,koto raya','Kambang','PAS_FOTO_lUKVr8x7mB_22082023092729.jpg'),
(511,'MM004','1234849503850394','UDIN','PADANG','2023-08-23','44324','53454','dsfsdfsdfsdf','ISLAM','PNS','2023-09-01','084999332','kosjaosd@jldsjld.com','FDFDS','id_ranting','FOTO_LAMA_UMVvpw0nKo_23082023094952.jpg'),
(513,'MDSD4','4343423423423434','XXX','XXX','2023-08-23','XXX','XXX','xxxxxx','XXX','Kontrak','2023-08-24','00999','sas@yahoo.com','XXX','id_ranting','FOTO_LAMA_X9TY4AVpj1_23082023102107.jpg'),
(515,'BKN-003','1738208999034002','AFRIJON','PADANG','2023-08-23','XXX','XXX','xxxxxx','ISLAM','Kontrak','2023-08-24','00999','afrijon@bkn.go.id','XXX','id_ranting','FOTO_LAMA_VeADLIGR05_23082023105327.jpg'),
(516,'5554','5435345345345','FEBI','PADANG','2023-08-23','','','jakarta','','PNS','0000-00-00','5435345345345','febi@yahoo.com','','','PAS_FOTO_DQGe3VAL8i_23082023111912.jpg'),
(517,'CAT-0782','089617502694','MASRI PRIMA DONI','PADANG','2023-08-24','','','Painan','','PNS','0000-00-00','089617502694','masri_prima_doni@yahoo.com','','',''),
(518,'CAT-0016','081221585949','RAMADANI ILHAM','PASAMAN','2023-08-23','','','PASAMAN','','Lainnya','0000-00-00','081221585949','ramadaniilham@yahoo.com','','',''),
(519,'CAT-0808','082376477317','HUTRI ELA NARSA','BAYANG','2023-08-24','','','BAYANG','','Lainnya','0000-00-00','082376477317','hutri_ela@yahoo.com','','',''),
(520,'CAT-0552','0893043943434','JAKARTA','PADANG','2023-08-23','','','PAINNA','','Belum Bekerja','0000-00-00','0893043943434','xave@bkn.go.id','','','');

/*Table structure for table `dosen` */

DROP TABLE IF EXISTS `dosen`;

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL AUTO_INCREMENT,
  `nip` char(12) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `email` varchar(254) NOT NULL,
  `matkul_id` int(11) NOT NULL,
  PRIMARY KEY (`id_dosen`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `nip` (`nip`),
  KEY `matkul_id` (`matkul_id`),
  CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`matkul_id`) REFERENCES `matkul` (`id_matkul`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

/*Data for the table `dosen` */

insert  into `dosen`(`id_dosen`,`nip`,`nama_dosen`,`email`,`matkul_id`) values 
(1,'13010901','PPA-DSN1','pppk_ahli@gmail.com',15),
(2,'13010902','PPT-DSN2','pppk_terampil@gmail.com',16);

/*Table structure for table `groups` */

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `groups` */

insert  into `groups`(`id`,`name`,`description`) values 
(1,'admin','Administrator'),
(2,'dosen','Pembuat Soal dan ujian'),
(3,'mahasiswa','Peserta Ujian');

/*Table structure for table `h_ujian` */

DROP TABLE IF EXISTS `h_ujian`;

CREATE TABLE `h_ujian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ujian_id` int(11) NOT NULL,
  `mahasiswa_id` int(11) NOT NULL,
  `list_soal` longtext NOT NULL,
  `list_jawaban` longtext NOT NULL,
  `jml_benar` int(11) NOT NULL,
  `nilai` decimal(10,2) NOT NULL,
  `nilai_bobot` decimal(10,2) NOT NULL,
  `tgl_mulai` datetime NOT NULL,
  `tgl_selesai` datetime NOT NULL,
  `status` enum('Y','N') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ujian_id` (`ujian_id`),
  KEY `mahasiswa_id` (`mahasiswa_id`),
  CONSTRAINT `h_ujian_ibfk_1` FOREIGN KEY (`ujian_id`) REFERENCES `m_ujian` (`id_ujian`),
  CONSTRAINT `h_ujian_ibfk_2` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`id_mahasiswa`)
) ENGINE=InnoDB AUTO_INCREMENT=1585 DEFAULT CHARSET=utf8;

/*Data for the table `h_ujian` */

insert  into `h_ujian`(`id`,`ujian_id`,`mahasiswa_id`,`list_soal`,`list_jawaban`,`jml_benar`,`nilai`,`nilai_bobot`,`tgl_mulai`,`tgl_selesai`,`status`) values 
(1582,35,1151,'2,1','2:D:N,1:C:N',2,10.00,500.00,'2023-08-23 14:46:57','2023-08-23 14:48:57','N'),
(1583,36,1151,'1,2','1:C:N,2:E:N',1,5.00,500.00,'2023-08-23 14:56:03','2023-08-23 15:46:03','N'),
(1584,35,1152,'2,1','2:D:N,1:C:N',2,10.00,500.00,'2023-08-23 15:26:52','2023-08-23 15:28:52','N');

/*Table structure for table `jurusan` */

DROP TABLE IF EXISTS `jurusan`;

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jurusan` varchar(500) NOT NULL,
  PRIMARY KEY (`id_jurusan`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `jurusan` */

insert  into `jurusan`(`id_jurusan`,`nama_jurusan`) values 
(1,'PPPK Teknis - Pranata Komputer Ahli Pertama'),
(2,'PPPK Teknis - Pranata Komputer Terampil'),
(3,'CPNS SKB - Pranata Komputer Ahli Pertama'),
(4,'CPNS SKB - Pranata Komputer Terampil');

/*Table structure for table `jurusan_matkul` */

DROP TABLE IF EXISTS `jurusan_matkul`;

CREATE TABLE `jurusan_matkul` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matkul_id` int(11) NOT NULL,
  `jurusan_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jurusan_id` (`jurusan_id`),
  KEY `matkul_id` (`matkul_id`),
  CONSTRAINT `jurusan_matkul_ibfk_1` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusan` (`id_jurusan`),
  CONSTRAINT `jurusan_matkul_ibfk_2` FOREIGN KEY (`matkul_id`) REFERENCES `matkul` (`id_matkul`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

/*Data for the table `jurusan_matkul` */

insert  into `jurusan_matkul`(`id`,`matkul_id`,`jurusan_id`) values 
(6,9,1),
(7,9,3),
(8,2,1),
(9,2,3),
(10,1,1),
(11,1,3),
(12,10,1),
(13,10,3),
(14,11,1),
(15,11,3),
(16,12,1),
(17,12,3),
(18,13,1),
(19,13,3),
(20,14,1),
(21,14,3);

/*Table structure for table `kelas` */

DROP TABLE IF EXISTS `kelas`;

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(30) NOT NULL,
  `jurusan_id` int(11) NOT NULL,
  PRIMARY KEY (`id_kelas`),
  KEY `jurusan_id` (`jurusan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `kelas` */

insert  into `kelas`(`id_kelas`,`nama_kelas`,`jurusan_id`) values 
(1,'PPPK-TA',1),
(2,'PPPK-TTr',2),
(3,'CPNS-BA',3),
(4,'CPNS-BTr',4);

/*Table structure for table `kelas_dosen` */

DROP TABLE IF EXISTS `kelas_dosen`;

CREATE TABLE `kelas_dosen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kelas_id` int(11) NOT NULL,
  `dosen_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kelas_id` (`kelas_id`),
  KEY `dosen_id` (`dosen_id`),
  CONSTRAINT `kelas_dosen_ibfk_1` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id_dosen`),
  CONSTRAINT `kelas_dosen_ibfk_2` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id_kelas`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8;

/*Data for the table `kelas_dosen` */

insert  into `kelas_dosen`(`id`,`kelas_id`,`dosen_id`) values 
(94,3,1),
(95,1,1),
(96,4,2),
(97,2,2);

/*Table structure for table `login_attempts` */

DROP TABLE IF EXISTS `login_attempts`;

CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=532 DEFAULT CHARSET=utf8;

/*Data for the table `login_attempts` */

/*Table structure for table `m_ujian` */

DROP TABLE IF EXISTS `m_ujian`;

CREATE TABLE `m_ujian` (
  `id_ujian` int(11) NOT NULL AUTO_INCREMENT,
  `dosen_id` int(11) NOT NULL,
  `matkul_id` int(11) NOT NULL,
  `nama_ujian` varchar(200) NOT NULL,
  `jumlah_soal` int(11) NOT NULL,
  `waktu` int(11) NOT NULL,
  `jenis` enum('acak','urut') NOT NULL,
  `tgl_mulai` datetime NOT NULL,
  `terlambat` datetime NOT NULL,
  `token` varchar(5) NOT NULL,
  PRIMARY KEY (`id_ujian`),
  KEY `matkul_id` (`matkul_id`),
  KEY `dosen_id` (`dosen_id`),
  CONSTRAINT `m_ujian_ibfk_1` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id_dosen`),
  CONSTRAINT `m_ujian_ibfk_2` FOREIGN KEY (`matkul_id`) REFERENCES `matkul` (`id_matkul`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

/*Data for the table `m_ujian` */

insert  into `m_ujian`(`id_ujian`,`dosen_id`,`matkul_id`,`nama_ujian`,`jumlah_soal`,`waktu`,`jenis`,`tgl_mulai`,`terlambat`,`token`) values 
(35,1,15,'Sesi I',2,2,'acak','2023-08-22 21:02:35','2023-08-31 21:02:36','LEJMH'),
(36,1,15,'Sesi II',2,50,'acak','2023-08-23 08:39:36','2023-08-31 08:39:38','JZMAJ'),
(37,1,15,'Sesi III',2,2,'acak','2023-08-23 09:24:36','2023-08-31 09:24:37','ADYPD');

/*Table structure for table `mahasiswa` */

DROP TABLE IF EXISTS `mahasiswa`;

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `nim` char(20) NOT NULL,
  `email` varchar(254) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `kelas_id` int(11) NOT NULL COMMENT 'kelas&jurusan',
  `no_peserta` varchar(10) NOT NULL,
  PRIMARY KEY (`id_mahasiswa`),
  UNIQUE KEY `nim` (`nim`),
  UNIQUE KEY `email` (`email`),
  KEY `kelas_id` (`kelas_id`),
  CONSTRAINT `mahasiswa_ibfk_2` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id_kelas`)
) ENGINE=InnoDB AUTO_INCREMENT=1157 DEFAULT CHARSET=latin1;

/*Data for the table `mahasiswa` */

insert  into `mahasiswa`(`id_mahasiswa`,`nama`,`nim`,`email`,`jenis_kelamin`,`kelas_id`,`no_peserta`) values 
(2,'AFRIDA','1301105201690001','afridaida1969@gmail.com','P',2,'MU-0054'),
(1145,'Dono','0812251221585949','doni@yahoo.com','L',1,''),
(1149,'AFRIJON','1738208999034002','afrijon@bkn.go.id','L',2,'BKN-003'),
(1150,'FEBI','5435345345345','febi@yahoo.com','L',2,'5554'),
(1151,'MASRI PRIMA DONI','089617502694','masri_prima_doni@yahoo.com','L',1,'CAT-0782'),
(1152,'RAMADANI ILHAM','081221585949','ramadaniilham@yahoo.com','L',3,'CAT-0016'),
(1153,'HUTRI ELA NARSA','082376477317','hutri_ela@yahoo.com','L',4,'CAT-0808'),
(1156,'JAKARTA','0893043943434','xave@bkn.go.id','P',2,'CAT-0552');

/*Table structure for table `matkul` */

DROP TABLE IF EXISTS `matkul`;

CREATE TABLE `matkul` (
  `id_matkul` int(11) NOT NULL AUTO_INCREMENT,
  `nama_matkul` varchar(500) NOT NULL,
  PRIMARY KEY (`id_matkul`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

/*Data for the table `matkul` */

insert  into `matkul`(`id_matkul`,`nama_matkul`) values 
(1,'Manajemen Katalog, Operasional dan Layanan TI'),
(2,'Konsep dan Implementasi Basis data, Taksonomi Data dan Data ingestion'),
(9,'Ruang lingkup, Kriteria, Tujuan, Perencanaan, Kerangka Kerja sistematis, Proses dan evaluasi Audit TI'),
(10,'Konsep, Rancangan, Implementasi, Evaluasi dan Monitoring Sistem Jaringan'),
(11,'Komponen dan Fungsi, Pengaturan akses, pemasangan, pengujian, deteksi, perbaikan, pemeliharaan serta pengembangan Infrastruktur TI'),
(12,'Konsep dasar analisis kebutuhan sitem informasi, perancangan dan implementasi sistem informasi'),
(13,'Teknik pengolahan data'),
(14,'Konsep dan Implementasi Sistem Informasi Geografis dan Multimedia'),
(15,'CAT Pranata Komputer Ahli Pertama'),
(16,'CAT Pranata Komputer Terampil');

/*Table structure for table `modul` */

DROP TABLE IF EXISTS `modul`;

CREATE TABLE `modul` (
  `id_modul` int(11) NOT NULL AUTO_INCREMENT,
  `nama_modul` varchar(50) NOT NULL,
  `isi_modul` text NOT NULL,
  PRIMARY KEY (`id_modul`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

/*Data for the table `modul` */

insert  into `modul`(`id_modul`,`nama_modul`,`isi_modul`) values 
(13,'Jaringan Komputer','Modul_PQb4pHG7hk_23082023112317.pdf');

/*Table structure for table `narasumber` */

DROP TABLE IF EXISTS `narasumber`;

CREATE TABLE `narasumber` (
  `id_narasumber` int(11) NOT NULL AUTO_INCREMENT,
  `id_kelas` int(11) NOT NULL,
  `nm_narsum` varchar(50) NOT NULL,
  `materi` text NOT NULL,
  `hari` text NOT NULL,
  `tgl` date NOT NULL,
  PRIMARY KEY (`id_narasumber`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;

/*Data for the table `narasumber` */

insert  into `narasumber`(`id_narasumber`,`id_kelas`,`nm_narsum`,`materi`,`hari`,`tgl`) values 
(9,1,'Elwiyas, S.SiT, MH','Etika Legal Dalam Pelayanan Kebidanan','Sabtu','2021-09-25'),
(10,1,'Ismarni, SKM, S.SiT','Updating Pelayanan Antenatal Terpadu','Sabtu','2021-09-25'),
(11,1,'Dr. Eravianti, S.SiT. MKM','Updating Asuhan Persalinan Normal (APN)','Sabtu','2021-09-25'),
(12,1,'dr. Moh. Alam Patria, Sp.OG','Updating Asuhan Kegawatdaruratan Maternal','Sabtu','2021-09-25'),
(13,1,'Aswiliarti, SKM. M.Biomed','Adaptasi Pelayanan Kebidanan (KIA-Kespro) dimasa Pandemi Covid-19','Minggu','2021-09-26'),
(14,1,'dr. Erly Wirdayani, Sp. A, M.Biomed','Updating Asuhan Kegawatdaruratan Neonatal','Minggu','2021-09-26'),
(15,1,'Aswiliarti, SKM, M.Biomed','Updating Asuhan Nifas dan Pelayanan Kontrasepsi','Minggu','2021-09-26'),
(16,1,'Hasnawati, SKM. MM','Perkembangan Profesi Bidan dan Kebijakan Terkini terkait Kebidanan','Jum\'at','2021-09-24'),
(17,1,'Neldawati, Amd. Keb. SE','Updating Asuhan Bayi Baru Lahir, Bayi, Balita dan anak Pra Sekolah','Sabtu','2021-09-25'),
(18,4,'Hasnawati, SKM. MM','Perkembangan Profesi Bidan Dan Kebijakan Terkini Terkait Kebidanan','Jum\'at','2022-01-21'),
(19,4,'Aswiliarti, SKM. M. Biomed','Etika Legal Dalam Pelayanan kebidanan','Sabtu','2022-01-22'),
(20,4,'Surya Zeni Leli, S. ST ','Adaptasi Pelayanan Kebidanan (KIA-Kespro) Dimasa Pandemic Covid-19','Sabtu','2022-01-22'),
(21,4,'Bay Evon Karmila, S. SiT. MM','Updating Pelayanan Antenatal Terpadu','Sabtu','2022-01-22'),
(22,4,'Desmarni, STr. Keb','Updating Asuhan Persalinan Normal (APN)','Sabtu','2022-01-22'),
(23,4,'Dr. Muhammad Alam Patria, Sp. OG','Updating Asuhan Kegawatdaruratan Maternal','Sabtu','2022-01-22'),
(24,4,'Andriyani, STr. Keb ','Updating Asuhan Bayi Baru Lahir, Bayi, Balita dan Anak Pra Sekolah','Minggu','2022-01-23'),
(25,4,'Dr. Erly Wirdayani, Sp. A. M. Biomed','Updating Asuhan Kegawatdaruratan Neonatal','Minggu','2022-01-23'),
(26,4,'Ridha Amalia Madya, S. ST','Updating Asuhan Nifas dan Pelayanan Kontrasepsi','Minggu','2022-01-23'),
(27,4,'PENGURUS PUSAT IBI','Pedoman Pendidikan Berkelanjutan Bagi Bidan/Continnuing Profesional Development (CPD)','Minggu','2022-01-23'),
(28,2,'Dr. Anton','Jaringan Komputer','Rabu','2023-08-23');

/*Table structure for table `penilaian_narsum` */

DROP TABLE IF EXISTS `penilaian_narsum`;

CREATE TABLE `penilaian_narsum` (
  `id_penilaian` int(11) NOT NULL AUTO_INCREMENT,
  `id_mahasiswa` int(11) NOT NULL,
  `id_narasumber` int(11) NOT NULL,
  `penampilan` varchar(10) NOT NULL,
  `penyampaian` varchar(10) NOT NULL,
  `penguasaan` varchar(10) NOT NULL,
  `ketepatan` varchar(10) NOT NULL,
  `saran` text NOT NULL,
  PRIMARY KEY (`id_penilaian`)
) ENGINE=InnoDB AUTO_INCREMENT=821 DEFAULT CHARSET=utf8mb4;

/*Data for the table `penilaian_narsum` */

insert  into `penilaian_narsum`(`id_penilaian`,`id_mahasiswa`,`id_narasumber`,`penampilan`,`penyampaian`,`penguasaan`,`ketepatan`,`saran`) values 
(1,27,9,'8','7','7','8','Klu bisa slide tampilan ny tdk byk tulisannya '),
(2,27,10,'7','7','7','7','Penyampaian materi dan slide dikemas lebih menarik lagi '),
(3,42,9,'8','7','8','8',''),
(4,42,10,'8','7','8','8',''),
(5,42,11,'8','8','8','8',''),
(6,27,11,'8','8','8','8','Tambah kan materi dgn kasus tentang APN'),
(7,42,12,'8','7','8','7',''),
(8,27,12,'8','7','8','8','Lebih byk tanya jawab materi utk aplikasi langsung ttg kegawadaruratan maternal'),
(9,5,11,'10','10','10','10',''),
(11,54,9,'8','8','10','10',''),
(13,54,13,'9','10','10','10','Penampilan,penyampaian materi ibu mantap bu'),
(14,55,14,'8','8','8','8','Di harapkan lebih banyak menampil video kegawatan PD neonatal dan bayi sehingga peserta lebih mengerti'),
(15,31,13,'7','7','7','8','Dalam penyampaian materi, jgn terlalu cepat'),
(16,54,10,'8','8','8','8',''),
(17,31,10,'8','8','8','8',''),
(18,50,12,'9','8','9','9','suaranya kurang jelas '),
(19,26,13,'80','80','94','80',''),
(20,42,13,'8','9','10','8','lanjutkan pelatihan MU ak 2'),
(21,50,13,'9','9','9','8',''),
(22,42,14,'8','8','8','8',''),
(23,12,15,'8','8','8','8','kalo bisa ada materi yang menggunakan gambar'),
(24,7,9,'7','7','7','7','harus dijelaskan masing-masing tentang etika tersebut'),
(25,12,12,'8','7','8','8',''),
(26,7,12,'7','7','7','6','suara kurang jelas sehingga materi yang diberikan kurang mengerti\r\n'),
(27,7,15,'9','9','9','9','cara penjelesan baik..di jelasakan satu persatu dari slid sehingga kita bisa mengerti dan jelas tentang materi yang di sampaikan '),
(28,7,10,'7','7','7','7','materi yang diberikan cukup jelas'),
(29,7,11,'8','8','8','8','tambahkan materi tentang perkembangan APN'),
(30,51,15,'9','9','9','9',''),
(31,8,13,'8','9','9','9',''),
(32,32,13,'8','8','9','9',''),
(33,27,15,'8','8','8','8','Penyampaian materi lebih baik lgi'),
(34,27,14,'8','8','9','7','Lebih dibyk an materi aplikasi kegawadaruratan neonatus ny'),
(65,335,18,'80','90','80','80',''),
(66,335,19,'80','90','80','80',''),
(67,335,20,'80','90','80','80',''),
(68,335,21,'80','90','80','80',''),
(69,335,22,'80','90','80','80',''),
(70,335,23,'80','90','90','80',''),
(71,335,24,'80','90','80','80',''),
(72,335,25,'80','90','90','80',''),
(73,335,26,'80','90','80','80',''),
(74,335,27,'80','90','80','80',''),
(75,296,18,'80','90','80','80',''),
(76,296,19,'80','90','80','68',''),
(77,296,20,'80','90','80','80',''),
(78,296,21,'80','90','80','80',''),
(79,296,22,'80','90','80','80',''),
(80,296,23,'80','90','90','80',''),
(81,296,24,'80','90','88','78',''),
(82,296,25,'78','90','90','78',''),
(83,296,26,'80','90','80','80',''),
(84,296,27,'80','90','80','80',''),
(85,329,18,'80','85','85','85','Penyampaian materi sudah bagus harap ditingkatkan lagi'),
(86,329,19,'80','95','95','90','Cara penyampaian dan penguasaan materi sangat bagus, klo bisa waktu utk penyampaian materi diperpanjang '),
(87,329,20,'80','85','85','90','Penyampaian dan penguasaan materi sudah bagus, hanya perlu ditingkatkan saja lagi'),
(88,329,21,'80','80','85','85','Penyampaian dan penguasaan materi sudah bagus, ditingkatkan saja lagi'),
(89,329,22,'80','85','85','90','Penyampaian dan penguasaan materi bagus, ditingkatkan saja lagi'),
(90,329,23,'80','85','90','90','Penyampaian dan penguasaan materi bagus '),
(91,329,24,'80','85','90','90','Penyampaian dan penguasaan materi sudah bagus, tapi klo bisa lebih rileks'),
(92,329,25,'80','95','95','90','Penguasaan dan penyampaian materi sangat bagus, tapi kalo dapat agak santai'),
(93,329,26,'80','85','85','85','Penyampaian dan penguasaan materi sudah bagus, tapi mungkin keterbatasan waktu jdi kesannya kemaren agak tergesa-gesa'),
(94,329,27,'80','95','95','90','Penyampaian dan penguasaan materi sangat bagus, waktu kalo bisa diperpanjang'),
(145,321,18,'','80','80','80',''),
(146,321,19,'','90','90','90',''),
(147,321,20,'','85','85','85',''),
(148,321,21,'','80','80','80',''),
(149,321,22,'','80','80','80',''),
(150,321,23,'','90','90','90',''),
(151,321,24,'','90','90','90',''),
(152,321,25,'','80','80','80',''),
(153,321,26,'','85','85','85',''),
(154,321,27,'','90','90','90',''),
(165,318,18,'','75','75','75','Smg lebih baik lagi'),
(166,318,19,'','80','80','80','Menari'),
(167,318,20,'','80','80','80','Smg kbh ditingkatkan lgi'),
(168,318,21,'','80','80','80','Menarik dan sangat jelas'),
(169,318,22,'','70','75','75','Semg lbh dtignktn lagi'),
(170,318,23,'','75','75','75','Lebih diperjelas '),
(171,318,24,'','75','45','75','Lebhbdioerjelas'),
(172,318,25,'','80','80','80','Smg ttap diperthankn'),
(173,318,26,'','80','80','80','Lebih baiknalgi'),
(174,318,27,'','85','85','85','Smg lbh baik kedepannya'),
(195,291,18,'99','99','99','99',''),
(196,291,19,'99','99','99','99',''),
(197,291,20,'99','99','99','99',''),
(198,291,21,'99','90','90','99',''),
(199,291,22,'99','95','95','99',''),
(200,291,23,'99','80','95','99',''),
(201,291,24,'99','80','80','80',''),
(202,291,25,'99','99','99','99',''),
(203,291,26,'99','80','80','99',''),
(204,291,27,'99','99','99','99',''),
(205,328,18,'90','90','90','60','Tidak ada saran'),
(206,328,19,'99','99','99','70','Tidak ada saran karna sudah baik semua'),
(207,328,20,'90','90','90','60','Tidak ada saran'),
(208,328,21,'90','90','90','80','Tidak ada saran'),
(209,328,22,'90','90','90','60','Tidak ada saran'),
(210,328,23,'90','75','90','60','Slide nya di di modifikasi sedemikian ruap biar lebih tertarik saat membaca waktu zoom dan sebaiknya ada contoh videonya.'),
(211,328,24,'90','90','90','60','Tidak ada saran karna sudah baik semua'),
(212,328,25,'90','99','99','70','No comment, because perfect.'),
(213,328,26,'90','90','90','70','Penyampaian materi sebaiknya diiringi dg contoh kasus yg ada di lapangan.'),
(214,328,27,'99','99','99','75','Perfect'),
(215,322,18,'80','85','80','80',''),
(216,322,19,'85','90','90','85','Mohon diperpanjang waktu untuk penjelasan CPD nya buk'),
(217,322,20,'80','85','80','80',''),
(218,322,21,'75','75','75','75',''),
(219,322,22,'75','70','70','70',''),
(220,322,23,'75','75','75','75',''),
(221,322,24,'75','80','80','80',''),
(222,322,25,'85','90','90','90',''),
(223,322,26,'75','70','70','70',''),
(224,322,27,'85','85','90','90',''),
(225,307,18,'86','80','98','98',''),
(226,307,19,'98','98','98','98',''),
(227,307,20,'86','86','98','98',''),
(228,307,21,'96','96','98','98',''),
(229,307,22,'86','96','98','98',''),
(230,307,23,'82','90','98','80',''),
(231,307,24,'90','90','98','98',''),
(232,307,25,'98','98','98','98',''),
(233,307,26,'96','96','98','98',''),
(234,307,27,'98','98','98','99',''),
(235,304,18,'90','90','90','90','Mantap'),
(236,304,19,'90','90','90','90','Mantap'),
(237,304,20,'90','90','90','90','Mantap'),
(238,304,21,'90','90','90','90','Mantap'),
(239,304,22,'90','90','90','90','Mantap'),
(240,304,23,'90','90','90','90','Mantap'),
(241,304,24,'90','90','90','90','Mantap'),
(242,304,25,'90','90','90','90','Mantap'),
(243,304,26,'90','90','90','90','Mantap'),
(244,304,27,'90','90','90','90','Mantap'),
(245,308,18,'85','85','85','85','Mantap'),
(246,308,19,'90','90','90','90','Mantap'),
(247,308,20,'90','85','90','85','Mantap'),
(248,308,21,'90','90','90','90','Mantap'),
(249,308,22,'90','85','85','85','Mamtap'),
(250,308,23,'90','90','90','90','Mantap'),
(251,308,24,'90','90','90','90','Mantap'),
(252,308,25,'90','90','90','85','Mantap'),
(253,308,26,'85','85','85','85','Mantap'),
(254,308,27,'90','90','90','90','Matap'),
(255,332,18,'90','90','90','90','Ttp prthankn buk..trmksh atas ilmu yg telah dbrikan....\r\n'),
(256,332,19,'90','90','90','90','Penyampaian mudah dimengerti..ttp prthhnkn buk..trimksh Ats ilmunya'),
(257,332,20,'90','90','90','90','Penyampaian materi mudah dmngrti..ttp smngat buk..trmaksh Ats ilmunya buk'),
(258,332,21,'90','90','90','90','Sekali\" dlm pnyampain materi bikin lelucon buk biar ngk pada ngantuk dan tegang'),
(259,332,22,'90','90','90','90','Penyampaian materi mudah dmngerti..trmksih atas ilmunya buk..banyakin senyum buk'),
(260,332,23,'80','80','80','80','Penyampaian materinya terlalu cepat pak...'),
(261,332,24,'90','90','90','90','Ttp pprthankn buk..jangan lupa slalu tersnyu..'),
(262,332,25,'90','90','90','90','Ngk ada saran buk...semuanya ok'),
(263,332,26,'90','90','90','90','Penyampaian materi trlalu CPT buk...bnyakin senyum ea buk'),
(264,332,27,'90','90','90','90','Seskli trtwa brsma buk biar ngk terlalu tegang dan ngantuk saat live'),
(265,317,18,'99','99','99','99','terimakasih dan sangat bermanfaat'),
(266,317,19,'99','99','99','99','terimakasih dan sangat bermanfaat'),
(267,317,20,'99','99','99','99','terimakasih dan sangat bermanfaat'),
(268,317,21,'99','99','99','99','terimakasih dan sangat bermanfaat'),
(269,317,22,'99','99','99','99','terimakasih dan sangat bermanfaat'),
(270,317,23,'99','99','99','99','terimakasih dan sangat bermanfaat'),
(271,317,24,'99','99','99','99','terimakasih dan sangat bermanfaat'),
(272,317,25,'99','99','99','99','terimakasih dan sangat bermanfaat'),
(273,317,26,'99','99','99','99','terimakasih dan sangat bermanfaat'),
(274,317,27,'99','99','99','99','terimakasih dan sangat bermanfaat'),
(275,327,18,'85','85','85','85',''),
(276,327,19,'85','85','90','85',''),
(277,327,20,'80','85','85','85',''),
(278,327,21,'80','80','80','80',''),
(279,327,22,'85','85','80','85',''),
(280,327,23,'80','80','80','80',''),
(281,327,24,'80','85','80','85',''),
(282,327,25,'85','90','90','85',''),
(283,327,26,'80','80','80','80',''),
(284,327,27,'85','90','85','90',''),
(285,290,18,'85','85','85','90','Tlg diperbanyak bahan modulny'),
(286,290,19,'90','90','90','90','Tolong diperbanyak bahan modul'),
(287,290,20,'85','80','85','80','Tolong diperbanyak modul pelatihan'),
(288,290,21,'85','85','85','85','Tolong diperbanyak modul'),
(289,290,22,'85','85','85','85','Tolong diperbanyak modul'),
(290,290,23,'85','85','90','85','Tolong diperbanyak modul'),
(291,290,24,'85','85','85','85','Tolong diperbanyak modul'),
(292,290,25,'85','90','90','85','Tolong diperbanyak modul'),
(293,290,26,'85','80','80','85','Tolong diperbanyak modul'),
(294,290,27,'90','90','90','90','Tolong diperbanyak modul'),
(295,338,18,'80','80','80','80',''),
(296,338,19,'80','80','80','80',''),
(297,338,20,'80','80','80','80',''),
(298,338,21,'80','80','80','80',''),
(299,338,22,'80','80','80','80',''),
(300,338,23,'80','80','80','80',''),
(301,338,24,'80','80','80','80',''),
(302,338,25,'80','80','80','85',''),
(303,338,26,'80','80','80','80',''),
(304,338,27,'80','80','90','90',''),
(305,330,18,'80','90','85','85','Terimakasih bu atas ilmu dan informasinya yang diberikan dan sangat bermaanfaat '),
(306,330,19,'80','95','90','85','Terimakasih bu atas ilmu dan informasinya yang diberikan dan sangat bermaanfaat '),
(307,330,20,'80','90','85','85','Terimakasih bu atas ilmu dan informasinya yang diberikan dan sangat bermaanfaat '),
(308,330,21,'80','90','85','85','Terimakasih bu atas ilmu dan informasinya yang diberikan dan sangat bermaanfaat '),
(309,330,22,'80','90','85','85','Terimakasih bu atas ilmu dan informasinya yang diberikan dan sangat bermaanfaat '),
(310,330,23,'80','85','80','85','Terimakasih pak atas ilmu dan informasinya yang diberikan dan sangat bermaanfaat '),
(311,330,24,'80','85','80','85','Terimakasih bu atas ilmu dan informasinya yang diberikan dan sangat bermaanfaat '),
(312,330,25,'80','90','85','90','Terimakasih bu atas ilmu dan informasinya yang diberikan dan sangat bermaanfaat '),
(313,330,26,'80','85','80','85','Terimakasih bu atas ilmu dan informasinya yang diberikan dan sangat bermaanfaat '),
(314,330,27,'80','95','90','85','Terimakasih sudah membantu pak dan ibuk atas kelancaran acara'),
(315,287,18,'99','99','99','98','tidak ada saran buk,cuma sedikit harapan kalau ada pelatihan selanjutnya kita dapat bertatap muka supaya apa yg diberikan semakin jelas tidak terganggu oleh jaringan,semoga pandemi ini cepat berlalu,amin,terimakasih telah berbagi ilmunya buk.'),
(316,287,19,'99','99','99','99','tidak ada saran buk,cuma sedikit harapan kalau ada pelatihan selanjutnya kita dapat bertatap muka supaya apa yg diberikan semakin jelas tidak terganggu oleh jaringan,semoga pandemi ini cepat berlalu,amin,terimakasih telah berbagi ilmunya buk.'),
(317,287,20,'99','99','99','99','tidak ada saran buk,cuma sedikit harapan kalau ada pelatihan selanjutnya kita dapat bertatap muka supaya apa yg diberikan semakin jelas tidak terganggu oleh jaringan,semoga pandemi ini cepat berlalu,amin,terimakasih telah berbagi ilmunya buk.'),
(318,287,21,'99','99','99','99','tidak ada saran buk,cuma sedikit harapan kalau ada pelatihan selanjutnya kita dapat bertatap muka supaya apa yg diberikan semakin jelas tidak terganggu oleh jaringan,semoga pandemi ini cepat berlalu,amin,terimakasih telah berbagi ilmunya buk.'),
(319,287,22,'99','99','99','99','tidak ada saran buk,cuma sedikit harapan kalau ada pelatihan selanjutnya kita dapat bertatap muka supaya apa yg diberikan semakin jelas tidak terganggu oleh jaringan,semoga pandemi ini cepat berlalu,amin,terimakasih telah berbagi ilmunya buk.'),
(320,287,23,'99','99','99','96','tidak ada saran buk,cuma sedikit harapan kalau ada pelatihan selanjutnya kita dapat bertatap muka supaya apa yg diberikan semakin jelas tidak terganggu oleh jaringan,semoga pandemi ini cepat berlalu,amin,terimakasih telah berbagi ilmunya buk.'),
(321,287,24,'99','99','99','99','tidak ada saran buk,cuma sedikit harapan kalau ada pelatihan selanjutnya kita dapat bertatap muka supaya apa yg diberikan semakin jelas tidak terganggu oleh jaringan,semoga pandemi ini cepat berlalu,amin,terimakasih telah berbagi ilmunya buk.'),
(322,287,25,'99','99','99','94','tidak ada saran buk,cuma sedikit harapan kalau ada pelatihan selanjutnya kita dapat bertatap muka supaya apa yg diberikan semakin jelas tidak terganggu oleh jaringan,semoga pandemi ini cepat berlalu,amin,terimakasih telah berbagi ilmunya buk.'),
(323,287,26,'98','98','99','99','tidak ada saran buk,cuma sedikit harapan kalau ada pelatihan selanjutnya kita dapat bertatap muka supaya apa yg diberikan semakin jelas tidak terganggu oleh jaringan,semoga pandemi ini cepat berlalu,amin,terimakasih telah berbagi ilmunya buk.'),
(324,287,27,'99','99','99','99','tidak ada saran buk,,besar harapan kami yg belum mempunyai KTA semoga cepat diproses buk,,terima kasih telah membimbing kami,,maaf atas kelalaian kami buk.'),
(325,298,18,'98','98','98','98',''),
(326,298,19,'98','98','98','98',''),
(327,298,20,'98','98','98','98',''),
(328,298,21,'98','98','98','98',''),
(329,298,22,'98','98','98','98',''),
(330,298,23,'98','98','98','98',''),
(331,298,24,'98','98','98','98',''),
(332,298,25,'98','98','98','98',''),
(333,298,26,'98','98','98','98',''),
(334,298,27,'98','98','98','98','mohon klo ada kendala dalam perpanjangan STR tlog di bantu ya buk?'),
(335,297,18,'90','80','80','85','Mungkin karna signal kurang bagus jadinya pas penyampaian materi jadi terputus '),
(336,297,19,'80','80','80','80','Belajar nya agak sedikit tegang dan kurang rileks '),
(337,297,20,'90','85','80','80','Agak tegang dan kurang rileks'),
(338,297,21,'80','85','80','85','Terlalu cepat saat pemberian materinya dan sedikit agak tegang '),
(339,297,22,'80','80','80','85','Ibunya mudah senyum tapi saat pemberian materi signal kurang bersahabat sehingga materinya kurang nyampe '),
(340,297,23,'80','80','80','80','Sound nya kurang jelas, mungkin di lain waktu bisa lebih di cek lagi. Dan persiapan materinya juga agak sempat ada kendala '),
(341,297,24,'80','80','80','80','Pada saat pemberian materi agak sedikit tegang dan kurang rileks'),
(342,297,25,'90','85','80','80','Pada saat pemberian materi agak sedikit tegang dan kurang rileks '),
(343,297,26,'80','80','85','80','Pada saat pemberian materi agak sedikit tegang dan kurang rileks'),
(344,297,27,'90','80','85','80','Semoga kita bisa tetap kompak dan di siplin, semakin sukses dalam menjalankan amanah'),
(345,293,18,'85','80','85','80','Baik sekali'),
(346,293,19,'85','80','85','80','Baik sekali'),
(347,293,20,'85','80','85','80','Baik sekali'),
(348,293,21,'85','80','85','80','Baik sekali'),
(349,293,22,'85','80','85','80','Baik sekali'),
(350,293,23,'85','80','85','80','Baik sekali'),
(351,293,24,'85','80','85','80','Baik sekali'),
(352,293,25,'85','80','85','80','Baik sekali'),
(353,293,26,'85','80','85','80','Baik sekali'),
(354,293,27,'85','85','85','85','Baik sekali'),
(355,339,18,'90','90','90','90','SANGAT BAIK'),
(356,339,19,'85','90','90','90','SANGAT BAIK'),
(357,339,20,'90','90','90','90','SANGAT BAIK'),
(358,339,21,'90','90','90','90','SANGAT BAIK'),
(359,339,22,'90','90','90','90','SANGAT BAIK'),
(360,339,23,'90','90','90','90','SANGAT BAIK'),
(361,339,24,'90','90','90','90','SANGAT BAIK'),
(362,339,25,'90','90','90','90','SANGAT BAIK'),
(363,339,26,'90','90','90','90','SANGAT BAIK'),
(364,339,27,'90','90','90','90','SANGAT BAIK'),
(365,314,18,'90','90','90','90',''),
(366,314,19,'90','90','90','90',''),
(367,314,20,'90','90','90','90',''),
(368,314,21,'90','90','90','90',''),
(369,314,22,'90','90','90','90',''),
(370,314,23,'90','90','90','90',''),
(371,314,24,'90','90','90','90',''),
(372,314,25,'90','90','90','90',''),
(373,314,26,'90','90','90','90',''),
(374,314,27,'90','90','90','90',''),
(385,320,18,'99','99','99','99','tampila materinya sangat menarik dan sangat bagus sekali..'),
(386,320,19,'99','99','99','99','tampila materinya sangat menarik dan sangat bagus sekali..'),
(387,320,20,'99','99','99','99','tampila materinya sangat menarik dan sangat bagus sekali..'),
(388,320,21,'99','99','99','99','tampila materinya sangat menarik dan sangat bagus sekali..'),
(389,320,22,'99','99','99','99','tampila materinya sangat menarik dan sangat bagus sekali..'),
(390,320,23,'99','99','99','99','tampila materinya sangat menarik dan sangat bagus sekali..'),
(391,320,24,'99','99','99','99','tampila materinya sangat menarik dan sangat bagus sekali..'),
(392,320,25,'99','99','99','99','tampila materinya sangat menarik dan sangat bagus sekali..'),
(393,320,26,'99','99','99','99','tampila materinya sangat menarik dan sangat bagus sekali..'),
(394,320,27,'99','99','99','99','tampila materinya sangat menarik dan sangat bagus sekali..'),
(395,300,18,'99','99','99','99','materinya bagus sekali semoga dan dapat di pahami'),
(396,300,19,'99','99','99','99','materinya bagus sekali semoga dan dapat di pahami'),
(397,300,20,'99','99','99','99','materinya bagus sekali semoga dan dapat di pahami'),
(398,300,21,'99','99','99','99','materinya bagus sekali semoga dan dapat di pahami'),
(399,300,22,'99','99','99','99','materinya bagus sekali semoga dan dapat di pahami'),
(400,300,23,'99','99','99','99','materinya bagus sekali semoga dan dapat di pahami'),
(401,300,24,'99','99','99','99','materinya bagus sekali semoga dan dapat di pahami'),
(402,300,25,'99','99','99','99','materinya bagus sekali semoga dan dapat di pahami'),
(403,300,26,'99','99','99','99','materinya bagus sekali semoga dan dapat di pahami'),
(404,300,27,'99','99','99','99','materinya bagus sekali semoga dan dapat di pahami'),
(405,289,18,'99','99','99','99','penyampaian materinya bagus '),
(406,289,19,'99','99','99','99','penyampaian materinya bagus '),
(407,289,20,'99','99','99','99','penyampaian materinya bagus '),
(408,289,21,'99','99','99','99','penyampaian materinya bagus '),
(409,289,22,'99','99','99','99','penyampaian materinya bagus '),
(410,289,23,'99','99','99','99','penyampaian materinya bagus '),
(411,289,24,'99','99','99','99','penyampaian materinya bagus '),
(412,289,25,'99','99','99','99','penyampaian materinya bagus '),
(413,289,26,'99','99','99','99','penyampaian materinya bagus '),
(414,289,27,'99','99','99','99','penyampaian materinya bagus '),
(435,337,18,'70','80','80','90','Mteri sngat bagus,dn cara penyampaian jg baik,,smga lbih sukses lgi ibu'),
(436,337,19,'80','80','80','80','Bgus dlm pmberian materi,,smga mnjdi kompeten lgi k dpanya'),
(437,337,20,'70','70','85','85','Smga lebih sukses lagi ibu,penyampaian materinya jg baik'),
(438,337,21,'80','76','87','88','Kompeten dlm pnyapaian materi,,sukses trus ibu'),
(439,337,22,'80','75','79','80','Bagus,,dn baik dlm memberikan materi'),
(440,337,23,'78','76','89','88','Materi bagus TPI pnympaian agak putus2.\r\n'),
(441,337,24,'85','70','84','85','Smga lbih baik lagi ibu'),
(442,337,25,'80','89','89','88','Kompeten dlm pnympaian materi,,dn materi bgus'),
(443,337,26,'86','87','88','90','Bgu,baik,jls dlm pnympaian materi smga lbih baik lagi ibu'),
(444,337,27,'80','90','92','95','Cepat di mngerti materi yg di smpaikan,,'),
(445,316,18,'90','90','85','95','Semoga MU berikutnya bisa tatap muka '),
(446,316,19,'90','90','90','90',''),
(447,316,20,'95','95','95','95',''),
(448,316,21,'95','95','95','95',''),
(449,316,22,'95','90','90','95',''),
(450,316,23,'85','85','85','80',''),
(451,316,24,'85','85','80','90',''),
(452,316,25,'90','90','90','80',''),
(453,316,26,'85','90','90','90',''),
(454,316,27,'90','90','90','90',''),
(472,295,18,'90','90','90','90','Terima Kasih atas ilmunya Bu. Sangat bermanfaat'),
(473,295,19,'90','90','90','90','Terima kasih atas ilmunya bu. Sangat bermanfaat dan menambah wawasan.'),
(474,295,20,'90','90','90','90','Terima kasih ilmunya bu. Sangat bermanfaat'),
(475,295,21,'90','90','90','90','Terima kasih ilmunya bu. Sangat bermanfaat.'),
(476,295,22,'90','90','90','90','Terima kasih ilmunya bu. Sangat bermanfaat'),
(477,295,23,'90','90','90','90','Terima kasih ilmunya pak. Sngat bermanfaat'),
(478,295,24,'90','90','90','90','Terima kasih ilmunya bu. Sangat bermanfaat'),
(479,295,25,'90','90','90','90','Terima kasih ilmunya bu. Sngat sangat bermanfaat dan penuh pencerahan'),
(480,295,26,'90','90','90','90','Terima kasih ilmunya ni. Sngat bermanfaat'),
(481,295,27,'90','90','90','90','Terima kasih ilmunya bu\r\n'),
(482,285,18,'95','95','95','95','sangat baik.'),
(483,285,19,'99','99','99','99','banyak hal dan pengetahuan baru,krn pemateri sudah kepakarnya.keren dan terus dilanjutkan'),
(484,285,20,'99','99','99','99','menambah wawasan dan pencerahan dalam materi ini, semoga durasi tanya jawabnya lebih panjang ya bu'),
(485,285,21,'99','99','99','99','sangat baik'),
(486,285,22,'99','99','99','99','sangat baik,pematerinya sangat luar biasa dalam menyampaikannya..'),
(487,285,23,'99','90','90','80','sangat baik, tapi lebih baik jikalau tepat waktu.krn byk yg ingin ditanyakan pak'),
(488,285,24,'90','99','98','99','sangat baik dan bernanfaat'),
(489,285,25,'99','99','95','80','sangat bermanfaat.'),
(490,285,26,'95','80','98','85','materinya bagus,hnya saja terkendala waktu yang mepet'),
(491,285,27,'99','98','99','99','sangat baik'),
(492,288,18,'95','95','95','95','-'),
(493,288,19,'95','95','95','95','-'),
(494,288,20,'95','95','95','95','-'),
(495,288,21,'95','95','95','95','-'),
(496,288,22,'95','95','95','95','-'),
(497,288,23,'95','95','95','95','-'),
(498,288,24,'95','95','95','95','-'),
(499,288,25,'95','95','95','95','-'),
(500,288,26,'95','95','95','95','-'),
(501,288,27,'95','95','95','95','-'),
(502,305,18,'95','95','95','95',''),
(503,305,19,'95','95','95','95',''),
(504,305,20,'95','95','95','95',''),
(505,305,21,'95','95','95','95',''),
(506,305,22,'95','95','95','95',''),
(507,305,23,'95','95','95','95',''),
(508,305,24,'95','95','95','95',''),
(509,305,25,'95','95','95','95',''),
(510,305,26,'95','95','95','95',''),
(511,305,27,'95','95','95','95',''),
(512,284,18,'90','90','90','90','sudah bagus'),
(513,284,19,'90','90','90','90','sudah bagus'),
(514,284,20,'90','90','90','90','sudah bagus'),
(515,284,21,'90','90','90','90','sudah bagus'),
(516,284,22,'90','85','90','90','sudah bagus'),
(517,284,23,'90','90','90','90','sudah bagus'),
(518,284,24,'90','90','90','90','sudah bagus'),
(519,284,25,'90','90','90','90','sudah bagus'),
(520,284,26,'90','90','90','90','sudah bagus'),
(521,284,27,'90','90','90','90','sudah bagus'),
(522,301,18,'95','93','95','90','Sangat bermanfaat\r\n'),
(523,301,19,'95','95','95','93','Sangat bermanfaat '),
(524,301,20,'95','93','90','90','Sangat bermanfaat'),
(525,301,21,'95','90','93','90','Sangat bermanfaat'),
(526,301,22,'90','90','93','90','Sangat bermanfaat'),
(527,301,23,'90','90','90','85','Sangat bermanfaat'),
(528,301,24,'90','90','90','90','Sangat bermanfaat'),
(529,301,25,'95','93','95','90','Sangat bermanfaat'),
(530,301,26,'90','88','90','89','Sangat bermanfaat'),
(531,301,27,'93','95','95','90','Sangat bermanfaat'),
(532,137,9,'92','93','93','94','Penyampaian yang luar biasa'),
(533,137,10,'96','95','95','95','Luar biasa'),
(534,137,11,'97','97','97','96','Terima kasih ilmu nya ibuk'),
(535,137,12,'98','98','98','98','Semangat terus pak'),
(536,137,13,'94','94','94','94','Luar biasa'),
(537,137,14,'98','98','98','98','Menyenangkan'),
(538,137,15,'94','94','95','96','Semangat terus ibuk'),
(539,137,16,'95','95','95','95','Luar biasa'),
(540,137,17,'92','92','93','93','Penyampaian yang luar biasa'),
(541,340,18,'85','85','85','85','Bagus'),
(542,340,19,'90','90','90','90','Bagus'),
(543,340,20,'85','85','85','85','Bagus'),
(544,340,21,'85','85','85','85',''),
(545,340,22,'85','85','85','85',''),
(546,340,23,'85','85','85','85',''),
(547,340,24,'85','85','85','85',''),
(548,340,25,'80','90','90','85',''),
(549,340,26,'85','85','85','85',''),
(550,340,27,'90','90','90','90',''),
(551,310,18,'90','90','90','90',''),
(552,310,19,'90','90','90','90',''),
(553,310,20,'90','90','90','90',''),
(554,310,21,'90','90','90','90',''),
(555,310,22,'90','90','90','90',''),
(556,310,23,'90','90','90','90',''),
(557,310,24,'90','90','90','90',''),
(558,310,25,'90','90','90','90',''),
(559,310,26,'90','90','90','90','ok'),
(560,310,27,'90','90','90','90','Ok'),
(561,282,18,'85','80','80','85',''),
(562,282,19,'85','85','85','85',''),
(563,282,20,'90','95','90','90',''),
(564,282,21,'90','90','85','90',''),
(565,282,22,'90','90','90','90',''),
(566,282,23,'80','80','85','75',''),
(567,282,24,'85','80','85','85',''),
(568,282,25,'85','90','85','80',''),
(569,282,26,'85','85','80','90',''),
(570,282,27,'90','90','85','85',''),
(571,323,18,'99','99','90','90',''),
(572,323,19,'99','99','99','90',''),
(573,323,20,'99','99','99','99',''),
(574,323,21,'99','99','99','99',''),
(575,323,22,'90','99','99','99',''),
(576,323,23,'99','99','99','90',''),
(577,323,24,'99','99','99','99',''),
(578,323,25,'99','99','99','99',''),
(579,323,26,'99','99','99','99',''),
(580,323,27,'99','99','99','99',''),
(581,325,18,'94','93','95','96',''),
(582,325,19,'95','92','94','95',''),
(583,325,20,'96','94','96','94',''),
(584,325,21,'97','95','95','96',''),
(585,325,22,'96','97','95','97',''),
(586,325,23,'96','94','98','96',''),
(587,325,24,'97','96','96','96',''),
(588,325,25,'98','99','99','95',''),
(589,325,26,'93','90','96','94',''),
(590,325,27,'94','94','97','96',''),
(591,313,18,'93','95','94','94',''),
(592,313,19,'91','94','95','92',''),
(593,313,20,'95','95','94','92',''),
(594,313,21,'97','93','96','97',''),
(595,313,22,'95','96','94','90',''),
(596,313,23,'96','96','97','95',''),
(597,313,24,'96','95','98','97',''),
(598,313,25,'99','99','99','99',''),
(599,313,26,'97','97','95','97',''),
(600,313,27,'96','97','97','95',''),
(601,312,18,'99','99','99','99','mengispirasi.menambah wawasan.semoga kedepannya diadakan lagi kegiatan yang baik seperti ini.terima kasih'),
(602,312,19,'99','99','99','99','penyampaian materi yang sangat responsif dan baik.\r\nsemoga kedepannya waktu untuk sesi tanya jawab ditambah lagi.terima kasih'),
(603,312,20,'99','99','99','99','penyampaian materi sangat baik dan jelas'),
(604,312,21,'99','99','99','99','penyampaian materi sangat baik dan jelas'),
(605,312,22,'99','99','99','99','penyampaian materi sangat baik dan jelas'),
(606,312,23,'99','99','99','99','ilmu yang bermanfaat.padat dan jelas'),
(607,312,24,'99','99','99','99','penyampaian sangat baik dan jelas'),
(608,312,25,'99','99','99','99','cukup menambah wawasan. semoga kedepannya ada penambahan narasumber'),
(609,312,26,'99','99','99','99','penyampaian sangat baik dan jelas'),
(610,312,27,'99','99','99','99','terimakasih banyak untuk panitia.\r\nsemoga tetap lanjut dengan materi bermutu lainnya\r\nsalam sukses selalu untuk panitia\r\n\r\n'),
(611,299,18,'85','85','85','85',''),
(612,299,19,'85','85','85','85',''),
(613,299,20,'85','85','85','85',''),
(614,299,21,'85','85','85','85',''),
(615,299,22,'85','85','85','85',''),
(616,299,23,'85','85','85','85',''),
(617,299,24,'85','85','85','85',''),
(618,299,25,'85','85','85','85',''),
(619,299,26,'85','85','85','85',''),
(620,299,27,'85','85','85','85',''),
(621,302,18,'92','90','90','90','alangkah baiknya ilmu yang ibu sampaikan secara  singkat dan jelas dalam menyampai materi per slide.terimakasih buk'),
(622,302,19,'92','90','90','90','alangkah baiknya ilmu yang ibu samapai secara singkat dan rinci pernah slide yang ibu tampilkan'),
(623,302,20,'92','90','90','90','sebaikanya dlm penyampaian materi tidak telalu fokos dlm power point sehingga kami   ngantuk .. maaf uni'),
(624,302,21,'92','90','90','90','jangan terlalu fokus dlm penyampaian materi ibuk kalau bisa bawa santai agar situasi tidak telalu tegang sehingga kami \r\ntidAk terasa bosan'),
(625,302,22,'92','90','90','90','penyampain materi cukup baik tapi bawa santai ya buk agr kami tidak mengantuk'),
(626,302,23,'92','90','90','90','sebaiknya dalam menyampaikan materi tidak semua  power point di baca pak. jelaskan scr rinci dan tepat agar waktu tidak terlalu molor. '),
(627,302,24,'92','90','90','90','alangkah baiknya penyampai materi di persngkat agar kami bisa lebih memahami'),
(628,302,25,'92','90','90','90','sebaiknya penyampaian materi di persingkat dan jelas agar waktunya cukup ibuk'),
(629,302,26,'92','90','90','90','materi yang dijelaskan kan cukup baik alangkah baiknya di jelaskan secara rinci dan singkat buk'),
(630,302,27,'92','90','90','90','alangkah baiknya menjelaskan lebih rinci agar kami lebih mengerti ibuk'),
(631,326,18,'80','80','80','80',''),
(632,326,19,'95','95','95','95',''),
(633,326,20,'95','95','95','95',''),
(634,326,21,'95','95','95','95',''),
(635,326,22,'95','95','95','95',''),
(636,326,23,'95','95','95','95',''),
(637,326,24,'95','95','95','95',''),
(638,326,25,'95','95','95','95',''),
(639,326,26,'85','85','85','85',''),
(640,326,27,'95','95','95','95',''),
(641,319,18,'80','80','80','80',''),
(642,319,19,'80','80','80','80',''),
(643,319,20,'85','80','80','80',''),
(644,319,21,'80','80','80','80',''),
(645,319,22,'85','85','85','85',''),
(646,319,23,'80','80','80','75',''),
(647,319,24,'80','80','80','80',''),
(648,319,25,'85','85','85','80',''),
(649,319,26,'80','80','80','80',''),
(650,319,27,'80','80','80','80',''),
(651,319,18,'80','80','80','80',''),
(652,319,19,'80','80','80','80',''),
(653,319,20,'85','80','80','80',''),
(654,319,21,'80','80','80','80',''),
(655,319,22,'85','85','85','85',''),
(656,319,23,'80','80','80','75',''),
(657,319,24,'80','80','80','80',''),
(658,319,25,'85','85','85','80',''),
(659,319,26,'80','80','80','80',''),
(660,319,27,'80','80','80','80',''),
(661,303,18,'99','99','99','99','Sangat baik'),
(662,303,19,'99','99','99','99','Sangat baik'),
(663,303,20,'99','99','99','99','Sangat baik'),
(664,303,21,'99','99','99','99','Sangat baik'),
(665,303,22,'99','99','99','99','Sangat baik'),
(666,303,23,'99','99','99','99','Sangat baik'),
(667,303,24,'99','99','99','99','Sangat baik'),
(668,303,25,'99','99','99','99','Sangat baik'),
(669,303,26,'99','99','99','99','Sangat baik'),
(670,303,27,'99','99','99','99','Sangat baik'),
(671,292,18,'95','95','95','95','penjelasan yang ibuk berikan sangat jelas dan mudah di mengerti.'),
(672,292,19,'95','95','95','95','penjelasan yang ibuk berikan sangat jelas dan mudah di mengerti. mengerti dengan apa yg harus di lakukan dan tidak boleh di lakukan oleh seorang bidan, dan berkat penjelasan ibuk, saya ingat lagi tentang uu praktik bidan.'),
(673,292,20,'95','95','95','95','penjelasan yang ibuk berikan sangat jelas dan mudah di mengerti.'),
(674,292,21,'95','95','95','95','penjelasan yang ibuk berikan sangat jelas dan mudah di mengerti.'),
(675,292,22,'95','95','95','95','penjelasan yang ibuk berikan sangat jelas dan mudah di mengerti.alhamdulillah update lagi ilmu saya'),
(676,292,23,'95','94','95','95','penjelasan yang ibuk berikan sangat jelas dan mudah di mengerti.'),
(677,292,24,'95','95','95','95','penjelasan yang ibuk berikan sangat jelas dan mudah di mengerti.'),
(678,292,25,'95','95','95','95','penjelasan yang ibuk berikan sangat jelas dan mudah di mengerti. dan terimah kasih ibuk berkat penjelasan ibuk saya dapat update kegawatan neonatal.'),
(679,292,26,'95','95','95','95','penjelasan yang ibuk berikan sangat jelas dan mudah di mengerti. dan saya juga dapat update tentang asuhan nifas dan pelayanan kb terbaru.'),
(680,292,27,'95','95','95','95','berkat penjelasan tentang cpd, saya jadi mengerti tentang pedoman pendidikan berkelanjutan bagi bidan.'),
(681,324,18,'96','96','95','96',''),
(682,324,19,'95','95','95','95',''),
(683,324,20,'94','94','94','95',''),
(684,324,21,'95','95','95','95',''),
(685,324,22,'95','95','95','95',''),
(686,324,23,'95','95','95','96',''),
(687,324,24,'95','95','95','94',''),
(688,324,25,'95','95','95','94',''),
(689,324,26,'95','95','95','95',''),
(690,324,27,'96','96','96','96',''),
(691,343,18,'95','95','95','95',''),
(692,343,19,'90','90','90','90',''),
(693,343,20,'80','80','80','80',''),
(694,343,21,'80','80','80','80',''),
(695,343,22,'80','80','80','80',''),
(696,343,23,'87','87','87','87',''),
(697,343,24,'85','85','85','85',''),
(698,343,25,'90','90','90','90',''),
(699,343,26,'80','80','80','80',''),
(700,343,27,'95','95','95','95',''),
(701,334,18,'98','95','97','99','penyajian nya bagus,mudah di mengerti dan saya sangat puas dengan apa yg ibuk sampaikan,,terimakasih telah berbagi ilmu dg kami.'),
(702,334,19,'98','98','99','97','penyajian nya bagus,mudah di mengerti dan saya sangat puas dengan apa yg ibuk sampaikan,,terimakasih telah berbagi ilmu dg kami.'),
(703,334,20,'98','99','99','98','penyajian nya bagus,mudah di mengerti dan saya sangat puas dengan apa yg ibuk sampaikan,,terimakasih telah berbagi ilmu dg kami.'),
(704,334,21,'99','98','99','97','penyajian nya bagus,mudah di mengerti dan saya sangat puas dengan apa yg ibuk sampaikan,,terimakasih telah berbagi ilmu dg kami.'),
(705,334,22,'98','96','99','96','penyajian nya bagus,mudah di mengerti dan saya sangat puas dengan apa yg ibuk sampaikan,,terimakasih telah berbagi ilmu dg kami.'),
(706,334,23,'97','98','99','96','penyajian nya bagus,mudah di mengerti dan saya sangat puas dengan apa yg bapak sampaikan,,terimakasih telah berbagi ilmu dg kami pak.'),
(707,334,24,'99','98','97','98','penyajian nya bagus,mudah di mengerti dan saya sangat puas dengan apa yg ibuk sampaikan,,terimakasih telah berbagi ilmu dg kami.'),
(708,334,25,'99','98','99','85','penyajian nya bagus,mudah di mengerti dan saya sangat puas dengan apa yg ibuk sampaikan,,terimakasih telah berbagi ilmu dg kami.'),
(709,334,26,'99','97','99','98','penyajian nya bagus,mudah di mengerti dan saya sangat puas dengan apa yg ibuk sampaikan,,terimakasih telah berbagi ilmu dg kami.'),
(710,334,27,'98','99','99','99','penyajian nya bagus,mudah di mengerti dan saya sangat puas dengan apa yg ibuk sampaikan,,terimakasih telah berbagi ilmu dg kami.'),
(711,286,18,'85','80','80','75',''),
(712,286,19,'90','75','80','75',''),
(713,286,20,'89','70','75','75',''),
(714,286,21,'85','75','75','75',''),
(715,286,22,'85','75','75','75',''),
(716,286,23,'85','80','80','80',''),
(717,286,24,'85','75','70','70',''),
(718,286,25,'85','85','85','75',''),
(719,286,26,'85','70','74','73',''),
(720,286,27,'79','66','76','70',''),
(721,283,18,'95','95','95','95','Terima kasih kepada ibu nara sumber yang sudah menyampaikan materi dengan baik sehingga kami paham dengan penjelasan yang ibu sampaikan.'),
(722,283,19,'95','95','95','95','Terima kasih kepada ibu nara sumber yang sudah menyampaikan materi dengan sangat baik sehingga memudahkan kami menerima dan memahami  materi  yang ibu sampaikan.'),
(723,283,20,'95','95','95','95','Terima kasih kepada ibu nara sumber yang sudah menyampaikan materi dengan baik sehingga kami paham dengan penjelasan yang ibu sampaikan.'),
(724,283,21,'95','95','95','95','Terima kasih kepada ibu nara sumber yang sudah menyampaikan materi dengan baik sehingga kami paham dengan penjelasan yang ibu sampaikan.'),
(725,283,22,'95','95','95','95','Terima kasih kepada ibu nara sumber yang sudah menyampaikan materi dengan baik sehingga kami paham dengan penjelasan yang ibu sampaikan.m'),
(726,283,23,'97','97','97','97','Terima kasih kepada bapak nara sumber yang sudah menyampaikan materi dengan cukup baik sehingga kami paham dengan penjelasan yang bapak sampaikan.'),
(727,283,24,'95','95','95','95','Terima kasih kepada ibu nara sumber yang sudah menyampaikan materi dengan baik sehingga kami paham dengan penjelasan yang ibu sampaikan.'),
(728,283,25,'98','98','98','98','Terima kasih kepada ibu nara sumber yang sudah menyampaikan materi dengan sangat baik, sehingga memudahkan kami dalam menerima dan memahami materi yang ibu sampaikan.'),
(729,283,26,'95','95','95','95','Terima kasih kepada ibu nara sumber yang sudah menyampaikan materi dengan baik sehingga kami paham dengan penjelasan yang ibu sampaikan.'),
(730,283,27,'95','95','95','95','Terima kasih kepada ibu nara sumber yang sudah menyampaikan materi dengan sangat baik sehingga memudahkan kami menerima dan memahami  materi  yang ibu sampaikan.'),
(731,341,18,'80','80','80','80',''),
(732,341,19,'80','80','85','75',''),
(733,341,20,'80','80','80','80',''),
(734,341,21,'80','80','80','80',''),
(735,341,22,'80','80','80','80',''),
(736,341,23,'80','80','80','70',''),
(737,341,24,'75','75','75','75',''),
(738,341,25,'80','89','80','80',''),
(739,341,26,'80','80','80','80',''),
(740,341,27,'80','80','80','80',''),
(741,333,18,'90','85','90','85','terima kasih atas ilmunya buk'),
(742,333,19,'95','95','95','85','tidak ada saran dari saya, berkat materi yg ibu sampaikan saya jadi update lagi ilmu tetang kode etik bidan dan undang undang ttg kebidanan'),
(743,333,20,'90','90','85','85','terima kasih penjelasannya buk ttg pelayanan di masa pandemic covic-19 ini.'),
(744,333,21,'90','90','90','90','terima kasih atas ilmunya buk'),
(745,333,22,'90','90','90','90','terima kasih atas ilmunya buk'),
(746,333,23,'90','85','85','80','terima kasih atas ilmunya pak, saya jadi mengetahui lebih banyak lagi batasan batasan apa yg boleh di lakukan oleh bidan dan apa yang tidak boleh di lakukan.'),
(747,333,24,'90','90','90','90','terima kasih atas ilmunya buk'),
(748,333,25,'90','95','95','90','terima kasih atas ilmunya buk, aya jadi mengetahui lebih banyak lagi batasan batasan apa yg boleh di lakukan oleh bidan dan apa yang tidak boleh di lakukan.'),
(749,333,26,'90','90','90','90','terima kasih atas ilmunya buk'),
(750,333,27,'95','95','95','96','terima kasih atas ilmunya buk'),
(751,331,18,'10','10','10','10',''),
(752,331,19,'10','10','10','10',''),
(753,331,20,'10','10','10','10',''),
(754,331,21,'10','10','10','10',''),
(755,331,22,'10','10','10','10',''),
(756,331,23,'10','10','10','10',''),
(757,331,24,'10','10','10','10',''),
(758,331,25,'10','10','10','10',''),
(759,331,26,'10','10','10','10',''),
(760,331,27,'10','10','10','10',''),
(761,309,18,'10','10','10','10',''),
(762,309,19,'10','10','10','10',''),
(763,309,20,'10','10','10','10',''),
(764,309,21,'10','10','10','10',''),
(765,309,22,'10','10','10','10',''),
(766,309,23,'10','10','10','10',''),
(767,309,24,'10','10','10','10',''),
(768,309,25,'10','10','10','10',''),
(769,309,26,'10','10','10','10',''),
(770,309,27,'10','10','10','10',''),
(771,306,18,'90','90','90','90','Bagus'),
(772,306,19,'90','90','90','90','Bagus'),
(773,306,20,'90','90','90','90','Bagus'),
(774,306,21,'90','90','90','90','Bagus'),
(775,306,22,'90','90','90','90','Bagus'),
(776,306,23,'90','90','90','90','Bagus'),
(777,306,24,'90','90','90','90','Bagus'),
(778,306,25,'90','90','90','90','Bagus'),
(779,306,26,'90','90','90','90','Bagus'),
(780,306,27,'90','90','90','90','Bagus'),
(781,294,18,'85','85','85','85','Mantap'),
(782,294,19,'85','85','85','85','Mantap lanjutkan'),
(783,294,20,'80','80','80','80','Mantap'),
(784,294,21,'80','80','80','80','Mantap'),
(785,294,22,'80','80','80','80','Mantap'),
(786,294,23,'80','80','80','80','Mantap'),
(787,294,24,'81','81','81','81','Mantap'),
(788,294,25,'81','81','81','81','Mantap'),
(789,294,26,'80','80','80','80','Mantap'),
(790,294,27,'80','80','80','80','Mantap'),
(791,336,18,'99','99','99','99','Cukup baik dan mudah di mengerti'),
(792,336,19,'99','99','99','99','Cukup baik dan mudah di mengerti'),
(793,336,20,'99','99','99','99','Cukup baik dan mudah di mengerti'),
(794,336,21,'99','99','99','99','Cukup baik dan mudah di mengerti'),
(795,336,22,'99','99','99','99','Cukup baik dan mudah di mengerti'),
(796,336,23,'99','99','99','97','Cukup baik dan mudah di mengerti'),
(797,336,24,'99','99','99','99','Cukup baik dan mudah di mengerti'),
(798,336,25,'99','99','99','87','Cukup baik dan mudah di mengerti'),
(799,336,26,'99','99','99','99','Cukup baik dan mudah di mengerti'),
(800,336,27,'99','99','99','99','Cukup baik dan mudah di mengerti'),
(801,311,18,'99','99','99','99',''),
(802,311,19,'99','99','99','99',''),
(803,311,20,'99','99','99','99',''),
(804,311,21,'99','99','99','99',''),
(805,311,22,'99','99','99','99',''),
(806,311,23,'99','60','70','60',''),
(807,311,24,'99','99','99','99',''),
(808,311,25,'99','99','99','99',''),
(809,311,26,'99','99','99','99',''),
(810,311,27,'99','99','99','99',''),
(811,315,18,'80','85','85','85',''),
(812,315,19,'85','85','86','85',''),
(813,315,20,'86','86','86','86',''),
(814,315,21,'85','86','88','85',''),
(815,315,22,'85','86','85','86',''),
(816,315,23,'81','82','74','80',''),
(817,315,24,'80','83','83','83',''),
(818,315,25,'85','82','85','85',''),
(819,315,26,'85','86','82','85',''),
(820,315,27,'85','88','87','85','');

/*Table structure for table `ranting` */

DROP TABLE IF EXISTS `ranting`;

CREATE TABLE `ranting` (
  `id_ranting` int(11) NOT NULL AUTO_INCREMENT,
  `ranting` text NOT NULL,
  PRIMARY KEY (`id_ranting`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `ranting` */

insert  into `ranting`(`id_ranting`,`ranting`) values 
(1,'Barung-Barung Berlantai'),
(2,'Tarusan'),
(3,'Pasar Baru'),
(4,'Koto Berapak'),
(5,'Asam Kumbang'),
(6,'Salido'),
(7,'Lumpo'),
(8,'RSUD M.Zein Painan'),
(9,'Pasar Kuok'),
(10,'IV Koto Mudiek'),
(11,'Surantih'),
(12,'Kambang'),
(13,'Koto Baru'),
(14,'Balai Selasa'),
(15,'Air Haji'),
(16,'Airpura'),
(17,'Inderapura'),
(18,'RSUD Tapan'),
(19,'Tapan'),
(20,'Lunang'),
(21,'Silaut');

/*Table structure for table `sertifikat` */

DROP TABLE IF EXISTS `sertifikat`;

CREATE TABLE `sertifikat` (
  `id_sertifikat` int(11) NOT NULL AUTO_INCREMENT,
  `nim` varchar(25) NOT NULL,
  `level` varchar(15) NOT NULL,
  `file_sertifikat` text NOT NULL,
  PRIMARY KEY (`id_sertifikat`)
) ENGINE=MyISAM AUTO_INCREMENT=498 DEFAULT CHARSET=latin1;

/*Data for the table `sertifikat` */

/*Table structure for table `tb_soal` */

DROP TABLE IF EXISTS `tb_soal`;

CREATE TABLE `tb_soal` (
  `id_soal` int(11) NOT NULL AUTO_INCREMENT,
  `dosen_id` int(11) NOT NULL,
  `matkul_id` int(11) NOT NULL,
  `bobot` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `tipe_file` varchar(50) NOT NULL,
  `soal` longtext NOT NULL,
  `opsi_a` longtext NOT NULL,
  `opsi_b` longtext NOT NULL,
  `opsi_c` longtext NOT NULL,
  `opsi_d` longtext NOT NULL,
  `opsi_e` longtext NOT NULL,
  `file_a` varchar(255) NOT NULL,
  `file_b` varchar(255) NOT NULL,
  `file_c` varchar(255) NOT NULL,
  `file_d` varchar(255) NOT NULL,
  `file_e` varchar(255) NOT NULL,
  `jawaban` varchar(5) NOT NULL,
  `pembahasan` longtext NOT NULL,
  `created_on` int(11) NOT NULL,
  `updated_on` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_soal`),
  KEY `matkul_id` (`matkul_id`),
  KEY `dosen_id` (`dosen_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `tb_soal` */

insert  into `tb_soal`(`id_soal`,`dosen_id`,`matkul_id`,`bobot`,`file`,`tipe_file`,`soal`,`opsi_a`,`opsi_b`,`opsi_c`,`opsi_d`,`opsi_e`,`file_a`,`file_b`,`file_c`,`file_d`,`file_e`,`jawaban`,`pembahasan`,`created_on`,`updated_on`) values 
(1,1,15,5,'','','Tipe ancaman yang sering ditemui pada cyber security yakni ketika pihak penyerang sudah menyisipkan objek palsu ke dalam sistem yang menjadi target sasaran adalah...','Interruption','Modification','Fabrication','Interception','Semua Benar','','','','','','C','Peraturan Badan Kepegawaian Negara tentang Pedoman ... Jumlah Soal untuk Waktu Ujian 90 Menit : 80/100 Butir Soal (pilih salah satu)*',1692712379,1692712379),
(2,1,15,5,'','','Sebuah kegiatan yang dirancang untuk menambah nilai dan meningkatkan operasi badan secara independen disebut...','Audit kecurangan (fraud)','Audit sistem informasi','Audit eksternal','Audit internal','Semua Salah','','','','','','D','ffffff',1692712536,1692778048);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) DEFAULT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  UNIQUE KEY `uc_remember_selector` (`remember_selector`),
  UNIQUE KEY `uc_email` (`email`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=615 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`ip_address`,`username`,`password`,`email`,`activation_selector`,`activation_code`,`forgotten_password_selector`,`forgotten_password_code`,`forgotten_password_time`,`remember_selector`,`remember_code`,`created_on`,`last_login`,`active`,`first_name`,`last_name`,`company`,`phone`) values 
(1,'127.0.0.1','Administrator','$2y$12$tGY.AtcyXrh7WmccdbT1rOuKEcTsKH6sIUmDr0ore1yN4LnKTTtuu','admin@admin.com',NULL,'',NULL,NULL,NULL,NULL,NULL,1268889823,1692778984,1,'Admin','Istrator','ADMIN','0'),
(9,'103.143.152.40','13010901','$2y$10$PS4gIQgIZArb21Ng0y14JeyTx.ICa8L2//QV.QCU7N3NzmmS3nCS6','pppk_ahli@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1632992443,1692776642,1,'MU-0001','MU-0001',NULL,NULL),
(10,'103.143.152.40','13010902','$2y$10$QTyAYFMofzrhGRX7MT5LXuk7/Wn/pgmaw.eyL/RFXoY6mtKBto/rq','pppk_terampil@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1632992445,1692779390,1,'MU-0002','MU-0002',NULL,NULL),
(57,'103.143.152.40','1301105201690001','$2y$10$ofsy2y0Ph6GplpOvzkC/Ou4mMywjUk8Jp1Q0aNRkf0HF6EFlLg.1O','afridaida1969@gmail.com',NULL,'1',NULL,NULL,NULL,NULL,NULL,1632992890,1692754973,1,'AFRIDA','AFRIDA',NULL,NULL),
(608,'::1','1738208999034002','$2y$10$9Yy66L2lfUBp8CUuQZOh4.bF9pM9BKcuaf6TtNBQbLiVkQ.EokJwW','afrijon@bkn.go.id',NULL,'1',NULL,NULL,NULL,NULL,NULL,1692762808,1692762944,1,NULL,NULL,NULL,NULL),
(609,'::1','5435345345345','$2y$10$Bb5JulCVSKyVrO8WrjZnKeSclddKvyqZ6Rtpaoy.PjBmaqbQlnonm','febi@yahoo.com',NULL,'',NULL,NULL,NULL,NULL,NULL,1692763469,1692763853,1,NULL,NULL,NULL,NULL),
(610,'::1','089617502694','$2y$10$lV6rU2YhFd0pnUUBDiFYMOeixYUW09MCAhqZqSkDi5McqdyCbTjRS','masri_prima_doni@yahoo.com',NULL,'1',NULL,NULL,NULL,NULL,NULL,1692776494,1692785875,1,NULL,NULL,NULL,NULL),
(611,'::1','081221585949','$2y$10$.pSjyxaoqiTzdKj09YbpkOoJDIe6IREgXKAUcu7MkXejanF.lF4CC','ramadaniilham@yahoo.com',NULL,'',NULL,NULL,NULL,NULL,NULL,1692779164,1692852519,1,NULL,NULL,NULL,NULL),
(612,'::1','082376477317','$2y$10$BipPcJ7EdS6rItZjVyud7./H6ORLQS/pzqVbcEKypX8kbMXCmk7uu','hutri_ela@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1692779256,1692779268,1,NULL,NULL,NULL,NULL),
(614,'::1','0893043943434','$2y$10$27MohdRqapK5t2FMSzVTN.bh9zrB4g5XeMI6zTdy873s8F37pa1sO','xave@bkn.go.id',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1692781396,NULL,1,NULL,NULL,NULL,NULL);

/*Table structure for table `users_groups` */

DROP TABLE IF EXISTS `users_groups`;

CREATE TABLE `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=614 DEFAULT CHARSET=utf8;

/*Data for the table `users_groups` */

insert  into `users_groups`(`id`,`user_id`,`group_id`) values 
(3,1,1),
(11,9,2),
(12,10,2),
(59,57,3),
(607,608,3),
(608,609,3),
(609,610,3),
(610,611,3),
(611,612,3),
(613,614,3);

/* Trigger structure for table `dosen` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `edit_user_dosen` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `edit_user_dosen` BEFORE UPDATE ON `dosen` FOR EACH ROW UPDATE `users` SET `email` = NEW.email, `username` = NEW.nip WHERE `users`.`username` = OLD.nip */$$


DELIMITER ;

/* Trigger structure for table `dosen` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `hapus_user_dosen` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `hapus_user_dosen` BEFORE DELETE ON `dosen` FOR EACH ROW DELETE FROM `users` WHERE `users`.`username` = OLD.nip */$$


DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
