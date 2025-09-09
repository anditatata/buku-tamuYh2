-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2025 at 09:09 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bukutamu`
CREATE DATABASE IF NOT EXISTS `db_bukutamu` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_bukutamu`;
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
  `guru_id` int(11) NOT NULL,
  `guru_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`guru_id`, `guru_nama`) VALUES
(1, 'A.R Fauzan, S.Ip. M.M'),
(2, 'Ade Hartono, S.Pd'),
(3, 'Ade Rahmat Nugraha'),
(4, 'Adiwiguna, S.Pd'),
(5, 'Ahmad Saripuloh'),
(6, 'Anggita Septiani, S.T.P, M.Pd'),
(7, 'Annisa Intikarusdiansari, S.Pd.'),
(8, 'Apriliani Hardiyanti Hariyono, S.Pd'),
(9, 'Ariantonius Sagala, S.Kom'),
(10, 'Asep Saleh, S.E'),
(11, 'Atep Aulia Rahman, S.T. M.Kom'),
(12, 'Cecep Suryana, S.Si'),
(13, 'Dadan Rukma Dian Dawan, S.Pd'),
(14, 'Danty, S.Pd.'),
(15, 'Dede Saepudin, S.Pd'),
(16, 'Dedi Efendi, S.Kom'),
(17, 'Dedi Jaenudin'),
(18, 'Dena Handriana, M.Pd'),
(19, 'Desta Mulyanti, S.Sn'),
(20, 'Dicky Zulkarnaen'),
(21, 'Dini Karomna, S.Pd'),
(22, 'Dr. Ermawati, M.Kom'),
(23, 'Dr. Hj. Yani Heryani, M.M.Pd'),
(24, 'Dr. Sudarmi, M.Pd'),
(25, 'Dra. Mimy Ardiany, M.Pd'),
(26, 'Dra. Rahmi Dalilah Fitrianni'),
(27, 'Dra. Weni Asmaraeni'),
(28, 'Ela Nurlaela, S.Pd'),
(29, 'Endah Permatasari'),
(30, 'Endang Misnam'),
(31, 'Endang Sunandar, S.Pd., M.Pkim'),
(32, 'Eti Ariesanti, S.Pd'),
(33, 'Eva Zulva, S.Kom,I'),
(34, 'Fahira Armi Ramadhani, S.T'),
(35, 'Fertika, S.Pd'),
(36, 'Gina Urfah Mastur Sadili, S.Pd.'),
(37, 'Halida Farhani, S.Psi'),
(38, 'Hasan As\'ari, M.Kom'),
(39, 'Hazar Nurbani, M.Pd'),
(40, 'Hendra'),
(41, 'Heni Juhaeni, S.Pd'),
(42, 'Iah Robiah, S.Pd. Kim.'),
(43, 'Ina Marina, S.T'),
(44, 'Indira Sari Paputungan, M.Ed. Gr'),
(45, 'Indra Adiguna, S.T'),
(46, 'Iwan Setiawan'),
(47, 'Jaya Sumpena, M.Kom'),
(48, 'Kania Dewi Waluya, S.S.T'),
(49, 'Kiki Aima Mu\'mina, S.Pd'),
(50, 'Lia Yulianti, M.Pd'),
(51, 'Maspuri Andewi, S.Kom'),
(52, 'Maya Kusmayanti, M.Pd'),
(53, 'Meli Novita, M.M.Pd'),
(54, 'Mira Apriyani'),
(55, 'Muchamad Harry Ismail, S.T.R.Kom, M.M'),
(56, 'Nadia Afriliani, S.Pd'),
(57, 'Neneng Suhartini, S.Si, S.Pd. Gr'),
(58, 'Nina Dewi Koswara, S.Pd'),
(59, 'Nofa Nirawati, S.Pd, M.T'),
(60, 'Nogi Muharam, S.Kom.'),
(61, 'Nur Fauziyah Rahmawati, S.Pd'),
(62, 'Nurlaela, Sh'),
(63, 'Nurul Diningsih, S.Hum'),
(64, 'Octavina Sopamena, M.Pd'),
(65, 'Odang Supriatna, S.E.'),
(66, 'Oman Somana, M.Pd'),
(67, 'Popong Wariati, S.Pd'),
(68, 'Pratiwi, S.S.I'),
(69, 'Priyo Hadisuryo, S.S.T'),
(70, 'Rakiman'),
(71, 'Rani Rabiussani, M.Pd'),
(72, 'Regina Fitrie, S.Pd'),
(73, 'Ricky Valentine'),
(74, 'Rina Daryani, M.Pd'),
(75, 'Rini Dwiwahyuni, S.Pd'),
(76, 'Riska Fitriyanti, A.Md'),
(77, 'Rita Hartati, S.Pd, M.T'),
(78, 'Roby Ismail Adi Putra, S.A.P'),
(79, 'Ruhya, S.Ag, M.M.Pd'),
(80, 'Rukmana, S.Pd.I'),
(81, 'Sabila Fauziyya, S.Kom'),
(82, 'Safitri Insani, S.T.P'),
(83, 'Samsudin, S.Ag'),
(84, 'Santika, M.Pd'),
(85, 'Sarinah Br Ginting, M.Pd'),
(86, 'Shendy Antariksa, S.Hum'),
(87, 'Sugiyatmi, S.Si'),
(88, 'Sukmawidi, S.Pd'),
(89, 'Syafitri Kurniati Arief, S.Pd, M.T'),
(90, 'Taufik Hidayat, M.Pd'),
(91, 'Tessa Eka Yuniar, S.Pd'),
(92, 'Tini Rosmayani, S.Si'),
(93, 'Tita Heriyanti, S.Pd'),
(94, 'Tita Lismayanti, S.Pd'),
(95, 'Tiyas Rizkia, S.Li.'),
(96, 'Tubagus Saputra, M.Pd'),
(97, 'Ujang Suhara, S.Pd'),
(98, 'Uli Solihat Kamaluddin, S.Si, Gr'),
(99, 'Wanto Kurniawan'),
(100, 'Windawati Aisah, S.Si, S.Pd'),
(101, 'Windy Novia Anggraeni, S.Si'),
(102, 'Yeni Meilina, S.Pd'),
(103, 'Zaka Faishal Hadiyan S, Kom');

-- --------------------------------------------------------

--
-- Table structure for table `instansi`
--

CREATE TABLE `instansi` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `instansi_asal` varchar(255) NOT NULL,
  `keperluan` text NOT NULL,
  `kontak` varchar(20) NOT NULL,
  `guru_dituju` varchar(255) NOT NULL,
  `jumlah_peserta` int(11) NOT NULL,
  `waktu_kunjungan` time NOT NULL,
  `tanggal_kunjungan` date NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instansi`
