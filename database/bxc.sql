<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE plist PUBLIC "-//Apple//DTD PLIST 1.0//EN" "http://www.apple.com/DTDs/PropertyList-1.0.dtd">
<plist version="1.0">
<dict>
	<key>ContentFilters</key>
	<dict/>
	<key>auto_connect</key>
	<true/>
	<key>data</key>
	<dict>
		<key>connection</key>
		<dict>
			<key>database</key>
			<string>bxc</string>
			<key>host</key>
			<string>127.0.0.1</string>
			<key>name</key>
			<string>local</string>
			<key>rdbms_type</key>
			<string>mysql</string>
			<key>sslCACertFileLocation</key>
			<string></string>
			<key>sslCACertFileLocationEnabled</key>
			<integer>0</integer>
			<key>sslCertificateFileLocation</key>
			<string></string>
			<key>sslCertificateFileLocationEnabled</key>
			<integer>0</integer>
			<key>sslKeyFileLocation</key>
			<string></string>
			<key>sslKeyFileLocationEnabled</key>
			<integer>0</integer>
			<key>type</key>
			<string>SPTCPIPConnection</string>
			<key>useSSL</key>
			<integer>0</integer>
			<key>user</key>
			<string>root</string>
		</dict>
		<key>session</key>
		<dict>
			<key>connectionEncoding</key>
			<string>latin1</string>
			<key>contentPageNumber</key>
			<integer>1</integer>
			<key>contentSelection</key>
			<data>
			YnBsaXN0MDDUAQIDBAUGJCVYJHZlcnNpb25YJG9iamVjdHNZJGFy
			Y2hpdmVyVCR0b3ASAAGGoKgHCBMUFRYaIVUkbnVsbNMJCgsMDxJX
			TlMua2V5c1pOUy5vYmplY3RzViRjbGFzc6INDoACgAOiEBGABIAF
			gAdUdHlwZVRyb3dzXxAdU2VsZWN0aW9uRGV0YWlsVHlwZU5TSW5k
			ZXhTZXTSFwsYGVxOU1JhbmdlQ291bnQQAIAG0hscHR5aJGNsYXNz
			bmFtZVgkY2xhc3Nlc1pOU0luZGV4U2V0oh8gWk5TSW5kZXhTZXRY
			TlNPYmplY3TSGxwiI1xOU0RpY3Rpb25hcnmiIiBfEA9OU0tleWVk
			QXJjaGl2ZXLRJidUZGF0YYABAAgAEQAaACMALQAyADcAQABGAE0A
			VQBgAGcAagBsAG4AcQBzAHUAdwB8AIEAoQCmALMAtQC3ALwAxwDQ
			ANsA3gDpAPIA9wEEAQcBGQEcASEAAAAAAAACAQAAAAAAAAAoAAAA
			AAAAAAAAAAAAAAABIw==
			</data>
			<key>contentSortColIsAsc</key>
			<true/>
			<key>contentViewport</key>
			<string>{{0, 0}, {693, 456}}</string>
			<key>isToolbarVisible</key>
			<true/>
			<key>queries</key>
			<string>-- MySQL dump 10.13  Distrib 5.6.13, for Win64 (x86_64)
--
-- Host: localhost    Database: bxc
-- ------------------------------------------------------
-- Server version	5.6.13

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
-- Table structure for table `group_access`
--
use bxc2;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group_access`
--

LOCK TABLES `group_access` WRITE;
/*!40000 ALTER TABLE `group_access` DISABLE KEYS */;
/*!40000 ALTER TABLE `group_access` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `legalrp`
--

DROP TABLE IF EXISTS `t_organization_legalrp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_organization_legalrp` (
  `rpID` int(11) NOT NULL AUTO_INCREMENT,
  `rpFirstName` varchar(255) DEFAULT NULL,
  `rpLastName` varchar(255) DEFAULT NULL,
  `relation` varchar(255) DEFAULT NULL,
  `capitalType` varchar(255) DEFAULT NULL,
  `capitalTotal` double DEFAULT NULL,
  `capitalDate` Date DEFAULT NULL,
  `startDate` Date DEFAULT NULL,
  `endDate` Date DEFAULT NULL,
  `percent` tinyint(4) DEFAULT NULL,
  `organizationID` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`rpID`),
  KEY `organizationID` (`organizationID`),
  CONSTRAINT `legalrp_ibfk_1` FOREIGN KEY (`organizationID`) REFERENCES `organization` (`organizationID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_organization_legalrp`
--

LOCK TABLES `t_organization_legalrp` WRITE;
/*!40000 ALTER TABLE `legalrp` DISABLE KEYS */;
/*!40000 ALTER TABLE `legalrp` ENABLE KEYS */;
UNLOCK TABLES;

DROP TABLE IF EXISTS `t_legalrp_trans`;

CREATE TABLE `t_legalrp_trans`(
	`transID` bigint NOT NULL AUTO_INCREMENT,
	`sellerID` bigint NOT NULL,
	`receipientID` bigint NOT NULL,
	`transDate` Date DEFAULT NULL,
	`transTotal` double DEFAULT NULL,
	`incrementID` bigint,
	PRIMARY KEY (`transID`),
	FOREIGN KEY (`sellerID`) REFERENCES `t_organization_legalrp` (`rpID`),
	FOREIGN KEY (`receipientID`) REFERENCES `t_organization_legalrp` (`rpID`),
	FOREIGN KEY (`incrementID`) REFERENCES `t_organization_increment` (`incrementID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `t_organization_increment`;

