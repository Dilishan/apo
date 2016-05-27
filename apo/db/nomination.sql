-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 26, 2016 at 05:04 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nomination`
--
CREATE DATABASE IF NOT EXISTS `nomination` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `nomination`;

-- --------------------------------------------------------

--
-- Table structure for table `apo_sending`
--

CREATE TABLE IF NOT EXISTS `apo_sending` (
  `pro_id` varchar(35) NOT NULL,
  `sending_date` date NOT NULL,
  PRIMARY KEY (`pro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apo_sending`
--

INSERT INTO `apo_sending` (`pro_id`, `sending_date`) VALUES
('aaa', '2016-03-18'),
('bbbb', '2016-03-03'),
('new', '2016-03-03'),
('NPO/SL/03/01/993', '2015-03-11');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `pro_id` varchar(35) NOT NULL,
  `c_cname` varchar(150) NOT NULL,
  PRIMARY KEY (`pro_id`,`c_cname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`pro_id`, `c_cname`) VALUES
('aaa', 'NPS'),
('NPO/SL/03/01/993', 'NPS');

-- --------------------------------------------------------

--
-- Table structure for table `com_app`
--

CREATE TABLE IF NOT EXISTS `com_app` (
  `pro_id` varchar(35) NOT NULL,
  `app_date` date NOT NULL,
  PRIMARY KEY (`pro_id`,`app_date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `com_app`
--

INSERT INTO `com_app` (`pro_id`, `app_date`) VALUES
('aaa', '2016-03-17'),
('bbbb', '2016-03-01'),
('new', '2016-03-18'),
('NPO/SL/03/01/993', '2015-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `file_closing`
--

CREATE TABLE IF NOT EXISTS `file_closing` (
  `pro_id` varchar(35) NOT NULL,
  `f_closing_date` date NOT NULL,
  PRIMARY KEY (`pro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nom_calling`
--

CREATE TABLE IF NOT EXISTS `nom_calling` (
  `pro_id` varchar(35) NOT NULL,
  `calling_date` date NOT NULL,
  PRIMARY KEY (`pro_id`,`calling_date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nom_calling`
--

INSERT INTO `nom_calling` (`pro_id`, `calling_date`) VALUES
('aaa', '2016-03-10'),
('aaa', '2016-03-26'),
('bbbb', '2016-03-26'),
('new', '2016-03-02'),
('NPO/SL/03/01/993', '2015-12-31'),
('NPO/SL/03/01/993', '2016-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `nom_rec_c`
--

CREATE TABLE IF NOT EXISTS `nom_rec_c` (
  `pro_id` varchar(35) NOT NULL,
  `pers_id` int(20) NOT NULL,
  `type` varchar(10) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `title` varchar(5) NOT NULL,
  `name` varchar(256) NOT NULL,
  `cont_1` int(10) NOT NULL,
  `cont_2` int(10) NOT NULL,
  `cname` varchar(150) NOT NULL,
  `bio_data` varchar(3) NOT NULL,
  `declaration` varchar(3) NOT NULL,
  PRIMARY KEY (`pro_id`,`pers_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nom_rec_c`
--

INSERT INTO `nom_rec_c` (`pro_id`, `pers_id`, `type`, `designation`, `title`, `name`, `cont_1`, `cont_2`, `cname`, `bio_data`, `declaration`) VALUES
('aaa', 6, 'Via Organi', 'IT', 'Mr.', 'chanaka', 22222222, 3333333, 'NPS', 'Yes', 'Yes'),
('bbbb', 8, 'Personally', 'bbbbbbbbbbb', 'Mr.', 'bbbbbbbbb', 1111111, 222222222, 'bbbbbbbbbbb', 'No', 'No'),
('new', 7, 'Personally', 'aaaaaaaaaaaa', 'Mr.', 'abc', 2147483647, 1111111111, 'NPS', 'No', 'No'),
('new', 9, 'Personally', 'IT', 'Mr.', 'chanaka', 123, 321, 'NPS', 'No', 'No'),
('NPO/SL/03/01/993', 3, 'Personally', 'Manager', 'Mr.', 'Janaka Rathnakumara', 332256478, 715559545, 'Wijaya News paper', 'Yes', 'Yes'),
('NPO/SL/03/01/993', 4, 'Personally', 'Assist Director', 'Mrs.', 'A.D.Y. Anandani', 112256485, 765456325, 'NPS', 'Yes', 'Yes'),
('NPO/SL/03/01/993', 5, 'Personally', 'Development Assistant', 'Mrs.', 'Fathima Marker', 332256487, 754587945, 'NPS', 'Yes', 'Yes'),
('NPO/SL/03/01/993', 10, 'Personally', 'IT', 'Mr.', 'chanaka', 112233, 332211, 'NPS', 'No', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE IF NOT EXISTS `person` (
  `pro_id` varchar(35) NOT NULL,
  `pers_id` int(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(5) NOT NULL,
  `pers_name` varchar(256) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `cname` varchar(50) NOT NULL,
  PRIMARY KEY (`pers_id`,`pro_id`),
  KEY `pro_id` (`pro_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`pro_id`, `pers_id`, `title`, `pers_name`, `designation`, `cname`) VALUES
('NPO/SL/03/01/993', 4, 'Mr.', 'Janaka Rathnakumara', 'Manager', 'Wijaya News paper'),
('NPO/SL/03/01/993', 5, 'Mrs.', 'A.D.Y. Anandani', 'Assist Director', 'NPS'),
('NPO/SL/03/01/993', 6, 'Mrs.', 'Fathima Marker', 'Development Assistant', 'NPS'),
('NPO/SL/03/01/993', 8, 'Miss.', 'Chandani Bothota', 'Development Assistant', 'NPS'),
('NPO/SL/03/01/993', 9, 'Mr.', 'Puwanendra', 'Development Officer', 'NPS'),
('NPO/SL/03/01/993', 10, 'Mr.', 'Ruwan Bandujeewa', 'Development Officer', 'NPS'),
('NPO/SL/03/01/993', 11, 'Mr.', 'Kokila Priyadarshana', 'Development Officer', 'NPS'),
('aaa', 12, 'Mr.', 'Janaka Rathnakumara', 'Manager', 'NPS'),
('new', 13, 'Mr.', 'abc', 'aaaaaaaaaaaa', 'NPS'),
('bbbb', 14, 'Mr.', 'bbbbbbbbb', 'bbbbbbbbbbb', 'bbbbbbbbbbb');

-- --------------------------------------------------------

--
-- Table structure for table `project_details`
--

CREATE TABLE IF NOT EXISTS `project_details` (
  `pro_id` varchar(35) NOT NULL,
  `pro_code` varchar(35) NOT NULL,
  `pro_title` varchar(200) NOT NULL,
  `venue` varchar(35) NOT NULL,
  `pro_duration` varchar(35) NOT NULL,
  `pro_close_date` date NOT NULL,
  PRIMARY KEY (`pro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_details`
--

INSERT INTO `project_details` (`pro_id`, `pro_code`, `pro_title`, `venue`, `pro_duration`, `pro_close_date`) VALUES
('aaa', '789456', 'testing project2', 'IN', '2 weeks', '2016-03-19'),
('bbbb', 'bbbbb', 'bbbbb', 'bbbbbbb', '11111', '2016-03-03'),
('new', 'aaaaaaaaaaaaaaaa', 'new', 'SRI LANKA', '12', '2016-03-03'),
('NPO/SL/03/01/993', '15-IN-98-GE/SPP-TRC-A', 'Training Course on Energy Conservation', 'Japan', '15-26 February 2016(12 days)', '2015-12-25'),
('test', '112234', 'testing project', 'SL', '1 week', '2016-03-01'),
('test final', 'test final', 'test final title', 'Pakistan', '2 weeks', '2016-03-27');

-- --------------------------------------------------------

--
-- Table structure for table `reimbursment`
--

CREATE TABLE IF NOT EXISTS `reimbursment` (
  `pro_id` varchar(35) NOT NULL,
  `pers_id` varchar(20) NOT NULL,
  `bank` varchar(35) NOT NULL,
  `acc_no` int(20) NOT NULL,
  `cheque_no` varchar(30) NOT NULL,
  `cheque_date` date NOT NULL,
  `r_value` int(20) NOT NULL,
  `reimbursed` varchar(3) NOT NULL,
  PRIMARY KEY (`pers_id`,`pro_id`),
  KEY `pro_id` (`pro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reimbursment`
--

INSERT INTO `reimbursment` (`pro_id`, `pers_id`, `bank`, `acc_no`, `cheque_no`, `cheque_date`, `r_value`, `reimbursed`) VALUES
('NPO/SL/03/01/993', '3', 'BOC', 123456789, '123456789', '2015-11-18', 20000, 'Yes'),
('NPO/SL/03/01/993', '5', 'NSB', 123456789, '123456789', '2015-10-20', 30000, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `report_details`
--

CREATE TABLE IF NOT EXISTS `report_details` (
  `pro_id` varchar(35) NOT NULL,
  `pers_id` int(20) NOT NULL,
  `submitted` varchar(3) NOT NULL,
  `date_of_submition` date NOT NULL,
  PRIMARY KEY (`pro_id`,`pers_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report_details`
--

INSERT INTO `report_details` (`pro_id`, `pers_id`, `submitted`, `date_of_submition`) VALUES
('NPO/SL/03/01/993', 3, 'Yes', '2015-12-23'),
('NPO/SL/03/01/993', 4, 'Yes', '2015-11-25'),
('NPO/SL/03/01/993', 5, 'Yes', '2015-10-20');

-- --------------------------------------------------------

--
-- Table structure for table `ticketing`
--

CREATE TABLE IF NOT EXISTS `ticketing` (
  `pro_id` varchar(35) NOT NULL,
  `pers_id` varchar(20) NOT NULL,
  `agency_name` varchar(60) NOT NULL,
  `value` int(20) NOT NULL,
  PRIMARY KEY (`pro_id`,`pers_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticketing`
--

INSERT INTO `ticketing` (`pro_id`, `pers_id`, `agency_name`, `value`) VALUES
('aaa', '6', 'dfgasf', 232),
('bbbb', '8', 'bbbbbbbb', 123),
('new', '7', 'aaaaaaaa', 123),
('NPO/SL/03/01/993', '3', 'Test Agency', 20000),
('NPO/SL/03/01/993', '4', 'Test Agency', 30000),
('NPO/SL/03/01/993', '5', 'Test Agency', 25000);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apo_sending`
--
ALTER TABLE `apo_sending`
  ADD CONSTRAINT `apo_sending_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `project_details` (`pro_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `nom_calling` (`pro_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `com_app`
--
ALTER TABLE `com_app`
  ADD CONSTRAINT `com_app_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `project_details` (`pro_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `file_closing`
--
ALTER TABLE `file_closing`
  ADD CONSTRAINT `file_closing_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `project_details` (`pro_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nom_calling`
--
ALTER TABLE `nom_calling`
  ADD CONSTRAINT `nom_calling_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `project_details` (`pro_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nom_rec_c`
--
ALTER TABLE `nom_rec_c`
  ADD CONSTRAINT `nom_rec_c_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `project_details` (`pro_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `person`
--
ALTER TABLE `person`
  ADD CONSTRAINT `person_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `nom_calling` (`pro_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reimbursment`
--
ALTER TABLE `reimbursment`
  ADD CONSTRAINT `reimbursment_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `project_details` (`pro_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `report_details`
--
ALTER TABLE `report_details`
  ADD CONSTRAINT `report_details_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `project_details` (`pro_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticketing`
--
ALTER TABLE `ticketing`
  ADD CONSTRAINT `ticketing_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `project_details` (`pro_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
