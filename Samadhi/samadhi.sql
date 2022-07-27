-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2021 at 06:54 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `samadhi`
--

-- --------------------------------------------------------

--
-- Table structure for table `childdetails`
--

CREATE TABLE `childdetails` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `fullName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `donationcashdetails`
--

CREATE TABLE `donationcashdetails` (
  `id` int(11) NOT NULL,
  `donarid` int(11) DEFAULT NULL,
  `cashAmount` double NOT NULL,
  `date` datetime DEFAULT NULL,
  `donorName` varchar(20) NOT NULL,
  `type` varchar(10) NOT NULL,
  `contact` int(15) NOT NULL,
  `address` int(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `itemDetails` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donationcashdetails`
--

INSERT INTO `donationcashdetails` (`id`, `donarid`, `cashAmount`, `date`, `donorName`, `type`, `contact`, `address`, `quantity`, `itemDetails`) VALUES
(23, NULL, 2500, '2021-08-14 00:00:00', 'Ranidu Gamage', 'cash', 0772021580, 0, 0, '0'),
(24, NULL, 10000, '2021-07-07 00:00:00', 'ABEYGUNAWARDHANA D.D', 'cash', 0772021580, 450, 0, 'nothing'),
(25, NULL, 1000, '2021-08-14 00:00:00', 'Ranidu Gamage', 'cash', 0772021580, 0, 0, 'nothing'),
(26, NULL, 0, '2021-08-14 00:00:00', 'Ranidu Gamage', 'item', 0772021580, 0, 10, 'books'),
(28, NULL, 2500, '2021-08-14 00:00:00', 'kamal Perera', 'cash', 714330589, 0, 0, 'nothing'),
(29, NULL, 1000, '2021-08-14 09:47:38', 'test', 'cash', 0772021580, 0, 0, 'nothing'),
(30, NULL, 10000, '2021-08-14 10:06:24', 'Ranidu Gamage', 'cash', 0772021580, 0, 0, 'nothing');

-- --------------------------------------------------------

--
-- Table structure for table `labor`
--

CREATE TABLE `labor` (
  `laborId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '0',
  `contact` varchar(50) NOT NULL DEFAULT '0',
  `address` varchar(50) NOT NULL DEFAULT '0',
  `gender` varchar(50) NOT NULL DEFAULT '0',
  `salary` varchar(50) DEFAULT '0',
  `birthday` date DEFAULT NULL,
  `nameWithInitials` varchar(100) NOT NULL,
  `company` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `labor`
--

INSERT INTO `labor` (`laborId`, `name`, `contact`, `address`, `gender`, `salary`, `birthday`, `nameWithInitials`, `company`) VALUES
(15, 'Dinuka', '00772021580', 'Diggala, Panadura, maramba ,akuressa', 'male', '0', '2021-08-17', 'Dilshan', 'sunshine');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffid` int(11) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `ContactNo` int(10) DEFAULT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `birthDay` date DEFAULT NULL,
  `NIC` varchar(15) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `post` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffid`, `Name`, `ContactNo`, `Address`, `username`, `password`, `birthDay`, `NIC`, `gender`, `email`, `post`) VALUES
(25, 'Ranidu Gamage', 0772021580, 'Diggala, Panadura,  ,', mgyoshitharanidu@gmail.com', 'ranidu1234', '2021-08-10', '199821600189', '', 'mgyoshitharanidu@gmail.com', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `childdetails`
--
ALTER TABLE `childdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donationcashdetails`
--
ALTER TABLE `donationcashdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `labor`
--
ALTER TABLE `labor`
  ADD PRIMARY KEY (`laborId`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `childdetails`
--
ALTER TABLE `childdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `donationcashdetails`
--
ALTER TABLE `donationcashdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `labor`
--
ALTER TABLE `labor`
  MODIFY `laborId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
