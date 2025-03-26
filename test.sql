-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 26 mars 2025 à 01:17
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `acteur_speciaux`
--

CREATE TABLE `acteur_speciaux` (
  `type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `adresse` varchar(225) NOT NULL,
  `idenfiant` varchar(255) NOT NULL,
  `id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `acteur_speciaux`
--

INSERT INTO `acteur_speciaux` (`type`, `name`, `first_name`, `mot_de_passe`, `nationality`, `adresse`, `idenfiant`, `id`) VALUES
('arbitre', 'fall', 'jean', 'motdepasse', 'senegalais', 'dakar', 'fall3', 1),
('admin', 'diop', 'fatou', '1234', 'senegalais', 'dakar', 'fat3', 2);

-- --------------------------------------------------------

--
-- Structure de la table `athelete`
--

CREATE TABLE `athelete` (
  `name` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `nationality` varchar(20) NOT NULL,
  `distance` int(32) NOT NULL,
  `date_de_naissance` date DEFAULT NULL,
  `penality` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'attente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `athelete`
--

INSERT INTO `athelete` (`name`, `firstname`, `email`, `password`, `id`, `nationality`, `distance`, `date_de_naissance`, `penality`, `status`) VALUES
('Martin', 'Jean', 'jean.martin@example.com', 'password1', 238, 'Français', 100, '2000-12-23', 'Faux départ', 'Éliminé'),
('Dubois', 'Marie', 'marie.dubois@example.com', 'password2', 239, 'Belge', 400, '1975-03-29', 'Faux départ', 'attente'),
('Thomas', 'Pierre', 'pierre.thomas@example.com', 'password3', 240, 'Suisse', 1000, '1988-03-06', NULL, 'éliminé'),
('Robert', 'Sophie', 'sophie.robert@example.com', 'password4', 241, 'Canadien', 100, '1980-03-12', NULL, 'Éliminé'),
('Richard', 'Luc', 'luc.richard@example.com', 'password5', 242, 'Allemand', 400, '1991-05-24', 'Faux départ', 'attente'),
('Petit', 'Claire', 'claire.petit@example.com', 'password6', 243, 'Italien', 1000, '1981-05-22', NULL, 'éliminé'),
('Durand', 'Paul', 'paul.durand@example.com', 'password7', 244, 'Espagnol', 100, '1987-09-24', NULL, 'Éliminé'),
('Leroy', 'Julie', 'julie.leroy@example.com', 'password8', 245, 'Portugais', 400, '1989-06-20', NULL, 'attente'),
('Moreau', 'Marc', 'marc.moreau@example.com', 'password9', 246, 'Américain', 1000, '1979-02-26', NULL, 'éliminé'),
('Simon', 'Laura', 'laura.simon@example.com', 'password10', 247, 'Britannique', 100, '1982-04-27', NULL, 'Éliminé'),
('Laurent', 'Nicolas', 'nicolas.laurent@example.com', 'password11', 248, 'Australien', 400, '1999-02-11', NULL, 'attente'),
('Michel', 'Alice', 'alice.michel@example.com', 'password12', 249, 'Néerlandais', 1000, '1983-08-25', NULL, 'éliminé'),
('Garcia', 'David', 'david.garcia@example.com', 'password13', 250, 'Mexicain', 100, '1975-11-05', NULL, 'Qualifié'),
('Rodriguez', 'Sarah', 'sarah.rodriguez@example.com', 'password14', 251, 'Brésilien', 400, '1983-03-29', NULL, 'attente'),
('Martinez', 'Thomas', 'thomas.martinez@example.com', 'password15', 252, 'Argentin', 1000, '1983-08-29', NULL, 'qualifié'),
('Hernandez', 'Emma', 'emma.hernandez@example.com', 'password16', 253, 'Chilien', 100, '1993-07-21', NULL, 'Qualifié'),
('Lopez', 'Louis', 'louis.lopez@example.com', 'password17', 254, 'Colombien', 400, '1981-10-23', NULL, 'attente'),
('Gonzalez', 'Chloé', 'chloe.gonzalez@example.com', 'password18', 255, 'Péruvien', 1000, '1983-05-04', NULL, 'qualifié'),
('Perez', 'Antoine', 'antoine.perez@example.com', 'password19', 256, 'Vénézuélien', 100, '1996-03-30', NULL, 'Éliminé'),
('Sanchez', 'Manon', 'manon.sanchez@example.com', 'password20', 257, 'Uruguayen', 400, '1996-03-20', NULL, 'attente'),
('Ramirez', 'Hugo', 'hugo.ramirez@example.com', 'password21', 258, 'Paraguayen', 1000, '1987-05-09', NULL, 'éliminé'),
('Torres', 'Ines', 'ines.torres@example.com', 'password22', 259, 'Équatorien', 100, '2003-01-21', NULL, 'Qualifié'),
('Flores', 'Léo', 'leo.flores@example.com', 'password23', 260, 'Bolivien', 400, '1988-04-09', NULL, 'attente'),
('Rivera', 'Léa', 'lea.rivera@example.com', 'password24', 261, 'Costaricain', 1000, '1987-02-20', NULL, 'qualifié'),
('Gomez', 'Raphaël', 'raphael.gomez@example.com', 'password25', 262, 'Panaméen', 100, '1995-11-06', NULL, 'Qualifié'),
('Diaz', 'Zoé', 'zoe.diaz@example.com', 'password26', 263, 'Français', 400, '1982-11-06', NULL, 'attente'),
('Reyes', 'Gabriel', 'gabriel.reyes@example.com', 'password27', 264, 'Belge', 1000, '1981-08-23', NULL, 'éliminé'),
('Morales', 'Louise', 'louise.morales@example.com', 'password28', 265, 'Suisse', 100, '1984-08-27', NULL, 'Éliminé'),
('Ortiz', 'Adam', 'adam.ortiz@example.com', 'password29', 266, 'Canadien', 400, '2003-04-28', NULL, 'attente'),
('Gutierrez', 'Jules', 'jules.gutierrez@example.com', 'password30', 267, 'Allemand', 1000, '1997-09-04', NULL, 'qualifié'),
('Cruz', 'Mia', 'mia.cruz@example.com', 'password31', 268, 'Italien', 100, '2003-05-22', NULL, 'Qualifié'),
('Ramos', 'Noah', 'noah.ramos@example.com', 'password32', 269, 'Espagnol', 400, '1988-12-07', NULL, 'attente'),
('Mendez', 'Lina', 'lina.mendez@example.com', 'password33', 270, 'Portugais', 1000, '1989-06-15', NULL, 'qualifié'),
('Chavez', 'Ethan', 'ethan.chavez@example.com', 'password34', 271, 'Américain', 100, '1975-06-23', NULL, 'attente'),
('Ruiz', 'Anna', 'anna.ruiz@example.com', 'password35', 272, 'Britannique', 400, '1993-12-10', NULL, 'éliminé'),
('Alvarez', 'Mathis', 'mathis.alvarez@example.com', 'password36', 273, 'Australien', 1000, '1978-04-27', NULL, 'attente'),
('Jimenez', 'Lola', 'lola.jimenez@example.com', 'password37', 274, 'Néerlandais', 100, '1994-09-14', NULL, 'attente'),
('Mendoza', 'Nathan', 'nathan.mendoza@example.com', 'password38', 275, 'Mexicain', 400, '2003-07-31', NULL, 'qualifié'),
('Vargas', 'Eva', 'eva.vargas@example.com', 'password39', 276, 'Brésilien', 1000, '1998-10-19', NULL, 'attente'),
('Castillo', 'Aaron', 'aaron.castillo@example.com', 'password40', 277, 'Argentin', 100, '1978-04-04', NULL, 'attente'),
('Romero', 'Luna', 'luna.romero@example.com', 'password41', 278, 'Chilien', 400, '1979-10-28', NULL, 'éliminé'),
('Ortega', 'Paul', 'paul.ortega@example.com', 'password42', 279, 'Colombien', 1000, '1989-04-28', NULL, 'attente'),
('Soto', 'Lena', 'lena.soto@example.com', 'password43', 280, 'Péruvien', 100, '2002-02-18', NULL, 'attente'),
('Delgado', 'Rayan', 'rayan.delgado@example.com', 'password44', 281, 'Vénézuélien', 400, '1977-09-28', NULL, 'éliminé'),
('Rojas', 'Mila', 'mila.rojas@example.com', 'password45', 282, 'Uruguayen', 1000, '1997-03-22', NULL, 'attente'),
('Guerrero', 'Noé', 'noe.guerrero@example.com', 'password46', 283, 'Paraguayen', 100, '1987-11-30', NULL, 'attente'),
('Santos', 'Alice', 'alice.santos@example.com', 'password47', 284, 'Équatorien', 400, '2002-11-11', NULL, 'éliminé'),
('Castro', 'Liam', 'liam.castro@example.com', 'password48', 285, 'Bolivien', 1000, '1985-08-10', NULL, 'attente'),
('Vasquez', 'Emma', 'emma.vasquez@example.com', 'password49', 286, 'Costaricain', 100, '2004-05-20', NULL, 'attente'),
('Fernandez', 'Louis', 'louis.fernandez@example.com', 'password50', 287, 'Panaméen', 400, '2000-02-18', NULL, 'qualifié'),
('Gonzales', 'Chloé', 'chloe.gonzales@example.com', 'password51', 288, 'Français', 1000, '1982-07-03', NULL, 'attente'),
('Pena', 'Antoine', 'antoine.pena@example.com', 'password52', 289, 'Belge', 100, '1997-01-21', NULL, 'attente'),
('Rios', 'Manon', 'manon.rios@example.com', 'password53', 290, 'Suisse', 400, '2002-10-18', NULL, 'éliminé'),
('Acosta', 'Hugo', 'hugo.acosta@example.com', 'password54', 291, 'Canadien', 1000, '1987-10-29', NULL, 'attente'),
('Cabrera', 'Ines', 'ines.cabrera@example.com', 'password55', 292, 'Allemand', 100, '1985-09-09', NULL, 'attente'),
('Medina', 'Léo', 'leo.medina@example.com', 'password56', 293, 'Italien', 400, '1989-12-14', NULL, 'qualifié'),
('Herrera', 'Léa', 'lea.herrera@example.com', 'password57', 294, 'Espagnol', 1000, '1987-09-10', NULL, 'attente'),
('Aguilar', 'Raphaël', 'raphael.aguilar@example.com', 'password58', 295, 'Portugais', 100, '1993-07-28', NULL, 'attente'),
('Vega', 'Zoé', 'zoe.vega@example.com', 'password59', 296, 'Américain', 400, '1999-10-12', NULL, 'qualifié'),
('Rivas', 'Gabriel', 'gabriel.rivas@example.com', 'password60', 297, 'Britannique', 1000, '1983-03-14', NULL, 'attente'),
('Valdez', 'Louise', 'louise.valdez@example.com', 'password61', 298, 'Australien', 100, '2001-08-02', NULL, 'attente'),
('Cortez', 'Adam', 'adam.cortez@example.com', 'password62', 299, 'Néerlandais', 400, '1993-05-14', NULL, 'qualifié'),
('Salazar', 'Jules', 'jules.salazar@example.com', 'password63', 300, 'Mexicain', 1000, '1987-01-23', NULL, 'attente'),
('Gallegos', 'Mia', 'mia.gallegos@example.com', 'password64', 301, 'Brésilien', 100, '1980-03-04', NULL, 'attente'),
('Campos', 'Noah', 'noah.campos@example.com', 'password65', 302, 'Argentin', 400, '1994-08-23', NULL, 'éliminé'),
('Rosales', 'Lina', 'lina.rosales@example.com', 'password66', 303, 'Chilien', 1000, '1997-09-16', NULL, 'attente'),
('Deleon', 'Ethan', 'ethan.deleon@example.com', 'password67', 304, 'Colombien', 100, '1999-08-12', NULL, 'attente'),
('Miranda', 'Anna', 'anna.miranda@example.com', 'password68', 305, 'Péruvien', 400, '1999-12-04', NULL, 'éliminé'),
('Huerta', 'Mathis', 'mathis.huerta@example.com', 'password69', 306, 'Vénézuélien', 1000, '1995-10-14', NULL, 'qualifié'),
('Sandoval', 'Lola', 'lola.sandoval@example.com', 'password70', 307, 'Uruguayen', 100, '2004-02-15', NULL, 'attente'),
('Zamora', 'Nathan', 'nathan.zamora@example.com', 'password71', 308, 'Paraguayen', 400, '1998-04-15', NULL, 'attente'),
('Pacheco', 'Eva', 'eva.pacheco@example.com', 'password72', 309, 'Équatorien', 1000, '2004-01-15', NULL, 'éliminé'),
('Escobar', 'Aaron', 'aaron.escobar@example.com', 'password73', 310, 'Bolivien', 100, '1990-05-09', NULL, 'attente'),
('Maldonado', 'Luna', 'luna.maldonado@example.com', 'password74', 311, 'Costaricain', 400, '1994-08-09', NULL, 'attente'),
('Suarez', 'Paul', 'paul.suarez@example.com', 'password75', 312, 'Panaméen', 1000, '1996-12-13', NULL, 'qualifié'),
('Zavala', 'Lena', 'lena.zavala@example.com', 'password76', 313, 'Français', 100, '1995-12-08', NULL, 'attente'),
('Bernal', 'Rayan', 'rayan.bernal@example.com', 'password77', 314, 'Belge', 400, '1983-10-30', NULL, 'attente'),
('Beltran', 'Mila', 'mila.beltran@example.com', 'password78', 315, 'Suisse', 1000, '1986-04-13', NULL, 'éliminé'),
('Avila', 'Noé', 'noe.avila@example.com', 'password79', 316, 'Canadien', 100, '2004-11-26', NULL, 'attente'),
('Solis', 'Alice', 'alice.solis@example.com', 'password80', 317, 'Allemand', 400, '2000-09-18', NULL, 'attente'),
('Lozano', 'Liam', 'liam.lozano@example.com', 'password81', 318, 'Italien', 1000, '1983-11-10', NULL, 'éliminé'),
('Juarez', 'Emma', 'emma.juarez@example.com', 'password82', 319, 'Espagnol', 100, '2002-01-27', NULL, 'attente'),
('Mejia', 'Louis', 'louis.mejia@example.com', 'password83', 320, 'Portugais', 400, '1993-11-01', NULL, 'attente'),
('Ibarra', 'Chloé', 'chloe.ibarra@example.com', 'password84', 321, 'Américain', 1000, '1987-12-06', NULL, 'éliminé'),
('Carrillo', 'Antoine', 'antoine.carrillo@example.com', 'password85', 322, 'Britannique', 100, '1983-02-13', NULL, 'attente'),
('Cervantes', 'Manon', 'manon.cervantes@example.com', 'password86', 323, 'Australien', 400, '1976-10-13', NULL, 'attente'),
('Galvan', 'Hugo', 'hugo.galvan@example.com', 'password87', 324, 'Néerlandais', 1000, '1989-07-07', NULL, 'éliminé'),
('Tapia', 'Ines', 'ines.tapia@example.com', 'password88', 325, 'Mexicain', 100, '1982-03-28', NULL, 'attente'),
('Rangel', 'Léo', 'leo.rangel@example.com', 'password89', 326, 'Brésilien', 400, '1997-08-08', NULL, 'attente'),
('Duarte', 'Léa', 'lea.duarte@example.com', 'password90', 327, 'Argentin', 1000, '1976-04-30', NULL, 'éliminé'),
('Valencia', 'Raphaël', 'raphael.valencia@example.com', 'password91', 328, 'Chilien', 100, '2003-10-03', NULL, 'attente'),
('Espinoza', 'Zoé', 'zoe.espinoza@example.com', 'password92', 329, 'Colombien', 400, '1994-11-04', NULL, 'attente'),
('Aguirre', 'Gabriel', 'gabriel.aguirre@example.com', 'password93', 330, 'Péruvien', 1000, '1987-12-03', NULL, 'qualifié'),
('Trevino', 'Louise', 'louise.trevino@example.com', 'password94', 331, 'Vénézuélien', 100, '1980-01-22', NULL, 'attente'),
('Mercado', 'Adam', 'adam.mercado@example.com', 'password95', 332, 'Uruguayen', 400, '1991-06-26', NULL, 'attente'),
('Leal', 'Jules', 'jules.leal@example.com', 'password96', 333, 'Paraguayen', 1000, '1982-04-05', NULL, 'qualifié'),
('Salinas', 'Mia', 'mia.salinas@example.com', 'password97', 334, 'Équatorien', 100, '1991-10-18', NULL, 'attente'),
('Marquez', 'Noah', 'noah.marquez@example.com', 'password98', 335, 'Bolivien', 400, '1977-03-22', NULL, 'attente'),
('Villarreal', 'Lina', 'lina.villarreal@example.com', 'password99', 336, 'Costaricain', 1000, '1995-08-27', NULL, 'qualifié'),
('Diatta', 'Mouhamed Ibrahim', 'okjloce@gmail.com', '1234', 367, 'Sénégal', 100, '2004-12-15', NULL, 'attente'),
('kces', 'seck', 'kce@gmail.com', '1234', 368, 'Sénégal', 100, '2006-03-10', NULL, 'attente');

-- --------------------------------------------------------

--
-- Structure de la table `course`
--

CREATE TABLE `course` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `lieu` varchar(255) NOT NULL,
  `type` varchar(30) NOT NULL,
  `arbitre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `course`
--

INSERT INTO `course` (`id`, `date`, `lieu`, `type`, `arbitre`) VALUES
(1, '2025-03-03', 'Stade A', '100m', 'albert einsten'),
(2, '2025-03-03', 'Stade A', '100m', 'Jean Dupont'),
(3, '2025-04-03', 'Stade A', '100m', 'Marie Curie'),
(4, '2025-03-04', 'Stade B', '400m', 'Pierre Durand'),
(5, '2025-04-04', 'Stade B', ' 400m', 'Lucie Martin'),
(6, '2025-03-04', 'Stade B', '400m', 'Paul Lefevre'),
(7, '2025-04-05', 'Stade C', '1000m', 'Sophie Lambert'),
(8, '2025-03-05', 'Stade C', '1000m', 'Thomas Moreau'),
(9, '2025-03-05', 'Stade C', '1000m', 'Camille Petit');

-- --------------------------------------------------------

--
-- Structure de la table `course_athelete`
--

CREATE TABLE `course_athelete` (
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `athelete_id` bigint(20) UNSIGNED NOT NULL,
  `temps` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `course_athelete`
--

INSERT INTO `course_athelete` (`course_id`, `athelete_id`, `temps`) VALUES
(1, 238, 9.98),
(1, 241, 10.65),
(1, 244, 10.25),
(1, 247, 11.42),
(1, 250, 8.74),
(1, 253, 7.85),
(1, 256, 10.84),
(1, 259, 9.41),
(1, 262, 9.33),
(1, 265, 11.83),
(1, 268, 8.34),
(2, 271, 0),
(2, 274, 0),
(2, 277, 0),
(2, 280, 0),
(2, 283, 0),
(2, 286, 0),
(2, 289, 0),
(2, 292, 0),
(2, 295, 0),
(2, 298, 0),
(2, 301, 0),
(3, 304, 0),
(3, 307, 0),
(3, 310, 0),
(3, 313, 0),
(3, 316, 0),
(3, 319, 0),
(3, 322, 0),
(3, 325, 0),
(3, 328, 0),
(3, 331, 0),
(3, 334, 0),
(4, 239, 43.14),
(4, 242, 45),
(4, 245, 42.68),
(4, 248, 43.61),
(4, 251, 44.5),
(4, 254, 44.91),
(4, 257, 42.28),
(4, 260, 44.61),
(4, 263, 43.76),
(4, 266, 42.25),
(4, 269, 44.56),
(5, 275, 43.16),
(5, 278, 44.78),
(5, 281, 43.73),
(5, 284, 43.7),
(5, 287, 42.97),
(5, 290, 44.5),
(5, 293, 43.51),
(5, 296, 43.52),
(5, 299, 42.13),
(5, 302, 44.8),
(5, 305, 43.96),
(6, 272, 44.46),
(6, 275, 43.16),
(6, 278, 44.78),
(6, 281, 43.73),
(6, 284, 43.7),
(6, 287, 42.97),
(6, 290, 44.5),
(6, 293, 43.51),
(6, 296, 43.52),
(6, 299, 42.13),
(6, 302, 44.8),
(7, 240, 407.15),
(7, 243, 351.62),
(7, 246, 351.62),
(7, 249, 360.04),
(7, 252, 348.12),
(7, 255, 345.88),
(7, 258, 387.86),
(7, 261, 282.65),
(7, 264, 390.88),
(7, 267, 251.97),
(7, 270, 281.98),
(8, 273, 355.8),
(8, 276, 309.75),
(8, 279, 403.14),
(8, 282, 388.98),
(8, 285, 355.89),
(8, 288, 375.24),
(8, 291, 368.12),
(8, 294, 311.07),
(8, 297, 366.87),
(8, 300, 284.26),
(8, 303, 256.02),
(9, 306, 315.76),
(9, 309, 376.46),
(9, 312, 335.59),
(9, 315, 384.25),
(9, 318, 399.12),
(9, 321, 358.17),
(9, 324, 379.3),
(9, 327, 395.55),
(9, 330, 253.65),
(9, 333, 263.74),
(9, 336, 329.8);

-- --------------------------------------------------------

--
-- Structure de la table `license`
--

CREATE TABLE `license` (
  `id` int(11) NOT NULL,
  `license` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `name` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `acteur_speciaux`
--
ALTER TABLE `acteur_speciaux`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `athelete`
--
ALTER TABLE `athelete`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`email`);

--
-- Index pour la table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `course_athelete`
--
ALTER TABLE `course_athelete`
  ADD PRIMARY KEY (`course_id`,`athelete_id`),
  ADD KEY `athelete_id` (`athelete_id`);

--
-- Index pour la table `license`
--
ALTER TABLE `license`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `acteur_speciaux`
--
ALTER TABLE `acteur_speciaux`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `athelete`
--
ALTER TABLE `athelete`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=369;

--
-- AUTO_INCREMENT pour la table `course`
--
ALTER TABLE `course`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `license`
--
ALTER TABLE `license`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=417;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `course_athelete`
--
ALTER TABLE `course_athelete`
  ADD CONSTRAINT `course_athelete_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_athelete_ibfk_2` FOREIGN KEY (`athelete_id`) REFERENCES `athelete` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

