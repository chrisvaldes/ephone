-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 07 fév. 2024 à 14:49
-- Version du serveur : 8.0.27
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ephonebook`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `idContact` int NOT NULL AUTO_INCREMENT,
  `contactNumber` int DEFAULT NULL,
  `nameContact` varchar(255) DEFAULT NULL,
  `userEmail` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idContact`),
  KEY `userEmail` (`userEmail`(250))
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`idContact`, `contactNumber`, `nameContact`, `userEmail`) VALUES
(1, 2147483647, 'valdes chris', 'valdes@gmail.com'),
(3, 656651773, 'valdes', 'chris@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `idMessage` int NOT NULL AUTO_INCREMENT,
  `userEMail` varchar(60) DEFAULT NULL,
  `userMessage` text,
  PRIMARY KEY (`idMessage`),
  KEY `userEMail` (`userEMail`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`idMessage`, `userEMail`, `userMessage`) VALUES
(1, 'chris@gmail.com', 'Bonjour val'),
(2, 'chris@gmail.com', 'Bonjour val'),
(3, 'chris@gmail.com', 'comment tu vas?');

-- --------------------------------------------------------

--
-- Structure de la table `userapp`
--

DROP TABLE IF EXISTS `userapp`;
CREATE TABLE IF NOT EXISTS `userapp` (
  `userEmail` varchar(60) NOT NULL,
  `userName` varchar(255) DEFAULT NULL,
  `userPrefer` varchar(60) DEFAULT NULL,
  `userAnswer` varchar(255) DEFAULT NULL,
  `userPhoto` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `userPassword` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`userEmail`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `userapp`
--

INSERT INTO `userapp` (`userEmail`, `userName`, `userPrefer`, `userAnswer`, `userPhoto`, `userPassword`) VALUES
('valdes@gmail.com', 'valdes', '3', 'naruto', 'nightshade.jpg', 'kmqgjorml'),
('chris@gmail.com', 'chris', '3', 'tintin', 'the_girl_of_ink_and_stars.jpg', 'jsdhfopzep');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
