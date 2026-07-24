-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2018 at 04:44 AM
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
-- Table structure for table `bed`
--

CREATE TABLE IF NOT EXISTS `bed` (
  `id` int(10) NOT NULL,
  `category` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `bno` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `pmrn` varchar(100) NOT NULL,
  `adate` varchar(100) NOT NULL,
  `dname` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bed`
--

INSERT INTO `bed` (`id`, `category`, `type`, `bno`, `status`, `pname`, `pmrn`, `adate`, `dname`) VALUES
(1, '2 Beded', 'Ward1', 'w001', 'Occupied', 'SUCCESS', '334567', '2018-05-29 16:06:37', 'Dr. Rajeeb Hassan'),
(2, '2 Beded', 'Ward2', 'w002', 'Occupied', 'Jamal Uddin', '234567', '05/29/2018', 'Dr. J.M.Q. Quaser Alam'),
(3, '2 Beded', 'Ward1', 'ICU01', 'vacant', '', '', '', ''),
(4, '4 Beded', 'Ward3', 'CCU01', 'vacant', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `bedt`
--

CREATE TABLE IF NOT EXISTS `bedt` (
  `id` int(10) NOT NULL,
  `category` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `bno` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `pmrn` varchar(100) NOT NULL,
  `adate` varchar(100) NOT NULL,
  `dname` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bedt`
--

INSERT INTO `bedt` (`id`, `category`, `type`, `bno`, `status`, `pname`, `pmrn`, `adate`, `dname`) VALUES
(1, '2 Beded', 'Ward1', 'w001', 'vacant', '', '', '', ''),
(2, '2 Beded', 'Ward2', 'w002', 'Occupied', 'Steven Adman Dias', '1234', '05/30/2018', 'steven');

-- --------------------------------------------------------

--
-- Table structure for table `dapp`
--

CREATE TABLE IF NOT EXISTS `dapp` (
  `id` int(6) NOT NULL,
  `dname` varchar(100) NOT NULL,
  `ddate` varchar(100) NOT NULL,
  `s1` varchar(100) NOT NULL,
  `s2` varchar(100) NOT NULL,
  `s3` varchar(100) NOT NULL,
  `s4` varchar(100) NOT NULL,
  `s5` varchar(100) NOT NULL,
  `s6` varchar(100) NOT NULL,
  `s7` varchar(100) NOT NULL,
  `s8` varchar(100) NOT NULL,
  `s9` varchar(100) NOT NULL,
  `s10` varchar(100) NOT NULL,
  `s11` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `discharge`
--

CREATE TABLE IF NOT EXISTS `discharge` (
  `id` int(20) NOT NULL,
  `eid` int(6) NOT NULL,
  `dname` varchar(100) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `padd` varchar(200) NOT NULL,
  `page` int(3) NOT NULL,
  `psex` varchar(10) NOT NULL,
  `pmrn` int(20) NOT NULL,
  `pphone` varchar(100) NOT NULL,
  `pheight` varchar(20) NOT NULL,
  `pweight` varchar(20) NOT NULL,
  `ptemp` varchar(20) NOT NULL,
  `cdetails` varchar(1000) NOT NULL,
  `diagnosis` varchar(1000) NOT NULL,
  `xl` varchar(500) NOT NULL,
  `m1` varchar(200) NOT NULL,
  `m2` varchar(200) NOT NULL,
  `m3` varchar(500) NOT NULL,
  `m4` varchar(500) NOT NULL,
  `m5` varchar(500) NOT NULL,
  `m6` varchar(500) NOT NULL,
  `m7` varchar(500) NOT NULL,
  `m8` varchar(500) NOT NULL,
  `m9` varchar(500) NOT NULL,
  `m10` varchar(500) NOT NULL,
  `m11` varchar(500) NOT NULL,
  `m12` varchar(500) NOT NULL,
  `m13` varchar(500) NOT NULL,
  `m14` varchar(500) NOT NULL,
  `m15` varchar(500) NOT NULL,
  `m16` varchar(500) NOT NULL,
  `m17` varchar(500) NOT NULL,
  `m18` varchar(500) NOT NULL,
  `m19` varchar(500) NOT NULL,
  `m20` varchar(500) NOT NULL,
  `d1` varchar(500) NOT NULL,
  `d2` varchar(500) NOT NULL,
  `d3` varchar(500) NOT NULL,
  `d4` varchar(500) NOT NULL,
  `d5` varchar(500) NOT NULL,
  `d6` varchar(500) NOT NULL,
  `d7` varchar(500) NOT NULL,
  `d8` varchar(500) NOT NULL,
  `d9` varchar(500) NOT NULL,
  `d10` varchar(500) NOT NULL,
  `d11` varchar(500) NOT NULL,
  `d12` varchar(500) NOT NULL,
  `d13` varchar(500) NOT NULL,
  `d14` varchar(500) NOT NULL,
  `d15` varchar(500) NOT NULL,
  `d16` varchar(500) NOT NULL,
  `d17` varchar(500) NOT NULL,
  `d18` varchar(500) NOT NULL,
  `d19` varchar(500) NOT NULL,
  `d20` varchar(500) NOT NULL,
  `other` varchar(1000) NOT NULL,
  `date` varchar(20) NOT NULL,
  `pdiet` varchar(200) NOT NULL,
  `reffer` varchar(200) NOT NULL,
  `i1` varchar(500) NOT NULL,
  `i2` varchar(500) NOT NULL,
  `i3` varchar(500) NOT NULL,
  `i4` varchar(500) NOT NULL,
  `i5` varchar(500) NOT NULL,
  `i6` varchar(500) NOT NULL,
  `i7` varchar(500) NOT NULL,
  `i8` varchar(500) NOT NULL,
  `i9` varchar(500) NOT NULL,
  `i10` varchar(500) NOT NULL,
  `i11` varchar(500) NOT NULL,
  `i12` varchar(500) NOT NULL,
  `i13` varchar(500) NOT NULL,
  `i14` varchar(500) NOT NULL,
  `i15` varchar(500) NOT NULL,
  `i16` varchar(500) NOT NULL,
  `i17` varchar(500) NOT NULL,
  `i18` varchar(500) NOT NULL,
  `i19` varchar(500) NOT NULL,
  `i20` varchar(500) NOT NULL,
  `room` varchar(100) NOT NULL,
  `discharge` varchar(100) NOT NULL,
  `ddate` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discharge`
--

INSERT INTO `discharge` (`id`, `eid`, `dname`, `pname`, `padd`, `page`, `psex`, `pmrn`, `pphone`, `pheight`, `pweight`, `ptemp`, `cdetails`, `diagnosis`, `xl`, `m1`, `m2`, `m3`, `m4`, `m5`, `m6`, `m7`, `m8`, `m9`, `m10`, `m11`, `m12`, `m13`, `m14`, `m15`, `m16`, `m17`, `m18`, `m19`, `m20`, `d1`, `d2`, `d3`, `d4`, `d5`, `d6`, `d7`, `d8`, `d9`, `d10`, `d11`, `d12`, `d13`, `d14`, `d15`, `d16`, `d17`, `d18`, `d19`, `d20`, `other`, `date`, `pdiet`, `reffer`, `i1`, `i2`, `i3`, `i4`, `i5`, `i6`, `i7`, `i8`, `i9`, `i10`, `i11`, `i12`, `i13`, `i14`, `i15`, `i16`, `i17`, `i18`, `i19`, `i20`, `room`, `discharge`, `ddate`) VALUES
(29, 0, 'Dr. Rajeeb Hassan', 'Steven Adman Dias', '', 31, 'MALE', 123456, '01711206048', '05/21/2018', 'Ward1', 'ICU01', 'lnlsdjlkfjldjslkj', 'jlksjdfkjlksdjlkfjklsdj', '', 'Acitretin 10mg Capsule', 'A-Cerumen Ear Hygine 2ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/21/2018', '', '', 'HHKJHKH', 'jkHKJHJKH', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Discharge confirm', ''),
(30, 0, 'Dr. Rajeeb Hassan', 'Steven Adman Dias', '', 31, 'MALE', 123456, '01711206048', '05/21/2018', 'Ward1', 'ICU01', '', '', '', 'Acitretin 10mg Capsule', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/21/2018', '', '', 'HHKJHKH', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(31, 0, 'Dr. Ranen Biswas', 'Jamal Uddin', '', 45, 'MALE', 234567, '0325-293-5', '05/21/2018', 'Ward1', 'ICU01', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/21/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(32, 0, 'Dr. Ranen Biswas', 'Steven Adman Dias', '', 31, 'MALE', 123456, '01711206048', '05/20/2018', 'Ward2', 'w002', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/20/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(33, 0, 'Dr. Ranen Biswas', 'Steven Adman Dias', '', 31, 'MALE', 123456, '01711206048', '05/23/2018', 'Ward2', 'w002', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/23/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(34, 0, 'Dr. Ranen Biswas', 'Jamal Uddin', '', 45, 'MALE', 234567, '0325-293-5', '05/24/2018', 'Ward1', 'ICU01', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/24/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(35, 0, 'Dr. J.M.Q. Quaser Alam', 'Kamal Khan', '', 65, 'MALE', 345678, '01711206048', '05/21/2018', 'Ward1', 'ICU01', 'nlkjlkljkljk', 'jk', '', 'Ketorolac 30mg/ml Injection', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/21/2018', '', '', 'jkhjkHjkhhhhk', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/21/2018'),
(36, 0, 'Dr. Rajeeb Hassan', 'Kamal Khan', '', 65, 'MALE', 345678, '01711206048', '05/22/2018', 'Ward1', 'ICU01', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/22/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/23/2018'),
(37, 0, 'Dr. Rajeeb Hassan', 'Steven Adman Dias', '', 31, 'MALE', 123456, '01711206048', '05/22/2018', 'Ward3', 'CCU01', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/22/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/24/2018'),
(38, 0, 'Dr. Rajeeb Hassan', 'Jamal Uddin', '', 45, 'MALE', 234567, '0325-293-5', '05/26/2018', 'Ward3', 'CCU01', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/26/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/24/2018'),
(39, 0, 'Dr. Rajeeb Hassan', 'Kamal Khan', '', 65, 'MALE', 345678, '01711206048', '05/25/2018', 'Ward3', 'CCU01', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/25/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/24/2018'),
(40, 0, 'Dr. Ranen Biswas', 'IIOUU', '', 87, 'MALE', 998877, '0325-293-5', '05/22/2018', 'Ward2', 'w002', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/22/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/24/2018'),
(41, 0, 'Dr. Ranen Biswas', 'Kamal Khan', '', 65, 'MALE', 345678, '01711206048', '05/26/2018', 'Ward3', 'CCU01', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/26/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/24/2018'),
(42, 0, 'Dr. Rajeeb Hassan', 'Steven Adman Dias', '', 31, 'MALE', 123456, '01711206048', '05/24/2018', 'Ward1', 'ICU01', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/24/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/24/2018'),
(43, 0, 'Dr. Ranen Biswas', 'Jamal Uddin', '', 45, 'MALE', 234567, '0325-293-5', '06/15/2018', 'Ward1', 'ICU01', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '06/15/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/24/2018'),
(44, 0, 'Dr. Rajeeb Hassan', 'Steven Adman Dias', '', 31, 'MALE', 123456, '01711206048', '05/21/2018', 'Ward1', 'w001', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/21/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/25/2018'),
(45, 0, 'Dr. Rajeeb Hassan', 'Steven Adman Dias', '', 31, 'MALE', 123456, '01711206048', '05/24/2018', 'Ward1', 'ICU01', '', '', '', 'Aceclofenac 100mg Tablet', '0.9% Sodium chloride IV Infusion 1000ml', 'A-Cerumen Ear Hygine 2ml', 'Acitretin 10mg Capsule', 'Labetalol 200mg Tablet', '5 % Dextrose IV Infusion. 1000 ml', '10% Fat Emulsion', '5 % Dextrose IV Infusion. 1000 ml', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '1+1+1, dshfbj s', '1+1+1, dshfbj s', '1+1+1, dshfbj s', '1+1+1, dshfbj s', '1+1+1, dshfbj s', '1+1+1, dshfbj s', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/24/2018', '', '', 'jhjkhkh', 'djsfhdsj', 'jjjlj', 'kjlkj', 'jjkljlk', 'jhkjhj', 'jhjkh', 'jhjkh', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/25/2018'),
(46, 0, 'Dr. Ranen Biswas', 'Steven Adman Dias', '', 31, 'MALE', 123456, '01711206048', '05/26/2018', 'Ward1', 'ICU01', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/26/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/25/2018'),
(47, 0, 'Dr. Rajeeb Hassan', 'Steven Adman Dias', '', 31, 'MALE', 123456, '01711206048', '05/27/2018', 'Ward1', 'ICU01', '', '', '', '5%Dextrose+0.225%Sodium Chloride', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/27/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/27/2018'),
(48, 0, 'Dr. Rajeeb Hassan', 'MERRY BAROI', '', 767, 'FEMALE', 666988, '76786678', '05/27/2018', 'Ward1', 'ICU01', '', '', '', '0.9% Sodium chloride IV Infusion 1000ml', '0.9% Sodium Chloride IV Infusion 500 ml', '0.9%Sodium Chloride+5%Dextrose  1000 ml', '10 % Dextrose IV Infusion 1000 ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/27/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/27/2018'),
(49, 5, 'Dr. Ranen Biswas', 'Steven Adman Dias', '', 31, 'MALE', 123456, '01711206048', '05/28/2018', 'Ward1', 'w001', '', '', '', 'Aceclofenac 100mg Tablet', '5%Dextrose+0.225%Sodium Chloride', '20% Mannitol 500ml', '10% Fat Emulsion', 'Acitretin 10mg Capsule', '6%hydroxyethyl starch 500ml', 'Acetylcysteine 600mg Tablet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/28/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/27/2018'),
(50, 5, 'Dr. Ranen Biswas', 'Steven Adman Dias', '', 31, 'MALE', 123456, '01711206048', '05/28/2018', 'Ward1', 'w001', '', '', '', 'Aceclofenac 100mg Tablet', '5%Dextrose+0.225%Sodium Chloride', '20% Mannitol 500ml', '10% Fat Emulsion', 'Acitretin 10mg Capsule', '6%hydroxyethyl starch 500ml', 'Acetylcysteine 600mg Tablet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/28/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/27/2018'),
(51, 1, 'Dr. Rajeeb Hassan', 'Kamal Khan', '', 65, 'MALE', 345678, '01711206048', '05/27/2018', 'Ward1', 'ICU01', '', '', '', 'Acetic Acid 5% Solution', 'Acitretin 10mg Capsule', 'Activated Charcoal 250 mg Tablet', '25% Dextrose 100 ml Infusion', '10%', '5%Composit Amino Acid+D-Sorbitol', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/27/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/27/2018'),
(52, 1, 'Dr. J.M.Q. Quaser Alam', 'dias adman', '', 767, 'MALE', 111222, '76786', '05/27/2018', 'Ward2', 'w002', '', '', '', 'Acetic Acid 5% Solution', 'Acitretin 10mg Capsule', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/27/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/27/2018'),
(53, 1, 'Dr. J.M.Q. Quaser Alam', 'dias adman', '', 767, 'MALE', 111222, '76786', '05/27/2018', 'Ward2', 'w002', '', '', '', 'Acetic Acid 5% Solution', 'Acitretin 10mg Capsule', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/27/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/27/2018'),
(54, 1, 'Dr. J.M.Q. Quaser Alam', 'dias adman', '', 767, 'MALE', 111222, '76786', '05/27/2018', 'Ward2', 'w002', '', '', '', 'Acetic Acid 5% Solution', 'Acitretin 10mg Capsule', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/27/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/27/2018'),
(55, 1, 'Dr. Ranen Biswas', 'IIOUU', '', 87, 'MALE', 998877, '0325-293-5', '05/27/2018', 'Ward1', 'w001', '', '', '', '0.9% Sodium Chloride IV Infusion 500 ml', 'ABCDerma Hydrant', 'A-Cerumen Ear Hygine 2ml', '25% Dextrose 100 ml Infusion', '20%', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/27/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/27/2018'),
(56, 1, 'Dr. Ranen Biswas', 'IIOUU', '', 87, 'MALE', 998877, '0325-293-5', '05/27/2018', 'Ward1', 'w001', '', '', '', '0.9% Sodium Chloride IV Infusion 500 ml', 'ABCDerma Hydrant', 'A-Cerumen Ear Hygine 2ml', '25% Dextrose 100 ml Infusion', '20%', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/27/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/27/2018'),
(57, 1, 'Dr. Ranen Biswas', 'LALALALA', '', 0, 'MALE', 999678, 'hjg', '05/27/2018', 'Ward1', 'ICU01', '', '', '', '20% Mannitol 500ml', '10%Dextrose+0.225%Sodium Chloride', 'A-Cerumen Ear Hygine 2ml', 'A-Cerumen Ear Hygine 2ml', 'Acitretin', 'Activated Charcoal 250 mg Tablet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/27/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/27/2018'),
(58, 1, 'Dr. J.M.Q. Quaser Alam', 'vvvv', '', 0, 'MALE', 334442, 'hghjghj', '05/27/2018', 'Ward2', 'w002', '', '', '', '0.9%Sodium Chloride+5%Dextrose  1000 ml', 'Aceclofenac 100mg Tablet', 'Acetic Acid 5% Solution', '6%hydroxyethyl starch 500ml', '20%', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/27/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/27/2018'),
(59, 1, 'Dr. Ranen Biswas', 'BBBBB', '', 987, 'MALE', 222555, '987', '05/28/2018', 'Ward1', 'w001', '', '', '', '6%hydroxyethyl starch 500ml', '5 % Dextrose IV Infusion. 1000 ml', '25% Dextrose 100 ml Infusion', '10% Fat Emulsion', '20%', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/28/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/28/2018'),
(60, 1, 'Dr. Ranen Biswas', 'IUIUOIIUUIUOUIOUOUOUUIOUOUOU', '', 8798, 'MALE', 995566, '98987987', '05/28/2018', 'Ward1', 'ICU01', '', '', '', 'A-Cerumen Ear Hygine 2ml', 'Aceclofenac 100mg Tablet', '6%hydroxyethyl starch 500ml', '10%Dextrose+0.225%Sodium Chloride', '20%', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/28/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/28/2018'),
(61, 1, 'Dr. Rajeeb Hassan', 'STEVE', '', 67, 'MALE', 654321, '01711206048', '05/28/2018', 'Ward1', 'ICU01', '', '', '', '0.9% Sodium chloride IV Infusion 1000ml', '0.9% Sodium Chloride IV Infusion 500 ml', '5%Composit Amino Acid+D-Sorbitol', '6%hydroxyethyl starch 500ml', '20% Mannitol 500ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/28/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/28/2018'),
(62, 6, 'Dr. J.M.Q. Quaser Alam', 'Steven Adman Dias', '', 31, 'MALE', 123456, '01711206048', '05/29/2018', 'Ward1', 'ICU01', '', '', '', 'Calcium 500mg + Vitamin D3 200iu Tablet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/29/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/29/2018'),
(63, 1, 'Dr. J.M.Q. Quaser Alam', 'ARIF', '', 98, 'MALE', 666555, '98797', '05/29/2018', 'Ward1', 'w001', '', '', '', 'Budesonide 0.5mg/2ml Neb/Soln.', 'Paracetamol 665 mg Tablet', 'Betahistine 8 mg Tablet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/29/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/29/2018');

-- --------------------------------------------------------

--
-- Table structure for table `dmedi`
--

CREATE TABLE IF NOT EXISTS `dmedi` (
  `id` int(20) NOT NULL,
  `eid` int(6) NOT NULL,
  `dname` varchar(200) NOT NULL,
  `pmrn` int(10) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `medi` varchar(500) NOT NULL,
  `pdos` varchar(500) NOT NULL,
  `ins` varchar(500) NOT NULL,
  `ddate` varchar(20) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=213 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dmedi`
--

INSERT INTO `dmedi` (`id`, `eid`, `dname`, `pmrn`, `pname`, `medi`, `pdos`, `ins`, `ddate`, `status`) VALUES
(129, 0, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Acetic Acid 5% Solution', '1+1+1, dshfbj s', 'KJHJH', '05/21/2018', ''),
(130, 0, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Acetic Acid 5% Solution', '1+1+1, dshfbj s', 'JHHHKHH', '05/21/2018', ''),
(131, 0, 'Dr. Ranen Biswas', 123456, 'Steven Adman Dias', 'Acetylcysteine 600mg Tablet', '1+1+1, dshfbj s', 'OKOK', '05/21/2018', ''),
(132, 0, 'Dr. Rajeeb Hassan', 234567, 'Jamal Uddin', 'Infertility Supplement for woman tablet', '1+1+1, dshfbj s', 'jkhjkhkh', '05/21/2018', ''),
(133, 0, 'Dr. Ranen Biswas', 123456, 'Steven Adman Dias', 'ABCDerma Hydrant', '', '', '05/21/2018', ''),
(134, 0, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Aceclofenac 100mg Tablet', '1+1+1, dshfbj s', 'jhjkhkh', '05/25/2018', ''),
(135, 0, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', '0.9% Sodium chloride IV Infusion 1000ml', '1+1+1, dshfbj s', 'djsfhdsj', '05/25/2018', ''),
(136, 0, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'A-Cerumen Ear Hygine 2ml', '1+1+1, dshfbj s', 'jjjlj', '05/25/2018', ''),
(137, 0, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Acitretin 10mg Capsule', '1+1+1, dshfbj s', 'kjlkj', '05/25/2018', ''),
(138, 0, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Labetalol 200mg Tablet', '1+1+1, dshfbj s', 'jjkljlk', '05/25/2018', ''),
(139, 0, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', '5 % Dextrose IV Infusion. 1000 ml', '1+1+1, dshfbj s', 'jhkjhj', '05/25/2018', ''),
(140, 0, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', '10% Fat Emulsion', '1+1+1, dshfbj s', 'jhjkh', '05/25/2018', ''),
(141, 0, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', '5 % Dextrose IV Infusion. 1000 ml', '1+1+1, dshfbj s', 'jhjkh', '05/25/2018', ''),
(142, 0, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', '5%Dextrose+0.225%Sodium Chloride', '1+1+1, dshfbj s', '', '05/27/2018', ''),
(143, 0, 'Dr. Rajeeb Hassan', 666988, 'MERRY BAROI', '0.9% Sodium chloride IV Infusion 1000ml', '', '', '05/27/2018', ''),
(144, 0, 'Dr. Rajeeb Hassan', 666988, 'MERRY BAROI', '0.9% Sodium Chloride IV Infusion 500 ml', '', '', '05/27/2018', ''),
(145, 0, 'Dr. Rajeeb Hassan', 666988, 'MERRY BAROI', '0.9%Sodium Chloride+5%Dextrose  1000 ml', '', '', '05/27/2018', ''),
(146, 0, 'Dr. Rajeeb Hassan', 666988, 'MERRY BAROI', '10 % Dextrose IV Infusion 1000 ml', '', '', '05/27/2018', ''),
(147, 5, 'Dr. Ranen Biswas', 123456, 'Steven Adman Dias', 'Aceclofenac 100mg Tablet', '', '', '05/27/2018', ''),
(148, 5, 'Dr. Ranen Biswas', 123456, 'Steven Adman Dias', '5%Dextrose+0.225%Sodium Chloride', '', '', '05/27/2018', ''),
(149, 5, 'Dr. Ranen Biswas', 123456, 'Steven Adman Dias', '20% Mannitol 500ml', '', '', '05/27/2018', ''),
(150, 5, 'Dr. Ranen Biswas', 123456, 'Steven Adman Dias', '10% Fat Emulsion', '', '', '05/27/2018', ''),
(151, 5, 'Dr. Ranen Biswas', 123456, 'Steven Adman Dias', 'Acitretin 10mg Capsule', '', '', '05/27/2018', ''),
(152, 5, 'Dr. Ranen Biswas', 123456, 'Steven Adman Dias', '6%hydroxyethyl starch 500ml', '', '', '05/27/2018', ''),
(153, 5, 'Dr. Ranen Biswas', 123456, 'Steven Adman Dias', 'Acetylcysteine 600mg Tablet', '', '', '05/27/2018', ''),
(154, 5, 'Dr. Ranen Biswas', 123456, 'Steven Adman Dias', 'Aceclofenac 100mg Tablet', '', '', '05/27/2018', ''),
(155, 5, 'Dr. Ranen Biswas', 123456, 'Steven Adman Dias', '5%Dextrose+0.225%Sodium Chloride', '', '', '05/27/2018', ''),
(156, 5, 'Dr. Ranen Biswas', 123456, 'Steven Adman Dias', '20% Mannitol 500ml', '', '', '05/27/2018', ''),
(157, 5, 'Dr. Ranen Biswas', 123456, 'Steven Adman Dias', '10% Fat Emulsion', '', '', '05/27/2018', ''),
(158, 5, 'Dr. Ranen Biswas', 123456, 'Steven Adman Dias', 'Acitretin 10mg Capsule', '', '', '05/27/2018', ''),
(159, 5, 'Dr. Ranen Biswas', 123456, 'Steven Adman Dias', '6%hydroxyethyl starch 500ml', '', '', '05/27/2018', ''),
(160, 5, 'Dr. Ranen Biswas', 123456, 'Steven Adman Dias', 'Acetylcysteine 600mg Tablet', '', '', '05/27/2018', ''),
(161, 1, 'Dr. Rajeeb Hassan', 345678, 'Kamal Khan', 'Acetic Acid 5% Solution', '', '', '05/27/2018', ''),
(162, 1, 'Dr. Rajeeb Hassan', 345678, 'Kamal Khan', 'Acitretin 10mg Capsule', '', '', '05/27/2018', ''),
(163, 1, 'Dr. Rajeeb Hassan', 345678, 'Kamal Khan', 'Activated Charcoal 250 mg Tablet', '', '', '05/27/2018', ''),
(164, 1, 'Dr. Rajeeb Hassan', 345678, 'Kamal Khan', '25% Dextrose 100 ml Infusion', '', '', '05/27/2018', ''),
(165, 1, 'Dr. Rajeeb Hassan', 345678, 'Kamal Khan', '10%', '', '', '05/27/2018', ''),
(166, 1, 'Dr. Rajeeb Hassan', 345678, 'Kamal Khan', '5%Composit Amino Acid+D-Sorbitol', '', '', '05/27/2018', ''),
(167, 1, 'Dr. J.M.Q. Quaser Alam', 111222, 'dias adman', 'Acetic Acid 5% Solution', '', '', '05/27/2018', ''),
(168, 1, 'Dr. J.M.Q. Quaser Alam', 111222, 'dias adman', 'Acitretin 10mg Capsule', '', '', '05/27/2018', ''),
(169, 1, 'Dr. J.M.Q. Quaser Alam', 111222, 'dias adman', 'Acetic Acid 5% Solution', '', '', '05/27/2018', ''),
(170, 1, 'Dr. J.M.Q. Quaser Alam', 111222, 'dias adman', 'Acitretin 10mg Capsule', '', '', '05/27/2018', ''),
(171, 1, 'Dr. J.M.Q. Quaser Alam', 111222, 'dias adman', 'Acetic Acid 5% Solution', '', '', '05/27/2018', ''),
(172, 1, 'Dr. J.M.Q. Quaser Alam', 111222, 'dias adman', 'Acitretin 10mg Capsule', '', '', '05/27/2018', ''),
(173, 1, 'Dr. Ranen Biswas', 998877, 'IIOUU', '0.9% Sodium Chloride IV Infusion 500 ml', '', '', '05/27/2018', ''),
(174, 1, 'Dr. Ranen Biswas', 998877, 'IIOUU', 'ABCDerma Hydrant', '', '', '05/27/2018', ''),
(175, 1, 'Dr. Ranen Biswas', 998877, 'IIOUU', 'A-Cerumen Ear Hygine 2ml', '', '', '05/27/2018', ''),
(176, 1, 'Dr. Ranen Biswas', 998877, 'IIOUU', '25% Dextrose 100 ml Infusion', '', '', '05/27/2018', ''),
(177, 1, 'Dr. Ranen Biswas', 998877, 'IIOUU', '20%', '', '', '05/27/2018', ''),
(178, 1, 'Dr. Ranen Biswas', 998877, 'IIOUU', '0.9% Sodium Chloride IV Infusion 500 ml', '', '', '05/27/2018', ''),
(179, 1, 'Dr. Ranen Biswas', 998877, 'IIOUU', 'ABCDerma Hydrant', '', '', '05/27/2018', ''),
(180, 1, 'Dr. Ranen Biswas', 998877, 'IIOUU', 'A-Cerumen Ear Hygine 2ml', '', '', '05/27/2018', ''),
(181, 1, 'Dr. Ranen Biswas', 998877, 'IIOUU', '25% Dextrose 100 ml Infusion', '', '', '05/27/2018', ''),
(182, 1, 'Dr. Ranen Biswas', 998877, 'IIOUU', '20%', '', '', '05/27/2018', ''),
(183, 1, 'Dr. Ranen Biswas', 999678, 'LALALALA', '20% Mannitol 500ml', '', '', '05/27/2018', ''),
(184, 1, 'Dr. Ranen Biswas', 999678, 'LALALALA', '10%Dextrose+0.225%Sodium Chloride', '', '', '05/27/2018', ''),
(185, 1, 'Dr. Ranen Biswas', 999678, 'LALALALA', 'A-Cerumen Ear Hygine 2ml', '', '', '05/27/2018', ''),
(186, 1, 'Dr. Ranen Biswas', 999678, 'LALALALA', 'A-Cerumen Ear Hygine 2ml', '', '', '05/27/2018', ''),
(187, 1, 'Dr. Ranen Biswas', 999678, 'LALALALA', 'Acitretin', '', '', '05/27/2018', ''),
(188, 1, 'Dr. Ranen Biswas', 999678, 'LALALALA', 'Activated Charcoal 250 mg Tablet', '', '', '05/27/2018', ''),
(189, 1, 'Dr. J.M.Q. Quaser Alam', 334442, 'vvvv', '0.9%Sodium Chloride+5%Dextrose  1000 ml', '', '', '05/27/2018', ''),
(190, 1, 'Dr. J.M.Q. Quaser Alam', 334442, 'vvvv', 'Aceclofenac 100mg Tablet', '', '', '05/27/2018', ''),
(191, 1, 'Dr. J.M.Q. Quaser Alam', 334442, 'vvvv', 'Acetic Acid 5% Solution', '', '', '05/27/2018', ''),
(192, 1, 'Dr. J.M.Q. Quaser Alam', 334442, 'vvvv', '6%hydroxyethyl starch 500ml', '', '', '05/27/2018', ''),
(193, 1, 'Dr. J.M.Q. Quaser Alam', 334442, 'vvvv', '20%', '', '', '05/27/2018', ''),
(194, 1, 'Dr. Ranen Biswas', 222555, 'BBBBB', '6%hydroxyethyl starch 500ml', '', '', '05/28/2018', ''),
(195, 1, 'Dr. Ranen Biswas', 222555, 'BBBBB', '5 % Dextrose IV Infusion. 1000 ml', '', '', '05/28/2018', ''),
(196, 1, 'Dr. Ranen Biswas', 222555, 'BBBBB', '25% Dextrose 100 ml Infusion', '', '', '05/28/2018', ''),
(197, 1, 'Dr. Ranen Biswas', 222555, 'BBBBB', '10% Fat Emulsion', '', '', '05/28/2018', ''),
(198, 1, 'Dr. Ranen Biswas', 222555, 'BBBBB', '20%', '', '', '05/28/2018', ''),
(199, 1, 'Dr. Ranen Biswas', 995566, 'IUIUOIIUUIUOUIOUOUOUUIOUOUOU', 'A-Cerumen Ear Hygine 2ml', '', '', '05/28/2018', ''),
(200, 1, 'Dr. Ranen Biswas', 995566, 'IUIUOIIUUIUOUIOUOUOUUIOUOUOU', 'Aceclofenac 100mg Tablet', '', '', '05/28/2018', ''),
(201, 1, 'Dr. Ranen Biswas', 995566, 'IUIUOIIUUIUOUIOUOUOUUIOUOUOU', '6%hydroxyethyl starch 500ml', '', '', '05/28/2018', ''),
(202, 1, 'Dr. Ranen Biswas', 995566, 'IUIUOIIUUIUOUIOUOUOUUIOUOUOU', '10%Dextrose+0.225%Sodium Chloride', '', '', '05/28/2018', ''),
(203, 1, 'Dr. Ranen Biswas', 995566, 'IUIUOIIUUIUOUIOUOUOUUIOUOUOU', '20%', '', '', '05/28/2018', ''),
(204, 1, 'Dr. Rajeeb Hassan', 654321, 'STEVE', '0.9% Sodium chloride IV Infusion 1000ml', '', '', '05/28/2018', ''),
(205, 1, 'Dr. Rajeeb Hassan', 654321, 'STEVE', '0.9% Sodium Chloride IV Infusion 500 ml', '', '', '05/28/2018', ''),
(206, 1, 'Dr. Rajeeb Hassan', 654321, 'STEVE', '5%Composit Amino Acid+D-Sorbitol', '', '', '05/28/2018', ''),
(207, 1, 'Dr. Rajeeb Hassan', 654321, 'STEVE', '6%hydroxyethyl starch 500ml', '', '', '05/28/2018', ''),
(208, 1, 'Dr. Rajeeb Hassan', 654321, 'STEVE', '20% Mannitol 500ml', '', '', '05/28/2018', ''),
(209, 6, 'Dr. J.M.Q. Quaser Alam', 123456, 'Steven Adman Dias', 'Calcium 500mg + Vitamin D3 200iu Tablet', '', '', '05/29/2018', ''),
(210, 1, 'Dr. J.M.Q. Quaser Alam', 666555, 'ARIF', 'Budesonide 0.5mg/2ml Neb/Soln.', '', '', '05/29/2018', ''),
(211, 1, 'Dr. J.M.Q. Quaser Alam', 666555, 'ARIF', 'Paracetamol 665 mg Tablet', '', '', '05/29/2018', ''),
(212, 1, 'Dr. J.M.Q. Quaser Alam', 666555, 'ARIF', 'Betahistine 8 mg Tablet', '', '', '05/29/2018', '');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE IF NOT EXISTS `doctor` (
  `did` int(6) NOT NULL,
  `dname` varchar(100) NOT NULL,
  `degree` varchar(100) NOT NULL,
  `Discipline` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`did`, `dname`, `degree`, `Discipline`) VALUES
(1, 'Dr. Rajeeb Hassan', '', ''),
(2, 'Dr. Ranen Biswas', '', ''),
(7, 'Dr. J.M.Q. Quaser Alam', '', ''),
(8, 'jahsjkh', '', ''),
(9, 'oo', '', ''),
(10, 'njh', '', ''),
(11, 'uiuiu', '', ''),
(12, 'hghg', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `dosage`
--

CREATE TABLE IF NOT EXISTS `dosage` (
  `id` int(20) NOT NULL,
  `doname` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosage`
--

INSERT INTO `dosage` (`id`, `doname`) VALUES
(1, '1+1+1, dshfbj s');

-- --------------------------------------------------------

--
-- Table structure for table `inpatient`
--

CREATE TABLE IF NOT EXISTS `inpatient` (
  `id` int(15) NOT NULL,
  `eid` int(6) NOT NULL,
  `pmrn` int(10) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `padd` varchar(200) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age` int(4) NOT NULL,
  `adate` varchar(20) NOT NULL,
  `room` varchar(30) NOT NULL,
  `adoc` varchar(50) NOT NULL,
  `pphone` int(11) NOT NULL,
  `discharge` varchar(100) NOT NULL,
  `room1` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inpatient`
--

INSERT INTO `inpatient` (`id`, `eid`, `pmrn`, `pname`, `padd`, `gender`, `age`, `adate`, `room`, `adoc`, `pphone`, `discharge`, `room1`) VALUES
(25, 1, 111222, 'dias adman', 'HGJHGHJG', 'MALE', 767, '05/27/2018', 'Ward2', 'Dr. J.M.Q. Quaser Alam', 0, 'Discharge', 'w002'),
(15, 0, 123456, 'Steven Adman Dias', '44/H, Indira Road, Farmgate, Dhaka, 1215', 'MALE', 31, '05/24/2018', 'Ward1', 'Dr. Rajeeb Hassan', 0, 'Discharge', 'ICU01'),
(17, 0, 123456, 'Steven Adman Dias', '44/H, Indira Road, Farmgate, Dhaka, 1215', 'MALE', 31, '05/25/2018', 'Ward1', 'Dr. Ranen Biswas', 0, 'Discharge', 'w001'),
(18, 0, 123456, 'Steven Adman Dias', '44/H, Indira Road, Farmgate, Dhaka, 1215', 'MALE', 31, '05/26/2018', 'Ward1', 'Dr. Ranen Biswas', 0, 'Discharge', 'ICU01'),
(20, 4, 123456, 'Steven Adman Dias', '44/H, Indira Road, Farmgate, Dhaka, 1215', 'MALE', 31, '05/27/2018', 'Ward1', 'Dr. Rajeeb Hassan', 0, 'Discharge', 'ICU01'),
(23, 5, 123456, 'Steven Adman Dias', '44/H, Indira Road, Farmgate, Dhaka, 1215', 'MALE', 31, '05/28/2018', 'Ward1', 'Dr. Ranen Biswas', 0, 'Discharge', 'w001'),
(35, 6, 123456, 'Steven Adman Dias', '44/H, Indira Road, Farmgate, Dhaka, 1215', 'MALE', 31, '05/29/2018', 'Ward1', 'Dr. J.M.Q. Quaser Alam', 0, 'Discharge', 'ICU01'),
(32, 1, 222555, 'BBBBB', 'jhjhj', 'MALE', 987, '05/28/2018', 'Ward1', 'Dr. Ranen Biswas', 0, 'Discharge', 'w001'),
(36, 1, 234567, 'Jamal Uddin', '44/H, Indira Road', 'MALE', 45, '05/29/2018', 'Ward2', 'Dr. J.M.Q. Quaser Alam', 0, 'Discharge', 'w002'),
(31, 1, 334442, 'vvvv', 'cccc', 'MALE', 0, '05/27/2018', 'Ward2', 'Dr. J.M.Q. Quaser Alam', 0, 'Discharge', 'w002'),
(38, 1, 334567, 'SUCCESS', 'COME LAST', 'MALE', 0, '05/29/2018', 'Ward1', 'Dr. Rajeeb Hassan', 0, '', 'w001'),
(24, 1, 345678, 'Kamal Khan', '44/H Indira Road, Dhaka', 'MALE', 65, '05/27/2018', 'Ward1', 'Dr. Rajeeb Hassan', 0, 'Discharge', 'ICU01'),
(34, 1, 654321, 'STEVE', 'MONIPURI PARA', 'MALE', 67, '05/28/2018', 'Ward1', 'Dr. Rajeeb Hassan', 0, 'Discharge', 'ICU01'),
(37, 1, 666555, 'ARIF', 'LKJLKJLK', 'MALE', 98, '05/29/2018', 'Ward1', 'Dr. J.M.Q. Quaser Alam', 0, 'Discharge', 'w001'),
(21, 1, 666988, 'MERRY BAROI', '44/H, Indira Road, Farmgate, Dhaka, 1215', 'FEMALE', 767, '05/27/2018', 'Ward1', 'Dr. Rajeeb Hassan', 0, 'Discharge', 'ICU01'),
(33, 1, 995566, 'IUIUOIIUUIUOUIOUOUOUUIOUOUOU', 'JKHKJHHJKH', 'MALE', 8798, '05/28/2018', 'Ward1', 'Dr. Ranen Biswas', 0, '', 'ICU01'),
(27, 1, 998877, 'IIOUU', '998877', 'MALE', 87, '05/27/2018', 'Ward1', 'Dr. Ranen Biswas', 0, 'Discharge', 'w001'),
(28, 1, 999678, 'LALALALA', 'sdbhf', 'MALE', 0, '05/27/2018', 'Ward1', 'Dr. Ranen Biswas', 0, 'Discharge', 'ICU01');

-- --------------------------------------------------------

--
-- Table structure for table `instruction`
--

CREATE TABLE IF NOT EXISTS `instruction` (
  `ID` int(20) NOT NULL,
  `des` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `investigastion`
--

CREATE TABLE IF NOT EXISTS `investigastion` (
  `id` int(10) NOT NULL,
  `iname` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=319 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `investigastion`
--

INSERT INTO `investigastion` (`id`, `iname`) VALUES
(2, '24 hour Urinary Total Protein '),
(3, 'A/G ratio'),
(4, 'Abscess Fluid for AFB'),
(5, 'ACTH'),
(6, 'AFB'),
(7, 'Aldolase '),
(8, 'ALP'),
(9, 'Alpha feto protein'),
(10, 'Alpha-fetoprotein (AFP)'),
(11, 'Anti cardiolipin antibody '),
(12, 'Anti CCP Ab'),
(13, 'Anti Dengue IgG'),
(14, 'Anti Dengue IgM'),
(15, 'Anti Ds DNA'),
(16, 'Anti HAV IgM'),
(17, 'Anti HBc (Total)'),
(18, 'Anti HBc IgM'),
(19, 'Anti HBs'),
(20, 'Anti HCV'),
(21, 'Anti HEV ? IgM'),
(22, 'Anti Mullerian Hormone (AMH)'),
(23, 'Anti Phoslipid Ab'),
(24, 'Anti Tb IgA'),
(25, 'Anti Tb IgG'),
(26, 'Anti Tb igM'),
(27, 'Anti TG Ab'),
(28, 'Anti thyroid Ab '),
(29, 'Ascitic fluid for AFB stain'),
(30, 'Ascitic fluid for CS'),
(31, 'Ascitic fluid for gram stain'),
(32, 'B hCG level'),
(33, 'Ba- Swallow'),
(34, 'Ba-meal '),
(35, 'B-hCG'),
(36, 'Bleeding Time'),
(37, 'Blood collection charge'),
(38, 'Blood CS'),
(39, 'Blood drawing'),
(40, 'Blood for cross matching'),
(41, 'Blood for cross matching and screening'),
(42, 'Blood for crossmatching'),
(43, 'Blood for screening'),
(44, 'Blood grouping and cross matching'),
(45, 'Blood grouping and Rh factor'),
(46, 'Blood grouping and Rh typing'),
(47, 'Blood grouping and screening'),
(48, 'Blood Urea'),
(49, 'Bronchial brushing for gram stain'),
(50, 'Bronchial washing for gram stain'),
(51, 'Broncho alveolar lavage for AFB stain'),
(52, 'Brucella and Rickettsia'),
(53, 'BUN'),
(54, 'C4 (complement 4)'),
(55, 'CA 125'),
(56, 'CA 15-3'),
(57, 'CA 19 ? 9'),
(58, 'C-ANCA'),
(59, 'CAPD fluid for CS'),
(60, 'CAPD fluid for gram stain'),
(61, 'Cardiac Troponin I '),
(62, 'Carotid Duplex USG'),
(63, 'CBC and ESR'),
(64, 'CEA'),
(65, 'Cervical smear for CS'),
(66, 'Cervical smear for gram stain'),
(67, 'CFT for kala azar'),
(68, 'Chest'),
(69, 'Circulating eosinophil count'),
(70, 'CK-MB'),
(71, 'Clotting Time'),
(72, 'CMV IgG'),
(73, 'CMV IgM'),
(74, 'Colonoscopy'),
(75, 'Colour Doppler  of Penis'),
(76, 'Colour Doppler USG of Scrotum'),
(77, 'Coombs test (D/I)'),
(78, 'Coombs test (Direct)'),
(79, 'Cortisol (Evening)'),
(80, 'Cortisol (Morning)'),
(81, 'CPK'),
(82, 'C-reactive protein (CRP) level'),
(83, 'Creatinine Clearance Rate'),
(84, 'CRP'),
(85, 'CSF for CS'),
(86, 'CSF for gram stain'),
(87, 'CT guided FNAC'),
(88, 'CT IVU'),
(89, 'CT scan of abdomen'),
(90, 'CT scan of Brain'),
(91, 'CT scan of Chest '),
(92, 'CT scan of pelvis'),
(93, 'Cystic fluid gram stain'),
(94, 'Cystogram'),
(95, 'Dengue NS1 Ag'),
(96, 'DHEA ? SO4'),
(97, 'Discharge for wet film'),
(98, 'DTPA Renogram with split function'),
(99, 'Duplex USG of both limbs'),
(100, 'ECG'),
(101, 'Echo - 2D'),
(102, 'Elisa for ANA '),
(103, 'Elisa for Dengue Ab'),
(104, 'Endoscopy of upper GIT'),
(105, 'ERCP'),
(106, 'ESR'),
(107, 'Estimated GFR (eGFR)'),
(108, 'Fasting Lipid profile '),
(109, 'FBS'),
(110, 'Ferritin '),
(111, 'Flixible Cystoscopy'),
(112, 'FNAC '),
(113, 'Follicle stimulating hormone(FSH)'),
(114, 'Free PSA'),
(115, 'Free T3'),
(116, 'Free T4'),
(117, 'Free Testosterone'),
(118, 'FSH'),
(119, 'FT3'),
(120, 'FT4'),
(121, 'GFR'),
(122, 'GGT'),
(123, 'Growth Hormone'),
(124, 'H pylori IgG'),
(125, 'Haemoglobin'),
(126, 'Hb Electrophoresis'),
(127, 'HbA1c'),
(128, 'HBeAg'),
(129, 'HBsAg'),
(130, 'HBsAg (Quantative) '),
(131, 'HBV-DNA'),
(132, 'HCT'),
(133, 'HDL cholesterol'),
(134, 'HIV screening'),
(135, 'HLA B27'),
(136, 'HSV 1 and 2 IgG'),
(137, 'HSV 1 and 2 IgM'),
(138, 'Human chorionic gonadotropin (HCG)'),
(139, 'ICT for Chlamydia'),
(140, 'ICT for filarial '),
(141, 'IgA'),
(142, 'IgG'),
(143, 'Inorganic phosphates'),
(144, 'IVU'),
(145, 'Lactate dehydrogenase(LDH)'),
(146, 'LDH'),
(147, 'LDL cholesterol '),
(148, 'LH'),
(149, 'Liver Function Test'),
(150, 'Luteining hormone(LH)'),
(151, 'Lymph node biopsy'),
(152, 'Magnesium'),
(153, 'Malaria Parasite'),
(154, 'Mammogram of both breast'),
(155, 'Mantoux Tuberculin Skin Test (MT)'),
(156, 'MCH'),
(157, 'MCHC'),
(158, 'MCU'),
(159, 'MCV'),
(160, 'MRI KUB'),
(161, 'MRI Lower Abdomen / Pelvis'),
(162, 'MRI of lumbosacral spine '),
(163, 'MRI of neck '),
(164, 'MRI of Right knee'),
(165, 'MT'),
(166, 'Mumps IgM & IgG'),
(167, 'Myoglobin'),
(168, 'Nail for CS'),
(169, 'Nephrostogram'),
(170, 'Nipple discharge for AFB'),
(171, 'OGTT'),
(172, 'Oral swab for AFB'),
(173, 'Otomycotic plug '),
(174, 'P-ANCA'),
(175, 'PBF'),
(176, 'Pericardial fluid for CS'),
(177, 'Peritoneal fluid for CS'),
(178, 'Peritoneal fluid for Gram stain'),
(179, 'PESA Percutaneous epididymal sparm aspiration'),
(180, 'Plain CT KUB'),
(181, 'Plasma Glucose 2 hrs ABF'),
(182, 'Plasma Glucose 2 hrs after 75 gram glucose '),
(183, 'Platelet count'),
(184, 'Pregnancy '),
(185, 'Pregnancy test'),
(186, 'Progesterone'),
(187, 'Prolactin'),
(188, 'Prolactin'),
(189, 'Prostate Specific Antigen (PSA)'),
(190, 'Prostatic smear for culture'),
(191, 'Prostatic smear for gr Staining & culture'),
(192, 'Prothrombin time'),
(193, 'PTH'),
(194, 'Pus for AFB'),
(195, 'Pus for CS'),
(196, 'RA factor'),
(197, 'RBS'),
(198, 'Rectal swab for CS'),
(199, 'Reticulocyte count'),
(200, 'RGU'),
(201, 'Rh antibody titer'),
(202, 'Rose Waaler '),
(203, 'Rubella IgG'),
(204, 'Rubella IgM'),
(205, 'S Bilirubin (Direct)'),
(206, 'S Bilirubin (Total)'),
(207, 'S creatinine'),
(208, 'S Ferritin'),
(209, 'S. Albumin'),
(210, 'S. Amylase'),
(211, 'S. Amylase '),
(212, 'S. Calcium '),
(213, 'S. Electrolytes'),
(214, 'S. Globulin '),
(215, 'S. Iron'),
(216, 'S. Lipase'),
(217, 'Scrapping from tongue for AFB stain'),
(218, 'screening and drawing'),
(219, 'Semen analysis'),
(220, 'Semen Analysis'),
(221, 'Serum immune electrophoresis'),
(222, 'Serum Total protein'),
(223, 'Serum Uric acid'),
(224, 'SGOT'),
(225, 'SGPT'),
(226, 'SHBG'),
(227, 'Short Colonoscopy'),
(228, 'Sputum for AFB'),
(229, 'Sputum for AFB (3 samples)'),
(230, 'Sputum for CS'),
(231, 'Sputum for gram stain'),
(232, 'Sr. Calcium'),
(233, 'Sr. Parathyroid hormone'),
(234, 'Stool elastase '),
(235, 'Stool for CS'),
(236, 'Stool for ova and cyst count '),
(237, 'Stool Occult blood test'),
(238, 'Stool reducing substance'),
(239, 'Stool Routine examination'),
(240, 'Subdural fluid for CS'),
(241, 'Subdural fluid for gram stain'),
(242, 'Synovial fluid for AFB stain'),
(243, 'Synovial fluid for CS'),
(244, 'Synovial fluid for gram stain'),
(245, 'Tacrolimus'),
(246, 'TC - WBC'),
(247, 'TC- RBC'),
(248, 'TE tube for CS'),
(249, 'TESE Testicular sperm extraction'),
(250, 'Testicular FNAC'),
(251, 'Testis & Penis'),
(252, 'Testis & Penis'),
(253, 'Testosterone'),
(254, 'Three early morning  Sputum samples for acid-alcohol fast bacilli(AAFB)'),
(255, 'Three early morning Urine samples for acid-alcohol fast bacilli (AAFB)'),
(256, 'Throat swab for CS'),
(257, 'Throat swab for gram stain'),
(258, 'Throat swab for KLB'),
(259, 'Thyroid antibodies'),
(260, 'TIBC'),
(261, 'Tissue for CS'),
(262, 'Tissue for gram stain'),
(263, 'Tongue swab for cs'),
(264, 'Total cholesterol'),
(265, 'Total hCG'),
(266, 'Total IgE'),
(267, 'TPHA'),
(268, 'Tracheal aspirate for AFB'),
(269, 'Tracheal aspirate for CS'),
(270, 'Transvaginal'),
(271, 'Triglyceride '),
(272, 'TRUS ( Trans rectal USG) of Prostate'),
(273, 'TSH'),
(274, 'Uirodynamic Study'),
(275, 'Uiroflowmertry'),
(276, 'Urethral discharge for CS'),
(277, 'Urethral swab / discharge for gr Staining & culture'),
(278, 'Urethral swab for AFB'),
(279, 'Urethral swab for gram staining'),
(280, 'Uric Acid'),
(281, 'Urinary bilirubin'),
(282, 'Urinary Uric acid'),
(283, 'Urine Bence Jones Proteins '),
(284, 'Urine for AFB'),
(285, 'Urine for AFB'),
(286, 'Urine for CS'),
(287, 'Urine for gram stain'),
(288, 'Urine for micro albumin'),
(289, 'Urine RME'),
(290, 'Urine RME and CS'),
(291, 'Urine RME Post  semen analysis'),
(292, 'Urine Uric acid'),
(293, 'Urodynamic study'),
(294, 'USE of penis - with doppler study'),
(295, 'USG of epigastric sweling'),
(296, 'USG of Hepatobiliary system'),
(297, 'USG of inguinoscrotal region '),
(298, 'USg of KUB  and prostate '),
(299, 'USG of Left breast and axilla'),
(300, 'USG of Lower abdomen'),
(301, 'USG of neck swellings '),
(302, 'USG of periumbilical area'),
(303, 'USG of right breast and axilla'),
(304, 'USG of Scrotum'),
(305, 'USG of Scrotum & Testis'),
(306, 'USG of thyroid gland'),
(307, 'USG of Whole abdomen'),
(308, 'USG of Whole abdomen + PVR'),
(309, 'Vaginal swab for AFB'),
(310, 'Vaginal swab for CS'),
(311, 'Vaginal swab for gram stain'),
(312, 'Vasography'),
(313, 'VDRL'),
(314, 'Vitamin B12'),
(315, 'Widal test'),
(316, 'Widal Weil Felix'),
(317, 'Wound swab for CS'),
(318, 'Wound swab for gram stain');

-- --------------------------------------------------------

--
-- Table structure for table `ipmedi`
--

CREATE TABLE IF NOT EXISTS `ipmedi` (
  `id` int(20) NOT NULL,
  `dname` varchar(200) NOT NULL,
  `pmrn` int(10) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `medi` varchar(500) NOT NULL,
  `pdos` varchar(500) NOT NULL,
  `ins` varchar(500) NOT NULL,
  `date` varchar(20) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ipmedi`
--

INSERT INTO `ipmedi` (`id`, `dname`, `pmrn`, `pname`, `medi`, `pdos`, `ins`, `date`, `status`) VALUES
(5, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Acitretin 10mg Capsule', '1+1+1, dshfbj s', 'HHKJHKH', '05/21/2018', ''),
(6, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'A-Cerumen Ear Hygine 2ml', '1+1+1, dshfbj s', 'jkHKJHJKH', '05/21/2018', ''),
(7, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Acitretin 10mg Capsule', '1+1+1, dshfbj s', 'HHKJHKH', '05/21/2018', ''),
(8, 'Dr. J.M.Q. Quaser Alam', 345678, 'Kamal Khan', 'Ketorolac 30mg/ml Injection', '1+1+1, dshfbj s', 'jkhjkHjkhhhhk', '05/21/2018', '');

-- --------------------------------------------------------

--
-- Table structure for table `ipres`
--

CREATE TABLE IF NOT EXISTS `ipres` (
  `id` int(20) NOT NULL,
  `eid` int(6) NOT NULL,
  `dname` varchar(100) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `padd` varchar(200) NOT NULL,
  `page` int(3) NOT NULL,
  `psex` varchar(10) NOT NULL,
  `pmrn` int(20) NOT NULL,
  `pphone` varchar(100) NOT NULL,
  `pheight` varchar(20) NOT NULL,
  `pweight` varchar(20) NOT NULL,
  `ptemp` varchar(20) NOT NULL,
  `cdetails` varchar(1000) NOT NULL,
  `diagnosis` varchar(1000) NOT NULL,
  `xl` varchar(500) NOT NULL,
  `m1` varchar(200) NOT NULL,
  `m2` varchar(200) NOT NULL,
  `m3` varchar(500) NOT NULL,
  `m4` varchar(500) NOT NULL,
  `m5` varchar(500) NOT NULL,
  `m6` varchar(500) NOT NULL,
  `m7` varchar(500) NOT NULL,
  `m8` varchar(500) NOT NULL,
  `m9` varchar(500) NOT NULL,
  `m10` varchar(500) NOT NULL,
  `m11` varchar(500) NOT NULL,
  `m12` varchar(500) NOT NULL,
  `m13` varchar(500) NOT NULL,
  `m14` varchar(500) NOT NULL,
  `m15` varchar(500) NOT NULL,
  `m16` varchar(500) NOT NULL,
  `m17` varchar(500) NOT NULL,
  `m18` varchar(500) NOT NULL,
  `m19` varchar(500) NOT NULL,
  `m20` varchar(500) NOT NULL,
  `d1` varchar(500) NOT NULL,
  `d2` varchar(500) NOT NULL,
  `d3` varchar(500) NOT NULL,
  `d4` varchar(500) NOT NULL,
  `d5` varchar(500) NOT NULL,
  `d6` varchar(500) NOT NULL,
  `d7` varchar(500) NOT NULL,
  `d8` varchar(500) NOT NULL,
  `d9` varchar(500) NOT NULL,
  `d10` varchar(500) NOT NULL,
  `d11` varchar(500) NOT NULL,
  `d12` varchar(500) NOT NULL,
  `d13` varchar(500) NOT NULL,
  `d14` varchar(500) NOT NULL,
  `d15` varchar(500) NOT NULL,
  `d16` varchar(500) NOT NULL,
  `d17` varchar(500) NOT NULL,
  `d18` varchar(500) NOT NULL,
  `d19` varchar(500) NOT NULL,
  `d20` varchar(500) NOT NULL,
  `other` varchar(1000) NOT NULL,
  `date` varchar(20) NOT NULL,
  `pdiet` varchar(200) NOT NULL,
  `reffer` varchar(200) NOT NULL,
  `i1` varchar(500) NOT NULL,
  `i2` varchar(500) NOT NULL,
  `i3` varchar(500) NOT NULL,
  `i4` varchar(500) NOT NULL,
  `i5` varchar(500) NOT NULL,
  `i6` varchar(500) NOT NULL,
  `i7` varchar(500) NOT NULL,
  `i8` varchar(500) NOT NULL,
  `i9` varchar(500) NOT NULL,
  `i10` varchar(500) NOT NULL,
  `i11` varchar(500) NOT NULL,
  `i12` varchar(500) NOT NULL,
  `i13` varchar(500) NOT NULL,
  `i14` varchar(500) NOT NULL,
  `i15` varchar(500) NOT NULL,
  `i16` varchar(500) NOT NULL,
  `i17` varchar(500) NOT NULL,
  `i18` varchar(500) NOT NULL,
  `i19` varchar(500) NOT NULL,
  `i20` varchar(500) NOT NULL,
  `room` varchar(100) NOT NULL,
  `room1` varchar(100) NOT NULL,
  `discharge` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ipres`
--

INSERT INTO `ipres` (`id`, `eid`, `dname`, `pname`, `padd`, `page`, `psex`, `pmrn`, `pphone`, `pheight`, `pweight`, `ptemp`, `cdetails`, `diagnosis`, `xl`, `m1`, `m2`, `m3`, `m4`, `m5`, `m6`, `m7`, `m8`, `m9`, `m10`, `m11`, `m12`, `m13`, `m14`, `m15`, `m16`, `m17`, `m18`, `m19`, `m20`, `d1`, `d2`, `d3`, `d4`, `d5`, `d6`, `d7`, `d8`, `d9`, `d10`, `d11`, `d12`, `d13`, `d14`, `d15`, `d16`, `d17`, `d18`, `d19`, `d20`, `other`, `date`, `pdiet`, `reffer`, `i1`, `i2`, `i3`, `i4`, `i5`, `i6`, `i7`, `i8`, `i9`, `i10`, `i11`, `i12`, `i13`, `i14`, `i15`, `i16`, `i17`, `i18`, `i19`, `i20`, `room`, `room1`, `discharge`) VALUES
(73, 0, 'Dr. Rajeeb Hassan', 'Steven Adman Dias', '44/H, Indira Road, Farmgate, Dhaka, 1215', 31, 'MALE', 123456, '01711206048', '', '', '', '', '', '', 'Aceclofenac 100mg Tablet', 'A-Cerumen Ear Hygine 2ml', 'A-Cerumen Ear Hygine 2ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '1+1+1, dshfbj s', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/24/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Ward1', 'ICU01', 'Discharge Confirm'),
(74, 0, 'Dr. Ranen Biswas', 'Steven Adman Dias', '44/H, Indira Road, Farmgate, Dhaka, 1215', 31, 'MALE', 123456, '01711206048', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/25/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Ward1', 'w001', 'Discharge Confirm'),
(75, 0, 'Dr. Ranen Biswas', 'Steven Adman Dias', '44/H, Indira Road, Farmgate, Dhaka, 1215', 31, 'MALE', 123456, '01711206048', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/26/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Ward1', 'ICU01', 'Discharge Confirm'),
(76, 5, 'Dr. Rajeeb Hassan', 'Steven Adman Dias', '44/H, Indira Road, Farmgate, Dhaka, 1215', 31, 'MALE', 123456, '01711206048', '', '', '', '', '', '', '5%Dextrose+0.225%Sodium Chloride', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/27/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Ward1', 'ICU01', 'Discharge Confirm'),
(77, 1, 'Dr. Rajeeb Hassan', 'MERRY BAROI', '44/H, Indira Road, Farmgate, Dhaka, 1215', 767, 'FEMALE', 666988, '76786678', '', '', '', 'kjdskfjksdjfkl', 'uyiuy', '', '0.9% Sodium chloride IV Infusion 1000ml', '0.9% Sodium Chloride IV Infusion 500 ml', '0.9%Sodium Chloride+5%Dextrose  1000 ml', '10 % Dextrose IV Infusion 1000 ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/27/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Ward1', 'ICU01', 'Discharge Confirm'),
(78, 5, 'Dr. Ranen Biswas', 'Steven Adman Dias', '44/H, Indira Road, Farmgate, Dhaka, 1215', 31, 'MALE', 123456, '01711206048', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/28/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Ward1', 'w001', 'Discharge Confirm'),
(79, 1, 'Dr. Rajeeb Hassan', 'Kamal Khan', '44/H Indira Road, Dhaka', 65, 'MALE', 345678, '01711206048', '', '', '', '', '', '', 'Acetic Acid 5% Solution', 'Acitretin 10mg Capsule', 'Activated Charcoal 250 mg Tablet', '25% Dextrose 100 ml Infusion', '10% Fat Emulsion', '5%Composit Amino Acid+D-Sorbitol', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/27/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Ward1', 'ICU01', 'Discharge Confirm'),
(80, 1, 'Dr. J.M.Q. Quaser Alam', 'dias adman', 'HGJHGHJG', 767, 'MALE', 111222, '76786', '', '', '', '', '', '', 'Acetic Acid 5% Solution', 'Acitretin 10mg Capsule', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/27/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Ward2', 'w002', 'Discharge Confirm'),
(81, 1, 'Dr. Ranen Biswas', 'IIOUU', '998877', 87, 'MALE', 998877, '0325-293-5', '', '', '', '', '', '', '0.9% Sodium Chloride IV Infusion 500 ml', 'ABCDerma Hydrant', 'A-Cerumen Ear Hygine 2ml', '25% Dextrose 100 ml Infusion', '20% Mannitol 500ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/27/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Ward1', 'w001', 'Discharge Confirm'),
(82, 1, 'Dr. Ranen Biswas', 'LALALALA', 'sdbhf', 0, 'MALE', 999678, 'hjg', '', '', '', '', '', '', '20% Mannitol 500ml', '10%Dextrose+0.225%Sodium Chloride', 'A-Cerumen Ear Hygine 2ml', 'A-Cerumen Ear Hygine 2ml', 'Acitretin 10mg Capsule', 'Activated Charcoal 250 mg Tablet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/27/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Ward1', 'ICU01', 'Discharge Confirm'),
(83, 1, 'Dr. J.M.Q. Quaser Alam', 'vvvv', 'cccc', 0, 'MALE', 334442, 'hghjghj', '', '', '', '', '', '', '0.9%Sodium Chloride+5%Dextrose  1000 ml', 'Aceclofenac 100mg Tablet', 'Acetic Acid 5% Solution', '6%hydroxyethyl starch 500ml', '20% Mannitol 500ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/27/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Ward2', 'w002', 'Discharge Confirm'),
(84, 1, 'Dr. Ranen Biswas', 'BBBBB', 'jhjhj', 987, 'MALE', 222555, '987', '', '', '', '', '', '', '6%hydroxyethyl starch 500ml', '5 % Dextrose IV Infusion. 1000 ml', '25% Dextrose 100 ml Infusion', '10% Fat Emulsion', '20% Mannitol 500ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/28/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Ward1', 'w001', 'Discharge Confirm'),
(85, 1, 'Dr. Ranen Biswas', 'IUIUOIIUUIUOUIOUOUOUUIOUOUOU', 'JKHKJHHJKH', 8798, 'MALE', 995566, '98987987', '', '', '', '', '', '', 'A-Cerumen Ear Hygine 2ml', 'Aceclofenac 100mg Tablet', '6%hydroxyethyl starch 500ml', '10%Dextrose+0.225%Sodium Chloride', '20% Mannitol 500ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/28/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Ward1', 'ICU01', 'Discharge Confirm'),
(86, 1, 'Dr. Rajeeb Hassan', 'STEVE', 'MONIPURI PARA', 67, 'MALE', 654321, '01711206048', '', '', '', '', '', '', '0.9% Sodium chloride IV Infusion 1000ml', '0.9% Sodium Chloride IV Infusion 500 ml', '5%Composit Amino Acid+D-Sorbitol', '6%hydroxyethyl starch 500ml', '20% Mannitol 500ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/28/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Ward1', 'ICU01', 'Discharge Confirm'),
(87, 6, 'Dr. J.M.Q. Quaser Alam', 'Steven Adman Dias', '44/H, Indira Road, Farmgate, Dhaka, 1215', 31, 'MALE', 123456, '01711206048', '', '', '', '', '', 'BUN', 'Calcium 500mg + Vitamin D3 200iu Tablet', 'Budesonide 100mcg + Formoterol 6mcg cozycap', 'Bupivacaine 0.5 % Injection', 'Bupivacaine 0.5% + Dextrose 0.8% Injection', 'Calcium +Vitamin-D3 + Minerals', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '1+1+1, dshfbj s', '1+1+1, dshfbj s', '1+1+1, dshfbj s', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/29/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Ward1', 'ICU01', 'Discharge Confirm'),
(88, 1, 'Dr. J.M.Q. Quaser Alam', 'Jamal Uddin', '44/H, Indira Road', 45, 'MALE', 234567, '0325-293-5', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/29/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Ward2', 'w002', 'Discharge'),
(89, 1, 'Dr. J.M.Q. Quaser Alam', 'ARIF', 'LKJLKJLK', 98, 'MALE', 666555, '98797', '', '', '', '', '', '', 'Budesonide 0.5mg/2ml Neb/Soln.', 'Budesonide 0.1% nasal spray', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/29/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Ward1', 'w001', 'Discharge Confirm'),
(90, 1, 'Dr. Rajeeb Hassan', 'SUCCESS', 'COME LAST', 0, 'MALE', 334567, 'hjgjgjh', '', '', '', '', '', 'BUN,C4 (complement 4)', 'Brimonidine 0.2% + Timolol 0.5%  E/D', 'Budesonide 0.1% nasal spray', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/29/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Ward1', 'w001', '');

-- --------------------------------------------------------

--
-- Table structure for table `ipres1`
--

CREATE TABLE IF NOT EXISTS `ipres1` (
  `id` int(20) NOT NULL,
  `eid` int(6) NOT NULL,
  `dname` varchar(100) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `page` int(3) NOT NULL,
  `psex` varchar(10) NOT NULL,
  `pmrn` int(20) NOT NULL,
  `pphone` varchar(100) NOT NULL,
  `pheight` varchar(20) NOT NULL,
  `pweight` varchar(20) NOT NULL,
  `ptemp` varchar(20) NOT NULL,
  `cdetails` varchar(1000) NOT NULL,
  `diagnosis` varchar(1000) NOT NULL,
  `xl` varchar(500) NOT NULL,
  `m1` varchar(200) NOT NULL,
  `m2` varchar(200) NOT NULL,
  `m3` varchar(500) NOT NULL,
  `m4` varchar(500) NOT NULL,
  `m5` varchar(500) NOT NULL,
  `m6` varchar(500) NOT NULL,
  `m7` varchar(500) NOT NULL,
  `m8` varchar(500) NOT NULL,
  `m9` varchar(500) NOT NULL,
  `m10` varchar(500) NOT NULL,
  `m11` varchar(500) NOT NULL,
  `m12` varchar(500) NOT NULL,
  `m13` varchar(500) NOT NULL,
  `m14` varchar(500) NOT NULL,
  `m15` varchar(500) NOT NULL,
  `m16` varchar(500) NOT NULL,
  `m17` varchar(500) NOT NULL,
  `m18` varchar(500) NOT NULL,
  `m19` varchar(500) NOT NULL,
  `m20` varchar(500) NOT NULL,
  `d1` varchar(500) NOT NULL,
  `d2` varchar(500) NOT NULL,
  `d3` varchar(500) NOT NULL,
  `d4` varchar(500) NOT NULL,
  `d5` varchar(500) NOT NULL,
  `d6` varchar(500) NOT NULL,
  `d7` varchar(500) NOT NULL,
  `d8` varchar(500) NOT NULL,
  `d9` varchar(500) NOT NULL,
  `d10` varchar(500) NOT NULL,
  `d11` varchar(500) NOT NULL,
  `d12` varchar(500) NOT NULL,
  `d13` varchar(500) NOT NULL,
  `d14` varchar(500) NOT NULL,
  `d15` varchar(500) NOT NULL,
  `d16` varchar(500) NOT NULL,
  `d17` varchar(500) NOT NULL,
  `d18` varchar(500) NOT NULL,
  `d19` varchar(500) NOT NULL,
  `d20` varchar(500) NOT NULL,
  `other` varchar(1000) NOT NULL,
  `date` varchar(20) NOT NULL,
  `pdiet` varchar(200) NOT NULL,
  `reffer` varchar(200) NOT NULL,
  `i1` varchar(500) NOT NULL,
  `i2` varchar(500) NOT NULL,
  `i3` varchar(500) NOT NULL,
  `i4` varchar(500) NOT NULL,
  `i5` varchar(500) NOT NULL,
  `i6` varchar(500) NOT NULL,
  `i7` varchar(500) NOT NULL,
  `i8` varchar(500) NOT NULL,
  `i9` varchar(500) NOT NULL,
  `i10` varchar(500) NOT NULL,
  `i11` varchar(500) NOT NULL,
  `i12` varchar(500) NOT NULL,
  `i13` varchar(500) NOT NULL,
  `i14` varchar(500) NOT NULL,
  `i15` varchar(500) NOT NULL,
  `i16` varchar(500) NOT NULL,
  `i17` varchar(500) NOT NULL,
  `i18` varchar(500) NOT NULL,
  `i19` varchar(500) NOT NULL,
  `i20` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ipres1`
--

INSERT INTO `ipres1` (`id`, `eid`, `dname`, `pname`, `page`, `psex`, `pmrn`, `pphone`, `pheight`, `pweight`, `ptemp`, `cdetails`, `diagnosis`, `xl`, `m1`, `m2`, `m3`, `m4`, `m5`, `m6`, `m7`, `m8`, `m9`, `m10`, `m11`, `m12`, `m13`, `m14`, `m15`, `m16`, `m17`, `m18`, `m19`, `m20`, `d1`, `d2`, `d3`, `d4`, `d5`, `d6`, `d7`, `d8`, `d9`, `d10`, `d11`, `d12`, `d13`, `d14`, `d15`, `d16`, `d17`, `d18`, `d19`, `d20`, `other`, `date`, `pdiet`, `reffer`, `i1`, `i2`, `i3`, `i4`, `i5`, `i6`, `i7`, `i8`, `i9`, `i10`, `i11`, `i12`, `i13`, `i14`, `i15`, `i16`, `i17`, `i18`, `i19`, `i20`) VALUES
(61, 0, 'Dr. Rajeeb Hassan', 'Steven Adman Dias', 31, 'MALE', 123456, '01711206048', '05/21/2018', 'Ward1', 'ICU01', '6', '87676', '', 'Acitretin 10mg Capsule', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/21/2018', '', '', 'HHKJHKH', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(62, 0, 'Dr. Ranen Biswas', 'Jamal Uddin', 45, 'MALE', 234567, '0325-293-5', '05/21/2018', 'Ward1', 'ICU01', '86', '686', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/21/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(63, 0, 'Dr. Ranen Biswas', 'Steven Adman Dias', 31, 'MALE', 123456, '01711206048', '05/20/2018', 'Ward2', 'w002', 'jkhhj', 'khjk', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/20/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(64, 0, 'Dr. Ranen Biswas', 'Steven Adman Dias', 31, 'MALE', 123456, '01711206048', '05/23/2018', 'Ward2', 'w002', '77', '8789', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/23/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(65, 0, 'Dr. Ranen Biswas', 'Jamal Uddin', 45, 'MALE', 234567, '0325-293-5', '05/24/2018', 'Ward1', 'ICU01', 'hhb', 'hjgjkj', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/24/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(66, 0, 'Dr. J.M.Q. Quaser Alam', 'Kamal Khan', 65, 'MALE', 345678, '01711206048', '05/21/2018', 'Ward1', 'ICU01', 'iou', 'disjfij', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/21/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(67, 0, 'Dr. Rajeeb Hassan', 'Kamal Khan', 65, 'MALE', 345678, '01711206048', '05/22/2018', 'Ward1', 'ICU01', '898789', '7789', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/22/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(68, 0, 'Dr. Rajeeb Hassan', 'Steven Adman Dias', 31, 'MALE', 123456, '01711206048', '05/22/2018', 'Ward3', 'CCU01', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/22/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(69, 0, 'Dr. Rajeeb Hassan', 'Jamal Uddin', 45, 'MALE', 234567, '0325-293-5', '05/26/2018', 'Ward3', 'CCU01', 'sdfljsdlkf ksdjfkljsdklfjsd fjsdf jksdj fjsd jfjdsfj k sdjfjsjd flj sdl jflksdjf jlksdjf jsdkjfjds lf jsdlk jfl jdsljf lsd jlkfjsdl fjsdlf jsdlkj fl jsdl fjlsdjfl dslkj flsd jlfj sdlkj fl jsdl', 'dshfk sdfh sdhfsd hkjf hsdk fsdhfkjhsdkjhf ksdhf hdfh sd f gsdjf gsd gfjgdsjhfgsu f f gsdj gsd gf gdsjf gd gf dfg sdjhf gd gfd sgf gsd gfsd gjf s gf sdf g sdf sd ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/26/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(70, 0, 'Dr. Rajeeb Hassan', 'Kamal Khan', 65, 'MALE', 345678, '01711206048', '05/25/2018', 'Ward3', 'CCU01', 'hghjg gh gghj gh jg jhghjg', 'ghgjhg hghjg hg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/25/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(71, 0, 'Dr. J.M.Q. Quaser Alam', 'IIOUU', 87, 'MALE', 998877, '0325-293-5', '05/22/2018', 'Ward1', 'w001', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/22/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(72, 0, 'Dr. Ranen Biswas', 'Kamal Khan', 65, 'MALE', 345678, '01711206048', '05/26/2018', 'Ward3', 'CCU01', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/26/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(73, 0, 'Dr. Rajeeb Hassan', 'Steven Adman Dias', 31, 'MALE', 123456, '01711206048', '05/24/2018', 'Ward1', 'ICU01', 'jkj', 'kjk', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/24/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(74, 0, 'Dr. Ranen Biswas', 'Jamal Uddin', 45, 'MALE', 234567, '0325-293-5', '06/15/2018', 'Ward1', 'ICU01', 'jh sdjfh djh dsj fdh ds hfjdhfj sdfh df sdfh dsfhsdf  dfd sf hsdf hjdshfjd fhsdjh fjs dhjf hdsjfhds fjds fjdsjfhsdjhfhdsfh sdjhfdfj dfd sf hsdf hjdshfjd fhsdjh fjs dhjf hdsjfhds fjds fjdsjfhsdjhfhdsfh sdjhfdfj jh sdjfh djh dsj fdh ds hfjdhfj sdfh df sdfh dsfhsdf  dfd sf hsdf hjdshfjd fhsdjh fjs dhjf hdsjfhds fjds fjdsjfhsdjhfhdsfh sdjhfdfj dfd sf hsdf hjdshfjd fhsdjh fjs dhjf hdsjfhds fjds fjdsjfhsdjhfhdsfh sdjhfdfj', 'jh sdjfh djh dsj fdh ds hfjdhfj sdfh df sdfh dsfhsdf  dfd sf hsdf hjdshfjd fhsdjh fjs dhjf hdsjfhds fjds fjdsjfhsdjhfhdsfh sdjhfdfjjh sdjfh djh dsj fdh ds hfjdhfj sdfh df sdfh dsfhsdf  dfd sf hsdf hjdshfjd fhsdjh fjs dhjf hdsjfhds fjds fjdsjfhsdjhfhdsfh sdjhfdfj', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '06/15/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(75, 0, 'Dr. Rajeeb Hassan', 'Steven Adman Dias', 31, 'MALE', 123456, '01711206048', '05/21/2018', 'Ward1', 'w001', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/21/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(76, 0, 'Dr. Rajeeb Hassan', 'Steven Adman Dias', 31, 'MALE', 123456, '01711206048', '05/24/2018', 'Ward1', 'ICU01', '', '', '', 'Aceclofenac 100mg Tablet', 'A-Cerumen Ear Hygine 2ml', 'A-Cerumen Ear Hygine 2ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '1+1+1, dshfbj s', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/24/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(77, 0, 'Dr. Ranen Biswas', 'Steven Adman Dias', 31, 'MALE', 123456, '01711206048', '05/26/2018', 'Ward1', 'ICU01', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/26/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(78, 0, 'Dr. Rajeeb Hassan', 'Steven Adman Dias', 31, 'MALE', 123456, '01711206048', '05/27/2018', 'Ward1', 'ICU01', '', '', '', '5%Dextrose+0.225%Sodium Chloride', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/27/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(79, 1, 'Dr. Rajeeb Hassan', 'MERRY BAROI', 767, 'FEMALE', 666988, '76786678', '05/27/2018', 'Ward1', 'ICU01', 'kjdskfjksdjfkl', 'uyiuy', '', '0.9% Sodium chloride IV Infusion 1000ml', '0.9% Sodium Chloride IV Infusion 500 ml', '0.9%Sodium Chloride+5%Dextrose  1000 ml', '10 % Dextrose IV Infusion 1000 ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/27/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(80, 5, 'Dr. Ranen Biswas', 'Steven Adman Dias', 31, 'MALE', 123456, '01711206048', '05/28/2018', 'Ward1', 'w001', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/28/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(81, 1, 'Dr. Rajeeb Hassan', 'Kamal Khan', 65, 'MALE', 345678, '01711206048', '05/27/2018', 'Ward1', 'ICU01', '', '', '', 'Acetic Acid 5% Solution', 'Acitretin 10mg Capsule', 'Activated Charcoal 250 mg Tablet', '25% Dextrose 100 ml Infusion', '10% Fat Emulsion', '5%Composit Amino Acid+D-Sorbitol', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/27/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(82, 1, 'Dr. J.M.Q. Quaser Alam', 'dias adman', 767, 'MALE', 111222, '76786', '05/27/2018', 'Ward2', 'w002', '', '', '', 'Acetic Acid 5% Solution', 'Acitretin 10mg Capsule', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/27/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(83, 1, 'Dr. J.M.Q. Quaser Alam', 'dias adman', 767, 'MALE', 111222, '76786', '05/27/2018', 'Ward2', 'w002', '', '', '', 'Acetic Acid 5% Solution', 'Acitretin 10mg Capsule', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/27/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(84, 1, 'Dr. Ranen Biswas', 'IIOUU', 87, 'MALE', 998877, '0325-293-5', '05/27/2018', 'Ward1', 'w001', '', '', '', '0.9% Sodium Chloride IV Infusion 500 ml', 'ABCDerma Hydrant', 'A-Cerumen Ear Hygine 2ml', '25% Dextrose 100 ml Infusion', '20% Mannitol 500ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/27/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(85, 1, 'Dr. Ranen Biswas', 'LALALALA', 0, 'MALE', 999678, 'hjg', '05/27/2018', 'Ward1', 'ICU01', '', '', '', '20% Mannitol 500ml', '10%Dextrose+0.225%Sodium Chloride', 'A-Cerumen Ear Hygine 2ml', 'A-Cerumen Ear Hygine 2ml', 'Acitretin 10mg Capsule', 'Activated Charcoal 250 mg Tablet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/27/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(86, 1, 'Dr. J.M.Q. Quaser Alam', 'vvvv', 0, 'MALE', 334442, 'hghjghj', '05/27/2018', 'Ward2', 'w002', '', '', '', 'ABCDerma Hydrant', 'Acetic Acid 5% Solution', '6%hydroxyethyl starch 500ml', '5 % Dextrose IV Infusion. 1000 ml', '20% Mannitol 500ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/27/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(87, 1, 'Dr. J.M.Q. Quaser Alam', 'vvvv', 0, 'MALE', 334442, 'hghjghj', '05/27/2018', 'Ward2', 'w002', '', '', '', '0.9%Sodium Chloride+5%Dextrose  1000 ml', 'Aceclofenac 100mg Tablet', 'Acetic Acid 5% Solution', '6%hydroxyethyl starch 500ml', '20% Mannitol 500ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/27/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(88, 1, 'Dr. Ranen Biswas', 'BBBBB', 987, 'MALE', 222555, '987', '05/28/2018', 'Ward1', 'w001', '', '', '', '6%hydroxyethyl starch 500ml', '5 % Dextrose IV Infusion. 1000 ml', '25% Dextrose 100 ml Infusion', '10% Fat Emulsion', '20% Mannitol 500ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/28/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(89, 1, 'Dr. Ranen Biswas', 'IUIUOIIUUIUOUIOUOUOUUIOUOUOU', 8798, 'MALE', 995566, '98987987', '05/28/2018', 'Ward1', 'ICU01', '', '', '', 'A-Cerumen Ear Hygine 2ml', 'Aceclofenac 100mg Tablet', '6%hydroxyethyl starch 500ml', '10%Dextrose+0.225%Sodium Chloride', '20% Mannitol 500ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/28/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(90, 1, 'Dr. Rajeeb Hassan', 'STEVE', 67, 'MALE', 654321, '01711206048', '05/28/2018', 'Ward1', 'ICU01', '', '', '', '0.9% Sodium chloride IV Infusion 1000ml', '0.9% Sodium Chloride IV Infusion 500 ml', '5%Composit Amino Acid+D-Sorbitol', '6%hydroxyethyl starch 500ml', '20% Mannitol 500ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/28/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(91, 6, 'Dr. J.M.Q. Quaser Alam', 'Steven Adman Dias', 31, 'MALE', 123456, '01711206048', '05/29/2018', 'Ward1', 'ICU01', '', '', 'BUN', 'Calcium 500mg + Vitamin D3 200iu Tablet', 'Budesonide 100mcg + Formoterol 6mcg cozycap', 'Bupivacaine 0.5 % Injection', 'Bupivacaine 0.5% + Dextrose 0.8% Injection', 'Calcium +Vitamin-D3 + Minerals', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '1+1+1, dshfbj s', '1+1+1, dshfbj s', '1+1+1, dshfbj s', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/29/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(92, 1, 'Dr. J.M.Q. Quaser Alam', 'Jamal Uddin', 45, 'MALE', 234567, '0325-293-5', '05/29/2018', 'Ward2', 'w002', '', '', '', 'Calcitriol 0.25mcg Capsule', 'Bosentan 62.5mg Tablet', 'Bupivacaine 0.5 % Injection', 'Cabergoline 0.5mg Tablet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/29/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(93, 1, 'Dr. J.M.Q. Quaser Alam', 'Jamal Uddin', 45, 'MALE', 234567, '0325-293-5', '05/29/2018', 'Ward2', 'w002', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/29/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(94, 1, 'Dr. J.M.Q. Quaser Alam', 'Jamal Uddin', 45, 'MALE', 234567, '0325-293-5', '05/29/2018', 'Ward2', 'w002', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/29/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(95, 1, 'Dr. J.M.Q. Quaser Alam', 'ARIF', 98, 'MALE', 666555, '98797', '05/29/2018', 'Ward1', 'w001', '', '', '', 'Budesonide 0.5mg/2ml Neb/Soln.', 'Budesonide 0.1% nasal spray', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/29/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(96, 1, 'Dr. Rajeeb Hassan', 'SUCCESS', 0, 'MALE', 334567, 'hjgjgjh', '05/29/2018', 'Ward1', 'w001', '', '', 'BUN,C4 (complement 4)', 'Brimonidine 0.2% + Timolol 0.5%  E/D', 'Budesonide 0.1% nasal spray', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/29/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `itest`
--

CREATE TABLE IF NOT EXISTS `itest` (
  `id` int(6) NOT NULL,
  `dname` varchar(100) NOT NULL,
  `ddate` varchar(100) NOT NULL,
  `dslot` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=264 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE IF NOT EXISTS `medicine` (
  `id` int(10) NOT NULL,
  `mname` varchar(200) NOT NULL,
  `brand1` varchar(100) NOT NULL,
  `brand2` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=711 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`id`, `mname`, `brand1`, `brand2`) VALUES
(1, 'mname', 'brand1', 'brand2'),
(2, 'Calcium Acetate 667mg Tablet', 'Hypophos', 'POPULAR'),
(3, 'Desvenlafaxine 50mg Tablet', 'Hapytab', 'SKF'),
(4, 'Fenofibrate 200mg Capsule', 'Lofat', 'BEXIMCO'),
(5, 'Glycine1.5% irrigation solution', 'Irigon', 'BEXIMCO'),
(6, 'Human Insulin 30/70 Penset', 'Maxsulin 30/70', 'INCEPTA'),
(7, 'Human Insulin 50/50 Penset', 'Maxsulin 50/50', 'INCEPTA'),
(8, 'Indepamide 1.5mg Tablet', 'Indelix SR', 'BEXIMCO'),
(9, 'ketotifen 0.025 % E/D', 'Alarid', 'SQUARE'),
(10, 'Levothyroxine 50mcg Tablet', 'Thyrox 50', 'RENATA'),
(11, 'Loteprednol 0.5 % E/D(gel)', 'Lotepred', 'ARISTOPHARMA'),
(12, 'Meningococcal Polysaccharide vaccine', 'Ingovax ACWY', 'INCEPTA'),
(13, 'Metformin 750mg Tablet', 'Informet LA', 'BEXIMCO'),
(14, 'Ondansetron 4mg/5ml Oran Solution', 'Emistat', 'HEALTHCARE'),
(15, 'Propranolol 10 mg Tablet', 'Indever 10', 'ACI'),
(16, '5%Dextrose 5% + Sodium Chloride 0.225%', 'Dextrosal Baby', 'ORION'),
(17, 'ABCDerma Hydratant', 'ABCDerma Hydratant', 'UNIMED'),
(18, 'Aceclofenac 100mg Tablet', 'Flexi 100', 'SQUARE'),
(19, 'Aceclofenac 200mg Tablet', 'Flexi SR 200', 'SQUARE'),
(20, 'A-Cerumen Ear Hygine solution 2ml', 'A-Cerumen', 'RENATA'),
(21, 'Acetic Acid 5% Solution', 'Acetic Acid', ''),
(22, 'Acetylcysteine 600mg Tablet', 'Mucomist-DT', 'BEXIMCO'),
(23, 'Acitretin 10mg Capsule', 'Soritec', 'ACI'),
(24, 'Activated Charcoal 250 mg Tablet', 'Ultracarbon', ''),
(25, 'Acyclovir 200mg Tablet', 'Virux 200', 'SQUARE'),
(26, 'Acyclovir 200mg/5ml Suspension', 'Virux', 'SQUARE'),
(27, 'Acyclovir 250mg injection', 'Virux 250', 'SQUARE'),
(28, 'Acyclovir 400mg Tablet', 'Novirux 400', 'DRUG'),
(29, 'Acyclovir 500mg Injection', 'Virux 500', 'SQUARE'),
(30, 'Adenosine  6mg/2ml? Injection', 'Adecard', 'POPULAR'),
(31, 'Adhatoda Vasica extract + Honey Syrup', 'Honeybas Syrup', 'ACME'),
(32, 'Adrenaline 1 mg/ml Injection', 'Adrinor', 'INCEPTA'),
(33, 'Albendazole 200 mg/5ml  Suspension', 'Alben', 'SKF'),
(34, 'Albendazole 400 mgTablet', 'Alben-DS', 'SKF'),
(35, 'Albumin 20% 100ml', 'Albunorm ', 'Discount'),
(36, 'Albumin 20% 50ml', 'Albunorm ', 'Discount'),
(37, 'Alfuzosin 10 mg Tablet', 'Zatral', 'SKF'),
(38, 'Aluminium Hydroxide 175mg + Magnesium Hydroxide 225mg /5mlSuspension', '', ''),
(39, 'Aluminium Hydroxide 200mg + Magnesium Hydroxide 400mg + Simethicone 30mg /5mlSuspension', 'Entacyd plus', 'SQUARE'),
(40, 'Aluminium Hydroxide 425.53mg + Magnesium Hydroxide 400mg + Simethicone 30mg Tablet', 'Antacid Max', 'BEXIMCO'),
(41, 'Alzesartan 40 mg Tablet', 'Azisan 40', 'RENATA'),
(42, 'Ambrisentan 5mg Tablet', 'Ambrisan 5', 'SQUARE'),
(43, 'Ambroxol 15mg/5ml syrup', 'Ambrox', 'SQUARE'),
(44, 'Ambroxol 6mg/ml Paediatric Drop', 'Mucosol', 'BEXIMCO'),
(45, 'Aminophylline 125 mg/5ml injection', 'Filin', 'JAYSON'),
(46, 'Amiodarone 100 mg Tablet', 'Pacet 100', 'BEXIMCO'),
(47, 'Amiodarone 150 mg/3ml injection', 'Duron', 'ZAS'),
(48, 'Amiodarone 200 mg Tablet', 'Pacet 200', 'BEXIMCO'),
(49, 'Amitriptyline 10 mg Tablet', 'Tryptin-10', 'SQUARE'),
(50, 'Amitriptyline 25 mg Tablet', 'Tryptin-25', 'SQUARE'),
(51, 'Amlodipine 10 mg Tablet', 'Amdocal 10', 'BEXIMCO'),
(52, 'Amlodipine 5 mg Tablet', 'Amdocal 5', 'BEXIMCO'),
(53, 'Amlodipine 5mg  + Olmesartan 20mg Tablet', 'Bizoran 5/20', 'BEXIMCO'),
(54, 'Amlodipine 5mg  + Olmesartan 40mg Tablet', 'Bizoran 5/40', 'BEXIMCO'),
(55, 'Amlodipine 5mg + Atenolol 50mg Tablet', 'Amdocal Plus 50', 'BEXIMCO'),
(56, 'Amlodipine 5mg + Atorvastatin 10mg Tablet', 'Amdova Tab', 'BEXIMCO'),
(57, 'Amlodipine 5mg + Valsartan 160mg Tablet', 'Co-Dysis', 'HEALTHCARE'),
(58, 'Amlodipine 5mg + Valsartan 80 mg Tablet', 'Amlosartan', 'INCEPTA'),
(59, 'Amoxicillin  250 mg Tablet', 'Bactamox ', 'RENATA'),
(60, 'Amoxicillin  500 mg Tablet', 'Bactamox ', 'RENATA'),
(61, 'Amoxicillin 125mg + Clavulanic Acid 31.25mg PFS', 'Tyclav', 'BEXIMCO'),
(62, 'Amoxicillin 125mg/5ml PFS', 'Tycil', 'BEXIMCO'),
(63, 'Amoxicillin 1gm + Clavulanic Acid 0.2gm Injection', 'Fimoxyclav', 'BEXIMCO'),
(64, 'Amoxicillin 1gm + Lansoprazole 30mg + Clarithromycin 500mg kit', 'Pylotrip', 'SQUARE'),
(65, 'Amoxicillin 250 mg Capsule', 'Tycil', 'BEXIMCO'),
(66, 'Amoxicillin 250mg + Clavulanic Acid 125mg Tablet', 'Moxaclav', 'SQUARE'),
(67, 'Amoxicillin 250mg + Clavulanic Acid 31.25mg PFS', 'Moxaclav Forte', 'SQUARE'),
(68, 'Amoxicillin 400mg + Clavulanic Acid 57.5mg PFS', 'Tyclav BID', 'BEXIMCO'),
(69, 'Amoxicillin 500 mg Capsule', 'Tycil', 'BEXIMCO'),
(70, 'Amoxicillin 500mg + Clavulanic Acid 100mg Injection', 'Moxaclav', 'SQUARE'),
(71, 'Amoxicillin 500mg + Clavulanic Acid 125mg Tablet', 'Tyclav 625', 'BEXIMCO'),
(72, 'Amoxicillin 500mg injection', 'Moxacil 500', 'SQUARE'),
(73, 'Amoxicillin 875mg + Clavulanic Acid 125mg Tablet', 'Tyclav', 'BEXIMCO'),
(74, 'Ampicillin 250 mg Injection', 'Ampexin 250', 'OPSONIN'),
(75, 'Ampicillin 500mg Injection', 'Ampexin 500', 'OPSONIN'),
(76, 'Artemether 20mg + Lumefantrine 120mg Tablet', 'Lumertam', 'INCEPTA'),
(77, 'Ascorbic Acid 500mg Injection', 'Ascoson', 'JAYSON'),
(78, 'Aspirin 75 mg Tablet', 'Ecospirin', 'ACME'),
(79, 'Astaxanthin 2mg  Capsule', 'Astagen 2', 'GENERAL'),
(80, 'Astaxanthin 4mg  Capsule', 'Zanthin 4', 'SQUARE'),
(81, 'Atorvastatin 10mg  Tablet', 'Atova 10', 'BEXIMCO'),
(82, 'Atorvastatin 20 mg  Tablet', 'Atova 20', 'BEXIMCO'),
(83, 'Atracurium 10 mg injection', 'Tracrium', 'GSK'),
(84, 'Atropine Sulphate 0.6mg/ml injection', 'Atropine-Jayson', 'JAYSON'),
(85, 'Azelastine+Fluticasone nasal spray', 'Flonasin', 'SQUARE'),
(86, 'Azithromycin 200mg/5ml PFS', 'Zimax', 'SQUARE'),
(87, 'Azithromycin 250mg Tablet', 'Zimax', 'SQUARE'),
(88, 'Azithromycin 500 mg Tablet', 'Azithrocin', 'BEXIMCO'),
(89, 'Azithromycin 500mg injection', 'Azithrocin', 'BEXIMCO'),
(90, 'Benzoic Acid 6% + Salicylic Acid 3% ointment', 'Whitfield', ''),
(91, 'Betahistine 16 mg Tablet', 'Menaril', 'INCEPTA'),
(92, 'Betahistine 8 mg Tablet', 'Menaril', 'INCEPTA'),
(93, 'Betamethasone 0.01% Ointment', 'Bet-A', 'ACME'),
(94, 'Betamethasone 0.05% Ointment', 'Diprobet', 'SQUARE'),
(95, 'Bimatoprost 0.03% E/D', 'Lumigan', 'SKF'),
(96, 'Biotin 1000mcg Tablet', 'Floriz', 'ZAS'),
(97, 'Bisoprolol 2. 5mg Tablet', 'Bislol', 'OPSONIN'),
(98, 'Bisoprolol 5mg Tablet', 'Bislol', 'OPSONIN'),
(99, 'Boric Powder', 'Boric Powder', ''),
(100, 'Bosentan 62.5mg Tablet', 'Pulmoten', 'UNIMED'),
(101, 'Brimonidine 0.2% + Timolol 0.5%  E/D', 'Brimopres', 'POPULAR'),
(102, 'Brinzolamide 1% E/D', 'Benozol', 'POPULAR'),
(103, 'Bromazepam 3 mg Tablet', 'Norry', 'RENATA'),
(104, 'Bromfenac 0.09% E/D', 'Xirom', 'ARISTOPHARMA'),
(105, 'Budesonide 0.1% nasal spray', 'Budicort N/S', 'INCEPTA'),
(106, 'Budesonide 0.5mg/2ml Neb/Soln.', 'Budicort', 'INCEPTA'),
(107, 'Budesonide 100mcg + Formoterol 6mcg cozycap', 'Symbion Bexicap', 'BEXIMCO'),
(108, 'Budesonide 200mcg + Formoterol 6mcg cozycap', 'Symbion Bexicap', 'BEXIMCO'),
(109, 'Bupivacaine 0.5 % Injection', 'Bupi', 'POPULAR'),
(110, 'Bupivacaine 0.5% + Dextrose 0.8% Injection', 'Bupi Heavy', 'POPULAR'),
(111, 'Butamirate Citrate 7.5mg/5ml Syrup', 'Miraten', 'SKF'),
(112, 'Cabergoline 0.5mg Tablet', 'Cabergol', 'POPULAR'),
(113, 'Calcitriol 0.25mcg Capsule', 'Dicaltrol', 'DRUG'),
(114, 'Calcium +Vitamin-D3 + Minerals', 'Aristocal M', 'BEXIMCO'),
(115, 'Calcium 500mg + Vitamin D3 200iu Tablet', 'Rocal-D', 'HEALTHCARE'),
(116, 'Calcium 600mg + Vitamin D3 400iu Tablet', 'Ostocal DX', 'SKF'),
(117, 'Calcium Carbonate 500mg Tablet', 'Sandocal', 'NOVARTIS'),
(118, 'Calcium Citrate 252mg + Calcitriol 0.25mcg Tablet', 'Dicaltrol Plus', 'DRUG'),
(119, 'Calcium Gluconate 10 % Injection', 'Calcium Jayson', 'JAYSON'),
(120, 'Calcium Orotate 400 mg Tablet', 'Calcin O', 'RENATA'),
(121, 'Calcium Orotate 740 mg Tablet', 'Calorate', 'BEXIMCO'),
(122, 'Calcium Resonium Powder', 'Kayexalate', 'ZAS'),
(123, 'Canagliflozin 100mg Tablet', 'Diacana ', 'JMI'),
(124, 'Captopril 25 mg Tablet', 'Cardopril', 'BEXIMCO'),
(125, 'Carbamazepine 200mg Tablet', 'Epilep CR', 'BEXIMCO'),
(126, 'Carbonyl Iron + Folic Acid + Zinc Capsule', 'Zif-CI/Ferix', 'SQUARE/Opsonin'),
(127, 'Carboxy Methyl Cellulose E/Gel', 'TearFresh liquigel', 'GENERAL'),
(128, 'Carboxymethylcellulose + Glycerin E/D', 'Neotear', 'ARISTOPHARMA'),
(129, 'Carboxymethylcellulose sodium 1% E/D', 'Lubgel', 'SQUARE'),
(130, 'Carvedilol 6.25mg Tablet', 'Dilatrend', 'RADIANT'),
(131, 'Cefepime 2gm Injection', 'Ceftipime', 'RENATA'),
(132, 'Cefepime 500mg Injection', 'Tetracef', 'BEXIMCO'),
(133, 'Cefixime 100mg/5ml PFS', 'Denver', 'HEALTHCARE'),
(134, 'Cefixime 200 Capsule', 'Triocim ', 'BEXIMCO'),
(135, 'Cefixime 200mg Tablet', 'Ceftid', 'OPSONIN'),
(136, 'Cefixime 200mg/5ml PFS', 'Cef-3 Forte', 'SQUARE'),
(137, 'Cefixime 400mg Capsule', 'Triocim ', 'BEXIMCO'),
(138, 'Cefixime 400mg Tablet', 'Ceftid', 'OPSONIN'),
(139, 'Cefotaxime 1gm Injection', 'Cefotax', 'RENATA'),
(140, 'Cefotaxime 250mg Injection', 'Maxcef', 'SQUARE'),
(141, 'Cefpodoxime 20mg/ml Paed.Drop', 'Vercef', 'BEXIMCO'),
(142, 'Cefpodoxime 40mg/5ml PFS', 'Vercef', 'BEXIMCO'),
(143, 'Ceftazidime 1gm Injection', 'Maxidim', 'BEXIMCO'),
(144, 'Ceftazidime 250mg Injection', 'Tazid', 'SQUARE'),
(145, 'Ceftazidime 500mg Injection', 'Cefazid', 'RENATA'),
(146, 'Ceftriaxone 1gm IV Injection', 'Arixon ', 'BEXIMCO'),
(147, 'Ceftriaxone 2 gm IV Injection', 'Triject', 'SKF'),
(148, 'Ceftriaxone 500 iv injection', 'Arixon ', 'BEXIMCO'),
(149, 'Cefuroxime 1.5gm Injection', 'Furocef', 'RENATA'),
(150, 'Cefuroxime 250 mg Tablet', 'Kilmax', 'SKF'),
(151, 'Cefuroxime 250mg + Clavulanic Acid 62.5mg Tablet', 'Cefotil Plus', 'SQUARE'),
(152, 'Cefuroxime 500mg + Clavulanic Acid 125mg Tablet', 'Furoclav', 'RENATA'),
(153, 'Cefuroxime 500mg Tablet', 'Turbocef', 'BEXIMCO'),
(154, 'Cefuroxime 750mg Injection', 'Furocef', 'RENATA'),
(155, 'Celecoxib 100 mg Capsule', 'Celenta', 'INCEPTA'),
(156, 'Cephradine 100mg/ml Paed.Drop', 'Intracef', 'BEXIMCO'),
(157, 'Cephradine 125mg/5ml PFS', 'Intracef', 'BEXIMCO'),
(158, 'Cephradine 500 Injection', 'Procef', 'INCEPTA'),
(159, 'Cephradine 500mg Capsule', 'Sefrad', 'SANOFI'),
(160, 'Cetirizine 5mg/5ml Syrup', 'Alatrol', 'SQUARE'),
(161, 'Chloramphenicol 0.5% E/D', 'Aristophen', 'ARISTOPHARMA'),
(162, 'Chloramphenicol 0.5% Eye Ointment', 'A-phenicol', 'ACME'),
(163, 'Chloramphenicol+Beclomethasone+Clotrimazole+Lidocaine Ear Drop', 'Candibiotic', 'RADIANT'),
(164, 'Chlordiazepoxide 5mg + Amitriptyline 12.5mg Tablet', 'Reelife', 'SKF'),
(165, 'Chlorhexidine 0.5% in 70% IPA 250ml', 'Handiwash', 'GENERAL'),
(166, 'Chlorhexidine 0.5% in 70% IPA 50ml', 'Hexisol', 'ACI'),
(167, 'Chlorhexidine gluconate 0.2% Mouthwash', 'Oralon', 'ACI'),
(168, 'Chlorhexidine Gluconate 7.1% Solution', 'Hexicord', 'ACI'),
(169, 'Chlorinated water', 'Eusol', ''),
(170, 'Chlorpheniramine Maleate 2mg/5ml Syrup', 'Piriton', 'GSK'),
(171, 'Chlorpheniramine Maleate 4mg Tablet', 'Piriton', 'GSK'),
(172, 'Cholera Saline 1000ml', 'Koloride', 'BEXIMCO'),
(173, 'Cholera Saline 500ml', 'Koloride', 'BEXIMCO'),
(174, 'Cildipine 5mg Tablet', 'Cildip', 'OPSONIN'),
(175, 'Cilostazol 100mg Tablet', 'Cilosta', 'SQUARE'),
(176, 'Cinarizine 15 mg Tablet', 'Cinaron ', 'SQUARE'),
(177, 'Cinarizine 20mg + Dimenhydrinate 40mg Tablet', 'Cinaron Plus', 'SQUARE'),
(178, 'Ciprofloxacin 0.3 % E/D', 'Ciprocin', 'SQUARE'),
(179, 'Ciprofloxacin 0.3% + Dexamethasone 0.1% E/D', 'Beuflox D', 'INCEPTA'),
(180, 'Ciprofloxacin 0.3% + Hydrocortisone 1% Ear Drop', 'Ciprocort', 'DRUG'),
(181, 'Ciprofloxacin 0.3% E/oint', 'Aprocin   ', 'ARISTOPHARMA'),
(182, 'Ciprofloxacin 200mg IV infusion', 'Neofloxin ', 'BEXIMCO'),
(183, 'Ciprofloxacin 250 tablet', 'Ciprocin', 'SQUARE'),
(184, 'Ciprofloxacin 500mg tablet', 'Neofloxin ', 'BEXIMCO'),
(185, 'Ciprofloxacin0.3%+Hydrocortisone1% E/E Drop ', 'Ciprocort', 'DRUG'),
(186, 'Citric Acid Solution', 'Citric Acid', ''),
(187, 'Clarithromycin 125/5ml Suspension', 'Binoclar/Klabid', 'UNIMED'),
(188, 'Clarithromycin 500mg Tablet', 'Binoclar/Klabid', 'UNIMED'),
(189, 'Clindamycin 150mg Capsule', 'Clindax', 'OPSONIN'),
(190, 'Clindamycin 300mg Capsule', 'Clindax', 'OPSONIN'),
(191, 'Clindamycin 300mg Injection', 'Clindax', 'OPSONIN'),
(192, 'Clindamycin 600mg Injection', 'Clindax', 'OPSONIN'),
(193, 'Clonazepam 0.5 mg  Tablet', 'Rivotril', 'RADIANT'),
(194, 'Clonazepam 1mg  Tablet', 'Pase', 'OPSONIN'),
(195, 'Clonazepam 2mg  Tablet', 'Pase', 'OPSONIN'),
(196, 'Clopidogrel Tablet', 'Clopid', 'DRUG'),
(197, 'Clopidogrel+Aspirin Tablet', 'Clopid-AS', 'DRUG'),
(198, 'Clotrimazole 1% Cream', 'Neosten', 'BEXIMCO'),
(199, 'Clotrimazole 1% Ear Solution', 'Clarizol', 'INCEPTA'),
(200, 'Cloxacillin 500mg Capsule', 'Clobex', 'BEXIMCO'),
(201, 'Coaltar 2% Ointment', 'Coaltar', ''),
(202, 'Cod Liver Oil Capsule', 'Cod Liver Oil', 'DRUG'),
(203, 'Colchicine 0.6mg Tablet', 'Kolchin', 'INCEPTA'),
(204, 'Colistimethate Sodium 1 million iu Injection', 'Colomycin', 'ZAS'),
(205, 'Conjugated Estrogens 625mcg Tablet', 'Estracon', 'RENATA'),
(206, 'Coral Calcium 500mg + Vitamin-D3 200iu', 'Coralcal D', 'RADIANT'),
(207, 'Cranberry 500mg Tablet', 'Cranbiotic/Uremed', 'RADIANT'),
(208, 'Danazol 100mg Capsule', 'Danamet 100', 'SKF'),
(209, 'Darifenacin 7.5 mg Tablet', 'Darilax', 'INCEPTA'),
(210, 'Decycloverine 10mg Tablet', 'Colicon', 'SQUARE'),
(211, 'Decycloverine 10mg/5ml Syrup', 'Cyclopan', 'INCEPTA'),
(212, 'Deflazacort 24mg Tablet', 'Xalcort', 'BEACON'),
(213, 'Deflazacort 6mg Tablet', 'Deflacort', 'SQUARE'),
(214, 'Desloratadine 5mg Tablet', 'Deslor', 'ORION'),
(215, 'Desloratadine Syrup', 'Momento', 'BEXIMCO'),
(216, 'Dexamethasone 0.05% E/Ointment', 'Sonexa', 'ARISTOPHARMA'),
(217, 'Dexamethasone 0.1% + Chloramphenicol 0.5% E/D', 'Dexonex-C', 'SQUARE'),
(218, 'Dexamethasone 0.1% E/D', 'Sonexa', 'ARISTOPHARMA'),
(219, 'Dexamethasone 5mg/ml Injection', 'Roxadex', 'NUVISTA'),
(220, 'Dexibuprofen 100mg/5ml Suspension', 'Purifen', 'INCEPTA'),
(221, 'Dexibuprofen 300mg Tablet', 'Purifen 300', 'INCEPTA'),
(222, 'Dexibuprofen 400mg Tablet', 'Purifen 400', 'INCEPTA'),
(223, 'Dextran 70 + Hypromell E/D', 'Lubtear', 'SQUARE'),
(224, 'Dextromethorphan 10mg/5ml Syrup', 'Dextromethorpan', 'BEXIMCO'),
(225, 'Dextrose 10% + Sodium Chloride 0.225%', 'Electrodex-10', 'ORION'),
(226, 'Dextrose 10% IV Infusion 1000 ml', 'Dexaqua DS', 'BEXIMCO'),
(227, 'Dextrose 25% 100 ml Infusion', 'Nutridex', 'BEXIMCO'),
(228, 'Dextrose 25% 250 ml Infusion', 'Nutridex', 'BEXIMCO'),
(229, 'Dextrose 5% IV Infusion 1000 ml', 'Dexaqua ', 'BEXIMCO'),
(230, 'Dextrose 5% IV Infusion 500 ml', 'Dexaqua ', 'BEXIMCO'),
(231, 'Diacerin 50mg + Glucosamine 750mg Tablet', 'Bontiv', 'HEALTHCARE'),
(232, 'Diazepam 5 mg  Tablet', 'Sedil', 'SQUARE'),
(233, 'Diclofenac + Methyl salicylate + Menthol Cream', 'Icykool Max', 'BEXIMCO'),
(234, 'Diclofenac 12.5mg Suppository', 'Diclofen', 'OPSONIN'),
(235, 'Diclofenac 46.5mg Tablet', 'Voltalin-D', 'NOVARTIS'),
(236, 'Diclofenac 50mg + Misoprostol 200mcg Tablet', 'Ultrafen Plus', 'BEXIMCO'),
(237, 'Diclofenac 75 mg Injection', 'Voltalin/Diclofen', 'NOVARTIS'),
(238, 'Diclofenac 75mg + Lidocaine Injection', 'Diclofen Plus', 'OPSONIN'),
(239, 'Diclofenac Diethylamine1.16% gel', 'Clofenac Emulgel', 'SQUARE'),
(240, 'Diclofenac Sodium 25mg  Suppository', 'Voltalin/Diclofen', 'NOVARTIS'),
(241, 'Diclofenac Sodium 50 mg Tablet', 'Voltalin/Diclofen', 'NOVARTIS'),
(242, 'Diclofenac Sodium 50mg  Suppository', 'Voltalin/Diclofen', 'NOVARTIS'),
(243, 'Diethylcarbamazine 50mg Tablet', 'Benocide', 'GSK'),
(244, 'Difluprednate 0.05% E/D', 'Neopred', 'ARISTOPHARMA'),
(245, 'Digoxin 250 mcg Tablet', 'Agoxin', 'ARISTOPHARMA'),
(246, 'Diosmin 450mg + Hesperidin 50mg Tablet', 'Normanal 500', 'Renata'),
(247, 'Dobutamine Hydrochloride 250mg Injection', 'Dobutin', 'INCEPTA'),
(248, 'Domperidone 10mg Tablet', 'Deflux', 'BEXIMCO'),
(249, 'Domperidone 5mg/5ml Suspension', 'Motigut', 'SQUARE'),
(250, 'Domperidone 5mg/ml Paed. Drop', 'Motigut', 'SQUARE'),
(251, 'Dopamine 200mg/5ml injection', 'D-Dopamine', 'DRUG'),
(252, 'Dorzolamide 2% + Timolol0.5% E/D', 'Cozopt', 'ARISTOPHARMA'),
(253, 'Doxicycline 100mg Capsule', 'Doxicap', 'RENATA'),
(254, 'Doxofylline 200mg Tablet', 'Doxiva/Fylox', 'JMI'),
(255, 'Doxofylline 400mg Tablet', 'Doxiva/Fylox', 'JMI'),
(256, 'Drospirenone 0.03mg + Ethinylestradiol 3mg Tablet', 'Rosen 28', 'INCEPTA'),
(257, 'Drotaverine 40mg Tablet', 'Espa', 'ACME'),
(258, 'Duloxetine 30mg Capsule', 'Xinolax', 'OPSONIN'),
(259, 'Dutasteride 0.5mg Capsule', 'Urodart', 'UNIMED'),
(260, 'Ebastine 10mg Tablet', 'Ebatin', 'POPULAR'),
(261, 'Econazole 1% + Triamcinolone 0.1% Cream', 'Econate Plus', 'INCEPTA'),
(262, 'Econazole 1% Cream', 'Econate ', 'INCEPTA'),
(263, 'Econazole 150mg Vaginal Tablet', 'Econate VT', 'INCEPTA'),
(264, 'Eflornithine Cream', 'Wonica', 'INCEPTA'),
(265, 'Enoxaporin 40mg/0.4ml injection', 'Cardinex', 'DRUG'),
(266, 'Enoxaporin 60mg/0.6ml injection', 'Parinox', 'INCEPTA'),
(267, 'Enoxaporin 80mg/0.8ml injection', 'Cardinex', 'DRUG'),
(268, 'Ephedrine 5mg Injection', 'Ephidin', 'POPULAR'),
(269, 'Eptifibatide 75mg/100ml injection', 'Integril', 'INCEPTA'),
(270, 'Erythromycin 200mg/5ml PFS', 'Eromycin', 'SQUARE'),
(271, 'Erythromycin 250mg Tablet', 'Eromycin', 'SQUARE'),
(272, 'Erythromycin 500mg Tablet', 'Etrocim', 'BEXIMCO'),
(273, 'Esomeprazole 20mg Capsule', 'Esonix/Sergel', 'INCEPTA'),
(274, 'Esomeprazole 20mg Mumps Tablet', 'Esoral Mumps', 'SKF'),
(275, 'Esomeprazole 20mg Tablet', 'Maxpro', 'RENATA'),
(276, 'Esomeprazole 40 IV/IM Injection', 'Maxpro/Sergel', 'RENATA'),
(277, 'Esomeprazole 40mg Capsule', 'Sergel/Maxpro', 'HEALTHCARE'),
(278, 'Estriol 0.1% Cream', 'Femastin', 'SQUARE'),
(279, 'Etoricoxib 120mg Tablet', 'Torry', 'SQUARE'),
(280, 'Etoricoxib 60mg Tablet', 'Etorix', 'SKF'),
(281, 'Etoricoxib 90mg Tablet', 'Etorix', 'SKF'),
(282, 'EVENING PRIMROSE Oil 500mg Capsule', 'Eprim', 'SQUARE'),
(283, 'Fat Emulsion 10%', 'Intralipid', 'ORION'),
(284, 'Ferric Carboxymaltose 500mg/10ml Injection', 'Ferinject', 'UNIMED'),
(285, 'Ferric Carboxymaltose 500mg/10ml Injection', 'Maltofer', 'INCEPTA'),
(286, 'Fexofenadine 120mg Tablet', 'Fenadin', 'RENATA'),
(287, 'Fexofenadine 180mg Tablet', 'Axodin', 'BEXIMCO'),
(288, 'Fexofenadine 30mg/5ml Suspension', 'Fexo', 'SQUARE'),
(289, 'Fexofenadine 60mg Tablet', 'Axodin', 'BEXIMCO'),
(290, 'Filgrastim 30miu(0.5ml) Injection', 'Filastin', 'INCEPTA'),
(291, 'Finasteride 1mg Tablet', 'Recur', 'BEXIMCO'),
(292, 'Finasteride 5mg tablet', 'Pronor', 'SQUARE'),
(293, 'Flavoxate 100mg Tablet', 'Urilax', 'INCEPTA'),
(294, 'Flucloxacillin 125mg/5ml PFS', 'Flubex', 'BEXIMCO'),
(295, 'Flucloxacillin 250 mg capsule', 'Fluclox', 'ACI'),
(296, 'Flucloxacillin 250 mg injection', 'Fluclox', 'ACI'),
(297, 'Flucloxacillin 250mg/5ml PFS', 'Phylopen Forte', 'SQUARE'),
(298, 'Flucloxacillin 500 Capsule', 'Fluclox', 'ACI'),
(299, 'Flucloxacillin 500 mg injection', 'Fluclox', 'ACI'),
(300, 'Fluconazole  150mg capsule', 'Omastin', 'BEXIMCO'),
(301, 'Fluconazole  200mg capsule', 'Flugal', 'SQUARE'),
(302, 'Fluconazole  2mg/ml IV Infusion', 'Omastin', 'BEXIMCO'),
(303, 'Fluconazole  50mg capsule', 'Lucan-R', 'RENATA'),
(304, 'Fluconazole  50mg/5ml Suspension', 'Flugal', 'SQUARE'),
(305, 'Flumazenil 0.5mg/5ml Injection', 'Flumazenil', ''),
(306, 'Flunarizine 10 mg tablet', 'Norium', 'SKF'),
(307, 'Flunarizine 5 mg tablet', 'Norium', 'SKF'),
(308, 'Fluocinolone 0.025% + Neomycin 0.5% Ointment', 'Skinalar-N Oint', 'ACI'),
(309, 'Fluorometholon 0.1% + Gentamicin 0.3% E/Ointment', 'AFM Plus', 'ARISTOPHARMA'),
(310, 'Fluorometholon 0.1% + Tetrahydrozolin 0.025% E/D', 'AFM-T', 'ARISTOPHARMA'),
(311, 'Fluorometholone 0.1% E/D', 'Fluflam', 'SKF'),
(312, 'Fluoxetine 20mg Capsule', 'Prolert', 'SQUARE'),
(313, 'Flupentixol 0.5mg + Melitracen 10mg Tablet', 'Frenxit', 'BEXIMCO'),
(314, 'Flupentixol 0.5mg Tablet', 'Sentix', 'SKF'),
(315, 'Fluphenazine 0.5mg + Nortriptyline 10mg Tablet', 'Norzin', 'ARISTOPHARMA'),
(316, 'Fluticasone 0.005% Ointment', 'Ticas', 'SQUARE'),
(317, 'Fluticasone 0.05% Cream', 'Ticas', 'SQUARE'),
(318, 'Folic Acid 5mg Tablet', 'Folison', 'JAYSON'),
(319, 'Frusemide 20 mg/2mL injection', 'Frusin', 'OPSONIN'),
(320, 'Furosemide 20mg + Spironolactone 50mg Tablet', 'Edeloss', 'INCEPTA'),
(321, 'Furosemide 40 mg Tablet', 'Lasix/Fusid', 'SQUARE'),
(322, 'Furosemide 40mg + Spironolactone 50mg Tablet', 'Edeloss Plus', 'INCEPTA'),
(323, 'Ganciclovir 0.15% E/Gel', 'Xoviral Gel', 'ARISTOPHARMA'),
(324, 'Gatifloxacin 0.3% E/D', 'Zymar', ''),
(325, 'Gentamycin 0.1% Ointment', 'Genacyn', 'SQUARE'),
(326, 'Gentamycin 0.3% E/D', 'Genacyn', 'SQUARE'),
(327, 'Gentamycin 20 mg Injection', 'Gentin', 'OPSONIN'),
(328, 'Gentamycin 80 mg Injection', 'Gentin', 'OPSONIN'),
(329, 'Glibenclamide 5mg Tablet', 'Dibenol', 'SQUARE'),
(330, 'Gliclazide  80 mg Tablet', 'Comprid', 'SQUARE'),
(331, 'Gliclazide 60mg Tablet', 'Diamicron mr', ''),
(332, 'Glimepiride  2 mg Tablet', 'Amaryl', 'SQUARE'),
(333, 'Glimepiride 1mg Tablet', 'Secrin', 'SQUARE'),
(334, 'Glucosamine 500 mg Tablet', 'Joinix', 'INCEPTA'),
(335, 'Glycerine + Liquid Sugar Syrup', 'Honeycol', 'RENATA'),
(336, 'Glycerol + Hypromellose + PEG E/D', 'Visin', 'POPULAR'),
(337, 'Glyceryl TriNitarte 5mg/ml injection', 'Nidocard', 'DRUG'),
(338, 'Glyceryl Trinitrate 400mcg Spray', 'Anril ', 'SQUARE'),
(339, 'Haloperidol 10mg injection', 'Halopid', 'INCEPTA'),
(340, 'Haloperidol 5 mg Tablet', 'Halopid', 'INCEPTA'),
(341, 'Hartmann?s Solution 1000ml', 'Lactoride/Hartman', 'BEXIMCO'),
(342, 'Hartmann''s Solution 500 ml', 'Lactoride/Hartman', 'BEXIMCO'),
(343, 'Heparin 5000IU/ml Injection', 'Heparin', 'CITY OVERSEAS'),
(344, 'Hepatitis B Immunoglobulin', 'Immuno HBs', 'ZAS'),
(345, 'Human Insulin N 100 IU', 'Ansulin N', 'SQUARE'),
(346, 'Human Insulin R 100 IU', 'Maxsulin R 100', 'INCEPTA'),
(347, 'Human Insulin R 40 IU', 'Maxsulin R 40', 'INCEPTA'),
(348, 'Human Papiloma Virus T16&18 vaccine', 'Cervarix', 'GSK'),
(349, 'Hydrochlorothiazide 25mg Tablet', 'Acuren', 'INCEPTA'),
(350, 'Hydrocortisone  10mg Tablet', 'Cotson', 'OPSONIN'),
(351, 'Hydrocortisone 1% Cream', 'Topicort', 'SQUARE'),
(352, 'Hydrocortisone 100mg/2ml  IV/IM injection', 'Cotson', 'OPSONIN'),
(353, 'Hydrogen Peroxide', 'Hydrogen Peroxide', ''),
(354, 'Hydroxychloroquine 200mg Tablet', 'Reconil', 'INCEPTA'),
(355, 'Hydroxyethyl starch 6% 500ml', 'Plasmasol', 'ORION'),
(356, 'Hydroxyzine 10mg Tablet', 'Artica', 'ACI'),
(357, 'Hydroxyzine 10mg/5ml Syrup', 'Xyril', 'OPSONIN'),
(358, 'Hydroxyzine 25mg Tablet', 'Artica', 'ACI'),
(359, 'Hyoscine Butylbromide 10 mg tablet', 'Hysomide', 'OPSONIN'),
(360, 'Hypromellose 0.3% E/D', 'Hypomer Gel', 'ARISTOPHARMA'),
(361, 'Hypromellose 0.8% E/D', 'Tearsol', ''),
(362, 'Ibandronic Acid 150mg Tablet', 'Bonova', 'RADIANT'),
(363, 'Ibandronic Acid 3mg/3ml injection', 'Bondrova', 'HEALTHCARE'),
(364, 'Ibuprofen 200mg Tablet', 'Inflam 200', 'SANOFI'),
(365, 'Ibuprofen 400mg Tablet', 'Inflam 400', 'SANOFI'),
(366, 'Icthymol 10% Glycerine', 'Icthymol', ''),
(367, 'Indomethacin 25mg Capsule', 'Indomet', 'OPSONIN'),
(368, 'Indomethacin 75mg SR Capsule', 'Reumacap 75', 'ARISTOPHARMA'),
(369, 'Infertility Supplement for men tablet', 'Fertilman', 'ZAS'),
(370, 'Infertility Supplement for men tablet', 'Fertilman Plust', 'ZAS'),
(371, 'Infertility Supplement for woman tablet', 'Fertil Care', 'ZAS'),
(372, 'Influenza vaccine', 'Influvax', 'INCEPTA'),
(373, 'Insulin 30/70 100 IU', 'Maxsulin 30/70', 'INCEPTA'),
(374, 'Insulin Aspart 100 IU', 'NovoRapid Penfill', 'Novonordisk'),
(375, 'Insulin glargine', 'Lantus solostar', 'SANOFI'),
(376, 'Ipratropium Bromide Res/Solution', 'Ipramid', 'INCEPTA'),
(377, 'Iron + Vitamin B-Complex + Zinc Syrup ', 'Aritone-ZI', 'INCEPTA'),
(378, 'Iron Polysaccharide Peadiatric Drop', 'Compiron', 'INCEPTA'),
(379, 'Iron Polysaccharide Syrup', 'Compiron', 'iNCEPTA'),
(380, 'Iron Sucrose 100mg/5ml IV Injection', 'Hemofer', 'POPULAR'),
(381, 'Ispaghula Husk Sachet', 'Ispaghul', 'HAMDARD'),
(382, 'Ivabradine 5mg Tablet', 'Ivanor', 'SQUARE'),
(383, 'Ketoconazole + Zinc + Aloevera shampoo', 'Scalpe plus', 'ZAS'),
(384, 'Ketorolac 10mg Tablet', 'Rolac', 'RENATA'),
(385, 'Ketorolac 30mg/ml Injection', 'Rolac/Toradolin', 'RADIANT'),
(386, 'Ketorolac 60mg injection', 'Rolac', 'RENATA'),
(387, 'Ketotifen 1mg Tablet', 'Tofen', 'BEXIMCO'),
(388, 'Ketotifen 1mg/5ml Syrup', 'Tofen', 'BEXIMCO'),
(389, 'Labetalol 200mg Tablet', 'Labeta', 'BEXIMCO'),
(390, 'Labetalol 50mg Injection', 'Labecard', 'POPULAR'),
(391, 'Lactulose oral Solution', 'Serelose', 'BEXIMCO'),
(392, 'Leflunomide 10mg tablet', 'Nodia', 'INCEPTA'),
(393, 'Letrozole 2.5mg Tablet', 'Letrol', 'RENATA'),
(394, 'Levetiracetam 250mg Tablet', 'Iracet', 'SQUARE'),
(395, 'Levetiracetam 500mg Tablet', 'Iracet', 'SQUARE'),
(396, 'Levetiracetam 500mg/5ml injection', 'Iracet', 'SQUARE'),
(397, 'Levocartinitine 330mg', 'Levocar ', 'Square'),
(398, 'Levocetirizine 5mg Tablet', 'Alcet', 'HEALTHCARE'),
(399, 'Levocetirizine 5mg/5ml Syrup', 'Alcet', 'HEALTHCARE'),
(400, 'Levofloxacin 0.5% E/D', 'Ovel', 'ARISTOPHARMA'),
(401, 'Levofloxacin 1.5% E/D', 'Ovel TS', 'ARISTOPHARMA'),
(402, 'Levofloxacin 125mg/5ml Oral solution', 'Levoxin', 'INCEPTA'),
(403, 'Levofloxacin 250mg Tablet', 'Levoxin', 'INCEPTA'),
(404, 'Levofloxacin 500mg Injection', 'Evo/Levoxin', 'BEXIMCO'),
(405, 'Levofloxacin 500mg Tablet', 'Levoxin', 'INCEPTA'),
(406, 'Levofloxacin 750mg Tablet', 'Levoxin', 'INCEPTA'),
(407, 'Levosalbutamol 0.63mg Neb/Solution', 'Purisal', 'INCEPTA'),
(408, 'Levosalbutamol 1mg/5ml Syrup', 'Purisal', 'INCEPTA'),
(409, 'Levosalbutamol 2mg Tablet', 'Brodil Levo', 'ACI'),
(410, 'Lidocaine 2% + Adrenaline Injection', 'Jasocaine-A', 'JAYSON'),
(411, 'Lidocaine 2% injection', 'Jasocaine', 'JAYSON'),
(412, 'Lidocaine 2% jelly', 'Jasocaine', 'JAYSON'),
(413, 'Light paraffin + White Paraffin Cream', 'Emolent', 'SQUARE'),
(414, 'Linagliptin 5mg Tablet', 'Lijenta', 'JMI'),
(415, 'lomifloxacin 0.3% Eye Drop', 'Mexlo  ', 'SQUARE'),
(416, 'Loratadine  10mg Tablet', 'Aleze/Oradin', 'UNIMED'),
(417, 'Loratadine 5mg/5ml Suspension', 'Oradin', 'SKF'),
(418, 'Losartan Potassium 25mg Tablet', 'Angilock 25', 'SQUARE'),
(419, 'Losartan Potassium 50mg + Hydrochlorothiazide 12.5mg Tablet', 'Prosan HZ', 'BEXIMCO'),
(420, 'Losartan Potassium 50mg Tablet', 'Osartil 50', 'INCEPTA'),
(421, 'Loteprednol 0.5% + Gatifloxacin 0.3%  E/D', 'Lotinol G', 'POPULAR'),
(422, 'Loteprednol 0.5% + Tobramycin 0.3%', 'Lotepred Plus', 'ARISTOPHARMA'),
(423, 'Lubiprostone 24mcg', 'Lubilax', 'BEACON'),
(424, 'Lubiprostone 8 mcg', 'Lubistone', 'INCEPTA'),
(425, 'Magaldrate 480mg + Simethicone 20mg Suspension', 'Maganta Plus', 'SQUARE'),
(426, 'Magnesium Hydroxide + Liquid Paraffin Suspension', 'Frelax', 'BEXIMCO'),
(427, 'Magnesium Hydroxide 400 mg/5ml Suspension', 'Mom', 'OPSONIN'),
(428, 'Magnesium Oxide 365mg Tablet', 'Magosit', 'ZAS'),
(429, 'Magnesium sulphate 2.47gm/5ml Injection', 'G-Magsulph', ''),
(430, 'Mannitol 20% 500ml', 'Osmosol', 'BEXIMCO'),
(431, 'Mebendazole 100mg Tablet', 'Solas', 'OPSONIN'),
(432, 'Mebendazole 100mg/5ml Suspension', 'Solas', 'OPSONIN'),
(433, 'Mebeverine 200mg SR Tablet', 'Rostil-SR', 'BEXIMCO'),
(434, 'Mebeverine Hydrochloride 135mg Tablet', 'Rostil', 'BEXIMCO'),
(435, 'Mefenamic Acid 500mg Tablet', 'HPR-DS', 'PACIFIC'),
(436, 'Mefenamic Acid 50mg/5ml Suspension', 'Amefin', 'OPSONIN'),
(437, 'Memantine 5mg Tablet', 'Demeta', 'ZISKA'),
(438, 'Meropenem 1gm Injection', 'Meropen/I-Penam', 'ren/hel'),
(439, 'Meropenem 250mg Injection', 'Neopenem/Meroject', 'RENATA'),
(440, 'Meropenem 500 mg Injection', 'I-Penem/Neopenem', 'INCEPTA'),
(441, 'Metformin 500mg  XR Tablet', 'Comet XR', 'SQUARE'),
(442, 'Metformin 500mg + Sitagliptin 50mg tablet', 'Glipita -M', 'BEXIMCO'),
(443, 'Metformin 500mg + Vildagliptin 50mg Tablet', 'Dialiptin-M', 'DRUG'),
(444, 'Metformin 500mg Tablet', 'Informet', 'BEXIMCO'),
(445, 'Metformin 750mg Tablet', 'Informet LA', 'BEXIMCO'),
(446, 'Metformin 850 + Vildagliptin 50 mg Tablet', 'Galvus Met 50/850', 'NOVARTIS'),
(447, 'Metformin 850 mg Tablet', 'Comet', 'SQUARE'),
(448, 'Methotrexate 10mg Tablet', 'Methotrax', ''),
(449, 'Methyl Salicylate 30% + Menthol 10% Cream', 'Icykool Max', 'BEXIMCO'),
(450, 'Methylene Blue', 'Methylene Blue', ''),
(451, 'Methylergonovine 200 mcg Injection', 'Metherspan', 'OPSONIN'),
(452, 'Metoprolol 25mg Tablet', 'Betaloc', 'DRUG'),
(453, 'Metoprolol 50mg Tablet', 'Betaloc', 'DRUG'),
(454, 'Metronidazole 400mg Tablet', 'Filmet', 'SQUARE'),
(455, 'Metronidazole 500mg/100ml IV Infusion', 'Filmet', 'BEXIMCO'),
(456, 'Miconazole 2% Gel', 'Micoral', 'ACI'),
(457, 'Midazolam 15mg/3ml Injection', 'Midolam', 'OPSONIN'),
(458, 'Midazolam 5mg/5ml Injection', 'Midolam', 'OPSONIN'),
(459, 'Midazolam 7.5mg Tablet', 'Dormicum', 'RADIANT'),
(460, 'Miltivitamin + Multimineral A-Z Tablet', 'Bextrum gold', 'BEXIMCO'),
(461, 'Minoxidil 5% Spray', 'Trugain ', 'ZISKA'),
(462, 'Misoprostol 200mcg Tablet', 'Cytomis 200', 'INCEPTA'),
(463, 'Mitomicin 20mg Injection', 'Mitomycin c', 'ZAS'),
(464, 'Montelukast 10mg Tablet', 'Monocast', 'BEXIMCO'),
(465, 'Montelukast 4mg powder', 'lumona', 'SKF'),
(466, 'Montelukast 4mg Tablet', 'Montene', 'SQUARE'),
(467, 'Montelukast 5mg Tablet', 'M-Kast', 'DRUG'),
(468, 'Moxifloxacin 0.5% E/D', 'Visomox', 'SKF'),
(469, 'Moxifloxacin 0.5% E/Ointment', 'Optimox', 'ARISTOPHARMA'),
(470, 'Moxifloxacin 400mg Tablet', 'Moxibac', 'POPULAR'),
(471, 'Moxifloxacin 400mg/250ml Injection', 'Moxibac', 'POPULAR'),
(472, 'Multivitamin + Cod liver oil Syrup', 'Bextrum kids', 'BEXIMCO'),
(473, 'Mupirocin 2% ointment', 'Bactroban/Bactrocin', 'SQUARE'),
(474, 'Naphazoline 0.005% + Zn Sulphate 0.02% E/D', 'Nazin', 'ARISTOPHARMA'),
(475, 'Naproxen 125mg/5ml Suspension', 'Napryn', 'HEALTHCARE'),
(476, 'Naproxen 250 mg tablet', 'Naprox', 'SKF'),
(477, 'Naproxen 375mg + Esomeprazole 20mg Tablet', 'Naprox plus', 'SKF'),
(478, 'Naproxen 500mg Tablet', 'Napryn', 'HEALTHCARE'),
(479, 'Naproxen Sodium 10 % Gel', 'Anaflex', 'ACI'),
(480, 'Naproxen+Esomeprazole 500/20 Tablet', 'Naprosyn Plus', 'RADIANT'),
(481, 'Neomycin 5mg + Bacitracin 250 iu Powder', 'Nebanol ', 'SQUARE'),
(482, 'Neomycin 5mg + Bacitracin 500 iu Ointment', 'Nebanol ', 'SQUARE'),
(483, 'Neostigmine 0.5mg/ml Injection', 'Neostig', 'POPULAR'),
(484, 'Nicotinic Acid 50mg Tablet', 'Niconic', 'PACIFIC'),
(485, 'Nifedipine 10mg Capusle', 'Nifecap', 'DRUG'),
(486, 'Nimodipine 30mg Tablet', 'Nimocal', 'SQUARE'),
(487, 'Nimulent Capsule', 'Nimulent ', 'HAMDARD'),
(488, 'NitroGlycerin 2.6 mg Tablet', 'Nidocard', 'DRUG'),
(489, 'Octreotide Injection', 'Octreotide', ''),
(490, 'Ofloxacin 200mg Tablet', 'Rutix', 'SQUARE'),
(491, 'Ofloxacin 400mg', 'Rutix 400', 'Square'),
(492, 'Ofloxacin 400mg', 'Rutix 200', 'Square'),
(493, 'Ofloxacin 400mg Tablet', 'Rutix', 'SQUARE'),
(494, 'Olmesartan 20mg Tablet', 'Sevitan', 'RADIANT'),
(495, 'Olopatadine 0.1% E/D', 'Olopan', 'BEXIMCO'),
(496, 'Olopatadine 0.2 % E/D', 'Alacot DS', 'SQUARE'),
(497, 'Omeprazole 20mg Capsule', 'Ometid', 'OPSONIN'),
(498, 'Omeprazole 20mg mumps Tablet', 'Seclo', 'SQUARE'),
(499, 'Omeprazole 40mg Capsule', 'Cosec', 'DRUG'),
(500, 'Omeprazole 40mg Injection', 'Losectil', 'SKF'),
(501, 'omposit Amino Acid 5% + D-Sorbitol', 'Proliv', 'ORION'),
(502, 'Ondansetrone 8mg Tablet', 'Emistat', 'HEALTHCARE'),
(503, 'Ondansetrone 8mg/4ml Injection', 'Emistat', 'HEALTHCARE'),
(504, 'Oxcarbazepine 300mg Tablet', 'Trileptal', 'BEXIMCO'),
(505, 'Oxymetazoline 0.025% N/D', 'Rynex', 'INCEPTA'),
(506, 'Oxymetazoline 0.05% N/D', 'Oxynex', 'OPSONIN'),
(507, 'Oxymetazoline Nasal Spray 25mcg/spray', 'Oxynex', 'OPSONIN'),
(508, 'Oxytocin 10iu  Injection', 'linda ds', 'NUVISTA'),
(509, 'Oxytocin 5iu  Injection', 'Ocin', 'OPSONIN'),
(510, 'Palonosetron 0.25mg Injection', 'Paloxi', 'BEACON'),
(511, 'Palonosetron 0.5mg Tablet', 'Paloxi', 'BEACON'),
(512, 'Pantoprazole 20mg Tablet', 'Pantonix', 'INCEPTA'),
(513, 'Pantoprazole 40mg Injection', 'Pantobex/Pantonix', 'BEXIMCO'),
(514, 'Pantoprazole 40mg Tablet', 'Pantobex', 'BEXIMCO'),
(515, 'Paracetamol + Caffeine Tablet', 'Napa extra', 'BEXIMCO'),
(516, 'Paracetamol 125 mg Suppository', 'Napa', 'BEXIMCO'),
(517, 'Paracetamol 125mg/5ml Suspension', 'Napa', 'BEXIMCO'),
(518, 'Paracetamol 125mg/5ml Syrup', 'Napa/Ace', 'BEXIMCO'),
(519, 'Paracetamol 250 mg Suppository', 'Napa', 'BEXIMCO'),
(520, 'Paracetamol 375mg + Tramadol 37.5mg Tablet', 'Napadol', 'BEXIMCO'),
(521, 'Paracetamol 500 mg Suppository', 'Napa', 'BEXIMCO'),
(522, 'Paracetamol 500 mg Tablet', 'Napa', 'BEXIMCO'),
(523, 'Paracetamol 60 mg Suppository', 'Napa', 'BEXIMCO'),
(524, 'Paracetamol 665 mg Tablet', 'napa extend', 'BEXIMCO'),
(525, 'Paracetamol 80mg/ml Paed. Drop', 'Ace/Napa', 'SQUARE'),
(526, 'Parenteral nutritions IV Infusion', 'Kabiven Perifer', 'RADIANT'),
(527, 'PEG + Electrolytes Syrup', 'Movilax Syrup-', 'INCEPTA'),
(528, 'PEG 0.4% + PG 0.01% E/D', 'Freshtear', 'SKF'),
(529, 'PEG 400 0.4% + PG 0.3% E/D', 'Systear', 'ARISTOPHARMA'),
(530, 'Pentoxifylline 20 mg Tablet', 'Oxifyl CR', 'SQUARE'),
(531, 'Permethrin 5% Cream', 'Lorix', 'OPSONIN'),
(532, 'Pethidine 100mg/2ml Injection', 'G-pethidine', 'Gono'),
(533, 'Pheniramine Maleate 22.7mg Tablet', 'Avil', 'SANOFI'),
(534, 'Pheniramine Maleate 45.5mg Injection', 'Amarin', 'OPSONIN'),
(535, 'Pheniramine Maleate 75 mg Tablet', 'Avil Retard', 'SANOFI'),
(536, 'Phenobarbital 200 mg Injection', 'Barbit', 'INCEPTA'),
(537, 'Phenobarbital 20mg/5ml Elixir', 'barbit', 'INCEPTA'),
(538, 'Phenobarbital 30mg tablet', 'Barbit', 'INCEPTA'),
(539, 'Phenobarbital 60mg Tablet', 'Barbit', 'INCEPTA'),
(540, 'Phytomenadione 10mg/ml ', 'K-MM', 'INCEPTA'),
(541, 'Phytomenadione 2mg/0.2ml', 'K-One', 'SQUARE'),
(542, 'Pilocarpine', 'Carpinol', ''),
(543, 'Pilocarpine 2% E/D', 'Optacarpine', 'POPULAR'),
(544, 'Pioglitazone 15mg tablet', 'Pioder', 'INCEPTA'),
(545, 'Piperacillin 4gm + Tazobactam 0.5gm Injection', 'Brodactum/Tazosyn', 'SANOFI'),
(546, 'Pizotifen 0.5 mg Tablet', 'Migranil', 'SQUARE'),
(547, 'Pizotifen 1.5 mg Tablet', 'Migranil', 'SQUARE'),
(548, 'Polyethylene Glycol E/D', 'Oculant', 'SQUARE'),
(549, 'Polymyxin B Sulphate 500000IU Injection', 'Polymix B', 'ZAS'),
(550, 'Pota.Chloride + Sod.Acetate + Sod.Chloride Infusion 1000ml', 'Koloride', 'BEXIMCO'),
(551, 'Pota.Chloride + Sod.Acetate + Sod.Chloride Infusion 500ml', 'Koloride', 'BEXIMCO'),
(552, 'Potassium Chloride 1.5gm/10ml Injection', 'KCL/KT', 'OPSONIN'),
(553, 'Potassium Citrate 30% + Citric Acid 5% Syrup', 'Urokit plus', 'SKF'),
(554, 'Potassium per Manganate', 'Pota. per M.', ''),
(555, 'Povidone Iodine 1% gargle solution', 'Viodin', 'SQUARE'),
(556, 'Povidone Iodine 10 %  100 ml', 'Viodin', 'SQUARE'),
(557, 'Povidone-Iodine 5% Cream 125gm', 'Betadine', 'CITY OVERSEAS'),
(558, 'Povidone-Iodine 5% Cream 25gm', 'Viodin', 'SQUARE'),
(559, 'Pralidoxime 1gm/ml Injection', 'Pradox', 'BEACON'),
(560, 'Prazosin 1mg Tablet', 'Alphapress 1', 'RENATA'),
(561, 'Prazosin 2mg Tablet', 'Alphapress 2', 'RENATA'),
(562, 'Prazosin 5mg Tablet', 'Prazopres ER', 'UNIMED'),
(563, 'Prednisolone 1%  E/D', 'Cortisol', 'ARISTOPHARMA'),
(564, 'Prednisolone 10mg Tablet', 'Cortan', 'INCEPTA'),
(565, 'Prednisolone 20mg Tablet', 'Cortan', 'INCEPTA'),
(566, 'Prednisolone 5mg Tablet', 'Cortan', 'INCEPTA'),
(567, 'Prednisolone 5mg/5ml Syrup', 'Cortan/Precodil', 'INCEPTA/Opsonin'),
(568, 'Pregabalin 25mg Capsule', 'Pregaba', 'OPSONIN'),
(569, 'Pregabalin 50mg Capsule', 'Nervalin', 'BEXIMCO'),
(570, 'Pregabalin 75mg Capsule', 'Neurolin', 'SQUARE'),
(571, 'Probiotics 2 billion iu/5ml', 'Enterogermina', 'NOVARTIS'),
(572, 'Proparacaine 0.5% E/D', 'Procain', 'ARISTOPHARMA'),
(573, 'Propofol 10mg/ml Injection', 'Pofol/Propofol', 'op/techno'),
(574, 'Propranolol 10mg Tablet', 'Indever/Propranolol', 'aci/op'),
(575, 'Propranolol 40mg Tablet', 'Indever', 'ACI'),
(576, 'Pyridoxine 20mg Tablet', 'Pyrol', 'JAYSON'),
(577, 'Quinine Sulphate 300mg Tablet', 'Jasoquin', 'JAYSON'),
(578, 'Rabeprazole 20 mg Tablet', 'Finix', 'OPSONIN'),
(579, 'Rabeprazole 20mg Capsule', 'Prompton', 'RADIANT'),
(580, 'Ramipril 2.5 mg Tablet', 'Ramoril', 'INCEPTA'),
(581, 'Ramipril 5mg Tablet', 'Ramoril', 'INCEPTA'),
(582, 'Ranitidine 150 mg Tablet', 'Ranitid', 'OPSONIN'),
(583, 'Ranitidine 50mg/2ml Injection', 'Neoceptin-R', 'BEXIMCO'),
(584, 'Ranitidine 75mg/5ml Syrup', 'Neotac', 'SQUARE'),
(585, 'Ranolazine 500mg ER  Tablet', 'Ranola-ER', 'GENERAL'),
(586, 'Revit-R Milk 220gm', 'Revit-R', ''),
(587, 'Rifampicin 150mg + Isoniazid 75mg + Ethambutol 275mg + Pyrazinamide 400mg Tablet', 'Rimstar 4 FDC', 'NOVARTIS'),
(588, 'Rifampicin 300mg + Isoniazid 150mg Tablet', 'Rimactazid', 'NOVARTIS'),
(589, 'RIFAXIMIN 200MG Tablet', 'Rifagut', 'OPSONIN'),
(590, 'RIFAXIMIN 550mg Tablet', 'Rifagut', 'OPSONIN'),
(591, 'Ripaglinide 2mg Tablet', 'Nomopil', 'INCEPTA'),
(592, 'Risperidone 1mg Tablet', 'Residon', 'HEALTHCARE'),
(593, 'Rivaroxaban 10mg Tablet', 'Rivarox', 'SKF'),
(594, 'Rosuvastatin 10mg Tablet', 'Rosuva', 'SQUARE'),
(595, 'Rosuvastatin 20mg Tablet', 'Rosutin', 'BEXIMCO'),
(596, 'Rosuvastatin 5mg Tablet', 'Rosutin', 'BEXIMCO'),
(597, 'Rupatadine 10 mg Tablet', 'Minista', 'RADIANT'),
(598, 'Safi Capsule', 'safi', 'HAMDARD'),
(599, 'Salbutamol 100mcg/Puff Inhaler', 'Azmasol', 'BEXIMCO'),
(600, 'Salbutamol 2.5mg + Ipratropium 0.5mg Neb/Soln', 'Windel Plus', 'INCEPTA'),
(601, 'Salbutamol 5mg/5ml Syrup', 'Brodil', 'ACI'),
(602, 'Salmeterol 25mcg + Fluticasone 125mcg Inhaler', 'Bexitrol-F', 'BEXIMCO'),
(603, 'Salmeterol 25mcg + Fluticasone 250mcg Inhaler', 'Bexitrol-F', 'BEXIMCO'),
(604, 'Salmeterol 50mcg + Fluticasone 100mcg Bexicap', 'Bexitrol-F 50/100', 'BEXIMCO'),
(605, 'Saw Palmetto 500mg Tablet', 'Prostaid', 'RADIANT'),
(606, 'Sebium Serum Cream', 'Sebium Serum', 'UNIMED'),
(607, 'Sertraline 25mg  Tablet', 'Setra', 'GENERAL'),
(608, 'Sertraline 50mg  Tablet', 'Setra', 'GENERAL'),
(609, 'Silodosin 4mg  Tablet', 'Flowrap', 'HEALTHCARE'),
(610, 'Silodosin 8mg  Tablet', 'Rapasin', 'HEALTHCARE'),
(611, 'Silver Sulfadiazine Cream 250gm', 'Silcream', 'JAYSON'),
(612, 'Silver Sulfadiazine Cream 25gm', 'Burnsil', 'BEXIMCO'),
(613, 'Sitagliptin 100 mg Tablet', 'Sitagil ', 'INCEPTA'),
(614, 'Sitagliptin 50 mg  Tablet', 'Sitagil ', 'INCEPTA'),
(615, 'Sodium Alginate 500mg + Potassium Bicarbonate 100mg Suspension', 'Gastrocon', 'UNIMED'),
(616, 'Sodium Bicarbonate 600mg Tablet', 'Sodinate', 'POPULAR'),
(617, 'Sodium Bicarbonate 7.5% Injection', 'Sodib', 'JAYSON'),
(618, 'Sodium chloride + Potassium Chloride + sodium Citrate + Glucose Sachet', 'Orsaline-N', 'SMC'),
(619, 'Sodium Chloride 0.9%  N/D', 'Nosomist', 'OPSONIN'),
(620, 'Sodium Chloride 0.9% + Dextrose 5% 1000 ml', 'Dexoride', 'BEXIMCO'),
(621, 'Sodium Chloride 0.9% + Dextrose 5% 500 ml', 'Saloride', 'BEXIMCO'),
(622, 'Sodium chloride 0.9% IV Infusion 1000ml', 'Saloride', 'BEXIMCO'),
(623, 'Sodium Chloride 0.9% IV Infusion 500 ml', 'Saloride', 'BEXIMCO'),
(624, 'Sodium Chloride 3% IV Infusion 500ml', 'Sod.Chlo. sol.', ''),
(625, 'Sodium Chloride 300 mg Tablet', 'Hartsol ', 'ZAS'),
(626, 'Sodium Chloride 5% E/D', 'Hypersol', 'BEXIMCO'),
(627, 'Sodium Fusidate 250mg Tablet', 'Facid', 'SKF'),
(628, 'Sodium Phosphate anema Solution 133ml', 'Anema', 'SQUARE'),
(629, 'Sodium Valproate 200mg/5ml Syrup', 'Valoate', 'SQUARE'),
(630, 'Sodium Valproate 200mgTablet', 'Valoate', 'SQUARE'),
(631, 'Sodium Valproate 300mgTablet', 'Epilim Chrono', 'SANOFI'),
(632, 'Sodium Valproate 500mgTablet', 'Epilim Chrono', 'SANOFI'),
(633, 'Solifenacin Succinate 10mg Tablet', 'Utrobin', 'UNIMED'),
(634, 'Solifenacin Succinate 5mg Tablet', 'Utrobin', 'UNIMED'),
(635, 'Sparfloxacin 200 mg', 'Saga 200', 'Square'),
(636, 'Spironolactone 100mg Tablet', 'Spirocard', 'POPULAR'),
(637, 'Spironolactone 25mg Tablet', 'Spirocard', 'POPULAR'),
(638, 'Spirulina 500mg Capsule', 'Lina', 'HAMDARD'),
(639, 'STRETCHMED Scar gel', 'STRETCHMED gel', 'ZAS'),
(640, 'Sucralfate 500 mg Tablet', 'Gastalfet', 'BEXIMCO'),
(641, 'Sulindac 100mg  Tablet', 'Lindac', 'POPULAR'),
(642, 'Sulindac 200mg  Tablet', 'Lindac', 'POPULAR'),
(643, 'Sulphamethoxazole 400mg + Trimethoprim 80mg Tablet', 'Megatrim', 'SQUARE'),
(644, 'Sulphamethoxazole 800mg + Trimethoprim 160mg Tablet', 'Cotrim-DS', 'BEXIMCO'),
(645, 'Suxamethonium Chloride 100mg/2ml Injection', 'Neosuxa', 'POPULAR'),
(646, 'Tamsulosin 0.4mg + Dutasteride 0.5mg Capsule', 'Uromax-D', 'UNIMED'),
(647, 'Tamsulosin 0.4mg Capsule', 'Prostacin', 'INCEPTA'),
(648, 'Tenoxicam 20 mg Tablet', 'Tilkotil', 'RADIANT'),
(649, 'Theophylline  200 mg Tablet', 'Unicotine', 'CITY OVERSEAS'),
(650, 'Theophylline  400 mg Tablet', 'Unicotine', 'CITY OVERSEAS'),
(651, 'Thiamine 100mg Tablet', 'Beovit', 'SQUARE'),
(652, 'Thiamine 100mg/ml injection', 'Thiason', 'JAYSON'),
(653, 'Thiopental Sodium  1gm Injection', 'Thiopen', 'ACI'),
(654, 'Thyamol & Eucliptol solution M/W', 'Orostar', 'SQUARE'),
(655, 'Ticagrelor 90mg Tablet', 'Ticarel', 'INCEPTA'),
(656, 'Tiemonium MethylSulphate 50mg Tablet', 'Algin', 'RENATA'),
(657, 'Tiemonium MethylSulphate 5mg/2ml Injection', 'Algin', 'RENATA'),
(658, 'Tigecycline 50mg IV Infusion', 'Widebac', 'INCEPTA'),
(659, 'Tizanidine 2mg Tablet', 'Relentus', 'BEXIMCO'),
(660, 'Tobramycin 0.3%  E/D', 'T Mycin', 'ARISTOPHARMA'),
(661, 'Tobramycin 0.3% + Dexamethasone 0.1%  E/D', 'T- Mycin plus', 'ARISTOPHARMA'),
(662, 'Tobramycin 0.3% + Dexamethasone 0.1%  E/Ointment', 'T- Mycin plus ', 'ARISTOPHARMA'),
(663, 'Tobramycin 300mg/5ml Neb. Solution', 'Intobac', 'INCEPTA'),
(664, 'Tolperisone Hydrochloride 50 mg Tablet', 'Myolax', 'INCEPTA'),
(665, 'Tolterodine Tartarate 2mg Capsule', 'Detrusin LA', 'UNIMED'),
(666, 'Tramadol 100mg injection', 'Tranal', 'OPSONIN'),
(667, 'Tramadol 100mg Tablet', 'Utramal Retard', 'UNIMED'),
(668, 'Tramadol 50mg Capsule', 'Lusidol', 'BEXIMCO'),
(669, 'Tramadol 50mg Tablet', 'Utramal Retard', 'UNIMED'),
(670, 'Tranexamic acid?500mg  capsule', 'Xamic', 'RENATA'),
(671, 'Travoprost 0.004%  E/D', 'Avatan', 'ARISTOPHARMA'),
(672, 'Triamcenolone acetonide 0.1% Oral Paste', 'Trialon', 'DRUG'),
(673, 'Triamcenolone acetonide 40mg/ml injection', 'Trialon', 'DRUG'),
(674, 'Trihexyphenidyl 2mg Tablet', 'Hexinor', 'BEACON'),
(675, 'Tritropium 18mcg Cozycap', 'Tioriva Bexicap', 'BEXIMCO'),
(676, 'Tropicamide 0.8% + Phenylephrine 5%  E/D', 'Trophen', 'ARISTOPHARMA'),
(677, 'Tropicamide 1% E/D', 'Tropicam', 'ARISTOPHARMA'),
(678, 'Trypan Blue sterile soln', 'Trypan Blue', ''),
(679, 'Ubidecarenone 60mg Capsule', 'Ubi-Q', 'RADIANT'),
(680, 'Urea 10%  Cream', 'Eucera', 'UNIMED'),
(681, 'Valacyclovir 1 gm Tablet', 'Revira', 'SQUARE'),
(682, 'Valacyclovir 500mg Tablet', 'Alaclov', 'ACI'),
(683, 'Valsartan 160 mg Tablet', 'Disys', 'HEALTHCARE'),
(684, 'Vancomycin 1gm Injection', 'Covan', 'RENATA'),
(685, 'Vancomycin 500mg Injection', 'Vanmycin', 'INCEPTA'),
(686, 'Varicella virus vaccine', 'Varilrix ', 'GSK'),
(687, 'Verapamil 5mg /2 ml injection', 'Veracal', 'INCEPTA'),
(688, 'Vildagliptin 50mg Tablet', 'Galvus', 'NOVARTIS'),
(689, 'Vitamin E 200mg + Vitamin C 200mg Tablet', 'EC Plus', 'ORION'),
(690, 'Vitamin E 200mg Capsule', 'E-cap', 'DRUG'),
(691, 'Vitamin E 200mg(natural) Capsule', 'Nature E', 'UNIMED'),
(692, 'Vitamin E 400mg Capsule', 'E-cap', 'DRUG'),
(693, 'Vitamin E 400mg(natural) Capsule', 'Nature E', 'UNIMED'),
(694, 'Vitamin-B complex + Vitamin-C IV Injection', 'Vidalin', 'POPULAR'),
(695, 'Vitamin-B Complex Syrup', 'Aristoplex', 'BEXIMCO'),
(696, 'Vitamin-B Complex Tablet', 'Aristovit-B', 'BEXIMCO'),
(697, 'Vitamin-B1 200mg + Vita-B6 200mg + B12 200mcg Tablet', 'Neurocare', 'BEXIMCO'),
(698, 'Vitamin-C + Vitamin-E + Zinc + Copper + Lutein Capsule', 'Optavit', 'POPULAR'),
(699, 'Vitamin-C 250mg Tablet', 'Ceevit/Vasco', 'SQUARE'),
(700, 'Vitamin-C 500mg Tablet', 'Ceevit DS', 'SQUARE'),
(701, 'Vitamin-D3 1000 IU Tablet', 'Max-D ', 'ZISKA'),
(702, 'Vitamins + Minerals (Prenatal)', 'Nutrum PN', 'ACME'),
(703, 'Warfarin 5mg Tablet', 'Warin', 'UNIMED'),
(704, 'White Soft Paraffin + Liquid Paraffin + Wool Alcohol E/Oint', 'Night Fresh', 'GENERAL'),
(705, 'Yohimbine 5.4mg Capsule', 'Yohim', 'RADIANT'),
(706, 'Zinc Orotate 10mg Tablet', 'Xinc ot', 'SKF'),
(707, 'Zinc Sulphate + Vita-B complex Syrup', 'Xinc-B', 'SKF'),
(708, 'Zinc Sulphate 10mg/5ml Syrup', 'Xinc', 'SKF'),
(709, 'Zinc Sulphate 20mg Tablet', 'Xinc', 'SKF'),
(710, 'Zolmitriptan 2.5 mg Tablet', 'Nomi', 'SQUARE');

-- --------------------------------------------------------

--
-- Stand-in structure for view `mytest`
--
CREATE TABLE IF NOT EXISTS `mytest` (
`m1` varchar(200)
,`m2` varchar(200)
,`m3` varchar(500)
,`m4` varchar(500)
,`m5` varchar(500)
);

-- --------------------------------------------------------

--
-- Table structure for table `newbed`
--

CREATE TABLE IF NOT EXISTS `newbed` (
  `id` int(10) NOT NULL,
  `category` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `bno` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `pmrn` varchar(100) NOT NULL,
  `adate` varchar(100) NOT NULL,
  `dname` varchar(100) NOT NULL,
  `eid` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newbed`
--

INSERT INTO `newbed` (`id`, `category`, `type`, `bno`, `status`, `pname`, `pmrn`, `adate`, `dname`, `eid`) VALUES
(15, '', 'Ward1', 'ICU01', '', 'Steven Adman Dias', '123456', '05/21/2018', 'Dr. Rajeeb Hassan', ''),
(16, '', 'Ward1', 'ICU01', '', 'Jamal Uddin', '234567', '05/21/2018', 'Dr. Ranen Biswas', ''),
(17, '', 'Ward1', 'w001', '', 'Steven Adman Dias', '123456', '05/20/2018', 'Dr. Ranen Biswas', ''),
(18, '', 'Ward2', 'w002', '', 'Steven Adman Dias', '123456', '05/21/2018', 'Dr. Ranen Biswas', ''),
(19, '', 'Ward2', 'w002', '', 'Steven Adman Dias', '123456', '05/23/2018', 'Dr. Ranen Biswas', ''),
(20, '', 'Ward1', 'ICU01', '', 'Jamal Uddin', '234567', '05/24/2018', 'Dr. Ranen Biswas', ''),
(21, '', 'Ward1', 'ICU01', '', 'Kamal Khan', '345678', '05/21/2018', '', ''),
(22, '', 'Ward1', 'ICU01', '', 'Kamal Khan', '345678', '05/21/2018', '', ''),
(23, '', 'Ward1', 'ICU01', '', 'Kamal Khan', '345678', '05/22/2018', 'Dr. Rajeeb Hassan', ''),
(24, '', 'Ward1', 'w001', '', 'IIOUU', '998877', '05/22/2018', 'Dr. J.M.Q. Quaser Alam', ''),
(25, '', 'Ward2', 'w002', '', 'IIOUU', '998877', '05/22/2018', 'Dr. Ranen Biswas', ''),
(26, '', 'Ward3', 'CCU01', '', 'Steven Adman Dias', '123456', '05/22/2018', 'Dr. Rajeeb Hassan', ''),
(27, '', 'Ward1', 'ICU01', '', 'Steven Adman Dias', '123456', '05/24/2018', 'Dr. J.M.Q. Quaser Alam', ''),
(28, '', 'Ward3', 'CCU01', '', 'Jamal Uddin', '234567', '05/26/2018', '', ''),
(29, '', 'Ward3', 'CCU01', '', 'Kamal Khan', '345678', '05/25/2018', 'Dr. Rajeeb Hassan', ''),
(30, '', 'Ward3', 'CCU01', '', 'Kamal Khan', '345678', '05/26/2018', 'Dr. Ranen Biswas', ''),
(31, '', 'Ward1', 'ICU01', '', 'Steven Adman Dias', '123456', '05/24/2018', 'Dr. Rajeeb Hassan', ''),
(32, '', 'Ward1', 'ICU01', '', 'Jamal Uddin', '234567', '06/15/2018', 'Dr. Ranen Biswas', ''),
(33, '', 'Ward1', 'w001', '', 'Steven Adman Dias', '123456', '05/21/2018', 'Dr. Rajeeb Hassan', ''),
(34, '', 'Ward1', 'ICU01', '', 'Steven Adman Dias', '123456', '05/23/2018', 'Dr. Rajeeb Hassan', ''),
(35, '', 'Ward1', 'w001', '', 'Steven Adman Dias', '123456', '05/24/2018', 'Dr. Ranen Biswas', ''),
(36, '', 'Ward1', 'ICU01', '', 'Steven Adman Dias', '123456', '05/24/2018', 'Dr. Rajeeb Hassan', ''),
(37, '', 'Ward1', 'w001', '', 'Steven Adman Dias', '123456', '05/25/2018', 'Dr. Ranen Biswas', ''),
(38, '', 'Ward1', 'ICU01', '', 'Steven Adman Dias', '123456', '05/26/2018', '', ''),
(39, '', 'Ward1', 'ICU01', '', 'Steven Adman Dias', '123456', '05/27/2018', 'Dr. Rajeeb Hassan', '4'),
(40, '', 'Ward1', 'ICU01', '', 'MERRY BAROI', '666988', '05/27/2018', 'Dr. Rajeeb Hassan', '1'),
(41, '', 'Ward2', 'w002', '', 'MERRY BAROI', '666988', '05/28/2018', 'Dr. Rajeeb Hassan', '1'),
(42, '', 'Ward1', 'ICU01', '', 'MERRY BAROI', '666988', '05/28/2018', 'Dr. Rajeeb Hassan', '1'),
(43, '', 'Ward1', 'w001', '', 'Steven Adman Dias', '123456', '05/28/2018', 'Dr. Ranen Biswas', '5'),
(44, '', 'Ward1', 'ICU01', '', 'Kamal Khan', '345678', '05/27/2018', 'Dr. Rajeeb Hassan', '1'),
(45, '', 'Ward2', 'w002', '', 'dias adman', '111222', '05/27/2018', 'Dr. J.M.Q. Quaser Alam', '1'),
(46, '', 'Ward1', 'w001', '', 'IIOUU', '998877', '05/27/2018', 'Dr. Ranen Biswas', '1'),
(47, '', 'Ward1', 'ICU01', '', 'LALALALA', '999678', '05/27/2018', 'Dr. Ranen Biswas', '1'),
(48, '', 'Ward2', 'w002', '', 'vvvv', '334442', '05/27/2018', 'Dr. J.M.Q. Quaser Alam', '1'),
(49, '', 'Ward1', 'w001', '', 'BBBBB', '222555', '05/28/2018', 'Dr. Ranen Biswas', '1'),
(50, '', 'Ward1', 'ICU01', '', 'IUIUOIIUUIUOUIOUOUOUUIOUOUOU', '995566', '05/28/2018', 'Dr. Ranen Biswas', '1'),
(51, '', 'Ward1', 'ICU01', '', 'STEVE', '654321', '05/28/2018', 'Dr. Rajeeb Hassan', '1'),
(52, '', 'Ward1', 'ICU01', '', 'Steven Adman Dias', '123456', '05/29/2018', 'Dr. J.M.Q. Quaser Alam', '6'),
(53, '', 'Ward2', 'w002', '', 'Jamal Uddin', '234567', '05/29/2018', 'Dr. J.M.Q. Quaser Alam', '1'),
(54, '', 'Ward1', 'w001', '', 'ARIF', '666555', '05/29/2018', 'Dr. J.M.Q. Quaser Alam', '1'),
(55, '', 'Ward1', 'w001', '', 'SUCCESS', '334567', '05/29/2018', 'Dr. Rajeeb Hassan', '1'),
(56, '', 'Ward3', 'CCU01', '', 'SUCCESS', '334567', '05/29/2018', 'Dr. Rajeeb Hassan', '1'),
(57, '', 'Ward1', 'ICU01', '', 'SUCCESS', '334567', '05/29/2018', 'Dr. Rajeeb Hassan', '1'),
(58, '', 'Ward1', 'w001', '', 'SUCCESS', '334567', '2018-05-29 16:06:37', 'Dr. Rajeeb Hassan', '1');

-- --------------------------------------------------------

--
-- Table structure for table `ot`
--

CREATE TABLE IF NOT EXISTS `ot` (
  `id` int(10) NOT NULL,
  `dname` varchar(100) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `pmrn` int(10) NOT NULL,
  `psex` varchar(100) NOT NULL,
  `page` int(3) NOT NULL,
  `adate` varchar(20) NOT NULL,
  `otdate` varchar(20) NOT NULL,
  `diagnosis` varchar(500) NOT NULL,
  `operation` varchar(500) NOT NULL,
  `duration` varchar(10) NOT NULL,
  `spereq` varchar(500) NOT NULL,
  `bookingdt` varchar(20) NOT NULL,
  `ptype` varchar(50) NOT NULL,
  `tanes` varchar(50) NOT NULL,
  `need` varchar(50) NOT NULL,
  `nanes` varchar(50) NOT NULL,
  `pphone` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `papp`
--

CREATE TABLE IF NOT EXISTS `papp` (
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
  `height` varchar(100) NOT NULL,
  `weight` varchar(100) NOT NULL,
  `temp` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `papp`
--

INSERT INTO `papp` (`ID`, `dname`, `pname`, `pmrn`, `pphone`, `page`, `psex`, `padd`, `adate`, `aslot`, `height`, `weight`, `temp`, `status`) VALUES
(1, 'dname', '', '', '', '', '', 'padd', '02/22/2018', '', '', '', '', 'SEEN'),
(2, '   steven', '', '', '', '', '', '', '02/22/2018', '', '', '', '', ''),
(3, '   adman', 'Sakib', '9898', '', '', '', 'dhaka', '02/22/2018', '', '', '', '', ''),
(4, '   adman', 'Kaiser', '7878', '', '', '', 'dhaka', '02/24/2018', '9:00AM', '', '', '', ''),
(5, '   steven', 'gfgfghfg', 'fhgfgfgf', '', '', '', 'hhjgj', '02/27/2018', '9:00AM', '', '', '', ''),
(6, '   steven', 'Akash', '1234', '', '', '', 'ihh', '02/28/2018', '------- Select --------', '', '', '', ''),
(7, '   steven', 'Sumon', '54321', '', '', '', 'dhaka', '', '10:00AM', '', '', '', ''),
(8, '   steven', 'Nayeem', '5674', '', '', '', 'dhaka', '(m/d/Y)', '11:00AM', '', '', '', ''),
(9, '   steven', '78989', '9898', '', '', '', 'hhjgj', '', '1:00PM', '', '', '', ''),
(10, '   steven', 'Sakib', '1234', '', '', '', 'hhjgj', '02/21/2018', '12:00PM', '', '', '', ''),
(11, '   steven', 'tomal', '4321', '', '', '', 'dhaka', '02/21/2018', '11:00AM', '', '', '', ''),
(12, '   steven', 'Sakib', '9898', '', '', '', 'dhaka', '', '12:00PM', '', '', '', ''),
(13, 'OO', 'steven', '9898', '', '', '', 'dhaka', '   02/26/2018', '1:00PM', '', '', '', ''),
(14, '   adman', '78989', '7878', '', '', '', 'ihh', '   02/28/2018', '9:00AM', '', '', '', ''),
(15, 'steven', 'Sakib', '1234', '', '', '', 'dhaka', '02/26/2018', '10:00AM', '', '', '', ''),
(16, 'steven', 'joshim', '8787', '', '', '', 'sadjaslkd', '02/26/2018', '1:00PM', '', '', '', ''),
(17, 'adman', 'Sakib', '9898', '', '', '', 'hhjgj', '02/28/2018', '10:00AM', '', '', '', ''),
(18, 'adman', 'steven', '9898', '', '', '', 'dhaka', '02/24/2018', '9:00AM', '', '', '', ''),
(19, 'adman', 'steven', '9898', '', '', '', 'dhaka', '02/24/2018', '9:00AM', '', '', '', ''),
(20, 'adman', 'tomal', '1234', '', '', '', 'sajdnjsa', '02/24/2018', '9:00AM', '', '', '', ''),
(21, 'adman', 'tomal', '1234', '', '', '', 'sajdnjsa', '02/24/2018', '9:00AM', '', '', '', ''),
(22, 'adman', 'Sakib', '4321', '', '', '', 'dha', '02/24/2018', '10:00AM', '', '', '', ''),
(23, 'adman', 'Sakib', '4321', '', '', '', 'dha', '02/24/2018', '10:00AM', '', '', '', ''),
(24, 'adman', '78989', '4321', '', '', '', 'hhjgj', '02/24/2018', '10:00AM', '', '', '', ''),
(25, 'adman', '78989', '4321', '', '', '', 'hhjgj', '02/24/2018', '10:00AM', '', '', '', ''),
(26, 'adman', '78989', '4321', '', '', '', 'hhjgj', '02/24/2018', '10:00AM', '', '', '', ''),
(27, 'adman', '78989', '4321', '', '', '', 'hhjgj', '02/24/2018', '10:00AM', '', '', '', ''),
(28, 'adman', '78989', '4321', '', '', '', 'hhjgj', '02/24/2018', '10:00AM', '', '', '', ''),
(29, 'adman', 'Sakib', '9898', '', '', '', 'hhjgj', '02/24/2018', '10:00AM', '', '', '', ''),
(30, 'adman', 'Sakib', '9898', '', '', '', 'hhjgj', '02/24/2018', '10:00AM', '', '', '', ''),
(31, 'adman', 'steven', '4321', '', '', '', 'dha', '02/24/2018', '10:00AM', '', '', '', ''),
(32, 'adman', 'steven', '4321', '', '', '', 'dha', '02/24/2018', '10:00AM', '', '', '', ''),
(33, 'adman', 'Sakib', '4321', '', '', '', 'sajdnjsa', '02/24/2018', '10:00AM', '', '', '', ''),
(34, 'adman', 'steven', '1234', '', '', '', 'hhjgj', '02/24/2018', '10:00AM', '', '', '', ''),
(35, 'adman', 'steven', '1234', '', '', '', 'hhjgj', '02/24/2018', '10:00AM', '', '', '', ''),
(36, 'adman', 'merry', '7676', '', '', '', 'Dhaka', '02/24/2018', '11:00AM', '', '', '', ''),
(37, 'adman', 'Juwel', '5555', '', '', '', 'jsahjh', '02/03/2018', '9:00AM', '', '', '', ''),
(38, 'steven', 'taufik', '1111', '', '', '', 'dhaka', '02/23/2018', '9:00AM', '', '', '', ''),
(39, 'steven', 'Zaki Hossain', '123456', '', '', '', 'Dhaka', '02/25/2018', '9:00AM', '', '', '', ''),
(40, 'steven', 'jamal', '12613', '', '', '', 'zxhvjlxk', '03/11/2018', '9:00AM', '', '', '', ''),
(41, 'steven', 'Rashed', '99990', '', '', '', '', '03/11/2018', '10:00AM', '', '', '', ''),
(42, 'steven', 'Kamal', '54654', '', '', '', '', '03/11/2018', '12:00PM', '', '', '', ''),
(43, 'steven', 'Hossain', '524365', '732784', '', '', '', '03/11/2018', '11:00AM', '', '', '', ''),
(44, 'steven', 'Asad', '4444', '7657687', '', '', '', '03/12/2018', '9:00AM', '', '', '', 'SEEN'),
(45, 'steven', 'Faisal', '6666', '897987987', '', '', '', '03/12/2018', '10:00AM', '', '', '', 'SEEN'),
(46, 'steven', 'Polahs', '78237', '9-992379878', '', '', '', '03/12/2018', '11:00AM', '', '', '', 'SEEN'),
(47, 'steven', 'Merry', '7777', '0325-293-5', '', '', '', '03/12/2018', '12:00PM', '', '', '', 'SEEN'),
(48, 'steven', 'Merry', '7777', '0325-293-5', '', '', '', '03/12/2018', '12:00PM', '', '', '', ''),
(49, 'steven', 'Merry', '7777', '0325-293-5', '', '', '', '03/12/2018', '12:00PM', '', '', '', ''),
(50, 'steven', 'Sunny', '989080', '74357438798', '', '', '', '03/12/2018', '1:00PM', '', '', '', 'SEEN'),
(51, 'steven', 'ooooo', '6757', 'y78678678', '', '', '', '03/12/2018', '2:00PM', '', '', '', 'SEEN'),
(52, 'steven', 'uuuuu', '67575', '657576576', '', '', '', '03/12/2018', '3:00PM', '', '', '', ''),
(53, 'steven', 'ttttt', '67567', '', '', '', '', '03/12/2018', '4:00PM', '', '', '', 'SEEN'),
(54, 'steven', 'ABCD', '12312', '234235', '', '', '', '03/13/2018', '9:00AM', '', '', '', 'SEEN'),
(55, 'steven', 'ABCDE', '675675', '', '', '', '', '03/13/2018', '10:00AM', '', '', '', 'SEEN'),
(56, 'steven', 'DGGH', '789', '87987987', '', '', '', '03/13/2018', '11:00AM', '', '', '', 'SEEN'),
(57, 'steven', 'DGGHJH', '76786', '7867868686', '', '', '', '03/13/2018', '12:00PM', '', '', '', 'SEEN'),
(58, 'steven', 'jsfdhjkdshfk', '7362784', '', '', '', '', '03/14/2018', '9:00AM', '', '', '', 'SEEN'),
(59, 'steven', 'ytuttt', '6757', '', '', '', '', '03/14/2018', '10:00AM', '', '', '', 'SEEN'),
(60, 'steven', 'rrr', '2343', '325', '', '', '', '03/14/2018', '11:00AM', '', '', '', 'SEEN'),
(61, 'steven', 'eee', '65800', '24235', '', '', '', '03/14/2018', '12:00PM', '', '', '', 'SEEN'),
(62, 'steven', 'IUIUI', '656', '897398579', '', '', '', '03/14/2018', '3:00PM', '', '', '', 'SEEN'),
(63, 'steven', 'FINAL TEST', '99779', '010012993', '', '', '', '03/14/2018', '4:00PM', '', '', '', 'SEEN'),
(64, 'steven', 'iuhiuhu', '987897', '98797897', '', '', '', '03/15/2018', '9:00AM', '', '', '', 'SEEN'),
(65, 'steven', 'uoiuoiuo', '877897', '7867666868', '', '', '', '03/15/2018', '10:00AM', '', '', '', 'SEEN'),
(66, 'steven', 'Merry Baroi', '76567', '01711206048', '', '', 'Dhaka 1215', '03/16/2018', '9:00AM', '', '', '', 'SEEN'),
(67, 'steven', 'jhkhkj', '87897', '879879797', '', '', 'uiuh', '03/16/2018', '10:00AM', '', '657', '7687', 'NOT SEEN'),
(68, 'steven', 'Akbar Ali Khan', '98789', '98798777', '43', '', 'Dhaka, Farmgate', '03/16/2018', '11:00AM', '656', '554', '665', 'SEEN'),
(69, 'steven', 'sajknjk', 'hjkhkhkh', 'hjkh', 'jhhk', '', 'hjkhhk', '03/17/2018', '9:00AM', 'h', '', '', 'SEEN'),
(70, 'steven', 'jsahfhdhsjfkh', '6757', '7868678', '656', '', 'jhjkhjkhhjk', '03/17/2018', '10:00AM', '675', '56745', '234', 'SEEN'),
(71, 'adman', 'TTT', '78678', '7678686786', '657', '', 'hsabdsgj', '03/17/2018', '9:00AM', '546', '5465', '465', 'SEEN'),
(72, 'steven', 'Agfghfh', '6567567', '65675765', '54', '', 'hgjgjhggjg', '03/18/2018', '9:00AM', '344', '34', '43243', 'SEEN'),
(73, 'steven', 'RRR', '776', '76767', '56', '', 'hgasgd', '03/19/2018', '9:00AM', '45', '45', '34', 'SEEN'),
(74, 'steven', 'GFHGFHFHG', '65675', '786868', 'r3', '', 'ghggfd', '03/19/2018', '10:00AM', '', '', '', 'SEEN'),
(75, 'steven', 'HHH', '6789', '667788', '78', 'MALE', 'TTT', '03/19/2018', '11:00AM', '567', '67', '66', 'SEEN'),
(76, 'steven', 'mhkj', '', '', '', '--GENDER--', 'jhkj', '03/19/2018', '9:00AM', '', '', '', 'SEEN'),
(77, 'steven', 'jkljllkj', '78686', '687', '7678', 'MALE', 'kjlkj', '03/20/2018', '10:00AM', '768', '6768', '768', 'SEEN'),
(78, 'steven', 'ABCD', '098908', '8789', '89797', 'MALE', '5454', '03/24/2018', '9:00AM', '78678', '7686', '786', 'NOT SEEN'),
(79, 'steven', 'JHKHJKH', '98798798', '9876897798', '78', '', 'jhjkhjkh', '03/25/2018', '9:00AM', '7868', '76786', '7678', 'SEEN'),
(80, 'steven', 'KJLKJlk', '7676', '76', '76', '', 'klJLKJLKJLKj', '03/25/2018', '10:00AM', '7677', '767', '767', 'SEEN'),
(81, 'steven', 'OIOIOI', '78678', '78678', '78678', 'FEMALE', 'YTYT', '03/25/2018', '11:00AM', '76786', '78678', '7868', 'SEEN'),
(82, 'steven', 'HHHHHH', '878090', '786866', '76', 'MALE', 'IUIU', '03/26/2018', '9:00AM', '76', '76', '76', 'SEEN'),
(83, 'steven', 'AAA', '6567476', '897987', '88979', 'MALE', 'GFGHF', '03/26/2018', '10:00AM', '78', '78', '78', 'SEEN'),
(84, 'steven', 'AAAA', '00009', '89899', '777', 'MALE', 'BBB', '03/27/2018', '9:00AM', '7', '76', '76', 'SEEN'),
(85, 'steven', 'JHJKH', '7878978', '8878', '7878', 'MALE', 'jhjkhjkh', '03/27/2018', '10:00AM', '87', '8778', '87', 'SEEN'),
(86, 'steven', 'UUU', '987897', '879798', '87', 'MALE', 'nbsdbkfb', '04/11/2018', '9:00AM', '879', '87', '879', 'SEEN'),
(87, 'steven', 'KHKJK', '8878978', '8798789778', '787', 'MALE', 'HJGJG', '04/12/2018', '9:00AM', '878', '878', '87', 'SEEN'),
(88, 'steven', 'KJKJ', '987987', '87987879797', '87', 'MALE', 'kjkj', '04/12/2018', '2:00PM', '87', '87', '87', 'SEEN'),
(89, 'steven', 'Steven Adman Dias', '565656', '01711206048', '32', 'MALE', '44/H Indira Road, Dhaka', '04/12/2018', '11:00AM', '65', '65', '65', 'NOT SEEN'),
(90, 'steven', 'Steven Adman Dias', '565656', '01711206048', '32', 'MALE', '44/H Indira Road, Dhaka', '04/12/2018', '11:00AM', '65', '65', '65', 'NOT SEEN'),
(91, 'steven', 'Steven Adman Dias', '1234', '01711206048', '32', 'MALE', '44/H Indira Road, Dhaka', '04/12/2018', '10:00AM', '87', '878', '79', 'NOT SEEN'),
(92, 'adman', 'GHGHJG', 't6786786', '78686', '8', 'MALE', 'YTYUTUT', '04/28/2018', '9:00AM', '767', '6786', '78676', 'NOT SEEN'),
(93, 'steven', 'IUIUOI', '78688', '90890890809', '980', 'MALE', 'IUOIUIOU', '04/28/2018', '9:00AM', '98908', '89', '880', 'SEEN'),
(94, 'steven', 'Zahid Hassan', '000111', '277387498', '778', 'MALE', '66 Gulshan', '04/30/2018', '9:00AM', '878', '878', '787', 'SEEN'),
(95, 'steven', 'Steven Adman Dias', '989898', '09090909099', '43', 'MALE', '105/11 Monipuripara, Farmgate, Dhaka', '05/01/2018', '9:00AM', '8', '545', '54', 'SEEN'),
(96, 'steven', 'ADMAN DIAS', '777777', '777777', '7878', 'MALE', '105/11, Monipuripara', '05/01/2018', '10:00AM', '', '', '', 'SEEN'),
(97, 'steven', 'Steven Adman Dias', '1234', '01711206048', '32', 'MALE', '44/H Indira Road, Dhaka', '05/01/2018', '11:00AM', '87', '878', '76', 'SEEN'),
(98, 'steven', 'TEST1', '666666', '01711206048', '23', 'MALE', 'Australia', '05/02/2018', '9:00AM', '234', '13', '14', 'SEEN'),
(99, 'steven', '', '666666', '01711206048', '23', 'MALE', '', '', '', '234', '13', '14', 'NOT SEEN'),
(100, 'steven', 'Akash Chopra', '555555', '01711206048', '34', 'MALE', 'India', '05/02/2018', '10:00AM', '78', '54', '90', 'SEEN'),
(101, 'adman', 'Akash Chopra', '555555', '01711206048', '34', 'MALE', '', '05/02/2018', '', '78', '54', '90', 'NOT SEEN'),
(102, 'steven', 'FINAL TEST', '100001', '01711206048', '23', 'MALE', 'HEAVEN', '05/02/2018', '11:00AM', '76', '70', '95', 'SEEN'),
(103, 'steven', 'Alamgir Hossain', '999888', '01711206048', '54', 'MALE', 'C/12, TETUIBARI', '05/02/2018', '1:00PM', '34', '54', '54', 'NOT SEEN'),
(104, 'adman', 'Sakib', '888999', '01711206048', '54', 'MALE', '44/H Indira Road, Dhaka', '05/02/2018', '9:00AM', '34', '23', '24', 'NOT SEEN'),
(105, 'steven', 'KJHKJHJHKH', '666999', '76666', '767868', 'MALE', 'JHJKHJKH', '05/03/2018', '9:00AM', '66', '766', '78678', 'NOT SEEN'),
(106, 'steven', 'JKHJHJKH', '1111', '93598789', '87897', 'MALE', 'JHJKHJKHHJHJHKH', '05/13/2018', '9:00AM', 'hu', 'jhjkh', 'jkhjk', 'NOT SEEN');

-- --------------------------------------------------------

--
-- Table structure for table `pappnew`
--

CREATE TABLE IF NOT EXISTS `pappnew` (
  `ID` int(6) NOT NULL,
  `eid` int(8) NOT NULL,
  `dname` varchar(100) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `pmrn` varchar(10) NOT NULL,
  `pphone` varchar(11) NOT NULL,
  `page` varchar(100) NOT NULL,
  `psex` varchar(10) NOT NULL,
  `padd` varchar(100) NOT NULL,
  `adate` varchar(100) NOT NULL,
  `aslot` varchar(100) NOT NULL,
  `height` varchar(100) NOT NULL,
  `weight` varchar(100) NOT NULL,
  `temp` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `dreffer` varchar(100) NOT NULL,
  `bill` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pappnew`
--

INSERT INTO `pappnew` (`ID`, `eid`, `dname`, `pname`, `pmrn`, `pphone`, `page`, `psex`, `padd`, `adate`, `aslot`, `height`, `weight`, `temp`, `status`, `dreffer`, `bill`) VALUES
(38, 0, 'Dr. Rajeeb Hassan', 'Steven Adman Dias', '123456', '01711206048', '31', 'MALE', '44/H, Indira Road, Farmgate, Dhaka, 1215', '05/21/2018', '10:00AM', '76', '76', '76', 'SEEN', '', ''),
(39, 0, 'Dr. Ranen Biswas', 'Steven Adman Dias', '123456', '01711206048', '44/H, Indira Road, Farmgate, Dhaka, 1215', 'MALE', '44/H, Indira Road, Farmgate, Dhaka, 1215', '05/21/2018', '10:00AM', '76', '76', '76', 'SEEN', 'Dr. Rajeeb Hassan', ''),
(40, 0, 'Dr. Rajeeb Hassan', 'Jamal Uddin', '234567', '0325-293-5', '45', 'MALE', '44/H, Indira Road', '05/21/2018', '10:15AM', '87', '8778', '87', 'SEEN', '', ''),
(41, 0, 'Dr. Ranen Biswas', 'Steven Adman Dias', '123456', '01711206048', '31', 'MALE', '44/H, Indira Road, Farmgate, Dhaka, 1215', '05/21/2018', '10:15AM', 'hdjfhjds', 'jhjhh', 'jkhj', 'SEEN', '', 'BILLED'),
(42, 0, 'Dr. Rajeeb Hassan', 'Steven Adman Dias', '123456', '01711206048', '44/H, Indira Road, Farmgate, Dhaka, 1215', 'MALE', '44/H, Indira Road, Farmgate, Dhaka, 1215', '05/21/2018', '11:45AM', 'hdjfhjds', 'jhjhh', 'jkhj', 'NOT SEEN', 'Dr. Ranen Biswas', 'BILLED'),
(43, 0, 'Dr. J.M.Q. Quaser Alam', 'Kamal Khan', '345678', '01711206048', '65', 'MALE', '44/H Indira Road, Dhaka', '05/21/2018', '10:00AM', '76', '76', '67', 'SEEN', '', 'BILLED'),
(44, 0, '', '', '', '', '', '--GENDER--', '', '', '--Select--', '', '', '', 'NOT SEEN', '', '--BILL STATUS--'),
(45, 0, '', '', '', '', '', '--GENDER--', '', '', '--Select--', '', '', '', 'NOT SEEN', '', '--BILL STATUS--'),
(46, 0, '', '', '', '', '', '--GENDER--', '', '', '--Select--', '', '', '', 'NOT SEEN', '', '--BILL STATUS--'),
(47, 0, '', '', '', '', '', '--GENDER--', '', '', '--Select--', '', '', '', 'NOT SEEN', '', '--BILL STATUS--'),
(48, 0, '', '', '', '', '', '--GENDER--', '', '', '--Select--', '', '', '', 'NOT SEEN', '', '--BILL STATUS--'),
(49, 0, '', '', '', '', '', '--GENDER--', '', '', '--Select--', '', '', '', 'NOT SEEN', '', '--BILL STATUS--'),
(50, 0, '', '', '', '', '', '--GENDER--', '', '', '--Select--', '', '', '', 'NOT SEEN', '', '--BILL STATUS--'),
(51, 0, '', '', '', '', '', '--GENDER--', '', '', '--Select--', '', '', '', 'NOT SEEN', '', '--BILL STATUS--'),
(52, 0, '', '', '', '', '', '--GENDER--', '', '', '--Select--', '', '', '', 'NOT SEEN', '', '--BILL STATUS--'),
(53, 0, '', '', '', '', '', '--GENDER--', '', '', '--Select--', '', '', '', 'NOT SEEN', '', '--BILL STATUS--'),
(54, 0, '', '', '', '', '', '--GENDER--', '', '', '--Select--', '', '', '', 'NOT SEEN', '', '--BILL STATUS--'),
(55, 0, '', '', '', '', '', '--GENDER--', '', '', '--Select--', '', '', '', 'NOT SEEN', '', '--BILL STATUS--'),
(56, 0, '', '', '', '', '', '--GENDER--', '', '', '--Select--', '', '', '', 'NOT SEEN', '', 'BILLED'),
(57, 0, '', '', '', '', '', '--GENDER--', '', '', '--Select--', '', '', '', 'NOT SEEN', '', 'BILLED'),
(58, 0, 'Dr. J.M.Q. Quaser Alam', 'IIOUU', '998877', '0325-293-5', '87', 'MALE', '998877', '05/22/2018', '12:00PM', '8787', '87', '878', 'NOT SEEN', '', 'BILLED'),
(59, 0, 'Dr. J.M.Q. Quaser Alam', 'GGGG', '123456', '', '', 'MALE', 'sfjkhdsjkhf', '05/24/2018', '10:00AM', '', '', '', 'NOT SEEN', '', ''),
(60, 0, 'Dr. J.M.Q. Quaser Alam', '', '332211', '5645645', '54654545', 'FEMALE', 'ytytyty', '06/02/2018', '10:15AM', '445', '456', '4654', 'NOT SEEN', '', ''),
(61, 0, 'Dr. J.M.Q. Quaser Alam', 'dias adman', '111222', '76786', '767', 'MALE', 'HGJHGHJG', '06/02/2018', '10:30AM', '866', '678', '868', 'NOT SEEN', '', 'BILLED'),
(62, 0, 'Dr. J.M.Q. Quaser Alam', 'GGGGGGG', '111222', '87786786', '7678678', 'MALE', 'kjkjkj', '06/02/2018', '10:45AM', '6767', '68', '6786', 'NOT SEEN', '', ''),
(63, 0, 'Dr. J.M.Q. Quaser Alam', 'JLKJLKJLKJKLKJJK', '111222', '89798799', '798', 'MALE', 'kjlkjlkjjklj', '06/02/2018', '11:00AM', '77', '789777', '897987', 'NOT SEEN', '', ''),
(64, 0, 'Dr. J.M.Q. Quaser Alam', 'JLKJLKJLKJKLKJJK', '111222', '89798799', '798', 'MALE', 'kjlkjlkjjklj', '06/02/2018', '11:00AM', '77', '789777', '897987', 'NOT SEEN', '', ''),
(65, 0, 'Dr. J.M.Q. Quaser Alam', 'jkhjkhj', '111222', '5675675767', '565', 'MALE', 'hjkjhjkh', '06/02/2018', '11:15AM', '5675', '5675', '57', 'NOT SEEN', '', ''),
(66, 0, 'Dr. J.M.Q. Quaser Alam', 'ARIF', '666555', '98797', '98', 'MALE', 'LKJLKJLK', '06/02/2018', '11:30AM', '7897', '79', '97', 'NOT SEEN', '', ''),
(67, 0, 'Dr. J.M.Q. Quaser Alam', 'vvvv', '334442', 'hghjghj', 'gg', 'MALE', 'cccc', '06/02/2018', '11:45AM', 'hjgjg', 'j', 'gh', 'NOT SEEN', '', ''),
(68, 0, 'Dr. J.M.Q. Quaser Alam', 'LALALALA', '999678', 'hjg', 'jhgj', 'MALE', 'sdbhf', '06/02/2018', '12:00PM', 'hjg', 'hj', 'g', 'NOT SEEN', '', 'NOT BILLED'),
(69, 0, 'Dr. J.M.Q. Quaser Alam', 'SUCCESS', '334567', 'hjgjgjh', 'ghjg', 'MALE', 'COME LAST', '06/02/2018', '12:15PM', 'jgg', 'hjg', 'gjg', 'NOT SEEN', '', 'BILLED'),
(70, 0, 'Dr. J.M.Q. Quaser Alam', 'jdshkhfjksdhfjkh', '666987', 'jhjkhk', 'jkhh', 'MALE', 'jhjkhkj', '06/02/2018', '12:30PM', 'kkhjk', 'jkh', 'jkhk', 'NOT SEEN', '', 'BILLED'),
(71, 0, 'Dr. Rajeeb Hassan', 'Steven Adman Dias', '123456', '01711206048', '31', 'MALE', '44/H, Indira Road, Farmgate, Dhaka, 1215', '05/26/2018', '--Select--', '', '', '', 'SEEN', '', 'BILLED'),
(72, 0, 'Dr. Rajeeb Hassan', 'MERRY BAROI', '666988', '76786678', '767', 'FEMALE', '44/H, Indira Road, Farmgate, Dhaka, 1215', '05/26/2018', '10:15AM', '67866', '678', '7867', 'SEEN', '', 'BILLED'),
(73, 0, 'Dr. Ranen Biswas', 'MERRY BAROI', '666988', '76786678', '767', 'FEMALE', '44/H, Indira Road, Farmgate, Dhaka, 1215', '05/26/2018', '10:45AM', '', '', '', 'SEEN', '', 'BILLED'),
(74, 0, 'Dr. Rajeeb Hassan', 'Steven Adman Dias', '123456', '01711206048', '31', 'MALE', '44/H, Indira Road, Farmgate, Dhaka, 1215', '05/26/2018', '10:30AM', '', '', '', 'NOT SEEN', '', ''),
(75, 0, 'Dr. Rajeeb Hassan', 'MERRY BAROI', '666988', '76786678', '767', 'FEMALE', '44/H, Indira Road, Farmgate, Dhaka, 1215', '05/27/2018', '10:00AM', '76', '67', '67', 'SEEN', '', 'BILLED'),
(76, 0, 'Dr. Ranen Biswas', 'MERRY BAROI', '666988', '76786678', '44/H, Indira Road, Farmgate, Dhaka, 1215', 'FEMALE', '44/H, Indira Road, Farmgate, Dhaka, 1215', '05/27/2018', '10:45AM', '76', '67', '67', 'SEEN', 'Dr. Rajeeb Hassan', 'BILLED'),
(77, 0, 'Dr. Ranen Biswas', 'Steven Adman Dias', '123456', '01711206048', '31', 'MALE', '44/H, Indira Road, Farmgate, Dhaka, 1215', '05/27/2018', '10:00AM', '', '', '', 'SEEN', '', 'BILLED'),
(78, 0, 'Dr. Rajeeb Hassan', 'BBBBB', '222555', '987', '987', 'MALE', 'jhjhj', '05/28/2018', '10:00AM', '', '', '', 'SEEN', '', 'BILLED'),
(79, 0, 'Dr. Rajeeb Hassan', 'BBBBB', '222555', '987', '987', 'MALE', 'jhjhj', '05/28/2018', '10:00AM', '', '', '', 'SEEN', '', 'BILLED'),
(80, 0, 'Dr. Rajeeb Hassan', 'Steven Adman Dias', '123456', '01711206048', '31', 'MALE', '44/H, Indira Road, Farmgate, Dhaka, 1215', '05/28/2018', '02:45PM', '', '', '', 'SEEN', '', 'BILLED'),
(81, 0, 'Dr. Rajeeb Hassan', 'Steven Adman Dias', '123456', '01711206048', '31', 'MALE', '44/H, Indira Road, Farmgate, Dhaka, 1215', '05/28/2018', '03:30PM', '', '', '', 'SEEN', '', 'BILLED'),
(82, 0, 'Dr. Rajeeb Hassan', 'BBBBB', '222555', '987', '987', 'MALE', 'jhjhj', '05/28/2018', '02:00PM', '', '', '', 'SEEN', '', 'BILLED'),
(83, 0, 'Dr. Rajeeb Hassan', 'Steven Adman Dias', '123456', '01711206048', '31', 'MALE', '44/H, Indira Road, Farmgate, Dhaka, 1215', '05/29/2018', '10:00AM', '', '', '', 'SEEN', '', 'BILLED'),
(84, 0, 'Dr. Rajeeb Hassan', 'Steven Adman Dias', '123456', '01711206048', '31', 'MALE', '44/H, Indira Road, Farmgate, Dhaka, 1215', '05/29/2018', '10:15AM', '', '', '', 'SEEN', '', 'BILLED'),
(85, 0, 'Dr. Rajeeb Hassan', 'SUCCESS', '334567', 'hjgjgjh', '0', 'MALE', 'COME LAST', '05/29/2018', '10:30AM', '', '', '', 'SEEN', '', 'BILLED'),
(86, 0, 'Dr. Ranen Biswas', 'Steven Adman Dias', '123456', '01711206048', '44/H, Indira Road, Farmgate, Dhaka, 1215', 'MALE', '44/H, Indira Road, Farmgate, Dhaka, 1215', '05/29/2018', '', '', '', '', 'NOT SEEN', 'Dr. Rajeeb Hassan', ''),
(87, 0, 'Dr. Rajeeb Hassan', 'Steven Adman Dias', '123456', '01711206048', '31', 'MALE', '44/H, Indira Road, Farmgate, Dhaka, 1215', '05/29/2018', '02:30PM', '', '', '', 'NOT SEEN', '', 'BILLED');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `ID` int(10) NOT NULL,
  `pmrn` int(10) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `pphone` varchar(11) NOT NULL,
  `psex` varchar(200) NOT NULL,
  `page` int(3) NOT NULL,
  `padd` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=207 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`ID`, `pmrn`, `pname`, `pphone`, `psex`, `page`, `padd`) VALUES
(152, 123456, 'Steven Adman Dias', '01711206048', 'MALE', 31, '44/H, Indira Road, Farmgate, Dhaka, 1215'),
(153, 234567, 'Jamal Uddin', '0325-293-5', 'MALE', 45, '44/H, Indira Road'),
(154, 345678, 'Kamal Khan', '01711206048', 'MALE', 65, '44/H Indira Road, Dhaka'),
(169, 998877, 'IIOUU', '0325-293-5', 'MALE', 87, '998877'),
(172, 654321, 'STEVE', '01711206048', 'MALE', 67, 'MONIPURI PARA'),
(173, 543216, 'POPOPOP', '01711206048', 'MALE', 98, 'JGJHJ'),
(175, 995566, 'IUIUOIIUUIUOUIOUOUOUUIOUOUOU', '98987987', 'MALE', 8798, 'JKHKJHHJKH'),
(177, 112233, 'OOOOOOOOORRRRTT', '7656755', 'FEMALE', 65, 'jkhkjh'),
(179, 332211, '', '5645645', 'FEMALE', 54654545, 'ytytyty'),
(181, 111222, 'dias adman', '76786', 'MALE', 767, 'HGJHGHJG'),
(191, 666555, 'ARIF', '98797', 'MALE', 98, 'LKJLKJLK'),
(193, 222555, 'BBBBB', '987', 'MALE', 987, 'jhjhj'),
(195, 645777, 'phhghgh', 'uyuyuy', 'MALE', 0, 'nbnb'),
(197, 334442, 'vvvv', 'hghjghj', 'MALE', 0, 'cccc'),
(199, 999678, 'LALALALA', 'hjg', 'MALE', 0, 'sdbhf'),
(201, 334567, 'SUCCESS', 'hjgjgjh', 'MALE', 0, 'COME LAST'),
(204, 666987, 'jdshkhfjksdhfjkh', 'jhjkhk', 'MALE', 0, 'jhjkhkj'),
(206, 666988, 'MERRY BAROI', '76786678', 'FEMALE', 767, '44/H, Indira Road, Farmgate, Dhaka, 1215');

-- --------------------------------------------------------

--
-- Table structure for table `pmedi`
--

CREATE TABLE IF NOT EXISTS `pmedi` (
  `id` int(20) NOT NULL,
  `eid` int(6) NOT NULL,
  `dname` varchar(200) NOT NULL,
  `pmrn` int(10) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `medi` varchar(500) NOT NULL,
  `pdos` varchar(500) NOT NULL,
  `ins` varchar(500) NOT NULL,
  `date` varchar(20) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=344 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pmedi`
--

INSERT INTO `pmedi` (`id`, `eid`, `dname`, `pmrn`, `pname`, `medi`, `pdos`, `ins`, `date`, `status`) VALUES
(129, 0, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Acetic Acid 5% Solution', '1+1+1, dshfbj s', 'KJHJH', '05/21/2018', ''),
(130, 0, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Acetic Acid 5% Solution', '1+1+1, dshfbj s', 'JHHHKHH', '05/21/2018', ''),
(131, 0, 'Dr. Ranen Biswas', 123456, 'Steven Adman Dias', 'Acetylcysteine 600mg Tablet', '1+1+1, dshfbj s', 'OKOK', '05/21/2018', ''),
(132, 0, 'Dr. Rajeeb Hassan', 234567, 'Jamal Uddin', 'Infertility Supplement for woman tablet', '1+1+1, dshfbj s', 'jkhjkhkh', '05/21/2018', ''),
(133, 0, 'Dr. Ranen Biswas', 123456, 'Steven Adman Dias', 'ABCDerma Hydrant', '', '', '05/21/2018', ''),
(134, 0, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Activated Charcoal 250 mg Tablet', '', '', '05/26/2018', ''),
(135, 0, 'Dr. Rajeeb Hassan', 666988, 'MERRY BAROI', 'A-Cerumen Ear Hygine 2ml', '1+1+1, dshfbj s', 'jkhkjhhkh', '05/26/2018', ''),
(136, 3, 'Dr. Rajeeb Hassan', 666988, 'MERRY BAROI', 'Acetic Acid 5% Solution', '1+1+1, dshfbj s', '', '05/27/2018', ''),
(137, 3, 'Dr. Rajeeb Hassan', 666988, 'MERRY BAROI', '5%Composit Amino Acid+D-Sorbitol', '1+1+1, dshfbj s', '', '05/27/2018', ''),
(138, 4, 'Dr. Ranen Biswas', 666988, 'MERRY BAROI', 'Acetic Acid 5% Solution', '1+1+1, dshfbj s', '', '05/27/2018', ''),
(139, 5, 'Dr. Ranen Biswas', 123456, 'Steven Adman Dias', 'Acetic Acid 5% Solution', '1+1+1, dshfbj s', '', '05/27/2018', ''),
(140, 5, 'Dr. Ranen Biswas', 123456, 'Steven Adman Dias', '20% Mannitol 500ml', '1+1+1, dshfbj s', '', '05/27/2018', ''),
(141, 5, 'Dr. Ranen Biswas', 123456, 'Steven Adman Dias', '10 % Dextrose IV Infusion 1000 ml', '1+1+1, dshfbj s', '', '05/27/2018', ''),
(142, 5, 'Dr. Ranen Biswas', 123456, 'Steven Adman Dias', '5%Composit Amino Acid+D-Sorbitol', '1+1+1, dshfbj s', '', '05/27/2018', ''),
(143, 1, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', '0.9% Sodium chloride IV Infusion 1000ml', '', '', '05/28/2018', ''),
(144, 1, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', '0.9% Sodium Chloride IV Infusion 500 ml', '', '', '05/28/2018', ''),
(145, 1, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', '0.9%Sodium Chloride+5%Dextrose  1000 ml', '', '', '05/28/2018', ''),
(146, 1, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', '10 % Dextrose IV Infusion 1000 ml', '', '', '05/28/2018', ''),
(147, 1, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', '20% Mannitol 500ml', '', '', '05/28/2018', ''),
(148, 2, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Fexofenadine 30mg/5ml Suspension', '1+1+1, dshfbj s', 'a', '05/28/2018', ''),
(149, 2, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Calcitriol 0.25mcg Capsule', '1+1+1, dshfbj s', 'b', '05/28/2018', ''),
(150, 2, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Brinzolamide 1% E/D', '1+1+1, dshfbj s', 'c', '05/28/2018', ''),
(151, 2, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Budesonide 0.1% nasal spray', '1+1+1, dshfbj s', 'd', '05/28/2018', ''),
(152, 2, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Calcium Acetate 667mg Tablet', '1+1+1, dshfbj s', 'e', '05/28/2018', ''),
(153, 2, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Calcium Acetate 667mg Tablet', '1+1+1, dshfbj s', 'f', '05/28/2018', ''),
(154, 6, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcitriol 0.25mcg Capsule', '1+1+1, dshfbj s', 'ssdff', '05/28/2018', ''),
(155, 6, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcium Acetate 667mg Tablet', '1+1+1, dshfbj s', '', '05/28/2018', ''),
(156, 7, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcitriol 0.25mcg Capsule', '1+1+1, dshfbj s', 'ssdff', '05/28/2018', ''),
(157, 7, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcium Acetate 667mg Tablet', '1+1+1, dshfbj s', '', '05/28/2018', ''),
(158, 8, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcitriol 0.25mcg Capsule', '1+1+1, dshfbj s', 'ssdff', '05/28/2018', ''),
(159, 8, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcium Acetate 667mg Tablet', '1+1+1, dshfbj s', '', '05/28/2018', ''),
(160, 9, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcitriol 0.25mcg Capsule', '1+1+1, dshfbj s', 'ssdff', '05/28/2018', ''),
(161, 9, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcium Acetate 667mg Tablet', '1+1+1, dshfbj s', '', '05/28/2018', ''),
(162, 10, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcitriol 0.25mcg Capsule', '1+1+1, dshfbj s', 'ssdff', '05/28/2018', ''),
(163, 10, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcium Acetate 667mg Tablet', '1+1+1, dshfbj s', '', '05/28/2018', ''),
(164, 11, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcitriol 0.25mcg Capsule', '1+1+1, dshfbj s', 'ssdff', '05/28/2018', ''),
(165, 11, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcium Acetate 667mg Tablet', '1+1+1, dshfbj s', '', '05/28/2018', ''),
(166, 12, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcitriol 0.25mcg Capsule', '1+1+1, dshfbj s', 'ssdff', '05/28/2018', ''),
(167, 12, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcium Acetate 667mg Tablet', '1+1+1, dshfbj s', '', '05/28/2018', ''),
(168, 13, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Bosentan 62.5mg Tablet', '', '', '05/28/2018', ''),
(169, 13, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Vitamin-B complex + Vitamin-C IV Injection', '', '', '05/28/2018', ''),
(170, 13, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Betahistine 16 mg Tablet', '', '', '05/28/2018', ''),
(171, 13, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Hartmann', '', '', '05/28/2018', ''),
(172, 13, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Aspirin 75 mg Tablet', '', '', '05/28/2018', ''),
(173, 13, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcium +Vitamin-D3 + Minerals', '', '', '05/28/2018', ''),
(174, 14, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Bosentan 62.5mg Tablet', '', '', '05/28/2018', ''),
(175, 14, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Vitamin-B complex + Vitamin-C IV Injection', '', '', '05/28/2018', ''),
(176, 14, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Betahistine 16 mg Tablet', '', '', '05/28/2018', ''),
(177, 14, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Hartmann', '', '', '05/28/2018', ''),
(178, 14, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Aspirin 75 mg Tablet', '', '', '05/28/2018', ''),
(179, 14, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcium +Vitamin-D3 + Minerals', '', '', '05/28/2018', ''),
(180, 15, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Bosentan 62.5mg Tablet', '', '', '05/28/2018', ''),
(181, 15, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Vitamin-B complex + Vitamin-C IV Injection', '', '', '05/28/2018', ''),
(182, 15, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Betahistine 16 mg Tablet', '', '', '05/28/2018', ''),
(183, 15, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Hartmann', '', '', '05/28/2018', ''),
(184, 15, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Aspirin 75 mg Tablet', '', '', '05/28/2018', ''),
(185, 15, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcium +Vitamin-D3 + Minerals', '', '', '05/28/2018', ''),
(186, 16, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Bosentan 62.5mg Tablet', '', '', '05/28/2018', ''),
(187, 16, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Vitamin-B complex + Vitamin-C IV Injection', '', '', '05/28/2018', ''),
(188, 16, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Betahistine 16 mg Tablet', '', '', '05/28/2018', ''),
(189, 16, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Hartmann', '', '', '05/28/2018', ''),
(190, 16, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Aspirin 75 mg Tablet', '', '', '05/28/2018', ''),
(191, 16, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcium +Vitamin-D3 + Minerals', '', '', '05/28/2018', ''),
(192, 3, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Vitamin E 400mg Capsule', '30 days', '', '05/28/2018', ''),
(193, 3, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Budesonide 200mcg + Formoterol 6mcg cozycap', '1+1+1, 3 months', '', '05/28/2018', ''),
(194, 3, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Budesonide 100mcg + Formoterol 6mcg cozycap', '', '', '05/28/2018', ''),
(195, 3, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Calcitriol 0.25mcg Capsule', '', '', '05/28/2018', ''),
(196, 3, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Cabergoline 0.5mg Tablet', '', '', '05/28/2018', ''),
(197, 3, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Budesonide 0.5mg/2ml Neb/Soln.', '', '', '05/28/2018', ''),
(198, 3, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Bromfenac 0.09% E/D', '', '', '05/28/2018', ''),
(199, 4, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Vitamin E 400mg Capsule', '30 days', '', '05/28/2018', ''),
(200, 4, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Budesonide 200mcg + Formoterol 6mcg cozycap', '1+1+1, 3 months', '', '05/28/2018', ''),
(201, 4, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Budesonide 100mcg + Formoterol 6mcg cozycap', '', '', '05/28/2018', ''),
(202, 4, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Calcitriol 0.25mcg Capsule', '', '', '05/28/2018', ''),
(203, 4, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Cabergoline 0.5mg Tablet', '', '', '05/28/2018', ''),
(204, 4, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Budesonide 0.5mg/2ml Neb/Soln.', '', '', '05/28/2018', ''),
(205, 4, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Bromfenac 0.09% E/D', '', '', '05/28/2018', ''),
(206, 5, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Vitamin E 400mg Capsule', '30 days', '', '05/28/2018', ''),
(207, 5, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Budesonide 200mcg + Formoterol 6mcg cozycap', '1+1+1, 3 months', '', '05/28/2018', ''),
(208, 5, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Budesonide 100mcg + Formoterol 6mcg cozycap', '', '', '05/28/2018', ''),
(209, 5, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Calcitriol 0.25mcg Capsule', '', '', '05/28/2018', ''),
(210, 5, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Cabergoline 0.5mg Tablet', '', '', '05/28/2018', ''),
(211, 5, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Budesonide 0.5mg/2ml Neb/Soln.', '', '', '05/28/2018', ''),
(212, 5, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Bromfenac 0.09% E/D', '', '', '05/28/2018', ''),
(213, 6, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Vitamin E 400mg Capsule', '30 days', '', '05/28/2018', ''),
(214, 6, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Budesonide 200mcg + Formoterol 6mcg cozycap', '1+1+1, 3 months', '', '05/28/2018', ''),
(215, 6, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Budesonide 100mcg + Formoterol 6mcg cozycap', '', '', '05/28/2018', ''),
(216, 6, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Calcitriol 0.25mcg Capsule', '', '', '05/28/2018', ''),
(217, 6, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Cabergoline 0.5mg Tablet', '', '', '05/28/2018', ''),
(218, 6, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Budesonide 0.5mg/2ml Neb/Soln.', '', '', '05/28/2018', ''),
(219, 6, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Bromfenac 0.09% E/D', '', '', '05/28/2018', ''),
(220, 7, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Vitamin E 400mg Capsule', '30 days', '', '05/28/2018', ''),
(221, 7, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Budesonide 200mcg + Formoterol 6mcg cozycap', '1+1+1, 3 months', '', '05/28/2018', ''),
(222, 7, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Budesonide 100mcg + Formoterol 6mcg cozycap', '', '', '05/28/2018', ''),
(223, 7, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Calcitriol 0.25mcg Capsule', '', '', '05/28/2018', ''),
(224, 7, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Cabergoline 0.5mg Tablet', '', '', '05/28/2018', ''),
(225, 7, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Budesonide 0.5mg/2ml Neb/Soln.', '', '', '05/28/2018', ''),
(226, 7, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Bromfenac 0.09% E/D', '', '', '05/28/2018', ''),
(227, 8, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Vitamin E 400mg Capsule', '30 days', '', '05/28/2018', ''),
(228, 8, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Budesonide 200mcg + Formoterol 6mcg cozycap', '1+1+1, 3 months', '', '05/28/2018', ''),
(229, 8, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Budesonide 100mcg + Formoterol 6mcg cozycap', '', '', '05/28/2018', ''),
(230, 8, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Calcitriol 0.25mcg Capsule', '', '', '05/28/2018', ''),
(231, 8, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Cabergoline 0.5mg Tablet', '', '', '05/28/2018', ''),
(232, 8, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Budesonide 0.5mg/2ml Neb/Soln.', '', '', '05/28/2018', ''),
(233, 8, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Bromfenac 0.09% E/D', '', '', '05/28/2018', ''),
(234, 9, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Vitamin E 400mg Capsule', '30 days', '', '05/28/2018', ''),
(235, 9, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Budesonide 200mcg + Formoterol 6mcg cozycap', '1+1+1, 3 months', '', '05/28/2018', ''),
(236, 9, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Budesonide 100mcg + Formoterol 6mcg cozycap', '', '', '05/28/2018', ''),
(237, 9, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Calcitriol 0.25mcg Capsule', '', '', '05/28/2018', ''),
(238, 9, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Cabergoline 0.5mg Tablet', '', '', '05/28/2018', ''),
(239, 9, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Budesonide 0.5mg/2ml Neb/Soln.', '', '', '05/28/2018', ''),
(240, 9, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Bromfenac 0.09% E/D', '', '', '05/28/2018', ''),
(241, 10, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Vitamin E 400mg Capsule', '30 days', '', '05/28/2018', ''),
(242, 10, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Budesonide 200mcg + Formoterol 6mcg cozycap', '1+1+1, 3 months', '', '05/28/2018', ''),
(243, 10, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Budesonide 100mcg + Formoterol 6mcg cozycap', '', '', '05/28/2018', ''),
(244, 10, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Calcitriol 0.25mcg Capsule', '', '', '05/28/2018', ''),
(245, 10, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Cabergoline 0.5mg Tablet', '', '', '05/28/2018', ''),
(246, 10, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Budesonide 0.5mg/2ml Neb/Soln.', '', '', '05/28/2018', ''),
(247, 10, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Bromfenac 0.09% E/D', '', '', '05/28/2018', ''),
(248, 11, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Vitamin E 400mg Capsule', '30 days', '', '05/28/2018', ''),
(249, 11, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Budesonide 200mcg + Formoterol 6mcg cozycap', '1+1+1, 3 months', '', '05/28/2018', ''),
(250, 11, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Budesonide 100mcg + Formoterol 6mcg cozycap', '', '', '05/28/2018', ''),
(251, 11, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Calcitriol 0.25mcg Capsule', '', '', '05/28/2018', ''),
(252, 11, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Cabergoline 0.5mg Tablet', '', '', '05/28/2018', ''),
(253, 11, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Budesonide 0.5mg/2ml Neb/Soln.', '', '', '05/28/2018', ''),
(254, 11, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Bromfenac 0.09% E/D', '', '', '05/28/2018', ''),
(255, 12, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Vitamin E 400mg Capsule', '30 days', '', '05/28/2018', ''),
(256, 12, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Budesonide 200mcg + Formoterol 6mcg cozycap', '1+1+1, 3 months', '', '05/28/2018', ''),
(257, 12, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Budesonide 100mcg + Formoterol 6mcg cozycap', '', '', '05/28/2018', ''),
(258, 12, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Calcitriol 0.25mcg Capsule', '', '', '05/28/2018', ''),
(259, 12, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Cabergoline 0.5mg Tablet', '', '', '05/28/2018', ''),
(260, 12, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Budesonide 0.5mg/2ml Neb/Soln.', '', '', '05/28/2018', ''),
(261, 12, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Bromfenac 0.09% E/D', '', '', '05/28/2018', ''),
(262, 13, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Vitamin E 400mg Capsule', '30 days', '', '05/28/2018', ''),
(263, 13, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Budesonide 200mcg + Formoterol 6mcg cozycap', '1+1+1, 3 months', '', '05/28/2018', ''),
(264, 13, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Budesonide 100mcg + Formoterol 6mcg cozycap', '', '', '05/28/2018', ''),
(265, 13, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Calcitriol 0.25mcg Capsule', '', '', '05/28/2018', ''),
(266, 13, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Cabergoline 0.5mg Tablet', '', '', '05/28/2018', ''),
(267, 13, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Budesonide 0.5mg/2ml Neb/Soln.', '', '', '05/28/2018', ''),
(268, 13, 'Dr. Rajeeb Hassan', 222555, 'BBBBB', 'Bromfenac 0.09% E/D', '', '', '05/28/2018', ''),
(269, 17, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Budesonide 0.5mg/2ml Neb/Soln.', '', '', '05/29/2018', ''),
(270, 17, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcium 600mg + Vitamin D3 400iu Tablet', '', '', '05/29/2018', ''),
(271, 17, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Ondansetrone 8mg/4ml Injection', '', '', '05/29/2018', ''),
(272, 17, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcium 600mg + Vitamin D3 400iu Tablet', '', '', '05/29/2018', ''),
(273, 17, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcium Acetate 667mg Tablet', '', '', '05/29/2018', ''),
(274, 18, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Budesonide 0.5mg/2ml Neb/Soln.', '', '', '05/29/2018', ''),
(275, 18, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcium 600mg + Vitamin D3 400iu Tablet', '', '', '05/29/2018', ''),
(276, 18, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Ondansetrone 8mg/4ml Injection', '', '', '05/29/2018', ''),
(277, 18, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcium 600mg + Vitamin D3 400iu Tablet', '', '', '05/29/2018', ''),
(278, 18, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcium Acetate 667mg Tablet', '', '', '05/29/2018', ''),
(279, 19, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Budesonide 0.5mg/2ml Neb/Soln.', '', '', '05/29/2018', ''),
(280, 19, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcium 600mg + Vitamin D3 400iu Tablet', '', '', '05/29/2018', ''),
(281, 19, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Ondansetrone 8mg/4ml Injection', '', '', '05/29/2018', ''),
(282, 19, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcium 600mg + Vitamin D3 400iu Tablet', '', '', '05/29/2018', ''),
(283, 19, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcium Acetate 667mg Tablet', '', '', '05/29/2018', ''),
(284, 20, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Budesonide 0.5mg/2ml Neb/Soln.', '', '', '05/29/2018', ''),
(285, 20, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcium 600mg + Vitamin D3 400iu Tablet', '', '', '05/29/2018', ''),
(286, 20, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Ondansetrone 8mg/4ml Injection', '', '', '05/29/2018', ''),
(287, 20, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcium 600mg + Vitamin D3 400iu Tablet', '', '', '05/29/2018', ''),
(288, 20, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcium Acetate 667mg Tablet', '', '', '05/29/2018', ''),
(289, 21, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Budesonide 0.5mg/2ml Neb/Soln.', '', '', '05/29/2018', ''),
(290, 21, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcium 600mg + Vitamin D3 400iu Tablet', '', '', '05/29/2018', ''),
(291, 21, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Ondansetrone 8mg/4ml Injection', '', '', '05/29/2018', ''),
(292, 21, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcium 600mg + Vitamin D3 400iu Tablet', '', '', '05/29/2018', ''),
(293, 21, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcium Acetate 667mg Tablet', '', '', '05/29/2018', ''),
(294, 22, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Budesonide 0.5mg/2ml Neb/Soln.', '', '', '05/29/2018', ''),
(295, 22, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcium 600mg + Vitamin D3 400iu Tablet', '', '', '05/29/2018', ''),
(296, 22, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Ondansetrone 8mg/4ml Injection', '', '', '05/29/2018', ''),
(297, 22, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcium 600mg + Vitamin D3 400iu Tablet', '', '', '05/29/2018', ''),
(298, 22, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcium Acetate 667mg Tablet', '', '', '05/29/2018', ''),
(299, 23, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Budesonide 0.5mg/2ml Neb/Soln.', '', '', '05/29/2018', ''),
(300, 23, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcium 600mg + Vitamin D3 400iu Tablet', '', '', '05/29/2018', ''),
(301, 23, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Ondansetrone 8mg/4ml Injection', '', '', '05/29/2018', ''),
(302, 23, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcium 600mg + Vitamin D3 400iu Tablet', '', '', '05/29/2018', ''),
(303, 23, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcium Acetate 667mg Tablet', '', '', '05/29/2018', ''),
(304, 24, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Budesonide 0.5mg/2ml Neb/Soln.', '', '', '05/29/2018', ''),
(305, 24, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcium 600mg + Vitamin D3 400iu Tablet', '', '', '05/29/2018', ''),
(306, 24, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Ondansetrone 8mg/4ml Injection', '', '', '05/29/2018', ''),
(307, 24, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcium 600mg + Vitamin D3 400iu Tablet', '', '', '05/29/2018', ''),
(308, 24, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcium Acetate 667mg Tablet', '', '', '05/29/2018', ''),
(309, 25, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Budesonide 0.5mg/2ml Neb/Soln.', '', '', '05/29/2018', ''),
(310, 25, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcium 600mg + Vitamin D3 400iu Tablet', '', '', '05/29/2018', ''),
(311, 25, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Ondansetrone 8mg/4ml Injection', '', '', '05/29/2018', ''),
(312, 25, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcium 600mg + Vitamin D3 400iu Tablet', '', '', '05/29/2018', ''),
(313, 25, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcium Acetate 667mg Tablet', '', '', '05/29/2018', ''),
(314, 26, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Budesonide 0.5mg/2ml Neb/Soln.', '', '', '05/29/2018', ''),
(315, 26, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcium 600mg + Vitamin D3 400iu Tablet', '', '', '05/29/2018', ''),
(316, 26, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Ondansetrone 8mg/4ml Injection', '', '', '05/29/2018', ''),
(317, 26, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcium 600mg + Vitamin D3 400iu Tablet', '', '', '05/29/2018', ''),
(318, 26, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcium Acetate 667mg Tablet', '', '', '05/29/2018', ''),
(319, 27, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Budesonide 0.5mg/2ml Neb/Soln.', '', '', '05/29/2018', ''),
(320, 27, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcium 600mg + Vitamin D3 400iu Tablet', '', '', '05/29/2018', ''),
(321, 27, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Ondansetrone 8mg/4ml Injection', '', '', '05/29/2018', ''),
(322, 27, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcium 600mg + Vitamin D3 400iu Tablet', '', '', '05/29/2018', ''),
(323, 27, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcium Acetate 667mg Tablet', '', '', '05/29/2018', ''),
(324, 28, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Budesonide 0.5mg/2ml Neb/Soln.', '', '', '05/29/2018', ''),
(325, 28, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcium 600mg + Vitamin D3 400iu Tablet', '', '', '05/29/2018', ''),
(326, 28, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Ondansetrone 8mg/4ml Injection', '', '', '05/29/2018', ''),
(327, 28, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcium 600mg + Vitamin D3 400iu Tablet', '', '', '05/29/2018', ''),
(328, 28, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcium Acetate 667mg Tablet', '', '', '05/29/2018', ''),
(329, 29, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Budesonide 0.5mg/2ml Neb/Soln.', '', '', '05/29/2018', ''),
(330, 29, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcium 600mg + Vitamin D3 400iu Tablet', '', '', '05/29/2018', ''),
(331, 29, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Ondansetrone 8mg/4ml Injection', '', '', '05/29/2018', ''),
(332, 29, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcium 600mg + Vitamin D3 400iu Tablet', '', '', '05/29/2018', ''),
(333, 29, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcium Acetate 667mg Tablet', '', '', '05/29/2018', ''),
(334, 30, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Budesonide 0.5mg/2ml Neb/Soln.', '', '', '05/29/2018', ''),
(335, 30, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcium 600mg + Vitamin D3 400iu Tablet', '', '', '05/29/2018', ''),
(336, 30, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Ondansetrone 8mg/4ml Injection', '', '', '05/29/2018', ''),
(337, 30, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcium 600mg + Vitamin D3 400iu Tablet', '', '', '05/29/2018', ''),
(338, 30, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcium Acetate 667mg Tablet', '', '', '05/29/2018', ''),
(339, 1, 'Dr. Rajeeb Hassan', 334567, 'SUCCESS', 'Bupivacaine 0.5 % Injection', '1+1+1, dshfbj s', '', '05/29/2018', ''),
(340, 1, 'Dr. Rajeeb Hassan', 334567, 'SUCCESS', 'Butamirate Citrate 7.5mg/5ml Syrup', '1+1+1, dshfbj s', '', '05/29/2018', ''),
(341, 31, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Microgol 13.125gm + Sodium Bicarbonate 178.5mg +  Sodium Chloride 350.70mg + Potassium Chloride 46.60mg /25ml Solution', '1+1+1, dshfbj s', '', '05/29/2018', ''),
(342, 31, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcitriol 0.25mcg Capsule', '1+1+1, dshfbj s', '', '05/29/2018', ''),
(343, 31, 'Dr. Rajeeb Hassan', 123456, 'Steven Adman Dias', 'Calcium +Vitamin-D3 + Minerals', '1+1+1, dshfbj s', '', '05/29/2018', '');

-- --------------------------------------------------------

--
-- Table structure for table `pres`
--

CREATE TABLE IF NOT EXISTS `pres` (
  `id` int(20) NOT NULL,
  `dname` varchar(100) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `page` int(3) NOT NULL,
  `psex` varchar(10) NOT NULL,
  `pmrn` int(20) NOT NULL,
  `pphone` varchar(100) NOT NULL,
  `pheight` varchar(20) NOT NULL,
  `pweight` varchar(20) NOT NULL,
  `ptemp` varchar(20) NOT NULL,
  `cdetails` varchar(1000) NOT NULL,
  `diagnosis` varchar(1000) NOT NULL,
  `xl` varchar(500) NOT NULL,
  `m1` varchar(200) NOT NULL,
  `m2` varchar(200) NOT NULL,
  `m3` varchar(500) NOT NULL,
  `m4` varchar(500) NOT NULL,
  `m5` varchar(500) NOT NULL,
  `m6` varchar(500) NOT NULL,
  `m7` varchar(500) NOT NULL,
  `m8` varchar(500) NOT NULL,
  `m9` varchar(500) NOT NULL,
  `m10` varchar(500) NOT NULL,
  `m11` varchar(500) NOT NULL,
  `m12` varchar(500) NOT NULL,
  `m13` varchar(500) NOT NULL,
  `m14` varchar(500) NOT NULL,
  `m15` varchar(500) NOT NULL,
  `m16` varchar(500) NOT NULL,
  `m17` varchar(500) NOT NULL,
  `m18` varchar(500) NOT NULL,
  `m19` varchar(500) NOT NULL,
  `m20` varchar(500) NOT NULL,
  `d1` varchar(500) NOT NULL,
  `d2` varchar(500) NOT NULL,
  `d3` varchar(500) NOT NULL,
  `d4` varchar(500) NOT NULL,
  `d5` varchar(500) NOT NULL,
  `d6` varchar(500) NOT NULL,
  `d7` varchar(500) NOT NULL,
  `d8` varchar(500) NOT NULL,
  `d9` varchar(500) NOT NULL,
  `d10` varchar(500) NOT NULL,
  `d11` varchar(500) NOT NULL,
  `d12` varchar(500) NOT NULL,
  `d13` varchar(500) NOT NULL,
  `d14` varchar(500) NOT NULL,
  `d15` varchar(500) NOT NULL,
  `d16` varchar(500) NOT NULL,
  `d17` varchar(500) NOT NULL,
  `d18` varchar(500) NOT NULL,
  `d19` varchar(500) NOT NULL,
  `d20` varchar(500) NOT NULL,
  `other` varchar(1000) NOT NULL,
  `date` varchar(20) NOT NULL,
  `pdiet` varchar(200) NOT NULL,
  `reffer` varchar(200) NOT NULL,
  `i1` varchar(500) NOT NULL,
  `i2` varchar(500) NOT NULL,
  `i3` varchar(500) NOT NULL,
  `i4` varchar(500) NOT NULL,
  `i5` varchar(500) NOT NULL,
  `i6` varchar(500) NOT NULL,
  `i7` varchar(500) NOT NULL,
  `i8` varchar(500) NOT NULL,
  `i9` varchar(500) NOT NULL,
  `i10` varchar(500) NOT NULL,
  `i11` varchar(500) NOT NULL,
  `i12` varchar(500) NOT NULL,
  `i13` varchar(500) NOT NULL,
  `i14` varchar(500) NOT NULL,
  `i15` varchar(500) NOT NULL,
  `i16` varchar(500) NOT NULL,
  `i17` varchar(500) NOT NULL,
  `i18` varchar(500) NOT NULL,
  `i19` varchar(500) NOT NULL,
  `i20` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=219 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pres`
--

INSERT INTO `pres` (`id`, `dname`, `pname`, `page`, `psex`, `pmrn`, `pphone`, `pheight`, `pweight`, `ptemp`, `cdetails`, `diagnosis`, `xl`, `m1`, `m2`, `m3`, `m4`, `m5`, `m6`, `m7`, `m8`, `m9`, `m10`, `m11`, `m12`, `m13`, `m14`, `m15`, `m16`, `m17`, `m18`, `m19`, `m20`, `d1`, `d2`, `d3`, `d4`, `d5`, `d6`, `d7`, `d8`, `d9`, `d10`, `d11`, `d12`, `d13`, `d14`, `d15`, `d16`, `d17`, `d18`, `d19`, `d20`, `other`, `date`, `pdiet`, `reffer`, `i1`, `i2`, `i3`, `i4`, `i5`, `i6`, `i7`, `i8`, `i9`, `i10`, `i11`, `i12`, `i13`, `i14`, `i15`, `i16`, `i17`, `i18`, `i19`, `i20`) VALUES
(47, 'steven', 'jkjk', 0, '', 65675, '09-09-0', '', '', '', '', '', '1113', '219', '663', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(48, 'steven', 'jkkkj', 0, '', 87878, '6567575675', '', '', '', '', '', 'Miconazole 2% GelMiconazole 2% Gel', '0.9% Sodium chloride IV Infusion 1000ml\r\n', 'Zinc Sulphate 10mg/5ml Syrup', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'adman', '0.9% Sodium Chloride IV Infusion 500 ml\r\n', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(49, 'adman', '', 0, '', 65675, '', '', '', '', '', '', '219', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'adman', '0.9% Sodium Chloride IV Infusion 500 ml\r\n', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(50, 'adman', '', 0, '', 0, '', '', '', '', '', '', '219', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'adman', '0.9% Sodium Chloride IV Infusion 500 ml\r\n', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(51, 'steven', 'razeeb', 0, '', 544, '2093029', '', '', '', '', '', 'Calcium Carbonate 500mg TabletRivaroxaban 10mg TabletRosuvastatin 20mg Tablet', 'Hydroxyzine 10mg/5ml Syrup', 'Montelukast 10mg Tablet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'oo', 'mname', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(52, 'steven', 'razeeb', 0, '', 544, '2093029', '', '', '', '', '', 'Calcium Carbonate 500mg TabletRivaroxaban 10mg TabletRosuvastatin 20mg Tablet', 'Hydroxyzine 10mg/5ml Syrup', 'Montelukast 10mg Tablet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'oo', 'mname', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(53, 'steven', 'TEST', 0, '', 6666, '01711206049', '', '', '', '', '', '', '', 'adman', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.9%Sodium Chloride+5%Dextrose  1000 ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(54, 'hsah sags aghsgahjg shagdsaghgdhsag dgsahgd jsagdj gsagdjsagd gsajhdgsagdhgsa dgjsag', 'Kamal', 0, '', 6666, '01711206049', '', '', '', '', '', '0.9% Sodium chloride IV Infusion 1000mlCalcium Acetate 667mg TabletDiclofenac Diethylamine1.16% gelHydrochlorothiazide 25mg Tablet', 'Calcium Acetate 667mg Tablet', 'adman', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '10% Fat Emulsion', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(55, 'adman', 'Zamil', 0, '', 5555, '7y7678687', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(56, 'hsah sags aghsgahjg shagdsaghgdhsag dgsahgd jsagdj gsagdjsagd gsajhdgsagdhgsa dgjsag', 'bbb', 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(57, 'adman', 'sadsad', 0, '', 0, 'sdgsdg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(58, 'adman', 'hghg', 0, '', 8787, '987987897899987', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(59, '', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(60, 'hsah sags aghsgahjg shagdsaghgdhsag dgsahgd jsagdj gsagdjsagd gsajhdgsagdhgsa dgjsag', 'nbnmb', 0, '', 7886, '7687678678', '', '', '', '', '', '0.9% Sodium chloride IV Infusion 1000ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(61, 'hsah sags aghsgahjg shagdsaghgdhsag dgsahgd jsagdj gsagdjsagd gsajhdgsagdhgsa dgjsag', 'hh', 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(62, 'steven', 'sdfsd', 0, '', 0, '', '', '', '', '', '', '0.9% Sodium chloride IV Infusion 1000ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(63, 'oo', 'asd', 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(64, 'oo', 'asd', 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(65, 'steven', 'sad', 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(66, 'steven', '', 0, '', 0, '', '', '', '', '', '', 'Calcium Acetate 667mg Tablet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(67, 'adman', '', 0, '', 0, '', '', '', '', '', '', 'Hydrocortisone  10mg Tablet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(68, 'hghg', 'sahgd', 0, '', 9, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(69, 'hghg', 'sahgd', 0, '', 9, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(70, 'steven', 'steven dias', 0, '', 43221, '', '', '', '', '', '', 'Salbutamol 5mg/5ml Syrup', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(71, 'adman', '', 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(72, 'adman', 'shadj', 0, '', 66666, '23874983728', '', '', '', '', '', '0.9% Sodium chloride IV Infusion 1000ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(73, 'oo', 'jamal', 0, '', 6543, '01711206048', '', '', '', '', 'diagnosis', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(74, 'jahsjkh', 'sdfd', 0, '', 123, '23423423434', '', '', '', 'sdfsdg', 'dsgdsgsd', '0.9% Sodium chloride IV Infusion 1000ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'sdfsd', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(75, 'jahsjkh', 'sdfd', 0, '', 123, '23423423434', '', '', '', 'sdfsdg', 'dsgdsgsd', '0.9% Sodium chloride IV Infusion 1000ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'sdfsd', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(76, 'steven', 'Bikash', 0, '', 7890, '004302858', '', '', '', 'jsbjkfk hjhh', 'jhjhjhjhds jfhd fjhjsd hfjh dsjfhsdjhfhsdjhfjdhf\r\ndsfjhsdjfsd', 'Diclofenac Diethylamine1.16% gel', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(77, 'steven', 'dias adman', 0, '', 333333, '01711206048', '', '', '', 'vhsafhv sahbhsa ahsd hsagdhga shdgsha gdhg sahd hsabfc hsabdhbsahb sabd sahbdhsa hdhas dsa dsad asidui hasihd sauidhi usahduih asuihd usahduih asiuhd iaushduisahd uihasu dhuas hduha suidshauidh uisahdusaiuhd uih uihu uhasud hahsuid usahud auishd iuuih dsiahudhapisuhduihauisdhfuisd ai ifi sdui hui if ihsdfiuhsdiuhfuid hsuifhuidhs fiuh sduifh iuhsd fuihasuihiuhsdaui iuhui hui hdsiuvhiu hsdiuhui hsduihuih u hsduihviu hhdiuh ui hdihiudshuh iu i ds  hsdiuh ui dsuifh iudshfuihui ui huihuih duis hsduih uidshvui hsdivisd vihih', 'vhsafhv sahbhsa ahsd hsagdhga shdgsha gdhg sahd hsabfc hsabdhbsahb sabd sahbdhsa hdhas dsa dsad asidui hasihd sauidhi usahduih asuihd usahduih asiuhd iaushduisahd uihasu dhuas hduha suidshauidh uisahdusaiuhd uih uihu uhasud hahsuid usahud auishd iuuih dsiahudhapisuhduihauisdhfuisd ai ifi sdui hui if ihsdfiuhsdiuhfuid hsuifhuidhs fiuh sduifh iuhsd fuihasuihiuhsdaui iuhui hui hdsiuvhiu hsdiuhui hsduihuih u hsduihviu hhdiuh ui hdihiudshuh iu i ds  hsdiuh ui dsuifh iudshfuihui ui huihuih duis hsduih uidshvui hsdivisd vihih', 'BUNC4 (complement 4)Estimated GFR (eGFR)Fasting Lipid profile Mantoux Tuberculin Skin Test (MT)MRI of lumbosacral spine MRI of neck ', 'Tobramycin0.3%+Dexamethasone0.1%  E/Oint.', '6%hydroxyethyl starch 500ml', '20% Mannitol 500ml', 'Acetylcysteine 600mg Tablet', '5%Composit Amino Acid+D-Sorbitol', '10%Dextrose+0.225%Sodium Chloride', '20% Mannitol 500ml', '5%Composit Amino Acid+D-Sorbitol', 'Aceclofenac 100mg Tablet', '10 % Dextrose IV Infusion 1000 ml', 'Aceclofenac 100mg Tablet', '5%Composit Amino Acid+D-Sorbitol', '0.9% Sodium Chloride IV Infusion 500 ml', '', '', '', '', '', '', '', 'steven', 'A-Cerumen Ear Hygine 2ml', '5%Composit Amino Acid+D-Sorbitol', 'Activated Charcoal 250 mg Tablet', '5 % Dextrose IV Infusion. 1000 ml', '0.9%Sodium Chloride+5%Dextrose  1000 ml', '5%Composit Amino Acid+D-Sorbitol', '6%hydroxyethyl starch 500ml', 'Acitretin 10mg Capsule', '20% Mannitol 500ml', 'ABCDerma Hydrant', '5 % Dextrose IV Infusion. 1000 ml', '10%Dextrose+0.225%Sodium Chloride', '', '', '', '', '', '', '', 'vhsafhv sahbhsa ahsd hsagdhga shdgsha gdhg sahd hsabfc hsabdhbsahb sabd sahbdhsa hdhas dsa dsad asidui hasihd sauidhi usahduih asuihd usahduih asiuhd iaushduisahd uihasu dhuas hduha suidshauidh uisahdusaiuhd uih uihu uhasud hahsuid usahud auishd iuuih dsiahudhapisuhduihauisdhfuisd ai ifi sdui hui if ihsdfiuhsdiuhfuid hsuifhuidhs fiuh sduifh iuhsd fuihasuihiuhsdaui iuhui hui hdsiuvhiu hsdiuhui hsduihuih u hsduihviu hhdiuh ui hdihiudshuh iu i ds  hsdiuh ui dsuifh iudshfuihui ui huihuih duis hsduih uidshvui hsdivisd vihih', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(78, 'steven', 'Hossain', 0, '', 524365, '732784', '', '', '', 'asjdajkshfjh jhjhj hjhj hjk', '1234', 'Stool Routine examination', 'Naphazoline+Zn Sulphate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'oo', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Pleasd', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(79, 'steven', 'Asad', 0, '', 4444, '7657687', '', '', '', 'sajdhjkh', 'jhjdkvhjksdk', 'C4 (complement 4),CA 125,CA 15-3', '5%Composit Amino Acid+D-Sorbitol', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'adman', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'sajbfkjb', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(80, 'steven', 'Polahs', 0, '', 78237, '9-992379878', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(81, 'steven', 'Faisal', 0, '', 6666, '897987987', '', '', '', 'smncm,', 'XLCVLK', 'C4 (complement 4)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(82, 'steven', 'Sunny', 0, '', 989080, '74357438798', '', '', '', 'skldfnlkdsj', 'lkjlkj', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(83, 'steven', 'Merry', 0, '', 7777, '0325-293-5', '', '', '', 'vvbnvbnv', 'jhjh', '24 hour Urinary Total Protein ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(84, 'steven', 'ooooo', 0, '', 6757, 'y78678678', '', '', '', 'hjjhgjhg', 'hgjgjg', 'BUN,C4 (complement 4)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(85, 'steven', 'ttttt', 0, '', 67567, '76876876', '', '', '', 'hjjgjg', 'hjgjhg', 'BUN,C4 (complement 4)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(86, 'steven', 'ABCD', 0, '', 12312, '234235', '', '', '', 'gsahdghg', 'hghjgsdhf', 'BUN', '20% Mannitol 500ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'jahsjkh', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'hasgdhgas', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(87, 'steven', 'ABCDE', 0, '', 675675, '7836458643', '', '', '', 'This is test', 'Test', '24 hour Urinary Total Protein ,A/G ratio,Abscess Fluid for AFB,ACTH,BUN,C4 (complement 4),CA 125,CA 15-3,Estimated GFR (eGFR),Fasting Lipid profile ,FBS,Ferritin ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Aceclofenac 100mg Tablet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'jnsajfnsjdnfj ndsjfjsdfjds jhfdsjh fjsdhjdf ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(88, 'steven', 'DGGHJH', 0, '', 76786, '7867868686', '', '', '', '', '', 'ajhsjkhsa hsa jdhja sdjkhasjd ashd kjashkjdhjkas hdj hasjkhdj hasj hdj hsajhdj hasjh djhsajdhjas hjd hjksahd hasjh jk h', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(89, 'steven', 'dias adman', 0, '', 76786, '7867868686', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(90, 'steven', 'DGGH', 0, '', 789, '87987987', '', '', '', 'TEST ONE', 'TEST ONE', 'Estimated GFR (eGFR),Fasting Lipid profile ,FBS,Ferritin ,Flixible Cystoscopy,FNAC ,Follicle stimulating hormone(FSH),Free PSA,Free T3,Free T4,Free Testosterone,FSH,MRI of lumbosacral spine ,MRI of neck ', '10%Dextrose+0.225%Sodium Chloride', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'jahsjkh', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'TEST ONE TEST ONETEST ONETEST ONETEST ONETEST ONETEST ONETEST ONETEST ONE', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(91, 'steven', 'jsfdhjkdshfk', 0, '', 7362784, '84739857943', '', '', '', 'jsahfkhsdjkh', 'hjkhjkh', '24 hour Urinary Total Protein ,BUN,Estimated GFR (eGFR)', '0.9%Sodium Chloride+5%Dextrose  1000 ml', '20% Mannitol 500ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'jhjk', 'A-Cerumen Ear Hygine 2ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(92, 'steven', 'jsfdhjkdshfk', 0, '', 7362784, '8798798797', '', '', '', '', '', '', '25% Dextrose 100 ml Infusion', 'A-Cerumen Ear Hygine 2ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(93, 'steven', 'jsfdhjkdshfk', 0, '', 7362784, '984798579', '', '', '', 'ksanklf', 'kj', 'BUN', '10%Dextrose+0.225%Sodium Chloride', '25% Dextrose 100 ml Infusion', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(94, 'steven', 'jsfdhjkdshfk', 0, '', 7362784, '984798579', '', '', '', 'ksanklf', 'kj', 'BUN', '10%Dextrose+0.225%Sodium Chloride', '25% Dextrose 100 ml Infusion', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(95, 'steven', 'jsfdhjkdshfk', 0, '', 7362784, '897987', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(96, 'steven', 'ytuttt', 0, '', 6757, '76786', '', '', '', '', '', '', '10%Dextrose+0.225%Sodium Chloride', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(97, 'steven', 'ytuttt', 0, '', 6757, '213', '', '', '', 'safdsa', 'sadas', '', '25% Dextrose 100 ml Infusion', 'Acetic Acid 5% Solution', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/10/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(98, 'steven', 'rrr', 0, '', 2343, '325', '', '', '', '', '', 'BUN', '5%Composit Amino Acid+D-Sorbitol', '6%hydroxyethyl starch 500ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(99, 'steven', 'eee', 0, '', 65800, '24235', '', '', '', '', '', 'Estimated GFR (eGFR)', 'Aspirin 75 mg Tablet', 'Fexofenadine 120mg Tablet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(100, 'steven', 'eee', 0, '', 65800, '24235', '', '', '', '', '', 'Estimated GFR (eGFR)', 'Aspirin 75 mg Tablet', 'Fexofenadine 120mg Tablet', '10% Fat Emulsion', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(101, 'steven', 'eee', 0, '', 65800, '24235', '', '', '', '', '', 'Estimated GFR (eGFR)', 'Aspirin 75 mg Tablet', 'Fexofenadine 120mg Tablet', '10% Fat Emulsion', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(102, 'steven', 'eee', 0, '', 65800, '24235', '', '', '', '', '', 'Estimated GFR (eGFR)', 'Aspirin 75 mg Tablet', 'Fexofenadine 120mg Tablet', '10% Fat Emulsion', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(103, 'steven', 'eee', 0, '', 65800, '24235', '', '', '', '', '', 'Estimated GFR (eGFR)', 'Aspirin 75 mg Tablet', 'Fexofenadine 120mg Tablet', '10% Fat Emulsion', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(104, 'steven', 'IUIUI', 0, '', 656, '897398579', '', '', '', 'jkhks', 'jkhjkh', 'C4 (complement 4)', 'ABCDerma Hydrant', 'Acetic Acid 5% Solution', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(105, 'steven', 'eee', 0, '', 65800, '24235', '', '', '', '', '', '', 'Zinc Orotate 10mg Tablet', 'Tamsulosin 0.4mg Capsule', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(106, 'steven', 'eee', 0, '', 65800, '24235', '', '', '', '', '', '', 'Ketoconazole+Zn+Aloevera shampoo', 'Palonosetron 0.25mg Injection', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(107, 'steven', 'FINAL TEST', 0, '', 99779, '010012993', '', '', '', 'lksaj', 'kjlk', 'MRI of lumbosacral spine ', 'ABCDerma Hydrant', '6%hydroxyethyl starch 500ml', 'Danazol 100mg Capsule', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(108, 'steven', 'iuhiuhu', 0, '', 987897, '98797897', '', '', '', 'safsaf', 'asfasf', 'Estimated GFR (eGFR)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/15/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(109, 'steven', 'iuhiuhu', 0, '', 987897, '98797897', '', '', '', 'safsaf', 'asfasf', 'Estimated GFR (eGFR)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/15/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(110, 'steven', 'iuhiuhu', 0, '', 987897, '98797897', '', '', '', 'safsaf', 'asfasf', 'Estimated GFR (eGFR)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/15/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(111, 'steven', 'uoiuoiuo', 0, '', 877897, '7867666868', '', '', '', '', '', 'BUN,C4 (complement 4)', '0.9% Sodium chloride IV Infusion 1000ml', '10% Fat Emulsion', 'Acitretin 10mg Capsule', 'Activated Charcoal 250 mg Tablet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'adman', '0.9% Sodium Chloride IV Infusion 500 ml', 'Acitretin 10mg Capsule', 'Acetic Acid 5% Solution', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/15/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(112, 'steven', 'uoiuoiuo', 0, '', 877897, '7867666868', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/15/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(113, 'steven', 'Merry Baroi', 23, '', 76567, '01711206048', '', '', '', 'kjkjkjhkjhjkhh', 'jhjhjhjhjhj jhjhjhjhjj', 'CBC and ESR,MT', 'A-Cerumen Ear Hygine 2ml', 'Acetic Acid 5% Solution', '5%Composit Amino Acid+D-Sorbitol', '5%Dextrose+0.225%Sodium Chloride', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'adman', 'Acitretin 10mg Capsule', 'A-Cerumen Ear Hygine 2ml', 'ABCDerma Hydrant', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'sdlfjdlskjljgkj kljfjkfjgkj kjk', '03/16/2018', '6%hydroxyethyl starch 500ml', 'jahsjkh', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(114, 'steven', 'Merry Baroi', 28, 'Female', 76567, '01711206048', '', '', '', '', '', 'BUN,C4 (complement 4)', '0.9%Sodium Chloride+5%Dextrose  1000 ml', '20% Mannitol 500ml', '5 % Dextrose IV Infusion. 1000 ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'steven', 'Bacitracin+Neomycin Ointment', 'Magaldrate+Simethicone Suspension', 'Cabergoline 0.5mg Tablet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/16/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(115, 'steven', 'Merry Baroi', 28, 'female', 76567, '01711206048', '', '', '', '', '', 'BUN,C4 (complement 4)', '0.9%Sodium Chloride+5%Dextrose  1000 ml', '20% Mannitol 500ml', '5 % Dextrose IV Infusion. 1000 ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'steven', 'Bacitracin+Neomycin Ointment', 'Magaldrate+Simethicone Suspension', 'Cabergoline 0.5mg Tablet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/16/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(116, 'steven', 'Akbar Ali Khan', 43, 'MALE', 98789, '98798777', '656', '554', '665', '', '', 'MRI of neck ,MRI of Right knee', 'ABCDerma Hydrant', '6%hydroxyethyl starch 500ml', '5%Composit Amino Acid+D-Sorbitol', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'steven', 'ABCDerma Hydrant', 'ABCDerma Hydrant', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/16/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(117, 'steven', 'sajknjk', 0, '6575675', 0, 'hjkh', 'h', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/17/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(118, 'steven', 'sajknjk', 0, '2487239847', 0, 'hjkh', 'h', '', '', '', '', '24 hour Urinary Total Protein ,A/G ratio', '5 % Dextrose IV Infusion. 1000 ml', '6%hydroxyethyl starch 500ml', '5%Dextrose+0.225%Sodium Chloride', 'Acitretin 10mg Capsule', '10% Fat Emulsion', '10% Fat Emulsion', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'adman', '1+1+1, dshfbj sdfj sdjhf jksdhjf hj sdhfj hsdjf hsdj hfjsdh fjhsd jfsdjf jdshf dsfj sdfjh sdjhfjks djkfh sdjkhf sdhfkj hsdjfh kjsdhfj sdjfh sdjkhf ksdhkjf ksdjhf kjhsdjfk sdjkhf sdfhk hsdkfsd hkf hsd hfhsd fsdhf hhsd f ', '0.9% Sodium chloride IV Infusion 1000ml', '0.9% Sodium Chloride IV Infusion 500 ml', 'A-Cerumen Ear Hygine 2ml', 'A-Cerumen Ear Hygine 2ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/17/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(119, 'steven', 'jsahfhdhsjfkh', 656, '8798798798', 6757, '7868678', '675', '56745', '234', 'sjhdfjksdh', 'jhjkhjkhjk', 'C4 (complement 4),CA 125,Estimated GFR (eGFR),Fasting Lipid profile ', '5%Dextrose+0.225%Sodium Chloride', 'ABCDerma Hydrant', '10% Fat Emulsion', '0.9% Sodium chloride IV Infusion 1000ml', '25% Dextrose 100 ml Infusion', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'steven', '1+1+1, dshfbj sdfj sdjhf jksdhjf hj sdhfj hsdjf hsdj hfjsdh fjhsd jfsdjf jdshf dsfj sdfjh sdjhfjks djkfh sdjkhf sdhfkj hsdjfh kjsdhfj sdjfh sdjkhf ksdhkjf ksdjhf kjhsdjfk sdjkhf sdfhk hsdkfsd hkf hsd hfhsd fsdhf hhsd f ', '20% Mannitol 500ml', '5%Composit Amino Acid+D-Sorbitol', 'ABCDerma Hydrant', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'samndsna', '03/17/2018', '6%hydroxyethyl starch 500ml', 'oo', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(120, 'adman', 'TTT', 657, 'male', 78678, '7678686786', '546', '5465', '465', '', '', '24 hour Urinary Total Protein ,A/G ratio,BUN', 'A-Cerumen Ear Hygine 2ml', 'Aceclofenac 100mg Tablet', '5%Composit Amino Acid+D-Sorbitol', '10%Dextrose+0.225%Sodium Chloride', '0.9% Sodium Chloride IV Infusion 500 ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/17/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(121, 'adman', 'TTT', 657, 'jkhkhjk', 78678, '7678686786', '546', '5465', '465', '', '', 'BUN,C4 (complement 4),CA 125,CA 15-3', '0.9% Sodium Chloride IV Infusion 500 ml', '0.9%Sodium Chloride+5%Dextrose  1000 ml', 'ABCDerma Hydrant', 'Aceclofenac 100mg Tablet', '5%Composit Amino Acid+D-Sorbitol', '10% Fat Emulsion', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/17/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(122, 'steven', 'Agfghfh', 54, '65675', 6567567, '65675765', '344', '34', '43243', 'jhasjkhdjkhhj sahf sajhfj jakshj hjkhj', 'h jhejkfhjjfhfjkdsfhjk', '24 hour Urinary Total Protein ,A/G ratio,Abscess Fluid for AFB,BUN', '0.9% Sodium chloride IV Infusion 1000ml', '0.9% Sodium Chloride IV Infusion 500 ml', '10 % Dextrose IV Infusion 1000 ml', '6%hydroxyethyl starch 500ml', 'Aceclofenac 100mg Tablet', 'ABCDerma Hydrant', 'Acitretin 10mg Capsule', 'Acetylcysteine 600mg Tablet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'jsdfjkhdshjhkh', '03/18/2018', '5%Dextrose+0.225%Sodium Chloride', 'jahsjkh', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(123, '', '', 0, '', 0, '', '', '', '', '', '', 'Array', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(124, '', '', 0, '', 0, '', '', '', '', '', '', '24 hour Urinary Total Protein ,A/G ratio', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(125, '', '', 0, '', 0, '', '', '', '', '', '', 'ACTH,AFB,Aldolase ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(126, 'steven', 'RRR', 56, 'MALE', 776, '76767', '45', '45', '34', 'jhsfhj', 'hjkhkjh', '24 hour Urinary Total Protein ', '5%Composit Amino Acid+D-Sorbitol', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'jhjk', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'nsdns', '03/19/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(127, 'steven', 'GFHGFHFHG', 0, 'male', 65675, '786868', '', '', '', '', '', 'CBC and ESR', '5%Dextrose+0.225%Sodium Chloride', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'steven', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/19/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(128, 'steven', 'mhkj', 54, 'male', 65465, '454', '564', '5454545', '4564', '56465', '4', '24 hour Urinary Total Protein ,BUN', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/19/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(129, 'steven', 'HHH', 78, 'MALE', 6789, '667788', '567', '67', '66', '', '', 'BUN', '0.9%Sodium Chloride+5%Dextrose  1000 ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/19/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(130, 'steven', 'jkljllkj', 7678, 'MALE', 78686, '687', '768', '6768', '768', 'jhjsahfjkdks', 'jhjhjkhckv', '24 hour Urinary Total Protein ,A/G ratio,Abscess Fluid for AFB,ACTH,AFB,Aldolase ,ALP,Alpha feto protein,Alpha-fetoprotein (AFP),Anti cardiolipin antibody ,Anti CCP Ab,BUN,C4 (complement 4),CA 125,CA 15-3,CA 19 ? 9', '0.9% Sodium chloride IV Infusion 1000ml', '6%hydroxyethyl starch 500ml', '5%Dextrose+0.225%Sodium Chloride', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'jsdhfjksdhgk', '03/20/2018', '6%hydroxyethyl starch 500ml', 'jahsjkh', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(131, 'sadsa', '65', 657, '656', 675, '65', '656', '656', '656', '6565', '6565', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(132, '6215675', '67576', 65765, '565765', 67575, '65675', '6575', '65675', '675765', '6756757', '6567675', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(133, '65675765657656', '6', 0, '', 65675675, '655', '', '', '', '675677', '5675', '', '5 % Dextrose IV Infusion. 1000 ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(134, '65675765657656', '6', 0, '', 65675675, '655', '', '', '', '675677', '5675', '', '5 % Dextrose IV Infusion. 1000 ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(135, '65675765657656', '6', 0, '', 65675675, '655', '', '', '', '675677', '5675', '', '5 % Dextrose IV Infusion. 1000 ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(136, 'hgjgghjg', 'ghjghjg', 0, '', 1234, 'jhghjg', '', '', '', 'gh', 'jghj', '', 'Haloperidol 10mg injection', 'Ganciclovir 0.15% E/Gel', 'Haloperidol 10mg injection', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'hghg', 'Ganciclovir 0.15% E/Gel', 'Haloperidol 10mg injection', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(137, 'ughjghjg', 'dfgdgfd', 0, '', 65765, '6576567', '', '', '', '567567', '576', '', 'Aceclofenac 100mg Tablet', 'Aceclofenac 100mg Tablet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'jahsjkh', 'Aceclofenac 100mg Tablet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(138, 'ughjghjg', 'dfgdgfd', 0, '', 65765, '6576567', '', '', '', '567567', '576', '', 'Aceclofenac 100mg Tablet', 'Aceclofenac 100mg Tablet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'jahsjkh', 'Aceclofenac 100mg Tablet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(139, 'ughjghjg', 'dfgdgfd', 0, '', 65765, '6576567', '', '', '', '567567', '576', '', 'Aceclofenac 100mg Tablet', 'Aceclofenac 100mg Tablet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'jahsjkh', 'Aceclofenac 100mg Tablet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(140, 'gfhgfh', 'adman', 76, '', 0, '656757657', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(141, 'steven', 'JHKHJKH', 78, 'MALE', 98798798, '9876897798', '7868', '76786', '7678', 'lkjklj', 'jj', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/25/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(142, 'steven', 'JHKHJKH', 78, 'MALE', 98798798, '9876897798', '7868', '76786', '7678', 'khjhjkh', 'kljklj', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/25/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(143, 'steven', 'JHKHJKH', 78, 'MALE', 98798798, '9876897798', '7868', '76786', '7678', 'khjhjkh', 'kljklj', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/25/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(144, 'steven', 'JHKHJKH', 78, 'MALE', 98798798, '9876897798', '7868', '76786', '7678', 'khjhjkh', 'kljklj', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/25/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(145, 'steven', 'OIOIOI', 78678, 'FEMALE', 78678, '78678', '76786', '78678', '7868', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/25/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(146, 'steven', 'KJLKJlk', 76, 'hjsga', 7676, '76', '7677', '767', '767', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/25/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(147, 'steven', 'KJLKJlk', 76, 'KJKJL', 7676, '76', '7677', '767', '767', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/25/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(148, 'steven', 'KJLKJlk', 76, 'KJKJL', 7676, '76', '7677', '767', '767', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/25/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(149, 'steven', 'FFFFFF', 78678, 'FEMALE', 78678, '78678', '76786', '78678', '7868', '', '', 'Array', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/25/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(150, 'steven', 'JHKHJKH', 78, 'jhkjk', 98798798, '9876897798', '7868', '76786', '7678', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/25/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(151, 'steven', 'JHJHKH', 78678, 'FEMALE', 78678, '78678', '76786', '78678', '7868', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/25/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(152, 'steven', 'OIOIOI', 78678, 'FEMALE', 78678, '78678', '76786', '78678', '7868', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/25/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(153, 'steven', 'JHKHJKH', 78, 'jkhkh', 98798798, '9876897798', '7868', '76786', '7678', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/25/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(154, 'steven', 'OIOIOI', 78678, 'FEMALE', 78678, '78678', '76786', '78678', '7868', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/25/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(155, 'steven', 'KJLKJlk', 76, 'OO', 7676, '76', '7677', '767', '767', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/25/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(156, 'steven', 'JHKHJKH', 78, 'PP', 98798798, '9876897798', '7868', '76786', '7678', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/25/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(157, 'steven', 'JHKHJKH', 78, 'KJHJKH', 98798798, '9876897798', '7868', '76786', '7678', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/25/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(158, 'steven', 'JHKHJKH', 78, 'jkh', 98798798, '9876897798', '7868', '76786', '7678', '', '', 'Array', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/25/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(159, 'steven', 'pname', 14, 'gjhgjhgjhg', 123456, '454343435435', 'hgjhg', 'hgjg', 'hgjh', 'gjh', 'ghj', 'FBS,MT', '5 % Dextrose IV Infusion. 1000 ml', 'ABCDerma Hydrant', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'steven', '1+1+1, dshfbj sdfj sdjhf jksdhjf hj sdhfj hsdjf hsdj hfjsdh fjhsd jfsdjf jdshf dsfj sdfjh sdjhfjks djkfh sdjkhf sdhfkj hsdjfh kjsdhfj sdjfh sdjkhf ksdhkjf ksdjhf kjhsdjfk sdjkhf sdfhk hsdkfsd hkf hsd hfhsd fsdhf hhsd f ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'steven', 'adman', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `pres` (`id`, `dname`, `pname`, `page`, `psex`, `pmrn`, `pphone`, `pheight`, `pweight`, `ptemp`, `cdetails`, `diagnosis`, `xl`, `m1`, `m2`, `m3`, `m4`, `m5`, `m6`, `m7`, `m8`, `m9`, `m10`, `m11`, `m12`, `m13`, `m14`, `m15`, `m16`, `m17`, `m18`, `m19`, `m20`, `d1`, `d2`, `d3`, `d4`, `d5`, `d6`, `d7`, `d8`, `d9`, `d10`, `d11`, `d12`, `d13`, `d14`, `d15`, `d16`, `d17`, `d18`, `d19`, `d20`, `other`, `date`, `pdiet`, `reffer`, `i1`, `i2`, `i3`, `i4`, `i5`, `i6`, `i7`, `i8`, `i9`, `i10`, `i11`, `i12`, `i13`, `i14`, `i15`, `i16`, `i17`, `i18`, `i19`, `i20`) VALUES
(160, 'steven', 'pname', 76, 'MALE', 878090, '786866', '76', '76', '76', '', '', 'BUN,FBS', '20% Mannitol 500ml', '10% Fat Emulsion', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'steven', '1+1+1, dshfbj sdfj sdjhf jksdhjf hj sdhfj hsdjf hsdj hfjsdh fjhsd jfsdjf jdshf dsfj sdfjh sdjhfjks djkfh sdjkhf sdhfkj hsdjfh kjsdhfj sdjfh sdjkhf ksdhkjf ksdjhf kjhsdjfk sdjkhf sdfhk hsdkfsd hkf hsd hfhsd fsdhf hhsd f ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/26/2018', '', '', 'steven', 'adman', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(161, 'steven', 'pname', 88979, 'MALE', 6567476, '897987', '78', '78', '78', 'jKJsj hfchsdjfh jds hfjds  h dsfj jKJsj hfchsdjfh jds hfjds  h dsfjjKJsj hfchsdjfh jds hfjds  h dsfjjKJsj hfchsdjfh jds hfjds  h dsfjjKJsj hfchsdjfh jds hfjds  h dsfjjKJsj hfchsdjfh jds hfjds  h dsfjjKJsj hfchsdjfh jds hfjds  h dsfjjKJsj hfchsdjfh jds hfjds  h dsfjjKJsj hfchsdjfh jds hfjds  h dsfjjKJsj hfchsdjfh jds hfjds  h dsfjjKJsj hfchsdjfh jds hfjds  h dsfjjKJsj hfchsdjfh jds hfjds  h dsfjjKJsj hfchsdjfh jds hfjds  h dsfjjKJsj hfchsdjfh jds hfjds  h dsfjjKJsj hfchsdjfh jds hfjds  h dsfjjKJsj hfchsdjfh jds hfjds  h dsfjjKJsj hfchsdjfh jds hfjds  h dsfjjKJsj hfchsdjfh jds hfjds  h dsfjjKJsj hfchsdjfh jds hfjds  h dsfjjKJsj hfchsdjfh jds hfjds  h dsfjjKJsj hfchsdjfh jds hfjds  h dsfjjKJsj hfchsdjfh jds hfjds  h dsfjjKJsj hfchsdjfh jds hfjds  h dsfjjKJsj hfchsdjfh jds hfjds  h dsfjjKJsj hfchsdjfh jds hfjds  h dsfjjKJsj hfchsdjfh jds hfjds  h dsfjjKJsj hfchsdjfh jds hfjds  h dsfjjKJsj hfchsdjfh jds hfjds  h dsfjjKJsj hfchsdjfh jds hfjds  h dsfjjKJsj hfchsdjfh jds hfjds  h dsfj', 'jKJsj hfchsdjfh jds hfjds  h dsfjjKJsj hfchsdjfh jds hfjds  h dsfjjKJsj hfchsdjfh jds hfjds  h dsfjjKJsj hfchsdjfh jds hfjds  h dsfjjKJsj hfchsdjfh jds hfjds  h dsfjjKJsj hfchsdjfh jds hfjds  h dsfjjKJsj hfchsdjfh jds hfjds  h dsfjjKJsj hfchsdjfh jds hfjds  h dsfjjKJsj hfchsdjfh jds hfjds  h dsfjjKJsj hfchsdjfh jds hfjds  h dsfjjKJsj hfchsdjfh jds hfjds  h dsfjjKJsj hfchsdjfh jds hfjds  h dsfjjKJsj hfchsdjfh jds hfjds  h dsfjjKJsj hfchsdjfh jds hfjds  h dsfjjKJsj hfchsdjfh jds hfjds  h dsfjjKJsj hfchsdjfh jds hfjds  h dsfjjKJsj hfchsdjfh jds hfjds  h dsfjjKJsj hfchsdjfh jds hfjds  h dsfjjKJsj hfchsdjfh jds hfjds  h dsfjjKJsj hfchsdjfh jds hfjds  h dsfjjKJsj hfchsdjfh jds hfjds  h dsfjjKJsj hfchsdjfh jds hfjds  h dsfjjKJsj hfchsdjfh jds hfjds  h dsfjjKJsj hfchsdjfh jds hfjds  h dsfj', 'Estimated GFR (eGFR),Fasting Lipid profile ,MRI of lumbosacral spine ,MRI of neck ,MRI of Right knee,S. Iron,S. Lipase,Scrapping from tongue for AFB stain,TPHA,Tracheal aspirate for AFB,Tracheal aspirate for CS', '25% Dextrose 100 ml Infusion', '5 % Dextrose IV Infusion. 1000 ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'adman', '1+1+1, dshfbj sdfj sdjhf jksdhjf hj sdhfj hsdjf hsdj hfjsdh fjhsd jfsdjf jdshf dsfj sdfjh sdjhfjks djkfh sdjkhf sdhfkj hsdjfh kjsdhfj sdjfh sdjkhf ksdhkjf ksdjhf kjhsdjfk sdjkhf sdfhk hsdkfsd hkf hsd hfhsd fsdhf hhsd f ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/26/2018', '', '', 'adman', 'steven', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(162, 'steven', 'AAAA', 777, 'MALE', 9, '89899', '7', '76', '76', 'jdsjkhf', 'jkhcjkxhvkh', 'BUN', '6%hydroxyethyl starch 500ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'hsah sags aghsgahjg shagdsaghgdhsag dgsahgd jsagdj gsagdjsagd gsajhdgsagdhgsa dgjsag dsjkfhkj h fdsj', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/27/2018', '', '', 'adman', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(163, 'steven', 'JHJKH', 7878, 'MALE', 7878978, '8878', '87', '8778', '87', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/27/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(164, 'steven', 'JHJKH', 7878, 'MALE', 7878978, '8878', '87', '8778', '87', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/27/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(165, 'steven', 'JHJKH', 7878, 'MALE', 7878978, '8878', '87', '8778', '87', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/27/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(166, 'steven', 'JHJKH', 7878, 'MALE', 7878978, '8878', '87', '8778', '87', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/27/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(167, 'steven', 'JHJKH', 7878, 'MALE', 7878978, '8878', '87', '8778', '87', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/27/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(168, 'steven', 'JHJKH', 7878, 'MALE', 7878978, '8878', '87', '8778', '87', '', '', 'CA 125', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/27/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(169, 'steven', 'JHJKH', 7878, 'MALE', 7878978, '8878', '87', '8778', '87', '', '', 'CA 125', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/27/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(170, 'steven', 'JHJKH', 7878, 'MALE', 7878978, '8878', '87', '8778', '87', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/27/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(171, 'steven', 'JHJKH', 7878, 'MALE', 7878978, '8878', '87', '8778', '87', '', '', 'MT', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/27/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(172, 'steven', 'JHJKH', 7878, 'MALE', 7878978, '8878', '87', '8778', '87', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/27/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(173, 'steven', 'JHJKH', 7878, 'MALE', 7878978, '8878', '87', '8778', '87', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/27/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(174, 'steven', 'JHJKH', 7878, 'MALE', 7878978, '8878', '87', '8778', '87', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/27/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(175, 'steven', 'JHJKH', 7878, 'MALE', 7878978, '8878', '87', '8778', '87', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/27/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(176, 'steven', 'JHJKH', 7878, 'MALE', 7878978, '8878', '87', '8778', '87', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/27/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(177, 'steven', 'JHJKH', 7878, 'MALE', 7878978, '8878', '87', '8778', '87', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/27/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(178, 'steven', 'JHJKH', 7878, 'MALE', 7878978, '8878', '87', '8778', '87', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/27/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(179, 'steven', 'JHJKH', 7878, 'MALE', 7878978, '8878', '87', '8778', '87', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/27/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(180, 'steven', 'JHJKH', 7878, 'MALE', 7878978, '8878', '87', '8778', '87', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/27/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(181, 'steven', 'JHJKH', 7878, 'MALE', 7878978, '8878', '87', '8778', '87', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/27/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(182, 'steven', 'JHJKH', 7878, 'MALE', 7878978, '8878', '87', '8778', '87', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/27/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(183, 'steven', 'JHJKH', 7878, 'MALE', 7878978, '8878', '87', '8778', '87', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/27/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(184, 'steven', 'JHJKH', 7878, 'MALE', 7878978, '8878', '87', '8778', '87', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/27/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(185, 'steven', 'JHJKH', 7878, 'MALE', 7878978, '8878', '87', '8778', '87', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/27/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(186, 'steven', 'JHJKH', 7878, 'MALE', 7878978, '8878', '87', '8778', '87', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03/27/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(187, 'steven', 'UUU', 87, 'MALE', 987897, '879798', '879', '87', '879', '', '', 'BUN,C4 (complement 4),CA 125,Fasting Lipid profile ,FBS', 'Acetic Acid 5% Solution', 'ABCDerma Hydrant', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'steven', '1+1+1, dshfbj sdfj sdjhf jksdhjf hj sdhfj hsdjf hsdj hfjsdh fjhsd jfsdjf jdshf dsfj sdfjh sdjhfjks djkfh sdjkhf sdhfkj hsdjfh kjsdhfj sdjfh sdjkhf ksdhkjf ksdjhf kjhsdjfk sdjkhf sdfhk hsdkfsd hkf hsd hfhsd fsdhf hhsd f ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '04/11/2018', '', '', 'asdasdas', 'adman', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(188, 'steven', 'KHKJK', 787, 'MALE', 8878978, '8798789778', '878', '878', '87', 'jsdnfjsdhfjhsdjhfj', 'jhsdjkfhjsdjf', 'BUN,C4 (complement 4),CA 125,CA 15-3,CA 19 ? 9,Estimated GFR (eGFR),Fasting Lipid profile ,FBS,Ferritin ,Flixible Cystoscopy,MRI of lumbosacral spine ,MRI of neck ,MRI of Right knee', '10%Dextrose+0.225%Sodium Chloride', '20% Mannitol 500ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'JHJKHKHHJKH', '04/12/2018', 'A-Cerumen Ear Hygine 2ml', 'njh', 'GGJHGJHG', 'JKHJKHKKHKH', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(189, 'steven', 'KJKJ', 87, 'MALE', 987987, '87987879797', '87', '87', '87', '', '', 'BUN', 'Acitretin 10mg Capsule', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '04/12/2018', '', '', 'OOOO', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(190, 'steven', 'IUIUOI', 980, 'MALE', 78688, '90890890809', '98908', '89', '880', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '04/28/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(191, 'steven', 'IUIUOI', 980, 'MALE', 78688, '90890890809', '98908', '89', '880', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '04/28/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(192, 'steven', 'IUIUOI', 980, 'MALE', 78688, '90890890809', '98908', '89', '880', '', '', '', '10% Fat Emulsion', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '04/28/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(193, 'steven', 'IUIUOI', 980, 'MALE', 78688, '90890890809', '98908', '89', '880', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '04/28/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(194, 'steven', 'IUIUOI', 980, 'MALE', 78688, '90890890809', '98908', '89', '880', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '04/28/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(195, 'steven', 'IUIUOI', 980, 'MALE', 78688, '90890890809', '98908', '89', '880', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '04/28/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(196, 'steven', 'IUIUOI', 980, 'MALE', 78688, '90890890809', '98908', '89', '880', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '04/28/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(197, 'steven', 'IUIUOI', 980, 'MALE', 78688, '90890890809', '98908', '89', '880', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '04/28/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(198, 'steven', 'IUIUOI', 980, 'MALE', 78688, '90890890809', '98908', '89', '880', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '04/28/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(199, 'steven', 'IUIUOI', 980, 'MALE', 78688, '90890890809', '98908', '89', '880', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '04/28/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(200, 'steven', 'IUIUOI', 980, 'MALE', 78688, '90890890809', '98908', '89', '880', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '04/28/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(201, 'steven', 'IUIUOI', 980, 'MALE', 78688, '90890890809', '98908', '89', '880', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '04/28/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(202, 'steven', 'IUIUOI', 980, 'MALE', 78688, '90890890809', '98908', '89', '880', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '04/28/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(203, 'steven', 'IUIUOI', 980, 'MALE', 78688, '90890890809', '98908', '89', '880', '', '', '', 'steven', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '04/28/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(204, 'steven', 'IUIUOI', 980, 'MALE', 78688, '90890890809', '98908', '89', '880', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '04/28/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(205, 'steven', 'IUIUOI', 980, 'MALE', 78688, '90890890809', '98908', '89', '880', '', '', '', 'steven', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '9898', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '04/28/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(206, 'steven', 'IUIUOI', 980, 'MALE', 78688, '90890890809', '98908', '89', '880', '', '', '', 'steven', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '04/28/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(207, 'steven', 'KHKJK', 787, 'MALE', 8878978, '8798789778', '', '<br /><b>Notice</b>:', '<br /><b>Notice</b>:', '', '', 'Ferritin ', 'A-Cerumen Ear Hygine 2ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'dsjfkjsdfhk', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(208, '', 'KHKJK', 787, 'MALE', 8878978, '8798789778', '', '<br /><b>Notice</b>:', '<br /><b>Notice</b>:', '', '', '', '6%hydroxyethyl starch 500ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(209, '', 'KHKJK', 787, 'MALE', 8878978, '8798789778', '', '<br /><b>Notice</b>:', '<br /><b>Notice</b>:', '', '', '', '6%hydroxyethyl starch 500ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(210, 'steven', 'KHKJK', 787, 'MALE', 8878978, '8798789778', '', '<br /><b>Notice</b>:', '<br /><b>Notice</b>:', '', '', 'Ferritin ', '0.9%Sodium Chloride+5%Dextrose  1000 ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'jkljlkjj', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(211, '', 'KHKJK', 787, 'MALE', 8878978, '8798789778', '', 'jhdskf', 'jhdksfk', '', '', '', 'Acetic Acid 5% Solution', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'dksjflj', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(212, 'steven', 'Zahid Hassan', 778, 'MALE', 111, '277387498', '878', '878', '787', '', '', '24 hour Urinary Total Protein ,A/G ratio,C4 (complement 4),CA 125', '5%Dextrose+0.225%Sodium Chloride', 'ABCDerma Hydrant', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '04/30/2018', '', '', 'hjhjkh', 'PPPP', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(213, 'steven', 'Steven Adman Dias', 43, 'MALE', 989898, '09090909099', '8', '545', '54', 'ghfhgfghfhgf', 'hghjggjgjh', 'C4 (complement 4)', 'ABCDerma Hydrant', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/01/2018', '', '', 'fdfdgfgdgd', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(214, 'steven', 'ADMAN DIAS', 7878, 'MALE', 777777, '777777', '98', '98', '98', 'sdjhfjhsdf', 'jhkdhsjfsdf', 'C4 (complement 4),Ferritin ,MT', 'A-Cerumen Ear Hygine 2ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/01/2018', '', '', 'HJJKHJKHHK', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(215, 'steven', 'Steven Adman Dias', 32, 'MALE', 1234, '01711206048', '87', '878', '76', 'PPPPPPPP', 'jjkjldsjjfksdjkfjds f fdfdsUUUUUUUU', 'CBC and ESR', 'Acetylcysteine 600mg Tablet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/01/2018', '', '', 'GHGHG', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(216, 'steven', 'TEST1', 23, 'MALE', 666666, '01711206048', '234', '13', '14', '', '', 'Ferritin ', 'A-Cerumen Ear Hygine 2ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/02/2018', '', 'adman', 'JJJJJJJ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(217, 'steven', 'Akash Chopra', 34, 'MALE', 555555, '01711206048', '78', '54', '90', '', '', 'MT', 'Acitretin 10mg Capsule', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/02/2018', '', 'adman', 'PPPPOOOPPP', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(218, 'steven', 'Akash Chopra', 34, 'MALE', 555555, '01711206048', '78', '54', '90', '', '', 'MT', 'Acitretin 10mg Capsule', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/02/2018', '', 'adman', 'PPPPOOOPPP', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `presnew`
--

CREATE TABLE IF NOT EXISTS `presnew` (
  `id` int(20) NOT NULL,
  `eid` int(6) NOT NULL,
  `dname` varchar(100) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `page` int(3) NOT NULL,
  `psex` varchar(10) NOT NULL,
  `pmrn` int(20) NOT NULL,
  `pphone` varchar(100) NOT NULL,
  `pheight` varchar(20) NOT NULL,
  `pweight` varchar(20) NOT NULL,
  `ptemp` varchar(20) NOT NULL,
  `cdetails` varchar(1000) NOT NULL,
  `diagnosis` varchar(1000) NOT NULL,
  `xl` varchar(500) NOT NULL,
  `m1` varchar(200) NOT NULL,
  `m2` varchar(200) NOT NULL,
  `m3` varchar(500) NOT NULL,
  `m4` varchar(500) NOT NULL,
  `m5` varchar(500) NOT NULL,
  `m6` varchar(500) NOT NULL,
  `m7` varchar(500) NOT NULL,
  `m8` varchar(500) NOT NULL,
  `m9` varchar(500) NOT NULL,
  `m10` varchar(500) NOT NULL,
  `m11` varchar(500) NOT NULL,
  `m12` varchar(500) NOT NULL,
  `m13` varchar(500) NOT NULL,
  `m14` varchar(500) NOT NULL,
  `m15` varchar(500) NOT NULL,
  `m16` varchar(500) NOT NULL,
  `m17` varchar(500) NOT NULL,
  `m18` varchar(500) NOT NULL,
  `m19` varchar(500) NOT NULL,
  `m20` varchar(500) NOT NULL,
  `d1` varchar(500) NOT NULL,
  `d2` varchar(500) NOT NULL,
  `d3` varchar(500) NOT NULL,
  `d4` varchar(500) NOT NULL,
  `d5` varchar(500) NOT NULL,
  `d6` varchar(500) NOT NULL,
  `d7` varchar(500) NOT NULL,
  `d8` varchar(500) NOT NULL,
  `d9` varchar(500) NOT NULL,
  `d10` varchar(500) NOT NULL,
  `d11` varchar(500) NOT NULL,
  `d12` varchar(500) NOT NULL,
  `d13` varchar(500) NOT NULL,
  `d14` varchar(500) NOT NULL,
  `d15` varchar(500) NOT NULL,
  `d16` varchar(500) NOT NULL,
  `d17` varchar(500) NOT NULL,
  `d18` varchar(500) NOT NULL,
  `d19` varchar(500) NOT NULL,
  `d20` varchar(500) NOT NULL,
  `other` varchar(1000) NOT NULL,
  `date` varchar(20) NOT NULL,
  `pdiet` varchar(200) NOT NULL,
  `pdiet2` varchar(50) NOT NULL,
  `pdiet3` varchar(50) NOT NULL,
  `pdiet4` varchar(50) NOT NULL,
  `pdiet5` varchar(50) NOT NULL,
  `pdiet6` varchar(50) NOT NULL,
  `reffer` varchar(200) NOT NULL,
  `reffer2` varchar(30) NOT NULL,
  `reffer3` varchar(30) NOT NULL,
  `reffer4` varchar(30) NOT NULL,
  `reffer5` varchar(30) NOT NULL,
  `reffer6` varchar(30) NOT NULL,
  `i1` varchar(500) NOT NULL,
  `i2` varchar(500) NOT NULL,
  `i3` varchar(500) NOT NULL,
  `i4` varchar(500) NOT NULL,
  `i5` varchar(500) NOT NULL,
  `i6` varchar(500) NOT NULL,
  `i7` varchar(500) NOT NULL,
  `i8` varchar(500) NOT NULL,
  `i9` varchar(500) NOT NULL,
  `i10` varchar(500) NOT NULL,
  `i11` varchar(500) NOT NULL,
  `i12` varchar(500) NOT NULL,
  `i13` varchar(500) NOT NULL,
  `i14` varchar(500) NOT NULL,
  `i15` varchar(500) NOT NULL,
  `i16` varchar(500) NOT NULL,
  `i17` varchar(500) NOT NULL,
  `i18` varchar(500) NOT NULL,
  `i19` varchar(500) NOT NULL,
  `i20` varchar(500) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `presnew`
--

INSERT INTO `presnew` (`id`, `eid`, `dname`, `pname`, `page`, `psex`, `pmrn`, `pphone`, `pheight`, `pweight`, `ptemp`, `cdetails`, `diagnosis`, `xl`, `m1`, `m2`, `m3`, `m4`, `m5`, `m6`, `m7`, `m8`, `m9`, `m10`, `m11`, `m12`, `m13`, `m14`, `m15`, `m16`, `m17`, `m18`, `m19`, `m20`, `d1`, `d2`, `d3`, `d4`, `d5`, `d6`, `d7`, `d8`, `d9`, `d10`, `d11`, `d12`, `d13`, `d14`, `d15`, `d16`, `d17`, `d18`, `d19`, `d20`, `other`, `date`, `pdiet`, `pdiet2`, `pdiet3`, `pdiet4`, `pdiet5`, `pdiet6`, `reffer`, `reffer2`, `reffer3`, `reffer4`, `reffer5`, `reffer6`, `i1`, `i2`, `i3`, `i4`, `i5`, `i6`, `i7`, `i8`, `i9`, `i10`, `i11`, `i12`, `i13`, `i14`, `i15`, `i16`, `i17`, `i18`, `i19`, `i20`, `status`) VALUES
(57, 0, 'Dr. Rajeeb Hassan', 'Steven Adman Dias', 44, 'MALE', 123456, '01711206048', '76', '76', '76', 'OK ', 'OK Ok OKKK', 'CBC and ESR', 'Acetic Acid 5% Solution', 'Acetic Acid 5% Solution', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'JHJKHJKH', '05/21/2018', 'Acitretin 10mg Capsule', '', '', '', '', '', 'Dr. Ranen Biswas', '', '', '', '', '', 'KJHJH', 'JHHHKHH', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'SERVED'),
(58, 0, 'Dr. Ranen Biswas', 'Steven Adman Dias', 44, 'MALE', 123456, '01711206048', '76', '76', '76', 'jhjhjkhh', 'jhjkhjhjhj', '', 'Acetylcysteine 600mg Tablet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/21/2018', '', '', '', '', '', '', '', '', '', '', '', '', 'OKOK', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'SERVED'),
(59, 0, 'Dr. Rajeeb Hassan', 'Jamal Uddin', 44, 'MALE', 234567, '0325-293-5', '87', '8778', '87', 'jljjlkjj', 'jk', 'MRI of Right knee', 'Infertility Supplement for woman tablet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'jkhkjhh', '05/21/2018', '', '', '', '', '', '', '', '', '', '', '', '', 'jkhjkhkh', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(60, 0, 'Dr. Ranen Biswas', 'Steven Adman Dias', 44, 'MALE', 123456, '01711206048', 'hdjfhjds', 'jhjhh', 'jkhj', 'JHJKHHKHKH', 'JHJKHHKJHJKHKHK', 'MT', 'ABCDerma Hydrant', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/21/2018', '', '', '', '', '', '', 'Dr. Rajeeb Hassan', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(61, 0, 'Dr. J.M.Q. Quaser Alam', 'Kamal Khan', 44, 'MALE', 345678, '01711206048', '76', '76', '67', '', '', 'Serum immune electrophoresis,Triglyceride ,TRUS ( Trans rectal USG) of Prostate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/21/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(62, 4, 'Dr. Rajeeb Hassan', 'Steven Adman Dias', 44, 'MALE', 123456, '01711206048', '', '', '', '', '', 'BUN,FBS', 'Activated Charcoal 250 mg Tablet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/26/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(63, 1, 'Dr. Rajeeb Hassan', 'MERRY BAROI', 44, 'FEMALE', 666988, '76786678', '67866', '678', '7867', '', '', 'FBS,MT', 'A-Cerumen Ear Hygine 2ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/26/2018', '', '', '', '', '', '', '', '', '', '', '', '', 'jkhkjhhkh', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(64, 2, 'Dr. Ranen Biswas', 'MERRY BAROI', 44, 'FEMALE', 666988, '76786678', '', '', '', '', '', 'Serum immune electrophoresis,Triglyceride ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/26/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(65, 3, 'Dr. Rajeeb Hassan', 'MERRY BAROI', 44, 'FEMALE', 666988, '76786678', '76', '67', '67', '', '', 'Fasting Lipid profile ,FBS,Ferritin ,Flixible Cystoscopy,MT,Mumps IgM & IgG,Myoglobin', 'Acetic Acid 5% Solution', '5%Composit Amino Acid+D-Sorbitol', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/27/2018', '20% Mannitol 500ml', '', '', '', '', '', 'Dr. Ranen Biswas', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(66, 4, 'Dr. Ranen Biswas', 'MERRY BAROI', 44, 'FEMALE', 666988, '76786678', '76', '67', '67', '', '', '', 'Acetic Acid 5% Solution', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/27/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'SERVED'),
(67, 5, 'Dr. Ranen Biswas', 'Steven Adman Dias', 44, 'MALE', 123456, '01711206048', '', '', '', '', '', 'MT,Serum immune electrophoresis,Triglyceride ', 'Acetic Acid 5% Solution', '20% Mannitol 500ml', '10 % Dextrose IV Infusion 1000 ml', '5%Composit Amino Acid+D-Sorbitol', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '1+1+1, dshfbj s', '1+1+1, dshfbj s', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/27/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'SERVED'),
(68, 1, 'Dr. Rajeeb Hassan', 'BBBBB', 0, 'MALE', 222555, '987', '', '', '', '', '', '', '0.9% Sodium chloride IV Infusion 1000ml', '0.9% Sodium Chloride IV Infusion 500 ml', '0.9%Sodium Chloride+5%Dextrose  1000 ml', '10 % Dextrose IV Infusion 1000 ml', '20% Mannitol 500ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/28/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(69, 2, 'Dr. Rajeeb Hassan', 'BBBBB', 0, 'MALE', 222555, '987', '', '', '', '', '', 'screening and drawing,Semen analysis', 'Fexofenadine 30mg/5ml Suspension', 'Calcitriol 0.25mcg Capsule', 'Brinzolamide 1% E/D', 'Budesonide 0.1% nasal spray', 'Calcium Acetate 667mg Tablet', 'Calcium Acetate 667mg Tablet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '1+1+1, dshfbj s', '1+1+1, dshfbj s', '1+1+1, dshfbj s', '1+1+1, dshfbj s', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/28/2018', '', '', '', '', '', '', '', '', '', '', '', '', 'a', 'b', 'c', 'd', 'e', 'f', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(70, 6, 'Dr. Rajeeb Hassan', 'Steven Adman Dias', 44, 'MALE', 123456, '01711206048', '', '', '', '', '', 'BUN', 'Calcitriol 0.25mcg Capsule', 'Calcium Acetate 667mg Tablet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/28/2018', '', '', '', '', '', '', '', '', '', '', '', '', 'ssdff', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(71, 7, 'Dr. Rajeeb Hassan', 'Steven Adman Dias', 44, 'MALE', 123456, '01711206048', '', '', '', '', '', 'BUN', 'Calcitriol 0.25mcg Capsule', 'Calcium Acetate 667mg Tablet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/28/2018', '', '', '', '', '', '', '', '', '', '', '', '', 'ssdff', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(72, 8, 'Dr. Rajeeb Hassan', 'Steven Adman Dias', 44, 'MALE', 123456, '01711206048', '', '', '', '', '', 'BUN', 'Calcitriol 0.25mcg Capsule', 'Calcium Acetate 667mg Tablet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/28/2018', '', '', '', '', '', '', '', '', '', '', '', '', 'ssdff', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(73, 9, 'Dr. Rajeeb Hassan', 'Steven Adman Dias', 44, 'MALE', 123456, '01711206048', '', '', '', '', '', 'BUN', 'Calcitriol 0.25mcg Capsule', 'Calcium Acetate 667mg Tablet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/28/2018', '', '', '', '', '', '', '', '', '', '', '', '', 'ssdff', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(74, 10, 'Dr. Rajeeb Hassan', 'Steven Adman Dias', 44, 'MALE', 123456, '01711206048', '', '', '', '', '', 'BUN', 'Calcitriol 0.25mcg Capsule', 'Calcium Acetate 667mg Tablet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/28/2018', '', '', '', '', '', '', '', '', '', '', '', '', 'ssdff', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(75, 11, 'Dr. Rajeeb Hassan', 'Steven Adman Dias', 44, 'MALE', 123456, '01711206048', '', '', '', '', '', 'BUN', 'Calcitriol 0.25mcg Capsule', 'Calcium Acetate 667mg Tablet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/28/2018', '', '', '', '', '', '', '', '', '', '', '', '', 'ssdff', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(76, 12, 'Dr. Rajeeb Hassan', 'Steven Adman Dias', 44, 'MALE', 123456, '01711206048', '', '', '', '', '', 'BUN', 'Calcitriol 0.25mcg Capsule', 'Calcium Acetate 667mg Tablet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/28/2018', '', '', '', '', '', '', '', '', '', '', '', '', 'ssdff', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(77, 13, 'Dr. Rajeeb Hassan', 'Steven Adman Dias', 44, 'MALE', 123456, '01711206048', '', '', '', '', '', '', '', 'Bosentan 62.5mg Tablet', 'Vitamin-B complex + Vitamin-C IV Injection', '', 'Betahistine 16 mg Tablet', 'Hartmann', '', '', '', '', '', '', '', '', '', '', 'Aspirin 75 mg Tablet', '', '', 'Calcium +Vitamin-D3 + Minerals', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/28/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(78, 14, 'Dr. Rajeeb Hassan', 'Steven Adman Dias', 44, 'MALE', 123456, '01711206048', '', '', '', '', '', '', '', 'Bosentan 62.5mg Tablet', 'Vitamin-B complex + Vitamin-C IV Injection', '', 'Betahistine 16 mg Tablet', 'Hartmann', '', '', '', '', '', '', '', '', '', '', 'Aspirin 75 mg Tablet', '', '', 'Calcium +Vitamin-D3 + Minerals', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/28/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(79, 15, 'Dr. Rajeeb Hassan', 'Steven Adman Dias', 44, 'MALE', 123456, '01711206048', '', '', '', '', '', '', '', 'Bosentan 62.5mg Tablet', 'Vitamin-B complex + Vitamin-C IV Injection', '', 'Betahistine 16 mg Tablet', 'Hartmann', '', '', '', '', '', '', '', '', '', '', 'Aspirin 75 mg Tablet', '', '', 'Calcium +Vitamin-D3 + Minerals', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/28/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(80, 16, 'Dr. Rajeeb Hassan', 'Steven Adman Dias', 44, 'MALE', 123456, '01711206048', '', '', '', '', '', '', '', 'Bosentan 62.5mg Tablet', 'Vitamin-B complex + Vitamin-C IV Injection', '', 'Betahistine 16 mg Tablet', 'Hartmann', '', '', '', '', '', '', '', '', '', '', 'Aspirin 75 mg Tablet', '', '', 'Calcium +Vitamin-D3 + Minerals', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/28/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(81, 3, 'Dr. Rajeeb Hassan', 'BBBBB', 0, 'MALE', 222555, '987', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Vitamin E 400mg Capsule', 'Budesonide 200mcg + Formoterol 6mcg cozycap', 'Budesonide 100mcg + Formoterol 6mcg cozycap', 'Calcitriol 0.25mcg Capsule', 'Cabergoline 0.5mg Tablet', 'Budesonide 0.5mg/2ml Neb/Soln.', 'Bromfenac 0.09% E/D', '', '', '', '', '', '', '', '', '', '', '', '', '', '30 days', '1+1+1, 3 months', '', '', '', '', '', '', '05/28/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(82, 4, 'Dr. Rajeeb Hassan', 'BBBBB', 0, 'MALE', 222555, '987', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Vitamin E 400mg Capsule', 'Budesonide 200mcg + Formoterol 6mcg cozycap', 'Budesonide 100mcg + Formoterol 6mcg cozycap', 'Calcitriol 0.25mcg Capsule', 'Cabergoline 0.5mg Tablet', 'Budesonide 0.5mg/2ml Neb/Soln.', 'Bromfenac 0.09% E/D', '', '', '', '', '', '', '', '', '', '', '', '', '', '30 days', '1+1+1, 3 months', '', '', '', '', '', '', '05/28/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(83, 5, 'Dr. Rajeeb Hassan', 'BBBBB', 0, 'MALE', 222555, '987', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Vitamin E 400mg Capsule', 'Budesonide 200mcg + Formoterol 6mcg cozycap', 'Budesonide 100mcg + Formoterol 6mcg cozycap', 'Calcitriol 0.25mcg Capsule', 'Cabergoline 0.5mg Tablet', 'Budesonide 0.5mg/2ml Neb/Soln.', 'Bromfenac 0.09% E/D', '', '', '', '', '', '', '', '', '', '', '', '', '', '30 days', '1+1+1, 3 months', '', '', '', '', '', '', '05/28/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(84, 6, 'Dr. Rajeeb Hassan', 'BBBBB', 0, 'MALE', 222555, '987', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Vitamin E 400mg Capsule', 'Budesonide 200mcg + Formoterol 6mcg cozycap', 'Budesonide 100mcg + Formoterol 6mcg cozycap', 'Calcitriol 0.25mcg Capsule', 'Cabergoline 0.5mg Tablet', 'Budesonide 0.5mg/2ml Neb/Soln.', 'Bromfenac 0.09% E/D', '', '', '', '', '', '', '', '', '', '', '', '', '', '30 days', '1+1+1, 3 months', '', '', '', '', '', '', '05/28/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(85, 7, 'Dr. Rajeeb Hassan', 'BBBBB', 0, 'MALE', 222555, '987', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Vitamin E 400mg Capsule', 'Budesonide 200mcg + Formoterol 6mcg cozycap', 'Budesonide 100mcg + Formoterol 6mcg cozycap', 'Calcitriol 0.25mcg Capsule', 'Cabergoline 0.5mg Tablet', 'Budesonide 0.5mg/2ml Neb/Soln.', 'Bromfenac 0.09% E/D', '', '', '', '', '', '', '', '', '', '', '', '', '', '30 days', '1+1+1, 3 months', '', '', '', '', '', '', '05/28/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(86, 8, 'Dr. Rajeeb Hassan', 'BBBBB', 0, 'MALE', 222555, '987', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Vitamin E 400mg Capsule', 'Budesonide 200mcg + Formoterol 6mcg cozycap', 'Budesonide 100mcg + Formoterol 6mcg cozycap', 'Calcitriol 0.25mcg Capsule', 'Cabergoline 0.5mg Tablet', 'Budesonide 0.5mg/2ml Neb/Soln.', 'Bromfenac 0.09% E/D', '', '', '', '', '', '', '', '', '', '', '', '', '', '30 days', '1+1+1, 3 months', '', '', '', '', '', '', '05/28/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(87, 9, 'Dr. Rajeeb Hassan', 'BBBBB', 0, 'MALE', 222555, '987', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Vitamin E 400mg Capsule', 'Budesonide 200mcg + Formoterol 6mcg cozycap', 'Budesonide 100mcg + Formoterol 6mcg cozycap', 'Calcitriol 0.25mcg Capsule', 'Cabergoline 0.5mg Tablet', 'Budesonide 0.5mg/2ml Neb/Soln.', 'Bromfenac 0.09% E/D', '', '', '', '', '', '', '', '', '', '', '', '', '', '30 days', '1+1+1, 3 months', '', '', '', '', '', '', '05/28/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(88, 10, 'Dr. Rajeeb Hassan', 'BBBBB', 0, 'MALE', 222555, '987', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Vitamin E 400mg Capsule', 'Budesonide 200mcg + Formoterol 6mcg cozycap', 'Budesonide 100mcg + Formoterol 6mcg cozycap', 'Calcitriol 0.25mcg Capsule', 'Cabergoline 0.5mg Tablet', 'Budesonide 0.5mg/2ml Neb/Soln.', 'Bromfenac 0.09% E/D', '', '', '', '', '', '', '', '', '', '', '', '', '', '30 days', '1+1+1, 3 months', '', '', '', '', '', '', '05/28/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(89, 11, 'Dr. Rajeeb Hassan', 'BBBBB', 0, 'MALE', 222555, '987', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Vitamin E 400mg Capsule', 'Budesonide 200mcg + Formoterol 6mcg cozycap', 'Budesonide 100mcg + Formoterol 6mcg cozycap', 'Calcitriol 0.25mcg Capsule', 'Cabergoline 0.5mg Tablet', 'Budesonide 0.5mg/2ml Neb/Soln.', 'Bromfenac 0.09% E/D', '', '', '', '', '', '', '', '', '', '', '', '', '', '30 days', '1+1+1, 3 months', '', '', '', '', '', '', '05/28/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(90, 12, 'Dr. Rajeeb Hassan', 'BBBBB', 0, 'MALE', 222555, '987', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Vitamin E 400mg Capsule', 'Budesonide 200mcg + Formoterol 6mcg cozycap', 'Budesonide 100mcg + Formoterol 6mcg cozycap', 'Calcitriol 0.25mcg Capsule', 'Cabergoline 0.5mg Tablet', 'Budesonide 0.5mg/2ml Neb/Soln.', 'Bromfenac 0.09% E/D', '', '', '', '', '', '', '', '', '', '', '', '', '', '30 days', '1+1+1, 3 months', '', '', '', '', '', '', '05/28/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(91, 13, 'Dr. Rajeeb Hassan', 'BBBBB', 0, 'MALE', 222555, '987', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Vitamin E 400mg Capsule', 'Budesonide 200mcg + Formoterol 6mcg cozycap', 'Budesonide 100mcg + Formoterol 6mcg cozycap', 'Calcitriol 0.25mcg Capsule', 'Cabergoline 0.5mg Tablet', 'Budesonide 0.5mg/2ml Neb/Soln.', 'Bromfenac 0.09% E/D', '', '', '', '', '', '', '', '', '', '', '', '', '', '30 days', '1+1+1, 3 months', '', '', '', '', '', '', '05/28/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(92, 17, 'Dr. Rajeeb Hassan', 'Steven Adman Dias', 44, 'MALE', 123456, '01711206048', '', '', '', '', '', '', 'Budesonide 0.5mg/2ml Neb/Soln.', 'Calcium 600mg + Vitamin D3 400iu Tablet', 'Ondansetrone 8mg/4ml Injection', 'Calcium 600mg + Vitamin D3 400iu Tablet', 'Calcium Acetate 667mg Tablet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/29/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(93, 18, 'Dr. Rajeeb Hassan', 'Steven Adman Dias', 44, 'MALE', 123456, '01711206048', '', '', '', '', '', '', 'Budesonide 0.5mg/2ml Neb/Soln.', 'Calcium 600mg + Vitamin D3 400iu Tablet', 'Ondansetrone 8mg/4ml Injection', 'Calcium 600mg + Vitamin D3 400iu Tablet', 'Calcium Acetate 667mg Tablet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/29/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(94, 19, 'Dr. Rajeeb Hassan', 'Steven Adman Dias', 44, 'MALE', 123456, '01711206048', '', '', '', '', '', '', 'Budesonide 0.5mg/2ml Neb/Soln.', 'Calcium 600mg + Vitamin D3 400iu Tablet', 'Ondansetrone 8mg/4ml Injection', 'Calcium 600mg + Vitamin D3 400iu Tablet', 'Calcium Acetate 667mg Tablet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/29/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(95, 20, 'Dr. Rajeeb Hassan', 'Steven Adman Dias', 44, 'MALE', 123456, '01711206048', '', '', '', '', '', '', 'Budesonide 0.5mg/2ml Neb/Soln.', 'Calcium 600mg + Vitamin D3 400iu Tablet', 'Ondansetrone 8mg/4ml Injection', 'Calcium 600mg + Vitamin D3 400iu Tablet', 'Calcium Acetate 667mg Tablet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/29/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(96, 21, 'Dr. Rajeeb Hassan', 'Steven Adman Dias', 44, 'MALE', 123456, '01711206048', '', '', '', '', '', '', 'Budesonide 0.5mg/2ml Neb/Soln.', 'Calcium 600mg + Vitamin D3 400iu Tablet', 'Ondansetrone 8mg/4ml Injection', 'Calcium 600mg + Vitamin D3 400iu Tablet', 'Calcium Acetate 667mg Tablet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/29/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(97, 22, 'Dr. Rajeeb Hassan', 'Steven Adman Dias', 44, 'MALE', 123456, '01711206048', '', '', '', '', '', '', 'Budesonide 0.5mg/2ml Neb/Soln.', 'Calcium 600mg + Vitamin D3 400iu Tablet', 'Ondansetrone 8mg/4ml Injection', 'Calcium 600mg + Vitamin D3 400iu Tablet', 'Calcium Acetate 667mg Tablet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/29/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(98, 23, 'Dr. Rajeeb Hassan', 'Steven Adman Dias', 44, 'MALE', 123456, '01711206048', '', '', '', '', '', '', 'Budesonide 0.5mg/2ml Neb/Soln.', 'Calcium 600mg + Vitamin D3 400iu Tablet', 'Ondansetrone 8mg/4ml Injection', 'Calcium 600mg + Vitamin D3 400iu Tablet', 'Calcium Acetate 667mg Tablet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/29/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(99, 24, 'Dr. Rajeeb Hassan', 'Steven Adman Dias', 44, 'MALE', 123456, '01711206048', '', '', '', '', '', '', 'Budesonide 0.5mg/2ml Neb/Soln.', 'Calcium 600mg + Vitamin D3 400iu Tablet', 'Ondansetrone 8mg/4ml Injection', 'Calcium 600mg + Vitamin D3 400iu Tablet', 'Calcium Acetate 667mg Tablet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/29/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(100, 25, 'Dr. Rajeeb Hassan', 'Steven Adman Dias', 44, 'MALE', 123456, '01711206048', '', '', '', '', '', '', 'Budesonide 0.5mg/2ml Neb/Soln.', 'Calcium 600mg + Vitamin D3 400iu Tablet', 'Ondansetrone 8mg/4ml Injection', 'Calcium 600mg + Vitamin D3 400iu Tablet', 'Calcium Acetate 667mg Tablet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/29/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(101, 26, 'Dr. Rajeeb Hassan', 'Steven Adman Dias', 44, 'MALE', 123456, '01711206048', '', '', '', '', '', '', 'Budesonide 0.5mg/2ml Neb/Soln.', 'Calcium 600mg + Vitamin D3 400iu Tablet', 'Ondansetrone 8mg/4ml Injection', 'Calcium 600mg + Vitamin D3 400iu Tablet', 'Calcium Acetate 667mg Tablet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/29/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(102, 27, 'Dr. Rajeeb Hassan', 'Steven Adman Dias', 44, 'MALE', 123456, '01711206048', '', '', '', '', '', '', 'Budesonide 0.5mg/2ml Neb/Soln.', 'Calcium 600mg + Vitamin D3 400iu Tablet', 'Ondansetrone 8mg/4ml Injection', 'Calcium 600mg + Vitamin D3 400iu Tablet', 'Calcium Acetate 667mg Tablet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/29/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(103, 28, 'Dr. Rajeeb Hassan', 'Steven Adman Dias', 44, 'MALE', 123456, '01711206048', '', '', '', '', '', '', 'Budesonide 0.5mg/2ml Neb/Soln.', 'Calcium 600mg + Vitamin D3 400iu Tablet', 'Ondansetrone 8mg/4ml Injection', 'Calcium 600mg + Vitamin D3 400iu Tablet', 'Calcium Acetate 667mg Tablet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/29/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(104, 29, 'Dr. Rajeeb Hassan', 'Steven Adman Dias', 44, 'MALE', 123456, '01711206048', '', '', '', '', '', '', 'Budesonide 0.5mg/2ml Neb/Soln.', 'Calcium 600mg + Vitamin D3 400iu Tablet', 'Ondansetrone 8mg/4ml Injection', 'Calcium 600mg + Vitamin D3 400iu Tablet', 'Calcium Acetate 667mg Tablet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/29/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(105, 30, 'Dr. Rajeeb Hassan', 'Steven Adman Dias', 44, 'MALE', 123456, '01711206048', '', '', '', '', '', '', 'Budesonide 0.5mg/2ml Neb/Soln.', 'Calcium 600mg + Vitamin D3 400iu Tablet', 'Ondansetrone 8mg/4ml Injection', 'Calcium 600mg + Vitamin D3 400iu Tablet', 'Calcium Acetate 667mg Tablet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/29/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(106, 1, 'Dr. Rajeeb Hassan', 'SUCCESS', 0, 'MALE', 334567, 'hjgjgjh', '', '', '', '', '', '', 'Bupivacaine 0.5 % Injection', 'Butamirate Citrate 7.5mg/5ml Syrup', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/29/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(107, 31, 'Dr. Rajeeb Hassan', 'Steven Adman Dias', 44, 'MALE', 123456, '01711206048', '', '', '', '', '', 'CA 125,MRI of Right knee', 'Microgol 13.125gm + Sodium Bicarbonate 178.5mg +  Sodium Chloride 350.70mg + Potassium Chloride 46.60mg /25ml Solution', 'Calcitriol 0.25mcg Capsule', 'Calcium +Vitamin-D3 + Minerals', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '1+1+1, dshfbj s', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '05/29/2018', 'Calcium 500mg + Vitamin D3 200iu Tablet', 'Cabergoline 0.5mg Tablet', '', '', '', '', 'Dr. Ranen Biswas', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `slot`
--

CREATE TABLE IF NOT EXISTS `slot` (
  `sid` int(6) NOT NULL,
  `aslot` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slot`
--

INSERT INTO `slot` (`sid`, `aslot`) VALUES
(1, '9:00AM'),
(2, '10:00AM'),
(3, '11:00AM'),
(4, '12:00PM'),
(5, '1:00PM'),
(6, '2:00PM'),
(7, '3:00PM'),
(8, '4:00PM'),
(9, 'OT'),
(10, 'LEAVE'),
(11, 'NOT AVAILABLE');

-- --------------------------------------------------------

--
-- Table structure for table `tagslist`
--

CREATE TABLE IF NOT EXISTS `tagslist` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `findings` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `list` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=148 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tagslist`
--

INSERT INTO `tagslist` (`id`, `name`, `findings`, `list`) VALUES
(24, 'sabdj sadj saj', '', ''),
(25, 'sdknck sdc dc sd', '', ''),
(26, 'sd cjdsf cjsd jsf  dsj', '', ''),
(27, 'hsbajhbc', '', ''),
(28, 'sjadjsanc', '', ''),
(29, 'sjadjsanc', '', ''),
(30, 'sjadjsanc', '', ''),
(31, 'sjadjsanc', '', ''),
(32, 'sjadjsanc', '', ''),
(33, 'sjadjsanc', '', ''),
(34, 'sjadjsanc', '', ''),
(35, 'sjadjsanc', '', ''),
(36, 'sjadjsanc', '', ''),
(37, 'sjadjsanc', '', ''),
(38, 'sjadjsanc', '', ''),
(39, 'sjadjsanc', '', ''),
(40, 'sjadjsanc', '', ''),
(41, 'sjadjsanc', '', ''),
(42, 'sjadjsanc', '', ''),
(43, 'sjadjsanc', '', ''),
(44, 'sadjsakds', 'hh', ''),
(45, 'spppp', 'hh', ''),
(46, 'steven', 'Adman', ''),
(47, 'dias', 'Adman', ''),
(48, 'se', 'ven', 'framework[]'),
(49, 'sdsa', 'qqqqq', 'framework[]'),
(50, 'sahdj', 'uuiio', 'framework[]'),
(51, 'dnkcndls', 'qqqaa', 'framework[]'),
(52, 'as', 'rt', 'framework[]'),
(53, 'ww', 'qqqqq', 'framework[]'),
(54, 'nsabdnbs', 'ppp', 'framework[]'),
(55, 'ass', 'ass', 'framework[]'),
(56, 'sadsa', 'sad', 'framework[]'),
(57, 'sadkjh', 'sajhdjkh', 'framework[]'),
(58, 'aa', 'bb', 'framework[]'),
(59, 'ww', 'qq', 'framework[]'),
(60, 'tt', 'sad', 'framework[]'),
(61, 'a', 'b', 'framework[]'),
(62, 'q', 't', 'framework[]'),
(63, 'steven', 'dias', 'framework[]'),
(64, 'dias', 'adman', 'framework[]'),
(65, 'll', 'hjv', 'framework[]'),
(66, '', '', 'framework[]'),
(67, '', '', 'framework[]'),
(68, '', '', 'framework[]'),
(69, 'ste', '', 'framework[]'),
(70, 'asdsad', '', 'framework[]'),
(71, 'stetettetett', '', 'Array'),
(72, 'jsahd', '', ''),
(73, 'sajdbkjsa', '', ''),
(74, 'jsjlkj', '', 'Array'),
(75, 'asdsaf', '', 'Array'),
(76, 'aqs', '', 'diploma'),
(77, 'steven', '', 'diplomab.techmba'),
(78, 'adman', '', 'diplomab.techmba'),
(79, 'dias', '', 'diplomab.techmba'),
(80, 'steven', '', ''),
(81, 'asda', '', 'ID'),
(82, 'steven dias', '', 'AKTX'),
(83, '', '', 'AKTX'),
(84, 'wer', '', 'ALGA'),
(85, 'dias', '', 'CA'),
(86, 'trewt', '', 'GA'),
(87, 'merry dias', '', 'CHEST PA'),
(88, 'steven adman dias', '', 'CHEST PAGA'),
(89, 'steven1', '', 'CHEST PAAK'),
(90, 'Dias Adman Steven', '', 'CHEST PA,AK,AZ,AR'),
(91, 'steven', '', 'CO'),
(92, 'steven', '', 'steven,dias'),
(93, 'steven', '', 'dias'),
(94, 'shasj', '', 'dias'),
(95, 'steven', '', 'steven,A'),
(96, 'steven', '', 'steven,dias'),
(97, 'steven,dias', 'test', 'steven'),
(98, 'steven', 'test1', 'steven,dias'),
(99, 'steven', '', 'steven,dias'),
(100, 'steven', '', 'steven,dias'),
(101, 'steven', '', 'steven,dias'),
(102, 'steven', '', 'steven'),
(103, 'dias', '', 'dias'),
(104, 'dias', '', 'steven,dias'),
(105, 'steven', 'this is test', 'steven,dias'),
(106, 'dias', 'This is test', 'A,AB'),
(107, 'steven', 'This is test', 'steven'),
(108, 'dias', 'ABCD', 'dias,CD'),
(109, 'steven', 'ABC', 'steven,dias,CD'),
(110, 'steven', 'ASDASFASF', 'steven,CD'),
(111, 'dias', 'EEEEEEE', 'steven,DC'),
(112, 'dias', 'RRRR', 'dias,CD'),
(113, 'steven', 'UUUUU', 'CD'),
(114, 'steven', 'Array', 'steven,AB'),
(115, 'steven', 'Array', 'steven,CD'),
(116, 'dias', 'asdasd,adman', 'steven,A'),
(117, 'steven', '', 'CHEST PA,AK,AZ'),
(118, 'aaaaaa', '', 'CHEST PA,AK,AZ'),
(119, 'steven', 'aaa', 'steven,AB'),
(120, 'steven', '2 +0+2,1 +0+1', 'steven,CD'),
(121, 'steven', '', 'dias,DC'),
(122, 'steven', '', 'dias,DC'),
(123, 'dias', '2 +0+8', 'steven,CD'),
(124, 'steven', '2 +0+9', 'dias,A'),
(125, 'steven', '', 'dias,A'),
(126, 'steven', '', 'steven,A'),
(127, 'steven', '', 'steven,A'),
(128, 'dias', '2 +0+1', 'steven,AB'),
(129, 'steven', '', 'steven,DC'),
(130, 'dias', '', 'steven,A'),
(131, 'steven', '', 'CHEST PA,AK,AZ'),
(132, 'Adman', '', 'CHEST PA,AK,AZ'),
(133, 'steven', '1+1+1', 'steven'),
(134, 'AB', '1+1+1', 'steven'),
(135, 'dias', '1+1+6', 'dias'),
(136, 'CD', '1+1+6', 'dias'),
(137, 'steven', 'Array', 'steven,dias'),
(138, 'AB', 'Array', 'steven,dias'),
(139, 'steven', 'Array', 'steven,dias'),
(140, 'AB', 'Array', 'steven,dias'),
(141, 'dias', '33333,66666', 'steven,dias'),
(142, 'DC', '33333,66666', 'steven,dias'),
(143, 'dias', '64654564,77878', 'steven,dias'),
(144, 'CD', '64654564,77878', 'steven,dias'),
(145, 'dias', '64654564', 'steven,dias'),
(146, 'dias', '666,777', 'steven,dias'),
(147, 'A', '666,777', 'steven,dias');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id` int(10) NOT NULL,
  `dname` varchar(100) NOT NULL,
  `ddate` varchar(100) NOT NULL,
  `dslot` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1036 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `dname`, `ddate`, `dslot`, `status`, `user`) VALUES
(598, 'Dr. J.M.Q. Quaser Alam', '05/01/2018', '02:00PM', 'AVAILABLE', ''),
(599, 'Dr. J.M.Q. Quaser Alam', '05/01/2018', '02:15PM', 'AVAILABLE', ''),
(600, 'Dr. J.M.Q. Quaser Alam', '05/01/2018', '02:30PM', 'AVAILABLE', ''),
(601, 'Dr. J.M.Q. Quaser Alam', '05/01/2018', '02:45PM', 'AVAILABLE', ''),
(602, 'Dr. J.M.Q. Quaser Alam', '05/01/2018', '03:00PM', 'AVAILABLE', ''),
(603, 'Dr. J.M.Q. Quaser Alam', '05/01/2018', '03:15PM', 'AVAILABLE', ''),
(604, 'Dr. J.M.Q. Quaser Alam', '05/01/2018', '03:30PM', 'AVAILABLE', ''),
(605, 'Dr. J.M.Q. Quaser Alam', '05/01/2018', '03:45PM', 'AVAILABLE', ''),
(606, 'Dr. J.M.Q. Quaser Alam', '05/01/2018', '04:00PM', 'AVAILABLE', ''),
(607, 'Dr. J.M.Q. Quaser Alam', '05/01/2018', '04:15PM', 'AVAILABLE', ''),
(608, 'Dr. J.M.Q. Quaser Alam', '05/01/2018', '04:30PM', 'AVAILABLE', ''),
(609, 'Dr. J.M.Q. Quaser Alam', '05/01/2018', '04:45PM', 'AVAILABLE', ''),
(586, 'Dr. J.M.Q. Quaser Alam', '05/01/2018', '10:00AM', 'AVAILABLE', ''),
(587, 'Dr. J.M.Q. Quaser Alam', '05/01/2018', '10:15AM', 'AVAILABLE', ''),
(588, 'Dr. J.M.Q. Quaser Alam', '05/01/2018', '10:30AM', 'AVAILABLE', ''),
(589, 'Dr. J.M.Q. Quaser Alam', '05/01/2018', '10:45AM', 'AVAILABLE', ''),
(590, 'Dr. J.M.Q. Quaser Alam', '05/01/2018', '11:00AM', 'AVAILABLE', ''),
(591, 'Dr. J.M.Q. Quaser Alam', '05/01/2018', '11:15AM', 'AVAILABLE', ''),
(592, 'Dr. J.M.Q. Quaser Alam', '05/01/2018', '11:30AM', 'AVAILABLE', ''),
(593, 'Dr. J.M.Q. Quaser Alam', '05/01/2018', '11:45AM', 'AVAILABLE', ''),
(594, 'Dr. J.M.Q. Quaser Alam', '05/01/2018', '12:00PM', 'AVAILABLE', ''),
(595, 'Dr. J.M.Q. Quaser Alam', '05/01/2018', '12:15PM', 'AVAILABLE', ''),
(596, 'Dr. J.M.Q. Quaser Alam', '05/01/2018', '12:30PM', 'AVAILABLE', ''),
(597, 'Dr. J.M.Q. Quaser Alam', '05/01/2018', '12:45PM', 'AVAILABLE', ''),
(264, 'Dr. J.M.Q. Quaser Alam', '05/21/2018', '02:00PM', 'AVAILABLE', ''),
(265, 'Dr. J.M.Q. Quaser Alam', '05/21/2018', '02:15PM', 'AVAILABLE', ''),
(266, 'Dr. J.M.Q. Quaser Alam', '05/21/2018', '02:30PM', 'AVAILABLE', ''),
(267, 'Dr. J.M.Q. Quaser Alam', '05/21/2018', '02:45PM', 'AVAILABLE', ''),
(268, 'Dr. J.M.Q. Quaser Alam', '05/21/2018', '03:00PM', 'AVAILABLE', ''),
(269, 'Dr. J.M.Q. Quaser Alam', '05/21/2018', '03:15PM', 'AVAILABLE', ''),
(270, 'Dr. J.M.Q. Quaser Alam', '05/21/2018', '03:30PM', 'AVAILABLE', ''),
(271, 'Dr. J.M.Q. Quaser Alam', '05/21/2018', '03:45PM', 'AVAILABLE', ''),
(272, 'Dr. J.M.Q. Quaser Alam', '05/21/2018', '04:00PM', 'AVAILABLE', ''),
(273, 'Dr. J.M.Q. Quaser Alam', '05/21/2018', '04:15PM', 'AVAILABLE', ''),
(274, 'Dr. J.M.Q. Quaser Alam', '05/21/2018', '04:30PM', 'AVAILABLE', ''),
(275, 'Dr. J.M.Q. Quaser Alam', '05/21/2018', '04:45PM', 'AVAILABLE', ''),
(254, 'Dr. J.M.Q. Quaser Alam', '05/21/2018', '10:30AM', 'NOT AVAILABLE', ''),
(255, 'Dr. J.M.Q. Quaser Alam', '05/21/2018', '10:45AM', 'NOT AVAILABLE', ''),
(256, 'Dr. J.M.Q. Quaser Alam', '05/21/2018', '11:00AM', 'NOT AVAILABLE', ''),
(257, 'Dr. J.M.Q. Quaser Alam', '05/21/2018', '11:15AM', 'NOT AVAILABLE', ''),
(258, 'Dr. J.M.Q. Quaser Alam', '05/21/2018', '11:30AM', 'NOT AVAILABLE', ''),
(259, 'Dr. J.M.Q. Quaser Alam', '05/21/2018', '11:45AM', 'NOT AVAILABLE', ''),
(260, 'Dr. J.M.Q. Quaser Alam', '05/21/2018', '12:00PM', 'AVAILABLE', ''),
(261, 'Dr. J.M.Q. Quaser Alam', '05/21/2018', '12:15PM', 'AVAILABLE', ''),
(262, 'Dr. J.M.Q. Quaser Alam', '05/21/2018', '12:30PM', 'AVAILABLE', ''),
(263, 'Dr. J.M.Q. Quaser Alam', '05/21/2018', '12:45PM', 'AVAILABLE', ''),
(288, 'Dr. J.M.Q. Quaser Alam', '05/22/2018', '02:00PM', 'AVAILABLE', ''),
(289, 'Dr. J.M.Q. Quaser Alam', '05/22/2018', '02:15PM', 'AVAILABLE', ''),
(290, 'Dr. J.M.Q. Quaser Alam', '05/22/2018', '02:30PM', 'AVAILABLE', ''),
(291, 'Dr. J.M.Q. Quaser Alam', '05/22/2018', '02:45PM', 'AVAILABLE', ''),
(292, 'Dr. J.M.Q. Quaser Alam', '05/22/2018', '03:00PM', 'AVAILABLE', ''),
(293, 'Dr. J.M.Q. Quaser Alam', '05/22/2018', '03:15PM', 'AVAILABLE', ''),
(294, 'Dr. J.M.Q. Quaser Alam', '05/22/2018', '03:30PM', 'AVAILABLE', ''),
(295, 'Dr. J.M.Q. Quaser Alam', '05/22/2018', '03:45PM', 'AVAILABLE', ''),
(296, 'Dr. J.M.Q. Quaser Alam', '05/22/2018', '04:00PM', 'AVAILABLE', ''),
(297, 'Dr. J.M.Q. Quaser Alam', '05/22/2018', '04:15PM', 'AVAILABLE', ''),
(298, 'Dr. J.M.Q. Quaser Alam', '05/22/2018', '04:30PM', 'AVAILABLE', ''),
(299, 'Dr. J.M.Q. Quaser Alam', '05/22/2018', '04:45PM', 'AVAILABLE', ''),
(276, 'Dr. J.M.Q. Quaser Alam', '05/22/2018', '10:00AM', 'NOT AVAILABLE', ''),
(277, 'Dr. J.M.Q. Quaser Alam', '05/22/2018', '10:15AM', 'NOT AVAILABLE', ''),
(278, 'Dr. J.M.Q. Quaser Alam', '05/22/2018', '10:30AM', 'NOT AVAILABLE', ''),
(279, 'Dr. J.M.Q. Quaser Alam', '05/22/2018', '10:45AM', 'NOT AVAILABLE', ''),
(280, 'Dr. J.M.Q. Quaser Alam', '05/22/2018', '11:00AM', 'NOT AVAILABLE', ''),
(281, 'Dr. J.M.Q. Quaser Alam', '05/22/2018', '11:15AM', 'NOT AVAILABLE', ''),
(282, 'Dr. J.M.Q. Quaser Alam', '05/22/2018', '11:30AM', 'NOT AVAILABLE', ''),
(283, 'Dr. J.M.Q. Quaser Alam', '05/22/2018', '11:45AM', 'NOT AVAILABLE', ''),
(284, 'Dr. J.M.Q. Quaser Alam', '05/22/2018', '12:00PM', 'Booked', ''),
(285, 'Dr. J.M.Q. Quaser Alam', '05/22/2018', '12:15PM', 'AVAILABLE', ''),
(286, 'Dr. J.M.Q. Quaser Alam', '05/22/2018', '12:30PM', 'AVAILABLE', ''),
(287, 'Dr. J.M.Q. Quaser Alam', '05/22/2018', '12:45PM', 'AVAILABLE', ''),
(416, 'Dr. J.M.Q. Quaser Alam', '05/26/2018', '02:00PM', 'AVAILABLE', ''),
(417, 'Dr. J.M.Q. Quaser Alam', '05/26/2018', '02:15PM', 'AVAILABLE', ''),
(418, 'Dr. J.M.Q. Quaser Alam', '05/26/2018', '02:30PM', 'AVAILABLE', ''),
(419, 'Dr. J.M.Q. Quaser Alam', '05/26/2018', '02:45PM', 'AVAILABLE', ''),
(420, 'Dr. J.M.Q. Quaser Alam', '05/26/2018', '03:00PM', 'AVAILABLE', ''),
(421, 'Dr. J.M.Q. Quaser Alam', '05/26/2018', '03:15PM', 'AVAILABLE', ''),
(422, 'Dr. J.M.Q. Quaser Alam', '05/26/2018', '03:30PM', 'AVAILABLE', ''),
(423, 'Dr. J.M.Q. Quaser Alam', '05/26/2018', '03:45PM', 'AVAILABLE', ''),
(424, 'Dr. J.M.Q. Quaser Alam', '05/26/2018', '04:00PM', 'AVAILABLE', ''),
(425, 'Dr. J.M.Q. Quaser Alam', '05/26/2018', '04:15PM', 'AVAILABLE', ''),
(426, 'Dr. J.M.Q. Quaser Alam', '05/26/2018', '04:30PM', 'AVAILABLE', ''),
(427, 'Dr. J.M.Q. Quaser Alam', '05/26/2018', '04:45PM', 'AVAILABLE', ''),
(404, 'Dr. J.M.Q. Quaser Alam', '05/26/2018', '10:00AM', 'AVAILABLE', ''),
(405, 'Dr. J.M.Q. Quaser Alam', '05/26/2018', '10:15AM', 'AVAILABLE', ''),
(406, 'Dr. J.M.Q. Quaser Alam', '05/26/2018', '10:30AM', 'AVAILABLE', ''),
(407, 'Dr. J.M.Q. Quaser Alam', '05/26/2018', '10:45AM', 'AVAILABLE', ''),
(408, 'Dr. J.M.Q. Quaser Alam', '05/26/2018', '11:00AM', 'AVAILABLE', ''),
(409, 'Dr. J.M.Q. Quaser Alam', '05/26/2018', '11:15AM', 'AVAILABLE', ''),
(410, 'Dr. J.M.Q. Quaser Alam', '05/26/2018', '11:30AM', 'AVAILABLE', ''),
(411, 'Dr. J.M.Q. Quaser Alam', '05/26/2018', '11:45AM', 'AVAILABLE', ''),
(412, 'Dr. J.M.Q. Quaser Alam', '05/26/2018', '12:00PM', 'AVAILABLE', ''),
(413, 'Dr. J.M.Q. Quaser Alam', '05/26/2018', '12:15PM', 'AVAILABLE', ''),
(414, 'Dr. J.M.Q. Quaser Alam', '05/26/2018', '12:30PM', 'AVAILABLE', ''),
(415, 'Dr. J.M.Q. Quaser Alam', '05/26/2018', '12:45PM', 'AVAILABLE', ''),
(441, 'Dr. J.M.Q. Quaser Alam', '05/30/2018', '02:00PM', 'AVAILABLE', ''),
(442, 'Dr. J.M.Q. Quaser Alam', '05/30/2018', '02:15PM', 'AVAILABLE', ''),
(443, 'Dr. J.M.Q. Quaser Alam', '05/30/2018', '02:30PM', 'AVAILABLE', ''),
(444, 'Dr. J.M.Q. Quaser Alam', '05/30/2018', '02:45PM', 'AVAILABLE', ''),
(445, 'Dr. J.M.Q. Quaser Alam', '05/30/2018', '03:00PM', 'AVAILABLE', ''),
(446, 'Dr. J.M.Q. Quaser Alam', '05/30/2018', '03:15PM', 'AVAILABLE', ''),
(447, 'Dr. J.M.Q. Quaser Alam', '05/30/2018', '03:30PM', 'AVAILABLE', ''),
(448, 'Dr. J.M.Q. Quaser Alam', '05/30/2018', '03:45PM', 'AVAILABLE', ''),
(449, 'Dr. J.M.Q. Quaser Alam', '05/30/2018', '04:00PM', 'AVAILABLE', ''),
(450, 'Dr. J.M.Q. Quaser Alam', '05/30/2018', '04:15PM', 'AVAILABLE', ''),
(451, 'Dr. J.M.Q. Quaser Alam', '05/30/2018', '04:30PM', 'AVAILABLE', ''),
(452, 'Dr. J.M.Q. Quaser Alam', '05/30/2018', '04:45PM', 'AVAILABLE', ''),
(429, 'Dr. J.M.Q. Quaser Alam', '05/30/2018', '10:00AM', 'AVAILABLE', ''),
(430, 'Dr. J.M.Q. Quaser Alam', '05/30/2018', '10:15AM', 'AVAILABLE', ''),
(431, 'Dr. J.M.Q. Quaser Alam', '05/30/2018', '10:30AM', 'AVAILABLE', ''),
(432, 'Dr. J.M.Q. Quaser Alam', '05/30/2018', '10:45AM', 'AVAILABLE', ''),
(433, 'Dr. J.M.Q. Quaser Alam', '05/30/2018', '11:00AM', 'AVAILABLE', ''),
(434, 'Dr. J.M.Q. Quaser Alam', '05/30/2018', '11:15AM', 'AVAILABLE', ''),
(435, 'Dr. J.M.Q. Quaser Alam', '05/30/2018', '11:30AM', 'AVAILABLE', ''),
(436, 'Dr. J.M.Q. Quaser Alam', '05/30/2018', '11:45AM', 'AVAILABLE', ''),
(437, 'Dr. J.M.Q. Quaser Alam', '05/30/2018', '12:00PM', 'AVAILABLE', ''),
(438, 'Dr. J.M.Q. Quaser Alam', '05/30/2018', '12:15PM', 'AVAILABLE', ''),
(439, 'Dr. J.M.Q. Quaser Alam', '05/30/2018', '12:30PM', 'AVAILABLE', ''),
(440, 'Dr. J.M.Q. Quaser Alam', '05/30/2018', '12:45PM', 'AVAILABLE', ''),
(492, 'Dr. J.M.Q. Quaser Alam', '05/31/2018', '02:00PM', 'AVAILABLE', ''),
(493, 'Dr. J.M.Q. Quaser Alam', '05/31/2018', '02:15PM', 'AVAILABLE', ''),
(494, 'Dr. J.M.Q. Quaser Alam', '05/31/2018', '02:30PM', 'AVAILABLE', ''),
(495, 'Dr. J.M.Q. Quaser Alam', '05/31/2018', '02:45PM', 'AVAILABLE', ''),
(496, 'Dr. J.M.Q. Quaser Alam', '05/31/2018', '03:00PM', 'AVAILABLE', ''),
(497, 'Dr. J.M.Q. Quaser Alam', '05/31/2018', '03:15PM', 'AVAILABLE', ''),
(498, 'Dr. J.M.Q. Quaser Alam', '05/31/2018', '03:30PM', 'AVAILABLE', ''),
(499, 'Dr. J.M.Q. Quaser Alam', '05/31/2018', '03:45PM', 'AVAILABLE', ''),
(500, 'Dr. J.M.Q. Quaser Alam', '05/31/2018', '04:00PM', 'AVAILABLE', ''),
(501, 'Dr. J.M.Q. Quaser Alam', '05/31/2018', '04:15PM', 'AVAILABLE', ''),
(502, 'Dr. J.M.Q. Quaser Alam', '05/31/2018', '04:30PM', 'AVAILABLE', ''),
(503, 'Dr. J.M.Q. Quaser Alam', '05/31/2018', '04:45PM', 'AVAILABLE', ''),
(480, 'Dr. J.M.Q. Quaser Alam', '05/31/2018', '10:00AM', 'NOT AVAILABLE', ''),
(481, 'Dr. J.M.Q. Quaser Alam', '05/31/2018', '10:15AM', 'NOT AVAILABLE', ''),
(482, 'Dr. J.M.Q. Quaser Alam', '05/31/2018', '10:30AM', 'NOT AVAILABLE', ''),
(483, 'Dr. J.M.Q. Quaser Alam', '05/31/2018', '10:45AM', 'NOT AVAILABLE', ''),
(484, 'Dr. J.M.Q. Quaser Alam', '05/31/2018', '11:00AM', 'NOT AVAILABLE', ''),
(485, 'Dr. J.M.Q. Quaser Alam', '05/31/2018', '11:15AM', 'NOT AVAILABLE', ''),
(486, 'Dr. J.M.Q. Quaser Alam', '05/31/2018', '11:30AM', 'NOT AVAILABLE', ''),
(487, 'Dr. J.M.Q. Quaser Alam', '05/31/2018', '11:45AM', 'NOT AVAILABLE', ''),
(488, 'Dr. J.M.Q. Quaser Alam', '05/31/2018', '12:00PM', 'AVAILABLE', ''),
(489, 'Dr. J.M.Q. Quaser Alam', '05/31/2018', '12:15PM', 'AVAILABLE', ''),
(490, 'Dr. J.M.Q. Quaser Alam', '05/31/2018', '12:30PM', 'AVAILABLE', ''),
(491, 'Dr. J.M.Q. Quaser Alam', '05/31/2018', '12:45PM', 'AVAILABLE', ''),
(569, 'Dr. J.M.Q. Quaser Alam', '06/02/2018', '02:00PM', 'AVAILABLE', ''),
(570, 'Dr. J.M.Q. Quaser Alam', '06/02/2018', '02:15PM', 'NOT AVAILABLE', ''),
(571, 'Dr. J.M.Q. Quaser Alam', '06/02/2018', '02:30PM', 'NOT AVAILABLE', ''),
(572, 'Dr. J.M.Q. Quaser Alam', '06/02/2018', '02:45PM', 'NOT AVAILABLE', ''),
(573, 'Dr. J.M.Q. Quaser Alam', '06/02/2018', '03:00PM', 'NOT AVAILABLE', ''),
(574, 'Dr. J.M.Q. Quaser Alam', '06/02/2018', '03:15PM', 'NOT AVAILABLE', ''),
(575, 'Dr. J.M.Q. Quaser Alam', '06/02/2018', '03:30PM', 'NOT AVAILABLE', ''),
(576, 'Dr. J.M.Q. Quaser Alam', '06/02/2018', '03:45PM', 'NOT AVAILABLE', ''),
(577, 'Dr. J.M.Q. Quaser Alam', '06/02/2018', '04:00PM', 'AVAILABLE', ''),
(578, 'Dr. J.M.Q. Quaser Alam', '06/02/2018', '04:15PM', 'AVAILABLE', ''),
(579, 'Dr. J.M.Q. Quaser Alam', '06/02/2018', '04:30PM', 'AVAILABLE', ''),
(580, 'Dr. J.M.Q. Quaser Alam', '06/02/2018', '04:45PM', 'AVAILABLE', ''),
(557, 'Dr. J.M.Q. Quaser Alam', '06/02/2018', '10:00AM', 'Booked', ''),
(558, 'Dr. J.M.Q. Quaser Alam', '06/02/2018', '10:15AM', 'Booked', ''),
(559, 'Dr. J.M.Q. Quaser Alam', '06/02/2018', '10:30AM', 'Booked', ''),
(560, 'Dr. J.M.Q. Quaser Alam', '06/02/2018', '10:45AM', 'Booked', ''),
(561, 'Dr. J.M.Q. Quaser Alam', '06/02/2018', '11:00AM', 'Booked', ''),
(562, 'Dr. J.M.Q. Quaser Alam', '06/02/2018', '11:15AM', 'Booked', ''),
(563, 'Dr. J.M.Q. Quaser Alam', '06/02/2018', '11:30AM', 'Booked', ''),
(564, 'Dr. J.M.Q. Quaser Alam', '06/02/2018', '11:45AM', 'Booked', ''),
(565, 'Dr. J.M.Q. Quaser Alam', '06/02/2018', '12:00PM', 'Booked', ''),
(566, 'Dr. J.M.Q. Quaser Alam', '06/02/2018', '12:15PM', 'Booked', ''),
(567, 'Dr. J.M.Q. Quaser Alam', '06/02/2018', '12:30PM', 'Booked', ''),
(568, 'Dr. J.M.Q. Quaser Alam', '06/02/2018', '12:45PM', 'AVAILABLE', ''),
(738, 'Dr. J.M.Q. Quaser Alam', '07/07/2018', '10:00AM', 'AVAILABLE', ''),
(753, 'Dr. J.M.Q. Quaser Alam', '07/14/2018', '02:00PM', 'AVAILABLE', ''),
(754, 'Dr. J.M.Q. Quaser Alam', '07/14/2018', '02:15PM', 'NOT AVAILABLE', ''),
(755, 'Dr. J.M.Q. Quaser Alam', '07/14/2018', '02:30PM', 'NOT AVAILABLE', ''),
(756, 'Dr. J.M.Q. Quaser Alam', '07/14/2018', '02:45PM', 'NOT AVAILABLE', ''),
(757, 'Dr. J.M.Q. Quaser Alam', '07/14/2018', '03:00PM', 'AVAILABLE', ''),
(758, 'Dr. J.M.Q. Quaser Alam', '07/14/2018', '03:15PM', 'AVAILABLE', ''),
(759, 'Dr. J.M.Q. Quaser Alam', '07/14/2018', '03:30PM', 'AVAILABLE', ''),
(760, 'Dr. J.M.Q. Quaser Alam', '07/14/2018', '03:45PM', 'AVAILABLE', ''),
(761, 'Dr. J.M.Q. Quaser Alam', '07/14/2018', '04:00PM', 'AVAILABLE', ''),
(762, 'Dr. J.M.Q. Quaser Alam', '07/14/2018', '04:15PM', 'AVAILABLE', ''),
(763, 'Dr. J.M.Q. Quaser Alam', '07/14/2018', '04:30PM', 'AVAILABLE', ''),
(764, 'Dr. J.M.Q. Quaser Alam', '07/14/2018', '04:45PM', 'AVAILABLE', ''),
(741, 'Dr. J.M.Q. Quaser Alam', '07/14/2018', '10:00AM', 'NOT AVAILABLE', ''),
(742, 'Dr. J.M.Q. Quaser Alam', '07/14/2018', '10:15AM', 'NOT AVAILABLE', ''),
(743, 'Dr. J.M.Q. Quaser Alam', '07/14/2018', '10:30AM', 'NOT AVAILABLE', ''),
(744, 'Dr. J.M.Q. Quaser Alam', '07/14/2018', '10:45AM', 'NOT AVAILABLE', ''),
(745, 'Dr. J.M.Q. Quaser Alam', '07/14/2018', '11:00AM', 'NOT AVAILABLE', ''),
(746, 'Dr. J.M.Q. Quaser Alam', '07/14/2018', '11:15AM', 'NOT AVAILABLE', ''),
(747, 'Dr. J.M.Q. Quaser Alam', '07/14/2018', '11:30AM', 'NOT AVAILABLE', ''),
(748, 'Dr. J.M.Q. Quaser Alam', '07/14/2018', '11:45AM', 'NOT AVAILABLE', ''),
(749, 'Dr. J.M.Q. Quaser Alam', '07/14/2018', '12:00PM', 'NOT AVAILABLE', ''),
(750, 'Dr. J.M.Q. Quaser Alam', '07/14/2018', '12:15PM', 'NOT AVAILABLE', ''),
(751, 'Dr. J.M.Q. Quaser Alam', '07/14/2018', '12:30PM', 'NOT AVAILABLE', ''),
(752, 'Dr. J.M.Q. Quaser Alam', '07/14/2018', '12:45PM', 'NOT AVAILABLE', ''),
(312, 'Dr. Rajeeb Hassan', '05/23/2018', '02:00PM', 'AVAILABLE', ''),
(313, 'Dr. Rajeeb Hassan', '05/23/2018', '02:15PM', 'AVAILABLE', ''),
(314, 'Dr. Rajeeb Hassan', '05/23/2018', '02:30PM', 'AVAILABLE', ''),
(315, 'Dr. Rajeeb Hassan', '05/23/2018', '02:45PM', 'AVAILABLE', ''),
(316, 'Dr. Rajeeb Hassan', '05/23/2018', '03:00PM', 'AVAILABLE', ''),
(317, 'Dr. Rajeeb Hassan', '05/23/2018', '03:15PM', 'AVAILABLE', ''),
(318, 'Dr. Rajeeb Hassan', '05/23/2018', '03:30PM', 'AVAILABLE', ''),
(319, 'Dr. Rajeeb Hassan', '05/23/2018', '03:45PM', 'AVAILABLE', ''),
(320, 'Dr. Rajeeb Hassan', '05/23/2018', '04:00PM', 'AVAILABLE', ''),
(321, 'Dr. Rajeeb Hassan', '05/23/2018', '04:15PM', 'AVAILABLE', ''),
(322, 'Dr. Rajeeb Hassan', '05/23/2018', '04:30PM', 'AVAILABLE', ''),
(323, 'Dr. Rajeeb Hassan', '05/23/2018', '04:45PM', 'AVAILABLE', ''),
(300, 'Dr. Rajeeb Hassan', '05/23/2018', '10:00AM', 'AVAILABLE', ''),
(301, 'Dr. Rajeeb Hassan', '05/23/2018', '10:15AM', 'AVAILABLE', ''),
(302, 'Dr. Rajeeb Hassan', '05/23/2018', '10:30AM', 'AVAILABLE', ''),
(303, 'Dr. Rajeeb Hassan', '05/23/2018', '10:45AM', 'AVAILABLE', ''),
(304, 'Dr. Rajeeb Hassan', '05/23/2018', '11:00AM', 'AVAILABLE', ''),
(305, 'Dr. Rajeeb Hassan', '05/23/2018', '11:15AM', 'AVAILABLE', ''),
(306, 'Dr. Rajeeb Hassan', '05/23/2018', '11:30AM', 'AVAILABLE', ''),
(307, 'Dr. Rajeeb Hassan', '05/23/2018', '11:45AM', 'AVAILABLE', ''),
(308, 'Dr. Rajeeb Hassan', '05/23/2018', '12:00PM', 'AVAILABLE', ''),
(309, 'Dr. Rajeeb Hassan', '05/23/2018', '12:15PM', 'AVAILABLE', ''),
(310, 'Dr. Rajeeb Hassan', '05/23/2018', '12:30PM', 'AVAILABLE', ''),
(311, 'Dr. Rajeeb Hassan', '05/23/2018', '12:45PM', 'AVAILABLE', ''),
(341, 'Dr. Rajeeb Hassan', '05/24/2018', '02:00PM', 'AVAILABLE', ''),
(342, 'Dr. Rajeeb Hassan', '05/24/2018', '02:15PM', 'AVAILABLE', ''),
(343, 'Dr. Rajeeb Hassan', '05/24/2018', '02:30PM', 'AVAILABLE', ''),
(344, 'Dr. Rajeeb Hassan', '05/24/2018', '02:45PM', 'AVAILABLE', ''),
(345, 'Dr. Rajeeb Hassan', '05/24/2018', '03:00PM', 'AVAILABLE', ''),
(346, 'Dr. Rajeeb Hassan', '05/24/2018', '03:15PM', 'AVAILABLE', ''),
(347, 'Dr. Rajeeb Hassan', '05/24/2018', '03:30PM', 'AVAILABLE', ''),
(348, 'Dr. Rajeeb Hassan', '05/24/2018', '03:45PM', 'AVAILABLE', ''),
(349, 'Dr. Rajeeb Hassan', '05/24/2018', '04:00PM', 'AVAILABLE', ''),
(350, 'Dr. Rajeeb Hassan', '05/24/2018', '04:15PM', 'AVAILABLE', ''),
(351, 'Dr. Rajeeb Hassan', '05/24/2018', '04:30PM', 'AVAILABLE', ''),
(352, 'Dr. Rajeeb Hassan', '05/24/2018', '04:45PM', 'AVAILABLE', ''),
(329, 'Dr. Rajeeb Hassan', '05/24/2018', '10:00AM', 'AVAILABLE', ''),
(330, 'Dr. Rajeeb Hassan', '05/24/2018', '10:15AM', 'AVAILABLE', ''),
(331, 'Dr. Rajeeb Hassan', '05/24/2018', '10:30AM', 'AVAILABLE', ''),
(332, 'Dr. Rajeeb Hassan', '05/24/2018', '10:45AM', 'AVAILABLE', ''),
(333, 'Dr. Rajeeb Hassan', '05/24/2018', '11:00AM', 'AVAILABLE', ''),
(334, 'Dr. Rajeeb Hassan', '05/24/2018', '11:15AM', 'AVAILABLE', ''),
(335, 'Dr. Rajeeb Hassan', '05/24/2018', '11:30AM', 'AVAILABLE', ''),
(336, 'Dr. Rajeeb Hassan', '05/24/2018', '11:45AM', 'AVAILABLE', ''),
(337, 'Dr. Rajeeb Hassan', '05/24/2018', '12:00PM', 'AVAILABLE', ''),
(338, 'Dr. Rajeeb Hassan', '05/24/2018', '12:15PM', 'AVAILABLE', ''),
(339, 'Dr. Rajeeb Hassan', '05/24/2018', '12:30PM', 'AVAILABLE', ''),
(340, 'Dr. Rajeeb Hassan', '05/24/2018', '12:45PM', 'AVAILABLE', ''),
(855, 'Dr. Rajeeb Hassan', '05/26/2018', '02:00PM', 'AVAILABLE', ''),
(856, 'Dr. Rajeeb Hassan', '05/26/2018', '02:15PM', 'AVAILABLE', ''),
(857, 'Dr. Rajeeb Hassan', '05/26/2018', '02:30PM', 'AVAILABLE', ''),
(858, 'Dr. Rajeeb Hassan', '05/26/2018', '02:45PM', 'AVAILABLE', ''),
(859, 'Dr. Rajeeb Hassan', '05/26/2018', '03:00PM', 'AVAILABLE', ''),
(860, 'Dr. Rajeeb Hassan', '05/26/2018', '03:15PM', 'AVAILABLE', ''),
(861, 'Dr. Rajeeb Hassan', '05/26/2018', '03:30PM', 'AVAILABLE', ''),
(862, 'Dr. Rajeeb Hassan', '05/26/2018', '03:45PM', 'AVAILABLE', ''),
(863, 'Dr. Rajeeb Hassan', '05/26/2018', '04:00PM', 'AVAILABLE', ''),
(864, 'Dr. Rajeeb Hassan', '05/26/2018', '04:15PM', 'AVAILABLE', ''),
(865, 'Dr. Rajeeb Hassan', '05/26/2018', '04:30PM', 'AVAILABLE', ''),
(866, 'Dr. Rajeeb Hassan', '05/26/2018', '04:45PM', 'AVAILABLE', ''),
(843, 'Dr. Rajeeb Hassan', '05/26/2018', '10:00AM', 'Booked', ''),
(844, 'Dr. Rajeeb Hassan', '05/26/2018', '10:15AM', 'Booked', ''),
(845, 'Dr. Rajeeb Hassan', '05/26/2018', '10:30AM', 'Booked', ''),
(846, 'Dr. Rajeeb Hassan', '05/26/2018', '10:45AM', 'AVAILABLE', ''),
(847, 'Dr. Rajeeb Hassan', '05/26/2018', '11:00AM', 'AVAILABLE', ''),
(848, 'Dr. Rajeeb Hassan', '05/26/2018', '11:15AM', 'AVAILABLE', ''),
(849, 'Dr. Rajeeb Hassan', '05/26/2018', '11:30AM', 'AVAILABLE', ''),
(850, 'Dr. Rajeeb Hassan', '05/26/2018', '11:45AM', 'AVAILABLE', ''),
(851, 'Dr. Rajeeb Hassan', '05/26/2018', '12:00PM', 'AVAILABLE', ''),
(852, 'Dr. Rajeeb Hassan', '05/26/2018', '12:15PM', 'AVAILABLE', ''),
(853, 'Dr. Rajeeb Hassan', '05/26/2018', '12:30PM', 'AVAILABLE', ''),
(854, 'Dr. Rajeeb Hassan', '05/26/2018', '12:45PM', 'AVAILABLE', ''),
(903, 'Dr. Rajeeb Hassan', '05/27/2018', '02:00PM', 'AVAILABLE', ''),
(904, 'Dr. Rajeeb Hassan', '05/27/2018', '02:15PM', 'AVAILABLE', ''),
(905, 'Dr. Rajeeb Hassan', '05/27/2018', '02:30PM', 'AVAILABLE', ''),
(906, 'Dr. Rajeeb Hassan', '05/27/2018', '02:45PM', 'AVAILABLE', ''),
(907, 'Dr. Rajeeb Hassan', '05/27/2018', '03:00PM', 'AVAILABLE', ''),
(908, 'Dr. Rajeeb Hassan', '05/27/2018', '03:15PM', 'AVAILABLE', ''),
(909, 'Dr. Rajeeb Hassan', '05/27/2018', '03:30PM', 'AVAILABLE', ''),
(910, 'Dr. Rajeeb Hassan', '05/27/2018', '03:45PM', 'AVAILABLE', ''),
(911, 'Dr. Rajeeb Hassan', '05/27/2018', '04:00PM', 'AVAILABLE', ''),
(912, 'Dr. Rajeeb Hassan', '05/27/2018', '04:15PM', 'AVAILABLE', ''),
(913, 'Dr. Rajeeb Hassan', '05/27/2018', '04:30PM', 'AVAILABLE', ''),
(914, 'Dr. Rajeeb Hassan', '05/27/2018', '04:45PM', 'AVAILABLE', ''),
(891, 'Dr. Rajeeb Hassan', '05/27/2018', '10:00AM', 'Booked', ''),
(892, 'Dr. Rajeeb Hassan', '05/27/2018', '10:15AM', 'AVAILABLE', ''),
(893, 'Dr. Rajeeb Hassan', '05/27/2018', '10:30AM', 'AVAILABLE', ''),
(894, 'Dr. Rajeeb Hassan', '05/27/2018', '10:45AM', 'AVAILABLE', ''),
(895, 'Dr. Rajeeb Hassan', '05/27/2018', '11:00AM', 'AVAILABLE', ''),
(896, 'Dr. Rajeeb Hassan', '05/27/2018', '11:15AM', 'AVAILABLE', ''),
(897, 'Dr. Rajeeb Hassan', '05/27/2018', '11:30AM', 'AVAILABLE', ''),
(898, 'Dr. Rajeeb Hassan', '05/27/2018', '11:45AM', 'AVAILABLE', ''),
(899, 'Dr. Rajeeb Hassan', '05/27/2018', '12:00PM', 'AVAILABLE', ''),
(900, 'Dr. Rajeeb Hassan', '05/27/2018', '12:15PM', 'AVAILABLE', ''),
(901, 'Dr. Rajeeb Hassan', '05/27/2018', '12:30PM', 'AVAILABLE', ''),
(902, 'Dr. Rajeeb Hassan', '05/27/2018', '12:45PM', 'AVAILABLE', ''),
(975, 'Dr. Rajeeb Hassan', '05/28/2018', '02:00PM', 'Booked', 'clinical'),
(976, 'Dr. Rajeeb Hassan', '05/28/2018', '02:15PM', 'AVAILABLE', 'clinical'),
(977, 'Dr. Rajeeb Hassan', '05/28/2018', '02:30PM', 'AVAILABLE', 'clinical'),
(978, 'Dr. Rajeeb Hassan', '05/28/2018', '02:45PM', 'Booked', 'clinical'),
(979, 'Dr. Rajeeb Hassan', '05/28/2018', '03:00PM', 'AVAILABLE', 'clinical'),
(980, 'Dr. Rajeeb Hassan', '05/28/2018', '03:15PM', 'AVAILABLE', 'clinical'),
(981, 'Dr. Rajeeb Hassan', '05/28/2018', '03:30PM', 'Booked', 'clinical'),
(982, 'Dr. Rajeeb Hassan', '05/28/2018', '03:45PM', 'AVAILABLE', 'clinical'),
(983, 'Dr. Rajeeb Hassan', '05/28/2018', '04:00PM', 'AVAILABLE', 'clinical'),
(984, 'Dr. Rajeeb Hassan', '05/28/2018', '04:15PM', 'AVAILABLE', 'clinical'),
(985, 'Dr. Rajeeb Hassan', '05/28/2018', '04:30PM', 'AVAILABLE', 'clinical'),
(986, 'Dr. Rajeeb Hassan', '05/28/2018', '04:45PM', 'AVAILABLE', 'clinical'),
(963, 'Dr. Rajeeb Hassan', '05/28/2018', '10:00AM', 'Booked', 'clinical'),
(964, 'Dr. Rajeeb Hassan', '05/28/2018', '10:15AM', 'AVAILABLE', 'clinical'),
(965, 'Dr. Rajeeb Hassan', '05/28/2018', '10:30AM', 'AVAILABLE', 'clinical'),
(966, 'Dr. Rajeeb Hassan', '05/28/2018', '10:45AM', 'AVAILABLE', 'clinical'),
(967, 'Dr. Rajeeb Hassan', '05/28/2018', '11:00AM', 'AVAILABLE', 'clinical'),
(968, 'Dr. Rajeeb Hassan', '05/28/2018', '11:15AM', 'AVAILABLE', 'clinical'),
(969, 'Dr. Rajeeb Hassan', '05/28/2018', '11:30AM', 'AVAILABLE', 'clinical'),
(970, 'Dr. Rajeeb Hassan', '05/28/2018', '11:45AM', 'AVAILABLE', 'clinical'),
(971, 'Dr. Rajeeb Hassan', '05/28/2018', '12:00PM', 'AVAILABLE', 'clinical'),
(972, 'Dr. Rajeeb Hassan', '05/28/2018', '12:15PM', 'AVAILABLE', 'clinical'),
(973, 'Dr. Rajeeb Hassan', '05/28/2018', '12:30PM', 'AVAILABLE', 'clinical'),
(974, 'Dr. Rajeeb Hassan', '05/28/2018', '12:45PM', 'AVAILABLE', 'clinical'),
(999, 'Dr. Rajeeb Hassan', '05/29/2018', '02:00PM', 'AVAILABLE', 'c01'),
(1000, 'Dr. Rajeeb Hassan', '05/29/2018', '02:15PM', 'AVAILABLE', 'c01'),
(1001, 'Dr. Rajeeb Hassan', '05/29/2018', '02:30PM', 'Booked', 'c01'),
(1002, 'Dr. Rajeeb Hassan', '05/29/2018', '02:45PM', 'AVAILABLE', 'c01'),
(1003, 'Dr. Rajeeb Hassan', '05/29/2018', '03:00PM', 'AVAILABLE', 'c01'),
(1004, 'Dr. Rajeeb Hassan', '05/29/2018', '03:15PM', 'AVAILABLE', 'c01'),
(1005, 'Dr. Rajeeb Hassan', '05/29/2018', '03:30PM', 'AVAILABLE', 'c01'),
(1006, 'Dr. Rajeeb Hassan', '05/29/2018', '03:45PM', 'AVAILABLE', 'c01'),
(1007, 'Dr. Rajeeb Hassan', '05/29/2018', '04:00PM', 'AVAILABLE', 'c01'),
(1008, 'Dr. Rajeeb Hassan', '05/29/2018', '04:15PM', 'AVAILABLE', 'c01'),
(1009, 'Dr. Rajeeb Hassan', '05/29/2018', '04:30PM', 'AVAILABLE', 'c01'),
(1010, 'Dr. Rajeeb Hassan', '05/29/2018', '04:45PM', 'AVAILABLE', 'c01'),
(987, 'Dr. Rajeeb Hassan', '05/29/2018', '10:00AM', 'Booked', 'c01'),
(988, 'Dr. Rajeeb Hassan', '05/29/2018', '10:15AM', 'Booked', 'c01'),
(989, 'Dr. Rajeeb Hassan', '05/29/2018', '10:30AM', 'Booked', 'c01'),
(990, 'Dr. Rajeeb Hassan', '05/29/2018', '10:45AM', 'AVAILABLE', 'c01'),
(991, 'Dr. Rajeeb Hassan', '05/29/2018', '11:00AM', 'AVAILABLE', 'c01'),
(992, 'Dr. Rajeeb Hassan', '05/29/2018', '11:15AM', 'AVAILABLE', 'c01'),
(993, 'Dr. Rajeeb Hassan', '05/29/2018', '11:30AM', 'AVAILABLE', 'c01'),
(994, 'Dr. Rajeeb Hassan', '05/29/2018', '11:45AM', 'AVAILABLE', 'c01'),
(995, 'Dr. Rajeeb Hassan', '05/29/2018', '12:00PM', 'AVAILABLE', 'c01'),
(996, 'Dr. Rajeeb Hassan', '05/29/2018', '12:15PM', 'AVAILABLE', 'c01'),
(997, 'Dr. Rajeeb Hassan', '05/29/2018', '12:30PM', 'AVAILABLE', 'c01'),
(998, 'Dr. Rajeeb Hassan', '05/29/2018', '12:45PM', 'AVAILABLE', 'c01'),
(519, 'Dr. Rajeeb Hassan', '05/31/2018', '02:00PM', 'NOT AVAILABLE', ''),
(520, 'Dr. Rajeeb Hassan', '05/31/2018', '02:15PM', 'NOT AVAILABLE', ''),
(521, 'Dr. Rajeeb Hassan', '05/31/2018', '02:30PM', 'NOT AVAILABLE', ''),
(522, 'Dr. Rajeeb Hassan', '05/31/2018', '02:45PM', 'NOT AVAILABLE', ''),
(523, 'Dr. Rajeeb Hassan', '05/31/2018', '03:00PM', 'AVAILABLE', ''),
(524, 'Dr. Rajeeb Hassan', '05/31/2018', '03:15PM', 'AVAILABLE', ''),
(525, 'Dr. Rajeeb Hassan', '05/31/2018', '03:30PM', 'AVAILABLE', ''),
(526, 'Dr. Rajeeb Hassan', '05/31/2018', '03:45PM', 'AVAILABLE', ''),
(527, 'Dr. Rajeeb Hassan', '05/31/2018', '04:00PM', 'AVAILABLE', ''),
(528, 'Dr. Rajeeb Hassan', '05/31/2018', '04:15PM', 'AVAILABLE', ''),
(529, 'Dr. Rajeeb Hassan', '05/31/2018', '04:30PM', 'AVAILABLE', ''),
(530, 'Dr. Rajeeb Hassan', '05/31/2018', '04:45PM', 'AVAILABLE', ''),
(507, 'Dr. Rajeeb Hassan', '05/31/2018', '10:00AM', 'NOT AVAILABLE', ''),
(508, 'Dr. Rajeeb Hassan', '05/31/2018', '10:15AM', 'NOT AVAILABLE', ''),
(509, 'Dr. Rajeeb Hassan', '05/31/2018', '10:30AM', 'NOT AVAILABLE', ''),
(510, 'Dr. Rajeeb Hassan', '05/31/2018', '10:45AM', 'NOT AVAILABLE', ''),
(511, 'Dr. Rajeeb Hassan', '05/31/2018', '11:00AM', 'NOT AVAILABLE', ''),
(512, 'Dr. Rajeeb Hassan', '05/31/2018', '11:15AM', 'NOT AVAILABLE', ''),
(513, 'Dr. Rajeeb Hassan', '05/31/2018', '11:30AM', 'NOT AVAILABLE', ''),
(514, 'Dr. Rajeeb Hassan', '05/31/2018', '11:45AM', 'NOT AVAILABLE', ''),
(515, 'Dr. Rajeeb Hassan', '05/31/2018', '12:00PM', 'NOT AVAILABLE', ''),
(516, 'Dr. Rajeeb Hassan', '05/31/2018', '12:15PM', 'NOT AVAILABLE', ''),
(517, 'Dr. Rajeeb Hassan', '05/31/2018', '12:30PM', 'NOT AVAILABLE', ''),
(518, 'Dr. Rajeeb Hassan', '05/31/2018', '12:45PM', 'NOT AVAILABLE', ''),
(582, 'Dr. Rajeeb Hassan', '06/15/2018', '10:00AM', 'AVAILABLE', ''),
(806, 'Dr. Rajeeb Hassan', '06/16/2018', '02:00PM', 'NOT AVAILABLE', ''),
(807, 'Dr. Rajeeb Hassan', '06/16/2018', '02:15PM', 'NOT AVAILABLE', ''),
(808, 'Dr. Rajeeb Hassan', '06/16/2018', '02:30PM', 'NOT AVAILABLE', ''),
(809, 'Dr. Rajeeb Hassan', '06/16/2018', '02:45PM', 'NOT AVAILABLE', ''),
(810, 'Dr. Rajeeb Hassan', '06/16/2018', '03:00PM', 'AVAILABLE', ''),
(811, 'Dr. Rajeeb Hassan', '06/16/2018', '03:15PM', 'AVAILABLE', ''),
(812, 'Dr. Rajeeb Hassan', '06/16/2018', '03:30PM', 'AVAILABLE', ''),
(813, 'Dr. Rajeeb Hassan', '06/16/2018', '03:45PM', 'AVAILABLE', ''),
(814, 'Dr. Rajeeb Hassan', '06/16/2018', '04:00PM', 'AVAILABLE', ''),
(815, 'Dr. Rajeeb Hassan', '06/16/2018', '04:15PM', 'AVAILABLE', ''),
(816, 'Dr. Rajeeb Hassan', '06/16/2018', '04:30PM', 'AVAILABLE', ''),
(817, 'Dr. Rajeeb Hassan', '06/16/2018', '04:45PM', 'AVAILABLE', ''),
(794, 'Dr. Rajeeb Hassan', '06/16/2018', '10:00AM', 'NOT AVAILABLE', ''),
(795, 'Dr. Rajeeb Hassan', '06/16/2018', '10:15AM', 'NOT AVAILABLE', ''),
(796, 'Dr. Rajeeb Hassan', '06/16/2018', '10:30AM', 'NOT AVAILABLE', ''),
(797, 'Dr. Rajeeb Hassan', '06/16/2018', '10:45AM', 'NOT AVAILABLE', ''),
(798, 'Dr. Rajeeb Hassan', '06/16/2018', '11:00AM', 'NOT AVAILABLE', ''),
(799, 'Dr. Rajeeb Hassan', '06/16/2018', '11:15AM', 'NOT AVAILABLE', ''),
(800, 'Dr. Rajeeb Hassan', '06/16/2018', '11:30AM', 'NOT AVAILABLE', ''),
(801, 'Dr. Rajeeb Hassan', '06/16/2018', '11:45AM', 'NOT AVAILABLE', ''),
(802, 'Dr. Rajeeb Hassan', '06/16/2018', '12:00PM', 'NOT AVAILABLE', ''),
(803, 'Dr. Rajeeb Hassan', '06/16/2018', '12:15PM', 'NOT AVAILABLE', ''),
(804, 'Dr. Rajeeb Hassan', '06/16/2018', '12:30PM', 'NOT AVAILABLE', ''),
(805, 'Dr. Rajeeb Hassan', '06/16/2018', '12:45PM', 'NOT AVAILABLE', ''),
(831, 'Dr. Rajeeb Hassan', '06/17/2018', '02:00PM', 'NOT AVAILABLE', ''),
(832, 'Dr. Rajeeb Hassan', '06/17/2018', '02:15PM', 'NOT AVAILABLE', ''),
(833, 'Dr. Rajeeb Hassan', '06/17/2018', '02:30PM', 'NOT AVAILABLE', ''),
(834, 'Dr. Rajeeb Hassan', '06/17/2018', '02:45PM', 'NOT AVAILABLE', ''),
(835, 'Dr. Rajeeb Hassan', '06/17/2018', '03:00PM', 'NOT AVAILABLE', ''),
(836, 'Dr. Rajeeb Hassan', '06/17/2018', '03:15PM', 'NOT AVAILABLE', ''),
(837, 'Dr. Rajeeb Hassan', '06/17/2018', '03:30PM', 'NOT AVAILABLE', ''),
(838, 'Dr. Rajeeb Hassan', '06/17/2018', '03:45PM', 'NOT AVAILABLE', ''),
(839, 'Dr. Rajeeb Hassan', '06/17/2018', '04:00PM', 'NOT AVAILABLE', ''),
(840, 'Dr. Rajeeb Hassan', '06/17/2018', '04:15PM', 'NOT AVAILABLE', ''),
(841, 'Dr. Rajeeb Hassan', '06/17/2018', '04:30PM', 'NOT AVAILABLE', ''),
(842, 'Dr. Rajeeb Hassan', '06/17/2018', '04:45PM', 'NOT AVAILABLE', ''),
(819, 'Dr. Rajeeb Hassan', '06/17/2018', '10:00AM', 'NOT AVAILABLE', ''),
(820, 'Dr. Rajeeb Hassan', '06/17/2018', '10:15AM', 'NOT AVAILABLE', ''),
(821, 'Dr. Rajeeb Hassan', '06/17/2018', '10:30AM', 'NOT AVAILABLE', ''),
(822, 'Dr. Rajeeb Hassan', '06/17/2018', '10:45AM', 'NOT AVAILABLE', ''),
(823, 'Dr. Rajeeb Hassan', '06/17/2018', '11:00AM', 'NOT AVAILABLE', ''),
(824, 'Dr. Rajeeb Hassan', '06/17/2018', '11:15AM', 'NOT AVAILABLE', ''),
(825, 'Dr. Rajeeb Hassan', '06/17/2018', '11:30AM', 'NOT AVAILABLE', ''),
(826, 'Dr. Rajeeb Hassan', '06/17/2018', '11:45AM', 'NOT AVAILABLE', ''),
(827, 'Dr. Rajeeb Hassan', '06/17/2018', '12:00PM', 'NOT AVAILABLE', ''),
(828, 'Dr. Rajeeb Hassan', '06/17/2018', '12:15PM', 'NOT AVAILABLE', ''),
(829, 'Dr. Rajeeb Hassan', '06/17/2018', '12:30PM', 'NOT AVAILABLE', ''),
(830, 'Dr. Rajeeb Hassan', '06/17/2018', '12:45PM', 'NOT AVAILABLE', ''),
(736, 'Dr. Rajeeb Hassan', '06/24/2018', '10:00AM', 'AVAILABLE', ''),
(734, 'Dr. Rajeeb Hassan', '07/30/2018', '10:00AM', 'NOT AVAILABLE', ''),
(622, 'Dr. Rajeeb Hassan', '07/31/2018', '02:00PM', 'NOT AVAILABLE', ''),
(623, 'Dr. Rajeeb Hassan', '07/31/2018', '02:15PM', 'NOT AVAILABLE', ''),
(624, 'Dr. Rajeeb Hassan', '07/31/2018', '02:30PM', 'NOT AVAILABLE', ''),
(625, 'Dr. Rajeeb Hassan', '07/31/2018', '02:45PM', 'NOT AVAILABLE', ''),
(626, 'Dr. Rajeeb Hassan', '07/31/2018', '03:00PM', 'AVAILABLE', ''),
(627, 'Dr. Rajeeb Hassan', '07/31/2018', '03:15PM', 'AVAILABLE', ''),
(628, 'Dr. Rajeeb Hassan', '07/31/2018', '03:30PM', 'AVAILABLE', ''),
(629, 'Dr. Rajeeb Hassan', '07/31/2018', '03:45PM', 'AVAILABLE', ''),
(630, 'Dr. Rajeeb Hassan', '07/31/2018', '04:00PM', 'AVAILABLE', ''),
(631, 'Dr. Rajeeb Hassan', '07/31/2018', '04:15PM', 'AVAILABLE', ''),
(632, 'Dr. Rajeeb Hassan', '07/31/2018', '04:30PM', 'AVAILABLE', ''),
(633, 'Dr. Rajeeb Hassan', '07/31/2018', '04:45PM', 'AVAILABLE', ''),
(610, 'Dr. Rajeeb Hassan', '07/31/2018', '10:00AM', 'AVAILABLE', ''),
(611, 'Dr. Rajeeb Hassan', '07/31/2018', '10:15AM', 'AVAILABLE', ''),
(612, 'Dr. Rajeeb Hassan', '07/31/2018', '10:30AM', 'AVAILABLE', ''),
(613, 'Dr. Rajeeb Hassan', '07/31/2018', '10:45AM', 'AVAILABLE', ''),
(614, 'Dr. Rajeeb Hassan', '07/31/2018', '11:00AM', 'AVAILABLE', ''),
(615, 'Dr. Rajeeb Hassan', '07/31/2018', '11:15AM', 'AVAILABLE', ''),
(616, 'Dr. Rajeeb Hassan', '07/31/2018', '11:30AM', 'AVAILABLE', ''),
(617, 'Dr. Rajeeb Hassan', '07/31/2018', '11:45AM', 'AVAILABLE', ''),
(618, 'Dr. Rajeeb Hassan', '07/31/2018', '12:00PM', 'AVAILABLE', ''),
(619, 'Dr. Rajeeb Hassan', '07/31/2018', '12:15PM', 'AVAILABLE', ''),
(620, 'Dr. Rajeeb Hassan', '07/31/2018', '12:30PM', 'AVAILABLE', ''),
(621, 'Dr. Rajeeb Hassan', '07/31/2018', '12:45PM', 'AVAILABLE', ''),
(366, 'Dr. Ranen Biswas', '05/23/2018', '02:00PM', 'AVAILABLE', ''),
(367, 'Dr. Ranen Biswas', '05/23/2018', '02:15PM', 'AVAILABLE', ''),
(368, 'Dr. Ranen Biswas', '05/23/2018', '02:30PM', 'AVAILABLE', ''),
(369, 'Dr. Ranen Biswas', '05/23/2018', '02:45PM', 'AVAILABLE', ''),
(370, 'Dr. Ranen Biswas', '05/23/2018', '03:00PM', 'AVAILABLE', ''),
(371, 'Dr. Ranen Biswas', '05/23/2018', '03:15PM', 'AVAILABLE', ''),
(372, 'Dr. Ranen Biswas', '05/23/2018', '03:30PM', 'AVAILABLE', ''),
(373, 'Dr. Ranen Biswas', '05/23/2018', '03:45PM', 'AVAILABLE', ''),
(374, 'Dr. Ranen Biswas', '05/23/2018', '04:00PM', 'AVAILABLE', ''),
(375, 'Dr. Ranen Biswas', '05/23/2018', '04:15PM', 'AVAILABLE', ''),
(376, 'Dr. Ranen Biswas', '05/23/2018', '04:30PM', 'AVAILABLE', ''),
(377, 'Dr. Ranen Biswas', '05/23/2018', '04:45PM', 'AVAILABLE', ''),
(354, 'Dr. Ranen Biswas', '05/23/2018', '10:00AM', 'AVAILABLE', ''),
(355, 'Dr. Ranen Biswas', '05/23/2018', '10:15AM', 'AVAILABLE', ''),
(356, 'Dr. Ranen Biswas', '05/23/2018', '10:30AM', 'AVAILABLE', ''),
(357, 'Dr. Ranen Biswas', '05/23/2018', '10:45AM', 'AVAILABLE', ''),
(358, 'Dr. Ranen Biswas', '05/23/2018', '11:00AM', 'AVAILABLE', ''),
(359, 'Dr. Ranen Biswas', '05/23/2018', '11:15AM', 'AVAILABLE', ''),
(360, 'Dr. Ranen Biswas', '05/23/2018', '11:30AM', 'AVAILABLE', ''),
(361, 'Dr. Ranen Biswas', '05/23/2018', '11:45AM', 'AVAILABLE', ''),
(362, 'Dr. Ranen Biswas', '05/23/2018', '12:00PM', 'AVAILABLE', ''),
(363, 'Dr. Ranen Biswas', '05/23/2018', '12:15PM', 'AVAILABLE', ''),
(364, 'Dr. Ranen Biswas', '05/23/2018', '12:30PM', 'AVAILABLE', ''),
(365, 'Dr. Ranen Biswas', '05/23/2018', '12:45PM', 'AVAILABLE', ''),
(391, 'Dr. Ranen Biswas', '05/24/2018', '02:00PM', 'AVAILABLE', ''),
(392, 'Dr. Ranen Biswas', '05/24/2018', '02:15PM', 'AVAILABLE', ''),
(393, 'Dr. Ranen Biswas', '05/24/2018', '02:30PM', 'AVAILABLE', ''),
(394, 'Dr. Ranen Biswas', '05/24/2018', '02:45PM', 'AVAILABLE', ''),
(395, 'Dr. Ranen Biswas', '05/24/2018', '03:00PM', 'AVAILABLE', ''),
(396, 'Dr. Ranen Biswas', '05/24/2018', '03:15PM', 'AVAILABLE', ''),
(397, 'Dr. Ranen Biswas', '05/24/2018', '03:30PM', 'AVAILABLE', ''),
(398, 'Dr. Ranen Biswas', '05/24/2018', '03:45PM', 'AVAILABLE', ''),
(399, 'Dr. Ranen Biswas', '05/24/2018', '04:00PM', 'AVAILABLE', ''),
(400, 'Dr. Ranen Biswas', '05/24/2018', '04:15PM', 'AVAILABLE', ''),
(401, 'Dr. Ranen Biswas', '05/24/2018', '04:30PM', 'AVAILABLE', ''),
(402, 'Dr. Ranen Biswas', '05/24/2018', '04:45PM', 'AVAILABLE', ''),
(379, 'Dr. Ranen Biswas', '05/24/2018', '10:00AM', 'AVAILABLE', ''),
(380, 'Dr. Ranen Biswas', '05/24/2018', '10:15AM', 'AVAILABLE', ''),
(381, 'Dr. Ranen Biswas', '05/24/2018', '10:30AM', 'AVAILABLE', ''),
(382, 'Dr. Ranen Biswas', '05/24/2018', '10:45AM', 'AVAILABLE', ''),
(383, 'Dr. Ranen Biswas', '05/24/2018', '11:00AM', 'AVAILABLE', ''),
(384, 'Dr. Ranen Biswas', '05/24/2018', '11:15AM', 'AVAILABLE', ''),
(385, 'Dr. Ranen Biswas', '05/24/2018', '11:30AM', 'AVAILABLE', ''),
(386, 'Dr. Ranen Biswas', '05/24/2018', '11:45AM', 'AVAILABLE', ''),
(387, 'Dr. Ranen Biswas', '05/24/2018', '12:00PM', 'AVAILABLE', ''),
(388, 'Dr. Ranen Biswas', '05/24/2018', '12:15PM', 'AVAILABLE', ''),
(389, 'Dr. Ranen Biswas', '05/24/2018', '12:30PM', 'AVAILABLE', ''),
(390, 'Dr. Ranen Biswas', '05/24/2018', '12:45PM', 'AVAILABLE', ''),
(879, 'Dr. Ranen Biswas', '05/26/2018', '02:00PM', 'AVAILABLE', ''),
(880, 'Dr. Ranen Biswas', '05/26/2018', '02:15PM', 'AVAILABLE', ''),
(881, 'Dr. Ranen Biswas', '05/26/2018', '02:30PM', 'AVAILABLE', ''),
(882, 'Dr. Ranen Biswas', '05/26/2018', '02:45PM', 'AVAILABLE', ''),
(883, 'Dr. Ranen Biswas', '05/26/2018', '03:00PM', 'AVAILABLE', ''),
(884, 'Dr. Ranen Biswas', '05/26/2018', '03:15PM', 'AVAILABLE', ''),
(885, 'Dr. Ranen Biswas', '05/26/2018', '03:30PM', 'AVAILABLE', ''),
(886, 'Dr. Ranen Biswas', '05/26/2018', '03:45PM', 'AVAILABLE', ''),
(887, 'Dr. Ranen Biswas', '05/26/2018', '04:00PM', 'AVAILABLE', ''),
(888, 'Dr. Ranen Biswas', '05/26/2018', '04:15PM', 'AVAILABLE', ''),
(889, 'Dr. Ranen Biswas', '05/26/2018', '04:30PM', 'AVAILABLE', ''),
(890, 'Dr. Ranen Biswas', '05/26/2018', '04:45PM', 'AVAILABLE', ''),
(867, 'Dr. Ranen Biswas', '05/26/2018', '10:00AM', 'AVAILABLE', ''),
(868, 'Dr. Ranen Biswas', '05/26/2018', '10:15AM', 'AVAILABLE', ''),
(869, 'Dr. Ranen Biswas', '05/26/2018', '10:30AM', 'AVAILABLE', ''),
(870, 'Dr. Ranen Biswas', '05/26/2018', '10:45AM', 'Booked', ''),
(871, 'Dr. Ranen Biswas', '05/26/2018', '11:00AM', 'AVAILABLE', ''),
(872, 'Dr. Ranen Biswas', '05/26/2018', '11:15AM', 'AVAILABLE', ''),
(873, 'Dr. Ranen Biswas', '05/26/2018', '11:30AM', 'AVAILABLE', ''),
(874, 'Dr. Ranen Biswas', '05/26/2018', '11:45AM', 'AVAILABLE', ''),
(875, 'Dr. Ranen Biswas', '05/26/2018', '12:00PM', 'AVAILABLE', ''),
(876, 'Dr. Ranen Biswas', '05/26/2018', '12:15PM', 'AVAILABLE', ''),
(877, 'Dr. Ranen Biswas', '05/26/2018', '12:30PM', 'AVAILABLE', ''),
(878, 'Dr. Ranen Biswas', '05/26/2018', '12:45PM', 'AVAILABLE', ''),
(927, 'Dr. Ranen Biswas', '05/27/2018', '02:00PM', 'AVAILABLE', ''),
(928, 'Dr. Ranen Biswas', '05/27/2018', '02:15PM', 'AVAILABLE', ''),
(929, 'Dr. Ranen Biswas', '05/27/2018', '02:30PM', 'AVAILABLE', ''),
(930, 'Dr. Ranen Biswas', '05/27/2018', '02:45PM', 'AVAILABLE', ''),
(931, 'Dr. Ranen Biswas', '05/27/2018', '03:00PM', 'AVAILABLE', ''),
(932, 'Dr. Ranen Biswas', '05/27/2018', '03:15PM', 'AVAILABLE', ''),
(915, 'Dr. Ranen Biswas', '05/27/2018', '10:00AM', 'Booked', ''),
(916, 'Dr. Ranen Biswas', '05/27/2018', '10:15AM', 'AVAILABLE', ''),
(917, 'Dr. Ranen Biswas', '05/27/2018', '10:30AM', 'AVAILABLE', ''),
(918, 'Dr. Ranen Biswas', '05/27/2018', '10:45AM', 'Booked', ''),
(919, 'Dr. Ranen Biswas', '05/27/2018', '11:00AM', 'AVAILABLE', ''),
(920, 'Dr. Ranen Biswas', '05/27/2018', '11:15AM', 'AVAILABLE', ''),
(921, 'Dr. Ranen Biswas', '05/27/2018', '11:30AM', 'AVAILABLE', ''),
(922, 'Dr. Ranen Biswas', '05/27/2018', '11:45AM', 'AVAILABLE', ''),
(923, 'Dr. Ranen Biswas', '05/27/2018', '12:00PM', 'AVAILABLE', ''),
(924, 'Dr. Ranen Biswas', '05/27/2018', '12:15PM', 'AVAILABLE', ''),
(925, 'Dr. Ranen Biswas', '05/27/2018', '12:30PM', 'AVAILABLE', ''),
(926, 'Dr. Ranen Biswas', '05/27/2018', '12:45PM', 'AVAILABLE', ''),
(467, 'Dr. Ranen Biswas', '05/30/2018', '02:00PM', 'AVAILABLE', ''),
(468, 'Dr. Ranen Biswas', '05/30/2018', '02:15PM', 'AVAILABLE', ''),
(469, 'Dr. Ranen Biswas', '05/30/2018', '02:30PM', 'AVAILABLE', ''),
(470, 'Dr. Ranen Biswas', '05/30/2018', '02:45PM', 'AVAILABLE', ''),
(471, 'Dr. Ranen Biswas', '05/30/2018', '03:00PM', 'AVAILABLE', ''),
(472, 'Dr. Ranen Biswas', '05/30/2018', '03:15PM', 'AVAILABLE', ''),
(473, 'Dr. Ranen Biswas', '05/30/2018', '03:30PM', 'AVAILABLE', ''),
(474, 'Dr. Ranen Biswas', '05/30/2018', '03:45PM', 'AVAILABLE', ''),
(475, 'Dr. Ranen Biswas', '05/30/2018', '04:00PM', 'AVAILABLE', ''),
(476, 'Dr. Ranen Biswas', '05/30/2018', '04:15PM', 'AVAILABLE', ''),
(477, 'Dr. Ranen Biswas', '05/30/2018', '04:30PM', 'AVAILABLE', ''),
(478, 'Dr. Ranen Biswas', '05/30/2018', '04:45PM', 'AVAILABLE', ''),
(455, 'Dr. Ranen Biswas', '05/30/2018', '10:00AM', 'AVAILABLE', ''),
(456, 'Dr. Ranen Biswas', '05/30/2018', '10:15AM', 'AVAILABLE', ''),
(457, 'Dr. Ranen Biswas', '05/30/2018', '10:30AM', 'AVAILABLE', ''),
(458, 'Dr. Ranen Biswas', '05/30/2018', '10:45AM', 'AVAILABLE', ''),
(459, 'Dr. Ranen Biswas', '05/30/2018', '11:00AM', 'AVAILABLE', ''),
(460, 'Dr. Ranen Biswas', '05/30/2018', '11:15AM', 'AVAILABLE', ''),
(461, 'Dr. Ranen Biswas', '05/30/2018', '11:30AM', 'AVAILABLE', ''),
(462, 'Dr. Ranen Biswas', '05/30/2018', '11:45AM', 'AVAILABLE', ''),
(463, 'Dr. Ranen Biswas', '05/30/2018', '12:00PM', 'AVAILABLE', ''),
(464, 'Dr. Ranen Biswas', '05/30/2018', '12:15PM', 'AVAILABLE', ''),
(465, 'Dr. Ranen Biswas', '05/30/2018', '12:30PM', 'AVAILABLE', ''),
(466, 'Dr. Ranen Biswas', '05/30/2018', '12:45PM', 'AVAILABLE', ''),
(544, 'Dr. Ranen Biswas', '05/31/2018', '02:00PM', 'AVAILABLE', ''),
(545, 'Dr. Ranen Biswas', '05/31/2018', '02:15PM', 'AVAILABLE', ''),
(546, 'Dr. Ranen Biswas', '05/31/2018', '02:30PM', 'AVAILABLE', ''),
(547, 'Dr. Ranen Biswas', '05/31/2018', '02:45PM', 'AVAILABLE', ''),
(548, 'Dr. Ranen Biswas', '05/31/2018', '03:00PM', 'AVAILABLE', ''),
(549, 'Dr. Ranen Biswas', '05/31/2018', '03:15PM', 'AVAILABLE', ''),
(550, 'Dr. Ranen Biswas', '05/31/2018', '03:30PM', 'AVAILABLE', ''),
(551, 'Dr. Ranen Biswas', '05/31/2018', '03:45PM', 'AVAILABLE', ''),
(552, 'Dr. Ranen Biswas', '05/31/2018', '04:00PM', 'AVAILABLE', ''),
(553, 'Dr. Ranen Biswas', '05/31/2018', '04:15PM', 'AVAILABLE', ''),
(554, 'Dr. Ranen Biswas', '05/31/2018', '04:30PM', 'AVAILABLE', ''),
(555, 'Dr. Ranen Biswas', '05/31/2018', '04:45PM', 'AVAILABLE', ''),
(532, 'Dr. Ranen Biswas', '05/31/2018', '10:00AM', 'NOT AVAILABLE', ''),
(533, 'Dr. Ranen Biswas', '05/31/2018', '10:15AM', 'NOT AVAILABLE', ''),
(534, 'Dr. Ranen Biswas', '05/31/2018', '10:30AM', 'NOT AVAILABLE', ''),
(535, 'Dr. Ranen Biswas', '05/31/2018', '10:45AM', 'NOT AVAILABLE', ''),
(536, 'Dr. Ranen Biswas', '05/31/2018', '11:00AM', 'AVAILABLE', ''),
(537, 'Dr. Ranen Biswas', '05/31/2018', '11:15AM', 'AVAILABLE', ''),
(538, 'Dr. Ranen Biswas', '05/31/2018', '11:30AM', 'AVAILABLE', ''),
(539, 'Dr. Ranen Biswas', '05/31/2018', '11:45AM', 'AVAILABLE', ''),
(540, 'Dr. Ranen Biswas', '05/31/2018', '12:00PM', 'AVAILABLE', ''),
(541, 'Dr. Ranen Biswas', '05/31/2018', '12:15PM', 'AVAILABLE', ''),
(542, 'Dr. Ranen Biswas', '05/31/2018', '12:30PM', 'AVAILABLE', ''),
(543, 'Dr. Ranen Biswas', '05/31/2018', '12:45PM', 'AVAILABLE', ''),
(780, 'Dr. Ranen Biswas', '06/10/2018', '02:00PM', 'AVAILABLE', ''),
(781, 'Dr. Ranen Biswas', '06/10/2018', '02:15PM', 'NOT AVAILABLE', ''),
(782, 'Dr. Ranen Biswas', '06/10/2018', '02:30PM', 'NOT AVAILABLE', ''),
(783, 'Dr. Ranen Biswas', '06/10/2018', '02:45PM', 'NOT AVAILABLE', ''),
(784, 'Dr. Ranen Biswas', '06/10/2018', '03:00PM', 'NOT AVAILABLE', ''),
(785, 'Dr. Ranen Biswas', '06/10/2018', '03:15PM', 'NOT AVAILABLE', ''),
(786, 'Dr. Ranen Biswas', '06/10/2018', '03:30PM', 'NOT AVAILABLE', ''),
(787, 'Dr. Ranen Biswas', '06/10/2018', '03:45PM', 'NOT AVAILABLE', ''),
(788, 'Dr. Ranen Biswas', '06/10/2018', '04:00PM', 'NOT AVAILABLE', ''),
(789, 'Dr. Ranen Biswas', '06/10/2018', '04:15PM', 'NOT AVAILABLE', ''),
(790, 'Dr. Ranen Biswas', '06/10/2018', '04:30PM', 'NOT AVAILABLE', ''),
(791, 'Dr. Ranen Biswas', '06/10/2018', '04:45PM', 'NOT AVAILABLE', ''),
(768, 'Dr. Ranen Biswas', '06/10/2018', '10:00AM', 'NOT AVAILABLE', ''),
(769, 'Dr. Ranen Biswas', '06/10/2018', '10:15AM', 'NOT AVAILABLE', ''),
(770, 'Dr. Ranen Biswas', '06/10/2018', '10:30AM', 'NOT AVAILABLE', ''),
(771, 'Dr. Ranen Biswas', '06/10/2018', '10:45AM', 'NOT AVAILABLE', ''),
(772, 'Dr. Ranen Biswas', '06/10/2018', '11:00AM', 'NOT AVAILABLE', ''),
(773, 'Dr. Ranen Biswas', '06/10/2018', '11:15AM', 'NOT AVAILABLE', ''),
(774, 'Dr. Ranen Biswas', '06/10/2018', '11:30AM', 'NOT AVAILABLE', ''),
(775, 'Dr. Ranen Biswas', '06/10/2018', '11:45AM', 'NOT AVAILABLE', ''),
(776, 'Dr. Ranen Biswas', '06/10/2018', '12:00PM', 'NOT AVAILABLE', ''),
(777, 'Dr. Ranen Biswas', '06/10/2018', '12:15PM', 'NOT AVAILABLE', ''),
(778, 'Dr. Ranen Biswas', '06/10/2018', '12:30PM', 'NOT AVAILABLE', ''),
(779, 'Dr. Ranen Biswas', '06/10/2018', '12:45PM', 'NOT AVAILABLE', ''),
(583, 'Dr. Ranen Biswas', '06/20/2018', '10:00AM', 'AVAILABLE', ''),
(585, 'Dr. Ranen Biswas', '06/21/2018', '10:00AM', 'AVAILABLE', ''),
(1024, 'Dr. Ranen Biswas', '09/06/2018', '02:00PM', 'AVAILABLE', 'c01'),
(1025, 'Dr. Ranen Biswas', '09/06/2018', '02:15PM', 'AVAILABLE', 'c01'),
(1026, 'Dr. Ranen Biswas', '09/06/2018', '02:30PM', 'AVAILABLE', 'c01'),
(1027, 'Dr. Ranen Biswas', '09/06/2018', '02:45PM', 'AVAILABLE', 'c01'),
(1028, 'Dr. Ranen Biswas', '09/06/2018', '03:00PM', 'AVAILABLE', 'c01'),
(1029, 'Dr. Ranen Biswas', '09/06/2018', '03:15PM', 'AVAILABLE', 'c01'),
(1030, 'Dr. Ranen Biswas', '09/06/2018', '03:30PM', 'AVAILABLE', 'c01'),
(1031, 'Dr. Ranen Biswas', '09/06/2018', '03:45PM', 'AVAILABLE', 'c01'),
(1032, 'Dr. Ranen Biswas', '09/06/2018', '04:00PM', 'AVAILABLE', 'c01'),
(1033, 'Dr. Ranen Biswas', '09/06/2018', '04:15PM', 'AVAILABLE', 'c01'),
(1034, 'Dr. Ranen Biswas', '09/06/2018', '04:30PM', 'AVAILABLE', 'c01'),
(1035, 'Dr. Ranen Biswas', '09/06/2018', '04:45PM', 'AVAILABLE', 'c01'),
(1012, 'Dr. Ranen Biswas', '09/06/2018', '10:00AM', 'AVAILABLE', 'c01'),
(1013, 'Dr. Ranen Biswas', '09/06/2018', '10:15AM', 'AVAILABLE', 'c01'),
(1014, 'Dr. Ranen Biswas', '09/06/2018', '10:30AM', 'AVAILABLE', 'c01'),
(1015, 'Dr. Ranen Biswas', '09/06/2018', '10:45AM', 'AVAILABLE', 'c01'),
(1016, 'Dr. Ranen Biswas', '09/06/2018', '11:00AM', 'AVAILABLE', 'c01'),
(1017, 'Dr. Ranen Biswas', '09/06/2018', '11:15AM', 'AVAILABLE', 'c01'),
(1018, 'Dr. Ranen Biswas', '09/06/2018', '11:30AM', 'AVAILABLE', 'c01'),
(1019, 'Dr. Ranen Biswas', '09/06/2018', '11:45AM', 'AVAILABLE', 'c01'),
(1020, 'Dr. Ranen Biswas', '09/06/2018', '12:00PM', 'AVAILABLE', 'c01'),
(1021, 'Dr. Ranen Biswas', '09/06/2018', '12:15PM', 'AVAILABLE', 'c01'),
(1022, 'Dr. Ranen Biswas', '09/06/2018', '12:30PM', 'AVAILABLE', 'c01'),
(1023, 'Dr. Ranen Biswas', '09/06/2018', '12:45PM', 'AVAILABLE', 'c01');

-- --------------------------------------------------------

--
-- Stand-in structure for view `test3`
--
CREATE TABLE IF NOT EXISTS `test3` (
`m1` varchar(200)
,`m2` varchar(200)
,`m3` varchar(500)
,`m4` varchar(500)
,`medicinelist` varchar(500)
);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(6) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `upass` varchar(100) NOT NULL,
  `utype` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `uname`, `upass`, `utype`, `fullname`) VALUES
(1, 'rajeeb', '123456', 'doctor', 'Dr. Rajeeb Hassan'),
(2, 'ranen', '123456', 'doctor', 'Dr. Ranen Biswas'),
(3, 'Quaser', '123456', 'doctor', 'Dr. J.M.Q. Quaser Alam'),
(4, 'abcd', '123456', 'admin', ''),
(5, 'mo01', '123456', 'mo', ''),
(6, 'n01', '123456', 'nurse', ''),
(7, 'p01', '123456', 'pharmacy', ''),
(8, 'c01', '123456', 'clinical', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `usertype`) VALUES
(4, 'steven', 'e10adc3949ba59abbe56e057f20f883e', ''),
(5, 'dias', 'e10adc3949ba59abbe56e057f20f883e', ''),
(0, 'razeeb', '123456', 'admin'),
(3, 'razeeb', '123456', 'admin'),
(3, 'razeeb', '123456', 'admin');

-- --------------------------------------------------------

--
-- Structure for view `mytest`
--
DROP TABLE IF EXISTS `mytest`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mytest` AS select `pres`.`m1` AS `m1`,`pres`.`m2` AS `m2`,`pres`.`m3` AS `m3`,`pres`.`m4` AS `m4`,`pres`.`m5` AS `m5` from `pres`;

-- --------------------------------------------------------

--
-- Structure for view `test3`
--
DROP TABLE IF EXISTS `test3`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `test3` AS select `pres`.`m1` AS `m1`,`pres`.`m2` AS `m2`,`pres`.`m3` AS `m3`,`pres`.`m4` AS `m4`,`pres`.`m5` AS `medicinelist` from `pres`;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bed`
--
ALTER TABLE `bed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bedt`
--
ALTER TABLE `bedt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dapp`
--
ALTER TABLE `dapp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discharge`
--
ALTER TABLE `discharge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dmedi`
--
ALTER TABLE `dmedi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `dosage`
--
ALTER TABLE `dosage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inpatient`
--
ALTER TABLE `inpatient`
  ADD PRIMARY KEY (`pmrn`,`adate`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `instruction`
--
ALTER TABLE `instruction`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `investigastion`
--
ALTER TABLE `investigastion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ipmedi`
--
ALTER TABLE `ipmedi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ipres`
--
ALTER TABLE `ipres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ipres1`
--
ALTER TABLE `ipres1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itest`
--
ALTER TABLE `itest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newbed`
--
ALTER TABLE `newbed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ot`
--
ALTER TABLE `ot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `papp`
--
ALTER TABLE `papp`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pappnew`
--
ALTER TABLE `pappnew`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `pmrn` (`pmrn`);

--
-- Indexes for table `pmedi`
--
ALTER TABLE `pmedi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pres`
--
ALTER TABLE `pres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `presnew`
--
ALTER TABLE `presnew`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slot`
--
ALTER TABLE `slot`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `tagslist`
--
ALTER TABLE `tagslist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`dname`,`ddate`,`dslot`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bed`
--
ALTER TABLE `bed`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `bedt`
--
ALTER TABLE `bedt`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dapp`
--
ALTER TABLE `dapp`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `discharge`
--
ALTER TABLE `discharge`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `dmedi`
--
ALTER TABLE `dmedi`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=213;
--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `did` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `dosage`
--
ALTER TABLE `dosage`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `inpatient`
--
ALTER TABLE `inpatient`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `instruction`
--
ALTER TABLE `instruction`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `investigastion`
--
ALTER TABLE `investigastion`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=319;
--
-- AUTO_INCREMENT for table `ipmedi`
--
ALTER TABLE `ipmedi`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `ipres`
--
ALTER TABLE `ipres`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT for table `ipres1`
--
ALTER TABLE `ipres1`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=97;
--
-- AUTO_INCREMENT for table `itest`
--
ALTER TABLE `itest`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=264;
--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=711;
--
-- AUTO_INCREMENT for table `newbed`
--
ALTER TABLE `newbed`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `ot`
--
ALTER TABLE `ot`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `papp`
--
ALTER TABLE `papp`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=107;
--
-- AUTO_INCREMENT for table `pappnew`
--
ALTER TABLE `pappnew`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=207;
--
-- AUTO_INCREMENT for table `pmedi`
--
ALTER TABLE `pmedi`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=344;
--
-- AUTO_INCREMENT for table `pres`
--
ALTER TABLE `pres`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=219;
--
-- AUTO_INCREMENT for table `presnew`
--
ALTER TABLE `presnew`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT for table `slot`
--
ALTER TABLE `slot`
  MODIFY `sid` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tagslist`
--
ALTER TABLE `tagslist`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=148;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1036;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
