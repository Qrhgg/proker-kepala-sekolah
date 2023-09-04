-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table laravel.absen
CREATE TABLE IF NOT EXISTS `absen` (
  `id_absen` int(5) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(5) NOT NULL,
  `kelas` varchar(5) NOT NULL,
  `ket` varchar(1) NOT NULL,
  `tgl` datetime NOT NULL,
  `bulan` varchar(25) NOT NULL,
  `petugas` varchar(200) NOT NULL,
  PRIMARY KEY (`id_absen`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table laravel.absen: 0 rows
/*!40000 ALTER TABLE `absen` DISABLE KEYS */;
/*!40000 ALTER TABLE `absen` ENABLE KEYS */;

-- Dumping structure for table laravel.data_siswa
CREATE TABLE IF NOT EXISTS `data_siswa` (
  `id_siswa` int(4) NOT NULL AUTO_INCREMENT,
  `nis` varchar(5) NOT NULL,
  `kelas` varchar(3) NOT NULL,
  `nama` varchar(150) NOT NULL,
  PRIMARY KEY (`id_siswa`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table laravel.data_siswa: ~8 rows (approximately)
/*!40000 ALTER TABLE `data_siswa` DISABLE KEYS */;
REPLACE INTO `data_siswa` (`id_siswa`, `nis`, `kelas`, `nama`) VALUES
	(1, '001', '7a', 'Adi'),
	(2, '002', '7a', 'Emi'),
	(3, '003', '7b', 'Ani'),
	(4, '004', '7b', 'Jeki'),
	(5, '005', '7c', 'Ari'),
	(6, '006', '7c', 'Joni'),
	(7, '007', '8a', 'Eri'),
	(8, '008', '8a', 'Hari');
/*!40000 ALTER TABLE `data_siswa` ENABLE KEYS */;

-- Dumping structure for table laravel.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table laravel.kategori
CREATE TABLE IF NOT EXISTS `kategori` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.kategori: ~8 rows (approximately)
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
REPLACE INTO `kategori` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
	(10, 'Umum', '2023-09-03 02:20:52', '2023-09-04 04:54:44'),
	(11, 'Kurikulum', '2023-09-03 02:53:03', '2023-09-04 04:54:58'),
	(12, 'Kemuridan', '2023-09-03 13:53:24', '2023-09-04 04:55:10'),
	(13, 'Kepegaiwan', '2023-09-04 04:55:22', '2023-09-04 04:55:22'),
	(14, 'Keuangan', '2023-09-04 04:55:34', '2023-09-04 04:55:34'),
	(15, 'Humas', '2023-09-04 04:58:47', '2023-09-04 04:58:47'),
	(16, 'Dan lain lain', '2023-09-04 04:59:11', '2023-09-04 04:59:11'),
	(17, 'rerek', '2023-09-04 08:52:22', '2023-09-04 08:52:33');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;

-- Dumping structure for table laravel.kepalasekolah
CREATE TABLE IF NOT EXISTS `kepalasekolah` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nip` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kepalasekolah` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_kepalasekolah_users` (`user_id`),
  CONSTRAINT `FK_kepalasekolah_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.kepalasekolah: ~1 rows (approximately)
/*!40000 ALTER TABLE `kepalasekolah` DISABLE KEYS */;
REPLACE INTO `kepalasekolah` (`id`, `nip`, `nama_kepalasekolah`, `alamat`, `no_hp`, `created_at`, `updated_at`, `user_id`) VALUES
	(8, '121212', 'ade wilda sari', 'padangsidempuan', '082267611085', '2023-09-03 07:42:00', '2023-09-03 07:42:00', 16),
	(9, '121213', 'sulthan', 'sabang', '082267611085', '2023-09-03 12:50:15', '2023-09-03 12:50:15', 17);
/*!40000 ALTER TABLE `kepalasekolah` ENABLE KEYS */;

-- Dumping structure for table laravel.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.migrations: ~5 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2023_09_02_102452_create_kategoris_table', 1),
	(6, '2023_09_02_161356_create_prokers_table', 2),
	(7, '2023_09_03_112156_create_kepalasekolahs_table', 3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table laravel.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table laravel.pegawai
CREATE TABLE IF NOT EXISTS `pegawai` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nuptk` varchar(100) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `no_hp` varchar(25) NOT NULL,
  `jabatan` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table laravel.pegawai: 2 rows
/*!40000 ALTER TABLE `pegawai` DISABLE KEYS */;
REPLACE INTO `pegawai` (`id`, `nuptk`, `nip`, `nama`, `no_hp`, `jabatan`) VALUES
	(1, '123456', '123456', 'Pegawai Satu', '-', 'Guru'),
	(2, '123457', '123457', 'Pegawai 2', '-', 'Guru');
/*!40000 ALTER TABLE `pegawai` ENABLE KEYS */;

-- Dumping structure for table laravel.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.personal_access_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Dumping structure for table laravel.proker
CREATE TABLE IF NOT EXISTS `proker` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_kategori` bigint(20) unsigned NOT NULL,
  `nama_proker` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anggaran` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '2',
  `semester` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `tahun` year(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_proker_kategori` (`id_kategori`),
  CONSTRAINT `FK_proker_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.proker: ~14 rows (approximately)
/*!40000 ALTER TABLE `proker` DISABLE KEYS */;
REPLACE INTO `proker` (`id`, `id_kategori`, `nama_proker`, `anggaran`, `status`, `semester`, `tahun`, `created_at`, `updated_at`) VALUES
	(11, 11, 'Persiapan Pon', '20,000,000', 1, 'Semester 2', '2016', '2023-09-03 10:55:12', '2023-09-04 09:01:04'),
	(12, 10, 'ujian un', '50,000,000', 1, 'Semester 2', '2023', '2023-09-03 10:55:32', '2023-09-04 08:42:37'),
	(13, 10, 'blabla', '100,000,000', 1, 'Semester 2', '2022', '2023-09-03 11:04:50', '2023-09-04 08:43:21'),
	(14, 11, 'hbiuh', '886,767,676', 2, 'Semester 2', '2018', '2023-09-03 13:00:21', '2023-09-04 09:01:10'),
	(15, 12, 'Penerimaan', '25,000,000', 2, 'Semester 2', '2017', '2023-09-03 13:54:13', '2023-09-04 09:01:17'),
	(16, 12, 'Pembagian Tugas Guru Kelas', '20,000,000', 1, 'Semester 2', '2023', '2023-09-03 13:56:10', '2023-09-04 11:20:32'),
	(17, 12, 'Pengisian Mutasi Siswa', '212,122,112', 2, 'Semester 2', '2021', '2023-09-03 13:56:50', '2023-09-04 09:01:32'),
	(18, 12, 'ACC', 'NaN', 2, 'Semester 2', '2017', '2023-09-03 13:57:35', '2023-09-04 09:01:39'),
	(20, 13, 'tes', '121,212,121', 1, 'Semester 1', '2024', '2023-09-04 09:00:23', '2023-09-04 10:10:06'),
	(21, 15, 'tes', '22,000,000', 2, 'Semester 1', '2023', '2023-09-04 09:00:50', '2023-09-04 09:00:50'),
	(22, 12, 'tes', '453,213,121', 2, 'Semester 1', '2016', '2023-09-04 09:02:03', '2023-09-04 09:02:03'),
	(23, 17, 'tes', '25,000,000', 1, 'Semester 2', '2017', '2023-09-04 09:02:27', '2023-09-04 10:07:01'),
	(24, 17, 'Persiapan Pon', '22,000,000', 2, 'Semester 2', '2016', '2023-09-04 09:02:52', '2023-09-04 09:02:52'),
	(25, 17, 'jjuuj', '22,000,000', 2, 'Semester 1', '2023', '2023-09-04 09:48:37', '2023-09-04 09:48:37');
/*!40000 ALTER TABLE `proker` ENABLE KEYS */;

-- Dumping structure for table laravel.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.users: ~1 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `role`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(13, 'admin', 'admin', 'admin @gmail.com', NULL, '$2y$10$oc/HL141ZSh7KRctbyzMtOjxTSdJdlmReeuNuh0DaFFCkP7NeLFRW', '98lUSYYIsoZwxHkMLLhzevRCsCN0TXW6VgomgpjGq5YZKb8CbNhF4XoiITkN', '2023-09-03 07:14:20', '2023-09-03 07:14:20'),
	(16, 'kepala_sekolah', 'ade wilda sari', 'ade wilda sari @gmail.com', NULL, '$2y$10$P33LyYmZp0ZDT4QnXyau0OYMJ92Tqn0LxxzOq9vlJDxsu1p/4xmPC', 'jI4AOKTMPiULhv5pARs6qFleFXnqqAHBz8SqUuYjAduARN8EVyUA1B2QYkJ4', '2023-09-03 07:42:00', '2023-09-03 07:42:00'),
	(17, 'kepala_sekolah', 'sulthan', 'sulthan @gmail.com', NULL, '$2y$10$bG05LkrsRVIGnmViRfycheVRJwELLZKhxgOHS6BplMxNzsPKBuvpm', 'buEO1Aupr98FqzkTDUkf5t17imYOW9ZpVKkfRrIXEOOCilZHz037myBV28UL', '2023-09-03 12:50:15', '2023-09-03 12:50:15');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
