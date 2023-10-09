-- vorgegebene Datenbank MEISTER
-- modifiziert B.K.

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

CREATE DATABASE MEISTER
DEFAULT CHARACTER SET utf8
COLLATE utf8_unicode_ci;

USE MEISTER;

CREATE TABLE fragen (
   id int AUTO_INCREMENT, PRIMARY KEY (id),
   frage varchar(50) NOT NULL,
   antwort1 varchar(50) NOT NULL,
   antwort2 varchar(50) NOT NULL,
   antwort3 varchar(50) NOT NULL,
   richtig enum('1', '2', '3') NOT NULL);

CREATE TABLE spiele (
   id int AUTO_INCREMENT, PRIMARY KEY (id),
   name varchar(50) NOT NULL,
   antworten int NOT NULL);

INSERT INTO spiele (name, antworten) VALUES
('Ralf','3'),
('John Doe', '1'),
('Hurz','23');

INSERT INTO fragen (frage, antwort1, antwort2, antwort3, richtig) VALUES
('Wie viele Einwohner hat Darmstadt (Stand 2017)?', '155.000', '205.000', '75.000', '1'),
('Was bedeutet das html-Tag <td>?', 'test data', 'test dummy', 'table data', '3'),
('Wie viele Einwohner hat Mainz (Stand 2017)?', '155.000', '210.000', '295.000', '2');
