-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 23 mars 2020 à 13:52
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `appg9b`
--

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

DROP TABLE IF EXISTS `personne`;
CREATE TABLE IF NOT EXISTS `personne` (
  `n°_identifiant` int(10) NOT NULL,
  `statut` varchar(20) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prénom` varchar(20) NOT NULL,
  `date_de_naissance` date NOT NULL,
  `n°_téléphone` int(8) NOT NULL,
  `adresse` text NOT NULL,
  `adresse_mail` text NOT NULL,
  `mot_de_passe` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `prise_de_rendezvous`
--

DROP TABLE IF EXISTS `prise_de_rendezvous`;
CREATE TABLE IF NOT EXISTS `prise_de_rendezvous` (
  `n°_prise_rendezvous` int(200) NOT NULL,
  `n°_rendezvous` int(200) NOT NULL,
  `n°_identifiant` int(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `rendezvous`
--

DROP TABLE IF EXISTS `rendezvous`;
CREATE TABLE IF NOT EXISTS `rendezvous` (
  `n°_rendezvous` int(200) NOT NULL,
  `n°_identifiant` int(200) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `rendezvous_donne_lieu_test`
--

DROP TABLE IF EXISTS `rendezvous_donne_lieu_test`;
CREATE TABLE IF NOT EXISTS `rendezvous_donne_lieu_test` (
  `n°_identifiant` int(200) NOT NULL,
  `n°_rendezvous` int(200) NOT NULL,
  `n°_test` int(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `n°_test` int(5) NOT NULL,
  `n°_identifiant` int(20) NOT NULL,
  `n°_rendezvous` int(20) NOT NULL,
  `score_total` int(255) NOT NULL,
  `fre_car_avant_test` int(200) NOT NULL,
  `fre_car_apres_test` int(200) NOT NULL,
  `temp_avant_test` int(40) NOT NULL,
  `temp_apres_test` int(40) NOT NULL,
  `rythme_visuel` int(100) NOT NULL,
  `rythme_auditif` int(100) NOT NULL,
  `stimulus_auditif` int(100) NOT NULL,
  `stimulus_visuel` int(100) NOT NULL,
  `reproduction_sonore` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
