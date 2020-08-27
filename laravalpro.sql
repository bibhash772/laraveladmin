-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 26, 2020 at 02:50 PM
-- Server version: 5.7.28-0ubuntu0.16.04.2
-- PHP Version: 7.2.25-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravalpro`
--

-- --------------------------------------------------------

--
-- Table structure for table `sv_contactus`
--

CREATE TABLE `sv_contactus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sv_contactus`
--

INSERT INTO `sv_contactus` (`id`, `email`, `first_name`, `last_name`, `phone_no`, `message`, `is_deleted`, `created_at`, `updated_at`) VALUES
(3, 'raviss@yopmail.com', 'shreya', 'infotech', '9594953927', 'this is test', 0, '2019-08-20 02:14:02', '2019-08-20 02:14:02'),
(4, 'ravi@yopmail.com', 'shreya', 'infotech', '9594953927', 'sfsdf', 0, '2019-08-20 02:16:09', '2019-08-20 02:16:09'),
(5, 'ravi@yopmail.com', 'shreya', 'infotech', '9594953927', 'sfsdf', 0, '2019-08-20 02:16:13', '2019-08-20 02:16:13'),
(6, 'ravi1@yopmail.com', 'shreya', 'infotech', '9594953927', 'sda', 0, '2019-08-20 02:18:59', '2019-08-20 02:18:59'),
(7, 'vk@yopmail.com', 'rajiv', 'sharma', '9594953927', 'test message', 0, '2019-08-28 08:12:49', '2019-08-28 08:12:49');

-- --------------------------------------------------------

--
-- Table structure for table `sv_esv`
--

CREATE TABLE `sv_esv` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `test_id` enum('Fish','Algae') COLLATE utf8mb4_unicode_ci NOT NULL,
  `esv_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kingdom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phylum` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `family` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genus` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `species` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `common_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `perc_match` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sequence` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `deleted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `species_img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sv_esv`
--

INSERT INTO `sv_esv` (`id`, `test_id`, `esv_id`, `kingdom`, `phylum`, `class`, `order`, `family`, `genus`, `species`, `common_name`, `perc_match`, `sequence`, `created_by`, `updated_by`, `is_deleted`, `deleted_at`, `created_at`, `updated_at`, `species_img`, `map_img`, `description`) VALUES
(1, 'Fish', 'ESV00001', 'Eukaryota', 'Chordata', 'first', 'Acipenseriformes', 'Acipenseridae', 'Ascipenser', 'fulvescens', 'Smallmouth Bass', '100', 'AGCT', 1, 1, 0, '2019-11-04 05:44:44', '2019-08-23 05:15:31', '2019-11-04 00:14:44', '161071.jpg', '161071Map.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(2, 'Fish', 'ESV00002', 'Eukaryota', 'Chordata', 'first', 'Actinopteri', 'Catostomidae', 'Catostomus', 'commersonii', 'White Sucker', '100', 'AGCT', 1, 1, 0, '2019-10-23 11:58:47', '2019-08-23 05:15:31', '2019-10-23 06:28:47', 'prod-1.jpg', 'avatar-3.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(3, 'Fish', 'ESV00003', 'Eukaryota', 'Chordata', 'first', 'Actinopteri', 'Centrarchidae', 'Pomoxis', 'nigromaculatus', 'Black Crappie', '100', 'AGCT', 1, 1, 0, '2019-10-23 11:59:08', '2019-08-23 05:15:31', '2019-10-23 06:29:08', 'prod-2.jpg', 'avatar-3.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(4, 'Fish', 'ESV00004', 'Eukaryota', 'Chordata', 'first', 'Actinopteri', 'Centrarchidae', 'Lepomis', 'macrochirus', 'Bluegill', '100', 'AGCT', 1, 1, 0, '2019-10-23 11:59:34', '2019-08-23 05:15:31', '2019-10-23 06:29:34', 'prod-2.jpg', 'avatar-5.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(5, 'Fish', 'ESV00005', 'Eukaryota', 'Chordata', 'first', 'Actinopteri', 'Cyprinidae', 'Hypophthalmichthys', 'nobilis', 'Bighead Carp', '100', 'AGCT', 1, 1, 0, '2019-10-23 11:59:52', '2019-08-23 05:15:31', '2019-10-23 06:29:52', 'prod-1.jpg', 'avatar-5.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(6, 'Fish', 'ESV00006', 'Eukaryota', 'Chordata', 'first', 'Actinopteri', 'Cyprinidae', 'Notemigonus', 'crysoleucas', 'Golden Shiner', '100', 'AGCT', 1, 1, 0, '2019-10-23 12:00:08', '2019-08-23 05:15:31', '2019-10-23 06:30:08', 'prod-2.jpg', 'avatar-4.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(7, 'Fish', 'ESV00007', 'Eukaryota', 'Chordata', 'first', 'Actinopteri', 'Esocidae', 'Esox', 'lucius', 'Northern Pike', '100', 'AGCT', 1, 1, 0, '2019-10-23 11:33:25', '2019-08-23 05:15:31', '2019-10-23 06:03:25', 'avatar-2.jpg', 'avatar-1.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(8, 'Fish', 'ESV00008', NULL, 'Chordata', 'first data', 'Actinopteri', 'Ictaluridae', 'Ameiurus', 'melas', 'Black Bullhead', '100', 'Bullhead', 1, 1, 0, '2019-10-23 11:21:32', '2019-08-23 05:15:31', '2019-10-23 05:51:32', 'prod-1.jpg', 'avatar-3.jpg', 'new test image data'),
(9, 'Fish', 'ESV00009', 'Eukaryota', 'Chordata', 'first', 'Actinopteri', 'Ictaluridae', 'Ictalurus', 'furcatus', 'Blue Catfish', '100', 'AGCT', 1, 1, 0, '2019-10-23 11:26:06', '2019-08-23 05:15:31', '2019-10-23 05:56:06', 'prod-2.jpg', 'avatar-3.jpg', 'sd'),
(10, 'Fish', 'ESV00010', 'Eukaryota', 'Chordata', 'first', 'Actinopteri', 'Percidae', 'Sander', 'vitreus', 'Walleye', '100', 'AGCT', 1, 1, 0, '2019-10-23 11:26:50', '2019-08-23 05:15:31', '2019-10-23 05:56:50', 'prod-3.jpg', 'avatar-5.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(11, 'Fish', 'ESV00011', 'Eukaryota', 'Chordata', 'first', 'Actinopteri', 'Percidae', 'Perca', 'flavescens', 'Yellow Perch', '100', 'AGCT', 1, 1, 0, '2019-10-23 11:27:15', '2019-08-23 05:15:31', '2019-10-23 05:57:15', 'prod-1.jpg', 'avatar-2.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(12, 'Fish', 'ESV00012', 'Eukaryota', 'Chordata', 'first', 'Actinopteri', 'Salmonidae', 'Oncorhynchus', 'mykiss', 'Rainbow Trout', '100', 'AGCT', 1, 1, 0, '2019-10-23 11:27:31', '2019-08-23 05:15:31', '2019-10-23 05:57:31', 'prod-1.jpg', 'avatar-4.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(13, 'Algae', 'ESV00001', 'Chromista', 'Bacillariophyta', 'first', 'Naviculales', 'Naviculaceae', 'Navicula', 'glacei', '', '100', 'AGCT', 1, 1, 0, '2019-08-23 10:45:31', '2019-08-23 05:15:31', '2019-08-23 05:15:31', NULL, NULL, NULL),
(14, 'Algae', 'ESV00002', 'Chromista', 'Bacillariophyta', 'second', 'Naviculales', 'Naviculaceae', 'Navicula', 'ramosissima', '', '100', 'AGCT', 1, 1, 0, '2019-08-29 09:06:57', '2019-08-23 05:15:31', '2019-08-23 05:15:31', NULL, NULL, NULL),
(15, 'Algae', 'ESV00003', 'Chromista', 'Bacillariophyta', 'second', 'Naviculales', 'Naviculaceae', 'Fistulifera', 'solaris', '', '100', 'AGCT', 1, 1, 0, '2019-08-29 09:06:27', '2019-08-23 05:15:31', '2019-08-23 05:15:31', NULL, NULL, NULL),
(16, 'Algae', 'ESV00004', 'Chromista', 'Bacillariophyta', 'second', 'Naviculales', 'Amphipleuraceae', 'Amphiprora', 'alata', '', '100', 'AGCT', 1, 1, 0, '2019-08-29 09:07:02', '2019-08-23 05:15:31', '2019-08-23 05:15:31', NULL, NULL, NULL),
(17, 'Algae', 'ESV00005', 'Chromista', 'Bacillariophyta', 'third', 'Naviculales', 'Sellaphoraceae', 'Sellaphora', 'lanceolata', '', '100', 'AGCT', 1, 1, 0, '2019-08-29 09:07:08', '2019-08-23 05:15:32', '2019-08-23 05:15:32', NULL, NULL, NULL),
(18, 'Algae', 'ESV00006', 'Chromista', 'Bacillariophyta', 'third', 'Thalassiosirales', 'Thalassiosiraceae', 'Thalassiosira', 'pseudonana', '', '100', 'AGCT', 1, 1, 0, '2019-08-29 09:07:14', '2019-08-23 05:15:32', '2019-08-23 05:15:32', NULL, NULL, NULL),
(19, 'Algae', 'ESV00007', 'Chromista', 'Bacillariophyta', 'Fourth', 'Thalassiosirales', 'Thalassiosiraceae', 'Thalassiosira', 'rotula', '', '100', 'AGCT', 1, 1, 0, '2019-08-29 09:07:28', '2019-08-23 05:15:32', '2019-08-23 05:15:32', NULL, NULL, NULL),
(20, 'Algae', 'ESV00008', 'Plantae', 'Chlorophyta', 'Fourth', 'Mamiellales', 'Bathycoccaceae', 'Ostreococcus', 'tauri', '', '100', 'AGCT', 1, 1, 0, '2019-08-29 09:07:31', '2019-08-23 05:15:32', '2019-08-23 05:15:32', NULL, NULL, NULL),
(21, 'Algae', 'ESV00009', 'Plantae', 'Chlorophyta', 'fifth', 'Mamiellales', 'Mamiellaceae', 'Micromonas', 'commoda', '', '100', 'AGCT', 1, 1, 0, '2019-08-29 09:07:40', '2019-08-23 05:15:32', '2019-08-23 05:15:32', NULL, NULL, NULL),
(22, 'Algae', 'ESV00010', 'Plantae', 'Chlorophyta', 'fifth', 'Mamiellales', 'Mamiellaceae', 'Micromonas', 'pusilla', '', '100', 'AGCT', 1, 1, 0, '2019-08-29 09:07:43', '2019-08-23 05:15:32', '2019-08-23 05:15:32', NULL, NULL, NULL),
(23, 'Algae', 'ESV00011', 'Plantae', 'Chlorophyta', 'sixth', 'Ulvales', 'Ulvaceae', 'Ulva', 'lactuca', '', '100', 'AGCT', 1, 1, 0, '2019-08-29 09:07:53', '2019-08-23 05:15:32', '2019-08-23 05:15:32', NULL, NULL, NULL),
(24, 'Algae', 'ESV00012', 'Chromista', 'Cryptophyta', 'sixth', 'Cryptomonadales', 'Cryptomonadaceae', 'Cryptomonas', 'ovata', '', '100', 'AGCT', 1, 1, 0, '2019-08-29 09:07:56', '2019-08-23 05:15:32', '2019-08-23 05:15:32', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sv_kit`
--

