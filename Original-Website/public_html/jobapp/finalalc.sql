-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2016 at 05:39 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `importtest`
--

-- --------------------------------------------------------

--
-- Table structure for table `affactinfo`
--

CREATE TABLE `affactinfo` (
  `ApplicationID` int(11) NOT NULL,
  `Hispanic` varchar(5) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `RaceOne` varchar(75) DEFAULT NULL,
  `RaceTwo` varchar(75) DEFAULT NULL,
  `RaceThree` varchar(75) DEFAULT NULL,
  `RaceFour` varchar(75) DEFAULT NULL,
  `RaceFive` varchar(75) DEFAULT NULL,
  `RaceSix` varchar(75) DEFAULT NULL,
  `RaceSeven` varchar(75) DEFAULT NULL,
  `OtherRaceName` varchar(100) DEFAULT NULL,
  `ActiveUS` varchar(5) DEFAULT NULL,
  `ActiveUSFrom` varchar(30) DEFAULT NULL,
  `ActiveUSTo` varchar(30) DEFAULT NULL,
  `VietnamVet` varchar(5) DEFAULT NULL,
  `RepublicVietnam` varchar(5) DEFAULT NULL,
  `RepFrom` varchar(30) DEFAULT NULL,
  `RepTo` varchar(30) DEFAULT NULL,
  `DisabledVet` varchar(5) DEFAULT NULL,
  `DisabledPercent` int(5) DEFAULT NULL,
  `LongTermCondition` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `binfo`
--

CREATE TABLE `binfo` (
  `ApplicationID` int(11) NOT NULL,
  `LicenseNumber` int(15) DEFAULT NULL,
  `LicenseExp` varchar(20) DEFAULT NULL,
  `CdlNumber` int(15) DEFAULT NULL,
  `CdlExp` varchar(20) DEFAULT NULL,
  `OtherNumber` int(15) DEFAULT NULL,
  `OtherEXP` varchar(20) DEFAULT NULL,
  `LanguagesSpoken` varchar(200) DEFAULT NULL,
  `ConvictedFelon` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eduinfo`
--

CREATE TABLE `eduinfo` (
  `EducationID` int(11) NOT NULL,
  `ApplicationID` int(11) NOT NULL,
  `GradHS` varchar(5) NOT NULL,
  `SchoolInfo` varchar(100) DEFAULT NULL,
  `SchoolStart` varchar(10) DEFAULT NULL,
  `SchoolEnd` varchar(10) DEFAULT NULL,
  `Credits` int(10) DEFAULT NULL,
  `Major` varchar(50) DEFAULT NULL,
  `DegreeType` varchar(30) DEFAULT NULL,
  `DegreeYearRec` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `empinfo`
--

CREATE TABLE `empinfo` (
  `EmployerID` int(11) NOT NULL,
  `ApplicationID` int(11) NOT NULL,
  `PresentLastEmp` varchar(100) DEFAULT NULL,
  `EmpAddress` varchar(100) DEFAULT NULL,
  `EmpPhone` varchar(20) DEFAULT NULL,
  `EmpTitle` varchar(50) DEFAULT NULL,
  `EmpStartMY` varchar(20) DEFAULT NULL,
  `EmpEndMY` varchar(20) DEFAULT NULL,
  `EmpTotalMonths` int(5) DEFAULT NULL,
  `EmpAvgHours` int(5) DEFAULT NULL,
  `EmpLastSalary` int(10) DEFAULT NULL,
  `EmpSupervisor` varchar(50) DEFAULT NULL,
  `EmpReason` varchar(100) DEFAULT NULL,
  `EmpVolunteer` int(5) DEFAULT NULL,
  `EmpSupervised` int(5) DEFAULT NULL,
  `EmpDuties` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pinfo`
--

CREATE TABLE `pinfo` (
  `ApplicationID` int(11) NOT NULL,
  `ApplicationDate` date DEFAULT NULL,
  `Position` varchar(100) DEFAULT NULL,
  `RecruitNumber` int(25) DEFAULT NULL,
  `FirstName` varchar(40) DEFAULT NULL,
  `MiddleInitial` varchar(1) DEFAULT NULL,
  `LastName` varchar(40) DEFAULT NULL,
  `DateOfBirth` varchar(25) DEFAULT NULL,
  `MailingAddress` varchar(45) DEFAULT NULL,
  `EmailAddress` varchar(45) DEFAULT NULL,
  `HomePhone` varchar(20) DEFAULT NULL,
  `City` varchar(35) DEFAULT NULL,
  `County` varchar(35) DEFAULT NULL,
  `StateInfo` varchar(2) DEFAULT NULL,
  `ZipCode` varchar(10) DEFAULT NULL,
  `WorkPhone` varchar(21) DEFAULT NULL,
  `AlEmployee` varchar(5) DEFAULT NULL,
  `AgencyName` varchar(50) DEFAULT NULL,
  `TestAssist` varchar(5) DEFAULT NULL,
  `WillingTravel` varchar(5) DEFAULT NULL,
  `DayShift` varchar(15) NOT NULL DEFAULT 'Unavailable',
  `SwingShift` varchar(15) NOT NULL DEFAULT 'Unavailable',
  `GraveyardShift` varchar(15) NOT NULL DEFAULT 'Unavailable',
  `RotatingShift` varchar(15) NOT NULL DEFAULT 'Unavailable',
  `FullTime` varchar(15) NOT NULL DEFAULT 'Uninterested',
  `PartTime` varchar(15) NOT NULL DEFAULT 'Uninterested',
  `NonPermanent` varchar(15) NOT NULL DEFAULT 'Uninterested',
  `Seasonal` varchar(15) NOT NULL DEFAULT 'Uninterested',
  `OnCall` varchar(15) NOT NULL DEFAULT 'Uninterested'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vetinfo`
--

CREATE TABLE `vetinfo` (
  `ApplicationID` int(11) NOT NULL,
  `HonorArmed` varchar(5) DEFAULT NULL,
  `HonorFrom` varchar(30) DEFAULT NULL,
  `HonorTo` varchar(30) DEFAULT NULL,
  `DischargeType` varchar(50) DEFAULT NULL,
  `MedalsRec` varchar(100) DEFAULT NULL,
  `RetireBen` varchar(5) DEFAULT NULL,
  `SpouseDischarge` varchar(5) DEFAULT NULL,
  `SpousePercent` int(5) DEFAULT NULL,
  `SurviveSpouse` varchar(5) DEFAULT NULL,
  `SpouseMedals` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `affactinfo`
--
ALTER TABLE `affactinfo`
  ADD PRIMARY KEY (`ApplicationID`),
  ADD KEY `ApplicationID` (`ApplicationID`);

--
-- Indexes for table `binfo`
--
ALTER TABLE `binfo`
  ADD PRIMARY KEY (`ApplicationID`),
  ADD KEY `ApplicationID` (`ApplicationID`);

--
-- Indexes for table `eduinfo`
--
ALTER TABLE `eduinfo`
  ADD PRIMARY KEY (`EducationID`),
  ADD KEY `EducationID` (`EducationID`),
  ADD KEY `ApplicationID` (`ApplicationID`);

--
-- Indexes for table `empinfo`
--
ALTER TABLE `empinfo`
  ADD PRIMARY KEY (`EmployerID`),
  ADD KEY `ApplicationID` (`ApplicationID`),
  ADD KEY `EmployerID` (`EmployerID`);

--
-- Indexes for table `pinfo`
--
ALTER TABLE `pinfo`
  ADD PRIMARY KEY (`ApplicationID`),
  ADD KEY `ApplicationID` (`ApplicationID`);

--
-- Indexes for table `vetinfo`
--
ALTER TABLE `vetinfo`
  ADD PRIMARY KEY (`ApplicationID`),
  ADD KEY `ApplicationID` (`ApplicationID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eduinfo`
--
ALTER TABLE `eduinfo`
  MODIFY `EducationID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `empinfo`
--
ALTER TABLE `empinfo`
  MODIFY `EmployerID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pinfo`
--
ALTER TABLE `pinfo`
  MODIFY `ApplicationID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `binfo`
--
ALTER TABLE `binfo`
  ADD CONSTRAINT `binfo_ibfk_1` FOREIGN KEY (`ApplicationID`) REFERENCES `pinfo` (`ApplicationID`);

--
-- Constraints for table `eduinfo`
--
ALTER TABLE `eduinfo`
  ADD CONSTRAINT `eduinfo_ibfk_1` FOREIGN KEY (`ApplicationID`) REFERENCES `pinfo` (`ApplicationID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
