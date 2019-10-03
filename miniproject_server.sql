-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2017 at 12:09 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `miniproject_server`
--

-- --------------------------------------------------------

--
-- Table structure for table `bazarecords`
--

CREATE TABLE `bazarecords` (
  `id` int(11) NOT NULL,
  `Bazar` int(11) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bazarecords`
--

INSERT INTO `bazarecords` (`id`, `Bazar`, `Date`) VALUES
(5, 500, '2017-07-18 05:39:37'),
(9, 1000, '2017-07-19 09:41:32');

-- --------------------------------------------------------

--
-- Table structure for table `mealrecords`
--

CREATE TABLE `mealrecords` (
  `id` int(11) NOT NULL,
  `Meal` int(11) NOT NULL DEFAULT '0',
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mealrecords`
--

INSERT INTO `mealrecords` (`id`, `Meal`, `Date`) VALUES
(5, 4, '0000-00-00 00:00:00'),
(5, 3, '0000-00-00 00:00:00'),
(9, 5, '2017-07-15 16:51:58'),
(10, 4, '2017-07-15 16:52:29'),
(9, 6, '2017-07-15 16:52:38'),
(9, 2, '2017-07-18 05:06:47');

-- --------------------------------------------------------

--
-- Table structure for table `paymentrecords`
--

CREATE TABLE `paymentrecords` (
  `id` int(11) NOT NULL,
  `Bill` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paymentrecords`
--

INSERT INTO `paymentrecords` (`id`, `Bill`) VALUES
(5, 1500),
(9, 3000),
(10, 2500),
(10, 1500),
(9, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `user_id` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(35) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `password`, `name`, `email`, `is_admin`, `reg_date`) VALUES
(5, 'Rifat', '456', 'Rifat Ullah', 'IamRifat@gmail.com', 1, '2017-07-18 05:03:42'),
(9, '123', '456', 'Unknown', 'Unknown@gmail.com', 0, '2017-07-15 16:50:50'),
(10, 'No', '123', 'Nobody', 'user@gmail.com', 1, '2017-07-15 16:51:27');

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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
