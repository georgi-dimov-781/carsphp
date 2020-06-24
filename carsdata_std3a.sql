-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 
-- Версия на сървъра: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carsdata_std3a`
--

-- --------------------------------------------------------

--
-- Структура на таблица `tbl_cars`
--

DROP TABLE IF EXISTS `tbl_cars`;
CREATE TABLE IF NOT EXISTS `tbl_cars` (
  `id_car` int(10) NOT NULL AUTO_INCREMENT,
  `id_make` int(10) NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `moreinfo` text NOT NULL,
  `picture` varchar(15) NOT NULL,
  PRIMARY KEY (`id_car`),
  KEY `id_make` (`id_make`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `tbl_cars`
--

INSERT INTO `tbl_cars` (`id_car`, `id_make`, `price`, `moreinfo`, `picture`) VALUES
(1, 2, 2000, 'Инфо......', ''),
(2, 1, 280000, 'Инфо....', ''),
(3, 1, 5000, 'Инфооо...dsasdadasads', ''),
(4, 1, 5000, 'Инфооо...dsasdadasads', ''),
(5, 2, 2111, 'Инфооо...', ''),
(6, 1, 22000, 'Инфооо...', ''),
(7, 1, 22000, 'Инфооо...ff', ''),
(8, 1, 22000, 'Инфооо...ff', ''),
(9, 1, 22000, 'Инфооо...ff', ''),
(10, 1, 22000, 'Инфооо...', '');

-- --------------------------------------------------------

--
-- Структура на таблица `tbl_makes`
--

DROP TABLE IF EXISTS `tbl_makes`;
CREATE TABLE IF NOT EXISTS `tbl_makes` (
  `id_make` int(10) NOT NULL AUTO_INCREMENT,
  `make` varchar(15) NOT NULL,
  PRIMARY KEY (`id_make`),
  UNIQUE KEY `make` (`make`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `tbl_makes`
--

INSERT INTO `tbl_makes` (`id_make`, `make`) VALUES
(1, 'Мерцедес'),
(2, 'Трабант');

-- --------------------------------------------------------

--
-- Структура на таблица `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id_user` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `usertype` tinyint(4) NOT NULL,
  `personname` varchar(15) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `tbl_users`
--

INSERT INTO `tbl_users` (`id_user`, `username`, `password`, `usertype`, `personname`) VALUES
(1, 'admin', 'admin', 1, 'Администратор');

--
-- Ограничения за дъмпнати таблици
--

--
-- Ограничения за таблица `tbl_cars`
--
ALTER TABLE `tbl_cars`
  ADD CONSTRAINT `tbl_cars_ibfk_1` FOREIGN KEY (`id_make`) REFERENCES `tbl_makes` (`id_make`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
