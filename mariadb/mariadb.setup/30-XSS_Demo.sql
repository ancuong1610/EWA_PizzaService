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
-- Datenbank: `XSS_Demo`
-- UTF8 Header äüöüßßßäü


CREATE DATABASE IF NOT EXISTS `XSS_Demo`
CHARACTER SET utf8
COLLATE utf8_unicode_ci;

USE `XSS_Demo`;


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

CREATE TABLE `attack` (
  `NameUnmodified` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `NameHTMLSpecialChar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `AddressUnmodified` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

