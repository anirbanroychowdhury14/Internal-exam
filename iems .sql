-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2020 at 06:12 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iems`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `dept_year_roll`
--

CREATE TABLE `dept_year_roll` (
  `Dy_id` int(4) NOT NULL,
  `Year` varchar(4) NOT NULL,
  `Department` varchar(3) NOT NULL,
  `Sroll` int(4) NOT NULL,
  `Eroll` int(4) NOT NULL,
  `Croll` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dept_year_roll`
--

INSERT INTO `dept_year_roll` (`Dy_id`, `Year`, `Department`, `Sroll`, `Eroll`, `Croll`) VALUES
(11, '1st', 'CSE', 1101, 1160, 1101),
(12, '2nd', 'CSE', 1201, 1260, 1201),
(13, '3rd', 'CSE', 1301, 1360, 1301),
(14, '4th', 'CSE', 1401, 1471, 1401),
(21, '1st', 'EC', 2101, 2160, 2101),
(22, '2nd', 'EC', 2201, 2260, 2201),
(23, '3rd', 'EC', 2301, 2360, 2301),
(24, '4th', 'EC', 2401, 2460, 2401),
(31, '1st', 'EE', 3101, 3160, 3101),
(32, '2nd', 'EE', 3201, 3260, 3201),
(33, '3rd', 'EE', 3301, 3360, 3301),
(34, '4th', 'EE', 3401, 3460, 3401),
(41, '1st', 'IT', 4101, 4160, 4101),
(42, '2nd', 'IT', 4201, 4260, 4201),
(43, '3rd', 'IT', 4301, 4360, 4301),
(44, '4th', 'IT', 4401, 4460, 4401);

-- --------------------------------------------------------

--
-- Table structure for table `electivesub`
--

