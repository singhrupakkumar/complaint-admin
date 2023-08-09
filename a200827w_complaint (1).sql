-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 06, 2023 at 07:42 PM
-- Server version: 10.2.40-MariaDB-log
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a200827w_complaint`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `cat_image` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `cat_image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Copper Soft\n', 'Copper Soft\n', NULL, '2023-06-11 04:30:09', '2023-06-11 04:30:09', NULL),
(2, 'Coper Pop Up/Radius Po', 'Coper Pop Up/Radius Po', NULL, '2023-06-11 04:30:09', '2023-06-11 04:30:09', NULL),
(3, 'Copper Crack/Crack Line/Edge Line', 'Copper Crack/Crack Line/Edge Line', NULL, '2023-06-11 04:30:09', '2023-06-11 04:30:09', NULL),
(4, 'Copper Pits/R.Radios Rough Pits/Dent', 'Copper Pits/R.Radios Rough Pits/Dent', NULL, '2023-06-11 04:30:09', '2023-06-11 04:30:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `complains`
--

CREATE TABLE `complains` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `orginator_name` varchar(255) NOT NULL,
  `rej_dept_id` int(11) DEFAULT 0,
  `rej_date` date DEFAULT NULL,
  `prod_date` date DEFAULT NULL,
  `prod_time` time DEFAULT NULL,
  `tank` varchar(100) DEFAULT NULL,
  `cust_code_id` int(11) NOT NULL DEFAULT 0,
  `job_number` varchar(100) DEFAULT NULL,
  `cir` varchar(50) DEFAULT NULL,
  `length` varchar(100) DEFAULT NULL,
  `cyl_number` varchar(50) DEFAULT NULL,
  `mt` varchar(100) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `attachments` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complains`
--

INSERT INTO `complains` (`id`, `title`, `orginator_name`, `rej_dept_id`, `rej_date`, `prod_date`, `prod_time`, `tank`, `cust_code_id`, `job_number`, `cir`, `length`, `cyl_number`, `mt`, `category`, `remarks`, `attachments`, `created_at`, `updated_at`) VALUES
(1, 'Chrome Ripping Problems', 'Ben Nelson', 35, '2023-05-30', '2023-05-28', '14:47:00', NULL, 3, '230241', '70', '100', 'H 2303040', 'ST', 'Over-polishing', 'Chrome Over Polishing Problem', '[\"https:\\/\\/dev.twentyfirstgen.com\\/complaint-admin\\/public\\/attachments\\/1686973501car batt.pdf\"]', '2023-06-16 22:15:01', '2023-06-16 22:15:01'),
(2, 'Copper', 'Alex Tan', 11, '2023-06-09', '2023-06-02', '12:48:00', 'NCU1', 1, '330241', '50', '150', 'H 2307050', 'ST', 'Copper pop up', 'Chrome pop up problem', '[\"https:\\/\\/dev.twentyfirstgen.com\\/complaint-admin\\/public\\/attachments\\/1686973648car batt.pdf\"]', '2023-06-16 22:17:28', '2023-06-16 22:17:28'),
(3, 'Copper Pin Hole Issues', 'Alex Tan', 11, '2023-06-16', '2023-06-13', '14:52:00', 'NCU2', 4, '230300', '100', '900', 'H 2303666', 'ST', 'Pin hole', 'Pin Hole on Chrome', '[\"https:\\/\\/dev.twentyfirstgen.com\\/complaint-admin\\/public\\/attachments\\/1686973934car batt.pdf\",\"https:\\/\\/dev.twentyfirstgen.com\\/complaint-admin\\/public\\/attachments\\/1686973934car.jpg\",\"https:\\/\\/dev.twentyfirstgen.com\\/complaint-admin\\/public\\/attachments\\/1686973934car.png\"]', '2023-06-16 22:22:14', '2023-06-16 22:22:14'),
(4, 'Customer Complain', 'Ben Nelson', 48, '2023-06-24', '2023-06-10', '08:59:00', 'NCU1', 3, '630241', '30', '70', 'H 2303033', 'ST', 'Wrong percentage', 'Wrong CPI Remark', '[]', '2023-06-17 04:30:22', '2023-06-17 04:31:24'),
(5, 'Reject by Customer', 'Ben Nelson', 48, '2023-06-16', '2023-06-07', '09:38:00', NULL, 3, '630241', '50', '150', 'H 2303033', 'ST', 'Wrong CPI', 'Reject by Customer Rem', '[]', '2023-06-17 06:06:46', '2023-06-17 06:06:46'),
(6, 'New Comp Test By Rupak', 'Irvine LLC', 19, '2023-06-15', '2023-06-04', '18:47:00', NULL, 3, 'NA-001', 'C-001', '344', 'H 2303040', 'H 2303040', 'Over-cut nickel', 'ffdgdgfh', '[\"https:\\/\\/dev.twentyfirstgen.com\\/complaint-admin\\/public\\/attachments\\/1687008092Untitled.png\"]', '2023-06-17 07:51:32', '2023-06-17 07:51:32'),
(7, 'Engraving Problem', 'Ben Nelson', 24, '2023-06-17', '2023-06-08', '11:25:00', NULL, 7, '230600', '666.000', '200', 'H 2303668', 'ST', 'Engraving head - shadow line', 'Engraving Head Problem Remark', '[\"https:\\/\\/dev.twentyfirstgen.com\\/complaint-admin\\/public\\/attachments\\/1687008326car batt.pdf\"]', '2023-06-17 07:55:26', '2023-06-17 07:55:26'),
(8, 'This is to test unknown', 'Samantha', 43, '2023-06-18', '2023-06-08', '00:13:00', 'NCU1', 3, '230600', '666.000', '100', 'H 2307660', 'ST', 'Dented', 'Test unknown remark', '[]', '2023-06-18 07:43:50', '2023-06-18 08:29:17'),
(10, 'Test Copper', 'Ben Nelson', NULL, '2023-06-22', '2023-06-15', '06:40:00', NULL, 3, '230700', '666.123', '100', 'H 2303668', 'ST', 'Chrome mark, chrome peel off', 'test', '[\"https:\\/\\/dev.twentyfirstgen.com\\/complaint-admin\\/public\\/attachments\\/16871571513 Best Ways How to Secure Property in a Divorce.jpg\"]', '2023-06-19 01:15:51', '2023-06-19 01:15:51'),
(9, 'Test PrePress', 'Samantha', 38, '2023-06-15', '2023-06-01', '23:57:00', 'NCU1', 7, '930000', '666.000', '1000', 'H 2303111', 'ST', 'Wrong spec', 'Test PrePress Remark', '[\"https:\\/\\/dev.twentyfirstgen.com\\/complaint-admin\\/public\\/attachments\\/1687182785Untitled.png\"]', '2023-06-18 08:27:00', '2023-06-19 08:23:05'),
(11, 'Chrome Test', 'Nancy Tan', 35, '2023-06-10', '2023-06-01', '04:54:00', NULL, 7, '230456', '666.789', '100', 'H 2307080', 'ST', 'Over-polishing', 'Test Chrome', '[]', '2023-06-19 01:24:34', '2023-06-19 01:24:34'),
(12, 'E-polishing problem 2023-06-07 11:54', 'Ben Nelson', 35, '2023-06-19', '2023-06-07', '11:54:00', 'NCU1', 10, '630301', '666.999', '200', 'H 2303666', 'ST', 'Over-polishing', 'Remarks', '[\"https:\\/\\/dev.twentyfirstgen.com\\/complaint-admin\\/public\\/attachments\\/16871792753 Best Ways How to Secure Property in a Divorce.jpg\"]', '2023-06-19 07:20:07', '2023-06-19 07:24:36'),
(13, 'Text thickness problem 2023-06-01 10:04', 'Ben Nelson', 38, '2023-06-19', '2023-06-01', '10:04:00', NULL, 11, '630600', '100', '200', 'H 3307080', 'ALU', 'Text thickness problem', 'remarks', '[]', '2023-06-19 07:33:43', '2023-06-19 07:33:43'),
(14, 'Over-polishing 2023-06-16 06:18', 'Ben Nelson', 35, '2023-06-19', '2023-06-16', '06:18:00', 'NCU2', 9, '630241', '666.123', '100', 'H 2303668', 'ST', 'Over-polishing', 'test', '[]', '2023-06-19 15:48:27', '2023-06-19 15:48:27'),
(15, 'Chrome mark, chrome peel off 2023-06-13 22:35', 'Irvine LLC111', 35, '2023-06-21', '2023-06-13', '22:35:00', 'NCU4', 10, 'NA-001', 'C-001', '3434', 'H 2303040', 'ST', 'Chrome mark, chrome peel off', '3444', '[]', '2023-06-20 06:36:18', '2023-06-20 06:36:18'),
(16, 'Wrong GTP 2023-06-03 00:51', 'Ben Nelson', 45, '2023-06-23', '2023-06-03', '00:51:00', NULL, 10, '330241', '666.000', '1000', '200', 'ST', 'Wrong GTP', NULL, '[]', '2023-06-22 11:21:55', '2023-06-22 11:21:55'),
(17, 'Over-polishing 2023-06-14 00:54', 'Ben Nelson', 35, '2023-06-23', '2023-06-14', '00:54:00', 'NCU3', 8, '230600', '666.000', '1000', 'H 2307050', 'ALU', 'Over-polishing', 'test', '[]', '2023-06-22 11:24:46', '2023-06-22 11:24:46');

-- --------------------------------------------------------

--
-- Table structure for table `cust_codes`
--

CREATE TABLE `cust_codes` (
  `id` int(11) NOT NULL,
  `code` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cust_codes`
--

INSERT INTO `cust_codes` (`id`, `code`, `created_at`, `updated_at`) VALUES
(1, 'IDIKG', '2023-06-13 06:02:43', '2023-06-13 06:02:43'),
(3, 'IDI2CU', '2023-06-13 06:05:47', '2023-06-13 06:05:47'),
(4, 'IDKAA', '2023-06-13 06:06:00', '2023-06-13 06:06:00'),
(6, 'IDSDJ', '2023-06-17 06:10:19', '2023-06-17 06:10:19'),
(7, 'KRASC', '2023-06-17 06:10:39', '2023-06-17 06:10:39'),
(8, 'PHASC', '2023-06-17 06:11:00', '2023-06-17 06:11:00'),
(9, 'IN-HOUSE', '2023-06-17 06:11:17', '2023-06-17 06:11:17'),
(10, 'MYBCR', '2023-06-17 06:11:32', '2023-06-17 06:11:32'),
(11, 'VNAPT', '2023-06-17 06:11:52', '2023-06-17 06:11:52');

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
(5, '2023_04_08_191359_add_soft_delete_and_roles_column', 1);

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
('replytorupak@gmail.com', '$2y$10$Q4uycQ9EZ/z/vp1HSkcr7uytsi9uimfBj/I8uHh6864RFv4noTa/y', '2023-04-26 05:34:11');

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
  `id` int(11) NOT NULL,
  `first_name` varchar(250) DEFAULT NULL,
  `last_name` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `phone` varchar(250) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `profile_image` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `first_name`, `last_name`, `email`, `phone`, `address`, `profile_image`, `created_at`, `updated_at`) VALUES
