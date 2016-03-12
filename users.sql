-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 12 Mars 2016 à 04:31
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `app`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `password` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `firstName`, `user_type_id`, `password`, `email`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jonathan', 'Jony', 'Boy', 1, '$2y$10$dlml6gKiMlKeDw7CjLgpg.n5ACKlM2mu8Ki05gBvg2QArTfaOQfxG', 'jony@gmail.com', NULL, '2016-03-12 07:08:04', '2016-03-12 07:08:04'),
(2, 'Pedronova', 'Pedro', 'Noava', 2, '$2y$10$sThgjkPJww0A3iO/cLjG.e709nG3T8a1pESBCVIvAK8wDns9xcPK6', 'inas@gmail.com', NULL, '2016-03-12 07:08:04', '2016-03-12 07:08:04'),
(3, 'Edgard', 'Jean', 'Bapt', 3, '$2y$10$xJBFJ1VhoHbfYCt4UlOEY.Aa0oc5CgFOo3YCIUsazxeL36c/s86hq', 'pedro@gmail.com', NULL, '2016-03-12 07:08:04', '2016-03-12 07:08:04'),
(4, 'Joel', 'Romy', 'Romeo', 4, '$2y$10$seMcc/8hbX1Y16tpn7GZMezF.I8r4W2w0dnTQVb2P9h36HFTo2IQi', 'romi@gmail.com', NULL, '2016-03-12 07:08:04', '2016-03-12 07:08:04'),
(5, 'Tony', 'Don', 'Paolo', 2, '$2y$10$ATsr3h9lsS/AJltM3tBdneOT6MBkD3HJ6Np7na72C5Ucv20GV.jmu', 'dodo@gmail.com', NULL, '2016-03-12 07:08:04', '2016-03-12 07:08:04'),
(6, 'Bartolome', 'Bar', 'Tolomeo', 2, '$2y$10$WuEqHY3dYmHfKSSGY/UGEurMqR1GLSqm387NL7mgCYRQOumCuQQ5W', 'baba@gmail.com', NULL, '2016-03-12 07:08:04', '2016-03-12 07:08:04');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
