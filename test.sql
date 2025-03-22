-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 06 mars 2025 à 11:41
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
  `license` varchar(50) DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `nationality` varchar(20) NOT NULL,
  `distance` int(32) NOT NULL,
  `date_de_naissance` date DEFAULT NULL,
  `login` varchar(255) DEFAULT NULL,
  `penality` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `temps` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `athelete`
--

INSERT INTO `athelete` (`name`, `firstname`, `email`, `password`, `license`, `id`, `nationality`, `distance`, `date_de_naissance`, `login`, `penality`, `status`, `temps`) VALUES
('Martin', 'Jean', 'jean.martin@example.com', 'password1', 'LIC123', 238, 'Français', 100, NULL, NULL, 'Faux départ', NULL, 0),
('Dubois', 'Marie', 'marie.dubois@example.com', 'password2', 'LIC456', 239, 'Belge', 400, NULL, NULL, 'Faux départ', NULL, 0),
('Thomas', 'Pierre', 'pierre.thomas@example.com', 'password3', 'LIC789', 240, 'Suisse', 1000, NULL, NULL, NULL, NULL, 0),
('Robert', 'Sophie', 'sophie.robert@example.com', 'password4', 'LIC101', 241, 'Canadien', 100, NULL, NULL, NULL, NULL, 0),
('Richard', 'Luc', 'luc.richard@example.com', 'password5', 'LIC102', 242, 'Allemand', 400, NULL, NULL, NULL, NULL, 0),
('Petit', 'Claire', 'claire.petit@example.com', 'password6', 'LIC103', 243, 'Italien', 1000, NULL, NULL, NULL, NULL, 0),
('Durand', 'Paul', 'paul.durand@example.com', 'password7', 'LIC104', 244, 'Espagnol', 100, NULL, NULL, NULL, NULL, 0),
('Leroy', 'Julie', 'julie.leroy@example.com', 'password8', 'LIC105', 245, 'Portugais', 400, NULL, NULL, NULL, NULL, 0),
('Moreau', 'Marc', 'marc.moreau@example.com', 'password9', 'LIC106', 246, 'Américain', 1000, NULL, NULL, NULL, NULL, 0),
('Simon', 'Laura', 'laura.simon@example.com', 'password10', 'LIC107', 247, 'Britannique', 100, NULL, NULL, NULL, NULL, 0),
('Laurent', 'Nicolas', 'nicolas.laurent@example.com', 'password11', 'LIC108', 248, 'Australien', 400, NULL, NULL, NULL, NULL, 0),
('Michel', 'Alice', 'alice.michel@example.com', 'password12', 'LIC109', 249, 'Néerlandais', 1000, NULL, NULL, NULL, NULL, 0),
('Garcia', 'David', 'david.garcia@example.com', 'password13', 'LIC110', 250, 'Mexicain', 100, NULL, NULL, NULL, NULL, 0),
('Rodriguez', 'Sarah', 'sarah.rodriguez@example.com', 'password14', 'LIC111', 251, 'Brésilien', 400, NULL, NULL, NULL, NULL, 0),
('Martinez', 'Thomas', 'thomas.martinez@example.com', 'password15', 'LIC112', 252, 'Argentin', 1000, NULL, NULL, NULL, NULL, 0),
('Hernandez', 'Emma', 'emma.hernandez@example.com', 'password16', 'LIC113', 253, 'Chilien', 100, NULL, NULL, NULL, NULL, 0),
('Lopez', 'Louis', 'louis.lopez@example.com', 'password17', 'LIC114', 254, 'Colombien', 400, NULL, NULL, NULL, NULL, 0),
('Gonzalez', 'Chloé', 'chloe.gonzalez@example.com', 'password18', 'LIC115', 255, 'Péruvien', 1000, NULL, NULL, NULL, NULL, 0),
('Perez', 'Antoine', 'antoine.perez@example.com', 'password19', 'LIC116', 256, 'Vénézuélien', 100, NULL, NULL, NULL, NULL, 0),
('Sanchez', 'Manon', 'manon.sanchez@example.com', 'password20', 'LIC117', 257, 'Uruguayen', 400, NULL, NULL, NULL, NULL, 0),
('Ramirez', 'Hugo', 'hugo.ramirez@example.com', 'password21', 'LIC118', 258, 'Paraguayen', 1000, NULL, NULL, NULL, NULL, 0),
('Torres', 'Ines', 'ines.torres@example.com', 'password22', 'LIC119', 259, 'Équatorien', 100, NULL, NULL, NULL, NULL, 0),
('Flores', 'Léo', 'leo.flores@example.com', 'password23', 'LIC120', 260, 'Bolivien', 400, NULL, NULL, NULL, NULL, 0),
('Rivera', 'Léa', 'lea.rivera@example.com', 'password24', 'LIC121', 261, 'Costaricain', 1000, NULL, NULL, NULL, NULL, 0),
('Gomez', 'Raphaël', 'raphael.gomez@example.com', 'password25', 'LIC122', 262, 'Panaméen', 100, NULL, NULL, NULL, NULL, 0),
('Diaz', 'Zoé', 'zoe.diaz@example.com', 'password26', 'LIC123', 263, 'Français', 400, NULL, NULL, NULL, NULL, 0),
('Reyes', 'Gabriel', 'gabriel.reyes@example.com', 'password27', 'LIC124', 264, 'Belge', 1000, NULL, NULL, NULL, NULL, 0),
('Morales', 'Louise', 'louise.morales@example.com', 'password28', 'LIC125', 265, 'Suisse', 100, NULL, NULL, NULL, NULL, 0),
('Ortiz', 'Adam', 'adam.ortiz@example.com', 'password29', 'LIC126', 266, 'Canadien', 400, NULL, NULL, NULL, NULL, 0),
('Gutierrez', 'Jules', 'jules.gutierrez@example.com', 'password30', 'LIC127', 267, 'Allemand', 1000, NULL, NULL, NULL, NULL, 0),
('Cruz', 'Mia', 'mia.cruz@example.com', 'password31', 'LIC128', 268, 'Italien', 100, NULL, NULL, NULL, NULL, 0),
('Ramos', 'Noah', 'noah.ramos@example.com', 'password32', 'LIC129', 269, 'Espagnol', 400, NULL, NULL, NULL, NULL, 0),
('Mendez', 'Lina', 'lina.mendez@example.com', 'password33', 'LIC130', 270, 'Portugais', 1000, NULL, NULL, NULL, NULL, 0),
('Chavez', 'Ethan', 'ethan.chavez@example.com', 'password34', 'LIC131', 271, 'Américain', 100, NULL, NULL, NULL, NULL, 0),
('Ruiz', 'Anna', 'anna.ruiz@example.com', 'password35', 'LIC132', 272, 'Britannique', 400, NULL, NULL, NULL, NULL, 0),
('Alvarez', 'Mathis', 'mathis.alvarez@example.com', 'password36', 'LIC133', 273, 'Australien', 1000, NULL, NULL, NULL, NULL, 0),
('Jimenez', 'Lola', 'lola.jimenez@example.com', 'password37', 'LIC134', 274, 'Néerlandais', 100, NULL, NULL, NULL, NULL, 0),
('Mendoza', 'Nathan', 'nathan.mendoza@example.com', 'password38', 'LIC135', 275, 'Mexicain', 400, NULL, NULL, NULL, NULL, 0),
('Vargas', 'Eva', 'eva.vargas@example.com', 'password39', 'LIC136', 276, 'Brésilien', 1000, NULL, NULL, NULL, NULL, 0),
('Castillo', 'Aaron', 'aaron.castillo@example.com', 'password40', 'LIC137', 277, 'Argentin', 100, NULL, NULL, NULL, NULL, 0),
('Romero', 'Luna', 'luna.romero@example.com', 'password41', 'LIC138', 278, 'Chilien', 400, NULL, NULL, NULL, NULL, 0),
('Ortega', 'Paul', 'paul.ortega@example.com', 'password42', 'LIC139', 279, 'Colombien', 1000, NULL, NULL, NULL, NULL, 0),
('Soto', 'Lena', 'lena.soto@example.com', 'password43', 'LIC140', 280, 'Péruvien', 100, NULL, NULL, NULL, NULL, 0),
('Delgado', 'Rayan', 'rayan.delgado@example.com', 'password44', 'LIC141', 281, 'Vénézuélien', 400, NULL, NULL, NULL, NULL, 0),
('Rojas', 'Mila', 'mila.rojas@example.com', 'password45', 'LIC142', 282, 'Uruguayen', 1000, NULL, NULL, NULL, NULL, 0),
('Guerrero', 'Noé', 'noe.guerrero@example.com', 'password46', 'LIC143', 283, 'Paraguayen', 100, NULL, NULL, NULL, NULL, 0),
('Santos', 'Alice', 'alice.santos@example.com', 'password47', 'LIC144', 284, 'Équatorien', 400, NULL, NULL, NULL, NULL, 0),
('Castro', 'Liam', 'liam.castro@example.com', 'password48', 'LIC145', 285, 'Bolivien', 1000, NULL, NULL, NULL, NULL, 0),
('Vasquez', 'Emma', 'emma.vasquez@example.com', 'password49', 'LIC146', 286, 'Costaricain', 100, NULL, NULL, NULL, NULL, 0),
('Fernandez', 'Louis', 'louis.fernandez@example.com', 'password50', 'LIC147', 287, 'Panaméen', 400, NULL, NULL, NULL, NULL, 0),
('Gonzales', 'Chloé', 'chloe.gonzales@example.com', 'password51', 'LIC148', 288, 'Français', 1000, NULL, NULL, NULL, NULL, 0),
('Pena', 'Antoine', 'antoine.pena@example.com', 'password52', 'LIC149', 289, 'Belge', 100, NULL, NULL, NULL, NULL, 0),
('Rios', 'Manon', 'manon.rios@example.com', 'password53', 'LIC150', 290, 'Suisse', 400, NULL, NULL, NULL, NULL, 0),
('Acosta', 'Hugo', 'hugo.acosta@example.com', 'password54', 'LIC151', 291, 'Canadien', 1000, NULL, NULL, NULL, NULL, 0),
('Cabrera', 'Ines', 'ines.cabrera@example.com', 'password55', 'LIC152', 292, 'Allemand', 100, NULL, NULL, NULL, NULL, 0),
('Medina', 'Léo', 'leo.medina@example.com', 'password56', 'LIC153', 293, 'Italien', 400, NULL, NULL, NULL, NULL, 0),
('Herrera', 'Léa', 'lea.herrera@example.com', 'password57', 'LIC154', 294, 'Espagnol', 1000, NULL, NULL, NULL, NULL, 0),
('Aguilar', 'Raphaël', 'raphael.aguilar@example.com', 'password58', 'LIC155', 295, 'Portugais', 100, NULL, NULL, NULL, NULL, 0),
('Vega', 'Zoé', 'zoe.vega@example.com', 'password59', 'LIC156', 296, 'Américain', 400, NULL, NULL, NULL, NULL, 0),
('Rivas', 'Gabriel', 'gabriel.rivas@example.com', 'password60', 'LIC157', 297, 'Britannique', 1000, NULL, NULL, NULL, NULL, 0),
('Valdez', 'Louise', 'louise.valdez@example.com', 'password61', 'LIC158', 298, 'Australien', 100, NULL, NULL, NULL, NULL, 0),
('Cortez', 'Adam', 'adam.cortez@example.com', 'password62', 'LIC159', 299, 'Néerlandais', 400, NULL, NULL, NULL, NULL, 0),
('Salazar', 'Jules', 'jules.salazar@example.com', 'password63', 'LIC160', 300, 'Mexicain', 1000, NULL, NULL, NULL, NULL, 0),
('Gallegos', 'Mia', 'mia.gallegos@example.com', 'password64', 'LIC161', 301, 'Brésilien', 100, NULL, NULL, NULL, NULL, 0),
('Campos', 'Noah', 'noah.campos@example.com', 'password65', 'LIC162', 302, 'Argentin', 400, NULL, NULL, NULL, NULL, 0),
('Rosales', 'Lina', 'lina.rosales@example.com', 'password66', 'LIC163', 303, 'Chilien', 1000, NULL, NULL, NULL, NULL, 0),
('Deleon', 'Ethan', 'ethan.deleon@example.com', 'password67', 'LIC164', 304, 'Colombien', 100, NULL, NULL, NULL, NULL, 0),
('Miranda', 'Anna', 'anna.miranda@example.com', 'password68', 'LIC165', 305, 'Péruvien', 400, NULL, NULL, NULL, NULL, 0),
('Huerta', 'Mathis', 'mathis.huerta@example.com', 'password69', 'LIC166', 306, 'Vénézuélien', 1000, NULL, NULL, NULL, NULL, 0),
('Sandoval', 'Lola', 'lola.sandoval@example.com', 'password70', 'LIC167', 307, 'Uruguayen', 100, NULL, NULL, NULL, NULL, 0),
('Zamora', 'Nathan', 'nathan.zamora@example.com', 'password71', 'LIC168', 308, 'Paraguayen', 400, NULL, NULL, NULL, NULL, 0),
('Pacheco', 'Eva', 'eva.pacheco@example.com', 'password72', 'LIC169', 309, 'Équatorien', 1000, NULL, NULL, NULL, NULL, 0),
('Escobar', 'Aaron', 'aaron.escobar@example.com', 'password73', 'LIC170', 310, 'Bolivien', 100, NULL, NULL, NULL, NULL, 0),
('Maldonado', 'Luna', 'luna.maldonado@example.com', 'password74', 'LIC171', 311, 'Costaricain', 400, NULL, NULL, NULL, NULL, 0),
('Suarez', 'Paul', 'paul.suarez@example.com', 'password75', 'LIC172', 312, 'Panaméen', 1000, NULL, NULL, NULL, NULL, 0),
('Zavala', 'Lena', 'lena.zavala@example.com', 'password76', 'LIC173', 313, 'Français', 100, NULL, NULL, NULL, NULL, 0),
('Bernal', 'Rayan', 'rayan.bernal@example.com', 'password77', 'LIC174', 314, 'Belge', 400, NULL, NULL, NULL, NULL, 0),
('Beltran', 'Mila', 'mila.beltran@example.com', 'password78', 'LIC175', 315, 'Suisse', 1000, NULL, NULL, NULL, NULL, 0),
('Avila', 'Noé', 'noe.avila@example.com', 'password79', 'LIC176', 316, 'Canadien', 100, NULL, NULL, NULL, NULL, 0),
('Solis', 'Alice', 'alice.solis@example.com', 'password80', 'LIC177', 317, 'Allemand', 400, NULL, NULL, NULL, NULL, 0),
('Lozano', 'Liam', 'liam.lozano@example.com', 'password81', 'LIC178', 318, 'Italien', 1000, NULL, NULL, NULL, NULL, 0),
('Juarez', 'Emma', 'emma.juarez@example.com', 'password82', 'LIC179', 319, 'Espagnol', 100, NULL, NULL, NULL, NULL, 0),
('Mejia', 'Louis', 'louis.mejia@example.com', 'password83', 'LIC180', 320, 'Portugais', 400, NULL, NULL, NULL, NULL, 0),
('Ibarra', 'Chloé', 'chloe.ibarra@example.com', 'password84', 'LIC181', 321, 'Américain', 1000, NULL, NULL, NULL, NULL, 0),
('Carrillo', 'Antoine', 'antoine.carrillo@example.com', 'password85', 'LIC182', 322, 'Britannique', 100, NULL, NULL, NULL, NULL, 0),
('Cervantes', 'Manon', 'manon.cervantes@example.com', 'password86', 'LIC183', 323, 'Australien', 400, NULL, NULL, NULL, NULL, 0),
('Galvan', 'Hugo', 'hugo.galvan@example.com', 'password87', 'LIC184', 324, 'Néerlandais', 1000, NULL, NULL, NULL, NULL, 0),
('Tapia', 'Ines', 'ines.tapia@example.com', 'password88', 'LIC185', 325, 'Mexicain', 100, NULL, NULL, NULL, NULL, 0),
('Rangel', 'Léo', 'leo.rangel@example.com', 'password89', 'LIC186', 326, 'Brésilien', 400, NULL, NULL, NULL, NULL, 0),
('Duarte', 'Léa', 'lea.duarte@example.com', 'password90', 'LIC187', 327, 'Argentin', 1000, NULL, NULL, NULL, NULL, 0),
('Valencia', 'Raphaël', 'raphael.valencia@example.com', 'password91', 'LIC188', 328, 'Chilien', 100, NULL, NULL, NULL, NULL, 0),
('Espinoza', 'Zoé', 'zoe.espinoza@example.com', 'password92', 'LIC189', 329, 'Colombien', 400, NULL, NULL, NULL, NULL, 0),
('Aguirre', 'Gabriel', 'gabriel.aguirre@example.com', 'password93', 'LIC190', 330, 'Péruvien', 1000, NULL, NULL, NULL, NULL, 0),
('Trevino', 'Louise', 'louise.trevino@example.com', 'password94', 'LIC191', 331, 'Vénézuélien', 100, NULL, NULL, NULL, NULL, 0),
('Mercado', 'Adam', 'adam.mercado@example.com', 'password95', 'LIC192', 332, 'Uruguayen', 400, NULL, NULL, NULL, NULL, 0),
('Leal', 'Jules', 'jules.leal@example.com', 'password96', 'LIC193', 333, 'Paraguayen', 1000, NULL, NULL, NULL, NULL, 0),
('Salinas', 'Mia', 'mia.salinas@example.com', 'password97', 'LIC194', 334, 'Équatorien', 100, NULL, NULL, NULL, NULL, 0),
('Marquez', 'Noah', 'noah.marquez@example.com', 'password98', 'LIC195', 335, 'Bolivien', 400, NULL, NULL, NULL, NULL, 0),
('Villarreal', 'Lina', 'lina.villarreal@example.com', 'password99', 'LIC196', 336, 'Costaricain', 1000, NULL, NULL, NULL, NULL, 0),
('Diatta', 'Mouhamed Ibrahim', 'okjloce@gmail.com', '1234', '6738', 367, 'Sénégal', 100, '2004-12-15', 'mk', NULL, NULL, 0);

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
(3, '2025-03-03', 'Stade A', '100m', 'Marie Curie'),
(4, '2025-03-04', 'Stade B', '400m', 'Pierre Durand'),
(5, '2025-03-04', 'Stade B', ' 400m', 'Lucie Martin'),
(6, '2025-03-04', 'Stade B', '400m', 'Paul Lefevre'),
(7, '2025-03-05', 'Stade C', '1000m', 'Sophie Lambert'),
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
(1, 238, 10.13),
(1, 241, 8.35),
(1, 244, 9.33),
(1, 247, 10.65),
(1, 250, 7.52),
(1, 253, 8.54),
(1, 256, 9.61),
(1, 259, 11.93),
(1, 262, 8.33),
(1, 265, 9.49),
(1, 268, 11.37),
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
(4, 239, 41.56),
(4, 242, 40.61),
(4, 245, 40.79),
(4, 248, 49.92),
(4, 251, 44.23),
(4, 254, 48.58),
(4, 257, 49.33),
(4, 260, 47.56),
(4, 263, 41.98),
(4, 266, 44.83),
(4, 269, 47.76),
(5, 275, 0),
(5, 278, 0),
(5, 281, 0),
(5, 284, 0),
(5, 287, 0),
(5, 290, 0),
(5, 293, 0),
(5, 296, 0),
(5, 299, 0),
(5, 302, 0),
(5, 305, 0),
(6, 272, 0),
(6, 275, 0),
(6, 278, 0),
(6, 281, 0),
(6, 284, 0),
(6, 287, 0),
(6, 290, 0),
(6, 293, 0),
(6, 296, 0),
(6, 299, 0),
(6, 302, 0),
(7, 240, 0),
(7, 243, 0),
(7, 246, 0),
(7, 249, 0),
(7, 252, 0),
(7, 255, 0),
(7, 258, 0),
(7, 261, 0),
(7, 264, 0),
(7, 267, 0),
(7, 270, 0),
(8, 273, 0),
(8, 276, 0),
(8, 279, 0),
(8, 282, 0),
(8, 285, 0),
(8, 288, 0),
(8, 291, 0),
(8, 294, 0),
(8, 297, 0),
(8, 300, 0),
(8, 303, 0),
(9, 306, 0),
(9, 309, 0),
(9, 312, 0),
(9, 315, 0),
(9, 318, 0),
(9, 321, 0),
(9, 324, 0),
(9, 327, 0),
(9, 330, 0),
(9, 333, 0),
(9, 336, 0);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=368;

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
