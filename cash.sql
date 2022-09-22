-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2022 at 01:54 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cash`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(4) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `branch` varchar(30) NOT NULL,
  `user_role` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `firstname`, `lastname`, `branch`, `user_role`) VALUES
(1, 'musa', 'bojang', 'musa', 'bojang', 'Tranquil', 'admin'),
(2, 'abdou', 'jaiteh', 'Abdou Khadir', 'Jaiteh', 'Brikama', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `cc_table_record`
--

CREATE TABLE `cc_table_record` (
  `cc_id` int(11) NOT NULL,
  `transaction_type` varchar(50) NOT NULL,
  `amount` int(50) NOT NULL,
  `branch` varchar(30) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cc_table_record`
--

INSERT INTO `cc_table_record` (`cc_id`, `transaction_type`, `amount`, `branch`, `date`) VALUES
(8, 'MoneyGram', 400, 'Brikama', '2022-09-08 15:50:47'),
(9, 'Internal Transfer Paid Out', 30000, 'Brikama', '2022-09-08 15:50:56'),
(11, 'MoneyGram', 32323, 'Brikama', '2022-09-08 15:56:35'),
(12, 'Internal Transfer Received', 344, 'Brikama', '2022-09-12 08:43:47'),
(28, 'MoneyGram', 30000, 'Tranquil', '2022-09-10 20:12:58'),
(29, 'MoneyGram', 400000, 'Tranquil', '2022-09-10 20:13:10');

-- --------------------------------------------------------

--
-- Table structure for table `cc_working_capital`
--

CREATE TABLE `cc_working_capital` (
  `wc_id` int(11) NOT NULL,
  `branch` varchar(30) NOT NULL,
  `amount` int(30) NOT NULL,
  `added_by` varchar(30) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cc_working_capital`
--

INSERT INTO `cc_working_capital` (`wc_id`, `branch`, `amount`, `added_by`, `date`) VALUES
(1, 'Tranquil', 39605323, 'musa bojang', '2022-09-10'),
(2, 'Sukuta', 5555, 'Musa', '2022-09-10'),
(3, 'Brikama', 4000, 'Musa', '2022-09-10'),
(4, 'Sanyang', 5555, 'Musa', '2022-09-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cc_table_record`
--
ALTER TABLE `cc_table_record`
  ADD PRIMARY KEY (`cc_id`);

--
-- Indexes for table `cc_working_capital`
--
ALTER TABLE `cc_working_capital`
  ADD PRIMARY KEY (`wc_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cc_table_record`
--
ALTER TABLE `cc_table_record`
  MODIFY `cc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `cc_working_capital`
--
ALTER TABLE `cc_working_capital`
  MODIFY `wc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
