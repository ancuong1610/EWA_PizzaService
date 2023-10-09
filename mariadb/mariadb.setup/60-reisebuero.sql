-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 06. Mrz 2020 um 15:03
-- Server-Version: 10.1.19-MariaDB
-- PHP-Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `reisebuero`
--
CREATE DATABASE IF NOT EXISTS `reisebuero` DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci;
USE `reisebuero`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `flug`
--

CREATE TABLE IF NOT EXISTS `flug` (
  `FlugNr` int(11) NOT NULL AUTO_INCREMENT,
  `Zielflughafen` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Datum` date DEFAULT NULL,
  `Uhrzeit` time DEFAULT NULL,
  `Heimatflughafen` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Fluggesellschaft` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `istHinflug` tinyint(1) DEFAULT NULL,
  `Preis` double DEFAULT NULL,
  `PauschalNr` int(11) DEFAULT NULL,
  PRIMARY KEY (`FlugNr`)
) ENGINE=MyISAM AUTO_INCREMENT=97 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Daten für Tabelle `flug`
--

INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(1, 'Palma de Mallorca', '2002-04-21', '18:00:00', 'Frankfurt', 'Hapag Lloyd', 1, 79, 1);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(2, 'Palma de Mallorca', '2002-04-24', '08:30:00', 'Berlin-Tegel', 'Germania', 1, 79, 2);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(3, 'Palma de Mallorca', '2002-04-26', '17:25:00', 'Hamburg', 'Hapag Lloyd', 1, 79, 3);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(4, 'Teneriffa', '2002-04-21', '09:10:00', 'Bruessel', 'Sobelair', 1, 80, 4);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(5, 'Palma de Mallorca', '2002-04-24', '08:30:00', 'Berlin-Tegel', 'Germania', 1, 81, 5);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(6, 'Antalya', '2002-04-30', '06:00:00', 'Hannover', 'Hapag Lloyd', 1, 81, 6);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(7, 'Palma de Mallorca', '2002-04-19', '09:15:00', 'Hahn', 'Air Europa', 1, 82, 7);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(8, 'Palma de Mallorca', '2002-04-19', '16:30:00', 'Duesseldorf', 'Hapag Lloyd', 1, 82, 8);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(9, 'Palma de Mallorca', '2002-04-19', '16:50:00', 'Hamburg', 'Hapag Lloyd', 1, 82, 9);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(10, 'Palma de Mallorca', '2002-04-20', '08:45:00', 'Muenchen', 'Air Europa', 1, 82, 10);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(11, 'Palma de Mallorca', '2002-04-20', '16:55:00', 'Hannover', 'Air Europa', 1, 82, 11);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(12, 'Palma de Mallorca', '2002-04-20', '17:40:00', 'Nuernberg', 'Hapag Lloyd', 1, 82, 12);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(13, 'Palma de Mallorca', '2002-04-26', '17:25:00', 'Hamburg', 'Hapag Lloyd', 1, 82, 13);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(14, 'Palma de Mallorca', '2002-04-21', '18:00:00', 'Frankfurt', 'Hapag Lloyd', 1, 82, 14);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(15, 'Teneriffa', '2002-04-21', '09:10:00', 'Bruessel', 'Sobelair', 1, 82, 15);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(16, 'Antalya', '2002-04-30', '06:00:00', 'Hannover', 'Hapag Lloyd', 1, 82, 16);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(17, 'Palma de Mallorca', '2002-04-20', '17:45:00', 'Frankfurt', 'Hapag Lloyd', 1, 83, 17);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(18, 'Palma de Mallorca', '2002-04-26', '11:10:00', 'Dresden', 'LTE Internation', 1, 83, 18);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(19, 'Palma de Mallorca', '2002-04-21', '01:30:00', 'Lyon', 'Futura', 1, 84, 19);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(20, 'Palma de Mallorca', '2002-04-24', '08:30:00', 'Berlin-Tegel', 'Germania', 1, 84, 20);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(21, 'Ibiza', '2002-04-30', '07:45:00', 'Muenchen', 'Condor', 1, 84, 21);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(22, 'Palma de Mallorca', '2002-04-26', '17:25:00', 'Hamburg', 'Hapag Lloyd', 1, 85, 22);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(23, 'Malta', '2002-04-20', '16:40:00', 'Mulhouse', 'Air Malta', 1, 85, 23);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(24, 'Palma de Mallorca', '2002-04-22', '06:20:00', 'Muenchen', 'Condor', 1, 85, 24);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(25, 'Djerba', '2002-04-22', '04:20:00', 'Koeln/Bonn', 'Air Berlin', 1, 85, 25);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(26, 'Djerba', '2002-04-22', '15:35:00', 'Duesseldorf', 'LTU', 1, 85, 26);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(27, 'Djerba', '2002-04-22', '11:40:00', 'Leipzig', 'Air Berlin', 1, 85, 27);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(28, 'Djerba', '2002-04-22', '09:00:00', 'Berlin-Tegel', 'Germania', 1, 85, 28);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(29, 'Teneriffa', '2002-04-21', '09:10:00', 'Bruessel', 'Sobelair', 1, 86, 29);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(30, 'Palma de Mallorca', '2002-04-20', '17:45:00', 'Frankfurt', 'Hapag Lloyd', 1, 87, 30);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(31, 'Palma de Mallorca', '2002-04-21', '18:00:00', 'Frankfurt', 'Hapag Lloyd', 1, 87, 31);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(32, 'Palma de Mallorca', '2002-04-24', '08:30:00', 'Berlin-Tegel', 'Germania', 1, 87, 32);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(33, 'Palma de Mallorca', '2002-04-21', '18:55:00', 'Stuttgart', 'Hapag Lloyd', 1, 88, 33);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(34, 'Palma de Mallorca', '2002-04-21', '12:45:00', 'Muenchen', 'Hapag Lloyd', 1, 88, 34);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(35, 'Palma de Mallorca', '2002-04-26', '11:10:00', 'Dresden', 'LTE Internation', 1, 88, 35);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(36, 'Palma de Mallorca', '2002-04-26', '17:25:00', 'Hamburg', 'Hapag Lloyd', 1, 88, 36);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(37, 'Antalya', '2002-04-28', '17:20:00', 'Hamburg', 'Hapag Lloyd', 1, 88, 37);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(38, 'Antalya', '2002-04-30', '06:00:00', 'Hannover', 'Hapag Lloyd', 1, 88, 38);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(39, 'Palma de Mallorca', '2002-04-27', '17:45:00', 'Frankfurt', 'Hapag Lloyd', 1, 89, 39);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(40, 'Teneriffa', '2002-04-21', '09:10:00', 'Bruessel', 'Sobelair', 1, 89, 40);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(41, 'Palma de Mallorca', '2002-04-27', '17:45:00', 'Frankfurt', 'Hapag Lloyd', 1, 89, 41);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(42, 'Teneriffa', '2002-04-21', '09:10:00', 'Bruessel', 'Sobelair', 1, 89, 42);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(43, 'Palma de Mallorca', '2002-04-27', '09:45:00', 'Stuttgart', 'Air Europa', 1, 90, 43);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(44, 'Palma de Mallorca', '2002-04-28', '06:25:00', 'Nuernberg', 'Hapag Lloyd', 1, 90, 44);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(45, 'Palma de Mallorca', '2002-04-28', '06:25:00', 'Nuernberg', 'Hapag Lloyd', 1, 90, 45);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(46, 'Palma de Mallorca', '2002-04-28', '17:45:00', 'Stuttgart', 'Hapag Lloyd', 1, 90, 46);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(47, 'Palma de Mallorca', '2002-04-28', '17:45:00', 'Stuttgart', 'Hapag Lloyd', 1, 90, 47);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(48, 'Palma de Mallorca', '2002-04-21', '18:00:00', 'Frankfurt', 'Hapag Lloyd', 1, 90, 48);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(49, 'Palma de Mallorca', '2002-04-25', '12:05:00', 'Frankfurt', 'Hapag Lloyd', 0, 79, 1);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(50, 'Palma de Mallorca', '2002-04-27', '21:15:00', 'Berlin-Tegel', 'Germania', 0, 79, 2);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(51, 'Palma de Mallorca', '2002-04-29', '22:50:00', 'Hamburg', 'Hapag Lloyd', 0, 79, 3);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(52, 'Teneriffa', '2002-04-23', '16:00:00', 'Bruessel', 'Sobelair', 0, 80, 4);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(53, 'Palma de Mallorca', '2002-04-27', '21:15:00', 'Berlin-Tegel', 'Germania', 0, 81, 5);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(54, 'Antalya', '2002-05-03', '13:40:00', 'Hannover', 'Hapag Lloyd', 0, 81, 6);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(55, 'Palma de Mallorca', '2002-04-26', '07:05:00', 'Hahn', 'Air Europa', 0, 82, 7);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(56, 'Palma de Mallorca', '2002-04-26', '13:00:00', 'Duesseldorf', 'Hapag Lloyd', 0, 82, 8);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(57, 'Palma de Mallorca', '2002-04-26', '11:15:00', 'Hamburg', 'Hapag Lloyd', 0, 82, 9);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(58, 'Palma de Mallorca', '2002-04-27', '18:30:00', 'Muenchen', 'Hapag Lloyd', 0, 82, 10);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(59, 'Palma de Mallorca', '2002-04-27', '12:00:00', 'Hannover', 'Hapag Lloyd', 0, 82, 11);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(60, 'Palma de Mallorca', '2002-04-28', '00:45:00', 'Nuernberg', 'Hapag Lloyd', 0, 82, 12);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(61, 'Palma de Mallorca', '2002-04-29', '22:50:00', 'Hamburg', 'Hapag Lloyd', 0, 82, 13);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(62, 'Palma de Mallorca', '2002-04-25', '12:05:00', 'Frankfurt', 'Hapag Lloyd', 0, 82, 14);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(63, 'Teneriffa', '2002-04-23', '16:00:00', 'Bruessel', 'Sobelair', 0, 82, 15);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(64, 'Antalya', '2002-05-03', '13:40:00', 'Hannover', 'Hapag Lloyd', 0, 82, 16);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(65, 'Palma de Mallorca', '2002-04-25', '12:05:00', 'Frankfurt', 'Hapag Lloyd', 0, 83, 17);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(66, 'Palma de Mallorca', '2002-05-01', '22:05:00', 'Leipzig', 'Germania', 0, 83, 18);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(67, 'Palma de Mallorca', '2002-04-28', '00:40:00', 'Lyon', 'Futura', 0, 84, 19);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(68, 'Palma de Mallorca', '2002-04-27', '21:15:00', 'Berlin-Tegel', 'Germania', 0, 84, 20);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(69, 'Ibiza', '2002-05-07', '11:45:00', 'Muenchen', 'Condor', 0, 84, 21);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(70, 'Palma de Mallorca', '2002-04-29', '22:50:00', 'Hamburg', 'Hapag Lloyd', 0, 85, 22);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(71, 'Malta', '2002-04-27', '15:55:00', 'Basel-Mulhouse', 'Air Malta', 0, 85, 23);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(72, 'Palma de Mallorca', '2002-04-27', '22:10:00', 'Muenchen', 'Condor', 0, 85, 24);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(73, 'Djerba', '2002-04-29', '18:15:00', 'Koeln/Bonn', 'Air Berlin', 0, 85, 25);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(74, 'Djerba', '2002-04-29', '11:15:00', 'Frankfurt', 'Hapag Lloyd', 0, 85, 26);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(75, 'Djerba', '2002-04-29', '10:55:00', 'Leipzig', 'Air Berlin', 0, 85, 27);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(76, 'Djerba', '2002-04-29', '16:05:00', 'Berlin-Tegel', 'Germania', 0, 85, 28);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(77, 'Teneriffa', '2002-04-23', '16:00:00', 'Bruessel', 'Sobelair', 0, 86, 29);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(78, 'Palma de Mallorca', '2002-04-25', '12:05:00', 'Frankfurt', 'Hapag Lloyd', 0, 87, 30);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(79, 'Palma de Mallorca', '2002-04-25', '12:05:00', 'Frankfurt', 'Hapag Lloyd', 0, 87, 31);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(80, 'Palma de Mallorca', '2002-04-27', '21:15:00', 'Berlin-Tegel', 'Germania', 0, 87, 32);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(81, 'Palma de Mallorca', '2002-04-27', '08:55:00', 'Stuttgart', 'Air Europa', 0, 88, 33);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(82, 'Palma de Mallorca', '2002-04-27', '18:30:00', 'Muenchen', 'Hapag Lloyd', 0, 88, 34);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(83, 'Palma de Mallorca', '2002-05-01', '22:05:00', 'Leipzig', 'Germania', 0, 88, 35);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(84, 'Palma de Mallorca', '2002-04-29', '22:50:00', 'Hamburg', 'Hapag Lloyd', 0, 88, 36);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(85, 'Antalya', '2002-05-03', '14:30:00', 'Hamburg', 'LTU', 0, 88, 37);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(86, 'Antalya', '2002-05-03', '13:40:00', 'Hannover', 'Hapag Lloyd', 0, 88, 38);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(87, 'Palma de Mallorca', '2002-05-02', '23:15:00', 'Frankfurt', 'Hapag Lloyd', 0, 89, 39);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(88, 'Teneriffa', '2002-04-23', '16:00:00', 'Bruessel', 'Sobelair', 0, 89, 40);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(89, 'Palma de Mallorca', '2002-05-02', '23:15:00', 'Frankfurt', 'Hapag Lloyd', 0, 89, 41);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(90, 'Teneriffa', '2002-04-23', '16:00:00', 'Bruessel', 'Sobelair', 0, 89, 42);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(91, 'Palma de Mallorca', '2002-05-03', '11:20:00', 'Stuttgart', 'Hapag Lloyd', 0, 90, 43);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(92, 'Palma de Mallorca', '2002-05-03', '12:45:00', 'Nuernberg', 'Hapag Lloyd', 0, 90, 44);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(93, 'Palma de Mallorca', '2002-05-03', '12:45:00', 'Nuernberg', 'Hapag Lloyd', 0, 90, 45);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(94, 'Palma de Mallorca', '2002-05-03', '11:20:00', 'Stuttgart', 'Hapag Lloyd', 0, 90, 46);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(95, 'Palma de Mallorca', '2002-05-03', '11:20:00', 'Stuttgart', 'Hapag Lloyd', 0, 90, 47);
INSERT INTO `flug` (`FlugNr`, `Zielflughafen`, `Datum`, `Uhrzeit`, `Heimatflughafen`, `Fluggesellschaft`, `istHinflug`, `Preis`, `PauschalNr`) VALUES(96, 'Palma de Mallorca', '2002-04-25', '12:05:00', 'Frankfurt', 'Hapag Lloyd', 0, 90, 48);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `hotel`
--

