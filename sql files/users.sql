-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2019 at 04:57 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodshala`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `preference` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `preference`, `password`, `role`, `created_at`) VALUES
(1, 'Debarun Mukherjee', 'debarun.mukherjee1997@gmail.com', 'Veg', '25d55ad283aa400af464c76d713c07ad', 'User', '2019-07-07 22:09:28'),
(2, 'Debarun Mukherjee', 'test1@gmail.com', 'Non-Veg', '25d55ad283aa400af464c76d713c07ad', 'User', '2019-07-07 22:19:13'),
(3, 'Haji Biriyani', 'test2@gmail.com', 'NA', '25d55ad283aa400af464c76d713c07ad', 'Restaurant', '2019-07-08 01:09:19'),
(4, 'Kedar Chandra', 'test3@gmail.com', 'Veg', '25d55ad283aa400af464c76d713c07ad', 'User', '2019-07-08 10:38:21'),
(5, 'Satish Majumdar', 'test4@gmail.com', 'Both', '25d55ad283aa400af464c76d713c07ad', 'User', '2019-07-08 10:40:56'),
(6, 'Tandoor House', 'test5@gmail.com', 'NA', '25d55ad283aa400af464c76d713c07ad', 'Restaurant', '2019-07-08 11:13:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
