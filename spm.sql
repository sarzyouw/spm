-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 12, 2026 at 01:03 AM
-- Server version: 5.7.39
-- PHP Version: 8.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spm`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit_logs`
--

CREATE TABLE `audit_logs` (
  `id` bigint(20) NOT NULL,
  `admin_username` varchar(50) DEFAULT NULL,
  `action` varchar(50) DEFAULT NULL,
  `target_user` varchar(50) DEFAULT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audit_logs`
--

INSERT INTO `audit_logs` (`id`, `admin_username`, `action`, `target_user`, `description`, `created_at`) VALUES
(1, 'dindaa', 'RESET_PASSWORD', 'dindaa', 'Admin mereset password user', '2026-01-03 08:56:10'),
(2, 'dindaa', 'RESET_PASSWORD', 'wonwoo', 'Admin mereset password user', '2026-01-03 09:02:10'),
(3, 'dindaa', 'RESET_PASSWORD', '199705172022022001', 'Admin mereset password user', '2026-01-06 15:50:17'),
(4, '199705172022022001', 'RESET_PASSWORD', 'wonwoo', 'Admin mereset password user', '2026-01-06 15:50:58');

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE `dokumen` (
  `no_dokumen` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_dok` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_proses` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('belum divalidasi','sudah divalidasi','revisi') COLLATE utf8mb4_unicode_ci NOT NULL,
  `validasi` enum('validasi','tolak','revisi') COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` enum('kebijakan mutu','internal mutu','standar mutu','sop','audit mutu internal','akreditasi perguruan tinggi','akreditasi program studi','pendokumentasian','manual mutu') COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dokumen`
--

INSERT INTO `dokumen` (`no_dokumen`, `username`, `nama_dok`, `tgl_proses`, `status`, `validasi`, `link`, `jenis`, `keterangan`) VALUES
(202001, '199705172022022001', 'Kebijakan SPM STMI Tahun 2020', '2026-01-08 00:32:30', 'sudah divalidasi', 'validasi', 'https://drive.google.com/file/d/19CqIcgNFhXwKF87VfWH6ho5EiAXBdfDY/view?usp=drive_link', 'kebijakan mutu', NULL),
(202002, '199705172022022001', 'Dokumen Manual Mutu SPM STMI Tahun 2020', '2026-01-08 00:32:33', 'sudah divalidasi', 'validasi', 'https://drive.google.com/file/d/1kAta0ArD1nv-clVqHQiiVkvFl3RrPCCV/view?usp=drive_link', 'manual mutu', NULL),
(202006, '199705172022022001', 'Uji Kompetensi dan Sertfikasi Kompetensi', '2026-01-08 00:32:40', 'sudah divalidasi', 'validasi', 'storage/dokumen/1767829244_1.3.3-Uji-Kompetensi-dan-Sertifikasi-Kompetensi.pdf', 'sop', NULL),
(2018001, '199705172022022001', 'Laporan AIM 14 Januari 2018', '2026-01-07 23:43:26', 'sudah divalidasi', 'validasi', 'storage/dokumen/1767827490_LAPORAN-AIM-14-JAN-2018.pdf', 'audit mutu internal', NULL),
(2019012, '199705172022022001', 'Dokumen SOP AP Program Studi Pelaksanaan Perkuliahan', '2026-01-08 00:32:44', 'sudah divalidasi', 'validasi', 'storage/dokumen/1767828870_1.2.2.1-SOP-AP-Pelaksanaan-Perkuliahan (2).pdf', 'sop', NULL),
(2020001, '199705172022022001', 'Laporan Audit Mutu Internal Desember 2020', '2026-01-08 00:32:23', 'sudah divalidasi', 'validasi', 'storage/dokumen/1767827947_Laporan-AMI-2020-Lampiran.pdf', 'audit mutu internal', NULL),
(2021001, '199705172022022001', 'Laporan Audit Mutu Internal (AMI18) 2021', '2026-01-08 00:32:26', 'sudah divalidasi', 'validasi', 'https://drive.google.com/file/d/1q50dBdO8Enm1X9JknByq8-6a5hp09xof/view?usp=drive_link', 'audit mutu internal', NULL),
(20190012, '199705172022022001', 'Dokumen SOP Perpustakaan AP Penerbitan Kartu Anggota Perpustakaan', '2026-01-08 00:32:37', 'sudah divalidasi', 'validasi', 'https://drive.google.com/file/d/1C6jReS3c8Tso8ZHnMflmfJ0Txz8mFxfE/view?usp=drive_link', 'sop', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2025_12_14_062957_create_dokumen_table', 1),
(3, '2025_12_18_164252_create_pegawai_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `username` varchar(20) NOT NULL,
  `nama_pegawai` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` tinyint(4) NOT NULL COMMENT '1: ketua\r\n2: admin\r\n3: guess',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`username`, `nama_pegawai`, `password`, `level`, `created_at`, `update_at`) VALUES
('197403022002121001', 'Ella Melyna', '$2y$12$WHTAndaOBB/7W.W4GXQmie8okiANHG4wcrXxAlSTgYdmsEbV5BaMi', 1, '2025-11-08 20:12:47', '2025-12-30 08:02:56'),
('199504252022022002', 'Isma Wulansari', '$2y$12$I34jV10l3cp/FoIuFUBdf.c1wrAkZBgvdLYPo7G9x6MYRrzbRhlu', 2, '2025-11-08 20:12:47', '2025-12-30 08:08:03'),
('199705172022022001', 'Mailia Putri Utami', '$2y$12$ua3mdLWFhKzArRkCgV.3OeWNzDp4ch2qk7OBUjiQMQ9dkpfqLJ0yO', 2, '2025-11-08 20:12:47', '2026-01-07 05:50:17'),
('abdullah', 'Abdullah bin Muhammad', '$2y$12$BaRkxmxBq0NvUEcg3SWtnudVPbGcGIybDmaT8ssEjDVUoNN/Mrr6u', 3, '2026-01-10 07:51:24', NULL),
('sarah', 'Queen Sihotang', '$2y$12$euTPByyrz8vhNpsgV5qOxO0/nO9BE.acWWpJn95IiQl30FQjpX.CO', 3, '2026-01-03 22:34:07', '2026-01-08 08:53:05');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit_logs`
--
ALTER TABLE `audit_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`no_dokumen`),
  ADD KEY `dokumen_username_index` (`username`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audit_logs`
--
ALTER TABLE `audit_logs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
