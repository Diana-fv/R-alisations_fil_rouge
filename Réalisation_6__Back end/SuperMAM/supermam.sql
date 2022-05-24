-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 24 mai 2022 à 08:12
-- Version du serveur :  5.7.36
-- Version de PHP : 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `supermam`
--

-- --------------------------------------------------------

--
-- Structure de la table `absence`
--

DROP TABLE IF EXISTS `absence`;
CREATE TABLE IF NOT EXISTS `absence` (
  `id_absence` int(11) NOT NULL AUTO_INCREMENT,
  `name_absence` varchar(150) NOT NULL,
  `date_absence` date NOT NULL,
  PRIMARY KEY (`id_absence`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `absence`
--

INSERT INTO `absence` (`id_absence`, `name_absence`, `date_absence`) VALUES
(1, 'vacances', '2022-05-01'),
(2, 'congés', '2022-01-01');

-- --------------------------------------------------------

--
-- Structure de la table `child`
--

DROP TABLE IF EXISTS `child`;
CREATE TABLE IF NOT EXISTS `child` (
  `id_child` int(11) NOT NULL AUTO_INCREMENT,
  `name_child` varchar(100) NOT NULL,
  `firstName_child` varchar(100) NOT NULL,
  `date_of_birth` date NOT NULL,
  PRIMARY KEY (`id_child`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `child`
--

INSERT INTO `child` (`id_child`, `name_child`, `firstName_child`, `date_of_birth`) VALUES
(1, 'Linis', 'Harry', '2021-01-01'),
(2, 'Granger', 'Hermione', '2021-04-03'),
(3, 'Cat', 'Gustavo', '2021-06-01'),
(5, 'Brindacier', 'Fifi', '2022-05-02');

-- --------------------------------------------------------

--
-- Structure de la table `contract`
--

DROP TABLE IF EXISTS `contract`;
CREATE TABLE IF NOT EXISTS `contract` (
  `id_contract` int(11) NOT NULL AUTO_INCREMENT,
  `number` varchar(50) NOT NULL,
  `str_date_contract` date NOT NULL,
  `end_date_contract` date NOT NULL,
  `nbr_day_absent` int(11) NOT NULL,
  `contact_person1` text NOT NULL,
  `contact_person2` text NOT NULL,
  `hours_mon_str` int(11) NOT NULL,
  `hours_mon_end` int(11) NOT NULL,
  `hours_tue_str` int(11) NOT NULL,
  `hours_tue_end` int(11) NOT NULL,
  `hours_wed_str` int(11) NOT NULL,
  `hours_wed_end` int(11) NOT NULL,
  `hours_thu_str` int(11) NOT NULL,
  `hours_thu_end` int(11) NOT NULL,
  `hours_fri_str` int(11) NOT NULL,
  `hours_fri_end` int(11) NOT NULL,
  `id_child` int(11) NOT NULL,
  PRIMARY KEY (`id_contract`),
  UNIQUE KEY `child` (`id_child`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contract`
--

INSERT INTO `contract` (`id_contract`, `number`, `str_date_contract`, `end_date_contract`, `nbr_day_absent`, `contact_person1`, `contact_person2`, `hours_mon_str`, `hours_mon_end`, `hours_tue_str`, `hours_tue_end`, `hours_wed_str`, `hours_wed_end`, `hours_thu_str`, `hours_thu_end`, `hours_fri_str`, `hours_fri_end`, `id_child`) VALUES
(1, '01c', '2021-09-01', '2022-06-30', 10, 'Rubeus Hagrid', 'Sirius Black', 9, 17, 9, 17, 9, 17, 9, 17, 9, 17, 1),
(2, '02c', '2021-09-01', '2022-06-30', 10, 'Emma Watson', 'Noma Dumezweni', 9, 17, 9, 17, 9, 17, 9, 17, 9, 17, 2);

-- --------------------------------------------------------

--
-- Structure de la table `getting`
--

DROP TABLE IF EXISTS `getting`;
CREATE TABLE IF NOT EXISTS `getting` (
  `id_child` int(11) NOT NULL,
  `id_absence` int(11) NOT NULL,
  UNIQUE KEY `child` (`id_child`),
  UNIQUE KEY `absence` (`id_absence`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `getting`
--

INSERT INTO `getting` (`id_child`, `id_absence`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `have`
--

DROP TABLE IF EXISTS `have`;
CREATE TABLE IF NOT EXISTS `have` (
  `id_user` int(11) NOT NULL,
  `id_child` int(11) NOT NULL,
  KEY `id_child` (`id_child`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `have`
--

INSERT INTO `have` (`id_user`, `id_child`) VALUES
(10, 3);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name_user` varchar(100) NOT NULL,
  `firstName_user` varchar(100) NOT NULL,
  `login_user` varchar(100) NOT NULL,
  `password_user` varchar(100) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `name_user`, `firstName_user`, `login_user`, `password_user`) VALUES
(1, 'Biel', 'Jessica', 'jessica', '123'),
(2, 'Tessa', 'Porter', 'tessa', '123'),
(3, 'tata', 'tamtam', 'toto', '123'),
(4, 'TATA', 'Lily', 'tata', '123'),
(5, 'Riki', 'Tom', 'tom', '$2y$10$zIwRINQEgHB2H6V8OxEDC.q8qXyhj7p6umN.c040T8J8kRb1560QK'),
(6, 'Boby', 'Bob', 'bob', '$2y$10$2q3kliocEktvF.Y776In/ufMy/HrQWaZZh..0c1So6etvtDFs5A1C'),
(7, 'tata', 'tamtam', 'toto', '$2y$10$EkHq9REc7k0uqIunNoIvdurnK/J684uUHxz.W.CoK0j143ZXKgaI.'),
(8, 'cat', 'Gustavo', 'cat', '$2y$10$PPVgVhfWa.LJvckP5jXvfeGEabHYvL8x7DkkjC.B7y254Rthq2aRm'),
(9, 'bond', 'James', 'bond', '$2y$10$QFnbZ.9cQ/2sDCklM/EYPuSrhDAe8l5GG9DOaq/PsQHz986aaTBre'),
(10, 'Licorne', 'Batsy', 'licorne', '$2y$10$7/mM6kxvXtdjI.745VHHq.YXBA.CyqJBLVqQ93AmHP3VPd58RP9XG');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `contract`
--
ALTER TABLE `contract`
  ADD CONSTRAINT `contract_ibfk_1` FOREIGN KEY (`id_child`) REFERENCES `child` (`id_child`);

--
-- Contraintes pour la table `getting`
--
ALTER TABLE `getting`
  ADD CONSTRAINT `getting_ibfk_1` FOREIGN KEY (`id_child`) REFERENCES `child` (`id_child`),
  ADD CONSTRAINT `getting_ibfk_2` FOREIGN KEY (`id_absence`) REFERENCES `absence` (`id_absence`);

--
-- Contraintes pour la table `have`
--
ALTER TABLE `have`
  ADD CONSTRAINT `have_ibfk_1` FOREIGN KEY (`id_child`) REFERENCES `child` (`id_child`),
  ADD CONSTRAINT `have_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
