-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2023 at 09:37 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final`
--

-- --------------------------------------------------------

--
-- Table structure for table `burner_systems`
--

CREATE TABLE `burner_systems` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operator_kedua` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `atasan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operator_shift` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` enum('Unit 3','Unit 4') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_update` date NOT NULL,
  `jam_update` time NOT NULL,
  `ket_burner1` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket_burner2` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket_burner3` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket_burner4` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_burner1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_burner2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_burner3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_burner4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_equipment_id` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catatan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `burner_systems`
--

INSERT INTO `burner_systems` (`id`, `user_id`, `nip`, `operator_kedua`, `atasan`, `operator_shift`, `unit`, `tanggal_update`, `jam_update`, `ket_burner1`, `ket_burner2`, `ket_burner3`, `ket_burner4`, `status_burner1`, `status_burner2`, `status_burner3`, `status_burner4`, `status_equipment_id`, `catatan`, `deleted_at`, `created_at`, `updated_at`) VALUES
('14725770-8293-11ed-9d70-6d614467fe20', '7d164383-2e0f-40bf-9bde-e20695ef7f39', '9917121LBY', '-', 'ARIEF CHAIRUDIN', 'Shift G', 'Unit 3', '2022-08-21', '09:25:00', 'Normal', 'Tidak ada power', 'Tidak ada power', 'Normal', 'Ready', 'Not Ready', 'Not Ready', 'Ready', '2', '1', NULL, '2022-12-23 06:26:13', '2023-01-13 10:21:28'),
('2bf3db00-857d-11ed-b1b7-5bf8c5b150f5', '66f6b4ad-13c7-4c91-83b9-4167703993b1', '9312065DY', '-', 'DENNY WAHYUDI', 'Shift H', 'Unit 3', '2022-12-27', '08:26:00', 'Normal', 'Normal', 'Normal', 'Normal', 'Ready', 'Ready', 'Ready', 'Ready', '6', 'aman', NULL, '2022-12-26 23:26:57', '2022-12-28 00:16:22'),
('2d406340-82a7-11ed-8660-fd999d39d2ca', '8ec55a28-e592-4021-a487-47bd0f743fe0', '9312004DY', 'MAULIDI RAHIM', 'MUHAMMAD FAUZAN HADI', 'Shift F', 'Unit 3', '2022-11-06', '09:33:00', 'Normal', 'Power tidak ada', 'power tidak ada', 'Normal', 'Ready', 'Not Ready', 'Not Ready', 'Ready', '7', '-', NULL, '2022-12-23 08:50:04', '2022-12-23 13:15:05'),
('39986850-82a8-11ed-9428-e9ef162fb53b', 'f1e78915-2194-4438-beb4-87eb9c1cb855', '9112056DY', '-', 'MUHAMMAD FAUZAN HADI', 'Shift F', 'Unit 3', '2022-11-13', '09:28:00', 'Normal', 'power tidak ada', 'power tidak ada', 'Normal', 'Ready', 'Not Ready', 'Not Ready', 'Ready', '6', '-', NULL, '2022-12-23 08:57:35', '2023-01-13 10:37:10'),
('434d7940-8293-11ed-89fc-755af13cbc7e', '7d164383-2e0f-40bf-9bde-e20695ef7f39', '9917121LBY', '-', 'ARIEF CHAIRUDIN', 'Shift G', 'Unit 4', '2022-08-21', '09:32:00', 'Normal', 'Burner 2 unit 4 CB on, dicoba operasikan tidak ada pergerakan', 'Burner 3 Unit 4 Valve udara control oil valve ditutup, ada kebocoran', 'Normal', 'Ready', 'Not Ready', 'Ready', 'Ready', '1', '-', NULL, '2022-12-23 06:27:31', '2023-01-13 10:22:27'),
('60484f80-82a4-11ed-b536-2b5695e3e808', 'f1e78915-2194-4438-beb4-87eb9c1cb855', '9112056DY', '-', 'MUHAMMAD FAUZAN HADI', 'Shift F', 'Unit 3', '2022-09-11', '09:26:00', 'Normal', 'Power tidak ada', 'power tidak ada', 'Normal', 'Ready', 'Not Ready', 'Not Ready', 'Ready', '6', '-', NULL, '2022-12-23 08:30:01', '2022-12-23 21:52:43'),
('6233a1c0-82a7-11ed-befa-7fd7e7fa52af', '8ec55a28-e592-4021-a487-47bd0f743fe0', '9312004DY', 'MAULIDI RAHIM', 'MUHAMMAD FAUZAN HADI', 'Shift F', 'Unit 4', '2022-11-06', '09:38:00', 'Normal', 'power tidak ada', 'Selang air control passing', 'Normal', 'Ready', 'Not Ready', 'Ready', 'Ready', '7', '-', NULL, '2022-12-23 08:51:33', '2022-12-23 13:15:28'),
('62d3deb0-82a8-11ed-9140-059438ae3da5', 'f1e78915-2194-4438-beb4-87eb9c1cb855', '9112056DY', 'ALVI ALDIAN FIKRI', 'MUHAMMAD FAUZAN HADI', 'Shift F', 'Unit 4', '2022-11-13', '09:58:00', 'Normal', 'power tidak ada', 'Selang air control passing', 'Normal', 'Ready', 'Not Ready', 'Ready', 'Ready', '2', '0', NULL, '2022-12-23 08:58:44', '2023-01-13 10:26:38'),
('782e64a0-828c-11ed-b1fe-777ce52d551b', 'f1e78915-2194-4438-beb4-87eb9c1cb855', '9112056DY', '-', 'MUHAMMAD FAUZAN HADI', 'Shift F', 'Unit 4', '2022-07-17', '09:45:00', 'normal', 'Burner 2 unit 4 CB on, dicoba operasikan tidak ada pergerakan', 'Burner 3 Unit 4 Valve udara control oil valve ditutup, ada kebocoran', 'normal', 'Ready', 'Not Ready', 'Ready', 'Ready', '6', '-', NULL, '2022-12-23 05:38:54', '2022-12-23 06:30:10'),
('7e21dc00-828e-11ed-b07a-89381d8d81de', 'bbb30442-2c73-4685-8a93-973c868f0a7f', '9112056DY', 'MAULIDI RAHIM', 'MUHAMMAD FAUZAN HADI', 'Shift F', 'Unit 3', '2022-07-24', '09:16:00', 'Normal', 'Normal', 'Normal', 'Normal', 'Ready', 'Ready', 'Ready', 'Ready', '7', '-', NULL, '2022-12-23 05:53:23', '2022-12-23 13:14:18'),
('85bddd80-82a4-11ed-830a-3fc32245727e', 'f1e78915-2194-4438-beb4-87eb9c1cb855', '9112056DY', '-', 'MUHAMMAD FAUZAN HADI', 'Shift F', 'Unit 4', '2022-09-11', '09:31:00', 'Normal', 'Normal', 'Selang air control passing', 'Normal', 'Ready', 'Ready', 'Ready', 'Ready', '6', '-', NULL, '2022-12-23 08:31:04', '2022-12-23 09:03:03'),
('8b147a20-82a5-11ed-afdb-6515893abb4a', '044c5d9e-64c7-4595-b82f-a2cc0d76fafa', '9716039DY', 'MUHAMMAD YUSUF', 'ARIEF CHAIRUDIN', 'Shift G', 'Unit 3', '2022-10-11', '09:28:00', 'Normal', 'Power tidak ada', 'Power tidak ada', 'Normal', 'Ready', 'Not Ready', 'Not Ready', 'Ready', '2', '1', NULL, '2022-12-23 08:38:23', '2023-01-13 10:11:37'),
('a109f860-82a6-11ed-aa2e-abe48dd81160', '7d164383-2e0f-40bf-9bde-e20695ef7f39', '9917121LBY', 'RENALDY ANDRIANOOR', 'ARIEF CHAIRUDIN', 'Shift G', 'Unit 3', '2022-10-18', '09:40:00', 'Normal', 'Power tidak ada', 'power tidak ada', 'Normal', 'Ready', 'Not Ready', 'Not Ready', 'Ready', '5', 'sangat sesuai', NULL, '2022-12-23 08:46:09', '2023-01-09 09:38:43'),
('a26c2170-82aa-11ed-8291-9312cdb02bc1', '7d164383-2e0f-40bf-9bde-e20695ef7f39', '9917121LBY', '-', 'ARIEF CHAIRUDIN', 'Shift G', 'Unit 4', '2022-12-11', '09:32:00', 'Normal', 'power tidak ada', 'selang air control terdapat passing', 'Normal', 'Ready', 'Not Ready', 'Ready', 'Ready', '6', '-', NULL, '2022-12-23 09:14:49', '2022-12-26 02:30:15'),
('a456c920-828e-11ed-abfb-1b12ca38badd', 'f1e78915-2194-4438-beb4-87eb9c1cb855', '9112056DY', 'ARIANTO', 'MUHAMMAD FAUZAN HADI', 'Shift F', 'Unit 4', '2022-07-24', '09:23:00', 'Normal', 'Burner 2 unit 4 CB on, dicoba operasikan tidak ada pergerakan', 'Burner 3 Unit 4 Valve udara control oil valve ditutup, ada kebocoran', 'Normal', 'Ready', 'Not Ready', 'Ready', 'Ready', '7', '-', NULL, '2022-12-23 05:54:27', '2022-12-23 13:14:31'),
('af5d2b00-8313-11ed-aba7-8b28cd8e2890', '044c5d9e-64c7-4595-b82f-a2cc0d76fafa', '9716039DY', 'MUHAMMAD YUSUF', 'ARIEF CHAIRUDIN', 'Shift G', 'Unit 3', '2022-12-11', '09:24:00', 'Normal', 'Power tidak ada', 'Power tidak ada', 'Normal', 'Ready', 'Not Ready', 'Not Ready', 'Ready', '6', 'aman', NULL, '2022-12-23 21:46:48', '2022-12-23 21:52:15'),
('bb593af0-8292-11ed-9d74-f34e6275ba6b', '7d164383-2e0f-40bf-9bde-e20695ef7f39', '9917121LBY', '-', 'ARIEF CHAIRUDIN', 'Shift G', 'Unit 3', '2022-08-14', '09:35:00', 'Normal', 'Tidak ada power', 'Tidak ada power', 'Normal', 'Ready', 'Not Ready', 'Not Ready', 'Ready', '6', 'benar', NULL, '2022-12-23 06:23:43', '2022-12-23 09:31:31'),
('c63fedf0-82a4-11ed-bcd8-1750bcef5f79', 'f1e78915-2194-4438-beb4-87eb9c1cb855', '9112056DY', 'ARIANTO', 'MUHAMMAD FAUZAN HADI', 'Shift F', 'Unit 3', '2022-09-21', '09:38:00', 'Normal', 'Power tidak ada', 'Power tidak ada', 'Normal', 'Ready', 'Not Ready', 'Not Ready', 'Ready', '7', '-', NULL, '2022-12-23 08:32:53', '2022-12-23 13:14:52'),
('cb2de6c0-828d-11ed-b876-1f1c4df096fe', 'f1e78915-2194-4438-beb4-87eb9c1cb855', '9112056DY', '-', 'MUHAMMAD FAUZAN HADI', 'Shift F', 'Unit 3', '2022-07-17', '09:53:00', 'Normal', 'normal', 'Normal', 'Normal', 'Ready', 'Ready', 'Ready', 'Ready', '6', '-', NULL, '2022-12-23 05:48:22', '2022-12-23 06:58:02'),
('d3a0dff0-82a5-11ed-919d-a777fd79632e', '044c5d9e-64c7-4595-b82f-a2cc0d76fafa', '9716039DY', 'MUHAMMAD YUSUF', 'ARIEF CHAIRUDIN', 'Shift G', 'Unit 4', '2022-10-11', '09:33:00', 'Normal', 'Normal', 'Power tidak ada', 'Selang air control passing', 'Ready', 'Ready', 'Not Ready', 'Ready', '6', 'sangat sesuai', NULL, '2022-12-23 08:40:25', '2022-12-23 09:31:14'),
('d5335e90-82a6-11ed-a8cb-37a8690bedfd', '7d164383-2e0f-40bf-9bde-e20695ef7f39', '9917121LBY', 'RENALDY ANDRIANOOR', 'ARIEF CHAIRUDIN', 'Shift G', 'Unit 4', '2022-10-18', '09:49:00', 'Normal', 'Normal', 'Selang air control passing', 'Normal', 'Ready', 'Ready', 'Not Ready', 'Ready', '6', '-', NULL, '2022-12-23 08:47:37', '2022-12-23 09:31:05'),
('e8b4f670-8292-11ed-ab6d-93b2958b9a3d', '7d164383-2e0f-40bf-9bde-e20695ef7f39', '9917121LBY', '-', 'ARIEF CHAIRUDIN', 'Shift G', 'Unit 4', '2022-08-14', '09:37:00', 'Normal', 'Burner 2 unit 4 CB on, dicoba operasikan tidak ada pergerakan', 'Burner 3 Unit 4 Valve udara control oil valve ditutup, ada kebocoran', 'Normal', 'Ready', 'Not Ready', 'Ready', 'Ready', '6', 'benar', NULL, '2022-12-23 06:24:59', '2022-12-23 21:52:27'),
('f3780bd0-82a4-11ed-b783-d312d31d73a4', 'f1e78915-2194-4438-beb4-87eb9c1cb855', '9112056DY', '-', 'MUHAMMAD FAUZAN HADI', 'Shift F', 'Unit 4', '2022-09-21', '09:34:00', 'Normal', 'Power tidak ada', 'Selang air control passing', 'Normal', 'Ready', 'Not Ready', 'Ready', 'Ready', '7', '-', NULL, '2022-12-23 08:34:08', '2022-12-23 13:15:18');

