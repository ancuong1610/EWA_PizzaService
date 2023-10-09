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

SET NAMES utf8mb4;

USE pizzaservice;

-- ----------------------------------------------------------------

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";
-- --------------------------------------------------------

--
-- Daten für Tabelle `article`
--

INSERT INTO `article` (`article_id`, `name`, `picture`, `price`) VALUES
(1, 'Salami', 'pizza.gif', 8.57),
(2, 'Vegetaria', 'pizza.gif', 12.5),
(3, 'Spinat-Hühnchen', 'pizza.gif', 11.99);

-- --------------------------------------------------------

--
-- Daten für Tabelle `ordering`
--

INSERT INTO `ordering` (`ordering_id`, `address`, `ordering_time`) VALUES
(16, 'Birkenweg 7, 2. Stock, Telefon: 12325, Mustermann', '2020-04-13 12:58:56'),
(17, 'Schöfferstr. 8b, 1637733, Musterfrau', '2020-04-13 13:01:49');

-- --------------------------------------------------------

--
-- Daten für Tabelle `ordered_article`
--

INSERT INTO `ordered_article` (`ordered_article_id`, `article_id`, `ordering_id`, `status`) VALUES
(39, 1, 16, 3),
(40, 1, 16, 3),
(41, 2, 16, 3),
(42, 3, 16, 3),
(43, 2, 17, 1),
(44, 2, 17, 0),
(45, 3, 17, 1);


COMMIT;

-- /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
-- /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
-- /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
