-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2018 at 05:04 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dapp`
--

INSERT INTO `dapp` (`id`, `dname`, `ddate`, `s1`, `s2`, `s3`, `s4`, `s5`, `s6`, `s7`, `s8`, `s9`, `s10`, `s11`) VALUES
(1, '1', '02/21/2018', '9:00AM', '10:00AM', '', '', '', '', '', '', '', '', ''),
(2, '2', '02/22/2018', '9:00AM', '10:00AM', '11:00AM', '12:00PM', '1:00PM', '', '', '', '', '', ''),
(3, '2', '02/23/2018', '9:00AM', '10:00AM', '11:00AM', '12:00PM', '1:00PM', '2:00PM', '3:00PM', '4:00PM', 'OT DATE', 'LEAVE', ''),
(4, '2', '02/24/2018', '9:00AM', '10:00AM', '', '', '', '', '', '', '', '', ''),
(5, '1', '02/28/2018', '9:00AM', '', '', '', '', '', '', '', '', '', ''),
(6, '1', '02/22/2018', '9:00AM', '', '', '', '', '', '', '', 'OT DATE', '', ''),
(7, 'adman', '02/20/2018', '9:00AM', '', '', '', '', '', '', '4:00PM', '', '', ''),
(8, 'steven', '02/28/2018', '9:00AM', '10:00AM', '11:00AM', '12:00PM', '1:00PM', '2:00PM', '3:00PM', '4:00PM', 'OT DATE', 'LEAVE', ''),
(9, 'steven', '02/26/2018', '9:00AM', '10:00AM', '11:00AM', '12:00PM', '1:00PM', 'NOT AVAILABLE', 'NOT AVAILABLE', 'NOT AVAILABLE', 'NOT AVAILABLE', 'NOT AVAILABLE', 'NOT AVAILABLE'),
(10, 'adman', '02/28/2018', '9:00AM', '10:00AM', '11:00AM', '12:00PM', '1:00PM', '2:00PM', '3:00PM', '4:00PM', 'NOT AVAILABLE', 'NOT AVAILABLE', 'NOT AVAILABLE'),
(11, 'steven', '02/27/2018', '9:00AM', '10:00AM', '11:00AM', '12:00PM', '1:00PM', '2:00PM', '3:00PM', '4:00PM', 'OT DATE', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `discharge`
--

CREATE TABLE IF NOT EXISTS `discharge` (
  `id` int(20) NOT NULL,
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
  `discharge` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discharge`
--

