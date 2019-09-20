-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1:3306
-- Généré le :  Sam 21 Septembre 2019 à 00:36
-- Version du serveur :  5.6.35
-- Version de PHP :  7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gestion_formation`
--

-- --------------------------------------------------------

--
-- Structure de la table `attachments`
--

CREATE TABLE `attachments` (
  `id` int(255) NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `load_date` date NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `buildings`
--

CREATE TABLE `buildings` (
  `id` int(11) NOT NULL,
  `building` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `buildings`
--

INSERT INTO `buildings` (`id`, `building`) VALUES
(1, '4033 Lynden Road, Niagara On The Lake Ontario L0S 1J0'),
(2, '1046 Papineau Avenue, Montreal, Quebec H2K 4J5'),
(3, '1317 7th Ave, Calgary, Alberta T2P 0W4'),
(4, '218 King George Hwy, Surrey, Brisith Columbia V3W 4E3');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Santé et sécurité'),
(2, 'Environnement'),
(3, 'Qualité'),
(4, 'Ressources humaines'),
(5, 'Santé et bien-être'),
(6, 'Approvisionnement');

-- --------------------------------------------------------

--
-- Structure de la table `civilities`
--

CREATE TABLE `civilities` (
  `id` int(11) NOT NULL,
  `civility` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `civilities`
--

INSERT INTO `civilities` (`id`, `civility`) VALUES
(1, 'M.'),
(2, 'Mme');

-- --------------------------------------------------------

--
-- Structure de la table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `number` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `civility_id` int(100) NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `language_id` int(255) NOT NULL,
  `cellular` int(10) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `position_title_id` int(100) NOT NULL,
  `building_id` int(100) NOT NULL,
  `supervisor_id` int(11) NOT NULL,
  `more_info` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_sent_formation_plan` date DEFAULT NULL,
  `actif` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `employee_formations`
--

