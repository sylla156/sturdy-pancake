-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Lun 23 Janvier 2023 à 16:39
-- Version du serveur: 5.5.8
-- Version de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `gestion_des_prospects`
--

-- --------------------------------------------------------

--
-- Structure de la table `action`
--

CREATE TABLE IF NOT EXISTS `action` (
  `idAction` int(11) NOT NULL AUTO_INCREMENT,
  `categorie` text NOT NULL,
  `fkAdmin` int(11) NOT NULL,
  `fkProspect` int(11) NOT NULL,
  `commentaire` text NOT NULL,
  PRIMARY KEY (`idAction`),
  KEY `fkAdmin` (`fkAdmin`),
  KEY `fkProspect` (`fkProspect`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `action`
--


-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `idAdmin` int(11) NOT NULL AUTO_INCREMENT,
  `nom` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `motPasse` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `niveau` int(11) NOT NULL,
  PRIMARY KEY (`idAdmin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`idAdmin`, `nom`, `email`, `motPasse`, `niveau`) VALUES
(3, 'Gama', 'emmanuel.gama@bemtech.ci', '40441217', 1);

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

CREATE TABLE IF NOT EXISTS `filiere` (
  `idFiliere` int(11) NOT NULL AUTO_INCREMENT,
  `nomFiliere` varchar(45) NOT NULL,
  PRIMARY KEY (`idFiliere`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `filiere`
--

INSERT INTO `filiere` (`idFiliere`, `nomFiliere`) VALUES
(1, 'BST'),
(2, 'BITN'),
(3, 'BISD');

-- --------------------------------------------------------

--
-- Structure de la table `prospects`
--

CREATE TABLE IF NOT EXISTS `prospects` (
  `idProspect` int(11) NOT NULL AUTO_INCREMENT,
  `nomProspect` varchar(100) NOT NULL,
  `ageProspect` varchar(3) DEFAULT NULL,
  `telProspect` varchar(10) NOT NULL,
  `adrProspect` varchar(60) NOT NULL,
  `emailProspect` varchar(50) DEFAULT NULL,
  `genreProspect` enum('M','F') NOT NULL,
  `origineProspect` longtext NOT NULL,
  `serieProspect` varchar(100) NOT NULL,
  `fkFiliere` int(11) NOT NULL,
  PRIMARY KEY (`idProspect`),
  KEY `fkFiliere` (`fkFiliere`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Contenu de la table `prospects`
--

INSERT INTO `prospects` (`idProspect`, `nomProspect`, `ageProspect`, `telProspect`, `adrProspect`, `emailProspect`, `genreProspect`, `origineProspect`, `serieProspect`, `fkFiliere`) VALUES
(52, 'MAMBEY Sandra Marie-Michelle ', '22 ', '0102030405', 'abatta', 'sandra45121224@gmail.com', 'F', 'victor shoelcher', 'D', 3),
(53, 'NZALE NELLY', '12', '0706133212', 'Angre', 'nelly.nzale@bemtech.ci', 'F', 'BEM', 'S', 1),
(54, 'N''zore Martine', '20', '0205040477', 'mahou', 'kk@gmail.vom', 'F', 'Cestia', 'D', 2);

-- --------------------------------------------------------

--
-- Structure de la table `recup_mdp`
--

CREATE TABLE IF NOT EXISTS `recup_mdp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Contenu de la table `recup_mdp`
--


--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `action`
--
ALTER TABLE `action`
  ADD CONSTRAINT `action_ibfk_1` FOREIGN KEY (`fkAdmin`) REFERENCES `admin` (`idAdmin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `action_ibfk_2` FOREIGN KEY (`fkProspect`) REFERENCES `prospects` (`idProspect`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `prospects`
--
ALTER TABLE `prospects`
  ADD CONSTRAINT `prospects_ibfk_1` FOREIGN KEY (`fkFiliere`) REFERENCES `filiere` (`idFiliere`) ON DELETE CASCADE ON UPDATE CASCADE;
