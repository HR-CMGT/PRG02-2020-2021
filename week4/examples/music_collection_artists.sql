-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Gegenereerd op: 15 dec 2019 om 15:29
-- Serverversie: 10.1.36-MariaDB
-- PHP-versie: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `music_collection_artists`
--
CREATE DATABASE IF NOT EXISTS `music_collection_artists` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `music_collection_artists`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `albums`
--

DROP TABLE IF EXISTS `albums`;
CREATE TABLE `albums` (
                          `id` int(11) UNSIGNED NOT NULL,
                          `name` varchar(50) NOT NULL,
                          `year` varchar(4) NOT NULL,
                          `tracks` int(3) NOT NULL,
                          `genre` varchar(30) NOT NULL,
                          `artist_id` int(11) UNSIGNED DEFAULT NULL,
                          `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `albums`
--

INSERT INTO `albums` (`id`, `name`, `year`, `tracks`, `genre`, `image`, `artist_id`) VALUES
(1, 'Live At Rome Olympic Stadium', '2013'  , 14, 'Rock'            , 'live_at_rome_olympic_stadium.jpg', 1),
(2, 'Systematic Chaos', '2007'              , 8 , 'Progressive Rock', 'systematic_chaos.jpg', 4),
(3, 'United We Are', '2015'                 , 14, 'House'           , 'united_we_are.jpg', 1),
(4, 'Greatest Hits', '2010'                 , 57, 'Pop'             , 'greatest_hits.jpg', 5),
(5, 'Gold Cobra', '2011'                    , 16, 'Rock / Rap'      , 'gold_cobra.jpg', 3),
(6, 'Mijn Ikken', '2005'                    , 12, 'Nederpop'        , 'mijn_ikken.jpg', 11),
(7, 'Love Part 1', '2011'                   , 11, 'Rock'            , 'love_part_1.jpg', 7),
(8, 'Unstoppable Momentum', '2013'          , 11, 'Rock'            , 'unstoppable_momentum.jpg', 6),
(9, 'Cut Your Teeth', '2014'                , 3 , 'Chillstep'       , 'cut_your_teeth.jpg', 8),
(10, 'This Is War', '2009'                  , 15, 'Rock'            , 'this_is_war.jpg', 9),
(11, 'Legend (Remastered)', '2002'          , 16, 'Pop'             , 'legend.jpg' , 10),
(12, 'Piet', '2015'                         , 21, 'Nederlands'      ,'1450167723_0000822555_500.jpg', 12),
(13, 'Love songs', '2003'                   , 15, 'Pop'             ,'', NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `artists`
--

DROP TABLE IF EXISTS `artists`;
CREATE TABLE `artists` (
                           `id` int(11) UNSIGNED NOT NULL,
                           `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `artists`
--

INSERT INTO `artists` (`id`, `name`) VALUES
(1, 'Muse'),
(2, 'Hardwell'),
(3, 'Limp Bizkit'),
(4, 'Dream Theater'),
(5, 'Robbie Williams'),
(6, 'Joe Satriani'),
(7, 'Angels & Airwaves'),
(8, 'Kygo'),
(9, '30 Seconds To Mars'),
(10, 'Bob Marley & The Wailers'),
(11, 'Harrie Jekkers'),
(12, 'Piet Veerman'),
(13, 'Michael Jackson');


--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `albums`
--
ALTER TABLE `albums`
    ADD PRIMARY KEY (`id`),
    ADD KEY `artist_id` (`artist_id`);

--
-- Indexen voor tabel `artists`
--
ALTER TABLE `artists`
    ADD PRIMARY KEY (`id`);


--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `albums`
--
ALTER TABLE `albums`
    MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT voor een tabel `artists`
--
ALTER TABLE `artists`
    MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `albums`
--
ALTER TABLE `albums`
    ADD CONSTRAINT `albums_ibfk_1` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;