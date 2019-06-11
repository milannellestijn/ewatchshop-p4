-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 11 jun 2019 om 07:41
-- Serverversie: 5.7.23
-- PHP-versie: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ewatchshop`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `voornaam` varchar(50) NOT NULL,
  `tussenvoegsel` varchar(10) NOT NULL,
  `achternaam` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `onderwerp` varchar(50) NOT NULL,
  `vraag` varchar(4000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `contact`
--

INSERT INTO `contact` (`id`, `voornaam`, `tussenvoegsel`, `achternaam`, `email`, `onderwerp`, `vraag`) VALUES
(1, 'nmkwm', 'fd', 'wadfsg', 'nwdjij@dewd', 'wsdaesfgrt', 'wadsf'),
(2, 'nmkwm', 'fd', 'wadfsg', 'nwdjij@dewd', 'wsdaesfgrt', 'wadsf');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(350) NOT NULL,
  `password` varchar(60) NOT NULL,
  `userrole` enum('administrator','customer') NOT NULL DEFAULT 'customer',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `login`
--

INSERT INTO `login` (`id`, `email`, `password`, `userrole`) VALUES
(1, 'milan_nellestijn@hotmail.com', '$2y$10$EQZghE4/L0D4n9VewPnjaOVZS20dJ9X2R111OqnRzdUCfkMEpuG/y', 'administrator'),
(2, 'admin@admin.com', '$2y$10$if.rKneSN1mf72huDPyefOSc0kOpHVT07V8WzceggOiUS0wx2bzfu', 'administrator');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
