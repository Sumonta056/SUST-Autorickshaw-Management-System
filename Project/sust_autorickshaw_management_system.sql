-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2023 at 05:24 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sust_autorickshaw_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `authority`
--

CREATE TABLE `authority` (
  `authority_name` varchar(30) DEFAULT NULL,
  `authority_job_title` varchar(30) DEFAULT NULL,
  `authority_signature` varchar(10) DEFAULT NULL,
  `authority_id` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `driver_nid` varchar(30) NOT NULL,
  `driver_name` varchar(30) DEFAULT NULL,
  `driver_address` varchar(40) DEFAULT NULL,
  `driver_date_of_birth` date DEFAULT NULL,
  `autorickshaw_number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `manager_nid` varchar(15) NOT NULL,
  `manager_name` varchar(30) DEFAULT NULL,
  `manager_address` varchar(40) DEFAULT NULL,
  `manager_date_of_birth` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `owner_nid` varchar(15) NOT NULL,
  `owner_name` varchar(30) DEFAULT NULL,
  `owner_address` varchar(40) DEFAULT NULL,
  `owner_date_of_birth` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`owner_nid`, `owner_name`, `owner_address`, `owner_date_of_birth`) VALUES
('6877807200', 'Md.Selim Reza', 'Sust, Sylhet', '1963-04-11'),
('6877807201', 'Md. Oman Sani', 'Staff, Sylhet', '1962-02-12'),
('6877807202', 'Shekh Azizur Rahaman', 'Sust, Sylhet', '1968-01-19'),
('6877807203', 'Md. Shawon Rahaman', 'Modina Market, Sylhet', '1970-01-21'),
('6877807204', 'Md. Mofizur Rahaman', 'Sust, Sylhet', '1968-01-19'),
('6877807205', 'Nazim Uddin', 'Ambarkhana, Sylhet', '1975-11-08'),
('6877807206', 'Md. Sayed Ahmed', 'Modina Market, Sylhet', '1978-06-28'),
('6877807207', 'Md. Alomgir Hossain', 'Sust, Sylhet', '1965-07-29'),
('6877807208', 'Shekh Mostofa Kamal', 'Akhalia, Sylhet', '1980-11-09'),
('6877807209', 'Belal Khan', 'Staff, Sylhet', '1971-10-14'),
('6877807210', 'Abdul Moyeen Khan', 'Akhalia, Sylhet', '1973-01-10');

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `permission_area` varchar(20) DEFAULT NULL,
  `permission_date` date DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `permission_agreement` varchar(40) DEFAULT NULL,
  `autorickshaw_number` int(11) DEFAULT NULL,
  `authority_id` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `round`
--

CREATE TABLE `round` (
  `round_number` int(11) NOT NULL,
  `round_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `round_area` varchar(30) DEFAULT NULL,
  `autorickshaw_number` int(11) DEFAULT NULL,
  `manager_nid` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `serial`
--

CREATE TABLE `serial` (
  `serial_number` int(11) DEFAULT NULL,
  `serial_time` time DEFAULT NULL,
  `serial_date` date DEFAULT NULL,
  `serial_status` varchar(10) DEFAULT NULL,
  `round_number` int(11) DEFAULT NULL,
  `manager_nid` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authority`
--
ALTER TABLE `authority`
  ADD PRIMARY KEY (`authority_id`);

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
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD KEY `autorickshaw_number` (`autorickshaw_number`),
  ADD KEY `authority_id` (`authority_id`);

--
-- Indexes for table `round`
--
ALTER TABLE `round`
  ADD PRIMARY KEY (`round_number`),
  ADD KEY `autorickshaw_number` (`autorickshaw_number`),
  ADD KEY `manager_nid` (`manager_nid`);

--
-- Indexes for table `serial`
--
ALTER TABLE `serial`
  ADD KEY `round_number` (`round_number`),
  ADD KEY `manager_nid` (`manager_nid`);

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
-- Constraints for table `permission`
--
ALTER TABLE `permission`
  ADD CONSTRAINT `permission_ibfk_1` FOREIGN KEY (`autorickshaw_number`) REFERENCES `autorickshaw` (`autorickshaw_number`),
  ADD CONSTRAINT `permission_ibfk_2` FOREIGN KEY (`authority_id`) REFERENCES `authority` (`authority_id`);

--
-- Constraints for table `round`
--
ALTER TABLE `round`
  ADD CONSTRAINT `round_ibfk_1` FOREIGN KEY (`autorickshaw_number`) REFERENCES `autorickshaw` (`autorickshaw_number`),
  ADD CONSTRAINT `round_ibfk_2` FOREIGN KEY (`manager_nid`) REFERENCES `manager` (`manager_nid`);

--
-- Constraints for table `serial`
--
ALTER TABLE `serial`
  ADD CONSTRAINT `serial_ibfk_1` FOREIGN KEY (`round_number`) REFERENCES `round` (`round_number`),
  ADD CONSTRAINT `serial_ibfk_2` FOREIGN KEY (`manager_nid`) REFERENCES `manager` (`manager_nid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
