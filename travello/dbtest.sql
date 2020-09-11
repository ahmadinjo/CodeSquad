-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2020 at 04:21 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtest`
--

-- --------------------------------------------------------

--
-- Table structure for table `destination`
--

CREATE TABLE `destination` (
  `ID` int(2) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `City` varchar(255) NOT NULL,
  `Budget` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `test_customer_info`
--

CREATE TABLE `test_customer_info` (
  `ID` int(4) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test_customer_info`
--

INSERT INTO `test_customer_info` (`ID`, `FirstName`, `LastName`, `Username`, `Password`, `Email`) VALUES
(1, 'Ahmad', 'Busari', 'ahmadinjo', '499172AFRica @', 'dadman4life@gmail.com'),
(2, 'Maryam', 'Busari', 'Maryet', 'Simple password = 1234', 'maryet@gmail.com'),
(3, 'Lagbaja', 'Tamedo', 'lagbaja', '1Q2W3E4R5T6Y7u8i9o0p', 'lagbajatamedo@yahoo.com'),
(5, 'Taofeeq', 'Mashood', 'taofeeq124', 'Taofeeq124', 'taofeeq124@gmail.com'),
(6, 'John', 'Doe', 'johndoe', 'Asdfg12345', 'johndoe@aol.com'),
(7, 'Jane', 'Doe', 'janedoe', 'Asdfg12345', 'janedoe@hotmail.com'),
(8, 'Faseeki', 'Temitope', 'faseeki1', '0Sssssss', 'faseekiswenky@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `destination`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `test_customer_info`
--
ALTER TABLE `test_customer_info`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `destination`
--
ALTER TABLE `destination`
  MODIFY `ID` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test_customer_info`
--
ALTER TABLE `test_customer_info`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
