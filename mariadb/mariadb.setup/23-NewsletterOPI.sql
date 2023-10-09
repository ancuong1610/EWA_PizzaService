-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mariadb:3306
-- Erstellungszeit: 27. Jun 2023 um 19:28
-- Server-Version: 10.11.3-MariaDB-1:10.11.3+maria~ubu2204
-- PHP-Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `2023_NewsletterOPI`
--
CREATE DATABASE IF NOT EXISTS `2023_NewsletterOPI` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `2023_NewsletterOPI`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `anmeldung`
--

DROP TABLE IF EXISTS `anmeldung`;
CREATE TABLE IF NOT EXISTS `anmeldung` (
  `anmeldungs_id` int(11) NOT NULL,
  `kunden_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kunden_email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `anmeldung`
--

INSERT INTO `anmeldung` (`anmeldungs_id`, `kunden_name`, `kunden_email`) VALUES
(1, 'Eva Musterfrau', 'ewa@fbi.h-da.de');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `anmeldung`
--
ALTER TABLE `anmeldung`
  ADD PRIMARY KEY (`anmeldungs_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `anmeldung`
--
ALTER TABLE `anmeldung`
  MODIFY `anmeldungs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
