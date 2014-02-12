# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.6.13)
# Database: community
# Generation Time: 2014-02-12 17:39:03 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table event
# ------------------------------------------------------------

DROP TABLE IF EXISTS `event`;

CREATE TABLE `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `startDate` datetime NOT NULL,
  `endDate` datetime NOT NULL,
  `status` enum('active','passive','deleted') COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` enum('event','workshop','meetUp') COLLATE utf8_unicode_ci DEFAULT NULL,
  `createdDate` datetime NOT NULL,
  `updatedDate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;

INSERT INTO `event` (`id`, `name`, `startDate`, `endDate`, `status`, `type`, `createdDate`, `updatedDate`)
VALUES
	(1,'6 Temmuz YTU','2013-07-06 09:00:00','2013-07-06 18:00:00','active','event','2014-02-12 00:00:00','2014-02-12 00:00:00');

/*!40000 ALTER TABLE `event` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table event_session
# ------------------------------------------------------------

DROP TABLE IF EXISTS `event_session`;

CREATE TABLE `event_session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event` int(11) DEFAULT NULL,
  `speaker` int(11) DEFAULT NULL,
  `startDate` datetime NOT NULL,
  `endDate` datetime NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_55137C7B3BAE0AA7` (`event`),
  KEY `IDX_55137C7B7B85DB61` (`speaker`),
  CONSTRAINT `FK_55137C7B7B85DB61` FOREIGN KEY (`speaker`) REFERENCES `speaker` (`id`),
  CONSTRAINT `FK_55137C7B3BAE0AA7` FOREIGN KEY (`event`) REFERENCES `event` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `event_session` WRITE;
/*!40000 ALTER TABLE `event_session` DISABLE KEYS */;

INSERT INTO `event_session` (`id`, `event`, `speaker`, `startDate`, `endDate`, `subject`, `status`)
VALUES
	(1,1,6,'2013-07-06 09:00:00','2013-07-06 09:20:00','Açılış Konuşması','active'),
	(2,1,5,'2013-07-06 09:30:00','2013-07-06 10:15:00','Tasarım Desenleri ve PHP İmplementasyonları','active'),
	(3,1,2,'2013-07-06 10:30:00','2013-07-06 11:15:00','Symfony Framework','active'),
	(4,1,3,'2013-07-06 11:30:00','2013-07-06 12:15:00','Kodlama Standartları ve Kod Kalite Araçları','active'),
	(5,1,NULL,'2013-07-06 12:15:00','2013-07-06 13:45:00','Yemek Arası','active'),
	(6,1,NULL,'2013-07-06 13:45:00','2013-07-06 14:00:00','Bilişim Sektöründeki Problemler','active'),
	(7,1,1,'2013-07-06 14:00:00','2013-07-06 14:45:00','PHP Unit ve Test Güdümlü Programlama','active'),
	(8,1,4,'2013-07-06 15:00:00','2013-07-06 15:45:00','Büyük Kamu Projelerinde PHP Kullanımı','active'),
	(9,1,7,'2013-07-06 16:00:00','2013-07-06 16:45:00','PHP\'de Debugging','active'),
	(10,1,NULL,'2013-07-06 17:00:00','2013-07-06 17:45:00','Teknik Sohbet','active');

/*!40000 ALTER TABLE `event_session` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table speaker
# ------------------------------------------------------------

DROP TABLE IF EXISTS `speaker`;

CREATE TABLE `speaker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `linkedin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `github` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `speaker` WRITE;
/*!40000 ALTER TABLE `speaker` DISABLE KEYS */;

INSERT INTO `speaker` (`id`, `name`, `surname`, `twitter`, `linkedin`, `github`)
VALUES
	(1,'Mustafa','Ileri','mustafaileri','mustafaileri','mustafaileri'),
	(2,'Osman','Ungur','osmanungur','osmanungur','o'),
	(3,'Adil','Ilhan','adililhan','adililhan','adil'),
	(4,'Huseyin','Mert','hmert','hmert','hmert'),
	(5,'Ibrahim','Gunduz','ibo','ibo','ibo'),
	(6,'Turker','Ince','turker','turker','turker'),
	(7,'Volkan','Altan','volkan','volkan','volkan');

/*!40000 ALTER TABLE `speaker` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D64992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_8D93D649A0D96FBF` (`email_canonical`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
