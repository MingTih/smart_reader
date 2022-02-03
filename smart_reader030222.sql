-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 03 fév. 2022 à 23:29
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `smart_reader`
--

-- --------------------------------------------------------

--
-- Structure de la table `dealing`
--

CREATE TABLE `dealing` (
  `id_deal` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_book` int(11) NOT NULL,
  `dealing_position` enum('offer','request') NOT NULL,
  `point_offers` int(11) NOT NULL,
  `point_deal` int(11) NOT NULL,
  `dealing_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `exchange`
--

CREATE TABLE `exchange` (
  `id_exchange` int(11) NOT NULL,
  `id_purchaser` int(11) NOT NULL,
  `id_book` int(11) NOT NULL,
  `dealing_point` int(11) NOT NULL,
  `purchase_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `pw` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `inscription_date` date NOT NULL,
  `point` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `admin` int(11) NOT NULL,
  `disalbled` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `name`, `firstname`, `pseudo`, `pw`, `email`, `birthdate`, `address`, `inscription_date`, `point`, `photo`, `admin`, `disalbled`) VALUES
(1, 'HUYNH', 'Caroline', 'MingTih', 'test', 'test@test', '1990-04-17', '5 rue test', '2022-02-03', 100, '../../uploads/photo_profil/test1.jpg', 1, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `dealing`
--
ALTER TABLE `dealing`
  ADD PRIMARY KEY (`id_deal`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_book` (`id_book`);

--
-- Index pour la table `exchange`
--
ALTER TABLE `exchange`
  ADD PRIMARY KEY (`id_exchange`),
  ADD KEY `id_purchaser` (`id_purchaser`,`id_book`),
  ADD KEY `dealing_point` (`dealing_point`),
  ADD KEY `book_link` (`id_book`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `dealing`
--
ALTER TABLE `dealing`
  MODIFY `id_deal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `exchange`
--
ALTER TABLE `exchange`
  MODIFY `id_exchange` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `dealing`
--
ALTER TABLE `dealing`
  ADD CONSTRAINT `link_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `exchange`
--
ALTER TABLE `exchange`
  ADD CONSTRAINT `book_link` FOREIGN KEY (`id_book`) REFERENCES `dealing` (`id_book`),
  ADD CONSTRAINT `purchaser_link` FOREIGN KEY (`id_purchaser`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
