-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: mariadb:3306
-- Erstellungszeit: 02. Jul 2020 um 14:41
-- Server-Version: 10.4.12-MariaDB-1:10.4.12+maria~bionic
-- PHP-Version: 7.4.1
-- UTF8 Header äüöüßßßäü

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";
SET NAMES utf8mb4;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `newsfeed`
--
--
CREATE DATABASE IF NOT EXISTS `2020_News`
DEFAULT CHARACTER SET utf8
COLLATE utf8_unicode_ci;

USE `2020_News`;

-- Tabellenstruktur für Tabelle `news`
--


CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `title` varchar(255) NOT NULL,
  `text` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `news`
--

INSERT INTO `news` (`id`, `timestamp`, `title`, `text`) VALUES
(1, '2020-07-03 09:05:38', 'Ist das <script>-Tag böse?', 'Am 13.07.2020 berichtet Prof. Dr. E. Wa über die Vor- und Nachteile der JavaScript-Tags in HTML'),
(2, '2020-07-05 09:09:05', 'Hochschulpakt unterzeichnet: h_da erwartet positiven Effekt auf Forschung und Lehre', 'Der hessische Hochschulpakt für die Jahre 2021 bis 2025 ist unterschrieben. Darin haben die Landesregierung und die Hochschulen die Rahmenbedingungen für die Hochschulentwicklung in den kommenden fünf Jahren vereinbart. Erstmals erhalten die Hochschulen für Angewandte Wissenschaften (HAWs) und somit auch die Hochschule Darmstadt (h_da) reguläre Haushaltsmittel für den Aufbau eines akademischen Mittelbaus. '),
(3, '2020-07-07 09:10:13', 'Campus Haardtring: Studierende und Beschäftigte setzen sich für mehr Verkehrssicherheit ein', 'Viele Studierende und Beschäftigte am Campus Haardtring erreichen die dortigen Gebäude über die Haltestelle „Hochschule West“. Doch Richtung Süden müssen sie den vierspurigen Haardtring überqueren, um zur Haltestelle zu laufen. Allerdings gibt es hier keine Fußgängerüberquerung. Um auf diese Gefahrenquelle aufmerksam zu machen und eine Lösung einzufordern, haben Mitglieder des Fachbereichs Bauingenieurwesen in Kooperation mit der h_da-Mobilitätskommission 1.000 Unterschriften gesammelt. Diese wurden nun dem städtischen Mobilitätsamt übergeben. Das möchte jetzt schnell reagieren.'),
(4, '2020-07-13 09:12:19', 'Solidarität statt Rendite? – Mit ihrem 1. Dialog-Forum trifft die h_da einen Nerv', 'Mit ihrem 1. Dialog-Forum trifft die h_da einen Nerv: Rund 300 Bürgerinnen und Bürger verfolgen die Podiumsdiskussion über das Verhältnis von Gemeinwohl-Ökonomie und Wirtschaftswachstum');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
