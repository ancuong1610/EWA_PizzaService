-- vorgegebene Datenbank MEISTER
-- modifiziert B.K.

-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 28, 2019 at 03:14 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `MEISTER`
DEFAULT CHARACTER SET utf8
COLLATE utf8_unicode_ci;
USE MEISTER;

CREATE TABLE IF NOT EXISTS `fragen` (
   `id` int(11) NOT NULL,
   `frage` varchar(50) NOT NULL,
   `antwort1` varchar(50) NOT NULL,
   `antwort2` varchar(50) NOT NULL,
   `antwort3` varchar(50) NOT NULL,
   `richtig` enum('1', '2', '3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `spiele` (
   `id` int(11) NOT NULL,
   `name` varchar(50) NOT NULL,
   `antworten` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `spiele` (`id`, `name`, `antworten`) VALUES
(1, 'Ralf', 3),
(2, 'John Doe', 1),
(3, 'Hurz', 23);

INSERT INTO `fragen` (`id`, `frage`, `antwort1`, `antwort2`, `antwort3`, `richtig`) VALUES 
(1, 'Wie viele Einwohner hat Darmstadt (Stand 2017)?', '155.000', '205.000', '75.000', '1'), 
(2, 'Was bedeutet das html-Tag <td>?', 'test data', 'test dummy', 'table data', '3'), 
(3, 'Wie viele Einwohner hat Mainz (Stand 2017)?', '155.000', '210.000', '295.000', '2'); 

-- Indizes für die Tabelle `fragen`
--
ALTER TABLE `fragen`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `fragen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `spiele`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `spiele`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;
