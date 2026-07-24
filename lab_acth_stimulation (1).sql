-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2021 at 06:44 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
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
-- Table structure for table `lab_acth_stimulation`
--

CREATE TABLE `lab_acth_stimulation` (
  `id` int(11) NOT NULL,
  `pname` varchar(50) DEFAULT NULL,
  `pmrn` varchar(20) DEFAULT NULL,
  `psex` varchar(20) DEFAULT NULL,
  `pphone` varchar(15) NOT NULL,
  `page` varchar(20) DEFAULT NULL,
  `uby` varchar(20) DEFAULT NULL,
  `udate` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `eid` varchar(11) DEFAULT NULL,
  `iname` varchar(50) DEFAULT NULL,
  `inid` varchar(11) DEFAULT NULL,
  `sno` varchar(11) DEFAULT NULL,
  `0min` varchar(200) DEFAULT NULL,
  `30min` varchar(200) DEFAULT NULL,
  `60min` varchar(200) DEFAULT NULL,
  `interpretation` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lab_acth_stimulation`
--

INSERT INTO `lab_acth_stimulation` (`id`, `pname`, `pmrn`, `psex`, `pphone`, `page`, `uby`, `udate`, `eid`, `iname`, `inid`, `sno`, `0min`, `30min`, `60min`, `interpretation`) VALUES
(1, 'TEST', '123456', 'male', '232323', '20', NULL, '2021-10-02 15:38:37', NULL, NULL, NULL, 'E', 'test', 'TEST', 'TEST', 'TESTTESTTESTTESTTESTTESTTESTTEST'),
(2, 'ok', '123456', 'm', '123', '12', 'lab01', '0000-00-00 00:00:00', '', '', '', 'O', '12', '13', '14', '       ok     '),
(3, 'ok', '123456', 'm', '123', '12', 'lab01', '0000-00-00 00:00:00', '', '', '', 'O', '12', '13', '14', '       ok     '),
(4, '<br /><b>Notice</b>:  Trying to access array offse', '<br /><b>Notice</b>:', '<br /><b>Notice</b>:', '<br /><b>Notice', '<br /><b>Notice</b>:', 'lab01', '0000-00-00 00:00:00', '', '', '', 'O', '12', '12', '12', '       12     '),
(5, '<br /><b>Notice</b>:  Trying to access array offse', '<br /><b>Notice</b>:', '<br /><b>Notice</b>:', '<br /><b>Notice', '<br /><b>Notice</b>:', 'lab01', '0000-00-00 00:00:00', '', '', '', 'O', '12', '12', '12', '       12     '),
(6, '<br /><b>Notice</b>:  Trying to access array offse', '<br /><b>Notice</b>:', '<br /><b>Notice</b>:', '<br /><b>Notice', '<br /><b>Notice</b>:', 'lab01', '0000-00-00 00:00:00', '', '', '', 'O', '12', '12', '12', '       12     ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lab_acth_stimulation`
--
ALTER TABLE `lab_acth_stimulation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lab_acth_stimulation`
--
ALTER TABLE `lab_acth_stimulation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
