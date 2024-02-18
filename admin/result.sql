-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2021 at 09:20 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `result`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL,
  `fullname` varchar(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `fullname`, `email`, `pass`) VALUES
(1, 'Nura Abdullahi', 'admin@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997'),
(2, 'AHMAD', 'ahmad@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `coursereg`
--

CREATE TABLE `coursereg` (
  `coursereg_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `std_id` int(20) NOT NULL,
  `score` int(20) NOT NULL,
  `admno` int(13) NOT NULL,
  `promotion` varchar(20) NOT NULL DEFAULT 'NOT PROMOTED',
  `status` varchar(20) NOT NULL DEFAULT 'NOT UPLOADED'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coursereg`
--

INSERT INTO `coursereg` (`coursereg_id`, `course_id`, `std_id`, `score`, `admno`, `promotion`, `status`) VALUES
(1, 1, 4, 65, 1510310003, 'PROMOTED', 'UPLOADED'),
(2, 2, 4, 65, 1510310003, 'PROMOTED', 'UPLOADED'),
(3, 3, 4, 0, 1510310003, 'NOT PROMOTED', 'NOT UPLOADED'),
(4, 4, 4, 0, 1510310003, 'NOT PROMOTED', 'NOT UPLOADED'),
(5, 5, 4, 0, 1510310003, 'NOT PROMOTED', 'NOT UPLOADED'),
(6, 1, 3, 67, 1210310063, 'PROMOTED', 'UPLOADED'),
(7, 2, 3, 67, 1210310063, 'PROMOTED', 'UPLOADED'),
(8, 3, 3, 0, 1210310063, 'NOT PROMOTED', 'NOT UPLOADED'),
(9, 4, 3, 0, 1210310063, 'NOT PROMOTED', 'NOT UPLOADED'),
(10, 5, 3, 0, 1210310063, 'NOT PROMOTED', 'NOT UPLOADED');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `cid` int(11) NOT NULL,
  `ccode` varchar(11) NOT NULL,
  `ctitle` varchar(66) NOT NULL,
  `level` int(20) NOT NULL,
  `dept` int(20) NOT NULL,
  `unit` int(20) NOT NULL,
  `semester` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`cid`, `ccode`, `ctitle`, `level`, `dept`, `unit`, `semester`) VALUES
(1, 'CSC 101', 'INTRODUCTION TO CMPUTER', 100, 1, 2, '2  '),
(2, 'CSC 102', 'PYTHON PROGRAMMING', 100, 1, 3, '2'),
(3, 'CSC 103', 'C  PROGRAMMING ', 100, 1, 4, '1'),
(4, 'CSC 104', 'INTRODUCTION TO COMPUTER II', 100, 1, 3, '1'),
(5, 'CSC 105', 'INTRODUCTION TO PROGRAMMING LANGUAGE', 100, 1, 2, '2'),
(6, 'CSC 201', 'JAVA PROGRAAMING I', 200, 1, 4, '2'),
(7, 'CSC 202', 'JAVA PROGRAAMING II', 200, 1, 2, '1'),
(8, 'CSC 203', 'HARD WARE MAINTAINANCE', 200, 1, 2, '1'),
(9, 'CSC 204', 'DISCRETE STRUCTURE', 200, 1, 2, '2'),
(10, 'CSC 205', 'OPERATING SYSTEM I ', 200, 1, 4, '1'),
(11, 'CSC 301', 'LOGIC CIRCUITS I', 300, 1, 2, '2'),
(12, 'CSC 302', 'OBJECT ORIENTED PRGRAMMING', 300, 1, 2, '2'),
(13, 'CSC 303', 'LOGIC CIRCUITS II ', 300, 1, 4, '1'),
(14, 'CSC 304', 'SOFTWARE ENGINEERIGN I', 300, 1, 3, '2'),
(15, 'CSC 305', 'COMPILER CONSTRUCTION I', 300, 1, 3, '2'),
(16, 'CSC 306', 'COMPUTER NETWORKS I', 300, 1, 2, '1'),
(17, 'CSC 307', 'OPERATING SYSTEM II', 300, 1, 4, '1'),
(18, 'CSC 308', 'HARD WARE MAINTAINANCE II', 300, 1, 4, '2'),
(19, 'CSC 309', 'DATABASE MANAGEMENT SYSTEM I', 300, 1, 4, '2'),
(20, 'CSC 310', 'SOFTWARE ENGINEERING II', 300, 1, 4, '2'),
(21, 'CSC 401', 'ORGANISATION OF PROGRAMMING LANGUAGES', 400, 1, 3, '2'),
(22, 'CSC 402', 'PROGRAMMING ANALYSIS', 400, 1, 4, '1'),
(23, 'CSC 403', 'SOFTWARE MAINTAINANCE', 400, 1, 2, '2'),
(24, 'CSC 404', 'SYSTEM ANALYSIS AND DESIGN', 400, 1, 2, '2'),
(25, 'CSC 405', 'ALGORITHM I', 400, 1, 4, '2'),
(26, 'CSC 406', 'COMPILER CONSTRUCTION II', 400, 1, 2, '1'),
(27, 'CSC 407', 'COMPUTER NETWORKS II', 400, 1, 3, '1'),
(28, 'CSC 408', 'DATABASE MANAGEMENT SYSTEM II', 400, 1, 4, '2'),
(29, 'CSC 409', 'WEB DEVELOPMENT', 400, 1, 2, '1'),
(30, 'CSC 410', 'SYSTEM DEVELOPMENT LIFE CYCLE', 400, 1, 4, '2'),
(31, 'CSC 411', 'ARTIFICIAL INTELLIGENCE', 400, 1, 4, '2  ');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `de_id` int(11) NOT NULL,
  `d_name` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`de_id`, `d_name`) VALUES
(1, 'Computer Science'),
(2, 'Physics');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `fullname` varchar(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  `adm_no` int(20) NOT NULL,
  `dept` int(3) NOT NULL,
  `pass` varchar(111) NOT NULL,
  `level` int(22) NOT NULL DEFAULT 100,
  `regstatus` varchar(22) NOT NULL DEFAULT 'NOT REGISTERED',
  `phone` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `fullname`, `email`, `adm_no`, `dept`, `pass`, `level`, `regstatus`, `phone`) VALUES
(1, 'Nura Abdullhi', 'ahmadsani@gmail.com', 151031001, 1, 'ae60dc72620227cc617331768a2bd99d14e171ea', 200, 'NOT REGISTERED', ''),
(2, 'MUSTAFA SANI', 'mustafasani@gmail.com', 151031002, 1, 'e3c2e775e5b980c9ed786347ae5aa1bf70edd209', 300, 'REGISTERED', ''),
(3, 'Aminu Ibrahim', 'sani@gmail.com', 1210310063, 1, '712eb7c917776d221b6205c83420374723c445e7', 100, 'REGISTERED', '09011938285'),
(4, 'Ahmad Muhammad', 'am@gmail.com', 1510310003, 1, '0f761ce4c15ce127c9e19b34444f2ae9eaaa6280', 100, 'REGISTERED', '+2349011938285');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `coursereg`
--
ALTER TABLE `coursereg`
  ADD PRIMARY KEY (`coursereg_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`de_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coursereg`
--
ALTER TABLE `coursereg`
  MODIFY `coursereg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `de_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
