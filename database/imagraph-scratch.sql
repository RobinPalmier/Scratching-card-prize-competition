-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 01 avr. 2019 à 11:07
-- Version du serveur :  10.1.35-MariaDB
-- Version de PHP :  7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `imagraph-scratch`
--

-- --------------------------------------------------------

--
-- Structure de la table `participant`
--

CREATE TABLE `participant` (
  `id_participant` int(11) NOT NULL,
  `nom` varchar(150) NOT NULL,
  `prenom` varchar(150) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `participant`
--

INSERT INTO `participant` (`id_participant`, `nom`, `prenom`, `email`) VALUES
(0, 'init', 'init', 'init'),
(187, 'Palmier', 'Robin', 'robinpalgffffmier98@gmail.com'),
(188, 'Palmier', 'Robin', 'robidsfsdfsnpalfr54@gmail.com'),
(189, 'Palmier', 'Robin', 'robinpalmier54@gmail.com'),
(190, 'Palmier', 'Robin', 'gfdgdfgdgd@gmail.com'),
(191, 'Palmier', 'Robin', 'sdalmsfsdffdier54@gmail.com'),
(192, 'Palmier', 'Robin', '9999898re@gmail.com'),
(193, 'Palmier', 'Carlos', 'carlos.gambino@gmail.com'),
(194, 'Palmier', 'Robin', 'ldffsfsdfsse@gmail.com'),
(195, 'Palmier', 'Robin', '96325r54@gmail.com'),
(196, 'Palmier', 'Carlos', 'fgfdgdfgfdre@gmail.com'),
(197, 'Roberto', 'duchamp', '8989454ezrre@gmail.com'),
(198, 'Palmier', 'duchamp', 'fdsfsdfsfs@fdfsdfsdsf.fr'),
(199, 'Palmier', 'Carlos', 'sdfsfsssserrre@gmail.com'),
(200, 'Palmier', 'Robin', 'rob2542548@gmail.com'),
(201, 'Palmier', 'Robin', 'robinhfhfhfhfhf@gmail.com'),
(202, 'Palmier', 'Carlos', 'gfhnjhnjhnjhnjhnjhnjhnjhnjhnjhnjhn@gmail.com'),
(203, 'Palmier', 'Carlos', 'ezrzrzrz4@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `wincard`
--

CREATE TABLE `wincard` (
  `id_winCard` int(11) NOT NULL,
  `participant_id` int(11) NOT NULL DEFAULT '0',
  `nombre` int(11) NOT NULL,
  `lot` varchar(255) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `wincard`
--

INSERT INTO `wincard` (`id_winCard`, `participant_id`, `nombre`, `lot`, `image`) VALUES
(3, 0, 21, '- 10% offert sur les prestations Imagraph !', 'assets/images/card_10Presta.png'),
(4, 0, 98, '- 10% offert sur un shooting photo !', 'assets/images/card_10Shooting.png'),
(5, 0, 6, '1 mois de community management offert !', 'assets/images/card_CM.png'),
(6, 0, 54, 'Une caméra sport 4K - Wifi !', 'assets/images/card_camera.png');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`id_participant`);

--
-- Index pour la table `wincard`
--
ALTER TABLE `wincard`
  ADD PRIMARY KEY (`id_winCard`),
  ADD KEY `participant_id` (`participant_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `participant`
--
ALTER TABLE `participant`
  MODIFY `id_participant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;

--
-- AUTO_INCREMENT pour la table `wincard`
--
ALTER TABLE `wincard`
  MODIFY `id_winCard` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `wincard`
--
ALTER TABLE `wincard`
  ADD CONSTRAINT `wincard_ibfk_1` FOREIGN KEY (`participant_id`) REFERENCES `participant` (`id_participant`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
