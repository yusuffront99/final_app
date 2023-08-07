-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2023 at 05:39 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_equipment`
--

CREATE TABLE `about_equipment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_equipment` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `specification` longtext NOT NULL,
  `img_equipment` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_equipment`
--

INSERT INTO `about_equipment` (`id`, `name_equipment`, `position`, `description`, `specification`, `img_equipment`, `created_at`, `updated_at`) VALUES
(9, 'BURNER SYSTEM', '3', 'Burner merupakan alat untuk menghasilkan sumber api bagi boiler. Yaitu dengan cara membakar campuran bahan bakar (Gas) dan udara di dalam ruang bakar boiler. Sumber energi kalor atau panas diperoleh dari proses pembakaran. Proses pembakaran pada mesin tenaga uap terjadi pada furnace.', '<ul><li>Amount : 4 set Press.&nbsp;</li><li>Fuel oil : 3.0 Mpa&nbsp;</li><li>Flow fuel oil : 1400 Kg/h&nbsp;</li><li>Atomizing media : Udara</li></ul>', 'equipments/cJJQsMbsHEWPg4Xn6UIZng5GadXuv9N4fehjwXMI.jpg', '2023-07-07 10:46:42', '2023-07-07 10:47:12'),
(10, 'SOOTBLOWER', '4-5.5', 'Sootblower merupakan alat pembersih slag yang menempel pada pipa-pipa\r\nboiler yang terbentuk sebagai akibat dari hasil pembakaran. Hasil pembakaran\r\nbatubara selain menghasilkan Bottom Ash dan Fly Ash juga akan menyebabkan\r\nslagging dan fouling yang akan mengurangi efisiensi boiler. Dengan semakin\r\ntebal slag yang akan terbentuk, maka akan mengurangi perpindahan panas pada\r\npipa-pipa boiler.', '<div><strong>L3 type furnace soot blower :</strong></div><ul><li>Gun route : 400 mm</li><li>Rotating Speed : 5.6 rpm</li><li>Medium Temp :&nbsp; ≤ 370 oC</li><li>Effective Blowing : 2 m</li><li>Moving speed : 560 mm/min&nbsp;</li><li>Blowing Pressure : 0.78 – 1.96 Mpa</li><li>Steam Consumption : 30 – 50 Kg/min</li></ul><div><strong>C304c type long flexible soot blower</strong> :</div><ul><li>Gun route : 1.5 – 7.5 mm</li><li>Rotating Speed : 19 rpm</li><li>Medium Temp : ≤ 370 oC</li><li>Effective Blowing : 2 m</li><li>Moving speed : 2185 mm/min</li><li>Blowing Pressure : 0.78 – 1.96 Mpa</li><li>Steam Consumption : 50 – 75 Kg/min&nbsp;</li></ul><div>&nbsp;<strong>G3A type fixed revolving soot blower</strong>&nbsp;</div><ul><li>Rotating Speed :&nbsp; 1.36 rpm&nbsp; &nbsp;</li><li>Medium Temp : ≤ 370 oC</li><li>Effective Blowing radius :&nbsp; 1000 - 1500 mm</li><li>Blowing Pressure : 0.78 – 1.96 Mpa</li><li>Steam Consumption : 30 – 70 Kg/min&nbsp;</li></ul>', 'uploads/14moy8mNNXUBTlbQsoBwmyMnAYf6Fo7KDZuvCRSm.jpg', '2023-07-07 12:47:52', '2023-07-07 12:48:54'),
(11, 'HIGH SPEED DIESEL (HSD)', '1 (Common)', 'High Speed Diesel adalah kepanjangan HSD. Solar HSD adalah bahan bakar berbasis solar yang dirancang khusus untuk mesin diesel berkecepatan atau bertenaga tinggi (High RPM Diesel Engine). Pada umumnya, HSD digunakan pada mesin besar dengan kecepatan putaran tinggi diatas 1000 Rpm', '<div>-</div>', 'uploads/5cGsBHO46GtQfLAW9RDRDzdiJo41Bn39i4VKlRib.jpg', '2023-07-07 20:20:21', '2023-07-07 20:20:21'),
(12, 'FORWARDING PUMP', '1 (Common)', 'Forwarding Pump berfungsi sebagai nosel untuk memompakan solar dari Daily Tank menuju High Pressure Pump.', '<ul><li>&nbsp;Pump Discharge Pressure: (0.38 – 0.42 Mpa)&nbsp;</li></ul>', 'uploads/X2B5gqmMIpGAkEPw5ZTVzhEj9SUF61g56gArVVis.jpg', '2023-07-08 04:30:13', '2023-07-08 04:30:13');

-- --------------------------------------------------------

--
-- Table structure for table `burner_systems`
--

