-- phpMyAdmin SQL Dump
-- version 3.3.2deb1ubuntu1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 17, 2015 at 10:11 AM
-- Server version: 5.1.73
-- PHP Version: 5.3.2-1ubuntu4.30

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ebicego-PR`
--

-- --------------------------------------------------------

--
-- Table structure for table `aderente`
--

CREATE TABLE IF NOT EXISTS `aderente` (
  `persona` int(11) NOT NULL,
  `anno` year(4) NOT NULL,
  `ruolo` enum('GE','AR','AN') NOT NULL,
  PRIMARY KEY (`persona`,`anno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aderente`
--

INSERT INTO `aderente` (`persona`, `anno`, `ruolo`) VALUES
(1, 2008, 'AN'),
(1, 2014, 'AR'),
(1, 2015, 'AR'),
(8, 2015, 'AN'),
(12, 2015, 'AN'),
(16, 2015, 'AR'),
(27, 2014, 'AN'),
(27, 2015, 'AN'),
(35, 2014, 'AN'),
(35, 2015, 'AN'),
(49, 2013, 'GE'),
(49, 2014, 'GE'),
(57, 2015, 'AR'),
(59, 2008, 'AR'),
(62, 2008, 'AR'),
(86, 2015, 'AN'),
(93, 2008, 'AR');

-- --------------------------------------------------------

--
-- Table structure for table `appartenenza`
--

CREATE TABLE IF NOT EXISTS `appartenenza` (
  `aderentePersona` int(11) NOT NULL DEFAULT '0',
  `aderenteAnno` year(4) NOT NULL,
  `tappaNumRif` enum('1','2','3','4','5') NOT NULL DEFAULT '1',
  `tappaAnnoInizio` year(4) NOT NULL DEFAULT '0000',
  `tappaAnnoFine` year(4) NOT NULL DEFAULT '0000',
  PRIMARY KEY (`aderentePersona`,`aderenteAnno`,`tappaNumRif`,`tappaAnnoInizio`,`tappaAnnoFine`),
  KEY `appartenenza_ibfk_2` (`tappaNumRif`,`tappaAnnoInizio`,`tappaAnnoFine`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appartenenza`
--

INSERT INTO `appartenenza` (`aderentePersona`, `aderenteAnno`, `tappaNumRif`, `tappaAnnoInizio`, `tappaAnnoFine`) VALUES
(1, 2008, '1', 2008, 2009),
(59, 2008, '1', 2008, 2009),
(62, 2008, '1', 2008, 2009),
(93, 2008, '1', 2008, 2009),
(1, 2014, '1', 2013, 2014),
(35, 2014, '1', 2013, 2014),
(8, 2015, '1', 2014, 2015),
(12, 2015, '1', 2014, 2015),
(16, 2015, '1', 2014, 2015),
(86, 2015, '1', 2014, 2015),
(1, 2015, '2', 2014, 2015),
(27, 2014, '2', 2014, 2015),
(27, 2015, '2', 2014, 2015),
(35, 2014, '2', 2014, 2015),
(35, 2015, '2', 2014, 2015);

-- --------------------------------------------------------

--
-- Table structure for table `evento`
--

