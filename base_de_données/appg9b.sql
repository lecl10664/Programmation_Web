-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 19 avr. 2020 à 14:32
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
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `ID_Administrateur` int(4) NOT NULL,
  `Mot_de_passe` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_Administrateur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  PRIMARY KEY (`N°_FAQ`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `faq`
--

INSERT INTO `faq` (`N°_FAQ`, `Contenu`, `Questions`, `Réponses`) VALUES
(1, '', 'Comment prendre rendez-vous ?', 'Pour prendre rendez-vous, veuillez nous contacter via la page Nous contacter. Il est également possible de prendre rendez-vous en vous rendant à l\'adresse suivante : ... '),
(2, '', 'En quoi consistent les tests ?', 'Les tests sont divisés en deux catégories : les tests visuels et les tests sonores. Ces tests permettent d\'évaluer votre capacité à retenir un rythme, à reconnaître un son familier ou encore à mesurer votre temps de réaction. '),
(3, '', 'Quel est le coût d\'un test ?', 'Nos tests coûtent entre 50€ et 100€.'),
(4, '', 'Comment accéder à mes résultats ?', 'Dans un premier temps, vous devez vous connecter en tant qu\'utilisateur à l\'aide des informations qui vous ont été fournies par InfiniteMeasures. Une fois connecté, rendez-vous sur la page dédiée : Page d\'accueil. '),
(5, '', 'Comment contacter un administrateur ?', 'Les informations de contact des administrateurs sont disponibles à cette adresse : Nous contacter. '),
(6, '', '', ''),
(7, '', '', ''),
(8, '', '', ''),
(9, '', '', ''),
(10, '', '', ''),
(11, '', '', ''),
(12, '', '', ''),
(13, '', '', ''),
(14, '', '', ''),
(15, '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `forum`
--

DROP TABLE IF EXISTS `forum`;
CREATE TABLE IF NOT EXISTS `forum` (
  `N°_Question` int(11) NOT NULL,
  `Theme` varchar(50) NOT NULL,
  `Contenu` text NOT NULL,
  `Date` date NOT NULL,
  `Question_&_Reponse` text NOT NULL,
  PRIMARY KEY (`N°_Question`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `gestionnaire`
--

DROP TABLE IF EXISTS `gestionnaire`;
CREATE TABLE IF NOT EXISTS `gestionnaire` (
  `ID_Gestionnaire` int(4) NOT NULL,
  `Mot_de_passe` int(20) NOT NULL,
  `Nom_auto_ecole` varchar(200) NOT NULL,
  PRIMARY KEY (`ID_Gestionnaire`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `N°_du_test` int(11) NOT NULL,
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
  PRIMARY KEY (`N°_du_test`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `IDUtilisateur` int(4) NOT NULL,
  `Mot_de_passe` varchar(20) NOT NULL,
  `Nom` varchar(30) NOT NULL,
  `Prenom` varchar(30) NOT NULL,
  `Date_de_naissance` date NOT NULL,
  `N°_de_telephone` int(8) NOT NULL,
  `Adresse` varchar(150) NOT NULL,
  `Adresse_email` varchar(100) NOT NULL,
  PRIMARY KEY (`IDUtilisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
