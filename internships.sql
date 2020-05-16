-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2019 at 05:43 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `internships`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `name` text NOT NULL,
  `address` text NOT NULL,
  `cname` text NOT NULL,
  `cdesignation` text NOT NULL,
  `cphone` bigint(10) NOT NULL,
  `cemail` varchar(30) NOT NULL,
  `department` text NOT NULL,
  `duration` int(100) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `domain` text NOT NULL,
  `status` int(1) NOT NULL,
  `usn` text NOT NULL,
  `proof` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `facultylogin`
--

CREATE TABLE `facultylogin` (
  `fullname` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `designation` text NOT NULL,
  `fid` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facultylogin`
--

INSERT INTO `facultylogin` (`fullname`, `email`, `password`, `designation`, `fid`) VALUES
('vishakha', 'parthjswl@gmail.com', 'asdfghj', 'IC', 1234);

-- --------------------------------------------------------

--
-- Table structure for table `studentlogin`
--

CREATE TABLE `studentlogin` (
  `usn` varchar(10) NOT NULL,
  `fullname` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `semester` int(1) NOT NULL,
  `branch` text NOT NULL,
  `age` int(10) NOT NULL,
  `gender` text NOT NULL,
  `phone` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentlogin`
--

INSERT INTO `studentlogin` (`usn`, `fullname`, `email`, `password`, `semester`, `branch`, `age`, `gender`, `phone`) VALUES
('1BY16CS047', 'Md Asad Ansari', 'asad0728@yahoo.com', 'asad', 7, 'CSE', 21, 'male', 7259640214);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `studentlogin`
--
ALTER TABLE `studentlogin`
  ADD PRIMARY KEY (`usn`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
