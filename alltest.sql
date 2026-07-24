-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2018 at 06:57 AM
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
-- Table structure for table `alltest`
--

CREATE TABLE IF NOT EXISTS `alltest` (
  `id` int(20) NOT NULL,
  `eid` int(6) NOT NULL,
  `dname` varchar(200) NOT NULL,
  `pmrn` int(10) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `medi` varchar(500) NOT NULL,
  `pdos` varchar(500) NOT NULL,
  `ins` varchar(500) NOT NULL,
  `date` varchar(20) NOT NULL,
  `status` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=135 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alltest`
--

INSERT INTO `alltest` (`id`, `eid`, `dname`, `pmrn`, `pname`, `medi`, `pdos`, `ins`, `date`, `status`, `type`) VALUES
(56, 0, 'Dr. Razeeb Hassan', 654321, '', 'ANKLE AP- LEFT (X-RAY)', '', 'hdgf', '07/24/2018', '', 'rad'),
(57, 0, 'Dr. Razeeb Hassan', 654321, '', 'ANKLE MORTISE VIEW - RIGHT(X-RAY)', '', 'hjkhh', '07/24/2018', '', 'rad'),
(59, 3, 'Dr. Razeeb Hassan', 109399, '', 'ANKLE AP- LEFT (X-RAY)', '', 'jhjk', '07/24/2018', '', 'rad'),
(60, 3, 'Dr. Razeeb Hassan', 109399, '', 'CLAVICLE WITH AC JOINTS- BILATERAL (X-RAY)', '', 'jhj', '07/24/2018', '', 'rad'),
(62, 2, 'Dr. Razeeb Hassan', 109794, 'SHURAIYA', 'CBC and ESR', '', 'hdsgf', '07/24/2018', '', ''),
(63, 2, 'Dr. Razeeb Hassan', 109794, 'SHURAIYA', 'BMD RADIUS ULNA', '', 'fdgfdg', '07/24/2018', '', 'rad'),
(64, 2, 'Dr. Razeeb Hassan', 109794, 'SHURAIYA', 'ABDOMEN DECUBITUS RIGHT(X-RAY)', '', 'dfgfdfd fdjgfhd hj fgh fdghfd h', '07/25/2018', '', 'rad'),
(65, 2, 'Dr. Razeeb Hassan', 109794, 'SHURAIYA', 'ABDOMEN ERECT- AP (X-RAY)', '', 'jdhsjkfh', '07/25/2018', '', 'rad'),
(66, 2, 'Dr. Razeeb Hassan', 109794, 'SHURAIYA', 'ANKLE MORTISE VIEW - RIGHT(X-RAY)', '', 'oioio', '07/25/2018', '', 'rad'),
(67, 3, 'Dr. Razeeb Hassan', 109794, 'SHURAIYA', 'ANKLE AP- LEFT (X-RAY)', '', 'hghjgg', '07/27/2018', '', 'rad'),
(68, 3, 'Dr. Razeeb Hassan', 109794, 'SHURAIYA', 'ANKLE OBLIQUE- LEFT(X-RAY)', '', 'jhhjh', '07/27/2018', '', 'rad'),
(69, 3, 'Dr. Razeeb Hassan', 109794, 'SHURAIYA', 'DORSAL (THORACIC) SPINE- LATERAL (X-RAY)', '213214', 'jfdhgf', '07/27/2018', '', 'rad'),
(70, 5, 'Dr. Razeeb Hassan', 109794, 'SHURAIYA', 'ABDOMEN DECUBITUS LEFT(X-RAY)', '', 'hjghjg', '07/28/2018', '', 'rad'),
(72, 4, 'Dr. Razeeb Hassan', 123456, 'Steven Adman Dias', 'ABDOMEN DECUBITUS LEFT(X-RAY)', '', 'jhjhk', '07/29/2018', '', 'rad'),
(73, 4, 'Dr. Razeeb Hassan', 123456, 'Steven Adman Dias', 'endoscopy', '', 'jkhkj', '07/29/2018', '', 'endo'),
(80, 3, 'Dr. Razeeb Hassan', 654321, 'STEVE', 'cbc with esr', '', 'hjghjg', '07/29/2018', '', 'lab'),
(81, 3, 'Dr. Razeeb Hassan', 654321, 'STEVE', 'ABDOMEN ERECT- AP (X-RAY)', '', 'hgj', '07/29/2018', '', 'rad'),
(82, 1, 'Dr. Razeeb Hassan', 0, 'KJKLJLKJJKJ', 'ABDOMEN ERECT- AP (X-RAY)', '', 'jkjk', '07/29/2018', '', 'rad'),
(83, 1, 'Dr. Razeeb Hassan', 0, 'KJKLJLKJJKJ', 'ABDOMEN KUB (X-RAY)', '', 'khkjhjkhj', '07/29/2018', '', 'rad'),
(84, 1, 'Dr. Razeeb Hassan', 565656, 'JEFRREY', 'ABDOMEN ERECT- AP (X-RAY)', '', 'jkhjkhkjh', '07/29/2018', '', 'rad'),
(85, 1, 'Dr. Razeeb Hassan', 565656, 'JEFRREY', 'cbc with esr', '', 'hghg', '07/29/2018', '', 'lab'),
(88, 2, 'Dr. Razeeb Hassan', 565656, 'JEFRREY', 'ABDOMEN ERECT- AP (X-RAY)', '', 'dfhdjhsfksdhkjh', '07/30/2018', '', 'rad'),
(89, 2, 'Dr. Razeeb Hassan', 565656, 'JEFRREY', 'USG OF NECK', '', 'jhjh', '07/30/2018', '', 'rad'),
(90, 3, 'Dr. Ranen Biswas', 565656, 'JEFRREY', 'ANKLE MORTISE VIEW- LEFT(X-RAY)', '', 'dfhdjhsfksdhkjh', '07/30/2018', '', 'rad'),
(91, 4, 'Dr. Razeeb Hassan', 565656, 'JEFRREY', 'CT SCAN BOTH HIPS', '', 'hjghjghj', '07/30/2018', '', 'rad'),
(92, 5, 'Dr. Razeeb Hassan', 123456, 'Steven Adman Dias', 'ANKLE MORTISE VIEW- LEFT(X-RAY)', '', 'dgjflkd', '07/31/2018', '', 'rad'),
(93, 5, 'Dr. Razeeb Hassan', 123456, 'Steven Adman Dias', 'ANKLE OBLIQUE- LEFT(X-RAY)', '', 'jdjfgdjhgjfd', '07/31/2018', '', 'rad'),
(94, 5, 'Dr. Razeeb Hassan', 123456, 'Steven Adman Dias', 'ABDOMEN ERECT- AP (X-RAY)', '', 'jsdhjkfkds', '07/31/2018', '', 'rad'),
(95, 6, 'Dr. Razeeb Hassan', 123456, 'Steven Adman Dias', 'CT SCAN BOTH HIPS', '', 'hjghj', '07/31/2018', '', 'rad'),
(96, 6, 'Dr. Razeeb Hassan', 123456, 'Steven Adman Dias', 'MRI LIVER', '', 'hghjgh', '07/31/2018', '', 'rad'),
(97, 4, 'Dr. Razeeb Hassan', 654321, 'STEVE', 'ABDOMEN SUPINE- AP (X-RAY)', '', 'ipoipo', '07/31/2018', '', 'rad'),
(100, 5, 'Dr. Razeeb Hassan', 654321, 'STEVE', 'CBC and ESR', '', 'jjh', '07/31/2018', '', 'lab'),
(101, 5, 'Dr. Razeeb Hassan', 654321, 'STEVE', 'Plasma Glucose 2 hrs after 75 gram glucose ', '', 'hjgjhg', '07/31/2018', '', 'lab'),
(102, 8, 'Dr. Razeeb Hassan', 123456, 'Steven Adman Dias', 'Urinary Uric acid', '', 'hbb', '07/31/2018', '', 'lab'),
(103, 1, 'Dr. Razeeb Hassan', 456456, 'KAMAL JAMAL', 'ABDOMEN KUB (X-RAY)', '', 'hjgjh', '08/01/2018', '', 'rad'),
(104, 2, 'Dr. Razeeb Hassan', 456456, 'KAMAL JAMAL', 'CBC and ESR', '', 'hghjg', '08/01/2018', '', 'lab'),
(105, 2, 'Dr. Razeeb Hassan', 456456, 'KAMAL JAMAL', 'Urine for CS', '', 'hghjg', '08/01/2018', '', 'lab'),
(106, 3, 'Dr. Ranen Biswas', 456456, 'KAMAL JAMAL', 'CT SCAN BOTH HIPS', '', 'hjgh', '08/01/2018', '', 'rad'),
(107, 3, 'Dr. Ranen Biswas', 456456, 'KAMAL JAMAL', 'MRI BRAIN', '', 'hjghjgsf', '08/01/2018', '', 'rad'),
(108, 10, 'Dr. Razeeb Hassan', 123456, 'Steven Adman Dias', 'MRI BRAIN', '', 'hhghg', '08/01/2018', '', 'rad'),
(109, 10, 'Dr. Razeeb Hassan', 123456, 'Steven Adman Dias', 'RIGHT HAND AP & OBLIQUE (XRAY)', '', 'gfhgfhg', '08/01/2018', '', 'rad'),
(110, 10, 'Dr. Razeeb Hassan', 123456, 'Steven Adman Dias', 'Lactate dehydrogenase(LDH)', '', 'gfhgf', '08/01/2018', '', 'lab'),
(111, 11, 'Dr. Razeeb Hassan', 123456, 'Steven Adman Dias', 'USG OF PORTABLE ULTRASOUND', '', 'fg', '08/01/2018', '', 'rad'),
(112, 12, 'Dr. Razeeb Hassan', 123456, 'Steven Adman Dias', 'MASTOID BONE- LEFT (X-RAY)', '', 'jhj', '08/01/2018', '', 'rad'),
(113, 12, 'Dr. Razeeb Hassan', 123456, 'Steven Adman Dias', 'CBC and ESR', '', 'hggghj', '08/01/2018', '', 'lab'),
(114, 12, 'Dr. Razeeb Hassan', 123456, 'Steven Adman Dias', 'S creatinine', '', 'h', '08/01/2018', '', 'lab'),
(115, 12, 'Dr. Razeeb Hassan', 123456, 'Steven Adman Dias', 'ANKLE LATERAL-RIGHT(X-RAY)', '', 'jhjk', '08/01/2018', '', 'rad'),
(116, 12, 'Dr. Razeeb Hassan', 123456, 'Steven Adman Dias', 'ANKLE- BOTH- AP & LAT(X-RAY)', '', 'cd', '08/01/2018', '', 'rad'),
(117, 12, 'Dr. Razeeb Hassan', 123456, 'Steven Adman Dias', 'ANKLE RIGHT AP & LAT (X-RAY)', '', 'retrt', '08/01/2018', '', 'rad'),
(118, 12, 'Dr. Razeeb Hassan', 123456, 'Steven Adman Dias', 'CALCANEUS LATERAL & AXIAL (LEFT)(X-RAY)', '', 'dfgfdh', '08/01/2018', '', 'rad'),
(119, 12, 'Dr. Razeeb Hassan', 123456, 'Steven Adman Dias', 'ANKLE- RIGHT- AP, LAT & OBL (X-RAY)', '', 'dfgdfg', '08/01/2018', '', 'rad'),
(120, 12, 'Dr. Razeeb Hassan', 123456, 'Steven Adman Dias', 'ABDOMEN KUB (X-RAY)', '', 'sdgg', '08/01/2018', '', 'rad'),
(121, 12, 'Dr. Razeeb Hassan', 123456, 'Steven Adman Dias', 'ANKLE- LEFT-AP,LAT&OBL(X-RAY)', '', 'hgfhg', '08/01/2018', '', 'rad'),
(122, 6, 'Dr. Razeeb Hassan', 654321, 'STEVE', 'CBC and ESR', '', 'hgjgh', '08/01/2018', '', 'lab'),
(123, 6, 'Dr. Razeeb Hassan', 654321, 'STEVE', 'Lactate dehydrogenase(LDH)', '', 'hjgdf', '08/01/2018', '', 'lab'),
(124, 6, 'Dr. Razeeb Hassan', 654321, 'STEVE', 'Peritoneal fluid for CS', '', 'ghdsvhf', '08/01/2018', '', 'lab'),
(125, 1, 'Dr. Razeeb Hassan', 339977, 'Masum Billah', 'CT SCAN RIGHT LEG', '', 'jkhkjh', '08/02/2018', '', 'rad'),
(126, 1, 'Dr. Razeeb Hassan', 339977, 'Masum Billah', 'MRI HIPS', '', 'hjghjgh', '08/02/2018', '', 'rad'),
(127, 4, 'Dr. Razeeb Hassan', 456456, 'KAMAL JAMAL', 'RIGHT HAND AP & OBLIQUE (XRAY)', '', 'sjjds', '08/02/2018', '', 'rad'),
(128, 13, 'Dr. Ranen Biswas', 123456, 'Steven Adman Dias', 'CT SCAN RIGHT HIP', '', 'sadashgdsaghdd', '08/02/2018', '', 'rad'),
(129, 13, 'Dr. Ranen Biswas', 123456, 'Steven Adman Dias', 'MRI BRAIN', '', 'hsdgfgdsgfg', '08/02/2018', '', 'rad'),
(130, 13, 'Dr. Ranen Biswas', 123456, 'Steven Adman Dias', 'CBC and ESR', '', 'hgsdgdhsf', '08/02/2018', '', 'lab'),
(131, 2, 'Dr. Ranen Biswas', 339977, 'Masum Billah', 'HAND- LEFT- OBLIQUE (X-RAY)', '', 'sadh', '08/02/2018', '', 'rad'),
(132, 2, 'Dr. Ranen Biswas', 339977, 'Masum Billah', 'ANKLE AP- LEFT (X-RAY)', '', 'fhdgfd', '08/02/2018', '', 'rad'),
(133, 14, 'Dr. Razeeb Hassan', 123456, 'Steven Adman Dias', 'CBC and ESR', '', 'dhsgfjhdsf', '08/03/2018', '', 'lab'),
(134, 14, 'Dr. Razeeb Hassan', 123456, 'Steven Adman Dias', 'Uiroflowmertry', '', 'dhjghf', '08/03/2018', '', 'lab');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alltest`
--
ALTER TABLE `alltest`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alltest`
--
ALTER TABLE `alltest`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=135;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
