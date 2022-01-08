-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 08 jan. 2022 à 20:14
-- Version du serveur : 10.4.19-MariaDB
-- Version de PHP : 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE `datamanager`;
USE `datamanager`;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `datamanager`
--

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `matricule` varchar(7) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `filiere` varchar(15) NOT NULL,
  `reference` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`matricule`, `nom`, `filiere`, `reference`) VALUES
('15Y2490', 'yaya toure', 'informatique', 'etudiant'),
('16Y3478', 'lionnel messi', 'mathematique', 'etudiant'),
('15Y2490', 'yaya toure', 'informatique', 'etudiant'),
('16Y3478', 'lionnel messi', 'mathematique', 'etudiant');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
