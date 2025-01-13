-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table siakad_db.dosen: ~4 rows (approximately)
DELETE FROM `dosen`;
INSERT INTO `dosen` (`id`, `user_id`, `nip`, `nama`, `departemen`, `created_at`, `updated_at`) VALUES
	(3, 4, '10019', 'siska', 'FK Informatika', '2025-01-03 08:15:32', '2025-01-09 08:49:03'),
	(5, 6, '1009', 'Tubagus', 'Fakultas Kedokteran', '2025-01-06 06:06:51', '2025-01-06 06:06:51'),
	(6, 7, '0019', 'piwit', 'apa aja', '2025-01-06 06:50:12', '2025-01-06 06:50:12'),
	(7, 8, '21425', 'vfbfdfd', 'gdgfdgd', '2025-01-06 08:49:09', '2025-01-06 08:49:09');

-- Dumping data for table siakad_db.jadwal_perkuliahan: ~2 rows (approximately)
DELETE FROM `jadwal_perkuliahan`;
INSERT INTO `jadwal_perkuliahan` (`id`, `mata_kuliah_id`, `dosen_id`, `hari`, `jam_mulai`, `jam_selesai`, `ruangan`, `created_at`, `updated_at`, `semester`) VALUES
	(12, 17, 3, 'Senin', '08:48:00', '09:50:00', 'A1', '2025-01-09 01:48:20', '2025-01-09 01:48:20', '1'),
	(13, 18, 5, 'Senin', '08:50:00', '20:50:00', 'Private', '2025-01-09 01:51:05', '2025-01-09 01:51:05', '1');

-- Dumping data for table siakad_db.khs: ~0 rows (approximately)
DELETE FROM `khs`;

-- Dumping data for table siakad_db.krs: ~3 rows (approximately)
DELETE FROM `krs`;
INSERT INTO `krs` (`id`, `mahasiswa_id`, `mata_kuliah_id`, `semester`, `created_at`, `updated_at`, `jadwal_id`, `nilai`) VALUES
	(1, 10, 18, 3, '2025-01-09 02:22:52', '2025-01-09 02:22:52', 13, 'A'),
	(2, 10, 17, 1, '2025-01-10 02:01:21', '2025-01-10 02:02:05', 12, 'A'),
	(3, 14, 17, 1, '2025-01-10 02:01:24', '2025-01-10 02:02:10', 12, 'C');

-- Dumping data for table siakad_db.mahasiswa: ~2 rows (approximately)
DELETE FROM `mahasiswa`;
INSERT INTO `mahasiswa` (`id`, `user_id`, `nim`, `nama`, `jurusan`, `angkatan`, `created_at`, `updated_at`) VALUES
	(10, 10, '33211', 'cobadeh', 'Informatika', '2020', '2025-01-08 02:52:25', '2025-01-09 08:04:30'),
	(14, 15, '11222009', 'almaida', 'Informatika', '2020', '2025-01-09 08:01:08', '2025-01-09 08:04:20');

-- Dumping data for table siakad_db.mata_kuliah: ~2 rows (approximately)
DELETE FROM `mata_kuliah`;
INSERT INTO `mata_kuliah` (`id`, `dosen_id`, `kode_mk`, `nama_mk`, `sks`, `semester`, `created_at`, `updated_at`) VALUES
	(17, 4, 'A01', 'Pemograman', 3, 1, '2025-01-08 06:10:54', '2025-01-08 06:10:54'),
	(18, 6, 'A03', 'Python', 2, 3, '2025-01-09 01:50:27', '2025-01-09 01:50:27');

