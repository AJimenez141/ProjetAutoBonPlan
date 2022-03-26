-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 26 mars 2022 à 15:31
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bdd_autobonplan`
--

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUtil` int(11) NOT NULL,
  `nomUtil` varchar(25) COLLATE utf8_bin NOT NULL,
  `mdp` varchar(50) COLLATE utf8_bin NOT NULL,
  `role` varchar(25) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtil`, `nomUtil`, `mdp`, `role`) VALUES
(1, 'invité', 'fa4accf3d179996bb6c5933c69e0d985', 'guest'),
(2, 'admin', '85aac14e99386ee8f68c89372821b1ca', 'admin'),
(3, 'jdupont', '24bef1ee3ea867331e9bf69cb1da5096', 'guest'),
(4, 'pdubois', '7b93f61a0b930b6c3c2a3bade486573f', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

CREATE TABLE `vehicule` (
  `idArr` int(11) NOT NULL,
  `marque` varchar(25) COLLATE utf8_bin NOT NULL,
  `modele` varchar(25) COLLATE utf8_bin NOT NULL,
  `carburant` varchar(25) COLLATE utf8_bin NOT NULL,
  `dateArr` date NOT NULL,
  `fournisseur` varchar(25) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `vehicule`
--

INSERT INTO `vehicule` (`idArr`, `marque`, `modele`, `carburant`, `dateArr`, `fournisseur`) VALUES
(375, 'ALFA ROMEO', 'STELVIO', 'Diesel', '2021-01-04', 'LOCOTO'),
(376, 'AUDI', 'A1 SPORTBACK', 'Diesel', '2021-08-25', 'SAGA LENS'),
(377, 'AUDI', 'A3 SPORTBACK', 'Diesel', '2021-08-16', 'Aero Autofactoria'),
(378, 'AUDI', 'A3 SPORTBACK', 'Diesel', '2021-08-19', 'Aero Autofactoria'),
(379, 'AUDI', 'Q2', 'Diesel', '2021-01-11', 'AUTOBONPLAN'),
(380, 'BMW', 'SERIE 2 GRAN TOURER F46 L', 'Diesel', '2021-08-19', 'AERO - AQ ATLANTIQ'),
(381, 'BMW', 'SERIE 3 G20', 'Diesel', '2021-08-19', NULL),
(382, 'BMW', 'X1 F48', 'Diesel', '2021-09-01', 'VP Auto'),
(383, 'BMW', 'X3 G01', 'Diesel', '2021-08-19', 'Aero Autofactoria'),
(384, 'BMW', 'X3 G01', 'Diesel', '2021-08-19', 'Aero Autofactoria'),
(385, 'BMW', 'X4 G02', 'Diesel', '2021-08-19', 'Aero Autofactoria'),
(386, 'BMW', 'X4 G02', 'Diesel', '2021-08-19', 'Aero Autofactoria'),
(387, 'BMW', 'Z4 G29', 'Essence sans plomb', '2021-08-19', 'Aero Autofactoria'),
(388, 'CITROEN', 'C4 PICASSO', 'Diesel', '2020-03-17', 'SARL LOCOTO'),
(389, 'CITROEN', 'DS5', 'Diesel', '2021-08-30', 'LAUDRIN THIERRY'),
(390, 'CITROEN', 'DS5', 'Diesel / Courant électriq', '2021-08-27', 'MIGNET JULIEN'),
(391, 'DACIA', 'DUSTER', 'Diesel', '2021-07-15', 'RUIS VIRGINIE'),
(392, 'DACIA', 'SANDERO', 'Essence ou gaz', '2021-03-08', 'Glinche Automobile'),
(393, 'DS', 'DS3 CROSSBACK', 'Essence sans plomb', '2021-08-25', 'SAGA BOULOGNE'),
(394, 'DS', 'DS7 CROSSBACK', 'Diesel', '2021-08-27', 'STARTERRE'),
(395, 'FIAT ', '500 SERIE 6', 'Essence sans plomb', '2020-07-07', NULL),
(396, 'FIAT ', '500 SERIE 8 EURO 6D-TEMP', 'Essence sans plomb', '2020-06-26', 'STARTERRE'),
(397, 'FIAT', 'GRANDE PUNTO', 'Diesel', '2021-08-26', 'BERNARD AUDREY'),
(398, 'FIAT', 'TIPO STATION WAGON MY19 E', 'Diesel', '2021-09-01', 'VP Auto');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUtil`);

--
-- Index pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD PRIMARY KEY (`idArr`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUtil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `vehicule`
--
ALTER TABLE `vehicule`
  MODIFY `idArr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=399;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
