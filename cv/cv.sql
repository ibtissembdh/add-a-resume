-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 28 sep. 2020 à 20:28
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cv`
--

-- --------------------------------------------------------

--
-- Structure de la table `competence`
--

CREATE TABLE `competence` (
  `idCom` int(40) NOT NULL,
  `user_id` int(40) NOT NULL,
  `competence` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `competence`
--

INSERT INTO `competence` (`idCom`, `user_id`, `competence`) VALUES
(103, 75, 'xxxxxxxx'),
(110, 82, 'xxxxxxxx'),
(111, 83, 'xxxxxxxx'),
(113, 144, 'java'),
(114, 144, 'php');

-- --------------------------------------------------------

--
-- Structure de la table `experience`
--

CREATE TABLE `experience` (
  `idEX` int(40) NOT NULL,
  `user_id` int(40) NOT NULL,
  `intituleE` varchar(40) NOT NULL,
  `ex_dateDebut` date NOT NULL,
  `ex_dateFin` date NOT NULL,
  `ex_description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `experience`
--

INSERT INTO `experience` (`idEX`, `user_id`, `intituleE`, `ex_dateDebut`, `ex_dateFin`, `ex_description`) VALUES
(97, 75, 'dddddd', '2222-02-22', '2222-02-22', 'xxxxxxxxx'),
(104, 82, 'dddddd', '2020-06-20', '2020-06-20', 'vuggyg'),
(105, 83, 'infographie', '2222-02-22', '2222-02-22', 'vuggyg'),
(126, 143, 'infographie 2D', '2222-02-22', '2222-02-22', 'desc infographie 2D'),
(127, 143, 'web', '2020-04-03', '2022-04-05', 'desc web'),
(128, 144, 'ex un', '2020-07-01', '2020-09-06', 'ex desc de un'),
(129, 144, 'ex deux', '2020-06-03', '2020-06-13', 'desc de deux');

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `idFR` int(40) NOT NULL,
  `user_id` int(40) NOT NULL,
  `intituleF` varchar(40) NOT NULL,
  `dp_dateDebut` date NOT NULL,
  `dp_dateFin` date NOT NULL,
  `dp_description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`idFR`, `user_id`, `intituleF`, `dp_dateDebut`, `dp_dateFin`, `dp_description`) VALUES
(106, 75, 'mohim formation', '2222-02-22', '2222-02-22', 'mohom description'),
(113, 82, 'soft developer', '2020-06-20', '2020-06-20', 'jnjknjknjknjk'),
(114, 83, 'ssssssss', '2222-02-22', '2222-02-22', 'jnjknjknjknjk'),
(135, 143, 'devlopememt web et infographie', '2222-02-22', '2222-02-22', 'desc dev web and info'),
(136, 143, 'front web dev', '2222-02-22', '2222-02-22', 'desc front web '),
(137, 144, 'de un', '2020-09-03', '2020-09-06', 'dec de un'),
(138, 144, 'de deux', '2020-10-04', '2020-10-25', 'decv de deux');

-- --------------------------------------------------------

--
-- Structure de la table `loisir`
--

CREATE TABLE `loisir` (
  `idLoi` int(40) NOT NULL,
  `user_id` int(40) NOT NULL,
  `loisir` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `loisir`
--

INSERT INTO `loisir` (`idLoi`, `user_id`, `loisir`) VALUES
(97, 75, 'zzzzzzzz'),
(104, 82, 'zzzzzzzz'),
(105, 83, 'hhj'),
(126, 143, 'sport'),
(127, 143, 'swim'),
(128, 144, 'besket'),
(129, 144, 'foot');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(40) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `tel` int(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `titre` varchar(40) NOT NULL,
  `date` date NOT NULL,
  `photo` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `tel`, `email`, `titre`, `date`, `photo`) VALUES
(75, 'adel', 'ibtissem', 33333333, '0660481370', 'zzzzzz', '2222-02-22', 0x433a5c66616b65706174685c6c6f676f522d46494e414c452e706e67),
(82, 'zzzzz', 'ibtissem', 33333333, 'adel.chiekh754@gmail.com', 'zzzzzz', '2020-06-20', 0x433a5c66616b65706174685c6c6f676f522d46494e414c452e706e67),
(83, 'ben', 'ibtissem', 33333333, 'Sofianebendouhou95@gmail.com', 'developpement  web', '2222-02-22', 0x433a5c66616b65706174685c494d475f393932352e4a5047),
(143, 'yasmina', 'bendouhou', 2147483647, 'yasmine@gmail.com', 'web developper', '2000-03-12', ''),
(144, 'bendouhouu', 'saliima', 214748364, 'salima@gmail.com', 'banqua', '2010-09-27', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `competence`
--
ALTER TABLE `competence`
  ADD PRIMARY KEY (`idCom`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`idEX`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`idFR`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `loisir`
--
ALTER TABLE `loisir`
  ADD PRIMARY KEY (`idLoi`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `competence`
--
ALTER TABLE `competence`
  MODIFY `idCom` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT pour la table `experience`
--
ALTER TABLE `experience`
  MODIFY `idEX` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `idFR` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT pour la table `loisir`
--
ALTER TABLE `loisir`
  MODIFY `idLoi` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `competence`
--
ALTER TABLE `competence`
  ADD CONSTRAINT `competence_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `experience`
--
ALTER TABLE `experience`
  ADD CONSTRAINT `experience_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `formation`
--
ALTER TABLE `formation`
  ADD CONSTRAINT `formation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `loisir`
--
ALTER TABLE `loisir`
  ADD CONSTRAINT `loisir_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
