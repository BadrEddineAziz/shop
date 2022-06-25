-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 08 juin 2022 à 01:10
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `shop`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `idCategorie` int(11) NOT NULL AUTO_INCREMENT,
  `categorie` varchar(500) NOT NULL,
  PRIMARY KEY (`idCategorie`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`idCategorie`, `categorie`) VALUES
(1, 'VETEMENTS'),
(2, 'MAISON'),
(3, 'BEAUTE'),
(4, 'ACCESSOIRE'),
(5, 'SPORT'),
(6, 'ELECTRONIQUE');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `idClient` int(8) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `dateNaissance` date NOT NULL,
  `pays` varchar(20) NOT NULL,
  `adressLiverson` varchar(200) NOT NULL,
  PRIMARY KEY (`idClient`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `idCommande` int(10) NOT NULL AUTO_INCREMENT,
  `dateCommande` date NOT NULL,
  `poidsCommande` float NOT NULL,
  `etat` int(1) NOT NULL,
  `idClient` int(10) NOT NULL,
  PRIMARY KEY (`idCommande`),
  KEY `idClient` (`idClient`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `descriptions`
--

DROP TABLE IF EXISTS `descriptions`;
CREATE TABLE IF NOT EXISTS `descriptions` (
  `idDescription` int(11) NOT NULL AUTO_INCREMENT,
  `item` varchar(200) NOT NULL,
  `details` text NOT NULL,
  `idProduit` int(11) NOT NULL,
  PRIMARY KEY (`idDescription`),
  KEY `idProduit` (`idProduit`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `descriptions`
--

INSERT INTO `descriptions` (`idDescription`, `item`, `details`, `idProduit`) VALUES
(1, 'Couleur', 'Rose orange', 1),
(2, 'Style', 'Casual', 1),
(3, 'Couleur', 'Gris', 2),
(4, 'Style', 'Casual\r\n', 2),
(5, 'Couleur', 'Noir', 3),
(6, 'Style', 'Casual', 3),
(7, 'Type de motif', 'Unicolore', 3),
(8, 'Couleur', 'Multicolore', 4),
(9, 'Quantite	', '7 pieces', 4),
(10, 'Sexe', 'Homme', 4);

-- --------------------------------------------------------

--
-- Structure de la table `lignescommande`
--

DROP TABLE IF EXISTS `lignescommande`;
CREATE TABLE IF NOT EXISTS `lignescommande` (
  `idLigne` int(11) NOT NULL AUTO_INCREMENT,
  `quantite` int(11) NOT NULL,
  `prix` float NOT NULL,
  `idProduit` int(11) NOT NULL,
  `idCommande` int(11) NOT NULL,
  PRIMARY KEY (`idLigne`),
  KEY `idCommande` (`idCommande`),
  KEY `idProduit` (`idProduit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `photos`
--

DROP TABLE IF EXISTS `photos`;
CREATE TABLE IF NOT EXISTS `photos` (
  `idPhoto` int(11) NOT NULL AUTO_INCREMENT,
  `photo` text NOT NULL,
  `mainPhoto` int(8) NOT NULL,
  `idProduit` int(11) NOT NULL,
  PRIMARY KEY (`idPhoto`),
  KEY `idProduit` (`idProduit`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `photos`
--

INSERT INTO `photos` (`idPhoto`, `photo`, `mainPhoto`, `idProduit`) VALUES
(1, 'https://img.ltwebstatic.com/images3_pi/2022/04/26/16509542048173c5f4dffa23df74876417315fe39f_thumbnail_600x.webp', 1, 1),
(2, 'https://img.ltwebstatic.com/images3_pi/2022/04/18/16502519042a5d275b11403558845acdcabcb1cbe6_thumbnail_600x.webp', 0, 1),
(3, 'https://img.ltwebstatic.com/images3_pi/2022/04/26/1650954206468722fc4141e772de9bc54364eb1a34_thumbnail_600x.webp', 0, 1),
(4, 'https://img.ltwebstatic.com/images3_pi/2022/04/26/1650954207a9cb331c7d7ecf591b4cc6330d0a701c_thumbnail_600x.webp', 0, 1),
(5, 'https://img.ltwebstatic.com/images3_pi/2022/04/18/165027508534d38ebe7825e175afce3dd9c96a4c38_thumbnail_600x.webp', 1, 2),
(6, 'https://img.ltwebstatic.com/images3_pi/2022/04/17/16501859737a71cdc9aff344ea6274134700520b0a_thumbnail_600x.webp', 0, 2),
(7, 'https://img.ltwebstatic.com/images3_pi/2022/04/18/1650275091fec30a058ff4b89bd7090cfbeab44a6d_thumbnail_600x.webp', 0, 2),
(8, 'https://img.ltwebstatic.com/images3_pi/2022/03/14/164724578247869190ee6f05a3dd282539eaf91114_thumbnail_600x.webp', 1, 3),
(9, 'https://img.ltwebstatic.com/images3_pi/2022/03/14/1647245786df6c0647c0c0302a026b0d024bd2032f_thumbnail_600x.webp', 0, 3),
(10, 'https://img.ltwebstatic.com/images3_pi/2022/03/14/1647245789221a1815992f8881f7111d933e16f576_thumbnail_600x.webp', 0, 3),
(11, 'https://img.ltwebstatic.com/images3_pi/2022/05/24/1653385900eaf4fec3c6eacd4f18b593e2fdfb8f5e_thumbnail_600x.webp', 1, 4),
(12, 'https://img.ltwebstatic.com/images3_pi/2022/05/24/165338590211eed9bed27942f0bc3c88b6f554358d_thumbnail_600x.webp', 0, 4),
(13, 'https://img.ltwebstatic.com/images3_pi/2022/05/24/1653385904df00382f14e63efdfb553eda11086fcd_thumbnail_600x.webp', 0, 4);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `idProduit` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(500) CHARACTER SET latin1 NOT NULL,
  `prixProduit` int(111) NOT NULL,
  `dateMiseEnVente` date NOT NULL,
  `quantiteStock` int(111) NOT NULL,
  `promo` int(111) NOT NULL,
  `idCategorie` int(11) NOT NULL,
  PRIMARY KEY (`idProduit`),
  KEY `idCategorie` (`idCategorie`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf32;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`idProduit`, `libelle`, `prixProduit`, `dateMiseEnVente`, `quantiteStock`, `promo`, `idCategorie`) VALUES
(1, 'Homme T-shirt a motif batiment et lettres', 500, '2022-04-03', 700, 9, 1),
(2, 'Homme T-shirt a motif photo et lettres', 490, '2022-01-03', 20, 10, 1),
(3, 'Homme Pantalon a poche a cordon', 970, '2022-05-02', 300, 70, 1),
(4, 'Homme 7 pieces Collier a pendentif geometrique', 269, '2022-02-06', 233, 50, 4);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_ibfk_1` FOREIGN KEY (`idClient`) REFERENCES `clients` (`idClient`);

--
-- Contraintes pour la table `descriptions`
--
ALTER TABLE `descriptions`
  ADD CONSTRAINT `descriptions_ibfk_1` FOREIGN KEY (`idProduit`) REFERENCES `produits` (`idProduit`);

--
-- Contraintes pour la table `lignescommande`
--
ALTER TABLE `lignescommande`
  ADD CONSTRAINT `lignescommande_ibfk_1` FOREIGN KEY (`idCommande`) REFERENCES `commandes` (`idCommande`),
  ADD CONSTRAINT `lignescommande_ibfk_2` FOREIGN KEY (`idProduit`) REFERENCES `produits` (`idProduit`);

--
-- Contraintes pour la table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_ibfk_1` FOREIGN KEY (`idProduit`) REFERENCES `produits` (`idProduit`);

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_ibfk_1` FOREIGN KEY (`idCategorie`) REFERENCES `categories` (`idCategorie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
