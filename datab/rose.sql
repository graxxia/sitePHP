-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.11-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for rose
CREATE DATABASE IF NOT EXISTS `rose` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `rose`;

-- Dumping structure for table rose.pages
CREATE TABLE IF NOT EXISTS `pages` (
  `pageID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pagekey` varchar(16) DEFAULT NULL,
  `title` varchar(64) CHARACTER SET latin1 NOT NULL,
  `content` text CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`pageID`),
  UNIQUE KEY `pagekey` (`pagekey`,`title`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- Dumping data for table rose.pages: 4 rows
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` (`pageID`, `pagekey`, `title`, `content`) VALUES
	(11, 'home', 'Home', 'Rose Skin Care Solutions Home'),
	(12, 'about', 'About', 'About Page\r\n\r\n<p>Skin care is the range of practices that support skin integrity, enhance its appearance and relieve skin conditions. They can include nutrition, avoidance of excessive sun exposure and appropriate use of emollients. ... Skin care is a part of the treatment of wound healing, radiation therapy and some medications.\r\n</p>'),
	(13, 'products', 'Products', 'Skin Care Solutions Products'),
	(14, 'login', 'Log In', 'Log In User');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;

-- Dumping structure for table rose.product
CREATE TABLE IF NOT EXISTS `product` (
  `productID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `productTypeID` int(16) NOT NULL,
  `name` varchar(60) NOT NULL,
  `description` text CHARACTER SET latin1 NOT NULL,
  `unitPrice` decimal(10,2) NOT NULL,
  `productCategoryID` int(16) NOT NULL COMMENT 'from productCategory table',
  PRIMARY KEY (`productID`),
  UNIQUE KEY `name` (`name`,`unitPrice`),
  KEY `productCategoryID` (`productCategoryID`),
  KEY `productCategoryID_2` (`productCategoryID`),
  KEY `productTypeID` (`productTypeID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table rose.product: 0 rows
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
/*!40000 ALTER TABLE `product` ENABLE KEYS */;

-- Dumping structure for table rose.productcategory
CREATE TABLE IF NOT EXISTS `productcategory` (
  `productCategoryID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(16) NOT NULL,
  PRIMARY KEY (`productCategoryID`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table rose.productcategory: 0 rows
/*!40000 ALTER TABLE `productcategory` DISABLE KEYS */;
/*!40000 ALTER TABLE `productcategory` ENABLE KEYS */;

-- Dumping structure for table rose.producttype
CREATE TABLE IF NOT EXISTS `producttype` (
  `productTypeID` int(16) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`productTypeID`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table rose.producttype: 0 rows
/*!40000 ALTER TABLE `producttype` DISABLE KEYS */;
/*!40000 ALTER TABLE `producttype` ENABLE KEYS */;

-- Dumping structure for table rose.users
CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(16) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(16) CHARACTER SET latin1 NOT NULL,
  `lastname` varchar(16) CHARACTER SET latin1 NOT NULL,
  `email` varchar(24) NOT NULL,
  `passwordHash` varchar(24) NOT NULL,
  `cookieHash` varchar(60) NOT NULL,
  `salt` varchar(32) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table rose.users: 0 rows
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table rose.visits
CREATE TABLE IF NOT EXISTS `visits` (
  `visitsID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `address` varchar(32) NOT NULL,
  `qs` varchar(256) CHARACTER SET latin1 NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`visitsID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table rose.visits: 0 rows
/*!40000 ALTER TABLE `visits` DISABLE KEYS */;
/*!40000 ALTER TABLE `visits` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
