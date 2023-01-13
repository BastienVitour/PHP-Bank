-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 13 jan. 2023 à 08:09
-- Version du serveur :  5.7.34
-- Version de PHP : 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `PHP_Bank`
--

-- --------------------------------------------------------

--
-- Structure de la table `bankaccounts`
--

CREATE TABLE `bankaccounts` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `money` int(11) NOT NULL,
  `id_currencies` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `bankaccounts`
--

INSERT INTO `bankaccounts` (`id`, `id_user`, `money`, `id_currencies`) VALUES
(1, 2, 82, 1),
(2, 1, 120, 1),
(3, 3, 298, 1),
(4, 5, 20, 1);

-- --------------------------------------------------------

--
-- Structure de la table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `value` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `value`) VALUES
(1, 'Euro', 1),
(2, 'Bitcoin', 0.000059),
(3, 'Dollar', 1.08),
(4, 'Livre Sterling', 0.89),
(5, 'Yen Japonais', 140.61),
(6, 'Dollar australien', 1.56);

-- --------------------------------------------------------

--
-- Structure de la table `deposits`
--

CREATE TABLE `deposits` (
  `id` int(11) NOT NULL,
  `id_bank_account` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `operation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `deposits`
--

INSERT INTO `deposits` (`id`, `id_bank_account`, `value`, `admin_id`, `operation_date`, `status`) VALUES
(1, 2, 20, 1, '2023-01-12 20:35:50', 0),
(2, 2, 50, 1, '2023-01-12 21:16:40', 0),
(3, 2, 40, 1, '2023-01-12 21:26:16', 100),
(4, 2, 60, 1, '2023-01-12 21:30:14', 100),
(5, 1, 20, 1, '2023-01-12 21:32:11', 100),
(6, 2, 20, 1, '2023-01-12 21:37:03', 100),
(7, 2, 20, 1, '2023-01-12 21:44:45', 100),
(8, 3, 40, 1, '2023-01-12 21:50:14', 100),
(9, 2, 60, 1, '2023-01-12 21:51:21', 100),
(10, 2, 20, 2, '2023-01-12 22:51:35', 0),
(11, 1, 20, 1, '2023-01-12 22:52:20', 100),
(12, 2, 20, 2, '2023-01-13 08:39:48', 100);

-- --------------------------------------------------------

--
-- Structure de la table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `sender_account` int(11) NOT NULL,
  `receiver_account` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `id_currencies` int(11) NOT NULL,
  `operation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `transactions`
--

INSERT INTO `transactions` (`id`, `sender_account`, `receiver_account`, `value`, `id_currencies`, `operation_date`) VALUES
(1, 2, 3, 2, 1, '2023-01-12 22:41:13'),
(2, 2, 3, 100, 1, '2023-01-12 22:43:46'),
(3, 2, 3, 1, 1, '2023-01-12 22:46:20');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_ip` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `role`, `created_at`, `last_ip`) VALUES
(1, 'Bastien Vitour', 'bvitour2004@gmail.com', 'aa3d2fe4f6d301dbd6b8fb2d2fddfb7aeebf3bec53ffff4b39a0967afa88c609', 10, '2023-01-12 14:06:13', '::1'),
(2, 'Admin', 'admin@gmail.com', '02d32a00c70d387e3f92727d27a5b92449816100d39ff007e9ef7033f4b56212', 1000, '2023-01-12 14:07:44', '::1'),
(3, 'Jean', 'jean@gmail.com', 'c6705be84c2db901d46b8e3e698aa561d1683ee2c32beb26c275e6d445f58257', 10, '2023-01-12 14:11:11', '::1'),
(4, 'Alexandre', 'alexandre@gmail.com', 'a896cfaf2c3daddfedd552fd6ca6a4f3d9ef9195711e53946f088790b066be11', 1, '2023-01-12 14:30:34', '::1'),
(5, 'Florian', 'florian@gmail.com', 'c6705be84c2db901d46b8e3e698aa561d1683ee2c32beb26c275e6d445f58257', 10, '2023-01-12 14:34:11', '::1'),
(6, 'Fabien', 'fabien@gmail.com', 'aa3d2fe4f6d301dbd6b8fb2d2fddfb7aeebf3bec53ffff4b39a0967afa88c609', 0, '2023-01-12 14:52:09', '::1');

-- --------------------------------------------------------

--
-- Structure de la table `withdrawals`
--

CREATE TABLE `withdrawals` (
  `id` int(11) NOT NULL,
  `id_bank_account` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `operation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `withdrawals`
--

INSERT INTO `withdrawals` (`id`, `id_bank_account`, `value`, `admin_id`, `operation_date`, `status`) VALUES
(1, 2, 20, 1, '2023-01-12 21:26:34', 100),
(2, 2, 20, 1, '2023-01-12 22:01:25', 100),
(3, 2, 20, 1, '2023-01-12 22:02:08', 0),
(4, 2, 40, 2, '2023-01-12 22:51:40', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bankaccounts`
--
ALTER TABLE `bankaccounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_currencies` (`id_currencies`);

--
-- Index pour la table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_bank_account` (`id_bank_account`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Index pour la table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receiver_account` (`receiver_account`),
  ADD KEY `sender_account` (`sender_account`),
  ADD KEY `id_currencies` (`id_currencies`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_bank_account` (`id_bank_account`),
  ADD KEY `admin_id` (`admin_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bankaccounts`
--
ALTER TABLE `bankaccounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `bankaccounts`
--
ALTER TABLE `bankaccounts`
  ADD CONSTRAINT `bankaccounts_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `bankaccounts_ibfk_2` FOREIGN KEY (`id_currencies`) REFERENCES `currencies` (`id`);

--
-- Contraintes pour la table `deposits`
--
ALTER TABLE `deposits`
  ADD CONSTRAINT `deposits_ibfk_1` FOREIGN KEY (`id_bank_account`) REFERENCES `bankaccounts` (`id`),
  ADD CONSTRAINT `deposits_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`receiver_account`) REFERENCES `bankaccounts` (`id`),
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`sender_account`) REFERENCES `bankaccounts` (`id`),
  ADD CONSTRAINT `transactions_ibfk_3` FOREIGN KEY (`id_currencies`) REFERENCES `currencies` (`id`);

--
-- Contraintes pour la table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD CONSTRAINT `withdrawals_ibfk_1` FOREIGN KEY (`id_bank_account`) REFERENCES `bankaccounts` (`id`),
  ADD CONSTRAINT `withdrawals_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
