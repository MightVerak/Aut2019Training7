-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Creato il: Nov 08, 2019 alle 04:07
-- Versione del server: 10.3.17-MariaDB
-- Versione PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestion_formation`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `attachments`
--

CREATE TABLE `attachments` (
  `id` int(255) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `load_date` date NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `employee_formation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `buildings`
--

CREATE TABLE `buildings` (
  `id` int(11) NOT NULL,
  `building` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `buildings`
--

INSERT INTO `buildings` (`id`, `building`) VALUES
(1, '4033 Lynden Road, Niagara On The Lake Ontario L0S 1J0'),
(2, '1046 Papineau Avenue, Montreal, Quebec H2K 4J5'),
(3, '1317 7th Ave, Calgary, Alberta T2P 0W4'),
(4, '218 King George Hwy, Surrey, Brisith Columbia V3W 4E3');

-- --------------------------------------------------------

--
-- Struttura della tabella `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `categories`
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
-- Struttura della tabella `civilities`
--

CREATE TABLE `civilities` (
  `id` int(11) NOT NULL,
  `civility` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `civilities`
--

INSERT INTO `civilities` (`id`, `civility`) VALUES
(1, 'M.'),
(2, 'Mme');

-- --------------------------------------------------------

--
-- Struttura della tabella `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `number` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `civility_id` int(100) NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `language_id` int(255) NOT NULL,
  `cellular` varchar(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `position_title_id` int(100) NOT NULL,
  `building_id` int(100) NOT NULL,
  `supervisor_id` int(11) NOT NULL,
  `more_info` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_sent_formation_plan` date DEFAULT NULL,
  `actif` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `employees`
--

INSERT INTO `employees` (`id`, `number`, `civility_id`, `last_name`, `first_name`, `language_id`, `cellular`, `email`, `position_title_id`, `building_id`, `supervisor_id`, `more_info`, `date_sent_formation_plan`, `actif`) VALUES
(20, '001', 1, 'Yolande', 'Delannoy', 1, '555-555-5555', 'Delannoy@faketaxi.com', 1, 1, 2, '', NULL, 1),
(21, 'S001', 1, 'Cerif', 'Cecilia', 1, '555-555-5555', 'Cecilia@Goodmail.com', 4, 3, 1, '', NULL, 1),
(22, '002', 2, 'Laurine', 'Daucourt', 1, '555-555-5555', 'Daucourt@yahoomail.lol', 2, 2, 2, '', NULL, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `employee_formations`
--

CREATE TABLE `employee_formations` (
  `id` int(11) NOT NULL,
  `date_done` date DEFAULT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `employee_id` int(11) NOT NULL,
  `formation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `employee_formations`
--

INSERT INTO `employee_formations` (`id`, `date_done`, `note`, `employee_id`, `formation_id`) VALUES
(14, NULL, NULL, 20, 14),
(15, NULL, NULL, 20, 15),
(16, NULL, NULL, 21, 15),
(17, NULL, NULL, 21, 14);

-- --------------------------------------------------------

--
-- Struttura della tabella `formations`
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

--
-- Dump dei dati per la tabella `formations`
--

INSERT INTO `formations` (`id`, `number`, `title`, `categorie_id`, `frequence_id`, `start_reminder_id`, `modality_id`, `duration`, `note`) VALUES
(14, 'SST 01', 'Initiation à la santé et à la sécurité au travail', 1, 12, 12, 1, '1', ''),
(15, 'SSH 02', 'Glisser, trébucher, tomber', 1, 7, 2, 1, '1', '');

-- --------------------------------------------------------

--
-- Struttura della tabella `formations_position_titles`
--

CREATE TABLE `formations_position_titles` (
  `id` int(11) NOT NULL,
  `formation_id` int(11) NOT NULL,
  `position_title_id` int(11) NOT NULL,
  `formation_status_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `formations_position_titles`
--

INSERT INTO `formations_position_titles` (`id`, `formation_id`, `position_title_id`, `formation_status_id`) VALUES
(13, 14, 1, 1),
(14, 14, 3, 1),
(15, 15, 1, 1),
(16, 15, 3, 1),
(17, 15, 4, 1),
(18, 14, 4, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `formation_statuses`
--

CREATE TABLE `formation_statuses` (
  `id` int(11) NOT NULL,
  `formation_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `formation_statuses`
--

INSERT INTO `formation_statuses` (`id`, `formation_status`) VALUES
(1, 'Non-applicable'),
(2, 'Obligatoire'),
(3, 'Obligatoire si le risque est présent dans l\'immeuble ou si les taches de l\'employé l\'exigent'),
(4, 'Recommandé'),
(5, 'Selon le besoin (voir avec le département SST)');

-- --------------------------------------------------------

--
-- Struttura della tabella `frequences`
--

CREATE TABLE `frequences` (
  `id` int(11) NOT NULL,
  `frequence` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `frequences`
--

INSERT INTO `frequences` (`id`, `frequence`) VALUES
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
-- Struttura della tabella `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `language` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `languages`
--

INSERT INTO `languages` (`id`, `language`) VALUES
(1, 'Français'),
(2, 'Anglais');

-- --------------------------------------------------------

--
-- Struttura della tabella `modalities`
--

CREATE TABLE `modalities` (
  `id` int(11) NOT NULL,
  `modality` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `modalities`
--

INSERT INTO `modalities` (`id`, `modality`) VALUES
(1, 'En ligne'),
(2, 'Externe'),
(3, 'Interne');

-- --------------------------------------------------------

--
-- Struttura della tabella `position_titles`
--

CREATE TABLE `position_titles` (
  `id` int(11) NOT NULL,
  `position_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `position_titles`
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
-- Struttura della tabella `start_reminders`
--

CREATE TABLE `start_reminders` (
  `id` int(11) NOT NULL,
  `start_reminder` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `start_reminders`
--

INSERT INTO `start_reminders` (`id`, `start_reminder`) VALUES
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
-- Struttura della tabella `supervisors`
--

CREATE TABLE `supervisors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `supervisors`
--

INSERT INTO `supervisors` (`id`, `name`) VALUES
(1, 'Évelyne Poincaré'),
(2, 'Maxence Brunet');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `admin`) VALUES
(1, 'admin', '$2y$10$aXq5PYd8JVIe4WtqLdAre.aoEH2LQUcZSQo.xPSdvUUx44SnjtNju', 'admin@admin.com', 1);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_formation_id`);

--
-- Indici per le tabelle `buildings`
--
ALTER TABLE `buildings`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `civilities`
--
ALTER TABLE `civilities`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `civility_id` (`civility_id`),
  ADD KEY `language_id` (`language_id`),
  ADD KEY `position_title_id` (`position_title_id`),
  ADD KEY `building_id` (`building_id`),
  ADD KEY `supervisor_id` (`supervisor_id`);

--
-- Indici per le tabelle `employee_formations`
--
ALTER TABLE `employee_formations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `formation_id` (`formation_id`);

--
-- Indici per le tabelle `formations`
--
ALTER TABLE `formations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categorie` (`categorie_id`),
  ADD KEY `frequence` (`frequence_id`),
  ADD KEY `start_reminder` (`start_reminder_id`),
  ADD KEY `modality` (`modality_id`),
  ADD KEY `categorie_2` (`categorie_id`),
  ADD KEY `frequence_id` (`frequence_id`),
  ADD KEY `categorie_id` (`categorie_id`),
  ADD KEY `modality_id` (`modality_id`),
  ADD KEY `start_reminder_id` (`start_reminder_id`);

--
-- Indici per le tabelle `formations_position_titles`
--
ALTER TABLE `formations_position_titles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `position_title_of_formations_id` (`position_title_id`),
  ADD KEY `formation_id` (`formation_id`),
  ADD KEY `status_id` (`formation_status_id`),
  ADD KEY `formation_id_2` (`formation_id`),
  ADD KEY `position_title_id` (`position_title_id`),
  ADD KEY `formation_status_id` (`formation_status_id`),
  ADD KEY `position_title_id_2` (`position_title_id`),
  ADD KEY `formation_status_id_2` (`formation_status_id`);

--
-- Indici per le tabelle `formation_statuses`
--
ALTER TABLE `formation_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `frequences`
--
ALTER TABLE `frequences`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `modalities`
--
ALTER TABLE `modalities`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `position_titles`
--
ALTER TABLE `position_titles`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `start_reminders`
--
ALTER TABLE `start_reminders`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `supervisors`
--
ALTER TABLE `supervisors`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `buildings`
--
ALTER TABLE `buildings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `civilities`
--
ALTER TABLE `civilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT per la tabella `employee_formations`
--
ALTER TABLE `employee_formations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT per la tabella `formations`
--
ALTER TABLE `formations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT per la tabella `formations_position_titles`
--
ALTER TABLE `formations_position_titles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT per la tabella `formation_statuses`
--
ALTER TABLE `formation_statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `frequences`
--
ALTER TABLE `frequences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT per la tabella `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `modalities`
--
ALTER TABLE `modalities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `position_titles`
--
ALTER TABLE `position_titles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT per la tabella `start_reminders`
--
ALTER TABLE `start_reminders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT per la tabella `supervisors`
--
ALTER TABLE `supervisors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `attachments`
--
ALTER TABLE `attachments`
  ADD CONSTRAINT `attachments_ibfk_1` FOREIGN KEY (`employee_formation_id`) REFERENCES `employee_formations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employees_ibfk_2` FOREIGN KEY (`position_title_id`) REFERENCES `position_titles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employees_ibfk_3` FOREIGN KEY (`building_id`) REFERENCES `buildings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employees_ibfk_4` FOREIGN KEY (`civility_id`) REFERENCES `civilities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employees_ibfk_5` FOREIGN KEY (`supervisor_id`) REFERENCES `supervisors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `employee_formations`
--
ALTER TABLE `employee_formations`
  ADD CONSTRAINT `employee_formations_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_formations_ibfk_2` FOREIGN KEY (`formation_id`) REFERENCES `formations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `formations`
--
ALTER TABLE `formations`
  ADD CONSTRAINT `formations_ibfk_1` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `formations_ibfk_2` FOREIGN KEY (`frequence_id`) REFERENCES `frequences` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `formations_ibfk_4` FOREIGN KEY (`modality_id`) REFERENCES `modalities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `formations_ibfk_5` FOREIGN KEY (`start_reminder_id`) REFERENCES `start_reminders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `formations_position_titles`
--
ALTER TABLE `formations_position_titles`
  ADD CONSTRAINT `formations_position_titles_ibfk_2` FOREIGN KEY (`formation_id`) REFERENCES `formations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `formations_position_titles_ibfk_3` FOREIGN KEY (`formation_status_id`) REFERENCES `formation_statuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `formations_position_titles_ibfk_4` FOREIGN KEY (`position_title_id`) REFERENCES `position_titles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
