/*
SQLyog Ultimate v10.42 
MySQL - 5.6.26-log : Database - gaji
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`gaji` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `gaji`;

/*Table structure for table `bulan` */

DROP TABLE IF EXISTS `bulan`;

CREATE TABLE `bulan` (
  `id_bulan` int(11) NOT NULL,
  `bulan` varchar(50) DEFAULT NULL,
  `angka` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_bulan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `bulan` */

insert  into `bulan`(`id_bulan`,`bulan`,`angka`) values (1,'Januari',1),(2,'Februari',2),(3,'Maret',3),(4,'April',4),(5,'Mei',5),(6,'Juni',6),(7,'Juli',7),(8,'Agustus',8),(9,'September',9),(10,'Oktober',10),(11,'November',11),(12,'Desember',12);

/*Table structure for table `gaji` */

DROP TABLE IF EXISTS `gaji`;

CREATE TABLE `gaji` (
  `id_gaji` int(11) NOT NULL AUTO_INCREMENT,
  `id_honor` int(11) NOT NULL,
  `id_potongan` int(11) NOT NULL,
  `id_tunjangan` int(11) NOT NULL,
  `jml_gaji` varchar(100) NOT NULL,
  `date_dinamins` date NOT NULL,
  `date_statis` date NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  PRIMARY KEY (`id_gaji`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `gaji` */

/*Table structure for table `honor` */

DROP TABLE IF EXISTS `honor`;

CREATE TABLE `honor` (
  `id_honor` int(11) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(11) DEFAULT NULL,
  `honor` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_honor`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `honor` */

insert  into `honor`(`id_honor`,`id_pegawai`,`honor`) values (1,1,'900000'),(2,2,'700000'),(3,3,'700000'),(4,9,'800000');

/*Table structure for table `jabatan` */

DROP TABLE IF EXISTS `jabatan`;

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `jabatan` varchar(100) DEFAULT NULL,
  `jml_jam` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `jabatan` */

insert  into `jabatan`(`id_jabatan`,`jabatan`,`jml_jam`) values (1,'Wali Kelas 7',6),(2,'Bendahara',6),(3,'Kurikulum',7),(4,'Kesiswaan',8),(5,'Piket',6);

/*Table structure for table `jbt_pegawai` */

DROP TABLE IF EXISTS `jbt_pegawai`;

CREATE TABLE `jbt_pegawai` (
  `id_jbt_pegawai` int(11) NOT NULL AUTO_INCREMENT,
  `id_jabatan` int(11) DEFAULT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_jbt_pegawai`),
  KEY `fk_jabatan` (`id_jabatan`),
  KEY `fk_pegawai` (`id_pegawai`),
  CONSTRAINT `fk_jabatan` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_pegawai` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `jbt_pegawai` */

insert  into `jbt_pegawai`(`id_jbt_pegawai`,`id_jabatan`,`id_pegawai`) values (11,1,11),(12,2,11),(13,3,11),(17,1,13),(18,3,13),(19,4,13);

/*Table structure for table `keluarga` */

DROP TABLE IF EXISTS `keluarga`;

CREATE TABLE `keluarga` (
  `id_keluarga` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `id_status` int(11) unsigned DEFAULT NULL,
  `s_hidup` enum('0','1') DEFAULT NULL,
  `gender` enum('P','L') DEFAULT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_keluarga`),
  KEY `id_status` (`id_status`),
  KEY `fk_pegawai_keluarga` (`id_pegawai`),
  CONSTRAINT `fk_pegawai_keluarga` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `keluarga_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `status_klg` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/*Data for the table `keluarga` */

insert  into `keluarga`(`id_keluarga`,`nama`,`id_status`,`s_hidup`,`gender`,`id_pegawai`) values (1,'Nimas',1,'1','P',1),(2,'Ayu',1,'0','P',2),(4,'Aris',2,'1','L',3),(24,'istri',1,'1','P',11),(25,'aa',2,'1','P',11);

/*Table structure for table `masakerja` */

DROP TABLE IF EXISTS `masakerja`;

CREATE TABLE `masakerja` (
  `id_masakerja` int(11) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(11) NOT NULL,
  `id_bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `jml_mk` int(50) NOT NULL,
  PRIMARY KEY (`id_masakerja`),
  KEY `id_pegawai` (`id_pegawai`),
  KEY `id_bulan` (`id_bulan`),
  CONSTRAINT `masakerja_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `masakerja_ibfk_2` FOREIGN KEY (`id_bulan`) REFERENCES `bulan` (`id_bulan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `masakerja` */

insert  into `masakerja`(`id_masakerja`,`id_pegawai`,`id_bulan`,`tahun`,`jml_mk`) values (1,1,1,2018,1);

/*Table structure for table `pegawai` */

DROP TABLE IF EXISTS `pegawai`;

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nbm` varchar(100) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `telepon` int(20) NOT NULL,
  `jns_pegawai` enum('Guru','Karyawan') NOT NULL,
  `jns_klmn` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `id_status` int(11) DEFAULT NULL,
  `status` enum('Menikah','Belum_menikah') NOT NULL,
  `agama` varchar(20) NOT NULL,
  `umur` varchar(20) NOT NULL,
  `id_keluarga` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pegawai`),
  KEY `fk_status_pgw` (`id_status`),
  CONSTRAINT `fk_status_pgw` FOREIGN KEY (`id_status`) REFERENCES `status_pgw` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pegawai` */

insert  into `pegawai`(`id_pegawai`,`nbm`,`nama`,`tempat_lahir`,`tgl_lahir`,`telepon`,`jns_pegawai`,`jns_klmn`,`email`,`id_status`,`status`,`agama`,`umur`,`id_keluarga`) values (1,'222','Rahmat S.Pd','Yogyakarta','1996-04-09',98098,'Guru','L','rahmat@gmail.com',2,'Menikah','islam','23',1),(2,'223','Eko S.Kom','Blora','1996-09-20',9876,'Karyawan','L','eko@gmail.com',2,'Menikah','islam','23',2),(3,'224','Meirista S.Kom','Palembang','1996-05-05',8123,'Guru','P','mei@gmail.com',1,'Belum_menikah','islam','23',0),(9,'225','Novii','ntb','1998-11-16',98664,'Guru','P','novii@gmail.com',2,'Belum_menikah','Islam','21',0),(10,'226','Rifky','Baubau','1998-02-12',9876578,'Karyawan','L','rifky@gmail.com',3,'Belum_menikah','Islam','21',0),(11,'227','saya','ntb','2019-12-01',9866499,'Guru','L','rifky@gmail.com',2,'Menikah','Islam','21',NULL),(13,'228','mereka','ntb','2019-12-01',98664999,'Guru','L','rifky@gmail.com',2,'Belum_menikah','Islam','21',NULL);

/*Table structure for table `potongan` */

DROP TABLE IF EXISTS `potongan`;

CREATE TABLE `potongan` (
  `id_potongan` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `pot_sosial` varchar(100) NOT NULL,
  `pot_infaq` varchar(100) NOT NULL,
  `pot_kopmurni` varchar(100) DEFAULT NULL,
  `pot_jsr` varchar(100) NOT NULL,
  `pot_aisiyah` varchar(100) DEFAULT NULL,
  `pot_jamsostek` varchar(100) DEFAULT NULL,
  `pot_bdw` varchar(100) DEFAULT NULL,
  `jml_potongan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_potongan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `potongan` */

/*Table structure for table `status_klg` */

DROP TABLE IF EXISTS `status_klg`;

CREATE TABLE `status_klg` (
  `id_status` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kode` char(11) DEFAULT NULL,
  `ket` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `status_klg` */

insert  into `status_klg`(`id_status`,`kode`,`ket`) values (1,'P1','Pasangan'),(2,'A1','Anak Pertama'),(3,'A2','Anak Kedua');

/*Table structure for table `status_pgw` */

DROP TABLE IF EXISTS `status_pgw`;

CREATE TABLE `status_pgw` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `kode` char(11) DEFAULT NULL,
  `ket` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `status_pgw` */

insert  into `status_pgw`(`id_status`,`kode`,`ket`) values (1,'P1','PNS'),(2,'T1','Tetap'),(3,'T0','Tidak Tetap');

/*Table structure for table `tahun` */

DROP TABLE IF EXISTS `tahun`;

CREATE TABLE `tahun` (
  `id_tahun` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` year(4) DEFAULT NULL,
  PRIMARY KEY (`id_tahun`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tahun` */

/*Table structure for table `tunjangan` */

DROP TABLE IF EXISTS `tunjangan`;

CREATE TABLE `tunjangan` (
  `id_tunjangan` int(11) NOT NULL AUTO_INCREMENT,
  `t_jabatan` varchar(100) NOT NULL,
  `t_keluarga` varchar(100) NOT NULL,
  `t_jamsostek` varchar(100) NOT NULL,
  `t_masakerja` varchar(100) NOT NULL,
  `t_beras` varchar(100) NOT NULL,
  `jml_tunjangan` varchar(100) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  PRIMARY KEY (`id_tunjangan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tunjangan` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
