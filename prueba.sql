-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.3.27-MariaDB-log-cll-lve - MariaDB Server
-- SO del servidor:              Linux
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para jaroqcff_pruebas_ljsm
DROP DATABASE IF EXISTS `jaroqcff_pruebas_ljsm`;
CREATE DATABASE IF NOT EXISTS `jaroqcff_pruebas_ljsm` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `jaroqcff_pruebas_ljsm`;

-- Volcando estructura para tabla jaroqcff_pruebas_ljsm.failed_jobs
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla jaroqcff_pruebas_ljsm.failed_jobs: 0 rows
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Volcando estructura para tabla jaroqcff_pruebas_ljsm.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla jaroqcff_pruebas_ljsm.migrations: 5 rows
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2021_03_24_000000_create_failed_jobs_table', 1),
	(4, '2021_03_25_003621_create_products_table', 1),
	(5, '2021_03_25_003635_create_sales_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla jaroqcff_pruebas_ljsm.password_resets
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla jaroqcff_pruebas_ljsm.password_resets: 0 rows
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Volcando estructura para tabla jaroqcff_pruebas_ljsm.products
DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sku` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `it_discount` tinyint(1) NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` double(8,2) NOT NULL DEFAULT 0.00,
  `public` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_sku_unique` (`sku`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla jaroqcff_pruebas_ljsm.products: 4 rows
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `sku`, `name`, `slug`, `description`, `price`, `stock`, `it_discount`, `img`, `discount`, `public`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, '605cd8ca036fd', 'Yooyo', 'yooyo', 'yoyoyos', 200.00, 100, 1, 'default.png', 10.00, 0, '2021-03-25 12:39:06', '2021-03-25 15:34:15', '2021-03-25 15:34:15'),
	(2, '605d029d70693', 'laptop', 'laptop', 'coputadora rapida', 32500.00, 200, 1, 'laptop-2021-03-25-605d029d70a1d.jpg', 15.00, 1, '2021-03-25 12:47:48', '2021-03-25 15:37:34', NULL),
	(3, '605d06b0b1610', 'Telefono', 'telefono', 'felefono rapido', 15000.00, 15, 0, 'telefono-2021-03-25-605d06b0b1a2c.jpg', 0.00, 1, '2021-03-25 14:42:54', '2021-03-25 15:54:56', NULL),
	(4, '605d02842139f', 'llantas', 'llantas', 'rodad 22', 1500.00, 2000, 1, 'llantas-2021-03-25-605d028421a92.jpg', 15.00, 0, '2021-03-25 14:48:41', '2021-03-25 15:37:08', NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Volcando estructura para tabla jaroqcff_pruebas_ljsm.sales
DROP TABLE IF EXISTS `sales`;
CREATE TABLE IF NOT EXISTS `sales` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `buy_at` timestamp NULL DEFAULT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` char(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'P',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla jaroqcff_pruebas_ljsm.sales: 1 rows
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT INTO `sales` (`id`, `user_id`, `product_id`, `amount`, `buy_at`, `total`, `status`, `created_at`, `updated_at`) VALUES
	(1, 3, 4, 10, NULL, '15000', 'P', '2021-03-25 17:23:34', '2021-03-25 17:23:34');
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;

-- Volcando estructura para tabla jaroqcff_pruebas_ljsm.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `balance` double(11,2) NOT NULL DEFAULT 0.00,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla jaroqcff_pruebas_ljsm.users: 3 rows
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `balance`, `remember_token`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Luis javier', 'admin@gmail.com', NULL, '$2y$10$AO.XAM6Y4S4r2CeEgCp.3u6RJSAzrXU23iNxp8MbZqD/QbIgk7/.C', 'admin', 0.00, NULL, 'active', '2021-03-25 01:54:18', '2021-03-25 01:54:18', NULL),
	(2, 'Luis javier pruebas', 'admin@admin.com.mx', NULL, '$2y$10$d681VKAGl.7GtRAOBu9xEuNQo6jcPK221KZFm/0rBxSg9yesIW4ny', 'admin', 0.00, NULL, 'active', '2021-03-25 16:07:25', '2021-03-25 16:07:25', NULL),
	(3, 'Luis javier', 'cmtz852@gmail.com', NULL, '$2y$10$F0oNqIRu7SAjWYTY0u0rL.ztR5/jBR7Lf2umBcDUpaOggAh/RyvHe', 'customer', 1000000.00, NULL, 'active', '2021-03-25 16:15:31', '2021-03-25 16:44:18', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
