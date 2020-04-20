-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
<<<<<<< HEAD
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 20 avr. 2020 à 09:40
-- Version du serveur :  10.4.10-MariaDB
=======
-- Hôte : 127.0.0.1:3308
-- Généré le :  lun. 20 avr. 2020 à 09:19
-- Version du serveur :  8.0.18
>>>>>>> leopold
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
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
<<<<<<< HEAD
<<<<<<< HEAD
  `ID_Administrateur` int(4) NOT NULL,
<<<<<<< HEAD
  `Mot_de_passe` varchar(100) NOT NULL,
=======
=======
  `ID_Administrateur` int(4) NOT NULL AUTO_INCREMENT,
>>>>>>> parent of ba6e8bc... Update appg9b.sql
=======
  `ID_Administrateur` int(4) NOT NULL AUTO_INCREMENT,
>>>>>>> parent of ba6e8bc... Update appg9b.sql
  `Mot_de_passe` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
>>>>>>> leopold
  PRIMARY KEY (`ID_Administrateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

DROP TABLE IF EXISTS `faq`;
CREATE TABLE IF NOT EXISTS `faq` (
  `N°_FAQ` int(11) NOT NULL,
  `Contenu` text NOT NULL,
  `Questions` varchar(100) NOT NULL,
  `Réponses` varchar(300) NOT NULL,
  `ID_Aministrateur` int(4) NOT NULL,
  PRIMARY KEY (`N°_FAQ`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `faq`
--

INSERT INTO `faq` (`N°_FAQ`, `Contenu`, `Questions`, `Réponses`, `ID_Aministrateur`) VALUES
(1, '', '', '', 0),
(2, '', '', '', 0),
(3, '', '', '', 0),
(4, '', '', '', 0),
(5, '', '', '', 0),
(6, '', '', '', 0),
(7, '', 'Array', 'Array', 0),
(8, '', 'Array', 'Array', 0),
(9, '', 'Array', 'Array', 0),
(10, '', 'Array', 'Array', 0),
(11, '', 'Array', 'Array', 0),
(12, '', 'Array', 'Array', 0),
(13, '', 'Array', 'Array', 0),
(14, '', 'Array', 'Array', 0),
(15, '', 'Array', 'Array', 0);

-- --------------------------------------------------------

--
-- Structure de la table `forum`
--

DROP TABLE IF EXISTS `forum`;
CREATE TABLE IF NOT EXISTS `forum` (
  `N°_Question` int(11) NOT NULL,
  `Theme` varchar(50) NOT NULL,
  `Contenu` text NOT NULL,
  `Date` datetime NOT NULL,
  `Question_&_Reponse` text NOT NULL,
  PRIMARY KEY (`N°_Question`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `gestionnaire`
--

DROP TABLE IF EXISTS `gestionnaire`;
CREATE TABLE IF NOT EXISTS `gestionnaire` (
<<<<<<< HEAD
<<<<<<< HEAD
  `ID_Gestionnaire` int(4) NOT NULL,
<<<<<<< HEAD
  `Mot_de_passe` int(20) NOT NULL,
=======
=======
  `ID_Gestionnaire` int(10) NOT NULL AUTO_INCREMENT,
>>>>>>> parent of ba6e8bc... Update appg9b.sql
=======
  `ID_Gestionnaire` int(10) NOT NULL AUTO_INCREMENT,
>>>>>>> parent of ba6e8bc... Update appg9b.sql
  `Mot_de_passe` int(255) NOT NULL,
>>>>>>> leopold
  `Nom_auto_ecole` varchar(200) NOT NULL,
  PRIMARY KEY (`ID_Gestionnaire`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `N_du_test` int(11) NOT NULL AUTO_INCREMENT,
  `Date` datetime NOT NULL,
  `Score_total` int(11) NOT NULL,
  `Res_freq_card_avant_test` int(11) NOT NULL,
  `Res_freq_card_apres_test` int(11) NOT NULL,
  `Res_temp_avant_test` int(11) NOT NULL,
  `Res_temp_apres_test` int(11) NOT NULL,
  `Res_rythme_visuel` int(11) NOT NULL,
  `Res_stimulus_visuel` int(11) NOT NULL,
  `Res_rythme_sonore` int(11) NOT NULL,
  `Res_stimulus_sonore` int(11) NOT NULL,
  `Res_reprod_sonore` int(11) NOT NULL,
  `ID_Utilisateur` int(10) NOT NULL,
  `ID_Gestionnaire` int(10) NOT NULL,
  PRIMARY KEY (`N_du_test`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
<<<<<<< HEAD
<<<<<<< HEAD
  `IDUtilisateur` int(4) NOT NULL,
<<<<<<< HEAD
  `Mot_de_passe` varchar(20) NOT NULL,
=======
=======
  `IDUtilisateur` int(10) NOT NULL AUTO_INCREMENT,
>>>>>>> parent of ba6e8bc... Update appg9b.sql
=======
  `IDUtilisateur` int(10) NOT NULL AUTO_INCREMENT,
>>>>>>> parent of ba6e8bc... Update appg9b.sql
  `Mot_de_passe` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
>>>>>>> leopold
  `Nom` varchar(30) NOT NULL,
  `Prenom` varchar(30) NOT NULL,
  `Date_de_naissance` date NOT NULL,
  `N_de_telephone` int(8) NOT NULL,
  `Adresse` varchar(150) NOT NULL,
  `Adresse_email` varchar(100) NOT NULL,
  PRIMARY KEY (`IDUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