-- --------------------------------------------------------

--
-- Table structure for table `co_boilers`
--

CREATE TABLE `co_boilers` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operator_shift` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` enum('Unit 3','Unit 4') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_peralatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_update` date NOT NULL,
  `jam_update` time NOT NULL,
  `operasi_awal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rencana_operasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operasi_akhir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_peralatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_equipment_id` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catatan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `co_boilers`
--

INSERT INTO `co_boilers` (`id`, `user_id`, `operator_shift`, `unit`, `nama_peralatan`, `tanggal_update`, `jam_update`, `operasi_awal`, `rencana_operasi`, `operasi_akhir`, `status_kegiatan`, `status_peralatan`, `keterangan`, `status_equipment_id`, `catatan`, `deleted_at`, `created_at`, `updated_at`) VALUES
('ffe09b80-9327-11ed-9629-b5a6224c0225', '7d164383-2e0f-40bf-9bde-e20695ef7f39', 'Shift G', 'Unit 3', 'seal air fan', '2023-01-13', '17:52:00', 'A', 'B', 'B', 'Terlaksana', 'Normal', 'normal operasi', '6', '-', NULL, '2023-01-13 08:52:32', '2023-01-13 10:35:35');

-- --------------------------------------------------------

--
-- Table structure for table `co_commons`
--

CREATE TABLE `co_commons` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operator_shift` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_peralatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_update` date NOT NULL,
  `jam_update` time NOT NULL,
  `operasi_awal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rencana_operasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operasi_akhir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_peralatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_equipment_id` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catatan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `co_turbines`
--

CREATE TABLE `co_turbines` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operator_shift` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` enum('Unit 3','Unit 4') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_peralatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_update` date NOT NULL,
  `jam_update` time NOT NULL,
  `operasi_awal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rencana_operasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operasi_akhir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_peralatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_equipment_id` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catatan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `edg_systems`
