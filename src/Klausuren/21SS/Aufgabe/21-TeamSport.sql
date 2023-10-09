-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: mariadb:3306
-- Erstellungszeit: 15. Jul 2021 um 10:15
-- Server-Version: 10.5.9-MariaDB-1:10.5.9+maria~focal
-- PHP-Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `2021_TeamSport`
--
CREATE DATABASE IF NOT EXISTS `2021_TeamSport` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `2021_TeamSport`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `gameDetails`
--

DROP TABLE IF EXISTS `gameDetails`;
CREATE TABLE IF NOT EXISTS `gameDetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gameId` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `gameDetails_ibfk_1` (`gameId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `gameDetails`
--

INSERT INTO `gameDetails` (`id`, `gameId`, `name`) VALUES
(1, 1, 'Hanna'),
(2, 1, 'Eva');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `games`
--

DROP TABLE IF EXISTS `games`;
CREATE TABLE IF NOT EXISTS `games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datetime` datetime NOT NULL,
  `opposingTeam` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `games`
--

INSERT INTO `games` (`id`, `datetime`, `opposingTeam`, `status`) VALUES
(1, '2021-08-18 12:00:00', 'TG 75 Darmstadt', 1),
(2, '2021-08-25 10:00:00', 'TSG Darmstadt', 0),
(3, '2021-06-15 13:00:00', 'Darmstadt 98', 3);

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `gameDetails`
--
ALTER TABLE `gameDetails`
  ADD CONSTRAINT `gameDetails_ibfk_1` FOREIGN KEY (`gameId`) REFERENCES `games` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- REVOKE ALL PRIVILEGES ON *.* FROM 'public'@'%'; 
-- REVOKE GRANT OPTION ON *.* FROM 'public'@'%'; 
GRANT SELECT, INSERT, UPDATE, DELETE, FILE ON *.* TO 'public'@'%' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0; 
