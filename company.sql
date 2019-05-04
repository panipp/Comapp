-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2018 at 08:06 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

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
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `proj_id` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phonenumber` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`proj_id`, `firstname`, `lastname`, `gender`, `address`, `email`, `phonenumber`) VALUES
('1', 'Panisara', 'dasd', 'Male', '', 'eimpix.ice@gmail.com', '909691165'),
('1150', 'Prapaisin', 'Mine', 'Male', '', 'veriestqwerty@gmail.com', '848792341');

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
('10001', '3159800063209', 'attitaya_ibeeaam@gmail.com', 'Thamasat', 'Atittaya', 'Junsoi', '1998-03-29', 'Female', 'เลขที่ 3656/64 อาคารกรีนทาวเวอร์ ชั้น 19 ยูนิต K ถนนพระราม 4 แขวงคลองตัน เขตคลองเตย กทม.', '0944936661', 'Unmarried', 'Central'),
('20001', '1159900258964', 'kittiphong_1995@hotmail.com', '', 'Kittiphong ', 'Jittum', '1995-07-15', 'Male', 'เลขที่ 3 อาคารรัจนาการ ชั้น 15 ถนนสาทรใต้ แขวงยานนาวา เขตสาทร', '0898079946', 'Married', 'Central'),
('30001', '1124900842129', 'trm_gust@gmail.com', '', 'Thiramate', 'Akkarachairin', '1990-04-02', 'Male', '13/1 หมู่ 2 ถนนกิ่งแก้ว ตำบลราชาเทวะ อำเภอบางพลี', '0856773797', 'Married', 'Central');

-- --------------------------------------------------------

--
-- Table structure for table `family`
--

CREATE TABLE `family` (
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `relationship` varchar(50) NOT NULL,
  `phonenumber` varchar(20) NOT NULL,
  `emp_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `family`
--

INSERT INTO `family` (`firstname`, `lastname`, `relationship`, `phonenumber`, `emp_id`) VALUES
('a', 'a', 'a', 'a', '1'),
('Tiya', 'Junsoi', 'Mother', '0898762840', '10001'),
('Kitee', 'Jittum', 'Father', '0943792671', '20001'),
('Panisara', 'Akkarachairin', 'Mother', '0896454699', '30001');

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
('10000', '10001');

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

-- --------------------------------------------------------

--
-- Table structure for table `noti`
--

CREATE TABLE `noti` (
  `emp_id` varchar(50) NOT NULL,
  `proj_id` varchar(50) NOT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `proj_id` varchar(50) NOT NULL,
  `emp_id` varchar(45) NOT NULL,
  `project_name` varchar(45) NOT NULL,
  `projectlocation` varchar(200) NOT NULL,
  `startdate` date NOT NULL,
  `finishdate` date NOT NULL,
  `time` varchar(50) NOT NULL,
  `workingarea` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
('20000', '20001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`proj_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`,`citizenID`);

--
-- Indexes for table `family`
--
ALTER TABLE `family`
  ADD PRIMARY KEY (`emp_id`);

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
-- Indexes for table `noti`
--
ALTER TABLE `noti`
  ADD PRIMARY KEY (`emp_id`,`proj_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`proj_id`,`emp_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`dep_id`,`emp_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
