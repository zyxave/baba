-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: main_ilpc
-- ------------------------------------------------------
-- Server version	5.7.20-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `nrp_npk` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `id_kompetisi` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `berita`
--

DROP TABLE IF EXISTS `berita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `berita` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` text NOT NULL,
  `isi` text NOT NULL,
  `tanggal` date NOT NULL,
  `tipe` enum('berita','article') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `berita`
--

LOCK TABLES `berita` WRITE;
/*!40000 ALTER TABLE `berita` DISABLE KEYS */;
/*!40000 ALTER TABLE `berita` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `guru`
--

DROP TABLE IF EXISTS `guru`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `guru` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telp` varchar(25) NOT NULL,
  `alergi` varchar(150) NOT NULL,
  `vegetarian` enum('YA','TIDAK') NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `id_sekolah` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=279 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guru`
--

LOCK TABLES `guru` WRITE;
/*!40000 ALTER TABLE `guru` DISABLE KEYS */;
/*!40000 ALTER TABLE `guru` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hotel`
--

DROP TABLE IF EXISTS `hotel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hotel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(500) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `telp` varchar(500) NOT NULL,
  `fax` varchar(500) NOT NULL,
  `Tipe` enum('Hotel','Guest House') NOT NULL,
  `rating` varchar(500) NOT NULL,
  `situs` varchar(500) NOT NULL,
  `idkompetisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotel`
--

LOCK TABLES `hotel` WRITE;
/*!40000 ALTER TABLE `hotel` DISABLE KEYS */;
/*!40000 ALTER TABLE `hotel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kabupaten`
--

DROP TABLE IF EXISTS `kabupaten`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kabupaten` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `nama` varchar(40) NOT NULL,
  `id_provinsi` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=516 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kabupaten`
--

LOCK TABLES `kabupaten` WRITE;
/*!40000 ALTER TABLE `kabupaten` DISABLE KEYS */;
/*!40000 ALTER TABLE `kabupaten` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `klarifikasi_isian`
--

DROP TABLE IF EXISTS `klarifikasi_isian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `klarifikasi_isian` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `pertanyaan` text NOT NULL,
  `jawaban` text NOT NULL,
  `waktu_kirim` time NOT NULL,
  `waktu_jawab` time NOT NULL,
  `id_admin` smallint(6) NOT NULL,
  `id_tim` smallint(6) NOT NULL,
  `id_soal_isian` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `klarifikasi_isian`
--

LOCK TABLES `klarifikasi_isian` WRITE;
/*!40000 ALTER TABLE `klarifikasi_isian` DISABLE KEYS */;
/*!40000 ALTER TABLE `klarifikasi_isian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `klarifikasi_pemrograman`
--

DROP TABLE IF EXISTS `klarifikasi_pemrograman`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `klarifikasi_pemrograman` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `pertanyaan` text NOT NULL,
  `jawaban` text,
  `waktu_kirim` time NOT NULL,
  `waktu_jawab` time DEFAULT NULL,
  `id_admin` smallint(6) DEFAULT NULL,
  `id_tim` smallint(6) NOT NULL,
  `id_soal_pemrograman` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=679 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `klarifikasi_pemrograman`
--

LOCK TABLES `klarifikasi_pemrograman` WRITE;
/*!40000 ALTER TABLE `klarifikasi_pemrograman` DISABLE KEYS */;
/*!40000 ALTER TABLE `klarifikasi_pemrograman` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `klarifikasi_pilgan`
--

DROP TABLE IF EXISTS `klarifikasi_pilgan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `klarifikasi_pilgan` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `pertanyaan` text NOT NULL,
  `jawaban` text,
  `waktu_kirim` time NOT NULL,
  `waktu_jawab` time DEFAULT NULL,
  `id_admin` smallint(6) DEFAULT NULL,
  `id_tim` smallint(6) NOT NULL,
  `id_soal_pilgan` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=523 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `klarifikasi_pilgan`
--

LOCK TABLES `klarifikasi_pilgan` WRITE;
/*!40000 ALTER TABLE `klarifikasi_pilgan` DISABLE KEYS */;
/*!40000 ALTER TABLE `klarifikasi_pilgan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kompetisi`
--

DROP TABLE IF EXISTS `kompetisi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kompetisi` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `tahun` year(4) NOT NULL,
  `tema` varchar(200) NOT NULL,
  `max_jum_tim` smallint(6) NOT NULL,
  `status` enum('buka','tutup') NOT NULL,
  `biaya_pendaftaran1` bigint(20) NOT NULL,
  `tgl_awal_gelombang1` date NOT NULL,
  `tgl_akhir_gelombang1` date NOT NULL,
  `biaya_pendaftaran2` bigint(20) NOT NULL,
  `tgl_awal_gelombang2` date NOT NULL,
  `tgl_akhir_gelombang2` date NOT NULL,
  `poin_benar` tinyint(4) NOT NULL,
  `poin_salah` tinyint(4) NOT NULL,
  `poin_kosong` tinyint(4) NOT NULL,
  `max_poin_ac` int(11) NOT NULL,
  `time_freeze` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kompetisi`
--

LOCK TABLES `kompetisi` WRITE;
/*!40000 ALTER TABLE `kompetisi` DISABLE KEYS */;
/*!40000 ALTER TABLE `kompetisi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kontes_isian`
--

DROP TABLE IF EXISTS `kontes_isian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kontes_isian` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `jml_soal` smallint(6) NOT NULL,
  `id_admin` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kontes_isian`
--

LOCK TABLES `kontes_isian` WRITE;
/*!40000 ALTER TABLE `kontes_isian` DISABLE KEYS */;
/*!40000 ALTER TABLE `kontes_isian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kontes_pemrograman`
--

DROP TABLE IF EXISTS `kontes_pemrograman`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kontes_pemrograman` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `jml_soal` smallint(6) NOT NULL,
  `start_freeze` time NOT NULL,
  `id_admin` smallint(6) NOT NULL,
  `scoreboard_name` varchar(30) DEFAULT NULL,
  `end_freeze` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=172 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kontes_pemrograman`
--

LOCK TABLES `kontes_pemrograman` WRITE;
/*!40000 ALTER TABLE `kontes_pemrograman` DISABLE KEYS */;
/*!40000 ALTER TABLE `kontes_pemrograman` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kontes_pilgan`
--

DROP TABLE IF EXISTS `kontes_pilgan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kontes_pilgan` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `jml_soal` smallint(6) NOT NULL,
  `id_admin` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kontes_pilgan`
--

LOCK TABLES `kontes_pilgan` WRITE;
/*!40000 ALTER TABLE `kontes_pilgan` DISABLE KEYS */;
/*!40000 ALTER TABLE `kontes_pilgan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mengikuti_kontes_isian`
--

DROP TABLE IF EXISTS `mengikuti_kontes_isian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mengikuti_kontes_isian` (
  `id_kontes_isian` smallint(6) NOT NULL AUTO_INCREMENT,
  `id_tim` smallint(6) NOT NULL,
  `jam_ikut` time NOT NULL,
  `score` int(11) NOT NULL,
  PRIMARY KEY (`id_kontes_isian`,`id_tim`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mengikuti_kontes_isian`
--

LOCK TABLES `mengikuti_kontes_isian` WRITE;
/*!40000 ALTER TABLE `mengikuti_kontes_isian` DISABLE KEYS */;
/*!40000 ALTER TABLE `mengikuti_kontes_isian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mengikuti_kontes_pemrograman`
--

DROP TABLE IF EXISTS `mengikuti_kontes_pemrograman`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mengikuti_kontes_pemrograman` (
  `id_kontes_pemrograman` smallint(6) NOT NULL AUTO_INCREMENT,
  `id_tim` smallint(6) NOT NULL,
  `jam_ikut` time DEFAULT NULL,
  `score` int(11) NOT NULL,
  PRIMARY KEY (`id_kontes_pemrograman`,`id_tim`)
) ENGINE=InnoDB AUTO_INCREMENT=172 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mengikuti_kontes_pemrograman`
--

LOCK TABLES `mengikuti_kontes_pemrograman` WRITE;
/*!40000 ALTER TABLE `mengikuti_kontes_pemrograman` DISABLE KEYS */;
/*!40000 ALTER TABLE `mengikuti_kontes_pemrograman` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mengikuti_kontes_pilgan`
--

DROP TABLE IF EXISTS `mengikuti_kontes_pilgan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mengikuti_kontes_pilgan` (
  `id_kontes_pilgan` smallint(6) NOT NULL AUTO_INCREMENT,
  `id_tim` smallint(6) NOT NULL,
  `jam_ikut` time DEFAULT NULL,
  `score` smallint(6) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_kontes_pilgan`,`id_tim`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mengikuti_kontes_pilgan`
--

LOCK TABLES `mengikuti_kontes_pilgan` WRITE;
/*!40000 ALTER TABLE `mengikuti_kontes_pilgan` DISABLE KEYS */;
/*!40000 ALTER TABLE `mengikuti_kontes_pilgan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `urutan` smallint(6) NOT NULL,
  `link` varchar(150) DEFAULT NULL,
  `status` enum('YA','TIDAK') NOT NULL,
  `member` enum('YA','TIDAK','SEMUA') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `peserta`
--

DROP TABLE IF EXISTS `peserta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `peserta` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `kelas` varchar(5) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alergi` varchar(150) NOT NULL,
  `vegetarian` enum('YA','TIDAK') NOT NULL,
  `kartu_pelajar` varchar(100) NOT NULL,
  `status` enum('inti','cadangan') NOT NULL,
  `id_tim` smallint(6) NOT NULL,
  `ukuran_baju` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1418 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `peserta`
--

LOCK TABLES `peserta` WRITE;
/*!40000 ALTER TABLE `peserta` DISABLE KEYS */;
/*!40000 ALTER TABLE `peserta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pilihan`
--

DROP TABLE IF EXISTS `pilihan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pilihan` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `urutan` char(1) NOT NULL,
  `isi` text NOT NULL,
  `id_soal_pilgan` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1456 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pilihan`
--

LOCK TABLES `pilihan` WRITE;
/*!40000 ALTER TABLE `pilihan` DISABLE KEYS */;
/*!40000 ALTER TABLE `pilihan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provinsi`
--

DROP TABLE IF EXISTS `provinsi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provinsi` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provinsi`
--

LOCK TABLES `provinsi` WRITE;
/*!40000 ALTER TABLE `provinsi` DISABLE KEYS */;
/*!40000 ALTER TABLE `provinsi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sekolah`
--

DROP TABLE IF EXISTS `sekolah`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sekolah` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `id_kabupaten` smallint(6) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1464 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sekolah`
--

LOCK TABLES `sekolah` WRITE;
/*!40000 ALTER TABLE `sekolah` DISABLE KEYS */;
/*!40000 ALTER TABLE `sekolah` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `soal_isian`
--

DROP TABLE IF EXISTS `soal_isian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `soal_isian` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `nomor` smallint(6) NOT NULL,
  `isi` text NOT NULL,
  `id_kontes_isian` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `soal_isian`
--

LOCK TABLES `soal_isian` WRITE;
/*!40000 ALTER TABLE `soal_isian` DISABLE KEYS */;
/*!40000 ALTER TABLE `soal_isian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `soal_pemrograman`
--

DROP TABLE IF EXISTS `soal_pemrograman`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `soal_pemrograman` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `nomor` char(1) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `input` varchar(150) NOT NULL,
  `output` varchar(150) NOT NULL,
  `time_limit` float NOT NULL,
  `pembuat` varchar(100) NOT NULL,
  `id_kontes_pemrograman` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=549 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `soal_pemrograman`
--

LOCK TABLES `soal_pemrograman` WRITE;
/*!40000 ALTER TABLE `soal_pemrograman` DISABLE KEYS */;
/*!40000 ALTER TABLE `soal_pemrograman` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `soal_pilgan`
--

DROP TABLE IF EXISTS `soal_pilgan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `soal_pilgan` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `nomor` smallint(6) NOT NULL,
  `isi` text NOT NULL,
  `jawaban` text NOT NULL,
  `id_kontes_pilgan` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=292 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `soal_pilgan`
--

LOCK TABLES `soal_pilgan` WRITE;
/*!40000 ALTER TABLE `soal_pilgan` DISABLE KEYS */;
/*!40000 ALTER TABLE `soal_pilgan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `submission_pemrograman`
--

DROP TABLE IF EXISTS `submission_pemrograman`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `submission_pemrograman` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `id_soal_pemrograman` smallint(6) NOT NULL,
  `id_tim` smallint(6) NOT NULL,
  `jam` time NOT NULL,
  `bahasa` varchar(10) NOT NULL,
  `file` varchar(200) NOT NULL,
  `runtime` float DEFAULT NULL,
  `hasil` varchar(25) NOT NULL,
  `poin` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7649 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `submission_pemrograman`
--

LOCK TABLES `submission_pemrograman` WRITE;
/*!40000 ALTER TABLE `submission_pemrograman` DISABLE KEYS */;
/*!40000 ALTER TABLE `submission_pemrograman` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `submission_pilgan`
--

DROP TABLE IF EXISTS `submission_pilgan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `submission_pilgan` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `id_tim` smallint(6) NOT NULL,
  `id_soal_pilgan` smallint(6) NOT NULL,
  `jawaban` char(1) NOT NULL,
  `score` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31021 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `submission_pilgan`
--

LOCK TABLES `submission_pilgan` WRITE;
/*!40000 ALTER TABLE `submission_pilgan` DISABLE KEYS */;
/*!40000 ALTER TABLE `submission_pilgan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tim`
--

DROP TABLE IF EXISTS `tim`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tim` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(25) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `bukti_transfer` varchar(200) NOT NULL,
  `nominal` bigint(20) NOT NULL DEFAULT '0',
  `id_kompetisi` smallint(6) NOT NULL,
  `id_guru_pendamping` smallint(6) NOT NULL,
  `login_token` char(32) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=649 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tim`
--

LOCK TABLES `tim` WRITE;
/*!40000 ALTER TABLE `tim` DISABLE KEYS */;
/*!40000 ALTER TABLE `tim` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tim_kontes_isian`
--

DROP TABLE IF EXISTS `tim_kontes_isian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tim_kontes_isian` (
  `id_kontes_isian` smallint(6) NOT NULL AUTO_INCREMENT,
  `id_tim` smallint(6) NOT NULL,
  `jam_ikut` time NOT NULL,
  `score` smallint(6) NOT NULL,
  PRIMARY KEY (`id_kontes_isian`,`id_tim`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tim_kontes_isian`
--

LOCK TABLES `tim_kontes_isian` WRITE;
/*!40000 ALTER TABLE `tim_kontes_isian` DISABLE KEYS */;
/*!40000 ALTER TABLE `tim_kontes_isian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tim_password_reset`
--

DROP TABLE IF EXISTS `tim_password_reset`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tim_password_reset` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `expired_time` datetime NOT NULL,
  `reset_time` datetime DEFAULT NULL,
  `reset_token` varchar(200) NOT NULL,
  `id_tim` smallint(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_tim` (`id_tim`),
  CONSTRAINT `fk_timpasswordreset_tim_id` FOREIGN KEY (`id_tim`) REFERENCES `tim` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tim_password_reset`
--

LOCK TABLES `tim_password_reset` WRITE;
/*!40000 ALTER TABLE `tim_password_reset` DISABLE KEYS */;
/*!40000 ALTER TABLE `tim_password_reset` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'main_ilpc'
--

--
-- Dumping routines for database 'main_ilpc'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-01-20 22:26:01
