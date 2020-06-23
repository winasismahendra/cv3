-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2020 at 07:15 AM
-- Server version: 10.4.10-MariaDB-log
-- PHP Version: 7.2.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cv`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `id` int(11) NOT NULL,
  `id_admin` bigint(20) NOT NULL,
  `judul` text NOT NULL,
  `cover` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `id_admin`, `judul`, `cover`, `created_at`, `updated_at`) VALUES
(3, 4, 'dasdd', '1589948567.IMG_20200304_184020.jpg', '2020-05-19 21:22:47', '2020-05-19 21:22:47'),
(4, 4, 'Pintu Alumunium 2', '1589950287.IMG_20200305_152643.jpg', '2020-05-19 21:51:27', '2020-05-19 21:51:27'),
(5, 4, 'upacara bendera', '1590808869.a.jpeg', '2020-05-29 20:21:09', '2020-05-29 20:21:09');

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `id` int(11) NOT NULL,
  `id_katalog` int(11) NOT NULL,
  `file` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`id`, `id_katalog`, `file`, `created_at`, `updated_at`) VALUES
(5, 6, '1589773300.@f-Baja-Ringan-800x445.jpg', '2020-05-17 20:41:40', '2020-05-17 20:41:40'),
(8, 7, '1589856126.IMG_20200307_164108.jpg', '2020-05-18 19:42:06', '2020-05-18 19:42:06'),
(9, 7, '1589856126.IMG_20200308_144227.jpg', '2020-05-18 19:42:06', '2020-05-18 19:42:06'),
(10, 6, '1590037732.IMG_20200305_192221.jpg', '2020-05-20 22:08:52', '2020-05-20 22:08:52'),
(11, 6, '1590037732.IMG_20200305_192249.jpg', '2020-05-20 22:08:52', '2020-05-20 22:08:52');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `id_album` int(11) NOT NULL,
  `file` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `id_album`, `file`, `created_at`, `updated_at`) VALUES
(1, 3, '1589948567.IMG_20200305_171143.jpg', '2020-05-19 21:22:47', '2020-05-19 21:22:47'),
(2, 3, '1589948567.IMG_20200305_171215.jpg', '2020-05-19 21:22:47', '2020-05-19 21:22:47'),
(3, 4, '1589950287.IMG_20200317_052722.jpg', '2020-05-19 21:51:27', '2020-05-19 21:51:27'),
(5, 4, '1590037937.IMG_20200304_184020.jpg', '2020-05-20 22:12:17', '2020-05-20 22:12:17'),
(6, 5, '1590808870.@f-Baja-Ringan-800x445.jpg', '2020-05-29 20:21:10', '2020-05-29 20:21:10'),
(7, 5, '1590808870.Alumunium-Al-Pengertian-Senyawa-dan-Sifat.jpg', '2020-05-29 20:21:10', '2020-05-29 20:21:10');

-- --------------------------------------------------------

--
-- Table structure for table `katalog`
--

CREATE TABLE `katalog` (
  `id` int(11) NOT NULL,
  `cover` text NOT NULL,
  `nama` text NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `katalog`
--

INSERT INTO `katalog` (`id`, `cover`, `nama`, `deskripsi`, `harga`, `created_at`, `updated_at`) VALUES
(6, '1589773300.IMG_20200305_125759.jpg', 'tes 2', 'dadasadasdasdasdasdasdasdasdasdasdasdasdasdzcxczzcz', 312313, '2020-05-17 20:41:40', '2020-05-18 02:47:55'),
(7, '1589856126.IMG_20200304_203712.jpg', 'Pintu Alumunium 2', 'dasaddddasdadadadada', 321312, '2020-05-18 19:42:06', '2020-05-18 19:42:06');

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
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'affan', 'affan@gmail.com', NULL, '$2y$10$Vh8PQd87yOD41/2lsaaxFe1TMAb0giWyWPezdWYaaSvmmxpIydQVi', NULL, '2020-05-12 21:25:14', '2020-05-12 21:25:14'),
(2, 'affan', 'affa2n@gmail.com', NULL, '$2y$10$iRx8eoSObOYqDSyptrO8C.daXOmhcoWqRhAhTq2Qvg8uaJnBbdHZW', NULL, '2020-05-12 21:26:18', '2020-05-12 21:26:18'),
(3, 'coba', 'c@gmisl.com', '2020-05-12 21:27:58', '$2y$10$JKI5319TDg1fXxEg9DZmNu9w7.1EZQRIrLTthOSuJW/QJnSqtgUHa', NULL, '2020-05-12 21:27:43', '2020-05-12 21:27:58'),
(4, 'Administrator', 'admin@gmail.com', '2020-05-13 09:59:00', '$2y$10$aUrEqJBadJ2mcD70kx.fPelEl0gNdjcTkJKsdJE6ff.ox7LXaC67q', NULL, '2020-05-13 09:58:44', '2020-05-13 09:59:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_katalog` (`id_katalog`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_album` (`id_album`);

--
-- Indexes for table `katalog`
--
ALTER TABLE `katalog`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `katalog`
--
ALTER TABLE `katalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `foto_ibfk_1` FOREIGN KEY (`id_katalog`) REFERENCES `katalog` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_ibfk_1` FOREIGN KEY (`id_album`) REFERENCES `album` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
