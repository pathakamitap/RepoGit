-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2018 at 01:16 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.1.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventry`
--

-- --------------------------------------------------------

--
-- Table structure for table `$7tmnk`
--

CREATE TABLE `$7tmnk` (
  `stock_no` varchar(50) DEFAULT NULL,
  `vin` varchar(17) NOT NULL,
  `msrp` decimal(8,3) DEFAULT NULL,
  `final_price` decimal(8,3) DEFAULT NULL,
  `make` varchar(50) DEFAULT NULL,
  `model` varchar(100) DEFAULT NULL,
  `Trim` varchar(50) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `type_of_purchase` enum('new','pre-owned') DEFAULT NULL,
  `pics` varchar(250) DEFAULT NULL,
  `milage` decimal(3,2) DEFAULT NULL,
  `doors` int(2) DEFAULT NULL,
  `features` varchar(250) DEFAULT NULL,
  `engine` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `$bgazf`
--

CREATE TABLE `$bgazf` (
  `stock_no` varchar(50) DEFAULT NULL,
  `vin` varchar(17) NOT NULL,
  `msrp` decimal(8,3) DEFAULT NULL,
  `final_price` decimal(8,3) DEFAULT NULL,
  `make` varchar(50) DEFAULT NULL,
  `model` varchar(100) DEFAULT NULL,
  `Trim` varchar(50) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `type_of_purchase` enum('new','pre-owned') DEFAULT NULL,
  `pics` varchar(250) DEFAULT NULL,
  `milage` decimal(3,2) DEFAULT NULL,
  `doors` int(2) DEFAULT NULL,
  `features` varchar(250) DEFAULT NULL,
  `engine` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `$uf8xx`
--

CREATE TABLE `$uf8xx` (
  `stock_no` varchar(50) DEFAULT NULL,
  `vin` varchar(17) NOT NULL,
  `msrp` decimal(8,3) DEFAULT NULL,
  `final_price` decimal(8,3) DEFAULT NULL,
  `make` varchar(50) DEFAULT NULL,
  `model` varchar(100) DEFAULT NULL,
  `Trim` varchar(50) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `type_of_purchase` enum('new','pre-owned') DEFAULT NULL,
  `pics` varchar(250) DEFAULT NULL,
  `milage` decimal(3,2) DEFAULT NULL,
  `doors` int(2) DEFAULT NULL,
  `features` varchar(250) DEFAULT NULL,
  `engine` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `authentication`
--

CREATE TABLE `authentication` (
  `username` varchar(15) NOT NULL,
  `name` varchar(35) NOT NULL,
  `password` varchar(80) NOT NULL,
  `email` varchar(35) NOT NULL,
  `contact` bigint(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authentication`
--

INSERT INTO `authentication` (`username`, `name`, `password`, `email`, `contact`) VALUES
('ap', 'amit pathak', 'zzzzzzzz', 'amitpathak.629@gmail.com', 8447859632);

-- --------------------------------------------------------

--
-- Table structure for table `dealerdata`
--

CREATE TABLE `dealerdata` (
  `id` varchar(50) NOT NULL,
  `DealershipName` varchar(50) NOT NULL,
  `DealerName` varchar(50) NOT NULL,
  `Location` varchar(50) NOT NULL,
  `Phone` bigint(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Image` varchar(300) NOT NULL,
  `Password` varchar(80) NOT NULL,
  `profilePic` varchar(250) DEFAULT 'default'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dealerdata`
--

INSERT INTO `dealerdata` (`id`, `DealershipName`, `DealerName`, `Location`, `Phone`, `Email`, `Image`, `Password`, `profilePic`) VALUES
('$7TmnK', 'apsdfas', 'bond', 'usa', 4447777777, 'pathak@yahoo.com', 'Screenshot (2).png', 'jaczjfi', 'default'),
('$BGAzf', 'newdealer@dealer.com', 'amit pathak', 'dwarka', 7777777777, 'user@gmail.com', '$BGAzfdsScreenshot (4).png', 'password', '$BGAzfdpScreenshot (1).png');

-- --------------------------------------------------------

--
-- Table structure for table `otp`
--

CREATE TABLE `otp` (
  `serial_no` int(1) NOT NULL,
  `var` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `otp`
--

INSERT INTO `otp` (`serial_no`, `var`) VALUES
(1, 1),
(2, 3),
(3, 1),
(4, 8);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `make` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `trim` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`make`, `model`, `trim`) VALUES
('audi', 'a', 'x1'),
('audi', 'b', 'x1'),
('audi', 'b', 'y1'),
('audi', 'c', 'y1'),
('bmw', 'g', 'xy'),
('bmw', 'g', 'y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `$7tmnk`
--
ALTER TABLE `$7tmnk`
  ADD PRIMARY KEY (`vin`);

--
-- Indexes for table `$bgazf`
--
ALTER TABLE `$bgazf`
  ADD PRIMARY KEY (`vin`);

--
-- Indexes for table `$uf8xx`
--
ALTER TABLE `$uf8xx`
  ADD PRIMARY KEY (`vin`);

--
-- Indexes for table `authentication`
--
ALTER TABLE `authentication`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `dealerdata`
--
ALTER TABLE `dealerdata`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `otp`
--
ALTER TABLE `otp`
  ADD PRIMARY KEY (`serial_no`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`make`,`model`,`trim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
