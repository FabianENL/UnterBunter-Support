-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server versie:                10.4.19-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Versie:              11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Databasestructuur van ub-support wordt geschreven
DROP DATABASE IF EXISTS `ub-support`;
CREATE DATABASE IF NOT EXISTS `ub-support` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `ub-support`;

-- Structuur van  tabel ub-support.chats wordt geschreven
DROP TABLE IF EXISTS `chats`;
CREATE TABLE IF NOT EXISTS `chats` (
  `chatID` int(11) NOT NULL AUTO_INCREMENT,
  `ownerId` int(11) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`chatID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumpen data van tabel ub-support.chats: ~0 rows (ongeveer)
DELETE FROM `chats`;
/*!40000 ALTER TABLE `chats` DISABLE KEYS */;
INSERT INTO `chats` (`chatID`, `ownerId`, `subject`) VALUES
	(1, 3, 'asd'),
	(2, 5, 'asdasd');
/*!40000 ALTER TABLE `chats` ENABLE KEYS */;

-- Structuur van  tabel ub-support.messages wordt geschreven
DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL,
  `ownerId` int(11) DEFAULT NULL,
  `chatId` int(11) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumpen data van tabel ub-support.messages: ~1 rows (ongeveer)
DELETE FROM `messages`;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` (`id`, `ownerId`, `chatId`, `content`, `date`) VALUES
	(0, 3, 0, ';asdfjlksfjklsdfj', '2023-05-23');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;

-- Structuur van  tabel ub-support.reparaties wordt geschreven
DROP TABLE IF EXISTS `reparaties`;
CREATE TABLE IF NOT EXISTS `reparaties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `voornaam` varchar(100) NOT NULL,
  `achternam` varchar(100) NOT NULL,
  `probleem` varchar(10000) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `mail` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Dumpen data van tabel ub-support.reparaties: ~5 rows (ongeveer)
DELETE FROM `reparaties`;
/*!40000 ALTER TABLE `reparaties` DISABLE KEYS */;
INSERT INTO `reparaties` (`id`, `voornaam`, `achternam`, `probleem`, `status`, `mail`) VALUES
	(1, 'Fabian', 'Eppens', 'tafelbonk niet overleefd', 5, 'fab@fab.fab'),
	(2, 'Fabian', 'Eppens', 'adjbasdjbn', 3, 'fab@fab.fab'),
	(3, 'Gert', 'Gerrit', 'geen', 0, 'gert@gert.gert'),
	(4, 'Fabian', 'Eppens', 'asd', 1, 'fab@fab.fab'),
	(7, 'a', 'b', 'c', 5, 'fab@fab.fab'),
	(8, 'Gert', 'Geert', 'Pik', 3, 'fab@fab.fab');
/*!40000 ALTER TABLE `reparaties` ENABLE KEYS */;

-- Structuur van  tabel ub-support.users wordt geschreven
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `mail` varchar(255) DEFAULT NULL,
  `pass` mediumtext DEFAULT NULL,
  `permissionType` int(11) DEFAULT NULL,
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumpen data van tabel ub-support.users: ~4 rows (ongeveer)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`mail`, `pass`, `permissionType`, `userID`) VALUES
	('a@b.c', '900150983cd24fb0d6963f7d28e17f72', 0, 1),
	('arjanebele@gmail.com', '359196519995785474fdcadbf9e9373f', 0, 2),
	('fab@fab.fab', '6e3df1e2bccb9e5eea0d1822814ed45f', 0, 3),
	('admin@unterbunter.online', '21232f297a57a5a743894a0e4a801fc3', 1, 4);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
