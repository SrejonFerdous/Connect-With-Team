-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2024 at 05:30 PM
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
-- Database: `original`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(15) NOT NULL,
  `name` varchar(255) NOT NULL,
  `Phone` int(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` varchar(15) DEFAULT NULL,
  `password` varchar(75) NOT NULL,
  `dp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `Phone`, `email`, `gender`, `dob`, `password`, `dp`) VALUES
(12, 'admin1', 0, 'admin1@admin.com', 'Male', '1998-02-02', '1234', ''),
(13, 'Srejon Another', 99876876, 'srejon@another.com', 'Male', '2024-01-24', '1234', '');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `ID` int(5) NOT NULL,
  `Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`ID`, `Name`) VALUES
(1, 'Marketing'),
(2, 'Finance'),
(3, 'IT'),
(4, 'Human Resource'),
(5, 'Security');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(15) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Phone` int(15) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `password` varchar(75) NOT NULL,
  `salary` int(10) NOT NULL,
  `Department` varchar(50) NOT NULL,
  `Role` varchar(20) NOT NULL,
  `Expertise` varchar(20) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Joining` date DEFAULT NULL,
  `dp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `email`, `Phone`, `gender`, `dob`, `password`, `salary`, `Department`, `Role`, `Expertise`, `Address`, `Joining`, `dp`) VALUES
(13, 'EMP1', 'sprince75@yahoo.com', 234678, 'Male', '2024-01-24', '', 50000, 'Human Reso', 'Director', '', '', NULL, '60df10fa13c124.43381995marco-mons-ROWNIiEV9iM-unsplash.jpg'),
(14, 'emp2', 'emp2@emp.com', 0, 'Female', '1998-07-09', '1234', 3432423, '', '', '', '', NULL, '60df15c11c4505.59875888marco-mons-ROWNIiEV9iM-unsplash.png'),
(17, 'Srejon', 'srejon@gmail.com', 1989767878, 'Male', '2024-01-24', '1234', 10000000, 'IT', 'Manager', 'Nothing', '', '2024-01-24', '');

-- --------------------------------------------------------

--
-- Table structure for table `emp_leave`
--

CREATE TABLE `emp_leave` (
  `id` int(11) NOT NULL,
  `reason` varchar(500) NOT NULL,
  `start_date` varchar(24) NOT NULL,
  `last_date` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emp_leave`
--

INSERT INTO `emp_leave` (`id`, `reason`, `start_date`, `last_date`, `email`, `status`) VALUES
(9, 'I got sick', '2021-07-28', '2021-07-30', 'test@gmail.com', 'Canceled'),
(15, ' drnrdng', '2021-07-09', '2021-07-11', 'emp1@emp.com', 'Accepted'),
(16, ' drnrdng', '2021-07-14', '2021-07-25', 'emp1@emp.com', 'Canceled'),
(17, ' drnrdng', '2021-07-16', '2021-07-25', 'emp1@emp.com', 'pending'),
(20, ' dcw', '2021-07-10', '2021-07-11', 'emp3@emp.com', 'Accepted'),
(21, ' efwe', '2021-07-23', '2021-07-25', 'emp3@emp.com', 'Canceled'),
(22, ' ewfew', '2021-07-24', '2021-07-18', 'emp3@emp.com', 'Accepted'),
(23, ' drnrdng', '2021-07-01', '2021-07-02', 'emp3@emp.com', 'Canceled'),
(24, ' i got sick', '2021-07-03', '2021-07-06', 'test@gmail.com', 'Accepted'),
(25, ' i got sick', '2021-07-04', '2021-07-07', 'test@gmail.com', 'Canceled'),
(26, ' drnrdng', '2021-07-04', '2021-07-07', 'test@gmail.com', 'Accepted'),
(27, ' Mon chaise', '2024-01-23', '2024-01-26', 'emp1@emp.com', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `SalaryID` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `SalaryAmount` int(11) DEFAULT NULL,
  `From_Date` datetime NOT NULL,
  `To_Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_leave`
--
ALTER TABLE `emp_leave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`SalaryID`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `emp_leave`
--
ALTER TABLE `emp_leave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `SalaryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `salary_ibfk_1` FOREIGN KEY (`id`) REFERENCES `employee` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
