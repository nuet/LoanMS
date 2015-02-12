-- MySQL dump 10.13  Distrib 5.6.17, for osx10.7 (x86_64)
--
-- Host: localhost    Database: bxc
-- ------------------------------------------------------
-- Server version	5.6.17

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

use bxc;

--
-- Table structure for table `group_access`
--

DROP TABLE IF EXISTS `group_access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `group_access` (
  `accessID` bigint(20) NOT NULL AUTO_INCREMENT,
  `userID` bigint(20) DEFAULT NULL,
  `groupID` tinyint(4) DEFAULT NULL,
  `access_level` tinyint(4) DEFAULT NULL,
  `can_write` tinyint(4) DEFAULT NULL,
  `can_read` tinyint(4) DEFAULT NULL,
  `can_download` tinyint(4) DEFAULT NULL,
  `can_upload` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`accessID`),
  KEY `userID` (`userID`),
  KEY `groupID` (`groupID`),
  CONSTRAINT `group_access_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  CONSTRAINT `group_access_ibfk_2` FOREIGN KEY (`groupID`) REFERENCES `user_group` (`groupID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group_access`
--

LOCK TABLES `group_access` WRITE;
/*!40000 ALTER TABLE `group_access` DISABLE KEYS */;
/*!40000 ALTER TABLE `group_access` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organ_access`
--

DROP TABLE IF EXISTS `organ_access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `organ_access` (
  `accessID` bigint(20) NOT NULL AUTO_INCREMENT,
  `userID` bigint(20) DEFAULT NULL,
  `organizationID` bigint(20) DEFAULT NULL,
  `access_level` tinyint(4) DEFAULT NULL,
  `can_write` tinyint(4) DEFAULT NULL,
  `can_read` tinyint(4) DEFAULT NULL,
  `can_download` tinyint(4) DEFAULT NULL,
  `can_upload` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`accessID`),
  KEY `userID` (`userID`),
  KEY `organizationID` (`organizationID`),
  CONSTRAINT `organ_access_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  CONSTRAINT `organ_access_ibfk_2` FOREIGN KEY (`organizationID`) REFERENCES `organization` (`organizationID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organ_access`
--

LOCK TABLES `organ_access` WRITE;
/*!40000 ALTER TABLE `organ_access` DISABLE KEYS */;
/*!40000 ALTER TABLE `organ_access` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organization`
--

DROP TABLE IF EXISTS `organization`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `organization` (
  `organizationID` bigint(20) NOT NULL AUTO_INCREMENT,
  `groupID` tinyint(4) DEFAULT NULL,
  `orgName` varchar(255) DEFAULT NULL,
  `regTime` date DEFAULT NULL,
  `regLocation` varchar(1000) DEFAULT NULL,
  `prodLocation` varchar(1000) DEFAULT NULL,
  `regCapital` double DEFAULT NULL,
  `regLicence` varchar(1000) DEFAULT NULL,
  `regAuthority` varchar(1000) DEFAULT NULL,
  `contactName` varchar(1000) DEFAULT NULL,
  `contactEmail` varchar(1000) DEFAULT NULL,
  `contactPhone` varchar(1000) DEFAULT NULL,
  `appendum` text,
  `organizationKey` varchar(1000) NOT NULL,
  PRIMARY KEY (`organizationID`),
  KEY `groupID` (`groupID`),
  CONSTRAINT `organization_ibfk_1` FOREIGN KEY (`groupID`) REFERENCES `user_group` (`groupID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organization`
--

LOCK TABLES `organization` WRITE;
/*!40000 ALTER TABLE `organization` DISABLE KEYS */;
INSERT INTO `organization` VALUES (2,1,'bxc','2014-01-01','汉中门','汉中门',10000,'11111','工信部','周全','quzhou@indiana.edu','8123615159','你好111','12121'),(4,1,'滨新城','1983-05-07','南京','南京',100000,'1212121','中宣部','周全','quzhou@indiana.edu','7854777369','121212','63cad1ad-2e28-43cd-b8b7-6405599adc8d'),(5,2,'中国人民银行','1983-05-07','中国','中国',100000,'100000','中国','陈宝强','baoqiao@163.com','111111','111111','3f91290a-7dd5-4121-9926-2cd70ccaf4c8'),(6,3,'中国人寿保险','1983-05-07','中国','中国',1100000,'1111','中国','丁一','dingyi@163.co','1111','1111','2eb56d1c-0dae-4e8b-90e1-37bc30b43fe4');
/*!40000 ALTER TABLE `organization` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_balance_sheet`
--

DROP TABLE IF EXISTS `t_balance_sheet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_balance_sheet` (
  `sheetID` bigint(20) NOT NULL AUTO_INCREMENT,
  `organizationID` bigint(20) NOT NULL,
  `sheetDate` date DEFAULT NULL,
  `grossAssets` double DEFAULT NULL,
  `floatingAssets` double DEFAULT NULL,
  `monetaryCapital` double DEFAULT NULL,
  `liquidInvestment` double DEFAULT NULL,
  `notesReceivables` double DEFAULT NULL,
  `AccountsReceivables` double DEFAULT NULL,
  `suppliersAdvances` double DEFAULT NULL,
  `receivableSubsidies` double DEFAULT NULL,
  `otherReceivables` double DEFAULT NULL,
  `dividendsReceivables` double DEFAULT NULL,
  `stock` double DEFAULT NULL,
  `deferredExpenses` double DEFAULT NULL,
  `otherfloatingAssets` double DEFAULT NULL,
  `nonliquidAssets` double DEFAULT NULL,
  `longequityInvest` double DEFAULT NULL,
  `fixedAssetsTotal` double DEFAULT NULL,
  `fixedAssetsOrigin` double DEFAULT NULL,
  `fixedAssetsNet` double DEFAULT NULL,
  `constructionProcess` double DEFAULT NULL,
  `intangibleAssets` double DEFAULT NULL,
  `longdeferredExpenses` double DEFAULT NULL,
  `othernonliquidInvest` double DEFAULT NULL,
  `grossDebt` double DEFAULT NULL,
  `currentDebt` double DEFAULT NULL,
  `shortLoan` double DEFAULT NULL,
  `notesPayables` double DEFAULT NULL,
  `accountsPayables` double DEFAULT NULL,
  `advanceCustomers` double DEFAULT NULL,
  `taxPayables` double DEFAULT NULL,
  `otherPayables` double DEFAULT NULL,
  `salaries` double DEFAULT NULL,
  `dividendsPayables` double DEFAULT NULL,
  `otherfloatingDebt` double DEFAULT NULL,
  `longLoan` double DEFAULT NULL,
  `othernonfloatingDebt` double DEFAULT NULL,
  `ownerEquity` double DEFAULT NULL,
  `paidinCapital` double DEFAULT NULL,
  `contributedSurplus` double DEFAULT NULL,
  `reservedSurplus` double DEFAULT NULL,
  `undistributedProfit` double DEFAULT NULL,
  `debtownerequityTotal` double DEFAULT NULL,
  `assetliabilityRatio` double DEFAULT NULL,
  `liquidityRatio` double DEFAULT NULL,
  `quickRatio` double DEFAULT NULL,
  `submissionUser` bigint(20) DEFAULT NULL,
  `file_url` varchar(1000) DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `nonfloatingDebt` double DEFAULT NULL,
  PRIMARY KEY (`sheetID`),
  KEY `organizationID` (`organizationID`),
  KEY `submissionUser` (`submissionUser`),
  CONSTRAINT `t_balance_sheet_ibfk_1` FOREIGN KEY (`organizationID`) REFERENCES `organization` (`organizationID`),
  CONSTRAINT `t_balance_sheet_ibfk_2` FOREIGN KEY (`submissionUser`) REFERENCES `users` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_balance_sheet`
--

LOCK TABLES `t_balance_sheet` WRITE;
/*!40000 ALTER TABLE `t_balance_sheet` DISABLE KEYS */;
INSERT INTO `t_balance_sheet` VALUES (1,2,'2015-02-10',37199.26,21438.73,0,0,1050,3672.37,2768.97,0,201.8,0,11126.8,0,0,0,0,12180.39,13647.99,12180.39,0,3580.14,0,0,18004.74,18004.74,9750,3500,1894.32,1728.77,60.58,1000,71.06,0,0,0,0,19194.52,11800,0,0,0,37199.26,48.4,1.19,0.57,1,NULL,'2015-01-07','2015-02-07',0);
/*!40000 ALTER TABLE `t_balance_sheet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_credit`
--

DROP TABLE IF EXISTS `t_credit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_credit` (
  `creditID` bigint(20) NOT NULL AUTO_INCREMENT,
  `credit` int(11) NOT NULL,
  `creditDate` datetime NOT NULL,
  `organizationID` bigint(20) NOT NULL,
  PRIMARY KEY (`creditID`),
  KEY `organizationID` (`organizationID`),
  CONSTRAINT `t_credit_ibfk_1` FOREIGN KEY (`organizationID`) REFERENCES `organization` (`organizationID`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_credit`
--

LOCK TABLES `t_credit` WRITE;
/*!40000 ALTER TABLE `t_credit` DISABLE KEYS */;
INSERT INTO `t_credit` VALUES (2,77,'2015-02-10 06:44:19',2),(3,77,'2015-02-10 06:45:15',2),(4,77,'2015-02-10 06:47:11',2),(5,90,'2015-02-10 06:58:46',2),(6,77,'2015-02-10 06:59:09',2),(7,77,'2015-02-10 08:13:10',2),(12,77,'2015-02-11 04:26:44',2),(13,77,'2015-02-11 04:27:52',2),(14,77,'2015-02-11 04:27:59',2),(15,77,'2015-02-11 04:46:03',2),(16,77,'2015-02-11 04:46:09',2),(17,77,'2015-02-11 05:01:40',2),(18,77,'2015-02-11 05:01:43',2),(19,77,'2015-02-11 05:15:18',2);
/*!40000 ALTER TABLE `t_credit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_income_statement`
--

DROP TABLE IF EXISTS `t_income_statement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_income_statement` (
  `statementID` bigint(20) NOT NULL AUTO_INCREMENT,
  `organizationID` bigint(20) NOT NULL,
  `statementDate` date DEFAULT NULL,
  `mainIncome` double DEFAULT NULL,
  `mainCost` double DEFAULT NULL,
  `salesTax` double DEFAULT NULL,
  `mainProfit` double DEFAULT NULL,
  `otherProfit` double DEFAULT NULL,
  `businessCost` double DEFAULT NULL,
  `manageCost` double DEFAULT NULL,
  `financeCost` double DEFAULT NULL,
  `impairmentCost` double DEFAULT NULL,
  `investGain` double DEFAULT NULL,
  `businessProfit` double DEFAULT NULL,
  `otherIncome` double DEFAULT NULL,
  `subsidyIncome` double DEFAULT NULL,
  `otherCost` double DEFAULT NULL,
  `profitTotal` double DEFAULT NULL,
  `incomeTax` double DEFAULT NULL,
  `netProfit` double DEFAULT NULL,
  `grossProfit` double DEFAULT NULL,
  `netMargin` double DEFAULT NULL,
  `grossMargin` double DEFAULT NULL,
  `submissionUser` bigint(20) DEFAULT NULL,
  `file_url` varchar(1000) DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  PRIMARY KEY (`statementID`),
  KEY `organizationID` (`organizationID`),
  KEY `submissionUser` (`submissionUser`),
  CONSTRAINT `t_income_statement_ibfk_1` FOREIGN KEY (`organizationID`) REFERENCES `organization` (`organizationID`),
  CONSTRAINT `t_income_statement_ibfk_2` FOREIGN KEY (`submissionUser`) REFERENCES `users` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_income_statement`
--

LOCK TABLES `t_income_statement` WRITE;
/*!40000 ALTER TABLE `t_income_statement` DISABLE KEYS */;
INSERT INTO `t_income_statement` VALUES (2,2,'2015-02-10',36888.65,31839.11,122.89,4926.65,31839.11,413.07,479,766.87,0,0,3267.71,0,0,0,3267.71,816.93,2450.78,0,13.69,6.64,1,NULL,'2015-01-07','2015-02-07');
/*!40000 ALTER TABLE `t_income_statement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_legalrp_trans`
--

DROP TABLE IF EXISTS `t_legalrp_trans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_legalrp_trans` (
  `transID` bigint(20) NOT NULL AUTO_INCREMENT,
  `sellerID` bigint(20) NOT NULL,
  `receipientID` bigint(20) NOT NULL,
  `transDate` date DEFAULT NULL,
  `transTotal` double DEFAULT NULL,
  `incrementID` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`transID`),
  KEY `sellerID` (`sellerID`),
  KEY `receipientID` (`receipientID`),
  KEY `incrementID` (`incrementID`),
  CONSTRAINT `t_legalrp_trans_ibfk_1` FOREIGN KEY (`sellerID`) REFERENCES `t_organization_legalrp` (`rpID`),
  CONSTRAINT `t_legalrp_trans_ibfk_2` FOREIGN KEY (`receipientID`) REFERENCES `t_organization_legalrp` (`rpID`),
  CONSTRAINT `t_legalrp_trans_ibfk_3` FOREIGN KEY (`incrementID`) REFERENCES `t_organization_increment` (`incrementID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_legalrp_trans`
--

LOCK TABLES `t_legalrp_trans` WRITE;
/*!40000 ALTER TABLE `t_legalrp_trans` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_legalrp_trans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_loan`
--

DROP TABLE IF EXISTS `t_loan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_loan` (
  `loanID` bigint(20) NOT NULL AUTO_INCREMENT,
  `bankID` bigint(20) DEFAULT NULL,
  `organizationID` bigint(20) DEFAULT NULL,
  `loanType` varchar(1000) DEFAULT NULL,
  `startTime` date DEFAULT NULL,
  `endTime` date DEFAULT NULL,
  `total` double DEFAULT NULL,
  `mortgageType` varchar(1000) DEFAULT NULL,
  `insuranceID` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`loanID`),
  KEY `bankID` (`bankID`),
  KEY `organizationID` (`organizationID`),
  KEY `insuranceID` (`insuranceID`),
  CONSTRAINT `t_loan_ibfk_1` FOREIGN KEY (`bankID`) REFERENCES `organization` (`organizationID`),
  CONSTRAINT `t_loan_ibfk_2` FOREIGN KEY (`organizationID`) REFERENCES `organization` (`organizationID`),
  CONSTRAINT `t_loan_ibfk_3` FOREIGN KEY (`insuranceID`) REFERENCES `organization` (`organizationID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_loan`
--

LOCK TABLES `t_loan` WRITE;
/*!40000 ALTER TABLE `t_loan` DISABLE KEYS */;
INSERT INTO `t_loan` VALUES (2,5,2,'e贷通','1983-05-07','1984-05-07',10000,'混合',6),(4,5,2,'最优贷','1983-05-07','1991-05-07',8000,'信用抵押',NULL);
/*!40000 ALTER TABLE `t_loan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_loan_doc`
--

DROP TABLE IF EXISTS `t_loan_doc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_loan_doc` (
  `docID` bigint(20) NOT NULL AUTO_INCREMENT,
  `doc_URL` varchar(1000) DEFAULT NULL,
  `docDate` date DEFAULT NULL,
  `docName` varchar(1000) NOT NULL,
  `loanID` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`docID`),
  KEY `loanID` (`loanID`),
  CONSTRAINT `t_loan_doc_ibfk_1` FOREIGN KEY (`loanID`) REFERENCES `t_loan` (`loanID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_loan_doc`
--

LOCK TABLES `t_loan_doc` WRITE;
/*!40000 ALTER TABLE `t_loan_doc` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_loan_doc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_loan_fee`
--

DROP TABLE IF EXISTS `t_loan_fee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_loan_fee` (
  `feeID` bigint(20) NOT NULL AUTO_INCREMENT,
  `loanID` bigint(20) NOT NULL,
  `feeTotal` double DEFAULT NULL,
  `dueDate` date DEFAULT NULL,
  `payDate` date DEFAULT NULL,
  PRIMARY KEY (`feeID`),
  KEY `loanID` (`loanID`),
  CONSTRAINT `t_loan_fee_ibfk_1` FOREIGN KEY (`loanID`) REFERENCES `t_loan` (`loanID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_loan_fee`
--

LOCK TABLES `t_loan_fee` WRITE;
/*!40000 ALTER TABLE `t_loan_fee` DISABLE KEYS */;
INSERT INTO `t_loan_fee` VALUES (1,2,2000,'2015-02-15','2015-02-10'),(2,2,2000,'2015-01-15','2015-01-10');
/*!40000 ALTER TABLE `t_loan_fee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_loan_insurance`
--

DROP TABLE IF EXISTS `t_loan_insurance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_loan_insurance` (
  `insuranceID` bigint(20) NOT NULL AUTO_INCREMENT,
  `loanID` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`insuranceID`),
  KEY `loanID` (`loanID`),
  CONSTRAINT `t_loan_insurance_ibfk_1` FOREIGN KEY (`loanID`) REFERENCES `t_loan` (`loanID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_loan_insurance`
--

LOCK TABLES `t_loan_insurance` WRITE;
/*!40000 ALTER TABLE `t_loan_insurance` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_loan_insurance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_loan_mortgage`
--

DROP TABLE IF EXISTS `t_loan_mortgage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_loan_mortgage` (
  `mortgageID` bigint(20) NOT NULL AUTO_INCREMENT,
  `loanID` bigint(20) NOT NULL,
  `mortgageType` varchar(1000) DEFAULT NULL,
  `mortgageDescription` text,
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  PRIMARY KEY (`mortgageID`),
  KEY `loanID` (`loanID`),
  CONSTRAINT `t_loan_mortgage_ibfk_1` FOREIGN KEY (`loanID`) REFERENCES `t_loan` (`loanID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_loan_mortgage`
--

LOCK TABLES `t_loan_mortgage` WRITE;
/*!40000 ALTER TABLE `t_loan_mortgage` DISABLE KEYS */;
INSERT INTO `t_loan_mortgage` VALUES (1,2,'房屋抵押','房产价值：160万，地址：南京','2014-05-07','2020-05-07'),(2,2,'信用抵押','企业信用抵押','2014-05-07','2019-05-07');
/*!40000 ALTER TABLE `t_loan_mortgage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_loan_payment`
--

DROP TABLE IF EXISTS `t_loan_payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_loan_payment` (
  `paymentID` bigint(20) NOT NULL AUTO_INCREMENT,
  `loanID` bigint(20) NOT NULL,
  `paymentTotal` double DEFAULT NULL,
  `dueDate` date DEFAULT NULL,
  `payDate` date DEFAULT NULL,
  PRIMARY KEY (`paymentID`),
  KEY `loanID` (`loanID`),
  CONSTRAINT `t_loan_payment_ibfk_1` FOREIGN KEY (`loanID`) REFERENCES `t_loan` (`loanID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_loan_payment`
--

LOCK TABLES `t_loan_payment` WRITE;
/*!40000 ALTER TABLE `t_loan_payment` DISABLE KEYS */;
INSERT INTO `t_loan_payment` VALUES (4,2,10000,'2015-02-07','2015-02-06'),(5,2,10000,'2015-01-07','2015-01-06'),(6,2,9000,'2014-12-07','2014-12-06');
/*!40000 ALTER TABLE `t_loan_payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_message`
--

DROP TABLE IF EXISTS `t_message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_message` (
  `M_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `senderID` bigint(20) DEFAULT NULL,
  `receiverID` bigint(20) DEFAULT NULL,
  `sendTime` datetime DEFAULT NULL,
  `ReadFlag` tinyint(4) DEFAULT NULL,
  `M_Text_ID` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`M_ID`),
  KEY `senderID` (`senderID`),
  KEY `receiverID` (`receiverID`),
  KEY `M_Text_ID` (`M_Text_ID`),
  CONSTRAINT `t_message_ibfk_1` FOREIGN KEY (`senderID`) REFERENCES `users` (`userID`),
  CONSTRAINT `t_message_ibfk_2` FOREIGN KEY (`receiverID`) REFERENCES `users` (`userID`),
  CONSTRAINT `t_message_ibfk_3` FOREIGN KEY (`M_Text_ID`) REFERENCES `t_messagetext` (`M_Text_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_message`
--

LOCK TABLES `t_message` WRITE;
/*!40000 ALTER TABLE `t_message` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_messagetext`
--

DROP TABLE IF EXISTS `t_messagetext`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_messagetext` (
  `M_Text_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `MessageText` text,
  PRIMARY KEY (`M_Text_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_messagetext`
--

LOCK TABLES `t_messagetext` WRITE;
/*!40000 ALTER TABLE `t_messagetext` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_messagetext` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_organization_credit`
--

DROP TABLE IF EXISTS `t_organization_credit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_organization_credit` (
  `creditID` bigint(20) NOT NULL AUTO_INCREMENT,
  `organizationID` bigint(20) DEFAULT NULL,
  `creditDate` date DEFAULT NULL,
  `financeCredit` int(11) DEFAULT NULL,
  `fileCredit` int(11) DEFAULT NULL,
  `staffCredit` int(11) DEFAULT NULL,
  `orglicenceCredit` int(11) DEFAULT NULL,
  `stafflicenceCredit` int(11) DEFAULT NULL,
  `submissionUser` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`creditID`),
  KEY `organizationID` (`organizationID`),
  KEY `submissionUser` (`submissionUser`),
  CONSTRAINT `t_organization_credit_ibfk_1` FOREIGN KEY (`organizationID`) REFERENCES `organization` (`organizationID`),
  CONSTRAINT `t_organization_credit_ibfk_2` FOREIGN KEY (`submissionUser`) REFERENCES `users` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_organization_credit`
--

LOCK TABLES `t_organization_credit` WRITE;
/*!40000 ALTER TABLE `t_organization_credit` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_organization_credit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_organization_file`
--

DROP TABLE IF EXISTS `t_organization_file`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_organization_file` (
  `fileID` bigint(20) NOT NULL AUTO_INCREMENT,
  `organizationID` bigint(20) NOT NULL,
  `licence_url` varchar(1000) DEFAULT NULL,
  `registrationCode_url` varchar(1000) DEFAULT NULL,
  `taxregistrationLicence_url` varchar(1000) DEFAULT NULL,
  `legalRP_url` varchar(1000) DEFAULT NULL,
  `legalRPID_url` varchar(1000) DEFAULT NULL,
  `staff_url` varchar(1000) DEFAULT NULL,
  `assetReport_url` varchar(1000) DEFAULT NULL,
  `loanContract_url` varchar(1000) DEFAULT NULL,
  `mortgage_url` varchar(1000) DEFAULT NULL,
  `loanCard_url` varchar(1000) DEFAULT NULL,
  `financialStatement_url` varchar(1000) DEFAULT NULL,
  `bankreconciliationStatement_url` varchar(1000) DEFAULT NULL,
  `procuresaleContract_url` varchar(1000) DEFAULT NULL,
  `specialLicence_url` varchar(1000) DEFAULT NULL,
  `incorporationBylaw_url` varchar(1000) DEFAULT NULL,
  `submissionUser` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`fileID`),
  KEY `organizationID` (`organizationID`),
  KEY `submissionUser` (`submissionUser`),
  CONSTRAINT `t_organization_file_ibfk_1` FOREIGN KEY (`organizationID`) REFERENCES `organization` (`organizationID`),
  CONSTRAINT `t_organization_file_ibfk_2` FOREIGN KEY (`submissionUser`) REFERENCES `users` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_organization_file`
--

LOCK TABLES `t_organization_file` WRITE;
/*!40000 ALTER TABLE `t_organization_file` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_organization_file` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_organization_increment`
--

DROP TABLE IF EXISTS `t_organization_increment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_organization_increment` (
  `incrementID` bigint(20) NOT NULL AUTO_INCREMENT,
  `legalRPID` bigint(20) NOT NULL,
  `incrementTimes` int(11) NOT NULL,
  `capitalDate` date DEFAULT NULL,
  `capitalType` varchar(255) DEFAULT NULL,
  `capitalTotal` double DEFAULT NULL,
  `organizationID` bigint(20) NOT NULL,
  PRIMARY KEY (`incrementID`),
  KEY `legalRPID` (`legalRPID`),
  KEY `organizationID` (`organizationID`),
  CONSTRAINT `t_organization_increment_ibfk_1` FOREIGN KEY (`legalRPID`) REFERENCES `t_organization_legalrp` (`rpID`),
  CONSTRAINT `t_organization_increment_ibfk_2` FOREIGN KEY (`organizationID`) REFERENCES `organization` (`organizationID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_organization_increment`
--

LOCK TABLES `t_organization_increment` WRITE;
/*!40000 ALTER TABLE `t_organization_increment` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_organization_increment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_organization_legalrp`
--

DROP TABLE IF EXISTS `t_organization_legalrp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_organization_legalrp` (
  `rpID` bigint(20) NOT NULL AUTO_INCREMENT,
  `rpName` varchar(255) DEFAULT NULL,
  `relation` varchar(255) DEFAULT NULL,
  `capitalType` varchar(255) DEFAULT NULL,
  `capitalTotal` double DEFAULT NULL,
  `capitalDate` date DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `percent` tinyint(4) DEFAULT NULL,
  `organizationID` bigint(20) DEFAULT NULL,
  `rpTrue` tinyint(4) NOT NULL,
  PRIMARY KEY (`rpID`),
  KEY `organizationID` (`organizationID`),
  CONSTRAINT `legalrp_ibfk_1` FOREIGN KEY (`organizationID`) REFERENCES `organization` (`organizationID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_organization_legalrp`
--

LOCK TABLES `t_organization_legalrp` WRITE;
/*!40000 ALTER TABLE `t_organization_legalrp` DISABLE KEYS */;
INSERT INTO `t_organization_legalrp` VALUES (1,'周全','总经理','现金',110000,NULL,'1983-05-07','1984-05-07',51,2,1),(2,'顾雨凡','总经理','现金',110000,NULL,'1983-05-07','1985-05-07',49,2,2);
/*!40000 ALTER TABLE `t_organization_legalrp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_specialinfo`
--

DROP TABLE IF EXISTS `t_specialinfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_specialinfo` (
  `infoID` bigint(20) NOT NULL AUTO_INCREMENT,
  `organizationID` bigint(20) NOT NULL,
  `infoDate` date DEFAULT NULL,
  `businesstypeHistory` text,
  `productionChain` text,
  `clientInvestigate` text,
  `financeManageInvestigate` text,
  `staffInvestigate` text,
  `stockfacilityInvestigate` text,
  `economicInvestigate` text,
  `investInvestigate` text,
  `submissionUser` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`infoID`),
  KEY `organizationID` (`organizationID`),
  KEY `submissionUser` (`submissionUser`),
  CONSTRAINT `t_specialinfo_ibfk_1` FOREIGN KEY (`organizationID`) REFERENCES `organization` (`organizationID`),
  CONSTRAINT `t_specialinfo_ibfk_2` FOREIGN KEY (`submissionUser`) REFERENCES `users` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_specialinfo`
--

LOCK TABLES `t_specialinfo` WRITE;
/*!40000 ALTER TABLE `t_specialinfo` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_specialinfo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_group`
--

DROP TABLE IF EXISTS `user_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_group` (
  `groupID` tinyint(4) NOT NULL AUTO_INCREMENT,
  `groupName` varchar(255) NOT NULL,
  PRIMARY KEY (`groupID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_group`
--

LOCK TABLES `user_group` WRITE;
/*!40000 ALTER TABLE `user_group` DISABLE KEYS */;
INSERT INTO `user_group` VALUES (1,'公司'),(2,'银行业'),(3,'保险业');
/*!40000 ALTER TABLE `user_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `userID` bigint(20) NOT NULL AUTO_INCREMENT,
  `LastName` varchar(255) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `homeAddress` varchar(1000) DEFAULT NULL,
  `businessAddress` varchar(1000) DEFAULT NULL,
  `IDType` varchar(1000) DEFAULT NULL,
  `IDNo` int(11) DEFAULT NULL,
  `email` varchar(1000) DEFAULT NULL,
  `phone` varchar(1000) DEFAULT NULL,
  `emergencyName` varchar(1000) DEFAULT NULL,
  `emergencyEmail` varchar(1000) DEFAULT NULL,
  `organizationID` bigint(20) DEFAULT NULL,
  `groupID` tinyint(4) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(1000) DEFAULT NULL,
  `gender` tinyint(4) DEFAULT NULL,
  `emergencyPhone` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`userID`),
  UNIQUE KEY `username` (`username`),
  KEY `groupID` (`groupID`),
  KEY `organizationID` (`organizationID`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`groupID`) REFERENCES `user_group` (`groupID`),
  CONSTRAINT `users_ibfk_2` FOREIGN KEY (`organizationID`) REFERENCES `organization` (`organizationID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'周','全','南京','南京','身份证',123,'averyczech@hotmail.com','8123615159','顾雨凡','quzhou@indiana.edu',2,1,'quzhou','1qaz2wsx',1,'8123615159'),(3,'陈','信','中国','中国','身份证',11111,'avery1988@hotmail.com','8123615159','信诚','gabrielzhouquan@gmail.com',5,2,'bank','12345',1,'8128554848'),(4,'包','险','中国','中国','身份证',11111,'avery1988@hotmail.com','8128554848','信诚','quzhou@umail.iu.edu',6,3,'insurance','12345',1,'11'),(5,'周','二全','中国','中国','身份证',11111,'averyczech@hotmail.com','8123615159','信诚','quzhou@umail.iu.edu',4,1,'quzhou2','1qaz2wsx',1,'8123615159'),(6,'陈','全','南京','南京','身份证',11111,'quzhou@umail.iu.edu','8123615159','顾雨凡','quzhou@indiana.edu',5,2,'quzhou3','1qaz2wsx',1,'8123615159');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-02-11  5:21:58
