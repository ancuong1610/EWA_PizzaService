-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 02. Jul 2018 um 19:50
-- Server Version: 5.6.16
-- PHP-Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `postershop`
--
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

CREATE DATABASE postershop
DEFAULT CHARACTER SET utf8
COLLATE utf8_unicode_ci;

USE postershop;
-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bestellung`
--

CREATE TABLE IF NOT EXISTS `bestellung` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kunde` int(11) NOT NULL,
  `datei` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `poster`
--

CREATE TABLE IF NOT EXISTS `poster` (
  `datei` varchar(50) NOT NULL,
  PRIMARY KEY (`datei`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `poster`
--

INSERT INTO `poster` (`datei`) VALUES
('Poster1.jpg'),
('Poster2.jpg'),
('Poster3.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
