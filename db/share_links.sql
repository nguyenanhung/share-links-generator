-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2017 at 09:17 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `i9_fakelink`
--

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE IF NOT EXISTS `links` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(36) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `website_url` varchar(255) DEFAULT NULL,
  `fake_domain` varchar(255) DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uuid` (`uuid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `uuid`, `name`, `website_url`, `fake_domain`, `status`, `updated_at`) VALUES
(2, '9c2f12d6-aba2-4e45-b422-68b4cb24def2', 'Test 2', 'http://nguyenanhung.com', 'https://3.bp.blogspot.com/-dhO99MjQAZ4/WUaUQucar0I/AAAAAAAAAaw/7JXXAvLd4jEGtUbFaGIo_PkhnxWpG-bSwCLcBGAs/s99-p/maxresdefault.jpg', 'Active', '2017-10-10 14:12:55');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
