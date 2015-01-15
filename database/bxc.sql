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

--
-- Table structure for table `group_access`
--

DROP TABLE IF EXISTS `group_access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `group_access` (
  `accessID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) DEFAULT NULL,
  `groupID` int(11) DEFAULT NULL,
  `access_level` int(11) DEFAULT NULL,
  `can_write` int(11) DEFAULT NULL,
  `can_read` int(11) DEFAULT NULL,
  `can_download` int(11) DEFAULT NULL,
  `can_upload` int(11) DEFAULT NULL,
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
-- Table structure for table `legalRP`
--

DROP TABLE IF EXISTS `legalRP`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `legalRP` (
  `rpID` int(11) NOT NULL AUTO_INCREMENT,
  `rpFirstName` varchar(255) DEFAULT NULL,
  `rpLastName` varchar(255) DEFAULT NULL,
  `relation` varchar(255) DEFAULT NULL,
  `capital` varchar(255) DEFAULT NULL,
  `capitalNumber` varchar(255) DEFAULT NULL,
  `percent` varchar(255) DEFAULT NULL,
  `organizationID` int(11) DEFAULT NULL,
  PRIMARY KEY (`rpID`),
  KEY `organizationID` (`organizationID`),
  CONSTRAINT `legalrp_ibfk_1` FOREIGN KEY (`organizationID`) REFERENCES `organization` (`organizationID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `legalRP`
--

LOCK TABLES `legalRP` WRITE;
/*!40000 ALTER TABLE `legalRP` DISABLE KEYS */;
/*!40000 ALTER TABLE `legalRP` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organ_access`
--

DROP TABLE IF EXISTS `organ_access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `organ_access` (
  `accessID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) DEFAULT NULL,
  `organizationID` int(11) DEFAULT NULL,
  `access_level` int(11) DEFAULT NULL,
  `can_write` int(11) DEFAULT NULL,
  `can_read` int(11) DEFAULT NULL,
  `can_download` int(11) DEFAULT NULL,
  `can_upload` int(11) DEFAULT NULL,
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
  `organizationID` int(11) NOT NULL AUTO_INCREMENT,
  `groupID` int(11) DEFAULT NULL,
  `orgName` varchar(255) DEFAULT NULL,
  `regTime` date DEFAULT NULL,
  `regLocation` varchar(1000) DEFAULT NULL,
  `prodLocation` varchar(1000) DEFAULT NULL,
  `regCapital` varchar(1000) DEFAULT NULL,
  `appendum` varchar(10000) DEFAULT NULL,
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
-- Table structure for table `user_group`
--

DROP TABLE IF EXISTS `user_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_group` (
  `groupID` int(11) NOT NULL AUTO_INCREMENT,
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
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `LastName` varchar(255) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `Address` varchar(1000) DEFAULT NULL,
  `organizationID` int(11) DEFAULT NULL,
  `groupID` int(11) DEFAULT NULL,
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

-- Dump completed on 2015-01-15 14:48:16
