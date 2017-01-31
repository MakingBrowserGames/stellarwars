-- phpMyAdmin SQL Dump
-- version 4.0.8
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Dim 08 Décembre 2013 à 15:06
-- Version du serveur: 5.5.32-cll
-- Version de PHP: 5.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `iinick_unifight`
--

-- --------------------------------------------------------

--
-- Structure de la table `uni1_jackpot_logs`
--

CREATE TABLE IF NOT EXISTS `uni1_jackpot_logs` (
  `name` varchar(32) NOT NULL,
  `date` int(11) NOT NULL DEFAULT '0',
  `reward` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `uni1_jackpot_logs`
--

INSERT INTO `uni1_jackpot_logs` (`name`, `date`, `reward`) VALUES
('Tech', 1383342997, 110000),
('Tech', 1383586414, 100000),
('DonCorleone', 1384295447, 200000),
('DonCorleone', 1384383626, 60000),
('DonCorleone', 1384468741, 70000),
('Jipper', 1384713530, 100000),
('admin', 1384799600, 70000),
('DonCorleone', 1385215425, 140000),
('DonCorleone', 1385465873, 110000),
('DonCorleone', 1385608388, 80000),
('admin', 1385911686, 110000),
('DonCorleone', 1386112941, 100000),
('DonCorleone', 1386426818, 110000),
('admin', 1386468758, 60000);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
