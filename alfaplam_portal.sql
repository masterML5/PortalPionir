-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2022 at 03:56 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alfaplam_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokumenti`
--

CREATE TABLE `dokumenti` (
  `id` int(11) NOT NULL COMMENT 'automaski broj',
  `datum` date NOT NULL COMMENT 'Datum objave vesti',
  `kategorija` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Kategorija kojoj vest pripada',
  `naslov` varchar(80) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Naslov vesti koju obljavljujemo',
  `tekst` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'Tekst vesti',
  `slika` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Lokacija slike',
  `uneo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Ko je uneo vest',
  `datum_unosa` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Datum i vreme unosa',
  `datum_izmene` date NOT NULL COMMENT 'Datum izmene dokumenta',
  `prikaz` tinyint(1) NOT NULL DEFAULT 1,
  `redosled` int(11) NOT NULL DEFAULT 0 COMMENT 'redosled prikazivanja'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabela vesti iz svih kategorija';

--
-- Dumping data for table `dokumenti`
--

INSERT INTO `dokumenti` (`id`, `datum`, `kategorija`, `naslov`, `tekst`, `slika`, `uneo`, `datum_unosa`, `datum_izmene`, `prikaz`, `redosled`) VALUES
(81, '0000-00-00', 'pravilnici', 'dsfdsfsdf', '<p>ddsfdsfsd</p>', 'asd', 'admin', '2022-05-31 11:01:54', '0000-00-00', 1, 0),
(82, '0000-00-00', 'pravilnici', '', '<p>asdasdasdasdas</p>', '', 'admin', '2022-05-31 11:02:05', '0000-00-00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dokumenti_fajlovi`
--

CREATE TABLE `dokumenti_fajlovi` (
  `id` int(11) NOT NULL COMMENT 'jedinstveni broj',
  `id_dok` int(11) NOT NULL COMMENT 'veza sa dokumentom',
  `fajl` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `natpis` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `prikaz` tinyint(1) NOT NULL DEFAULT 1,
  `redosled` int(11) NOT NULL DEFAULT 0 COMMENT 'Redosled prikaza'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Fajlovi za preuzimanje za određenu vest';

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(4) NOT NULL,
  `date` date NOT NULL DEFAULT '2001-01-20',
  `event_desc` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `imenik`
--

CREATE TABLE `imenik` (
  `id` int(11) NOT NULL,
  `sifrad` char(13) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Šifra radnika',
  `prezime` varchar(40) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Prezime',
  `ime` varchar(40) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Ime',
  `sifoj` char(6) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Šifra OJ',
  `nazoj` varchar(40) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Naziv OJ',
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL COMMENT 'e-mail',
  `tel_mobilni` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'mobilni telefon',
  `tel_fiksni` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Fiksni telefon',
  `tel_lokal` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Lokal u firmi',
  `lice_sluzba` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'Da li je čovek/služba (0/1)',
  `firma_naziv` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `uneo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `datum_unosa` datetime NOT NULL,
  `datum_izmene` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='imenik';

--
-- Dumping data for table `imenik`
--

INSERT INTO `imenik` (`id`, `sifrad`, `prezime`, `ime`, `sifoj`, `nazoj`, `email`, `tel_mobilni`, `tel_fiksni`, `tel_lokal`, `lice_sluzba`, `firma_naziv`, `uneo`, `datum_unosa`, `datum_izmene`) VALUES
(1511, '1234567891012', 'Jelic', 'Milos', '1', 'Informatika', 'milos.jelic@pionir.rs', '123131', '2132131', '123132131', 'Sluzba', 'Pionir Fabrika Subotica', 'admin', '2022-06-01 11:02:10', '2022-06-01 12:43:50'),
(1512, '2', 'Horvacki', 'Tomislav', '1', 'Informatika', 'tomislav.horvacki@pionir.rs', '123123', '23213213213', '321', 'Lice', 'Pionir Fabrika Subotica', 'admin', '2022-06-01 14:11:33', '2022-06-01 12:43:44'),
(1513, '3', 'Kolar', 'Nenad', '1', 'Informatika', 'nenad.kolar@pionir.rs', '1231231', '321321321', '3123213', 'Ostalo', 'Pionir Hissar', 'admin', '2022-06-01 14:33:40', '2022-06-01 12:37:03');

-- --------------------------------------------------------

--
-- Table structure for table `kategorije`
--

CREATE TABLE `kategorije` (
  `kategorija` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `naslov` varchar(60) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='spisak kategorija';

--
-- Dumping data for table `kategorije`
--

INSERT INTO `kategorije` (`kategorija`, `naslov`) VALUES
('proba', 'proba'),
('korporativna', 'korporativna'),
('ostalo', 'ostalo');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `korisnik` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'korisničko ime',
  `lozinka` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'lozinka',
  `ime` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ime i prezime',
  `datum_log` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'datum zadnje prijave',
  `nivo_ovlascenja` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`korisnik`, `lozinka`, `ime`, `datum_log`, `nivo_ovlascenja`) VALUES
('admin', 'admin', 'admin', '2022-05-27 14:34:46', 0),
('user', 'user', 'user', '2022-05-27 20:31:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `misli`
--

CREATE TABLE `misli` (
  `id` int(11) NOT NULL,
  `naslov` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tekst` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'Tekst misli',
  `autor` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Autor misli',
  `prikaz` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Prikazati: 1 - DA, 0 - Ne',
  `datum_unosa` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Datum i vreme unosa',
  `korisnik` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Uneo'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `misli`
--

INSERT INTO `misli` (`id`, `naslov`, `tekst`, `autor`, `prikaz`, `datum_unosa`, `korisnik`) VALUES
(505, 'misao', '<p>misao</p>', 'admin', 1, '2022-05-29 14:50:43', 'admin'),
(504, 'cao', '<p><strong>cao</strong></p>', 'milos', 1, '2022-05-28 16:59:05', 'admin'),
(506, 'misao', '<p>misao2</p>', 'admin2', 1, '2022-05-29 14:51:15', 'admin'),
(507, 'misao', '<p>123</p>', 'admin', 1, '2022-05-29 14:52:43', 'admin'),
(508, 'misao', '<p>123</p>', '123', 1, '2022-05-29 14:53:29', 'admin'),
(509, 'misao', '<p>123</p>', '123', 1, '2022-05-29 15:13:22', 'admin'),
(512, 'asd', '<p>asd</p>', 'asd', 1, '2022-05-29 15:15:16', 'admin'),
(513, 'asd', '<p>asd</p>', 'asd', 1, '2022-05-29 15:20:32', 'admin'),
(514, 'asd', '<p>asd</p>', 'asd', 1, '2022-05-29 15:22:01', 'admin'),
(515, 'asd', '<p>asd</p>', 'asd', 1, '2022-05-29 15:22:54', 'admin'),
(516, 'asd', '<p>asd</p>', 'asd', 1, '2022-05-29 15:23:20', 'admin'),
(517, 'asd', '<p>asd</p>', 'asd', 1, '2022-05-29 15:23:48', 'admin'),
(518, 'asd', '<p>asd</p>', 'asdasd', 1, '2022-05-29 15:24:53', 'admin'),
(519, 'asd', '<p>asd</p>', 'asd', 1, '2022-05-29 15:26:14', 'admin'),
(520, 'asd', '<p>asd</p>', 'asd', 1, '2022-05-29 15:27:00', 'admin'),
(521, 'asd12322222222', '<p>asd777</p>', 'sdad', 1, '2022-05-31 09:58:11', 'admin'),
(522, 'asd', '<p>asd</p>', 'asd', 1, '2022-05-30 12:17:47', 'admin'),
(523, 'asd', '<p>asd</p>', 'asd', 1, '2022-05-29 15:30:23', 'admin'),
(524, 'asdasasd', '<p>asdasd</p>', 'asdasd', 1, '2022-05-29 15:32:45', 'admin'),
(525, 'asdasd', '<p>asdasd</p>', 'asdasd', 1, '2022-05-29 15:33:50', 'admin'),
(526, '', '', '', 1, '2022-05-29 16:04:28', 'admin'),
(527, '', '<p>asdasdasadasd</p>', '', 1, '2022-05-29 16:04:48', 'admin'),
(528, '1', '<p>asdasd</p>', 'asdasd', 0, '2022-05-30 12:29:56', 'admin'),
(529, '1', '<p>asdasd</p>', 'asdasd', 0, '2022-05-30 12:30:14', 'admin'),
(530, '12', '<p>asdasd</p>', 'asdasd', 0, '2022-05-30 12:30:52', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `obavestenja`
--

CREATE TABLE `obavestenja` (
  `id` int(11) NOT NULL,
  `kategorija` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `naslov` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tekst` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'Tekst misli',
  `autor` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Autor misli',
  `prikaz` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Prikazati: 1 - DA, 0 - Ne',
  `datum_unosa` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Datum i vreme unosa',
  `datum_aktivnosti` date NOT NULL,
  `redosled` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `obavestenja`
--

INSERT INTO `obavestenja` (`id`, `kategorija`, `naslov`, `tekst`, `autor`, `prikaz`, `datum_unosa`, `datum_aktivnosti`, `redosled`) VALUES
(1, 'proba', 'proba', 'asdasd', 'admin', 1, '2022-05-27 17:36:17', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vesti`
--

CREATE TABLE `vesti` (
  `id` int(11) NOT NULL COMMENT 'automaski broj',
  `datum` date NOT NULL COMMENT 'Datum objave vesti',
  `kategorija` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Kategorija kojoj vest pripada',
  `naslov` varchar(60) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Naslov vesti koju obljavljujemo',
  `tekst` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'Tekst vesti',
  `tekst_ceo` longtext COLLATE utf8_unicode_ci NOT NULL,
  `slika` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Lokacija slike',
  `uneo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Ko je uneo vest',
  `datum_unosa` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Datum i vreme unosa',
  `datum_izmene` datetime NOT NULL,
  `prikaz` tinyint(1) NOT NULL DEFAULT 1,
  `redosled` int(11) NOT NULL DEFAULT 0 COMMENT 'redosled prikazivanja'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabela vesti iz svih kategorija';

--
-- Dumping data for table `vesti`
--

INSERT INTO `vesti` (`id`, `datum`, `kategorija`, `naslov`, `tekst`, `tekst_ceo`, `slika`, `uneo`, `datum_unosa`, `datum_izmene`, `prikaz`, `redosled`) VALUES
(102, '0000-00-00', 'korporativna', 'mkmkkm', '		mkmkmk		', '<p>asdasdasd</p>', 'rtrete', 'admin', '2022-05-27 20:25:45', '2022-05-31 12:29:29', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vesti_fajlovi`
--

CREATE TABLE `vesti_fajlovi` (
  `id` int(11) NOT NULL COMMENT 'Redni broj vesti',
  `id_vest` int(11) NOT NULL COMMENT 'Veza sa glavnom vešću',
  `rbr` int(11) NOT NULL,
  `fajl` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `natpis` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `prikaz` tinyint(1) NOT NULL DEFAULT 1,
  `redosled` int(11) NOT NULL DEFAULT 0 COMMENT 'Redosled prikaza'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Fajlovi za preuzimanje za određenu vest';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokumenti`
--
ALTER TABLE `dokumenti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dokumenti_fajlovi`
--
ALTER TABLE `dokumenti_fajlovi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD UNIQUE KEY `event_id` (`event_id`);

--
-- Indexes for table `imenik`
--
ALTER TABLE `imenik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`korisnik`);

--
-- Indexes for table `misli`
--
ALTER TABLE `misli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obavestenja`
--
ALTER TABLE `obavestenja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vesti`
--
ALTER TABLE `vesti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vesti_fajlovi`
--
ALTER TABLE `vesti_fajlovi`
  ADD PRIMARY KEY (`id`,`rbr`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokumenti`
--
ALTER TABLE `dokumenti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'automaski broj', AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `dokumenti_fajlovi`
--
ALTER TABLE `dokumenti_fajlovi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'jedinstveni broj', AUTO_INCREMENT=396;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `imenik`
--
ALTER TABLE `imenik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1514;

--
-- AUTO_INCREMENT for table `misli`
--
ALTER TABLE `misli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=532;

--
-- AUTO_INCREMENT for table `obavestenja`
--
ALTER TABLE `obavestenja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vesti`
--
ALTER TABLE `vesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'automaski broj', AUTO_INCREMENT=103;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
