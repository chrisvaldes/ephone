-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 06 fév. 2024 à 15:19
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
('chris', 'chris@gmail.com', '2', 'Prison Break', 'pic-1.png', 'jqdhpepjs');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