--

CREATE TABLE `edg_systems` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operator_kedua` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `atasan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operator_shift` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_update` date NOT NULL,
  `lev_bbm_awal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lev_oli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teg_battery` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_start` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teg_out` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `frekuensi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `putaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `temp_coolant` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `press_oli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_stop` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lev_bbm_akhir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_equipment_id` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catatan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `edg_systems`
--

INSERT INTO `edg_systems` (`id`, `user_id`, `nip`, `operator_kedua`, `atasan`, `operator_shift`, `tanggal_update`, `lev_bbm_awal`, `lev_oli`, `teg_battery`, `jam_start`, `teg_out`, `frekuensi`, `putaran`, `temp_coolant`, `press_oli`, `jam_stop`, `lev_bbm_akhir`, `status_equipment_id`, `catatan`, `deleted_at`, `created_at`, `updated_at`) VALUES
('0031cce0-81f3-11ed-bbd1-7ff9af81deb7', 'd6e1edcf-4204-4c38-b91e-6e34882dba0d', '9212051DY', 'ARIYANDI', 'MUHAMMAD FAUZAN HADI', 'Shift F', '2022-07-01', '990', 'Normal', '28.8', '09:31', '400/0', '49.76', '1491', '48', '7', '09:46', '985', '7', 'aman', NULL, '2022-12-22 11:20:19', '2022-12-22 11:20:19'),
('08e369e0-8316-11ed-b4c0-bf9306884e74', '049cbfc0-9043-4a90-8228-fa1fa326bae4', '95160006LCY', '-', 'MUHAMMAD FAUZAN HADI', 'Shift F', '2022-10-21', '975', 'Normal', '28.8', '09:31', '238/412', '49.74', '1495', '67', '675', '09:47', '975', '6', 'aman', NULL, '2022-12-23 22:03:37', '2022-12-23 22:04:01'),
('0c9c42a0-8317-11ed-8f1d-9f1be149e2dc', '800d5709-1953-46e1-83f0-e50836658c13', '9314020DY', '-', 'AAN HASANUDIN', 'Shift E', '2022-11-11', '965', 'Normal', '28.7', '09:53', '238/413', '49.78', '1493', '59', '689', '10:02', '965', '6', 'aman', NULL, '2022-12-23 22:10:53', '2022-12-23 22:11:04'),
('17702640-81f4-11ed-ba50-0b1d4d41504f', 'aa364a6b-c285-4ae9-a2c4-c53f4b9c9e11', '9312055DY', 'TRI HARYONO FAUZI', 'AAN HASANUDIN', 'Shift E', '2022-07-22', '985', 'Normal', '28.9', '09:20', '236/409', '49.77', '1495', '52', '689', '21:35', '985', '7', 'aman', NULL, '2022-12-22 11:28:08', '2022-12-22 11:51:47'),
('312fff80-8318-11ed-8a6b-f3fcef49b6ad', 'a08afa74-cbd8-45a9-babd-5397d98fbc73', '9716043DY', 'TRI HARYONO FAUZI', 'DENNY WAHYUDI', 'Shift H', '2022-12-02', '965', 'Normal', '28.7', '14:31', '237/411', '49.77', '1493', '56', '703', '02:41', '965', '1', 'aman', NULL, '2022-12-23 22:19:04', '2022-12-23 22:19:04'),
('337178d0-81f5-11ed-b2bd-5706c7ef0a63', 'b0af130e-0b38-41b7-9e4d-5e1d92e69150', '9313039DY', '-', 'DENNY WAHYUDI', 'Shift H', '2022-08-12', '995', 'Normal', '28.8', '09:30', '411', '49.8', '1491', '48', '7', '09:45', '990', '7', '-', NULL, '2022-12-22 11:36:04', '2022-12-23 09:26:34'),
('42387b20-81f7-11ed-a586-d71dd982d0f4', '37cfd369-0ca4-4219-a204-42fb17c8b207', '9717098LBY', 'BAGUS DEWANTORO', 'ARIEF CHAIRUDIN', 'Shift G', '2022-09-30', '975', 'Normal', '28.7', '09:30', '238/413', '49.78', '1493', '61', '682', '09:50', '975', '1', 'a', NULL, '2022-12-22 11:50:48', '2023-01-13 09:27:35'),
('447de3d0-81fd-11ed-a85c-b70095bd42a4', 'a08afa74-cbd8-45a9-babd-5397d98fbc73', '9716043DY', 'TRI HARYONO FAUZI', 'DENNY WAHYUDI', 'Shift H', '2022-10-07', '975', 'Normal', '28.7', '14:30', '238/413', '49.75', '1493', '61', '682', '14:45', '975', '7', 'aman', NULL, '2022-12-22 12:33:49', '2022-12-22 12:33:49'),
('4ebe4340-8317-11ed-b6d8-4b5803ade9df', 'b0af130e-0b38-41b7-9e4d-5e1d92e69150', '9313039DY', 'MUHAMMAD ADHARI', 'ARIEF CHAIRUDIN', 'Shift G', '2022-11-18', '965', 'Normal', '28.7', '09:37', '237/411', '49.77', '1493', '56', '703', '09:47', '965', '6', 'aman', NULL, '2022-12-23 22:12:44', '2022-12-23 22:21:51'),
('5692a300-81f3-11ed-9897-3d5c30accd55', '049cbfc0-9043-4a90-8228-fa1fa326bae4', '95160006LCY', '-', 'MUHAMMAD FAUZAN HADI', 'Shift F', '2022-07-08', '985', 'Normal', '28.8', '09:40', '235/408', '49.77', '1493', '54', '689', '09:55', '985', '2', 'aman', NULL, '2022-12-22 11:22:44', '2022-12-22 11:22:44'),
('57116fd0-81f6-11ed-82a0-e109dcf7f07c', '37cfd369-0ca4-4219-a204-42fb17c8b207', '9717098LBY', '-', 'ARIEF CHAIRUDIN', 'Shift G', '2022-09-16', '975', 'Normal', '28.7', '16:35', '238/413', '49.78', '1493', '61', '682', '17:51', '975', '2', 'aman', NULL, '2022-12-22 11:44:14', '2023-01-13 09:23:43'),
('59341fa0-81f5-11ed-8bb9-11970a271005', 'b0af130e-0b38-41b7-9e4d-5e1d92e69150', '9313039DY', '-', 'DENNY WAHYUDI', 'Shift H', '2022-08-19', '985', 'Normal', '28.8', '09:40', '411', '49.8', '1495', '48', '7', '09:55', '985', '7', '-', NULL, '2022-12-22 11:37:08', '2022-12-23 09:26:23'),
('5c2415b0-8316-11ed-9742-dd6d342b029d', '049cbfc0-9043-4a90-8228-fa1fa326bae4', '95160006LCY', '-', 'MUHAMMAD FAUZAN HADI', 'Shift F', '2022-10-28', '965', 'Normal', '28.6', '09:19', '235/407', '49.77', '1496', '63', '696', '09:34', '965', '7', 'aman', NULL, '2022-12-23 22:05:57', '2022-12-23 22:08:41'),
('60f20190-8318-11ed-8592-0fc694e110ca', 'a08afa74-cbd8-45a9-babd-5397d98fbc73', '9716043DY', 'TRI HARYONO FAUZI', 'DENNY WAHYUDI', 'Shift H', '2022-12-09', '965', 'Normal', '28.7', '02:05', '238/413', '49.77', '1493', '56', '703', '02:20', '965', '7', 'aman', NULL, '2022-12-23 22:20:24', '2023-01-13 10:27:13'),
('751d4bc0-81fd-11ed-883d-8d6739c58cf7', 'fe7322cf-ce9c-431b-909b-eec41038a94a', '9412072DY', '-', 'DENNY WAHYUDI', 'Shift H', '2022-10-14', '975', 'Normal', '28.8', '09:25', '237/410', '49.78', '1493', '56', '696', '09:35', '975', '6', '-', NULL, '2022-12-22 12:35:10', '2022-12-23 22:04:11'),
('7e5ff9c0-8317-11ed-b811-39dd538bb86c', 'b0af130e-0b38-41b7-9e4d-5e1d92e69150', '9313039DY', 'MUHAMMAD ADHARI', 'ARIEF CHAIRUDIN', 'Shift G', '2022-11-25', '965', 'Normal', '28.7', '09:52', '238/413', '49.78', '1493', '59', '689', '10:02', '965', '6', 'sesuai', NULL, '2022-12-23 22:14:04', '2022-12-23 22:21:40'),
('7f86dd40-81f4-11ed-8c31-33f9a5ddb693', '37cfd369-0ca4-4219-a204-42fb17c8b207', '9717098LBY', '-', 'ARIEF CHAIRUDIN', 'Shift G', '2022-07-29', '985', 'Normal', '28.8', '09:40', '235/408', '49.77', '1493', '54', '689', '09:55', '985', '7', 'aman', NULL, '2022-12-22 11:31:02', '2022-12-22 11:31:02'),
('9c9daf60-81f5-11ed-96af-4fa10e3e32f7', 'd6e1edcf-4204-4c38-b91e-6e34882dba0d', '9212051DY', '-', 'MUHAMMAD FAUZAN HADI', 'Shift F', '2022-08-26', '985', 'Normal', '28.7', '14:35', '-', '49.77', '1493', '56', '6.9', '14:46', '985', '6', 'aman', NULL, '2022-12-22 11:39:01', '2022-12-28 00:10:45'),
('9d659af0-81f6-11ed-b2f2-fd47ce690991', '37cfd369-0ca4-4219-a204-42fb17c8b207', '9717098LBY', 'BAGUS DEWANTORO', 'ARIEF CHAIRUDIN', 'Shift G', '2022-09-23', '975', 'Normal', '28.7', '11:10', '238/413', '49.78', '1493', '61', '682', '11:20', '975', '7', 'aman', NULL, '2022-12-22 11:46:12', '2022-12-22 11:46:12'),
('ab517b60-8316-11ed-b5bb-614f50904434', 'd6e1edcf-4204-4c38-b91e-6e34882dba0d', '9212051DY', '-', 'MUHAMMAD FAUZAN HADI', 'Shift F', '2022-11-05', '965', 'Normal', '28.7', '09:37', '237/411', '49.77', '1493', '56', '703', '09:47', '965', '6', 'aman', NULL, '2022-12-23 22:08:10', '2022-12-23 22:08:27'),
('b6d8bdf0-81f3-11ed-bf47-1d31a9f3abea', 'aa364a6b-c285-4ae9-a2c4-c53f4b9c9e11', '9312055DY', '-', 'AAN HASANUDIN', 'Shift E', '2022-07-15', '985', 'Normal', '28.8', '09:40', '235/408', '49.77', '1493', '54', '689', '09:55', '985', '7', 'sangat sesuai', NULL, '2022-12-22 11:25:26', '2022-12-23 09:27:44'),
('dbb25340-81f5-11ed-885b-a7ae8ba9c20a', 'd6e1edcf-4204-4c38-b91e-6e34882dba0d', '9212051DY', '-', 'MUHAMMAD FAUZAN HADI', 'Shift F', '2022-09-02', '985', 'Normal', '28.7', '09:56', '-', '49.8', '1495', '56', '6.9', '10:05', '985', '2', '1', NULL, '2022-12-22 11:40:47', '2023-01-13 10:24:31'),
('de2a79a0-81f4-11ed-bcd5-371dddcb60bb', '37cfd369-0ca4-4219-a204-42fb17c8b207', '9717098LBY', '-', 'ARIEF CHAIRUDIN', 'Shift G', '2022-08-05', '995', 'Normal', '28.8', '09:31', '411', '49.8', '1491', '48', '7', '09:46', '990', '5', 'aman', NULL, '2022-12-22 11:33:41', '2022-12-22 11:33:41');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forwardings`
--