CREATE TABLE `electivesub` (
  `Subject_code` varchar(5) NOT NULL,
  `Subject_name` varchar(15) NOT NULL,
  `Semester` int(1) NOT NULL,
  `Dept` varchar(3) NOT NULL,
  `Elective_choice` int(1) NOT NULL,
  `FILL` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `electivesub`
--

INSERT INTO `electivesub` (`Subject_code`, `Subject_name`, `Semester`, `Dept`, `Elective_choice`, `FILL`) VALUES
('C801A', 'Cyber Security', 8, 'CSE', 2, 'YES'),
('C801B', 'E-Commerce', 8, 'CSE', 2, 'YES'),
('C802A', 'Cryptography', 8, 'CSE', 1, 'YES'),
('C802B', 'CA', 8, 'CSE', 1, 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `gnotice`
--

CREATE TABLE `gnotice` (
  `Gnotice_id` bigint(100) NOT NULL,
  `Gnotice_cont` varchar(500) NOT NULL,
  `Gnotice_file` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gnotice`
--

INSERT INTO `gnotice` (`Gnotice_id`, `Gnotice_cont`, `Gnotice_file`) VALUES
(3, 'A', 'Cyber7.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE `query` (
  `Query_id` bigint(100) NOT NULL,
  `Query_cont` varchar(500) NOT NULL,
  `Author` varchar(50) NOT NULL,
  `Query_reply` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `Room_no` int(5) NOT NULL,
  `Col_count` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `semester` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semester`) VALUES
('ODD');

-- --------------------------------------------------------

--
-- Table structure for table `smarks`
--

CREATE TABLE `smarks` (
  `ID` int(100) NOT NULL,
  `Roll` int(4) NOT NULL,
  `DY` int(2) NOT NULL,
  `Subject` varchar(25) NOT NULL,
  `Exam` varchar(3) NOT NULL,
  `Marks` int(3) NOT NULL,
  `Result` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `snotice`
--

CREATE TABLE `snotice` (
  `Snotice_id` bigint(100) NOT NULL,
  `Snotice_cont` varchar(300) NOT NULL,
  `Snotice_file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `username` varchar(50) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `mname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `year` varchar(5) NOT NULL,
  `dept` varchar(4) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `password` varchar(14) NOT NULL,
  `rollno` int(5) NOT NULL,
  `semester` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`username`, `fname`, `mname`, `lname`, `year`, `dept`, `phone`, `password`, `rollno`, `semester`) VALUES
('anirbanroychowdhury14@gmail.com', 'Anirban', 'Roy', 'Chowdhury', '4th', 'CSE', 8697648931, 'anirban', 1463, 7);

-- --------------------------------------------------------

--
-- Table structure for table `student_elective`
--

CREATE TABLE `student_elective` (
  `username` varchar(50) NOT NULL,
  `rollno` int(4) NOT NULL,
  `Semester` int(1) NOT NULL,
  `Dept` varchar(4) NOT NULL,
  `Subject_1` varchar(20) NOT NULL,
  `Subject_2` varchar(20) NOT NULL,
  `Subject_3` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_room`
--

CREATE TABLE `student_room` (
  `Roll` int(11) NOT NULL,
  `Room_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `Subject_code` varchar(5) NOT NULL,
  `Subject_name` varchar(15) NOT NULL,
  `DEPT` varchar(4) NOT NULL,
  `Semester` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`Subject_code`, `Subject_name`, `DEPT`, `Semester`) VALUES
('C201', 'C', 'ALL', 2),
('C401', 'Automata', 'CSE', 4),
('C802A', 'Cryptography', 'CSE', 8),
('C802B', 'Cybersecurity', 'CSE', 8);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `username` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) NOT NULL,
  `dept` varchar(3) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `password` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`username`, `fname`, `mname`, `lname`, `dept`, `phone`, `password`) VALUES
('anirbanroychowdhury14@gmail.com', 'Anirban', '', 'Roy', 'CSE', 8697648931, 'anirban');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_tag`
--

CREATE TABLE `teacher_tag` (
  `ID` bigint(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `Subject_name` varchar(15) NOT NULL,
  `Question` varchar(50) NOT NULL,
  `DY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tnotice`
--

CREATE TABLE `tnotice` (
  `Tnotice_id` bigint(100) NOT NULL,
  `Tnotice_cont` varchar(500) NOT NULL,
  `Tnotice_file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `dept_year_roll`
--
ALTER TABLE `dept_year_roll`
  ADD PRIMARY KEY (`Dy_id`);

--
-- Indexes for table `electivesub`
--
ALTER TABLE `electivesub`
  ADD PRIMARY KEY (`Subject_code`);

--
-- Indexes for table `gnotice`
--
ALTER TABLE `gnotice`
  ADD PRIMARY KEY (`Gnotice_id`);

--
-- Indexes for table `query`
--
ALTER TABLE `query`
  ADD PRIMARY KEY (`Query_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`Room_no`);

--
-- Indexes for table `smarks`
--
ALTER TABLE `smarks`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `snotice`
--
ALTER TABLE `snotice`
  ADD PRIMARY KEY (`Snotice_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `student_elective`
--
ALTER TABLE `student_elective`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `student_room`
--
ALTER TABLE `student_room`
  ADD PRIMARY KEY (`Roll`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`Subject_code`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `teacher_tag`
--
ALTER TABLE `teacher_tag`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tnotice`
--
ALTER TABLE `tnotice`
  ADD PRIMARY KEY (`Tnotice_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gnotice`
--
ALTER TABLE `gnotice`
  MODIFY `Gnotice_id` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `query`
--
ALTER TABLE `query`
  MODIFY `Query_id` bigint(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `smarks`
--
ALTER TABLE `smarks`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `snotice`
--
ALTER TABLE `snotice`
  MODIFY `Snotice_id` bigint(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher_tag`
--
ALTER TABLE `teacher_tag`
  MODIFY `ID` bigint(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tnotice`
--
ALTER TABLE `tnotice`
  MODIFY `Tnotice_id` bigint(100) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
