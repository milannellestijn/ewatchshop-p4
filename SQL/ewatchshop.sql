-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 20 jun 2019 om 07:09
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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `login`
--

INSERT INTO `login` (`iduser`, `email`, `password`, `userrole`, `firstname`, `infix`, `lastname`, `phone`, `address`, `postalcode`, `city`) VALUES
(13, '123@123', '$2y$10$qkA/2e5D9.MzEtCiSFpOsuMiODJ7jxcDefyrbBrfWVmrxyt3sjQBu', 'administrator', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'admin@admin', '$2y$10$bO7LUjw4iW4G2pFeH1aqdOhSgx4Qhp4GxqY2a/vZ2JQt1c1kGVDAi', 'administrator', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'klant@klant', '$2y$10$aew6gXr4QZTbwwuHVXkN9eW.1MQBtdBG8uhAFsWBqri1wRoEGGM2y', 'customer', 'Pieter', 'van de', 'Koning', 6123, 'Straat 123', '1111AA', 'Amtserdam'),
(19, 'pieter@koning', '$2y$10$jdVFDGDO9n2Xi5niwnJctO8Fw8qnahI4t15nKr9CIf4mhL.ToOb.a', 'customer', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `idorder` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `price_ex` decimal(6,2) NOT NULL,
  `price_inc` decimal(6,2) NOT NULL,
  `status` enum('onderweg','afgeleverd','betaalt','gesorteerd') NOT NULL DEFAULT 'betaalt',
  PRIMARY KEY (`idorder`),
  KEY `iduser` (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `order`
--

INSERT INTO `order` (`idorder`, `iduser`, `date`, `price_ex`, `price_inc`, `status`) VALUES
(28, 17, '2019-06-20 08:49:45', '1030.00', '1246.30', 'betaalt'),
(29, 17, '2019-06-20 08:54:55', '1949.00', '2358.29', 'betaalt'),
(30, 17, '2019-06-20 08:57:40', '1949.00', '2358.29', 'betaalt');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `orderline`
--

DROP TABLE IF EXISTS `orderline`;
CREATE TABLE IF NOT EXISTS `orderline` (
  `idorderline` int(11) NOT NULL AUTO_INCREMENT,
  `idorder` int(11) NOT NULL,
  `idproduct` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `total` decimal(5,2) NOT NULL,
  PRIMARY KEY (`idorderline`),
  KEY `idorder` (`idorder`,`idproduct`),
  KEY `idporduct` (`idproduct`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `orderline`
--

INSERT INTO `orderline` (`idorderline`, `idorder`, `idproduct`, `amount`, `price`, `total`) VALUES
(49, 28, 22, 1, '919.00', '919.00'),
(50, 28, 23, 1, '111.00', '111.00'),
(51, 29, 22, 1, '919.00', '919.00'),
(52, 29, 23, 1, '111.00', '111.00'),
(53, 29, 22, 1, '919.00', '919.00'),
(54, 30, 22, 1, '919.00', '919.00'),
(55, 30, 23, 1, '111.00', '111.00'),
(56, 30, 22, 1, '919.00', '919.00');

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `product`
--

INSERT INTO `product` (`idproduct`, `name`, `code`, `image`, `price`, `description`, `stock`) VALUES
(22, 'Olaf Smart watch', 'SM012', '', 919.00, 'DE beste smartwatch', 3),
(23, 'Jay smart', 'SM101', '', 111.00, 'Halo', NULL);

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
  ADD CONSTRAINT `orderline_ibfk_2` FOREIGN KEY (`idproduct`) REFERENCES `product` (`idproduct`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