CREATE TABLE `forwardings` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `update_ke` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `arus_FP_A` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `arus_FP_B` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_FP_A` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_FP_B` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `press_FP_A` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `press_FP_B` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info_FP` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forwardings`
--

INSERT INTO `forwardings` (`id`, `update_ke`, `arus_FP_A`, `arus_FP_B`, `status_FP_A`, `status_FP_B`, `press_FP_A`, `press_FP_B`, `info_FP`, `deleted_at`, `created_at`, `updated_at`) VALUES
('048f2b70-825f-11ed-bc8f-5746a3ff7a41', 'Minggu II', '11.93', '0', 'Ready', 'Ready', '0', '0', '<ul><li>Forwarding Pump B (Noize)</li><li>Parameter Pressure Error</li></ul>', NULL, '2022-12-22 16:13:32', '2022-12-22 16:13:32'),
('071cce40-825b-11ed-9469-73c4c5779840', 'Minggu II', '9.97', '0', 'Ready', 'Ready', '0', '0', '<ul><li>Forwarding Pump B (Noize)</li><li>Parameter Pressure Error</li></ul>', NULL, '2022-12-22 15:44:59', '2022-12-22 15:44:59'),
('106ed3c0-825e-11ed-825d-057a07e0a7a0', 'Minggu III', '12.03', '0', 'Ready', 'Ready', '0', '0', '<ul><li>Forwarding Pump B (Noize)</li><li>Parameter Pressure Error</li></ul>', NULL, '2022-12-22 16:06:43', '2022-12-22 16:06:43'),
('1368e8e0-8287-11ed-9d8d-61acc7df0fdb', 'Minggu II', '11.78', '10.4', 'Ready', 'Ready', '0', '0', '<ul><li>Forwarding Pump B (Noize)</li><li>Parameter Pressure Error</li></ul>', NULL, '2022-12-22 21:00:17', '2022-12-22 21:00:17'),
('258df3c0-825c-11ed-a1c3-492ea577e345', 'Minggu II', '9.97', '0', 'Ready', 'Ready', '0', '0', '<ul><li>Forwarding Pump B (Noize)</li><li>Parameter Pressure Error</li></ul>', NULL, '2022-12-22 15:52:59', '2022-12-22 15:52:59'),
('488224a0-8253-11ed-b600-4d847242d65b', 'Minggu III', '9.7', '9.8', 'Ready', 'Ready', 'error', 'error', '<ul><li>Fowarding Pump B (Noize)</li></ul>', NULL, '2022-12-22 14:49:32', '2022-12-22 14:49:32'),
('6e5684a0-8254-11ed-b3c8-1104c739dbc4', 'Minggu IV', '9.8', '9.8', 'Ready', 'Ready', 'error', 'error', '<ul><li>Forwarding Pump B (Noize)</li></ul>', NULL, '2022-12-22 14:57:45', '2022-12-22 14:57:45'),
('8f7bde60-8289-11ed-a75d-5b4b05adaf25', 'Minggu II', '10', '10.1', 'Ready', 'Ready', '0', '0', '<ul><li>Forwarding Pump B (Noize)</li><li>Parameter Pressure Error</li></ul>', NULL, '2022-12-22 21:18:04', '2022-12-22 21:18:04'),
('937bf370-8288-11ed-b957-8107569e16d8', 'Minggu I', '9.9', '10.5', 'Ready', 'Ready', '0', '0', '<ul><li>Forwarding Pump B (Noize)</li><li>Parameter Pressure Error</li></ul>', NULL, '2022-12-22 21:11:01', '2022-12-22 21:11:01'),
('ad9ba2a0-8287-11ed-baa9-e753e2039804', 'Minggu III', '10.2', '10.1', 'Ready', 'Ready', '0', '0', '<ul><li>Forwarding Pump B (Noize)</li><li>Parameter Pressure Error</li></ul>', NULL, '2022-12-22 21:04:36', '2022-12-22 21:04:36'),
('f832e830-825f-11ed-bdf5-ed9b9dc24eef', 'Minggu III', '11.88', '0', 'Ready', 'Ready', '0', '0', '<ul><li>Forwarding Pump B (Noize)</li><li>Parameter Pressure Error</li></ul>', NULL, '2022-12-22 16:20:21', '2022-12-22 16:20:21');

