-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 13, 2021 at 01:50 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digimoz_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`) USING HASH
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Steve', 'steve@gmail.com', '$2y$10$L.fHTeYaBDYd3S8n/ugoiuKpRG2KDAWJNiiA6r2o5VEd935iomVJW', NULL, NULL, NULL),
(2, 'saura', 'saura@gmail.com', '$2y$10$LpWBrlPjeaBYm687GXtcbuYOfDLqp8Wr1iUa2.82uQ3vgmdKS./FO', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
CREATE TABLE IF NOT EXISTS `companies` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `company_name`, `created_at`, `updated_at`) VALUES
(1, 'Nokia', NULL, NULL),
(2, 'Samsung', NULL, NULL),
(3, 'Pocco', NULL, NULL),
(4, 'Lava', NULL, NULL),
(5, 'v3', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2021_01_12_120121_create_admins_table', 1),
(4, '2021_01_12_120458_create_companies_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`(250))
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `budget` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`) USING HASH
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `company`, `budget`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'sam', '3', '232', 'sam@gmail.com', NULL, '$2y$10$kkCReDZYgY7M9dqU0ZmZgOlg2852s7yHPY64QqD1f7GdI1/mqTq.m', NULL, '2021-01-12 07:47:42', '2021-01-12 07:47:42'),
(2, 'sam2', '1', '234', 'sam2@gmail.com', NULL, '$2y$10$mDEDRm0pAnTFGzXiZ2TT6e0T0JyKfvYYeqk5j0Q79htaOj3IQIbKG', NULL, '2021-01-12 07:50:25', '2021-01-12 07:50:25'),
(3, 'sam3', '1', '343', 'sam3@gmail.com', NULL, '$2y$10$.80QITVxv89mSe15pg1vE.8uZ1V2J5n6yssfVGVG8viIDtd2pqlbe', NULL, '2021-01-12 07:51:35', '2021-01-12 07:51:35'),
(4, 'sam4', '1', '34343', 'sam4@gmail.com', NULL, '$2y$10$qlNLtdEmVbLwbMabhr.UAedgtUrc0OuiT0eCtfswQSQnHenyOzFsq', NULL, '2021-01-12 08:45:09', '2021-01-12 08:45:09'),
(5, 'sam53', '5', '2323', 'sam52@gmail.com', NULL, '$2y$10$FdnyoDojK8zcFr3VavZVUubar25eBZcJgKhEgjMyTTO2ZCmEmQIJK', NULL, '2021-01-12 08:49:47', '2021-01-12 08:49:47'),
(6, 'sam66', '4', '2322', 'sam66@gmail.com', NULL, '$2y$10$V1iURlRJL/T34SSquAK7UeRCwVa5YyltMJOjOw0ZYGroqt.eIEbgO', NULL, '2021-01-12 08:57:30', '2021-01-12 08:57:30'),
(7, 'sam77', '3', '56556', 'sam77@gmail.com', NULL, '$2y$10$Q/8/bZcMdsCsjt9Fw6iVB.vqCu5GrdwN9c4CYkUDHgBUSXstQX41C', NULL, '2021-01-12 08:58:40', '2021-01-12 08:58:40'),
(8, 'sam88', '1', '8787', 'sam88@gmail.com', NULL, '$2y$10$6Eg/ffSig3xuwSdUQHNinu/9Ue/iHCP6n1QA6oVGdgY6I2.zl.3q.', NULL, '2021-01-12 08:59:36', '2021-01-12 08:59:36'),
(9, 'sam99', '2', '7878', 'sam99@gmail.com', NULL, '$2y$10$Vi1o.wDk94912myJtSs/9uuXaNOVdfpviTMNSw1KCfKuOYXXmv55q', NULL, '2021-01-12 09:01:27', '2021-01-12 09:01:27'),
(10, 'sam11', '1', '35335', 'sam11@gmail.com', NULL, '$2y$10$GF7FxKvPzpa6kOO5ClXBkOW1rOQLq8m8.QK.GiivfKBLQKUI3GBdm', NULL, '2021-01-12 09:05:04', '2021-01-12 09:05:04'),
(11, 'sam22', '3', '9898', 'sam22@gmail.com', NULL, '$2y$10$1qWuOGUdWkFu8btRp/Txc..qZW7rw5JuigXZVsU5BaVewDhV/jJWu', NULL, '2021-01-12 09:06:23', '2021-01-12 09:06:23'),
(12, 'sam7', '3', '9898', 'sam7@gmail.com', NULL, '$2y$10$vvl1x.gVwTdYVnJhaTpZPO5OX3Nx.rKKViI9p5/lneJF0Lkuwljb2', NULL, '2021-01-12 09:08:46', '2021-01-12 09:08:46'),
(13, 'ioi', '1', '8768', 'io@gmail.com', NULL, '$2y$10$ElO//vI8mNdyItGaT9wbteBipLbjfbfXETB5.Xjsq67Sqeysm08BG', NULL, '2021-01-12 12:26:36', '2021-01-12 12:26:36'),
(14, 'd', '1', '8768', 'd@gmail.com', NULL, '$2y$10$xzQPwxlUMlMdK0pH73gFNukGkh2NpzwhA6gN9f1sDgKH8gtsoIf06', NULL, '2021-01-12 12:50:10', '2021-01-12 12:50:10');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