CREATE TABLE `t_organization_increment`(
	`incrementID` bigint NOT NULL AUTO_INCREMENT,
	`legalRPID` bigint NOT NULL,
	`incrementTimes` int NOT NULL,
	`capitalDate` Date,
	`capitalType` varchar(255),
	`capitalTotal` Double,
	`organizationID` bigint NOT NULL,
	PRIMARY KEY (`incrementID`),
	FOREIGN KEY (`legalRPID`) REFERENCES  `t_organization_legalrp`(`rpID`),
	FOREIGN KEY (`organizationID`) REFERENCES `organization`(`organizationID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
  `legalRPID` bigint,
  `regLocation` varchar(1000) DEFAULT NULL,
  `prodLocation` varchar(1000) DEFAULT NULL,
  `regCapital` double DEFAULT NULL,
  `regLicence` varchar(100) DEFAULT NULL,
  `regAuthority` varchar(100) DEFAULT NULL,
  `contactName` varchar(100) DEFAULT NULL,
  `contactEmail` varchar(100) DEFAULT NULL,
  `contactPhone` varchar(100) DEFAULT NULL,
  `appendum` text,
  PRIMARY KEY (`organizationID`),
  FOREIGN KEY (`legalRPID`) REFERENCES `t_loan_organization_legalrp` (`rpID`),
  KEY `groupID` (`groupID`),
  CONSTRAINT `organization_ibfk_1` FOREIGN KEY (`groupID`) REFERENCES `user_group` (`groupID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organization`
--

LOCK TABLES `organization` WRITE;
/*!40000 ALTER TABLE `organization` DISABLE KEYS */;
/*!40000 ALTER TABLE `organization` ENABLE KEYS */;
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
  `loanDocID` bigint(20) DEFAULT NULL,
  `insuranceID` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`loanID`),
  KEY `bankID` (`bankID`),
  KEY `organizationID` (`organizationID`),
  KEY `loanDocID` (`loanDocID`),
  KEY `insuranceID` (`insuranceID`),
  CONSTRAINT `t_loan_ibfk_1` FOREIGN KEY (`bankID`) REFERENCES `organization` (`organizationID`),
  CONSTRAINT `t_loan_ibfk_2` FOREIGN KEY (`organizationID`) REFERENCES `organization` (`organizationID`),
  CONSTRAINT `t_loan_ibfk_3` FOREIGN KEY (`loanDocID`) REFERENCES `t_loan_doc` (`docID`),
  CONSTRAINT `t_loan_ibfk_4` FOREIGN KEY (`insuranceID`) REFERENCES `t_loan_insurance` (`insuranceID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_loan`
--

LOCK TABLES `t_loan` WRITE;
/*!40000 ALTER TABLE `t_loan` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_loan` ENABLE KEYS */;
UNLOCK TABLES;

DROP TABLE IF EXISTS `t_loan_payment`;

CREATE TABLE `t_loan_payment`(
   `paymentID` bigint NOT NULL AUTO_INCREMENT,
   `loanID` bigint NOT NULL,
   `paymentTotal` double,
   `dueDate` Date,
   `payDate` Date,
   PRIMARY KEY `paymentID`,
   FOREIGN KEY `loanID` REFERENCES `t_loan`(`loanID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `t_loan_mortgage`;

CREATE TABLE `t_loan_mortgage`(
   `mortgageID` bigint NOT NULL AUTO_INCREMENT,
   `loanID` bigint NOT NULL,
   `mortgageType` varchar(1000),
   `mortgageDescription` text,
   `startDate` Date,
   `endDate` Date,
   PRIMARY KEY `paymentID`,
   FOREIGN KEY `loanID` REFERENCES `t_loan`(`loanID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `t_loan_fee`;

CREATE TABLE `t_loan_fee`(
   `feeID` bigint NOT NULL AUTO_INCREMENT,
   `loanID` bigint NOT NULL,
   `feeTotal` double,
   `dueDate` Date,
   `payDate` Date,
   PRIMARY KEY `feeID`,
   FOREIGN KEY `loanID` REFERENCES `t_loan`(`loanID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Table structure for table `t_loan_doc`
--

DROP TABLE IF EXISTS `t_loan_doc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_loan_doc` (
  `docID` bigint(20) NOT NULL AUTO_INCREMENT,
  `doc_URL` varchar(1000) DEFAULT NULL,
  `loanID` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`docID`),
  KEY `loanID` (`loanID`),
  CONSTRAINT `t_loan_doc_ibfk_1` FOREIGN KEY (`loanID`) REFERENCES `t_loan` (`loanID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_loan_doc`
--

LOCK TABLES `t_loan_doc` WRITE;
/*!40000 ALTER TABLE `t_loan_doc` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_loan_doc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_loan_insurance`
--

DROP TABLE IF EXISTS `t_loan_insurance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_loan_insurance` (
  `insuranceID` bigint(20) NOT NULL AUTO_INCREMENT,
  `companyID` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`insuranceID`),
  KEY `companyID` (`companyID`),
  CONSTRAINT `t_loan_insurance_ibfk_1` FOREIGN KEY (`companyID`) REFERENCES `organization` (`organizationID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_loan_insurance`
--

LOCK TABLES `t_loan_insurance` WRITE;
/*!40000 ALTER TABLE `t_loan_insurance` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_loan_insurance` ENABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_messagetext`
--

LOCK TABLES `t_messagetext` WRITE;
/*!40000 ALTER TABLE `t_messagetext` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_messagetext` ENABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_group`
--

LOCK TABLES `user_group` WRITE;
/*!40000 ALTER TABLE `user_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_group` ENABLE KEYS */;
UNLOCK TABLES;


DROP TABLE IF EXISTS `t_income_statement`;

CREATE TABLE `t_income_statement`(
	`statementID` bigint NOT NULL AUTO_INCREMENT,
	`organizationID` bigint NOT NULL,
	`statementDate` Date,
	`mainIncome` double,
	`mainCost` double,
	`salesTax` double,
	`mainProfit` double,
	`otherProfit` double,
	`businessCost` double,
	`manageCost` double,
	`financeCost` double,
	`impairmentCost` double,
	`investGain` double,
	`businessProfit` double,
	`otherIncome` double,
	`subsidyIncome` double,
	`otherCost` double,
	`profitTotal` double,
	`incomeTax` double,
	`netProfit` double,
	`grossProfit` double,
	`netMargin` double,
	`grossMargin` double,
	`submissionUser` bigint,
	`file_url` varchar(1000),
	PRIMARY KEY (`statementID`),
	FOREIGN KEY (`organizationID`) REFERENCES `organization` (`organizationID`),
	FOREIGN KEY (`submissionUser`) REFERENCES `users` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `t_balance_sheet`;

CREATE TABLE `t_balance_sheet`(
	`sheetID` bigint NOT NULL AUTO_INCREMENT,
	`organizationID` bigint NOT NULL,
	`sheetDate` Date,
	`grossAssets` double,
	`floatingAssets` double,
	`monetaryCaptial` double,
	`liquidInvestment` double,
	`notesReceivables` double,
	`AccountsReceivables` double,
	`suppliersAdvances` double,
	`receivableSubsidies` double,
	`otherReceivables` double,
	`dividendsReceivables` double,
	`stock` double,
	`deferredExpenses` double,
	`otherfloatingAssets` double,
	`nonliquidAssets` double,
	`longequityInvest` double,
	`fixedAssetsTotal` double,
	`fixedAssetsOrigin` double,
	`fixedAssetsNet` double,
	`constructionProcess` double,
	`intangibleAssets` double,
	`longdeferredExpenses` double,
	`othernonliquidInvest` double,
	`grossDebt` double,
	`currentDebt` double,
	`shortLoan` double,
	`notesPayables` double,
	`accountsPayables` double,
	`advanceCustomers` double,
	`taxPayables` double,
	`otherPayables` double,
	`salaries` double,
	`dividendsPayables` double,
	`otherfloatingDebt` double,
	`longLoan` double,
	`othernonfloatingDebt` double,
	`ownerEquity` double,
	`paidinCapital` double,
	`contributedSurplus` double,
	`reservedSurplus` double,
	`undistributedProfit` double,
	`debtownerequityTotal` double,
	`assetliabilityRatio` double,
	`liquidityRatio` double,
	`quickRatio` double,
	`submissionUser` bigint,
	`file_url` varchar(1000),
	PRIMARY KEY (`sheetID`),
	FOREIGN KEY (`organizationID`) REFERENCES `organization` (`organizationID`),
	FOREIGN KEY (`submissionUser`) REFERENCES `users` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `t_specialInfo`;

CREATE TABLE `t_specialInfo`(
	`infoID` bigint NOT NULL AUTO_INCREMENT,
	`organizationID` NOT NULL,
	`infoDate` Date,
	`businesstypeHistory` text,
	`productionChain` text,
	`clientInvestigate` text,
	`financeManageInvestigate` text,
	`staffInvestigate` text,
	`stockfacilityInvestigate` text,
	`economicInvestigate` text,
	`investInvestigate` text,
	`submissionUser` bigint,
	PRIMARY KEY (`infoID`),
	FOREIGN KEY (`organizationID`) REFERENCES `organization` (`organizationID`),
	FOREIGN KEY (`submissionUser`) REFERENCES `users` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `t_organization_file`;

CREATE TABLE `t_organization_file`(
	`fileID` bigint NOT NULL AUTO_INCREMENT,
	`organizationID` bigint NOT NULL,
	`licence_url` varchar(1000),
	`registrationCode_url` varchar(1000), 
	`taxregistrationLicence_url` varchar(1000),
	`legalRP_url` varchar(1000),
	`legalRPID_url` varchar(1000),
	`staff_url` varchar(1000),
	`assetReport_url` varchar(1000),
	`loanContract_url` varchar(1000),
	`mortgage_url` varchar(1000),
	`loanCard_url` varchar(1000),
	`financialStatement_url` varchar(1000),
	`bankreconciliationStatement_url` varchar(1000),
	`procuresaleContract_url` varchar(1000),
	`specialLicence_url` varchar(1000),
	`incorporationBylaw_url` varchar(1000),
	`submissionUser` bigint,
	PRIMARY KEY (`fileID`),
	FOREIGN KEY (`organizationID`) REFERENCES `organization` (`organizationID`),
	FOREIGN KEY (`submissionUser`) REFERENCES `users` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `t_organization_credit`;

CREATE TABLE `t_organization_credit`(
	`creditID` bigint NOT NULL AUTO_INCREMENT,
	`organizationID` bigint,
	`creditDate` Date,
	`financeCredit` int,
	`fileCredit` int,
	`staffCredit` int,
	`orglicenceCredit` int,
	`stafflicenceCredit` int,
	`submissionUser` bigint,
	PRIMARY KEY (`creditID`),
	FOREIGN KEY (`organizationID`) REFERENCES `organization` (`organizationID`),
	FOREIGN KEY (`submissionUser`) REFERENCES `users` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `homeAddress` varchar(1000), 
  `businessAddress` varchar(1000),
  `IDType` varchar(1000),
  `IDNo` int,
  `email` varchar(1000),
  `phone` varchar(1000),
  `emergencyName` varchar(1000),
  `emergencyContact` varchar(1000),
  `organizationID` bigint(20) DEFAULT NULL,
  `groupID` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`userID`),
  KEY `groupID` (`groupID`),
  KEY `organizationID` (`organizationID`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`groupID`) REFERENCES `user_group` (`groupID`),
  CONSTRAINT `users_ibfk_2` FOREIGN KEY (`organizationID`) REFERENCES `organization` (`organizationID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
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

-- Dump completed on 2015-01-18 20:55:08</string>
			<key>view</key>
			<string>SP_VIEW_CUSTOMQUERY</string>
			<key>windowVerticalDividerPosition</key>
			<real>217</real>
		</dict>
	</dict>
	<key>encrypted</key>
	<false/>
	<key>format</key>
	<string>connection</string>
	<key>queryFavorites</key>
	<array/>
	<key>queryHistory</key>
	<array>
		<string>-- MySQL dump 10.13  Distrib 5.6.13, for Win64 (x86_64)
--
-- Host: localhost    Database: bxc
-- ------------------------------------------------------
-- Server version	5.6.13

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
-- Table structure for table `group_access`
--
use bxc2;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table `group_access`
--

LOCK TABLES `group_access` WRITE;
/*!40000 ALTER TABLE `group_access` DISABLE KEYS */;
/*!40000 ALTER TABLE `group_access` ENABLE KEYS */;
UNLOCK TABLES;
--
-- Table structure for table `legalrp`
--

DROP TABLE IF EXISTS `t_organization_legalrp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_organization_legalrp` (
  `rpID` int(11) NOT NULL AUTO_INCREMENT,
  `rpFirstName` varchar(255) DEFAULT NULL,
  `rpLastName` varchar(255) DEFAULT NULL,
  `relation` varchar(255) DEFAULT NULL,
  `capitalType` varchar(255) DEFAULT NULL,
  `capitalTotal` double DEFAULT NULL,
  `capitalDate` Date DEFAULT NULL,
  `startDate` Date DEFAULT NULL,
  `endDate` Date DEFAULT NULL,
  `percent` tinyint(4) DEFAULT NULL,
  `organizationID` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`rpID`),
  KEY `organizationID` (`organizationID`),
  CONSTRAINT `legalrp_ibfk_1` FOREIGN KEY (`organizationID`) REFERENCES `organization` (`organizationID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table `t_organization_legalrp`
--

LOCK TABLES `t_organization_legalrp` WRITE;
/*!40000 ALTER TABLE `legalrp` DISABLE KEYS */;
/*!40000 ALTER TABLE `legalrp` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `t_legalrp_trans`;
CREATE TABLE `t_legalrp_trans`(
	`transID` bigint NOT NULL AUTO_INCREMENT,
	`sellerID` bigint NOT NULL,
	`receipientID` bigint NOT NULL,
	`transDate` Date DEFAULT NULL,
	`transTotal` double DEFAULT NULL,
	`incrementID` bigint,
	PRIMARY KEY (`transID`),
	FOREIGN KEY (`sellerID`) REFERENCES `t_organization_legalrp` (`rpID`),
	FOREIGN KEY (`receipientID`) REFERENCES `t_organization_legalrp` (`rpID`),
	FOREIGN KEY (`incrementID`) REFERENCES `t_organization_increment` (`incrementID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
DROP TABLE IF EXISTS `t_organization_increment`;
CREATE TABLE `t_organization_increment`(
	`incrementID` bigint NOT NULL AUTO_INCREMENT,
	`legalRPID` bigint NOT NULL,
	`incrementTimes` int NOT NULL,
	`capitalDate` Date,
	`capitalType` varchar(255),
	`capitalTotal` Double,
	`organizationID` bigint NOT NULL,
	PRIMARY KEY (`incrementID`),
	FOREIGN KEY (`legalRPID`) REFERENCES  `t_organization_legalrp`(`rpID`),
	FOREIGN KEY (`organizationID`) REFERENCES `organization`(`organizationID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
  `legalRPID` bigint,
  `regLocation` varchar(1000) DEFAULT NULL,
  `prodLocation` varchar(1000) DEFAULT NULL,
  `regCapital` double DEFAULT NULL,
  `regLicence` varchar(100) DEFAULT NULL,
  `regAuthority` varchar(100) DEFAULT NULL,
  `contactName` varchar(100) DEFAULT NULL,
  `contactEmail` varchar(100) DEFAULT NULL,
  `contactPhone` varchar(100) DEFAULT NULL,
  `appendum` text,
  PRIMARY KEY (`organizationID`),
  FOREIGN KEY (`legalRPID`) REFERENCES `t_loan_organization_legalrp` (`rpID`),
  KEY `groupID` (`groupID`),
  CONSTRAINT `organization_ibfk_1` FOREIGN KEY (`groupID`) REFERENCES `user_group` (`groupID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table `organization`
--

LOCK TABLES `organization` WRITE;
/*!40000 ALTER TABLE `organization` DISABLE KEYS */;
/*!40000 ALTER TABLE `organization` ENABLE KEYS */;
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
  `loanDocID` bigint(20) DEFAULT NULL,
  `insuranceID` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`loanID`),
  KEY `bankID` (`bankID`),
  KEY `organizationID` (`organizationID`),
  KEY `loanDocID` (`loanDocID`),
  KEY `insuranceID` (`insuranceID`),
  CONSTRAINT `t_loan_ibfk_1` FOREIGN KEY (`bankID`) REFERENCES `organization` (`organizationID`),
  CONSTRAINT `t_loan_ibfk_2` FOREIGN KEY (`organizationID`) REFERENCES `organization` (`organizationID`),
  CONSTRAINT `t_loan_ibfk_3` FOREIGN KEY (`loanDocID`) REFERENCES `t_loan_doc` (`docID`),
  CONSTRAINT `t_loan_ibfk_4` FOREIGN KEY (`insuranceID`) REFERENCES `t_loan_insurance` (`insuranceID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table `t_loan`
--

LOCK TABLES `t_loan` WRITE;
/*!40000 ALTER TABLE `t_loan` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_loan` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `t_loan_payment`;
CREATE TABLE `t_loan_payment`(
   `paymentID` bigint NOT NULL AUTO_INCREMENT,
   `loanID` bigint NOT NULL,
   `paymentTotal` double,
   `dueDate` Date,
   `payDate` Date,
   PRIMARY KEY `paymentID`,
   FOREIGN KEY `loanID` REFERENCES `t_loan`(`loanID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
DROP TABLE IF EXISTS `t_loan_mortgage`;
CREATE TABLE `t_loan_mortgage`(
   `mortgageID` bigint NOT NULL AUTO_INCREMENT,
   `loanID` bigint NOT NULL,
   `mortgageType` varchar(1000),
   `mortgageDescription` text,
   `startDate` Date,
   `endDate` Date,
   PRIMARY KEY `paymentID`,
   FOREIGN KEY `loanID` REFERENCES `t_loan`(`loanID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
DROP TABLE IF EXISTS `t_loan_fee`;
CREATE TABLE `t_loan_fee`(
   `feeID` bigint NOT NULL AUTO_INCREMENT,
   `loanID` bigint NOT NULL,
   `feeTotal` double,
   `dueDate` Date,
   `payDate` Date,
   PRIMARY KEY `feeID`,
   FOREIGN KEY `loanID` REFERENCES `t_loan`(`loanID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Table structure for table `t_loan_doc`
--

DROP TABLE IF EXISTS `t_loan_doc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_loan_doc` (
  `docID` bigint(20) NOT NULL AUTO_INCREMENT,
  `doc_URL` varchar(1000) DEFAULT NULL,
  `loanID` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`docID`),
  KEY `loanID` (`loanID`),
  CONSTRAINT `t_loan_doc_ibfk_1` FOREIGN KEY (`loanID`) REFERENCES `t_loan` (`loanID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table `t_loan_doc`
--

LOCK TABLES `t_loan_doc` WRITE;
/*!40000 ALTER TABLE `t_loan_doc` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_loan_doc` ENABLE KEYS */;
UNLOCK TABLES;
--
-- Table structure for table `t_loan_insurance`
--

DROP TABLE IF EXISTS `t_loan_insurance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_loan_insurance` (
  `insuranceID` bigint(20) NOT NULL AUTO_INCREMENT,
  `companyID` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`insuranceID`),
  KEY `companyID` (`companyID`),
  CONSTRAINT `t_loan_insurance_ibfk_1` FOREIGN KEY (`companyID`) REFERENCES `organization` (`organizationID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table `t_loan_insurance`
--

LOCK TABLES `t_loan_insurance` WRITE;
/*!40000 ALTER TABLE `t_loan_insurance` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_loan_insurance` ENABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table `t_messagetext`
--

LOCK TABLES `t_messagetext` WRITE;
/*!40000 ALTER TABLE `t_messagetext` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_messagetext` ENABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table `user_group`
--

LOCK TABLES `user_group` WRITE;
/*!40000 ALTER TABLE `user_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_group` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `t_income_statement`;
CREATE TABLE `t_income_statement`(
	`statementID` bigint NOT NULL AUTO_INCREMENT,
	`organizationID` bigint NOT NULL,
	`statementDate` Date,
	`mainIncome` double,
	`mainCost` double,
	`salesTax` double,
	`mainProfit` double,
	`otherProfit` double,
	`businessCost` double,
	`manageCost` double,
	`financeCost` double,
	`impairmentCost` double,
	`investGain` double,
	`businessProfit` double,
	`otherIncome` double,
	`subsidyIncome` double,
	`otherCost` double,
	`profitTotal` double,
	`incomeTax` double,
	`netProfit` double,
	`grossProfit` double,
	`netMargin` double,
	`grossMargin` double,
	`submissionUser` bigint,
	`file_url` varchar(1000),
	PRIMARY KEY (`statementID`),
	FOREIGN KEY (`organizationID`) REFERENCES `organization` (`organizationID`),
	FOREIGN KEY (`submissionUser`) REFERENCES `users` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
DROP TABLE IF EXISTS `t_balance_sheet`;
CREATE TABLE `t_balance_sheet`(
	`sheetID` bigint NOT NULL AUTO_INCREMENT,
	`organizationID` bigint NOT NULL,
	`sheetDate` Date,
	`grossAssets` double,
	`floatingAssets` double,
	`monetaryCaptial` double,
	`liquidInvestment` double,
	`notesReceivables` double,
	`AccountsReceivables` double,
	`suppliersAdvances` double,
	`receivableSubsidies` double,
	`otherReceivables` double,
	`dividendsReceivables` double,
	`stock` double,
	`deferredExpenses` double,
	`otherfloatingAssets` double,
	`nonliquidAssets` double,
	`longequityInvest` double,
	`fixedAssetsTotal` double,
	`fixedAssetsOrigin` double,
	`fixedAssetsNet` double,
	`constructionProcess` double,
	`intangibleAssets` double,
	`longdeferredExpenses` double,
	`othernonliquidInvest` double,
	`grossDebt` double,
	`currentDebt` double,
	`shortLoan` double,
	`notesPayables` double,
	`accountsPayables` double,
	`advanceCustomers` double,
	`taxPayables` double,
	`otherPayables` double,
	`salaries` double,
	`dividendsPayables` double,
	`otherfloatingDebt` double,
	`longLoan` double,
	`othernonfloatingDebt` double,
	`ownerEquity` double,
	`paidinCapital` double,
	`contributedSurplus` double,
	`reservedSurplus` double,
	`undistributedProfit` double,
	`debtownerequityTotal` double,
	`assetliabilityRatio` double,
	`liquidityRatio` double,
	`quickRatio` double,
	`submissionUser` bigint,
	`file_url` varchar(1000),
	PRIMARY KEY (`sheetID`),
	FOREIGN KEY (`organizationID`) REFERENCES `organization` (`organizationID`),
	FOREIGN KEY (`submissionUser`) REFERENCES `users` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
DROP TABLE IF EXISTS `t_specialInfo`;
CREATE TABLE `t_specialInfo`(
	`infoID` bigint NOT NULL AUTO_INCREMENT,
	`organizationID` NOT NULL,
	`infoDate` Date,
	`businesstypeHistory` text,
	`productionChain` text,
	`clientInvestigate` text,
	`financeManageInvestigate` text,
	`staffInvestigate` text,
	`stockfacilityInvestigate` text,
	`economicInvestigate` text,
	`investInvestigate` text,
	`submissionUser` bigint,
	PRIMARY KEY (`infoID`),
	FOREIGN KEY (`organizationID`) REFERENCES `organization` (`organizationID`),
	FOREIGN KEY (`submissionUser`) REFERENCES `users` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
DROP TABLE IF EXISTS `t_organization_file`;
CREATE TABLE `t_organization_file`(
	`fileID` bigint NOT NULL AUTO_INCREMENT,
	`organizationID` bigint NOT NULL,
	`licence_url` varchar(1000),
	`registrationCode_url` varchar(1000), 
	`taxregistrationLicence_url` varchar(1000),
	`legalRP_url` varchar(1000),
	`legalRPID_url` varchar(1000),
	`staff_url` varchar(1000),
	`assetReport_url` varchar(1000),
	`loanContract_url` varchar(1000),
	`mortgage_url` varchar(1000),
	`loanCard_url` varchar(1000),
	`financialStatement_url` varchar(1000),
	`bankreconciliationStatement_url` varchar(1000),
	`procuresaleContract_url` varchar(1000),
	`specialLicence_url` varchar(1000),
	`incorporationBylaw_url` varchar(1000),
	`submissionUser` bigint,
	PRIMARY KEY (`fileID`),
	FOREIGN KEY (`organizationID`) REFERENCES `organization` (`organizationID`),
	FOREIGN KEY (`submissionUser`) REFERENCES `users` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
DROP TABLE IF EXISTS `t_organization_credit`;
CREATE TABLE `t_organization_credit`(
	`creditID` bigint NOT NULL AUTO_INCREMENT,
	`organizationID` bigint,
	`creditDate` Date,
	`financeCredit` int,
	`fileCredit` int,
	`staffCredit` int,
	`orglicenceCredit` int,
	`stafflicenceCredit` int,
	`submissionUser` bigint,
	PRIMARY KEY (`creditID`),
	FOREIGN KEY (`organizationID`) REFERENCES `organization` (`organizationID`),
	FOREIGN KEY (`submissionUser`) REFERENCES `users` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
  `homeAddress` varchar(1000), 
  `businessAddress` varchar(1000),
  `IDType` varchar(1000),
  `IDNo` int,
  `email` varchar(1000),
  `phone` varchar(1000),
  `emergencyName` varchar(1000),
  `emergencyContact` varchar(1000),
  `organizationID` bigint(20) DEFAULT NULL,
  `groupID` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`userID`),
  KEY `groupID` (`groupID`),
  KEY `organizationID` (`organizationID`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`groupID`) REFERENCES `user_group` (`groupID`),
  CONSTRAINT `users_ibfk_2` FOREIGN KEY (`organizationID`) REFERENCES `organization` (`organizationID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
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
-- Dump completed on 2015-01-18 20:55:08</string>
		<string>-- MySQL dump 10.13  Distrib 5.6.13, for Win64 (x86_64)
--
-- Host: localhost    Database: bxc
-- ------------------------------------------------------
-- Server version	5.6.13

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
-- Table structure for table `group_access`
--
use bxc;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table `group_access`
--

LOCK TABLES `group_access` WRITE;
/*!40000 ALTER TABLE `group_access` DISABLE KEYS */;
/*!40000 ALTER TABLE `group_access` ENABLE KEYS */;
UNLOCK TABLES;
--
-- Table structure for table `legalrp`
--

DROP TABLE IF EXISTS `t_organization_legalrp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_organization_legalrp` (
  `rpID` int(11) NOT NULL AUTO_INCREMENT,
  `rpFirstName` varchar(255) DEFAULT NULL,
  `rpLastName` varchar(255) DEFAULT NULL,
  `relation` varchar(255) DEFAULT NULL,
  `capitalType` varchar(255) DEFAULT NULL,
  `capitalTotal` double DEFAULT NULL,
  `capitalDate` Date DEFAULT NULL,
  `startDate` Date DEFAULT NULL,
  `endDate` Date DEFAULT NULL,
  `percent` tinyint(4) DEFAULT NULL,
  `organizationID` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`rpID`),
  KEY `organizationID` (`organizationID`),
  CONSTRAINT `legalrp_ibfk_1` FOREIGN KEY (`organizationID`) REFERENCES `organization` (`organizationID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table `t_organization_legalrp`
--

LOCK TABLES `t_organization_legalrp` WRITE;
/*!40000 ALTER TABLE `legalrp` DISABLE KEYS */</string>
		<string>CREATE TABLE `t_organization_credit`(
	`creditID` bigint NOT NULL AUTO_INCREMENT,
	`organizationID` bigint,
	`creditDate` Date,
	`financeCredit` int,
	`fileCredit` int,
	`staffCredit` int,
	`orglicenceCredit` int,
	`stafflicenceCredit` int,
	`submissionUser` bigint,
	PRIMARY KEY (`creditID`),
	FOREIGN KEY (`organizationID`) REFERENCES `organization` (`organizationID`),
	FOREIGN KEY (`submissionUser`) REFERENCES `users` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1</string>
		<string>-- MySQL dump 10.13  Distrib 5.6.13, for Win64 (x86_64)
--
-- Host: localhost    Database: bxc
-- ------------------------------------------------------
-- Server version	5.6.13

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
-- Table structure for table `group_access`
--
use bxc;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table `group_access`
--

LOCK TABLES `group_access` WRITE;
/*!40000 ALTER TABLE `group_access` DISABLE KEYS */;
/*!40000 ALTER TABLE `group_access` ENABLE KEYS */;
UNLOCK TABLES;
--
-- Table structure for table `legalrp`
--

DROP TABLE IF EXISTS `t_organization_legalrp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_organization_legalrp` (
  `rpID` int(11) NOT NULL AUTO_INCREMENT,
  `rpFirstName` varchar(255) DEFAULT NULL,
  `rpLastName` varchar(255) DEFAULT NULL,
  `relation` varchar(255) DEFAULT NULL,
  `capitalType` varchar(255) DEFAULT NULL,
  `capitalTotal` double DEFAULT NULL,
  `capitalDate` Date DEFAULT NULL,
  `startDate` Date DEFAULT NULL,
  `endDate` Date DEFAULT NULL,
  `percent` tinyint(4) DEFAULT NULL,
  `organizationID` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`rpID`),
  KEY `organizationID` (`organizationID`),
  CONSTRAINT `legalrp_ibfk_1` FOREIGN KEY (`organizationID`) REFERENCES `organization` (`organizationID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table `t_organization_legalrp`
--

LOCK TABLES `t_organization_legalrp` WRITE;
/*!40000 ALTER TABLE `legalrp` DISABLE KEYS */;
/*!40000 ALTER TABLE `legalrp` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `t_legalrp_trans`;
CREATE TABLE `t_legalrp_trans`(
	`transID` bigint NOT NULL AUTO_INCREMENT,
	`sellerID` bigint NOT NULL,
	`receipientID` bigint NOT NULL,
	`transDate` Date DEFAULT NULL,
	`transTotal` double DEFAULT NULL,
	`incrementID` bigint,
	PRIMARY KEY (`transID`),
	FOREIGN KEY (`sellerID`) REFERENCES `t_organization_legalrp` (`rpID`),
	FOREIGN KEY (`receipientID`) REFERENCES `t_organization_legalrp` (`rpID`),
	FOREIGN KEY (`incrementID`) REFERENCES `t_organization_increment` (`incrementID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
DROP TABLE IF EXISTS `t_organization_increment`;
CREATE TABLE `t_organization_increment`(
	`incrementID` bigint NOT NULL AUTO_INCREMENT,
	`legalRPID` bigint NOT NULL,
	`incrementTimes` int NOT NULL,
	`capitalDate` Date,
	`capitalType` varchar(255),
	`capitalTotal` Double,
	`organizationID` bigint NOT NULL,
	PRIMARY KEY (`incrementID`),
	FOREIGN KEY (`legalRPID`) REFERENCES  `t_organization_legalrp`(`rpID`),
	FOREIGN KEY (`organizationID`) REFERENCES `organization`(`organizationID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
  `legalRPID` bigint,
  `regLocation` varchar(1000) DEFAULT NULL,
  `prodLocation` varchar(1000) DEFAULT NULL,
  `regCapital` double DEFAULT NULL,
  `regLicence` varchar(100) DEFAULT NULL,
  `regAuthority` varchar(100) DEFAULT NULL,
  `contactName` varchar(100) DEFAULT NULL,
  `contactEmail` varchar(100) DEFAULT NULL,
  `contactPhone` varchar(100) DEFAULT NULL,
  `appendum` text,
  PRIMARY KEY (`organizationID`),
  FOREIGN KEY (`legalRPID`) REFERENCES `t_loan_organization_legalrp` (`rpID`),
  KEY `groupID` (`groupID`),
  CONSTRAINT `organization_ibfk_1` FOREIGN KEY (`groupID`) REFERENCES `user_group` (`groupID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table `organization`
--

LOCK TABLES `organization` WRITE;
/*!40000 ALTER TABLE `organization` DISABLE KEYS */;
/*!40000 ALTER TABLE `organization` ENABLE KEYS */;
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
  `loanDocID` bigint(20) DEFAULT NULL,
  `insuranceID` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`loanID`),
  KEY `bankID` (`bankID`),
  KEY `organizationID` (`organizationID`),
  KEY `loanDocID` (`loanDocID`),
  KEY `insuranceID` (`insuranceID`),
  CONSTRAINT `t_loan_ibfk_1` FOREIGN KEY (`bankID`) REFERENCES `organization` (`organizationID`),
  CONSTRAINT `t_loan_ibfk_2` FOREIGN KEY (`organizationID`) REFERENCES `organization` (`organizationID`),
  CONSTRAINT `t_loan_ibfk_3` FOREIGN KEY (`loanDocID`) REFERENCES `t_loan_doc` (`docID`),
  CONSTRAINT `t_loan_ibfk_4` FOREIGN KEY (`insuranceID`) REFERENCES `t_loan_insurance` (`insuranceID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table `t_loan`
--

LOCK TABLES `t_loan` WRITE;
/*!40000 ALTER TABLE `t_loan` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_loan` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `t_loan_payment`;
CREATE TABLE `t_loan_payment`(
   `paymentID` bigint NOT NULL AUTO_INCREMENT,
   `loanID` bigint NOT NULL,
   `paymentTotal` double,
   `dueDate` Date,
   `payDate` Date,
   PRIMARY KEY `paymentID`,
   FOREIGN KEY `loanID` REFERENCES `t_loan`(`loanID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
DROP TABLE IF EXISTS `t_loan_mortgage`;
CREATE TABLE `t_loan_mortgage`(
   `mortgageID` bigint NOT NULL AUTO_INCREMENT,
   `loanID` bigint NOT NULL,
   `mortgageType` varchar(1000),
   `mortgageDescription` text,
   `startDate` Date,
   `endDate` Date,
   PRIMARY KEY `paymentID`,
   FOREIGN KEY `loanID` REFERENCES `t_loan`(`loanID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
DROP TABLE IF EXISTS `t_loan_fee`;
CREATE TABLE `t_loan_fee`(
   `feeID` bigint NOT NULL AUTO_INCREMENT,
   `loanID` bigint NOT NULL,
   `feeTotal` double,
   `dueDate` Date,
   `payDate` Date,
   PRIMARY KEY `feeID`,
   FOREIGN KEY `loanID` REFERENCES `t_loan`(`loanID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Table structure for table `t_loan_doc`
--

DROP TABLE IF EXISTS `t_loan_doc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_loan_doc` (
  `docID` bigint(20) NOT NULL AUTO_INCREMENT,
  `doc_URL` varchar(1000) DEFAULT NULL,
  `loanID` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`docID`),
  KEY `loanID` (`loanID`),
  CONSTRAINT `t_loan_doc_ibfk_1` FOREIGN KEY (`loanID`) REFERENCES `t_loan` (`loanID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table `t_loan_doc`
--

LOCK TABLES `t_loan_doc` WRITE;
/*!40000 ALTER TABLE `t_loan_doc` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_loan_doc` ENABLE KEYS */;
UNLOCK TABLES;
--
-- Table structure for table `t_loan_insurance`
--

DROP TABLE IF EXISTS `t_loan_insurance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_loan_insurance` (
  `insuranceID` bigint(20) NOT NULL AUTO_INCREMENT,
  `companyID` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`insuranceID`),
  KEY `companyID` (`companyID`),
  CONSTRAINT `t_loan_insurance_ibfk_1` FOREIGN KEY (`companyID`) REFERENCES `organization` (`organizationID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table `t_loan_insurance`
--

LOCK TABLES `t_loan_insurance` WRITE;
/*!40000 ALTER TABLE `t_loan_insurance` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_loan_insurance` ENABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table `t_messagetext`
--

LOCK TABLES `t_messagetext` WRITE;
/*!40000 ALTER TABLE `t_messagetext` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_messagetext` ENABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table `user_group`
--

LOCK TABLES `user_group` WRITE;
/*!40000 ALTER TABLE `user_group` DISABLE KEYS */;
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
  `homeAddress` varchar(1000), 
  `businessAddress` varchar(1000),
  `IDType` varchar(1000),
  `IDNo` int,
  `email` varchar(1000),
  `phone` varchar(1000),
  `emergencyName` varchar(1000),
  `emergencyContact` varchar(1000),
  `organizationID` bigint(20) DEFAULT NULL,
  `groupID` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`userID`),
  KEY `groupID` (`groupID`),
  KEY `organizationID` (`organizationID`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`groupID`) REFERENCES `user_group` (`groupID`),
  CONSTRAINT `users_ibfk_2` FOREIGN KEY (`organizationID`) REFERENCES `organization` (`organizationID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
DROP TABLE IF EXISTS `t_income_statement`;
CREATE TABLE `t_income_statement`(
	`statementID` bigint NOT NULL AUTO_INCREMENT,
	`organizationID` bigint NOT NULL,
	`statementDate` Date,
	`mainIncome` double,
	`mainCost` double,
	`salesTax` double,
	`mainProfit` double,
	`otherProfit` double,
	`businessCost` double,
	`manageCost` double,
	`financeCost` double,
	`impairmentCost` double,
	`investGain` double,
	`businessProfit` double,
	`otherIncome` double,
	`subsidyIncome` double,
	`otherCost` double,
	`profitTotal` double,
	`incomeTax` double,
	`netProfit` double,
	`grossProfit` double,
	`netMargin` double,
	`grossMargin` double,
	`submissionUser` bigint,
	`file_url` varchar(1000),
	PRIMARY KEY (`statementID`),
	FOREIGN KEY (`organizationID`) REFERENCES `organization` (`organizationID`),
	FOREIGN KEY (`submissionUser`) REFERENCES `users` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
DROP TABLE IF EXISTS `t_balance_sheet`;
CREATE TABLE `t_balance_sheet`(
	`sheetID` bigint NOT NULL AUTO_INCREMENT,
	`organizationID` bigint NOT NULL,
	`sheetDate` Date,
	`grossAssets` double,
	`floatingAssets` double,
	`monetaryCaptial` double,
	`liquidInvestment` double,
	`notesReceivables` double,
	`AccountsReceivables` double,
	`suppliersAdvances` double,
	`receivableSubsidies` double,
	`otherReceivables` double,
	`dividendsReceivables` double,
	`stock` double,
	`deferredExpenses` double,
	`otherfloatingAssets` double,
	`nonliquidAssets` double,
	`longequityInvest` double,
	`fixedAssetsTotal` double,
	`fixedAssetsOrigin` double,
	`fixedAssetsNet` double,
	`constructionProcess` double,
	`intangibleAssets` double,
	`longdeferredExpenses` double,
	`othernonliquidInvest` double,
	`grossDebt` double,
	`currentDebt` double,
	`shortLoan` double,
	`notesPayables` double,
	`accountsPayables` double,
	`advanceCustomers` double,
	`taxPayables` double,
	`otherPayables` double,
	`salaries` double,
	`dividendsPayables` double,
	`otherfloatingDebt` double,
	`longLoan` double,
	`othernonfloatingDebt` double,
	`ownerEquity` double,
	`paidinCapital` double,
	`contributedSurplus` double,
	`reservedSurplus` double,
	`undistributedProfit` double,
	`debtownerequityTotal` double,
	`assetliabilityRatio` double,
	`liquidityRatio` double,
	`quickRatio` double,
	`submissionUser` bigint,
	`file_url` varchar(1000),
	PRIMARY KEY (`sheetID`),
	FOREIGN KEY (`organizationID`) REFERENCES `organization` (`organizationID`),
	FOREIGN KEY (`submissionUser`) REFERENCES `users` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
DROP TABLE IF EXISTS `t_specialInfo`;
CREATE TABLE `t_specialInfo`(
	`infoID` bigint NOT NULL AUTO_INCREMENT,
	`organizationID` NOT NULL,
	`infoDate` Date,
	`businesstypeHistory` text,
	`productionChain` text,
	`clientInvestigate` text,
	`financeManageInvestigate` text,
	`staffInvestigate` text,
	`stockfacilityInvestigate` text,
	`economicInvestigate` text,
	`investInvestigate` text,
	`submissionUser` bigint,
	PRIMARY KEY (`infoID`),
	FOREIGN KEY (`organizationID`) REFERENCES `organization` (`organizationID`),
	FOREIGN KEY (`submissionUser`) REFERENCES `users` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
DROP TABLE IF EXISTS `t_organization_file`;
CREATE TABLE `t_organization_file`(
	`fileID` bigint NOT NULL AUTO_INCREMENT,
	`organizationID` bigint NOT NULL,
	`licence_url` varchar(1000),
	`registrationCode_url` varchar(1000), 
	`taxregistrationLicence_url` varchar(1000),
	`legalRP_url` varchar(1000),
	`legalRPID_url` varchar(1000),
	`staff_url` varchar(1000),
	`assetReport_url` varchar(1000),
	`loanContract_url` varchar(1000),
	`mortgage_url` varchar(1000),
	`loanCard_url` varchar(1000),
	`financialStatement_url` varchar(1000),
	`bankreconciliationStatement_url` varchar(1000),
	`procuresaleContract_url` varchar(1000),
	`specialLicence_url` varchar(1000),
	`incorporationBylaw_url` varchar(1000),
	`submissionUser` bigint,
	PRIMARY KEY (`fileID`),
	FOREIGN KEY (`organizationID`) REFERENCES `organization` (`organizationID`),
	FOREIGN KEY (`submissionUser`) REFERENCES `users` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
DROP TABLE IF EXISTS `t_organization_credit`;
CREATE TABLE `t_organization_credit`(
	`creditID` bigint NOT NULL AUTO_INCREMENT,
	`organizationID` bigint,
	`creditDate` Date,
	`financeCredit` int,
	`fileCredit` int,
	`staffCredit` int,
	`orglicenceCredit` int,
	`stafflicenceCredit` int,
	`submissionUser` bigint,
	PRIMARY KEY (`creditID`),
	FOREIGN KEY (`organizationID`) REFERENCES `organization` (`organizationID`),
	FOREIGN KEY (`submissionUser`) REFERENCES `users` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
-- Dump completed on 2015-01-18 20:55:08</string>
		<string>--
-- Dumping data for table `t_organization_legalrp`
--

LOCK TABLES `t_organization_legalrp` WRITE</string>
		<string>-- MySQL dump 10.13  Distrib 5.6.13, for Win64 (x86_64)
--
-- Host: localhost    Database: bxc
-- ------------------------------------------------------
-- Server version	5.6.13

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
-- Table structure for table `group_access`
--
use bxc;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table `group_access`
--

LOCK TABLES `group_access` WRITE;
/*!40000 ALTER TABLE `group_access` DISABLE KEYS */;
/*!40000 ALTER TABLE `group_access` ENABLE KEYS */;
UNLOCK TABLES;
--
-- Table structure for table `legalrp`
--

DROP TABLE IF EXISTS `t_organization_legalrp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_organization_legalrp` (
  `rpID` int(11) NOT NULL AUTO_INCREMENT,
  `rpFirstName` varchar(255) DEFAULT NULL,
  `rpLastName` varchar(255) DEFAULT NULL,
  `relation` varchar(255) DEFAULT NULL,
  `capitalType` varchar(255) DEFAULT NULL,
  `capitalTotal` double DEFAULT NULL,
  `capitalDate` Date DEFAULT NULL,
  `startDate` Date DEFAULT NULL,
  `endDate` Date DEFAULT NULL,
  `percent` tinyint(4) DEFAULT NULL,
  `organizationID` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`rpID`),
  KEY `organizationID` (`organizationID`),
  CONSTRAINT `legalrp_ibfk_1` FOREIGN KEY (`organizationID`) REFERENCES `organization` (`organizationID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table `legalrp`
--

LOCK TABLES `t_organization_legalrp` WRITE;
/*!40000 ALTER TABLE `legalrp` DISABLE KEYS */</string>
		<string>-- Dump completed on 2015-01-18 20:55:08</string>
		<string>CREATE TABLE group_access(
	accessID INT NOT NULL AUTO_INCREMENT,
	userID INT,                                                                                                                                                                                                                                                                                                  
	groupID INT,
	access_level INT, 
	can_write INT,
	can_read INT,
	can_download INT,
	can_upload INT,
	PRIMARY KEY (accessID),
	FOREIGN KEY (userID) REFERENCES users(userID),
	FOREIGN KEY (groupID) REFERENCES user_group(groupID)
)ENGINE=InnoDB</string>
		<string>USE bxc;
CREATE TABLE user_group (
     groupID INT NOT NULL AUTO_INCREMENT,
     groupName VARCHAR(255) NOT NULL,
     PRIMARY KEY (groupID)
) ENGINE=InnoDB;
CREATE TABLE organization(
	organizationID INT NOT NULL AUTO_INCREMENT,
	groupID INT,
	orgName VARCHAR(255),
	regTime DATE,
	regLocation VARCHAR(1000),
	prodLocation VARCHAR(1000),
	regCapital VARCHAR(1000),
	appendum VARCHAR(10000),
	PRIMARY KEY (organizationID),
	FOREIGN KEY (groupID) REFERENCES user_group(groupID)
)ENGINE=InnoDB;
CREATE TABLE users (
	userID INT NOT NULL AUTO_INCREMENT,
	LastName VARCHAR(255) NOT NULL,
	FirstName VARCHAR(255),
	Address VARCHAR(1000),
	organizationID INT,
	groupID INT,
	PRIMARY KEY (userID),
	FOREIGN KEY (groupID) REFERENCES user_group(groupID),
	FOREIGN KEY (organizationID) REFERENCES organization(organizationID)
)ENGINE=InnoDB;
CREATE TABLE legalRP(
	rpID INT NOT NULL AUTO_INCREMENT,
	rpFirstName VARCHAR(255),
	rpLastName VARCHAR(255),
	relation VARCHAR(255),
	capital VARCHAR(255),
	capitalNumber VARCHAR(255),
	percent VARCHAR(255),
	organizationID INT,
	PRIMARY KEY (rpID),
	FOREIGN KEY (organizationID) REFERENCES organization(organizationID)
)ENGINE=InnoDB;
CREATE TABLE group_access(
	accessID INT NOT NULL AUTO_INCREMENT,
	userID INT,                                                                                                                                                                                                                                                                                                  
	groupID INT,
	access_level INT, 
	can_write INT,
	can_read INT,
	can_download INT,
	can_upload INT,
	PRIMARY KEY (accessID),
	FOREIGN KEY (userID) REFERENCES users(userID),
	FOREIGN KEY (groupID) REFERENCES user_group(groupID),
)ENGINE=InnoDB;
CREATE TABLE organ_access(
	accessID INT NOT NULL AUTO_INCREMENT,
	userID INT,  
	organizationID INT,                                                                                                                                                                                                                                                                                                
	access_level INT, 
	can_write INT,
	can_read INT,
	can_download INT,
	can_upload INT,
	PRIMARY KEY (accessID),
	FOREIGN KEY (userID) REFERENCES users(userID),
	FOREIGN KEY (organizationID) REFERENCES organization(organizationID)
)ENGINE=InnoDB</string>
		<string>USE bxc</string>
		<string>CREATE TABLE organization(
	organizationID INT NOT NULL AUTO_INCREMENT,
	groupID INT,
	orgName VARCHAR(255),
	regTime DATE,
	regLocation VARCHAR(1000),
	prodLocation VARCHAR(1000),
	regCapital VARCHAR(1000),
	appendum VARCHAR(10000),
	PRIMARY KEY (organizationID),
	FOREIGN KEY (groupID) REFERENCES user_group(groupID)
)ENGINE=InnoDB</string>
		<string>CREATE TABLE organ_access(
	accessID INT NOT NULL AUTO_INCREMENT,
	userID INT,  
	organizationID INT,                                                                                                                                                                                                                                                                                                
	access_level INT, 
	can_write INT,
	can_read INT,
	can_download INT,
	can_upload INT,
	PRIMARY KEY (accessID),
	FOREIGN KEY (userID) REFERENCES users(userID),
	FOREIGN KEY (organizationID) REFERENCES organization(organizationID)
)ENGINE=InnoDB</string>
		<string>CREATE TABLE organ_access(
	accessID INT NOT NULL AUTO_INCREMENT,
	userID INT,  
	organizationID INT,                                                                                                                                                                                                                                                                                                
	access_level INT, 
	can_write INT,
	can_read INT,
	can_download INT,
	can_upload INT,
	PRIMARY KEY (accessID),
	FOREIGN KEY (userID) REFERENCES users(userID),
	FOREIGN KEY (organizationID) REFERENCES organization(organizationID)
)</string>
		<string>CREATE TABLE group_access(
	accessID INT NOT NULL AUTO_INCREMENT,
	userID INT,
	organizationID INT,                                                                                                                                                                                                                                                                                                   
	groupID INT,
	access_level INT, 
	can_write INT,
	can_read INT,
	can_download INT,
	can_upload INT,
	PRIMARY KEY (accessID),
	FOREIGN KEY (userID) REFERENCES users(userID),
	FOREIGN KEY (groupID) REFERENCES user_group(groupID),
	FOREIGN KEY (organizationID) REFERENCES organization(organizationID)
)</string>
		<string>CREATE TABLE access(
	accessID INT NOT NULL AUTO_INCREMENT,
	userID INT,
	organizationID INT,                                                                                                                                                                                                                                                                                                   
	groupID INT,
	access_level INT, 
	can_write INT,
	can_read INT,
	can_download INT,
	can_upload INT,
	PRIMARY KEY (accessID),
	FOREIGN KEY (userID) REFERENCES users(userID),
	FOREIGN KEY (groupID) REFERENCES user_group(groupID),
	FOREIGN KEY (organizationID) REFERENCES organization(organizationID)
)</string>
		<string>CREATE TABLE access(
	accessID INT NOT NULL AUTO_INCREMENT,
	userID INT,
	organizationID INT,                                                                                                                                                                                                                                                                                                   
	groupID INT,
	access_level INT, 
	can_write INT,
	can_read INT,
	can_download INT,
	can_upload INT,
	PRIMARY KEY (accessID),
	FOREIGN KEY (userID) REFERENCES users(userID),
	FOREIGN KEY (groupID) REFERENCES user_group(groupID),
	FOREIGN KEY (organanizationID) REFERENCES organization(organizationID)
)</string>
		<string>CREATE TABLE access(
	accessID INT NOT NULL AUTO_INCREMENT,
	userID INT,
	organID INT,                                                                                                                                                                                                                                                                                                   
	groupID INT,
	access_level INT, 
	can_write INT,
	can_read INT,
	can_download INT,
	can_upload INT,
	PRIMARY KEY (accessID),
	FOREIGN KEY (userID) REFERENCES users(userID),
	FOREIGN KEY (groupID) REFERENCES user_group(groupID),
	FOREIGN KEY (organID) REFERENCES organization(organizationID)
)</string>
		<string>rpFirstName VARCHAR(25</string>
		<string>CREATE TABLE legalRP(
	rpID INT NOT NULL AUTO_INCREMENT,
	rpFirstName VARCHAR(25</string>
		<string>CREATE TABLE users (
	userID INT NOT NULL AUTO_INCREMENT,
	LastName VARCHAR(255) NOT NULL,
	FirstName VARCHAR(255),
	Address VARCHAR(1000),
	organizationID INT,
	groupID INT,
	PRIMARY KEY (userID),
	FOREIGN KEY (groupID) REFERENCES user_group(groupID),
	FOREIGN KEY (organizationID) REFERENCES organization(organizationID)
)

CREATE TABLE legalRP(
	rpID INT NOT NULL AUTO_INCREMENT,
	rpFirstName VARCHAR(255),
	rpLastName VARCHAR(255),
	relation VARCHAR(255),
	capital VARCHAR(255),
	capitalNumber VARCHAR(255),
	percent VARCHAR(255),
	organizationID INT,
	PRIMARY KEY (rpID),
	FOREIGN KEY (organizationID) REFERENCES organization(organizationID)
)

CREATE TABLE access(
accessID INT NOT NULL AUTO_INCREMENT,
userID INT,
organID INT,                                                                                                                                                                                                                                                                                                   
groupID INT,
access_level INT, 
can_write INT,
can_read INT,
can_download INT,
can_upload INT,
PRIMARY KEY (accessID),
FOREIGN KEY (userID) REFERENCES users(userID),
FOREIGN KEY (groupID) REFERENCES user_group(groupID),
FOREIGN KEY (organID) REFERENCES organization(organizationID)
)</string>
	</array>
	<key>rdbms_type</key>
	<string>mysql</string>
	<key>rdbms_version</key>
	<string>5.6.17</string>
	<key>version</key>
	<integer>1</integer>
</dict>
</plist>
