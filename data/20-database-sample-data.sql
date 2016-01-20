-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Host: database
-- Erstellungszeit: 19. Jan 2016 um 22:01
-- Server-Version: 5.5.47
-- PHP-Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `isp`
--

--
-- Daten für Tabelle `news`
--

INSERT INTO `news` (`id`, `created`, `updated`, `date`, `author`, `title`, `abstract`, `body`) VALUES
(2, 1453240880, 1453240880, 1453240880, 'Tim Tester', 'Erster news', 'Lorem ipsum dolor sit amet', 'foo');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