INSERT INTO `discharge` (`id`, `dname`, `pname`, `padd`, `page`, `psex`, `pmrn`, `pphone`, `pheight`, `pweight`, `ptemp`, `cdetails`, `diagnosis`, `xl`, `m1`, `m2`, `m3`, `m4`, `m5`, `m6`, `m7`, `m8`, `m9`, `m10`, `m11`, `m12`, `m13`, `m14`, `m15`, `m16`, `m17`, `m18`, `m19`, `m20`, `d1`, `d2`, `d3`, `d4`, `d5`, `d6`, `d7`, `d8`, `d9`, `d10`, `d11`, `d12`, `d13`, `d14`, `d15`, `d16`, `d17`, `d18`, `d19`, `d20`, `other`, `date`, `pdiet`, `reffer`, `i1`, `i2`, `i3`, `i4`, `i5`, `i6`, `i7`, `i8`, `i9`, `i10`, `i11`, `i12`, `i13`, `i14`, `i15`, `i16`, `i17`, `i18`, `i19`, `i20`, `room`, `discharge`) VALUES
(1, 'steven', 'Neela', '', 787, 'FEMALE', 111111, '0', '04/03/2018', '01', '01', '', '', '', 'Aceclofenac 100mg Tablet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'jsdf', '04/03/2018', '', '', 'UUUIIIOO', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, 'steven', 'ADMAN DIAS', '', 7878, 'MALE', 777777, '0', '', 'ICU01', 'ICU01', '', '', '', '0.9% Sodium chloride IV Infusion 1000ml', '10% Fat Emulsion', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'JHJHJH', 'OIOIOI', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 'steven', 'ADMAN DIAS', '', 7878, 'MALE', 777777, '0', '', 'ICU01', 'ICU01', '', '', '', '0.9% Sodium chloride IV Infusion 1000ml', '10% Fat Emulsion', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'JHJHJH', 'OIOIOI', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, 'steven', 'Merry', '', 777, 'MALE', 222222, '0', '', '<br /><b>Notice</b>:', '<br /><b>Notice</b>:', '', '', '', '5 % Dextrose IV Infusion. 1000 ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'jksdfkhsdjkf', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

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
(1, 'steven', '', ''),
(2, 'adman', '', ''),
(6, 'hsah sags aghsgahjg shagdsaghgdhsag dgsahgd jsagdj gsagdjsagd gsajhdgsagdhgsa dgjsag dsjkfhkj h fdsj', '', ''),
(7, 'jhjk', '', ''),
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
  `pmrn` int(10) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `padd` varchar(200) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age` int(4) NOT NULL,
  `adate` varchar(20) NOT NULL,
  `room` varchar(30) NOT NULL,
  `adoc` varchar(50) NOT NULL,
  `pphone` int(11) NOT NULL,
  `discharge` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inpatient`
--

INSERT INTO `inpatient` (`id`, `pmrn`, `pname`, `padd`, `gender`, `age`, `adate`, `room`, `adoc`, `pphone`, `discharge`) VALUES
(1, 8878978, 'KHKJK', 'jshdfkhkdsfkkd dshgfjhdh', 'MALE', 787, '4/30/2018', 'icu01', 'steven', 0, ''),
(2, 8878978, 'KHKJK', '<br /><b>Notice</b>:  Undefined variable: pt in <b>C:xampphtdocsfinal1inpatient1.php</b> on line <b>318</b><br />', 'MALE', 787, '04/30/2018', 'sdkjhskjds', '', 0, ''),
(3, 8878978, 'KHKJK', '<br /><b>Notice</b>:  Undefined variable: pt in <b>C:xampphtdocsfinal1inpatient1.php</b> on line <b>318</b><br />', 'MALE', 787, '04/30/2018', '<br /><b>Notice</b>:  Undefine', 'steven', 0, ''),
(4, 123456, 'KHKJK', '<br /><b>Notice</b>:  Undefined variable: pt in <b>C:xampphtdocsfinal1inpatient1.php</b> on line <b>318</b><br />', 'MALE', 787, '04/30/2018', 'ICU', 'steven', 0, ''),
(5, 5678, 'KHKJK', '44/H Indira Road, Dhaka', 'MALE', 787, '04/18/2018', '<br /><b>Notice</b>:  Undefine', 'steven', 0, ''),
(12, 111111, 'Neela', '44/H Indira Road, Dhaka', 'FEMALE', 787, '04/03/2018', '01', 'steven', 0, 'discharge'),
(13, 777777, 'ADMAN DIAS', '105/11 Monipuripara, Farmgate, Dhaka', 'MALE', 7878, '', 'ICU01', 'steven', 0, 'Discharge'),
(14, 222222, 'Merry', '44/jhd', 'MALE', 777, '', '<br /><b>Notice</b>:  Undefine', 'steven', 0, 'Discharge');

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
-- Table structure for table `ipres`
--

CREATE TABLE IF NOT EXISTS `ipres` (
  `id` int(20) NOT NULL,
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
  `discharge` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ipres`
--

INSERT INTO `ipres` (`id`, `dname`, `pname`, `padd`, `page`, `psex`, `pmrn`, `pphone`, `pheight`, `pweight`, `ptemp`, `cdetails`, `diagnosis`, `xl`, `m1`, `m2`, `m3`, `m4`, `m5`, `m6`, `m7`, `m8`, `m9`, `m10`, `m11`, `m12`, `m13`, `m14`, `m15`, `m16`, `m17`, `m18`, `m19`, `m20`, `d1`, `d2`, `d3`, `d4`, `d5`, `d6`, `d7`, `d8`, `d9`, `d10`, `d11`, `d12`, `d13`, `d14`, `d15`, `d16`, `d17`, `d18`, `d19`, `d20`, `other`, `date`, `pdiet`, `reffer`, `i1`, `i2`, `i3`, `i4`, `i5`, `i6`, `i7`, `i8`, `i9`, `i10`, `i11`, `i12`, `i13`, `i14`, `i15`, `i16`, `i17`, `i18`, `i19`, `i20`, `room`, `discharge`) VALUES
(1, 'steven', 'KHKJK', '', 787, 'MALE', 8878978, '0', '', 'ksdjflj', 'kjkljl', 'STEVEN', 'DIAS', '', '10 % Dextrose IV Infusion 1000 ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'ABCD', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, 'steven', 'KHKJK', '', 787, 'MALE', 444444, '0', '', '<br /><b>Notice</b>:', '<br /><b>Notice</b>:', 'HHHHHH', 'HHHHH', '', '10 % Dextrose IV Infusion 1000 ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '10 % Dextrose IV Infusion 1000 ml', '10 % Dextrose IV Infusion 1000 ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'ABCD', '10 % Dextrose IV Infusion 1000 ml', '10 % Dextrose IV Infusion 1000 ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, '', 'KHKJK', '', 787, 'MALE', 123456, '0', '', '<br /><b>Notice</b>:', '<br /><b>Notice</b>:', 'STEVN', 'DIAD', '', '10 % Dextrose IV Infusion 1000 ml', '10 % Dextrose IV Infusion 1000 ml', '10 % Dextrose IV Infusion 1000 ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '10 % Dextrose IV Infusion 1000 ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'ABCD RTYTYT', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, 'steven', 'Neela', '44/H Indira Road, Dhaka', 787, 'FEMALE', 111111, '0', '', '', '', '', '', '', 'Aceclofenac 100mg Tablet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '04/03/2018', '', '', 'UUUIIIOO', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01', 'Discharge'),
(7, 'steven', 'ADMAN DIAS', '105/11 Monipuripara, Farmgate, Dhaka', 7878, 'MALE', 777777, '0', '', '', '', '', '', '', '0.9% Sodium chloride IV Infusion 1000ml', '10% Fat Emulsion', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'JHJHJH', 'OIOIOI', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'ICU01', 'Discharge Confirm'),
(8, 'steven', 'Merry', '44/jhd', 777, 'MALE', 222222, '0', '', '', '', '', '', '', '5 % Dextrose IV Infusion. 1000 ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'jksdfkhsdjkf', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '<br /><b>Notice</b>:  Undefined index: room in <b>C:xampphtdocsfinal1inpatient1.php</b> on line <b>3', 'Discharge Confirm');

-- --------------------------------------------------------

--
-- Table structure for table `ipres1`
--

CREATE TABLE IF NOT EXISTS `ipres1` (
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ipres1`
--

INSERT INTO `ipres1` (`id`, `dname`, `pname`, `page`, `psex`, `pmrn`, `pphone`, `pheight`, `pweight`, `ptemp`, `cdetails`, `diagnosis`, `xl`, `m1`, `m2`, `m3`, `m4`, `m5`, `m6`, `m7`, `m8`, `m9`, `m10`, `m11`, `m12`, `m13`, `m14`, `m15`, `m16`, `m17`, `m18`, `m19`, `m20`, `d1`, `d2`, `d3`, `d4`, `d5`, `d6`, `d7`, `d8`, `d9`, `d10`, `d11`, `d12`, `d13`, `d14`, `d15`, `d16`, `d17`, `d18`, `d19`, `d20`, `other`, `date`, `pdiet`, `reffer`, `i1`, `i2`, `i3`, `i4`, `i5`, `i6`, `i7`, `i8`, `i9`, `i10`, `i11`, `i12`, `i13`, `i14`, `i15`, `i16`, `i17`, `i18`, `i19`, `i20`) VALUES
(1, '', 'KHKJK', 787, 'MALE', 5678, '01711206048', '', 'ICU', '01', '', 'jkljjjjk', 'C4 (complement 4)', '6%hydroxyethyl starch 500ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, '', 'KHKJK', 787, 'MALE', 5678, '01711206048', '', 'ICU', '01', '', 'jkljjjjk', 'C4 (complement 4)', '6%hydroxyethyl starch 500ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, '', 'KHKJK', 787, 'MALE', 5678, '0', '', '<br /><b>Notice</b>:', '<br /><b>Notice</b>:', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, '', 'KHKJK', 787, 'MALE', 5678, '01010100', '', '89797', '878', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, '', 'Steven DIas', 787, 'MALE', 5678, '0', '', '<br /><b>Notice</b>:', '<br /><b>Notice</b>:', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, '', 'hsagdhgasgdg', 787, 'MALE', 5678, '0', '', '<br /><b>Notice</b>:', '<br /><b>Notice</b>:', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(7, '', 'hsagdhgasgdg', 787, 'MALE', 5678, '0', '', '<br /><b>Notice</b>:', '<br /><b>Notice</b>:', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(8, 'steven', 'GGGG', 787, 'MALE', 5678, '0', '', '<br /><b>Notice</b>:', '<br /><b>Notice</b>:', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(9, 'steven', 'AAAA', 787, 'MALE', 123456, '0', '', 'ICU', 'ICU', '', '', '', '10 % Dextrose IV Infusion 1000 ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'ABCD RTYTYT', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(12, 'steven', 'Neela', 787, 'FEMALE', 111111, '01711206048', '04/03/2018', '01', '01', '', '', 'C4 (complement 4)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '04/03/2018', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(13, 'steven', 'Neela', 787, 'FEMALE', 111111, '0', '04/03/2018', '01', '01', '', '', '', 'Aceclofenac 100mg Tablet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '04/03/2018', '', '', 'UUUIIIOO', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(14, 'steven', 'Neela', 787, 'FEMALE', 111111, '0', '04/03/2018', '01', '01', '', '', '', 'Aceclofenac 100mg Tablet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '04/03/2018', '', '', 'UUUIIIOO', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(15, 'steven', 'ADMAN DIAS', 7878, 'MALE', 777777, '0', '04/14/2018', 'ICU01', 'ICU01', '', '', 'C4 (complement 4),CA 125,Ferritin ', '0.9% Sodium chloride IV Infusion 1000ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '04/14/2018', '', '', 'JHJHJH', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(16, 'steven', 'ADMAN DIAS', 7878, 'MALE', 777777, '0', '', 'ICU01', 'ICU01', '', '', '', '0.9% Sodium chloride IV Infusion 1000ml', '10% Fat Emulsion', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'JHJHJH', 'OIOIOI', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(17, 'steven', 'ADMAN DIAS', 7878, 'MALE', 777777, '0', '', 'ICU01', 'ICU01', '', '', '', '0.9% Sodium chloride IV Infusion 1000ml', '10% Fat Emulsion', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'JHJHJH', 'OIOIOI', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(18, 'steven', 'Merry', 777, 'MALE', 222222, '0', '', '<br /><b>Notice</b>:', '<br /><b>Notice</b>:', '', '', 'C4 (complement 4),CA 125,CA 15-3,Ferritin ,Flixible Cystoscopy', '5 % Dextrose IV Infusion. 1000 ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'jksdfkhsdjkf', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(19, 'steven', 'Merry', 777, 'MALE', 222222, '0', '', '<br /><b>Notice</b>:', '<br /><b>Notice</b>:', '', '', '', '5 % Dextrose IV Infusion. 1000 ml', 'Aceclofenac 100mg Tablet', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'jksdfkhsdjkf', 'hsdjfhsdhkfhjksdf', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(20, 'steven', 'Merry', 777, 'MALE', 222222, '0', '', '<br /><b>Notice</b>:', '<br /><b>Notice</b>:', '', '', '', '5 % Dextrose IV Infusion. 1000 ml', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'jksdfkhsdjkf', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `itest`
--

CREATE TABLE IF NOT EXISTS `itest` (
  `id` int(6) NOT NULL,
  `dname` varchar(100) NOT NULL,
  `ddate` varchar(100) NOT NULL,
  `dslot` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=264 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itest`
--

INSERT INTO `itest` (`id`, `dname`, `ddate`, `dslot`, `status`) VALUES
(1, 'steven', '02/28/2018', '10:00AM', 'AVAILABLE'),
(2, 'steven', '02/27/2018', '9:00AM', ''),
(3, 'steven', '02/27/2018', '10:00AM', ''),
(4, 'steven', '02/27/2018', '9:00AM', ''),
(5, 'steven', '02/27/2018', '10:00AM', ''),
(6, 'steven', '02/27/2018', '', ''),
(7, 'steven', '02/27/2018', '', ''),
(8, 'steven', '02/27/2018', '', ''),
(9, 'steven', '02/27/2018', '', ''),
(10, 'steven', '02/27/2018', '', ''),
(11, 'steven', '02/27/2018', '', ''),
(12, 'steven', '02/27/2018', '', ''),
(13, 'steven', '02/27/2018', '', ''),
(14, 'steven', '02/27/2018', '', ''),
(15, 'steven', '02/27/2018', '', ''),
(16, 'steven', '02/27/2018', '9:00AM', ''),
(17, 'steven', '02/27/2018', '10:00AM', ''),
(18, 'steven', '02/27/2018', '', ''),
(19, 'steven', '02/27/2018', '', ''),
(20, 'steven', '02/27/2018', '', ''),
(21, 'steven', '02/27/2018', '', ''),
(22, 'steven', '02/27/2018', '', ''),
(23, 'steven', '02/27/2018', '', ''),
(24, 'steven', '02/27/2018', '', ''),
(25, 'steven', '02/27/2018', '', ''),
(26, 'steven', '02/27/2018', '', ''),
(27, 'adman', '02/24/2018', '9:00AM', 'BOOKED'),
(28, 'adman', '02/24/2018', '10:00AM', 'Booked'),
(29, 'adman', '02/24/2018', '11:00AM', 'Booked'),
(30, 'adman', '02/24/2018', '12:00PM', ''),
(31, 'adman', '02/24/2018', '', ''),
(32, 'adman', '02/24/2018', '', ''),
(33, 'adman', '02/24/2018', '', ''),
(34, 'adman', '02/24/2018', '', ''),
(35, 'adman', '02/24/2018', '', ''),
(36, 'adman', '02/24/2018', '', ''),
(37, 'adman', '02/24/2018', '', ''),
(38, 'steven', '02/25/2018', '9:00AM', 'Booked'),
(39, 'steven', '02/25/2018', '10:00AM', ''),
(40, 'steven', '02/25/2018', '11:00AM', ''),
(41, 'steven', '02/25/2018', '12:00PM', ''),
(42, 'steven', '02/25/2018', 'OT', ''),
(43, 'steven', '02/25/2018', 'OT', ''),
(44, 'steven', '02/25/2018', 'OT', ''),
(45, 'steven', '02/25/2018', 'OT', ''),
(46, 'steven', '02/25/2018', 'OT', ''),
(47, 'steven', '02/25/2018', 'OT', ''),
(48, 'steven', '02/25/2018', 'OT', ''),
(49, 'steven', '02/25/2018', '9:00AM', 'Booked'),
(50, 'steven', '02/25/2018', '10:00AM', 'AVAILABLE'),
(51, 'steven', '02/25/2018', '11:00AM', 'AVAILABLE'),
(52, 'steven', '02/25/2018', '12:00PM', 'AVAILABLE'),
(53, 'steven', '02/25/2018', 'OT', 'AVAILABLE'),
(54, 'steven', '02/25/2018', 'OT', 'AVAILABLE'),
(55, 'steven', '02/25/2018', 'OT', 'AVAILABLE'),
(56, 'steven', '02/25/2018', 'OT', 'AVAILABLE'),
(57, 'steven', '02/25/2018', 'OT', 'AVAILABLE'),
(58, 'steven', '02/25/2018', 'OT', 'AVAILABLE'),
(59, 'steven', '02/25/2018', 'OT', 'AVAILABLE'),
(71, 'steven', '02/28/2018', '9:00AM', 'AVAILABLE'),
(72, 'steven', '02/28/2018', '10:00AM', 'AVAILABLE'),
(73, 'steven', '02/28/2018', '11:00AM', 'AVAILABLE'),
(74, 'steven', '02/28/2018', '', 'AVAILABLE'),
(75, 'steven', '02/28/2018', '', 'AVAILABLE'),
(76, 'steven', '02/28/2018', '', 'AVAILABLE'),
(77, 'steven', '02/28/2018', '', 'AVAILABLE'),
(78, 'steven', '02/28/2018', '', 'AVAILABLE'),
(79, 'steven', '02/28/2018', '', 'AVAILABLE'),
(80, 'steven', '02/28/2018', '', 'AVAILABLE'),
(81, 'steven', '02/28/2018', '', 'AVAILABLE'),
(82, 'steven', '02/01/2018', '9:00AM', 'AVAILABLE'),
(83, 'steven', '02/01/2018', '10:00AM', 'AVAILABLE'),
(84, 'steven', '02/01/2018', '', 'AVAILABLE'),
(85, 'steven', '02/01/2018', '', 'AVAILABLE'),
(86, 'steven', '02/01/2018', '', 'AVAILABLE'),
(87, 'steven', '02/01/2018', '', 'AVAILABLE'),
(88, 'steven', '02/01/2018', '', 'AVAILABLE'),
(89, 'steven', '02/01/2018', '', 'AVAILABLE'),
(90, 'steven', '02/01/2018', '', 'AVAILABLE'),
(91, 'steven', '02/01/2018', '', 'AVAILABLE'),
(92, 'steven', '02/01/2018', '', 'AVAILABLE'),
(93, 'adman', '02/03/2018', '9:00AM', 'Booked'),
(94, 'adman', '02/03/2018', '10:00AM', 'AVAILABLE'),
(95, 'adman', '02/03/2018', '', 'AVAILABLE'),
(96, 'adman', '02/03/2018', '', 'AVAILABLE'),
(97, 'adman', '02/03/2018', '', 'AVAILABLE'),
(98, 'adman', '02/03/2018', '', 'AVAILABLE'),
(99, 'adman', '02/03/2018', '', 'AVAILABLE'),
(100, 'adman', '02/03/2018', '', 'AVAILABLE'),
(101, 'adman', '02/03/2018', '', 'AVAILABLE'),
(102, 'adman', '02/03/2018', '', 'AVAILABLE'),
(103, 'adman', '02/03/2018', '', 'AVAILABLE'),
(104, 'adman', '02/03/2018', '9:00AM', 'Booked'),
(105, 'adman', '02/03/2018', '10:00AM', 'AVAILABLE'),
(106, 'adman', '02/03/2018', '', 'AVAILABLE'),
(107, 'adman', '02/03/2018', '', 'AVAILABLE'),
(108, 'adman', '02/03/2018', '', 'AVAILABLE'),
(109, 'adman', '02/03/2018', '', 'AVAILABLE'),
(110, 'adman', '02/03/2018', '', 'AVAILABLE'),
(111, 'adman', '02/03/2018', '', 'AVAILABLE'),
(112, 'adman', '02/03/2018', '', 'AVAILABLE'),
(113, 'adman', '02/03/2018', '', 'AVAILABLE'),
(114, 'adman', '02/03/2018', '', 'AVAILABLE'),
(115, 'adman', '02/03/2018', '9:00AM', 'Booked'),
(116, 'adman', '02/03/2018', '10:00AM', 'AVAILABLE'),
(117, 'adman', '02/03/2018', '', 'AVAILABLE'),
(118, 'adman', '02/03/2018', '', 'AVAILABLE'),
(119, 'adman', '02/03/2018', '', 'AVAILABLE'),
(120, 'adman', '02/03/2018', '', 'AVAILABLE'),
(121, 'adman', '02/03/2018', '', 'AVAILABLE'),
(122, 'adman', '02/03/2018', '', 'AVAILABLE'),
(123, 'adman', '02/03/2018', '', 'AVAILABLE'),
(124, 'adman', '02/03/2018', '', 'AVAILABLE'),
(125, 'adman', '02/03/2018', '', 'AVAILABLE'),
(126, 'steven', '02/23/2018', '9:00AM', 'Booked'),
(127, 'steven', '02/23/2018', '10:00AM', 'AVAILABLE'),
(128, 'steven', '02/23/2018', '', 'AVAILABLE'),
(129, 'steven', '02/23/2018', '', 'AVAILABLE'),
(130, 'steven', '02/23/2018', '', 'AVAILABLE'),
(131, 'steven', '02/23/2018', '', 'AVAILABLE'),
(132, 'steven', '02/23/2018', '', 'AVAILABLE'),
(133, 'steven', '02/23/2018', '', 'AVAILABLE'),
(134, 'steven', '02/23/2018', '', 'AVAILABLE'),
(135, 'steven', '02/23/2018', '', 'AVAILABLE'),
(136, 'steven', '02/23/2018', '', 'AVAILABLE'),
(137, 'steven', '03/11/2018', '9:00AM', 'Booked'),
(138, 'steven', '03/11/2018', '10:00AM', 'Booked'),
(139, 'steven', '03/11/2018', '11:00AM', 'Booked'),
(140, 'steven', '03/11/2018', '', 'AVAILABLE'),
(141, 'steven', '03/11/2018', '', 'AVAILABLE'),
(142, 'steven', '03/11/2018', '', 'AVAILABLE'),
(143, 'steven', '03/11/2018', '', 'AVAILABLE'),
(144, 'steven', '03/11/2018', '', 'AVAILABLE'),
(145, 'steven', '03/11/2018', '', 'AVAILABLE'),
(146, 'steven', '03/11/2018', '', 'AVAILABLE'),
(147, 'steven', '03/11/2018', '', 'AVAILABLE'),
(148, 'steven', '03/11/2018', '10:00AM', 'Booked'),
(149, 'steven', '03/11/2018', '12:00PM', 'Booked'),
(150, 'steven', '03/11/2018', '', 'AVAILABLE'),
(151, 'steven', '03/11/2018', '', 'AVAILABLE'),
(152, 'steven', '03/11/2018', '', 'AVAILABLE'),
(153, 'steven', '03/11/2018', '', 'AVAILABLE'),
(154, 'steven', '03/11/2018', '', 'AVAILABLE'),
(155, 'steven', '03/11/2018', '', 'AVAILABLE'),
(156, 'steven', '03/11/2018', '', 'AVAILABLE'),
(157, 'steven', '03/11/2018', '', 'AVAILABLE'),
(158, 'steven', '03/11/2018', '', 'AVAILABLE'),
(159, 'steven', '03/12/2018', '9:00AM', 'Booked'),
(160, 'steven', '03/12/2018', '10:00AM', 'Booked'),
(161, 'steven', '03/12/2018', '11:00AM', 'Booked'),
(162, 'steven', '03/12/2018', '12:00PM', 'Booked'),
(163, 'steven', '03/12/2018', '1:00PM', 'Booked'),
(164, 'steven', '03/12/2018', '2:00PM', 'Booked'),
(165, 'steven', '03/12/2018', '3:00PM', 'Booked'),
(166, 'steven', '03/12/2018', '4:00PM', 'Booked'),
(167, 'steven', '03/12/2018', '', 'AVAILABLE'),
(168, 'steven', '03/12/2018', '', 'AVAILABLE'),
(169, 'steven', '03/12/2018', '', 'AVAILABLE'),
(170, 'steven', '03/13/2018', '9:00AM', 'Booked'),
(171, 'steven', '03/13/2018', '10:00AM', 'Booked'),
(172, 'steven', '03/13/2018', '11:00AM', 'Booked'),
(173, 'steven', '03/13/2018', '12:00PM', 'Booked'),
(174, 'steven', '03/13/2018', '1:00PM', 'AVAILABLE'),
(175, 'steven', '03/13/2018', '2:00PM', 'AVAILABLE'),
(176, 'steven', '03/13/2018', '3:00PM', 'AVAILABLE'),
(177, 'steven', '03/13/2018', '4:00PM', 'AVAILABLE'),
(178, 'steven', '03/13/2018', '', 'AVAILABLE'),
(179, 'steven', '03/13/2018', '', 'AVAILABLE'),
(180, 'steven', '03/13/2018', '', 'AVAILABLE'),
(181, 'steven', '03/14/2018', '9:00AM', 'Booked'),
(182, 'steven', '03/14/2018', '10:00AM', 'Booked'),
(183, 'steven', '03/14/2018', '11:00AM', 'Booked'),
(184, 'steven', '03/14/2018', '12:00PM', 'Booked'),
(185, 'steven', '03/14/2018', '', 'AVAILABLE'),
(186, 'steven', '03/14/2018', '', 'AVAILABLE'),
(187, 'steven', '03/14/2018', '', 'AVAILABLE'),
(188, 'steven', '03/14/2018', '', 'AVAILABLE'),
(189, 'steven', '03/14/2018', '', 'AVAILABLE'),
(190, 'steven', '03/14/2018', '', 'AVAILABLE'),
(191, 'steven', '03/14/2018', '', 'AVAILABLE'),
(192, 'steven', '03/14/2018', '3:00PM', 'Booked'),
(193, 'steven', '03/14/2018', '4:00PM', 'Booked'),
(194, 'steven', '03/14/2018', '', 'AVAILABLE'),
(195, 'steven', '03/14/2018', '', 'AVAILABLE'),
(196, 'steven', '03/14/2018', '', 'AVAILABLE'),
(197, 'steven', '03/14/2018', '', 'AVAILABLE'),
(198, 'steven', '03/14/2018', '', 'AVAILABLE'),
(199, 'steven', '03/14/2018', '', 'AVAILABLE'),
(200, 'steven', '03/14/2018', '', 'AVAILABLE'),
(201, 'steven', '03/14/2018', '', 'AVAILABLE'),
(202, 'steven', '03/14/2018', '', 'AVAILABLE'),
(203, 'adman', '03/14/2018', '9:00AM', 'AVAILABLE'),
(204, 'adman', '03/14/2018', '9:00AM', 'AVAILABLE'),
(205, 'adman', '03/14/2018', '11:00AM', 'AVAILABLE'),
(206, 'adman', '03/14/2018', '', 'AVAILABLE'),
(207, 'steven', '03/15/2018', '9:00AM', 'Booked'),
(208, 'steven', '03/15/2018', '10:00AM', 'Booked'),
(209, 'steven', '03/15/2018', '11:00AM', 'AVAILABLE'),
(210, 'steven', '03/15/2018', '12:00PM', 'AVAILABLE'),
(211, 'steven', '03/15/2018', '9:00AM', 'Booked'),
(212, 'steven', '03/15/2018', '10:00AM', 'Booked'),
(213, 'steven', '03/15/2018', '11:00AM', 'AVAILABLE'),
(214, 'steven', '03/15/2018', '12:00PM', 'AVAILABLE'),
(215, 'steven', '03/16/2018', '9:00AM', 'Booked'),
(216, 'steven', '03/16/2018', '10:00AM', 'Booked'),
(217, 'steven', '03/16/2018', '11:00AM', 'Booked'),
(218, 'steven', '03/16/2018', '12:00PM', 'AVAILABLE'),
(219, 'steven', '03/16/2018', '1:00PM', 'AVAILABLE'),
(220, 'steven', '03/16/2018', '2:00PM', 'AVAILABLE'),
(221, 'steven', '03/16/2018', '3:00PM', 'AVAILABLE'),
(222, 'steven', '03/16/2018', '4:00PM', 'AVAILABLE'),
(223, 'steven', '03/17/2018', '9:00AM', 'Booked'),
(224, 'steven', '03/17/2018', '10:00AM', 'Booked'),
(225, 'adman', '03/17/2018', '9:00AM', 'Booked'),
(226, 'adman', '03/17/2018', '10:00AM', 'AVAILABLE'),
(227, 'adman', '03/17/2018', '11:00AM', 'AVAILABLE'),
(228, 'steven', '03/18/2018', '9:00AM', 'Booked'),
(229, 'steven', '03/18/2018', '10:00AM', 'AVAILABLE'),
(230, 'steven', '03/18/2018', '11:00AM', 'AVAILABLE'),
(231, 'steven', '03/19/2018', '9:00AM', 'Booked'),
(232, 'steven', '03/19/2018', '10:00AM', 'Booked'),
(233, 'steven', '03/19/2018', '9:00AM', 'Booked'),
(234, 'steven', '03/19/2018', '10:00AM', 'Booked'),
(235, 'steven', '03/19/2018', '11:00AM', 'Booked'),
(236, 'steven', '03/20/2018', '10:00AM', 'Booked'),
(237, 'steven', '03/24/2018', '9:00AM', 'Booked'),
(238, 'steven', '03/24/2018', '10:00AM', 'AVAILABLE'),
(239, 'steven', '03/24/2018', '11:00AM', 'AVAILABLE'),
(240, 'steven', '03/24/2018', '12:00PM', 'AVAILABLE'),
(241, 'steven', '03/25/2018', '9:00AM', 'Booked'),
(242, 'steven', '03/25/2018', '10:00AM', 'Booked'),
(243, 'steven', '03/25/2018', '11:00AM', 'Booked'),
(244, 'steven', '03/26/2018', '9:00AM', 'Booked'),
(245, 'steven', '03/26/2018', '10:00AM', 'Booked'),
(246, 'steven', '03/27/2018', '9:00AM', 'Booked'),
(247, 'steven', '03/27/2018', '10:00AM', 'Booked'),
(248, 'steven', '04/11/2018', '9:00AM', 'Booked'),
(249, 'steven', '04/12/2018', '11:00AM', 'Booked'),
(250, 'steven', '04/12/2018', '9:00AM', 'Booked'),
(251, 'steven', '04/12/2018', '10:00AM', 'Booked'),
(252, 'steven', '04/12/2018', '11:00AM', 'Booked'),
(253, 'steven', '04/11/2018', '11:00AM', 'AVAILABLE'),
(254, 'steven', '04/12/2018', '2:00PM', 'Booked'),
(255, 'adman', '04/28/2018', '9:00AM', 'Booked'),
(256, 'adman', '04/28/2018', '10:00AM', 'AVAILABLE'),
(257, 'adman', '04/28/2018', '11:00AM', 'AVAILABLE'),
(258, 'steven', '04/27/2018', '11:00AM', 'AVAILABLE'),
(259, 'steven', '04/27/2018', '10:00AM', 'AVAILABLE'),
(260, 'steven', '04/27/2018', '1:00PM', 'AVAILABLE'),
(261, 'steven', '04/28/2018', '9:00AM', 'Booked'),
(262, 'steven', '04/28/2018', '10:00AM', 'AVAILABLE'),
(263, 'steven', '04/28/2018', '11:00AM', 'AVAILABLE');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE IF NOT EXISTS `medicine` (
  `id` int(6) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `brand1` varchar(100) NOT NULL,
  `brand2` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=657 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`id`, `mname`, `brand1`, `brand2`) VALUES
(2, '0.9% Sodium chloride IV Infusion 1000ml', '', ''),
(3, '0.9% Sodium Chloride IV Infusion 500 ml', '', ''),
(4, '0.9%Sodium Chloride+5%Dextrose  1000 ml', '', ''),
(5, '10 % Dextrose IV Infusion 1000 ml', '', ''),
(6, '10% Fat Emulsion', '', ''),
(7, '10%Dextrose+0.225%Sodium Chloride', '', ''),
(8, '20% Mannitol 500ml', '', ''),
(9, '25% Dextrose 100 ml Infusion', '', ''),
(10, '5 % Dextrose IV Infusion. 1000 ml', '', ''),
(11, '5%Composit Amino Acid+D-Sorbitol', '', ''),
(12, '5%Dextrose+0.225%Sodium Chloride', '', ''),
(13, '6%hydroxyethyl starch 500ml', '', ''),
(14, 'ABCDerma Hydrant', '', ''),
(15, 'Aceclofenac 100mg Tablet', '', ''),
(16, 'A-Cerumen Ear Hygine 2ml', '', ''),
(17, 'Acetic Acid 5% Solution', '', ''),
(18, 'Acetylcysteine 600mg Tablet', '', ''),
(19, 'Acitretin 10mg Capsule', '', ''),
(20, 'Activated Charcoal 250 mg Tablet', '', ''),
(21, 'Acyclovir 200mg Tablet', '', ''),
(22, 'Acyclovir 200mg/5ml Syrup', '', ''),
(23, 'Acyclovir 250mg injection', '', ''),
(24, 'Acyclovir 400mg Tablet', '', ''),
(25, 'Acyclovir 500mg Injection', '', ''),
(26, 'Adenosine  6mg / 2ml? Injection', '', ''),
(27, 'Adhatoda Vasica extract+Honey', '', ''),
(28, 'Adrenaline 1 mg/1 ml Injection', '', ''),
(29, 'Al.hydro.+Mag.hydro.+Simethicone Suspension', '', ''),
(30, 'Al.hydro.+Mag.hydro.+Simethicone Tablet', '', ''),
(31, 'Albendazole 200 mg/5ml  Suspension', '', ''),
(32, 'Albendazole 400 mgTablet', '', ''),
(33, 'Alfuzosin 10 mg Tablet', '', ''),
(34, 'Alzesartan 40 mg Tablet', '', ''),
(35, 'Ambrisentan 5mg Tablet', '', ''),
(36, 'Ambroxol 15mg/5ml syrup', '', ''),
(37, 'Ambroxol 6mg/ml Paediatric Drop', '', ''),
(38, 'Aminophylline 125 mg/5ml injection', '', ''),
(39, 'Amiodarone 100 mg Tablet', '', ''),
(40, 'Amiodarone 150 mg/3ml injection', '', ''),
(41, 'Amiodarone 200 mg Tablet', '', ''),
(42, 'Amitriptyline 10 mg Tablet', '', ''),
(43, 'Amitriptyline 25 mg Tablet', '', ''),
(44, 'Amlodipine 10 mg Tablet', '', ''),
(45, 'Amlodipine 5 mg Tablet', '', ''),
(46, 'Amlodipine 5mg +Olmesartan 20mg Tablet', '', ''),
(47, 'Amlodipine 5mg +Olmesartan 40mg Tablet', '', ''),
(48, 'Amlodipine5mg+Atenolol50mg Tablet', '', ''),
(49, 'Amlodipine5mg+Atorvastatin10mg Tablet', '', ''),
(50, 'Amlosartan+Valsartan 5/160 mg Tablet', '', ''),
(51, 'Amlosartan+Valsartan 5/80 mg Tablet', '', ''),
(52, 'Amoxicillin  250 mg Tablet', '', ''),
(53, 'Amoxicillin  500 mg Tablet', '', ''),
(54, 'Amoxicillin 125mg/5ml PFS', '', ''),
(55, 'Amoxicillin 250 mg Capsule', '', ''),
(56, 'Amoxicillin 250mg+Clavula.acid 31.25mg PFS', '', ''),
(57, 'Amoxicillin 500 mg Capsule', '', ''),
(58, 'Amoxicillin 500mg injection', '', ''),
(59, 'Amoxicillin+Clav.Acid 0.6 gm', '', ''),
(60, 'Amoxicillin+Clav.Acid 1.2 gm Injection', '', ''),
(61, 'Amoxicillin+Clavu.Acid 1 gm Tablet', '', ''),
(62, 'Amoxicillin+Clavu.Acid 375 mg Tablet', '', ''),
(63, 'Amoxicillin+Clavu.Acid 625mg Tablet', '', ''),
(64, 'Ampicillin 250 mg Injection', '', ''),
(65, 'Ampicillin 500mg Injection', '', ''),
(66, 'Artemether+Lumefantrine 20/120 mg Tablet', '', ''),
(67, 'Aspirin 75 mg Tablet', '', ''),
(68, 'Astaxanthin 4mg  Capsule', '', ''),
(69, 'Atorvastatin 10mg  Tablet', '', ''),
(70, 'Atorvastatin 20 mg  Tablet', '', ''),
(71, 'Atracurium 10 mg injection', '', ''),
(72, 'Atropine Sulphate 0.6mg/ml injection', '', ''),
(73, 'Azelastine+Fluticasone nasal spray', '', ''),
(74, 'Azithromycin 200mg/5ml PFS', '', ''),
(75, 'Azithromycin 250mg Tablet', '', ''),
(76, 'Azithromycin 500 mg Tablet', '', ''),
(77, 'Azithromycin 500mg injection', '', ''),
(78, 'Bacitracin+Neomycin Ointment', '', ''),
(79, 'Bacitracin+Neomycin Powder', '', ''),
(80, 'Benzoic Acid6%+Salicylic Acid3% ointment', '', ''),
(81, 'Betahistine 16 mg Tablet', '', ''),
(82, 'Betahistine 8 mg Tablet', '', ''),
(83, 'Betamethasone 0.05% Ointment', '', ''),
(84, 'Betamethasone 0.1% Ointment', '', ''),
(85, 'Bethanical 25mg Tablet', '', ''),
(86, 'Bimatoprost 0.03% E/D', '', ''),
(87, 'Biotin 1000mg Tablet', '', ''),
(88, 'Bisoprolol 2. 5mg Tablet', '', ''),
(89, 'Bisoprolol 5mg Tablet', '', ''),
(90, 'Boric Powder', '', ''),
(91, 'Bosentan 62.5mg Tablet', '', ''),
(92, 'Brimonidine+Timolol E/D', '', ''),
(93, 'Brinzolamide 1% E/D', '', ''),
(94, 'Bromazepam 3 mg Tablet', '', ''),
(95, 'Bromfenac 0.09% E/D', '', ''),
(96, 'Budesonide 0.5mg/2ml Nebu. Soln.', '', ''),
(97, 'Budesonide nasal spray', '', ''),
(98, 'Budesonide+Formoterol 6/100 cozycap', '', ''),
(99, 'Budesonide+Formoterol 6/200 cozycap', '', ''),
(100, 'Bupivacaine + Dextrose', '', ''),
(101, 'Bupivacaine 0.5 %', '', ''),
(102, 'Butamirate Citrate 7.5mg/5ml Syrup', '', ''),
(103, 'Cabergoline 0.5mg Tablet', '', ''),
(104, 'Calcitriol 0.25mcg Capsule', '', ''),
(105, 'Calcium 500mg+Vit-D3 200iu Tablet', '', ''),
(106, 'Calcium 600mg+Vit.D3 400iu', '', ''),
(107, 'Calcium Acetate 667mg Tablet', '', ''),
(108, 'Calcium Carbonate 500mg Tablet', '', ''),
(109, 'Calcium Citrate 252mg+Calcitriol 0.25mcg Tablet', '', ''),
(110, 'Calcium Gluconate 10 % Injection', '', ''),
(111, 'Calcium Orotate 40mg Tablet', '', ''),
(112, 'Calcium Orotate 740 mg Tablet', '', ''),
(113, 'Calcium Resonium Powder', '', ''),
(114, 'Calcium+Vit-D3+Minerals', '', ''),
(115, 'Captopril 25 mg Tablet', '', ''),
(116, 'Carbamazepine 200mg Tablet', '', ''),
(117, 'Carbonyl Iron+Folic Acid+Zinc Capsule', '', ''),
(118, 'Carboxy Methyl Cellulose E/Gel', '', ''),
(119, 'Carboxymethylcellulose sodium 1% E/D', '', ''),
(120, 'Carboxymethylcellulose+Glycerin E/D', '', ''),
(121, 'Carvedilol 6.25mg Tablet', '', ''),
(122, 'Cefepime 2gm Injection', '', ''),
(123, 'Cefepime 500mg Injection', '', ''),
(124, 'Cefixime 100mg/5ml PFS', '', ''),
(125, 'Cefixime 200 Capsule', '', ''),
(126, 'Cefixime 200mg Tablet', '', ''),
(127, 'Cefixime 200mg/5ml PFS', '', ''),
(128, 'Cefixime 400mg Capsule', '', ''),
(129, 'Cefixime 400mg Tablet', '', ''),
(130, 'Cefotaxime 1gm Injection', '', ''),
(131, 'Cefotaxime 25mg Injection', '', ''),
(132, 'Cefpodoxime 20mg/ml Paed.Drop', '', ''),
(133, 'Cefpodoxime 40mg/5ml PFS', '', ''),
(134, 'Ceftazidime 1gm Injection', '', ''),
(135, 'Ceftazidime 250mg Injection', '', ''),
(136, 'Ceftazidime 500mg Injection', '', ''),
(137, 'Ceftriaxone 1gm IV Injection', '', ''),
(138, 'Ceftriaxone 2 gm IV Injection', '', ''),
(139, 'Ceftriaxone 500 iv injection', '', ''),
(140, 'Cefuroxime 1.5gm Injection', '', ''),
(141, 'Cefuroxime 250 mg Tablet', '', ''),
(142, 'Cefuroxime 500mg Tablet', '', ''),
(143, 'Cefuroxime 750mg Injection', '', ''),
(144, 'Cefuroxime250mg+Clavulanic Acid 62.5mg Tablet', '', ''),
(145, 'Cefuroxime500mg+Clavulanic Acid125mg Tablet', '', ''),
(146, 'Celecoxib 100 mg Capsule', '', ''),
(147, 'Cephradine 100mg/ml Paed.Drop', '', ''),
(148, 'Cephradine 125mg/5ml PFS', '', ''),
(149, 'Cephradine 500 Injection', '', ''),
(150, 'Cephradine 500mg Capsule', '', ''),
(151, 'Cetirizine 5mg/5ml Syrup', '', ''),
(152, 'Chloram.Beclome.Clotrim.Lidocaine Ear Drop', '', ''),
(153, 'Chloramphenicol 0.5% E/D', '', ''),
(154, 'Chloramphenicol 0.5% Eye Ointment', '', ''),
(155, 'Chlordiazepoxide+Amitriptyline Tablet', '', ''),
(156, 'Chlorhexidine 0.5% in 70% IPA 250ml', '', ''),
(157, 'Chlorhexidine 0.5% in 70% IPA 50ml', '', ''),
(158, 'Chlorhexidine gluconate 0.2% Mouthwash', '', ''),
(159, 'Chlorhexidine Gluconate 7.1% Solution', '', ''),
(160, 'Chlorinated water', '', ''),
(161, 'Cholera Saline 1000ml', '', ''),
(162, 'Cholera Saline 500ml', '', ''),
(163, 'Cildipine 5mg Tablet', '', ''),
(164, 'Cilostazol 100mg Tablet', '', ''),
(165, 'Ciprofloxacin 0.3 % E/D', '', ''),
(166, 'Ciprofloxacin 0.3% E/oint', '', ''),
(167, 'Ciprofloxacin 200mg IV infusion', '', ''),
(168, 'Ciprofloxacin 250 tablet', '', ''),
(169, 'Ciprofloxacin 500mg tablet', '', ''),
(170, 'Ciprofloxacin+Hydrocortisone Ear Drop', '', ''),
(172, 'Ciprofloxacin0.3%+Dexamethasone0.1% E/D', '', ''),
(173, 'Ciprofloxacin0.3%+Hydrocortisone1% E/E Drop ', '', ''),
(174, 'Citric Acid Solution', '', ''),
(175, 'Clarithromycin 125/5ml Suspension', '', ''),
(176, 'Clarithromycin 500mg Tablet', '', ''),
(177, 'Clindamycin 150mg Capsule', '', ''),
(178, 'Clindamycin 300mg Capsule', '', ''),
(179, 'Clindamycin 300mg Injection', '', ''),
(180, 'Clindamycin 600mg Injection', '', ''),
(181, 'Clonazepam 0.5 mg  Tablet', '', ''),
(182, 'Clonazepam 1mg  Tablet', '', ''),
(183, 'Clonazepam 2mg  Tablet', '', ''),
(184, 'Clopidogrel Tablet', '', ''),
(185, 'Clopidogrel+Aspirin Tablet', '', ''),
(186, 'Clotrimazole 1% Cream', '', ''),
(187, 'Clotrimazole 1% Ear Preparation', '', ''),
(188, 'Cloxacillin 500mg Capsule', '', ''),
(189, 'Coaltar 2% Ointment', '', ''),
(190, 'Cod Liver Oil Capsule', '', ''),
(191, 'Colchicine 0.6mg Tablet', '', ''),
(192, 'Colistimethate Sodium 1million iu Injection', '', ''),
(193, 'Conjugated Estrogens ', '', ''),
(194, 'Coral Calcium 500mg+Vit-D3 200iu', '', ''),
(195, 'Cranberry', '', ''),
(196, 'Danazol 100mg Capsule', '', ''),
(197, 'Darifenacin 7.5 mg Tablet', '', ''),
(198, 'Decycloverine 10mg/5ml Syrup', '', ''),
(199, 'Deflazacort 24mg Tablet', '', ''),
(200, 'Deflazacort 5mg Tablet', '', ''),
(201, 'Desloratadine 5mg Tablet', '', ''),
(202, 'Desloratadine Syrup', '', ''),
(203, 'Desvenlafaxine 50mg Tablet', '', ''),
(204, 'Dexamethasone 0.05% E/Oint.', '', ''),
(205, 'Dexamethasone 0.1% E/D', '', ''),
(206, 'Dexamethasone 0.1%+Chloramphenicol0.5% E/D', '', ''),
(207, 'Dexamethasone 5mg/ml Injection', '', ''),
(208, 'Dexibuprofen 100mg/5ml Suspension', '', ''),
(209, 'Dexibuprofen 300mg Tablrt', '', ''),
(210, 'Dexibuprofen 400mg Tablrt', '', ''),
(211, 'Dextran 70 + Hypromell E/D', '', ''),
(212, 'Dextromethorphan 10mg/5ml Syrup', '', ''),
(213, 'Diacerin 50+Glucosamine 750 Tablet', '', ''),
(214, 'Diazepam 5 mg  Tablet', '', ''),
(215, 'Diclofenac + Lidocaine Injection', '', ''),
(216, 'Diclofenac 12.5mg Suppository', '', ''),
(217, 'Diclofenac 46.5mg Tablet', '', ''),
(218, 'Diclofenac 75 mg Injection', '', ''),
(219, 'Diclofenac Diethylamine1.16% gel', '', ''),
(220, 'Diclofenac Sodium 25mg  Suppository', '', ''),
(221, 'Diclofenac Sodium 50 mg Tablet', '', ''),
(222, 'Diclofenac Sodium 50mg  Suppository', '', ''),
(223, 'Diclofenac+Methyl salicyl.+Menthol Cream', '', ''),
(224, 'Diclofenac+Misoprostol Tablet', '', ''),
(225, 'Diethylcarbamazine 50mg Tablet', '', ''),
(226, 'Difluprednate 0.05% E/D', '', ''),
(227, 'Digoxin 250 mcg Tablet', '', ''),
(228, 'Dobutamine Hydrochloride 250mg Injection', '', ''),
(229, 'Domperidone 10mg Tablet', '', ''),
(230, 'Domperidone 5mg/5ml Suspension', '', ''),
(231, 'Domperidone Paed. Drop', '', ''),
(232, 'Dopamine 200mg/5ml injection', '', ''),
(233, 'Dorzolamide2%+Timolol0.5% E/D', '', ''),
(234, 'Doxicycline 100mg Capsule', '', ''),
(235, 'Doxofylline 200mg Tablet', '', ''),
(236, 'Doxofylline 400mg Tablet', '', ''),
(237, 'Drospirenone+Ethinylestradiol Tablet', '', ''),
(238, 'Drotaverine 40mg Tablet', '', ''),
(239, 'Dulabi Tablet', '', ''),
(240, 'Duloxetine 30mg Capsule', '', ''),
(241, 'Dutasteride 0.5mg Capsule', '', ''),
(242, 'Ebastine 10mg Tablet', '', ''),
(243, 'Econazole+Triamcinolone Cream', '', ''),
(244, 'Enoxaporin 40mg/0.4ml injection', '', ''),
(245, 'Enoxaporin 60mg/0.6ml injection', '', ''),
(246, 'Enoxaporin 80mg/0.8ml injection', '', ''),
(247, 'Ephedrine 5mg Injection', '', ''),
(248, 'Eptifibatide 75mg/100ml injection', '', ''),
(249, 'Erythromycin 200mg/5ml PFS', '', ''),
(250, 'Erythromycin 250mg Tablet', '', ''),
(251, 'Erythromycin 500mg Tablet', '', ''),
(252, 'Esomeprazole 20mg Capsule', '', ''),
(253, 'Esomeprazole 20mg Mumps Tablet', '', ''),
(254, 'Esomeprazole 20mg Tablet', '', ''),
(255, 'Esomeprazole 40 IV/IM Injection', '', ''),
(256, 'Esomeprazole 40mg Capsule', '', ''),
(257, 'Estriol 0.1% Cream', '', ''),
(258, 'Etoricoxib 120mg Tablet', '', ''),
(259, 'Etoricoxib 60mg Tablet', '', ''),
(260, 'Etoricoxib 90mg Tablet', '', ''),
(261, 'EVENING PRIMROSE Oil 500mg Capsule', '', ''),
(262, 'Fexofenadine 120mg Tablet', '', ''),
(263, 'Fexofenadine 180mg Tablet', '', ''),
(264, 'Fexofenadine 30mg/5ml Suspension', '', ''),
(265, 'Fexofenadine 60mg Tablet', '', ''),
(266, 'Filgrastim 30miu(0.5ml) Injection', '', ''),
(267, 'Finasteride 1mg Tablet', '', ''),
(268, 'Finasteride 5mg tablet', '', ''),
(269, 'Finofibrate 200 Tablet', '', ''),
(270, 'Flavoxate 100mg Tablet', '', ''),
(271, 'Flucloxacillin 125mg/5ml PFS', '', ''),
(272, 'Flucloxacillin 250 mg capsule', '', ''),
(273, 'Flucloxacillin 250 mg injection', '', ''),
(274, 'Flucloxacillin 250mg/5ml PFS', '', ''),
(275, 'Flucloxacillin 500 Capsule', '', ''),
(276, 'Flucloxacillin 500 mg injection', '', ''),
(277, 'Fluconazole  150mg capsule', '', ''),
(278, 'Fluconazole  200mg capsule', '', ''),
(279, 'Fluconazole  2mg/ml IV Infusion', '', ''),
(280, 'Fluconazole  50mg capsule', '', ''),
(281, 'Fluconazole  50mg/5ml Suspension', '', ''),
(282, 'Flumazenil 0.5mg/5ml Injection', '', ''),
(283, 'Flunarizine 10 mg tablet', '', ''),
(284, 'Flunarizine 5 mg tablet', '', ''),
(285, 'Fluocinolone0.025% + Neomycin0.5% Ointment', '', ''),
(286, 'Fluorometholon+Gentamicin E/Oint.', '', ''),
(287, 'Fluorometholon+Tetrahydrozolin E/D', '', ''),
(289, 'Fluorometholone 0.1% E/D', '', ''),
(290, 'Fluoxetine 20mg', '', ''),
(291, 'Flupentixol 0.5mg Tablet', '', ''),
(292, 'Flupentixol+Melitracen Tablet', '', ''),
(293, 'Fluphenazine 0.5mg+Nortriptyline 10mg Tablet', '', ''),
(294, 'Fluticasone 0.05% Cream', '', ''),
(295, 'Frusemide 20 mg/2mL injection', '', ''),
(296, 'Furosemide 40 mg Tablet', '', ''),
(297, 'Furosemide20mg+Spironolactone50mg Tablet', '', ''),
(298, 'Furosemide40mg+Spironolactone50mg Tablet', '', ''),
(299, 'Ganciclovir 0.15% E/Gel', '', ''),
(300, 'Gatifloxacin 0.3% E/D', '', ''),
(301, 'Gentamycin 0.3% E/D', '', ''),
(302, 'Gentamycin 20 mg Injection', '', ''),
(303, 'Gentamycin 80 mg Injection', '', ''),
(304, 'Gentamycin Ointment', '', ''),
(305, 'Gliclazide  80 mg Tablet', '', ''),
(306, 'Gliclazide 60mg Tablet', '', ''),
(307, 'Glimepiride  2 mg Tablet', '', ''),
(308, 'Glimepiride 1mg Tablet', '', ''),
(309, 'Glucosamine 500 mg Tablet', '', ''),
(310, 'Glycerine+Liquid Sugar Syrup', '', ''),
(311, 'Glycerol+Hypromellose+PEG E/D', '', ''),
(312, 'Glyceryl TriNitarte injection', '', ''),
(313, 'Glyceryl Trinitrate Spray', '', ''),
(314, 'Glycine1.5% irrigation solution', '', ''),
(315, 'Haloperidol 10mg injection', '', ''),
(316, 'Haloperidol 5 mg Tablet', '', ''),
(317, 'Hartmann?s Solution 1000ml', '', ''),
(318, 'Hartmann''s Solution 500 ml', '', ''),
(319, 'Heparin 5000IU/ml Injection', '', ''),
(320, 'Hepatitis A (child)', '', ''),
(321, 'Hepatitis B Immunoglobulin', '', ''),
(322, 'Human Insulin 30/70 Penset', '', ''),
(323, 'Human Insulin 50/50 Penset', '', ''),
(324, 'Human Insulin N 100 IU', '', ''),
(325, 'Human Insulin R 100 IU', '', ''),
(326, 'Human Insulin R 40 IU', '', ''),
(327, 'Human Papiloma Virus T16&18 vaccine', '', ''),
(328, 'Hydrochlorothiazide 25mg Tablet', '', ''),
(329, 'Hydrocortisone  10mg Tablet', '', ''),
(330, 'Hydrocortisone 100mg/2ml  IV/IM injection', '', ''),
(331, 'Hydrogen Peroxide', '', ''),
(332, 'Hydroxychloroquine 200mg Tablet', '', ''),
(333, 'Hydroxyzine 10mg Tablet', '', ''),
(334, 'Hydroxyzine 10mg/5ml Syrup', '', ''),
(335, 'Hydroxyzine 25mg Tablet', '', ''),
(336, 'Hyoscine Butylbromide 10 mg tablet', '', ''),
(337, 'Hypromellose 0.3% E/D', '', ''),
(338, 'Hypromellose 0.8% E/D', '', ''),
(339, 'Ibandronic Acid 150mg Tablet', '', ''),
(340, 'Ibandronic Acid 3mg/3ml injection', '', ''),
(341, 'Icthymol 10% Glycerine', '', ''),
(342, 'Indepamide 1.5mg Tablet', '', ''),
(343, 'Indomethacin 25mg Capsule', '', ''),
(344, 'Indomethacin 75mg SR Capsule', '', ''),
(346, 'Infertility Supplement for men tablet', '', ''),
(347, 'Infertility Supplement for woman tablet', '', ''),
(348, 'Influenza vaccine', '', ''),
(349, 'Insulin 30/70 100 IU', '', ''),
(350, 'Insulin glargine', '', ''),
(351, 'Ipratropium Bromide Res. Solution', '', ''),
(352, 'Iron Polymaltose 500mg Injection', '', ''),
(353, 'Iron Sucrose IV Injection', '', ''),
(354, 'Iron+Vit.B-Complex+Zinc Syrup', '', ''),
(355, 'Ispaghula Husk Sachet', '', ''),
(356, 'Ivabradine 5mg Tablet', '', ''),
(357, 'Ketoconazole+Zn+Aloevera shampoo', '', ''),
(358, 'Ketorolac 10mg Tablet', '', ''),
(359, 'Ketorolac 30mg/ml Injection', '', ''),
(360, 'Ketorolac 60mg injection', '', ''),
(361, 'ketotifen 0.025 % E/D', '', ''),
(362, 'Ketotifen 1mg Tablet', '', ''),
(363, 'Ketotifen 1mg/5ml Syrup', '', ''),
(364, 'Labetalol 200mg Tablet', '', ''),
(365, 'Labetalol 50mg Injection', '', ''),
(366, 'Lactulose oral Solution', '', ''),
(367, 'Lansoprazole,Amoxicillin,clarithromycin Capsule', '', ''),
(368, 'Leflunomide 10mg tablet', '', ''),
(369, 'Letrozole 2.5mg Tablet', '', ''),
(370, 'Levetiracetam 250mg Tablet', '', ''),
(371, 'Levetiracetam 500mg Tablet', '', ''),
(372, 'Levetiracetam 500mg/5ml injection', '', ''),
(373, 'Levocetirizine 5mg Tablet', '', ''),
(374, 'Levocetirizine 5mg/5ml Syrup', '', ''),
(375, 'Levofloxacin 0.5% E/D', '', ''),
(376, 'Levofloxacin 1.5% E/D', '', ''),
(377, 'Levofloxacin 125mg/5ml Oral solution', '', ''),
(378, 'Levofloxacin 250mg Tablet', '', ''),
(379, 'Levofloxacin 500mg Injection', '', ''),
(380, 'Levofloxacin 500mg Tablet', '', ''),
(381, 'Levofloxacin 750mg Tablet', '', ''),
(382, 'Levosalbutamol 0.63mg Neb. Solution', '', ''),
(383, 'Levosalbutamol 1mg/5ml Syrup', '', ''),
(384, 'Levosalbutamol 2mg Tablet', '', ''),
(385, 'Levothyroxine 25mcg Tablet', '', ''),
(386, 'Lidocaine 2% injection', '', ''),
(387, 'Lidocaine 2% jelly', '', ''),
(388, 'Lidocaine+ Adrenaline Injection', '', ''),
(389, 'Light paraffin+White Paraffin Cream', '', ''),
(390, 'Linagliptin 5mg Tablet', '', ''),
(391, 'Liquid Sugar+glycerol syrup', '', ''),
(392, 'lomifloxacin 0.3% Eye Drop', '', ''),
(393, 'Loratadine  10mg Tablet', '', ''),
(394, 'Losartan Potas.50mg+Hydrochlorothiazide12.5mg Tablet', '', ''),
(395, 'Losartan Potassium 25mg Tablet', '', ''),
(396, 'Losartan Potassium 50mg Tablet', '', ''),
(397, 'Loteprednol 0.5 % Gel', '', ''),
(398, 'Loteprednol+Gatifloxacin E/D', '', ''),
(399, 'Loteprednol0.5%+Tobramycin0.3%', '', ''),
(400, 'Lubiprostone 24mcg', '', ''),
(401, 'Lubiprostone 8 mcg', '', ''),
(402, 'Magaldrate+Simethicone Suspension', '', ''),
(403, 'Magnesium Hydrox.+Liquid Paraffin Suspension', '', ''),
(404, 'Magnesium Hydroxide 400 mg/5ml Suspension', '', ''),
(405, 'Magnesium Oxide 365mg Tablet', '', ''),
(406, 'Magnesium sulphate 2.47gm/5ml Injection', '', ''),
(407, 'Mebendazole 100mg tablet', '', ''),
(408, 'Mebendazole 100mg/5ml Suspension', '', ''),
(409, 'Mebeverine 200mg Tablet', '', ''),
(410, 'Mebeverine Hydrochloride135mg tablet', '', ''),
(411, 'Mefenamic Acid 50mg/5ml Suspension', '', ''),
(412, 'Memantine 5mg Tablet', '', ''),
(413, 'Meningococcal Polysaccharide vaccine', '', ''),
(414, 'Meropenem 1gm Injection', '', ''),
(415, 'Meropenem 250mg Injection', '', ''),
(416, 'Meropenem 500 mg Injection', '', ''),
(417, 'Metformin 500mg Tablet', '', ''),
(418, 'Metformin 750mg Tablet', '', ''),
(419, 'Metformin 850 + Vildagliptin 50 mg Tablet', '', ''),
(420, 'Metformin 850 mg Tablet', '', ''),
(421, 'Metformin+Sitagliptin500/50mg tablet', '', ''),
(422, 'Metformin500+Vildagliptin50 mg Tablet', '', ''),
(423, 'Methotrexate 10mg Tablet', '', ''),
(424, 'Methyl Salicylate30%+Menthol10% Cream', '', ''),
(425, 'Methylene Blue', '', ''),
(426, 'Methylergonovine 200 mcg Injection', '', ''),
(427, 'Metoprolol 25mg Tablet', '', ''),
(428, 'Metoprolol 50mg Tablet', '', ''),
(429, 'Metronidazole 400mg Tablet', '', ''),
(430, 'Metronidazole 500mg/100ml IV Infusion', '', ''),
(431, 'Miconazole 2% Gel', '', ''),
(432, 'Microgol+electrolytes Solution', '', ''),
(433, 'Midazolam 15mg/3ml Injection', '', ''),
(434, 'Midazolam 5mg/5ml Injection', '', ''),
(435, 'Midazolam 7.5mg Tablet', '', ''),
(436, 'Miltivitamin+Multimineral A-Z', '', ''),
(437, 'Misoprostol 200mcg Tablet', '', ''),
(438, 'Mitomicin 20mg Injection', '', ''),
(439, 'Montelukast 10mg Tablet', '', ''),
(440, 'Montelukast 4mg powder', '', ''),
(441, 'Montelukast 4mg Tablet', '', ''),
(442, 'Montelukast 5mg Tablet', '', ''),
(443, 'Moxifloxacin 0.5% E/D', '', ''),
(444, 'Moxifloxacin 400mg Tablet', '', ''),
(445, 'Moxifloxacin 400mg/250ml Injection', '', ''),
(446, 'Multivitamin + Cod liver oil Syrup', '', ''),
(447, 'Mupirocin 2% ointment', '', ''),
(448, 'Naphazoline+Zn Sulphate', '', ''),
(449, 'Naproxen 125mg/5ml Suspension', '', ''),
(450, 'Naproxen 250 mg tablet', '', ''),
(451, 'Naproxen 500mg Tablet', '', ''),
(452, 'Naproxen Sodium 10 % Gel', '', ''),
(453, 'Naproxen+Esomeprazole 375/20 Tablet', '', ''),
(454, 'Naproxen+Esomeprazole 500/20 Tablet', '', ''),
(455, 'Neostigmine 0.5mg/ml Injection', '', ''),
(456, 'Nicotinic Acid 50mg Tablet', '', ''),
(457, 'Nifedipine 10mg Capusle', '', ''),
(458, 'Nimodipine 30mg Tablet', '', ''),
(459, 'Nimulent Capsule', '', ''),
(460, 'NitroGlycerin 2.6 mg Tablet', '', ''),
(461, 'Octreotide Injection', '', ''),
(462, 'Ofloxacin 200mg Tablet', '', ''),
(463, 'Ofloxacin 400mg Tablet', '', ''),
(464, 'Olmesartan 20mg Tablet', '', ''),
(465, 'Olopatadine 0.1% E/D', '', ''),
(466, 'Olopatadine 0.2 % E/D', '', ''),
(467, 'Omeprazole 20mg Capsule', '', ''),
(468, 'Omeprazole 20mg mumps Tablet', '', ''),
(469, 'Omeprazole 40mg Capsule', '', ''),
(470, 'Omeprazole 40mg Injection', '', ''),
(471, 'Ondansetron 50ml Oran Solution', '', ''),
(472, 'Ondansetrone 8mg Tablet', '', ''),
(473, 'Ondansetrone 8mg/4ml Injection', '', ''),
(474, 'Oxcarbazepine 300mg Tablet', '', ''),
(475, 'Oxytocin 10iu  Injection', '', ''),
(476, 'Palonosetron 0.25mg Injection', '', ''),
(477, 'Palonosetron 0.5mg Tablet', '', ''),
(478, 'Pantoprazole 20mg Tablet', '', ''),
(479, 'Pantoprazole 40mg Injection', '', ''),
(480, 'Pantoprazole 40mg Tablet', '', ''),
(481, 'Paracetamol + Caffeine Tablet', '', ''),
(482, 'Paracetamol 125 mg Suppository', '', ''),
(483, 'Paracetamol 125mg/5ml Suspension', '', ''),
(484, 'Paracetamol 125mg/5ml Syrup', '', ''),
(485, 'Paracetamol 250 mg Suppository', '', ''),
(486, 'Paracetamol 500 mg Suppository', '', ''),
(487, 'Paracetamol 500 mg Tablet', '', ''),
(488, 'Paracetamol 60 mg Suppository', '', ''),
(489, 'Paracetamol 665 mg Tablet', '', ''),
(490, 'Paracetamol 80mg/ml Paed. Drop', '', ''),
(491, 'Paracetamol375mg+Tramadol37.5mg Tablet', '', ''),
(492, 'PEG 400 0.4%+ PG 0.3% E/D', '', ''),
(493, 'PEG+Electrolytes Syrup', '', ''),
(494, 'PEG0.4%+PG0.01% E/D', '', ''),
(495, 'Pentoxifylline 20 mg Tablet', '', ''),
(496, 'Permethrin 5% Cream', '', ''),
(497, 'Pethidine 100mg/2ml Injection', '', ''),
(498, 'Pheniramine Maleate 45.5mg Injection', '', ''),
(499, 'Pheniramine Maleate22.7mg Tablet', '', ''),
(500, 'Pheniramine Maleate75 mg Tablet', '', ''),
(501, 'Phenobarbital 200 mg Injection', '', ''),
(502, 'Phenobarbital 20mg/5ml Elixir', '', ''),
(503, 'Phenobarbital 30mg tablet', '', ''),
(504, 'Phenobarbital 60mg Tablet', '', ''),
(505, 'Phytomenadione 10mg/ml ', '', ''),
(506, 'Phytomenadione 2mg/0.2ml', '', ''),
(507, 'Pilocarpine 2% E/D', '', ''),
(508, 'Pioglitazone 15mg tablet', '', ''),
(509, 'Piperacillin4+Tazobactam0.5 Injection', '', ''),
(510, 'Pizotifen 0.5 mg Tablet', '', ''),
(511, 'Pizotifen 1.5 mg Tablet', '', ''),
(512, 'Polyethylene Glycol E/D', '', ''),
(513, 'Polymyxin B Sulphate 500000IU Injection', '', ''),
(514, 'Pota.Chlor.+Sod.Acetat.+Sod.Chlor. Infusion 1000ml', '', ''),
(515, 'Pota.Chlor.+Sod.Acetat.+Sod.Chlor. Infusion 500ml', '', ''),
(516, 'Potassium Chloride 1.5gm/10ml Injection', '', ''),
(517, 'Potassium Citrate30%+Citric Acid5% Syrup', '', ''),
(518, 'Potassium per Manganate', '', ''),
(519, 'Povidone iodine 1% gargle solution', '', ''),
(520, 'Povidone Iodine 10 %  100 ml', '', ''),
(521, 'Povidone-Iodine 5% Cream 125gm', '', ''),
(522, 'Povidone-Iodine 5% Cream 25gm', '', ''),
(523, 'Pralidoxime 1gm/ml Injection', '', ''),
(524, 'Prazosin 5mg Tablet', '', ''),
(525, 'Prednisolone 1% E/D', '', ''),
(526, 'Prednisolone 10mg Tablet', '', ''),
(527, 'Prednisolone 20mg Tablet', '', ''),
(528, 'Prednisolone 5mg Tablet', '', ''),
(529, 'Pregabalin 25mg Capsule', '', ''),
(530, 'Pregabalin 50mg Capsule', '', ''),
(531, 'Pregabalin 75mg Capsule', '', ''),
(532, 'Proparacaine 0.5% E/D', '', ''),
(533, 'Propofol 10mg/ml Injection', '', ''),
(534, 'Propranolol 10 mg Tablet', '', ''),
(535, 'Propranolol 10mg Tablet', '', ''),
(536, 'Propranolol 40mg Tablet', '', ''),
(537, 'Pyridoxine 20mg Tablet', '', ''),
(538, 'Quinine Sulphate 300mg Tablet', '', ''),
(539, 'Rabeprazole 20 mg Tablet', '', ''),
(540, 'Rabeprazole 20mg Capsule', '', ''),
(541, 'Ramipril 2.5 mg Tablet', '', ''),
(542, 'Ramipril 5mg Tablet', '', ''),
(543, 'Ranitidine 150 mg Tablet', '', ''),
(544, 'Ranitidine 50mg/2ml Injection', '', ''),
(545, 'Ranitidine 75mg/5ml Syrup', '', ''),
(546, 'Ranolazine 500mg ER  Tablet', '', ''),
(547, 'Revit-R Milk 220gm', '', ''),
(548, 'Rifam.+Isoni.+Etham.+Pyrazi. Tablet', '', ''),
(549, 'Rifampicin300+Isoniazid150 Tablet', '', ''),
(550, 'RIFAXIMIN 200MG Tablet', '', ''),
(551, 'RIFAXIMIN 550mg Tablet', '', ''),
(552, 'Ripaglinide 2mg Tablet', '', ''),
(553, 'Risperidone 1mg Tablet', '', ''),
(554, 'Rivaroxaban 10mg Tablet', '', ''),
(555, 'Rosuvastatin 10mg Tablet', '', ''),
(556, 'Rosuvastatin 20mg Tablet', '', ''),
(557, 'Rosuvastatin 5mg Tablet', '', ''),
(558, 'Rupatadine 10 mg Tablet', '', ''),
(559, 'Safi Capsule', '', ''),
(560, 'Salbutamol 100mcg/Puff Inhaler', '', ''),
(561, 'Salbutamol 5mg/5ml Syrup', '', ''),
(562, 'Salbutamol2.5mg+Ipratropium0.5mg Neb. Soln.', '', ''),
(563, 'Salmeterol+Fluticasone 25/125 Inhaler', '', ''),
(564, 'Salmeterol+Fluticasone 25/250 Inhaler', '', ''),
(565, 'Saw Palmetto 500mg Tablet', '', ''),
(566, 'Sebium Serum Cream', '', ''),
(567, 'Sertraline 25mg  Tablet', '', ''),
(568, 'Sertraline 50mg  Tablet', '', ''),
(569, 'Silodosin 4mg  Tablet', '', ''),
(570, 'Silodosin 8mg  Tablet', '', ''),
(571, 'Silver Sulfadiazine Cream 250gm', '', ''),
(572, 'Silver Sulfadiazine Cream 25gm', '', ''),
(573, 'Sitagliptin 100 mg Tablet', '', ''),
(574, 'Sitagliptin 50 mg  Tablet', '', ''),
(575, 'Sod.chlo.+Pot.Chlo.+sod.citrate+Glucose Sachet', '', ''),
(576, 'Sodium Bicarbonate 600mg Tablet', '', ''),
(577, 'Sodium Bicarbonate 7.5% Injection', '', ''),
(578, 'Sodium Chloride 0.9%  N/D', '', ''),
(579, 'Sodium Chloride 3% IV Infusion 500ml', '', ''),
(580, 'Sodium Chloride 300 mg Tablet', '', ''),
(581, 'Sodium Chloride 5% E/D', '', ''),
(582, 'Sodium Fusidate 250mg Tablet', '', ''),
(583, 'Sodium Phosphate anema Solution 133ml', '', ''),
(584, 'Sodium Valproate 200mg/5ml Syrup', '', ''),
(585, 'Sodium Valproate 200mgTablet', '', ''),
(586, 'Sodium Valproate 300mgTablet', '', ''),
(587, 'Sodium Valproate 500mgTablet', '', ''),
(588, 'Solifenacin Succinate 10mg Tablet', '', ''),
(589, 'Solifenacin Succinate 5mg Tablet', '', ''),
(590, 'Spironolactone 100mg Tablet', '', ''),
(591, 'Spironolactone 25mg Tablet', '', ''),
(592, 'Spirulina 250mg Capsule', '', ''),
(593, 'STRETCHMED Scar gel', '', ''),
(594, 'Sucralfate 500 mg Tablet', '', ''),
(595, 'Sulindac 100mg  Tablet', '', ''),
(596, 'Sulindac 200mg  Tablet', '', ''),
(597, 'Sulphamethoxazole+Trimethoprim DS Tablet', '', ''),
(598, 'Suxamethonium Chloride 100mg/2ml Injection', '', ''),
(599, 'Tamsulosin 0.4mg Capsule', '', ''),
(600, 'Tenoxicam 20 mg Tablet', '', ''),
(601, 'Theophylline  200 mg Tablet', '', ''),
(602, 'Theophylline  400 mg Tablet', '', ''),
(603, 'Thiamine 100mg Tablet', '', ''),
(604, 'Thiamine 100mg/ml injection', '', ''),
(605, 'Thiopental Sodium  1gm Injection', '', ''),
(606, 'Thyamol & Eucliptol solution M/W', '', ''),
(607, 'Ticagrelor 90mg Tablet', '', ''),
(608, 'Tiemonium MethylSulphate 50mg Tablet', '', ''),
(609, 'Tiemonium MethylSulphate 5mg/2ml Injection', '', ''),
(610, 'Tizanidine 2mg Tablet', '', ''),
(611, 'Tobramycin 0.3%  E/D', '', ''),
(612, 'Tobramycin 300mg/5ml Neb. Solution', '', ''),
(613, 'Tobramycin0.3%+Dexamethasone0.1%  E/D', '', ''),
(614, 'Tobramycin0.3%+Dexamethasone0.1%  E/Oint.', '', ''),
(615, 'Tolperisone Hydrochloride 50 mg Tablet', '', ''),
(616, 'Tolterodine Tartarate 2mg Capsule', '', ''),
(617, 'Tramadol 100mg injection', '', ''),
(618, 'Tramadol 100mg Tablet', '', ''),
(619, 'Tramadol 50mg Capsule', '', ''),
(620, 'Tramadol 50mg Tablet', '', ''),
(621, 'Tranexamic acid?500mg  capsule', '', ''),
(622, 'Travoprost 400mcg/ml E/D', '', ''),
(623, 'Triamcenolone acetonide 40mg/ml injection', '', ''),
(624, 'Triamcenolone acetonide Oral Paste', '', ''),
(625, 'Trihexyphenidyl 2mg Tablet', '', ''),
(626, 'Tritropium 18mcg Cozycap', '', ''),
(627, 'Tropicamide 1% E/D', '', ''),
(628, 'Tropicamide+Phenylephrine E/D', '', ''),
(629, 'Trypan Blue sterile soln', '', ''),
(630, 'Urea 10%  Cream', '', ''),
(631, 'Valacyclovir 1 gm Tablet', '', ''),
(632, 'Valsartan 160 mg Tablet', '', ''),
(633, 'Varicella virus vaccine', '', ''),
(634, 'Verapamil 5mg /2 ml injection', '', ''),
(635, 'Vildagliptin 50mg Tablet', '', ''),
(636, 'Vita-C+E+Zinc+Copper+Lutein Capsule', '', ''),
(637, 'Vitamin E & C Tablet', '', ''),
(638, 'Vitamin E 200mg Capsule', '', ''),
(639, 'Vitamin E 400 mg Capsule', '', ''),
(640, 'Vitamin E 400mg Capsule', '', ''),
(641, 'Vitamin E 400mg(natural) Capsule', '', ''),
(642, 'Vitamin-B Complex Syrup', '', ''),
(643, 'Vitamin-B Complex Tablet', '', ''),
(644, 'Vitamin-B complex+Vita-C IV Injection', '', ''),
(645, 'Vitamin-B1,B6,B12 Tablet', '', ''),
(646, 'Vitamin-C 250mg Tablet', '', ''),
(647, 'Vitamin-C 500mg Tablet', '', ''),
(648, 'Vitamin-D3 1000 IU Tablet', '', ''),
(649, 'Warfarin 5mg Tablet', '', ''),
(650, 'WSP+LP+Wool Alcohol E/Oint', '', ''),
(651, 'Yohimbine 5.4mg Capsule', '', ''),
(652, 'Zinc Orotate 10mg Tablet', '', ''),
(653, 'Zinc Sulphate 10mg/5ml Syrup', '', ''),
(654, 'Zinc Sulphate 20mg Tablet', '', ''),
(655, 'Zinc Sulphate+Vita-B complex Syrup', '', ''),
(656, 'Zolmitriptan 2.5 mg Tablet', '', '');

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
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `papp`
--

INSERT INTO `papp` (`ID`, `dname`, `pname`, `pmrn`, `pphone`, `page`, `psex`, `padd`, `adate`, `aslot`, `height`, `weight`, `temp`, `status`) VALUES
(1, 'dname', '', '', '', '', '', 'padd', '02/22/2018', '', '', '', '', ''),
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
(93, 'steven', 'IUIUOI', '78688', '90890890809', '980', 'MALE', 'IUOIUIOU', '04/28/2018', '9:00AM', '98908', '89', '880', 'SEEN');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `ID` int(10) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `pphone` varchar(11) NOT NULL,
  `psex` varchar(200) NOT NULL,
  `page` int(3) NOT NULL,
  `pmrn` int(10) NOT NULL,
  `padd` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`ID`, `pname`, `pphone`, `psex`, `page`, `pmrn`, `padd`) VALUES
(1, 'pname', '897987', 'MALE', 88979, 6567476, ''),
(2, 'Merry', '89899', 'MALE', 777, 222222, '44/H, Indira Road'),
(3, 'JHJKH', '8878', 'MALE', 7878, 7878978, ''),
(4, 'JHJKH', '8878', 'MALE', 7878, 7878978, ''),
(5, 'JHJKH', '8878', 'MALE', 7878, 7878978, ''),
(6, 'JHJKH', '8878', 'MALE', 7878, 7878978, ''),
(7, 'JHJKH', '8878', 'MALE', 7878, 7878978, ''),
(8, 'ADMAN DIAS', '777777', 'MALE', 7878, 777777, '105/11, Monipuripara'),
(9, 'JHJKH', '8878', 'MALE', 7878, 7878978, ''),
(10, 'JHJKH', '8878', 'MALE', 7878, 7878978, ''),
(11, 'JHJKH', '8878', 'MALE', 7878, 7878978, ''),
(12, 'JHJKH', '8878', 'MALE', 7878, 7878978, ''),
(13, 'JHJKH', '8878', 'MALE', 7878, 7878978, ''),
(14, 'JHJKH', '8878', 'MALE', 7878, 7878978, ''),
(15, 'JHJKH', '8878', 'MALE', 7878, 7878978, ''),
(16, 'JHJKH', '8878', 'MALE', 7878, 7878978, ''),
(17, 'JHJKH', '8878', 'MALE', 7878, 7878978, ''),
(18, 'JHJKH', '8878', 'MALE', 7878, 7878978, ''),
(19, 'JHJKH', '8878', 'MALE', 7878, 7878978, ''),
(20, 'JHJKH', '8878', 'MALE', 7878, 7878978, ''),
(21, 'JHJKH', '8878', 'MALE', 7878, 7878978, ''),
(22, 'JHJKH', '8878', 'MALE', 7878, 7878978, ''),
(23, 'JHJKH', '8878', 'MALE', 7878, 7878978, ''),
(24, 'JHJKH', '8878', 'MALE', 7878, 7878978, ''),
(25, 'JHJKH', '8878', 'MALE', 7878, 7878978, ''),
(26, 'JHJKH', '8878', 'MALE', 7878, 7878978, 'dsfsdf'),
(27, 'UUU', '879798', 'MALE', 87, 987897, 'safdasf'),
(28, 'KHKJK', '8798789778', 'MALE', 787, 8878978, ''),
(29, 'KJKJ', '87987879797', 'MALE', 87, 987987, ''),
(30, 'Steven Adman Dias', '01711206048', 'MALE', 32, 1234, '44/H Indira Road, Dhaka'),
(31, 'GHGHJG', '78686', 'MALE', 8, 0, 'YTYUTUT'),
(32, 'IUIUOI', '90890890809', 'MALE', 980, 78688, 'IUOIUIOU'),
(33, 'IUIUOI', '90890890809', 'MALE', 980, 78688, ''),
(34, 'IUIUOI', '90890890809', 'MALE', 980, 78688, ''),
(35, 'IUIUOI', '90890890809', 'MALE', 980, 78688, ''),
(36, 'IUIUOI', '90890890809', 'MALE', 980, 78688, ''),
(37, 'IUIUOI', '90890890809', 'MALE', 980, 78688, ''),
(38, 'IUIUOI', '90890890809', 'MALE', 980, 78688, ''),
(39, 'IUIUOI', '90890890809', 'MALE', 980, 78688, ''),
(40, 'IUIUOI', '90890890809', 'MALE', 980, 78688, ''),
(41, 'IUIUOI', '90890890809', 'MALE', 980, 78688, ''),
(42, 'IUIUOI', '90890890809', 'MALE', 980, 78688, ''),
(43, 'IUIUOI', '90890890809', 'MALE', 980, 78688, ''),
(44, 'IUIUOI', '90890890809', 'MALE', 980, 78688, ''),
(45, 'IUIUOI', '90890890809', 'MALE', 980, 78688, ''),
(46, 'IUIUOI', '90890890809', 'MALE', 980, 78688, ''),
(47, 'IUIUOI', '90890890809', 'MALE', 980, 78688, ''),
(48, 'IUIUOI', '90890890809', 'MALE', 980, 78688, ''),
(49, 'IUIUOI', '90890890809', 'MALE', 980, 78688, ''),
(50, 'KHKJK', '8798789778', 'MALE', 787, 8878978, ''),
(51, 'Neela', '8798789778', 'FEMALE', 787, 111111, 'Farmgate');

-- --------------------------------------------------------

--
-- Table structure for table `pmedi`
--

CREATE TABLE IF NOT EXISTS `pmedi` (
  `id` int(20) NOT NULL,
  `dname` varchar(200) NOT NULL,
  `pmrn` int(10) NOT NULL,
  `medi` varchar(500) NOT NULL,
  `pdos` varchar(500) NOT NULL,
  `ins` varchar(500) NOT NULL,
  `date` varchar(20) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pmedi`
--

INSERT INTO `pmedi` (`id`, `dname`, `pmrn`, `medi`, `pdos`, `ins`, `date`, `status`) VALUES
(1, '', 7362784, '10%Dextrose+0.225%Sodium Chloride', '', '', '', ''),
(2, '', 7362784, '25% Dextrose 100 ml Infusion', '', '', '', ''),
(6, '', 65800, 'Aspirin 75 mg Tablet', '', '', '', ''),
(7, '', 65800, 'Fexofenadine 120mg Tablet', '', '', '', ''),
(8, '', 65800, '10% Fat Emulsion', '', '', '', ''),
(9, '', 656, 'ABCDerma Hydrant', '', '', '', ''),
(10, '', 656, 'Acetic Acid 5% Solution', '', '', '', ''),
(11, '', 656, '', '', '', '', ''),
(12, '', 65800, 'Ketoconazole+Zn+Aloevera shampoo', '', '', '', ''),
(13, '', 65800, 'Palonosetron 0.25mg Injection', '', '', '', ''),
(14, '', 99779, 'ABCDerma Hydrant', '1+1+1', '', '', ''),
(15, '', 99779, '6%hydroxyethyl starch 500ml', '1+1+0', '', '', ''),
(16, '', 99779, 'Danazol 100mg Capsule', '0+1+1', '', '', ''),
(17, '', 99779, 'jhsahfk', '1+1+2', '', '', ''),
(18, '', 877897, '0.9% Sodium chloride IV Infusion 1000ml', 'adman Acetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid', '', '', ''),
(19, '', 877897, '10% Fat Emulsion', 'Acetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% Solution', '', '', ''),
(20, '', 877897, 'Acitretin 10mg Capsule', 'Acitretin 10mg CapsuleAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% Solution', '', '', ''),
(21, '', 877897, 'Activated Charcoal 250 mg Tablet', 'Acetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% SolutionAcetic Acid 5% Solution', '', '', ''),
(22, '', 76567, 'A-Cerumen Ear Hygine 2ml', 'adman', '', '', ''),
(23, '', 76567, 'Acetic Acid 5% Solution', 'Acitretin 10mg Capsule', '', '', ''),
(24, '', 76567, '5%Composit Amino Acid+D-Sorbitol', 'A-Cerumen Ear Hygine 2ml', '', '', ''),
(25, '', 76567, '5%Dextrose+0.225%Sodium Chloride', 'ABCDerma Hydrant', '', '', ''),
(26, '', 76567, '0.9%Sodium Chloride+5%Dextrose  1000 ml', 'steven', '', '', ''),
(27, '', 76567, '20% Mannitol 500ml', 'Bacitracin+Neomycin Ointment', '', '', ''),
(28, '', 76567, '5 % Dextrose IV Infusion. 1000 ml', 'Magaldrate+Simethicone Suspension', '', '', 'NOT SERVERD'),
(29, '', 76567, '0.9%Sodium Chloride+5%Dextrose  1000 ml', 'steven', '', '', ''),
(30, '', 76567, '20% Mannitol 500ml', 'Bacitracin+Neomycin Ointment', '', '', ''),
(31, '', 76567, '5 % Dextrose IV Infusion. 1000 ml', 'Magaldrate+Simethicone Suspension', '', '', ''),
(32, '', 98789, 'ABCDerma Hydrant', 'steven', '', '', ''),
(33, '', 98789, '6%hydroxyethyl starch 500ml', 'ABCDerma Hydrant', '', '', ''),
(34, '', 98789, '5%Composit Amino Acid+D-Sorbitol', 'ABCDerma Hydrant', '', '', ''),
(35, '', 76253, 'fghfhgfhgfh', '', '', '03/17/2018', ''),
(36, 'adman', 78678, '0.9% Sodium Chloride IV Infusion 500 ml', '', '', '03/17/2018', ''),
(37, 'adman', 78678, '0.9%Sodium Chloride+5%Dextrose  1000 ml', '', '', '03/17/2018', ''),
(38, 'adman', 78678, 'ABCDerma Hydrant', '', '', '03/17/2018', ''),
(39, 'adman', 78678, 'Aceclofenac 100mg Tablet', '', '', '03/17/2018', ''),
(40, 'adman', 78678, '5%Composit Amino Acid+D-Sorbitol', '', '', '03/18/2018', 'NOT SERVED'),
(41, 'adman', 78678, '10% Fat Emulsion', '', '', '03/18/2018', 'NOT SERVERD'),
(42, 'steven', 6567567, '0.9% Sodium chloride IV Infusion 1000ml', '', '', '03/18/2018', 'SERVED'),
(43, 'steven', 6567567, '0.9% Sodium Chloride IV Infusion 500 ml', '', '', '03/18/2018', 'SERVED'),
(44, 'steven', 6567567, '10 % Dextrose IV Infusion 1000 ml', '', '', '03/18/2018', 'NOT SERVED'),
(45, 'steven', 6567567, '6%hydroxyethyl starch 500ml', '', '', '03/18/2018', 'NOT CAME'),
(46, 'steven', 6567567, 'Aceclofenac 100mg Tablet', '', '', '03/18/2018', 'NOT CAME'),
(47, 'steven', 6567567, 'ABCDerma Hydrant', '', '', '03/18/2018', 'NOT SERVED'),
(48, 'steven', 6567567, 'Acitretin 10mg Capsule', '', '', '03/18/2018', 'SERVED'),
(49, 'steven', 6567567, 'Acetylcysteine 600mg Tablet', '', '', '03/18/2018', 'NOT SERVERD'),
(50, 'steven', 776, '5%Composit Amino Acid+D-Sorbitol', 'jhjk', '', '03/19/2018', 'NOT CAME'),
(51, 'steven', 65675, '5%Dextrose+0.225%Sodium Chloride', 'steven', '', '03/19/2018', 'SERVED'),
(52, 'steven', 6789, '0.9%Sodium Chloride+5%Dextrose  1000 ml', '', '', '03/19/2018', ''),
(53, 'steven', 78686, '0.9% Sodium chloride IV Infusion 1000ml', '', '', '03/20/2018', ''),
(54, 'steven', 78686, '6%hydroxyethyl starch 500ml', '', '', '03/20/2018', ''),
(55, 'steven', 78686, '5%Dextrose+0.225%Sodium Chloride', '', '', '03/20/2018', ''),
(56, '', 65675675, '5 % Dextrose IV Infusion. 1000 ml', '', '', '', ''),
(57, '', 65675675, '', '', '', '', ''),
(58, '', 65675675, '', '', '', '', ''),
(59, '', 65675675, '5 % Dextrose IV Infusion. 1000 ml', '', '', '', ''),
(60, '', 65675675, '', '', '', '', ''),
(61, '', 65675675, '', '', '', '', ''),
(62, '', 65675675, '5 % Dextrose IV Infusion. 1000 ml', '', '', '', ''),
(63, '', 65675675, '', '', '', '', ''),
(64, '', 65675675, '', '', '', '', ''),
(65, '', 1234, 'Haloperidol 10mg injection', '', '', '', ''),
(66, '', 1234, 'Ganciclovir 0.15% E/Gel', '', '', '', ''),
(67, '', 1234, 'Haloperidol 10mg injection', '', '', '', ''),
(68, '', 65765, 'Aceclofenac 100mg Tablet', '', '', '', ''),
(69, '', 65765, 'Aceclofenac 100mg Tablet', '', '', '', ''),
(70, '', 65765, '', '', '', '', ''),
(71, '', 65765, 'Aceclofenac 100mg Tablet', '', '', '', ''),
(72, '', 65765, 'Aceclofenac 100mg Tablet', '', '', '', ''),
(73, '', 65765, '', '', '', '', ''),
(74, '', 65765, 'Aceclofenac 100mg Tablet', '', '', '', ''),
(75, '', 65765, 'Aceclofenac 100mg Tablet', '', '', '', ''),
(76, '', 65765, '', '', '', '', ''),
(77, '', 123456, '5 % Dextrose IV Infusion. 1000 ml', 'steven', 'steven', '', ''),
(78, '', 123456, 'ABCDerma Hydrant', '1+1+1, dshfbj sdfj sdjhf jksdhjf hj sdhfj hsdjf hsdj hfjsdh fjhsd jfsdjf jdshf dsfj sdfjh sdjhfjks djkfh sdjkhf sdhfkj hsdjfh kjsdhfj sdjfh sdjkhf ksdhkjf ksdjhf kjhsdjfk sdjkhf sdfhk hsdkfsd hkf hsd hfhsd fsdhf hhsd f ', 'adman', '', ''),
(79, '', 878090, '20% Mannitol 500ml', 'steven', 'steven', '03/26/2018', ''),
(80, '', 878090, '10% Fat Emulsion', '1+1+1, dshfbj sdfj sdjhf jksdhjf hj sdhfj hsdjf hsdj hfjsdh fjhsd jfsdjf jdshf dsfj sdfjh sdjhfjks djkfh sdjkhf sdhfkj hsdjfh kjsdhfj sdjfh sdjkhf ksdhkjf ksdjhf kjhsdjfk sdjkhf sdfhk hsdkfsd hkf hsd hfhsd fsdhf hhsd f ', 'adman', '03/26/2018', ''),
(81, '', 6567476, '25% Dextrose 100 ml Infusion', 'adman', 'adman', '03/26/2018', ''),
(82, '', 6567476, '5 % Dextrose IV Infusion. 1000 ml', '1+1+1, dshfbj sdfj sdjhf jksdhjf hj sdhfj hsdjf hsdj hfjsdh fjhsd jfsdjf jdshf dsfj sdfjh sdjhfjks djkfh sdjkhf sdhfkj hsdjfh kjsdhfj sdjfh sdjkhf ksdhkjf ksdjhf kjhsdjfk sdjkhf sdfhk hsdkfsd hkf hsd hfhsd fsdhf hhsd f ', 'steven', '03/26/2018', ''),
(83, '', 9, '6%hydroxyethyl starch 500ml', 'hsah sags aghsgahjg shagdsaghgdhsag dgsahgd jsagdj gsagdjsagd gsajhdgsagdhgsa dgjsag dsjkfhkj h fdsj', 'adman', '03/27/2018', ''),
(84, '', 987897, 'Acetic Acid 5% Solution', 'steven', 'asdasdas', '04/11/2018', ''),
(85, '', 987897, 'ABCDerma Hydrant', '1+1+1, dshfbj sdfj sdjhf jksdhjf hj sdhfj hsdjf hsdj hfjsdh fjhsd jfsdjf jdshf dsfj sdfjh sdjhfjks djkfh sdjkhf sdhfkj hsdjfh kjsdhfj sdjfh sdjkhf ksdhkjf ksdjhf kjhsdjfk sdjkhf sdfhk hsdkfsd hkf hsd hfhsd fsdhf hhsd f ', 'adman', '04/11/2018', ''),
(86, '', 8878978, '10%Dextrose+0.225%Sodium Chloride', '1+1+1, dshfbj s', 'GGJHGJHG', '04/12/2018', 'SERVED'),
(87, '', 8878978, '20% Mannitol 500ml', '1+1+1, dshfbj s', 'JKHJKHKKHKH', '04/12/2018', ''),
(88, '', 987987, 'Acitretin 10mg Capsule', '1+1+1, dshfbj s', 'OOOO', '04/12/2018', ''),
(89, '', 78688, '10% Fat Emulsion', '1+1+1, dshfbj s', '', '04/28/2018', ''),
(90, '', 78688, 'steven', '', '', '04/28/2018', ''),
(91, '', 78688, 'steven', '9898', '', '04/28/2018', ''),
(92, '', 78688, 'steven', '1+1+1, dshfbj s', '', '04/28/2018', ''),
(93, '', 8878978, 'A-Cerumen Ear Hygine 2ml', '1+1+1, dshfbj s', 'dsjfkjsdfhk', '', ''),
(94, '', 8878978, '6%hydroxyethyl starch 500ml', '', '', '', '');

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
) ENGINE=InnoDB AUTO_INCREMENT=212 DEFAULT CHARSET=latin1;

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
(211, '', 'KHKJK', 787, 'MALE', 8878978, '8798789778', '', 'jhdskf', 'jhdksfk', '', '', '', 'Acetic Acid 5% Solution', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1+1+1, dshfbj s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'dksjflj', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

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
  `id` int(6) NOT NULL,
  `dname` varchar(100) NOT NULL,
  `ddate` varchar(100) NOT NULL,
  `dslot` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=264 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `dname`, `ddate`, `dslot`, `status`) VALUES
(1, 'steven', '02/28/2018', '10:00AM', 'AVAILABLE'),
(2, 'steven', '02/27/2018', '9:00AM', ''),
(3, 'steven', '02/27/2018', '10:00AM', ''),
(4, 'steven', '02/27/2018', '9:00AM', ''),
(5, 'steven', '02/27/2018', '10:00AM', ''),
(6, 'steven', '02/27/2018', '', ''),
(7, 'steven', '02/27/2018', '', ''),
(8, 'steven', '02/27/2018', '', ''),
(9, 'steven', '02/27/2018', '', ''),
(10, 'steven', '02/27/2018', '', ''),
(11, 'steven', '02/27/2018', '', ''),
(12, 'steven', '02/27/2018', '', ''),
(13, 'steven', '02/27/2018', '', ''),
(14, 'steven', '02/27/2018', '', ''),
(15, 'steven', '02/27/2018', '', ''),
(16, 'steven', '02/27/2018', '9:00AM', ''),
(17, 'steven', '02/27/2018', '10:00AM', ''),
(18, 'steven', '02/27/2018', '', ''),
(19, 'steven', '02/27/2018', '', ''),
(20, 'steven', '02/27/2018', '', ''),
(21, 'steven', '02/27/2018', '', ''),
(22, 'steven', '02/27/2018', '', ''),
(23, 'steven', '02/27/2018', '', ''),
(24, 'steven', '02/27/2018', '', ''),
(25, 'steven', '02/27/2018', '', ''),
(26, 'steven', '02/27/2018', '', ''),
(27, 'adman', '02/24/2018', '9:00AM', 'BOOKED'),
(28, 'adman', '02/24/2018', '10:00AM', 'Booked'),
(29, 'adman', '02/24/2018', '11:00AM', 'Booked'),
(30, 'adman', '02/24/2018', '12:00PM', ''),
(31, 'adman', '02/24/2018', '', ''),
(32, 'adman', '02/24/2018', '', ''),
(33, 'adman', '02/24/2018', '', ''),
(34, 'adman', '02/24/2018', '', ''),
(35, 'adman', '02/24/2018', '', ''),
(36, 'adman', '02/24/2018', '', ''),
(37, 'adman', '02/24/2018', '', ''),
(38, 'steven', '02/25/2018', '9:00AM', 'Booked'),
(39, 'steven', '02/25/2018', '10:00AM', ''),
(40, 'steven', '02/25/2018', '11:00AM', ''),
(41, 'steven', '02/25/2018', '12:00PM', ''),
(42, 'steven', '02/25/2018', 'OT', ''),
(43, 'steven', '02/25/2018', 'OT', ''),
(44, 'steven', '02/25/2018', 'OT', ''),
(45, 'steven', '02/25/2018', 'OT', ''),
(46, 'steven', '02/25/2018', 'OT', ''),
(47, 'steven', '02/25/2018', 'OT', ''),
(48, 'steven', '02/25/2018', 'OT', ''),
(49, 'steven', '02/25/2018', '9:00AM', 'Booked'),
(50, 'steven', '02/25/2018', '10:00AM', 'AVAILABLE'),
(51, 'steven', '02/25/2018', '11:00AM', 'AVAILABLE'),
(52, 'steven', '02/25/2018', '12:00PM', 'AVAILABLE'),
(53, 'steven', '02/25/2018', 'OT', 'AVAILABLE'),
(54, 'steven', '02/25/2018', 'OT', 'AVAILABLE'),
(55, 'steven', '02/25/2018', 'OT', 'AVAILABLE'),
(56, 'steven', '02/25/2018', 'OT', 'AVAILABLE'),
(57, 'steven', '02/25/2018', 'OT', 'AVAILABLE'),
(58, 'steven', '02/25/2018', 'OT', 'AVAILABLE'),
(59, 'steven', '02/25/2018', 'OT', 'AVAILABLE'),
(71, 'steven', '02/28/2018', '9:00AM', 'AVAILABLE'),
(72, 'steven', '02/28/2018', '10:00AM', 'AVAILABLE'),
(73, 'steven', '02/28/2018', '11:00AM', 'AVAILABLE'),
(74, 'steven', '02/28/2018', '', 'AVAILABLE'),
(75, 'steven', '02/28/2018', '', 'AVAILABLE'),
(76, 'steven', '02/28/2018', '', 'AVAILABLE'),
(77, 'steven', '02/28/2018', '', 'AVAILABLE'),
(78, 'steven', '02/28/2018', '', 'AVAILABLE'),
(79, 'steven', '02/28/2018', '', 'AVAILABLE'),
(80, 'steven', '02/28/2018', '', 'AVAILABLE'),
(81, 'steven', '02/28/2018', '', 'AVAILABLE'),
(82, 'steven', '02/01/2018', '9:00AM', 'AVAILABLE'),
(83, 'steven', '02/01/2018', '10:00AM', 'AVAILABLE'),
(84, 'steven', '02/01/2018', '', 'AVAILABLE'),
(85, 'steven', '02/01/2018', '', 'AVAILABLE'),
(86, 'steven', '02/01/2018', '', 'AVAILABLE'),
(87, 'steven', '02/01/2018', '', 'AVAILABLE'),
(88, 'steven', '02/01/2018', '', 'AVAILABLE'),
(89, 'steven', '02/01/2018', '', 'AVAILABLE'),
(90, 'steven', '02/01/2018', '', 'AVAILABLE'),
(91, 'steven', '02/01/2018', '', 'AVAILABLE'),
(92, 'steven', '02/01/2018', '', 'AVAILABLE'),
(93, 'adman', '02/03/2018', '9:00AM', 'Booked'),
(94, 'adman', '02/03/2018', '10:00AM', 'AVAILABLE'),
(95, 'adman', '02/03/2018', '', 'AVAILABLE'),
(96, 'adman', '02/03/2018', '', 'AVAILABLE'),
(97, 'adman', '02/03/2018', '', 'AVAILABLE'),
(98, 'adman', '02/03/2018', '', 'AVAILABLE'),
(99, 'adman', '02/03/2018', '', 'AVAILABLE'),
(100, 'adman', '02/03/2018', '', 'AVAILABLE'),
(101, 'adman', '02/03/2018', '', 'AVAILABLE'),
(102, 'adman', '02/03/2018', '', 'AVAILABLE'),
(103, 'adman', '02/03/2018', '', 'AVAILABLE'),
(104, 'adman', '02/03/2018', '9:00AM', 'Booked'),
(105, 'adman', '02/03/2018', '10:00AM', 'AVAILABLE'),
(106, 'adman', '02/03/2018', '', 'AVAILABLE'),
(107, 'adman', '02/03/2018', '', 'AVAILABLE'),
(108, 'adman', '02/03/2018', '', 'AVAILABLE'),
(109, 'adman', '02/03/2018', '', 'AVAILABLE'),
(110, 'adman', '02/03/2018', '', 'AVAILABLE'),
(111, 'adman', '02/03/2018', '', 'AVAILABLE'),
(112, 'adman', '02/03/2018', '', 'AVAILABLE'),
(113, 'adman', '02/03/2018', '', 'AVAILABLE'),
(114, 'adman', '02/03/2018', '', 'AVAILABLE'),
(115, 'adman', '02/03/2018', '9:00AM', 'Booked'),
(116, 'adman', '02/03/2018', '10:00AM', 'AVAILABLE'),
(117, 'adman', '02/03/2018', '', 'AVAILABLE'),
(118, 'adman', '02/03/2018', '', 'AVAILABLE'),
(119, 'adman', '02/03/2018', '', 'AVAILABLE'),
(120, 'adman', '02/03/2018', '', 'AVAILABLE'),
(121, 'adman', '02/03/2018', '', 'AVAILABLE'),
(122, 'adman', '02/03/2018', '', 'AVAILABLE'),
(123, 'adman', '02/03/2018', '', 'AVAILABLE'),
(124, 'adman', '02/03/2018', '', 'AVAILABLE'),
(125, 'adman', '02/03/2018', '', 'AVAILABLE'),
(126, 'steven', '02/23/2018', '9:00AM', 'Booked'),
(127, 'steven', '02/23/2018', '10:00AM', 'AVAILABLE'),
(128, 'steven', '02/23/2018', '', 'AVAILABLE'),
(129, 'steven', '02/23/2018', '', 'AVAILABLE'),
(130, 'steven', '02/23/2018', '', 'AVAILABLE'),
(131, 'steven', '02/23/2018', '', 'AVAILABLE'),
(132, 'steven', '02/23/2018', '', 'AVAILABLE'),
(133, 'steven', '02/23/2018', '', 'AVAILABLE'),
(134, 'steven', '02/23/2018', '', 'AVAILABLE'),
(135, 'steven', '02/23/2018', '', 'AVAILABLE'),
(136, 'steven', '02/23/2018', '', 'AVAILABLE'),
(137, 'steven', '03/11/2018', '9:00AM', 'Booked'),
(138, 'steven', '03/11/2018', '10:00AM', 'Booked'),
(139, 'steven', '03/11/2018', '11:00AM', 'Booked'),
(140, 'steven', '03/11/2018', '', 'AVAILABLE'),
(141, 'steven', '03/11/2018', '', 'AVAILABLE'),
(142, 'steven', '03/11/2018', '', 'AVAILABLE'),
(143, 'steven', '03/11/2018', '', 'AVAILABLE'),
(144, 'steven', '03/11/2018', '', 'AVAILABLE'),
(145, 'steven', '03/11/2018', '', 'AVAILABLE'),
(146, 'steven', '03/11/2018', '', 'AVAILABLE'),
(147, 'steven', '03/11/2018', '', 'AVAILABLE'),
(148, 'steven', '03/11/2018', '10:00AM', 'Booked'),
(149, 'steven', '03/11/2018', '12:00PM', 'Booked'),
(150, 'steven', '03/11/2018', '', 'AVAILABLE'),
(151, 'steven', '03/11/2018', '', 'AVAILABLE'),
(152, 'steven', '03/11/2018', '', 'AVAILABLE'),
(153, 'steven', '03/11/2018', '', 'AVAILABLE'),
(154, 'steven', '03/11/2018', '', 'AVAILABLE'),
(155, 'steven', '03/11/2018', '', 'AVAILABLE'),
(156, 'steven', '03/11/2018', '', 'AVAILABLE'),
(157, 'steven', '03/11/2018', '', 'AVAILABLE'),
(158, 'steven', '03/11/2018', '', 'AVAILABLE'),
(159, 'steven', '03/12/2018', '9:00AM', 'Booked'),
(160, 'steven', '03/12/2018', '10:00AM', 'Booked'),
(161, 'steven', '03/12/2018', '11:00AM', 'Booked'),
(162, 'steven', '03/12/2018', '12:00PM', 'Booked'),
(163, 'steven', '03/12/2018', '1:00PM', 'Booked'),
(164, 'steven', '03/12/2018', '2:00PM', 'Booked'),
(165, 'steven', '03/12/2018', '3:00PM', 'Booked'),
(166, 'steven', '03/12/2018', '4:00PM', 'Booked'),
(167, 'steven', '03/12/2018', '', 'AVAILABLE'),
(168, 'steven', '03/12/2018', '', 'AVAILABLE'),
(169, 'steven', '03/12/2018', '', 'AVAILABLE'),
(170, 'steven', '03/13/2018', '9:00AM', 'Booked'),
(171, 'steven', '03/13/2018', '10:00AM', 'Booked'),
(172, 'steven', '03/13/2018', '11:00AM', 'Booked'),
(173, 'steven', '03/13/2018', '12:00PM', 'Booked'),
(174, 'steven', '03/13/2018', '1:00PM', 'AVAILABLE'),
(175, 'steven', '03/13/2018', '2:00PM', 'AVAILABLE'),
(176, 'steven', '03/13/2018', '3:00PM', 'AVAILABLE'),
(177, 'steven', '03/13/2018', '4:00PM', 'AVAILABLE'),
(178, 'steven', '03/13/2018', '', 'AVAILABLE'),
(179, 'steven', '03/13/2018', '', 'AVAILABLE'),
(180, 'steven', '03/13/2018', '', 'AVAILABLE'),
(181, 'steven', '03/14/2018', '9:00AM', 'Booked'),
(182, 'steven', '03/14/2018', '10:00AM', 'Booked'),
(183, 'steven', '03/14/2018', '11:00AM', 'Booked'),
(184, 'steven', '03/14/2018', '12:00PM', 'Booked'),
(185, 'steven', '03/14/2018', '', 'AVAILABLE'),
(186, 'steven', '03/14/2018', '', 'AVAILABLE'),
(187, 'steven', '03/14/2018', '', 'AVAILABLE'),
(188, 'steven', '03/14/2018', '', 'AVAILABLE'),
(189, 'steven', '03/14/2018', '', 'AVAILABLE'),
(190, 'steven', '03/14/2018', '', 'AVAILABLE'),
(191, 'steven', '03/14/2018', '', 'AVAILABLE'),
(192, 'steven', '03/14/2018', '3:00PM', 'Booked'),
(193, 'steven', '03/14/2018', '4:00PM', 'Booked'),
(194, 'steven', '03/14/2018', '', 'AVAILABLE'),
(195, 'steven', '03/14/2018', '', 'AVAILABLE'),
(196, 'steven', '03/14/2018', '', 'AVAILABLE'),
(197, 'steven', '03/14/2018', '', 'AVAILABLE'),
(198, 'steven', '03/14/2018', '', 'AVAILABLE'),
(199, 'steven', '03/14/2018', '', 'AVAILABLE'),
(200, 'steven', '03/14/2018', '', 'AVAILABLE'),
(201, 'steven', '03/14/2018', '', 'AVAILABLE'),
(202, 'steven', '03/14/2018', '', 'AVAILABLE'),
(203, 'adman', '03/14/2018', '9:00AM', 'AVAILABLE'),
(204, 'adman', '03/14/2018', '9:00AM', 'AVAILABLE'),
(205, 'adman', '03/14/2018', '11:00AM', 'AVAILABLE'),
(206, 'adman', '03/14/2018', '', 'AVAILABLE'),
(207, 'steven', '03/15/2018', '9:00AM', 'Booked'),
(208, 'steven', '03/15/2018', '10:00AM', 'Booked'),
(209, 'steven', '03/15/2018', '11:00AM', 'AVAILABLE'),
(210, 'steven', '03/15/2018', '12:00PM', 'AVAILABLE'),
(211, 'steven', '03/15/2018', '9:00AM', 'Booked'),
(212, 'steven', '03/15/2018', '10:00AM', 'Booked'),
(213, 'steven', '03/15/2018', '11:00AM', 'AVAILABLE'),
(214, 'steven', '03/15/2018', '12:00PM', 'AVAILABLE'),
(215, 'steven', '03/16/2018', '9:00AM', 'Booked'),
(216, 'steven', '03/16/2018', '10:00AM', 'Booked'),
(217, 'steven', '03/16/2018', '11:00AM', 'Booked'),
(218, 'steven', '03/16/2018', '12:00PM', 'AVAILABLE'),
(219, 'steven', '03/16/2018', '1:00PM', 'AVAILABLE'),
(220, 'steven', '03/16/2018', '2:00PM', 'AVAILABLE'),
(221, 'steven', '03/16/2018', '3:00PM', 'AVAILABLE'),
(222, 'steven', '03/16/2018', '4:00PM', 'AVAILABLE'),
(223, 'steven', '03/17/2018', '9:00AM', 'Booked'),
(224, 'steven', '03/17/2018', '10:00AM', 'Booked'),
(225, 'adman', '03/17/2018', '9:00AM', 'Booked'),
(226, 'adman', '03/17/2018', '10:00AM', 'AVAILABLE'),
(227, 'adman', '03/17/2018', '11:00AM', 'AVAILABLE'),
(228, 'steven', '03/18/2018', '9:00AM', 'Booked'),
(229, 'steven', '03/18/2018', '10:00AM', 'AVAILABLE'),
(230, 'steven', '03/18/2018', '11:00AM', 'AVAILABLE'),
(231, 'steven', '03/19/2018', '9:00AM', 'Booked'),
(232, 'steven', '03/19/2018', '10:00AM', 'Booked'),
(233, 'steven', '03/19/2018', '9:00AM', 'Booked'),
(234, 'steven', '03/19/2018', '10:00AM', 'Booked'),
(235, 'steven', '03/19/2018', '11:00AM', 'Booked'),
(236, 'steven', '03/20/2018', '10:00AM', 'Booked'),
(237, 'steven', '03/24/2018', '9:00AM', 'Booked'),
(238, 'steven', '03/24/2018', '10:00AM', 'AVAILABLE'),
(239, 'steven', '03/24/2018', '11:00AM', 'AVAILABLE'),
(240, 'steven', '03/24/2018', '12:00PM', 'AVAILABLE'),
(241, 'steven', '03/25/2018', '9:00AM', 'Booked'),
(242, 'steven', '03/25/2018', '10:00AM', 'Booked'),
(243, 'steven', '03/25/2018', '11:00AM', 'Booked'),
(244, 'steven', '03/26/2018', '9:00AM', 'Booked'),
(245, 'steven', '03/26/2018', '10:00AM', 'Booked'),
(246, 'steven', '03/27/2018', '9:00AM', 'Booked'),
(247, 'steven', '03/27/2018', '10:00AM', 'Booked'),
(248, 'steven', '04/11/2018', '9:00AM', 'Booked'),
(249, 'steven', '04/12/2018', '11:00AM', 'Booked'),
(250, 'steven', '04/12/2018', '9:00AM', 'Booked'),
(251, 'steven', '04/12/2018', '10:00AM', 'Booked'),
(252, 'steven', '04/12/2018', '11:00AM', 'Booked'),
(253, 'steven', '04/11/2018', '11:00AM', 'AVAILABLE'),
(254, 'steven', '04/12/2018', '2:00PM', 'Booked'),
(255, 'adman', '04/28/2018', '9:00AM', 'Booked'),
(256, 'adman', '04/28/2018', '10:00AM', 'AVAILABLE'),
(257, 'adman', '04/28/2018', '11:00AM', 'AVAILABLE'),
(258, 'steven', '04/27/2018', '11:00AM', 'AVAILABLE'),
(259, 'steven', '04/27/2018', '10:00AM', 'AVAILABLE'),
(260, 'steven', '04/27/2018', '1:00PM', 'AVAILABLE'),
(261, 'steven', '04/28/2018', '9:00AM', 'Booked'),
(262, 'steven', '04/28/2018', '10:00AM', 'AVAILABLE'),
(263, 'steven', '04/28/2018', '11:00AM', 'AVAILABLE');

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
  `utype` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `uname`, `upass`, `utype`) VALUES
(1, 'steven', '123456', 'admin'),
(2, 'adman', '123456', 'user'),
(3, 'dias', '123456', 'admin'),
(4, 'abcd', '123456', 'admin');

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
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mname` (`mname`);

--
-- Indexes for table `papp`
--
ALTER TABLE `papp`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`ID`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dapp`
--
ALTER TABLE `dapp`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `discharge`
--
ALTER TABLE `discharge`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
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
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
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
-- AUTO_INCREMENT for table `ipres`
--
ALTER TABLE `ipres`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `ipres1`
--
ALTER TABLE `ipres1`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `itest`
--
ALTER TABLE `itest`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=264;
--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=657;
--
-- AUTO_INCREMENT for table `papp`
--
ALTER TABLE `papp`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `pmedi`
--
ALTER TABLE `pmedi`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT for table `pres`
--
ALTER TABLE `pres`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=212;
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
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=264;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