CREATE TABLE `burner_systems` (
  `id` char(36) NOT NULL,
  `user_id` char(36) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `operator_kedua` varchar(255) NOT NULL,
  `atasan` varchar(255) NOT NULL,
  `operator_shift` varchar(255) NOT NULL,
  `unit` enum('Unit 3','Unit 4') NOT NULL,
  `tanggal_update` date NOT NULL,
  `jam_update` time NOT NULL,
  `ket_burner1` longtext NOT NULL,
  `ket_burner2` longtext NOT NULL,
  `ket_burner3` longtext NOT NULL,
  `ket_burner4` longtext NOT NULL,
  `status_burner1` varchar(255) NOT NULL,
  `status_burner2` varchar(255) NOT NULL,
  `status_burner3` varchar(255) NOT NULL,
  `status_burner4` varchar(255) NOT NULL,
  `status_equipment_id` bigint(20) UNSIGNED NOT NULL,
  `catatan_spv` text NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `burner_systems`
--

INSERT INTO `burner_systems` (`id`, `user_id`, `nip`, `operator_kedua`, `atasan`, `operator_shift`, `unit`, `tanggal_update`, `jam_update`, `ket_burner1`, `ket_burner2`, `ket_burner3`, `ket_burner4`, `status_burner1`, `status_burner2`, `status_burner3`, `status_burner4`, `status_equipment_id`, `catatan_spv`, `deleted_at`, `created_at`, `updated_at`) VALUES
('03104a20-1862-11ee-bcc7-b99128d24acd', 'bbb30442-2c73-4685-8a93-973c868f0a7f', '9112045DY', '-', 'AAN HASANUDIN', 'Shift E', 'Unit 4', '2023-07-02', '06:52:00', 'selang pecah', 'Normal', 'Normal', 'Normal', 'Not Ready', 'Ready', 'Ready', 'Ready', 4, 'barang belum tersedia', NULL, '2023-07-01 21:52:53', '2023-08-05 07:24:12'),
('19525fc0-00ef-11ee-8414-992fab9f1722', '7d164383-2e0f-40bf-9bde-e20695ef7f39', '9917121LBY', '-', 'ARIEF CHAIRUDIN', 'Shift G', 'Unit 3', '2023-06-02', '10:42:00', 'Normal', 'Normal', 'Normal', 'Normal', 'Ready', 'Ready', 'Ready', 'Ready', 4, 'stok barang belum ada', NULL, '2023-06-01 17:42:21', '2023-08-05 07:28:56'),
('5c6d5f40-1fd6-11ee-97bd-a14247a8cf70', '87b9042b-b172-448c-af93-337df8c4eb1c', '9312066DY', '-', 'DENNY WAHYUDI', 'Shift H', 'Unit 3', '2023-07-11', '18:32:00', 'Normal', 'Normal', 'tabung regulator pecah', 'Normal', 'Ready', 'Ready', 'Not Ready', 'Not Ready', 6, '-', NULL, '2023-07-11 09:33:22', '2023-07-14 09:33:22'),
('642da480-1af0-11ee-83e2-998269d449dd', '044c5d9e-64c7-4595-b82f-a2cc0d76fafa', '9716039DY', '-', 'ARIEF CHAIRUDIN', 'Shift G', 'Unit 3', '2023-07-05', '12:54:00', 'Normal', 'selang pecah', 'Normal', 'Normal', 'Ready', 'Not Ready', 'Ready', 'Ready', 1, '-', NULL, '2023-07-05 03:57:07', '2023-08-05 07:28:08'),
('d6d2cf60-2b2d-11ee-bcd5-9b06961124bf', '66f6b4ad-13c7-4c91-83b9-4167703993b1', '9312065DY', '-', 'DENNY WAHYUDI', 'Shift H', 'Unit 3', '2023-07-26', '04:56:00', 'Normal', 'Power tidak ada dan selang regulator pecah', 'Pipeline Oil Dilepas', 'Normal', 'Ready', 'Not Ready', 'Not Ready', 'Ready', 6, '-', NULL, '2023-07-25 19:57:17', '2023-08-05 06:18:39'),
('df103610-21d7-11ee-96f2-8bd6829d7bd7', 'bbb30442-2c73-4685-8a93-973c868f0a7f', '9112045DY', '-', 'AAN HASANUDIN', 'Shift E', 'Unit 4', '2023-07-14', '07:49:00', 'Normal', 'Normal', 'Normal', 'Normal', 'Ready', 'Ready', 'Ready', 'Ready', 6, '-', NULL, '2023-07-13 22:49:13', '2023-07-08 22:49:13');

-- --------------------------------------------------------

--
-- Table structure for table `commons`
--

CREATE TABLE `commons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code_equipment` char(255) NOT NULL,
  `name_equipment` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `commons`
--

INSERT INTO `commons` (`id`, `code_equipment`, `name_equipment`, `created_at`, `updated_at`) VALUES
(1, 'Common', 'Compressor Control', NULL, NULL),
(2, 'Common', 'Compressor Service', NULL, NULL),
(3, 'Turbine', 'Gland Steam Exhauster', NULL, NULL),
(4, 'Turbine', 'Open Loop', NULL, NULL),
(5, 'Turbine', 'Close Loop', NULL, NULL),
(6, 'Boiler', 'Seal Air Fan', NULL, NULL),
(7, 'Boiler', 'Flame Scanner', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `co_boilers`
--

CREATE TABLE `co_boilers` (
  `id` char(36) NOT NULL,
  `user_id` char(36) NOT NULL,
  `operator_shift` varchar(255) NOT NULL,
  `unit` enum('Unit 3','Unit 4','Common') NOT NULL,
  `nama_peralatan` varchar(255) NOT NULL,
  `tanggal_update` date NOT NULL,
  `jam_update` time NOT NULL,
  `operasi_awal` varchar(255) NOT NULL,
  `rencana_operasi` varchar(255) NOT NULL,
  `operasi_akhir` varchar(255) NOT NULL,
  `status_kegiatan` varchar(255) NOT NULL,
  `status_peralatan` varchar(255) NOT NULL,
  `keterangan` longtext NOT NULL,
  `status_equipment_id` bigint(20) UNSIGNED NOT NULL,
  `catatan_spv` text NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `co_boilers`
--

INSERT INTO `co_boilers` (`id`, `user_id`, `operator_shift`, `unit`, `nama_peralatan`, `tanggal_update`, `jam_update`, `operasi_awal`, `rencana_operasi`, `operasi_akhir`, `status_kegiatan`, `status_peralatan`, `keterangan`, `status_equipment_id`, `catatan_spv`, `deleted_at`, `created_at`, `updated_at`) VALUES
('25341300-1efc-11ee-a79f-9b619c3202d2', 'f1e78915-2194-4438-beb4-87eb9c1cb855', 'Shift F', 'Unit 4', 'Seal Air Fan', '2023-07-10', '16:31:00', 'A', 'B', 'B', 'Terlaksana', 'Normal', 'normal operasi', 6, '-', NULL, '2023-07-10 07:31:19', '2023-07-10 12:01:55'),
('ec5a4cf0-178e-11ee-a77c-d13910a50354', '7d164383-2e0f-40bf-9bde-e20695ef7f39', 'Shift G', 'Unit 3', 'Seal Air Fan', '2023-07-01', '05:41:00', 'A', 'B', 'B', 'Terlaksana', 'Normal', 'Vibrasi masih tinggi', 2, 'stok barang kosong', NULL, '2023-06-30 20:41:51', '2023-08-05 08:50:01'),
('fdde5900-2b2e-11ee-8f83-2f9c669fbc5d', '66f6b4ad-13c7-4c91-83b9-4167703993b1', 'Shift H', 'Unit 3', 'Flame Scanner', '2023-07-26', '05:04:00', 'A', 'B', 'A', 'Tidak Terlaksana', 'Abnormal', 'Motor beroperasi normal', 1, '-', NULL, '2023-07-25 20:05:32', '2023-07-26 16:46:31');

-- --------------------------------------------------------

--
-- Table structure for table `co_commons`
--

CREATE TABLE `co_commons` (
  `id` char(36) NOT NULL,
  `user_id` char(36) NOT NULL,
  `operator_shift` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `nama_peralatan` varchar(255) NOT NULL,
  `tanggal_update` date NOT NULL,
  `jam_update` time NOT NULL,
  `operasi_awal` varchar(255) NOT NULL,
  `rencana_operasi` varchar(255) NOT NULL,
  `operasi_akhir` varchar(255) NOT NULL,
  `status_kegiatan` varchar(255) NOT NULL,
  `status_peralatan` varchar(255) NOT NULL,
  `keterangan` longtext NOT NULL,
  `status_equipment_id` bigint(20) UNSIGNED NOT NULL,
  `catatan_spv` text NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `co_commons`
--

INSERT INTO `co_commons` (`id`, `user_id`, `operator_shift`, `unit`, `nama_peralatan`, `tanggal_update`, `jam_update`, `operasi_awal`, `rencana_operasi`, `operasi_akhir`, `status_kegiatan`, `status_peralatan`, `keterangan`, `status_equipment_id`, `catatan_spv`, `deleted_at`, `created_at`, `updated_at`) VALUES
('9981afe0-32ab-11ee-9531-539d31e4186a', 'aa364a6b-c285-4ae9-a2c4-c53f4b9c9e11', 'Shift E', 'Compressor Control', 'Compressor Control', '2023-08-04', '17:45:00', 'B & C', 'A B C', 'A B C', 'Tidak Terlaksana', 'Abnormal', 'COMPRESSOR A VIBRASI DAN B NOISE', 2, '-', NULL, '2023-08-04 08:45:09', '2023-08-04 08:47:25');

-- --------------------------------------------------------

--
-- Table structure for table `co_turbines`
--

CREATE TABLE `co_turbines` (
  `id` char(36) NOT NULL,
  `user_id` char(36) NOT NULL,
  `operator_shift` varchar(255) NOT NULL,
  `unit` enum('Unit 3','Unit 4','Common') NOT NULL,
  `nama_peralatan` varchar(255) NOT NULL,
  `tanggal_update` date NOT NULL,
  `jam_update` time NOT NULL,
  `operasi_awal` varchar(255) NOT NULL,
  `rencana_operasi` varchar(255) NOT NULL,
  `operasi_akhir` varchar(255) NOT NULL,
  `status_kegiatan` varchar(255) NOT NULL,
  `status_peralatan` varchar(255) NOT NULL,
  `keterangan` longtext NOT NULL,
  `status_equipment_id` bigint(20) UNSIGNED NOT NULL,
  `catatan_spv` text NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `co_turbines`
--

INSERT INTO `co_turbines` (`id`, `user_id`, `operator_shift`, `unit`, `nama_peralatan`, `tanggal_update`, `jam_update`, `operasi_awal`, `rencana_operasi`, `operasi_akhir`, `status_kegiatan`, `status_peralatan`, `keterangan`, `status_equipment_id`, `catatan_spv`, `deleted_at`, `created_at`, `updated_at`) VALUES
('3c455700-1d51-11ee-8c07-3553eb4060a2', '049cbfc0-9043-4a90-8228-fa1fa326bae4', 'Shift F', 'Unit 4', 'Gland Steam Exhauster', '2023-07-08', '13:34:00', 'A', 'B', 'B', 'Terlaksana', 'Normal', 'Normal operasi', 3, '-', NULL, '2023-07-08 04:35:23', '2023-07-10 05:33:17'),
('feeba1c0-1f0c-11ee-bccc-1550641bdb31', 'aa364a6b-c285-4ae9-a2c4-c53f4b9c9e11', 'Shift E', 'Unit 3', 'Open Loop', '2023-07-10', '18:31:00', 'B', 'A', 'B', 'Tidak Terlaksana', 'Abnormal', 'pompa noise', 2, '-', NULL, '2023-07-10 09:31:57', '2023-08-05 21:38:25');

-- --------------------------------------------------------

--
-- Table structure for table `edg_systems`
--

CREATE TABLE `edg_systems` (
  `id` char(36) NOT NULL,
  `user_id` char(36) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `operator_kedua` varchar(255) NOT NULL,
  `atasan` varchar(255) NOT NULL,
  `operator_shift` varchar(255) NOT NULL,
  `tanggal_update` date NOT NULL,
  `lev_bbm_awal` varchar(255) NOT NULL,
  `lev_oli` varchar(255) NOT NULL,
  `teg_battery` varchar(255) NOT NULL,
  `jam_start` varchar(255) NOT NULL,
  `teg_out` varchar(255) NOT NULL,
  `frekuensi` varchar(255) NOT NULL,
  `putaran` varchar(255) NOT NULL,
  `temp_coolant` varchar(255) NOT NULL,
  `press_oli` varchar(255) NOT NULL,
  `jam_stop` varchar(255) NOT NULL,
  `lev_bbm_akhir` varchar(255) NOT NULL,
  `kondisi_peralatan` varchar(255) NOT NULL,
  `status_equipment_id` bigint(20) UNSIGNED NOT NULL,
  `keterangan` longtext NOT NULL,
  `catatan_spv` text NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `edg_systems`
--

INSERT INTO `edg_systems` (`id`, `user_id`, `nip`, `operator_kedua`, `atasan`, `operator_shift`, `tanggal_update`, `lev_bbm_awal`, `lev_oli`, `teg_battery`, `jam_start`, `teg_out`, `frekuensi`, `putaran`, `temp_coolant`, `press_oli`, `jam_stop`, `lev_bbm_akhir`, `kondisi_peralatan`, `status_equipment_id`, `keterangan`, `catatan_spv`, `deleted_at`, `created_at`, `updated_at`) VALUES
('1f9ee070-1d51-11ee-91c0-69c7b12a8229', '049cbfc0-9043-4a90-8228-fa1fa326bae4', '95160006LCY', '-', 'MUHAMMAD FAUZAN HADI', 'Shift F', '2023-07-08', '100', 'Normal', '23.5', '13:34', '200/300', '49.55', '1455', '56', '560', '14:15', '700', 'Abnormal', 6, 'normal operasi', 'normal', NULL, '2023-07-10 04:34:35', '2023-07-15 21:37:17'),
('5bef27c0-1f1c-11ee-8fd4-29ba4c9339e7', 'aa364a6b-c285-4ae9-a2c4-c53f4b9c9e11', '9312055DY', 'DEDI ERFANSYAH', 'AAN HASANUDIN', 'Shift E', '2023-07-10', '100', 'Normal', '23.5', '20:21', '200/300', '49.55', '1455', '56', '560', '20:21', '700', 'Normal', 3, 'normal', 'normal', NULL, '2023-07-10 11:21:55', '2023-07-26 08:13:16'),
('c05bcf10-2397-11ee-b35c-313308ca79d6', '728b8880-cf0e-46ea-a0fe-f411789d5155', '9717036LBY', '-', 'ARIEF CHAIRUDIN', 'Shift G', '2023-05-16', '850', 'Normal', '27.6', '13:14', '200/300', '49.55', '1455', '56', '560', '14:14', '850', 'Abnormal', 1, 'Normal ( Monitor Level Air Battery', '-', NULL, '2023-07-16 04:15:16', '2023-07-26 09:53:14'),
('d9c22e90-2b7f-11ee-91c0-e16d77565bdd', '800d5709-1953-46e1-83f0-e50836658c13', '9314020DY', '-', 'AAN HASANUDIN', 'Shift E', '2023-07-26', '100', 'Normal', '23.5', '14:43', '200/300', '49.55', '1455', '56', '560', '14:44', '700', 'Normal', 5, 'normal', '-', NULL, '2023-07-26 05:44:20', '2023-07-26 09:53:08'),
('e64ba190-31d8-11ee-8aae-ef5956ebc11a', 'fe7322cf-ce9c-431b-909b-eec41038a94a', '9412072DY', '-', 'DENNY WAHYUDI', 'Shift H', '2023-08-03', '850', 'Normal', '27.6', '16:36', '200/300', '49.55', '1455', '56', '560', '17:01', '700', 'Normal', 4, 'kondisi normal operasi', 'gangguan peralatan', NULL, '2023-08-03 07:36:54', '2023-08-05 08:53:42');

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
-- Table structure for table `fw__pumps`
--

CREATE TABLE `fw__pumps` (
  `id` char(36) NOT NULL,
  `user_id` char(36) NOT NULL,
  `operator_kedua` varchar(255) NOT NULL,
  `atasan` varchar(255) NOT NULL,
  `operator_shift` varchar(255) NOT NULL,
  `tanggal_update` date NOT NULL,
  `jam_update` time NOT NULL,
  `arus_FP_A` varchar(255) NOT NULL,
  `arus_FP_B` varchar(255) NOT NULL,
  `status_FP_A` varchar(255) NOT NULL,
  `status_FP_B` varchar(255) NOT NULL,
  `press_FP_A` varchar(255) NOT NULL,
  `press_FP_B` varchar(255) NOT NULL,
  `info_FP` longtext NOT NULL,
  `status_equipment_id` bigint(20) UNSIGNED NOT NULL,
  `catatan_spv` text NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fw__pumps`
--

INSERT INTO `fw__pumps` (`id`, `user_id`, `operator_kedua`, `atasan`, `operator_shift`, `tanggal_update`, `jam_update`, `arus_FP_A`, `arus_FP_B`, `status_FP_A`, `status_FP_B`, `press_FP_A`, `press_FP_B`, `info_FP`, `status_equipment_id`, `catatan_spv`, `deleted_at`, `created_at`, `updated_at`) VALUES
('17925050-18d6-11ee-bb27-0b5846e45d4c', 'f1e78915-2194-4438-beb4-87eb9c1cb855', '-', 'MUHAMMAD FAUZAN HADI', 'Shift F', '2023-07-02', '20:43:00', '0', '0', 'Not Ready', 'Ready', '0', '0', '<ul><li>Forwarding Pump B motor noise. Untuk sementara CB Di rack out</li></ul>', 6, '-', NULL, '2023-07-02 11:43:49', '2023-07-14 04:44:14'),
('50946100-178f-11ee-b439-ed89692ca9a1', '7d164383-2e0f-40bf-9bde-e20695ef7f39', '-', 'ARIEF CHAIRUDIN', 'Shift G', '2023-07-01', '05:43:00', '25', '0', 'Ready', 'Ready', '0', '0', '<ul><li>Forwarding Pump A motor dilepas</li><li>Forwarding Pump B Emergency Operation</li></ul>', 4, '-', NULL, '2023-06-30 20:44:39', '2023-08-04 08:02:30'),
('a0350200-2b34-11ee-b347-e303893958e0', '66f6b4ad-13c7-4c91-83b9-4167703993b1', '-', 'DENNY WAHYUDI', 'Shift H', '2023-07-26', '05:45:00', '0', '0', 'Ready', 'Not Ready', '0', '0', '<ul><li>Forwarding Pump B Short pada Panel CB 6 KV</li></ul>', 1, '-', NULL, '2023-07-25 20:45:52', '2023-08-03 14:18:06');

-- --------------------------------------------------------

--
-- Table structure for table `hp__pumps`
--

CREATE TABLE `hp__pumps` (
  `id` char(36) NOT NULL,
  `user_id` char(36) NOT NULL,
  `operator_kedua` varchar(255) NOT NULL,
  `atasan` varchar(255) NOT NULL,
  `operator_shift` varchar(255) NOT NULL,
  `unit` enum('Unit 3','Unit 4') NOT NULL,
  `tanggal_update` date NOT NULL,
  `jam_update` time NOT NULL,
  `arus_HP_A` varchar(255) NOT NULL,
  `arus_HP_B` varchar(255) NOT NULL,
  `status_HP_A` varchar(255) NOT NULL,
  `status_HP_B` varchar(255) NOT NULL,
  `press_HP_A` varchar(255) NOT NULL,
  `press_HP_B` varchar(255) NOT NULL,
  `DP_High` varchar(255) NOT NULL,
  `info_HP` longtext NOT NULL,
  `status_equipment_id` bigint(20) UNSIGNED NOT NULL,
  `catatan_spv` text NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hp__pumps`
--

INSERT INTO `hp__pumps` (`id`, `user_id`, `operator_kedua`, `atasan`, `operator_shift`, `unit`, `tanggal_update`, `jam_update`, `arus_HP_A`, `arus_HP_B`, `status_HP_A`, `status_HP_B`, `press_HP_A`, `press_HP_B`, `DP_High`, `info_HP`, `status_equipment_id`, `catatan_spv`, `deleted_at`, `created_at`, `updated_at`) VALUES
('27d82640-178f-11ee-9e11-a73e7bd80421', '7d164383-2e0f-40bf-9bde-e20695ef7f39', '-', 'ARIEF CHAIRUDIN', 'Shift G', 'Unit 4', '2023-07-01', '05:42:00', '15.5', '0', 'Ready', 'Ready', '3.5', '0', 'Abnormal', '<ul><li>normal operasi</li></ul>', 1, '-', NULL, '2023-07-15 20:43:31', '2023-08-04 08:03:42'),
('623e1aa0-2b34-11ee-b982-69b583a42d1d', '66f6b4ad-13c7-4c91-83b9-4167703993b1', '-', 'DENNY WAHYUDI', 'Shift H', 'Unit 3', '2023-07-26', '05:42:00', '18.5', '18.5', 'Not Ready', 'Ready', '3.5', '3.5', 'Abnormal', '<ul><li>DP High Hp Pump A tinggin sehingga perlu dilakukan cleaning filter</li></ul>', 5, '-', NULL, '2023-07-25 20:44:08', '2023-07-26 15:29:30');

-- --------------------------------------------------------

--
-- Table structure for table `hsd_levels`
--

CREATE TABLE `hsd_levels` (
  `id` char(36) NOT NULL,
  `user_id` char(36) NOT NULL,
  `operator_shift` varchar(255) NOT NULL,
  `storage_level` double(4,2) NOT NULL,
  `daily_level` double(4,2) NOT NULL,
  `status` enum('Normal','Abnormal') NOT NULL,
  `status_equipment_id` bigint(20) UNSIGNED NOT NULL,
  `info_hsd` longtext NOT NULL,
  `catatan_spv` text NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hsd_levels`
--

INSERT INTO `hsd_levels` (`id`, `user_id`, `operator_shift`, `storage_level`, `daily_level`, `status`, `status_equipment_id`, `info_hsd`, `catatan_spv`, `deleted_at`, `created_at`, `updated_at`) VALUES
('2067b0f0-2b34-11ee-9cdf-b30d2e54553a', '66f6b4ad-13c7-4c91-83b9-4167703993b1', 'Shift H', 4.00, 2.80, 'Normal', 1, '<ul><li>level masih normal dan peralatan normal</li></ul>', '-', NULL, '2023-07-25 20:42:17', '2023-07-25 20:42:17'),
('21f4e2a0-2b98-11ee-9273-5b2f1fb36ac4', '044c5d9e-64c7-4595-b82f-a2cc0d76fafa', 'Shift G', 4.85, 3.50, 'Normal', 1, '<ul><li>operasi normal yahoo</li></ul>', 'hello', NULL, '2023-07-26 08:38:09', '2023-08-05 08:40:49'),
('45d476a0-1d70-11ee-84a7-31545052a4cb', '7d164383-2e0f-40bf-9bde-e20695ef7f39', 'Shift G', 4.00, 4.00, 'Normal', 6, '<ul><li>normal operasi</li></ul>', '-', NULL, '2023-07-08 08:17:34', '2023-07-15 06:21:22'),
('4c4cc640-238b-11ee-b94a-3bf935ab8f57', 'bbb30442-2c73-4685-8a93-973c868f0a7f', 'Shift E', 3.00, 4.00, 'Normal', 6, '<ul><li>normal operasi</li></ul>', '-', NULL, '2023-07-16 02:46:08', '2023-07-16 02:46:08'),
('520ec400-1af2-11ee-9bb8-5512a232a685', '7d164383-2e0f-40bf-9bde-e20695ef7f39', 'Shift G', 1.50, 1.50, 'Abnormal', 2, '<ul><li>level solar low</li></ul>', '-', NULL, '2023-07-05 04:10:55', '2023-07-26 08:35:05'),
('6eff8b80-1af2-11ee-984f-b19338d716a1', '7d164383-2e0f-40bf-9bde-e20695ef7f39', 'Shift G', 4.50, 1.80, 'Normal', 4, '<ul><li>abnromal</li></ul>', 'level abnormal sehingga perlu kalibrasi ulang', NULL, '2023-07-05 04:11:44', '2023-08-05 08:58:51'),
('fb361220-178e-11ee-9ed5-d525c6b5d09c', '7d164383-2e0f-40bf-9bde-e20695ef7f39', 'Shift G', 5.55, 3.98, 'Normal', 6, '<ul><li>normal</li></ul>', '-', NULL, '2023-06-30 20:42:16', '2023-07-10 20:42:16');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(255) NOT NULL,
  `kategori_letak` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_nama`, `kategori_letak`) VALUES
(2, 'Dongeng', 'Rak A dan Rak B');

-- --------------------------------------------------------

--
-- Table structure for table `leaders`
--

CREATE TABLE `leaders` (
  `id` char(36) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leaders`
--

INSERT INTO `leaders` (`id`, `nip`, `nama_lengkap`, `jabatan`, `created_at`, `updated_at`) VALUES
('23b3874d-672d-4d96-8e75-240fc01a4a2e', '89112259Z', 'FELANDI ARLIANTORO', 'ASMAN PEMELIHARAAN', '2022-12-29 05:10:39', '2022-12-29 05:10:39'),
('300a4421-22d4-4462-b53e-3c93be529225', '9110007D', 'DENNY WAHYUDI', 'SUPERVISOR OPERASI', '2022-12-29 05:09:52', '2022-12-29 05:09:52'),
('36360a4f-7a99-455f-906b-1cf3ff5fbbd8', '8007070D', 'DANI ESA WINDIARTO', 'MANAJER', '2022-12-29 05:10:13', '2023-01-08 18:33:39'),
('8439d7d4-1f6e-4d99-a521-864f0554d6c1', '8910004D', 'ARIEF CHAIRUDIN', 'SUPERVISOR OPERASI', '2022-12-29 05:09:05', '2022-12-29 05:09:05'),
('ba0f93f0-9a3f-43ff-a428-e7fddcb58b30', '8714009ZY', 'ISKANDAR SETIYAWAN', 'ASMAN OPERASI', '2022-12-29 05:11:00', '2022-12-29 05:11:00'),
('d0d2dfe3-6b5b-4ce3-81af-98b334deb476', '8708001D', 'AAN HASANUDIN', 'SUPERVISOR OPERASI', '2022-12-29 05:06:25', '2022-12-29 05:06:25'),
('f797d038-4cb0-45a6-86cb-b363310d4c93', '9110024D', 'MUHAMMAD FAUZAN HADI', 'SUPERVISOR OPERASI', '2022-12-29 05:09:29', '2022-12-29 05:09:29');

-- --------------------------------------------------------

--
-- Table structure for table `maintenances`
--

CREATE TABLE `maintenances` (
  `id` char(36) NOT NULL,
  `user_id` char(36) NOT NULL,
  `repair_code` varchar(255) NOT NULL,
  `damage_date` varchar(255) NOT NULL,
  `repair_date` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `item_sp_1` varchar(255) NOT NULL,
  `item_sp_2` varchar(255) NOT NULL,
  `item_sp_3` varchar(255) NOT NULL,
  `item_price_1` varchar(255) NOT NULL,
  `item_price_2` varchar(255) NOT NULL,
  `item_price_3` varchar(255) NOT NULL,
  `item_total_1` varchar(255) NOT NULL,
  `item_total_2` varchar(255) NOT NULL,
  `item_total_3` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `maintenances`
--

INSERT INTO `maintenances` (`id`, `user_id`, `repair_code`, `damage_date`, `repair_date`, `category`, `unit`, `description`, `item_sp_1`, `item_sp_2`, `item_sp_3`, `item_price_1`, `item_price_2`, `item_price_3`, `item_total_1`, `item_total_2`, `item_total_3`, `total_price`, `deleted_at`, `created_at`, `updated_at`) VALUES
('2a29a6f9-2040-4f97-a723-6abea8eb3aff', '66f6b4ad-13c7-4c91-83b9-4167703993b1', 'fa139090', '26-07-2023', '27-07-2023', 'SOOTBLOWER SYSTEM', 'Unit 3', 'telah dilakukan penggantian gate valve pada sootblower L-1, G-34, G-35', 'Gate Valve', '-', '-', '27500000', '0', '0', '3', '0', '0', '82500000', '2023-08-03 06:19:39', '2023-07-26 15:37:09', '2023-08-03 06:19:39'),
('4321bfcc-2fe7-4a0b-a471-30e35a51e02a', 'f1e78915-2194-4438-beb4-87eb9c1cb855', 'e2a77c50', '03-08-2023', '03-08-2023', 'SOOTBLOWER SYSTEM', 'Unit 3', 'telah dilakukan penggantian parameter gauge pressure', 'Parameter Gauge', '-', '-', '2500000', '0', '0', '1', '0', '0', '2500000', NULL, '2023-08-03 06:23:32', '2023-08-03 06:23:32'),
('56cc23e7-4d63-4131-998c-a79961bf77a5', '049cbfc0-9043-4a90-8228-fa1fa326bae4', '5479fea0', '2023-07-15', '2023-07-21', 'CHANGE OVER COMMON', 'Common', '<ul><li>penggantian impeller pump compressor</li><li>Penggantian unit baru motor pump compressor</li></ul>', 'Impeller Pump', 'Motor Pump', '-', '1500000', '2500000', '0', '1', '1', '0', '4000000', '2023-08-03 07:05:34', '2023-07-11 23:09:23', '2023-08-03 07:05:34'),
('57fdd441-ab1c-4f32-b701-1d6be5f6221f', '66f6b4ad-13c7-4c91-83b9-4167703993b1', 'd6d2cf60', '26-07-2023', '05-08-2023', 'BURNER SYSTEM', 'Unit 3', 'telah dilakukan penggantian pada blade damper', 'Blade Damper', '-', '-', '1', '0', '0', '1250000', '0', '0', '1250000', NULL, '2023-08-05 09:17:06', '2023-08-05 09:17:06'),
('7d3bfb84-272c-4fe7-8d0e-cb036527d3b7', '66f6b4ad-13c7-4c91-83b9-4167703993b1', '45e78520', '13-07-2023', '15-07-2023', 'SOOTBLOWER SYSTEM', 'Unit 3', 'penggantian paramater gauge', 'Parameter Gauge', '-', '-', '12500000', '0', '0', '1', '0', '0', '12500000', '2023-08-03 06:19:20', '2023-07-20 07:28:26', '2023-08-03 06:19:20');

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
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_11_30_055058_create_status_equipment_table', 1),
(6, '2022_12_20_093157_create_profiles_table', 1),
(7, '2023_01_13_191347_create_users_table', 1),
(8, '2023_02_02_064808_create_burner_systems_table', 1),
(9, '2023_02_02_065041_create_edg_systems_table', 1),
(10, '2023_02_02_072404_create_leaders_table', 1),
(11, '2023_02_02_072427_create_co_turbines_table', 1),
(12, '2023_02_02_072441_create_co_boilers_table', 1),
(13, '2023_02_02_072454_create_co_commons_table', 1),
(14, '2023_02_02_074011_create_commons_table', 1),
(15, '2023_03_09_172915_create_hp__pumps_table', 1),
(16, '2023_03_09_172939_create_fw__pumps_table', 1),
(17, '2023_03_11_191834_create_hsd_levels_table', 1),
(18, '2023_06_14_184744_create_sootblowers_table', 1),
(19, '2023_07_07_083054_create_about_controllers_table', 2),
(21, '2023_07_07_085904_create_about_equipment_table', 3),
(26, '2023_07_08_164314_create_task_schedules_table', 4),
(27, '2023_07_09_192350_create_events_table', 5),
(30, '2023_07_10_040134_create_task_schedules_table', 6),
(41, '2023_07_11_215111_create_inventories_table', 7),
(42, '2023_07_11_214302_create_stocks_table', 8),
(44, '2023_07_12_051245_create_inventories_table', 9),
(59, '2023_07_15_194107_remove_burner_system_id_from_maintenances', 12),
(60, '2023_07_15_194222_remove_burner_system_id_from_maintenances', 12),
(63, '2023_07_12_154803_create_maintenances_table', 13),
(64, '2023_07_14_095808_create_spare_parts_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
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
  `user_id` char(36) NOT NULL,
  `no_hp` varchar(255) NOT NULL DEFAULT '-',
  `profile_img` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sootblowers`
--

CREATE TABLE `sootblowers` (
  `id` char(36) NOT NULL,
  `user_id` char(36) NOT NULL,
  `operator_kedua` varchar(255) NOT NULL,
  `atasan` varchar(255) NOT NULL,
  `operator_shift` varchar(255) NOT NULL,
  `unit` enum('Unit 3','Unit 4') NOT NULL,
  `tanggal_update` date NOT NULL,
  `jam_update` time NOT NULL,
  `status_sbl1` varchar(255) DEFAULT NULL,
  `status_sbl2` varchar(255) DEFAULT NULL,
  `status_sbl3` varchar(255) DEFAULT NULL,
  `status_sbl4` varchar(255) DEFAULT NULL,
  `status_sbl5` varchar(255) DEFAULT NULL,
  `status_sbl6` varchar(255) DEFAULT NULL,
  `status_sbl7` varchar(255) DEFAULT NULL,
  `status_sbl8` varchar(255) DEFAULT NULL,
  `status_sbl9` varchar(255) DEFAULT NULL,
  `status_sbl10` varchar(255) DEFAULT NULL,
  `status_sbl11` varchar(255) DEFAULT NULL,
  `status_sbl12` varchar(255) DEFAULT NULL,
  `status_sbl13` varchar(255) DEFAULT NULL,
  `status_sbl14` varchar(255) DEFAULT NULL,
  `status_sbl15` varchar(255) DEFAULT NULL,
  `status_sbl16` varchar(255) DEFAULT NULL,
  `status_sbl17` varchar(255) DEFAULT NULL,
  `status_sbl18` varchar(255) DEFAULT NULL,
  `status_sbl19` varchar(255) DEFAULT NULL,
  `status_sbl20` varchar(255) DEFAULT NULL,
  `status_sbl21` varchar(255) DEFAULT NULL,
  `status_sbl22` varchar(255) DEFAULT NULL,
  `status_sbl23` varchar(255) DEFAULT NULL,
  `status_sbl24` varchar(255) DEFAULT NULL,
  `status_sbl25` varchar(255) DEFAULT NULL,
  `status_sbl26` varchar(255) DEFAULT NULL,
  `status_sbl27` varchar(255) DEFAULT NULL,
  `status_sbl28` varchar(255) DEFAULT NULL,
  `status_sbl29` varchar(255) DEFAULT NULL,
  `status_sbl30` varchar(255) DEFAULT NULL,
  `status_sbl31` varchar(255) DEFAULT NULL,
  `status_sbl32` varchar(255) DEFAULT NULL,
  `status_sbl33` varchar(255) DEFAULT NULL,
  `status_sbl34` varchar(255) DEFAULT NULL,
  `status_sbl35` varchar(255) DEFAULT NULL,
  `status_sbl36` varchar(255) DEFAULT NULL,
  `keterangan` longtext NOT NULL,
  `catatan_spv` text NOT NULL,
  `status_equipment_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sootblowers`
--

INSERT INTO `sootblowers` (`id`, `user_id`, `operator_kedua`, `atasan`, `operator_shift`, `unit`, `tanggal_update`, `jam_update`, `status_sbl1`, `status_sbl2`, `status_sbl3`, `status_sbl4`, `status_sbl5`, `status_sbl6`, `status_sbl7`, `status_sbl8`, `status_sbl9`, `status_sbl10`, `status_sbl11`, `status_sbl12`, `status_sbl13`, `status_sbl14`, `status_sbl15`, `status_sbl16`, `status_sbl17`, `status_sbl18`, `status_sbl19`, `status_sbl20`, `status_sbl21`, `status_sbl22`, `status_sbl23`, `status_sbl24`, `status_sbl25`, `status_sbl26`, `status_sbl27`, `status_sbl28`, `status_sbl29`, `status_sbl30`, `status_sbl31`, `status_sbl32`, `status_sbl33`, `status_sbl34`, `status_sbl35`, `status_sbl36`, `keterangan`, `catatan_spv`, `status_equipment_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
('45e78520-22fa-11ee-af03-0121ad81b9a3', '66f6b4ad-13c7-4c91-83b9-4167703993b1', '-', 'DENNY WAHYUDI', 'Shift H', 'Unit 3', '2023-07-13', '18:27:00', 'L-1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<ul><li>L-1 OVERLOAD</li></ul><div><br></div>', '-', 6, NULL, '2023-01-08 09:28:00', '2023-01-08 10:48:30'),
('bffb8e10-170e-11ee-a5e0-31b23edb2d8c', '7d164383-2e0f-40bf-9bde-e20695ef7f39', '-', 'ARIEF CHAIRUDIN', 'Shift G', 'Unit 3', '2023-06-29', '14:24:00', 'L-1', 'L-2', 'L-3', 'L-4', 'L-5', 'L-6', 'L-7', 'L-8', 'L-9', 'L-10', 'L-11', 'L-12', 'L-13', 'L-14', 'L-15', 'L-16', 'L-17', 'L-18', 'L-19', 'L-20', 'L-21', 'L-22', 'G-34', 'C-24', 'C-25', 'C-26', 'C-27', 'C-28', 'C-29', 'C-30', 'G-31', 'G-32', 'G-33', 'G-34', 'G-35', 'YB-36', '<ul><li>TIDAK NORMAL</li></ul>', '-', 3, '2023-07-12 05:35:43', '2023-07-12 05:24:21', '2023-07-12 05:35:43'),
('c1b6d5d0-1af0-11ee-9f79-87a0bef700e6', '7d164383-2e0f-40bf-9bde-e20695ef7f39', '-', 'ARIEF CHAIRUDIN', 'Shift G', 'Unit 4', '2023-07-05', '12:59:00', 'L-1', NULL, NULL, 'L-4', NULL, NULL, NULL, NULL, NULL, NULL, 'L-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'G-32', NULL, NULL, NULL, NULL, '<ul><li>L-1 overload</li><li>L-4 Pelatuk dilepas</li><li>L-11 Beluk Konek Kabel karena power tidak ada</li></ul>', '-', 1, NULL, '2023-07-05 03:59:43', '2023-08-03 21:18:04'),
('cfce24a0-178e-11ee-8106-b9e58be81c14', '7d164383-2e0f-40bf-9bde-e20695ef7f39', '-', 'ARIEF CHAIRUDIN', 'Shift G', 'Unit 3', '2023-07-01', '05:40:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'C-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'G-31', NULL, NULL, NULL, NULL, NULL, '<div><br></div><ul><li>C-23 Shaft bengkok</li><li>G-31 Motor dan Gearbox tidak ada</li></ul>', '-', 4, NULL, '2023-06-30 20:41:03', '2023-08-05 08:37:14'),
('e2a77c50-31c9-11ee-a555-a9b1efb72217', 'f1e78915-2194-4438-beb4-87eb9c1cb855', '-', 'MUHAMMAD FAUZAN HADI', 'Shift F', 'Unit 3', '2023-08-03', '14:48:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<ul><li><br></li></ul>', '-', 6, NULL, '2023-08-03 05:49:25', '2023-08-03 05:50:16'),
('fa139090-2b2d-11ee-8fa3-ed91a07a3679', '66f6b4ad-13c7-4c91-83b9-4167703993b1', '-', 'DENNY WAHYUDI', 'Shift H', 'Unit 3', '2023-07-26', '04:57:00', NULL, 'L-2', 'L-3', 'L-4', 'L-5', 'L-6', 'L-7', 'L-8', 'L-9', 'L-10', 'L-11', 'L-12', 'L-13', 'L-14', 'L-15', 'L-16', 'L-17', 'L-18', 'L-19', 'L-20', 'L-21', 'L-22', 'C-23', 'C-24', 'C-25', 'C-26', 'C-27', 'C-28', 'C-29', 'C-30', 'G-31', NULL, 'G-33', NULL, 'G-35', NULL, '<ul><li>Sootblower gangguan semua</li></ul>', '-', 6, NULL, '2023-07-25 19:58:16', '2023-07-26 15:35:16');

-- --------------------------------------------------------

--
-- Table structure for table `spare_parts`
--

CREATE TABLE `spare_parts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL,
  `spare_part_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spare_parts`
--

INSERT INTO `spare_parts` (`id`, `category`, `spare_part_name`, `created_at`, `updated_at`) VALUES
(1, 'BOILER', 'Blade Damper', NULL, NULL),
(2, 'TURBINE', 'Impeller Pump', NULL, NULL),
(3, 'COMMON', 'Parameter Gauge', NULL, NULL),
(4, 'BOILER', 'Regulator', NULL, NULL),
(5, 'TURBINE', 'Motor Pump', NULL, NULL),
(6, 'COMMON', 'Main Open Valve', NULL, NULL),
(7, 'COMMON', 'Gate Valve', NULL, NULL),
(8, 'COMMON', 'Butterfly Valve', NULL, NULL),
(9, 'COMMON', 'Globe Valve', NULL, NULL),
(10, 'BOILER', 'Motor Fan', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status_equipment`
--

CREATE TABLE `status_equipment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status_equipment` varchar(255) NOT NULL,
  `status_name` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_equipment`
--

INSERT INTO `status_equipment` (`id`, `status_equipment`, `status_name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Waiting', 'Waiting', NULL, NULL, NULL),
(2, 'Forward', 'Forward', NULL, NULL, NULL),
(3, 'Rejected', 'Rejected', NULL, NULL, NULL),
(4, 'Waiting Material', 'Waiting Material', NULL, NULL, NULL),
(5, 'Working', 'Working', NULL, NULL, NULL),
(6, 'Normal', 'Resolved', NULL, NULL, NULL),
(7, 'Normal', 'Normal', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `task_schedules`
--

CREATE TABLE `task_schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task_schedules`
--

INSERT INTO `task_schedules` (`id`, `title`, `start`, `end`, `created_at`, `updated_at`) VALUES
(1, 'EDG', '2023-07-14', '2023-07-14', '2023-07-12 00:03:56', '2023-07-12 00:03:56'),
(2, 'EDG', '2023-07-21', '2023-07-21', '2023-07-12 00:04:08', '2023-07-12 00:04:08'),
(3, 'Burner', '2023-07-16', '2023-07-16', '2023-07-12 00:04:22', '2023-07-12 00:04:22'),
(5, 'Burner', '2023-08-10', '2023-08-08', '2023-08-06 03:36:28', '2023-08-06 03:36:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(36) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `nama_panggilan` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `divisi` varchar(255) NOT NULL,
  `tim_divisi` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `atasan` varchar(255) NOT NULL,
  `profile_img` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nip`, `nama_lengkap`, `nama_panggilan`, `email`, `password`, `divisi`, `tim_divisi`, `jabatan`, `atasan`, `profile_img`, `deleted_at`, `created_at`, `updated_at`) VALUES
('044c5d9e-64c7-4595-b82f-a2cc0d76fafa', '9716039DY', 'RENALDY ANDRIANOOR', 'aldy', 'renaldy@gmail.com', '$2y$10$J160B6k09snH7B5.FkqP6O.Y2FaojLe3dmibIHEhDaQXMwG9Tggbq', 'Operasi', 'Shift G', 'Operator Boiler', 'ARIEF CHAIRUDIN', '-', NULL, '2022-12-20 17:25:41', '2022-12-20 17:25:41'),
('049cbfc0-9043-4a90-8228-fa1fa326bae4', '95160006LCY', 'ARIYANDI', 'ariyandi', 'ariyandi@gmail.com', '$2y$10$spCrkgUvAI/iu7iYbULPTuUbWuT.3bJQotvpqL0BCZTG1hgKahcRy', 'Operasi', 'Shift F', 'Operator Turbine', 'MUHAMMAD FAUZAN HADI', 'uploads/s1Qjb3iH7fnNHESZQf1RTp0WpV83B4evPWGg42zC.png', NULL, '2022-12-20 17:29:03', '2023-07-08 04:33:52'),
('1b54f707-2e52-46e8-8af9-959fc0717f83', '8908026D', 'MUHAMMAD YUSDI RISADI', 'yusdi@', 'yusdi.risadi@gmail.com', '$2y$10$YEv2f3frD6mE0StdhJLFUuHAGsPwBUZnTePNgFOffw3pqlPXDBPeS', 'Pemiliharaan', 'Tim Har', 'Supervisor Pemeliharaan', 'FELANDI ARLIANTORO', '-', NULL, '2023-01-08 17:44:53', '2023-01-08 17:44:53'),
('37cfd369-0ca4-4219-a204-42fb17c8b207', '9717098LBY', 'MUHAMMAD ADHARI', 'adhari', 'adhari@gmail.com', '$2y$10$ppTFdiIQnULdylPi9PQRB.q8VOhCbQjcTiWi2PnFCrwsXV1p7KDFm', 'Operasi', 'Shift G', 'Operator Turbine', 'ARIEF CHAIRUDIN', 'uploads/lJIgGPVMun0BROsStk8HLEDqyHYWwsjnXg7zzlyy.jpg', NULL, '2022-12-20 06:24:45', '2023-08-03 04:33:48'),
('3fe2f12a-9b1a-4b37-b8fe-c977f8393bd9', '8910004D', 'ARIEF CHAIRUDIN99', 'arief', 'arief@gmail.com', '$2y$10$LOHdQxVMP.bKtm8eHxGRRumQB.7Sm4SXnwDcuBzjq9gDHu6hDMXqS', 'Operasi', 'Shift G', 'Supervisor Operasi', 'ISKANDAR SETIYAWAN', 'uploads/Z7wVibx6MaqYkvSuMJAbv5qu3Jhb9zRDUVEO3yw1.jpg', NULL, '2022-12-20 07:49:03', '2023-07-08 00:26:08'),
('4b1001ae-fb25-4b0c-afdc-0a71620b69f7', 'Ahmad', 'Ahmad', 'Ahmed', 'ahmad@gmail.com', '$2y$10$cPNn9pZjamJJpbfvzk685uh8h60VqGLCIwyVKc7u3BeTyGVcoH1U2', 'Operasi', 'Shift G', 'Operator Boiler', 'ARIEF CHAIRUDIN', 'uploads/tra5r3RGmZyQRR4fKq3g5Zl2qHHCO86Y3IpBCmXY.jpg', NULL, '2023-07-06 03:05:25', '2023-07-06 03:06:38'),
('66f6b4ad-13c7-4c91-83b9-4167703993b1', '9312065DY', 'SAFARIAN RISTU WIYONO', 'safar', 'safarian@gmail.com', '$2y$10$EDzGwFkjIN5HQGb.lgw3iOwS1DyiH4ANeksY3B1XBhR7NmIoLO0fe', 'Operasi', 'Shift H', 'Operator Boiler', 'DENNY WAHYUDI', 'uploads/cL1Udpgit2PQVzgZA0nbD3MZkj9rr56jms83u3iB.png', NULL, '2022-12-20 17:31:00', '2023-07-25 19:56:02'),
('728b8880-cf0e-46ea-a0fe-f411789d5155', '9717036LBY', 'MUHAMMAD ADHARI', 'ADR', 'ADR17@gmail.com', '$2y$10$jxiF3byjgG6FoS5KvolzouCsC.8YnWEFL3oAlDkdIDKIkliOuHyfC', 'Operasi', 'Shift G', 'Operator Turbine', 'ARIEF CHAIRUDIN', '-', NULL, '2023-07-16 04:12:56', '2023-07-16 04:12:56'),
('78274edc-810b-44ae-a779-d5c005b76323', '9110007D', 'DENNY WAHYUDI', 'denny', 'denny@gmail.com', '$2y$10$0bbBXKx0.DUkC8ACPpZ5YeUgt80r8En75JJU8cn3fsFtywV6vWjtu', 'Operasi', 'Shift H', 'Supervisor Operasi', 'ISKANDAR SETIYAWAN', '-', NULL, '2022-12-20 09:50:29', '2022-12-20 09:50:29'),
('7d164383-2e0f-40bf-9bde-e20695ef7f39', '9917121LBY', 'MUHAMMAD YUSUF', 'yusuf99', 'yusuffront@gmail.com', '$2y$10$T/Y/Or/BqSC7DFgBaeJVBeIM7TyUe02Qm8bPooTHNg/Aw778DHdZW', 'Operasi', 'Shift G', 'Operator Boiler', 'ARIEF CHAIRUDIN', 'uploads/ge8OTEq76G64I781h5X3oytgjmjf2RvkRSBcJpaN.png', NULL, '2022-12-20 05:29:33', '2023-07-07 09:10:33'),
('800d5709-1953-46e1-83f0-e50836658c13', '9314020DY', 'DEDI ERFANSYAH', 'erfan', 'erfansyah@gmail.com', '$2y$10$sNPvw9EdlkIx2SFQGO3VK.VzmTg27lks9vm7QL1z8KO4QTiDQyUKO', 'Operasi', 'Shift E', 'Operator Turbine', 'AAN HASANUDIN', '-', NULL, '2022-12-20 17:22:39', '2022-12-20 17:22:39'),
('87b9042b-b172-448c-af93-337df8c4eb1c', '9312066DY', 'IMRON HAMZAH', 'imron', 'hamzah@gmail.com', '$2y$10$MERDJDGwH4lL5UoQUfPIBOlwqQVqA2MHQ3FJAEfuQRszOvJTCmdsW', 'Operasi', 'Shift H', 'Operator Boiler', 'DENNY WAHYUDI', '-', NULL, '2022-12-20 17:31:57', '2022-12-20 17:31:57'),
('8ec55a28-e592-4021-a487-47bd0f743fe0', '9312004DY', 'ALVI ALDIAN FIKRI', 'alvi', 'alvi@gmail.com', '$2y$10$Ue6Kd.bM7hX9PLBsdY4vHuquU2fpdbCZAtd16B62KsffNaNKZT8bC', 'Operasi', 'Shift F', 'Operator Boiler', 'MUHAMMAD FAUZAN HADI', 'uploads/hyMzxFn8ZgnRnAQ29qvqK5vJWzNAoGpkxT5njnCo.jpg', NULL, '2022-12-20 17:28:16', '2023-07-08 04:32:49'),
('a08afa74-cbd8-45a9-babd-5397d98fbc73', '9716043DY', 'MUHAMMAD MAHBUB MAHRUSI', 'mahbub', 'mahbub@gmail.com', '$2y$10$oR./F2aC9O9XIIrgzkM4xu6TAtYjuZhu08cPauyuU9j1KvwzGu2FK', 'Operasi', 'Shift H', 'Operator Turbine', 'DENNY WAHYUDI', '-', NULL, '2022-12-20 17:33:54', '2022-12-20 17:33:54'),
('a1d4m13i9n13', '00000000', 'adminer', 'bot34', 'adminerbot@gmail.com', '$2y$10$fj4k8a7QJgzJS6HRqd8zD.Y7513efKdM0J1g.2dI7Z9CrSYfUfi0S', 'Admin', 'Admin', '-', '-', '-', NULL, NULL, NULL),
('a4b09ef3-d7f2-42bd-805c-b7a0e90c413c', '9110024D', 'MUHAMMAD FAUZAN HADI', 'ozan', 'fauzan@gmail.com', '$2y$10$rSbiXhPqfQmQDV3p72a2zuRgcav7WHReHLA2Fi9a9pg.tiAFUnAS.', 'Operasi', 'Shift F', 'Supervisor Operasi', 'ISKANDAR SETIYAWAN', '-', NULL, '2022-12-20 17:37:01', '2022-12-20 17:40:32'),
('aa364a6b-c285-4ae9-a2c4-c53f4b9c9e11', '9312055DY', 'RAJIBI RAHMATULLAH', 'rajibi', 'rajibi@gmail.com', '$2y$10$jrvjUtfVjn3L29IyeMBVF.MkK1eZR.aJAuY8TxWF2JbawV7.E/WoG', 'Operasi', 'Shift E', 'Operator Turbine', 'AAN HASANUDIN', '-', NULL, '2022-12-20 17:21:32', '2022-12-20 17:21:32'),
('ac2f9920-8027-4876-a8e1-43f07f06fe95', '12345', 'myadmin', 'myadmin', 'myadmin@gmail.com', '$2y$10$81SdbnxyjdIsi3s0GTmkTe5u38nR4knMhurSoKBmWXhij4SDPg//a', 'Admin', 'Admin', 'Admin', '-', '-', NULL, '2023-07-26 16:50:03', '2023-07-26 16:50:03'),
('b0af130e-0b38-41b7-9e4d-5e1d92e69150', '9313039DY', 'BAGUS DEWANTORO', 'bagus', 'bagus@gmail.com', '$2y$10$wiR4R7PbkEMr4ONWkUqiLODggfUUzrHkTCNVqCZ9o/S70Kl65Cdam', 'Operasi', 'Shift G', 'Operator Turbine', 'ARIEF CHAIRUDIN', '-', NULL, '2022-12-20 17:26:44', '2022-12-20 17:26:44'),
('bbb30442-2c73-4685-8a93-973c868f0a7f', '9112045DY', 'ARIANTO', 'ari', 'arianto@gmail.com', '$2y$10$zDqvLlSrEuwucgw0TXx7K.knJHvHlcTt9.tWSKhpTylgEuIxLaJCK', 'Operasi', 'Shift E', 'Operator Boiler', 'AAN HASANUDIN', '-', NULL, '2022-12-20 17:24:37', '2022-12-20 17:24:37'),
('c52dfc23-687f-4c15-8709-942d5e341a46', '8708001D', 'AAN HASANUDIN', 'aan', 'aan@gmail.com', '$2y$10$j6HlX4QyXjp6.lmwAKwYFuSiz4uLNhgrljP/rABNdRr6LIeZB8mLG', 'Operasi', 'Shift E', 'Supervisor Operasi', 'ISKANDAR SETIYAWAN', '-', NULL, '2022-12-20 17:35:26', '2022-12-20 17:41:01'),
('c5bb89e0-60f6-43df-ac95-9df556f8381b', '100000dy', 'ahmed', 'ahmed', 'ahmad0@gmail.com', '$2y$10$L63Vk5vf/56bBw.J6rDQ8uMtgexKKKVaM9jDWAVXHOUbhNEVJGVXO', 'Operasi', 'Shift G', 'Operator Boiler', 'ARIEF CHAIRUDIN', '-', NULL, '2023-07-06 09:17:14', '2023-07-06 09:17:14'),
('d2ced3d1-f854-40f8-8ee1-fb2fcddb5e4f', '97160039LCY', 'ANDRE YUDHIS LIBALEWI SUDARWI', 'andre', 'andre@gmail.com', '$2y$10$SzFCpPApdNgKZg5BMaLBROkdhp8nU6Gr8WhirJW6j5WOiJbi6sTKK', 'Operasi', 'Shift E', 'Operator Boiler', 'AAN HASANUDIN', '-', NULL, '2022-12-20 17:23:47', '2022-12-20 17:23:47'),
('d6e1edcf-4204-4c38-b91e-6e34882dba0d', '9212051DY', 'RAHMATULLAH', 'erte', 'rahmatullah@gmail.com', '$2y$10$.KWB9cgDY.As7jraS4MYJOPJUicNMB5kNcZlKWGTYdVC5HYsI/Shy', 'Operasi', 'Shift F', 'Operator Turbine', 'MUHAMMAD FAUZAN HADI', '-', NULL, '2022-12-20 17:29:58', '2022-12-20 17:29:58'),
('dc3547bb-cbec-4e15-9084-3bc4c7d4e55a', '94151073ZY', 'AIRLANGGA GUNTUR BUWUNO', 'guntur', 'guntur@gmail.com', '$2y$10$UGoUUmHcetjLGQbWRcJxaO20F.JN5VNYhTwJ0AuA9k9QKfRk0RORC', 'Operasi', 'Tim Har', 'Supervisor Pemeliharaan', 'FELANDI ARLIANTORO', 'uploads/dGsJKgMCExrSxhGCYQtYpQtu1GgU9E72oWNEpCFX.png', NULL, '2022-12-20 08:01:21', '2023-07-08 02:01:39'),
('e389a3c7-2993-4ebc-8aca-6b6b1ad6594a', '000', 'joy', 'joy', 'joy@gmail', '$2y$10$AtVeaU3KckQsaWZA9xskG.K/hRhuc7KbFgK5rEDXeiB.pnLjdJB/i', 'Operasi', 'Shift G', 'Operator Boiler', 'ARIEF CHAIRUDIN', '-', NULL, '2023-07-06 04:03:43', '2023-07-06 04:03:43'),
('f1e78915-2194-4438-beb4-87eb9c1cb855', '9112056DY', 'MAULIDI RAHIM', 'maulidi00', 'maulidi@gmail.com', '$2y$10$0NM5FB/z4rdu4xsXaos8nOWggUN61yOzyEYebdhMLGR3QZM7Kx6b.', 'Operasi', 'Shift F', 'Operator Boiler', 'MUHAMMAD FAUZAN HADI', 'uploads/xupJ6NTT52ryjYH0t5bYtCaZ4JXtf1JDrVD1nUk4.jpg', NULL, '2022-12-20 16:23:44', '2023-07-10 07:24:49'),
('fe7322cf-ce9c-431b-909b-eec41038a94a', '9412072DY', 'TRI HARYONO FAUZI', 'trikun', 'trikun@gmail.com', '$2y$10$.TMbUt14V5arabjQXzgSC.RIttpKSt7Cw7jJJ/K7.zVanVvOviRHG', 'Operasi', 'Shift H', 'Operator Turbine', 'DENNY WAHYUDI', '-', NULL, '2022-12-20 17:32:59', '2022-12-20 17:32:59'),
('ff78833e-d75b-48fd-88df-75431edcfd59', '000000DY', 'JOHAN', 'johan', 'johan@gmail.com', '$2y$10$0JaCA7Fw9wQNHHgPEbeDrOr76Aj/rxFIjhUspr2OVsfxtd1BnziV2', 'Operasi', 'Shift G', 'Operator Boiler', 'ARIEF CHAIRUDIN', 'uploads/0cnpOXPbjjCtvY0Ti6FJ80ERu4NdEmdedcapLctQ.png', NULL, '2023-06-01 15:31:01', '2023-06-01 15:35:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_equipment`
--
ALTER TABLE `about_equipment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `about_equipment_name_equipment_unique` (`name_equipment`);

--
-- Indexes for table `burner_systems`
--
ALTER TABLE `burner_systems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `burner_systems_user_id_foreign` (`user_id`),
  ADD KEY `burner_systems_status_equipment_id_foreign` (`status_equipment_id`);

--
-- Indexes for table `commons`
--
ALTER TABLE `commons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `co_boilers`
--
ALTER TABLE `co_boilers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `co_boilers_user_id_foreign` (`user_id`),
  ADD KEY `co_boilers_status_equipment_id_foreign` (`status_equipment_id`);

--
-- Indexes for table `co_commons`
--
ALTER TABLE `co_commons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `co_commons_user_id_foreign` (`user_id`),
  ADD KEY `co_commons_status_equipment_id_foreign` (`status_equipment_id`);

--
-- Indexes for table `co_turbines`
--
ALTER TABLE `co_turbines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `co_turbines_user_id_foreign` (`user_id`),
  ADD KEY `co_turbines_status_equipment_id_foreign` (`status_equipment_id`);

--
-- Indexes for table `edg_systems`
--
ALTER TABLE `edg_systems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `edg_systems_user_id_foreign` (`user_id`),
  ADD KEY `edg_systems_status_equipment_id_foreign` (`status_equipment_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fw__pumps`
--
ALTER TABLE `fw__pumps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fw__pumps_user_id_foreign` (`user_id`),
  ADD KEY `fw__pumps_status_equipment_id_foreign` (`status_equipment_id`);

--
-- Indexes for table `hp__pumps`
--
ALTER TABLE `hp__pumps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hp__pumps_user_id_foreign` (`user_id`),
  ADD KEY `hp__pumps_status_equipment_id_foreign` (`status_equipment_id`);

--
-- Indexes for table `hsd_levels`
--
ALTER TABLE `hsd_levels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hsd_levels_user_id_foreign` (`user_id`),
  ADD KEY `hsd_levels_status_equipment_id_foreign` (`status_equipment_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `leaders`
--
ALTER TABLE `leaders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `leaders_nip_unique` (`nip`);

--
-- Indexes for table `maintenances`
--
ALTER TABLE `maintenances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `maintenances_user_id_foreign` (`user_id`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sootblowers`
--
ALTER TABLE `sootblowers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sootblowers_user_id_foreign` (`user_id`),
  ADD KEY `sootblowers_status_equipment_id_foreign` (`status_equipment_id`);

--
-- Indexes for table `spare_parts`
--
ALTER TABLE `spare_parts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_equipment`
--
ALTER TABLE `status_equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_schedules`
--
ALTER TABLE `task_schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nip_unique` (`nip`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_equipment`
--
ALTER TABLE `about_equipment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `commons`
--
ALTER TABLE `commons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

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
-- AUTO_INCREMENT for table `spare_parts`
--
ALTER TABLE `spare_parts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `status_equipment`
--
ALTER TABLE `status_equipment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `task_schedules`
--
ALTER TABLE `task_schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `burner_systems`
--
ALTER TABLE `burner_systems`
  ADD CONSTRAINT `burner_systems_status_equipment_id_foreign` FOREIGN KEY (`status_equipment_id`) REFERENCES `status_equipment` (`id`),
  ADD CONSTRAINT `burner_systems_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `co_boilers`
--
ALTER TABLE `co_boilers`
  ADD CONSTRAINT `co_boilers_status_equipment_id_foreign` FOREIGN KEY (`status_equipment_id`) REFERENCES `status_equipment` (`id`),
  ADD CONSTRAINT `co_boilers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `co_commons`
--
ALTER TABLE `co_commons`
  ADD CONSTRAINT `co_commons_status_equipment_id_foreign` FOREIGN KEY (`status_equipment_id`) REFERENCES `status_equipment` (`id`),
  ADD CONSTRAINT `co_commons_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `co_turbines`
--
ALTER TABLE `co_turbines`
  ADD CONSTRAINT `co_turbines_status_equipment_id_foreign` FOREIGN KEY (`status_equipment_id`) REFERENCES `status_equipment` (`id`),
  ADD CONSTRAINT `co_turbines_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `edg_systems`
--
ALTER TABLE `edg_systems`
  ADD CONSTRAINT `edg_systems_status_equipment_id_foreign` FOREIGN KEY (`status_equipment_id`) REFERENCES `status_equipment` (`id`),
  ADD CONSTRAINT `edg_systems_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fw__pumps`
--
ALTER TABLE `fw__pumps`
  ADD CONSTRAINT `fw__pumps_status_equipment_id_foreign` FOREIGN KEY (`status_equipment_id`) REFERENCES `status_equipment` (`id`),
  ADD CONSTRAINT `fw__pumps_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hp__pumps`
--
ALTER TABLE `hp__pumps`
  ADD CONSTRAINT `hp__pumps_status_equipment_id_foreign` FOREIGN KEY (`status_equipment_id`) REFERENCES `status_equipment` (`id`),
  ADD CONSTRAINT `hp__pumps_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hsd_levels`
--
ALTER TABLE `hsd_levels`
  ADD CONSTRAINT `hsd_levels_status_equipment_id_foreign` FOREIGN KEY (`status_equipment_id`) REFERENCES `status_equipment` (`id`),
  ADD CONSTRAINT `hsd_levels_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `maintenances`
--
ALTER TABLE `maintenances`
  ADD CONSTRAINT `maintenances_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sootblowers`
--
ALTER TABLE `sootblowers`
  ADD CONSTRAINT `sootblowers_status_equipment_id_foreign` FOREIGN KEY (`status_equipment_id`) REFERENCES `status_equipment` (`id`),
  ADD CONSTRAINT `sootblowers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
