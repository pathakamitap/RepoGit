-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2018 at 10:52 AM
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
  `Password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dealerdata`
--

INSERT INTO `dealerdata` (`id`, `DealershipName`, `DealerName`, `Location`, `Phone`, `Email`, `Image`, `Password`) VALUES
('$AfNbo', 'amit pathak', 'amit', 'dwarka', 8449857236, 'pathak@yahoo.com', 'img4.jpg', 'z'),
('$oEuFa', 'pathakco@gmail.com', 'mr amit pathak', 'ramnagar', 8449857236, 'pathakcompany@gmail.com', 'dealers_login.png', 'wwwwww'),
('$pBsne', 'apsdfas', 'mr pathak', 'noidadfsfds', 7830841746, 'amitpathak.629@gmail.com', 'img4.jpg', 'wceabd'),
('$pk#Q&', 'ap', 'mr rajat', 'noida', 7830841746, 'amit@technetty.com', 'img3.jpg', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `dealersaccount`
--

CREATE TABLE `dealersaccount` (
  `id` varchar(30) NOT NULL,
  `profilePic` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dealersaccount`
--

INSERT INTO `dealersaccount` (`id`, `profilePic`) VALUES
('$oEuFa', 'car-2220057_1920.jpg');

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

--
-- Indexes for dumped tables
--

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
-- Indexes for table `dealersaccount`
--
ALTER TABLE `dealersaccount`
  ADD KEY `id` (`id`);

--
-- Indexes for table `otp`
--
ALTER TABLE `otp`
  ADD PRIMARY KEY (`serial_no`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dealersaccount`
--
ALTER TABLE `dealersaccount`
  ADD CONSTRAINT `dealersaccount_ibfk_1` FOREIGN KEY (`id`) REFERENCES `dealerdata` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
