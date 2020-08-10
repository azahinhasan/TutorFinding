-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2020 at 06:21 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tutor.bd`
--

-- --------------------------------------------------------

--
-- Table structure for table `dbtutor`
--

CREATE TABLE `dbtutor` (
  `Name` varchar(50) DEFAULT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `SalaryStart` varchar(50) DEFAULT NULL,
  `SalaryEnd` varchar(50) DEFAULT NULL,
  `Gender` varchar(50) DEFAULT NULL,
  `InterestedLocation` varchar(50) DEFAULT NULL,
  `Class1to5` varchar(50) DEFAULT NULL,
  `Class6to8` varchar(50) DEFAULT NULL,
  `Class9to10` varchar(50) DEFAULT NULL,
  `Bangla` varchar(50) DEFAULT NULL,
  `English` varchar(50) DEFAULT NULL,
  `Chemistry` varchar(50) DEFAULT NULL,
  `Physics` varchar(50) DEFAULT NULL,
  `Math` varchar(50) DEFAULT NULL,
  `Biology` varchar(50) DEFAULT NULL,
  `UniversityName` varchar(50) DEFAULT NULL,
  `Phone` varchar(50) DEFAULT NULL,
  `ProfilePic` varchar(50) DEFAULT NULL,
  `CV` varchar(50) DEFAULT NULL,
  `Verified` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dbtutor`
--

INSERT INTO `dbtutor` (`Name`, `Address`, `Email`, `Password`, `SalaryStart`, `SalaryEnd`, `Gender`, `InterestedLocation`, `Class1to5`, `Class6to8`, `Class9to10`, `Bangla`, `English`, `Chemistry`, `Physics`, `Math`, `Biology`, `UniversityName`, `Phone`, `ProfilePic`, `CV`, `Verified`) VALUES
('a', 'a', 'a', 'a', '1', '2', 'm', '1', 'yes', 'yes', '', 'yes', NULL, NULL, 'yes', NULL, 'yes', '1112', '02', 'null', 'null', 'false'),
('Zahin Hasan', 'Mirpur', 'az11ahinhasan@gmail.com', '1', '44', '45', 'Male', NULL, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', NULL, 'aiub', '01515667288', '29872796_1524678977661132_6275167957368280647_o_2.', 'cv_template_sheet_en.pdf', 'false'),
('Zahin Hasan', 'Mirpur', 'azahi11nhasan@gmail.com', '5', '44', '44', 'Male', NULL, 'yes', NULL, NULL, 'yes', NULL, NULL, NULL, NULL, NULL, NULL, '01515667288', 'pro.jpg', 'cv_template_sheet_en.pdf', 'false'),
('Zahin Hasan', 'Choose Option', 'azahi1nhasan@gmail.com', '1111', '44', '45', 'Male', NULL, 'yes', NULL, NULL, 'yes', NULL, NULL, NULL, NULL, NULL, NULL, '01515667288', 'pro.jpg', 'OtherFiles/cv_template_sheet_en.pdf', 'false'),
('Zahin Hasan', 'Mirpur', 'azahin11hasan@gmail.com', '123', '44', '45', 'Male', NULL, 'yes', NULL, NULL, 'yes', NULL, NULL, NULL, NULL, NULL, NULL, '01515667288', 'IMG_20200727_115439.jpg', 'OtherFiles/Coffee-Shop-Management-System.docx', 'false'),
('Zahin Hasan', 'Choose Option', 'hey@gmail.com', '44', '44', '45', 'Female', NULL, 'yes', NULL, NULL, NULL, 'yes', NULL, NULL, NULL, NULL, NULL, '01515667288', '29872796_1524678977661132_6275167957368280647_o_2.', '18-36415-1 (2).docx', 'false'),
('Zahin', 'YO YO Goli', 'yo@gmail.com', '1221', '11', '12', 'Male', 'Mirpur', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', '', '', 'namNai University', '02154584854545', 'C:\\xampp\\htdocs\\Project\\ProPic\\pro.png', 'C:\\xampp\\htdocs\\Project\\ProPic\\pro.pdf', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `demologin`
--

CREATE TABLE `demologin` (
  `Email` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `demologin`
--

INSERT INTO `demologin` (`Email`, `Password`, `Type`) VALUES
('azahinhasan@gmail.com', '12', 'tutor');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Verified` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Email`, `Password`, `Type`, `Verified`) VALUES
('az11ahinhasan@gmail.com', '1', 'tutor', 'false'),
('azahi11nhasan@gmail.com', '5', 'tutor', 'false'),
('azahi1nhasan@gmail.com', '1111', 'tutor', NULL),
('azahin11hasan@gmail.com', '123', 'tutor', 'false'),
('azahinhasan@gmail.com', '12', 'tutor', 'true'),
('hey@gmail.com', '44', 'tutor', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `abc` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `picture` int(11) NOT NULL,
  `phone number` int(50) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=MRG_MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dbtutor`
--
ALTER TABLE `dbtutor`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
