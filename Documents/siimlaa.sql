-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 17 août 2022 à 19:28
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `siimlaa`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$VdqSCZQF5n55.ZQLrXAiw.4madB87ls4Fh8euaMS6XHuHL1W1bMRm', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name_fr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_slug_fr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `brands`
--

INSERT INTO `brands` (`id`, `brand_name_fr`, `brand_slug_fr`, `brand_image`, `created_at`, `updated_at`) VALUES
(1, 'Siimlaa', 'siimlaa', '2208110926no_img.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name_fr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug_fr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `category_name_fr`, `category_slug_fr`, `category_icon`, `category_image`, `created_at`, `updated_at`) VALUES
(1, 'Accessoires', 'accessoires', NULL, 'upload/categories/1741136418064290.png', '2022-08-11 08:28:57', '2022-08-14 10:38:03'),
(3, 'Services', 'services', NULL, 'upload/categories/1741136634515578.png', '2022-08-14 10:21:52', '2022-08-14 10:41:29');

-- --------------------------------------------------------

--
-- Structure de la table `commandproducts`
--

CREATE TABLE `commandproducts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `store_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Structure de la table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `store_id` int(11) DEFAULT NULL,
  `galery_name_fr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `galery_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2018_12_23_120000_create_shoppingcart_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2022_02_17_012745_create_sessions_table', 1),
(8, '2022_02_18_170905_create_admins_table', 1),
(9, '2022_04_05_112611_create_brands_table', 1),
(10, '2022_04_05_112655_create_categories_table', 1),
(11, '2022_04_05_112857_create_sub_categories_table', 1),
(12, '2022_04_17_174712_create_sliders_table', 1),
(13, '2022_04_18_150259_create_products_table', 1),
(14, '2022_04_19_091029_create_multi_imgs_table', 1),
(15, '2022_05_14_205231_create_wishlists_table', 1),
(16, '2022_05_24_105033_create_stores_table', 1),
(17, '2022_06_19_121452_create_galleries_table', 1),
(18, '2022_06_20_152358_create_shippings_table', 1),
(19, '2022_06_23_055426_create_commandproducts_table', 1),
(20, '2022_08_14_165759_create_services_table', 2),
(21, '2022_08_16_110532_create_reviews_table', 3);

-- --------------------------------------------------------

--
-- Structure de la table `multi_imgs`
--

CREATE TABLE `multi_imgs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `photo_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `multi_imgs`
--

INSERT INTO `multi_imgs` (`id`, `product_id`, `photo_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'upload/products/multi-image/1740857534012685.png', '2022-08-11 08:45:18', NULL),
(2, 1, 'upload/products/multi-image/1740857534178822.png', '2022-08-11 08:45:19', NULL),
(3, 2, 'upload/products/multi-image/1741137684144327.jpg', '2022-08-14 10:58:11', NULL),
(4, 2, 'upload/products/multi-image/1741137687042236.jpg', '2022-08-14 10:58:13', NULL),
(5, 2, 'upload/products/multi-image/1741137687529792.jpg', '2022-08-14 10:58:14', NULL),
(6, 3, 'upload/products/multi-image/1741138135052534.png', '2022-08-14 11:05:21', NULL),
(7, 3, 'upload/products/multi-image/1741138135663646.png', '2022-08-14 11:05:21', NULL),
(8, 3, 'upload/products/multi-image/1741138136010392.png', '2022-08-14 11:05:22', NULL),
(9, 3, 'upload/products/multi-image/1741138137052805.png', '2022-08-14 11:05:23', NULL),
(10, 4, 'upload/products/multi-image/1741140283214390.png', '2022-08-14 11:39:30', NULL),
(11, 4, 'upload/products/multi-image/1741140285116114.png', '2022-08-14 11:39:31', NULL);

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
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `product_name_fr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug_fr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_tags_fr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_size_fr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_color_fr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selling_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_descp_fr` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `specification_fr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_thambnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `stock` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `category_id`, `subcategory_id`, `product_name_fr`, `product_slug_fr`, `product_code`, `product_qty`, `product_tags_fr`, `product_size_fr`, `product_color_fr`, `selling_price`, `discount_price`, `long_descp_fr`, `specification_fr`, `product_thambnail`, `status`, `stock`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 2, 'Bandeau en Silicone', 'bandeau-en-silicone', '4iqnco2p', '10', 'Femmes,Accessoires,Bandeaux', 'grande,moyenne,petite', 'orange,rose,noir', '60', '10', 'Fabriqué en silicone, beau et confortable à porter.\r\nPrincipalement utilisé pour fixer votre perruque pour l\'empêcher de tomber.\r\nLe design réglable permet de mieux s\'adapter à votre tête, répondant à vos besoins.\r\nPeut être utilisé comme un cadeau pratique pour vous-même et vos amis.\r\nIl y a plus de 4 couleurs différentes disponibles, vous pouvez choisir en fonction de vos besoins.', NULL, 'upload/products/thambnail/1741137683220292.jpg', 1, 1, '2022-08-14 10:58:10', NULL),
(3, 1, 1, 3, 'Fourlard & Bandeaux', 'fourlard-bandeaux', '6vdw5gm7', '20', 'Femmes,foulard,bandeaux,Accessoires', 'grande,moyenne,petite', 'noir,rose,bleu,verte,rouge', '30', '20', 'Fabriqué en tissu, beau et confortable à porter.\r\nPrincipalement utilisé pour accompagner vos tresses.\r\nLe design réglable permet de mieux s\'adapter à votre tête, répondant à vos besoins.\r\nPeut être utilisé comme un cadeau pratique pour vous-même et vos amis.\r\nIl y a une large variété de couleur disponibles, vous pouvez choisir en fonction de vos gouts.', NULL, 'upload/products/thambnail/1741138134442860.png', 1, 1, '2022-08-14 11:05:20', NULL),
(4, 1, 1, 4, 'Lora Perruque', 'lora-perruque', 'hy7mo864', '20', 'Femmes,perruque,lora,Accessoires', 'grande,moyenne,petite', 'noir,violet', '150', '75', 'Perruque Lora idéales pour les filles en déplacement, ce style élégant, soigné et sophistiqué a un excellent choix à se recommander – naturellement magnifique.', NULL, 'upload/products/thambnail/1741140280278098.png', 1, 1, '2022-08-14 11:39:29', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `user_id`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 'test', '0', '2022-08-16 11:00:27', NULL),
(2, 4, 1, 'J\'ai beaucoup aimé votre produit et il est livré en temps et en heure, c\'est mon 3ᵉ achat sur votre boutique. Merci à vous', '0', '2022-08-16 12:16:16', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `service_name_fr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_slug_fr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_tags_fr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selling_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_descp_fr` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `specification_fr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_thambnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id`, `brand_id`, `category_id`, `subcategory_id`, `service_name_fr`, `service_slug_fr`, `service_code`, `service_tags_fr`, `selling_price`, `long_descp_fr`, `specification_fr`, `service_thambnail`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 5, 'Sony Jumbo braids', 'sony-jumbo-braids', 'jbq14crd', 'Femmes,coiffure,services', '60', 'Sony Jumbo braids disponible a moindre cout, passer commande', NULL, 'upload/services/thambnail/1741159805099066.png', 1, '2022-08-14 16:49:47', NULL),
(2, 1, 3, 5, 'Clara Tissage fente ouverte', 'clara-tissage-fente-ouverte', '2kp4zey7', 'Femmes,coiffure,services,Accessoires', '60', 'Sony Jumbo braids disponible a moindre cout, passer commande', NULL, 'upload/services/thambnail/1741164336004679.jpg', 1, '2022-08-14 18:01:48', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('IqoShHO7nseANnuGNiIdfcAhRiEb8ZcvEyRRWlh1', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko/20100101 Firefox/103.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiSkt6dHpvVWhOd0pWbG5BcW9USGRaSFoxM0NUbTNPVTg1WmdIaGpSaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zZWFyY2g/X3Rva2VuPUpLenR6b1VoTndKVmxuQXFvVEhkWkhaMTNDVG0zT1U4NVpnSGhqUmgmc2VhcmNoPWJhIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJHh1U0g3Lkd0by8yOEVRcmJFVmxXQi5WNTAwdlRscjVGeTV1a3p6aU5tZ3hyd1JBTk5sSmhHIjt9', 1660659871),
('Vm2P1vSeYvYrYAIhheU72CVLa25sskbxaFPQenAV', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko/20100101 Firefox/103.0', 'YTo4OntzOjY6Il90b2tlbiI7czo0MDoiWnFwVFZ5N1F1RWZ1eEFTZWFkR1RNOEZxZDU0WUdwMHQwWkpMMWhZWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0L2RldGFpbHMvNC9sb3JhLXBlcnJ1cXVlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MjoibG9naW5fYWRtaW5fNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTk6InBhc3N3b3JkX2hhc2hfYWRtaW4iO3M6NjA6IiQyeSQxMCRWZHFTQ1pRRjVuNTUuWlFMclhBaXcuNG1hZEI4N2xzNEZoOGV1YU1TNlhIdUhMMVcxYk1SbSI7czo0OiJjYXJ0IjthOjE6e3M6NzoiZGVmYXVsdCI7TzoyOToiSWxsdW1pbmF0ZVxTdXBwb3J0XENvbGxlY3Rpb24iOjI6e3M6ODoiACoAaXRlbXMiO2E6MTp7czozMjoiMmQyYTgyYmIwNzk3ZDhmYWIyZjUyNzYwZjdlZDU2MTgiO086MzI6Ikdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtIjoxMTp7czo1OiJyb3dJZCI7czozMjoiMmQyYTgyYmIwNzk3ZDhmYWIyZjUyNzYwZjdlZDU2MTgiO3M6MjoiaWQiO3M6MToiNCI7czozOiJxdHkiO3M6MToiMSI7czo0OiJuYW1lIjtzOjE1OiJMb3JhIFBlcnJ1cXVlIGYiO3M6NToicHJpY2UiO2Q6NzU7czo2OiJ3ZWlnaHQiO2Q6MTtzOjc6Im9wdGlvbnMiO086Mzk6Ikdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtT3B0aW9ucyI6Mjp7czo4OiIAKgBpdGVtcyI7YTozOntzOjU6ImltYWdlIjtzOjQ2OiJ1cGxvYWQvcHJvZHVjdHMvdGhhbWJuYWlsLzE3NDExNDAyODAyNzgwOTgucG5nIjtzOjU6ImNvbG9yIjtzOjQ6Ik5vaXIiO3M6NDoic2l6ZSI7czo2OiJHcmFuZGUiO31zOjI4OiIAKgBlc2NhcGVXaGVuQ2FzdGluZ1RvU3RyaW5nIjtiOjA7fXM6NzoidGF4UmF0ZSI7aToyMTtzOjQ5OiIAR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW0AYXNzb2NpYXRlZE1vZGVsIjtOO3M6NDY6IgBHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbQBkaXNjb3VudFJhdGUiO2k6MDtzOjg6Imluc3RhbmNlIjtzOjc6ImRlZmF1bHQiO319czoyODoiACoAZXNjYXBlV2hlbkNhc3RpbmdUb1N0cmluZyI7YjowO319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJHh1U0g3Lkd0by8yOEVRcmJFVmxXQi5WNTAwdlRscjVGeTV1a3p6aU5tZ3hyd1JBTk5sSmhHIjt9', 1660659159);

-- --------------------------------------------------------

--
-- Structure de la table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `shipping_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_type` int(11) NOT NULL DEFAULT 0,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `town` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quarter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_code` int(11) DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `identifier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_offer_title_fr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider_main_title_fr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_secondary_title_fr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_slug_fr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_desc_fr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider_action_title_fr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `stores`
--

CREATE TABLE `stores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `store_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_adress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_name_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_descp_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_descp_fr` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_thambnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_verif` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `raiting` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `type` int(11) NOT NULL DEFAULT 0,
  `expiry_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name_fr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_slug_fr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `subcategory_name_fr`, `subcategory_slug_fr`, `created_at`, `updated_at`) VALUES
(2, 1, 'Bandeaux', 'bandeaux', NULL, NULL),
(3, 1, 'Foulards', 'foulards', NULL, NULL),
(4, 1, 'Perruques', 'perruques', NULL, NULL),
(5, 3, 'Tresses africaines', 'tresses africaines', NULL, NULL),
(6, 3, 'Jumbo braids', 'jumbo braids', NULL, NULL),
(7, 3, 'Box braids', 'box braids', NULL, NULL),
(8, 3, 'Twist', 'twist', NULL, NULL),
(9, 1, 'Autres', 'autres', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profil_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `profil_pic`, `email`, `phone`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `created_at`, `updated_at`) VALUES
(1, 'brecht', 'tankoua', NULL, 'brtankoua@gmail.com', '694011998', NULL, '$2y$10$xuSH7.Gto/28EQrbEVlWB.V500vTlr5Fy5ukzziNmgxrwRANNlJhG', NULL, NULL, NULL, NULL, '2022-08-11 09:39:25', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(4, 1, 1, '2022-08-11 11:26:42', NULL),
(5, 1, 4, '2022-08-14 18:31:30', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Index pour la table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commandproducts`
--
ALTER TABLE `commandproducts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `multi_imgs`
--
ALTER TABLE `multi_imgs`
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
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`identifier`,`instance`);

--
-- Index pour la table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Index pour la table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `commandproducts`
--
ALTER TABLE `commandproducts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `multi_imgs`
--
ALTER TABLE `multi_imgs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
