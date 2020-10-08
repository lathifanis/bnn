/*
SQLyog Ultimate v8.82 
MySQL - 5.5.5-10.3.16-MariaDB : Database - bnn
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bnn` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `bnn`;

/*Table structure for table `assesment` */

DROP TABLE IF EXISTS `assesment`;

CREATE TABLE `assesment` (
  `id_assesment` int(11) NOT NULL AUTO_INCREMENT,
  `rekam_medis` varchar(20) DEFAULT NULL,
  `tgl_kedatangan` date DEFAULT NULL,
  `kesimpulan` text DEFAULT NULL,
  `tindak_lanjut` text DEFAULT NULL,
  `petugas` varchar(30) DEFAULT NULL,
  `id_dokter` varchar(20) DEFAULT NULL,
  `id_perawat` varchar(30) DEFAULT NULL,
  `surat_pernyataan` text DEFAULT NULL,
  `file` text DEFAULT NULL,
  PRIMARY KEY (`id_assesment`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `assesment` */

insert  into `assesment`(`id_assesment`,`rekam_medis`,`tgl_kedatangan`,`kesimpulan`,`tindak_lanjut`,`petugas`,`id_dokter`,`id_perawat`,`surat_pernyataan`,`file`) values (7,'1','2020-01-20','bbbbb','Terapi','11351101372','1','1144123445',NULL,NULL),(9,'2','2020-01-20','1234','Medis','11351101372','2','11557808021',NULL,NULL),(10,'1','2020-01-20','Sakit','Konseling','11351101372','1','11557808021',NULL,NULL),(11,'2','2020-01-20','sdgdfgd','Konseling','11351101372','1','11557808021',NULL,NULL),(12,'1','2020-01-20','dfgdgd','Konseling','11351101372','1','1144123445',NULL,NULL),(13,'RM-093898','2020-01-20','blablabla','Rawat','11351101372','1','1144123445',NULL,NULL),(14,'RM-093898','2020-01-20','PENYAKIT DALAM','Medis','11351101372','11351101372','1144123445',NULL,NULL),(15,'RM-18990','2020-01-20','SAKIT DALAM','Medis','11351101372','11351101372','1144123445',NULL,NULL),(16,'RM-01','2020-01-20','Sehat Walafiat','Konseling','19928830049','11351101372','11557808021','',''),(17,'RM-093898','2020-01-20','sada','Konseling','11351101372','11351101372','1144123445','test.pdf','test.pdf');

/*Table structure for table `catatan_medis` */

DROP TABLE IF EXISTS `catatan_medis`;

CREATE TABLE `catatan_medis` (
  `id_medis` int(11) NOT NULL AUTO_INCREMENT,
  `id_assesment` varchar(10) DEFAULT NULL,
  `tgl_medis` date DEFAULT NULL,
  `anamnesa` text DEFAULT NULL,
  `pemeriksaan_fisik` text DEFAULT NULL,
  `terapi` text DEFAULT NULL,
  `id_dokter` tinytext DEFAULT NULL,
  PRIMARY KEY (`id_medis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `catatan_medis` */

/*Table structure for table `dokter` */

DROP TABLE IF EXISTS `dokter`;

CREATE TABLE `dokter` (
  `id_dokter` varchar(30) NOT NULL,
  `nama_dokter` varchar(30) DEFAULT NULL,
  `no_hp` varchar(30) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `jk` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_dokter`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `dokter` */

insert  into `dokter`(`id_dokter`,`nama_dokter`,`no_hp`,`alamat`,`jk`) values ('11351101372','iqbal','23','Jln. Sudirman','Laki-laki'),('289889488','Dr. Susan','809938409','Jalan','Perempuan');

/*Table structure for table `grup_terapi` */

DROP TABLE IF EXISTS `grup_terapi`;

CREATE TABLE `grup_terapi` (
  `id_grup` int(11) NOT NULL AUTO_INCREMENT,
  `id_assesment` varchar(10) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `terapi` text DEFAULT NULL,
  `id_dokter` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_grup`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `grup_terapi` */

insert  into `grup_terapi`(`id_grup`,`id_assesment`,`tanggal`,`catatan`,`terapi`,`id_dokter`) values (1,'1','2020-09-08','bkbkabkba','asfdf',NULL),(2,NULL,'2020-01-20',NULL,NULL,'11351101372'),(3,NULL,'2020-01-20',NULL,NULL,'11351101372'),(4,NULL,'2020-01-20',NULL,NULL,'11351101372'),(5,NULL,'2020-01-20',NULL,NULL,'11351101372'),(6,NULL,'2020-01-20',NULL,NULL,'11351101372'),(7,'7','2020-01-20',NULL,NULL,'11351101372'),(8,'7','2020-01-20','sdfsdf','gfdg','11351101372'),(9,'7','2020-01-20','','','11351101372'),(10,'7','2020-01-20','fdgd','gfhfh','11351101372'),(11,'7','2020-01-20','dghgf','fgjgh','11351101372');

/*Table structure for table `konseling` */

DROP TABLE IF EXISTS `konseling`;

CREATE TABLE `konseling` (
  `id_konseling` int(11) NOT NULL AUTO_INCREMENT,
  `id_assesment` varchar(30) DEFAULT NULL,
  `tgl_konseling` varchar(20) DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `terapi` text DEFAULT NULL,
  `id_dokter` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_konseling`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `konseling` */

insert  into `konseling`(`id_konseling`,`id_assesment`,`tgl_konseling`,`catatan`,`terapi`,`id_dokter`) values (1,'11','2020-09-01','GILA','MANTAP',NULL),(2,'11','2020-01-20','Sakit Demam','Disuntik Mati','11351101372'),(3,'11','2020-01-20','demam','suntik mati','11351101372'),(4,'10','2020-01-20','gila','disuntik','11351101372'),(5,'10','2020-01-20','mati','mati','11351101372'),(6,'11','2020-01-20','mampus','mampus','11351101372'),(7,'11','2020-01-20','m','m','11351101372'),(8,'11','2020-01-20','d','s','11351101372'),(9,'11','2020-01-20','f','d','11351101372'),(10,'11','2020-01-20','dsfd','fgfd','11351101372'),(11,'10','2020-01-20','lkjlkj',';;lkl;k','11351101372'),(12,'12','2020-01-20','lkjlkj','lkjlkj','11351101372'),(13,'13','2020-01-20','SAKIT DEMAM','DISUNTIK','11351101372'),(14,'10','2020-01-20','blablabla','blablabla','11351101372'),(15,'16','2020-01-20','Udah sehat kok','Pulang kerumah. Membalak hidup kau','19928830049');

/*Table structure for table `pegawai` */

DROP TABLE IF EXISTS `pegawai`;

CREATE TABLE `pegawai` (
  `nip` varchar(20) NOT NULL,
  `nama_pegawai` varchar(30) DEFAULT NULL,
  `jk` varchar(15) DEFAULT NULL,
  `no_hp` varchar(13) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `jabatan` varchar(30) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pegawai` */

insert  into `pegawai`(`nip`,`nama_pegawai`,`jk`,`no_hp`,`alamat`,`jabatan`,`status`) values ('1111','dfsd','Laki-laki','4354','thyr','Administrator',NULL),('11351102535','Abdul Aziz','Laki-laki','082385812391','Jalan Taman Karya','Pegawai',NULL),('11353325643','Razi Alfarabi ST','Laki-laki','085271171136','Jln. Melati 1 No. 57','Dokter',NULL),('23542','dsgs','Laki-laki','235','sgdf','Pegawai',NULL),('98797098','jkjnk','Laki-laki','7898797','jhkasd','Administrator',NULL);

/*Table structure for table `pendaftaran` */

DROP TABLE IF EXISTS `pendaftaran`;

CREATE TABLE `pendaftaran` (
  `rekam_medis` varchar(20) NOT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `tempat_lahir` varchar(20) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `umur` varchar(20) DEFAULT NULL,
  `jk` varchar(15) DEFAULT NULL,
  `agama` varchar(20) DEFAULT NULL,
  `suku` varchar(20) DEFAULT NULL,
  `pernikahan` varchar(20) DEFAULT NULL,
  `pekerjaan` varchar(30) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `golongan_darah` char(3) DEFAULT NULL,
  `no_hp` varchar(12) DEFAULT NULL,
  `dikirim_oleh` text DEFAULT NULL,
  `tempat_rehab` varchar(30) DEFAULT NULL,
  `lama_rehab` int(11) DEFAULT NULL,
  `metode_rehab` text DEFAULT NULL,
  `nama_keluarga` varchar(30) DEFAULT NULL,
  `hubungan` varchar(30) DEFAULT NULL,
  `alamat_keluarga` text DEFAULT NULL,
  `no_hp_keluarga` varchar(13) DEFAULT NULL,
  `kasus_polisi` varchar(10) DEFAULT NULL,
  `petugas` varchar(30) DEFAULT NULL,
  `tgl_daftar` date DEFAULT NULL,
  `berkas_pasien` text DEFAULT NULL,
  `berkas_pendaftaran` text DEFAULT NULL,
  `pendidikan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`rekam_medis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pendaftaran` */

insert  into `pendaftaran`(`rekam_medis`,`nik`,`nama`,`tempat_lahir`,`tgl_lahir`,`umur`,`jk`,`agama`,`suku`,`pernikahan`,`pekerjaan`,`alamat`,`golongan_darah`,`no_hp`,`dikirim_oleh`,`tempat_rehab`,`lama_rehab`,`metode_rehab`,`nama_keluarga`,`hubungan`,`alamat_keluarga`,`no_hp_keluarga`,`kasus_polisi`,`petugas`,`tgl_daftar`,`berkas_pasien`,`berkas_pendaftaran`,`pendidikan`) values ('1','12','qwerty',NULL,NULL,NULL,'laki-laki',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('2','23','asdf',NULL,NULL,NULL,'perempuan',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('RM-01','1471091712950021','Razi Alfarabi','Pekanbaru','1995-12-17','24 Tahun ','laki-laki','islam','Melayu','belum','PENGANGGURAN','Jln. Melati 1 No. 57','A+','085271171136','-','-',0,'-','Yaharma','Ibu','Jln. Melati 1 No. 57','085271171136','tidak','11351101372','2020-01-20','CV-3.pdf','RAZI.pdf','s1'),('RM-02','2889489','TONI','jklj','2019-12-20','0 Tahun ','laki-laki','islam','minang','belum','jkj','jkhkjh','o','0890378498','lkjlkj','-',0,'-','kjhkjh','hkjhj','kjhkjh','098098098','ya','11351101372','2020-01-20','1471091712950021_kartuDaftar(1).pdf','1471091712950021_kartuAkun(1).pdf','tidak sekolah'),('RM-093898','11351102535','Abdul Aziz',NULL,NULL,NULL,'laki-laki',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('RM-18990','18928837889','PADIL',NULL,NULL,NULL,'laki-laki',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `perawat` */

DROP TABLE IF EXISTS `perawat`;

CREATE TABLE `perawat` (
  `id_perawat` varchar(20) NOT NULL,
  `nama_perawat` varchar(30) DEFAULT NULL,
  `alamat_perawat` text DEFAULT NULL,
  `jk` varchar(15) DEFAULT NULL,
  `no_hp` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`id_perawat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `perawat` */

insert  into `perawat`(`id_perawat`,`nama_perawat`,`alamat_perawat`,`jk`,`no_hp`) values ('1144123445','Razi Alfarabi','Jln. Melati 1 no. 57','Laki-laki','85271171136'),('11557808021','Desvina Wulandari','Jln. Ukui','Perempuan','085252525252');

/*Table structure for table `rawat_jalan` */

DROP TABLE IF EXISTS `rawat_jalan`;

CREATE TABLE `rawat_jalan` (
  `id_rawat` int(11) NOT NULL AUTO_INCREMENT,
  `id_assesment` varchar(10) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `id_dokter` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_rawat`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `rawat_jalan` */

insert  into `rawat_jalan`(`id_rawat`,`id_assesment`,`tanggal`,`id_dokter`) values (5,'13','2020-01-20','11351101372'),(6,'13','2020-01-20','11351101372'),(7,'13','2020-01-20','11351101372'),(8,'13','2020-01-20','11351101372'),(9,'13','2020-01-20','11351101372'),(10,'13','2020-01-20','11351101372'),(11,'13','2020-01-20','11351101372'),(12,'13','2020-01-20','11351101372'),(13,'13','2020-01-20','11351101372');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `img` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id`,`nama`,`password`,`role_id`,`nip`,`img`) values (1,'razi','$2y$10$0WONVKoQ7Yu4bv.ulTkOxu9/XRDKFL18c8bMHlSkbPNrmsl.c8S7e',1,'11351101372','default.jpg'),(3,'kokokok','$2y$10$mcA4/U6huIA9U4Wc6cIYAufMLXWixB/gkTZbZfJIr.PiStiKgJL56',2,'89098',NULL),(5,'Dr. Fattah','$2y$10$lzo6iO.LcEOBSVS5cvJHCOxN5qPjbrqT3Nl/n.h6GzxRFAz/TDZ.m',3,'19928830049',NULL),(6,'Luna','$2y$10$2KYf4uNF1XkASzs96kHyo.WlSxMFm1dggQ9byonksOVjv3fObTYdm',3,'113667298',NULL),(10,'iqbal','$2y$10$HrRcouKwZFOd0Iuz0oUhouVSFD/3WrbCtTsq.ukHF1nchkrHCufvO',3,'2',NULL),(11,'Dr. Susan','$2y$10$CKYZfxp4dSPXdjB854IwWuQkTnAFSvjrSk77ofTEyMvO3aE9lzQJG',3,'289889488',NULL),(12,'jkjnk','$2y$10$fMDOQ9PuWkOVC2XhAC8ZPe8RoAuHqTjia.1JLkaqrlV8uTZZkfCha',1,'98797098',NULL),(13,'dsgs','$2y$10$vc2l37GUCQ2Vdc3D3aLCNuG8Lcdt1Opg7K8ysLbfGwYILcROxvI9C',2,'23542',NULL),(14,'dfsd','$2y$10$EK1mQnw5BolhZ0POQXncJ.sixI.UKSV5fpwziErknSlFN2tD2Yg1G',1,'1111',NULL);

/*Table structure for table `user_access_menu` */

DROP TABLE IF EXISTS `user_access_menu`;

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `user_access_menu` */

insert  into `user_access_menu`(`id`,`role_id`,`menu_id`) values (1,1,1),(2,2,2),(3,3,3),(4,4,1),(5,4,2),(6,4,3),(7,4,5);

/*Table structure for table `user_menu` */

DROP TABLE IF EXISTS `user_menu`;

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `user_menu` */

insert  into `user_menu`(`id`,`menu`) values (1,'Admin'),(2,'Petugas'),(3,'Dokter'),(4,'Perawat');

/*Table structure for table `user_sub_menu` */

DROP TABLE IF EXISTS `user_sub_menu`;

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `url` varchar(186) DEFAULT NULL,
  `icon` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `user_sub_menu` */

insert  into `user_sub_menu`(`id`,`menu_id`,`title`,`url`,`icon`) values (1,1,'Pegawai','pegawai','fas fa-fw fa-user'),(2,1,'Dokter','dokter','fab fa-fw fa-youtube'),(3,1,'Perawat','perawat','fab fa-fw fa-twitter'),(4,2,'Pendaftaran','pendaftaran','fas fa-fw fa-user'),(5,3,'Konseling','konseling','fas fa-fw fa-user'),(6,2,'Assesment','assesment','fas fa-fw fa-user'),(7,3,'Catatan Medis','medis','fas fa-fw fa-user'),(8,3,'Rawat Jalan','rawat','fas fa-fw fa-user'),(9,3,'Group Therapy','terapi','fas fa-fw fa-user');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
