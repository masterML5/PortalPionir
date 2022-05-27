-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 18, 2022 at 08:33 AM
-- Server version: 5.0.95
-- PHP Version: 5.3.29

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `alfaplam_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokumenti`
--

CREATE TABLE IF NOT EXISTS `dokumenti` (
  `id` int(11) NOT NULL auto_increment COMMENT 'automaski broj',
  `datum` date NOT NULL COMMENT 'Datum objave vesti',
  `kategorija` varchar(30) collate utf8_unicode_ci NOT NULL COMMENT 'Kategorija kojoj vest pripada',
  `naslov` varchar(80) collate utf8_unicode_ci NOT NULL COMMENT 'Naslov vesti koju obljavljujemo',
  `tekst` longtext collate utf8_unicode_ci NOT NULL COMMENT 'Tekst vesti',
  `slika` varchar(100) collate utf8_unicode_ci default NULL COMMENT 'Lokacija slike',
  `uneo` varchar(50) collate utf8_unicode_ci default NULL COMMENT 'Ko je uneo vest',
  `datum_unosa` timestamp NOT NULL default CURRENT_TIMESTAMP COMMENT 'Datum i vreme unosa',
  `datum_izmene` date NOT NULL COMMENT 'Datum izmene dokumenta',
  `prikaz` tinyint(1) NOT NULL default '1',
  `redosled` int(11) NOT NULL default '0' COMMENT 'redosled prikazivanja',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabela vesti iz svih kategorija' AUTO_INCREMENT=81 ;

-- --------------------------------------------------------

--
-- Table structure for table `dokumenti_fajlovi`
--

CREATE TABLE IF NOT EXISTS `dokumenti_fajlovi` (
  `id` int(11) NOT NULL auto_increment COMMENT 'jedinstveni broj',
  `id_dok` int(11) NOT NULL COMMENT 'veza sa dokumentom',
  `fajl` varchar(150) collate utf8_unicode_ci NOT NULL,
  `natpis` varchar(100) collate utf8_unicode_ci NOT NULL,
  `prikaz` tinyint(1) NOT NULL default '1',
  `redosled` int(11) NOT NULL default '0' COMMENT 'Redosled prikaza',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Fajlovi za preuzimanje za određenu vest' AUTO_INCREMENT=396 ;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `event_id` int(4) NOT NULL auto_increment,
  `date` date NOT NULL default '2001-01-20',
  `event_desc` text collate utf8_unicode_ci NOT NULL,
  UNIQUE KEY `event_id` (`event_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `imenik`
--

CREATE TABLE IF NOT EXISTS `imenik` (
  `id` int(11) NOT NULL auto_increment,
  `sifrad` char(6) collate utf8_unicode_ci NOT NULL COMMENT 'Šifra radnika',
  `prezime` varchar(40) collate utf8_unicode_ci NOT NULL COMMENT 'Prezime',
  `ime` varchar(40) collate utf8_unicode_ci NOT NULL COMMENT 'Ime',
  `sifoj` char(6) collate utf8_unicode_ci NOT NULL COMMENT 'Šifra OJ',
  `nazoj` varchar(40) collate utf8_unicode_ci NOT NULL COMMENT 'Naziv OJ',
  `email` varchar(60) collate utf8_unicode_ci NOT NULL COMMENT 'e-mail',
  `tel_mobilni` varchar(40) collate utf8_unicode_ci default NULL COMMENT 'mobilni telefon',
  `tel_fiksni` varchar(40) collate utf8_unicode_ci default NULL COMMENT 'Fiksni telefon',
  `tel_lokal` varchar(40) collate utf8_unicode_ci default NULL COMMENT 'Lokal u firmi',
  `lice_sluzba` int(11) NOT NULL COMMENT 'Da li je čovek/služba (0/1)',
  `firma_naziv` varchar(40) collate utf8_unicode_ci NOT NULL,
  `uneo` varchar(50) collate utf8_unicode_ci NOT NULL,
  `datum_unosa` datetime NOT NULL,
  `datum_izmene` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='imenik' AUTO_INCREMENT=1511 ;

-- --------------------------------------------------------

--
-- Table structure for table `kategorije`
--

CREATE TABLE IF NOT EXISTS `kategorije` (
  `kategorija` varchar(30) collate utf8_unicode_ci NOT NULL,
  `naslov` varchar(60) collate utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='spisak kategorija';

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE IF NOT EXISTS `korisnici` (
  `korisnik` varchar(20) collate utf8_unicode_ci NOT NULL COMMENT 'korisničko ime',
  `lozinka` varchar(20) collate utf8_unicode_ci NOT NULL COMMENT 'lozinka',
  `ime` varchar(50) collate utf8_unicode_ci NOT NULL COMMENT 'ime i prezime',
  `datum_log` timestamp NOT NULL default CURRENT_TIMESTAMP COMMENT 'datum zadnje prijave',
  `nivo_ovlascenja` int(11) NOT NULL,
  PRIMARY KEY  (`korisnik`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `misli`
--

CREATE TABLE IF NOT EXISTS `misli` (
  `id` int(11) NOT NULL auto_increment,
  `naslov` varchar(60) collate utf8_unicode_ci default NULL,
  `tekst` longtext collate utf8_unicode_ci NOT NULL COMMENT 'Tekst misli',
  `autor` varchar(60) collate utf8_unicode_ci default NULL COMMENT 'Autor misli',
  `prikaz` tinyint(1) NOT NULL default '1' COMMENT 'Prikazati: 1 - DA, 0 - Ne',
  `datum_unosa` timestamp NOT NULL default CURRENT_TIMESTAMP COMMENT 'Datum i vreme unosa',
  `korisnik` varchar(20) collate utf8_unicode_ci NOT NULL COMMENT 'Uneo',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=503 ;


-- --------------------------------------------------------

--
-- Table structure for table `obavestenja`
--

CREATE TABLE IF NOT EXISTS `obavestenja` (
  `id` int(11) NOT NULL auto_increment,
  `kategorija` varchar(20) collate utf8_unicode_ci NOT NULL,
  `naslov` varchar(60) collate utf8_unicode_ci default NULL,
  `tekst` longtext collate utf8_unicode_ci NOT NULL COMMENT 'Tekst misli',
  `autor` varchar(60) collate utf8_unicode_ci default NULL COMMENT 'Autor misli',
  `prikaz` tinyint(1) NOT NULL default '1' COMMENT 'Prikazati: 1 - DA, 0 - Ne',
  `datum_unosa` timestamp NOT NULL default CURRENT_TIMESTAMP COMMENT 'Datum i vreme unosa',
  `datum_aktivnosti` date NOT NULL,
  `redosled` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `vesti`
--

CREATE TABLE IF NOT EXISTS `vesti` (
  `id` int(11) NOT NULL auto_increment COMMENT 'automaski broj',
  `datum` date NOT NULL COMMENT 'Datum objave vesti',
  `kategorija` varchar(30) collate utf8_unicode_ci NOT NULL COMMENT 'Kategorija kojoj vest pripada',
  `naslov` varchar(60) collate utf8_unicode_ci NOT NULL COMMENT 'Naslov vesti koju obljavljujemo',
  `tekst` longtext collate utf8_unicode_ci NOT NULL COMMENT 'Tekst vesti',
  `tekst_ceo` longtext collate utf8_unicode_ci NOT NULL,
  `slika` varchar(100) collate utf8_unicode_ci default NULL COMMENT 'Lokacija slike',
  `uneo` varchar(50) collate utf8_unicode_ci default NULL COMMENT 'Ko je uneo vest',
  `datum_unosa` timestamp NOT NULL default CURRENT_TIMESTAMP COMMENT 'Datum i vreme unosa',
  `datum_izmene` datetime NOT NULL,
  `prikaz` tinyint(1) NOT NULL default '1',
  `redosled` int(11) NOT NULL default '0' COMMENT 'redosled prikazivanja',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabela vesti iz svih kategorija' AUTO_INCREMENT=101 ;


-- --------------------------------------------------------

--
-- Table structure for table `vesti_fajlovi`
--

CREATE TABLE IF NOT EXISTS `vesti_fajlovi` (
  `id` int(11) NOT NULL COMMENT 'Redni broj vesti',
  `id_vest` int(11) NOT NULL COMMENT 'Veza sa glavnom vešću',
  `rbr` int(11) NOT NULL,
  `fajl` varchar(100) collate utf8_unicode_ci NOT NULL,
  `natpis` varchar(100) collate utf8_unicode_ci NOT NULL,
  `prikaz` tinyint(1) NOT NULL default '1',
  `redosled` int(11) NOT NULL default '0' COMMENT 'Redosled prikaza',
  PRIMARY KEY  (`id`,`rbr`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Fajlovi za preuzimanje za određenu vest';



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
