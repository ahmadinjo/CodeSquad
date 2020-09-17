-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2020 at 01:51 AM
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
  `Description` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Budget` int(11) NOT NULL,
  `Offer` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `destination`
--

INSERT INTO `destination` (`ID`, `Name`, `Description`, `City`, `Budget`, `Offer`, `image`) VALUES
(1, 'Palm Resorts', 'Nulla pretium tincidunt felis nec', 'Bali', 679, 'Special', 'destination_1.jpg'),
(2, 'Indonesia National Park', 'Nulla pretium tincidunt felis, nec', 'Indonesia', 579, 'Normal', 'destination_2.jpg'),
(3, 'The State Bridge', 'Nulla pretium tincidunt felis, nec', 'San Francisco', 399, 'Special', 'destination_3.jpg'),
(4, 'The Great Entrance Of Babel', 'Nulla pretium tincidunt felis, nec', 'Paris', 639, 'Normal', 'destination_4.jpg'),
(5, 'Phi Phi Island Resort', 'Nulla pretium tincidunt felis, nec', 'Phi Phi Island', 929, 'Special', 'destination_5.jpg'),
(6, 'Kings Platform Estate', 'Nulla pretium tincidunt felis, nec', 'Mykonos', 719, 'Normal', 'destination_6.jpg'),
(7, 'Ship Island', 'Nulla pretium tincidunt felis, nec', 'Paris', 515, 'Normal', 'destination_7.jpg'),
(8, 'Phi Phi Island Slim Bridge', 'Nulla pretium tincidunt felis, nec', 'Phi Phi Island', 879, 'Normal', 'destination_8.jpg'),
(9, 'Mykonos Snake Lake', 'Nulla pretium tincidunt felis, nec', 'Mykonos', 679, 'Normal', 'destination_9.jpg');

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
(4, 'Taofeeq', 'Mashood', 'taofeeq124', 'Taofeeq124', 'taofeeq124@gmail.com'),
(5, 'John', 'Doe', 'johndoe', 'Asdfg12345', 'johndoe@aol.com'),
(6, 'Jane', 'Doe', 'janedoe', 'Asdfg12345', 'janedoe@hotmail.com'),
(7, 'Faseeki', 'Temitope', 'faseeki1', '0Sssssss', 'faseekiswenky@gmail.com');

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
  MODIFY `ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `test_customer_info`
--
ALTER TABLE `test_customer_info`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