-- --------------------------------------------------------

--
-- Table structure for table `leaders`
--

CREATE TABLE `leaders` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leaders`
--

INSERT INTO `leaders` (`id`, `nip`, `nama_lengkap`, `jabatan`, `created_at`, `updated_at`) VALUES
('23b3874d-672d-4d96-8e75-240fc01a4a2e', '89112259Z', 'FELANDI ARLIANTORO', 'ASMAN PEMELIHARAAN', '2022-12-29 21:10:39', '2022-12-29 21:10:39'),
('300a4421-22d4-4462-b53e-3c93be529225', '9110007D', 'DENNY WAHYUDI', 'SUPERVISOR OPERASI', '2022-12-29 21:09:52', '2022-12-29 21:09:52'),
('36360a4f-7a99-455f-906b-1cf3ff5fbbd8', '8007070D', 'DANI ESA WINDIARTO', 'MANAJER', '2022-12-29 21:10:13', '2023-01-09 10:33:39'),
('8439d7d4-1f6e-4d99-a521-864f0554d6c1', '8910004D', 'ARIEF CHAIRUDIN', 'SUPERVISOR OPERASI', '2022-12-29 21:09:05', '2022-12-29 21:09:05'),
('ba0f93f0-9a3f-43ff-a428-e7fddcb58b30', '8714009ZY', 'ISKANDAR SETIYAWAN', 'ASMAN OPERASI', '2022-12-29 21:11:00', '2022-12-29 21:11:00'),
('d0d2dfe3-6b5b-4ce3-81af-98b334deb476', '8708001D', 'AAN HASANUDIN', 'SUPERVISOR OPERASI', '2022-12-29 21:06:25', '2022-12-29 21:06:25'),
('f797d038-4cb0-45a6-86cb-b363310d4c93', '9110024D', 'MUHAMMAD FAUZAN HADI', 'SUPERVISOR OPERASI', '2022-12-29 21:09:29', '2022-12-29 21:09:29');

-- --------------------------------------------------------

--
-- Table structure for table `lfo_systems`
--

CREATE TABLE `lfo_systems` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operator_kedua` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `atasan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operator_shift` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` enum('Unit 3','Unit 4') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_update` date NOT NULL,
  `jam_update` time NOT NULL,
  `arus_HP_A` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `arus_HP_B` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_HP_A` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_HP_B` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `press_HP_A` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `press_HP_B` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DP_High` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info_HP` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `forwarding_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_equipment_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catatan` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lfo_systems`
--

INSERT INTO `lfo_systems` (`id`, `nip`, `user_id`, `operator_kedua`, `atasan`, `operator_shift`, `unit`, `tanggal_update`, `jam_update`, `arus_HP_A`, `arus_HP_B`, `status_HP_A`, `status_HP_B`, `press_HP_A`, `press_HP_B`, `DP_High`, `info_HP`, `forwarding_id`, `status_equipment_id`, `catatan`, `deleted_at`, `created_at`, `updated_at`) VALUES
('02a92b40-8289-11ed-80b6-ad3cc8028c68', '9312004DY', '8ec55a28-e592-4021-a487-47bd0f743fe0', 'MAULIDI RAHIM', 'MUHAMMAD FAUZAN HADI', 'Shift F', 'Unit 3', '2022-11-06', '09:55:00', '0', '0', 'Ready', 'Ready', '0', '0', 'Abnormal', '<ul><li>pembacaan ampere dan pressure error</li></ul>', '937bf370-8288-11ed-b957-8107569e16d8', '7', '-', NULL, '2022-12-23 05:14:08', '2022-12-23 05:16:44'),
('0e42ac50-8254-11ed-a470-9b38ced81569', '9112056DY', 'f1e78915-2194-4438-beb4-87eb9c1cb855', 'ARIANTO', 'MUHAMMAD FAUZAN HADI', 'Shift F', 'Unit 4', '2022-07-17', '09:57:00', '0', '0', 'Not Ready', 'Ready', '0', '0', 'Normal', '<ul><li>Trend Ampere dan Pressure tidak terbaca</li><li>HP Pump A not ready</li></ul>', '488224a0-8253-11ed-b600-4d847242d65b', '7', '-', NULL, '2022-12-22 22:55:04', '2022-12-23 13:16:32'),
('183a6870-8288-11ed-962e-cd693b55b530', '9917121LBY', '7d164383-2e0f-40bf-9bde-e20695ef7f39', '-', 'ARIEF CHAIRUDIN', 'Shift G', 'Unit 4', '2022-10-16', '09:40:00', '0', '0', 'Not Ready', 'Ready', '0', '0', 'Normal', '<ul><li>HP Pump A Not Ready</li></ul>', 'ad9ba2a0-8287-11ed-baa9-e753e2039804', '1', 'sangat sesuai', NULL, '2022-12-23 05:07:35', '2022-12-23 09:36:15'),
('2e61d630-8260-11ed-8d28-797fca943b09', '9112056DY', 'f1e78915-2194-4438-beb4-87eb9c1cb855', '-', 'MUHAMMAD FAUZAN HADI', 'Shift F', 'Unit 3', '2022-09-18', '10:23:00', '22.76', '26.49', 'Ready', 'Ready', '2.85', '2.87', 'Abnormal', '<ul><li>DP High Abnormal</li></ul>', 'f832e830-825f-11ed-bdf5-ed9b9dc24eef', '7', '-', NULL, '2022-12-23 00:21:52', '2022-12-23 04:55:03'),
('30542a00-8289-11ed-bd17-a7ccfda1daf1', '9312004DY', '8ec55a28-e592-4021-a487-47bd0f743fe0', 'MAULIDI RAHIM', 'MUHAMMAD FAUZAN HADI', 'Shift F', 'Unit 4', '2022-11-06', '09:56:00', '0', '26.42', 'Not Ready', 'Ready', '0', '2.08', 'Normal', '<ul><li>HP Pump A Not Ready</li></ul>', '937bf370-8288-11ed-b957-8107569e16d8', '7', '-', NULL, '2022-12-23 05:15:25', '2022-12-23 05:16:30'),
('36fe9680-825f-11ed-8c8d-8d6ad3c743d9', '9112056DY', 'f1e78915-2194-4438-beb4-87eb9c1cb855', '-', 'MUHAMMAD FAUZAN HADI', 'Shift F', 'Unit 4', '2022-09-11', '09:35:00', '0', '0', 'Not Ready', 'Ready', '0', '0', 'Normal', '<ul><li>Trend Pressure dan Ampere tidak terbaca</li><li>HP A Not ready</li></ul>', '048f2b70-825f-11ed-bc8f-5746a3ff7a41', '7', '-', NULL, '2022-12-23 00:14:57', '2022-12-23 04:48:55'),
('486a0970-825a-11ed-95c8-ed63569f785c', '9112056DY', 'f1e78915-2194-4438-beb4-87eb9c1cb855', 'ARIANTO', 'MUHAMMAD FAUZAN HADI', 'Shift F', 'Unit 4', '2022-07-24', '09:39:00', '0', '0', 'Not Ready', 'Ready', '0', '0', 'Normal', '<ul><li>Trend Ampere dan Pressure tidak terbaca</li><li>HP Pump A not ready</li></ul>', '6e5684a0-8254-11ed-b3c8-1104c739dbc4', '7', '-', NULL, '2022-12-22 23:39:39', '2022-12-23 04:41:51'),
('5b23bbc0-8287-11ed-a2ce-3348210204d9', '9917121LBY', '7d164383-2e0f-40bf-9bde-e20695ef7f39', 'RENALDY ANDRIANOOR', 'ARIEF CHAIRUDIN', 'Shift G', 'Unit 3', '2022-10-09', '09:24:00', '24.69', '24.69', 'Ready', 'Ready', '2.74', '2.74', 'Abnormal', '<ul><li>DP High Abnormal</li></ul>', '1368e8e0-8287-11ed-9d8d-61acc7df0fdb', '2', 'a', NULL, '2022-12-23 05:02:17', '2023-01-13 09:34:26'),
('5f178f30-825e-11ed-9a66-7fdface28b5d', '9917121LBY', '7d164383-2e0f-40bf-9bde-e20695ef7f39', '-', 'ARIEF CHAIRUDIN', 'Shift G', 'Unit 3', '2022-08-21', '09:38:00', '23.90', '23.90', 'Ready', 'Ready', '2.28', '2.28', 'Abnormal', '<ul><li>DP High Abnormal</li></ul>', '106ed3c0-825e-11ed-825d-057a07e0a7a0', '6', '-', NULL, '2022-12-23 00:08:55', '2022-12-23 09:35:50'),
('6ec7c140-8253-11ed-81f3-7f898b0ed164', '9112056DY', 'f1e78915-2194-4438-beb4-87eb9c1cb855', 'ARIANTO', 'MUHAMMAD FAUZAN HADI', 'Shift F', 'Unit 3', '2022-07-17', '09:49:00', '23.17', '23.17', 'Ready', 'Ready', '2.74', '2.74', 'Abnormal', '<ul><li>DP High Abnormal</li></ul>', '488224a0-8253-11ed-b600-4d847242d65b', '7', '-', NULL, '2022-12-22 22:50:37', '2022-12-23 13:16:19'),
('70b63080-825c-11ed-9832-a926f1d4f289', '9917121LBY', '7d164383-2e0f-40bf-9bde-e20695ef7f39', '-', 'ARIEF CHAIRUDIN', 'Shift G', 'Unit 3', '2022-08-14', '09:55:00', '23.18', '23.18', 'Ready', 'Ready', '2.74', '2.74', 'Abnormal', '<ul><li>DP High Abnormal</li></ul>', '258df3c0-825c-11ed-a1c3-492ea577e345', '4', '-', NULL, '2022-12-22 23:55:05', '2022-12-23 09:35:24'),
('73ad02d0-825f-11ed-86ec-cbe98db3ec6c', '9112056DY', 'f1e78915-2194-4438-beb4-87eb9c1cb855', '-', 'MUHAMMAD FAUZAN HADI', 'Shift F', 'Unit 3', '2022-09-11', '09:44:00', '23.64', '27.68', 'Ready', 'Ready', '2.90', '2.74', 'Abnormal', '<ul><li>DP High Abnormal</li></ul>', '048f2b70-825f-11ed-bc8f-5746a3ff7a41', '7', '-', NULL, '2022-12-23 00:16:39', '2022-12-23 04:52:56'),
('78140060-8255-11ed-a731-e1228531cf22', '9112056DY', 'f1e78915-2194-4438-beb4-87eb9c1cb855', 'ARIANTO', 'MUHAMMAD FAUZAN HADI', 'Shift F', 'Unit 3', '2022-07-24', '09:37:00', '21.3', '23.74', 'Ready', 'Ready', '2.74', '2.56', 'Abnormal', '<ul><li>DP High Abnormal</li></ul>', '6e5684a0-8254-11ed-b3c8-1104c739dbc4', '7', '-', NULL, '2022-12-22 23:05:11', '2022-12-23 04:44:42'),
('83888210-8287-11ed-9b6c-e360105a8643', '9917121LBY', '7d164383-2e0f-40bf-9bde-e20695ef7f39', 'RENALDY ANDRIANOOR', 'ARIEF CHAIRUDIN', 'Shift G', 'Unit 4', '2022-10-09', '09:30:00', '0', '0', 'Not Ready', 'Ready', '0', '0', 'Normal', '<ul><li>DP High Abnormal</li></ul>', '1368e8e0-8287-11ed-9d8d-61acc7df0fdb', '6', 'benar', NULL, '2022-12-23 05:03:25', '2022-12-23 09:36:04'),
('94086390-8286-11ed-9f12-2bcccf8e7baa', '9112056DY', 'f1e78915-2194-4438-beb4-87eb9c1cb855', '-', 'MUHAMMAD FAUZAN HADI', 'Shift F', 'Unit 4', '2022-09-18', '10:31:00', '0', '24.83', 'Not Ready', 'Ready', '0', '2.87', 'Normal', '<ul><li>HP Pump A Not ready</li></ul>', 'f832e830-825f-11ed-bdf5-ed9b9dc24eef', '1', '-', NULL, '2022-12-23 04:56:43', '2022-12-23 04:56:43'),
('ace2e9f0-825e-11ed-8f7f-f1d684a72cb5', '9917121LBY', '7d164383-2e0f-40bf-9bde-e20695ef7f39', 'RENALDY ANDRIANOOR', 'ARIEF CHAIRUDIN', 'Shift G', 'Unit 4', '2022-08-21', '09:16:00', '0', '0', 'Not Ready', 'Ready', '0', '0', 'Normal', '<ul><li>Trend Pressure dan Ampere tidak terbaca</li><li>HP A Not ready</li></ul>', '106ed3c0-825e-11ed-825d-057a07e0a7a0', '7', '-', NULL, '2022-12-23 00:11:05', '2022-12-23 09:24:28'),
('ee6db530-8287-11ed-b43d-152af4fd5a54', '9917121LBY', '7d164383-2e0f-40bf-9bde-e20695ef7f39', '-', 'ARIEF CHAIRUDIN', 'Shift G', 'Unit 3', '2022-10-16', '09:33:00', '24.56', '24.56', 'Ready', 'Ready', '2.88', '2.88', 'Abnormal', '<ul><li>DP High Abnormal</li></ul>', 'ad9ba2a0-8287-11ed-baa9-e753e2039804', '6', 'benar', NULL, '2022-12-23 05:06:25', '2022-12-23 09:36:29'),
('ef461a20-825c-11ed-a98d-75917a73a525', '9917121LBY', '7d164383-2e0f-40bf-9bde-e20695ef7f39', '-', 'ARIEF CHAIRUDIN', 'Shift G', 'Unit 4', '2022-08-14', '09:57:00', '0', '0', 'Ready', 'Ready', '0', '0', 'Normal', '<ul><li>HP Pump&nbsp; A Not Ready</li></ul>', '258df3c0-825c-11ed-a1c3-492ea577e345', '6', '-', NULL, '2022-12-22 23:58:38', '2022-12-23 09:35:36');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_11_29_183215_create_lfo_systems_table', 1),
(6, '2022_11_30_055058_create_status_equipment_table', 1),
(7, '2022_12_01_134635_create_edg_systems_table', 1),
(8, '2022_12_09_140433_create_leaders_table', 1),
(9, '2022_12_10_100024_create_burner_systems_table', 1),
(10, '2022_12_11_184248_create_forwardings_table', 1),
(21, '2022_12_20_093157_create_profiles_table', 2),
(26, '2022_12_23_064604_create_forwardings_table', 3),
(27, '2022_12_23_201440_create_lfo_systems_table', 3),
(28, '2022_12_28_185307_create_forwardings_table', 4),
(29, '2022_12_28_200336_create_lfo_systems_table', 5),
(30, '2022_12_29_045510_create_leaders_table', 6),
(31, '2022_12_30_045932_create_leaders_table', 7),
(41, '2022_12_30_053113_create_co_turbines_table', 8),
(42, '2022_12_30_053132_create_co_boilers_table', 8),
(43, '2022_12_30_053147_create_co_commons_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('yusuffront@gmail.com', '$2y$10$N4f9ErfVwXkbwzQXntKeo.5BFD9w2W3lrkKn1tj/w2zbVg1padI7W', '2022-12-23 21:41:08');

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
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '-',
  `profile_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `status_equipment`
