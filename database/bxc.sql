-- MySQL dump 10.13  Distrib 5.6.13, for Win64 (x86_64)
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

DROP TABLE IF EXISTS `legalrp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `legalrp` (
  `rpID` int(11) NOT NULL AUTO_INCREMENT,
  `rpFirstName` varchar(255) DEFAULT NULL,
  `rpLastName` varchar(255) DEFAULT NULL,
  `relation` varchar(255) DEFAULT NULL,
  `capitalType` varchar(255) DEFAULT NULL,
  `capitalNumber` bigint(20) DEFAULT NULL,
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

LOCK TABLES `legalrp` WRITE;
/*!40000 ALTER TABLE `legalrp` DISABLE KEYS */;
/*!40000 ALTER TABLE `legalrp` ENABLE KEYS */;
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
  `regLocation` varchar(1000) DEFAULT NULL,
  `prodLocation` varchar(1000) DEFAULT NULL,
  `regCapital` bigint(20) DEFAULT NULL,
  `appendum` text,
  PRIMARY KEY (`organizationID`),
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
  `FirstName` varchar(255) DEFAULT NULL,
  `Address` varchar(1000) DEFAULT NULL,
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

-- Dump completed on 2015-01-17 13:55:34
