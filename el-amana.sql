-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : database:3306
-- Généré le : jeu. 04 fév. 2021 à 13:34
-- Version du serveur :  5.7.33
-- Version de PHP : 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `el-amana`
--

-- --------------------------------------------------------

--
-- Structure de la table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `h_user_id` int(11) NOT NULL,
  `h_action` text NOT NULL,
  `h_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `history`
--

INSERT INTO `history` (`id`, `h_user_id`, `h_action`, `h_date`) VALUES
(2, 1, 'à supprimer utilisateur Aly  Sy', '2021-02-03 00:00:00'),
(3, 1, 'à supprimer utilisateur Samba Ndiaye', '2021-02-03 00:00:00'),
(4, 1, 'à Modifier l\'utilisateur  ', '2021-02-04 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `i_left_eye` varchar(195) NOT NULL,
  `i_right_eye` varchar(195) NOT NULL,
  `i_amount_to_pay` int(11) NOT NULL,
  `i_paid_amount` int(11) NOT NULL,
  `i_remaining_amount` int(11) NOT NULL,
  `i_doctor_name` varchar(195) NOT NULL,
  `i_mount_price` int(11) NOT NULL,
  `i_left_eye_price` int(11) NOT NULL,
  `i_right_eye_price` int(11) NOT NULL,
  `i_client_name` varchar(195) NOT NULL,
  `i_prescription_id` int(11) DEFAULT NULL,
  `i_user_id` int(11) NOT NULL,
  `i_created_at` date NOT NULL,
  `i_updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `invoices`
--

INSERT INTO `invoices` (`id`, `i_left_eye`, `i_right_eye`, `i_amount_to_pay`, `i_paid_amount`, `i_remaining_amount`, `i_doctor_name`, `i_mount_price`, `i_left_eye_price`, `i_right_eye_price`, `i_client_name`, `i_prescription_id`, `i_user_id`, `i_created_at`, `i_updated_at`) VALUES
(1, '3', '2.5', 12000, 2000, 10000, 'Cheikh Oumar Ndiaye', 2000, 5000, 5000, 'Zahra Sidi Addelaziz', NULL, 1, '2021-01-28', NULL),
(2, '0.03', '-0.03', 30, 30, 0, 'test', 10, 10, 10, 'test', NULL, 1, '2021-02-01', NULL),
(3, '2.8', '-2.5', 1500, 1500, 0, '', 500, 500, 500, 'Mamadou Aly Sy', NULL, 2, '2021-02-01', NULL),
(5, '0.09', '-0.02', 1500, 1500, 0, 'Cheikh Oumar Ndiaye', 500, 500, 500, 'May sall', NULL, 2, '2021-02-02', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` int(11) NOT NULL,
  `p_user_id` int(11) NOT NULL,
  `p_client_name` varchar(255) NOT NULL,
  `p_content` text NOT NULL,
  `p_left_eye` varchar(255) NOT NULL,
  `p_right_eye` varchar(255) NOT NULL,
  `p_created_at` date NOT NULL,
  `p_modified_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `p_user_id`, `p_client_name`, `p_content`, `p_left_eye`, `p_right_eye`, `p_created_at`, `p_modified_at`) VALUES
(1, 1, 'Zahra Sidi Abdoulaziz', '<p>Add + 1,50</p><p>Photoclique</p><p>Antirefle\r\n</p>', '+3', '+2,5', '2021-01-21', NULL),
(2, 1, 'May sall', '<p>antirefet</p>', '-1', '2', '2021-01-28', NULL),
(3, 1, 'Mamadou Aly Sy', '<p>antireflet</p><p>photocrome</p>', '0.01', '0.03', '2021-02-04', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `u_first_name` varchar(255) NOT NULL,
  `u_last_name` varchar(255) NOT NULL,
  `u_username` varchar(255) NOT NULL,
  `u_password` varchar(255) NOT NULL,
  `u_role` int(11) NOT NULL DEFAULT '0',
  `u_last_time_see` varchar(255) NOT NULL,
  `u_created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `u_first_name`, `u_last_name`, `u_username`, `u_password`, `u_role`, `u_last_time_see`, `u_created_at`) VALUES
(1, 'Mamadou', 'Aly Sy', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 2, '04 / 02  / 2021 à 11:44:59', '2021-01-01'),
(2, 'Aly Ousmane', 'Sy', 'aly', '00fd4b4549a1094aae926ef62e9dbd3cdcc2e456', 0, '04 / 02  / 2021 à 11:46:33', '2021-02-01');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_history_user_id` (`h_user_id`);

--
-- Index pour la table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_invoces_user_id` (`i_user_id`);

--
-- Index pour la table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`p_user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`u_username`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `fk_history_user_id` FOREIGN KEY (`h_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `fk_invoces_user_id` FOREIGN KEY (`i_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`p_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
