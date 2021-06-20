-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.4.14-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for elektronski_dnevnik
CREATE DATABASE IF NOT EXISTS `elektronski_dnevnik` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `elektronski_dnevnik`;

-- Dumping structure for table elektronski_dnevnik.grade
CREATE TABLE IF NOT EXISTS `grade` (
  `grade_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `subject` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mark` int(1) unsigned NOT NULL,
  PRIMARY KEY (`grade_id`),
  KEY `fk_grade_user_id` (`user_id`),
  CONSTRAINT `fk_grade_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table elektronski_dnevnik.grade: ~2 rows (approximately)
/*!40000 ALTER TABLE `grade` DISABLE KEYS */;
INSERT INTO `grade` (`grade_id`, `user_id`, `subject`, `mark`) VALUES
	(14, 1, 'Matematika', 5),
	(15, 1, 'Srpski jezik', 3);
/*!40000 ALTER TABLE `grade` ENABLE KEYS */;

-- Dumping structure for table elektronski_dnevnik.user
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `forename` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_hash` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_teacher` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `is_admin` tinyint(1) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table elektronski_dnevnik.user: ~3 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`user_id`, `forename`, `surname`, `username`, `password_hash`, `email`, `is_teacher`, `is_admin`) VALUES
	(1, 'Petar', 'Petrović', 'ppetrovic', '$2y$10$SdDrzKy/qOpiSLsJGiNgkusVVXycyjYLr1ZfBU2Di..Z36kDOep0e', 'ppetrovic@ucenik.com', 0, 0),
	(2, 'Jelena', 'Marjanović', 'jmarjanovic', '$2y$10$SdDrzKy/qOpiSLsJGiNgkusVVXycyjYLr1ZfBU2Di..Z36kDOep0e', 'jmarjanovic@nastavnik.com', 1, 0),
	(17, 'Administrator', 'Admin', 'admin', '$2y$10$tjcrhJIGVLlHFPchpC0a/eF/LwT7WjvSGKxaGoxipEWYmi6qICuX.', 'admin@school.com', 1, 1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
