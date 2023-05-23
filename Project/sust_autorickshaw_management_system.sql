-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2023 at 07:01 PM
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

--
-- Dumping data for table `authority`
--

INSERT INTO `authority` (`authority_name`, `authority_job_title`, `authority_signature`, `authority_id`) VALUES
('Dr. Md. Alomgir Kabir', 'Proctor', 'A Kabir', '4291923818'),
('Md. Abu Hena Pohil', 'Proctor', 'Pohil', '4291923856'),
('Md. Israt Ibn Ismail', 'Proctor', 'Ismail', '4291923857');

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
(7, 'Sadia Enterprise', 'TVS King', 'green', '6877807202'),
(17, 'Ma Enterprise', 'Porag', 'blue', '6877807200'),
(18, 'Sadia Enterprise', 'TVS King', 'blue', '6877807201'),
(30, 'Sadia Enterprise', 'Porag', 'blue', '6877807203'),
(32, 'Shotota Enterprise', 'Mahindra Mini', 'red', '6877807201'),
(33, 'Mayer Doa Enterprise', 'TVS King', 'red', '6877807203'),
(40, 'Shotota Enterprise', 'Mahindra Mini', 'red', '6877807200'),
(47, 'Shotota Enterprise', 'Mahindra Mini', 'blue', '6877807201'),
(51, 'Ma Enterprise', 'TVS King', 'green', '6877807203'),
(52, 'Ma Enterprise', 'Porag', 'red', '6877807206'),
(56, 'Shotota Enterprise', 'Mahindra Mini', 'green', '6877807203');

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

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driver_nid`, `driver_name`, `driver_address`, `driver_date_of_birth`, `autorickshaw_number`) VALUES
('3372328999', 'Hasan Ahmed', 'Fulbari, Sylhet', '1962-12-10', 18),
('3427688883', 'Tareq Mia', 'Fulbari, Sylhet', '1981-04-20', 30),
('3762328990', 'Dulal Mia', 'Akhalia, Sylhet', '1963-04-11', 40),
('5454433338', 'Abdul Jobbar', 'SUST, Sylhet', '1983-01-23', 56),
('5474232556', 'Ismail Hossain', 'Akhalia, Sylhet', '1963-06-17', 51),
('6565784979', 'Md. Ikbal Hossain', 'Modina Market, Sylhet', '1963-11-11', 52),
('6592324244', 'Ahsan Haque', 'Modina Market, Sylhet', '1985-09-11', 47),
('7777533547', 'Md. Alomgir Hossain', 'SUST, Sylhet', '1973-10-29', 17),
('7975644334', 'Rezaul Karim', 'Kalibari, Sylhet', '1964-02-13', 32),
('8229191111', 'Abbir Hossain', 'Akhalia, Sylhet', '1964-04-15', 7),
('9821903083', 'Faruk Mia', 'Akhalia, Sylhet', '1993-04-11', 33);

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

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`manager_nid`, `manager_name`, `manager_address`, `manager_date_of_birth`) VALUES
('3762324990', 'Wasif Ullah', 'SUST, Sylhet', '1990-01-01'),
('5299322300', 'Zaman Chowdhury', 'SUST, Sylhet', '1985-01-01'),
('9474232550', 'Misbah Ullah', 'SUST, Sylhet', '1980-01-01');

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
('6877807206', 'Md. Sayed Ahmed', 'Modina Market, Sylhet', '1978-06-28');

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

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`permission_area`, `permission_date`, `expiration_date`, `permission_agreement`, `autorickshaw_number`, `authority_id`) VALUES
('SUST, Sylhet', '2020-07-08', '2023-11-11', 'agreed', 40, '4291923818'),
('SUST, Sylhet', '2019-05-30', '2023-08-07', 'agreed', 18, '4291923857'),
('SUST, Sylhet', '2019-05-05', '2023-10-16', 'agreed', 7, '4291923818'),
('SUST, Sylhet', '2021-05-09', '2023-11-11', 'agreed', 51, '4291923856'),
('SUST, Sylhet', '2020-07-12', '2023-10-08', 'agreed', 47, '4291923856'),
('SUST, Sylhet', '2019-10-13', '2023-08-27', 'agreed', 32, '4291923857'),
('SUST, Sylhet', '2019-05-30', '2023-12-11', 'agreed', 52, '4291923818'),
('SUST, Sylhet', '2019-05-12', '2023-05-31', 'agreed', 17, '4291923856'),
('SUST, Sylhet', '2019-05-30', '2023-11-19', 'agreed', 33, '4291923856'),
('SUST, Sylhet', '2020-06-17', '2023-12-10', 'agreed', 56, '4291923856'),
('SUST, Sylhet', '2019-05-09', '2024-01-18', 'agreed', 30, '4291923857');

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
