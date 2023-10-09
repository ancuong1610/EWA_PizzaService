-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: mariadb:3306
-- Erstellungszeit: 31. Jan 2023 um 10:19
-- Server-Version: 10.7.3-MariaDB-1:10.7.3+maria~focal
-- PHP-Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `HDA_Chatbot`
--
CREATE DATABASE IF NOT EXISTS `HDA_Chatbot` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `HDA_Chatbot`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `interaction`
--

CREATE TABLE `interaction` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `interaction`
--

INSERT INTO `interaction` (`id`, `question`, `answer`) VALUES
(1, 'Wer bist du?', 'Ich bin HDA_Chatbot!'),
(2, 'Wie alt bist du?', 'Ich bin noch gar nicht geboren!'),
(3, 'Was ist dein Lieblingsessen?', 'Alles was der Infotreff anzubieten hat!'),
(4, 'Was ist dein Lieblingsfach?', 'EWA!'),
(5, 'Was ist deine Meinung zu Informatik?', 'Informatik ist super!');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `interaction`
--
ALTER TABLE `interaction`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `interaction`
--
ALTER TABLE `interaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
