-- MySQL dump 10.13  Distrib 5.1.63, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: farmer
-- ------------------------------------------------------
-- Server version	5.1.63-0ubuntu0.11.10.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `fm_area`
--

DROP TABLE IF EXISTS `fm_area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fm_area` (
  `areaId` varchar(20) NOT NULL,
  `areaName` varchar(100) DEFAULT NULL,
  `executiveId` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`areaId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fm_area`
--

/*!40000 ALTER TABLE `fm_area` DISABLE KEYS */;
INSERT INTO `fm_area` VALUES ('dfdsf','dsfdsf','23'),('area1','new area','23'),('area3','area3 name','23');
/*!40000 ALTER TABLE `fm_area` ENABLE KEYS */;

--
-- Table structure for table `fm_bank`
--

DROP TABLE IF EXISTS `fm_bank`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fm_bank` (
  `bankCode` varchar(20) NOT NULL,
  `bankName` varchar(100) NOT NULL,
  PRIMARY KEY (`bankCode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fm_bank`
--

/*!40000 ALTER TABLE `fm_bank` DISABLE KEYS */;
INSERT INTO `fm_bank` VALUES ('sfsdfs','sdfsss'),('dss','sdfsfs'),('dssdfd','dfd');
/*!40000 ALTER TABLE `fm_bank` ENABLE KEYS */;

--
-- Table structure for table `fm_bankBranch`
--

DROP TABLE IF EXISTS `fm_bankBranch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fm_bankBranch` (
  `branchCode` varchar(20) NOT NULL,
  `branchName` varchar(100) NOT NULL,
  `bankCode` varchar(20) NOT NULL,
  PRIMARY KEY (`branchCode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fm_bankBranch`
--

/*!40000 ALTER TABLE `fm_bankBranch` DISABLE KEYS */;
INSERT INTO `fm_bankBranch` VALUES ('222','branch 3','sfsdfs'),('1111','branch1','sfsdfs');
/*!40000 ALTER TABLE `fm_bankBranch` ENABLE KEYS */;

--
-- Table structure for table `fm_center`
--

DROP TABLE IF EXISTS `fm_center`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fm_center` (
  `centerId` varchar(40) NOT NULL,
  `areaId` varchar(20) DEFAULT NULL,
  `centerName` varchar(100) DEFAULT NULL,
  `supervisorId` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`centerId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fm_center`
--

/*!40000 ALTER TABLE `fm_center` DISABLE KEYS */;
INSERT INTO `fm_center` VALUES ('dfs','dfdsf','center3','34');
/*!40000 ALTER TABLE `fm_center` ENABLE KEYS */;

--
-- Table structure for table `fm_crop`
--

DROP TABLE IF EXISTS `fm_crop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fm_crop` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fm_crop`
--

/*!40000 ALTER TABLE `fm_crop` DISABLE KEYS */;
INSERT INTO `fm_crop` VALUES ('1317035970','0001','100','2011-09-26','22.00','4.00','Small','1','123','3460.00'),('1317035986','0001','100','2011-09-26','31.00','4.00','Small','1','124','4960.00'),('1317038131','0001','459','2011-09-26','25.00','4.00','Small','0','125','3880.00'),('1324881848','0001','12356','2011-12-26','30.00','3.00','Small','0','11111','5570.00');
/*!40000 ALTER TABLE `fm_crop` ENABLE KEYS */;

--
-- Table structure for table `fm_cropCategory`
--

DROP TABLE IF EXISTS `fm_cropCategory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fm_cropCategory` (
  `categoryCode` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`categoryCode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fm_cropCategory`
--

/*!40000 ALTER TABLE `fm_cropCategory` DISABLE KEYS */;
/*!40000 ALTER TABLE `fm_cropCategory` ENABLE KEYS */;

--
-- Table structure for table `fm_employee`
--

DROP TABLE IF EXISTS `fm_employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fm_employee` (
  `empId` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  PRIMARY KEY (`empId`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fm_employee`
--

/*!40000 ALTER TABLE `fm_employee` DISABLE KEYS */;
INSERT INTO `fm_employee` VALUES (11,'manoj','colombo'),(23,'janith','kandy'),(25,'sali','nugegoda');
/*!40000 ALTER TABLE `fm_employee` ENABLE KEYS */;

--
-- Table structure for table `fm_execPerson`
--

DROP TABLE IF EXISTS `fm_execPerson`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fm_execPerson` (
  `empId` int(4) NOT NULL,
  `execId` varchar(12) NOT NULL,
  PRIMARY KEY (`empId`,`execId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fm_execPerson`
--

/*!40000 ALTER TABLE `fm_execPerson` DISABLE KEYS */;
INSERT INTO `fm_execPerson` VALUES (11,'23'),(25,'55');
/*!40000 ALTER TABLE `fm_execPerson` ENABLE KEYS */;

--
-- Table structure for table `fm_farmer`
--

DROP TABLE IF EXISTS `fm_farmer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fm_farmer` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fm_farmer`
--

/*!40000 ALTER TABLE `fm_farmer` DISABLE KEYS */;
INSERT INTO `fm_farmer` VALUES (12356,'harshana','weerasinghe','12','male','882569855','sinhalese','kaburupitiya,matara',22222,'0001','01','16','Small','2344-02','harshana prabath','Medium','Medium'),(100,'lasantha PGM','samaraweera','12','male','12345678','christian','kathnoruwa',456,'0001','01','23','Small','2344-15','232323','sarath','admin'),(459,'jayantha','bandara','12','male','223344444','tamil','gagamuwa, kathnoruwa',0,'0001','01','33','Large','2231-16','4445454','jayantha bandara','admin'),(100,'Sarath','samaraweera','34','Sarath','1233','christian','kathnoruwa',456,'0001','45','23','Small','2344-15','232323','sarath','admin');
/*!40000 ALTER TABLE `fm_farmer` ENABLE KEYS */;

--
-- Table structure for table `fm_farmerBelongs`
--

DROP TABLE IF EXISTS `fm_farmerBelongs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fm_farmerBelongs` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `nic` varchar(20) NOT NULL,
  `seasonId` varchar(10) NOT NULL,
  `centerId` varchar(10) NOT NULL,
  PRIMARY KEY (`id`,`nic`,`seasonId`,`centerId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fm_farmerBelongs`
--

/*!40000 ALTER TABLE `fm_farmerBelongs` DISABLE KEYS */;
INSERT INTO `fm_farmerBelongs` VALUES (1,'12345678','12','01'),(2,'23','3434','343');
/*!40000 ALTER TABLE `fm_farmerBelongs` ENABLE KEYS */;

--
-- Table structure for table `fm_farmerCost`
--

DROP TABLE IF EXISTS `fm_farmerCost`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fm_farmerCost` (
  `id` int(11) NOT NULL,
  `farmerBlId` varchar(100) NOT NULL,
  `itemCode` varchar(100) NOT NULL,
  `costAmount` decimal(10,2) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`,`farmerBlId`,`itemCode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fm_farmerCost`
--

/*!40000 ALTER TABLE `fm_farmerCost` DISABLE KEYS */;
/*!40000 ALTER TABLE `fm_farmerCost` ENABLE KEYS */;

--
-- Table structure for table `fm_farmerItem`
--

DROP TABLE IF EXISTS `fm_farmerItem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fm_farmerItem` (
  `itemCode` varchar(20) NOT NULL,
  `farmerBelongId` varchar(20) NOT NULL,
  `quantity` decimal(8,2) NOT NULL,
  `date` varchar(40) NOT NULL,
  PRIMARY KEY (`itemCode`,`farmerBelongId`,`date`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fm_farmerItem`
--

/*!40000 ALTER TABLE `fm_farmerItem` DISABLE KEYS */;
INSERT INTO `fm_farmerItem` VALUES ('122','2','23.00','2012-12-23');
/*!40000 ALTER TABLE `fm_farmerItem` ENABLE KEYS */;

--
-- Table structure for table `fm_grade`
--

DROP TABLE IF EXISTS `fm_grade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fm_grade` (
  `gradeCode` varchar(20) NOT NULL,
  `areaId` varchar(20) NOT NULL,
  `categoryCode` varchar(20) NOT NULL,
  `description` varchar(40) NOT NULL,
  `unitPrice` decimal(8,2) NOT NULL,
  PRIMARY KEY (`gradeCode`,`areaId`,`categoryCode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fm_grade`
--

/*!40000 ALTER TABLE `fm_grade` DISABLE KEYS */;
INSERT INTO `fm_grade` VALUES ('grade1','1234','Small','','180.00'),('grade2','1234','Small','','170.00'),('grade3','1234','Small','','150.50'),('grade4','1234','Small','','137.00'),('grade5','1234','Small','','130.00'),('grade6','1234','Small','','120.00'),('crs','1234','Small','','100.00'),('grade1','0001','Small','','200.00'),('grade2','0001','Small','','180.00'),('grade3','0001','Small','','170.00'),('grade4','0001','Small','','160.00'),('grade5','0001','Small','','150.00'),('grade6','0001','Small','','140.00'),('crs','0001','Small','','120.00'),('grade1','0001','Medium','','300.00'),('grade2','0001','Medium','','280.00'),('grade3','0001','Medium','','270.00'),('grade4','0001','Medium','','250.00'),('grade5','0001','Medium','','240.00'),('grade6','0001','Medium','','220.00'),('crs','0001','Medium','','200.00');
/*!40000 ALTER TABLE `fm_grade` ENABLE KEYS */;

--
-- Table structure for table `fm_gradeForCrop`
--

DROP TABLE IF EXISTS `fm_gradeForCrop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fm_gradeForCrop` (
  `cropId` varchar(100) NOT NULL,
  `farmerId` varchar(20) NOT NULL,
  `gradeCode` varchar(20) NOT NULL,
  `quantity` decimal(8,2) NOT NULL,
  `areaId` varchar(20) NOT NULL,
  `categoryCode` varchar(20) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`cropId`,`farmerId`,`gradeCode`,`areaId`,`categoryCode`,`date`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fm_gradeForCrop`
--

/*!40000 ALTER TABLE `fm_gradeForCrop` DISABLE KEYS */;
INSERT INTO `fm_gradeForCrop` VALUES ('1317035970','100','grade1','4.00','0001','Small','2011-09-26'),('1317035970','100','grade2','1.00','0001','Small','2011-09-26'),('1317035970','100','grade3','2.00','0001','Small','2011-09-26'),('1317035970','100','grade4','5.00','0001','Small','2011-09-26'),('1317035970','100','grade5','4.00','0001','Small','2011-09-26'),('1317035970','100','grade6','1.00','0001','Small','2011-09-26'),('1317035970','100','crs','5.00','0001','Small','2011-09-26'),('1317035986','100','grade1','4.00','0001','Small','2011-09-26'),('1317035986','100','grade2','5.00','0001','Small','2011-09-26'),('1317035986','100','grade3','4.00','0001','Small','2011-09-26'),('1317035986','100','grade4','5.00','0001','Small','2011-09-26'),('1317035986','100','grade5','4.00','0001','Small','2011-09-26'),('1317035986','100','grade6','5.00','0001','Small','2011-09-26'),('1317035986','100','crs','4.00','0001','Small','2011-09-26'),('1317038131','459','grade1','1.00','0001','Small','2011-09-26'),('1317038131','459','grade2','4.00','0001','Small','2011-09-26'),('1317038131','459','grade3','4.00','0001','Small','2011-09-26'),('1317038131','459','grade4','4.00','0001','Small','2011-09-26'),('1317038131','459','grade5','4.00','0001','Small','2011-09-26'),('1317038131','459','grade6','4.00','0001','Small','2011-09-26'),('1317038131','459','crs','4.00','0001','Small','2011-09-26'),('1324881848','12356','grade1','21.00','0001','Small','2011-12-26'),('1324881848','12356','grade2','1.00','0001','Small','2011-12-26'),('1324881848','12356','grade3','2.00','0001','Small','2011-12-26'),('1324881848','12356','grade4','2.00','0001','Small','2011-12-26'),('1324881848','12356','grade5','1.00','0001','Small','2011-12-26'),('1324881848','12356','grade6','1.00','0001','Small','2011-12-26'),('1324881848','12356','crs','2.00','0001','Small','2011-12-26'),('1324886296','100','grade1','21.00','0001','Small','2011-12-26'),('1324886296','100','grade2','12.00','0001','Small','2011-12-26'),('1324886296','100','grade3','2.00','0001','Small','2011-12-26'),('1324886296','100','grade4','122.00','0001','Small','2011-12-26'),('1324886296','100','grade5','1.00','0001','Small','2011-12-26'),('1324886296','100','grade6','1.00','0001','Small','2011-12-26'),('1324886296','100','crs','1.00','0001','Small','2011-12-26');
/*!40000 ALTER TABLE `fm_gradeForCrop` ENABLE KEYS */;

--
-- Table structure for table `fm_item`
--

DROP TABLE IF EXISTS `fm_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fm_item` (
  `itemCode` varchar(20) NOT NULL,
  `itemName` varchar(50) NOT NULL,
  `costPrice` decimal(20,2) NOT NULL,
  `sellingPrice` decimal(20,2) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `remarks` varchar(200) NOT NULL,
  PRIMARY KEY (`itemCode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fm_item`
--

/*!40000 ALTER TABLE `fm_item` DISABLE KEYS */;
INSERT INTO `fm_item` VALUES ('2333','Item 2','230.00','220.00','kg','erwrewrewrwerw			');
/*!40000 ALTER TABLE `fm_item` ENABLE KEYS */;

--
-- Table structure for table `fm_menu`
--

DROP TABLE IF EXISTS `fm_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fm_menu` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `link` varchar(255) NOT NULL,
  `parent` int(2) NOT NULL,
  `accesstype` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fm_menu`
--

/*!40000 ALTER TABLE `fm_menu` DISABLE KEYS */;
INSERT INTO `fm_menu` VALUES (1,'Home','index.php',0,3),(14,'Add Center','index.php?page=com_center&getAction=add',13,3),(13,'Centers','index.php?page=com_center&getAction=view',12,3),(12,'Locations','?page=com_area',0,3),(11,'Add Area','index.php?page=com_area&getAction=add',10,3),(10,'Area','index.php?page=com_area&getAction=view',12,3),(15,'Bank','index.php?page=com_bank&getAction=view',12,3),(16,'Add Bank','index.php?page=com_bank&getAction=add',15,3),(17,'Add Branch','index.php?page=com_bank&getAction=addBranch',15,3),(18,'View Bank Branches','index.php?page=com_bank&getAction=viewBranch	',15,3),(19,'Staff','index.php?page=com_staff',0,1),(20,'Add user','index.php?page=com_staff&getAction=adduser',21,1),(21,'Users','index.php?page=com_staff&getAction=view',19,1),(22,'Add executive','index.php?page=com_staff&getAction=viewExec',19,3),(23,'Manage','index.php?page=com_manage',0,3),(24,'Item','index.php?page=com_item&getAction=view',23,3),(25,'Add Item','?page=com_item&getAction=add',24,3),(26,'Issue Item','index.php?page=com_item&getAction=issueitem',24,3);
/*!40000 ALTER TABLE `fm_menu` ENABLE KEYS */;

--
-- Table structure for table `fm_previledges`
--

DROP TABLE IF EXISTS `fm_previledges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fm_previledges` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fm_previledges`
--

/*!40000 ALTER TABLE `fm_previledges` DISABLE KEYS */;
INSERT INTO `fm_previledges` VALUES (1,'superadmin'),(2,'admin'),(3,'general');
/*!40000 ALTER TABLE `fm_previledges` ENABLE KEYS */;

--
-- Table structure for table `fm_season`
--

DROP TABLE IF EXISTS `fm_season`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fm_season` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fm_season`
--

/*!40000 ALTER TABLE `fm_season` DISABLE KEYS */;
INSERT INTO `fm_season` VALUES (1,'yala 2012','yala season');
/*!40000 ALTER TABLE `fm_season` ENABLE KEYS */;

--
-- Table structure for table `fm_supPerson`
--

DROP TABLE IF EXISTS `fm_supPerson`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fm_supPerson` (
  `empId` int(4) NOT NULL,
  `supId` varchar(200) NOT NULL,
  PRIMARY KEY (`empId`,`supId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fm_supPerson`
--

/*!40000 ALTER TABLE `fm_supPerson` DISABLE KEYS */;
INSERT INTO `fm_supPerson` VALUES (23,'34');
/*!40000 ALTER TABLE `fm_supPerson` ENABLE KEYS */;

--
-- Table structure for table `fm_templates`
--

DROP TABLE IF EXISTS `fm_templates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fm_templates` (
  `id` int(3) NOT NULL,
  `name` varchar(120) NOT NULL,
  `default_value` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fm_templates`
--

/*!40000 ALTER TABLE `fm_templates` DISABLE KEYS */;
INSERT INTO `fm_templates` VALUES (1,'default',1),(2,'tulips',0);
/*!40000 ALTER TABLE `fm_templates` ENABLE KEYS */;

--
-- Table structure for table `fm_units`
--

DROP TABLE IF EXISTS `fm_units`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fm_units` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fm_units`
--

/*!40000 ALTER TABLE `fm_units` DISABLE KEYS */;
INSERT INTO `fm_units` VALUES (1,'Kg'),(2,'g');
/*!40000 ALTER TABLE `fm_units` ENABLE KEYS */;

--
-- Table structure for table `fm_user`
--

DROP TABLE IF EXISTS `fm_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fm_user` (
  `userId` varchar(20) NOT NULL,
  `userType` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `officeCode` varchar(20) NOT NULL,
  `avatar` varchar(200) NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fm_user`
--

/*!40000 ALTER TABLE `fm_user` DISABLE KEYS */;
INSERT INTO `fm_user` VALUES ('admin','superadmin','81dc9bdb52d04dc20036dbd8313ed055','janith','kalhara3','','admin.jpg'),('sali','admin','81dc9bdb52d04dc20036dbd8313ed055','dhanushka','saliya','','sali.gif'),('dfds','superadmin','d9729feb74992cc3482b350163a1a010','sdfs','sdfs','','dfds.');
/*!40000 ALTER TABLE `fm_user` ENABLE KEYS */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-06-14 15:51:19
