-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 27, 2019 at 04:11 PM
-- Server version: 5.7.11
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loue_ta_salle`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessibilte`
--

CREATE TABLE `accessibilte` (
  `Id` int(11) NOT NULL,
  `nom` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `description` varchar(45) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `accessibilte`
--

INSERT INTO `accessibilte` (`Id`, `nom`, `description`) VALUES
(1, 'statonnement', NULL),
(2, 'À proximité des autobus', NULL),
(3, 'quai de reception', NULL),
(4, 'Rampe', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `equipement`
--

CREATE TABLE `equipement` (
  `Id` int(11) NOT NULL,
  `nom` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `equipement`
--

INSERT INTO `equipement` (`Id`, `nom`, `description`) VALUES
(1, 'Projecteurs', NULL),
(2, 'Rideaux', NULL),
(3, 'Chaises', NULL),
(4, 'Table', NULL),
(5, 'Haut parleur', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `evenement`
--

CREATE TABLE `evenement` (
  `Id` int(11) NOT NULL,
  `nom` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `description` varchar(1024) COLLATE utf8_bin NOT NULL,
  `Type_evenement_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `evenement_has_mot_cle`
--

CREATE TABLE `evenement_has_mot_cle` (
  `Id` int(11) NOT NULL,
  `evenement_Id` int(11) NOT NULL,
  `mot_cle_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `historique_administration`
--

CREATE TABLE `historique_administration` (
  `Id` int(11) NOT NULL,
  `titre` varchar(32) COLLATE utf8_bin NOT NULL,
  `description` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `Utilisateur_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `Id` int(11) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_debut` datetime DEFAULT NULL,
  `date_fin` datetime DEFAULT NULL,
  `locateur_Id` int(11) NOT NULL,
  `Salle_Id` int(11) NOT NULL,
  `Evenement_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `mot_cle`
--

CREATE TABLE `mot_cle` (
  `Id` int(11) NOT NULL,
  `mot_cle` varchar(45) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `salle`
--

CREATE TABLE `salle` (
  `Id` int(11) NOT NULL,
  `nom` varchar(45) COLLATE utf8_bin NOT NULL,
  `superficie` int(10) DEFAULT NULL,
  `capacite` int(11) DEFAULT NULL,
  `adresse_Id` int(11) NOT NULL,
  `statut` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `disponibilte` datetime DEFAULT NULL,
  `description` varchar(1024) COLLATE utf8_bin DEFAULT NULL,
  `prix_jour` decimal(10,2) NOT NULL,
  `no_civique` varchar(45) COLLATE utf8_bin NOT NULL,
  `code_postal` varchar(8) COLLATE utf8_bin NOT NULL,
  `ville` varchar(45) COLLATE utf8_bin NOT NULL,
  `province` varchar(45) COLLATE utf8_bin NOT NULL,
  `pays` varchar(45) COLLATE utf8_bin NOT NULL,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `proprietaire_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `salle`
--

INSERT INTO `salle` (`Id`, `nom`, `superficie`, `capacite`, `adresse_Id`, `statut`, `disponibilte`, `description`, `prix_jour`, `no_civique`, `code_postal`, `ville`, `province`, `pays`, `create_time`, `proprietaire_Id`) VALUES
(1, '\'hello\'', NULL, 0, 16, NULL, NULL, '\'rgwerger\'', '0.00', '', '', '', '', '', '2019-06-24 18:24:54', 1),
(2, '\'asdasdas\'', NULL, 0, 17, NULL, NULL, '\'asdsadasd\'', '0.00', '', '', '', '', '', '2019-06-24 18:27:37', 1),
(3, '\'111\'', NULL, 0, 18, NULL, NULL, '\'ergqegqegrqeg\'', '0.00', '', '', '', '', '', '2019-06-24 18:29:08', 1),
(4, 'ffw', 5, 5, 3, NULL, NULL, 'rqte5trg', '18.00', '', '', '', '', '', '2019-06-24 18:29:54', 1),
(5, '\'111\'', NULL, 0, 19, NULL, NULL, '\'wergerberb\'', '0.00', '', '', '', '', '', '2019-06-24 18:31:39', 1),
(6, '\'111\'', NULL, 0, 20, NULL, NULL, '\'wergerberb\'', '0.00', '', '', '', '', '', '2019-06-24 18:32:43', 1),
(7, '\'111\'', NULL, 0, 21, NULL, NULL, '\'wergerberb\'', '0.00', '', '', '', '', '', '2019-06-24 18:37:24', 1),
(8, '\'111\'', NULL, 0, 22, NULL, NULL, '\'wergerberb\'', '0.00', '', '', '', '', '', '2019-06-24 18:37:54', 1),
(9, '\'111\'', NULL, 0, 23, NULL, NULL, '\'wergerberb\'', '0.00', '', '', '', '', '', '2019-06-24 18:38:32', 1),
(10, '\'111\'', NULL, 0, 24, NULL, NULL, '\'wergerberb\'', '0.00', '', '', '', '', '', '2019-06-24 18:39:52', 1),
(11, '\'111\'', NULL, 0, 25, NULL, NULL, '\'wergerberb\'', '0.00', '', '', '', '', '', '2019-06-24 18:41:39', 1),
(12, '\'111\'', NULL, 0, 26, NULL, NULL, '\'wergerberb\'', '0.00', '', '', '', '', '', '2019-06-24 18:44:05', 1),
(13, '\'111\'', NULL, 0, 27, NULL, NULL, '\'wergerberb\'', '0.00', '', '', '', '', '', '2019-06-24 18:45:13', 1),
(14, '\'111\'', NULL, 0, 28, NULL, NULL, '\'wergerberb\'', '0.00', '', '', '', '', '', '2019-06-24 18:46:07', 1),
(15, '\'111\'', NULL, 0, 29, NULL, NULL, '\'wergerberb\'', '0.00', '', '', '', '', '', '2019-06-24 18:46:56', 1),
(16, '\'111\'', NULL, 0, 30, NULL, NULL, '\'wergerberb\'', '0.00', '', '', '', '', '', '2019-06-24 18:47:54', 1),
(17, '\'111\'', NULL, 0, 31, NULL, NULL, '\'wergerberb\'', '0.00', '', '', '', '', '', '2019-06-24 18:48:19', 1),
(18, '\'111\'', 555, 555, 32, NULL, NULL, '\'wergerberb\'', '0.00', '', '', '', '', '', '2019-06-24 18:49:16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `salle_has_accessibilte`
--

CREATE TABLE `salle_has_accessibilte` (
  `Salle_Id` int(11) NOT NULL,
  `Accessibilte_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `salle_has_equipement`
--

CREATE TABLE `salle_has_equipement` (
  `Salle_Id` int(11) NOT NULL,
  `Equipement_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `salle_has_type_evenement`
--

CREATE TABLE `salle_has_type_evenement` (
  `Salle_Id` int(11) NOT NULL,
  `Salle_Utilisateur_Id` int(11) NOT NULL,
  `Type_evenement_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_location`
--

CREATE TABLE `transaction_location` (
  `Id` int(11) NOT NULL,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `tarif` decimal(10,0) DEFAULT NULL,
  `prix` decimal(10,0) DEFAULT NULL,
  `total` decimal(10,0) DEFAULT NULL,
  `taxes` decimal(10,0) DEFAULT NULL,
  `statut paiement` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `methodepaiement` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `contrainte` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `Location_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `type_evenement`
--

CREATE TABLE `type_evenement` (
  `ID` int(11) NOT NULL,
  `nom` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `type_utilisateur`
--

CREATE TABLE `type_utilisateur` (
  `Id` int(11) NOT NULL,
  `nom` varchar(45) COLLATE utf8_bin NOT NULL,
  `description` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `type_utilisateur`
--

INSERT INTO `type_utilisateur` (`Id`, `nom`, `description`) VALUES
(1, 'membre', NULL),
(2, 'Propriétaire', NULL),
(3, 'Administrateur', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `Id` int(11) NOT NULL,
  `password` varchar(32) COLLATE utf8_bin NOT NULL,
  `nomUtilisateur` varchar(45) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `nom` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `prenom` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `adresse` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `description` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Type_utilisateur_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`Id`, `password`, `nomUtilisateur`, `email`, `nom`, `prenom`, `adresse`, `description`, `create_time`, `Type_utilisateur_Id`) VALUES
(1, 'admin', 'admin', NULL, NULL, NULL, NULL, NULL, '2019-06-24 15:43:35', 3),
(2, '\'\'', '\'hello\'', '\'hello@hello.com\'', '\'hello\'', '\'hello\'', '\'111,\'11\',\'hello\',\'hello\',\'hello\',\'hello\'\'', '\'hello\'', '2019-06-24 21:49:54', 1),
(3, '\'\'', '\'hello\'', '\'hello@hello.com\'', '\'hello\'', '\'hello\'', '\'111,\'11\',\'hello\',\'hello\',\'hello\',\'hello\'\'', '\'hello\'', '2019-06-24 22:07:35', 1),
(4, '\'232323233\'', '\'hello\'', '\'hello@hello.com\'', '\'hello\'', '\'hello\'', '\'111,\'11\',\'hello\',\'hello\',\'hello\',\'hello\'\'', '\'hello\'', '2019-06-24 22:13:41', 1),
(5, 'ohhello', '\'hello\'', '\'hello@hello.com\'', '\'hello\'', '\'hello\'', '\'111,\'11\',\'hello\',\'hello\',\'hello\',\'hello\'\'', '\'hello\'', '2019-06-24 22:14:23', 1),
(6, 'blabla', '\'hello\'', 'hello@hello.com', 'hello', 'hello', '111,11,hello,hello,hello,hello', 'hello', '2019-06-24 22:15:54', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accessibilte`
--
ALTER TABLE `accessibilte`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `equipement`
--
ALTER TABLE `equipement`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`Id`,`Type_evenement_ID`),
  ADD KEY `fk_Evenvement_Type_evenement1_idx` (`Type_evenement_ID`);

--
-- Indexes for table `evenement_has_mot_cle`
--
ALTER TABLE `evenement_has_mot_cle`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `evenement_Id` (`evenement_Id`),
  ADD KEY `mot_cle_Id` (`mot_cle_Id`);

--
-- Indexes for table `historique_administration`
--
ALTER TABLE `historique_administration`
  ADD PRIMARY KEY (`Id`,`Utilisateur_Id`),
  ADD KEY `fk_Historique_administration_Utilisateur1_idx` (`Utilisateur_Id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`Id`,`locateur_Id`,`Salle_Id`,`Evenement_Id`),
  ADD KEY `fk_Location_Utilisateur1_idx` (`locateur_Id`),
  ADD KEY `fk_Location_Salle1_idx` (`Salle_Id`),
  ADD KEY `fk_Location_Evenement1_idx` (`Evenement_Id`);

--
-- Indexes for table `mot_cle`
--
ALTER TABLE `mot_cle`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`Id`,`proprietaire_Id`),
  ADD KEY `fk_Salle_Utilisateur1_idx` (`proprietaire_Id`);

--
-- Indexes for table `salle_has_accessibilte`
--
ALTER TABLE `salle_has_accessibilte`
  ADD PRIMARY KEY (`Salle_Id`,`Accessibilte_Id`),
  ADD KEY `fk_Salle_has_Accessibilte_Accessibilte1_idx` (`Accessibilte_Id`),
  ADD KEY `fk_Salle_has_Accessibilte_Salle1_idx` (`Salle_Id`);

--
-- Indexes for table `salle_has_equipement`
--
ALTER TABLE `salle_has_equipement`
  ADD PRIMARY KEY (`Salle_Id`,`Equipement_Id`),
  ADD KEY `fk_Salle_has_Equipement_Equipement1_idx` (`Equipement_Id`),
  ADD KEY `fk_Salle_has_Equipement_Salle1_idx` (`Salle_Id`);

--
-- Indexes for table `salle_has_type_evenement`
--
ALTER TABLE `salle_has_type_evenement`
  ADD PRIMARY KEY (`Salle_Id`,`Salle_Utilisateur_Id`,`Type_evenement_ID`),
  ADD KEY `fk_Salle_has_Type_evenement_Type_evenement1_idx` (`Type_evenement_ID`),
  ADD KEY `fk_Salle_has_Type_evenement_Salle1_idx` (`Salle_Id`,`Salle_Utilisateur_Id`);

--
-- Indexes for table `transaction_location`
--
ALTER TABLE `transaction_location`
  ADD PRIMARY KEY (`Id`,`Location_Id`),
  ADD KEY `fk_Transaction_Location1_idx` (`Location_Id`);

--
-- Indexes for table `type_evenement`
--
ALTER TABLE `type_evenement`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `type_utilisateur`
--
ALTER TABLE `type_utilisateur`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`Id`,`Type_utilisateur_Id`),
  ADD KEY `fk_Utilisateur_Type_utilisateur1_idx` (`Type_utilisateur_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accessibilte`
--
ALTER TABLE `accessibilte`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `equipement`
--
ALTER TABLE `equipement`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `evenement_has_mot_cle`
--
ALTER TABLE `evenement_has_mot_cle`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `historique_administration`
--
ALTER TABLE `historique_administration`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mot_cle`
--
ALTER TABLE `mot_cle`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `salle`
--
ALTER TABLE `salle`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `salle_has_accessibilte`
--
ALTER TABLE `salle_has_accessibilte`
  MODIFY `Salle_Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `salle_has_equipement`
--
ALTER TABLE `salle_has_equipement`
  MODIFY `Salle_Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `salle_has_type_evenement`
--
ALTER TABLE `salle_has_type_evenement`
  MODIFY `Salle_Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transaction_location`
--
ALTER TABLE `transaction_location`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `type_evenement`
--
ALTER TABLE `type_evenement`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `type_utilisateur`
--
ALTER TABLE `type_utilisateur`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `evenement`
--
ALTER TABLE `evenement`
  ADD CONSTRAINT `fk_Evenvement_Type_evenement1` FOREIGN KEY (`Type_evenement_ID`) REFERENCES `type_evenement` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `evenement_has_mot_cle`
--
ALTER TABLE `evenement_has_mot_cle`
  ADD CONSTRAINT `FK_eve_id` FOREIGN KEY (`evenement_Id`) REFERENCES `evenement` (`Id`),
  ADD CONSTRAINT `FK_mot_cle_id` FOREIGN KEY (`mot_cle_Id`) REFERENCES `mot_cle` (`Id`),
  ADD CONSTRAINT `evenement_has_mot_cle_ibfk_1` FOREIGN KEY (`evenement_Id`) REFERENCES `evenement` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `evenement_has_mot_cle_ibfk_2` FOREIGN KEY (`mot_cle_Id`) REFERENCES `mot_cle` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `historique_administration`
--
ALTER TABLE `historique_administration`
  ADD CONSTRAINT `fk_Historique_administration_Utilisateur1` FOREIGN KEY (`Utilisateur_Id`) REFERENCES `utilisateur` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `fk_Location_Evenement1` FOREIGN KEY (`Evenement_Id`) REFERENCES `evenement` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Location_Salle1` FOREIGN KEY (`Salle_Id`) REFERENCES `salle` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Location_Utilisateur1` FOREIGN KEY (`locateur_Id`) REFERENCES `utilisateur` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `salle`
--
ALTER TABLE `salle`
  ADD CONSTRAINT `fk_Salle_Utilisateur1` FOREIGN KEY (`proprietaire_Id`) REFERENCES `utilisateur` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `salle_has_accessibilte`
--
ALTER TABLE `salle_has_accessibilte`
  ADD CONSTRAINT `fk_Salle_has_Accessibilte_Accessibilte1` FOREIGN KEY (`Accessibilte_Id`) REFERENCES `accessibilte` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Salle_has_Accessibilte_Salle1` FOREIGN KEY (`Salle_Id`) REFERENCES `salle` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `salle_has_equipement`
--
ALTER TABLE `salle_has_equipement`
  ADD CONSTRAINT `fk_Salle_has_Equipement_Equipement1` FOREIGN KEY (`Equipement_Id`) REFERENCES `equipement` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Salle_has_Equipement_Salle1` FOREIGN KEY (`Salle_Id`) REFERENCES `salle` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `salle_has_type_evenement`
--
ALTER TABLE `salle_has_type_evenement`
  ADD CONSTRAINT `fk_Salle_has_Type_evenement_Salle1` FOREIGN KEY (`Salle_Id`,`Salle_Utilisateur_Id`) REFERENCES `salle` (`Id`, `proprietaire_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Salle_has_Type_evenement_Type_evenement1` FOREIGN KEY (`Type_evenement_ID`) REFERENCES `type_evenement` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `transaction_location`
--
ALTER TABLE `transaction_location`
  ADD CONSTRAINT `fk_Transaction_Location1` FOREIGN KEY (`Location_Id`) REFERENCES `location` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `fk_Utilisateur_Type_utilisateur1` FOREIGN KEY (`Type_utilisateur_Id`) REFERENCES `type_utilisateur` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
