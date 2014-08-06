-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 06 Sie 2014, 19:27
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `watermelon`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `melons`
--

DROP TABLE IF EXISTS `melons`;
CREATE TABLE IF NOT EXISTS `melons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Zrzut danych tabeli `melons`
--

INSERT INTO `melons` (`id`, `path`) VALUES
(1, 'img/vi.jpg'),
(2, 'img/katrina.jpg'),
(3, 'img/lux.jpg'),
(4, 'img/riven.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wins`
--

DROP TABLE IF EXISTS `wins`;
CREATE TABLE IF NOT EXISTS `wins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `winner_id` int(11) NOT NULL,
  `looser_id` int(11) NOT NULL,
  `count` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=22 ;

--
-- Zrzut danych tabeli `wins`
--

INSERT INTO `wins` (`id`, `winner_id`, `looser_id`, `count`) VALUES
(12, 2, 3, 2),
(13, 3, 1, 1),
(14, 3, 4, 4),
(15, 4, 1, 2),
(16, 1, 2, 3),
(17, 1, 4, 1),
(18, 3, 2, 1),
(19, 4, 3, 3),
(20, 2, 1, 1),
(21, 2, 4, 3);
