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
-- Datenbank: `SQL_Injection`
-- UTF8 Header äüöüßßßäü


CREATE DATABASE IF NOT EXISTS `SQL_Injection`
CHARACTER SET utf8
COLLATE utf8_unicode_ci;

USE `SQL_Injection`;


SET NAMES utf8mb4;

-- ----------------------------------------------------------------

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";
-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(11) NOT NULL,
  `Email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `SecretPassword` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `SecretData` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `accounts` (`id`, `Email`, `SecretPassword`, `SecretData`) VALUES
(1, 'hans.mustermann@mail.com', '123', 'GanzGeheim'),
(2, 'JohnDoe@yahoo.com', 'abc', 'Top Secret'),
(3, 'Hurz@kerkeling.de', 'quertz', 'Das Lamm...');

ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `accounts`  
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;


CREATE TABLE IF NOT EXISTS `attack` (
  `EscapedEmail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `EscapedPassword` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

