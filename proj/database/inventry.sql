-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2018 at 01:50 PM
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
('ap', 'amit pathak', 'qqqqqqqq', 'amitpathak.629@gmail.com', 8447859632);

-- --------------------------------------------------------

--
-- Table structure for table `dealerdata`
--

CREATE TABLE `dealerdata` (
  `id` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Location` varchar(50) NOT NULL,
  `Phone` bigint(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Image` varchar(30) NOT NULL,
  `Password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dealerdata`
--

INSERT INTO `dealerdata` (`id`, `Name`, `Location`, `Phone`, `Email`, `Image`, `Password`) VALUES
('$AfNbo', 'amit pathak', 'dwarka', 8449857236, 'pathak@yahoo.com', 'img4.jpg', 'ik6q2a'),
('$K3rUW', 'amit pathak', 'noida', 7830841746, 'amitpathak.629@gmail.com', 'img2.jpg', 'kiycbmjkjk'),
('$oEuFa', 'ap', 'noidadfsfds', 7830841746, 'pathakamit@yahoo.com', 'img4.jpg', 'lei2lu'),
('$pk#Q&', 'ap', 'noida', 7830841746, 'amit@technetty.com', 'img3.jpg', 'password'),
('$uJx8P', 'apsdfas', 'dwarka', 7830841746, 'amitpathak.629@gmail.com', 'img3.jpg', '4uvv7k');

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
(2, 0),
(3, 1),
(4, 2);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otp`
--
ALTER TABLE `otp`
  ADD PRIMARY KEY (`serial_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
