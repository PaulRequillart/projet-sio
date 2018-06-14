-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 25 mai 2018 à 10:11
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetsio`
--

-- --------------------------------------------------------

--
-- Structure de la table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `groups`
--

INSERT INTO `groups` (`id`, `label`) VALUES
(1, 'admin'),
(2, 'LP SIO'),
(3, 'LP CDAISI'),
(4, 'Test1'),
(5, 'test2'),
(6, 'test3'),
(7, 'test4'),
(8, 'DUT Informatique'),
(9, 'Professeur');

-- --------------------------------------------------------

--
-- Structure de la table `marks`
--

DROP TABLE IF EXISTS `marks`;
CREATE TABLE IF NOT EXISTS `marks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` int(11) NOT NULL,
  `label` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `marks`
--

INSERT INTO `marks` (`id`, `value`, `label`, `user_id`, `module_id`) VALUES
(1, 15, 'test', 5, 1),
(2, 20, 'test2', 5, 1),
(3, 7, 'test nom module', 5, 2),
(4, 7, 'f', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `modules`
--

DROP TABLE IF EXISTS `modules`;
CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` text NOT NULL,
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `modules`
--

INSERT INTO `modules` (`id`, `label`, `group_id`, `user_id`) VALUES
(1, 'COURS DE MERDE', 2, 7),
(2, 'test', 2, 7),
(3, 'Anglais', 8, 7);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `role` text,
  `group_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `username`, `email`, `password`, `role`, `group_id`, `created`, `modified`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@gmail.com', '$2y$10$zH6SYrhSFbVn58YRBGaGm.ZFUyQGbpapGiK22aNjYZX2d/j8Q34S6', 'admin', 1, '2018-03-15 20:30:37', '2018-03-15 20:30:37'),
(2, 'Ameziane', 'Jordan', 'Jordan.Ameziane', 'jordan.ameziane@gmail.com', '$2y$10$0sfvMhA8WnPXkufBVl61Z.FYlvVcqiFYilseMgjl4Wnbqd945x6ba', 'admin', 1, '2018-03-16 08:50:57', '2018-03-16 08:50:57'),
(6, 'test', 'test', 't.test', 'test@gmail.com', '$2y$10$0vmlnr/dLAA9ngRTkzhuk.GvoMEJWyD9z4P3rFAXnbes6biNHrlDm', 'eleve', 2, '2018-03-16 09:01:04', '2018-03-16 09:01:04'),
(5, 'Requillart', 'Paul', 'p.requillart', 'req@gmail.com', '$2y$10$3etcrA/1eKolMdWGsQ87D.q3vhTauwW6.zqwJN6uHke/FEMunBEg2', 'eleve', 2, '2018-03-16 08:55:49', '2018-03-16 08:55:49'),
(7, 'Benameur', 'Nasser', 'n.benameur', 'beni@gmail.com', 'prof', 'professeur', 9, '2018-03-16 08:55:49', '2018-03-16 08:55:49'),
(8, 'Dupont', 'Sylvain', 's.dupont', 'dupont.sylvain@tg.fr', '$2y$10$VIAVp4GIuBrDLsldIE914ONyvnfYESbnZ4S4BjEzij/2A8UcraX3G', 'professeur', 9, '2018-05-25 10:06:24', '2018-05-25 10:06:24'),
(9, 'Marcel', 'Michel', 'm.marcel', 'gegs@gfd.fr', '$2y$10$POPEkpS8o7iCD2WUuSmQYeC.n1moMcEWge6xaOEsOxzHglwTjnfgq', 'professeur', 9, '2018-05-25 10:09:04', '2018-05-25 10:09:04');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
