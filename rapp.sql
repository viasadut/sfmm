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
-- Table structure for table `rapp`
--

CREATE TABLE IF NOT EXISTS `rapp` (
  `id` int(10) NOT NULL,
  `dname` varchar(100) NOT NULL,
  `ddate` varchar(100) NOT NULL,
  `dslot` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rapp`
--

INSERT INTO `rapp` (`id`, `dname`, `ddate`, `dslot`, `status`, `user`) VALUES
(16, 'CT SCAN', '07/22/2018', '02:00PM', 'AVAILABLE', 'rad01'),
(13, 'CT SCAN', '07/22/2018', '09:00AM', 'AVAILABLE', 'rad01'),
(14, 'CT SCAN', '07/22/2018', '11:00AM', 'AVAILABLE', 'rad01'),
(15, 'CT SCAN', '07/22/2018', '12:00PM', 'AVAILABLE', 'rad01'),
(50, 'CT SCAN', '07/23/2018', '02:00PM', 'AVAILABLE', 'rad01'),
(71, 'CT SCAN', '07/23/2018', '03:00PM', 'AVAILABLE', 'rad01'),
(72, 'CT SCAN', '07/23/2018', '04:00PM', 'AVAILABLE', 'rad01'),
(47, 'CT SCAN', '07/23/2018', '09:00AM', 'AVAILABLE', 'rad01'),
(67, 'CT SCAN', '07/23/2018', '10:00AM', 'AVAILABLE', 'rad01'),
(48, 'CT SCAN', '07/23/2018', '11:00AM', 'AVAILABLE', 'rad01'),
(49, 'CT SCAN', '07/23/2018', '12:00PM', 'AVAILABLE', 'rad01'),
(93, 'CT SCAN', '08/01/2018', '02:00PM', 'AVAILABLE', 'rad01'),
(94, 'CT SCAN', '08/01/2018', '03:00PM', 'AVAILABLE', 'rad01'),
(95, 'CT SCAN', '08/01/2018', '04:00PM', 'AVAILABLE', 'rad01'),
(89, 'CT SCAN', '08/01/2018', '09:00AM', 'Booked', 'rad01'),
(90, 'CT SCAN', '08/01/2018', '10:00AM', 'Booked', 'rad01'),
(91, 'CT SCAN', '08/01/2018', '11:00AM', 'Booked', 'rad01'),
(92, 'CT SCAN', '08/01/2018', '12:00PM', 'AVAILABLE', 'rad01'),
(100, 'CT SCAN', '08/02/2018', '02:00PM', 'AVAILABLE', 'rad01'),
(101, 'CT SCAN', '08/02/2018', '03:00PM', 'AVAILABLE', 'rad01'),
(102, 'CT SCAN', '08/02/2018', '04:00PM', 'AVAILABLE', 'rad01'),
(96, 'CT SCAN', '08/02/2018', '09:00AM', 'Booked', 'rad01'),
(97, 'CT SCAN', '08/02/2018', '10:00AM', 'Booked', 'rad01'),
(98, 'CT SCAN', '08/02/2018', '11:00AM', 'Booked', 'rad01'),
(99, 'CT SCAN', '08/02/2018', '12:00PM', 'Booked', 'rad01'),
(9, 'MRI', '07/22/2018', '1:00AM', 'Booked', 'rad01'),
(40, 'MRI', '07/23/2018', '01:00PM', 'AVAILABLE', 'rad01'),
(41, 'MRI', '07/23/2018', '02:00PM', 'AVAILABLE', 'rad01'),
(42, 'MRI', '07/23/2018', '02:30PM', 'AVAILABLE', 'rad01'),
(43, 'MRI', '07/23/2018', '03:00PM', 'AVAILABLE', 'rad01'),
(44, 'MRI', '07/23/2018', '03:30PM', 'AVAILABLE', 'rad01'),
(45, 'MRI', '07/23/2018', '04:00PM', 'AVAILABLE', 'rad01'),
(46, 'MRI', '07/23/2018', '04:30PM', 'AVAILABLE', 'rad01'),
(32, 'MRI', '07/23/2018', '09:00AM', 'AVAILABLE', 'rad01'),
(33, 'MRI', '07/23/2018', '09:30AM', 'AVAILABLE', 'rad01'),
(34, 'MRI', '07/23/2018', '10:00AM', 'AVAILABLE', 'rad01'),
(35, 'MRI', '07/23/2018', '10:30AM', 'AVAILABLE', 'rad01'),
(36, 'MRI', '07/23/2018', '11:00AM', 'AVAILABLE', 'rad01'),
(37, 'MRI', '07/23/2018', '11:30AM', 'AVAILABLE', 'rad01'),
(38, 'MRI', '07/23/2018', '12:00PM', 'AVAILABLE', 'rad01'),
(39, 'MRI', '07/23/2018', '12:30PM', 'AVAILABLE', 'rad01'),
(120, 'MRI', '08/02/2018', '01:00PM', 'AVAILABLE', 'rad01'),
(121, 'MRI', '08/02/2018', '02:00PM', 'AVAILABLE', 'rad01'),
(122, 'MRI', '08/02/2018', '02:30PM', 'AVAILABLE', 'rad01'),
(123, 'MRI', '08/02/2018', '03:00PM', 'AVAILABLE', 'rad01'),
(124, 'MRI', '08/02/2018', '03:30PM', 'AVAILABLE', 'rad01'),
(125, 'MRI', '08/02/2018', '04:00PM', 'AVAILABLE', 'rad01'),
(126, 'MRI', '08/02/2018', '04:30PM', 'AVAILABLE', 'rad01'),
(112, 'MRI', '08/02/2018', '09:00AM', 'Booked', 'rad01'),
(113, 'MRI', '08/02/2018', '09:30AM', 'AVAILABLE', 'rad01'),
(114, 'MRI', '08/02/2018', '10:00AM', 'AVAILABLE', 'rad01'),
(115, 'MRI', '08/02/2018', '10:30AM', 'AVAILABLE', 'rad01'),
(116, 'MRI', '08/02/2018', '11:00AM', 'AVAILABLE', 'rad01'),
(117, 'MRI', '08/02/2018', '11:30AM', 'AVAILABLE', 'rad01'),
(118, 'MRI', '08/02/2018', '12:00PM', 'AVAILABLE', 'rad01'),
(119, 'MRI', '08/02/2018', '12:30PM', 'AVAILABLE', 'rad01'),
(25, 'USG', '07/23/2018', '01:00PM', 'AVAILABLE', 'rad01'),
(26, 'USG', '07/23/2018', '02:00PM', 'AVAILABLE', 'rad01'),
(27, 'USG', '07/23/2018', '02:30PM', 'AVAILABLE', 'rad01'),
(28, 'USG', '07/23/2018', '03:00PM', 'AVAILABLE', 'rad01'),
(29, 'USG', '07/23/2018', '03:30PM', 'AVAILABLE', 'rad01'),
(30, 'USG', '07/23/2018', '04:00PM', 'AVAILABLE', 'rad01'),
(31, 'USG', '07/23/2018', '04:30PM', 'AVAILABLE', 'rad01'),
(17, 'USG', '07/23/2018', '09:00AM', 'AVAILABLE', 'rad01'),
(18, 'USG', '07/23/2018', '09:30AM', 'AVAILABLE', 'rad01'),
(19, 'USG', '07/23/2018', '10:00AM', 'AVAILABLE', 'rad01'),
(20, 'USG', '07/23/2018', '10:30AM', 'AVAILABLE', 'rad01'),
(21, 'USG', '07/23/2018', '11:00AM', 'AVAILABLE', 'rad01'),
(22, 'USG', '07/23/2018', '11:30AM', 'AVAILABLE', 'rad01'),
(23, 'USG', '07/23/2018', '12:00PM', 'AVAILABLE', 'rad01'),
(24, 'USG', '07/23/2018', '12:30PM', 'AVAILABLE', 'rad01'),
(82, 'USG', '08/01/2018', '01:00PM', 'AVAILABLE', 'rad01'),
(83, 'USG', '08/01/2018', '02:00PM', 'AVAILABLE', 'rad01'),
(84, 'USG', '08/01/2018', '02:30PM', 'AVAILABLE', 'rad01'),
(85, 'USG', '08/01/2018', '03:00PM', 'AVAILABLE', 'rad01'),
(86, 'USG', '08/01/2018', '03:30PM', 'AVAILABLE', 'rad01'),
(87, 'USG', '08/01/2018', '04:00PM', 'AVAILABLE', 'rad01'),
(88, 'USG', '08/01/2018', '04:30PM', 'AVAILABLE', 'rad01'),
(74, 'USG', '08/01/2018', '09:00AM', 'Booked', 'rad01'),
(75, 'USG', '08/01/2018', '09:30AM', 'Booked', 'rad01'),
(76, 'USG', '08/01/2018', '10:00AM', 'Booked', 'rad01'),
(77, 'USG', '08/01/2018', '10:30AM', 'AVAILABLE', 'rad01'),
(78, 'USG', '08/01/2018', '11:00AM', 'AVAILABLE', 'rad01'),
(79, 'USG', '08/01/2018', '11:30AM', 'AVAILABLE', 'rad01'),
(80, 'USG', '08/01/2018', '12:00PM', 'AVAILABLE', 'rad01'),
(81, 'USG', '08/01/2018', '12:30PM', 'AVAILABLE', 'rad01'),
(11, 'xray', '07/22/2018', '10:00AM', 'AVAILABLE', 'rad01'),
(73, 'xray', '08/01/2018', '10:00AM', 'Booked', 'rad01'),
(110, 'xray', '08/02/2018', '10:00AM', 'Booked', 'rad01'),
(111, 'xray', '08/02/2018', '10:15AM', 'AVAILABLE', 'rad01'),
(127, 'xray', '08/03/2018', '10:00AM', 'Booked', 'rad01'),
(128, 'xray', '08/03/2018', '10:15AM', 'AVAILABLE', 'rad01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rapp`
--
ALTER TABLE `rapp`
  ADD PRIMARY KEY (`dname`,`ddate`,`dslot`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rapp`
--
ALTER TABLE `rapp`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=129;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