CREATE TABLE IF NOT EXISTS `evento` (
  `nome` varchar(60) NOT NULL,
  `descrizione` varchar(1000) DEFAULT NULL,
  `stagione` enum('primavera','estate','autunno','inverno') DEFAULT NULL,
  PRIMARY KEY (`nome`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `evento`
--

INSERT INTO `evento` (`nome`, `descrizione`, `stagione`) VALUES
('Apertura Anno Ac2mms', '...', 'autunno'),
('Campeggio', '...', 'estate'),
('Chiusura Anno Ac2mms', '...', 'primavera'),
('Festa di Carnevale Ac2mms', '...', 'inverno'),
('Festa di Natale', '...', 'inverno'),
('Kart Endurance', '...', 'primavera'),
('Marronata', '...', 'autunno'),
('Uscita Pasquale', '...', 'primavera');

-- --------------------------------------------------------

--
-- Table structure for table `istanzaevento`
--

CREATE TABLE IF NOT EXISTS `istanzaevento` (
  `evento` varchar(60) NOT NULL DEFAULT '',
  `dataInizio` date NOT NULL DEFAULT '0000-00-00',
  `dataFine` date DEFAULT NULL,
  `luogo` varchar(40) DEFAULT '',
  `nPartecipanti` smallint(6) DEFAULT '0',
  `programma` varchar(1000) DEFAULT '',
  `tema` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`evento`,`dataInizio`),
  KEY `istanzaevento_ibfk_2` (`tema`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `istanzaevento`
--

INSERT INTO `istanzaevento` (`evento`, `dataInizio`, `dataFine`, `luogo`, `nPartecipanti`, `programma`, `tema`) VALUES
('Apertura Anno Ac2mms', '2015-10-01', '2015-10-01', 'Monticello di Fara', 3, 'N.D.', NULL),
('Campeggio', '2014-07-19', '2014-07-27', 'Val Malene', 1, 'N.D', 'Il Pianeta del Tesoro'),
('Campeggio', '2015-08-02', '2015-09-01', '', 0, 'Lorem ipsum...', 'Il Destino di un Cavaliere'),
('Festa di Natale', '2015-12-26', '2015-12-26', '', 1, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `partecipazione`
--

CREATE TABLE IF NOT EXISTS `partecipazione` (
  `persona` int(11) NOT NULL DEFAULT '0',
  `anno` year(4) NOT NULL DEFAULT '0000',
  `dataInizio` date NOT NULL DEFAULT '0000-00-00',
  `evento` varchar(40) NOT NULL DEFAULT '',
  PRIMARY KEY (`persona`,`anno`,`dataInizio`,`evento`),
  KEY `partecipazione_ibfk_2` (`evento`,`dataInizio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `partecipazione`
--

INSERT INTO `partecipazione` (`persona`, `anno`, `dataInizio`, `evento`) VALUES
(1, 2015, '2015-10-01', 'Apertura Anno Ac2mms'),
(27, 2015, '2015-10-01', 'Apertura Anno Ac2mms'),
(35, 2015, '2015-10-01', 'Apertura Anno Ac2mms'),
(35, 2014, '2014-07-19', 'Campeggio'),
(1, 2015, '2015-12-26', 'Festa di Natale');

-- --------------------------------------------------------

--
-- Table structure for table `persona`
--

CREATE TABLE IF NOT EXISTS `persona` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) NOT NULL,
  `cognome` varchar(40) NOT NULL,
  `sesso` enum('M','F') NOT NULL,
  `dataNascita` date NOT NULL,
  `luogoNascita` varchar(40) NOT NULL,
  `telefono` decimal(10,0) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `parrocchia` varchar(40) NOT NULL,
  `assicurato` enum('si','no') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=101 ;

--
-- Dumping data for table `persona`
--

INSERT INTO `persona` (`id`, `nome`, `cognome`, `sesso`, `dataNascita`, `luogoNascita`, `telefono`, `email`, `parrocchia`, `assicurato`) VALUES
(1, 'Eduard', 'Bicego', 'M', '1994-07-16', 'Arzignano', '3495043456', 'eduard.bicego@gmail.com', 'Monticello di Fara', 'si'),
(8, 'Fabio', 'Gasparri', 'M', '2000-01-01', 'Soave', '3456789000', 'fabio.gasp@gmail.com', 'Meledo', 'no'),
(12, 'Giacomo', 'Lodato', 'M', '2000-01-01', 'Vicenza', '3456789000', 'giacomo.lodato@gmail.com', 'Meledo', 'no'),
(16, 'Walter', 'Cherobin', 'M', '1993-01-01', 'Vicenza', '3456789000', 'walter.cherobin@gmail.com', 'Sarego', 'si'),
(27, 'Paolo', 'Salmone', 'M', '1999-01-01', 'Vicenza', '3456789000', 'null', 'Meledo', 'no'),
(35, 'Marco', 'Zappa', 'M', '1999-01-01', 'Vicenza', '3456789000', 'null', 'Meledo', 'si'),
(49, 'Claudio', 'Rasato', 'M', '1946-01-01', 'Vicenza', '3456789000', 'null', 'Meledo', 'no'),
(57, 'Marco', 'Cinico', 'M', '1988-04-22', 'Arzignano', '3456789000', 'marco.cinico@gmail.com', 'Monticello di Fara', 'no'),
(59, 'Alessandro', 'Taroz', 'M', '1978-02-26', 'Montecchio Maggiore', '3456789000', 'yuzar.taroz@libero.it', 'Sarego', 'no'),
(62, 'Silvia', 'Pellizzari', 'F', '1989-09-29', 'Arzignano', '3456789000', 'silviettina89@gmail.com', 'Sarego', 'no'),
(86, 'Marco', 'Cinico', 'M', '2000-02-08', 'Soave', '3456789000', 'null', 'Meledo', 'no'),
(93, 'Michela', 'Zamboni', 'F', '1989-08-08', 'Arzignano', '3336568908', 'miki89@live.it', 'Meledo', 'no'),
(98, 'Antonino', 'Macri''', 'M', '1993-01-01', 'Cinquefrondi''', '0', '', 'D''aorle', 'no'),
(99, 'a', 'a', 'M', '1911-11-11', 'pippo', '0', '', '', 'si'),
(100, 'b', 'b', 'M', '2010-11-11', 'a', '0', '', '', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `tappa`
--

CREATE TABLE IF NOT EXISTS `tappa` (
  `numRiferimento` enum('1','2','3','4','5') NOT NULL DEFAULT '1',
  `annoInizio` year(4) NOT NULL DEFAULT '0000',
  `annoFine` year(4) NOT NULL DEFAULT '0000',
  `annata` year(4) DEFAULT NULL,
  PRIMARY KEY (`numRiferimento`,`annoInizio`,`annoFine`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tappa`
--

INSERT INTO `tappa` (`numRiferimento`, `annoInizio`, `annoFine`, `annata`) VALUES
('1', 2008, 2009, 1994),
('1', 2010, 2011, 1996),
('1', 2011, 2012, 1997),
('1', 2012, 2013, 1998),
('1', 2013, 2014, 1999),
('1', 2014, 2015, 2000),
('1', 2015, 2016, 2001),
('2', 2009, 2010, 1994),
('2', 2011, 2012, 1996),
('2', 2012, 2013, 1997),
('2', 2013, 2014, 1998),
('2', 2014, 2015, 1999),
('2', 2015, 2016, 2000),
('2', 2016, 2017, 2001),
('3', 2010, 2011, 1994),
('3', 2012, 2013, 1996),
('3', 2013, 2014, 1997),
('3', 2014, 2015, 1998),
('3', 2015, 2016, 1999),
('3', 2016, 2017, 2000),
('3', 2017, 2018, 2001),
('4', 2011, 2012, 1994),
('4', 2013, 2014, 1996),
('4', 2014, 2015, 1997),
('4', 2015, 2016, 1998),
('4', 2016, 2017, 1999),
('4', 2017, 2018, 2000),
('4', 2018, 2019, 2001),
('5', 2012, 2013, 1994),
('5', 2014, 2015, 1996),
('5', 2015, 2016, 1997),
('5', 2016, 2017, 1998),
('5', 2017, 2018, 1999),
('5', 2018, 2019, 2000),
('5', 2019, 2020, 2001);

-- --------------------------------------------------------

--
-- Table structure for table `tema`
--

CREATE TABLE IF NOT EXISTS `tema` (
  `nome` varchar(70) NOT NULL,
  `descrizione` varchar(1000) NOT NULL DEFAULT '',
  PRIMARY KEY (`nome`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tema`
--

INSERT INTO `tema` (`nome`, `descrizione`) VALUES
('Coraggio', '...'),
('Hunter', '...'),
('Il Destino di un Cavaliere', '...'),
('Il Pianeta del Tesoro', '...'),
('Il Piccolo Principe', '...'),
('Il Popolo del Grande Spirito', '...'),
('Il Signore degli Anelli', '...'),
('One Piece', '...'),
('Pinocchio', '...'),
('Pirati dei Caraibi', '...'),
('Profeti', '...'),
('Un mondo Economico o un mondo di Economia?', '...'),
('Zaino in spalla', '...');

-- --------------------------------------------------------

--
-- Table structure for table `utente`
--

CREATE TABLE IF NOT EXISTS `utente` (
  `username` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utente`
--

INSERT INTO `utente` (`username`, `password`) VALUES
('admin', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec'),
('socio', 'd6feb0b6676b7ae185581a8fb490fc1c12651346366fc24ddff28e1292e707c0bc5c09fc6018796ebf85e6e1b511c89109b145be32cf67ddcf9b955e8ab3bb58');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aderente`
--
ALTER TABLE `aderente`
  ADD CONSTRAINT `aderente_ibfk_1` FOREIGN KEY (`persona`) REFERENCES `persona` (`id`);

--
-- Constraints for table `appartenenza`
--
ALTER TABLE `appartenenza`
  ADD CONSTRAINT `appartenenza_ibfk_1` FOREIGN KEY (`aderentePersona`, `aderenteAnno`) REFERENCES `aderente` (`persona`, `anno`),
  ADD CONSTRAINT `appartenenza_ibfk_2` FOREIGN KEY (`tappaNumRif`, `tappaAnnoInizio`, `tappaAnnoFine`) REFERENCES `tappa` (`numRiferimento`, `annoInizio`, `annoFine`);

--
-- Constraints for table `istanzaevento`
--
ALTER TABLE `istanzaevento`
  ADD CONSTRAINT `istanzaevento_ibfk_1` FOREIGN KEY (`evento`) REFERENCES `evento` (`nome`),
  ADD CONSTRAINT `istanzaevento_ibfk_2` FOREIGN KEY (`tema`) REFERENCES `tema` (`nome`);

--
-- Constraints for table `partecipazione`
--
ALTER TABLE `partecipazione`
  ADD CONSTRAINT `partecipazione_ibfk_1` FOREIGN KEY (`persona`, `anno`) REFERENCES `aderente` (`persona`, `anno`),
  ADD CONSTRAINT `partecipazione_ibfk_2` FOREIGN KEY (`evento`, `dataInizio`) REFERENCES `istanzaevento` (`evento`, `dataInizio`) ON DELETE CASCADE;
