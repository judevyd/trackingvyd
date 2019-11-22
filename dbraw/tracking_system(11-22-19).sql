-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2019 at 09:46 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tracking_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `distributors`
--

CREATE TABLE `distributors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `distributor_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `distributor_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `joforder`
--

CREATE TABLE `joforder` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `refno` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orderno` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kind_of_order` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb_sales_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jofno` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `distributor_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `distributor_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trackingno` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_prepared` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kind_of_ring` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ring_size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `karat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_style` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kind_stone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oxidation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inside_engrave` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `left_shank` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `top_shank` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `right_shank` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attach_remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upload_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `sp_order` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `sp_approve` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `jof_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jof_history`
--

CREATE TABLE `jof_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `joforderid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jofno` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kind_of_ring` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jof_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(176, '2014_10_12_000000_create_users_table', 1),
(177, '2014_10_12_100000_create_password_resets_table', 1),
(178, '2019_09_20_023417_j_o_f_o_r_d_e_r', 1),
(179, '2019_09_24_054101_jof_history', 1),
(180, '2019_09_25_064602_number_series', 1),
(181, '2019_09_26_030448_create_websockets_statistics_entries_table', 1),
(182, '2019_10_01_030640_distributors', 1);

-- --------------------------------------------------------

--
-- Table structure for table `numberseries`
--

CREATE TABLE `numberseries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `series_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'VYD',
  `year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seriesno` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '00000',
  `incrementno` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `numberseries`
--