(1, 'Jhon', 'shina', 'info@mailinator.com', '8865867270', 'coming soon.', 'https://dev.twentyfirstgen.com/complaint-admin/public/attachments/1686849010capitol_gravure_logo.jpg', '2023-04-19 17:57:48', '2023-06-11 21:34:22');

-- --------------------------------------------------------

--
-- Table structure for table `rej_departments`
--

CREATE TABLE `rej_departments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rej_departments`
--

INSERT INTO `rej_departments` (`id`, `name`, `category`, `created_at`, `updated_at`) VALUES
(7, 'LATHE', 'Dimension out', '2023-06-14 23:45:24', '2023-06-14 23:45:24'),
(8, 'LATHE', 'Balancing / concentricity out', '2023-06-14 23:46:45', '2023-06-14 23:46:45'),
(9, 'LATHE', 'Radius out/ rough', '2023-06-14 23:47:05', '2023-06-14 23:47:05'),
(11, 'COPPER', 'Copper pop up', '2023-06-14 23:53:11', '2023-06-14 23:53:11'),
(12, 'COPPER', 'Oxidation, copper peel off', '2023-06-14 23:53:37', '2023-06-14 23:53:37'),
(13, 'COPPER', 'Soft copper / alu clean problem', '2023-06-14 23:53:58', '2023-06-14 23:53:58'),
(14, 'COPPER', 'Copper pits, copper patches', '2023-06-14 23:54:18', '2023-06-14 23:54:18'),
(15, 'COPPER', 'Pin hole', '2023-06-14 23:54:36', '2023-06-14 23:54:36'),
(16, 'COPPER', 'Copper crack', '2023-06-14 23:55:03', '2023-06-14 23:55:03'),
(17, 'COPPER', 'Copper thickness not enough', '2023-06-14 23:55:36', '2023-06-14 23:55:36'),
(18, 'COPPER', 'Copper current problem', '2023-06-14 23:55:54', '2023-06-14 23:55:54'),
(19, 'POLISHMASTER', 'Over-cut nickel', '2023-06-14 23:56:25', '2023-06-14 23:56:25'),
(20, 'GRINDING / CFM', 'Over-cut nickel', '2023-06-14 23:56:56', '2023-06-14 23:56:56'),
(24, 'ENGRAVING', 'Cell problem, missing cell', '2023-06-16 21:49:03', '2023-06-16 21:49:03'),
(25, 'ENGRAVING', 'Wrong starting point', '2023-06-16 21:49:30', '2023-06-16 21:49:30'),
(26, 'ENGRAVING', 'Wrong tiff', '2023-06-16 21:49:49', '2023-06-16 21:49:49'),
(27, 'ENGRAVING', 'Stylus break', '2023-06-16 21:50:09', '2023-06-16 21:50:51'),
(28, 'ENGRAVING', 'Machine problem', '2023-06-16 21:50:29', '2023-06-16 21:50:29'),
(29, 'ENGRAVING', 'Power trip', '2023-06-16 21:51:23', '2023-06-16 21:51:23'),
(30, 'ENGRAVING', 'Ripple line, raining line, engraving line', '2023-06-16 21:51:44', '2023-06-16 21:51:44'),
(31, 'ENGRAVING', 'Grayscale', '2023-06-16 21:52:02', '2023-06-16 21:52:02'),
(32, 'ENGRAVING', 'Engraving head - shadow line', '2023-06-16 21:52:23', '2023-06-16 21:52:23'),
(33, 'ENGRAVING', 'Wrong spec key in', '2023-06-16 21:52:42', '2023-06-16 21:52:42'),
(34, 'ENGRAVING', 'Engrave wrong colour', '2023-06-16 21:53:03', '2023-06-16 21:53:03'),
(35, 'CHROME', 'Chrome mark, chrome peel off', '2023-06-16 21:53:32', '2023-06-16 21:53:32'),
(36, 'CHROME', 'E-polishing problem', '2023-06-16 21:53:52', '2023-06-16 21:53:52'),
(37, 'CHROME', 'Over-polishing', '2023-06-16 21:54:18', '2023-06-16 21:54:18'),
(38, 'PREPRESS', 'Wrong spec', '2023-06-16 21:54:47', '2023-06-16 21:54:47'),
(39, 'PREPRESS', 'Text thickness problem', '2023-06-16 21:55:09', '2023-06-16 21:55:09'),
(40, 'PREPRESS', 'White gap', '2023-06-16 21:55:27', '2023-06-16 21:55:27'),
(41, 'PREPRESS', 'Wrong elements', '2023-06-16 21:55:49', '2023-06-16 21:55:49'),
(42, 'PREPRESS', 'GHW tiff problem', '2023-06-16 21:56:10', '2023-06-16 21:56:10'),
(43, 'UNKNOWN', 'Scratch line', '2023-06-16 21:56:33', '2023-06-16 21:56:33'),
(44, 'UNKNOWN', 'Dented', '2023-06-16 21:56:58', '2023-06-16 21:56:58'),
(45, 'CUSTOMER SERVICE', 'Wrong percentage', '2023-06-16 21:57:25', '2023-06-16 21:57:25'),
(46, 'CUSTOMER SERVICE', 'Wrong GTP', '2023-06-16 21:57:49', '2023-06-16 21:57:49'),
(47, 'CUSTOMER SERVICE', 'Wrong GHW', '2023-06-16 21:58:10', '2023-06-16 21:58:10'),
(48, 'CUSTOMER', 'Wrong GTP', '2023-06-16 21:58:44', '2023-06-16 21:58:44'),
(49, 'CUSTOMER', 'Wrong CPI', '2023-06-16 21:59:11', '2023-06-16 21:59:11'),
(50, 'CUSTOMER', 'Chrome wear off', '2023-06-16 21:59:32', '2023-06-16 21:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `email` varchar(250) DEFAULT NULL,
  `phone` varchar(250) DEFAULT NULL,
  `address` mediumtext DEFAULT NULL,
  `logo` varchar(250) DEFAULT NULL,
  `is_database_backup` int(11) NOT NULL DEFAULT 0,
  `database_backup` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `email`, `phone`, `address`, `logo`, `is_database_backup`, `database_backup`, `created_at`, `updated_at`) VALUES
