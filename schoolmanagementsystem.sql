-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2025 at 09:14 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schoolmanagementsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `className` varchar(50) NOT NULL,
  `capacity` int(11) NOT NULL,
  `teacherId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `className`, `capacity`, `teacherId`) VALUES
(1, 'Year One', 30, 1),
(2, 'Year 2', 25, 2);

-- --------------------------------------------------------

--
-- Table structure for table `parents_guardians`
--

CREATE TABLE `parents_guardians` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phoneNumber` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `parents_guardians`
--

INSERT INTO `parents_guardians` (`id`, `name`, `address`, `email`, `phoneNumber`) VALUES
(1, 'James Smith', '554 Oak Heights', 'jjsmith@gmail.com', '+4454144224'),
(2, 'Jason Banks', 'Illinois', 'banksjay@yahoo.com', '+44910288322');

-- --------------------------------------------------------

--
-- Table structure for table `pupils`
--

CREATE TABLE `pupils` (
  `id` int(11) NOT NULL,
  `classId` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `medicalInfo` text DEFAULT NULL,
  `parent1Id` int(11) DEFAULT NULL,
  `parent2Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `pupils`
--

INSERT INTO `pupils` (`id`, `classId`, `name`, `address`, `medicalInfo`, `parent1Id`, `parent2Id`) VALUES
(1, 1, 'Terry Smith', '556, Oak Heights', 'Asthmatic', 1, NULL),
(3, 2, 'Vincent Barry', '3, Industrial Close', 'Nil', 1, NULL),
(4, 1, 'Steve Davis', 'Flat 2, independence Drive', 'None', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` int(11) NOT NULL,
  `teacherId` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `payDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`id`, `teacherId`, `amount`, `payDate`) VALUES
(1, 1, 50000.00, '2025-03-20');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phoneNumber` varchar(20) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `backgroundCheck` tinyint(1) DEFAULT NULL,
  `classId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `address`, `phoneNumber`, `salary`, `backgroundCheck`, `classId`) VALUES
(1, 'John Doe', '123, Brown Avenue', '+4454044314', 50000, 1, NULL),
(2, 'Daniel James', 'Block 12, Church Street', '+2348145599239', 50000, 1, NULL),
(3, 'Israel Harrington', 'Allen Avenue', '+4490134002', 50000, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `teaching_assistants`
--

CREATE TABLE `teaching_assistants` (
  `id` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `assignedClassId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `teaching_assistants`
--

INSERT INTO `teaching_assistants` (`id`, `firstName`, `lastName`, `assignedClassId`) VALUES
(1, 'Raymond', 'Hughes', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parents_guardians`
--
ALTER TABLE `parents_guardians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pupils`
--
ALTER TABLE `pupils`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classId` (`classId`),
  ADD KEY `parent1Id` (`parent1Id`),
  ADD KEY `parent2Id` (`parent2Id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacherId` (`teacherId`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teaching_assistants`
--
ALTER TABLE `teaching_assistants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assignedClassId` (`assignedClassId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `parents_guardians`
--
ALTER TABLE `parents_guardians`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pupils`
--
ALTER TABLE `pupils`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teaching_assistants`
--
ALTER TABLE `teaching_assistants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pupils`
--
ALTER TABLE `pupils`
  ADD CONSTRAINT `pupils_ibfk_1` FOREIGN KEY (`classId`) REFERENCES `classes` (`id`),
  ADD CONSTRAINT `pupils_ibfk_2` FOREIGN KEY (`parent1Id`) REFERENCES `parents_guardians` (`id`),
  ADD CONSTRAINT `pupils_ibfk_3` FOREIGN KEY (`parent2Id`) REFERENCES `parents_guardians` (`id`);

--
-- Constraints for table `salaries`
--
ALTER TABLE `salaries`
  ADD CONSTRAINT `salaries_ibfk_1` FOREIGN KEY (`teacherId`) REFERENCES `teachers` (`id`);

--
-- Constraints for table `teaching_assistants`
--
ALTER TABLE `teaching_assistants`
  ADD CONSTRAINT `teaching_assistants_ibfk_1` FOREIGN KEY (`assignedClassId`) REFERENCES `classes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
