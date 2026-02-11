/*
SQLyog Community v13.3.1 (64 bit)
MySQL - 10.4.32-MariaDB : Database - db_assets
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_assets` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `db_assets`;

/*Table structure for table `aset` */

DROP TABLE IF EXISTS `aset`;

CREATE TABLE `aset` (
  `IdAset` int(11) NOT NULL AUTO_INCREMENT,
  `KodeAset` varchar(50) DEFAULT NULL,
  `IdKategoriAset` int(11) DEFAULT NULL,
  `IdLokasiAset` int(11) DEFAULT NULL,
  `NamaAset` varchar(100) DEFAULT NULL,
  `StatusAset` varchar(50) DEFAULT NULL,
  `Create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`IdAset`),
  UNIQUE KEY `KodeAset` (`KodeAset`),
  KEY `IdKategoriAset` (`IdKategoriAset`),
  KEY `IdLokasiAset` (`IdLokasiAset`),
  CONSTRAINT `aset_ibfk_1` FOREIGN KEY (`IdKategoriAset`) REFERENCES `kategori_aset` (`IdKategoriAset`),
  CONSTRAINT `aset_ibfk_2` FOREIGN KEY (`IdLokasiAset`) REFERENCES `lokasi_aset` (`IdLokasiAset`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `aset` */

insert  into `aset`(`IdAset`,`KodeAset`,`IdKategoriAset`,`IdLokasiAset`,`NamaAset`,`StatusAset`,`Create_at`,`Update_at`) values 
(1,'LAP-001',1,1,'Laptop MacBook Pro 2023','Tersedia','2026-02-11 08:27:06','2026-02-11 08:27:06'),
(2,'KRS-050',2,1,'Kursi Kerja Ergonomis','Tersedia','2026-02-11 08:27:06','2026-02-11 08:27:06');

/*Table structure for table `hapus_aset` */

DROP TABLE IF EXISTS `hapus_aset`;

CREATE TABLE `hapus_aset` (
  `IdHapus` int(11) NOT NULL AUTO_INCREMENT,
  `IdPegawai` int(11) DEFAULT NULL,
  `Create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`IdHapus`),
  KEY `IdPegawai` (`IdPegawai`),
  CONSTRAINT `hapus_aset_ibfk_1` FOREIGN KEY (`IdPegawai`) REFERENCES `pegawai` (`IdPegawai`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `hapus_aset` */

insert  into `hapus_aset`(`IdHapus`,`IdPegawai`,`Create_at`,`Update_at`) values 
(1,1,'2026-02-11 08:27:11','2026-02-11 08:27:11');

/*Table structure for table `hapus_aset_detail` */

DROP TABLE IF EXISTS `hapus_aset_detail`;

CREATE TABLE `hapus_aset_detail` (
  `IdHapusDetail` int(11) NOT NULL AUTO_INCREMENT,
  `IdHapus` int(11) DEFAULT NULL,
  `IdAset` int(11) DEFAULT NULL,
  `Create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`IdHapusDetail`),
  KEY `IdHapus` (`IdHapus`),
  KEY `IdAset` (`IdAset`),
  CONSTRAINT `hapus_aset_detail_ibfk_1` FOREIGN KEY (`IdHapus`) REFERENCES `hapus_aset` (`IdHapus`),
  CONSTRAINT `hapus_aset_detail_ibfk_2` FOREIGN KEY (`IdAset`) REFERENCES `aset` (`IdAset`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `hapus_aset_detail` */

insert  into `hapus_aset_detail`(`IdHapusDetail`,`IdHapus`,`IdAset`,`Create_at`,`Update_at`) values 
(1,1,1,'2026-02-11 08:27:12','2026-02-11 08:27:12');

/*Table structure for table `kategori_aset` */

DROP TABLE IF EXISTS `kategori_aset`;

CREATE TABLE `kategori_aset` (
  `IdKategoriAset` int(11) NOT NULL AUTO_INCREMENT,
  `NamaKategori` varchar(100) DEFAULT NULL,
  `DeskripsiKategori` text DEFAULT NULL,
  `Create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`IdKategoriAset`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `kategori_aset` */

insert  into `kategori_aset`(`IdKategoriAset`,`NamaKategori`,`DeskripsiKategori`,`Create_at`,`Update_at`) values 
(1,'Elektronik','Barang-barang elektronik seperti laptop, monitor, dll','2026-02-11 08:27:00','2026-02-11 08:27:00'),
(2,'Furniture','Meja, kursi, dan lemari kantor','2026-02-11 08:27:00','2026-02-11 08:27:00');

/*Table structure for table `lokasi_aset` */

DROP TABLE IF EXISTS `lokasi_aset`;

CREATE TABLE `lokasi_aset` (
  `IdLokasiAset` int(11) NOT NULL AUTO_INCREMENT,
  `NamaLokasiAset` varchar(100) DEFAULT NULL,
  `DeskripsiLokasiAset` text DEFAULT NULL,
  `Create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`IdLokasiAset`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `lokasi_aset` */

insert  into `lokasi_aset`(`IdLokasiAset`,`NamaLokasiAset`,`DeskripsiLokasiAset`,`Create_at`,`Update_at`) values 
(1,'Ruang IT','Lantai 2, Sayap Barat','2026-02-11 08:27:00','2026-02-11 08:27:00'),
(2,'Gudang Utama','Area Parkir Belakang','2026-02-11 08:27:00','2026-02-11 08:27:00');

/*Table structure for table `maintenance_aset` */

DROP TABLE IF EXISTS `maintenance_aset`;

CREATE TABLE `maintenance_aset` (
  `IdMaintenance` int(11) NOT NULL AUTO_INCREMENT,
  `IdPegawai` int(11) DEFAULT NULL,
  `IdAset` int(11) DEFAULT NULL,
  `StatusMaintenance` varchar(50) DEFAULT NULL,
  `Create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`IdMaintenance`),
  KEY `IdPegawai` (`IdPegawai`),
  KEY `IdAset` (`IdAset`),
  CONSTRAINT `maintenance_aset_ibfk_1` FOREIGN KEY (`IdPegawai`) REFERENCES `pegawai` (`IdPegawai`),
  CONSTRAINT `maintenance_aset_ibfk_2` FOREIGN KEY (`IdAset`) REFERENCES `aset` (`IdAset`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `maintenance_aset` */

insert  into `maintenance_aset`(`IdMaintenance`,`IdPegawai`,`IdAset`,`StatusMaintenance`,`Create_at`,`Update_at`) values 
(1,3,1,'Sedang Perbaikan Keyboard','2026-02-11 08:27:11','2026-02-11 08:27:11');

/*Table structure for table `pegawai` */

DROP TABLE IF EXISTS `pegawai`;

CREATE TABLE `pegawai` (
  `IdPegawai` int(11) NOT NULL AUTO_INCREMENT,
  `Nama` varchar(100) DEFAULT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Sandi` varchar(255) DEFAULT NULL,
  `Gender` enum('L','P') DEFAULT NULL,
  `Create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`IdPegawai`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `pegawai` */

insert  into `pegawai`(`IdPegawai`,`Nama`,`Username`,`Sandi`,`Gender`,`Create_at`,`Update_at`) values 
(1,'Andi Prasetyo','andi_admin','password123','L','2026-02-11 08:27:02','2026-02-11 08:27:02'),
(2,'Siti Aminah','user2','e10adc3949ba59abbe56e057f20f883e','P','2026-02-11 08:27:02','2026-02-11 11:17:43'),
(3,'Budi Santoso','user3','e10adc3949ba59abbe56e057f20f883e','L','2026-02-11 08:27:02','2026-02-11 11:18:14'),
(4,'Aceng','aceng885','4297f44b13955235245b2497399d7a93','L','2026-02-11 11:30:55','2026-02-11 11:30:55');

/*Table structure for table `pengelola_aset` */

DROP TABLE IF EXISTS `pengelola_aset`;

CREATE TABLE `pengelola_aset` (
  `IdPengelola` int(11) NOT NULL AUTO_INCREMENT,
  `IdPegawai` int(11) DEFAULT NULL,
  `Level` enum('Super Admin','Admin Aset','Teknisi','Staf','Pegawai') DEFAULT NULL,
  `Create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`IdPengelola`),
  KEY `IdPegawai` (`IdPegawai`),
  CONSTRAINT `pengelola_aset_ibfk_1` FOREIGN KEY (`IdPegawai`) REFERENCES `pegawai` (`IdPegawai`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `pengelola_aset` */

insert  into `pengelola_aset`(`IdPengelola`,`IdPegawai`,`Level`,`Create_at`,`Update_at`) values 
(1,1,'Pegawai','2026-02-11 08:27:07','2026-02-11 10:08:29'),
(2,2,'Admin Aset','2026-02-11 11:17:43','2026-02-11 11:17:43'),
(3,3,'Teknisi','2026-02-11 11:18:14','2026-02-11 11:18:14');

/*Table structure for table `pinjam_aset` */

DROP TABLE IF EXISTS `pinjam_aset`;

CREATE TABLE `pinjam_aset` (
  `IdPinjam` int(11) NOT NULL AUTO_INCREMENT,
  `IdPegawaiTerima` int(11) DEFAULT NULL,
  `IdPegawaiSerah` int(11) DEFAULT NULL,
  `Create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`IdPinjam`),
  KEY `IdPegawaiTerima` (`IdPegawaiTerima`),
  KEY `IdPegawaiSerah` (`IdPegawaiSerah`),
  CONSTRAINT `pinjam_aset_ibfk_1` FOREIGN KEY (`IdPegawaiTerima`) REFERENCES `pegawai` (`IdPegawai`),
  CONSTRAINT `pinjam_aset_ibfk_2` FOREIGN KEY (`IdPegawaiSerah`) REFERENCES `pegawai` (`IdPegawai`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `pinjam_aset` */

insert  into `pinjam_aset`(`IdPinjam`,`IdPegawaiTerima`,`IdPegawaiSerah`,`Create_at`,`Update_at`) values 
(1,3,1,'2026-02-11 08:27:11','2026-02-11 08:27:11');

/*Table structure for table `pinjam_aset_detail` */

DROP TABLE IF EXISTS `pinjam_aset_detail`;

CREATE TABLE `pinjam_aset_detail` (
  `IdPinjamDetail` int(11) NOT NULL AUTO_INCREMENT,
  `IdPinjam` int(11) DEFAULT NULL,
  `IdAset` int(11) DEFAULT NULL,
  `StatusKembali` varchar(50) DEFAULT NULL,
  `Create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`IdPinjamDetail`),
  KEY `IdPinjam` (`IdPinjam`),
  KEY `IdAset` (`IdAset`),
  CONSTRAINT `pinjam_aset_detail_ibfk_1` FOREIGN KEY (`IdPinjam`) REFERENCES `pinjam_aset` (`IdPinjam`),
  CONSTRAINT `pinjam_aset_detail_ibfk_2` FOREIGN KEY (`IdAset`) REFERENCES `aset` (`IdAset`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `pinjam_aset_detail` */

insert  into `pinjam_aset_detail`(`IdPinjamDetail`,`IdPinjam`,`IdAset`,`StatusKembali`,`Create_at`,`Update_at`) values 
(1,1,2,'Dipinjam','2026-02-11 08:27:11','2026-02-11 08:27:11');

/*Table structure for table `serah_terima_aset` */

DROP TABLE IF EXISTS `serah_terima_aset`;

CREATE TABLE `serah_terima_aset` (
  `IdSTA` int(11) NOT NULL AUTO_INCREMENT,
  `IdPegawaiTerima` int(11) DEFAULT NULL,
  `IdPegawaiSerah` int(11) DEFAULT NULL,
  `Create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`IdSTA`),
  KEY `IdPegawaiTerima` (`IdPegawaiTerima`),
  KEY `IdPegawaiSerah` (`IdPegawaiSerah`),
  CONSTRAINT `serah_terima_aset_ibfk_1` FOREIGN KEY (`IdPegawaiTerima`) REFERENCES `pegawai` (`IdPegawai`),
  CONSTRAINT `serah_terima_aset_ibfk_2` FOREIGN KEY (`IdPegawaiSerah`) REFERENCES `pegawai` (`IdPegawai`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `serah_terima_aset` */

insert  into `serah_terima_aset`(`IdSTA`,`IdPegawaiTerima`,`IdPegawaiSerah`,`Create_at`,`Update_at`) values 
(1,2,1,'2026-02-11 08:27:10','2026-02-11 08:27:10');

/*Table structure for table `serah_terima_aset_detail` */

DROP TABLE IF EXISTS `serah_terima_aset_detail`;

CREATE TABLE `serah_terima_aset_detail` (
  `IdSTADetail` int(11) NOT NULL AUTO_INCREMENT,
  `IdSTA` int(11) DEFAULT NULL,
  `IdAset` int(11) DEFAULT NULL,
  `StatusSerah` varchar(50) DEFAULT NULL,
  `Create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`IdSTADetail`),
  KEY `IdSTA` (`IdSTA`),
  KEY `IdAset` (`IdAset`),
  CONSTRAINT `serah_terima_aset_detail_ibfk_1` FOREIGN KEY (`IdSTA`) REFERENCES `serah_terima_aset` (`IdSTA`),
  CONSTRAINT `serah_terima_aset_detail_ibfk_2` FOREIGN KEY (`IdAset`) REFERENCES `aset` (`IdAset`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `serah_terima_aset_detail` */

insert  into `serah_terima_aset_detail`(`IdSTADetail`,`IdSTA`,`IdAset`,`StatusSerah`,`Create_at`,`Update_at`) values 
(1,1,1,'Diterima Baik','2026-02-11 08:27:11','2026-02-11 08:27:11');

/*Table structure for table `v_login_pengelola` */

DROP TABLE IF EXISTS `v_login_pengelola`;

/*!50001 DROP VIEW IF EXISTS `v_login_pengelola` */;
/*!50001 DROP TABLE IF EXISTS `v_login_pengelola` */;

/*!50001 CREATE TABLE  `v_login_pengelola`(
 `IdPengelola` int(11) ,
 `IdPegawai` int(11) ,
 `Nama` varchar(100) ,
 `Username` varchar(50) ,
 `Gender` enum('L','P') ,
 `Level` enum('Super Admin','Admin Aset','Teknisi','Staf','Pegawai') ,
 `Create_at` timestamp 
)*/;

/*View structure for view v_login_pengelola */

/*!50001 DROP TABLE IF EXISTS `v_login_pengelola` */;
/*!50001 DROP VIEW IF EXISTS `v_login_pengelola` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_login_pengelola` AS select `pa`.`IdPengelola` AS `IdPengelola`,`pa`.`IdPegawai` AS `IdPegawai`,`p`.`Nama` AS `Nama`,`p`.`Username` AS `Username`,`p`.`Gender` AS `Gender`,`pa`.`Level` AS `Level`,`pa`.`Create_at` AS `Create_at` from (`pengelola_aset` `pa` join `pegawai` `p` on(`pa`.`IdPegawai` = `p`.`IdPegawai`)) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
