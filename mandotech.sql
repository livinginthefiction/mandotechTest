-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2021 at 11:00 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mandotech`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fullName` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fullName`, `username`, `password`) VALUES
(1, 'Shubham Narvekar', 'shubham', '3b6beb51e76816e632a40d440eab0097');

-- --------------------------------------------------------

--
-- Table structure for table `deducts`
--

CREATE TABLE `deducts` (
  `id` int(11) NOT NULL,
  `salaryId` int(11) NOT NULL,
  `deductions` text NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `creationTime` datetime NOT NULL DEFAULT current_timestamp(),
  `creator` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0=disabled 1=enabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deducts`
--

INSERT INTO `deducts` (`id`, `salaryId`, `deductions`, `amount`, `creationTime`, `creator`, `status`) VALUES
(1, 1, 'test 1', '50.00', '2021-10-07 01:25:11', 1, '0'),
(2, 1, 'test 2', '10.00', '2021-10-07 01:25:36', 1, '1'),
(3, 3, 'ss', '10.00', '2021-10-07 02:35:38', 0, '1'),
(4, 3, 'ss', '5.00', '2021-10-07 02:35:53', 0, '1'),
(5, 2, 'test', '10.00', '2021-10-09 02:12:29', 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `jobTitle` varchar(30) NOT NULL,
  `joiningDate` date NOT NULL,
  `creationTime` datetime NOT NULL DEFAULT current_timestamp(),
  `creator` int(11) NOT NULL,
  `lastUpdated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updatedBy` int(11) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1' COMMENT '1=active 0=disable'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `dob`, `jobTitle`, `joiningDate`, `creationTime`, `creator`, `lastUpdated`, `updatedBy`, `status`) VALUES
(1, 'Abdul Hussein', '1995-05-04', 'Developer', '2021-10-05', '2021-10-06 19:43:43', 1, '2021-10-07 00:05:47', 1, '1'),
(2, 'Burhan al-Din', '1990-05-04', 'HR', '2011-10-05', '2021-10-06 19:46:27', 1, '2021-10-09 02:09:42', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `employeesalary`
--

CREATE TABLE `employeesalary` (
  `id` int(11) NOT NULL,
  `employeeId` int(11) NOT NULL,
  `employeeSalary` decimal(10,2) NOT NULL,
  `creationTime` datetime NOT NULL DEFAULT current_timestamp(),
  `creator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employeesalary`
--

INSERT INTO `employeesalary` (`id`, `employeeId`, `employeeSalary`, `creationTime`, `creator`) VALUES
(1, 1, '5000.00', '2021-10-06 19:50:58', 1),
(2, 2, '6000.00', '2021-10-06 19:50:58', 1);

-- --------------------------------------------------------

--
-- Table structure for table `salarylog`
--

CREATE TABLE `salarylog` (
  `id` int(11) NOT NULL,
  `employeeId` int(11) NOT NULL,
  `salaryAmount` decimal(10,2) NOT NULL,
  `salaryDate` date NOT NULL,
  `creationTime` datetime NOT NULL DEFAULT current_timestamp(),
  `creator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salarylog`
--

INSERT INTO `salarylog` (`id`, `employeeId`, `salaryAmount`, `salaryDate`, `creationTime`, `creator`) VALUES
(1, 1, '5000.00', '2020-10-07', '2021-10-07 01:09:56', 1),
(2, 2, '6000.00', '2021-09-07', '2021-10-07 01:09:56', 1),
(3, 1, '5000.00', '2021-10-06', '2021-10-07 02:35:16', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deducts`
--
ALTER TABLE `deducts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employeesalary`
--
ALTER TABLE `employeesalary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salarylog`
--
ALTER TABLE `salarylog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deducts`
--
ALTER TABLE `deducts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employeesalary`
--
ALTER TABLE `employeesalary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `salarylog`
--
ALTER TABLE `salarylog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
