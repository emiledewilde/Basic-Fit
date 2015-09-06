-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 26 mei 2015 om 09:34
-- Serverversie: 5.6.20
-- PHP-versie: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `basicfit`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `abbonementklant`
--

CREATE TABLE IF NOT EXISTS `abbonementklant` (
  `Klantnummer` int(2) NOT NULL,
  `Achternaam` varchar(55) NOT NULL,
  `Abonnement` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `abbonementklant`
--

INSERT INTO `abbonementklant` (`Klantnummer`, `Achternaam`, `Abonnement`) VALUES
(1, 'de Wilde', 'BasicFitFlex'),
(2, 'Hermkes', 'BasicFitEasy'),
(3, 'Hiemstra', 'BasicFitSmart'),
(10, '', 'BasicFitFlex');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `abonnementen`
--

CREATE TABLE IF NOT EXISTS `abonnementen` (
  `Abonneenr` int(1) NOT NULL,
  `Abonneenaam` varchar(25) DEFAULT NULL,
  `Kostenpm` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `abonnementen`
--

INSERT INTO `abonnementen` (`Abonneenr`, `Abonneenaam`, `Kostenpm`) VALUES
(1, 'BasicFitEasy', '16.00'),
(2, 'BasicFitSmart', '18.00'),
(3, 'BasicFitFlex', '22.00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `admindata`
--

CREATE TABLE IF NOT EXISTS `admindata` (
`Adminnummer` int(2) NOT NULL,
  `Voornaam` varchar(255) NOT NULL,
  `Achternaam` varchar(255) NOT NULL,
  `Adres` varchar(255) NOT NULL,
  `Postcode` varchar(6) NOT NULL,
  `Woonplaats` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Wachtwoord` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Gegevens worden geëxporteerd voor tabel `admindata`
--

INSERT INTO `admindata` (`Adminnummer`, `Voornaam`, `Achternaam`, `Adres`, `Postcode`, `Woonplaats`, `Email`, `Wachtwoord`) VALUES
(1, 'Emile', 'de Wilde', 'Spieringstraat 5', '3192AN', 'Hoogvliet', 'EmiledeW1997@gmail.com', '$2y$10$JVDjg91Ms3l3IIlNWh92Duj.fu39YMdfl78leWGbG0dyqojt9MBka');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `apparaten`
--

CREATE TABLE IF NOT EXISTS `apparaten` (
`Apparaatnr` int(3) NOT NULL,
  `Apparaatnaam` varchar(25) DEFAULT NULL,
  `Kostenpermaand` varchar(2) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Gegevens worden geëxporteerd voor tabel `apparaten`
--

INSERT INTO `apparaten` (`Apparaatnr`, `Apparaatnaam`, `Kostenpermaand`) VALUES
(1, 'Loopband', '15'),
(2, 'Crosstrainer', '15'),
(3, 'Roeitrainer', '10'),
(4, 'Cardiotrainer', '20'),
(5, 'Halterbank', '10'),
(6, 'Squatracks', '22'),
(7, 'PowerTower', '30'),
(8, 'Multistation', '37'),
(9, 'Armfietsen', '5'),
(10, 'klimrek', '12');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `basicbeoordeling`
--

CREATE TABLE IF NOT EXISTS `basicbeoordeling` (
`IDnr` int(2) NOT NULL,
  `Naam` varchar(70) NOT NULL,
  `Apparaatnaam` varchar(40) NOT NULL,
  `Beoordeling` varchar(2) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Gegevens worden geëxporteerd voor tabel `basicbeoordeling`
--

INSERT INTO `basicbeoordeling` (`IDnr`, `Naam`, `Apparaatnaam`, `Beoordeling`) VALUES
(1, 'Emile de Wilde', 'Power Tower', '10'),
(2, 'Axel Hermkes', 'Loopband', '6'),
(3, 'Allard Hiemstra', 'Squatracks', '2'),
(4, 'Stefano Koot', 'Crosstrainer', '5'),
(5, 'Yoshi Slootbom', 'Multistation', '8'),
(6, 'Rick Roll', 'Roeitrainer', '1'),
(7, 'Swaylor Tift', 'Halterbank', '9'),
(8, 'Alles Nielson', 'Armfietsen', '4');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klantapp`
--

CREATE TABLE IF NOT EXISTS `klantapp` (
`idKlantapp` int(4) NOT NULL,
  `Klantnr` int(4) NOT NULL,
  `Apparaatnr` int(3) NOT NULL,
  `Beoordeling` int(2) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Gegevens worden geëxporteerd voor tabel `klantapp`
--

INSERT INTO `klantapp` (`idKlantapp`, `Klantnr`, `Apparaatnr`, `Beoordeling`) VALUES
(1, 15, 1, 6),
(2, 7, 3, 1),
(3, 5, 5, 4),
(4, 2, 7, 10),
(5, 11, 9, 8),
(6, 12, 2, 3),
(7, 19, 4, 2),
(8, 10, 6, 9),
(9, 20, 8, 5),
(10, 1, 10, 6),
(11, 8, 6, 8),
(12, 4, 4, 6),
(13, 18, 1, 10),
(14, 17, 9, 7),
(15, 9, 2, 5),
(16, 16, 4, 9),
(17, 14, 5, 6),
(18, 13, 8, 2),
(19, 6, 3, 7),
(20, 2, 7, 8);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klantdata`
--

CREATE TABLE IF NOT EXISTS `klantdata` (
`Klantnummer` int(2) NOT NULL,
  `Voornaam` varchar(255) NOT NULL,
  `Achternaam` varchar(255) NOT NULL,
  `Adres` varchar(255) NOT NULL,
  `Postcode` varchar(255) NOT NULL,
  `Woonplaats` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Wachtwoord` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Gegevens worden geëxporteerd voor tabel `klantdata`
--

INSERT INTO `klantdata` (`Klantnummer`, `Voornaam`, `Achternaam`, `Adres`, `Postcode`, `Woonplaats`, `Email`, `Wachtwoord`) VALUES
(1, 'Emile', 'de Wilde', 'Spieringstraat 5', '3192AN', 'Hoogvliet', 'EmiledeW1997@gmail.com', '$2y$10$VthycPHmtQmLStPqzEouu.wRnX/RJEm1hhbqowqYPQOrqYVFkjz32'),
(2, 'Axel', 'Hermkes', 'Privestraat 10', '3226AD', 'Hellevoetsluis', 'AH@gmail.com', '$2y$10$UmQhsiamaNZ//VTzP9Y3z.Q2IRbeCN8m.JKPYgTrhBJv7cli.7vze'),
(3, 'Allard', 'Hiemstra', 'Langelindelaan 5', '1516AA', 'Hellevoetsluis', 'allard@hiemsta.nl', '$2y$10$l4ypKYAVO1DmE2AUiMX3o.xLLZxmMWzuwZLVuOkYpy6gXCJOL/yP6'),
(4, 'Stefano', 'Koot', 'Banstraat 89', '3207JB', 'Spijkenisse', 'StefanoKoot@hotmail.com', '$2y$10$Fq7FWkgMHubUFgZ952DUP.w9XcXCnouN80iBnYAD4t9vK0BgAMmbq'),
(5, 'Yoshi', 'Slotboom', 'Mariostraat 69', '8965QU', 'Spijkenisse', 'Slot@hotmail.com', '$2y$10$Pu6SNpNeNiZ2CuS7tLPkvu8vfs9MSv52kyPjrzzdjcv0IhHcmh47G'),
(6, 'Rick', 'Roll', 'Neverveen 16', '6416SP', 'Rolveen', 'giveyouup@live.nl', '$2y$10$jwuoROYAA/b8ZRLLWvIpfelOnacrjcfiGZ8ylCE3/t1KH1BzeiQxW'),
(7, 'Swaylor', 'Tift', 'Shakeitlaan 40', '2651LQ', 'Den Haag', 'Swaylor@vevo.com', '$2y$10$98iAXvmTsuOPYiYBLr.Zw.ace5Tv7X0GFbgW9eU4XqGLPhnTUdSKu'),
(8, 'Alles', 'Nielson', 'Oer 5', '5946DM', 'Amsterdam', 'Weetjewat@het.is', '$2y$10$LASgVsZEsnvJlXGkjYTOGuz.WT2wM5bTTuNXj5y/8uL2GJ5lEzhxG'),
(9, 'Ilse', 'de Groot', 'Spieringstraat 5', '3192AN', 'Hoogvliet', 'Ideplappf@kmdmk.com', '$2y$10$RZukUkFxsj/XKTq/0sYMaeFGfmEkHE65FhVZwwM8e3U6rW9ye9ItO');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klanten`
--

CREATE TABLE IF NOT EXISTS `klanten` (
`Klantnr` int(4) NOT NULL,
  `Voornaam` varchar(25) DEFAULT NULL,
  `Achternaam` varchar(30) DEFAULT NULL,
  `Adres` varchar(27) DEFAULT NULL,
  `Postcode` varchar(6) DEFAULT NULL,
  `Woonplaats` varchar(25) DEFAULT NULL,
  `Geslacht` varchar(1) DEFAULT NULL,
  `Abonneenr` int(1) DEFAULT NULL,
  `Startdatum` date DEFAULT NULL,
  `wachtwoord` varchar(255) NOT NULL,
  `Email` varchar(55) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Gegevens worden geëxporteerd voor tabel `klanten`
--

INSERT INTO `klanten` (`Klantnr`, `Voornaam`, `Achternaam`, `Adres`, `Postcode`, `Woonplaats`, `Geslacht`, `Abonneenr`, `Startdatum`, `wachtwoord`, `Email`) VALUES
(1, 'Emile', 'de Wilde', 'Spieringsstraat 5', '3192AN', 'Hoogvliet', 'M', 1, '2015-01-19', '', ''),
(2, 'André', 'de Bruin', 'Langelindelaan5', '3205RC', 'Spijkenisse', 'M', 2, '2015-02-10', '', ''),
(3, 'Zilver', 'Vlies', 'Zwaluwstraat 1', '3444JA', 'Breda', 'M', 1, '2013-12-21', '', ''),
(4, 'Adam', 'de Zwart', 'Poolsterstraat 80', '3222PC', 'Spijkenisse', 'M', 1, '2014-02-23', '', ''),
(5, 'Bob', 'de Bouwer', 'Feyenoord 1', '3333CC', 'Rotterdam', 'M', 1, '2013-05-17', '', ''),
(6, 'Sigrid', 'van Slot', 'Kalverstraat 39', '3488AB', 'Amsterdam', 'V', 2, '2014-02-25', '', ''),
(7, 'Martin', 'Bussluis', 'Eendenlaan 3', '3189JM', 'Zwolle', 'M', 3, '2013-12-12', '', ''),
(8, 'Lisa', 'de Wit', 'Zwanenlaan 5', '3139JM', 'Utrecht', 'V', 3, '2014-07-15', '', ''),
(9, 'Geert', 'Milders', 'Wilhelminastraat 7', '4444EI', 'Den Haag', 'V', 1, '2014-11-16', '', ''),
(10, 'Sarah', 'de Vla', 'koekeloeren 2', '3515GG', 'Spijkenisse', 'V', 2, '2015-02-16', '', ''),
(11, 'Willy', 'de Koning', 'Thuglaan 19', '3139JM', 'Utrecht', 'M', 2, '2014-01-10', '', ''),
(12, 'Gabriella', 'de Mol', 'Wolvenlaan 99', '1615LP', 'Spijkenisse', 'V', 2, '2014-07-02', '', ''),
(13, 'Yes', 'R', 'Hallélaan', '6526DW', 'Rotterdam', 'M', 2, '2015-03-01', '', ''),
(14, 'Tom', 'Poes', 'slakkenveen 8', '9552AJ', 'Hoogvliet', 'M', 3, '2015-02-01', '', ''),
(15, 'Romy', 'Blaastest', 'Griffinstraat21', '6161LA', 'Spijkenisse', 'V', 2, '2014-11-05', '', ''),
(16, 'Amanda', 'Molenaar', 'Kikkerlaan', '5162PS', 'Utrecht', 'V', 1, '2014-09-22', '', ''),
(17, 'Frans', 'Meeuwis', 'Jokersmitlaan 5', '1516RF', 'Spijkenisse', 'M', 2, '2015-02-18', '', ''),
(18, 'René', 'Kleinobbink', 'Blijdorp 8', '5456RF', 'Maastricht', 'M', 2, '2013-01-12', '', ''),
(19, 'Minoes', 'de Poes', 'Zwaggerstraat 6', '7330FA', 'Utrecht', 'V', 2, '2015-02-05', '', ''),
(20, 'Jan', 'de Vries', 'Hartelweg 25', '3555LO', 'Goes', 'M', 3, '2015-01-03', '', '');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `abonnementen`
--
ALTER TABLE `abonnementen`
 ADD PRIMARY KEY (`Abonneenr`);

--
-- Indexen voor tabel `admindata`
--
ALTER TABLE `admindata`
 ADD PRIMARY KEY (`Adminnummer`);

--
-- Indexen voor tabel `apparaten`
--
ALTER TABLE `apparaten`
 ADD PRIMARY KEY (`Apparaatnr`);

--
-- Indexen voor tabel `basicbeoordeling`
--
ALTER TABLE `basicbeoordeling`
 ADD PRIMARY KEY (`IDnr`);

--
-- Indexen voor tabel `klantapp`
--
ALTER TABLE `klantapp`
 ADD PRIMARY KEY (`idKlantapp`);

--
-- Indexen voor tabel `klantdata`
--
ALTER TABLE `klantdata`
 ADD PRIMARY KEY (`Klantnummer`);

--
-- Indexen voor tabel `klanten`
--
ALTER TABLE `klanten`
 ADD PRIMARY KEY (`Klantnr`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `admindata`
--
ALTER TABLE `admindata`
MODIFY `Adminnummer` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `apparaten`
--
ALTER TABLE `apparaten`
MODIFY `Apparaatnr` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT voor een tabel `basicbeoordeling`
--
ALTER TABLE `basicbeoordeling`
MODIFY `IDnr` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT voor een tabel `klantapp`
--
ALTER TABLE `klantapp`
MODIFY `idKlantapp` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT voor een tabel `klantdata`
--
ALTER TABLE `klantdata`
MODIFY `Klantnummer` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT voor een tabel `klanten`
--
ALTER TABLE `klanten`
MODIFY `Klantnr` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
