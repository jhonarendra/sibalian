/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.30-MariaDB : Database - topik_khusus
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id_admin` int(10) NOT NULL AUTO_INCREMENT,
  `nama_admin` int(10) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

/*Table structure for table `apotek` */

DROP TABLE IF EXISTS `apotek`;

CREATE TABLE `apotek` (
  `id_apotek` int(10) NOT NULL AUTO_INCREMENT,
  `nama_apotek` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_apotek`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `apotek` */

/*Table structure for table `detail_obat` */

DROP TABLE IF EXISTS `detail_obat`;

CREATE TABLE `detail_obat` (
  `id_detail` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_obat` int(10) unsigned DEFAULT NULL,
  `id_apotek` int(11) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `stok` mediumint(5) DEFAULT NULL,
  PRIMARY KEY (`id_detail`),
  KEY `id_obat` (`id_obat`),
  KEY `id_apotek` (`id_apotek`),
  CONSTRAINT `detail_obat_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`),
  CONSTRAINT `detail_obat_ibfk_2` FOREIGN KEY (`id_apotek`) REFERENCES `apotek` (`id_apotek`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `detail_obat` */

/*Table structure for table `detail_paket` */

DROP TABLE IF EXISTS `detail_paket`;

CREATE TABLE `detail_paket` (
  `id_detail_paket` int(10) unsigned NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `harga` double DEFAULT NULL,
  `id_paket` mediumint(5) unsigned NOT NULL,
  PRIMARY KEY (`id_detail_paket`),
  KEY `id_dokter` (`id_dokter`),
  KEY `id_paket` (`id_paket`),
  CONSTRAINT `detail_paket_ibfk_1` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`),
  CONSTRAINT `detail_paket_ibfk_2` FOREIGN KEY (`id_paket`) REFERENCES `paket_bayar_konsul` (`id_paket`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `detail_paket` */

/*Table structure for table `detil_konsultasi` */

DROP TABLE IF EXISTS `detil_konsultasi`;

CREATE TABLE `detil_konsultasi` (
  `id_detil_konsultasi` int(10) NOT NULL AUTO_INCREMENT,
  `id_konsultasi` int(10) DEFAULT NULL,
  `pesan` text,
  `oleh` enum('Dokter','Pasien') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_detil_konsultasi`),
  KEY `id_konsultasi` (`id_konsultasi`),
  CONSTRAINT `detil_konsultasi_ibfk_1` FOREIGN KEY (`id_konsultasi`) REFERENCES `konsultasi` (`id_konsultasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `detil_konsultasi` */

/*Table structure for table `detil_order_obat` */

DROP TABLE IF EXISTS `detil_order_obat`;

CREATE TABLE `detil_order_obat` (
  `id_detil_order_obat` int(10) NOT NULL AUTO_INCREMENT,
  `id_detail` int(10) unsigned NOT NULL,
  `id_order_obat` int(10) DEFAULT NULL,
  `jumlah_obat` mediumint(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_detil_order_obat`),
  KEY `id_transaksi` (`id_order_obat`),
  KEY `id_detail` (`id_detail`),
  CONSTRAINT `detil_order_obat_ibfk_1` FOREIGN KEY (`id_order_obat`) REFERENCES `order_obat` (`id_order_obat`),
  CONSTRAINT `detil_order_obat_ibfk_2` FOREIGN KEY (`id_detail`) REFERENCES `detail_obat` (`id_obat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `detil_order_obat` */

/*Table structure for table `dokter` */

DROP TABLE IF EXISTS `dokter`;

CREATE TABLE `dokter` (
  `id_dokter` int(11) NOT NULL AUTO_INCREMENT,
  `nama_dokter` varchar(255) DEFAULT NULL,
  `ttl_dokter` varchar(255) DEFAULT NULL,
  `no_telp_dokter` varchar(255) DEFAULT NULL,
  `alamat_dokter` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `id_kat` mediumint(5) unsigned NOT NULL,
  PRIMARY KEY (`id_dokter`),
  KEY `id_kat` (`id_kat`),
  CONSTRAINT `dokter_ibfk_1` FOREIGN KEY (`id_kat`) REFERENCES `kategori_dokter` (`id_kat`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `dokter` */

insert  into `dokter`(`id_dokter`,`nama_dokter`,`ttl_dokter`,`no_telp_dokter`,`alamat_dokter`,`created_at`,`updated_at`,`id_kat`) values (1,'Dr. Saya','Jimbaran, 11 Maret 1920','0839834093209','Jalan Bukit Jimbaran','2019-03-10 23:43:46','2019-03-10 23:43:49',1),(2,'Dr. Anonim','Denpasar, 1 Januari 1958','089399837889','Jalan PB Sudirman','2019-03-10 23:44:30','2019-03-10 23:44:33',2),(3,'Dr. Putu','Kuta, 1 Juli 1976','087698765432','Jalan By Pass Ngurah Rai','2019-03-10 23:45:11','2019-03-10 23:45:13',3);

/*Table structure for table `histori_pembayaran` */

DROP TABLE IF EXISTS `histori_pembayaran`;

CREATE TABLE `histori_pembayaran` (
  `id_pembayaran` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` bigint(20) unsigned NOT NULL,
  `tgl_pembayaran` datetime DEFAULT NULL,
  `id_detail_konsul` int(10) unsigned DEFAULT NULL,
  `id_order_obat` int(10) NOT NULL,
  PRIMARY KEY (`id_pembayaran`),
  KEY `id_detail_konsul` (`id_detail_konsul`),
  KEY `id_user` (`id_user`),
  KEY `id_order_obat` (`id_order_obat`),
  CONSTRAINT `histori_pembayaran_ibfk_1` FOREIGN KEY (`id_detail_konsul`) REFERENCES `detail_paket` (`id_detail_paket`),
  CONSTRAINT `histori_pembayaran_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  CONSTRAINT `histori_pembayaran_ibfk_3` FOREIGN KEY (`id_order_obat`) REFERENCES `order_obat` (`id_order_obat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `histori_pembayaran` */

/*Table structure for table `jenis_obat` */

DROP TABLE IF EXISTS `jenis_obat`;

CREATE TABLE `jenis_obat` (
  `id_jenis_obat` tinyint(5) unsigned NOT NULL AUTO_INCREMENT,
  `nama_jenis_obat` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_jenis_obat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `jenis_obat` */

/*Table structure for table `kategori_dokter` */

DROP TABLE IF EXISTS `kategori_dokter`;

CREATE TABLE `kategori_dokter` (
  `id_kat` mediumint(5) unsigned NOT NULL AUTO_INCREMENT,
  `nama_kat` varchar(199) DEFAULT NULL,
  PRIMARY KEY (`id_kat`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `kategori_dokter` */

insert  into `kategori_dokter`(`id_kat`,`nama_kat`) values (1,'Umum'),(2,'Spesialis Anak'),(3,'Spesialis Kandungan');

/*Table structure for table `konsultasi` */

DROP TABLE IF EXISTS `konsultasi`;

CREATE TABLE `konsultasi` (
  `id_konsultasi` int(10) NOT NULL AUTO_INCREMENT,
  `id_pasien` int(10) DEFAULT NULL,
  `id_dokter` int(10) DEFAULT NULL,
  `biaya_konsultasi` int(11) DEFAULT NULL,
  `id_user` bigint(20) unsigned NOT NULL,
  `tgl_start` datetime DEFAULT NULL,
  `tgl_selesai` datetime DEFAULT NULL,
  PRIMARY KEY (`id_konsultasi`),
  KEY `id_pasien` (`id_pasien`),
  KEY `id_dokter` (`id_dokter`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `konsultasi_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`),
  CONSTRAINT `konsultasi_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`),
  CONSTRAINT `konsultasi_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `konsultasi` */

/*Table structure for table `kurir` */

DROP TABLE IF EXISTS `kurir`;

CREATE TABLE `kurir` (
  `id_kurir` int(10) NOT NULL AUTO_INCREMENT,
  `nama_kurir` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_kurir`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kurir` */

/*Table structure for table `obat` */

DROP TABLE IF EXISTS `obat`;

CREATE TABLE `obat` (
  `id_obat` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_obat` varchar(50) NOT NULL,
  `id_jenis_obat` tinyint(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_obat`),
  KEY `id_jenis_obat` (`id_jenis_obat`),
  CONSTRAINT `obat_ibfk_1` FOREIGN KEY (`id_jenis_obat`) REFERENCES `jenis_obat` (`id_jenis_obat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `obat` */

/*Table structure for table `order_obat` */

DROP TABLE IF EXISTS `order_obat`;

CREATE TABLE `order_obat` (
  `id_order_obat` int(10) NOT NULL AUTO_INCREMENT,
  `id_pasien` int(10) DEFAULT NULL,
  `id_kurir` int(10) DEFAULT NULL,
  `id_dokter` int(10) DEFAULT NULL,
  `resep_dokter` text,
  `total` int(10) DEFAULT NULL,
  `status` enum('Lunas','Belum Bayar') DEFAULT NULL,
  `bukti_pembayaran` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_order_obat`),
  KEY `id_pasien` (`id_pasien`),
  KEY `id_kurir` (`id_kurir`),
  KEY `id_dokter` (`id_dokter`),
  CONSTRAINT `order_obat_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`),
  CONSTRAINT `order_obat_ibfk_3` FOREIGN KEY (`id_kurir`) REFERENCES `kurir` (`id_kurir`),
  CONSTRAINT `order_obat_ibfk_4` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `order_obat` */

/*Table structure for table `paket_bayar_konsul` */

DROP TABLE IF EXISTS `paket_bayar_konsul`;

CREATE TABLE `paket_bayar_konsul` (
  `id_paket` mediumint(5) unsigned NOT NULL,
  `nm_jenis` varchar(50) NOT NULL COMMENT 'id paket berisi paket pembayaran untuk user apakah per minggu bulan dsb...',
  PRIMARY KEY (`id_paket`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `paket_bayar_konsul` */

/*Table structure for table `pasien` */

DROP TABLE IF EXISTS `pasien`;

CREATE TABLE `pasien` (
  `id_pasien` int(10) NOT NULL AUTO_INCREMENT,
  `nama_pasien` varchar(255) DEFAULT NULL,
  `ttl_pasien` varchar(255) DEFAULT NULL,
  `alamat_pasien` varchar(255) DEFAULT NULL,
  `nomor_KTP_pasien` varchar(255) DEFAULT NULL,
  `no_telp_pasien` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_pasien`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pasien` */

/*Table structure for table `riwayat_penyakit` */

DROP TABLE IF EXISTS `riwayat_penyakit`;

CREATE TABLE `riwayat_penyakit` (
  `id_riwayat_penyakit` int(10) NOT NULL AUTO_INCREMENT,
  `id_pasien` int(10) DEFAULT NULL,
  `penyakit` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_riwayat_penyakit`),
  KEY `id_pasien` (`id_pasien`),
  CONSTRAINT `riwayat_penyakit_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `riwayat_penyakit` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(255) DEFAULT NULL,
  `saldo` double DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
