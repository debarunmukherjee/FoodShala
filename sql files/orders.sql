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
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `restaurant_name` varchar(255) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `order_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `restaurant_name`, `menu_id`, `quantity`, `amount`, `address`, `phone`, `payment_id`, `order_created_at`) VALUES
(1, 1, 'Tandoor House', 7, 1, 1086, '1-C Baidik Co-op Housing Society Ltd., Bengal Ambuja, City Center', '8170829705', 'DUMMY12345', '2019-07-08 17:24:19'),
(2, 1, 'Tandoor House', 5, 1, 435, '1-C Baidik Co-op Housing Society Ltd., Bengal Ambuja, City Center', '8170829705', 'DUMMY12345', '2019-07-08 20:35:40'),
(3, 1, 'Tandoor House', 6, 2, 1695, '1-C Baidik Co-op Housing Society Ltd., Bengal Ambuja, City Center', '8170829705', 'DUMMY12345', '2019-07-08 20:38:33'),
(4, 2, 'Haji Biriyani', 1, 1, 173, '95/F4, Basundhara Housing,  South canal road, Chingrighata, Kolkata, West Bengal, 700105', '8170829705', 'DUMMY12345', '2019-07-08 20:44:36'),
(5, 1, 'Tandoor House', 4, 1, 215, 'awesome place', '8170829705', 'DUMMY12345', '2019-07-09 14:27:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
