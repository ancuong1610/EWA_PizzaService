-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 13. Dec 2020 um 14:05
-- Server-Version: 10.4.11-MariaDB

-- PHP-Version: 7.4.2

-- /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
-- /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
-- /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
-- /*!40101 SET NAMES utf8mb4 */;

-- 
-- Datenbank: `pizzaservice`
-- UTF8 Header äüöüßßßäü


CREATE DATABASE IF NOT EXISTS `pizzaservice`
CHARACTER SET utf8
COLLATE utf8_unicode_ci;

USE pizzaservice;


SET NAMES utf8mb4;

-- ----------------------------------------------------------------

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";
-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `article`
--

CREATE TABLE `article` (
  `article_id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(254) COLLATE utf8_unicode_ci NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ordering`
--

CREATE TABLE `ordering` (
  `ordering_id` int(11) NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ordering_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ordered_articles`
--

CREATE TABLE `ordered_article` (
  `ordered_article_id` int(11) NOT NULL,
  `ordering_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`article_id`);

--
-- Indizes für die Tabelle `ordering`
--
ALTER TABLE `ordering`
  ADD PRIMARY KEY (`ordering_id`);

--
-- Indizes für die Tabelle `ordered_articles`
--
ALTER TABLE `ordered_article`
  ADD PRIMARY KEY (`ordered_article_id`),
  ADD KEY `index_article` (`article_id`) USING BTREE,
  ADD KEY `index_ordering` (`ordering_id`) USING BTREE;

--
-- AUTO_INCREMENT für Tabelle `article`
--
ALTER TABLE `article`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `ordering`
--
ALTER TABLE `ordering`
  MODIFY `ordering_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT für Tabelle `ordered_articles`
--
ALTER TABLE `ordered_article`
  MODIFY `ordered_article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `ordered_articles`
--
ALTER TABLE `ordered_article`
  ADD CONSTRAINT `ordered_article_ibfk_1` FOREIGN KEY (`ordering_id`) REFERENCES `ordering` (`ordering_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ordered_article_ibfk_2` FOREIGN KEY (`article_id`) REFERENCES `article` (`article_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

-- /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
-- /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
-- /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
