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
--
--
CREATE DATABASE IF NOT EXISTS `2021_FastLink`
DEFAULT CHARACTER SET utf8
COLLATE utf8_unicode_ci;

USE `2021_FastLink`;

-- Tabellenstruktur für Tabelle `news`
--


CREATE TABLE IF NOT EXISTS `hash2URL` (
  `id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `url` varchar(1024) NOT NULL,
  `hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `hash2URL`
--

INSERT INTO `hash2URL` (`id`, `url`, `hash`) VALUES
(1, 'https://www.google.de/', '95bd18d9');

--
-- Indizes der exportierten Tabellen
--

--
ALTER TABLE `hash2URL`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `hash2URL`
--
ALTER TABLE `hash2URL`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
