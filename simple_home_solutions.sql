-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2019 at 08:21 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simple_home_solutions`
--

-- --------------------------------------------------------

--
-- Table structure for table `barbers`
--

CREATE TABLE `barbers` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `regular` int(11) NOT NULL,
  `fade` int(11) NOT NULL,
  `beard` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `ratings` decimal(11,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barbers`
--

INSERT INTO `barbers` (`id`, `company_name`, `regular`, `fade`, `beard`, `location`, `type`, `ratings`) VALUES
(1, 'Barber Lounge', 100, 150, 80, 'Nanded', 'Economy', '4.5'),
(2, 'Gentleman\'s Salon', 120, 170, 100, 'Vishnupuri', 'Professional', '4.0'),
(3, 'Jawed Habib Hair Salon', 150, 170, 130, 'Nanded', 'Professional', '4.8'),
(4, 'Hair N Beyond', 90, 130, 70, 'Vishnupuri', 'Economy', '3.8'),
(5, 'Sams Unisex Salon', 130, 150, 100, 'Vishnupuri', 'Professional', '4.2');

-- --------------------------------------------------------

--
-- Table structure for table `bathroom`
--

CREATE TABLE `bathroom` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `1` int(11) NOT NULL,
  `2` int(11) NOT NULL,
  `3` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `ratings` decimal(10,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bathroom`
--

INSERT INTO `bathroom` (`id`, `company_name`, `1`, `2`, `3`, `location`, `ratings`) VALUES
(1, 'Dizzi', 599, 1199, 1799, 'Vishnupuri', '4.6'),
(2, 'Litmaid', 799, 1299, 1599, 'Nanded', '4.5'),
(3, 'hicare', 699, 999, 1399, 'Nanded', '4.0');

-- --------------------------------------------------------

--
-- Table structure for table `desktop`
--

CREATE TABLE `desktop` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `general` int(11) NOT NULL,
  `hardware` int(11) NOT NULL,
  `backup` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `ratings` decimal(10,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `desktop`
--

INSERT INTO `desktop` (`id`, `company_name`, `general`, `hardware`, `backup`, `location`, `ratings`) VALUES
(1, 'Skynet Infosystems', 299, 299, 499, 'Nanded', '4.2'),
(2, 'Delve InfoTech', 199, 199, 699, 'Vishnupuri', '4.6'),
(3, 'Softech', 149, 99, 399, 'Vishnupuri', '4.8');

-- --------------------------------------------------------

--
-- Table structure for table `electrical`
--

CREATE TABLE `electrical` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `tv` int(11) NOT NULL,
  `fridge` int(11) NOT NULL,
  `washing` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `ratings` decimal(10,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `electrical`
--

INSERT INTO `electrical` (`id`, `company_name`, `tv`, `fridge`, `washing`, `location`, `ratings`) VALUES
(1, 'Ganesh Electricals', 299, 199, 399, 'Vishnupuri', '4.4'),
(2, 'Prasanna Electricals', 399, 299, 249, 'Nanded', '4.5'),
(3, 'Super Electricals', 349, 299, 499, 'Vishnupuri', '4.6');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `1bhk` int(11) NOT NULL,
  `2bhk` int(11) NOT NULL,
  `3bhk` int(11) NOT NULL,
  `4bhk` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `ratings` decimal(10,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`id`, `company_name`, `1bhk`, `2bhk`, `3bhk`, `4bhk`, `location`, `ratings`) VALUES
(1, 'Broomberg', 5499, 6499, 7499, 8499, 'Nanded', '3.7'),
(2, 'Truneto', 3500, 4000, 4500, 5500, 'Vishnupuri', '4.4');

-- --------------------------------------------------------

--
-- Table structure for table `makeup`
--

CREATE TABLE `makeup` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `skin` int(11) NOT NULL,
  `hair` int(11) NOT NULL,
  `nails` int(11) NOT NULL,
  `party` int(11) NOT NULL,
  `wedding` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `ratings` decimal(11,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `makeup`
--

INSERT INTO `makeup` (`id`, `company_name`, `skin`, `hair`, `nails`, `party`, `wedding`, `location`, `ratings`) VALUES
(1, 'Lakme Salon', 1499, 499, 149, 1999, 29999, 'Nanded', '4.8'),
(2, 'VLCC', 1999, 699, 129, 3999, 24999, 'Vishnupuri', '4.6'),
(3, 'Glitz', 1599, 599, 189, 2999, 22999, 'Nanded', '4.7');

-- --------------------------------------------------------

--
-- Table structure for table `massage`
--

CREATE TABLE `massage` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `standard` int(11) NOT NULL,
  `aroma` int(11) NOT NULL,
  `ayurvedic` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `ratings` decimal(11,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `massage`
--

INSERT INTO `massage` (`id`, `company_name`, `standard`, `aroma`, `ayurvedic`, `location`, `ratings`) VALUES
(1, 'Bliss Thai Spa', 499, 999, 799, 'Nanded', '4.6'),
(2, 'Oasis Spa', 399, 699, 499, 'Vishnupuri', '3.9');

-- --------------------------------------------------------

--
-- Table structure for table `pest`
--

CREATE TABLE `pest` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `basic1` int(11) NOT NULL,
  `basic2` int(11) NOT NULL,
  `basic3` int(11) NOT NULL,
  `rodents1` int(11) NOT NULL,
  `rodents2` int(11) NOT NULL,
  `rodents3` int(11) NOT NULL,
  `flies1` int(11) NOT NULL,
  `flies2` int(11) NOT NULL,
  `flies3` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `ratings` decimal(10,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pest`
--

INSERT INTO `pest` (`id`, `company_name`, `basic1`, `basic2`, `basic3`, `rodents1`, `rodents2`, `rodents3`, `flies1`, `flies2`, `flies3`, `location`, `ratings`) VALUES
(1, 'Pestinct', 600, 950, 1200, 550, 750, 950, 450, 650, 850, 'Vishnupuri', '4.5'),
(2, 'Washho', 799, 999, 1299, 699, 899, 1199, 399, 599, 799, 'Nanded', '4.8');

-- --------------------------------------------------------

--
-- Table structure for table `plumbers`
--

CREATE TABLE `plumbers` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `leakage` int(11) NOT NULL,
  `heaters` int(11) NOT NULL,
  `drainage` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `ratings` decimal(10,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plumbers`
--

INSERT INTO `plumbers` (`id`, `company_name`, `leakage`, `heaters`, `drainage`, `location`, `ratings`) VALUES
(1, 'Handy', 150, 499, 799, 'Nanded', '4.7'),
(2, 'Indian Plumbers', 179, 599, 899, 'Vishnupuri', '4.6'),
(3, 'Fixit', 199, 399, 899, 'Nanded', '4.8');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `joined_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `joined_at`) VALUES
(1, 'Venkatesh', 'Mangnale', 'mangnalev.1999@gmail.com', 'simplehomesolutions', '2019-03-10 13:05:11'),
(4, 'test', 'testr', 'asd@asd.com', 'yahallo123', '2019-03-10 13:33:48'),
(5, 'asd', 'asd', 'sad@sad.com', 'asdasdasd', '2019-04-08 02:06:56'),
(6, 'veer', 'asd', 'asd@asd.com', 'asdsaddasdas', '2019-04-08 02:08:08'),
(7, 'Venky', 'Mangnale', 'asd@asd.com', 'asdfghj12', '2019-04-08 02:15:19'),
(8, 'v', 'asd', 'asd@asd.com', 'asdasdasdas', '2019-04-08 02:18:23'),
(9, 'Venkasd', 'asd', 'asd@asd.com', 'asdddddd', '2019-04-08 02:19:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barbers`
--
ALTER TABLE `barbers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bathroom`
--
ALTER TABLE `bathroom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `desktop`
--
ALTER TABLE `desktop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `electrical`
--
ALTER TABLE `electrical`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `makeup`
--
ALTER TABLE `makeup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `massage`
--
ALTER TABLE `massage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pest`
--
ALTER TABLE `pest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plumbers`
--
ALTER TABLE `plumbers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barbers`
--
ALTER TABLE `barbers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `electrical`
--
ALTER TABLE `electrical`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `makeup`
--
ALTER TABLE `makeup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `massage`
--
ALTER TABLE `massage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pest`
--
ALTER TABLE `pest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `plumbers`
--
ALTER TABLE `plumbers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
