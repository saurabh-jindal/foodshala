-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 07, 2020 at 02:48 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `image` longblob DEFAULT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `veg` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `image`, `name`, `price`, `user_id`, `veg`) VALUES
(1, NULL, 'Momos', 120, 4, 1),
(2, NULL, 'Chole Bhature ', 250, 1, 1),
(3, NULL, 'Mutton Briyani', 550, 4, 0),
(4, NULL, 'Dal makhani', 250, 8, 1),
(5, NULL, 'Palak Paneer', 175, 8, 1),
(6, NULL, 'Paneer Tikka', 450, 8, 1),
(7, NULL, 'Paneer', 290, 8, 1),
(8, NULL, 'Chicken', 630, 8, 0),
(9, NULL, 'Shahi Paneer', 120, 8, 1),
(10, NULL, 'Makhani Pizza', 230, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `people_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `food_id`, `restaurant_id`, `people_id`) VALUES
(1, 1, 4, 7),
(2, 3, 4, 7),
(3, 2, 1, 7),
(4, 3, 4, 7),
(5, 4, 8, 7),
(6, 5, 8, 7),
(7, 3, 4, 10),
(8, 2, 1, 10),
(9, 1, 4, 10),
(10, 3, 4, 11),
(11, 4, 8, 11),
(12, 2, 1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(1) NOT NULL DEFAULT 1,
  `veg` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `password`, `role`, `veg`) VALUES
(1, 'hey@hey.com', 'Saurabh Jindal', 'hey@hey', 0, 1),
(2, 'jindal@gmail.com', 'Gaurav', 'jindal@g', 1, 1),
(3, 'say@say.com', 'Rohit', 'say@sa', 1, 1),
(4, 'tandoor_house@gmail.com', 'Tandoor House', 'tandoor_house@', 0, 0),
(7, 'mohot@ha.com', 'Mohit', '17893f3471ba48b1e9fb3abebf05c921', 1, 1),
(8, 'barb@barb.com', 'Barbeques', 'bf7a453901ec57fac85d2b3948022ea4', 0, 1),
(10, 'abh@abh.com', 'abhishek', '8d55ad1807809eef47ca3df05ad241ce', 1, 1),
(11, 'raj@raj.com', 'Raj', 'a6fbf2c8407f9cb61bdb06e9d91da8bd', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
