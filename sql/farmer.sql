-- phpMyAdmin SQL Dump
-- version 3.4.5deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 13, 2012 at 06:20 PM
-- Server version: 5.1.63
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
('dfdsf', 'dsfdsf', '23'),
('new area', 'Area 3', '23');

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
('sfsdfs', 'sdfsss'),
('dfd', 'dfdfd'),
('dss', 'sdfsfs'),
('dssdfd', 'dfd');

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
('2', 'b 3', 'dfd');

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
('dfs', 'dfdsf', 'center3', '34');

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
-- Table structure for table `fm_employee`
--

CREATE TABLE IF NOT EXISTS `fm_employee` (
  `empId` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  PRIMARY KEY (`empId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `fm_employee`
--

INSERT INTO `fm_employee` (`empId`, `name`, `address`) VALUES
(11, 'manoj', 'colombo'),
(23, 'janith', 'kandy'),
(25, 'sali', 'nugegoda');

-- --------------------------------------------------------

--
-- Table structure for table `fm_execPerson`
--

CREATE TABLE IF NOT EXISTS `fm_execPerson` (
  `empId` int(4) NOT NULL,
  `execId` varchar(12) NOT NULL,
  PRIMARY KEY (`empId`,`execId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fm_execPerson`
--

INSERT INTO `fm_execPerson` (`empId`, `execId`) VALUES
(11, '23'),
(25, '55');

-- --------------------------------------------------------

--
-- Table structure for table `fm_farmer`
--

CREATE TABLE IF NOT EXISTS `fm_farmer` (
  `farmerId` int(6) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surName` varchar(100) NOT NULL,
  `seasonId` varchar(6) NOT NULL,
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
  `addedBy` varchar(20) NOT NULL,
  PRIMARY KEY (`seasonId`,`nic`,`centerId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fm_farmer`
--

INSERT INTO `fm_farmer` (`farmerId`, `name`, `surName`, `seasonId`, `gender`, `nic`, `nationality`, `address`, `tpNo`, `areaId`, `centerId`, `acherage`, `prodCategory`, `bankcode`, `acctNo`, `acctHolderName`, `addedBy`) VALUES
(12356, 'harshana', 'weerasinghe', '12', 'male', '882569855', 'sinhalese', 'kaburupitiya,matara', 22222, '0001', '01', '16', 'Small', '2344-02', 'harshana prabath', 'Medium', 'Medium'),
(100, 'lasantha PGM', 'samaraweera', '12', 'male', '12345678', 'christian', 'kathnoruwa', 456, '0001', '01', '23', 'Small', '2344-15', '232323', 'sarath', 'admin'),
(459, 'jayantha', 'bandara', '12', 'male', '223344444', 'tamil', 'gagamuwa, kathnoruwa', 0, '0001', '01', '33', 'Large', '2231-16', '4445454', 'jayantha bandara', 'admin'),
(100, 'Sarath', 'samaraweera', '34', 'Sarath', '1233', 'christian', 'kathnoruwa', 456, '0001', '45', '23', 'Small', '2344-15', '232323', 'sarath', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `fm_farmerBelongs`
--

CREATE TABLE IF NOT EXISTS `fm_farmerBelongs` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `nic` varchar(20) NOT NULL,
  `seasonId` varchar(10) NOT NULL,
  `centerId` varchar(10) NOT NULL,
  PRIMARY KEY (`id`,`nic`,`seasonId`,`centerId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `fm_farmerBelongs`
--

INSERT INTO `fm_farmerBelongs` (`id`, `nic`, `seasonId`, `centerId`) VALUES
(1, '12345678', '12', '01'),
(2, '23', '3434', '343');

-- --------------------------------------------------------

--
-- Table structure for table `fm_farmerCost`
--

CREATE TABLE IF NOT EXISTS `fm_farmerCost` (
  `id` int(11) NOT NULL,
  `farmerBlId` varchar(100) NOT NULL,
  `itemCode` varchar(100) NOT NULL,
  `costAmount` decimal(10,2) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`,`farmerBlId`,`itemCode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fm_farmerItem`
--

CREATE TABLE IF NOT EXISTS `fm_farmerItem` (
  `itemCode` varchar(20) NOT NULL,
  `farmerBelongId` varchar(20) NOT NULL,
  `quantity` decimal(8,2) NOT NULL,
  `date` varchar(40) NOT NULL,
  PRIMARY KEY (`itemCode`,`farmerBelongId`,`date`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fm_farmerItem`
--

INSERT INTO `fm_farmerItem` (`itemCode`, `farmerBelongId`, `quantity`, `date`) VALUES
('122', '2', '23.00', '2012-12-23');

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
  `costPrice` decimal(20,2) NOT NULL,
  `sellingPrice` decimal(20,2) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `remarks` varchar(200) NOT NULL,
  PRIMARY KEY (`itemCode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fm_item`
--

INSERT INTO `fm_item` (`itemCode`, `itemName`, `costPrice`, `sellingPrice`, `unit`, `remarks`) VALUES
('2333', 'Item 2', '230.00', '220.00', 'kg', 'wewewew');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `fm_menu`
--

INSERT INTO `fm_menu` (`id`, `name`, `link`, `parent`, `accesstype`) VALUES
(1, 'Home', 'index.php', 0, 3),
(14, 'Add Center', 'index.php?page=com_center&getAction=add', 13, 3),
(13, 'Centers', 'index.php?page=com_center&getAction=view', 12, 3),
(12, 'Locations', '?page=com_area', 0, 3),
(11, 'Add Area', 'index.php?page=com_area&getAction=add', 10, 3),
(10, 'Area', 'index.php?page=com_area&getAction=view', 12, 3),
(15, 'Bank', 'index.php?page=com_bank&getAction=view', 12, 3),
(16, 'Add Bank', 'index.php?page=com_bank&getAction=add', 15, 3),
(17, 'Add Branch', 'index.php?page=com_bank&getAction=addBranch', 15, 3),
(18, 'View Bank Branches', 'index.php?page=com_bank&getAction=viewBranch	', 15, 3),
(19, 'Staff', 'index.php?page=com_staff', 0, 1),
(20, 'Add user', 'index.php?page=com_staff&getAction=adduser', 21, 1),
(21, 'Users', 'index.php?page=com_staff&getAction=view', 19, 1),
(22, 'Add executive', 'index.php?page=com_staff&getAction=viewExec', 19, 3),
(23, 'Manage', 'index.php?page=com_manage', 0, 3),
(24, 'Item', 'index.php?page=com_item&getAction=view', 23, 3),
(25, 'Add Item', '?page=com_item&getAction=add', 24, 3),
(26, 'Issue Item', 'index.php?page=com_item&getAction=issueitem', 24, 3);

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
-- Table structure for table `fm_season`
--

CREATE TABLE IF NOT EXISTS `fm_season` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `fm_season`
--

INSERT INTO `fm_season` (`id`, `name`, `description`) VALUES
(1, 'yala 2012', 'yala season');

-- --------------------------------------------------------

--
-- Table structure for table `fm_supPerson`
--

CREATE TABLE IF NOT EXISTS `fm_supPerson` (
  `empId` int(4) NOT NULL,
  `supId` varchar(200) NOT NULL,
  PRIMARY KEY (`empId`,`supId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fm_supPerson`
--

INSERT INTO `fm_supPerson` (`empId`, `supId`) VALUES
(23, '34');

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
-- Table structure for table `fm_units`
--

CREATE TABLE IF NOT EXISTS `fm_units` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `fm_units`
--

INSERT INTO `fm_units` (`id`, `value`) VALUES
(1, 'Kg'),
(2, 'g');

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
  `avatar` varchar(200) NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fm_user`
--

INSERT INTO `fm_user` (`userId`, `userType`, `password`, `fname`, `lname`, `officeCode`, `avatar`) VALUES
('admin', 'superadmin', '81dc9bdb52d04dc20036dbd8313ed055', 'janith', 'kalhara3', '', 'admin.jpg'),
('sali', 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'dhanushka', 'saliya', '', 'sali.gif'),
('dfds', 'superadmin', 'd9729feb74992cc3482b350163a1a010', 'sdfs', 'sdfs', '', 'dfds.'),
('new ', 'admin', 'adbf5a778175ee757c34d0eba4e932bc', 'asd', 'asd', '', 'new .jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