-- Dumping data for table siakad_db.migrations: ~13 rows (approximately)
DELETE FROM `migrations`;
INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
	(1, '2025-01-02-175651', 'App\\Database\\Migrations\\CreateTables', 'default', 'App', 1735864229, 1),
	(2, '2025-01-02-184938', 'App\\Database\\Migrations\\CreateTableNilai', 'default', 'App', 1735864229, 1),
	(3, '2025-01-03-005226', 'App\\Database\\Migrations\\AddDosenIdToUsersTable', 'default', 'App', 1735866265, 2),
	(4, '2025-01-03-010344', 'App\\Database\\Migrations\\CreateJadwalPerkuliahanTable', 'default', 'App', 1735866305, 3),
	(5, '2025-01-03-011202', 'App\\Database\\Migrations\\CreateKrsTable', 'default', 'App', 1735866775, 4),
	(6, '2025-01-03-011758', 'App\\Database\\Migrations\\AddJadwalIdToKrsTable', 'default', 'App', 1735867111, 5),
	(7, '2025-01-03-012546', 'App\\Database\\Migrations\\CreateNilaiMahasiswaTable', 'default', 'App', 1735867615, 6),
	(8, '2025-01-06-013129', 'App\\Database\\Migrations\\AddDosenIdToMataKuliah', 'default', 'App', 1736127139, 7),
	(9, '2025-01-06-041329', 'App\\Database\\Migrations\\AddNilaiToKrs', 'default', 'App', 1736136829, 8),
	(10, '2025-01-06-043504', 'App\\Database\\Migrations\\AddNilaiToKrs', 'default', 'App', 1736138135, 9),
	(11, '2025-01-07-011248', 'App\\Database\\Migrations\\AddNilaiToKrs', 'default', 'App', 1736212463, 10),
	(12, '2025-01-07-020540', 'App\\Database\\Migrations\\AddKHStable', 'default', 'App', 1736215922, 11),
	(13, '2025-01-09-013146', 'App\\Database\\Migrations\\AddSemestertoJadwalPerkuliahan', 'default', 'App', 1736386491, 12);

-- Dumping data for table siakad_db.nilai: ~0 rows (approximately)
DELETE FROM `nilai`;

-- Dumping data for table siakad_db.nilai_mahasiswa: ~0 rows (approximately)
DELETE FROM `nilai_mahasiswa`;

-- Dumping data for table siakad_db.users: ~10 rows (approximately)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `username`, `password`, `role`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'Admin123', 'admin', '2025-01-03 07:31:12', '2025-01-03 07:31:14'),
	(2, 'alma', '$2y$10$IA1ctvIkEdqHO8aD1SWrOOnlXP638dg58uhGmNxvrfhGPifi6tvRa', 'mahasiswa', '2025-01-03 07:46:28', '2025-01-03 07:46:29'),
	(4, '10019', '$2y$10$IA1ctvIkEdqHO8aD1SWrOOnlXP638dg58uhGmNxvrfhGPifi6tvRa', 'dosen', '2025-01-03 08:15:32', '2025-01-03 08:15:32'),
	(5, 'admin1', '$2y$10$Tsbyww2.udzGllwyEGIHJOAcE59DFoSTEYaJTNTC3j/rvmt0j/qlu', 'admin', '2025-01-06 06:04:16', '2025-01-06 06:04:16'),
	(6, '1009', '$2y$10$gVLj8sUdXSC2d5v28vjhAunztLJkk4OfscE7OwJYcpWV8e.Vcml5.', 'dosen', '2025-01-06 06:06:51', '2025-01-06 06:06:51'),
	(7, '0019', '$2y$10$NCsYqeYgX0f90sYM2ZXtueY4RD8VZrgXD3WR9kHPBBuXPRVT3iTkG', 'dosen', '2025-01-06 06:50:12', '2025-01-06 06:50:12'),
	(8, '21425', '$2y$10$PhV2re80z3hqz1MYXYa7RuiQ8ZjfK2u0Ai6MASORqZM0CvLYsclaS', 'dosen', '2025-01-06 08:49:09', '2025-01-06 08:49:09'),
	(10, '33211', '$2y$10$2QGzaABNolW6tsmtojAtt.a2nfmdJa5Lgw51C3eYGpI4RjP1SnO52', 'mahasiswa', '2025-01-08 02:52:25', '2025-01-08 02:52:25'),
	(11, '113568', '$2y$10$V3tb.OBEhSO0he1hgUXyq.SiCjz93cUvX8FPnEq2OcQ.moPpA8U6e', 'dosen', '2025-01-08 02:58:13', '2025-01-08 02:58:13'),
	(15, '11222009', '$2y$10$oTSMsGTWwM/QtRSyx8Z.HueTL/bnvAVzGEergtzjQE/bk.9Ml/ln.', 'mahasiswa', '2025-01-09 08:01:08', '2025-01-09 08:01:08');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