CREATE TABLE IF NOT EXISTS `hotel` (
  `HotelNr` int(11) NOT NULL AUTO_INCREMENT,
  `Zielflughafen` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `von` date DEFAULT NULL,
  `bis` date DEFAULT NULL,
  `Ort` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Hotel` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Zimmerart` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Kategorie` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Preis` double DEFAULT NULL,
  `PauschalNr` int(11) DEFAULT NULL,
  PRIMARY KEY (`HotelNr`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Daten für Tabelle `hotel`
--

INSERT INTO `hotel` (`HotelNr`, `Zielflughafen`, `von`, `bis`, `Ort`, `Hotel`, `Zimmerart`, `Kategorie`, `Preis`, `PauschalNr`) VALUES(1, 'Palma de Mallorca', '2002-04-21', '2002-04-25', 'Can Pastilla', 'Amfora Beach', 'Doppelzimmer', 'einfach', 112, 1);
INSERT INTO `hotel` (`HotelNr`, `Zielflughafen`, `von`, `bis`, `Ort`, `Hotel`, `Zimmerart`, `Kategorie`, `Preis`, `PauschalNr`) VALUES(2, 'Palma de Mallorca', '2002-04-24', '2002-04-27', 'Can Pastilla', 'Amfora Beach', 'Doppelzimmer', 'einfach', 112, 2);
INSERT INTO `hotel` (`HotelNr`, `Zielflughafen`, `von`, `bis`, `Ort`, `Hotel`, `Zimmerart`, `Kategorie`, `Preis`, `PauschalNr`) VALUES(3, 'Palma de Mallorca', '2002-04-26', '2002-04-29', 'Can Pastilla', 'Amfora Beach', 'Doppelzimmer', 'einfach', 112, 3);
INSERT INTO `hotel` (`HotelNr`, `Zielflughafen`, `von`, `bis`, `Ort`, `Hotel`, `Zimmerart`, `Kategorie`, `Preis`, `PauschalNr`) VALUES(4, 'Teneriffa', '2002-04-21', '2002-04-23', 'Puerto de la Cruz', 'Astoria Appartaments', 'Studio', 'mittel', 114, 4);
INSERT INTO `hotel` (`HotelNr`, `Zielflughafen`, `von`, `bis`, `Ort`, `Hotel`, `Zimmerart`, `Kategorie`, `Preis`, `PauschalNr`) VALUES(5, 'Palma de Mallorca', '2002-04-24', '2002-04-27', 'Can Pastilla', 'Amfora Beach', 'Doppelzimmer', 'einfach', 150, 5);
INSERT INTO `hotel` (`HotelNr`, `Zielflughafen`, `von`, `bis`, `Ort`, `Hotel`, `Zimmerart`, `Kategorie`, `Preis`, `PauschalNr`) VALUES(7, 'Palma de Mallorca', '2002-04-19', '2002-04-26', 'Can Pastilla', 'Anfora', 'Doppelzimmer', 'mittel', 150, 7);
INSERT INTO `hotel` (`HotelNr`, `Zielflughafen`, `von`, `bis`, `Ort`, `Hotel`, `Zimmerart`, `Kategorie`, `Preis`, `PauschalNr`) VALUES(8, 'Palma de Mallorca', '2002-04-19', '2002-04-26', 'Can Pastilla', 'Anfora', 'Doppelzimmer', 'mittel', 150, 8);
INSERT INTO `hotel` (`HotelNr`, `Zielflughafen`, `von`, `bis`, `Ort`, `Hotel`, `Zimmerart`, `Kategorie`, `Preis`, `PauschalNr`) VALUES(9, 'Palma de Mallorca', '2002-04-19', '2002-04-26', 'Can Pastilla', 'Anfora', 'Doppelzimmer', 'mittel', 150, 9);
INSERT INTO `hotel` (`HotelNr`, `Zielflughafen`, `von`, `bis`, `Ort`, `Hotel`, `Zimmerart`, `Kategorie`, `Preis`, `PauschalNr`) VALUES(10, 'Palma de Mallorca', '2002-04-20', '2002-04-27', 'Can Pastilla', 'Anfora', 'Doppelzimmer', 'mittel', 150, 10);
INSERT INTO `hotel` (`HotelNr`, `Zielflughafen`, `von`, `bis`, `Ort`, `Hotel`, `Zimmerart`, `Kategorie`, `Preis`, `PauschalNr`) VALUES(11, 'Palma de Mallorca', '2002-04-20', '2002-04-27', 'Can Pastilla', 'Anfora', 'Doppelzimmer', 'mittel', 150, 11);
INSERT INTO `hotel` (`HotelNr`, `Zielflughafen`, `von`, `bis`, `Ort`, `Hotel`, `Zimmerart`, `Kategorie`, `Preis`, `PauschalNr`) VALUES(12, 'Palma de Mallorca', '2002-04-20', '2002-04-28', 'Can Pastilla', 'Anfora', 'Doppelzimmer', 'mittel', 150, 12);
INSERT INTO `hotel` (`HotelNr`, `Zielflughafen`, `von`, `bis`, `Ort`, `Hotel`, `Zimmerart`, `Kategorie`, `Preis`, `PauschalNr`) VALUES(13, 'Palma de Mallorca', '2002-04-26', '2002-04-29', 'Can Pastilla', 'Amfora Beach', 'Doppelzimmer', 'einfach', 117, 13);
INSERT INTO `hotel` (`HotelNr`, `Zielflughafen`, `von`, `bis`, `Ort`, `Hotel`, `Zimmerart`, `Kategorie`, `Preis`, `PauschalNr`) VALUES(14, 'Palma de Mallorca', '2002-04-21', '2002-04-25', 'Can Pastilla', 'Amfora Beach', 'Doppelzimmer', 'einfach', 118, 14);
INSERT INTO `hotel` (`HotelNr`, `Zielflughafen`, `von`, `bis`, `Ort`, `Hotel`, `Zimmerart`, `Kategorie`, `Preis`, `PauschalNr`) VALUES(15, 'Teneriffa', '2002-04-21', '2002-04-23', 'Fanabe', 'Jacaranda', 'Doppelzimmer', 'gehoben', 118, 15);
INSERT INTO `hotel` (`HotelNr`, `Zielflughafen`, `von`, `bis`, `Ort`, `Hotel`, `Zimmerart`, `Kategorie`, `Preis`, `PauschalNr`) VALUES(17, 'Palma de Mallorca', '2002-04-20', '2002-04-25', 'Can Pastilla', 'Amfora Beach', 'Doppelzimmer', 'einfach', 118, 17);
INSERT INTO `hotel` (`HotelNr`, `Zielflughafen`, `von`, `bis`, `Ort`, `Hotel`, `Zimmerart`, `Kategorie`, `Preis`, `PauschalNr`) VALUES(18, 'Palma de Mallorca', '2002-04-26', '2002-05-01', 'Can Pastilla', 'Amfora Beach', 'Doppelzimmer', 'einfach', 119, 18);
INSERT INTO `hotel` (`HotelNr`, `Zielflughafen`, `von`, `bis`, `Ort`, `Hotel`, `Zimmerart`, `Kategorie`, `Preis`, `PauschalNr`) VALUES(19, 'Palma de Mallorca', '2002-04-21', '2002-04-28', 'Can Pastilla', 'Amfora Beach', 'Doppelzimmer', 'einfach', 120, 19);
INSERT INTO `hotel` (`HotelNr`, `Zielflughafen`, `von`, `bis`, `Ort`, `Hotel`, `Zimmerart`, `Kategorie`, `Preis`, `PauschalNr`) VALUES(20, 'Palma de Mallorca', '2002-04-24', '2002-04-27', 'Can Pastilla', 'Amfora Beach', 'Einzelzimmer', 'einfach', 120, 20);
INSERT INTO `hotel` (`HotelNr`, `Zielflughafen`, `von`, `bis`, `Ort`, `Hotel`, `Zimmerart`, `Kategorie`, `Preis`, `PauschalNr`) VALUES(21, 'Ibiza', '2002-04-30', '2002-05-07', 'Figueretas - Ibiza', 'Playa Sol Complex', 'Studio', 'einfach', 120, 21);
INSERT INTO `hotel` (`HotelNr`, `Zielflughafen`, `von`, `bis`, `Ort`, `Hotel`, `Zimmerart`, `Kategorie`, `Preis`, `PauschalNr`) VALUES(22, 'Palma de Mallorca', '2002-04-26', '2002-04-29', 'Can Pastilla', 'Amfora Beach', 'Einzelzimmer', 'einfach', 121, 22);
INSERT INTO `hotel` (`HotelNr`, `Zielflughafen`, `von`, `bis`, `Ort`, `Hotel`, `Zimmerart`, `Kategorie`, `Preis`, `PauschalNr`) VALUES(23, 'Malta', '2002-04-20', '2002-04-27', 'St. Julians', 'Miramare', 'Doppelzimmer', 'einfach', 122, 23);
INSERT INTO `hotel` (`HotelNr`, `Zielflughafen`, `von`, `bis`, `Ort`, `Hotel`, `Zimmerart`, `Kategorie`, `Preis`, `PauschalNr`) VALUES(24, 'Palma de Mallorca', '2002-04-22', '2002-04-27', 'Can Pastilla', 'Amfora Beach', 'Doppelzimmer', 'einfach', 122, 24);
INSERT INTO `hotel` (`HotelNr`, `Zielflughafen`, `von`, `bis`, `Ort`, `Hotel`, `Zimmerart`, `Kategorie`, `Preis`, `PauschalNr`) VALUES(25, 'Djerba', '2002-04-22', '2002-04-29', 'Oase Zarzis', 'Giktis', 'Doppelzimmer', 'mittel', 122, 25);
INSERT INTO `hotel` (`HotelNr`, `Zielflughafen`, `von`, `bis`, `Ort`, `Hotel`, `Zimmerart`, `Kategorie`, `Preis`, `PauschalNr`) VALUES(26, 'Djerba', '2002-04-22', '2002-04-29', 'Oase Zarzis', 'Giktis', 'Doppelzimmer', 'mittel', 122, 26);
INSERT INTO `hotel` (`HotelNr`, `Zielflughafen`, `von`, `bis`, `Ort`, `Hotel`, `Zimmerart`, `Kategorie`, `Preis`, `PauschalNr`) VALUES(27, 'Djerba', '2002-04-22', '2002-04-29', 'Oase Zarzis', 'Giktis', 'Doppelzimmer', 'mittel', 122, 27);
INSERT INTO `hotel` (`HotelNr`, `Zielflughafen`, `von`, `bis`, `Ort`, `Hotel`, `Zimmerart`, `Kategorie`, `Preis`, `PauschalNr`) VALUES(28, 'Djerba', '2002-04-22', '2002-04-29', 'Oase Zarzis', 'Giktis', 'Doppelzimmer', 'mittel', 122, 28);
INSERT INTO `hotel` (`HotelNr`, `Zielflughafen`, `von`, `bis`, `Ort`, `Hotel`, `Zimmerart`, `Kategorie`, `Preis`, `PauschalNr`) VALUES(29, 'Teneriffa', '2002-04-21', '2002-04-23', 'Puerto de la Cruz', 'Miramar', 'Doppelzimmer', 'mittel', 122, 29);
INSERT INTO `hotel` (`HotelNr`, `Zielflughafen`, `von`, `bis`, `Ort`, `Hotel`, `Zimmerart`, `Kategorie`, `Preis`, `PauschalNr`) VALUES(30, 'Palma de Mallorca', '2002-04-20', '2002-04-25', 'Can Pastilla', 'Amfora Beach', 'Doppelzimmer', 'einfach', 124, 30);
INSERT INTO `hotel` (`HotelNr`, `Zielflughafen`, `von`, `bis`, `Ort`, `Hotel`, `Zimmerart`, `Kategorie`, `Preis`, `PauschalNr`) VALUES(31, 'Palma de Mallorca', '2002-04-21', '2002-04-25', 'Can Pastilla', 'Amfora Beach', 'Einzelzimmer', 'einfach', 124, 31);
INSERT INTO `hotel` (`HotelNr`, `Zielflughafen`, `von`, `bis`, `Ort`, `Hotel`, `Zimmerart`, `Kategorie`, `Preis`, `PauschalNr`) VALUES(32, 'Palma de Mallorca', '2002-04-24', '2002-04-27', 'Can Pastilla', 'Amfora Beach', 'Einzelzimmer', 'einfach', 124, 32);
INSERT INTO `hotel` (`HotelNr`, `Zielflughafen`, `von`, `bis`, `Ort`, `Hotel`, `Zimmerart`, `Kategorie`, `Preis`, `PauschalNr`) VALUES(33, 'Palma de Mallorca', '2002-04-21', '2002-04-27', 'Can Pastilla', 'Amfora Beach', 'Doppelzimmer', 'einfach', 126, 33);
INSERT INTO `hotel` (`HotelNr`, `Zielflughafen`, `von`, `bis`, `Ort`, `Hotel`, `Zimmerart`, `Kategorie`, `Preis`, `PauschalNr`) VALUES(34, 'Palma de Mallorca', '2002-04-21', '2002-04-27', 'Can Pastilla', 'Amfora Beach', 'Doppelzimmer', 'einfach', 126, 34);
INSERT INTO `hotel` (`HotelNr`, `Zielflughafen`, `von`, `bis`, `Ort`, `Hotel`, `Zimmerart`, `Kategorie`, `Preis`, `PauschalNr`) VALUES(35, 'Palma de Mallorca', '2002-04-26', '2002-05-01', 'Can Pastilla', 'Amfora Beach', 'Doppelzimmer', 'einfach', 126, 35);
INSERT INTO `hotel` (`HotelNr`, `Zielflughafen`, `von`, `bis`, `Ort`, `Hotel`, `Zimmerart`, `Kategorie`, `Preis`, `PauschalNr`) VALUES(36, 'Palma de Mallorca', '2002-04-26', '2002-04-29', 'Can Pastilla', 'Amfora Beach', 'Einzelzimmer', 'einfach', 126, 36);
INSERT INTO `hotel` (`HotelNr`, `Zielflughafen`, `von`, `bis`, `Ort`, `Hotel`, `Zimmerart`, `Kategorie`, `Preis`, `PauschalNr`) VALUES(38, 'Antalya', '2002-04-30', '2002-05-03', 'Side-Titreyengoel', 'Venues', 'Doppelzimmer', 'mittel', 126, 38);
INSERT INTO `hotel` (`HotelNr`, `Zielflughafen`, `von`, `bis`, `Ort`, `Hotel`, `Zimmerart`, `Kategorie`, `Preis`, `PauschalNr`) VALUES(39, 'Palma de Mallorca', '2002-04-27', '2002-05-02', 'Cala Ratjada', 'Hostal Jumar', 'Doppelzimmer', 'einfach', 126, 39);
INSERT INTO `hotel` (`HotelNr`, `Zielflughafen`, `von`, `bis`, `Ort`, `Hotel`, `Zimmerart`, `Kategorie`, `Preis`, `PauschalNr`) VALUES(40, 'Teneriffa', '2002-04-21', '2002-04-23', 'El Medano', 'Marazul', 'Appartment', 'einfach', 127, 40);
INSERT INTO `hotel` (`HotelNr`, `Zielflughafen`, `von`, `bis`, `Ort`, `Hotel`, `Zimmerart`, `Kategorie`, `Preis`, `PauschalNr`) VALUES(41, 'Palma de Mallorca', '2002-04-27', '2002-05-02', 'Can Pastilla', 'Amfora Beach', 'Doppelzimmer', 'einfach', 127, 41);
INSERT INTO `hotel` (`HotelNr`, `Zielflughafen`, `von`, `bis`, `Ort`, `Hotel`, `Zimmerart`, `Kategorie`, `Preis`, `PauschalNr`) VALUES(42, 'Teneriffa', '2002-04-21', '2002-04-23', 'Playa de las Americas', 'Occidental La Siesta', 'Doppelzimmer', 'gehoben', 128, 42);
INSERT INTO `hotel` (`HotelNr`, `Zielflughafen`, `von`, `bis`, `Ort`, `Hotel`, `Zimmerart`, `Kategorie`, `Preis`, `PauschalNr`) VALUES(43, 'Palma de Mallorca', '2002-04-27', '2002-05-03', 'Can Pastilla', 'Amfora Beach', 'Doppelzimmer', 'einfach', 128, 43);
INSERT INTO `hotel` (`HotelNr`, `Zielflughafen`, `von`, `bis`, `Ort`, `Hotel`, `Zimmerart`, `Kategorie`, `Preis`, `PauschalNr`) VALUES(44, 'Palma de Mallorca', '2002-04-28', '2002-05-03', 'Can Pastilla', 'Amfora Beach', 'Doppelzimmer', 'einfach', 128, 44);
INSERT INTO `hotel` (`HotelNr`, `Zielflughafen`, `von`, `bis`, `Ort`, `Hotel`, `Zimmerart`, `Kategorie`, `Preis`, `PauschalNr`) VALUES(45, 'Palma de Mallorca', '2002-04-28', '2002-05-03', 'Cala Ratjada', 'Hostal Jumar', 'Doppelzimmer', 'einfach', 128, 45);
INSERT INTO `hotel` (`HotelNr`, `Zielflughafen`, `von`, `bis`, `Ort`, `Hotel`, `Zimmerart`, `Kategorie`, `Preis`, `PauschalNr`) VALUES(46, 'Palma de Mallorca', '2002-04-28', '2002-05-03', 'Can Pastilla', 'Amfora Beach', 'Doppelzimmer', 'einfach', 128, 46);
INSERT INTO `hotel` (`HotelNr`, `Zielflughafen`, `von`, `bis`, `Ort`, `Hotel`, `Zimmerart`, `Kategorie`, `Preis`, `PauschalNr`) VALUES(47, 'Palma de Mallorca', '2002-04-28', '2002-05-03', 'Cala Ratjada', 'Hostal Jumar', 'Doppelzimmer', 'einfach', 128, 47);
INSERT INTO `hotel` (`HotelNr`, `Zielflughafen`, `von`, `bis`, `Ort`, `Hotel`, `Zimmerart`, `Kategorie`, `Preis`, `PauschalNr`) VALUES(48, 'Palma de Mallorca', '2002-04-21', '2002-04-25', 'Can Pastilla', 'Amfora Beach', 'Einzelzimmer', 'einfach', 128, 48);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kunde`
--

CREATE TABLE IF NOT EXISTS `kunde` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `Anrede` varchar(10) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `Name` varchar(30) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `Vorname` varchar(30) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `Strasse` varchar(40) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `PLZ` int(6) NOT NULL DEFAULT '0',
  `TelPrivat` varchar(30) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `TelBuero` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `Fax` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `eMail` varchar(30) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `Pauschalnummer` int(3) NOT NULL DEFAULT '0',
  `Reiseart` varchar(10) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Daten für Tabelle `kunde`
--

INSERT INTO `kunde` (`id`, `Anrede`, `Name`, `Vorname`, `Strasse`, `PLZ`, `TelPrivat`, `TelBuero`, `Fax`, `eMail`, `Pauschalnummer`, `Reiseart`) VALUES(1, 'Herr', 'asfxy', 'asdfa', 'asdf', 345, '3535', '', '', 'a@b.de', 25, 'flug');
INSERT INTO `kunde` (`id`, `Anrede`, `Name`, `Vorname`, `Strasse`, `PLZ`, `TelPrivat`, `TelBuero`, `Fax`, `eMail`, `Pauschalnummer`, `Reiseart`) VALUES(2, 'Frau', 'xy', '', '', 0, '', '', '', '', 0, '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pauschalangebot`
--

CREATE TABLE IF NOT EXISTS `pauschalangebot` (
  `PauschalNr` int(11) NOT NULL DEFAULT '0',
  `Preis` double DEFAULT NULL,
  PRIMARY KEY (`PauschalNr`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Daten für Tabelle `pauschalangebot`
--

INSERT INTO `pauschalangebot` (`PauschalNr`, `Preis`) VALUES(1, 225);
INSERT INTO `pauschalangebot` (`PauschalNr`, `Preis`) VALUES(2, 225);
INSERT INTO `pauschalangebot` (`PauschalNr`, `Preis`) VALUES(3, 225);
INSERT INTO `pauschalangebot` (`PauschalNr`, `Preis`) VALUES(4, 229);
INSERT INTO `pauschalangebot` (`PauschalNr`, `Preis`) VALUES(5, 232);
INSERT INTO `pauschalangebot` (`PauschalNr`, `Preis`) VALUES(6, 232);
INSERT INTO `pauschalangebot` (`PauschalNr`, `Preis`) VALUES(7, 233);
INSERT INTO `pauschalangebot` (`PauschalNr`, `Preis`) VALUES(8, 233);
INSERT INTO `pauschalangebot` (`PauschalNr`, `Preis`) VALUES(9, 233);
INSERT INTO `pauschalangebot` (`PauschalNr`, `Preis`) VALUES(10, 233);
INSERT INTO `pauschalangebot` (`PauschalNr`, `Preis`) VALUES(11, 233);
INSERT INTO `pauschalangebot` (`PauschalNr`, `Preis`) VALUES(12, 233);
INSERT INTO `pauschalangebot` (`PauschalNr`, `Preis`) VALUES(13, 234);
INSERT INTO `pauschalangebot` (`PauschalNr`, `Preis`) VALUES(14, 235);
INSERT INTO `pauschalangebot` (`PauschalNr`, `Preis`) VALUES(15, 235);
INSERT INTO `pauschalangebot` (`PauschalNr`, `Preis`) VALUES(16, 235);
INSERT INTO `pauschalangebot` (`PauschalNr`, `Preis`) VALUES(17, 236);
INSERT INTO `pauschalangebot` (`PauschalNr`, `Preis`) VALUES(18, 238);
INSERT INTO `pauschalangebot` (`PauschalNr`, `Preis`) VALUES(19, 239);
INSERT INTO `pauschalangebot` (`PauschalNr`, `Preis`) VALUES(20, 239);
INSERT INTO `pauschalangebot` (`PauschalNr`, `Preis`) VALUES(21, 239);
INSERT INTO `pauschalangebot` (`PauschalNr`, `Preis`) VALUES(22, 242);
INSERT INTO `pauschalangebot` (`PauschalNr`, `Preis`) VALUES(23, 243);
INSERT INTO `pauschalangebot` (`PauschalNr`, `Preis`) VALUES(24, 243);
INSERT INTO `pauschalangebot` (`PauschalNr`, `Preis`) VALUES(25, 244);
INSERT INTO `pauschalangebot` (`PauschalNr`, `Preis`) VALUES(26, 244);
INSERT INTO `pauschalangebot` (`PauschalNr`, `Preis`) VALUES(27, 244);
INSERT INTO `pauschalangebot` (`PauschalNr`, `Preis`) VALUES(28, 244);
INSERT INTO `pauschalangebot` (`PauschalNr`, `Preis`) VALUES(29, 245);
INSERT INTO `pauschalangebot` (`PauschalNr`, `Preis`) VALUES(30, 249);
INSERT INTO `pauschalangebot` (`PauschalNr`, `Preis`) VALUES(31, 249);
INSERT INTO `pauschalangebot` (`PauschalNr`, `Preis`) VALUES(32, 249);
INSERT INTO `pauschalangebot` (`PauschalNr`, `Preis`) VALUES(33, 252);
INSERT INTO `pauschalangebot` (`PauschalNr`, `Preis`) VALUES(34, 252);
INSERT INTO `pauschalangebot` (`PauschalNr`, `Preis`) VALUES(35, 252);
INSERT INTO `pauschalangebot` (`PauschalNr`, `Preis`) VALUES(36, 252);
INSERT INTO `pauschalangebot` (`PauschalNr`, `Preis`) VALUES(37, 252);
INSERT INTO `pauschalangebot` (`PauschalNr`, `Preis`) VALUES(38, 252);
INSERT INTO `pauschalangebot` (`PauschalNr`, `Preis`) VALUES(39, 253);
INSERT INTO `pauschalangebot` (`PauschalNr`, `Preis`) VALUES(40, 254);
INSERT INTO `pauschalangebot` (`PauschalNr`, `Preis`) VALUES(41, 254);
INSERT INTO `pauschalangebot` (`PauschalNr`, `Preis`) VALUES(42, 255);
INSERT INTO `pauschalangebot` (`PauschalNr`, `Preis`) VALUES(43, 256);
INSERT INTO `pauschalangebot` (`PauschalNr`, `Preis`) VALUES(44, 256);
INSERT INTO `pauschalangebot` (`PauschalNr`, `Preis`) VALUES(45, 256);
INSERT INTO `pauschalangebot` (`PauschalNr`, `Preis`) VALUES(46, 256);
INSERT INTO `pauschalangebot` (`PauschalNr`, `Preis`) VALUES(47, 256);
INSERT INTO `pauschalangebot` (`PauschalNr`, `Preis`) VALUES(48, 257);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `zielflughafen`
--

CREATE TABLE IF NOT EXISTS `zielflughafen` (
  `Zielflughafen` varchar(30) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `Land` varchar(30) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`Zielflughafen`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `zielflughafen`
--

INSERT INTO `zielflughafen` (`Zielflughafen`, `Land`) VALUES('München', 'Deutschland');
INSERT INTO `zielflughafen` (`Zielflughafen`, `Land`) VALUES('Frankfurt', 'Deutschland');
INSERT INTO `zielflughafen` (`Zielflughafen`, `Land`) VALUES('Barcelona', 'Spanien');
INSERT INTO `zielflughafen` (`Zielflughafen`, `Land`) VALUES('Fuerteventura', 'Spanien');
INSERT INTO `zielflughafen` (`Zielflughafen`, `Land`) VALUES('Paris', 'Frankreich');
INSERT INTO `zielflughafen` (`Zielflughafen`, `Land`) VALUES('Delhi', 'Indien');
INSERT INTO `zielflughafen` (`Zielflughafen`, `Land`) VALUES('Berlin', 'Deutschland');
INSERT INTO `zielflughafen` (`Zielflughafen`, `Land`) VALUES('Chennai', 'Indien');
INSERT INTO `zielflughafen` (`Zielflughafen`, `Land`) VALUES('Montpelliér', 'Frankreich');
INSERT INTO `zielflughafen` (`Zielflughafen`, `Land`) VALUES('Hannover', 'Deutschland');
INSERT INTO `zielflughafen` (`Zielflughafen`, `Land`) VALUES('Madrid', 'Spanien');
INSERT INTO `zielflughafen` (`Zielflughafen`, `Land`) VALUES('Lyon', 'Frankreich');
INSERT INTO `zielflughafen` (`Zielflughafen`, `Land`) VALUES('Rom', 'Italien');
INSERT INTO `zielflughafen` (`Zielflughafen`, `Land`) VALUES('Berlin_Tegel', 'Deutschland');
INSERT INTO `zielflughafen` (`Zielflughafen`, `Land`) VALUES('Frankfurt-Hahn', 'Deutschland');
INSERT INTO `zielflughafen` (`Zielflughafen`, `Land`) VALUES('Stuttgart', 'Deutschland');
INSERT INTO `zielflughafen` (`Zielflughafen`, `Land`) VALUES('Mailand', 'Italien');
INSERT INTO `zielflughafen` (`Zielflughafen`, `Land`) VALUES('Nürnberg', 'Deutschland');
INSERT INTO `zielflughafen` (`Zielflughafen`, `Land`) VALUES('Dalaiman', 'Türkei');
INSERT INTO `zielflughafen` (`Zielflughafen`, `Land`) VALUES('Antalya', 'Türkei');
INSERT INTO `zielflughafen` (`Zielflughafen`, `Land`) VALUES('Toronto', 'Kanada');
INSERT INTO `zielflughafen` (`Zielflughafen`, `Land`) VALUES('Orlando', 'USA');
INSERT INTO `zielflughafen` (`Zielflughafen`, `Land`) VALUES('Detroit', 'USA');
INSERT INTO `zielflughafen` (`Zielflughafen`, `Land`) VALUES('Bangkok', 'Thailand');
INSERT INTO `zielflughafen` (`Zielflughafen`, `Land`) VALUES('Washington DC', 'USA');
INSERT INTO `zielflughafen` (`Zielflughafen`, `Land`) VALUES('New York', 'USA');
INSERT INTO `zielflughafen` (`Zielflughafen`, `Land`) VALUES('Manchester', 'UK');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
