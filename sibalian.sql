/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.30-MariaDB : Database - sibalian
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `admins` */

DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `admins` */

insert  into `admins`(`id`,`nama`,`alamat`,`telp`,`email`,`password`,`remember_token`,`created_at`,`updated_at`) values (1,'Putu Gede','Jalan Bukit Jimbaran','081234567890','putugede@gmail.com','$2y$10$FNUsmf6uMXgRgt3YjOeXOeDgsAMxgpmIg.aGOgfLcfi.6rQG9rUUa',NULL,'2019-03-18 03:09:37','2019-03-18 03:09:37'),(2,'Sutanto','Jalan PB Sudirman, Denpasar','08383473647','sutanto@gmail.com','$2y$10$p4fm3uurE.7NyZqHzkSLKujEVLg6BGP26equb/6dkcVl8wfDIouvG',NULL,'2019-03-18 03:09:38','2019-03-18 03:09:38'),(3,'Made Dwi','Badung','08373848343','madedwi@gmail.com','$2y$10$3sv71p.Lov4sjGhQ98koVej5CUnW5xxL4UPR8BYQlc8N4mHpzao/6',NULL,'2019-03-18 03:09:38','2019-03-18 03:09:38'),(4,'Eka','Buleleng','08278738281','eka@gmail.com','$2y$10$OYToOAg21PwZ7ctm68Vo2.pUfSX/qc.4WkeoJ1ZGUQq1NX9CxVnxW',NULL,'2019-03-18 03:09:38','2019-03-18 03:09:38'),(5,'Komang','Jalan By Pass Ngurah Rai','083736363','komang@unud.ac.id','$2y$10$dN9vFupjQxhbHQiMEW9E4elDgFrfgPyaxSR2DtmIW/oONYA5ipX2S',NULL,'2019-03-18 03:09:39','2019-03-18 03:09:39');

/*Table structure for table `apoteks` */

DROP TABLE IF EXISTS `apoteks`;

CREATE TABLE `apoteks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_apotek` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `apoteks_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `apoteks` */

/*Table structure for table `balasans` */

DROP TABLE IF EXISTS `balasans`;

CREATE TABLE `balasans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` bigint(20) unsigned NOT NULL,
  `id_dokter` bigint(20) unsigned NOT NULL,
  `balasan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `balasans_id_user_foreign` (`id_user`),
  KEY `balasans_id_dokter_foreign` (`id_dokter`),
  CONSTRAINT `balasans_id_dokter_foreign` FOREIGN KEY (`id_dokter`) REFERENCES `dokters` (`id`),
  CONSTRAINT `balasans_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `balasans` */

/*Table structure for table `detail_konsultasis` */

DROP TABLE IF EXISTS `detail_konsultasis`;

CREATE TABLE `detail_konsultasis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_konsultasi` bigint(20) unsigned NOT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `oleh` enum('dokter','pasien') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `detail_konsultasis_id_konsultasi_foreign` (`id_konsultasi`),
  CONSTRAINT `detail_konsultasis_id_konsultasi_foreign` FOREIGN KEY (`id_konsultasi`) REFERENCES `konsultasis` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `detail_konsultasis` */

/*Table structure for table `detail_obats` */

DROP TABLE IF EXISTS `detail_obats`;

CREATE TABLE `detail_obats` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_obat` bigint(20) unsigned NOT NULL,
  `id_apotek` bigint(20) unsigned NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `detail_obats_id_obat_foreign` (`id_obat`),
  KEY `detail_obats_id_apotek_foreign` (`id_apotek`),
  CONSTRAINT `detail_obats_id_apotek_foreign` FOREIGN KEY (`id_apotek`) REFERENCES `apoteks` (`id`),
  CONSTRAINT `detail_obats_id_obat_foreign` FOREIGN KEY (`id_obat`) REFERENCES `obats` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `detail_obats` */

/*Table structure for table `detail_order_obats` */

DROP TABLE IF EXISTS `detail_order_obats`;

