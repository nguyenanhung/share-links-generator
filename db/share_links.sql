-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: mariadb:3306
-- Generation Time: Sep 15, 2021 at 02:21 PM
-- Server version: 10.6.4-MariaDB-1:10.6.4+maria~focal-log
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `share_links`
--

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE IF NOT EXISTS `links` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(36) CHARACTER SET utf8mb4 DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `website_url` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `fake_domain` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `status` enum('Active','Inactive') CHARACTER SET utf8mb4 NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `uuid` (`uuid`),
  KEY `status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `uuid`, `name`, `website_url`, `fake_domain`, `status`, `updated_at`) VALUES
(2, '9c2f12d6-aba2-4e45-b422-68b4cb24def2', 'Test 2', 'http://nguyenanhung.com', 'https://3.bp.blogspot.com/-dhO99MjQAZ4/WUaUQucar0I/AAAAAAAAAaw/7JXXAvLd4jEGtUbFaGIo_PkhnxWpG-bSwCLcBGAs/s99-p/maxresdefault.jpg', 'Active', '2017-10-10 14:12:55');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
