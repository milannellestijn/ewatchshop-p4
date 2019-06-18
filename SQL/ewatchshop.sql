-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 18 jun 2019 om 07:31
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `contact`
--

INSERT INTO `contact` (`id`, `voornaam`, `tussenvoegsel`, `achternaam`, `email`, `onderwerp`, `vraag`) VALUES
(4, 'Henk', '', 'Hansen', 'vraag@vraag.com', 'Vraag', 'Wat is dit ?');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(350) NOT NULL,
  `password` varchar(60) NOT NULL,
  `userrole` enum('administrator','customer') NOT NULL DEFAULT 'customer',
  `firstname` varchar(100) DEFAULT NULL,
  `infix` varchar(20) DEFAULT NULL,
  `lastname` varchar(200) DEFAULT NULL,
  `phone` int(15) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `postalcode` varchar(6) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `login`
--

INSERT INTO `login` (`iduser`, `email`, `password`, `userrole`, `firstname`, `infix`, `lastname`, `phone`, `address`, `postalcode`, `city`) VALUES
(13, '123@123', '$2y$10$qkA/2e5D9.MzEtCiSFpOsuMiODJ7jxcDefyrbBrfWVmrxyt3sjQBu', 'administrator', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'admin@admin', '$2y$10$bO7LUjw4iW4G2pFeH1aqdOhSgx4Qhp4GxqY2a/vZ2JQt1c1kGVDAi', 'administrator', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'klant@klant', '$2y$10$aew6gXr4QZTbwwuHVXkN9eW.1MQBtdBG8uhAFsWBqri1wRoEGGM2y', 'customer', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `idorder` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `price_ex` decimal(5,2) NOT NULL,
  `price_inc` decimal(5,2) NOT NULL,
  `status` enum('onderweg','afgeleverd','betaalt','gesorteerd') NOT NULL,
  PRIMARY KEY (`idorder`),
  KEY `iduser` (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `orderline`
--

DROP TABLE IF EXISTS `orderline`;
CREATE TABLE IF NOT EXISTS `orderline` (
  `idorderline` int(11) NOT NULL AUTO_INCREMENT,
  `idorder` int(11) NOT NULL,
  `idporduct` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `price` decimal(4,2) NOT NULL,
  `total` decimal(5,2) NOT NULL,
  PRIMARY KEY (`idorderline`),
  KEY `idorder` (`idorder`,`idporduct`),
  KEY `idporduct` (`idporduct`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `idproduct` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL,
  `description` text NOT NULL,
  `stock` int(11) DEFAULT NULL,
  PRIMARY KEY (`idproduct`),
  UNIQUE KEY `product_code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `product`
--

INSERT INTO `product` (`idproduct`, `name`, `code`, `image`, `price`, `description`, `stock`) VALUES
(15, 'De eerste smartwatch', 'SM001', './pictures/smartwatch1.jpg', 100.00, 'DE beste smartwatch', 0),
(16, 'Giga smartwatch', 'sm100', '', 999.00, 'De giga smartwatch ', 0);

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `login` (`iduser`);

--
-- Beperkingen voor tabel `orderline`
--
ALTER TABLE `orderline`
  ADD CONSTRAINT `orderline_ibfk_1` FOREIGN KEY (`idorder`) REFERENCES `order` (`idorder`),
  ADD CONSTRAINT `orderline_ibfk_2` FOREIGN KEY (`idporduct`) REFERENCES `product` (`idproduct`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
