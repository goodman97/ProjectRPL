-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2025 at 10:55 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjadwalan`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mapel` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nip` varchar(200) NOT NULL,
  `foto` longblob NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nama`, `email`, `mapel`, `username`, `password`, `nip`, `foto`, `id_role`) VALUES
(1, 'Faisal', 'gdmn97@gmail.com', 'Pembenihan', 'Gdmn', 'gdmn97', '123230097', 0x313734393930333137342e6a7067, 3);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `nama_jadwal` varchar(100) NOT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jum''at') NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `status` enum('Pending','Diterima','Ditolak','') NOT NULL,
  `gambar_jadwal` enum('pembenihan.png','pendederan.png','pembesaran.png','penangananHama.png','pemanenan.png','pakanBuatan.png','pakanAlami.png','kualitasAir.png') NOT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `id_lab` int(11) DEFAULT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `id_operator` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `nama_jadwal`, `hari`, `jam_mulai`, `jam_selesai`, `status`, `gambar_jadwal`, `id_siswa`, `id_lab`, `id_guru`, `id_operator`) VALUES
(1, 'Pembenihan XI 1', 'Kamis', '07:30:00', '08:40:00', 'Pending', 'pembenihan.png', NULL, 1, 1, 1),
(2, 'Pembenihan XI 2', 'Kamis', '08:40:00', '09:50:00', 'Pending', 'pembenihan.png', NULL, 1, 1, 1),
(3, 'Pembenihan XI 3', 'Kamis', '10:05:00', '11:15:00', 'Pending', 'pembenihan.png', NULL, 1, 1, 1),
(4, 'Pendederan XI 1', 'Rabu', '07:30:00', '08:40:00', 'Pending', 'pendederan.png', NULL, 2, NULL, 1),
(5, 'Pendederan XI 2', 'Rabu', '08:40:00', '09:50:00', 'Pending', 'pendederan.png', NULL, 2, NULL, 1),
(6, 'Pendederan XI 3', 'Rabu', '10:05:00', '11:15:00', 'Pending', 'pendederan.png', NULL, 2, NULL, 1),
(7, 'Pembesaran XI 1', 'Senin', '07:30:00', '08:40:00', 'Pending', 'pembesaran.png', NULL, 6, NULL, 1),
(8, 'Pembesaran XI 2', 'Senin', '08:40:00', '09:50:00', 'Pending', 'pembesaran.png', NULL, 6, NULL, 1),
(9, 'Pembesaran XI 3', 'Senin', '10:05:00', '11:15:00', 'Pending', 'pembesaran.png', NULL, 6, NULL, 1),
(10, 'Pemanenan XII 1', 'Jum\'at', '07:30:00', '08:40:00', 'Pending', 'pemanenan.png', NULL, 7, NULL, 1),
(11, 'Pemanenan XII 2', 'Jum\'at', '08:40:00', '09:50:00', 'Pending', 'pemanenan.png', NULL, 7, NULL, 1),
(12, 'Pemanenan XII 3', 'Jum\'at', '10:05:00', '11:15:00', 'Pending', 'pemanenan.png', NULL, 7, NULL, 1),
(13, 'Pakan Buatan X 1', 'Senin', '07:30:00', '08:40:00', 'Pending', 'pakanBuatan.png', NULL, 3, NULL, 1),
(14, 'Pakan Buatan X 2', 'Senin', '08:40:00', '09:50:00', 'Pending', 'pakanBuatan.png', NULL, 3, NULL, 1),
(15, 'Pakan Buatan X 3', 'Senin', '10:05:00', '11:15:00', 'Pending', 'pakanBuatan.png', NULL, 3, NULL, 1),
(16, 'Pakan Buatan XI 1', 'Kamis', '07:30:00', '08:40:00', 'Pending', 'pakanBuatan.png', NULL, 4, NULL, 1),
(17, 'Pakan Buatan XI 2', 'Kamis', '08:40:00', '09:50:00', 'Pending', 'pakanBuatan.png', NULL, 4, NULL, 1),
(18, 'Pakan Buatan XI 3', 'Kamis', '10:05:00', '11:15:00', 'Pending', 'pakanBuatan.png', NULL, 4, NULL, 1),
(19, 'Pakan Alami XI 1', 'Rabu', '07:30:00', '08:40:00', 'Pending', 'pakanAlami.png', NULL, 5, NULL, 1),
(20, 'Pakan Alami XI 2', 'Rabu', '08:40:00', '09:50:00', 'Pending', 'pakanAlami.png', NULL, 5, NULL, 1),
(21, 'Pakan Alami XI 3', 'Rabu', '10:05:00', '11:15:00', 'Pending', 'pakanAlami.png', NULL, 5, NULL, 1),
(22, 'Pengendalian Hama dan Penyakit XI 1', 'Selasa', '07:30:00', '08:40:00', 'Pending', 'penangananHama.png', NULL, 8, NULL, 1),
(23, 'Pengendalian Hama dan Penyakit XI 2', 'Selasa', '08:40:00', '09:50:00', 'Pending', 'penangananHama.png', NULL, 8, NULL, 1),
(24, 'Pengendalian Hama dan Penyakit XI 3', 'Selasa', '10:05:00', '11:15:00', 'Pending', 'penangananHama.png', NULL, 8, NULL, NULL),
(25, 'Kualitas Air X 1', 'Selasa', '07:30:00', '08:40:00', 'Pending', 'kualitasAir.png', NULL, 9, NULL, 1),
(26, 'Kualitas Air X 2', 'Selasa', '08:40:00', '09:50:00', 'Pending', 'kualitasAir.png', NULL, 9, NULL, 1),
(27, 'Kualitas Air X 3', 'Selasa', '10:05:00', '11:15:00', 'Pending', 'kualitasAir.png', NULL, 9, NULL, 1),
(28, 'Kualitas Air XI 1', 'Jum\'at', '07:30:00', '08:40:00', 'Pending', 'kualitasAir.png', NULL, 10, NULL, 1),
(29, 'Kualitas Air XI 2', 'Jum\'at', '08:40:00', '09:50:00', 'Pending', 'kualitasAir.png', NULL, 10, NULL, 1),
(30, 'Kualitas Air XI 3', 'Jum\'at', '10:05:00', '11:15:00', 'Pending', 'kualitasAir.png', NULL, 10, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `labolatorium`
--

CREATE TABLE `labolatorium` (
  `id_lab` int(11) NOT NULL,
  `nama_lab` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `labolatorium`
--

INSERT INTO `labolatorium` (`id_lab`, `nama_lab`, `status`, `gambar`) VALUES
(1, 'Pembenihan', 'Tersedia', 'pembenihan.png'),
(2, 'Pendederan', 'Tersedia', 'pendederan.png'),
(3, 'Pakan Buatan 1', 'Tersedia', 'pakanBuatan.png'),
(4, 'Pakan Buatan 2', 'Tidak tersedia', 'pakanBuatan.png'),
(5, 'Pakan Alami', 'Tersedia', 'pakanAlami.png'),
(6, 'Pembesaran', 'Tersedia', 'pembesaran.png'),
(7, 'Pemanenan', 'Tidak tersedia', 'pemanenan.png'),
(8, 'Pengendalian Hama & Penyakit', 'Tersedia', 'penangananHama.png'),
(9, 'Kualitas Air 1', 'Tidak tersedia', 'kualitasAir.png'),
(10, 'Kualitas Air 2', 'Tidak tersedia', 'kualitasAir.png');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_praktikum`
--

CREATE TABLE `laporan_praktikum` (
  `id_laporan` int(11) NOT NULL,
  `hasil_praktikum` int(11) NOT NULL,
  `catatan` varchar(1000) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE `operator` (
  `id_operator` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `foto` longblob NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `operator`
--

INSERT INTO `operator` (`id_operator`, `nama`, `email`, `username`, `password`, `foto`, `id_role`) VALUES
(1, 'Reyhan', 'reyrey@gmail.com', 'Mas Rey', 'admin123', 0x313735303035313238372e6a706567, 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `Nama_Role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `Nama_Role`) VALUES
(1, 'operator'),
(2, 'siswa'),
(3, 'guru');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('wdRueG45JoTmYO3sbno6Mx2VbjBE9YK7k7xKmjCO', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo4OntzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2xpaGF0amFkd2FsIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo2OiJfdG9rZW4iO3M6NDA6Imd1M3M1NkVmR3dXTndTTXlDbFdrWUREUFBwdzdqdGhwQmlOVE1xVG8iO3M6NzoidXNlcl9pZCI7aToxO3M6ODoidXNlcm5hbWUiO3M6NDoiR2RtbiI7czo0OiJyb2xlIjtzOjQ6Imd1cnUiO3M6MTE6Im9wZXJhdG9yX2lkIjtpOjE7czo3OiJndXJ1X2lkIjtpOjE7fQ==', 1750150260);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nis` varchar(200) NOT NULL,
  `foto` longblob NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama`, `email`, `kelas`, `jurusan`, `username`, `password`, `nis`, `foto`, `id_role`) VALUES
(1, 'Martin', 'martinganteng@gmail.com', 'XII APAT 1', 'Perikanan', 'Martis', 'martin123', '123230092', 0x313734393930343935312e4a5047, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD UNIQUE KEY `id_role` (`id_role`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_siswa_3` (`id_siswa`,`id_lab`,`id_guru`,`id_operator`),
  ADD KEY `id_operator` (`id_operator`) USING BTREE,
  ADD KEY `id_guru` (`id_guru`) USING BTREE,
  ADD KEY `id_lab` (`id_lab`) USING BTREE,
  ADD KEY `id_siswa` (`id_siswa`) USING BTREE,
  ADD KEY `id_siswa_2` (`id_siswa`,`id_lab`,`id_guru`,`id_operator`) USING BTREE;

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `labolatorium`
--
ALTER TABLE `labolatorium`
  ADD PRIMARY KEY (`id_lab`);

--
-- Indexes for table `laporan_praktikum`
--
ALTER TABLE `laporan_praktikum`
  ADD PRIMARY KEY (`id_laporan`),
  ADD UNIQUE KEY `id_jadwal` (`id_jadwal`),
  ADD UNIQUE KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`id_operator`),
  ADD UNIQUE KEY `id_role` (`id_role`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `id_role` (`id_role`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `id_guru` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`),
  ADD CONSTRAINT `id_lab` FOREIGN KEY (`id_lab`) REFERENCES `labolatorium` (`id_lab`),
  ADD CONSTRAINT `id_operator` FOREIGN KEY (`id_operator`) REFERENCES `operator` (`id_operator`),
  ADD CONSTRAINT `id_siswa` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`);

--
-- Constraints for table `laporan_praktikum`
--
ALTER TABLE `laporan_praktikum`
  ADD CONSTRAINT `id_jadwal` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`),
  ADD CONSTRAINT `laporan_praktikum_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`);

--
-- Constraints for table `operator`
--
ALTER TABLE `operator`
  ADD CONSTRAINT `operator_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
