-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 05, 2019 at 11:19 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `company`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` varchar(50) NOT NULL,
  `citizenID` varchar(50) CHARACTER SET latin1 NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `graduate` varchar(100) CHARACTER SET latin1 NOT NULL,
  `firstname` varchar(50) CHARACTER SET latin1 NOT NULL,
  `lastname` varchar(50) CHARACTER SET latin1 NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(10) CHARACTER SET latin1 NOT NULL,
  `address` varchar(200) NOT NULL,
  `phonenumber` varchar(20) CHARACTER SET latin1 NOT NULL,
  `maritalstatus` varchar(45) NOT NULL,
  `workingarea` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `citizenID`, `email`, `graduate`, `firstname`, `lastname`, `birthday`, `gender`, `address`, `phonenumber`, `maritalstatus`, `workingarea`) VALUES
('10001', '3159800063209', 'attitaya_ibeeaam@gmail.com', 'Thamasat', 'Atittaya', 'Junsoi', '1998-03-29', 'Male', '', '0944936661', 'Married', 'Central'),
('10002', '1234567890123', '', 'TU', 'baewjai', 'pinkblossom', '1998-01-04', 'Male', '', '', 'Unmarried', 'Northern'),
('20001', '1159900258964', 'kittiphong_1995@hotmail.com', '', 'Kittiphong', 'Jittum', '1995-07-15', 'Male', '', '0898079946', 'Married', 'Central'),
('20002', '1103702596795', '', 'TU', 'pani', 'pnsr', '1998-05-26', 'Male', '', '', 'Married', 'Central'),
('30001', '1124900842129', 'trm_gust@gmail.com', '', 'Thiramate', 'Akkarachairin', '1990-04-02', 'Male', '13/1 หมู่ 2 ถนนกิ่งแก้ว ตำบลราชาเทวะ อำเภอบางพลี', '0856773797', 'Married', 'Central');

-- --------------------------------------------------------

--
-- Table structure for table `hr`
--

CREATE TABLE `hr` (
  `dep_id` varchar(50) NOT NULL,
  `emp_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hr`
--

INSERT INTO `hr` (`dep_id`, `emp_id`) VALUES
('10000', '10001'),
('10000', '10002');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `dep_id` varchar(50) NOT NULL,
  `emp_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`dep_id`, `emp_id`) VALUES
('30000', '30001');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `topic` varchar(45) NOT NULL,
  `detail` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`topic`, `detail`) VALUES
('', ''),
('test', 'hbkubki'),
('test2', 'pidfjs0'),
('test3', 'xsss');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `dep_id` varchar(50) NOT NULL,
  `emp_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`dep_id`, `emp_id`) VALUES
('20000', '20001'),
('20000', '20002'),
('20000', '4'),
('20000', 'eID');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`,`citizenID`);

--
-- Indexes for table `hr`
--
ALTER TABLE `hr`
  ADD PRIMARY KEY (`dep_id`,`emp_id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`dep_id`,`emp_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`topic`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`dep_id`,`emp_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