CREATE TABLE `sv_kit` (
  `kit_id` bigint(20) UNSIGNED NOT NULL,
  `kit_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kit_description` text COLLATE utf8mb4_unicode_ci,
  `kit_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kit_status_id` tinyint(3) UNSIGNED NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `deleted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sv_kit`
--

INSERT INTO `sv_kit` (`kit_id`, `kit_title`, `kit_description`, `kit_code`, `kit_status_id`, `created_by`, `updated_by`, `is_deleted`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, NULL, NULL, 'ANGP8706', 1, 1, 1, 1, '2019-08-23 11:43:24', '2019-08-22 01:17:53', '2019-08-23 06:13:24'),
(3, NULL, NULL, 'AGPALS456', 1, 1, 1, 0, '2019-08-22 06:51:23', '2019-08-22 01:18:39', '2019-08-22 01:21:23'),
(4, NULL, NULL, 'ANGP8708', 1, 1, 1, 0, '2019-08-22 09:22:29', '2019-08-22 03:52:29', '2019-08-22 03:52:29'),
(5, NULL, NULL, 'AGPALS457', 1, 1, 1, 0, '2019-09-04 07:03:31', '2019-08-27 05:34:48', '2019-09-04 01:33:31'),
(6, NULL, NULL, 'AGPALS458', 1, 1, 1, 0, '2019-09-04 07:05:31', '2019-08-27 05:34:48', '2019-09-04 01:35:31'),
(7, NULL, NULL, 'AGPALS459', 1, 1, 1, 0, '2019-09-11 08:25:29', '2019-08-27 05:34:48', '2019-09-11 02:55:29'),
(8, NULL, NULL, 'AGPALS460', 1, 1, 1, 0, '2019-10-24 08:56:34', '2019-08-27 05:34:48', '2019-08-27 05:34:48'),
(9, NULL, NULL, 'AGPALS461', 1, 1, 1, 0, '2019-10-24 08:56:37', '2019-08-27 05:34:48', '2019-08-27 05:34:48'),
(10, NULL, NULL, 'AGPALS462', 1, 1, 1, 0, '2019-10-24 08:56:41', '2019-08-27 05:34:48', '2019-08-27 05:34:48'),
(11, NULL, NULL, 'AGPALS463', 1, 1, 1, 0, '2019-10-24 08:56:47', '2019-08-27 05:34:48', '2019-08-27 05:34:48'),
(12, NULL, NULL, 'AGPALS464', 1, 1, 1, 0, '2019-10-24 08:56:44', '2019-08-27 05:34:48', '2019-08-27 05:34:48'),
(13, NULL, NULL, 'AGPALS465', 1, 1, 1, 0, '2019-10-24 08:56:58', '2019-08-27 05:34:49', '2019-08-27 05:34:49'),
(14, NULL, NULL, 'AGPALS466', 1, 1, 1, 0, '2019-10-24 08:57:01', '2019-08-27 05:34:49', '2019-08-27 05:34:49'),
(15, NULL, NULL, 'AGPALS467', 1, 1, 1, 0, '2019-10-24 08:57:04', '2019-08-27 05:34:49', '2019-08-27 05:34:49'),
(16, NULL, NULL, 'AGPALS468', 1, 1, 1, 0, '2019-10-24 08:57:07', '2019-08-27 05:34:49', '2019-08-27 05:34:49'),
(17, NULL, NULL, 'AGPALS469', 1, 1, 1, 0, '2019-10-24 08:57:10', '2019-08-27 05:34:49', '2019-08-27 05:34:49'),
(18, NULL, NULL, 'AGPALS470', 1, 1, 1, 0, '2019-08-27 11:11:02', '2019-08-27 05:34:49', '2019-08-27 05:41:02'),
(19, NULL, NULL, 'AGPALS4593', 1, 1, 1, 0, '2019-10-24 08:57:13', '2019-09-18 03:19:00', '2019-09-18 03:19:00');

-- --------------------------------------------------------

--
-- Table structure for table `sv_kit_master`
--

CREATE TABLE `sv_kit_master` (
  `kit_m_status_id` tinyint(3) UNSIGNED NOT NULL,
  `status_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sv_kit_master`
--

INSERT INTO `sv_kit_master` (`kit_m_status_id`, `status_title`, `status_description`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Active', 'kit is active in this status', 1, 1, NULL, NULL),
(2, 'Inactive', 'kit is inactive', 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sv_migrations`
--

CREATE TABLE `sv_migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sv_migrations`
--

INSERT INTO `sv_migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_07_10_062833_sv_user', 1),
(2, '2019_07_10_071153_sv_user_verification', 1),
(3, '2019_07_10_073215_sv_device_token', 1),
(4, '2019_07_10_073940_sv_role', 1),
(5, '2019_07_10_074751_sv_user_role', 1),
(6, '2019_07_10_075801_sv_kit_master', 1),
(7, '2019_07_10_085720_sv_kit', 1),
(8, '2019_07_10_090440_sv_kit_status_log', 1),
(9, '2019_07_10_091344_sv_sample', 1),
(10, '2019_07_10_092540_sv_user_kit', 1),
(11, '2019_07_10_093714_sv_species', 1),
(12, '2019_07_10_094254_sv_test', 1),
(13, '2019_07_10_095150_sv_replication_log', 1),
(14, '2019_07_10_095718_sv_genus', 1),
(15, '2019_07_10_100215_sv_esv', 1),
(16, '2019_07_10_101034_sv_user_activity_type', 1),
(17, '2019_07_10_101405_sv_user_activities_log', 1),
(18, '2019_07_12_135555_create_password_reset_table', 1),
(19, '2019_08_08_135323_sv_sample_report', 1),
(20, '2019_08_19_065507_sv_contactus', 1),
(21, '2019_08_22_071601_add_sv_sample_kitcode', 2),
(23, '2019_10_15_102700_add_species_img_to_esv', 3);

-- --------------------------------------------------------

--
-- Table structure for table `sv_password_resets`
--

CREATE TABLE `sv_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sv_password_resets`
--

INSERT INTO `sv_password_resets` (`email`, `token`, `created_at`) VALUES
('admin@site.com', '$2y$10$dZGqSIq5VUpv7BZK0Z4RuOokYoGRkhF6JGlraPwJ//ftolrQxl0GC', '2019-08-21 07:12:19'),
('admin@yopmail.com', '$2y$10$tYAZf5sNBLHsGedUINwtee9dQ.uCcPbbal7DX3.Csj6RgAueo0v6a', '2019-08-21 07:12:56');

-- --------------------------------------------------------

--
-- Table structure for table `sv_sample`
--

CREATE TABLE `sv_sample` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sample_code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kit_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `site_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `water_value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sample_date` date NOT NULL,
  `sample_time` time NOT NULL,
  `sample_received_date` date DEFAULT NULL,
  `is_public` tinyint(1) NOT NULL,
  `sample_notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dispatch_traking_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `sample_report` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=>dispatched,2=>received',
  `deleted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kitcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sv_sample`
--

INSERT INTO `sv_sample` (`id`, `sample_code`, `kit_id`, `user_id`, `site_name`, `water_value`, `latitude`, `longitude`, `sample_date`, `sample_time`, `sample_received_date`, `is_public`, `sample_notes`, `dispatch_traking_code`, `created_by`, `updated_by`, `is_deleted`, `sample_report`, `status`, `deleted_at`, `created_at`, `updated_at`, `kitcode`) VALUES
(1, 'ABCD1234', 3, 2, 'yamuna Bank', '5.2 ml', '28.5355', '77.391029', '2019-08-07', '05:13:11', '2019-08-22', 1, 'my sample new', '', 1, 1, 0, NULL, 2, '2019-08-22 06:55:12', '2019-08-14 18:30:00', '2019-08-30 02:13:05', 'AGPALS456'),
(2, 'F27418AE2', 2, 2, '', '0', '23.3626', '77.23658', '2019-08-22', '09:22:29', '2019-08-22', 1, '', '', 1, 1, 0, 'sample_report/1566465749_1.csv', 2, '2019-08-22 09:22:29', '2019-08-22 03:52:29', '2019-08-22 03:52:29', 'ANGP8706'),
(3, 'F27418AE4', 4, 2, 'yamuna lake new f', '0', '24.3365', '78.2365', '1993-01-17', '10:25:00', '2019-08-13', 1, 'test df dfg dfg dg f', '', 1, 1, 0, 'sample_report/1566465749_1.csv', 2, '2019-08-22 09:22:29', '2019-08-22 03:52:29', '2019-08-29 03:11:09', 'ANGP8708'),
(6, 'B0292C945', 5, 4, 'anand vihar', '50 ml', '21.3626', '77.23658', '2018-06-02', '25:25:13', NULL, 1, 'test sample', '', 2, 2, 0, '', 2, '2019-09-04 08:50:35', '2019-09-04 03:20:35', '2019-09-04 03:20:35', 'AGPALS457'),
(7, '3664A8617', 7, 4, 'anand vihar', '50 ml', '22.3626', '77.23658', '2018-01-23', '25:25:13', NULL, 1, 'test sample', '', 2, 2, 0, '', 2, '2019-09-11 08:28:04', '2019-09-11 02:58:04', '2019-09-11 08:24:17', 'AGPALS459'),
(9, 'FE45915CAGPALS465', 13, 4, 'anand vihar', '50 ml', '23.3626', '77.23658', '2018-06-02', '00:00:00', NULL, 1, 'test sample', '', 2, 2, 0, '', 2, '2019-10-24 09:53:59', '2019-10-24 04:23:59', '2019-10-30 02:43:54', 'AGPALS465'),
(10, 'C7C6FD24AGPALS466', 14, 4, 'anand vihar', '50 ml', '24.3626', '77.23658', '2018-06-02', '25:25:13', NULL, 1, 'test sample', '', 2, 2, 0, '', 2, '2019-10-24 09:56:04', '2019-10-24 04:26:04', '2019-10-24 04:26:04', 'AGPALS466'),
(11, '068D7492AGPALS467', 15, 4, 'anand vihar', '50 ml', '25.3626', '77.23658', '2019-10-24', '13:01:01', '2019-11-12', 1, 'test sample', '', 2, 2, 0, '', 2, '2019-10-24 09:58:21', '2019-10-24 04:28:21', '2019-11-12 05:02:52', 'AGPALS467');

-- --------------------------------------------------------

--
-- Table structure for table `sv_sample_report`
--

CREATE TABLE `sv_sample_report` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sample_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `replicate` int(11) NOT NULL,
  `test_id` enum('Fish','Algae') COLLATE utf8mb4_unicode_ci NOT NULL,
  `esv_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `perc_reads` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sv_sample_report`
--

INSERT INTO `sv_sample_report` (`id`, `sample_id`, `replicate`, `test_id`, `esv_id`, `perc_reads`, `created_at`, `updated_at`) VALUES
(61, 'F27418AE2', 1, 'Fish', 'ESV00001', '10', '2019-08-22 04:09:45', '2019-08-22 04:09:45'),
(62, 'F27418AE2', 1, 'Fish', 'ESV00002', '10', '2019-08-22 04:09:45', '2019-08-22 04:09:45'),
(63, 'F27418AE2', 1, 'Fish', 'ESV00003', '10', '2019-08-22 04:09:45', '2019-08-22 04:09:45'),
(64, 'F27418AE2', 1, 'Fish', 'ESV00004', '10', '2019-08-22 04:09:45', '2019-08-22 04:09:45'),
(65, 'F27418AE2', 1, 'Fish', 'ESV00005', '10', '2019-08-22 04:09:45', '2019-08-22 04:09:45'),
(66, 'F27418AE2', 1, 'Fish', 'ESV00006', '10', '2019-08-22 04:09:45', '2019-08-22 04:09:45'),
(67, 'F27418AE2', 1, 'Fish', 'ESV00007', '10', '2019-08-22 04:09:45', '2019-08-22 04:09:45'),
(69, 'F27418AE2', 1, 'Fish', 'ESV00009', '5', '2019-08-22 04:09:45', '2019-08-22 04:09:45'),
(70, 'F27418AE2', 1, 'Fish', 'ESV00010', '5', '2019-08-22 04:09:45', '2019-08-22 04:09:45'),
(71, 'F27418AE2', 1, 'Fish', 'ESV00011', '5', '2019-08-22 04:09:45', '2019-08-22 04:09:45'),
(72, 'F27418AE2', 1, 'Fish', 'ESV00012', '5', '2019-08-22 04:09:45', '2019-08-22 04:09:45'),
(73, 'F27418AE2', 1, 'Algae', 'ESV00001', '25', '2019-08-22 04:09:45', '2019-08-22 04:09:45'),
(74, 'F27418AE2', 1, 'Algae', 'ESV00002', '25', '2019-08-22 04:09:45', '2019-08-22 04:09:45'),
(75, 'F27418AE2', 1, 'Algae', 'ESV00003', '20', '2019-08-22 04:09:45', '2019-08-22 04:09:45'),
(76, 'F27418AE2', 1, 'Algae', 'ESV00004', '30', '2019-08-22 04:09:45', '2019-08-22 04:09:45'),
(77, 'F27418AE2', 1, 'Algae', 'ESV00005', '12', '2019-08-22 04:09:45', '2019-08-22 04:09:45'),
(78, 'F27418AE2', 1, 'Algae', 'ESV00006', '12', '2019-08-22 04:09:45', '2019-08-22 04:09:45'),
(79, 'F27418AE2', 1, 'Algae', 'ESV00007', '12', '2019-08-22 04:09:45', '2019-08-22 04:09:45'),
(80, 'F27418AE2', 1, 'Algae', 'ESV00008', '12', '2019-08-22 04:09:45', '2019-09-09 05:26:29'),
(81, 'F27418AE4', 1, 'Fish', 'ESV00001', '10', '2019-08-22 04:09:45', '2019-09-09 05:20:03'),
(82, 'F27418AE4', 1, 'Fish', 'ESV00002', '10', '2019-08-22 04:09:45', '2019-08-22 04:09:45'),
(83, 'F27418AE4', 1, 'Fish', 'ESV00003', '10', '2019-08-22 04:09:45', '2019-08-22 04:09:45'),
(84, 'F27418AE4', 1, 'Fish', 'ESV00004', '10', '2019-08-22 04:09:45', '2019-08-22 04:09:45'),
(85, 'F27418AE4', 1, 'Fish', 'ESV00005', '10', '2019-08-22 04:09:45', '2019-08-22 04:09:45'),
(86, 'F27418AE4', 1, 'Fish', 'ESV00006', '10', '2019-08-22 04:09:45', '2019-08-22 04:09:45'),
(87, 'F27418AE4', 1, 'Fish', 'ESV00007', '10', '2019-08-22 04:09:45', '2019-08-22 04:09:45'),
(88, 'F27418AE4', 1, 'Fish', 'ESV00008', '10', '2019-08-22 04:09:45', '2019-08-22 04:09:45'),
(89, 'F27418AE4', 1, 'Fish', 'ESV00009', '5', '2019-08-22 04:09:45', '2019-08-22 04:09:45'),
(90, 'F27418AE4', 1, 'Fish', 'ESV00010', '5', '2019-08-22 04:09:45', '2019-08-22 04:09:45'),
(91, 'F27418AE4', 1, 'Fish', 'ESV00011', '5', '2019-08-22 04:09:45', '2019-08-22 04:09:45'),
(92, 'F27418AE4', 1, 'Fish', 'ESV00012', '5', '2019-08-22 04:09:45', '2019-08-22 04:09:45'),
(93, 'F27418AE4', 1, 'Algae', 'ESV00001', '14', '2019-08-22 04:09:45', '2019-08-22 04:09:45'),
(94, 'F27418AE4', 1, 'Algae', 'ESV00002', '14', '2019-08-22 04:09:45', '2019-08-22 04:09:45'),
(95, 'F27418AE4', 1, 'Algae', 'ESV00003', '22', '2019-08-22 04:09:45', '2019-08-22 04:09:45'),
(96, 'F27418AE4', 1, 'Algae', 'ESV00004', '2', '2019-08-22 04:09:45', '2019-08-22 04:09:45'),
(97, 'F27418AE4', 1, 'Algae', 'ESV00005', '12', '2019-08-22 04:09:45', '2019-08-22 04:09:45'),
(98, 'F27418AE4', 1, 'Algae', 'ESV00006', '12', '2019-08-22 04:09:45', '2019-08-22 04:09:45'),
(99, 'F27418AE4', 1, 'Algae', 'ESV00007', '12', '2019-08-22 04:09:45', '2019-08-22 04:09:45'),
(100, 'F27418AE4', 1, 'Algae', 'ESV00008', '12', '2019-08-22 04:09:45', '2019-08-22 04:09:45');

-- --------------------------------------------------------

--
-- Table structure for table `sv_user`
--

CREATE TABLE `sv_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_reset_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auth_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=>deleted,0=>not deleted',
  `deleted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL COMMENT '1=>active,0=>inactive',
  `user_type` tinyint(4) NOT NULL COMMENT '1=>admin,2=>lab executive,3=>Pubic Users,4=>Corporate Clients',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_activation_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_account_activated` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=>activated,0=>not activated',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sv_user`
--

INSERT INTO `sv_user` (`user_id`, `email`, `password`, `first_name`, `last_name`, `phone_no`, `password_reset_token`, `auth_key`, `city`, `state`, `zip_code`, `country`, `address`, `created_by`, `updated_by`, `is_deleted`, `deleted_at`, `status`, `user_type`, `remember_token`, `account_activation_token`, `is_account_activated`, `created_at`, `updated_at`) VALUES
(1, 'adminemail@yopmail.com', '$2y$10$M8UzkOqqosCwSDCUiQ0hmOFtl1dJacBaNVPne7ygxwaTeorG7SZPi', 'admin', 'super', '9495988798', NULL, NULL, 'noida', 'up', '474002', 'india', 'sector 63', 1, 1, 0, '2019-08-29 05:13:10', 1, 1, '7u5rx7nKdvNDOGTbyrMyzxvJSe8w4EOOwEUPmDARtsuTPslytBPtDl04T0qs', NULL, 1, NULL, '2019-08-22 01:01:06'),
(2, 'vivek@yopmail.com', '$2y$10$hBlARUmqQrHcei/hM1VzuOAufpnzofyOUeNKC4ObujaKWOqdKstIK', 'vivek', 'jain', '9594953927', NULL, NULL, 'noida', 'up', '4744002', 'India', 'sector 73 noida', 1, 1, 0, '2019-10-30 09:35:38', 1, 3, 'vInm8D3sRrSx1ULJWOe1pBfoBYnHQQ5lTHLKturB3x742YZxTKsGw1Dx6Zjt', '7d849fccbdd2e3e1d4d382543cd0c173', 1, '2019-08-22 01:19:22', '2019-09-03 02:21:58'),
(3, 'amit@yopmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'amit', 'sharma', '9594953927', NULL, NULL, 'gwalior', 'mp', '474002', 'india', 'asd', 1, 1, 0, '2019-09-09 06:08:30', 1, 3, NULL, NULL, 0, NULL, NULL),
(4, 'chit@yopmail.com', '$2y$10$hBlARUmqQrHcei/hM1VzuOAufpnzofyOUeNKC4ObujaKWOqdKstIK', 'chiti', 'singh', '9594956969', NULL, NULL, 'noida', 'up', '201301', 'india', 'sector73, asqure mall', 1, 1, 0, '2019-10-30 09:36:29', 1, 3, 'DVxbUV2G0NnDeDt0lgY9oNVPEUgKKgMgbHfaI9vyq45shnsdNel0RPpSuEHN', '7f83974c7e607344a9f908e8b9e29929', 0, '2019-09-17 05:04:13', '2019-09-17 05:04:13'),
(5, 'shreya@yopmail.com', '$2y$10$VqZTkGyuNWKJ9tc/tBLqUONXT1kANpVlEdFNPcMQh0MrD.J4emeF.', 'shreya', 'infotech', '9594953927', NULL, NULL, 'New York, NY, United States', 'new york', '10005', 'india', 'noida sector 63, sector 63 noida', 1, 1, 0, '2019-09-17 10:36:40', 1, 2, NULL, '0d67ba60b174b6f8bdc3328514e538e8', 1, '2019-09-17 05:06:11', '2019-09-17 05:06:40'),
(6, 'shreya_sharma@yopmail.com', '$2y$10$c3T0bei59NQYwHDhyHnJFuAcPf5kj94uqfrOA5gRZFIpz5yIwu50q', 'shreys', 'sharma', '9594959898', NULL, NULL, 'noida', 'up', '201301', 'india', 'noida sector 63, sector 63 noida', 1, 1, 0, '2019-10-18 09:29:05', 1, 2, NULL, '93c353457c8a02f8de35b850c2a376c6', 1, '2019-10-18 03:55:02', '2019-10-18 03:59:05'),
(7, 'rajiv_nath@yopmail.com', NULL, 'rajiv', 'nath', '9594953927', NULL, NULL, 'noida', 'AR', '20130', 'India', 'sector73, asqure mall', 1, 1, 0, '2019-10-18 09:39:59', 0, 2, NULL, 'ef2c186a0dce143f3d235cdf0840a955', 0, '2019-10-18 04:09:59', '2019-10-18 04:09:59');

-- --------------------------------------------------------

--
-- Table structure for table `sv_user_kit`
--

CREATE TABLE `sv_user_kit` (
  `user_kit_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `is_activated` tinyint(1) NOT NULL,
  `kit_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kit_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `deleted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sv_user_kit`
--

INSERT INTO `sv_user_kit` (`user_kit_id`, `user_id`, `is_activated`, `kit_code`, `kit_id`, `created_by`, `is_deleted`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'AGPALS456', 3, 2, 0, '2019-08-22 06:51:23', '2019-08-22 01:21:23', '2019-08-22 01:21:23'),
(2, 2, 1, 'AGPALS457', 5, 2, 0, '2019-09-04 07:03:31', '2019-09-04 01:33:31', '2019-09-04 01:33:31'),
(3, 3, 1, 'AGPALS458', 6, 2, 0, '2019-09-04 07:05:31', '2019-09-04 01:35:31', '2019-09-04 01:35:31'),
(4, 2, 1, 'AGPALS459', 7, 2, 0, '2019-09-11 08:25:30', '2019-09-11 02:55:29', '2019-09-11 02:55:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sv_contactus`
--
ALTER TABLE `sv_contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sv_esv`
--
ALTER TABLE `sv_esv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sv_kit`
--
ALTER TABLE `sv_kit`
  ADD PRIMARY KEY (`kit_id`),
  ADD KEY `kit_kit_status_id_foreign` (`kit_status_id`);

--
-- Indexes for table `sv_kit_master`
--
ALTER TABLE `sv_kit_master`
  ADD PRIMARY KEY (`kit_m_status_id`);

--
-- Indexes for table `sv_migrations`
--
ALTER TABLE `sv_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sv_password_resets`
--
ALTER TABLE `sv_password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `sv_sample`
--
ALTER TABLE `sv_sample`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sample_kit_id_foreign` (`kit_id`),
  ADD KEY `sample_user_id_foreign` (`user_id`);

--
-- Indexes for table `sv_sample_report`
--
ALTER TABLE `sv_sample_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sv_user`
--
ALTER TABLE `sv_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email_unique` (`email`);

--
-- Indexes for table `sv_user_kit`
--
ALTER TABLE `sv_user_kit`
  ADD PRIMARY KEY (`user_kit_id`),
  ADD KEY `user_kit_user_id_foreign` (`user_id`),
  ADD KEY `user_kit_kit_id_foreign` (`kit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sv_contactus`
--
ALTER TABLE `sv_contactus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `sv_esv`
--
ALTER TABLE `sv_esv`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `sv_kit`
--
ALTER TABLE `sv_kit`
  MODIFY `kit_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `sv_kit_master`
--
ALTER TABLE `sv_kit_master`
  MODIFY `kit_m_status_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sv_migrations`
--
ALTER TABLE `sv_migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `sv_sample`
--
ALTER TABLE `sv_sample`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `sv_sample_report`
--
ALTER TABLE `sv_sample_report`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `sv_user`
--
ALTER TABLE `sv_user`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `sv_user_kit`
--
ALTER TABLE `sv_user_kit`
  MODIFY `user_kit_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `sv_kit`
--
ALTER TABLE `sv_kit`
  ADD CONSTRAINT `kit_kit_status_id_foreign` FOREIGN KEY (`kit_status_id`) REFERENCES `sv_kit_master` (`kit_m_status_id`);

--
-- Constraints for table `sv_sample`
--
ALTER TABLE `sv_sample`
  ADD CONSTRAINT `sample_kit_id_foreign` FOREIGN KEY (`kit_id`) REFERENCES `sv_kit` (`kit_id`),
  ADD CONSTRAINT `sample_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `sv_user` (`user_id`);

--
-- Constraints for table `sv_user_kit`
--
ALTER TABLE `sv_user_kit`
  ADD CONSTRAINT `user_kit_kit_id_foreign` FOREIGN KEY (`kit_id`) REFERENCES `sv_kit` (`kit_id`),
  ADD CONSTRAINT `user_kit_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `sv_user` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
