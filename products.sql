-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 12, 2018 at 02:48 PM
-- Server version: 5.7.21
-- PHP Version: 7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prettylittlething`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `discontinued` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `code`, `name`, `description`, `stock`, `price`, `discontinued`, `created_at`, `updated_at`) VALUES
(28, 'P0001', 'TV', '32” Tv', 10, 399.99, 'no', '2018-04-12 20:47:40', '2018-04-12 20:47:40'),
(29, 'P0002', 'Cd Player', 'Nice CD player', 11, 50.12, 'yes', '2018-04-12 20:47:40', '2018-04-12 20:47:40'),
(30, 'P0003', 'VCR', 'Top notch VCR', 12, 39.33, 'yes', '2018-04-12 20:47:40', '2018-04-12 20:47:40'),
(31, 'P0004', 'Bluray Player', 'Watch it in HD', 1, 24.55, 'no', '2018-04-12 20:47:40', '2018-04-12 20:47:40'),
(32, 'P0005', 'XBOX360', 'Best.console.ever', 5, 30.44, 'no', '2018-04-12 20:47:40', '2018-04-12 20:47:40'),
(33, 'P0006', 'PS3', 'Mind your details', 3, 24.99, 'no', '2018-04-12 20:47:40', '2018-04-12 20:47:40'),
(34, 'P0007', '24” Monitor', 'Awesome', 0, 35.99, 'no', '2018-04-12 20:47:40', '2018-04-12 20:47:40'),
(35, 'P0008', 'CPU', 'Speedy', 12, 25.43, 'no', '2018-04-12 20:47:40', '2018-04-12 20:47:40'),
(36, 'P0009', 'Harddisk', 'Great for storing data', 0, 99.99, 'no', '2018-04-12 20:47:40', '2018-04-12 20:47:40'),
(37, 'P0010', 'CD Bundle', 'Lots of fun', 0, 10.00, 'no', '2018-04-12 20:47:40', '2018-04-12 20:47:40'),
(38, 'P0012', 'TV', 'HD ready', 45, 50.55, 'no', '2018-04-12 20:47:40', '2018-04-12 20:47:40'),
(39, 'P0013', 'Cd Player', 'Beats MP3', 34, 27.99, 'no', '2018-04-12 20:47:40', '2018-04-12 20:47:40'),
(40, 'P0014', 'VCR', 'VHS rules', 3, 23.00, 'yes', '2018-04-12 20:47:40', '2018-04-12 20:47:40'),
(41, 'P0015', 'Bluray Player', 'Excellent picture', 32, 4.33, 'no', '2018-04-12 20:47:40', '2018-04-12 20:47:40'),
(42, 'P0016', '24” Monitor', 'Visual candy', 3, 45.00, 'no', '2018-04-12 20:47:40', '2018-04-12 20:47:40'),
(43, 'P0017', 'CPU', 'Processing power', 0, 4.00, 'no', '2018-04-12 20:47:40', '2018-04-12 20:47:40'),
(44, 'P0018', 'Harddisk', 'More storage options', 34, 50.00, 'yes', '2018-04-12 20:47:40', '2018-04-12 20:47:40'),
(45, 'P0019', 'CD Bundle', 'Store all your data. Very convenient', 23, 3.44, 'no', '2018-04-12 20:47:40', '2018-04-12 20:47:40'),
(46, 'P0020', 'Cd Player', 'Play CD\'s', 56, 30.00, 'no', '2018-04-12 20:47:40', '2018-04-12 20:47:40'),
(47, 'P0021', 'VCR', 'Watch all those retro videos', 12, 3.55, 'yes', '2018-04-12 20:47:40', '2018-04-12 20:47:40'),
(48, 'P0022', 'Bluray Player', 'The future of home entertainment!', 45, 3.00, 'no', '2018-04-12 20:47:40', '2018-04-12 20:47:40'),
(49, 'P0023', 'XBOX360', 'Amazing', 23, 50.00, 'no', '2018-04-12 20:47:40', '2018-04-12 20:47:40'),
(50, 'P0024', 'PS3', 'Just don\'t go online', 22, 24.33, 'yes', '2018-04-12 20:47:40', '2018-04-12 20:47:40'),
(51, 'P0025', 'TV', 'Great for television', 21, 40.00, 'no', '2018-04-12 20:47:40', '2018-04-12 20:47:40'),
(52, 'P0026', 'Cd Player', 'A personal favourite', 0, 34.55, 'no', '2018-04-12 20:47:40', '2018-04-12 20:47:40'),
(53, 'P0027', 'VCR', 'Plays videos', 34, 1200.03, 'yes', '2018-04-12 20:47:40', '2018-04-12 20:47:40'),
(54, 'P0028', 'Bluray Player', 'Plays bluray\'s', 32, 1100.04, 'yes', '2018-04-12 20:47:40', '2018-04-12 20:47:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
