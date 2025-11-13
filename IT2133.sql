-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
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
-- Database: `IT2133`
--
CREATE DATABASE IF NOT EXISTS `IT2133` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `IT2133`;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item` varchar(32) NOT NULL,
  `price` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `item`, `price`) VALUES
(1, 'Apple', 20000),
(2, 'Orange', 25000),
(3, 'Egg', 4000),
(4, 'Onion', 1025),
(5, 'Banana', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `middlename` varchar(32) DEFAULT NULL,
  `lastname` varchar(32) NOT NULL,
  `age` tinyint(3) UNSIGNED NOT NULL,
  `email` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `firstname`, `middlename`, `lastname`, `age`, `email`) VALUES
('admin', '$2y$10$TV7fG1.9kWXZkCKVqyS2DuqGahG5OkBcwacwVQInpndLLEl1Mw5bS', 'admin', '', 'user', 128, ''),
('alice', '$2y$10$eXTJBKDl4yo5EG/EvV8A3O43yj0Y/JSqurymWkRg0q04eHCdQm7Te', 'Alice', '', 'Charlie', 21, ''),
('ISURU', '$2y$10$rS7vCr1EeOF/hsn6GnWaaOtAAha5f4DzsqtLYLtqkoCv6HfBubuqm', 'ඉසුරු', '', 'උදාන', 30, 'email@xn--mzc4hxa2eb.xn--fzc2c9e2c'),
('joseph_123', '$2y$10$IAIjL6Nd1R/NbuqqJjglG.XPYaeFi0h3/0YsEmXfC7khNRdZLh/im', 'Joseph', 'C.', 'V.', 50, 'joseph123+store@gmail.com'),
('_oscar_', '$2y$10$cyfC.rc2JwUPQIcbEC8OdOzAi.JONe3aW7W3bEmcAWQi/QsV/TdXS', 'Oscar', '', '<script>alert(\"HACKED\")</script>', 18, 'oscar@oscar.oscar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