CREATE TABLE `detail_order_obats` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_detail_obat` bigint(20) unsigned NOT NULL,
  `id_order_obat` bigint(20) unsigned NOT NULL,
  `jumlah_obat` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `detail_order_obats_id_detail_obat_foreign` (`id_detail_obat`),
  KEY `detail_order_obats_id_order_obat_foreign` (`id_order_obat`),
  CONSTRAINT `detail_order_obats_id_detail_obat_foreign` FOREIGN KEY (`id_detail_obat`) REFERENCES `detail_obats` (`id`),
  CONSTRAINT `detail_order_obats_id_order_obat_foreign` FOREIGN KEY (`id_order_obat`) REFERENCES `order_obats` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `detail_order_obats` */

/*Table structure for table `detail_pakets` */

DROP TABLE IF EXISTS `detail_pakets`;

CREATE TABLE `detail_pakets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_dokter` bigint(20) unsigned NOT NULL,
  `harga` int(11) NOT NULL,
  `id_paket` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `detail_pakets_id_dokter_foreign` (`id_dokter`),
  KEY `detail_pakets_id_paket_foreign` (`id_paket`),
  CONSTRAINT `detail_pakets_id_dokter_foreign` FOREIGN KEY (`id_dokter`) REFERENCES `dokters` (`id`),
  CONSTRAINT `detail_pakets_id_paket_foreign` FOREIGN KEY (`id_paket`) REFERENCES `paket_bayars` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `detail_pakets` */

/*Table structure for table `dokters` */

DROP TABLE IF EXISTS `dokters`;

CREATE TABLE `dokters` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_dokter` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ttl_dokter` date NOT NULL,
  `telp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kategori` bigint(20) unsigned NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `dokters_email_unique` (`email`),
  KEY `dokters_id_kategori_foreign` (`id_kategori`),
  CONSTRAINT `dokters_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_dokters` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `dokters` */

/*Table structure for table `history_pembayarans` */

DROP TABLE IF EXISTS `history_pembayarans`;

CREATE TABLE `history_pembayarans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` bigint(20) unsigned NOT NULL,
  `tgl_pembayaran` datetime NOT NULL,
  `id_detail_konsul` bigint(20) unsigned NOT NULL,
  `id_order_obat` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `history_pembayarans_id_user_foreign` (`id_user`),
  KEY `history_pembayarans_id_detail_konsul_foreign` (`id_detail_konsul`),
  KEY `history_pembayarans_id_order_obat_foreign` (`id_order_obat`),
  CONSTRAINT `history_pembayarans_id_detail_konsul_foreign` FOREIGN KEY (`id_detail_konsul`) REFERENCES `detail_konsultasis` (`id`),
  CONSTRAINT `history_pembayarans_id_order_obat_foreign` FOREIGN KEY (`id_order_obat`) REFERENCES `order_obats` (`id`),
  CONSTRAINT `history_pembayarans_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `history_pembayarans` */

/*Table structure for table `jenis_obats` */

DROP TABLE IF EXISTS `jenis_obats`;

CREATE TABLE `jenis_obats` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_jenis_obat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `jenis_obats` */

/*Table structure for table `kategori_dokters` */

DROP TABLE IF EXISTS `kategori_dokters`;

CREATE TABLE `kategori_dokters` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `kategori_dokters` */

insert  into `kategori_dokters`(`id`,`nama_kategori`,`created_at`,`updated_at`) values (1,'Umum','2019-03-18 03:09:40','2019-03-18 03:09:40'),(2,'Spesialis Anak','2019-03-18 03:09:40','2019-03-18 03:09:40'),(3,'Spesialis Kandungan','2019-03-18 03:09:40','2019-03-18 03:09:40'),(4,'Spesialis Kulit','2019-03-18 03:09:40','2019-03-18 03:09:40');

/*Table structure for table `konsultasis` */

DROP TABLE IF EXISTS `konsultasis`;

CREATE TABLE `konsultasis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_dokter` bigint(20) unsigned NOT NULL,
  `biaya_konsultasi` int(11) NOT NULL,
  `id_user` bigint(20) unsigned NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `konsultasis_id_dokter_foreign` (`id_dokter`),
  KEY `konsultasis_id_user_foreign` (`id_user`),
  CONSTRAINT `konsultasis_id_dokter_foreign` FOREIGN KEY (`id_dokter`) REFERENCES `dokters` (`id`),
  CONSTRAINT `konsultasis_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `konsultasis` */

/*Table structure for table `kurirs` */

DROP TABLE IF EXISTS `kurirs`;

CREATE TABLE `kurirs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kurirs_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `kurirs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=171 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (145,'2014_10_12_000000_create_users_table',1),(146,'2014_10_12_100000_create_password_resets_table',1),(147,'2019_03_13_065708_create_apoteks_table',1),(148,'2019_03_13_070139_create_admins_table',1),(149,'2019_03_13_070312_create_jenis_obats_table',1),(150,'2019_03_13_070348_create_obats_table',1),(151,'2019_03_13_070558_create_detail_obats_table',1),(152,'2019_03_13_071925_create_kategori_dokters_table',1),(153,'2019_03_13_072141_create_dokters_table',1),(154,'2019_03_13_072528_create_pasiens_table',1),(155,'2019_03_13_072752_create_konsultasis_table',1),(156,'2019_03_13_073222_create_paket_bayars_table',1),(157,'2019_03_13_073302_create_detail_pakets_table',1),(158,'2019_03_13_073436_create_detail_konsultasis_table',1),(159,'2019_03_13_073804_create_kurirs_table',1),(160,'2019_03_13_073916_create_order_obats_table',1),(161,'2019_03_13_074242_create_detail_order_obats_table',1),(162,'2019_03_13_074722_create_history_pembayarans_table',1),(163,'2019_03_13_075017_create_riwayat_penyakits_table',1),(164,'2019_03_13_223319_update_konsultasis_table',1),(165,'2019_03_13_224640_delete_id_pasien_on_konsultasis_table',1),(166,'2019_03_13_231023_update_order_obats_table',1),(167,'2019_03_13_231603_update_order_obats_table_riwayat_penyakit_table_users_table',1),(168,'2019_03_13_232944_update_riwayat_penyakits_table',1),(169,'2019_03_18_030244_create_topiks_table',1),(170,'2019_03_18_030602_create_balasans_table',1);

/*Table structure for table `obats` */

DROP TABLE IF EXISTS `obats`;

CREATE TABLE `obats` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_obat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jenis_obat` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `obats_id_jenis_obat_foreign` (`id_jenis_obat`),
  CONSTRAINT `obats_id_jenis_obat_foreign` FOREIGN KEY (`id_jenis_obat`) REFERENCES `jenis_obats` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `obats` */

