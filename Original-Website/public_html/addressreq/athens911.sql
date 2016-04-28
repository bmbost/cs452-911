-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2016 at 04:11 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `athens911`
--

-- --------------------------------------------------------

--
-- Table structure for table `address_form`
--

CREATE TABLE `address_form` (
  `id` int(11) NOT NULL,
  `request_date` date NOT NULL,
  `requestor` varchar(255) NOT NULL,
  `requestor_phone1` varchar(20) NOT NULL,
  `requestor_phone2` varchar(20) NOT NULL,
  `residency` varchar(20) NOT NULL,
  `resident` varchar(255) NOT NULL,
  `resident_phone1` varchar(20) NOT NULL,
  `resident_phone2` varchar(20) NOT NULL,
  `structure_type` varchar(255) NOT NULL,
  `structure_details` varchar(255) NOT NULL,
  `north_add_num` varchar(20) NOT NULL,
  `south_add_num` varchar(20) NOT NULL,
  `east_add_num` varchar(20) NOT NULL,
  `west_add_num` varchar(20) NOT NULL,
  `markers` varchar(255) NOT NULL,
  `others` varchar(255) NOT NULL,
  `road_street` varchar(20) NOT NULL,
  `lotNumber` varchar(50) DEFAULT NULL,
  `gps` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address_form`
--
ALTER TABLE `address_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address_form`
--
ALTER TABLE `address_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
