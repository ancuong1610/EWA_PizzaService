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


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

REVOKE ALL PRIVILEGES ON *.* FROM 'public'@'%'; REVOKE GRANT OPTION ON *.* FROM 'public'@'%'; GRANT SELECT, INSERT, UPDATE, DELETE, FILE ON *.* TO 'public'@'%' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0; 

--
-- Database: `formbuilder`
--
CREATE DATABASE IF NOT EXISTS formbuilder
DEFAULT CHARACTER SET utf8
COLLATE utf8_unicode_ci;

USE formbuilder;
-- --------------------------------------------------------

--
-- Table structure for table `Formelemente`
--

CREATE TABLE IF NOT EXISTS `Formelemente` (
  `ID` int(11) NOT NULL,
  `Beschriftung` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `NameAttr` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `Typ` enum('text','button','radio') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Formelemente`
--

INSERT INTO `Formelemente` (`ID`, `Beschriftung`, `NameAttr`, `Typ`) VALUES
(1, 'Name, Vorname', 'fullname', 'text'),
(2, 'Straße', 'strasse', 'text'),
(3, '<Bemerkung>', 'bemerkung', 'text');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Formelemente`
--
ALTER TABLE `Formelemente`
  ADD PRIMARY KEY (`ID`);
ALTER TABLE `Formelemente` ADD FULLTEXT KEY `Beschriftung` (`Beschriftung`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Formelemente`
--
ALTER TABLE `Formelemente`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