--

INSERT INTO `instansi` (`id`, `nama`, `instansi_asal`, `keperluan`, `kontak`, `guru_dituju`, `jumlah_peserta`, `waktu_kunjungan`, `tanggal_kunjungan`, `foto`, `created_at`, `updated_at`) VALUES
(3, 'Ahmad Fauzi', 'smkn', 'ff', '094823904802', 'pak jaya', 111, '10:42:00', '2025-09-04', 'instansi/20621mv6AwcHeHFEs0Lp2LbK15mGU8VUN5h3zSim.png', '2025-09-03 20:40:02', '2025-09-03 20:40:33');

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
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_08_21_002546_add_nama_username_to_users_table', 2),
(5, '2025_08_28_004803_add_tipe_tamu_to_tamu_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orangtua`
--

CREATE TABLE `orangtua` (
  `id` int(11) NOT NULL,
  `nama_orangtua` varchar(255) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `kelas` varchar(255) DEFAULT NULL,
  `alamat` text NOT NULL,
  `kontak` varchar(20) NOT NULL,
  `guru_dituju` varchar(255) NOT NULL,
  `keperluan` text DEFAULT NULL,
  `waktu_kunjungan` time DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orangtua`
--

INSERT INTO `orangtua` (`id`, `nama_orangtua`, `nama_siswa`, `kelas`, `alamat`, `kontak`, `guru_dituju`, `keperluan`, `waktu_kunjungan`, `tanggal`, `foto`, `created_at`, `updated_at`) VALUES
(3, 'isna', 'velia', 'XII RPL 1', 'kircon', '089756436721', 'Bu Halida', 'dipanggil bk', '09:19:00', '2025-09-29', 'orangtua/FxXx0gnP7z96M78xhlkhXbJIjULUjq4yP9W61418.jpg', '2025-08-28 18:20:09', '2025-08-28 18:20:09'),
(5, 'pratiwi', 'lucky', 'xi rpl 11', 'll', '081234567890', 'dsahjhakjsd', 'dss', '02:18:00', '2025-09-04', 'orangtua/n8ESXMcbtk1LuC9vnbWHsZz4OyyGbKazRoeGIIRC.png', '2025-09-03 19:18:29', '2025-09-03 19:53:36'),
(6, 'pratiwi', 'lucky', 'xi rpl 10', '000', '081234567890', 'dsahjhakjsd', 'ddddd', '04:05:00', '2025-08-07', 'orangtua/F5tGCEvNXOzdDtTS0Xik7fhojQxxyFqJvkgLLZTd.jpg', '2025-09-03 21:05:20', '2025-09-03 21:05:20');

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
('1mchnX0aOIeYR1vvCwOXoVlbcUuM0HnU3QTSVTXB', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36 Edg/139.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoibUlQdTR0UjFvcjI5bElHOFk3Q3lKaG0zNDhBdjljWE01eU5VS01YMCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mzt9', 1757142346);

-- --------------------------------------------------------

--
-- Table structure for table `tamu_umum`
--

CREATE TABLE `tamu_umum` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `identitas` varchar(100) NOT NULL,
  `keperluan` varchar(100) NOT NULL,
  `guru_dituju` varchar(100) NOT NULL,
  `kontak` varchar(20) NOT NULL,
  `waktu_kunjungan` time NOT NULL,
  `tanggal_kunjungan` date DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tamu_umum`
--

INSERT INTO `tamu_umum` (`id`, `nama`, `identitas`, `keperluan`, `guru_dituju`, `kontak`, `waktu_kunjungan`, `tanggal_kunjungan`, `foto`, `created_at`, `updated_at`) VALUES
(15, 'adit', 'intel', 'ngebom', 'Maspuri Andewi', '081234567890', '10:05:00', '2025-09-02', 'tamu/C0Gml1kfTs6uhesgEIM6bwdIMFHhgjmbIDzeuvXc.jpg', '2025-09-01 18:06:03', '2025-09-01 18:06:03'),
(16, 'juyeon', 'alumni', 'seminar', 'Jaya Sumpena', '08957483721', '13:42:00', '2025-09-06', 'tamu/qsKVBmoKyM8VIqXQx2CgpxqPaL1cQlWJFp6YhSNr.jpg', '2025-09-01 18:43:07', '2025-09-05 23:56:23'),
(17, 'juyeon', 'guru', 'seminar', 'Bu Halida', '089756436721', '09:38:00', '2025-08-02', 'tamu/NXFklHyaQszX4P3UyutFsJTIW9oWc1gapkRxzVDD.jpg', '2025-09-01 19:38:56', '2025-09-01 19:39:26'),
(18, 'kai', 'Alumni', 'demo', 'papapappa', '089898989898', '12:58:00', '2025-09-03', 'tamu/GWRqsn2npdwB8EQfHkbn4yAtnaggkL9tVEDPOSPV.png', '2025-09-02 22:52:54', '2025-09-02 22:52:54'),
(19, 'juyeon', 'alumni', 'bnbnbb', 'Jaya Sumpena', '08957483721', '04:10:00', '2025-08-15', 'tamu/eJSXS5NLct0tjZakFHzyOrfo0Uvj1b8kYvX5wKDg.png', '2025-09-03 21:11:05', '2025-09-03 21:11:05'),
(20, 'juyeon', 'alumni', 'hhhhhhhhhhhhhhh', 'Jaya Sumpenannnn', '08957483721', '06:26:00', '2025-09-04', 'tamu_umum/wyxqYiqmp6q1dsQOwvZuCkl84aLEprwlExDOAUtC.png', '2025-09-03 23:27:06', '2025-09-04 00:15:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nama`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nabila A', 'Nabila A', 'Nabila-Admin1', 'nabila@admin.com', NULL, '$2y$12$4cWKhL7qw1/.yNXfyhNPgu0xHWpIBxNL8ykSi3tsFLvL3RGSyjV1y', NULL, '2025-08-20 17:27:01', '2025-08-20 17:27:01'),
(2, 'Alisha Rusmana', 'Alisha Rusmana', 'alisha123', 'alisharusmana23@gmail.com', NULL, '$2y$12$dbskr8GheS8l0shw8Z7NcuDnedDlUWJhzvvoF4mdCqGQnMqqkgmuC', NULL, '2025-08-20 17:52:25', '2025-08-20 17:52:25'),
(3, 'andita', 'andita', 'andita', 'anditaalifiah@gmail.com', NULL, '$2y$12$60F7AojtD6Y1dOyqkfjS6.8HTU9n6OuFYK1TrL1YJKMwrRwNyxfkK', NULL, '2025-08-20 17:58:15', '2025-09-06 00:02:37'),
(4, 'user1', 'user1', 'user1', 'user@user.com', NULL, '$2y$12$5u8p9ZWdS8haberRwSSZjeQdElZD3jUzb0mLDNTFOcpv6MaWPFTFG', NULL, '2025-08-21 17:47:32', '2025-08-21 17:47:32');

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
  ADD PRIMARY KEY (`guru_id`);

--
-- Indexes for table `instansi`
--
ALTER TABLE `instansi`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orangtua`
--
ALTER TABLE `orangtua`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tamu_umum`
--
ALTER TABLE `tamu_umum`
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
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `guru_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `instansi`
--
ALTER TABLE `instansi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orangtua`
--
ALTER TABLE `orangtua`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tamu_umum`
--
ALTER TABLE `tamu_umum`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
