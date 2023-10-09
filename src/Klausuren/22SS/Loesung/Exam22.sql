-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: mariadb:3306
-- Erstellungszeit: 16. Mai 2022 um 14:18
-- Server-Version: 10.5.10-MariaDB-1:10.5.10+maria~focal
-- PHP-Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `2022_Easy2Read`
--
CREATE DATABASE IF NOT EXISTS `2022_Easy2Read` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `2022_Easy2Read`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Dictionary`
--

DROP TABLE IF EXISTS `Dictionary`;
CREATE TABLE IF NOT EXISTS `Dictionary` (
  `id` int(11) NOT NULL,
  `word` varchar(100) NOT NULL,
  `explanation` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `Dictionary`
--

INSERT INTO `Dictionary` (`id`, `word`, `explanation`) VALUES
(1, 'Behörde', 'Eine Behörde ist eine Art Organisation. Man sagt oft Amt dazu. Zum Beispiel das Sozial amt.Zum Beispiel das Bürger·amt. Die Aufgaben der Behörde sind für die Bürger. Oder die Aufgaben sind für den Staat, das Land, für die Stadt oder für Gemeinden.'),
(2, 'Origami', 'Origami ist Papier falten. Aus Papier werden Formen gefaltet. Zum Beispiel ein Tier.'),
(3, 'html', 'HTML ist eine Auszeichnungssprache. Darin werden Texte und deren Bedeutung mit HTML-Tags markiert z.B. <article> oder <header>');

-- --------------------------------------------------------

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `Dictionary`
--
ALTER TABLE `Dictionary`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
