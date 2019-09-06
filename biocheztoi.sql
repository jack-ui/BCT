-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 06 sep. 2019 à 07:27
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `biocheztoi`
--

-- --------------------------------------------------------

--
-- Structure de la table `boutique`
--

DROP TABLE IF EXISTS `boutique`;
CREATE TABLE IF NOT EXISTS `boutique` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `siret` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_boutique` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `livraison` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paiement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `ville` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_postal` int(11) NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_A1223C5464B64DCC` (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `boutique`
--

INSERT INTO `boutique` (`id`, `siret`, `nom_boutique`, `livraison`, `paiement`, `photo`, `userId`, `ville`, `code_postal`, `adresse`, `telephone`, `departement`, `region`, `description`) VALUES
(1, '1349857', 'La ferme des Jacques', 'A domicile', 'CB', 'b1.jpg', 97, 'Rambouillet', 78120, '10 route de Verdun', '019234758', '78', 'ile de france', 'Une super boutique pour tous les locavores !'),
(61, '102974198247', 'Chez François', 'sur place', 'espèces', 'b3.jpg', 102, 'Rambouillet', 78120, '10 route de Verdun', '07 38 12 79 02', '78', 'Ile de France', 'Vous aimez les pommes ? On en a ! Et pleins d\'autres choses aussi !'),
(62, '483743843984394717', 'LEROY\'S FARM', 'à emporter', 'espèces', 'b4.jpg', 103, 'Rambouillet', 78120, '12, chemin Rémy Marty', '06 41 77 53 40', '78', 'Ile de France', 'Bienvenue ! Venez nous rencontrer !'),
(63, '873109382394', 'La ferme de Joseph', 'à domicile', 'cb', 'b5.jpg', 105, 'Rambouillet', 78710, '37, boulevard Margaux Herve', '07 56 20 94 01', '78', 'Ile de France', 'Les meilleurs légumes de toute la région ! '),
(64, '3928432095798', 'Les bons produits de Margaud', 'sur place', 'espèces', 'b6.jpg', 108, 'Raizeux', 78125, '44, impasse François Germain', '097974823', '78', 'Ile de France', 'Produits de qualité, accueil avec le sourire, venez nous rencontrer !'),
(65, '095823703294', 'La Ferme du SOleil', 'à domicile', 'espèces', 'b7.jpg', 111, 'Mantes-La-Jolie', 78200, '7, boulevard Susan Fabre', '07 69 31 25 82', '78', 'Ile de France', 'Des fruits, des légumes, parfois quelques oeufs, de quoi être heureux !'),
(66, '9857298572985798275', 'La Ferme Delanoy', 'point relais', 'paypal', 'b8.jpg', 113, 'Mantes-La-Jolie', 78200, '580, avenue Pinto', '017835504', '78', 'Ile de France', 'Une ferme familiale pour tous vos besoins. '),
(67, '34897439857757', 'La ferme des sourires', 'à emporter', 'espèces', 'b9.jpg', 121, 'Buc', 78530, '3, rue Brun', '01 03 58 81 59', '78', 'Ile de France', 'Venez acheter des produits sains dans une ferme bio familiale ! '),
(68, '3572985723587235', 'La ferme de Susan', 'à emporter', 'espèces', 'b10.jpg', 122, 'Buc', 78530, '5, boulevard Pereira', '069012972', '78', 'Ile de France', 'Un plein de produits frais et respectueux de l\'environnement dans la bonne humeur !'),
(69, '39473895739857', 'Richard\'s corner', 'à emporter', 'espèces', 'b11.jpg', 124, 'Buc', 78530, '55, impasse de Bertin', '07 67 16 62 67', '78', 'Ile de France', 'Un petit coin de verdure en région parisienne !'),
(70, '209852019475', 'Chez Hugues', 'point relais', 'cb', 'b1.jpg', 130, 'Buc', 78530, 'boulevard Regnier', '061590283', '78', 'Ile de France', 'Une ferme où trouver les produits qui feront votre bonheur. '),
(71, '98537935729358279', 'La ferme verte ', 'à domicile', 'paypal', 'b3.jpg', 132, 'Aubergenville', 78410, '310, boulevard Jeanne Dijoux', '07 80 02 48 51', '78', 'Ile de France', 'Une petite ferme où trouver vos produits bios. '),
(72, '2957250868274', 'Chez Christiane', 'à emporter', 'espèces', 'b4.jpg', 134, 'Guyancourt', 78280, '9, avenue de Potier', '062592232', '78', 'Ile de France', 'Avec Christiane découvrez les produits que nos ancêtres affectionnaient tant !'),
(73, '8357985729857', 'La ferme aux ânes', 'à domicile', 'cb', 'b5.jpg', 135, 'Guyancourt', 78280, '97, boulevard Victor Lopez', '067077779', '78', 'Ile de France', 'Une ferme qui respecte l\'environnement et votre santé !'),
(74, '94857928592385', 'La petite ferme de Guyancourt', 'à emporter', 'cb', 'b6.jpg', 137, 'Guyancourt', 78280, '67, chemin Hugues Grondin', '06 25 00 65 78', '78', 'Ile de France', 'Une ferme traditionnelle qui revient aux valeurs ancestrales. '),
(75, '90234203748357', 'La ferme des Texier', 'domicile', 'paypal', 'b7.jpg', 142, 'Guyancourt', 78280, 'impasse de Benoit', '01 54 41 74 36', '78', 'Ile de France', 'A la ferme des Texier, trouvez tous les fruits et légumes de saison et de qualité !'),
(76, '38574637569', 'La ferme du pont', 'à emporter', 'espèces', 'b8.jpg', 146, 'Bazemont', 78580, '1, rue de Albert', '06 39 94 53 58', '78', 'Ile de France', 'Pour des produits frais et écolos, venez ici !'),
(77, '9475987538975', 'La ferme du Maréchal', 'point relais', 'cb', 'b9.jpg', 147, 'Maule', 78580, '65, chemin de Marechal', '06 39 92 46 05', '78', 'Ile de France', 'Depuis plus de 50 ans la ferme Maréchal nourrit les familles de ses bons produits. '),
(78, '439857387565', 'La ferme Gregoire', 'à emporter', 'espèces', 'b10.jpg', 155, 'Maule', 78580, '198, impasse Gay', '01 38 32 55 03', '78', 'Ile de France', 'Une petite ferme familiale de qualité à qui vous pouvez faire confiance !'),
(79, '83758375656682', 'La ferme rouge', 'domicile', 'paypal', 'b11.jog', 161, 'Maule', 78580, '68, avenue Marchand', '01 88 89 92 61', '78', 'Ile de France', 'Un petit espace de verdure au milieu du béton. '),
(80, '492614789624', 'Les Oliviers', 'à emporter', 'espèces', 'b1.jpg', 164, 'Maule', 78580, '54, avenue Lorraine Lebrun', '0611158086', '78', 'Ile de France', 'Venez acheter nos délicieux fruits et légumes !'),
(81, '9874938759875683', 'Chez Lopes', 'à emporter', 'espèces', 'b3.jpg', 599, 'Porcheville', 78440, '154, chemin Susan Louis', '07 57 25 09 49', '78', 'Ile de France', 'Une toute nouvelle ferme familiale qui changera votre manière de consommer ! '),
(82, '2357239857239587', 'Chez Mag', 'à emporter', 'CB', 'b4.jpg', NULL, 'paris', 75020, '10 routes de Javascript', '0684883878', '75', 'IDF', 'La meilleure boutique du monde de la terre !');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fruit` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `legume` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `viande` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `produit_laitier` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `etat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `montant` double NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `boutiqueId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6EEAA67D64B64DCC` (`userId`),
  KEY `IDX_6EEAA67DDB050607` (`boutiqueId`)
) ENGINE=InnoDB AUTO_INCREMENT=888 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `etat`, `date`, `montant`, `userId`, `boutiqueId`) VALUES
(699, 'confirmée', '2019-08-10 17:11:40', 22.58, 98, 65),
(700, 'livrée', '2019-08-26 17:11:35', 36.37, 100, 69),
(701, 'confirmée', '2019-08-09 17:55:00', 34.24, 101, 72),
(702, 'en préparation', '2019-08-27 10:46:33', 46.31, 99, 80),
(703, 'livrée', '2019-09-01 19:51:50', 19.55, 106, 75),
(704, 'livrée', '2019-08-04 14:09:20', 29.22, 156, 76),
(705, 'en préparation', '2019-08-15 20:05:03', 32.48, 157, 74),
(706, 'livrée', '2019-08-30 19:20:01', 27.24, 158, 1),
(707, 'confirmée', '2019-08-10 15:52:17', 20.59, 159, 65),
(708, 'livrée', '2019-08-23 01:22:07', 19.55, 167, 70),
(709, 'livrée', '2019-08-21 15:34:48', 32.21, 171, 79),
(710, 'confirmée', '2019-08-18 03:00:02', 31.99, 123, 61),
(711, 'en préparation', '2019-08-20 16:09:37', 44.34, 125, 73),
(712, 'livrée', '2019-08-21 10:23:33', 35.02, 126, 78),
(713, 'en préparation', '2019-08-08 00:26:25', 12.34, 98, 63),
(714, 'livrée', '2019-08-10 21:36:20', 12.6, 159, 77),
(715, 'confirmée', '2019-08-19 20:11:42', 49.61, 145, 62),
(716, 'livrée', '2019-08-28 06:28:53', 40.44, 166, 61),
(717, 'livrée', '2019-08-31 06:52:38', 37.63, 138, 64),
(718, 'confirmée', '2019-08-31 11:34:55', 15.53, 123, 71),
(719, 'livrée', '2019-08-23 03:08:49', 15.35, 112, 1),
(720, 'livrée', '2019-08-10 13:15:17', 38.94, 129, 66),
(721, 'livrée', '2019-08-08 06:19:08', 29.6, 131, 80),
(722, 'confirmée', '2019-08-12 23:45:13', 42.62, 167, 79),
(723, 'confirmée', '2019-08-28 19:37:55', 16.08, 166, 68),
(887, 'en préparation', '2019-09-05 13:02:17', 4, 598, 1);

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
CREATE TABLE IF NOT EXISTS `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20190827135819', '2019-08-28 13:46:24'),
('20190827142058', '2019-08-28 13:46:24'),
('20190827143037', '2019-08-28 13:46:24'),
('20190827190741', '2019-08-28 13:46:24'),
('20190827191552', '2019-08-28 13:46:24');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categorie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` double NOT NULL,
  `prix` double NOT NULL,
  `saisonnalite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unite_mesure` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `boutique_id` int(11) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_29A5EC27AB677BE6` (`boutique_id`)
) ENGINE=InnoDB AUTO_INCREMENT=822 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `categorie`, `stock`, `prix`, `saisonnalite`, `photo`, `unite_mesure`, `boutique_id`, `description`) VALUES
(763, 'tomates', 'legume', 8, 2, 'ete', 'tomates.jpg', 'poids', 74, 'Les meilleur(e)s tomates de la région !'),
(764, 'pommes', 'fruit', 6, 2, 'ete', 'pommes.jpg', 'poids', 63, 'Les meilleur(e)s pommes de la région !'),
(765, 'aubergines', 'legume', 19, 8, 'ete', 'aubergines.jpg', 'poids', 66, 'Les meilleur(e)s aubergines de la région !'),
(766, 'tomates', 'legume', 24, 2, 'ete', 'tomates.jpg', 'poids', 65, 'Les meilleur(e)s tomates de la région !'),
(767, 'pêches', 'fruit', 19, 4, 'ete', 'pêches.jpg', 'poids', 70, 'Les meilleur(e)s pêches de la région !'),
(768, 'pommes', 'fruit', 22, 5, 'ete', 'pommes.jpg', 'poids', 81, 'Les meilleur(e)s pommes de la région !'),
(769, 'oeufs', 'oeuf', 20, 1, 'ete', 'oeufs.jpg', 'unite', 63, 'Les meilleur(e)s oeufs de la région !'),
(770, 'tomates cerises', 'legume', 7, 4, 'ete', 'tomates cerises.jpg', 'poids', 67, 'Les meilleur(e)s tomates cerises de la région !'),
(771, 'courgettes', 'legume', 6, 2, 'ete', 'courgettes.jpg', 'poids', 1, 'Les meilleur(e)s courgettes de la région !'),
(772, 'pêches', 'fruit', 9, 3, 'ete', 'pêches.jpg', 'poids', 64, 'Les meilleur(e)s pêches de la région !'),
(773, 'courgettes', 'legume', 17, 5, 'ete', 'courgettes.jpg', 'poids', 67, 'Les meilleur(e)s courgettes de la région !'),
(774, 'courgettes', 'legume', 12, 3, 'ete', 'courgettes.jpg', 'poids', 76, 'Les meilleur(e)s courgettes de la région !'),
(775, 'abricots', 'fruit', 23, 3, 'ete', 'abricots.jpg', 'poids', 1, 'Les meilleur(e)s abricots de la région !'),
(776, 'tomates cerises', 'legume', 8, 2, 'ete', 'tomates cerises.jpg', 'poids', 78, 'Les meilleur(e)s tomates cerises de la région !'),
(777, 'abricots', 'fruit', 9, 2, 'ete', 'abricots.jpg', 'poids', 67, 'Les meilleur(e)s abricots de la région !'),
(778, 'aubergines', 'legume', 16, 1, 'ete', 'aubergines.jpg', 'poids', 74, 'Les meilleur(e)s aubergines de la région !'),
(779, 'pommes', 'fruit', 6, 1, 'ete', 'pommes.jpg', 'poids', 78, 'Les meilleur(e)s pommes de la région !'),
(780, 'pommes', 'fruit', 17, 1, 'ete', 'pommes.jpg', 'poids', 75, 'Les meilleur(e)s pommes de la région !'),
(781, 'pêches', 'fruit', 5, 5, 'ete', 'pêches.jpg', 'poids', 69, 'Les meilleur(e)s pêches de la région !'),
(782, 'abricots', 'fruit', 5, 1, 'ete', 'abricots.jpg', 'poids', 75, 'Les meilleur(e)s abricots de la région !'),
(783, 'courgettes', 'legume', 20, 5, 'ete', 'courgettes.jpg', 'poids', 78, 'Les meilleur(e)s courgettes de la région !'),
(784, 'abricots', 'fruit', 13, 1, 'ete', 'abricots.jpg', 'poids', 62, 'Les meilleur(e)s abricots de la région !'),
(785, 'oeufs', 'oeuf', 34, 2, 'ete', 'oeufs.jpg', 'unite', 79, 'Les meilleur(e)s oeufs de la région !'),
(786, 'lait de vache', 'produit laitier', 25, 5, 'ete', 'lait de vache.jpg', 'poids', 65, 'Les meilleur(e)s lait de vache de la région !'),
(787, 'tomates', 'legume', 15, 8, 'ete', 'tomates.jpg', 'poids', 79, 'Les meilleur(e)s tomates de la région !'),
(788, 'oeufs', 'oeuf', 10, 1, 'ete', 'oeufs.jpg', 'unite', 70, 'Les meilleur(e)s oeufs de la région !'),
(789, 'oeufs', 'oeuf', 19, 1, 'ete', 'oeufs.jpg', 'unite', 81, 'Les meilleur(e)s oeufs de la région !'),
(790, 'courgettes', 'legume', 14, 5, 'ete', 'courgettes.jpg', 'poids', 80, 'Les meilleur(e)s courgettes de la région !'),
(791, 'courgettes', 'legume', 12, 7, 'ete', 'courgettes.jpg', 'poids', 72, 'Les meilleur(e)s courgettes de la région !'),
(792, 'courgettes', 'legume', 10, 7, 'ete', 'courgettes.jpg', 'poids', 64, 'Les meilleur(e)s courgettes de la région !'),
(793, 'abricots', 'fruit', 13, 4, 'ete', 'abricots.jpg', 'poids', 78, 'Les meilleur(e)s abricots de la région !'),
(794, 'tomates cerises', 'legume', 10, 1, 'ete', 'tomates cerises.jpg', 'poids', 73, 'Les meilleur(e)s tomates cerises de la région !'),
(795, 'pommes', 'fruit', 16, 7, 'ete', 'pommes.jpg', 'poids', 72, 'Les meilleur(e)s pommes de la région !'),
(796, 'abricots', 'fruit', 20, 8, 'ete', 'abricots.jpg', 'poids', 70, 'Les meilleur(e)s abricots de la région !'),
(797, 'courgettes', 'legume', 24, 9, 'ete', 'courgettes.jpg', 'poids', 79, 'Les meilleur(e)s courgettes de la région !'),
(798, 'mirabelles', 'fruit', 7, 4, 'ete', 'mirabelles.jpg', 'poids', 63, 'Les meilleur(e)s mirabelles de la région !'),
(799, 'pommes', 'fruit', 8, 6, 'ete', 'pommes.jpg', 'poids', 69, 'Les meilleur(e)s pommes de la région !'),
(800, 'pêches', 'fruit', 17, 3, 'ete', 'pêches.jpg', 'poids', 80, 'Les meilleur(e)s pêches de la région !'),
(801, 'aubergines', 'legume', 18, 7, 'ete', 'aubergines.jpg', 'poids', 76, 'Les meilleur(e)s aubergines de la région !'),
(802, 'abricots', 'fruit', 11, 6, 'ete', 'abricots.jpg', 'poids', 69, 'Les meilleur(e)s abricots de la région !'),
(803, 'pommes', 'fruit', 23, 9, 'ete', 'pommes.jpg', 'poids', 66, 'Les meilleur(e)s pommes de la région !'),
(804, 'tomates cerises', 'legume', 23, 5, 'ete', 'tomates cerises.jpg', 'poids', 66, 'Les meilleur(e)s tomates cerises de la région !'),
(805, 'pêches', 'fruit', 10, 6, 'ete', 'pêches.jpg', 'poids', 76, 'Les meilleur(e)s pêches de la région !'),
(806, 'courgettes', 'legume', 8, 5, 'ete', 'courgettes.jpg', 'poids', 75, 'Les meilleur(e)s courgettes de la région !'),
(807, 'courgettes', 'legume', 12, 8, 'ete', 'courgettes.jpg', 'poids', 81, 'Les meilleur(e)s courgettes de la région !'),
(808, 'aubergines', 'legume', 8, 1, 'ete', 'aubergines.jpg', 'poids', 81, 'Les meilleur(e)s aubergines de la région !'),
(809, 'lait de vache', 'produit laitier', 19, 7, 'ete', 'lait de vache.jpg', 'poids', 77, 'Les meilleur(e)s lait de vache de la région !'),
(810, 'pêches', 'fruit', 11, 1, 'ete', 'pêches.jpg', 'poids', 62, 'Les meilleur(e)s pêches de la région !'),
(811, 'aubergines', 'legume', 13, 2, 'ete', 'aubergines.jpg', 'poids', 64, 'Les meilleur(e)s aubergines de la région !'),
(812, 'courgettes', 'legume', 19, 8, 'ete', 'courgettes.jpg', 'poids', 71, 'Les meilleur(e)s courgettes de la région !'),
(813, 'courgettes', 'legume', 22, 2, 'ete', 'courgettes.jpg', 'poids', 66, 'Les meilleur(e)s courgettes de la région !'),
(814, 'mirabelles', 'fruit', 25, 3, 'ete', 'mirabelles.jpg', 'poids', 73, 'Les meilleur(e)s mirabelles de la région !'),
(815, 'tomates cerises', 'legume', 22, 3, 'ete', 'tomates cerises.jpg', 'poids', 77, 'Les meilleur(e)s tomates cerises de la région !'),
(816, 'tomates cerises', 'legume', 8, 7, 'ete', 'tomates cerises.jpg', 'poids', 71, 'Les meilleur(e)s tomates cerises de la région !'),
(817, 'tomates cerises', 'legume', 23, 6, 'ete', 'tomates cerises.jpg', 'poids', 62, 'Les meilleur(e)s tomates cerises de la région !'),
(818, 'tomates cerises', 'legume', 14, 1, 'ete', 'tomates cerises.jpg', 'poids', 79, 'Les meilleur(e)s tomates cerises de la région !'),
(819, 'courgettes', 'legume', 8, 4, 'ete', 'courgettes.jpg', 'poids', 62, 'Les meilleur(e)s courgettes de la région !'),
(820, 'mirabelles', 'fruit', 19, 8, 'ete', 'mirabelles.jpg', 'poids', 79, 'Les meilleur(e)s mirabelles de la région !'),
(821, 'pêches', 'fruit', 24, 6, 'ete', 'pêches.jpg', 'poids', 65, 'Les meilleur(e)s pêches de la région !');

