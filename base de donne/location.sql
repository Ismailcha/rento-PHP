-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2023 at 12:27 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `location`
--

-- --------------------------------------------------------

--
-- Table structure for table `besoin`
--

CREATE TABLE `besoin` (
  `id` int(11) NOT NULL,
  `categorie` int(15) DEFAULT NULL,
  `titre` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `tel` int(20) NOT NULL,
  `date_article` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `photo` text DEFAULT NULL,
  `urgent` text NOT NULL DEFAULT 'non'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `besoin`
--

INSERT INTO `besoin` (`id`, `categorie`, `titre`, `description`, `email`, `tel`, `date_article`, `photo`, `urgent`) VALUES
(24, 1, '11', '11', 'f@f.f', 11, '2023-08-15 23:00:00', 'img/logo-IFIAG.png', 'oui'),
(25, 2, '22', '222', 'f@f.f', 22, '2023-08-15 23:00:00', '', 'oui');

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `designation` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id`, `designation`) VALUES
(1, 'Immoubiliers'),
(2, 'Outillage'),
(3, 'Outil évènementiel');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `sujet` varchar(50) DEFAULT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `nom`, `email`, `sujet`, `message`) VALUES
(1, 'najia', 'najiat@gmail.com', 'urgent', 'demande de travaille'),
(2, 'mama', 'mama@gmail.fr', 'demande de stage', 'lettre de motivation'),
(3, 'brahim', 'brahim@gmail.com', 'urgent', 'contacter moi sur mon tél');

-- --------------------------------------------------------

--
-- Table structure for table `evenement`
--

CREATE TABLE `evenement` (
  `id` int(11) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `titre` varchar(100) DEFAULT NULL,
  `etat` varchar(15) DEFAULT NULL,
  `ville` varchar(30) DEFAULT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `prix1` float DEFAULT NULL,
  `prix2` float DEFAULT NULL,
  `prix3` float DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image1` varchar(60) DEFAULT NULL,
  `image2` varchar(60) DEFAULT NULL,
  `image3` varchar(60) DEFAULT NULL,
  `image4` varchar(60) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `id_cat` int(11) DEFAULT NULL,
  `date_ann` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evenement`
--

INSERT INTO `evenement` (`id`, `type`, `titre`, `etat`, `ville`, `adresse`, `prix`, `prix1`, `prix2`, `prix3`, `description`, `image1`, `image2`, `image3`, `image4`, `email`, `id_cat`, `date_ann`) VALUES
(1, 'Accessoires Femme', 'LOCATION DE BAGUE', 'neuf', 'Rabat', 'agdal rue de france', 100, 200, 500, 2000, 'bague d\'or', 'eve1.jpg', '', '', '', 'ennasrisoukaina18@gmail.com', 3, '2023-07-06 11:32:43'),
(2, 'Vêtements de Cérémonie Homme', 'LOCATION DE COSTUME', 'Bon', 'Marakech', 'guillise', 10, 100, 1000, 2000, 'bon etat', 'even2.jpg', '', '', '', 'jabir@hotmail.com', 3, '2023-07-06 11:36:09'),
(3, 'Animation', 'ANNIMATEUR', 'Bon', 'Kenitra', 'khabazzat', 200, 800, 0, 0, 'group de 10 persoones', 'even3.jpg', 'even4.jpg', 'even5.jpg', 'even6.jpg', 'jabir@hotmail.com', 3, '2023-07-06 11:41:37'),
(4, 'Animation', 'GROUPE ANIMATION', 'Bon', 'Marakech', 'guillise', 10, 200, 3000, 4000, 'group de 10', 'even4.jpg', '', '', '', 'fati@hotmail.com', 3, '2023-07-17 00:01:54'),
(5, 'Animation', 'TTT modifier', 'Bon', 'Rabat', 'ggg', 2323, 2323, 2323, 2323, 'gggg', 'logo-IFIAG.png', '', '', '', 'f@f.f', 3, '2023-08-18 14:33:01');

-- --------------------------------------------------------

--
-- Table structure for table `immoubilier`
--

CREATE TABLE `immoubilier` (
  `id` int(11) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `titre` varchar(100) DEFAULT NULL,
  `surface` int(11) DEFAULT NULL,
  `etage` varchar(15) DEFAULT NULL,
  `nbchambre` int(11) DEFAULT NULL,
  `nbsalon` int(11) DEFAULT NULL,
  `nbwc` int(11) DEFAULT NULL,
  `nbbain` int(11) DEFAULT NULL,
  `nbtotal` int(11) DEFAULT NULL,
  `cuisine` varchar(15) DEFAULT NULL,
  `meuble` varchar(15) DEFAULT NULL,
  `ville` varchar(15) DEFAULT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image1` varchar(60) DEFAULT NULL,
  `image2` varchar(60) DEFAULT NULL,
  `image3` varchar(60) DEFAULT NULL,
  `image4` varchar(60) DEFAULT NULL,
  `id_cat` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `date_ann` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `immoubilier`
--

INSERT INTO `immoubilier` (`id`, `type`, `titre`, `surface`, `etage`, `nbchambre`, `nbsalon`, `nbwc`, `nbbain`, `nbtotal`, `cuisine`, `meuble`, `ville`, `adresse`, `prix`, `description`, `image1`, `image2`, `image3`, `image4`, `id_cat`, `email`, `date_ann`) VALUES
(1, 'Appartement', 'LOCATION D\'APPARTEMENT', 50, '2', 2, 1, 1, 1, 5, 'equipe', 'oui', 'Rabat', 'hay nahda2', 3000, 'wifi+securité', 'immouble1.jpg', '', '', '', 1, 'ennasrisoukaina18@gmail.com', '2023-07-06 10:06:57'),
(2, 'Villa', 'LOCATION VILLA', 500, 'Autre', 5, 5, 5, 5, 20, 'non equipe', 'non', 'Salé', 'hay sallam', 5000, 'rien', 'immoouble2.jpg', '', '', '', 1, 'jabir@hotmail.com', '2023-07-06 10:11:26'),
(3, 'Bureau', 'LOCATION DE BUREAU', 80, 'Autre', 0, 0, 0, 0, 0, 'autre', 'autre', 'Témara', 'massira1', 500, 'hawtaa', 'immouble3.jpg', 'immouble4.jpg', 'immouble5.jpg', 'immouble6.jpg', 1, 'islam@hotmail.fr', '2023-07-06 10:18:39'),
(5, 'Terrain', 'LOCATION DE TERRAIN', 1000, 'Autre', 0, 0, 0, 0, 0, 'autre', 'autre', 'Mekens', 'bab karouine', 10000, 'bon ocassion', 'immouble3.jpg', '', '', '', 1, 'walid@gmail.com', '2023-07-16 23:58:10'),
(7, 'Maison', 'TEST modifier', 2314, '7', 1, 1, 0, 1, 1, 'equipe', 'oui', 'Rabat', 'adresse test', 2000, 'test', 'logo-IFIAG.png', '', '', '', 1, 'f@f.f', '2023-08-18 14:21:00');

-- --------------------------------------------------------

--
-- Table structure for table `materiaux`
--

CREATE TABLE `materiaux` (
  `id` int(11) NOT NULL,
  `type` varchar(30) DEFAULT NULL,
  `titre` varchar(100) DEFAULT NULL,
  `etat` varchar(15) DEFAULT NULL,
  `ville` varchar(30) DEFAULT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image1` varchar(60) DEFAULT NULL,
  `image2` varchar(60) DEFAULT NULL,
  `image3` varchar(60) DEFAULT NULL,
  `image4` varchar(60) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `id_cat` int(11) DEFAULT NULL,
  `date_ann` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `prix1` float DEFAULT NULL,
  `prix2` float DEFAULT NULL,
  `prix3` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materiaux`
--

INSERT INTO `materiaux` (`id`, `type`, `titre`, `etat`, `ville`, `adresse`, `prix`, `description`, `image1`, `image2`, `image3`, `image4`, `email`, `id_cat`, `date_ann`, `prix1`, `prix2`, `prix3`) VALUES
(1, 'Caméras', 'LOCATION DE CAMÉRA', 'neuf', 'Rabat', 'hay rachad', 50, 'rien', 'outil1.jpg', '', '', '', 'ennasrisoukaina18@gmail.com', 2, '2023-07-06 10:45:37', 150, 500, 2000),
(2, 'Livres', 'HARRY POTER', 'moyen', 'Fes', 'hay rahma', 10, 'bon etat', 'outil2.jpg', '', '', '', 'jabir@hotmail.com', 2, '2023-07-06 10:49:10', 100, 500, 1000),
(3, 'Musique', 'INSTRUMENTS DE MUSIQUE', 'bon', 'Casablanca', 'california', 20, 'bonne occasion', 'outill1.jpg', 'outill2.jpg', 'outill3.jpg', 'outill4.jpg', 'ennasricontact@gmail.com', 2, '2023-07-06 11:09:06', 100, 200, 500),
(4, 'Caméras', 'LOCATION DE CAMÉRA', 'neuf', 'Fes', 'moulay akoub', 10, 'rien', 'outil1.jpg', '', '', '', 'walid@gmail.com', 2, '2023-07-16 23:59:44', 20, 30, 400),
(5, 'Jeux/Jouets', 'SSS modifier', 'neuf', 'Kenitra', 'ssss', 222, 'sdfsdfs', 'logo-IFIAG.png', '', '', NULL, 'f@f.f', 2, '2023-08-23 11:37:25', 21, 22, 20),
(6, 'Electromenager', 'SSSS modifier', 'bon', 'Fes', 'dssdf', 12, 'sdfsdfsdf', 'Untitled.png', '', '', NULL, 'f@f.f', 2, '2023-08-18 14:29:22', 222, 222, 222);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom_prenom` varchar(50) DEFAULT NULL,
  `tel` varchar(30) DEFAULT NULL,
  `ville` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mot_passe` varchar(100) DEFAULT NULL,
  `domaine` varchar(30) DEFAULT NULL,
  `nom_boutique` varchar(100) DEFAULT NULL,
  `token` varchar(100) DEFAULT 'null',
  `type` varchar(30) DEFAULT NULL,
  `logo` varchar(60) DEFAULT NULL,
  `date_ins` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom_prenom`, `tel`, `ville`, `email`, `mot_passe`, `domaine`, `nom_boutique`, `token`, `type`, `logo`, `date_ins`) VALUES
(1, 'ennasri soukaina', '0615446529', 'rabat', 'ennasrisoukaina18@gmail.com', '$2y$10$RHLwTDVR1GFX.x7KdGEdcedD.FIkoKlDssfJ9OvnvmrTWRHeuWXou', NULL, NULL, 'null', 'particulier', NULL, '2023-07-05 18:03:53'),
(2, 'jabir abdillah', '0621956354', 'salé', 'jabir@hotmail.com', '$2y$10$AeLcf5mbUL48iNYaGzRW5uV53an5NUyAJkS6z/6crtLo5TD2iMCIu', 'Immoubiliers', 'jabir shop', 'null', 'professionnel', 'small_1588808514E8AnKmE3.jpg', '2023-07-07 00:19:34'),
(3, 'islam jabir', '0625147896', 'kenitra', 'islam@hotmail.fr', '$2y$10$3tfK8DtFCybxqtqjF6iCA.JCDILqcEngjilshlO/pJZZlPFZJTi5m', 'outillages', 'islam shop', 'null', 'professionnel', NULL, '2023-07-05 18:25:34'),
(4, 'sami jabir', '0625147896', 'temara', 'ennasricontact@gmail.com', '$2y$10$T8QLGWdooOdzCYIw4jGEZOZwUNQpehLv8s9xDI.Acwot28l9BtMz2', 'Outils événementiels', 'sami shop', 'null', 'professionnel', 'small_1588808514E8AnKmE3.jpg', '2023-07-05 18:29:28'),
(5, 'hamid hadri', '0625147896', 'tata', 'hamid@gmail.com', '$2y$10$ipmRe8Quu0KEJapu4iFP5uJZCXEnPZHF14Dnr62kxvPQnsjGvLFFS', 'Immoubiliers', 'hamid shop', 'null', 'professionnel', '', '2023-07-07 01:03:52'),
(6, 'ennasri fatimazahra', '0612459632', 'ifran', 'fati@hotmail.com', '$2y$10$hm.b4.aWlMkKP8JfPgxI2eD8folf4E575HDzMdO9b0G5ZOmo4xrpK', NULL, NULL, 'null', 'particulier', NULL, '2023-07-16 23:21:27'),
(7, 'naciri walid', '0615446529', 'benghrire', 'walid@gmail.com', '$2y$10$Us16/mkw6Mbm2XFjHNzD3.QlNgdjpYZryz3tv9PxOp2YRWdi3YdBK', 'Outils événementiels', 'walid shop', 'null', 'professionnel', 'what-is-certificate-enrollment-and-how-is-it-used.jpg', '2023-07-16 23:25:50'),
(8, 'test', '0611111111', 'rabat', 'f@f.f', '$2y$10$7foBRFmyIEODbV47Ya1ux.jTGd1qSRxIVfXGvahrf4LwI55gc3i6a', NULL, NULL, 'null', 'particulier', NULL, '2023-07-24 11:12:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `besoin`
--
ALTER TABLE `besoin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_utili` (`email`),
  ADD KEY `id_cat` (`categorie`);

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cat` (`id_cat`),
  ADD KEY `email_even` (`email`);

--
-- Indexes for table `immoubilier`
--
ALTER TABLE `immoubilier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cat` (`id_cat`),
  ADD KEY `email_immob` (`email`);

--
-- Indexes for table `materiaux`
--
ALTER TABLE `materiaux`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categorie` (`id_cat`),
  ADD KEY `email_materiaux` (`email`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `besoin`
--
ALTER TABLE `besoin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `immoubilier`
--
ALTER TABLE `immoubilier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `materiaux`
--
ALTER TABLE `materiaux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `besoin`
--
ALTER TABLE `besoin`
  ADD CONSTRAINT `email_utili` FOREIGN KEY (`email`) REFERENCES `utilisateur` (`email`),
  ADD CONSTRAINT `id_cat` FOREIGN KEY (`categorie`) REFERENCES `categorie` (`id`);

--
-- Constraints for table `evenement`
--
ALTER TABLE `evenement`
  ADD CONSTRAINT `email_even` FOREIGN KEY (`email`) REFERENCES `utilisateur` (`email`),
  ADD CONSTRAINT `evenement_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `categorie` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `immoubilier`
--
ALTER TABLE `immoubilier`
  ADD CONSTRAINT `email_immob` FOREIGN KEY (`email`) REFERENCES `utilisateur` (`email`),
  ADD CONSTRAINT `immoubilier_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `categorie` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `materiaux`
--
ALTER TABLE `materiaux`
  ADD CONSTRAINT `email_materiaux` FOREIGN KEY (`email`) REFERENCES `utilisateur` (`email`),
  ADD CONSTRAINT `materiaux_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `categorie` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
