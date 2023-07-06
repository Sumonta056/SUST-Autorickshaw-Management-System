-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2023 at 08:58 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login_db`
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
  `owner_nid` varchar(17) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `autorickshaw`
--

INSERT INTO `autorickshaw` (`autorickshaw_number`, `autorickshaw_company`, `autorickshaw_model`, `autorickshaw_color`, `owner_nid`) VALUES
(100, 'ff', 'ff', 'ff', '21424122421'),
(111, 'SUST', '33', 'Black', '3322222222');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driver_nid`, `driver_name`, `driver_date_of_birth`, `driver_houseNo`, `driver_postalCode`, `driver_address`, `autorickshaw_number`) VALUES
('1332333332', 'Sumonta', '2000-04-11', 'Sylhet', '3100', 'Sylhet', NULL),
('1332333333', 'Promi', '2000-11-28', 'Sylhet', '3100', 'Sylhet', 100);

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
('1234889966', 'Motin', '1999-05-09', '30', '2222', 'Comilla'),
('13214424124', 'GG', '2019-12-19', '2', '2222', 'Dhaka'),
('1343245551', 'Abdullah', '1999-05-05', '33', '3109', 'Sylhet'),
('1343245555', 'Manik', '1999-05-05', '33', '3100', 'Sylhet'),
('414124354562', 'Rabi Khan', '1992-12-01', '31', '1332', 'Dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `owner_nid` varchar(17) NOT NULL,
  `owner_name` varchar(30) DEFAULT NULL,
  `owner_date_of_birth` date DEFAULT NULL,
  `owner_houseNo` varchar(40) DEFAULT NULL,
  `owner_postalCode` varchar(40) DEFAULT NULL,
  `owner_address` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`owner_nid`, `owner_name`, `owner_date_of_birth`, `owner_houseNo`, `owner_postalCode`, `owner_address`) VALUES
('2019831038', 'Promi Mojumder', '2000-11-28', '92', '3100', 'Korerpara, Sylhet'),
('2019831056', 'Sumonta Saha Mridul', '2000-04-11', '92', '3100', 'Korerpara, Sylhet'),
('21424122421', 'Ali Baba', '1990-12-01', '10', '1200', 'Dhaka'),
('3322222222', 'dggsgsdgsg', '1999-09-11', '9898', '3100', 'dgfdf');

-- --------------------------------------------------------

--
-- Table structure for table `round`
--

CREATE TABLE `round` (
  `round_number` int(11) NOT NULL,
  `round_date` date DEFAULT NULL,
  `round_start_time` time DEFAULT NULL,
  `round_end_time` time DEFAULT NULL,
  `round_area` varchar(30) DEFAULT NULL,
  `manager_nid` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `round`
--

INSERT INTO `round` (`round_number`, `round_date`, `round_start_time`, `round_end_time`, `round_area`, `manager_nid`) VALUES
(1, '2023-04-04', '00:00:12', '00:00:14', 'sust', '1343245555'),
(4, '2023-04-04', '00:00:12', '00:00:14', 'sust', '12348899');

-- --------------------------------------------------------

--
-- Table structure for table `serial`
--

CREATE TABLE `serial` (
  `serial_number` int(11) NOT NULL,
  `serial_date` date NOT NULL,
  `serial_time` time NOT NULL,
  `serial_status` int(10) NOT NULL,
  `autorickshaw_number` int(11) NOT NULL,
  `round_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `serial`
--

INSERT INTO `serial` (`serial_number`, `serial_date`, `serial_time`, `serial_status`, `autorickshaw_number`, `round_number`) VALUES
(1, '2020-05-05', '00:00:12', 0, 100, 4);

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
(11, 'Promiii', 'promm@gmail.com', '$2y$10$dlmh37vussoi1SYgE8E54OP753hhgrB.9dKl10f0sDKv9mB.LLGVu'),
(12, 'Gg', 'Gg@gmail.com', '$2y$10$H/DcTB5dmwFQzNlmwA4Tv.85/EF5m/XtBcVeTKfMzyGcaZ/3ZEr.y'),
(13, 'Mridulaaa', 'promi38@student.sust.edu', '$2y$10$qZqdkUrgDVSTE27fpMdtxuI9mhsktniWXjCbOSUmy2EEqRAJonC9q'),
(14, '2019831038_Promi Mojumder', 'promimojumde@gmail.com', '$2y$10$dBUe/JZb8YhuLlUWZMjERORDPKGhPpNZrvnuD.d0lReFoXISgc7Tu'),
(15, 'PRADIP KUMAR MOJUMDER', 'pradipkumarmojumder@yahoo.com', '$2y$10$jmgPAkUCLDxGvVMqKHiUw.VJj91TfZB8668GipdQ/cd46RwnMOW.2'),
(17, 'PRADIP KUMAR MOJUMDER', 'pradip@yahoo.com', '$2y$10$FFQHKFZs.hLBT2Ene2rAoOm5d0Ax9L2oC0wSsRRRBz5tV0tMKe/Ze'),
(19, 'PRADIP KUMAR MOJUMDER', 'pradipkumar@yahoo.com', '$2y$10$yHxRZ9gmWkDeCWsIpf8cje5J4hxE.ITzUz80sB1tZbGAY8nDxMIqu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autorickshaw`
--
ALTER TABLE `autorickshaw`
  ADD PRIMARY KEY (`autorickshaw_number`),
  ADD KEY `owner_nid` (`owner_nid`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`driver_nid`),
  ADD KEY `autorickshaw_number` (`autorickshaw_number`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`manager_nid`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`owner_nid`);

--
-- Indexes for table `round`
--
ALTER TABLE `round`
  ADD PRIMARY KEY (`round_number`),
  ADD KEY `manager_nid` (`manager_nid`);

--
-- Indexes for table `serial`
--
ALTER TABLE `serial`
  ADD KEY `autorickshaw_number` (`autorickshaw_number`),
  ADD KEY `round_number` (`round_number`);

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
-- AUTO_INCREMENT for table `round`
--
ALTER TABLE `round`
  MODIFY `round_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `autorickshaw`
--
ALTER TABLE `autorickshaw`
  ADD CONSTRAINT `autorickshaw_ibfk_1` FOREIGN KEY (`owner_nid`) REFERENCES `owner` (`owner_nid`);

--
-- Constraints for table `driver`
--
ALTER TABLE `driver`
  ADD CONSTRAINT `driver_ibfk_1` FOREIGN KEY (`autorickshaw_number`) REFERENCES `autorickshaw` (`autorickshaw_number`);

--
-- Constraints for table `round`
--
ALTER TABLE `round`
  ADD CONSTRAINT `round_ibfk_1` FOREIGN KEY (`manager_nid`) REFERENCES `manager` (`manager_nid`);

--
-- Constraints for table `serial`
--
ALTER TABLE `serial`
  ADD CONSTRAINT `serial_ibfk_1` FOREIGN KEY (`autorickshaw_number`) REFERENCES `autorickshaw` (`autorickshaw_number`),
  ADD CONSTRAINT `serial_ibfk_2` FOREIGN KEY (`round_number`) REFERENCES `round` (`round_number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