-- --------------------------------------------------------

--
-- Structure de la table `produit_commande`
--

DROP TABLE IF EXISTS `produit_commande`;
CREATE TABLE IF NOT EXISTS `produit_commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quantite` double NOT NULL,
  `produit_id` int(11) NOT NULL,
  `commande_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_47F5946EF347EFB` (`produit_id`),
  KEY `IDX_47F5946E82EA2E54` (`commande_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2157 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `produit_commande`
--

INSERT INTO `produit_commande` (`id`, `quantite`, `produit_id`, `commande_id`) VALUES
(2106, 4, 794, 699),
(2107, 2, 772, 700),
(2108, 6, 784, 700),
(2109, 3, 774, 700),
(2110, 2, 790, 701),
(2111, 8, 813, 701),
(2112, 2, 791, 701),
(2113, 6, 776, 702),
(2114, 8, 805, 702),
(2115, 6, 767, 703),
(2116, 1, 821, 704),
(2117, 7, 821, 705),
(2118, 2, 795, 705),
(2119, 5, 803, 705),
(2120, 5, 788, 706),
(2121, 1, 816, 706),
(2122, 5, 785, 707),
(2123, 1, 788, 708),
(2124, 5, 779, 708),
(2125, 6, 770, 709),
(2126, 6, 819, 709),
(2127, 6, 798, 709),
(2128, 7, 815, 710),
(2129, 5, 783, 710),
(2130, 4, 791, 711),
(2131, 2, 770, 711),
(2132, 3, 798, 711),
(2133, 2, 816, 712),
(2134, 6, 811, 712),
(2135, 2, 779, 712),
(2136, 5, 787, 713),
(2137, 4, 777, 713),
(2138, 7, 819, 714),
(2139, 5, 782, 714),
(2140, 1, 765, 714),
(2141, 5, 815, 715),
(2142, 7, 780, 715),
(2143, 7, 787, 716),
(2144, 2, 773, 717),
(2145, 1, 766, 717),
(2146, 1, 816, 718),
(2147, 8, 793, 718),
(2148, 3, 787, 718),
(2149, 1, 809, 719),
(2150, 8, 805, 720),
(2151, 3, 816, 721),
(2152, 3, 785, 721),
(2153, 5, 779, 721),
(2154, 6, 779, 722),
(2155, 8, 805, 723),
(2156, 2, 771, 887);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexe` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_postal` int(11) NOT NULL,
  `telephone` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_de_naissance` date NOT NULL,
  `salt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statut` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `boutiqueId` int(11) DEFAULT NULL,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649DB050607` (`boutiqueId`)
) ENGINE=InnoDB AUTO_INCREMENT=600 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `sexe`, `adresse`, `email`, `username`, `password`, `ville`, `code_postal`, `telephone`, `date_de_naissance`, `salt`, `statut`, `boutiqueId`, `role`, `departement`, `region`) VALUES
(97, 'Jacques', 'Jeannine', 'f', '72, rue Julien Labbe', 'j.jacques@live.com', 'JeannineJ', 'Tutu123456', 'Rambouillet', 78120, '0192347586', '1957-07-16', NULL, '1', 1, 'ROLE_USER', '78', 'IDF'),
(98, 'Guichard', 'Luce', 'f', 'boulevard de Renault', 'guichard.luce@wanadoo.fr', 'Luce', 'tk7sH4Zl`f(P<FGo', 'Rambouillet', 78120, '01 64 12 66 23', '1960-03-19', NULL, '0', NULL, 'ROLE_USER', '78', 'Ile de France'),
(99, 'Petitjean', 'Édith', 'f', '8, boulevard de Petitjean', 'edithPetitJean@laposte.net', 'Edith PJ', '~*uyNGa}p@Nri,6)f\\4', 'Rambouillet', 78120, '0669771666', '1986-07-24', NULL, '0', NULL, 'ROLE_USER', '78', 'Ile de France'),
(100, 'Leleu', 'Paulette', 'f', '4, chemin Frédéric Ruiz', 'plebleu@live.com', 'Paulette', '7Y*-x~1\"O', 'Rambouillet', 78120, '0135651971', '1953-06-10', NULL, '0', NULL, 'ROLE_USER', '78', 'Ile de France'),
(101, 'Pineau', 'Valérie', 'f', '4, chemin Marianne Riviere', 'valerie_pineau@free.fr', 'ValerieP78', 'F.HMGd>*x#*YK%{8M0`', 'Rambouillet', 78120, '01 75 37 06 22', '1968-11-05', NULL, '0', NULL, 'ROLE_USER', '78', 'Ile de France'),
(102, 'Francois', 'Marc', 'm', '47, impasse de Bousquet', 'marc_françois@gmail.com', 'Marc François', 'hV~/R{.<+ff9z83bT8R', 'Rambouillet', 78120, '07 38 12 79 02', '1973-04-12', NULL, '1', 61, 'ROLE_USER', '78', 'Ile de France'),
(103, 'Leroy', 'Daniel', 'm', '12, chemin Rémy Marty', 'leroy.d@tiscali.fr', 'D.leroy', ',oYT6kKkv=0>{l4W', 'Rambouillet', 78120, '06 41 77 53 40', '1978-05-24', NULL, '1', 62, 'ROLE_USER', '78', 'Ile de France'),
(104, 'Roux', 'Jean', 'm', 'avenue Marchal', 'jroux@voila.fr', 'JeanRoux78', 'jzvsQ7P\"19rDv', 'Meulan', 78250, '06 27 76 18 83', '1961-04-06', NULL, '0', NULL, 'ROLE_USER', '78', 'Ile de France'),
(105, 'Blondel', 'Joseph', 'm', '37, boulevard Margaux Herve', 'josephblondel@orange.fr', 'JosephLeFermier', '~J7T6K5Aq9DA5uG\'', 'Les Mureaux', 78130, '07 56 20 94 01', '1990-09-14', NULL, '1', 63, 'ROLE_USER', '78', 'Ile de France'),
(106, 'Verdier', 'Marcelle', 'f', 'chemin Charrier', 'vmarcelle@hotmail.fr', 'vmarcelle', 'M@?Z=7', 'Les Mureaux', 78130, '0180826488', '1944-09-10', NULL, '0', NULL, 'ROLE_USER', '78', 'Ile de France'),
(107, 'Dufour', 'Patricia', 'f', '25, boulevard de Neveu', 'pat.duf@hotmail.fr', 'patricia', 'f^pzVvG', 'Les Mureaux', 78130, '06 29 46 75 31', '1982-08-11', NULL, '0', NULL, 'ROLE_USER', '78', 'Ile de France'),
(108, 'Alves', 'Margaud', 'f', '44, impasse François Germain', 'margaudalves@gmail.com', 'margaudA', 'q/<_Kf;Xc:{9?\"+WUW', 'Raizeux', 78125, '0979748236', '1927-01-06', NULL, '1', 64, 'ROLE_USER', '78', 'Ile de France'),
(109, 'Lemaitre', 'Alexandre', 'm', '2, place Carlier', 'alexmaster@sfr.fr', 'Alex The Master', '0f?:<gq%mxRN?{+p', 'Mantes-la-Jolie', 78200, '06 28 85 93 46', '1989-03-08', NULL, '0', NULL, 'ROLE_USER', '78', 'Ile de France'),
(110, 'Perez', 'Thomas', 'm', '1, rue du Moulin', 'thomper@laposte.net', 'PerezThomas', ',Ocmi:TT}{<\\i', 'Mantes-la-Jolie', 78200, '01 41 90 04 64', '1979-02-28', NULL, '0', NULL, 'ROLE_USER', '78', 'Ile de France'),
(111, 'Garnier', 'Augustin', 'm', '7, boulevard Susan Fabre', 'augustin.garnier78@sfr.fr', 'Augustin Garnier', 'XB\\={7_\')g9C*<p}<rqs', 'Mantes-la-Jolie', 78200, '07 69 31 25 82', '1982-02-22', NULL, '1', 65, 'ROLE_USER', '78', 'Ile de France'),
(112, 'Colas', 'Jean', 'm', '37, boulevard Fernandes', 'colaJ@free.fr', 'ColaJ', '|f4u*F[;I>#)@DS~di', 'Mantes-la-Jolie', 78200, '06 31 78 82 11', '1967-01-19', NULL, '0', NULL, 'ROLE_USER', '78', 'Ile de France'),
(113, 'Delannoy', 'Daniele', 'f', '580, avenue Pinto', 'delanoy78200@ifrance.com', 'DanieleDelanoy', '6Q!.Q)O\"k!\\>t', 'Mantes-la-Jolie', 78200, '0178355047', '1966-02-17', NULL, '1', 66, 'ROLE_USER', '78', 'Ile de France'),
(114, 'Rossi', 'Lucy', 'f', 'chemin Georges Chauvin', 'lucy_rossi@tiscali.fr', 'Lucy', 'NO$sG6R4', 'Mantes-la-Jolie', 78200, '0673849106', '1992-03-16', NULL, '0', NULL, 'ROLE_USER', '78', 'Ile de France'),
(115, 'Weber', 'Christophe', 'm', '45, boulevard Emmanuel Barbe', 'chrichri78@gmail.com', 'Christophe_Weber', 'u51~&{4DQf', 'Voisin-le-Bretonneux', 78960, '0125403781', '1982-01-31', NULL, '0', NULL, 'ROLE_USER', '78', 'Ile de France'),
(116, 'Ramos', 'Inès', 'f', '870, rue de Charpentier', 'ramosI@sfr.fr', 'InesR', '6t_F=9,WJ', 'Saint Nom La Bretêche', 78860, '01 57 77 75 45', '1976-03-13', NULL, '0', NULL, 'ROLE_USER', '78', 'Ile de France'),
(117, 'Colas', 'Alfred', 'm', '927, place Mendes', 'alfred.colas@wanadoo.fr', 'Colas Alfred', 'NqI.b|*\'}D8~E*Y46', 'Rosny-Sur-Seine', 78710, '01 30 78 31 38', '1935-01-22', NULL, '0', NULL, 'ROLE_USER', '78', 'Ile de France'),
(118, 'Pierre', 'Philippe', 'm', '10, boulevard Roy', 'pierrephil@wanadoo.fr', 'Phil.ippe', '(EBde`g;B', 'Méricourt', 78270, '07 81 62 72 03', '1992-07-27', NULL, '0', NULL, 'ROLE_USER', '78', 'Ile de France'),
(119, 'Teixeira', 'Lorraine', 'f', '70, chemin Hardy', 'lorraineTexeira@gmail.com', 'Lorraine Texeira', '|}VbHtz-C9\'{MHy\\nJ', 'Méricourt', 78270, '06 74 58 99 30', '1961-11-17', NULL, '0', NULL, 'ROLE_USER', '78', 'Ile de France'),
(120, 'Laine', 'Marine', 'f', '61, rue Simon', 'mlaine@tiscali.fr', 'Marine Laine', '##k9{]<', 'Buchelay', 78200, '0654295780', '1996-04-14', NULL, '0', NULL, 'ROLE_USER', '78', 'Ile de France'),
(121, 'Baron', 'François', 'm', '3, rue Brun', 'françois.baron@dbmail.com', 'Baron', 'Xrt>lz[%!WEv', 'Buc', 78530, '01 03 58 81 59', '1941-04-01', NULL, '1', 67, 'ROLE_USER', '78', 'Ile de France'),
(122, 'Nicolas', 'Susan', 'f', '5, boulevard Pereira', 'susan.nicolas@club-internet.fr', 'Susan_Nicolas', 'D*n\"l\\4)42l1=vWj', 'Buc', 78530, '0690129722', '1973-07-27', NULL, '1', 68, 'ROLE_USER', '78', 'Ile de France'),
(123, 'Guichard', 'Camille', 'f', 'impasse Pasquier', 'camilleG@free.fr', 'Cammille', 'VTh.kx68x;6bG', 'Buc', 78530, '06 28 53 80 72', '1989-03-27', NULL, '0', NULL, 'ROLE_USER', '78', 'Ile de France'),
(124, 'Meyer', 'Richard', 'm', '55, impasse de Bertin', 'rmeyer@club-internet.fr', 'Richard Meyer', 'wjcv!|G:.2', 'Buc', 78530, '07 67 16 62 67', '1976-12-19', NULL, '1', 69, 'ROLE_USER', '78', 'Ile de France'),
(125, 'Masse', 'Eugène', 'm', '46, boulevard Maillard', 'emasse@tele2.fr', 'Masse.e', '~7\'\'m[*zH<B\\G5y/IbP~', 'Buc', 78530, '07 94 77 58 05', '1955-01-29', NULL, '0', NULL, 'ROLE_USER', '78', 'Ile de France'),
(126, 'Guillet', 'Hugues', 'm', '62, boulevard Texier', 'Hugues.guillet@yahoo.fr', 'Hugues', '&@O8Y7%J', 'Buc', 78530, '06 34 26 30 23', '1988-12-22', NULL, '0', NULL, 'ROLE_USER', '78', 'Ile de France'),
(127, 'Henry', 'Michèle', 'f', '38, impasse de Colin', 'mh78530@hotmail.fr', 'Michèle Henry', ';PyvoN2Z-Hau?JWOKC', 'Buc', 78530, '07 91 57 27 81', '1971-08-02', NULL, '0', NULL, 'ROLE_USER', '78', 'Ile de France'),
(128, 'Joly', 'Benjamin', 'm', '135, chemin de Poulain', 'benjoly@noos.fr', 'Benjoly', '5,fI,Bk', 'Buc', 78530, '07 30 19 43 76', '1994-08-04', NULL, '0', NULL, 'ROLE_USER', '78', 'Ile de France'),
(129, 'Da Silva', 'Sylvie', 'f', '27, place Valérie Colas', 'sylvie.da.silva@wanadoo.fr', 'SylvieSilva', ',V71Sk0', 'Buc', 78530, '0696422061', '1983-09-19', NULL, '0', NULL, 'ROLE_USER', '78', 'Ile de France'),
(130, 'Hubert', 'Hugues', 'm', 'boulevard Regnier', 'hub.hug@sfr.fr', 'Hubhug', 'M3OVEB)W6U;bU3', 'Buc', 78530, '0615902832', '1970-10-17', NULL, '1', 70, 'ROLE_USER', '78', 'Ile de France'),
(131, 'Dumont', 'Hélène', 'f', '2, rue de Blanchard', 'helene-dumont@free.fr', 'Helene-Dumont', 'OpnvMu4XjLV}H9orW\"', 'Andelu', 78770, '01 68 42 72 26', '1967-10-27', NULL, '0', NULL, 'ROLE_USER', '78', 'Ile de France'),
(132, 'Raymond', 'Honoré', 'm', '310, boulevard Jeanne Dijoux', 'rhonore@ifrance.com', 'Raymon Honoré', 'M/]2Aq', 'Aubergenville', 78410, '07 80 02 48 51', '1979-03-25', NULL, '1', 71, 'ROLE_USER', '78', 'Ile de France'),
(133, 'Potier', 'Anaïs', 'f', '12, boulevard de Joseph', 'potiera@hotmail.fr', 'Potier.Anaïs', '&uW>}DRD\"', 'Aubergenville', 78410, '0123460189', '1999-08-16', NULL, '0', NULL, 'ROLE_USER', '78', 'Ile de France'),
(134, 'Diaz', 'Christiane', 'm', '9, avenue de Potier', 'dchristiane@live.com', 'Diaz Christianne', 'w^Sc8Y[^', 'Guyancourt', 78280, '0625922326', '1951-01-16', NULL, '1', 72, 'ROLE_USER', '78', 'Ile de France'),
(135, 'Pinto', 'Pierre', 'm', '97, boulevard Victor Lopez', 'pinto.pierre@yahoo.fr', 'pierre_pinto', '](ExV2b*$Xq5%W.^fKx', 'Guyancourt', 78280, '0670777794', '1960-02-14', NULL, '1', 73, 'ROLE_USER', '78', 'Ile de France'),
(136, 'Joubert', 'Franck', 'm', '8, rue Diallo', 'franckjoubert@voila.fr', 'Frank', 'By_1VE', 'Guyancourt', 78280, '0615693441', '1976-05-26', NULL, '0', NULL, 'ROLE_USER', '78', 'Ile de France'),
(137, 'Rey', 'Alphonse', 'm', '67, chemin Hugues Grondin', 'Arey@gmail.com', 'Alphonse', '\\6htJC', 'Guyancourt', 78280, '06 25 00 65 78', '1971-07-19', NULL, '1', 74, 'ROLE_USER', '78', 'Ile de France'),
(138, 'Weber', 'Guillaume', 'm', '5, impasse Turpin', 'guillaume_Web@gmail.com', 'Weber.guillaume', '-,IPx%*5', 'Guyancourt', 78280, '0642470169', '1989-05-30', NULL, '0', NULL, 'ROLE_USER', '78', 'Ile de France'),
(139, 'Morvan', 'Céline', 'f', '66, rue Peltier', 'celine.morvan@live.com', 'Céline du 78280', 'FG_jU-=1zxZE3>}t', 'Guyancourt', 78280, '06 42 27 20 25', '1982-09-01', NULL, '0', NULL, 'ROLE_USER', '78', 'Ile de France'),
(140, 'Michaud', 'Henriette', 'f', '633, avenue Thierry', 'henriette_michaud@hotmail.fr', 'Henriette Michaud', ':/+\\#f', 'Guyancourt', 78280, '0781967200', '1989-01-26', NULL, '0', NULL, 'ROLE_USER', '78', 'Ile de France'),
(141, 'Diallo', 'Sébastien', 'm', '2, avenue de Delaunay', 'sebDiallo@voila.fr', 'Seb_diallo', '{}9.#C?7\\Ov', 'Guyancourt', 78280, '0159467233', '1993-01-12', NULL, '0', NULL, 'ROLE_USER', '78', 'Ile de France'),
(142, 'Texier', 'Laure', 'f', 'impasse de Benoit', 'laure80@wanadoo.fr', 'LaureT', 'x*X?cNHT[&V|`i+f9', 'Guyancourt', 78280, '01 54 41 74 36', '1959-04-06', NULL, '1', 75, 'ROLE_USER', '78', 'Ile de France'),
(143, 'Arnaud', 'Luc', 'm', '58, chemin Anne Gautier', 'arnaud_luc@wanadoo.fr', 'aluc', '][!j+K1O[_>tn7S3`Hkn', 'Guyancourt', 78280, '07 84 13 00 96', '1946-04-02', NULL, '0', NULL, 'ROLE_USER', '78', 'Ile de France'),
(144, 'Carlier', 'Margaux', 'f', '5, impasse Céline Mary', 'margaux.car@tiscali.fr', 'MargauxC', '/aO;ZOSSq', 'Guyancourt', 78280, '09 27 54 39 74', '1978-12-03', NULL, '0', NULL, 'ROLE_USER', '78', 'Ile de France'),
(145, 'Breton', 'Maggie', 'f', '36, impasse Juliette Clement', 'bmaggie@wanadoo.fr', 'MaggieB', 'wO.j]-Y,@F09\'FX1H}aR', 'Guyancourt', 78280, '07 69 83 04 28', '1957-01-14', NULL, '0', NULL, 'ROLE_USER', '78', 'Ile de France'),
(146, 'Dupont', 'Alexandria', 'f', '1, rue de Albert', 'alex.dupont@wanadoo.fr', 'Alexandra Dupont', '9%+9@MhBHo#gPI[U', 'Bazemont', 78580, '06 39 94 53 58', '1965-07-11', NULL, '1', 76, 'ROLE_USER', '78', 'Ile de France'),
(147, 'Charpentier', 'Émile', 'm', '65, chemin de Marechal', 'charpentier.e@dbmail.com', 'Emile Charpentier', 'a(v!9$CH-^~/=fUxkArj', 'Maule', 78580, '06 39 92 46 05', '1990-02-01', NULL, '1', 77, 'ROLE_USER', '78', 'Ile de France'),
(148, 'Reynaud', 'Bernadette', 'f', '740, impasse Michelle Breton', 'brey78@ifrance.com', 'Brey78', '.}6:1gDF$k>N', 'Maule', 78580, '07 63 74 03 07', '1986-06-05', NULL, '0', NULL, 'ROLE_USER', '78', 'Ile de France'),
(149, 'Gregoire', 'Louise', 'f', 'avenue Lagarde', 'louise_gregoire@orange.fr', 'Louise_du_78', '\\RLUMVU', 'Maule', 78580, '01 79 25 89 50', '1959-05-05', NULL, '0', NULL, 'ROLE_USER', '78', 'Ile de France'),
(150, 'Dupuy', 'Margaret', 'f', '2, place Garnier', 'maggie.dupuy@tiscali.fr', 'Dupuy Margaret', 'Qlb@kxIK74i8m', 'Maule', 78580, '0646037153', '1982-01-11', NULL, '0', NULL, 'ROLE_USER', '78', 'Ile de France'),
(151, 'Mathieu', 'Émile', 'm', '30, boulevard de Muller', 'mathieu.emile@club-internet.fr', 'MathieuEmile', 'Hm0=z_Ym^E7V7', 'Maule', 78580, '0739085024', '1975-03-13', NULL, '0', NULL, 'ROLE_USER', '78', 'Ile de France'),
(152, 'Carre', 'Auguste', 'm', '37, impasse Denise Bigot', 'AugusteC@voila.fr', 'Auguste C', 'ow\\s\"_wmx^@anU#\'cROo', 'Maule', 78580, '06 84 21 70 85', '1988-09-09', NULL, '0', NULL, 'ROLE_USER', '78', 'Ile de France'),
(153, 'Hamel', 'Thierry', 'm', 'rue de Morin', 'thierry.hamel@live.com', 'HamelT', 'K++q\"SV)~_.', 'Maule', 78580, '0185648276', '1994-07-27', NULL, '0', NULL, 'ROLE_USER', '78', 'Ile de France'),
(154, 'Colin', 'Chantal', 'f', '10, chemin Lamy', 'chantal-colin@noos.fr', 'Chantal Colin', 'p(k\"h\'sXv^`R_v|fHZu', 'Maule', 78580, '06 05 87 17 80', '1949-11-14', NULL, '0', NULL, 'ROLE_USER', '78', 'Ile de France'),
(155, 'Gregoire', 'Marcelle', 'f', '198, impasse Gay', 'greg@hotmail.fr', 'Greg', 'MtPs3$eg_5WEUEc\'', 'Maule', 78580, '01 38 32 55 03', '1955-02-14', NULL, '1', 78, 'ROLE_USER', '78', 'Ile de France'),
(156, 'Mendes', 'Olivier', 'm', '10, boulevard de Becker', 'oli.mendes@noos.fr', 'Olimendes', '40+cSU]I{W*;-B', 'Maule', 78580, '06 33 14 91 98', '1981-03-20', NULL, '0', NULL, 'ROLE_USER', '78', 'Ile de France'),
(157, 'Menard', 'Alphonse', 'm', '46, rue de Cordier', 'alphonse.menard@free.fr', 'Al Menard', 'H\"nQ87F3', 'Maule', 78580, '0140663576', '1964-01-18', NULL, '0', NULL, 'ROLE_USER', '78', 'Ile de France'),
(158, 'Brun', 'Luce', 'f', '44, rue de Arnaud', 'brun-luce@tele2.fr', 'Luce Brun', '(gz]&ESo6qC9UiS1c^7V', 'Maule', 78580, '07 85 17 40 92', '1965-02-14', NULL, '0', NULL, 'ROLE_USER', '78', 'Ile de France'),
(159, 'Regnier', 'Louis', 'm', '40, rue de Marty', 'louis_regnier@yahoo.fr', 'LouisR', '$$aLa=YNbC', 'Maule', 78580, '07 38 82 32 68', '1962-08-04', NULL, '0', NULL, 'ROLE_USER', '78', 'Ile de France'),
(160, 'Rocher', 'Françoise', 'f', '949, boulevard Zoé Thibault', 'françoise-rocher@orange.fr', 'frocher', '>[:Bl.wt9', 'Maule', 78580, '0654500010', '1964-07-29', NULL, '0', NULL, 'ROLE_USER', '78', 'Ile de France'),
(161, 'Legrand', 'Margot', 'f', '68, avenue Marchand', 'margotlegrand@voila.fr', 'margotlegrand', 'Hi\\kiTnWb^\'7xc', 'Maule', 78580, '01 88 89 92 61', '1992-02-11', NULL, '1', 79, 'ROLE_USER', '78', 'Ile de France'),
(162, 'Loiseau', 'Virginie', 'f', '6, rue Da Silva', 'loiseauV@yahoo.fr', 'loiseauVivi', '0.<J@`hkXm@', 'Maule', 78580, '02 28 38 95 60', '1966-08-21', NULL, '0', NULL, 'ROLE_USER', '78', 'Ile de France'),
(163, 'Lamy', 'Capucine', 'f', '816, avenue Texier', 'capucine78@free.fr', 'capucine', 'vHR2*+a!h~xf,;l', 'Maule', 78580, '01 05 76 12 23', '1973-12-28', NULL, '0', NULL, 'ROLE_USER', '78', 'Ile de France'),
(164, 'Maury', 'Olivie', 'f', '54, avenue Lorraine Lebrun', 'oliviem@gmail.com', 'Maury Olivie', 'U\"~8a{0rGbXcev#ue', 'Maule', 78580, '0611158086', '1944-02-10', NULL, '1', 80, 'ROLE_USER', '78', 'Ile de France'),
(165, 'Lopez', 'Michelle', 'f', '92, rue Robert Gaudin', 'michelle_lopez@voila.fr', 'Michelle Lopez', 'jp{^W5W', 'Maule', 78580, '01 87 63 38 11', '1980-08-05', NULL, '0', NULL, 'ROLE_USER', '78', 'Ile de France'),
(166, 'Lemaitre', 'Clémence', 'f', '6, place Margaux Boulanger', 'clem-lemaitre@yahoo.fr', 'Lemaître CLem', 'A5i}WfNJI}Up@Rfo', 'Maule', 78580, '01 64 17 88 15', '1977-03-16', NULL, '0', NULL, 'ROLE_USER', '78', 'Ile de France'),
(167, 'Boucher', 'Célina', 'f', '89, impasse Agnès Vasseur', 'celinaB@wanadoo.fr', 'Célina', 'Uq@I=y)W}4Q2T', 'Le Pecq', 78230, '06 72 70 94 37', '1988-08-06', NULL, '0', NULL, 'ROLE_USER', '78', 'Ile de France'),
(168, 'Maillot', 'Franck', 'm', 'impasse Torres', 'maillotfrank@wanadoo.fr', 'fmaillot', '<hSdTee)R<&RZt!h', 'Porcheville', 78440, '06 39 93 49 03', '1988-07-30', NULL, '0', NULL, 'ROLE_USER', '78', 'Ile de France'),
(169, 'Lopes', 'Dominique', 'm', '154, chemin Susan Louis', 'dominique_lopes@voila.fr', 'Dominique Lopes', 'i8_MO;#POpR\'VV;@T', 'Porcheville', 78440, '07 57 25 09 49', '1999-04-20', NULL, '1', NULL, 'ROLE_USER', '78', 'Ile de France'),
(170, 'Rodriguez', 'Constance', 'f', '155, place de Charpentier', 'constrodri@bouygtel.fr', 'Constrodri', 'Ru5R6k,>', 'Porcheville', 78440, '01 79 54 67 08', '1976-01-17', NULL, '0', NULL, 'ROLE_USER', '78', 'Ile de France'),
(171, 'Fernandez', 'Xavier', 'm', 'chemin de Maillot', 'xavier-fernandez@wanadoo.fr', 'xavier-fernandez', 'wxoaqX5', 'Porcheville', 78440, '01 21 94 99 02', '1959-05-08', NULL, '0', NULL, 'ROLE_USER', '78', 'Ile de France'),
(597, 'Milbergue', 'Magali', 'f', '16 rue du Moulin', 'magali@gmail.com', 'MagAdmin', '$argon2i$v=19$m=65536,t=4,p=1$QzFLMHFZLmlkdkh4OGJERw$8yhYZcSR/0+GvnQCEimxO95AffASDgbksKRJv7/x/AY', 'ROSNY', 78710, '0101010101', '1987-01-01', NULL, '0', NULL, 'ROLE_ADMIN', '78', 'IDF'),
(598, 'Duck', 'Daisy', 'f', '12 rue du canard laqué', 'daisyduck@gmail.com', 'MagAcheteur', '$argon2i$v=19$m=65536,t=4,p=1$WWduNWpaZkRqamZrWmNQLg$qGhIoWz0r++ds4/OggCF2pi0u87jJwIGAE+McWLahe4', 'Ducktown', 77777, '0684883848', '1990-01-01', NULL, '0', NULL, 'ROLE_USER', '77', 'IDF'),
(599, 'NOUR', 'Ginette', 'f', '10 routes de Javascript', 'ginette@email.com', 'MagVendeur', '$argon2i$v=19$m=65536,t=4,p=1$RC5ET01oWDAuR1VpR2VMeQ$l6M2m8uilpvOI1UVCj8POU4FlDzGtPAoNiqNYN1h2OI', 'paris', 75020, '0684883878', '1976-09-07', NULL, '1', 81, 'ROLE_USER', '75', 'IDF');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `boutique`
--
ALTER TABLE `boutique`
  ADD CONSTRAINT `FK_A1223C5464B64DCC` FOREIGN KEY (`userId`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `FK_6EEAA67D64B64DCC` FOREIGN KEY (`userId`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_6EEAA67DDB050607` FOREIGN KEY (`boutiqueId`) REFERENCES `boutique` (`id`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `FK_29A5EC27AB677BE6` FOREIGN KEY (`boutique_id`) REFERENCES `boutique` (`id`);

--
-- Contraintes pour la table `produit_commande`
--
ALTER TABLE `produit_commande`
  ADD CONSTRAINT `FK_47F5946E82EA2E54` FOREIGN KEY (`commande_id`) REFERENCES `commande` (`id`),
  ADD CONSTRAINT `FK_47F5946EF347EFB` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D649DB050607` FOREIGN KEY (`boutiqueId`) REFERENCES `boutique` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
