-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3345
-- Generation Time: Dec 07, 2020 at 03:53 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `login` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `image` bit(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `login`, `image`) VALUES
(1, 'tony stark', 'tony@ironman.com', '1234', '0000-00-00 00:00:00.000000', b'0000000000000000000000000000000000000000000000000000000000000000');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `sid` int(11) UNSIGNED NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `branch` varchar(20) NOT NULL,
  `image` varchar(256) NOT NULL,
  `Date` date NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Login_ip` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`sid`, `Name`, `Email`, `password`, `branch`, `image`, `Date`, `last_login`, `Login_ip`) VALUES
(1, 'Saurabh wani', 'ssw@gmail.com', 'asdf', 'Computer', '', '2020-12-05', '2020-12-06 09:55:22', '::1'),
(2, 'Prasad Joshi', 'prasadjoshi9969@gmail.com', '1234', 'Computer', 'asdf', '2020-12-01', '2020-12-06 13:21:30', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stid` int(11) UNSIGNED NOT NULL,
  `prn` varchar(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Email` varchar(256) NOT NULL,
  `mobile` bigint(255) NOT NULL,
  `branch` varchar(30) NOT NULL,
  `admi_year` date NOT NULL,
  `image` varchar(256) NOT NULL,
  `take` date NOT NULL,
  `submit` date NOT NULL,
  `renew` date NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stid`, `prn`, `Name`, `Email`, `mobile`, `branch`, `admi_year`, `image`, `take`, `submit`, `renew`, `status`) VALUES
(1, '1841058', 'Saurabh wani', 'ssw@gmail.com', 7412589630, 'Computer', '2018-06-15', '', '0000-00-00', '0000-00-00', '0000-00-00', '1'),
(2, '1841023', 'Prasad Mukund Joshi', 'prasad@gmail.com', 1234567890, 'Computer', '2018-06-18', '', '0000-00-00', '0000-00-00', '0000-00-00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `student_book`
--

CREATE TABLE `student_book` (
  `sr_no` int(11) UNSIGNED NOT NULL,
  `prn` varchar(30) NOT NULL,
  `book_name` varchar(30) NOT NULL,
  `took` datetime NOT NULL,
  `returned` datetime NOT NULL,
  `renew` datetime NOT NULL,
  `book_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_book`
--

INSERT INTO `student_book` (`sr_no`, `prn`, `book_name`, `took`, `returned`, `renew`, `book_id`) VALUES
(1, '1841058', 'who am i', '2020-12-05 00:00:00', '2020-12-06 15:27:02', '2020-12-06 15:27:34', 121428),
(3, '1841058', 'saurabh wani', '2020-12-06 12:14:25', '2020-12-06 15:24:53', '2020-12-06 15:19:54', 121445),
(4, '1841058', 'Tushar sonawne', '2020-12-06 12:31:36', '2020-12-06 12:40:46', '2020-12-06 15:24:58', 153522),
(5, '1841023', 'hello world', '2020-12-06 13:13:13', '2020-12-06 13:13:21', '2020-12-06 13:13:25', 178722),
(6, '1841058', 'hi java', '2020-12-06 15:16:28', '2020-12-06 15:20:32', '0000-00-00 00:00:00', 201133),
(7, '1841058', 'asdfasdf', '2020-12-06 15:19:59', '0000-00-00 00:00:00', '2020-12-06 15:25:00', 154478),
(8, '1841058', 'lamborgini', '2020-12-06 15:27:53', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 112233);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stid`);

--
-- Indexes for table `student_book`
--
ALTER TABLE `student_book`
  ADD PRIMARY KEY (`sr_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `sid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `stid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_book`
--
ALTER TABLE `student_book`
  MODIFY `sr_no` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
