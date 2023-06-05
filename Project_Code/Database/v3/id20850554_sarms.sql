-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 05, 2023 at 01:46 AM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id20850554_sarms`
--

-- --------------------------------------------------------

--
-- Table structure for table `autorickshaw`
--

CREATE TABLE `autorickshaw` (
  `autorickshaw_number` int(11) NOT NULL,
  `autorickshaw_company` varchar(30) DEFAULT NULL,
  `autorickshaw_model` varchar(30) DEFAULT NULL,
  `autorickshaw_color` varchar(20) DEFAULT NULL,
  `owner_nid` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `autorickshaw`
--

INSERT INTO `autorickshaw` (`autorickshaw_number`, `autorickshaw_company`, `autorickshaw_model`, `autorickshaw_color`, `owner_nid`) VALUES
(13, 'Joy Bangla Enterpise', '2011', 'Black', '2019831056'),
(30, NULL, '2093', 'Blue', '2019831056'),
(23, 'Momota Enterpise', '2341', 'Red', '2019831056');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `driver_nid` varchar(30) NOT NULL,
  `driver_name` varchar(30) DEFAULT NULL,
  `driver_date_of_birth` date DEFAULT NULL,
  `driver_houseNo` varchar(40) DEFAULT NULL,
  `driver_postalCode` varchar(40) DEFAULT NULL,
  `driver_address` varchar(40) DEFAULT NULL,
  `autorickshaw_number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driver_nid`, `driver_name`, `driver_date_of_birth`, `driver_houseNo`, `driver_postalCode`, `driver_address`, `autorickshaw_number`) VALUES
('201978312', 'Abdul Ali', '1992-11-12', '42', '1400', 'Comilla', 13),
('123424124544', 'Rafi Ali', '2000-10-11', '62', '2000', 'Khulna', 13);

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `manager_nid` varchar(30) NOT NULL,
  `manager_name` varchar(30) DEFAULT NULL,
  `manager_date_of_birth` date DEFAULT NULL,
  `manager_houseNo` varchar(40) DEFAULT NULL,
  `manager_postalCode` varchar(40) DEFAULT NULL,
  `manager_address` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`manager_nid`, `manager_name`, `manager_date_of_birth`, `manager_houseNo`, `manager_postalCode`, `manager_address`) VALUES
('12348899', 'Hasan Mia', '1980-11-10', '13', '40', 'Dhaka'),
('13214424124', 'GG', '2019-12-19', '2', '2222', 'Dhaka'),
('414124354562', 'Rabi Khan', '1992-12-01', '31', '1332', 'Dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `owner_nid` varchar(17) NOT NULL,
  `owner_name` varchar(30) DEFAULT NULL,
  `owner_date_of_birth` varchar(20) DEFAULT NULL,
  `owner_houseNo` varchar(40) DEFAULT NULL,
  `owner_postalCode` varchar(40) DEFAULT NULL,
  `owner_address` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`owner_nid`, `owner_name`, `owner_date_of_birth`, `owner_houseNo`, `owner_postalCode`, `owner_address`) VALUES
('1234567890', NULL, NULL, NULL, NULL, NULL),
('1390142552543', 'Ali Baba', '2000-10-13', '45', '3000', 'Sylhet'),
('2019831056', 'Sumonta Saha', '2000-04-11', '24', '1400', 'Dhaka'),
('3322222222', 'dggsgsdgsg', '1999-09-11', '9898', '3100', 'dgfdf');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password_hash`) VALUES
(3, 'Purnota', 'purnota@gmail.com', '$2y$10$YPjl1xFwB8JT7Ambp2vQBeMHEDM5m6KwUeJjVvPmkCYDwqAlXTQpS'),
(4, 'ppp', 'ppp@gmail.com', '$2y$10$kq3X1P4BPYAMKngKsOKH6.iCAj0H9Bv2pwtdUc8mJWY8O20t19eVW'),
(6, 'Promi Mojumder', 'promi@gmail.com', '$2y$10$mQzE7S8sOQ11HGvkCyAra.PDUz2yxpVPVEFA6o.WEH7Qoiy3TE9g2'),
(7, 'Sumonta Saha', 'sumontasaha@gmail.com', '$2y$10$qKxMa1mL43MNufK472cuv.ljNhUlRlA8csoN//mQIhyAcQKec1zzS'),
(8, 'GG', 'alibaba@gmail.com', '$2y$10$SnrmCc72zWaqJx.ewiS1iOHzVvwpdhtAaDziBeWl.NFtYUvED.tLi'),
(9, 'Mridula', 'prom@gmail.com', '$2y$10$w7ZU6kBl6Ggth5DBvPVPgOq4orojxs680B/gKe0B0cLL4vQPdqIg6'),
(10, 'Mridul', 'sumonta056@gmail.com', '$2y$10$PPMEj7JlhL2QGYbaxcJLSO4ExGshRk54M9DBuoD3u5KkREP6IGCbS'),
(11, 'Promiii', 'promm@gmail.com', '$2y$10$dlmh37vussoi1SYgE8E54OP753hhgrB.9dKl10f0sDKv9mB.LLGVu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`owner_nid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
