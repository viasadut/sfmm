-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2018 at 11:52 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sfmmkpj`
--

-- --------------------------------------------------------

--
-- Table structure for table `infusion`
--

CREATE TABLE IF NOT EXISTS `infusion` (
  `id` int(255) NOT NULL,
  `dname` varchar(100) NOT NULL,
  `pmrn` varchar(100) NOT NULL,
  `eid` int(100) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `padd` varchar(100) NOT NULL,
  `page` varchar(10) NOT NULL,
  `padmission` varchar(20) NOT NULL,
  `pgender` varchar(10) NOT NULL,
  `pphone` varchar(11) NOT NULL,
  `room` varchar(20) NOT NULL,
  `bed` varchar(20) NOT NULL,
  `odate` varchar(20) NOT NULL,
  `otime` varchar(20) NOT NULL,
  `ddate` varchar(20) NOT NULL,
  `dtime` varchar(20) NOT NULL,
  `infusion` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `infusion`
--

INSERT INTO `infusion` (`id`, `dname`, `pmrn`, `eid`, `pname`, `padd`, `page`, `padmission`, `pgender`, `pphone`, `room`, `bed`, `odate`, `otime`, `ddate`, `dtime`, `infusion`) VALUES
(14, 'Dr. Ranen Biswas', '123456', 0, 'Steven Adman Dias', '44/H, Indira Road, Farmgate, Dhaka, 1215', '31', '06-19-2018 09:29:30', 'MALE', '01711206048', 'Ward2', 'w002', '2018-06-23', '8:00am', '2018-06-23', '9:00am', 'TEST REQUIRED'),
(15, 'Dr. Ranen Biswas', '123456', 0, 'Steven Adman Dias', '44/H, Indira Road, Farmgate, Dhaka, 1215', '31', '06-19-2018 09:29:30', 'MALE', '01711206048', 'Ward2', 'w002', '2018-06-23', '9:00am', '2018-06-23', '9:30am', 'yiyiuyiui');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `infusion`
--
ALTER TABLE `infusion`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `infusion`
--
ALTER TABLE `infusion`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
