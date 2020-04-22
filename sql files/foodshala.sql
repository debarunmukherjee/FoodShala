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
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `item_name`, `description`, `image`, `restaurant_id`, `type`, `price`, `slug`, `created_at`) VALUES
(1, 'Spicy Burger', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'noimage.jpg', 3, 'Non-Veg', 150, 'spicy_burger', '2019-07-06 12:10:45'),
(2, 'Chicken Tikka', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'noimage.jpg', 3, 'Non-Veg', 290, 'chicken_tikka', '2019-07-06 12:10:45'),
(3, 'Veg Chicken Roll', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'noimage.jpg', 3, 'Non-Veg', 560, 'Veg-Chicken-Roll', '2019-07-06 20:57:26'),
(4, 'Chicken Biriyani', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus aliquam eleifend nisi vitae luctus. Proin a mauris sit amet ante ornare vestibulum nec eu ipsum. Proin eleifend ante nec finibus consectetur. Etiam metus leo, consectetur nec libero et, rhoncus finibus enim. Cras posuere efficitur lorem ut blandit. Aliquam leo elit, scelerisque nec faucibus ac, faucibus pellentesque quam. Ut facilisis iaculis felis, sit amet tincidunt sem dapibus sit amet. Integer in lacus lectus. Suspendisse sagittis tristique sapien at sagittis. Nam in velit non leo gravida cursus eget vel nulla. Interdum et malesuada fames ac ante ipsum primis in faucibus.', 'biriyani.jpg', 6, 'Veg', 190, 'Chicken-Biriyani', '2019-07-06 22:32:32'),
(5, 'Mixed Fried Rice', 'Sed ornare arcu vel leo aliquam, congue laoreet dolor semper. Fusce euismod imperdiet justo, ac fermentum enim tincidunt eget. Vestibulum ut nulla sed nunc cursus faucibus et eu erat. Morbi elit nulla, malesuada at tortor a, rhoncus condimentum risus. Nulla pretium enim in sem viverra, ac sollicitudin ex fringilla. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus lobortis enim nec libero tristique finibus. Maecenas quis luctus elit. Morbi vehicula nulla non nulla condimentum dignissim. Phasellus efficitur dui sed dolor imperdiet posuere. Aliquam sodales dictum ex, ac mollis enim scelerisque in. Proin cursus lacus orci, vel maximus nulla pulvinar in. Sed consequat placerat dapibus. Nam vel elit iaculis, dignissim metus ac, lobortis metus.', 'fried-rice.jpg', 6, 'Non-Veg', 400, 'Mixed-Fried-Rice', '2019-07-08 02:35:57'),
(6, 'Choco Lava Ice Cream', 'Morbi rhoncus ac orci quis sodales. Vestibulum id orci mollis neque venenatis suscipit ut at mi. Aenean eleifend dui ac varius elementum. Proin posuere massa ac mauris lacinia, quis elementum turpis sollicitudin. Praesent ac porta lorem, et congue lorem. Curabitur placerat tortor odio, eu varius est maximus sit amet. Morbi felis orci, pellentesque et diam eget, interdum venenatis nulla. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 'chocolatelavacakes-15.jpg', 6, 'Veg', 800, 'Choco-Lava-Ice-Cream', '2019-07-08 02:40:06'),
(7, 'Crazy Nacho Sizzler', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce ultrices finibus placerat. Praesent ac efficitur tortor. Praesent malesuada odio ac placerat sollicitudin. Donec in diam et mauris egestas malesuada. Nulla risus dui, porta vehicula leo id, eleifend posuere urna. Aliquam ut interdum dolor. Nam porta placerat consectetur. Curabitur consectetur, eros a accumsan tincidunt, enim magna pulvinar justo, at egestas metus massa at nulla.', 'Mushroom_Cutlet_Veg_Sizzler.jpg', 6, 'Non-Veg', 1020, 'Crazy-Nacho-Sizzler', '2019-07-08 14:45:04');

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
(1, 1, 'Tandoor House', 7, 1, 1086, 'ggg', '12345', 'DUMMY12345', '2019-07-08 17:24:19'),
(2, 1, 'Tandoor House', 5, 1, 435, 'ggg', '12345', 'DUMMY12345', '2019-07-08 20:35:40'),
(3, 1, 'Tandoor House', 6, 2, 1695, 'ggg', '12345', 'DUMMY12345', '2019-07-08 20:38:33'),
(4, 2, 'Haji Biriyani', 1, 1, 173, 'ggg', '12345', 'DUMMY12345', '2019-07-08 20:44:36'),
(5, 1, 'Tandoor House', 4, 1, 215, 'awesome place', '12345', 'DUMMY12345', '2019-07-09 14:27:43');

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
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