(1, 'info@admin.com', '8865867270', 'coming soon.', 'http://24.199.102.75/attachments/1686849010capitol_gravure_logo.jpg', 1, '14', '2023-04-19 17:49:34', '2023-06-18 13:07:00');

-- --------------------------------------------------------

--
-- Table structure for table `tanks`
--

CREATE TABLE `tanks` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tanks`
--

INSERT INTO `tanks` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'NCU1', '2023-06-13 05:44:34', '2023-06-13 05:44:34'),
(2, 'NCU2', '2023-06-13 05:45:01', '2023-06-13 05:45:01'),
(5, 'NCU3', '2023-06-14 23:57:21', '2023-06-14 23:57:21'),
(6, 'NCU4', '2023-06-14 23:57:30', '2023-06-14 23:57:30'),
(8, 'NCU5', '2023-06-15 09:58:55', '2023-06-15 09:58:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'planner ' COMMENT 'Planner,Admin',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_email` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `role_type`, `phone`, `is_email`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Alex Tan', 'replytorupak@gmail.com', '1', NULL, '$2y$10$pbzG4dDH4svrm3Eh4iQIa.yHJHKrGv/ToSZHbBU55iZZgnOJmEmC2', 'xATS9qK02XjDvozAKR6UNzg6VE0C7UZ9sPk1aOd5LaMC9tk2c4mLByiw0jwC', 'admin', 'replytorupak@gmail.com', 1, '2023-04-10 10:46:15', '2023-06-19 15:47:10', NULL),
(60, 'Ben Nelson', 'ben@solaris.com.my', '0', NULL, '$2y$10$cGGZ6.C8MfJUTkbRSnB2m.SANDrSa4XFARsOujBxBw26VyaulI/7.', NULL, 'admin', '0172440132', 1, '2023-06-16 22:01:56', '2023-06-19 15:47:28', NULL),
(61, 'Samantha', 'Samantha@capitol-gravure.com.sg', '0', NULL, '$2y$10$Kv9zWvxcQo0Y6lwNs4JRTOkj4.ec/dT6aZeTT2F1k5YKf/cNxDuDC', 'LxTxlldcZwIourQ53yJkb9PEZtqQigGgNWbc0VtCtqUU2gswE4v3beQ9oZEw', 'admin', '0172440132', 0, '2023-06-18 07:32:31', '2023-06-18 08:33:32', NULL),
(62, 'Joseph', 'joe@test.com', '0', NULL, '$2y$10$pjFd.qNO/yAMtj2FIQEgbeGRocfZiLl5gbfZuXJZHxorx8TQyiz2a', NULL, 'planner', '0172440132', 1, '2023-06-19 07:54:32', '2023-06-19 07:54:53', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complains`
--
ALTER TABLE `complains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cust_codes`
--
ALTER TABLE `cust_codes`
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
-- Indexes for table `rej_departments`
--
ALTER TABLE `rej_departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tanks`
--
ALTER TABLE `tanks`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `complains`
--
ALTER TABLE `complains`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `cust_codes`
--
ALTER TABLE `cust_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rej_departments`
--
ALTER TABLE `rej_departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tanks`
--
ALTER TABLE `tanks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
