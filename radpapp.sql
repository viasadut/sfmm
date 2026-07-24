-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2018 at 07:58 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sfmmkpjnew`
--

-- --------------------------------------------------------

--
-- Table structure for table `radpapp`
--

CREATE TABLE IF NOT EXISTS `radpapp` (
  `ID` int(6) NOT NULL,
  `dname` varchar(100) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `pmrn` varchar(10) NOT NULL,
  `pphone` varchar(11) NOT NULL,
  `page` varchar(100) NOT NULL,
  `psex` varchar(10) NOT NULL,
  `padd` varchar(100) NOT NULL,
  `adate` varchar(100) NOT NULL,
  `aslot` varchar(100) NOT NULL,
  `dreffer` varchar(200) NOT NULL,
  `weight` varchar(100) NOT NULL,
  `temp` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `radpapp`
--

INSERT INTO `radpapp` (`ID`, `dname`, `pname`, `pmrn`, `pphone`, `page`, `psex`, `padd`, `adate`, `aslot`, `dreffer`, `weight`, `temp`, `status`) VALUES
(1, 'CT SCAN', 'TEST2', '111000', '8989', '98', 'MALE', 'GAZIPUR', '07/21/2018', '12:00AM', '', '', '', 'NOT SEEN'),
(2, 'xray', 'jdhjgh', '76786', '79879', '76', 'MALE', 'jhjkhj', '07/22/2018', '10:00AM', '', '', '', 'NOT SEEN'),
(3, 'MRI', 'HKHKHKh', '54654', '456547', '47457', 'MALE', 'jhjkhkhjk', '07/22/2018', '1:00AM', '', '', '', 'NOT SEEN'),
(4, 'xray', 'steven', '65656565', '9989898', '54', 'MALE', 'hjsdgjhgdh', '08/01/2018', '10:00AM', '', '', '', 'NOT SEEN'),
(5, 'CT SCAN', 'KAMAL JAMAL', '456456', '989080988', '98', 'MALE', 'JKHJHH', '08/01/2018', '09:00AM', '', '', '', 'NOT SEEN'),
(6, 'USG', 'Steven Adman Dias', '123456', '01711206048', '31', 'MALE', '44/H, Indira Road, Farmgate, Dhaka, 1215', '08/01/2018', '09:00AM', 'USG', '', '', 'NOT SEEN'),
(7, 'USG', 'Steven Adman Dias', '123456', '01711206048', '31', 'MALE', '44/H, Indira Road, Farmgate, Dhaka, 1215', '08/01/2018', '09:30AM', 'USG', '', '', 'NOT SEEN'),
(8, 'CT SCAN', 'Steven Adman Dias', '123456', '01711206048', '31', 'MALE', '44/H, Indira Road, Farmgate, Dhaka, 1215', '08/01/2018', '10:00AM', 'CT SCAN', '', '', 'NOT SEEN'),
(9, 'CT SCAN', 'Steven Adman Dias', '123456', '01711206048', '31', 'MALE', '44/H, Indira Road, Farmgate, Dhaka, 1215', '08/01/2018', '11:00AM', 'Dr. Razeeb Hassan', '', '', 'NOT SEEN'),
(10, 'USG', 'Steven Adman Dias', '123456', '01711206048', '31', 'MALE', '44/H, Indira Road, Farmgate, Dhaka, 1215', '08/01/2018', '10:00AM', 'Dr. Razeeb Hassan', '', '', 'NOT SEEN'),
(11, 'CT SCAN', 'KAMAL JAMAL', '456456', '989080988', '98', 'MALE', 'JKHJHH', '08/02/2018', '09:00AM', 'Dr. Ranen Biswas', '', '', 'SEEN'),
(12, 'CT SCAN', 'Masum Billah', '339977', '0172087907', '34', 'MALE', 'Gazipur', '08/02/2018', '10:00AM', 'Dr. Razeeb Hassan', '', '', 'SEEN'),
(13, 'CT SCAN', 'Nuradilah Shuib', '16682', '01711206048', '35', 'FEMALE', 'Gazipur', '08/02/2018', '11:00AM', '', '', '', 'SEEN'),
(14, 'CT SCAN', 'Nuradilah Shuib', '16682', '01711206048', '35', 'FEMALE', 'Gazipur', '08/02/2018', '12:00PM', 'Outside Refferal', '', '', 'SEEN'),
(15, 'xray', 'KAMAL JAMAL', '456456', '989080988', '98', 'MALE', 'JKHJHH', '08/02/2018', '10:00AM', 'Dr. Razeeb Hassan', '', '', 'SEEN'),
(16, 'MRI', 'Steven Adman Dias', '123456', '01711206048', '31', 'MALE', '44/H, Indira Road, Farmgate, Dhaka, 1215', '08/02/2018', '09:00AM', 'Dr. Ranen Biswas', '', '', 'SEEN'),
(17, 'xray', 'Steven Adman Dias', '123456', '01711206048', '31', 'MALE', '44/H, Indira Road, Farmgate, Dhaka, 1215', '08/03/2018', '10:00AM', 'Dr. Razeeb Hassan', '', '', 'SEEN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `radpapp`
--
ALTER TABLE `radpapp`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `radpapp`
--
ALTER TABLE `radpapp`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