--

CREATE TABLE `status_equipment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status_equipment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_equipment`
--

INSERT INTO `status_equipment` (`id`, `status_equipment`, `status_name`, `created_at`, `updated_at`) VALUES
(1, 'Waiting', 'Waiting', NULL, NULL),
(2, 'Forwarding', 'Forwarding', NULL, NULL),
(3, 'Rejected', 'Rejected', NULL, NULL),
(4, 'Waiting Material', 'Waiting Material', NULL, NULL),
(5, 'Working', 'Working', NULL, NULL),
(6, 'Normal', 'Resolved', NULL, NULL),
(7, 'Normal', 'Normal', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_panggilan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tim_divisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `atasan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nip`, `nama_lengkap`, `nama_panggilan`, `email`, `password`, `divisi`, `tim_divisi`, `jabatan`, `atasan`, `profile_img`, `deleted_at`, `created_at`, `updated_at`) VALUES
('044c5d9e-64c7-4595-b82f-a2cc0d76fafa', '9716039DY', 'RENALDY ANDRIANOOR', 'aldy', 'renaldy@gmail.com', '$2y$10$J160B6k09snH7B5.FkqP6O.Y2FaojLe3dmibIHEhDaQXMwG9Tggbq', 'Operasi', 'Shift G', 'Operator Boiler', 'ARIEF CHAIRUDIN', '-', NULL, '2022-12-21 09:25:41', '2022-12-21 09:25:41'),
('049cbfc0-9043-4a90-8228-fa1fa326bae4', '95160006LCY', 'ARIYANDI', 'ariyandi', 'ariyandi@gmail.com', '$2y$10$spCrkgUvAI/iu7iYbULPTuUbWuT.3bJQotvpqL0BCZTG1hgKahcRy', 'Operasi', 'Shift F', 'Operator Turbine', 'MUHAMMAD FAUZAN HADI', 'uploads/AW2Xs7eeQSIiEsjJoePRkPK4DTmr0wGfEx9dMZsj.jpg', NULL, '2022-12-21 09:29:03', '2022-12-21 11:35:44'),
('1b54f707-2e52-46e8-8af9-959fc0717f83', '8908026D', 'MUHAMMAD YUSDI RISADI', 'yusdi@', 'yusdi.risadi@gmail.com', '$2y$10$YEv2f3frD6mE0StdhJLFUuHAGsPwBUZnTePNgFOffw3pqlPXDBPeS', 'Pemiliharaan', 'Tim Har', 'Supervisor Pemeliharaan', 'FELANDI ARLIANTORO', '-', NULL, '2023-01-09 09:44:53', '2023-01-09 09:44:53'),
('37cfd369-0ca4-4219-a204-42fb17c8b207', '9717098LBY', 'MUHAMMAD ADHARI', 'adhari', 'adhari@gmail.com', '$2y$10$ppTFdiIQnULdylPi9PQRB.q8VOhCbQjcTiWi2PnFCrwsXV1p7KDFm', 'Operasi', 'Shift G', 'Operator Turbine', 'ARIEF CHAIRUDIN', 'uploads/8p9gKaO43H577PBN6teQmRK31oqXjwANGDqv98h7.jpg', NULL, '2022-12-20 22:24:45', '2022-12-21 10:52:20'),
('3fe2f12a-9b1a-4b37-b8fe-c977f8393bd9', '8910004D', 'ARIEF CHAIRUDIN99', 'arief', 'arief@gmail.com', '$2y$10$LOHdQxVMP.bKtm8eHxGRRumQB.7Sm4SXnwDcuBzjq9gDHu6hDMXqS', 'Operasi', 'Shift G', 'Supervisor Operasi', 'ISKANDAR SETIYAWAN', 'uploads/42UFjHnIh8YW81CENj7fhjwKN3zN2LGaXvYdhN0g.jpg', NULL, '2022-12-20 23:49:03', '2022-12-28 12:24:15'),
('66f6b4ad-13c7-4c91-83b9-4167703993b1', '9312065DY', 'SAFARIAN RISTU WIYONO', 'safar', 'safarian@gmail.com', '$2y$10$EDzGwFkjIN5HQGb.lgw3iOwS1DyiH4ANeksY3B1XBhR7NmIoLO0fe', 'Operasi', 'Shift H', 'Operator Boiler', 'DENNY WAHYUDI', 'uploads/5yEWEqzBbEY6VjeIggwlvYrDtTlgmihnqlRvq0I2.jpg', NULL, '2022-12-21 09:31:00', '2022-12-27 23:54:25'),
('78274edc-810b-44ae-a779-d5c005b76323', '9110007D', 'DENNY WAHYUDI', 'denny', 'denny@gmail.com', '$2y$10$0bbBXKx0.DUkC8ACPpZ5YeUgt80r8En75JJU8cn3fsFtywV6vWjtu', 'Operasi', 'Shift H', 'Supervisor Operasi', 'ISKANDAR SETIYAWAN', '-', NULL, '2022-12-21 01:50:29', '2022-12-21 01:50:29'),
('7d164383-2e0f-40bf-9bde-e20695ef7f39', '9917121LBY', 'MUHAMMAD YUSUF', 'yusuf99', 'yusuffront@gmail.com', '$2y$10$T/Y/Or/BqSC7DFgBaeJVBeIM7TyUe02Qm8bPooTHNg/Aw778DHdZW', 'Operasi', 'Shift G', 'Operator Boiler', 'ARIEF CHAIRUDIN', 'uploads/8XHqYUiFdF1AZTMDDWkdNVyttntaYFKswgTvrEvp.jpg', NULL, '2022-12-20 21:29:33', '2023-01-09 09:26:45'),
('800d5709-1953-46e1-83f0-e50836658c13', '9314020DY', 'DEDI ERFANSYAH', 'erfan', 'erfansyah@gmail.com', '$2y$10$sNPvw9EdlkIx2SFQGO3VK.VzmTg27lks9vm7QL1z8KO4QTiDQyUKO', 'Operasi', 'Shift E', 'Operator Turbine', 'AAN HASANUDIN', '-', NULL, '2022-12-21 09:22:39', '2022-12-21 09:22:39'),
('87b9042b-b172-448c-af93-337df8c4eb1c', '9312066DY', 'IMRON HAMZAH', 'imron', 'hamzah@gmail.com', '$2y$10$MERDJDGwH4lL5UoQUfPIBOlwqQVqA2MHQ3FJAEfuQRszOvJTCmdsW', 'Operasi', 'Shift H', 'Operator Boiler', 'DENNY WAHYUDI', '-', NULL, '2022-12-21 09:31:57', '2022-12-21 09:31:57'),
('8ec55a28-e592-4021-a487-47bd0f743fe0', '9312004DY', 'ALVI ALDIAN FIKRI', 'alvi', 'alvi@gmail.com', '$2y$10$Ue6Kd.bM7hX9PLBsdY4vHuquU2fpdbCZAtd16B62KsffNaNKZT8bC', 'Operasi', 'Shift F', 'Operator Boiler', 'MUHAMMAD FAUZAN HADI', 'uploads/xyLMYfXBuIs7yaW76xUZfpsbct1iRxykDmdCTccB.jpg', NULL, '2022-12-21 09:28:16', '2022-12-26 05:14:49'),
('a08afa74-cbd8-45a9-babd-5397d98fbc73', '9716043DY', 'MUHAMMAD MAHBUB MAHRUSI', 'mahbub', 'mahbub@gmail.com', '$2y$10$oR./F2aC9O9XIIrgzkM4xu6TAtYjuZhu08cPauyuU9j1KvwzGu2FK', 'Operasi', 'Shift H', 'Operator Turbine', 'DENNY WAHYUDI', '-', NULL, '2022-12-21 09:33:54', '2022-12-21 09:33:54'),
('a1d4m13i9n13', '00000000', 'adminer', 'bot34', 'adminerbot@gmail.com', '$2y$10$fj4k8a7QJgzJS6HRqd8zD.Y7513efKdM0J1g.2dI7Z9CrSYfUfi0S', 'Admin', 'Admin', '-', '-', '-', NULL, NULL, NULL),
('a4b09ef3-d7f2-42bd-805c-b7a0e90c413c', '9110024D', 'MUHAMMAD FAUZAN HADI', 'ozan', 'fauzan@gmail.com', '$2y$10$rSbiXhPqfQmQDV3p72a2zuRgcav7WHReHLA2Fi9a9pg.tiAFUnAS.', 'Operasi', 'Shift F', 'Supervisor Operasi', 'ISKANDAR SETIYAWAN', '-', NULL, '2022-12-21 09:37:01', '2022-12-21 09:40:32'),
('aa364a6b-c285-4ae9-a2c4-c53f4b9c9e11', '9312055DY', 'RAJIBI RAHMATULLAH', 'rajibi', 'rajibi@gmail.com', '$2y$10$jrvjUtfVjn3L29IyeMBVF.MkK1eZR.aJAuY8TxWF2JbawV7.E/WoG', 'Operasi', 'Shift E', 'Operator Turbine', 'AAN HASANUDIN', '-', NULL, '2022-12-21 09:21:32', '2022-12-21 09:21:32'),
('b0af130e-0b38-41b7-9e4d-5e1d92e69150', '9313039DY', 'BAGUS DEWANTORO', 'bagus', 'bagus@gmail.com', '$2y$10$wiR4R7PbkEMr4ONWkUqiLODggfUUzrHkTCNVqCZ9o/S70Kl65Cdam', 'Operasi', 'Shift G', 'Operator Turbine', 'ARIEF CHAIRUDIN', '-', NULL, '2022-12-21 09:26:44', '2022-12-21 09:26:44'),
('bbb30442-2c73-4685-8a93-973c868f0a7f', '9112045DY', 'ARIANTO', 'ari', 'arianto@gmail.com', '$2y$10$zDqvLlSrEuwucgw0TXx7K.knJHvHlcTt9.tWSKhpTylgEuIxLaJCK', 'Operasi', 'Shift E', 'Operator Boiler', 'AAN HASANUDIN', '-', NULL, '2022-12-21 09:24:37', '2022-12-21 09:24:37'),
('c52dfc23-687f-4c15-8709-942d5e341a46', '8708001D', 'AAN HASANUDIN', 'aan', 'aan@gmail.com', '$2y$10$j6HlX4QyXjp6.lmwAKwYFuSiz4uLNhgrljP/rABNdRr6LIeZB8mLG', 'Operasi', 'Shift E', 'Supervisor Operasi', 'ISKANDAR SETIYAWAN', '-', NULL, '2022-12-21 09:35:26', '2022-12-21 09:41:01'),
('d2ced3d1-f854-40f8-8ee1-fb2fcddb5e4f', '97160039LCY', 'ANDRE YUDHIS LIBALEWI SUDARWI', 'andre', 'andre@gmail.com', '$2y$10$SzFCpPApdNgKZg5BMaLBROkdhp8nU6Gr8WhirJW6j5WOiJbi6sTKK', 'Operasi', 'Shift E', 'Operator Boiler', 'AAN HASANUDIN', '-', NULL, '2022-12-21 09:23:47', '2022-12-21 09:23:47'),
('d6e1edcf-4204-4c38-b91e-6e34882dba0d', '9212051DY', 'RAHMATULLAH', 'erte', 'rahmatullah@gmail.com', '$2y$10$.KWB9cgDY.As7jraS4MYJOPJUicNMB5kNcZlKWGTYdVC5HYsI/Shy', 'Operasi', 'Shift F', 'Operator Turbine', 'MUHAMMAD FAUZAN HADI', '-', NULL, '2022-12-21 09:29:58', '2022-12-21 09:29:58'),
('dc3547bb-cbec-4e15-9084-3bc4c7d4e55a', '94151073ZY', 'AIRLANGGA GUNTUR BUWUNO', 'guntur', 'guntur@gmail.com', '$2y$10$UGoUUmHcetjLGQbWRcJxaO20F.JN5VNYhTwJ0AuA9k9QKfRk0RORC', 'Operasi', 'Tim Har', 'Supervisor Pemeliharaan', 'FELANDI ARLIANTORO', 'uploads/c4mmJ6evKg3AcaPWImXQeyVfS1aKUabtzjNs1W6Z.jpg', NULL, '2022-12-21 00:01:21', '2023-01-13 06:44:22'),
('f1e78915-2194-4438-beb4-87eb9c1cb855', '9112056DY', 'MAULIDI RAHIM', 'maulidi00', 'maulidi@gmail.com', '$2y$10$0NM5FB/z4rdu4xsXaos8nOWggUN61yOzyEYebdhMLGR3QZM7Kx6b.', 'Operasi', 'Shift F', 'Operator Boiler', 'MUHAMMAD FAUZAN HADI', 'uploads/23pAYYJmuaZrQAhdSB4yW4WglUmUdmIXroV6pDyP.jpg', NULL, '2022-12-21 08:23:44', '2022-12-21 08:24:28'),
('fe7322cf-ce9c-431b-909b-eec41038a94a', '9412072DY', 'TRI HARYONO FAUZI', 'trikun', 'trikun@gmail.com', '$2y$10$.TMbUt14V5arabjQXzgSC.RIttpKSt7Cw7jJJ/K7.zVanVvOviRHG', 'Operasi', 'Shift H', 'Operator Turbine', 'DENNY WAHYUDI', '-', NULL, '2022-12-21 09:32:59', '2022-12-21 09:32:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `burner_systems`
--
ALTER TABLE `burner_systems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `burner_systems_user_id_foreign` (`user_id`);

--
-- Indexes for table `co_boilers`
--
ALTER TABLE `co_boilers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `co_boilers_user_id_foreign` (`user_id`);

--
-- Indexes for table `co_commons`
--
ALTER TABLE `co_commons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `co_commons_user_id_foreign` (`user_id`);

--
-- Indexes for table `co_turbines`
--
ALTER TABLE `co_turbines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `co_turbines_user_id_foreign` (`user_id`);

--
-- Indexes for table `edg_systems`
--
ALTER TABLE `edg_systems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `edg_systems_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `forwardings`
--
ALTER TABLE `forwardings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaders`
--
ALTER TABLE `leaders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `leaders_nip_unique` (`nip`);

--
-- Indexes for table `lfo_systems`
--
ALTER TABLE `lfo_systems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lfo_systems_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_user_id_foreign` (`user_id`);

--
-- Indexes for table `status_equipment`
--
ALTER TABLE `status_equipment`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status_equipment`
--
ALTER TABLE `status_equipment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `burner_systems`
--
ALTER TABLE `burner_systems`
  ADD CONSTRAINT `burner_systems_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `co_boilers`
--
ALTER TABLE `co_boilers`
  ADD CONSTRAINT `co_boilers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `co_commons`
--
ALTER TABLE `co_commons`
  ADD CONSTRAINT `co_commons_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `co_turbines`
--
ALTER TABLE `co_turbines`
  ADD CONSTRAINT `co_turbines_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `edg_systems`
--
ALTER TABLE `edg_systems`
  ADD CONSTRAINT `edg_systems_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lfo_systems`
--
ALTER TABLE `lfo_systems`
  ADD CONSTRAINT `lfo_systems_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
