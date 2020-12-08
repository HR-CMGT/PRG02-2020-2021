-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Genereertijd: 28 nov 2015 om 13:47
-- Serverversie: 5.6.14
-- PHP-versie: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `music_collection`
--
CREATE DATABASE IF NOT EXISTS `music_collection` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `music_collection`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `albums`
--

DROP TABLE IF EXISTS `albums`;
CREATE TABLE IF NOT EXISTS `albums` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `artist` varchar(50) NOT NULL,
  `genre` varchar(20) NOT NULL,
  `year` varchar(4) NOT NULL,
  `tracks` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Gegevens worden uitgevoerd voor tabel `albums`
--

INSERT INTO `albums` (`id`, `name`, `artist`, `genre`, `year`, `tracks`) VALUES
(1  , 'Live At Rome Olympic Stadium'  , 'Muse'                , 'Rock'            , '2013', 13),
(2  , 'Systematic Chaos'              , 'Dream Theater'       , 'Progressive Rock', '2007', 8),
(3  , 'United We Are'                 , 'Hardwell'            , 'House'           , '2015', 14),
(4  , 'Greatest Hits'                 , 'Robbie Williams'     , 'Pop'             , '2010', 57),
(5  , 'Gold Cobra'                    , 'Limp Bizkit'         , 'Rock / Rap'      , '2011', 16),
(6  , 'Mijn Ikken'                    , 'Harrie Jekkers'      , 'Nederpop'        , '2005', 12),
(7  , 'Love Part 1'                   , 'Angels & Airwaves'   , 'Rock'            , '2011', 11),
(8  , 'Unstoppable Momentum'          , 'Joe Satriani'        , 'Rock'            , '2013', 11),
(9  , 'Cut Your Teeth'                , 'Kygo'                , 'Chillstep'       , '2014', 3),
(10 , 'This Is War'                   , '30 Seconds To Mars'  , 'Rock'            , '2009', 15);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