INSERT INTO `numberseries` (`id`, `series_code`, `year`, `seriesno`, `incrementno`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'VYD', '2019', '00000', 0, NULL, NULL, NULL),
(2, 'VYD', '2020', '00000', 0, NULL, NULL, NULL),
(3, 'VYD', '2021', '00000', 0, NULL, NULL, NULL),
(4, 'VYD', '2022', '00000', 0, NULL, NULL, NULL),
(5, 'VYD', '2023', '00000', 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` tinyint(1) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `organization_name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Vydomingo', 'IT Department', 'admin@vydomingo.com', NULL, '$2y$10$lcpVsGZVxZe4E4ZYKlNvp.ahGYTbxIMDHK124N2hoC7rYyfGxyGAC', 0, 'kIywmnGX4VQ1ByPMaIhRQ7D8GSWEfkT8bsLuI7VbWGsvaBGoK6TFBwUPv3Mp', '2019-10-16 01:25:33', '2019-10-16 01:25:33'),
(2, 'Jel', 'Santos', 'Sales Officer', 'jel@vydomingo.com', NULL, '$2y$10$g.G/0O/y8FEIAHiHXst8TufUaQ.THl7CBbgp0z.4jCc9r3CBPb.Vq', 9, 'tLF57NsYbLtzircZokODUmekqea5GLnO3BaNZUq0VGxhGA50hh0er5ckbtwl', '2019-10-16 03:52:13', '2019-10-16 03:52:13'),
(3, 'Kenneth', 'Luansing', 'Sales Officer', 'kenn@vydomingo.com', NULL, '$2y$10$ReG7rpO7ryIxcSC6ynI/Yua8vwtYsqvezbPad7g5BTVWKC87VWFaa', 9, '9fgD2AvS1gDbQvW8rWf1uwRb4C1Nd3m7IeOzkePgKml2ZfU3aKVlxAYPLWSw', '2019-10-16 03:52:53', '2019-10-16 03:52:53'),
(4, 'Shareen', 'alam', 'Sales Officer', 'shareen@vydomingo.com', NULL, '$2y$10$nOeDzKpojHW1ik14RY50cemEjaYfD28eeRg0m33nsB.A40fFrKpy.', 9, 'V379q46MkMVKD6GYJWmndgEdFmWzkW30DmXK6hapejcFTcxHT7acFCFWgtV3', '2019-10-16 03:54:07', '2019-10-16 03:54:07'),
(5, 'Arlene', 'Baludio', 'Sales Officer', 'arlene@vydomingo.com', NULL, '$2y$10$765Aevb.veNKSoVparw18.XH35s.tAmKQKtRJKXEFPHgWomWLk0EC', 9, '969udxMyxbZ0BBaHYT9a1tQ1JtIlf1rwtmYwKT2M6HcVGJB7WfumPnuv9etr', '2019-10-16 03:55:05', '2019-10-16 03:55:05'),
(6, 'Liza', 'Manalo', 'Sales Officer', 'liza@vydomingo.com', NULL, '$2y$10$lH3VGzfaGxZdongJkwQBWuuayJ6PRHizByqvdOOCASi/FeURTTSui', 9, 'I3qHp7YnPBUtaaXFvGxyY8aEbZwBdltgjfTOQHTjydzCGMWkghXNRhuvKDJ5', '2019-10-16 03:55:28', '2019-10-16 03:55:28'),
(7, 'Maricel', 'Oniragat', 'Sales Officer', 'maricel@vydomingo.com', NULL, '$2y$10$yaIoEZXv/K5f/VsaLdnX2ez6ALk8ph2Sm702AeHb1iho4zlSFxVI2', 9, 'zdCAXsT70YIlENpFsF040vi6XgJ4K67oszKvaeR6vAIMa620SvDqKfAw90IW', '2019-10-16 03:56:11', '2019-10-16 03:56:11'),
(8, 'Rickson', 'Arches', 'Sales Officer', 'rickson@vydomingo.com', NULL, '$2y$10$4LXFDDr4bRRpqkVlvu2fNOcbHN8cCr5OurGPu5pEdGHVWc4Sbx17y', 9, '1dnXD64fW6N3BDDP1Bm1QwKNJzROtSfMRcJsvaULUkn1fPauHat8FO6rYdNi', '2019-10-16 03:56:53', '2019-10-16 03:56:53'),
(9, 'Sarah', 'Arches', 'Sales Officer', 'sarah@vydomingo.com', NULL, '$2y$10$hoksk0S/wZG4YUpBkE2lNueNJEMftdk0Tr3TKQGup91G6v9TFdE7O', 9, 'kU5Lf8NMlqOVExMQWAIIK7fy4JZF7yfh8iadla4DKvrJsu2zVtWoXZw3y9Cp', '2019-10-16 03:57:37', '2019-10-16 03:57:37'),
(10, 'Roger', 'Deguia', 'Sales Officer', 'roger@vydomingo.com', NULL, '$2y$10$H26d3NIb47eIuUp2v79cAeGE0EOaR67WC4E3FAmZ0TqK/TgI3p4gS', 9, 'pWhjKKZsXJT4O7pxhkDFpXick6qqUysxozySLyaSFRfVeslT2SbgNf8LRVDS', '2019-10-16 03:58:14', '2019-10-16 03:58:14'),
(11, 'Jojo', 'Mauricio', 'Sales Officer', 'jojo@vydomingo.com', NULL, '$2y$10$ezikcB1Nyoir6LUws1B7pe3SL.f7vUuy/S1c7uAhAOA25c3PoQRJS', 9, 'qf1tWR45S6s3u69hQJQeyvpc1jicmWXCaDTHYcuX0WSkH9dHdam12f5kidIq', '2019-10-16 03:58:54', '2019-10-16 03:58:54'),
(12, 'Facebook', 'Sales', 'Sales Officer', 'facebook@vydomingo.com', NULL, '$2y$10$2tSt76/8GMaOsbN6mT2ru.oC5jtLAGy1GfIcwdPfLYhf/1cVu/Y52', 9, 'jUdqh6xfU3XP3SDMtLG8LDZoWPEC12wgabkCP3Pd35DNzPQ5E6dBlMg83rWH', '2019-10-16 03:59:17', '2019-10-16 03:59:17'),
(13, 'Ana', 'Receiving', 'Receiving Section', 'receiving@vydomingo.com', NULL, '$2y$10$dGeeAMtz6uqlANYPIGBs8ef8tGbDqr840nPDgg8UgKtRcVpvpxdey', 1, 'BzsQlbJP83VYovOsvgCSrTHW32bhAjVrRcUH17FChY5oKiMGP1B5StAD75Bc', '2019-10-16 04:00:26', '2019-10-16 04:00:26'),
(14, 'Joan Richel', 'Moulding', 'Mold Section', 'mould@vydomingo.com', NULL, '$2y$10$z2v6yoZrP/gQ7JAbo1Adv.sqzjbVpJmZ78pldg9Lx0wP8.gAGi9sq', 2, 'seI0d0xsludFudCMntwFSQbTXopxoBT64sikzWhNg090gYgumdujyyu1Jpa4', '2019-10-16 04:01:14', '2019-10-16 04:01:14'),
(15, 'Maricel', 'Casting', 'Casting Section', 'casting@vydomingo.com', NULL, '$2y$10$dSMcWAVScCZIOHP.s0XzquCKdOV7BZnFTPM5tWDaI5/1GFAFvSW/.', 5, '1JIlhvHEzaUvovYoBx25n5EhMYvyvAZwFesXg4qNZ3QDLP6mM8g4JkODKPlg', '2019-10-16 04:01:47', '2019-10-16 04:01:47'),
(16, 'Jeniffer', 'Stone Setting', 'Stone Section', 'stone@vydomingo.com', NULL, '$2y$10$kQBLRh.LSAglVP8MPTPVS.zpfsdYVmub7Ah6SanfwgcNsTcBkRTeK', 7, 'cAuAiezcLfhmLmlEDLNCZzrVUfP1HKdOGbDSfEPiBDrwkJcA3CqO8Zr5yUry', '2019-10-16 04:02:12', '2019-10-16 04:02:12'),
(17, 'Grace', 'Finishing', 'Finishing Section', 'finishing@vydomingo.com', NULL, '$2y$10$xDXWD1gkjHxIJ5PQsyKCgePzh2eaTfGi4XcLm8y/E0nrM3D7cUO36', 8, '7vgo5Ac17jw9GBZEbYvhFGOjmN6zXKY1KBKhkansoorKA57709o4fDNo2ojx', '2019-10-16 04:02:43', '2019-10-16 04:02:43'),
(18, 'Michael', 'Dispatching', 'Dispatching Section', 'dispatching@vydomingo.com', NULL, '$2y$10$OeFYEH/Kk4JS1xbvkpPq3OyYik5V.7VfVg.PbOpySvmayVh5WWj9.', 10, 'vjx1DVd4m9KeKzA04ZJ8P3VrtMTbYpDQ6BfGOGUuoMJUh5b7oKpvkWKIiKmN', '2019-10-16 04:03:18', '2019-10-16 04:03:18'),
(19, 'Gilbert', 'Vargas', 'Full Control', 'gil@vydomingo.com', NULL, '$2y$10$o.oRmvRYKiT6BxYPpGKkG.w7iq.VZLsO5YS2v.7YeuHzcMMpSHea2', 11, 'T1MrjObnTiGGVQAMKDOWdJdzd2rszTSR6SR6tUZOTwnV5T9iPR2skZdf5A4C', '2019-10-16 04:04:02', '2019-10-16 04:04:02'),
(20, 'Ann', 'Bacolod', 'Sales Officer', 'arb@vydomingo.com', NULL, '$2y$10$sM02LlLCS5T2.CSbLMaAHO9lF67sO2x8EfF7ZgUGgdaxVZAb74S4.', 9, 'XaR1DmXsCNbOHavtGPdmfVGhOrfBNNPMTWGTLUdJHvz5gJnAQ0ODlqlvVUYA', '2019-10-16 04:17:58', '2019-10-16 04:17:58'),
(21, 'Cristy', 'Bernales', 'Sales Officer', 'cristy@vydomingo.com', NULL, '$2y$10$.1NjU3jte.AqJrmkACbaS.GnaJHwwF9S5OXlOAH4gfkK6ET2CBDf6', 9, 'ieLQFiNXoCSCPlMPydDNdflWp1x5Y3WxJeBxqZGQsloKA8i3tLkCqYlnpPbt', '2019-10-17 02:00:53', '2019-10-17 02:00:53'),
(22, 'Rey', 'Crisostomo', 'Division I', 'division1@vydomingo.com', NULL, '$2y$10$SFgHyw94gvkc1dRFvwzfUeF/4Ke4ac5dx2LzApyq0FR8Gptf5LAHe', 2, 'AqqT5Jq5drNTaO2Vs7xUPVlYbkV2pa3XgzOsGVLVAxkCW7PiqiMdGNH03blD', '2019-10-20 22:48:28', '2019-10-20 22:48:28'),
(23, 'Angela', 'Mongcal', 'Division II', 'division2@vydomingo.com', NULL, '$2y$10$Agp6UnL0oayxCexnHTYW4uTL.rK.Exbh0IMhJtvxc2OPw0qKOt15W', 3, 'mgMNX9E2s2qsxGAQO5bLgqytBOBUoXRYmb8nX5nqngYm2EHKvY9oO11D1B5c', '2019-10-20 22:49:01', '2019-10-20 22:49:01'),
(24, 'Regie', 'VYD', 'Sales Officer', 'regie@vydomingo.com', NULL, '$2y$10$9IPfeqmFlasyYotIFHad.On1ZZFzSJHOYw/YUHdjyqrbTbWLxMbTe', 9, NULL, '2019-11-22 00:45:15', '2019-11-22 00:45:15'),
(25, 'Claire', 'VYD', 'Sales Officer', 'claire@vydomingo.com', NULL, '$2y$10$xpEcpl9aBw8hZDtqcllmMe7JBs5pHfPxbssEYP7cRvk2u4nQOu3nm', 9, NULL, '2019-11-22 00:45:35', '2019-11-22 00:45:35'),
(26, 'Service', 'Center', 'Service', 'service@vydomingo.com', NULL, '$2y$10$wPr9/cMvPj0eCxY8c4YxGO8EFbh2c2FuYX6mZ4MlUQwxqmk9TZLge', 30, NULL, '2019-11-22 00:45:57', '2019-11-22 00:45:57');

-- --------------------------------------------------------

--
-- Table structure for table `websockets_statistics_entries`
--

CREATE TABLE `websockets_statistics_entries` (
  `id` int(10) UNSIGNED NOT NULL,
  `app_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peak_connection_count` int(11) NOT NULL,
  `websocket_message_count` int(11) NOT NULL,
  `api_message_count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `distributors`
--
ALTER TABLE `distributors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `joforder`
--
ALTER TABLE `joforder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jof_history`
--
ALTER TABLE `jof_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `numberseries`
--
ALTER TABLE `numberseries`
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
-- Indexes for table `websockets_statistics_entries`
--
ALTER TABLE `websockets_statistics_entries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `distributors`
--
ALTER TABLE `distributors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `joforder`
--
ALTER TABLE `joforder`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jof_history`
--
ALTER TABLE `jof_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `numberseries`
--
ALTER TABLE `numberseries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `websockets_statistics_entries`
--
ALTER TABLE `websockets_statistics_entries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
