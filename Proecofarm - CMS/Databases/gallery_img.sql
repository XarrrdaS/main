-- phpMyAdmin SQL Dump
-- version 3.5.FORPSI
-- http://www.phpmyadmin.net
--
-- Host: 185.129.138.46
-- Czas wygenerowania: 16 Sie 2022, 22:19
-- Wersja serwera: 8.0.26-16
-- Wersja PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `a5509`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gallery_img`
--

CREATE TABLE IF NOT EXISTS `gallery_img` (
  `id` int NOT NULL AUTO_INCREMENT,
  `img_name` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb3 COLLATE=utf8_polish_ci AUTO_INCREMENT=19 ;

--
-- Zrzut danych tabeli `gallery_img`
--

INSERT INTO `gallery_img` (`id`, `img_name`) VALUES
(1, '1.jpg'),
(3, '2.jpg'),
(4, '3.jpg'),
(5, '4.jpg'),
(6, '5.jpg'),
(7, '6.jpg'),
(8, '7.jpg'),
(9, '8.jpg'),
(10, '9.jpg'),
(11, '10.jpg'),
(15, '11.jpg'),
(13, '12.jpg'),
(14, '13.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
