-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 16 jan. 2022 à 13:20
-- Version du serveur :  10.4.19-MariaDB
-- Version de PHP : 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_stylisteecom`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresses`
--

CREATE TABLE `adresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `ville_id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse_detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `info_suplementaire` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_adresse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `adresses`
--

INSERT INTO `adresses` (`id`, `user_id`, `ville_id`, `first_name`, `name`, `contact1`, `contact2`, `adresse_detail`, `info_suplementaire`, `current_adresse`, `created_at`, `updated_at`) VALUES
(1, 2, 4, 'Ira Huberson', 'Etien', '5562365636', '', 'tyjhgefzertyuimoùp^po', '', '0', '2021-12-05 17:03:58', '2021-12-25 13:44:30'),
(5, 2, 3, 'dev aka', 'François', '5562365636', '', 'carrefour chu Yopougon', 'près de l\'agence orange', '1', '2021-12-06 19:53:06', '2021-12-25 13:44:30'),
(6, 3, 1, 'ira', 'huberson', '5486565', '', 'Adjamé Liberté', '', '1', '2021-12-21 23:12:02', '2021-12-21 23:15:13');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `libelle`, `icon`, `image`, `position`, `created_at`, `updated_at`) VALUES
(1, 'Vêtements femme', '<span class=\"iconify\" data-icon=\"pepicons:dress\"></span>', 'menu-banner.jpg', 'megamenu-3cols', NULL, NULL),
(2, 'Chaussures femme', '<span class=\"iconify\" data-icon=\"emojione-monotone:high-heeled-shoe\"></span>', 'menu-banner-1.jpg', 'secondmegamenu', NULL, NULL),
(3, 'Accessoires femme ', '<span class=\"iconify\" data-icon=\"maki:jewelry-store\"></span>', 'menu-banner-1.jpg', 'firstmegamenu', NULL, NULL),
(4, 'Vêtements Hommes', '<span class=\"iconify\" data-icon=\"ri:shirt-line\"></span>', 'menu-banner-1.jpg', 'forthmegamenu', NULL, NULL),
(5, 'Chassures Hommes', '<span class=\"iconify\" data-icon=\"emojione-monotone:mans-shoe\"></span>', 'menu-banner-1.jpg', 'fivemegamenu', NULL, NULL),
(6, 'Mode Fille', '<span class=\"iconify\" data-icon=\"healthicons:girl-1015y-outline\"></span>', 'menu-banner-1.jpg', 'sixmegamenu', NULL, NULL),
(7, 'Mode garçons', '<span class=\"iconify\" data-icon=\"healthicons:boy-0105y-outline\"></span>', 'menu-banner-1.jpg', 'sevenmegamenu', NULL, NULL),
(8, 'parfums', '<span class=\"iconify\" data-icon=\"mdi:spray-bottle\"></span>', 'menu-banner-1.jpg', 'heightmegamenu', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `total` double DEFAULT NULL,
  `soustotal` double DEFAULT NULL,
  `ville_livraison` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact1` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact2` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse_detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info_suplementaire` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `frais` double NOT NULL,
  `datecommande` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modepaiement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT NULL,
  `livraisondatedebut` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `livraisondatefin` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id`, `user_id`, `total`, `soustotal`, `ville_livraison`, `contact1`, `contact2`, `adresse_detail`, `info_suplementaire`, `frais`, `datecommande`, `modepaiement`, `status`, `livraisondatedebut`, `livraisondatefin`, `created_at`, `updated_at`) VALUES
