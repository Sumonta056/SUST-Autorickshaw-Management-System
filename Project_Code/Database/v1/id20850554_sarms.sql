-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 01, 2023 at 03:20 PM
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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `email`, `password_hash`, `id`) VALUES
('f', 'ff@gmail.com', '$2y$10$o0mPt.JKu5/ktq4iuDr3v.RYjWY8RRwDZNNozVoDm2pBfts12WSiW', 1),
('mridul', 'saha@gmail.com', '$2y$10$SHIrrBA4LDuF6bX2jSqceOk.pObciQ6wNrEI/I3ClXUsL5IHJk1JC', 2),
('gg', 'gg@gmail.com', '$2y$10$26Sbg0NFUZtTnW.nULaZaudUA4GkSn9CrDC.r3NmT6nWYxJYzMVVe', 3),
('gg', 'gg@gmail.com', '$2y$10$lEfZoXqFyNz3gE9nB5l9iuQ8L7JMnv7lSOggYSEAiIF5/Ih/139Ve', 4),
('Promi Mojumder', 'promimojumder8@gmail.com', '$2y$10$yPmSUY1q8ODoPvGK5Qo7NexZtpMv4yWUtPsTkLuf.ev0I2VL8d95K', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
