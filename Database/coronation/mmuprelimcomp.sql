-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.24-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for mmuprelimcomp
CREATE DATABASE IF NOT EXISTS `mmuprelimcomp` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `mmuprelimcomp`;

-- Dumping structure for table mmuprelimcomp.audiences
CREATE TABLE IF NOT EXISTS `audiences` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id of an audience',
  `Name` varchar(255) NOT NULL COMMENT 'name of a audience',
  `StudentID` varchar(255) NOT NULL COMMENT 'Student Id of audience',
  `Email` varchar(255) NOT NULL COMMENT 'email of audience',
  `College` varchar(255) NOT NULL COMMENT 'college of audience',
  `qrcode` varchar(55) NOT NULL COMMENT 'qr code of audience',
  PRIMARY KEY (`id`),
  UNIQUE KEY `qrcode` (`qrcode`)
) ENGINE=InnoDB AUTO_INCREMENT=1016 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table mmuprelimcomp.audiences: ~10 rows (approximately)
REPLACE INTO `audiences` (`id`, `Name`, `StudentID`, `Email`, `College`, `qrcode`) VALUES
	(2, 'Ponce, Margaux Elysse D.', 'A129237', ' ', 'College of Business and Financial Science', 'HDJSHDJK'),
	(10, 'Elrond C. Javen ', 'AQ#@Dad', ' javen@gmail.com', 'Institute of Pharmacy', 'gNne0dyC'),
	(1003, 'Novem Lanaban', 'DSDSD', 'nlanaban.a12034879@umak.edu.ph', 'College of Business and fishing', '12346'),
	(1004, 'Jam Villarosa', 'ASDSDSD', 'jvillarosa.a12034879@umak.edu.ph', 'College of Aeronotics', '12347'),
	(1006, 'JOSE GAYARES', 'ADSW$#', 'jgayares.a12034879@umak.edu.ph', 'College of Computer and Information Sciences', 'AHGHGH'),
	(1008, 'Novem Lanaban', 'ADDSFF', 'lanaba@gmail.com', 'COllege of Computer Information and Sciences', 'novemlanaban'),
	(1010, 'Marielle Zabala', 'A32343', 'zabala@gmail.com', 'College of Business and Management', 'DHSJDHSJDHSdh'),
	(1012, 'Alex Robles', 'A129374', 'macatuhay@gmail.com', 'College of Arts', 'DHSDTWYD'),
	(1014, 'Ronabel Abrugar', 'A12323', 'ronabel@gmail.com', 'College of Education', 'sdasdasdsd'),
	(1015, 'Angel Macatuhay', 'AGHSYT2', 'macatuhay@gmail.com', 'College of Engineering', 'werdsfddf');

-- Dumping structure for table mmuprelimcomp.mmuscanned
CREATE TABLE IF NOT EXISTS `mmuscanned` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `IDAUDIENCE` varchar(255) NOT NULL,
  `CHECKEDBY` varchar(50) DEFAULT NULL,
  `DATESTAMP` date NOT NULL DEFAULT current_timestamp(),
  `TIMESTAMP` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `IDAUDIENCE` (`IDAUDIENCE`)
) ENGINE=InnoDB AUTO_INCREMENT=352 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table mmuprelimcomp.mmuscanned: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