/*Table structure for table `order_obats` */

DROP TABLE IF EXISTS `order_obats`;

CREATE TABLE `order_obats` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_kurir` bigint(20) unsigned NOT NULL,
  `id_dokter` bigint(20) unsigned NOT NULL,
  `resep_dokter` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  `status` enum('lunas','belum_lunas') COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti_pembayaran` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_user` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_obats_id_kurir_foreign` (`id_kurir`),
  KEY `order_obats_id_dokter_foreign` (`id_dokter`),
  KEY `order_obats_id_user_foreign` (`id_user`),
  CONSTRAINT `order_obats_id_dokter_foreign` FOREIGN KEY (`id_dokter`) REFERENCES `dokters` (`id`),
  CONSTRAINT `order_obats_id_kurir_foreign` FOREIGN KEY (`id_kurir`) REFERENCES `kurirs` (`id`),
  CONSTRAINT `order_obats_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `order_obats` */

/*Table structure for table `paket_bayars` */

DROP TABLE IF EXISTS `paket_bayars`;

CREATE TABLE `paket_bayars` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `jenis_paket` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `paket_bayars` */

/*Table structure for table `pasiens` */

DROP TABLE IF EXISTS `pasiens`;

CREATE TABLE `pasiens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal lahir` date NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_ktp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pasiens_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pasiens` */

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `riwayat_penyakits` */

DROP TABLE IF EXISTS `riwayat_penyakits`;

CREATE TABLE `riwayat_penyakits` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `penyakit` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_user` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `riwayat_penyakits_id_user_foreign` (`id_user`),
  CONSTRAINT `riwayat_penyakits_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `riwayat_penyakits` */

/*Table structure for table `topiks` */

DROP TABLE IF EXISTS `topiks`;

CREATE TABLE `topiks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` bigint(20) unsigned NOT NULL,
  `judul_topik` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail_topik` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `topiks_id_user_foreign` (`id_user`),
  CONSTRAINT `topiks_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `topiks` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`,`alamat`,`telp`) values (1,'Hani','hani@gmail.com',NULL,'$2y$10$5Bc.y0/JEZlpMRgubcaBLefIVZD22NMx.57IT3UNN47rUV.pm8Ouq',NULL,'2019-03-18 03:09:39','2019-03-18 03:09:39','Jalan Legian Kuta 88x','08273837445'),(2,'Ketut','ketut@gmail.com',NULL,'$2y$10$wC.VAe6xbmC/4wrYFXxRSO1TBu/XE9g8m2apxLbflfnSu15pXLi/K',NULL,'2019-03-18 03:09:39','2019-03-18 03:09:39','Denpasar Selatan','08734857283'),(3,'Lily','lily@gmail.com',NULL,'$2y$10$E/OQ7e/EWjQfIruhNMRNJO6XAlpwmIRvh3wbNuUoBhqXTlGOKTtmC',NULL,'2019-03-18 03:09:40','2019-03-18 03:09:40','Kedonganan','08798786526'),(4,'Winda','winda@gmail.com',NULL,'$2y$10$6UqelspVKoPw1U6CFyyaFeT8DIOypje9QHlGnU7AfvcqSog1SIguW',NULL,'2019-03-18 03:09:40','2019-03-18 03:09:40','Tabanan','083748572637');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
