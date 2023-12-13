-- phpMyAdmin SQL Dump
-- version 5.2.1deb1ubuntu0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 13, 2023 at 01:06 PM
-- Server version: 8.0.35-0ubuntu0.23.04.1
-- PHP Version: 8.1.12-1ubuntu4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `DB`
--

-- --------------------------------------------------------

--
-- Table structure for table `taskmanager`
--

CREATE TABLE `taskmanager` (
  `id` int NOT NULL,
  `description` text NOT NULL,
  `date` date DEFAULT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `taskmanager`
--

INSERT INTO `taskmanager` (`id`, `description`, `date`, `time`) VALUES
(1, 'taskabc', '2023-10-09', '10:39:37'),
(2, 'taskbcd', '2023-10-10', '11:38:00'),
(3, 'test123', '2023-10-08', '11:38:00'),
(4, 'test567', '2023-10-09', '09:38:00'),
(5, 'test89', '2023-10-11', '10:40:00'),
(6, 'testerfh', '2023-10-12', '01:40:00'),
(7, 'test123dfgd', '2023-10-09', '10:59:00'),
(8, 'test567gb', '2023-10-09', '11:17:00'),
(9, 'sd', '2023-10-17', '10:58:00'),
(10, 'test123', '2023-10-25', '10:00:00'),
(20, 'new', '2023-10-02', '00:11:00'),
(21, 'test567vcvc', '2023-11-19', '11:22:00'),
(22, 'vcvc', '2023-10-16', '11:22:00'),
(23, 'cdsdcs', '2023-10-17', '00:24:00'),
(24, 'xdxf', '2023-10-04', '11:31:00'),
(25, 'test567', '2023-10-11', '00:28:00'),
(26, 'sdf', '2023-10-11', '01:29:00'),
(27, 'test123dfd', '2023-11-01', '03:32:00'),
(28, 'vfcgvc', '2023-10-11', '11:36:00'),
(29, 'test567', '2023-10-18', '01:35:00'),
(30, 'fgdfg', '2023-10-19', '11:40:00'),
(31, 'test123cvc', '2023-10-09', '12:28:00'),
(32, 'a', '2023-12-14', '12:58:00'),
(33, 'dd', '2023-12-13', '12:08:00'),
(34, '112', '2023-12-13', '13:57:00'),
(35, '22', '2023-12-13', '13:25:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `taskmanager`
--
ALTER TABLE `taskmanager`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `taskmanager`
--
ALTER TABLE `taskmanager`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
