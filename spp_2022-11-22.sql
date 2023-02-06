# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.4.21-MariaDB)
# Database: spp
# Generation Time: 2022-11-22 18:19:44 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table kelas
# ------------------------------------------------------------

DROP TABLE IF EXISTS `kelas`;

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `jurusan` varchar(100) NOT NULL DEFAULT '',
  `nama_kelas` varchar(100) NOT NULL DEFAULT '',
  `angkatan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `kelas` WRITE;
/*!40000 ALTER TABLE `kelas` DISABLE KEYS */;

INSERT INTO `kelas` (`id_kelas`, `jurusan`, `nama_kelas`, `angkatan`)
VALUES
	(0,'RPL','XIRPL5',30);

/*!40000 ALTER TABLE `kelas` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table pembayaran
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pembayaran`;

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT,
  `id_petugas` int(11) NOT NULL,
  `nisn` char(10) NOT NULL DEFAULT '',
  `tgl_bayar` datetime NOT NULL DEFAULT current_timestamp(),
  `bulan_dibayar` varchar(100) NOT NULL,
  `tahun_dibayar` varchar(100) NOT NULL,
  `id_spp` int(11) NOT NULL,
  `jumlah_bayar` int(11) DEFAULT NULL,
  `keterangan` enum('belum lunas','lunas') DEFAULT NULL,
  PRIMARY KEY (`id_pembayaran`),
  KEY `id_petugas` (`id_petugas`),
  KEY `id_spp` (`id_spp`),
  CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`),
  CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`id_spp`) REFERENCES `spp` (`id_spp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `pembayaran` WRITE;
/*!40000 ALTER TABLE `pembayaran` DISABLE KEYS */;

INSERT INTO `pembayaran` (`id_pembayaran`, `id_petugas`, `nisn`, `tgl_bayar`, `bulan_dibayar`, `tahun_dibayar`, `id_spp`, `jumlah_bayar`, `keterangan`)
VALUES
	(16,0,'666','2022-11-16 20:10:16','april','2022',4,500000,'lunas'),
	(17,0,'666','2022-11-16 20:10:52','januari','2022',0,500000,'lunas'),
	(18,0,'666','2022-11-16 20:17:27','februari','2022',2,500000,'lunas'),
	(19,0,'666','2022-11-16 20:20:06','maret','2022',3,500000,'lunas'),
	(20,0,'666','2022-11-16 20:21:17','mei','2022',5,500000,'lunas'),
	(21,0,'666','2022-11-18 13:41:23','juni','2022',6,500000,'lunas'),
	(22,0,'666','2022-11-21 10:57:55','september','2022',9,500000,'lunas');

/*!40000 ALTER TABLE `pembayaran` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table petugas
# ------------------------------------------------------------

DROP TABLE IF EXISTS `petugas`;

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_petugas` varchar(100) NOT NULL,
  `role` enum('admin','petugas') DEFAULT NULL,
  PRIMARY KEY (`id_petugas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `petugas` WRITE;
/*!40000 ALTER TABLE `petugas` DISABLE KEYS */;

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `role`)
VALUES
	(0,'sultan','202cb962ac59075b964b07152d234b70','sul','petugas'),
	(1,'rudi','202cb962ac59075b964b07152d234b70','rud','admin');

/*!40000 ALTER TABLE `petugas` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table siswa
# ------------------------------------------------------------

DROP TABLE IF EXISTS `siswa`;

CREATE TABLE `siswa` (
  `nisn` char(10) NOT NULL,
  `username` varchar(100) NOT NULL DEFAULT '',
  `id_kelas` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`nisn`),
  KEY `id_kelas` (`id_kelas`),
  CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `siswa` WRITE;
/*!40000 ALTER TABLE `siswa` DISABLE KEYS */;

INSERT INTO `siswa` (`nisn`, `username`, `id_kelas`, `alamat`, `no_telp`, `password`, `id_siswa`, `email`)
VALUES
	('666','jevi',0,'tidar','08113258381','202cb962ac59075b964b07152d234b70',0,'jevi@gmail.com');

/*!40000 ALTER TABLE `siswa` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table spp
# ------------------------------------------------------------

DROP TABLE IF EXISTS `spp`;

CREATE TABLE `spp` (
  `id_spp` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `bulan` enum('januari','februari','maret','april','mei','juni','juli','agustus','september','oktober','november','desember') DEFAULT NULL,
  PRIMARY KEY (`id_spp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `spp` WRITE;
/*!40000 ALTER TABLE `spp` DISABLE KEYS */;

INSERT INTO `spp` (`id_spp`, `tahun`, `nominal`, `bulan`)
VALUES
	(0,2022,500000,'agustus'),
	(2,2022,500000,'februari'),
	(3,2022,500000,'maret'),
	(4,2022,500000,'april'),
	(5,2022,500000,'mei'),
	(6,2022,500000,'juni'),
	(7,2022,500000,'juli'),
	(8,2022,500000,'agustus'),
	(9,2022,500000,'september'),
	(10,2022,500000,'oktober'),
	(11,2022,500000,'november'),
	(12,2022,500000,'desember');

/*!40000 ALTER TABLE `spp` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
