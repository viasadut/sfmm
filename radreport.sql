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
-- Table structure for table `radreport`
--

CREATE TABLE IF NOT EXISTS `radreport` (
  `id` int(200) NOT NULL,
  `dname` varchar(300) NOT NULL,
  `pmrn` varchar(200) NOT NULL,
  `pname` varchar(200) NOT NULL,
  `age` int(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `pphone` varchar(15) NOT NULL,
  `dreffer` varchar(200) NOT NULL,
  `report` varchar(5000) NOT NULL,
  `type` varchar(100) NOT NULL,
  `eid` int(200) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `radreport`
--

INSERT INTO `radreport` (`id`, `dname`, `pmrn`, `pname`, `age`, `gender`, `pphone`, `dreffer`, `report`, `type`, `eid`, `status`) VALUES
(1, 'Dr. Latiar', '123456', 'Steven Adman Dias', 31, 'MALE', '01711206048', 'Dr. Razeeb Hassan', 'TEST\r\nTEST', 'CT SCAN', 13, ''),
(2, 'Dr. Ayesha', '123456', 'Steven Adman Dias', 31, 'MALE', '01711206048', 'Dr. Razeeb Hassan', '\n\nSubject: Regarding implementation of OIMS (Outpatients Information Management System) at our hospital.\n\nThe above matter is referred\nPlease be informed that we already started the implementation of OIMS for trail basis from 17th Julyâ€™2018. Depending upon the result of trail, if we found it useful we will gradually implement this system all over the hospital. \nAll of your cordial support and cooperation is highly appreciable.\n\n\n\nSubject: Regarding implementation of OIMS (Outpatients Information Management System) at our hospital.\n\nThe above matter is referred\nPlease be informed that we already started the implementation of OIMS for trail basis from 17th Julyâ€™2018. Depending upon the result of trail, if we found it useful we will gradually implement this system all over the hospital. \n All of your cordial support and cooperation is highly appreciable.\n\n\n\n\nSubject: Regarding implementation of OIMS (Outpatients Information Management System) at our hospital.\n\nThe above matter is referred\nPlease be informed that we already started the implementation of OIMS for trail basis from 17th Julyâ€™2018. Depending upon the result of trail, if we found it useful we will gradually implement this system all over the hospital. \n All of your cordial support and cooperation is highly appreciable.\n\n\n\n\n\n', 'USG', 0, ''),
(3, 'Dr. Ayesha', '123456', 'Steven Adman Dias', 31, 'MALE', '01711206048', 'Dr. Razeeb Hassan', '\r\n\r\nSubject: Regarding implementation of OIMS (Outpatients Information Management System) at our hospital.\r\n\r\nThe above matter is referred\r\nPlease be informed that we already started the implementation of OIMS for trail basis from 17th Julyâ€™2018. Depending upon the result of trail, if we found it useful we will gradually implement this system all over the hospital. \r\nAll of your cordial support and cooperation is highly appreciable.\r\n\r\n\r\n\r\nSubject: Regarding implementation of OIMS (Outpatients Information Management System) at our hospital.\r\n\r\nThe above matter is referred\r\nPlease be informed that we already started the implementation of OIMS for trail basis from 17th Julyâ€™2018. Depending upon the result of trail, if we found it useful we will gradually implement this system all over the hospital. \r\n All of your cordial support and cooperation is highly appreciable.\r\n\r\n\r\n\r\n\r\nSubject: Regarding implementation of OIMS (Outpatients Information Management System) at our hospital.\r\n\r\nThe above matter is referred\r\nPlease be informed that we already started the implementation of OIMS for trail basis from 17th Julyâ€™2018. Depending upon the result of trail, if we found it useful we will gradually implement this system all over the hospital. \r\n All of your cordial support and cooperation is highly appreciable.\r\n\r\n\r\n\r\n\r\n\r\n', 'USG', 13, ''),
(4, 'Dr. Ayesha', '123456', 'Steven Adman Dias', 31, 'MALE', '01711206048', 'CT SCAN', '', 'CT SCAN', 4, ''),
(5, 'Dr. Ayesha', '123456', 'Steven Adman Dias', 31, 'MALE', '01711206048', 'CT SCAN', '', 'CT SCAN', 5, ''),
(6, 'Dr. Ayesha', '123456', 'Steven Adman Dias', 31, 'MALE', '01711206048', 'CT SCAN', '\r\n\r\nSubject: Regarding implementation of OIMS (Outpatients Information Management System) at our hospital.\r\n\r\nThe above matter is referred\r\nPlease be informed that we already started the implementation of OIMS for trail basis from 17th JulyÃ¢â‚¬â„¢2018. Depending upon the result of trail, if we found it useful we will gradually implement this system all over the hospital. \r\nAll of your cordial support and cooperation is highly appreciable.\r\n\r\n\r\n\r\nSubject: Regarding implementation of OIMS (Outpatients Information Management System) at our hospital.\r\n\r\nThe above matter is referred\r\nPlease be informed that we already started the implementation of OIMS for trail basis from 17th JulyÃ¢â‚¬â„¢2018. Depending upon the result of trail, if we found it useful we will gradually implement this system all over the hospital. \r\n All of your cordial support and cooperation is highly appreciable.\r\n\r\n\r\n\r\n\r\nSubject: Regarding implementation of OIMS (Outpatients Information Management System) at our hospital.\r\n\r\nThe above matter is referred\r\nPlease be informed that we already started the implementation of OIMS for trail basis from 17th JulyÃ¢â‚¬â„¢2018. Depending upon the result of trail, if we found it useful we will gradually implement this system all over the hospital. \r\n All of your cordial support and cooperation is highly appreciable.\r\n\r\n\r\n\r\n\r\n\r\n', 'CT SCAN', 6, ''),
(7, 'Dr. Latiar', '456456', 'KAMAL JAMAL', 98, 'MALE', '989080988', 'Dr. Ranen Biswas', 'CT SCAN OF BRAIN\r\n\r\nClinical Information: Headache & HTN.\r\nTechnique:  NECT in Axial plane.\r\nFindings: \r\nThe cerebrum and cerebellum show normal cortical sulcation.\r\nNormal development of the white matter and cortex with \r\nnormal density of the white matter.\r\nThe interhemispheric fissure is centered on the midline. \r\nThe ventricles are of normal size and symmetrically arranged. \r\nThere are no signs of increased intracranial pressure.\r\nThe basal ganglia, internal capsule, corpus callosum, thalami, \r\nbrain stem and cerebellum appear normal.\r\nSella and pituitary are normal. Parasellar structures are unremarkable. \r\nThere are no abnormalities in the cerebellopontine angle areas on both sides.\r\nThere are no abnormalities in the calvarium.\r\n\r\nImpression:  No significant abnormality is detected. \r\n', 'CT SCAN', 1, ''),
(8, 'Dr. Latiar', '339977', 'Masum Billah', 34, 'MALE', '0172087907', 'Dr. Razeeb Hassan', 'CT SCAN OF CHEST\r\n\r\nClinical Information: Fever for 01 year & Vomiting.\r\nTechnique:  Multi-slice CT of chest was performed.\r\n\r\nReport:- \r\nHeterogeneously enhancing triangular density with base at the heart and apex along the horizontal fissure, represent atelectating segment of right middle lobe is noted. \r\nMultiple centimetric & sub-centimetric enlarged lymphnodes are noted at right hilum, right paratracheal, right supra-clavicular and subcarinal region. Larger one at right lower tracheal region (about 6.1 x 3.6) cm, which compressed the upper & middle lobar bronchus. \r\n\r\nBoth lungs are normally aerated and are applied to the chest wall on all sides. There is no sign of circumscribed pleural thickening and no fluid collection.\r\nPulmonary structure is normal and shows normal vascular markings. \r\nThere are no intrapulmonary nodules or patchy opacities.\r\nThe mediastinum is centered and of normal width. \r\nThe heart is normal in size, shape & position. \r\nThe cardiac chambers are of normal size.\r\nMajor intra-thoracic vessels and imaged portions of \r\nthe supra-aortic vessels are unremarkable.\r\nThe thoracic skeleton and thoracic soft tissues show no abnormalities.\r\n\r\nImpression: Suggestive of right middle lobe collapse. \r\nHeterogeneously enhancing multiple enlarged lymphnodes at right hilum, right paratracheal, right supra-clavicular & sub-carinal region. \r\n\r\nAdv: FNAC for further evaluation.\r\n', 'CT SCAN', 1, ''),
(9, 'Dr. Ayesha', '16682', 'Nuradilah Shuib', 35, 'FEMALE', '01711206048', 'Outside Refferal', 'CT SCAN OF CHEST\r\n\r\nClinical Information: Fever for 01 year & Vomiting.\r\nTechnique:  Multi-slice CT of chest was performed.\r\n\r\nReport:- \r\nHeterogeneously enhancing triangular density with base at the heart and apex along the horizontal fissure, represent atelectating segment of right middle lobe is noted. \r\nMultiple centimetric & sub-centimetric enlarged lymphnodes are noted at right hilum, right paratracheal, right supra-clavicular and subcarinal region. Larger one at right lower tracheal region (about 6.1 x 3.6) cm, which compressed the upper & middle lobar bronchus. \r\n\r\nBoth lungs are normally aerated and are applied to the chest wall on all sides. There is no sign of circumscribed pleural thickening and no fluid collection.\r\nPulmonary structure is normal and shows normal vascular markings. \r\nThere are no intrapulmonary nodules or patchy opacities.\r\nThe mediastinum is centered and of normal width. \r\nThe heart is normal in size, shape & position. \r\nThe cardiac chambers are of normal size.\r\nMajor intra-thoracic vessels and imaged portions of \r\nthe supra-aortic vessels are unremarkable.\r\nThe thoracic skeleton and thoracic soft tissues show no abnormalities.\r\n\r\nImpression: Suggestive of right middle lobe collapse. \r\nHeterogeneously enhancing multiple enlarged lymphnodes at right hilum, right paratracheal, right supra-clavicular & sub-carinal region. \r\n\r\nAdv: FNAC for further evaluation.\r\n', 'CT SCAN', 1, ''),
(10, 'Dr. Latiar', '16682', 'Nuradilah Shuib', 35, 'FEMALE', '01711206048', 'Outside Refferal', 'hbghjdgvgjhgdvj', 'CT SCAN', 2, 'SEEN'),
(11, 'Dr. Ayesha', '16682', 'Nuradilah Shuib', 35, 'FEMALE', '01711206048', 'Outside Refferal', 'JHJKHJJHJHH\r\ndsfdsjfh\r\n', 'CT SCAN', 3, 'SEEN'),
(12, 'Dr. Ayesha', '16682', 'Nuradilah Shuib', 35, 'FEMALE', '01711206048', 'Outside Refferal', 'ldskjkjfdsf\r\ndskfjsdkljg\r\ndsgkjsdklg', 'CT SCAN', 4, 'SEEN'),
(13, 'Dr. Latiar', '456456', 'KAMAL JAMAL', 98, 'MALE', '989080988', 'Dr. Razeeb Hassan', 'X-RAY OF PNS OM VIEW:\r\n       \r\n\r\n\r\n\r\nBoth maxillary sinuses are clear.\r\nNo DNS & HIT is noted.\r\n\r\nIMPRESSION:  Normal study. \r\n', 'xray', 2, 'SEEN'),
(14, 'Dr. Ayesha', '123456', 'Steven Adman Dias', 31, 'MALE', '01711206048', 'Dr. Ranen Biswas', '\r\nCT BRAIN\r\n\r\nClinical History: \r\n\r\nTechniques: Axial CT scan of brain was performed without contrast with coronal and sagittal reformats in soft tissue algorithm. Axial images are shown in the film. \r\n\r\nComparison: None.\r\n\r\nFindings: (Reporting on PACS). \r\n\r\nGrey-white differentiation is maintained. There is no mass lesion or mass effect. No acute intracranial hemorrhage. No acute territorial infarction is noted. Myelination appears age appropriate. Midline structures like pineal, pituitary, corpus callosum are normal. \r\nThe brain stem and the cerebellum are normal. No Chiari I malformation is noted. \r\nVentricles are normal in size and configuration. CSF spaces are unremarkable.\r\nNo focal extra-axial collection noted.\r\nOrbits are normal and symmetric.\r\nMastoid air cells clear.\r\nParanasal sinuses are clear. \r\n\r\nImpression: \r\nNormal CT scan of brain.\r\n', 'MRI', 7, 'SEEN'),
(15, 'Dr. Ayesha', '123456', 'Steven Adman Dias', 31, 'MALE', '01711206048', 'Dr. Razeeb Hassan', 'jjjh', 'xray', 8, 'SEEN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `radreport`
--
ALTER TABLE `radreport`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `radreport`
--
ALTER TABLE `radreport`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
