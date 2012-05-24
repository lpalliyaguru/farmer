-- phpMyAdmin SQL Dump
-- version 3.4.5deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 24, 2012 at 11:59 PM
-- Server version: 5.1.62
-- PHP Version: 5.3.6-13ubuntu3.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `farmer`
--

-- --------------------------------------------------------

--
-- Table structure for table `fm_area`
--

CREATE TABLE IF NOT EXISTS `fm_area` (
  `areaId` varchar(20) NOT NULL,
  `areaName` varchar(100) DEFAULT NULL,
  `executiveId` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`areaId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fm_area`
--

INSERT INTO `fm_area` (`areaId`, `areaName`, `executiveId`) VALUES
('0001', 'Kathnoruwa', '001'),
('0002', 'Siyabalape', '002'),
('1234', 'cmb', '1234'),
('1254', 'nugegoda', '1358'),
('78', 'asdf', 'zxcv');

-- --------------------------------------------------------

--
-- Table structure for table `fm_bank`
--

CREATE TABLE IF NOT EXISTS `fm_bank` (
  `bankCode` varchar(20) NOT NULL,
  `bankName` varchar(100) NOT NULL,
  PRIMARY KEY (`bankCode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fm_bank`
--

INSERT INTO `fm_bank` (`bankCode`, `bankName`) VALUES
('2344', 'PeoplesBank'),
('2231', 'Bank Of Ceylon');

-- --------------------------------------------------------

--
-- Table structure for table `fm_bankBranch`
--

CREATE TABLE IF NOT EXISTS `fm_bankBranch` (
  `branchCode` varchar(20) NOT NULL,
  `branchName` varchar(100) NOT NULL,
  `bankCode` varchar(20) NOT NULL,
  PRIMARY KEY (`branchCode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fm_bankBranch`
--

INSERT INTO `fm_bankBranch` (`branchCode`, `branchName`, `bankCode`) VALUES
('02', 'Hikkaduwa', '2344'),
('16', 'Ambalangoda', '2231'),
('25', 'karapitiya', '2234'),
('42', 'Nugegoda', '2231'),
('15', 'Balapitiya', '2344');

-- --------------------------------------------------------

--
-- Table structure for table `fm_center`
--

CREATE TABLE IF NOT EXISTS `fm_center` (
  `centerId` varchar(40) NOT NULL,
  `areaId` varchar(20) DEFAULT NULL,
  `centerName` varchar(100) DEFAULT NULL,
  `supervisorId` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`centerId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fm_center`
--

INSERT INTO `fm_center` (`centerId`, `areaId`, `centerName`, `supervisorId`) VALUES
('01', '0001', 'Galgamuwa', '001'),
('02', '0002', 'Kirulapona', '002'),
('03', '0001', 'Katubedda', '003'),
('04', '0001', 'Nilaweli', '004'),
('5', '1234', 'nugegoda', '2');

-- --------------------------------------------------------

--
-- Table structure for table `fm_crop`
--

CREATE TABLE IF NOT EXISTS `fm_crop` (
  `cropId` varchar(100) NOT NULL,
  `areaId` varchar(20) NOT NULL,
  `farmerId` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `quantity` decimal(8,2) NOT NULL,
  `rejectedQuantity` decimal(8,2) NOT NULL,
  `categoryCode` varchar(20) NOT NULL,
  `frequency` varchar(20) NOT NULL,
  `slipNo` varchar(20) NOT NULL,
  `netValue` decimal(8,2) NOT NULL,
  PRIMARY KEY (`cropId`,`areaId`,`farmerId`,`date`,`categoryCode`,`frequency`,`slipNo`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fm_crop`
--

INSERT INTO `fm_crop` (`cropId`, `areaId`, `farmerId`, `date`, `quantity`, `rejectedQuantity`, `categoryCode`, `frequency`, `slipNo`, `netValue`) VALUES
('1317035970', '0001', '100', '2011-09-26', '22.00', '4.00', 'Small', '1', '123', '3460.00'),
('1317035986', '0001', '100', '2011-09-26', '31.00', '4.00', 'Small', '1', '124', '4960.00'),
('1317038131', '0001', '459', '2011-09-26', '25.00', '4.00', 'Small', '0', '125', '3880.00'),
('1324881848', '0001', '12356', '2011-12-26', '30.00', '3.00', 'Small', '0', '11111', '5570.00');

-- --------------------------------------------------------

--
-- Table structure for table `fm_cropCategory`
--

CREATE TABLE IF NOT EXISTS `fm_cropCategory` (
  `categoryCode` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`categoryCode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fm_farmer`
--

CREATE TABLE IF NOT EXISTS `fm_farmer` (
  `farmerId` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surName` varchar(100) NOT NULL,
  `gender` varchar(40) NOT NULL,
  `nic` varchar(20) NOT NULL,
  `nationality` varchar(40) NOT NULL,
  `address` varchar(100) NOT NULL,
  `tpNo` int(20) NOT NULL,
  `areaId` varchar(20) NOT NULL,
  `centerId` varchar(20) NOT NULL,
  `acherage` varchar(40) NOT NULL,
  `prodCategory` varchar(20) NOT NULL,
  `bankcode` varchar(20) NOT NULL,
  `acctNo` varchar(40) NOT NULL,
  `acctHolderName` varchar(100) NOT NULL,
  `addedBy` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fm_farmer`
--

INSERT INTO `fm_farmer` (`farmerId`, `name`, `surName`, `gender`, `nic`, `nationality`, `address`, `tpNo`, `areaId`, `centerId`, `acherage`, `prodCategory`, `bankcode`, `acctNo`, `acctHolderName`, `addedBy`) VALUES
('12356', 'harshana', 'weerasinghe', 'male', '882569855V', 'sinhalese', 'kaburupitiya,matara', 22222, '0001', '01', '16', 'Small', '2344-02', 'harshana prabath', 'Medium', 'Medium'),
('100', 'Sarath', 'samaraweera', 'male', '12345678', 'christian', 'kathnoruwa', 456, '0001', '01', '23', 'Small', '2344-15', '232323', 'sarath', 'admin'),
('459', 'jayantha', 'bandara', 'male', '223344444', 'tamil', 'gagamuwa, kathnoruwa', 0, '0001', '01', '33', 'Large', '2231-16', '4445454', 'jayantha bandara', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `fm_farmerItem`
--

CREATE TABLE IF NOT EXISTS `fm_farmerItem` (
  `itemCode` varchar(20) NOT NULL,
  `farmerId` varchar(20) NOT NULL,
  `date` varchar(40) NOT NULL,
  PRIMARY KEY (`itemCode`,`farmerId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fm_grade`
--

CREATE TABLE IF NOT EXISTS `fm_grade` (
  `gradeCode` varchar(20) NOT NULL,
  `areaId` varchar(20) NOT NULL,
  `categoryCode` varchar(20) NOT NULL,
  `description` varchar(40) NOT NULL,
  `unitPrice` decimal(8,2) NOT NULL,
  PRIMARY KEY (`gradeCode`,`areaId`,`categoryCode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fm_grade`
--

INSERT INTO `fm_grade` (`gradeCode`, `areaId`, `categoryCode`, `description`, `unitPrice`) VALUES
('grade1', '1234', 'Small', '', '180.00'),
('grade2', '1234', 'Small', '', '170.00'),
('grade3', '1234', 'Small', '', '150.50'),
('grade4', '1234', 'Small', '', '137.00'),
('grade5', '1234', 'Small', '', '130.00'),
('grade6', '1234', 'Small', '', '120.00'),
('crs', '1234', 'Small', '', '100.00'),
('grade1', '0001', 'Small', '', '200.00'),
('grade2', '0001', 'Small', '', '180.00'),
('grade3', '0001', 'Small', '', '170.00'),
('grade4', '0001', 'Small', '', '160.00'),
('grade5', '0001', 'Small', '', '150.00'),
('grade6', '0001', 'Small', '', '140.00'),
('crs', '0001', 'Small', '', '120.00'),
('grade1', '0001', 'Medium', '', '300.00'),
('grade2', '0001', 'Medium', '', '280.00'),
('grade3', '0001', 'Medium', '', '270.00'),
('grade4', '0001', 'Medium', '', '250.00'),
('grade5', '0001', 'Medium', '', '240.00'),
('grade6', '0001', 'Medium', '', '220.00'),
('crs', '0001', 'Medium', '', '200.00');

-- --------------------------------------------------------

--
-- Table structure for table `fm_gradeForCrop`
--

CREATE TABLE IF NOT EXISTS `fm_gradeForCrop` (
  `cropId` varchar(100) NOT NULL,
  `farmerId` varchar(20) NOT NULL,
  `gradeCode` varchar(20) NOT NULL,
  `quantity` decimal(8,2) NOT NULL,
  `areaId` varchar(20) NOT NULL,
  `categoryCode` varchar(20) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`cropId`,`farmerId`,`gradeCode`,`areaId`,`categoryCode`,`date`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fm_gradeForCrop`
--

INSERT INTO `fm_gradeForCrop` (`cropId`, `farmerId`, `gradeCode`, `quantity`, `areaId`, `categoryCode`, `date`) VALUES
('1317035970', '100', 'grade1', '4.00', '0001', 'Small', '2011-09-26'),
('1317035970', '100', 'grade2', '1.00', '0001', 'Small', '2011-09-26'),
('1317035970', '100', 'grade3', '2.00', '0001', 'Small', '2011-09-26'),
('1317035970', '100', 'grade4', '5.00', '0001', 'Small', '2011-09-26'),
('1317035970', '100', 'grade5', '4.00', '0001', 'Small', '2011-09-26'),
('1317035970', '100', 'grade6', '1.00', '0001', 'Small', '2011-09-26'),
('1317035970', '100', 'crs', '5.00', '0001', 'Small', '2011-09-26'),
('1317035986', '100', 'grade1', '4.00', '0001', 'Small', '2011-09-26'),
('1317035986', '100', 'grade2', '5.00', '0001', 'Small', '2011-09-26'),
('1317035986', '100', 'grade3', '4.00', '0001', 'Small', '2011-09-26'),
('1317035986', '100', 'grade4', '5.00', '0001', 'Small', '2011-09-26'),
('1317035986', '100', 'grade5', '4.00', '0001', 'Small', '2011-09-26'),
('1317035986', '100', 'grade6', '5.00', '0001', 'Small', '2011-09-26'),
('1317035986', '100', 'crs', '4.00', '0001', 'Small', '2011-09-26'),
('1317038131', '459', 'grade1', '1.00', '0001', 'Small', '2011-09-26'),
('1317038131', '459', 'grade2', '4.00', '0001', 'Small', '2011-09-26'),
('1317038131', '459', 'grade3', '4.00', '0001', 'Small', '2011-09-26'),
('1317038131', '459', 'grade4', '4.00', '0001', 'Small', '2011-09-26'),
('1317038131', '459', 'grade5', '4.00', '0001', 'Small', '2011-09-26'),
('1317038131', '459', 'grade6', '4.00', '0001', 'Small', '2011-09-26'),
('1317038131', '459', 'crs', '4.00', '0001', 'Small', '2011-09-26'),
('1324881848', '12356', 'grade1', '21.00', '0001', 'Small', '2011-12-26'),
('1324881848', '12356', 'grade2', '1.00', '0001', 'Small', '2011-12-26'),
('1324881848', '12356', 'grade3', '2.00', '0001', 'Small', '2011-12-26'),
('1324881848', '12356', 'grade4', '2.00', '0001', 'Small', '2011-12-26'),
('1324881848', '12356', 'grade5', '1.00', '0001', 'Small', '2011-12-26'),
('1324881848', '12356', 'grade6', '1.00', '0001', 'Small', '2011-12-26'),
('1324881848', '12356', 'crs', '2.00', '0001', 'Small', '2011-12-26'),
('1324886296', '100', 'grade1', '21.00', '0001', 'Small', '2011-12-26'),
('1324886296', '100', 'grade2', '12.00', '0001', 'Small', '2011-12-26'),
('1324886296', '100', 'grade3', '2.00', '0001', 'Small', '2011-12-26'),
('1324886296', '100', 'grade4', '122.00', '0001', 'Small', '2011-12-26'),
('1324886296', '100', 'grade5', '1.00', '0001', 'Small', '2011-12-26'),
('1324886296', '100', 'grade6', '1.00', '0001', 'Small', '2011-12-26'),
('1324886296', '100', 'crs', '1.00', '0001', 'Small', '2011-12-26');

-- --------------------------------------------------------

--
-- Table structure for table `fm_item`
--

CREATE TABLE IF NOT EXISTS `fm_item` (
  `itemCode` varchar(20) NOT NULL,
  `itemName` varchar(50) NOT NULL,
  `unitPrice` decimal(20,2) NOT NULL,
  `unit` varchar(20) NOT NULL,
  PRIMARY KEY (`itemCode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fm_item`
--

INSERT INTO `fm_item` (`itemCode`, `itemName`, `unitPrice`, `unit`) VALUES
('1234', 'fertilizer', '1200.00', 'Kg'),
('1565', 'seed-157', '126.00', 'g'),
('1658', 'LakPohora', '1520.50', 'Kg');

-- --------------------------------------------------------

--
-- Table structure for table `fm_menu`
--

CREATE TABLE IF NOT EXISTS `fm_menu` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `link` varchar(255) NOT NULL,
  `parent` int(2) NOT NULL,
  `accesstype` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `fm_menu`
--

INSERT INTO `fm_menu` (`id`, `name`, `link`, `parent`, `accesstype`) VALUES
(1, 'Home', 'index.php', 0, 1),
(2, 'Forum', 'index.php?page=com_forum', 0, 3),
(3, 'help', 'index.php?page=com_help', 1, 1),
(4, 'Hello component', 'index.php?page=com_hello', 0, 1),
(5, 'Hello Module', 'index.php?page=mod_hello', 6, 2),
(6, 'sub menu 1.1', '#', 2, 2),
(7, 'sub menu 1.2', '#', 2, 2),
(8, 'menu 1', '#', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `fm_previledges`
--

CREATE TABLE IF NOT EXISTS `fm_previledges` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `fm_previledges`
--

INSERT INTO `fm_previledges` (`id`, `name`) VALUES
(1, 'superadmin'),
(2, 'admin'),
(3, 'general');

-- --------------------------------------------------------

--
-- Table structure for table `fm_templates`
--

CREATE TABLE IF NOT EXISTS `fm_templates` (
  `id` int(3) NOT NULL,
  `name` varchar(120) NOT NULL,
  `default_value` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fm_templates`
--

INSERT INTO `fm_templates` (`id`, `name`, `default_value`) VALUES
(1, 'default', 1),
(2, 'tulips', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fm_user`
--

CREATE TABLE IF NOT EXISTS `fm_user` (
  `userId` varchar(20) NOT NULL,
  `userType` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `officeCode` varchar(20) NOT NULL,
  `avatar` varchar(50) NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fm_user`
--

INSERT INTO `fm_user` (`userId`, `userType`, `password`, `fname`, `lname`, `officeCode`, `avatar`) VALUES
('admin', 'superadmin', '81dc9bdb52d04dc20036dbd8313ed055', 'janith', 'kalhara', 'biyagama', 'avatar2.png'),
('manoj', 'general', '81dc9bdb52d04dc20036dbd8313ed055', 'manoj', 'lasantha', 'biyagama', 'dragon-tattoos.gif'),
('staff', 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'bhanuka', 'ekanayake', '00fe', 'avatar3.jpg'),
('admin1', 'general', '81dc9bdb52d04dc20036dbd8313ed055', 'manoj', 'lasantha', 'cmb', 'user1.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