CREATE TABLE `employee_formations` (
  `id` int(11) NOT NULL,
  `date_done` date DEFAULT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `employee_id` int(11) NOT NULL,
  `formation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `formations`
--

CREATE TABLE `formations` (
  `id` int(11) NOT NULL,
  `number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `frequence_id` int(11) NOT NULL,
  `start_reminder_id` int(11) NOT NULL,
  `modality_id` int(11) NOT NULL,
  `duration` decimal(10,0) NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `formations_position_title_of_formations`
--

CREATE TABLE `formations_position_title_of_formations` (
  `formation_id` int(11) NOT NULL,
  `position_title_of_formations_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `formation_statuses`
--

CREATE TABLE `formation_statuses` (
  `id` int(11) NOT NULL,
  `formation_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `formation_statuses`
--

INSERT INTO `formation_statuses` (`id`, `formation_status`) VALUES
(1, 'Non-applicable'),
(2, 'Obligatoire'),
(3, 'Obligatoire si le risque est présent dans l\'immeuble ou si les taches de l\'employé l\'exigent'),
(4, 'Recommandé'),
(5, 'Selon le besoin (voir avec le département SST)');

-- --------------------------------------------------------

--
-- Structure de la table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `language` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `languages`
--

INSERT INTO `languages` (`id`, `language`) VALUES
(1, 'Français'),
(2, 'Anglais');

-- --------------------------------------------------------

--
-- Structure de la table `modalities`
--

CREATE TABLE `modalities` (
  `id` int(11) NOT NULL,
  `modality` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `modalities`
--

INSERT INTO `modalities` (`id`, `modality`) VALUES
(1, 'En ligne'),
(2, 'Externe'),
(3, 'Interne');

-- --------------------------------------------------------

--
-- Structure de la table `position_titles`
--

CREATE TABLE `position_titles` (
  `id` int(11) NOT NULL,
  `position_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `position_titles`
--

INSERT INTO `position_titles` (`id`, `position_title`) VALUES
(1, 'Technicien immeuble'),
(2, 'Gestionnaire'),
(3, 'Coordonnateur projet'),
(4, 'Stagiaire'),
(5, 'Coordonnateur SST'),
(6, 'Adjointe administrative'),
(7, 'Coordonateur service à l\'immeuble'),
(8, 'Gestionnaire de projet'),
(9, 'Gestionnaire d\'équipe de projet'),
(10, 'Administrateur de projet'),
(11, 'Adjointe administrative');

-- --------------------------------------------------------

--
-- Structure de la table `position_title_of_formations`
--

CREATE TABLE `position_title_of_formations` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `supervisors`
--

CREATE TABLE `supervisors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `supervisors`
--

INSERT INTO `supervisors` (`id`, `name`) VALUES
(1, 'Évelyne Poincaré'),
(2, 'Maxence Brunet');

-- --------------------------------------------------------

--
-- Structure de la table `time_tables`
--

CREATE TABLE `time_tables` (
  `id` int(11) NOT NULL,
  `time_select` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `time_tables`
--

INSERT INTO `time_tables` (`id`, `time_select`) VALUES
(1, '1 semaine'),
(2, '1 mois'),
(3, '3 mois'),
(4, '6 mois'),
(5, '18 mois'),
(6, '1 an'),
(7, '2 ans'),
(8, '3 ans'),
(9, '4 ans'),
(10, '5 ans'),
(11, 'Aux besoins'),
(12, 'Une seul fois');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `admin`) VALUES
(1, 'admin', '$2y$10$aXq5PYd8JVIe4WtqLdAre.aoEH2LQUcZSQo.xPSdvUUx44SnjtNju', 'admin@admin.com', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `buildings`
--
ALTER TABLE `buildings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `civilities`
--
ALTER TABLE `civilities`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `civility_id` (`civility_id`),
  ADD KEY `language_id` (`language_id`),
  ADD KEY `position_title_id` (`position_title_id`),
  ADD KEY `building_id` (`building_id`),
  ADD KEY `supervisor_id` (`supervisor_id`);

--
-- Index pour la table `employee_formations`
--
ALTER TABLE `employee_formations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `formation_id` (`formation_id`);

--
-- Index pour la table `formations`
--
ALTER TABLE `formations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categorie` (`categorie_id`),
  ADD KEY `frequence` (`frequence_id`),
  ADD KEY `start_reminder` (`start_reminder_id`),
  ADD KEY `modality` (`modality_id`),
  ADD KEY `categorie_2` (`categorie_id`);

--
-- Index pour la table `formations_position_title_of_formations`
--
ALTER TABLE `formations_position_title_of_formations`
  ADD KEY `position_title_of_formations_id` (`position_title_of_formations_id`),
  ADD KEY `formation_id` (`formation_id`);

--
-- Index pour la table `formation_statuses`
--
ALTER TABLE `formation_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `modalities`
--
ALTER TABLE `modalities`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `position_titles`
--
ALTER TABLE `position_titles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `position_title_of_formations`
--
ALTER TABLE `position_title_of_formations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status_id`);

--
-- Index pour la table `supervisors`
--
ALTER TABLE `supervisors`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `time_tables`
--
ALTER TABLE `time_tables`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `buildings`
--
ALTER TABLE `buildings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `civilities`
--
ALTER TABLE `civilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `employee_formations`
--
ALTER TABLE `employee_formations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `formations`
--
ALTER TABLE `formations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `formation_statuses`
--
ALTER TABLE `formation_statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `modalities`
--
ALTER TABLE `modalities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `position_titles`
--
ALTER TABLE `position_titles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `position_title_of_formations`
--
ALTER TABLE `position_title_of_formations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `supervisors`
--
ALTER TABLE `supervisors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `time_tables`
--
ALTER TABLE `time_tables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`),
  ADD CONSTRAINT `employees_ibfk_2` FOREIGN KEY (`position_title_id`) REFERENCES `position_titles` (`id`),
  ADD CONSTRAINT `employees_ibfk_3` FOREIGN KEY (`building_id`) REFERENCES `buildings` (`id`),
  ADD CONSTRAINT `employees_ibfk_4` FOREIGN KEY (`civility_id`) REFERENCES `civilities` (`id`),
  ADD CONSTRAINT `employees_ibfk_5` FOREIGN KEY (`supervisor_id`) REFERENCES `supervisors` (`id`);

--
-- Contraintes pour la table `employee_formations`
--
ALTER TABLE `employee_formations`
  ADD CONSTRAINT `employee_formations_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `employee_formations_ibfk_2` FOREIGN KEY (`formation_id`) REFERENCES `formations` (`id`);

--
-- Contraintes pour la table `formations`
--
ALTER TABLE `formations`
  ADD CONSTRAINT `formations_ibfk_1` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `formations_ibfk_2` FOREIGN KEY (`frequence_id`) REFERENCES `time_tables` (`id`),
  ADD CONSTRAINT `formations_ibfk_3` FOREIGN KEY (`start_reminder_id`) REFERENCES `time_tables` (`id`),
  ADD CONSTRAINT `formations_ibfk_4` FOREIGN KEY (`modality_id`) REFERENCES `modalities` (`id`);

--
-- Contraintes pour la table `formations_position_title_of_formations`
--
ALTER TABLE `formations_position_title_of_formations`
  ADD CONSTRAINT `formations_position_title_of_formations_ibfk_1` FOREIGN KEY (`position_title_of_formations_id`) REFERENCES `position_title_of_formations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `formations_position_title_of_formations_ibfk_2` FOREIGN KEY (`formation_id`) REFERENCES `formations` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
