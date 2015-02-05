DROP DATABASE IF EXISTS bxc;
create database bxc;
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

DROP TABLE IF EXISTS `t_loan_payment`;

CREATE TABLE `t_loan_payment`(
   `paymentID` bigint NOT NULL AUTO_INCREMENT,
   `loanID` bigint NOT NULL,
   `paymentTotal` double,
   `dueDate` Date,
   `payDate` Date,
   PRIMARY KEY (`paymentID`),
   FOREIGN KEY (`loanID`) REFERENCES `t_loan`(`loanID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `t_loan_mortgage`;

CREATE TABLE `t_loan_mortgage`(
   `mortgageID` bigint NOT NULL AUTO_INCREMENT,
   `loanID` bigint NOT NULL,
   `mortgageType` varchar(1000),
   `mortgageDescription` text,
   `startDate` Date,
   `endDate` Date,
   PRIMARY KEY (`paymentID`),
   FOREIGN KEY (`loanID`) REFERENCES `t_loan`(`loanID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `t_loan_fee`;

CREATE TABLE `t_loan_fee`(
   `feeID` bigint NOT NULL AUTO_INCREMENT,
   `loanID` bigint NOT NULL,
   `feeTotal` double,
   `dueDate` Date,
   `payDate` Date,
   PRIMARY KEY (`feeID`),
   FOREIGN KEY (`loanID`) REFERENCES `t_loan`(`loanID`)
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

DROP TABLE IF EXISTS `t_messagetext`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_messagetext` (
  `M_Text_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `MessageText` text,
  PRIMARY KEY (`M_Text_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

DROP TABLE IF EXISTS `user_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_group` (
  `groupID` tinyint(4) NOT NULL AUTO_INCREMENT,
  `groupName` varchar(255) NOT NULL,
  PRIMARY KEY (`groupID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