(8, 2, 103000, 100000, 'Grand-Lahou', '5562365636', '', 'carrefour chu Yopougon', 'près de l\'agence orange', 3000, '2021-12-25 13:36:38', 'cash', 1, 'mardi   28    dec', 'samedi   1    jan', NULL, NULL),
(9, 2, 133000, 130000, 'Grand-Lahou', '5562365636', '', 'carrefour chu Yopougon', 'près de l\'agence orange', 3000, '2021-12-25 13:44:30', 'cash', 1, 'mardi   28    dec', 'samedi   1    jan', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `commande_description`
--

CREATE TABLE `commande_description` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `commande_id` int(11) NOT NULL,
  `description_id` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `taille` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commande_description`
--

INSERT INTO `commande_description` (`id`, `commande_id`, `description_id`, `prix`, `quantite`, `taille`, `created_at`, `updated_at`) VALUES
(13, 8, 15, 50000, 2, 'EU 43', NULL, NULL),
(14, 9, 17, 10000, 3, 'EU 42', NULL, NULL),
(15, 9, 18, 50000, 2, 'EU 43', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `descriptions`
--

CREATE TABLE `descriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produit_id` int(11) NOT NULL,
  `taille_id` int(11) NOT NULL,
  `prixdf` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prix` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `descriptions`
--

INSERT INTO `descriptions` (`id`, `produit_id`, `taille_id`, `prixdf`, `prix`, `stock`, `created_at`, `updated_at`) VALUES
(7, 5, 4, NULL, 'prix2', 'stock2', '2021-12-12 16:19:24', '2021-12-12 16:19:24'),
(8, 6, 1, NULL, '2000', '20', '2021-12-12 16:38:16', '2021-12-12 16:38:16'),
(9, 6, 4, NULL, '5000', '10', '2021-12-12 16:38:16', '2021-12-12 16:38:16'),
(10, 7, 1, NULL, '52558', '20', '2021-12-12 16:52:12', '2021-12-12 16:52:12'),
(11, 8, 3, NULL, 'pri1', '20', '2021-12-12 16:55:17', '2021-12-12 16:55:17'),
(12, 9, 9, NULL, '2500', '10', '2021-12-13 03:03:32', '2021-12-13 03:03:32'),
(13, 9, 10, NULL, '5000', '30', '2021-12-13 03:03:32', '2021-12-13 03:03:32'),
(14, 10, 5, NULL, '10000', '10', '2021-12-13 03:10:54', '2021-12-13 03:10:54'),
(15, 10, 10, NULL, '50000', '23000', '2021-12-13 03:10:54', '2021-12-13 03:10:54'),
(16, 11, 11, NULL, '10000', '10', '2021-12-13 03:14:23', '2021-12-13 03:14:23'),
(17, 12, 9, NULL, '10000', '20', '2021-12-13 03:16:22', '2021-12-13 03:16:22'),
(18, 12, 10, NULL, '50000', '30', '2021-12-13 03:16:22', '2021-12-13 03:16:22'),
(19, 13, 9, NULL, '10000', '20', '2021-12-13 03:18:19', '2021-12-13 03:18:19'),
(20, 14, 10, NULL, '5000', '20', '2021-12-14 11:46:38', '2021-12-14 11:46:38'),
(21, 15, 6, NULL, '10000', '20', '2021-12-14 13:54:11', '2021-12-14 13:54:11'),
(22, 15, 14, NULL, 'prix2', '30', '2021-12-14 13:54:12', '2021-12-14 13:54:12'),
(23, 16, 10, NULL, '13000', '20', '2021-12-26 23:59:19', '2021-12-26 23:59:19'),
(24, 16, 8, NULL, '5000', '10', '2021-12-26 23:59:20', '2021-12-26 23:59:20'),
(25, 17, 14, NULL, '10000', '20', '2021-12-27 00:10:27', '2021-12-27 00:10:27'),
(28, 20, 10, NULL, '10000', '20', '2021-12-27 00:19:33', '2021-12-27 00:19:33'),
(29, 21, 33, NULL, '165000', '10', '2021-12-27 00:21:28', '2021-12-27 00:21:28'),
(30, 22, 12, NULL, '165000', '12', '2021-12-27 00:23:27', '2021-12-27 00:23:27'),
(31, 23, 7, NULL, '13000', '18', '2021-12-27 00:25:42', '2021-12-27 00:25:42'),
(32, 24, 34, NULL, '125000', '19', '2021-12-27 00:30:02', '2021-12-27 00:30:02'),
(33, 25, 13, NULL, '125000', '24', '2021-12-27 00:43:21', '2021-12-27 00:43:21'),
(34, 26, 11, NULL, '165000', '15', '2021-12-27 00:52:15', '2021-12-27 00:52:15'),
(35, 27, 12, NULL, '10000', '15', '2021-12-27 00:57:54', '2021-12-27 00:57:54'),
(36, 28, 15, NULL, '10000', '15', '2021-12-27 01:01:12', '2021-12-27 01:01:12'),
(37, 29, 15, NULL, '10000', '15', '2021-12-27 01:02:11', '2021-12-27 01:02:11'),
(38, 30, 8, NULL, '125000', '18', '2021-12-27 01:13:40', '2021-12-27 01:13:40');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `garanties`
--

CREATE TABLE `garanties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `garanties`
--

INSERT INTO `garanties` (`id`, `libelle`, `description`, `created_at`, `updated_at`) VALUES
(1, 'garantie ', 'Garantie 30 jours remboursables', NULL, NULL),
(2, 'garantie ', 'Garantie 6 mois remboursables', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `produit_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id`, `libelle`, `produit_id`, `created_at`, `updated_at`) VALUES
(11, '16393646120_Photo_mousso_zoo.jpg', 9, '2021-12-13 03:03:32', '2021-12-13 03:03:32'),
(12, '16393650540_Photo_Complet_Hautpantalon_RougeNoir.jpg', 10, '2021-12-13 03:10:54', '2021-12-13 03:10:54'),
(13, '16393652630_Photo_Complet_HautPantalonOrange.jpg', 11, '2021-12-13 03:14:23', '2021-12-13 03:14:23'),
(14, '16393653820_Photo_Complet_Hautpantalon_RougeBlanc.jpg', 12, '2021-12-13 03:16:22', '2021-12-13 03:16:22'),
(15, '16393654990_Photo_Haut_zohPantalonOrange.jpg', 13, '2021-12-13 03:18:19', '2021-12-13 03:18:19'),
(16, '16394823980_Photo_dersbon.jpg', 14, '2021-12-14 11:46:38', '2021-12-14 11:46:38'),
(17, '16394900520_Photo_dratan.jpg', 15, '2021-12-14 13:54:12', '2021-12-14 13:54:12'),
(18, '16394900521_Photo_dratan.jpg', 15, '2021-12-14 13:54:12', '2021-12-14 13:54:12'),
(19, '16394900522_Photo_dratan.jpg', 15, '2021-12-14 13:54:12', '2021-12-14 13:54:12'),
(20, '16405631600_Photo_complet_femme_jaune.jpg', 16, '2021-12-26 23:59:20', '2021-12-26 23:59:20'),
(21, '16405638270_Photo_Robe_Volante_Imprimée_Fleurs_-_Rose.jpg', 17, '2021-12-27 00:10:27', '2021-12-27 00:10:27'),
(22, '16405639990_Photo_BOUBOU_AVEC_BRODERIE_MULTICOLORE.jpg', 18, '2021-12-27 00:13:19', '2021-12-27 00:13:19'),
(23, '16405641310_Photo_Robe_Volante_Manches_Courtes_-_Noir.jpg', 19, '2021-12-27 00:15:31', '2021-12-27 00:15:31'),
(24, '16405643730_Photo_Fafula_Robe_Longue_Rouge.jpg', 20, '2021-12-27 00:19:33', '2021-12-27 00:19:33'),
(25, '16405644880_Photo_Aomei_Robe_Décontractée_Femme_Maille_Rose.jpg', 21, '2021-12-27 00:21:28', '2021-12-27 00:21:28'),
(26, '16405646070_Photo_Aomei_Décontractée_Femme_Robe_Moulante_Rouge.jpg', 22, '2021-12-27 00:23:27', '2021-12-27 00:23:27'),
(27, '16405647420_Photo_Aomei_Robe_De_Soirée_Perles_À_Pois_Noir.jpg', 23, '2021-12-27 00:25:42', '2021-12-27 00:25:42'),
(33, '16405676210_Photo_Ensemble Jupe  Haut Manches Longues  Coton Vert Blanc.jpg', 30, '2021-12-27 01:13:41', '2021-12-27 01:13:41');

-- --------------------------------------------------------

--
-- Structure de la table `livraisons`
--

CREATE TABLE `livraisons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `frais` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nbre_jour_debut` int(11) NOT NULL,
  `nbre_jour_fin` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `livraisons`
--

INSERT INTO `livraisons` (`id`, `frais`, `nbre_jour_debut`, `nbre_jour_fin`, `created_at`, `updated_at`) VALUES
(1, '1000', 2, 4, NULL, NULL),
(2, '3000', 3, 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `matieres`
--

CREATE TABLE `matieres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `matieres`
--

INSERT INTO `matieres` (`id`, `libelle`, `created_at`, `updated_at`) VALUES
(1, 'Cuir Synthétique', NULL, NULL),
(2, 'coton glacé', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `matiere_produit`
--

CREATE TABLE `matiere_produit` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `matiere_id` int(11) NOT NULL,
  `produit_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `matiere_produit`
--

INSERT INTO `matiere_produit` (`id`, `matiere_id`, `produit_id`, `created_at`, `updated_at`) VALUES
(16, 1, 9, NULL, NULL),
(17, 2, 9, NULL, NULL),
(18, 1, 10, NULL, NULL),
(19, 2, 10, NULL, NULL),
(20, 1, 11, NULL, NULL),
(21, 2, 11, NULL, NULL),
(22, 1, 12, NULL, NULL),
(23, 2, 12, NULL, NULL),
(24, 1, 13, NULL, NULL),
(25, 2, 13, NULL, NULL),
(28, 2, 16, NULL, NULL),
(29, 2, 17, NULL, NULL),
(30, 2, 18, NULL, NULL),
(31, 2, 19, NULL, NULL),
(32, 2, 20, NULL, NULL),
(33, 2, 21, NULL, NULL),
(34, 2, 22, NULL, NULL),
(35, 2, 23, NULL, NULL),
(36, 2, 24, NULL, NULL),
(37, 2, 25, NULL, NULL),
(38, 2, 26, NULL, NULL),
(39, 2, 27, NULL, NULL),
(40, 2, 28, NULL, NULL),
(41, 2, 29, NULL, NULL),
(42, 2, 30, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_11_30_013129_add_condition_field_to_users_table', 2),
(6, '2021_12_01_112918_create_mpass_resets_table', 3),
(7, '2021_12_03_234019_create_adresses_table', 4),
(8, '2021_12_04_000126_create_type_villes_table', 4),
(9, '2021_12_04_000456_create_villes_table', 4),
(10, '2021_12_04_001802_create_livraisons_table', 4),
(11, '2021_12_10_135639_create_produits_table', 5),
(12, '2021_12_10_141038_create_categories_table', 5),
(13, '2021_12_10_141759_create_souscategories_table', 5),
(14, '2021_12_10_160440_create_matieres_table', 5),
(15, '2021_12_10_161405_create_matiere_produit_table', 5),
(16, '2021_12_10_161847_create_images_table', 5),
(17, '2021_12_10_162144_create_tailles_table', 5),
(18, '2021_12_10_162935_create_produit_taille_table', 5),
(19, '2021_12_10_163230_create_descriptions_table', 5),
(20, '2021_12_10_171415_create_garanties_table', 6),
(21, '2021_12_17_144544_create_paniers_table', 7),
(22, '2021_12_17_153859_create_commandes_table', 7),
(23, '2021_12_17_161802_create_commande_produit_table', 7),
(24, '2021_12_23_191315_create_reviews_table', 8);

-- --------------------------------------------------------

--
-- Structure de la table `mpass_resets`
--

CREATE TABLE `mpass_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` int(11) NOT NULL,
  `reset_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `mpass_resets`
--

INSERT INTO `mpass_resets` (`id`, `userid`, `reset_code`, `created_at`, `updated_at`) VALUES
(1, 1, 'j1uuMgW1vHcF5jttAA1QIWxEjZjsWBjH4USodQOMaNNGhgNV788UOt2ilrw0bcjdzKu2SOPa9olryW0SqTBNm3Xb0urdle7ulUENTYhbrli0M67l9Nye8RRvUC9Rh1a9EE5Pa3qaDn72bC5xwhTfn17UmTdVibrjnBiil7hfhAMC2d0vT9xvXVXW30V8NdslUxOAFZCa', '2021-12-01 12:35:45', '2021-12-01 12:35:45'),
(2, 1, 'nUz23u3CgKF4g2yXwBlQSaD2xTHVHqtdWyMje3aSXOx0yFO6DNdWvnLC8xyAUKYvBb8JA9zSOC3Xgi4nUoEsQljCtIHHyP8vNOdkE3qbK5SlqfE0brvc5C5rhVmZWUz4UdZq25QEWVWsAxN4pcsON8VkTwbUE6qkasSZNic45G4vyYyU1axGi5fOqNTkkjtMb5pu1yPL', '2021-12-01 12:42:24', '2021-12-01 12:42:24'),
(3, 1, 'XDS2HNpUmb7b1LLOz2Cud9KeTmoVp9QOa75PbjwnoruttjGYzmVcYomPSK7HUM1jC7LcCA7ej6yAugSKH46UeUAl0pufPxFJ9O2g3tiFYJq391sQ9mtYkKlnvym42IFKlikM3jzQkOIL79rGejGUlQOPFznNWoc0YSdT9U0Qn4e6W0jgqsGCANoYvZeBiTFoNfp9mMqd', '2021-12-01 12:46:24', '2021-12-01 12:46:24'),
(4, 1, 'CbLchdwfBeUflc6vyn5XDXP6f4REiI4GlbH2uOrtXQDAB0WB7bZVI0NxTNHjqbIUdkMXDzHLZ3qo5mtDFXiebxpjGmNXERrEVB9mn6hHqdQCQqvdRRHQotA2jvRne0iQgsTC04ZVZhLOZwXbtP4w57slDVWHFL3VYZyiln73pAyOgZrlQRnSsTn4j5jCjLjsCvo32e1m', '2021-12-01 13:08:42', '2021-12-01 13:08:42');

-- --------------------------------------------------------

--
-- Structure de la table `paniers`
--

CREATE TABLE `paniers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produit_id` int(11) NOT NULL,
  `adresse_ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taille` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `soustotal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `souscategory_id` int(11) NOT NULL,
  `garantie_id` int(11) NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `etat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `libelle`, `souscategory_id`, `garantie_id`, `detail`, `etat`, `created_at`, `updated_at`) VALUES
(9, 'mousso zoo', 7, 1, '&lt;h3&gt;&lt;a href=&quot;https://www.jumia.ci/fashion-ensemble-pantalon-haut-moulante-bleu-14817072.html&quot;&gt;Ensemble Pantalon+ Haut Moulante Bleu&lt;/a&gt;&lt;/h3&gt;', 'publish', '2021-12-13 03:03:31', '2021-12-13 03:03:31'),
(10, 'Complet Haut+pantalon Rouge - Noir', 7, 1, '&lt;h3&gt;&lt;a href=&quot;https://www.jumia.ci/fashion-complet-hautpantalon-rouge-noir-14207273.html&quot;&gt;Complet Haut+pantalon Rouge - Noir&lt;/a&gt;&lt;/h3&gt;', 'publish', '2021-12-13 03:10:53', '2021-12-13 03:10:53'),
(11, 'Complet Haut+Pantalon - Orange', 7, 1, '&lt;h3&gt;&lt;a href=&quot;https://www.jumia.ci/fashion-complet-hautpantalon-orange-15336003.html&quot;&gt;Complet Haut+Pantalon - Orange&lt;/a&gt;&lt;/h3&gt;', 'publish', '2021-12-13 03:14:23', '2021-12-13 03:14:23'),
(12, 'Complet Haut+pantalon Rouge - Blanc', 7, 1, '&lt;h3&gt;&lt;a href=&quot;https://www.jumia.ci/fashion-complet-hautpantalon-rouge-blanc-14643116.html&quot;&gt;Complet Haut+pantalon Rouge - Blanc&lt;/a&gt;&lt;/h3&gt;', 'publish', '2021-12-13 03:16:22', '2021-12-13 03:16:22'),
(13, 'Haut zoh+Pantalon - Orange', 7, 1, '&lt;p&gt;Haut zoh+Pantalon - Orange&lt;/p&gt;', 'publish', '2021-12-13 03:18:19', '2021-12-13 03:18:19'),
(16, 'complet femme jaune', 7, 1, '&lt;p&gt;complet femme jaune&lt;/p&gt;', 'publish', '2021-12-26 23:59:19', '2021-12-26 23:59:19'),
(17, 'Robe Volante Imprimée Fleurs - Rose', 1, 2, '&lt;h3&gt;&lt;a href=&quot;https://www.jumia.ci/fashion-robe-volante-imprimee-fleurs-rose-13958186.html&quot;&gt;Robe Volante Imprimée Fleurs - Rose&lt;/a&gt;&lt;/h3&gt;', 'publish', '2021-12-27 00:10:27', '2021-12-27 00:10:27'),
(20, 'Fafula Robe Longue Rouge', 1, 1, '&lt;h3&gt;&lt;a href=&quot;https://www.jumia.ci/fafula-robe-longue-rouge-19786149.html&quot;&gt;Fafula Robe Longue Rouge&lt;/a&gt;&lt;/h3&gt;', 'publish', '2021-12-27 00:19:33', '2021-12-27 00:19:33'),
(21, 'Aomei Robe Décontractée Femme Maille Rose', 1, 1, '&lt;h3&gt;&lt;a href=&quot;https://www.jumia.ci/aomei-robe-decontractee-femme-maille-rose-14651143.html&quot;&gt;Aomei Robe Décontractée Femme Maille Rose&lt;/a&gt;&lt;/h3&gt;', 'publish', '2021-12-27 00:21:28', '2021-12-27 00:21:28'),
(22, 'Aomei Décontractée Femme Robe Moulante Rouge', 1, 1, '&lt;h3&gt;&lt;a href=&quot;https://www.jumia.ci/aomei-decontractee-femme-robe-moulante-rouge-14651145.html&quot;&gt;Aomei Décontractée Femme Robe Moulante Rouge&lt;/a&gt;&lt;/h3&gt;', 'publish', '2021-12-27 00:23:27', '2021-12-27 00:23:27'),
(23, 'Aomei Robe De Soirée Perles À Pois Noir', 1, 1, '&lt;h3&gt;&lt;a href=&quot;https://www.jumia.ci/aomei-robe-de-soiree-perles-a-pois-noir-14651151.html&quot;&gt;Aomei Robe De Soirée Perles À Pois Noir&lt;/a&gt;&lt;/h3&gt;', 'publish', '2021-12-27 00:25:41', '2021-12-27 00:25:41'),
(30, 'Ensemble Jupe  Haut Manches Longues  Coton Vert Blanc', 1, 1, '&lt;p&gt;Ensemble Jupe &amp;nbsp;Haut Manches Longues &amp;nbsp;Coton Vert Blanc&lt;/p&gt;', 'publish', '2021-12-27 01:13:40', '2021-12-27 01:13:40');

-- --------------------------------------------------------

--
-- Structure de la table `produit_taille`
--

CREATE TABLE `produit_taille` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produit_id` int(11) NOT NULL,
  `taille_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `produit_taille`
--

INSERT INTO `produit_taille` (`id`, `produit_id`, `taille_id`, `created_at`, `updated_at`) VALUES
(5, 9, 1, NULL, NULL),
(6, 9, 3, NULL, NULL),
(7, 10, 5, NULL, NULL),
(8, 10, 10, NULL, NULL),
(9, 11, 11, NULL, NULL),
(10, 12, 9, NULL, NULL),
(11, 12, 10, NULL, NULL),
(12, 13, 9, NULL, NULL),
(16, 16, 10, NULL, NULL),
(17, 16, 8, NULL, NULL),
(18, 17, 14, NULL, NULL),
(19, 18, 19, NULL, NULL),
(20, 19, 17, NULL, NULL),
(21, 20, 10, NULL, NULL),
(22, 21, 33, NULL, NULL),
(23, 22, 12, NULL, NULL),
(24, 23, 7, NULL, NULL),
(25, 24, 34, NULL, NULL),
(26, 25, 13, NULL, NULL),
(27, 26, 11, NULL, NULL),
(28, 27, 12, NULL, NULL),
(29, 28, 15, NULL, NULL),
(30, 29, 15, NULL, NULL),
(31, 30, 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `produit_id` int(11) NOT NULL,
  `note` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentaire` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `produit_id`, `note`, `titre`, `commentaire`, `created_at`, `updated_at`) VALUES
(1, 2, 9, 4, 'c\'est bon', 'tfyuiuygfyuihgui', '2021-12-23 22:28:43', '2021-12-23 22:28:43'),
(2, 2, 12, 2, 'faux produit', 'faux produit', '2021-12-25 13:46:18', '2021-12-25 13:48:33'),
(3, 2, 10, 5, 'c\'est bon', 'c\'est bon', '2021-12-25 13:49:57', '2021-12-25 13:49:57');

-- --------------------------------------------------------

--
-- Structure de la table `souscategories`
--

CREATE TABLE `souscategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `souscategories`
--

INSERT INTO `souscategories` (`id`, `libelle`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Robes', 1, NULL, NULL),
(2, 'Jupes', 1, NULL, NULL),
(3, 'Chaussures à Talons', 2, NULL, NULL),
(4, 'Baskets', 2, NULL, NULL),
(5, 'Lingerie Vêtements de Nuit', 1, '2021-12-26 22:03:08', '2021-12-26 22:03:08'),
(6, 'T-shirts', 1, '2021-12-26 22:03:09', '2021-12-26 22:03:09'),
(7, 'Combinaisons', 1, '2021-12-26 22:03:09', '2021-12-26 22:03:09'),
(8, 'Pantalons', 1, '2021-12-26 22:03:09', '2021-12-26 22:03:09'),
(9, 'Maillots', 1, '2021-12-26 22:03:09', '2021-12-26 22:03:09'),
(10, 'Ballerines', 2, '2021-12-26 22:07:20', '2021-12-26 22:07:20'),
(11, 'Sandales Nu-pieds', 2, '2021-12-26 22:07:20', '2021-12-26 22:07:20'),
(12, 'Chaussures plates', 2, '2021-12-26 22:07:20', '2021-12-26 22:07:20'),
(13, 'Escarpins', 2, '2021-12-26 22:07:21', '2021-12-26 22:07:21'),
(14, 'Mules Sabots', 2, '2021-12-26 22:07:21', '2021-12-26 22:07:21'),
(15, 'Bottes Bottines', 2, '2021-12-26 22:07:21', '2021-12-26 22:07:21'),
(16, 'Sacs à mains Portefeuilles', 3, '2021-12-26 22:13:55', '2021-12-26 22:13:55'),
(17, 'Pochettes', 3, '2021-12-26 22:13:55', '2021-12-26 22:13:55'),
(18, 'Bijoux ', 3, '2021-12-26 22:13:56', '2021-12-26 22:13:56'),
(19, 'Chapeaux et casquettes', 3, '2021-12-26 22:13:56', '2021-12-26 22:13:56'),
(20, 'T-shirts', 4, '2021-12-26 22:19:05', '2021-12-26 22:19:05'),
(21, 'Polos', 4, '2021-12-26 22:19:05', '2021-12-26 22:19:05'),
(22, 'Chemises ', 4, '2021-12-26 22:19:06', '2021-12-26 22:19:06'),
(23, 'Pantalons', 4, '2021-12-26 22:19:06', '2021-12-26 22:19:06'),
(24, 'Sous-vêtements', 4, '2021-12-26 22:19:06', '2021-12-26 22:19:06'),
(25, 'Vestes Manteaux', 4, '2021-12-26 22:19:06', '2021-12-26 22:19:06'),
(26, 'Shorts', 4, '2021-12-26 22:19:06', '2021-12-26 22:19:06'),
(27, 'Baskets', 5, '2021-12-26 22:21:44', '2021-12-26 22:21:44'),
(28, 'Souliers', 5, '2021-12-26 22:21:44', '2021-12-26 22:21:44'),
(29, 'Sandales ', 5, '2021-12-26 22:21:44', '2021-12-26 22:21:44'),
(30, 'Espadrilles', 5, '2021-12-26 22:21:44', '2021-12-26 22:21:44'),
(31, 'Mocassins', 5, '2021-12-26 22:21:45', '2021-12-26 22:21:45'),
(32, 'Vêtements Fille', 6, '2021-12-26 22:26:11', '2021-12-26 22:26:11'),
(33, 'Chaussures Fille', 6, '2021-12-26 22:26:11', '2021-12-26 22:26:11'),
(34, 'Montres Fille ', 6, '2021-12-26 22:26:11', '2021-12-26 22:26:11'),
(35, 'Bijoux Fille', 6, '2021-12-26 22:26:11', '2021-12-26 22:26:11'),
(36, 'Accessoires Fille', 6, '2021-12-26 22:26:11', '2021-12-26 22:26:11'),
(37, 'Vêtements Garçon', 7, '2021-12-26 22:27:57', '2021-12-26 22:27:57'),
(38, 'Chaussures Garçon', 7, '2021-12-26 22:27:57', '2021-12-26 22:27:57'),
(39, 'Montres Garçon ', 7, '2021-12-26 22:27:57', '2021-12-26 22:27:57'),
(40, 'Bijoux Garçon', 7, '2021-12-26 22:27:57', '2021-12-26 22:27:57'),
(41, 'Accessoires Garçon', 7, '2021-12-26 22:27:57', '2021-12-26 22:27:57'),
(42, 'Parfums homme', 8, '2021-12-26 22:32:10', '2021-12-26 22:32:10'),
(43, 'Parfums femme', 8, '2021-12-26 22:32:10', '2021-12-26 22:32:10'),
(44, 'Parfums enfant ', 8, '2021-12-26 22:32:10', '2021-12-26 22:32:10'),
(45, 'Déodorants et Anti-transpirants', 8, '2021-12-26 22:32:10', '2021-12-26 22:32:10');

-- --------------------------------------------------------

--
-- Structure de la table `tailles`
--

CREATE TABLE `tailles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tailles`
--

INSERT INTO `tailles` (`id`, `libelle`, `etat`, `created_at`, `updated_at`) VALUES
(5, 'EU 37', 'active', NULL, NULL),
(6, 'EU 38', 'active', NULL, NULL),
(7, 'EU 39', 'active', NULL, NULL),
(8, 'EU 41', 'active', NULL, NULL),
(9, 'EU 42', 'active', NULL, NULL),
(10, 'EU 43', 'active', NULL, NULL),
(11, 'EU 44', 'active', NULL, NULL),
(12, 'EU 45', 'active', NULL, NULL),
(13, '25', 'active', NULL, NULL),
(14, '26', 'active', NULL, NULL),
(15, '27', 'active', NULL, NULL),
(16, '28', 'active', NULL, NULL),
(17, '29', 'active', NULL, NULL),
(18, '30', 'active', NULL, NULL),
(19, '31', 'active', NULL, NULL),
(20, '32', 'active', NULL, NULL),
(21, '33', 'active', NULL, NULL),
(22, '34', 'active', NULL, NULL),
(23, '35', 'active', NULL, NULL),
(24, '36', 'active', NULL, NULL),
(25, '37', 'active', NULL, NULL),
(26, '40', 'active', NULL, NULL),
(27, '41', 'active', NULL, NULL),
(28, '42', 'active', NULL, NULL),
(29, 'L', 'active', NULL, NULL),
(30, 'M', 'active', NULL, NULL),
(31, 'X', 'active', NULL, NULL),
(32, 'XL', 'active', NULL, NULL),
(33, 'XXL', 'active', NULL, NULL),
(34, 'XXXL', 'active', NULL, NULL),
(35, '4XL', 'active', NULL, NULL),
(36, 'Autre', 'active', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `type_villes`
--

CREATE TABLE `type_villes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_villes`
--

INSERT INTO `type_villes` (`id`, `libelle`, `created_at`, `updated_at`) VALUES
(1, 'Les villes d\'Abidjan', NULL, NULL),
(2, 'Villes intérieur Côte d\'Ivoire', NULL, NULL),
(3, 'hors côte d\'Ivoire', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `condtion_utilisation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accepte_newsletter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `first_name`, `name`, `email`, `email_verified_at`, `password`, `phone`, `remember_token`, `created_at`, `updated_at`, `condtion_utilisation`, `accepte_newsletter`) VALUES
(1, 'dev aka', 'Etien', 'etienblog@gmail.com', NULL, '$2y$10$CAlbXQcI/SuMi.l7mYc/MOadoX1aSMK6Ibi4JLHzMCTnl5MD6xAHW', '0574691420', '7d4ZHiUqKs1CkBIHHRaUko4DGC2XvKhzjYGgWMpBmmTtIdazTdHMhJZQYsA7', '2021-11-30 10:31:50', '2021-12-02 11:39:01', 'accepté', NULL),
(2, 'Ira Huberson', 'HUBERSON', 'etien@gmail.com', NULL, '$2y$10$QJdWNighJs7UrStVi07VAe2vswaLHgvZIrQ39uzRIptWO/cdXQmVy', '0777955418', 'uAHeGBOkbDr7WEVQ4dzQtsNEoqMUavtfr3bfka7ljUDYUxlukoAaHYz92GIi', '2021-12-02 12:40:26', '2021-12-02 12:47:00', 'accepté', NULL),
(3, 'ETIEN', 'ETIEN', 'irahuberson@gmail.com', NULL, '$2y$10$3j7/.eL72tu9pGJMc/7JgeMHCI5uTCnhcBKJkU43T7PUr8Bb6rGCa', '0777866553', 'IGGnEaTHktEBiBQOYp38Zk3Q1PvnT6TVhZNw1vyJeF5Dx9fTVePEwoao1pPZ', '2021-12-21 18:01:57', '2021-12-21 18:01:57', 'accepté', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `villes`
--

CREATE TABLE `villes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_ville_id` int(11) NOT NULL,
  `livraison_id` int(11) NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `villes`
--

INSERT INTO `villes` (`id`, `type_ville_id`, `livraison_id`, `libelle`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Cocody', NULL, NULL),
(2, 1, 1, 'Adjamé', NULL, NULL),
(3, 2, 2, 'Grand-Lahou', NULL, NULL),
(4, 2, 2, 'Dabou', NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adresses`
--
ALTER TABLE `adresses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande_description`
--
ALTER TABLE `commande_description`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `descriptions`
--
ALTER TABLE `descriptions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `garanties`
--
ALTER TABLE `garanties`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `livraisons`
--
ALTER TABLE `livraisons`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `matieres`
--
ALTER TABLE `matieres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `matiere_produit`
--
ALTER TABLE `matiere_produit`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mpass_resets`
--
ALTER TABLE `mpass_resets`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `paniers`
--
ALTER TABLE `paniers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produit_taille`
--
ALTER TABLE `produit_taille`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `souscategories`
--
ALTER TABLE `souscategories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tailles`
--
ALTER TABLE `tailles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_villes`
--
ALTER TABLE `type_villes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Index pour la table `villes`
--
ALTER TABLE `villes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adresses`
--
ALTER TABLE `adresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `commande_description`
--
ALTER TABLE `commande_description`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `descriptions`
--
ALTER TABLE `descriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `garanties`
--
ALTER TABLE `garanties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `livraisons`
--
ALTER TABLE `livraisons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `matieres`
--
ALTER TABLE `matieres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `matiere_produit`
--
ALTER TABLE `matiere_produit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `mpass_resets`
--
ALTER TABLE `mpass_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `paniers`
--
ALTER TABLE `paniers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `produit_taille`
--
ALTER TABLE `produit_taille`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `souscategories`
--
ALTER TABLE `souscategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pour la table `tailles`
--
ALTER TABLE `tailles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `type_villes`
--
ALTER TABLE `type_villes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `villes`
--
ALTER TABLE `villes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
