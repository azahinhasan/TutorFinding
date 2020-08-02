-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2020 at 03:58 PM
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
  `ID` int(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `SalaryStart` varchar(50) NOT NULL,
  `SalaryEnd` varchar(50) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `InterestedLocation` varchar(50) NOT NULL,
  `Class1to5` varchar(50) NOT NULL,
  `Class6to8` varchar(50) NOT NULL,
  `Class9to10` varchar(50) NOT NULL,
  `Bangla` varchar(50) DEFAULT NULL,
  `English` varchar(50) DEFAULT NULL,
  `Chemistry` varchar(50) DEFAULT NULL,
  `Physics` varchar(50) DEFAULT NULL,
  `Math` varchar(50) DEFAULT NULL,
  `Biology` varchar(50) DEFAULT NULL,
  `UniversityName` varchar(50) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `ProfilePic` varchar(255) NOT NULL,
  `CV` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dbtutor`
--

INSERT INTO `dbtutor` (`ID`, `Name`, `Address`, `Email`, `Password`, `SalaryStart`, `SalaryEnd`, `Gender`, `InterestedLocation`, `Class1to5`, `Class6to8`, `Class9to10`, `Bangla`, `English`, `Chemistry`, `Physics`, `Math`, `Biology`, `UniversityName`, `Phone`, `ProfilePic`, `CV`) VALUES
(1, 'Zahin', 'YO YO Goli', 'yo@gmail.com', '1221', '11', '12', 'Male', 'Mirpur', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', '', '', 'namNai University', '02154584854545', 'C:\\xampp\\htdocs\\Project\\ProPic\\pro.png', 'C:\\xampp\\htdocs\\Project\\ProPic\\pro.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dbtutor`
--
ALTER TABLE `dbtutor`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dbtutor`
--
ALTER TABLE `dbtutor`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
