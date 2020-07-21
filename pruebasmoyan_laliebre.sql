-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 24-06-2020 a las 00:17:57
-- Versión del servidor: 10.3.23-MariaDB-log-cll-lve
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pruebasmoyan_laliebre`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aisles`
--

CREATE TABLE `aisles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `aisles`
--

INSERT INTO `aisles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(4, 'Abarrotes', '2020-06-23 23:24:59', '2020-06-23 23:24:59'),
(5, 'Lacteos y Huevos', '2020-06-23 23:25:29', '2020-06-23 23:25:29'),
(6, 'Embutidos', '2020-06-23 23:26:06', '2020-06-23 23:26:06'),
(7, 'Carnes y Aves', '2020-06-23 23:26:23', '2020-06-23 23:26:23'),
(8, 'Frutas y Verduras', '2020-06-23 23:26:36', '2020-06-23 23:26:36'),
(9, 'Postrería', '2020-06-23 23:26:52', '2020-06-23 23:26:52'),
(10, 'Panadería', '2020-06-23 23:27:05', '2020-06-23 23:27:05'),
(11, 'Bebidas y Licores', '2020-06-23 23:27:20', '2020-06-23 23:27:20'),
(12, 'Bebés', '2020-06-23 23:27:31', '2020-06-23 23:29:11'),
(13, 'Cuidado Personal', '2020-06-23 23:28:06', '2020-06-23 23:28:06'),
(14, 'Limpieza', '2020-06-23 23:28:17', '2020-06-23 23:28:17'),
(15, 'Oficina', '2020-06-23 23:28:28', '2020-06-23 23:28:28'),
(16, 'Mascotas', '2020-06-23 23:28:35', '2020-06-23 23:28:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aisle_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `aisle_id`, `created_at`, `updated_at`) VALUES
(4, 'Aceite', 4, '2020-06-24 02:24:38', '2020-06-24 02:24:38'),
(5, 'Condimentos', 4, '2020-06-24 02:24:46', '2020-06-24 02:24:46'),
(6, 'Fideos', 4, '2020-06-24 02:24:53', '2020-06-24 02:24:53'),
(7, 'Pastas', 4, '2020-06-24 02:25:01', '2020-06-24 02:25:01'),
(8, 'Salsas', 4, '2020-06-24 02:25:13', '2020-06-24 02:25:13'),
(9, 'Arroz', 4, '2020-06-24 02:25:28', '2020-06-24 02:25:28'),
(10, 'Granos', 4, '2020-06-24 02:27:10', '2020-06-24 02:27:10'),
(11, 'Enlatados', 4, '2020-06-24 02:27:19', '2020-06-24 02:27:19'),
(12, 'Leche', 5, '2020-06-24 02:29:01', '2020-06-24 02:29:01'),
(13, 'Yogurt', 5, '2020-06-24 02:29:09', '2020-06-24 02:29:09'),
(14, 'Quesos', 5, '2020-06-24 02:29:17', '2020-06-24 02:29:17'),
(15, 'Huevos', 5, '2020-06-24 02:29:29', '2020-06-24 02:29:29'),
(16, 'Mantequilla', 5, '2020-06-24 02:29:38', '2020-06-24 02:29:38'),
(17, 'Salchichas', 6, '2020-06-24 02:30:16', '2020-06-24 02:30:16'),
(18, 'Hot Dog', 6, '2020-06-24 02:30:26', '2020-06-24 02:30:26'),
(19, 'Jamón', 6, '2020-06-24 02:30:37', '2020-06-24 02:30:37'),
(20, 'Chorizos', 6, '2020-06-24 02:30:48', '2020-06-24 02:30:48'),
(21, 'Cabanossi', 6, '2020-06-24 02:31:47', '2020-06-24 02:31:47'),
(22, 'Aceitunas', 6, '2020-06-24 02:31:58', '2020-06-24 02:31:58'),
(23, 'Res', 7, '2020-06-24 02:32:27', '2020-06-24 02:32:27'),
(24, 'Pollo', 7, '2020-06-24 02:32:32', '2020-06-24 02:32:32'),
(25, 'Cerdo', 7, '2020-06-24 02:32:38', '2020-06-24 02:32:38'),
(26, 'Pavo', 7, '2020-06-24 02:32:44', '2020-06-24 02:32:44'),
(27, 'Frutas', 8, '2020-06-24 02:33:18', '2020-06-24 02:33:18'),
(28, 'Frutas Orgánicas', 8, '2020-06-24 02:33:31', '2020-06-24 02:33:31'),
(29, 'Verduras', 8, '2020-06-24 02:33:43', '2020-06-24 02:33:43'),
(30, 'Verduras Orgánicas', 8, '2020-06-24 02:33:58', '2020-06-24 02:33:58'),
(31, 'Harina', 9, '2020-06-24 02:34:16', '2020-06-24 02:34:16'),
(32, 'Manjar Blanco', 9, '2020-06-24 02:34:25', '2020-06-24 02:34:45'),
(33, 'Manteca', 9, '2020-06-24 02:34:34', '2020-06-24 02:34:34'),
(34, 'Azúcar Impalpable', 9, '2020-06-24 02:34:59', '2020-06-24 02:34:59'),
(35, 'Flan', 9, '2020-06-24 02:35:08', '2020-06-24 02:35:08'),
(36, 'Gelatina', 9, '2020-06-24 02:35:16', '2020-06-24 02:35:16'),
(37, 'Harina para keke', 9, '2020-06-24 02:35:33', '2020-06-24 02:35:33'),
(38, 'Esencias y Complementos', 9, '2020-06-24 02:35:58', '2020-06-24 02:35:58'),
(39, 'Pan Pita', 10, '2020-06-24 02:36:44', '2020-06-24 02:36:44'),
(40, 'Pan Molde', 10, '2020-06-24 02:36:50', '2020-06-24 02:36:50'),
(41, 'Pan Integral', 10, '2020-06-24 02:36:58', '2020-06-24 02:36:58'),
(42, 'Kekes', 10, '2020-06-24 02:37:08', '2020-06-24 02:37:08'),
(43, 'Tostadas', 10, '2020-06-24 02:37:16', '2020-06-24 02:37:16'),
(44, 'Pan de Hamburguesa', 10, '2020-06-24 02:37:39', '2020-06-24 02:37:39'),
(45, 'Pan de Hot Dog', 10, '2020-06-24 02:38:08', '2020-06-24 02:38:08'),
(46, 'Cervezas', 11, '2020-06-24 02:38:45', '2020-06-24 02:38:45'),
(47, 'Vinos', 11, '2020-06-24 02:38:51', '2020-06-24 02:38:51'),
(48, 'Wishky', 11, '2020-06-24 02:39:03', '2020-06-24 02:39:03'),
(49, 'Piscos', 11, '2020-06-24 02:39:08', '2020-06-24 02:39:08'),
(50, 'Vodka', 11, '2020-06-24 02:39:17', '2020-06-24 02:39:17'),
(51, 'Gin', 11, '2020-06-24 02:39:24', '2020-06-24 02:39:24'),
(52, 'Gaseosas', 11, '2020-06-24 02:39:34', '2020-06-24 02:39:34'),
(53, 'Jugos', 11, '2020-06-24 02:39:40', '2020-06-24 02:39:40'),
(54, 'Detergente', 14, '2020-06-24 02:40:14', '2020-06-24 02:40:14'),
(55, 'Lejía', 14, '2020-06-24 02:40:23', '2020-06-24 02:40:23'),
(56, 'Jabón', 14, '2020-06-24 02:40:31', '2020-06-24 02:40:31'),
(57, 'Suavisantes', 14, '2020-06-24 02:40:40', '2020-06-24 02:40:40'),
(58, 'Lavavajillas', 14, '2020-06-24 02:43:04', '2020-06-24 02:43:04'),
(59, 'Sal', 4, '2020-06-24 02:45:20', '2020-06-24 02:45:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `districts`
--

INSERT INTO `districts` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Ancon', '2020-06-23 11:46:56', '2020-06-23 23:09:20'),
(2, 'Asia', '2020-06-23 23:09:31', '2020-06-23 23:09:31'),
(3, 'Ate', '2020-06-23 23:09:45', '2020-06-23 23:09:45'),
(4, 'Barranco', '2020-06-23 23:09:57', '2020-06-23 23:09:57'),
(5, 'Bella Vista', '2020-06-23 23:10:09', '2020-06-23 23:10:09'),
(6, 'Breña', '2020-06-23 23:10:58', '2020-06-23 23:10:58'),
(7, 'Callao', '2020-06-23 23:11:06', '2020-06-23 23:11:06'),
(8, 'Carabayllo', '2020-06-23 23:11:23', '2020-06-23 23:11:23'),
(9, 'Carmen De La Legua Reynoso', '2020-06-23 23:11:49', '2020-06-23 23:22:19'),
(10, 'Chaclacayo', '2020-06-23 23:12:03', '2020-06-23 23:12:03'),
(11, 'Chorrillos', '2020-06-23 23:12:16', '2020-06-23 23:12:16'),
(12, 'Cieneguilla', '2020-06-23 23:12:24', '2020-06-23 23:12:24'),
(13, 'Comas', '2020-06-23 23:12:36', '2020-06-23 23:12:36'),
(14, 'El Agustino', '2020-06-23 23:12:48', '2020-06-23 23:12:48'),
(15, 'Independencia', '2020-06-23 23:13:03', '2020-06-23 23:13:03'),
(16, 'Jesús Maria', '2020-06-23 23:13:18', '2020-06-23 23:13:18'),
(17, 'La Molina', '2020-06-23 23:13:32', '2020-06-23 23:13:32'),
(18, 'La Perla', '2020-06-23 23:13:41', '2020-06-23 23:13:41'),
(19, 'La Punta', '2020-06-23 23:13:50', '2020-06-23 23:13:50'),
(20, 'La Victoria', '2020-06-23 23:14:08', '2020-06-23 23:14:08'),
(22, 'Lima', '2020-06-23 23:14:18', '2020-06-23 23:14:18'),
(23, 'Lince', '2020-06-23 23:14:24', '2020-06-23 23:14:24'),
(24, 'Los Olivos', '2020-06-23 23:14:40', '2020-06-23 23:14:40'),
(25, 'Lurigancho', '2020-06-23 23:14:46', '2020-06-23 23:14:46'),
(26, 'Lurin', '2020-06-23 23:15:02', '2020-06-23 23:15:02'),
(27, 'Magdalena Del Mar', '2020-06-23 23:15:12', '2020-06-23 23:22:42'),
(28, 'Magdalena Vieja', '2020-06-23 23:15:32', '2020-06-23 23:15:32'),
(29, 'Miraflores', '2020-06-23 23:15:58', '2020-06-23 23:15:58'),
(30, 'Pachacamac', '2020-06-23 23:16:14', '2020-06-23 23:16:14'),
(31, 'Pucusana', '2020-06-23 23:16:27', '2020-06-23 23:16:27'),
(32, 'Pueblo Libre', '2020-06-23 23:16:35', '2020-06-23 23:16:35'),
(33, 'Puente Piedra', '2020-06-23 23:16:49', '2020-06-23 23:16:49'),
(34, 'Punta Hermosa', '2020-06-23 23:16:56', '2020-06-23 23:16:56'),
(35, 'Punta Negra', '2020-06-23 23:17:33', '2020-06-23 23:17:33'),
(36, 'Rimac', '2020-06-23 23:17:42', '2020-06-23 23:17:42'),
(37, 'San Bartolo', '2020-06-23 23:17:54', '2020-06-23 23:17:54'),
(38, 'San Borja', '2020-06-23 23:18:15', '2020-06-23 23:18:15'),
(39, 'San Isidro', '2020-06-23 23:18:24', '2020-06-23 23:18:24'),
(40, 'San Juan De Lurigancho', '2020-06-23 23:18:47', '2020-06-23 23:22:56'),
(41, 'San Juan De Miraflores', '2020-06-23 23:18:56', '2020-06-23 23:23:03'),
(42, 'San Luis', '2020-06-23 23:19:17', '2020-06-23 23:19:17'),
(43, 'San Martín De Porres', '2020-06-23 23:19:30', '2020-06-23 23:23:12'),
(44, 'San Miguel', '2020-06-23 23:19:43', '2020-06-23 23:19:43'),
(45, 'Santa Anita', '2020-06-23 23:19:50', '2020-06-23 23:19:50'),
(46, 'Santa Maria del Mar', '2020-06-23 23:20:11', '2020-06-23 23:20:11'),
(47, 'Santa Rosa', '2020-06-23 23:20:18', '2020-06-23 23:20:18'),
(48, 'Santiago De Surco', '2020-06-23 23:20:57', '2020-06-23 23:20:57'),
(49, 'Surquillo', '2020-06-23 23:21:12', '2020-06-23 23:21:12'),
(50, 'Ventanilla', '2020-06-23 23:21:35', '2020-06-23 23:21:35'),
(51, 'Villa El Salvador', '2020-06-23 23:21:46', '2020-06-23 23:23:35'),
(52, 'Villa Maria Del Triunfo', '2020-06-23 23:22:05', '2020-06-23 23:22:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_06_22_180327_create_roles_table', 1),
(4, '2020_06_22_180424_create_role_user_table', 1),
(5, '2020_06_22_181923_create_aisles_table', 1),
(6, '2020_06_22_191108_create_districts_table', 1),
(7, '2020_06_22_215813_create_categories_table', 1),
(8, '2020_06_22_215915_create_stores_table', 1),
(9, '2020_06_22_220208_create_products_table', 1),
(10, '2020_06_22_223737_create_types_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` double DEFAULT NULL,
  `price` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `code`, `name`, `description`, `store_id`, `category_id`, `photo`, `unit`, `weight`, `price`, `created_at`, `updated_at`) VALUES
(2, '000-01', 'Sal', 'Sal marina emsal mesa', 1, 59, 'prodcut_img_2.JPG', 'kg', 1, 2.2, '2020-06-24 02:49:04', '2020-06-24 02:49:04'),
(3, '000-06', 'Aceite', 'Aceite vegetal primor premium', 1, 4, 'prodcut_img_3.JPG', 'L', 1, 7.5, '2020-06-24 03:32:52', '2020-06-24 03:32:52'),
(4, '000-187', 'Aceite', 'Aceite vegetal primor', 1, 4, 'prodcut_img_4.JPG', 'L', 1, 7.5, '2020-06-24 03:38:03', '2020-06-24 03:38:03'),
(5, '000-40', 'Aceite', 'Aceite cocinero', 1, 4, 'prodcut_img_5.JPG', 'L', 5, 35.9, '2020-06-24 03:51:25', '2020-06-24 03:51:25'),
(6, '000-46', 'Aceite', 'Aceite SAO', 1, 4, 'prodcut_img_6.JPG', 'L', 1, 6.9, '2020-06-24 03:55:35', '2020-06-24 03:55:35'),
(7, '000-90', 'Aceite', 'Aceite de Oliva el Olivar Extra Virgen', 1, 4, 'prodcut_img_7.JPG', 'L', 1, 34.9, '2020-06-24 03:58:06', '2020-06-24 03:58:06'),
(8, '000-91', 'Aceite', 'Aceite de Oliva El Olivar Extra Virgen', 1, 4, 'prodcut_img_8.JPG', 'ml', 500, 25.5, '2020-06-24 04:00:40', '2020-06-24 04:00:40'),
(9, '000-92', 'Aceite', 'Aceite de Oliva El Olivar Extra Virgen', 1, 4, 'prodcut_img_9.JPG', 'ml', 200, 12.9, '2020-06-24 04:04:38', '2020-06-24 04:04:38'),
(10, '000-93', 'Aceite', 'Aceite Ajonjoli Olivos Del Sur', 1, 4, 'prodcut_img_10.JPG', 'ml', 100, 8.9, '2020-06-24 04:13:16', '2020-06-24 04:13:16'),
(11, '02-01', 'Ají', 'Ají Limo', 1, 29, 'prodcut_img_11.JPG', 'Unidad', 5, 2.2, '2020-06-24 04:15:44', '2020-06-24 04:15:44'),
(12, '02-02', 'Ajo', 'Ajo bolsa', 1, 29, 'prodcut_img_12.JPG', 'gr', 500, 9, '2020-06-24 04:20:03', '2020-06-24 04:20:03'),
(13, '02-03', 'Ajo', 'Ajo Pelado', 1, 29, 'prodcut_img_13.JPG', 'gr', 500, 9.9, '2020-06-24 04:22:09', '2020-06-24 04:22:09'),
(14, '02-04', 'Albahaca', 'Albahaca atado', 1, 29, 'prodcut_img_14.JPG', 'Atado', 1, 2.9, '2020-06-24 04:24:56', '2020-06-24 04:24:56'),
(15, '02-05', 'Alcachofa', 'Alcachofa', 1, 29, 'prodcut_img_15.JPG', 'Unidad', 1, 1.9, '2020-06-24 04:31:38', '2020-06-24 04:31:38'),
(16, '02-06', 'Alverja', 'Alverja verde en vaina', 1, 29, 'prodcut_img_16.JPG', 'gr', 500, 5.5, '2020-06-24 04:48:06', '2020-06-24 04:48:06'),
(17, '02-07', 'Apio', 'Apio', 1, 29, 'prodcut_img_17.JPG', 'Unidad', 1, 3.2, '2020-06-24 04:49:28', '2020-06-24 04:49:28'),
(18, '02-08', 'Berengena', 'Berengena', 1, 29, 'prodcut_img_18.JPG', 'Unidad', 1, 1.7, '2020-06-24 04:51:29', '2020-06-24 04:51:29'),
(19, '02-09', 'Betarraga', 'Betarraga', 1, 29, 'prodcut_img_19.JPG', 'kg', 1, 4.5, '2020-06-24 04:53:26', '2020-06-24 04:53:26'),
(20, '02-10', 'Brócoli', 'Brócoli', 1, 29, 'prodcut_img_20.JPG', 'kg', 1, 5.5, '2020-06-24 04:57:07', '2020-06-24 04:57:07'),
(21, '02-11', 'Soja', 'Brotes de Soja Bolsa', 1, 29, 'prodcut_img_21.JPG', 'gr', 250, 1.9, '2020-06-24 05:06:57', '2020-06-24 05:06:57'),
(22, '02-12', 'Camote', 'Camote amarillo', 1, 29, 'prodcut_img_22.JPG', 'kg', 1, 3.9, '2020-06-24 05:09:08', '2020-06-24 05:09:08'),
(23, '02-13', 'Camote', 'Camote morado', 1, 29, 'prodcut_img_23.JPG', 'kg', 1, 3.9, '2020-06-24 05:11:14', '2020-06-24 05:11:14'),
(24, '02-14', 'Cebolla', 'Cebolla china', 1, 29, 'prodcut_img_24.JPG', 'Atado', 1, 3.2, '2020-06-24 05:12:51', '2020-06-24 05:12:51'),
(25, '02-15', 'Cebolla', 'Cebolla roja', 1, 29, 'prodcut_img_25.JPG', 'kg', 1, 2.9, '2020-06-24 05:14:17', '2020-06-24 05:14:17'),
(26, '02-16', 'Choclo', 'Choclo blanco', 1, 29, 'prodcut_img_26.JPG', 'Unidad', 1, 1.3, '2020-06-24 05:15:43', '2020-06-24 05:15:43'),
(27, '02-17', 'Col', 'Col china', 1, 29, 'prodcut_img_27.JPG', 'Unidad', 1, 5.9, '2020-06-24 05:16:54', '2020-06-24 05:16:54'),
(28, '02-18', 'Col', 'Col morado', 1, 29, 'prodcut_img_28.JPG', 'Unidad', 1, 5.9, '2020-06-24 05:18:33', '2020-06-24 05:18:33'),
(29, '02-19', 'Col', 'Col', 1, 29, 'prodcut_img_29.JPG', 'kg', 3, 6.5, '2020-06-24 05:22:07', '2020-06-24 05:22:07'),
(30, '02-20', 'Coliflor', 'Coliflor', 1, 29, 'prodcut_img_30.JPG', 'Unidad', 1, 5.5, '2020-06-24 05:24:52', '2020-06-24 05:24:52'),
(31, '02-21', 'Culantro', 'Culantro', 1, 29, 'prodcut_img_31.JPG', 'Unidad', 1, 1.9, '2020-06-24 05:26:06', '2020-06-24 05:26:06'),
(32, '02-22', 'Espinaca', 'Espinaca manojo', 1, 29, 'prodcut_img_32.JPG', 'gr', 500, 5.5, '2020-06-24 05:28:59', '2020-06-24 05:28:59'),
(33, '02-23', 'Eucalipto', 'Eucalipto', 1, 29, 'prodcut_img_33.JPG', 'Atado', 1, 2.9, '2020-06-24 05:30:30', '2020-06-24 05:30:30'),
(34, '02-24', 'Frijol', 'Frijol verde bolsa', 1, 29, 'prodcut_img_34.JPG', 'gr', 500, 3.9, '2020-06-24 05:32:01', '2020-06-24 05:32:01'),
(35, '02-25', 'Haba', 'Haba en vaina en bola', 1, 29, 'prodcut_img_35.JPG', 'gr', 500, 2.5, '2020-06-24 05:33:19', '2020-06-24 05:33:19'),
(36, '02-26', 'Huacatay', 'Huacatay', 1, 29, 'prodcut_img_36.JPG', 'Atado', 1, 1.9, '2020-06-24 05:34:39', '2020-06-24 05:34:39'),
(37, '02-27', 'Kion', 'Kion en bolsa', 1, 29, 'prodcut_img_37.JPG', 'gr', 250, 2.3, '2020-06-24 05:36:06', '2020-06-24 05:36:06'),
(38, '02-28', 'Lechuga', 'Lechuga americana', 1, 29, 'prodcut_img_38.JPG', 'Unidad', 1, 2.5, '2020-06-24 05:37:18', '2020-06-24 05:37:18'),
(39, '02-29', 'Lechuga', 'Lechuga crespa', 1, 29, 'prodcut_img_39.JPG', 'Unidad', 1, 2.4, '2020-06-24 05:38:58', '2020-06-24 05:38:58'),
(40, '02-30', 'Lechuga', 'Lechuga seda', 1, 29, 'prodcut_img_40.JPG', 'Unidad', 1, 2.9, '2020-06-24 05:40:17', '2020-06-24 05:40:17'),
(41, '02-31', 'Coliflor', 'Coliflor grande', 1, 29, 'prodcut_img_41.JPG', 'Unidad', 1, 9.9, '2020-06-24 05:42:20', '2020-06-24 05:42:20'),
(42, '02-32', 'Maiz', 'Maiz Morado', 1, 29, 'prodcut_img_42.JPG', 'kg', 1, 6.5, '2020-06-24 05:43:23', '2020-06-24 05:43:23'),
(43, '02-33', 'Manzanilla', 'Manzanilla', 1, 29, 'prodcut_img_43.JPG', 'Atado', 1, 1.9, '2020-06-24 05:44:58', '2020-06-24 05:44:58'),
(44, '02-34', 'Olluco', 'Olluco', 1, 29, 'prodcut_img_44.JPG', 'kg', 1, 6.9, '2020-06-24 05:46:03', '2020-06-24 05:46:03'),
(45, '02-35', 'Papa', 'Papa amarilla', 1, 29, 'prodcut_img_45.JPG', 'kg', 1, 3.9, '2020-06-24 05:47:06', '2020-06-24 05:47:06'),
(46, '02-36', 'Papa', 'Papa blanca', 1, 29, 'prodcut_img_46.JPG', 'kg', 1, 2.9, '2020-06-24 05:48:26', '2020-06-24 05:48:26'),
(47, '02-37', 'Papa', 'Papa chanchán', 1, 29, 'prodcut_img_47.JPG', 'kg', 1, 2.7, '2020-06-24 05:49:36', '2020-06-24 05:49:36'),
(48, '02-38', 'Papa', 'Papa Huayro', 1, 29, 'prodcut_img_48.JPG', 'kg', 1, 3.2, '2020-06-24 05:51:11', '2020-06-24 05:51:11'),
(49, '02-39', 'Papa', 'Papa rosada', 1, 29, 'prodcut_img_49.JPG', 'kg', 1, 2.9, '2020-06-24 05:52:33', '2020-06-24 05:52:33'),
(50, '02-40', 'Pepino', 'Pepino', 1, 29, 'prodcut_img_50.JPG', 'Unidad', 1, 2.2, '2020-06-24 05:53:28', '2020-06-24 05:53:28'),
(51, '02-41', 'Perejil', 'Perejil', 1, 29, 'prodcut_img_51.JPG', 'Atado', 1, 1.6, '2020-06-24 05:54:58', '2020-06-24 05:54:58'),
(52, '02-42', 'Pimiento', 'Pimiento rojo', 1, 29, 'prodcut_img_52.JPG', 'kg', 1, 6.5, '2020-06-24 05:56:38', '2020-06-24 05:56:38'),
(53, '02-43', 'Rabanito', 'Rabanito', 1, 29, 'prodcut_img_53.JPG', 'Atado', 1, 4.9, '2020-06-24 05:57:31', '2020-06-24 05:57:31'),
(54, '02-44', 'Rocoto', 'Rocoto', 1, 29, 'prodcut_img_54.JPG', 'kg', 1, 6.9, '2020-06-24 05:58:29', '2020-06-24 05:58:29'),
(55, '01-45', 'Tomate', 'Tomate', 1, 29, 'prodcut_img_55.JPG', 'kg', 1, 6.9, '2020-06-24 05:59:22', '2020-06-24 05:59:22'),
(56, '02-46', 'Vainita', 'Vainita en bolsa', 1, 29, 'prodcut_img_56.JPG', 'gr', 500, 2.5, '2020-06-24 06:00:37', '2020-06-24 06:00:37'),
(57, '02-47', 'Yuca', 'Yuca', 1, 29, 'prodcut_img_57.JPG', 'kg', 1, 3.9, '2020-06-24 06:02:03', '2020-06-24 06:02:03'),
(58, '02-48', 'Zanahoria', 'Zanahoria', 1, 29, 'prodcut_img_58.JPG', 'kg', 1, 2.5, '2020-06-24 06:03:04', '2020-06-24 06:03:04'),
(59, '02-49', 'Zapallo', 'Zapallo italiano pequeño', 1, 29, 'prodcut_img_59.JPG', 'kg', 1, 2.5, '2020-06-24 06:05:38', '2020-06-24 06:05:38'),
(60, '02-50', 'Zapallo', 'Zapallo macre', 1, 29, 'prodcut_img_60.JPG', 'kg', 1, 4.9, '2020-06-24 06:06:46', '2020-06-24 06:06:46'),
(61, '02-51', 'Alverja', 'Alverja americana', 1, 29, 'prodcut_img_61.JPG', 'kg', 1, 4.9, '2020-06-24 06:08:04', '2020-06-24 06:08:04'),
(62, '02-58', 'Lechuga', 'Lechuga hidropónica', 1, 29, 'prodcut_img_62.JPG', 'Unidad', 1, 2.9, '2020-06-24 06:16:57', '2020-06-24 06:16:57'),
(63, '02-61', 'Papa', 'Papa amarilla tumbay', 1, 29, 'prodcut_img_63.JPG', 'kg', 1, 4.5, '2020-06-24 06:19:12', '2020-06-24 06:19:12'),
(64, '02-62', 'Papa', 'Papa blanca cotktail', 1, 29, 'prodcut_img_64.JPG', 'kg', 1, 3.2, '2020-06-24 06:21:09', '2020-06-24 06:21:09'),
(65, '02-63', 'Papa', 'Papa blanca yungay', 1, 29, 'prodcut_img_65.JPG', 'kg', 1, 2.4, '2020-06-24 06:22:32', '2020-06-24 06:22:32'),
(66, '02-65', 'Poro', 'Poro', 1, 29, 'prodcut_img_66.JPG', 'Atado', 1, 3.5, '2020-06-24 06:23:56', '2020-06-24 06:23:56'),
(67, '02-66', 'Tomate', 'Tomate  cherry en bandeja', 1, 29, 'prodcut_img_67.jpg', 'kg', 1, 29, '2020-06-24 06:25:45', '2020-06-24 06:25:45'),
(68, '02-67', 'Tomate', 'Tomate italiano', 1, 29, 'prodcut_img_68.JPG', 'kg', 1, 6.9, '2020-06-24 06:26:59', '2020-06-24 06:26:59'),
(69, '02-68', 'Tomate', 'Tomate redondo', 1, 29, 'prodcut_img_69.JPG', 'kg', 1, 7.5, '2020-06-24 06:28:38', '2020-06-24 06:28:38'),
(70, '01-01', 'Durazno', 'Durazno', 1, 29, 'prodcut_img_70.JPG', 'kg', 1, 6.9, '2020-06-24 06:37:49', '2020-06-24 06:37:49'),
(71, '01-02', 'Fresa', 'Fresa', 1, 29, 'prodcut_img_71.JPG', 'kg', 1, 14.9, '2020-06-24 06:38:48', '2020-06-24 06:38:48'),
(72, '01-03', 'Granada', 'Granada fruta', 1, 29, 'prodcut_img_72.JPG', 'kg', 1, 4.9, '2020-06-24 06:40:10', '2020-06-24 06:40:10'),
(73, '01-04', 'Granadilla', 'Granadilla', 1, 29, 'prodcut_img_73.JPG', 'kg', 1, 6.9, '2020-06-24 06:41:24', '2020-06-24 06:41:24'),
(74, '01-05', 'Kiwi', 'Kiwi', 1, 29, 'prodcut_img_74.JPG', 'kg', 1, 9.9, '2020-06-24 06:42:21', '2020-06-24 06:42:21'),
(75, '01-06', 'Limón', 'Limón pequeño', 1, 29, 'prodcut_img_75.JPG', 'kg', 1, 4.5, '2020-06-24 06:43:56', '2020-06-24 06:43:56'),
(76, '01-07', 'Mandarina', 'Mandarina sin pepa', 1, 29, 'prodcut_img_76.JPG', 'kg', 1, 4.9, '2020-06-24 06:44:52', '2020-06-24 06:44:52'),
(77, '01-08', 'Mango', 'Mango kent', 1, 29, 'prodcut_img_77.JPG', 'kg', 1, 5.9, '2020-06-24 06:46:03', '2020-06-24 06:46:03'),
(78, '01-09', 'Manzana', 'Manzana delicia', 1, 29, 'prodcut_img_78.JPG', 'kg', 1, 4.5, '2020-06-24 06:47:03', '2020-06-24 06:47:03'),
(79, '01-10', 'Manzana', 'Manzana royal', 1, 29, 'prodcut_img_79.JPG', 'kg', 1, 9.5, '2020-06-24 06:47:54', '2020-06-24 06:47:54'),
(80, '01-11', 'Manzana', 'Manzana verde', 1, 29, 'prodcut_img_80.JPG', 'kg', 1, 8.5, '2020-06-24 06:48:50', '2020-06-24 06:48:50'),
(81, '01-12', 'Maracuya', 'Maracuya', 1, 29, 'prodcut_img_81.JPG', 'kg', 1, 4.9, '2020-06-24 06:49:59', '2020-06-24 06:49:59'),
(82, '01-13', 'Melón', 'Melón 2 kg', 1, 29, 'prodcut_img_82.JPG', 'kg', 1, 5.9, '2020-06-24 06:50:59', '2020-06-24 06:50:59'),
(83, '01-14', 'Naranja', 'Naranja de jugo', 1, 29, 'prodcut_img_83.JPG', 'kg', 1, 4.5, '2020-06-24 06:51:56', '2020-06-24 06:51:56'),
(84, '01-15', 'Naranja', 'Naranja de mesa', 1, 29, 'prodcut_img_84.JPG', 'kg', 1, 5.9, '2020-06-24 06:53:10', '2020-06-24 06:53:10'),
(85, '01-16', 'Palta', 'Palta fuerte', 1, 29, 'prodcut_img_85.JPG', 'kg', 1, 9.5, '2020-06-24 06:54:07', '2020-06-24 06:54:07'),
(86, '01-17', 'Papaya', 'Papaya 2 kg aprox', 1, 29, 'prodcut_img_86.JPG', 'kg', 1, 6.9, '2020-06-24 06:55:10', '2020-06-24 06:55:10'),
(87, '01-18', 'Pera', 'Pera', 1, 29, 'prodcut_img_87.JPG', 'kg', 1, 8.9, '2020-06-24 06:56:06', '2020-06-24 06:56:06'),
(88, '01-19', 'Piña', 'Piña Golden x 2 kg apróx', 1, 29, 'prodcut_img_88.JPG', 'kg', 1, 5.5, '2020-06-24 06:57:24', '2020-06-24 06:57:25'),
(89, '01-21', 'Plátano', 'Plátano Bellaco pack 5 unidades', 1, 29, 'prodcut_img_89.JPG', 'pack', 1, 5.5, '2020-06-24 06:59:08', '2020-06-24 07:09:39'),
(90, '01-20', 'Platano', 'Platano bellaco para freir pack 5 unidades', 1, 27, 'prodcut_img_90.JPG', 'pack', 1, 5.5, '2020-06-24 07:28:50', '2020-06-24 07:28:50'),
(91, '01-22', 'Tuna', 'Tuna roja', 1, 27, 'prodcut_img_91.JPG', 'kg', 1, 4.9, '2020-06-24 07:31:14', '2020-06-24 07:31:14'),
(92, '01-23', 'Sandilla', 'Sandilla por 10 kg apróx', 1, 27, 'prodcut_img_92.JPG', 'kg', 1, 16, '2020-06-24 07:32:46', '2020-06-24 07:32:46'),
(93, '01-24', 'Plátano', 'Plátano de seda pack 5 unidades', 1, 27, 'prodcut_img_93.JPG', 'pack', 1, 2.9, '2020-06-24 07:34:15', '2020-06-24 07:34:15'),
(94, '01-25', 'Plátano', 'Plátano palillo pack 5 unidades', 1, 27, 'prodcut_img_94.JPG', 'pack', 1, 4.2, '2020-06-24 07:36:11', '2020-06-24 07:36:11'),
(95, '01-26', 'Plátano', 'Plátano isla pack 5 unid', 1, 27, 'prodcut_img_95.JPG', 'pack', 1, 3.5, '2020-06-24 07:37:47', '2020-06-24 07:37:47'),
(96, '01-27', 'Uva', 'Uva verde', 1, 27, 'prodcut_img_96.JPG', 'kg', 1, 7.5, '2020-06-24 07:38:45', '2020-06-24 07:38:45'),
(97, '01-28', 'Limón', 'Limón grande', 1, 27, 'prodcut_img_97.JPG', 'kg', 1, 5, '2020-06-24 07:40:06', '2020-06-24 07:40:06'),
(98, '01-29', 'Aguaymanto', 'Aguaymanto', 1, 27, 'prodcut_img_98.jpg', 'kg', 1, 12, '2020-06-24 07:41:42', '2020-06-24 07:41:42'),
(99, '01-30', 'Arándanos', 'Arándanos', 1, 27, 'prodcut_img_99.JPG', 'kg', 1, 19.9, '2020-06-24 07:42:46', '2020-06-24 07:42:46'),
(100, '01-31', 'Carambola', 'Carambola', 1, 27, 'prodcut_img_100.jpg', 'kg', 1, 4.9, '2020-06-24 07:44:14', '2020-06-24 07:44:14'),
(101, '01-32', 'Chirimoya', 'Chirimoya', 1, 27, 'prodcut_img_101.jpg', 'kg', 1, 7.9, '2020-06-24 07:45:15', '2020-06-24 07:45:15'),
(102, '01-33', 'Lúcuma', 'Lúcuma', 1, 27, 'prodcut_img_102.JPG', 'kg', 1, 7.5, '2020-06-24 07:46:13', '2020-06-24 07:46:13'),
(103, '01-34', 'Plátano', 'Plátano bizcocho x pack 5 unidades', 1, 27, 'prodcut_img_103.JPG', 'pack', 1, 4.5, '2020-06-24 07:47:25', '2020-06-24 07:47:25'),
(104, '01-35', 'Sandía', 'Sandía fashion x unidad x  2 kg apróx', 1, 27, 'prodcut_img_104.jpg', 'kg', 1, 2.9, '2020-06-24 07:51:01', '2020-06-24 07:51:01'),
(105, '01-36', 'Uva', 'Uva red globe rojas', 1, 27, 'prodcut_img_105.JPG', 'kg', 1, 6.9, '2020-06-24 07:52:59', '2020-06-24 07:52:59'),
(106, '01-37', 'Uva', 'Uva verde sultana', 1, 27, 'prodcut_img_106.JPG', 'kg', 1, 9.9, '2020-06-24 07:54:56', '2020-06-24 07:54:56'),
(107, '01-38', 'Piña', 'Piña hawaii x 2 kg apróx', 1, 27, 'prodcut_img_107.JPG', 'kg', 1, 3.9, '2020-06-24 08:00:20', '2020-06-24 08:00:20'),
(108, '01-41', 'Melocotón', 'Melocotón añawi', 1, 27, 'prodcut_img_108.JPG', 'kg', 1, 11.9, '2020-06-24 08:04:13', '2020-06-24 08:04:13'),
(109, '01-42', 'Manzana', 'Manzana roja', 1, 27, 'prodcut_img_109.JPG', 'kg', 1, 6.5, '2020-06-24 08:05:24', '2020-06-24 08:05:24'),
(110, '01-43', 'Pera', 'Pera Packhams x kilo', 1, 27, 'prodcut_img_110.JPG', 'kg', 1, 6.9, '2020-06-24 08:06:25', '2020-06-24 08:06:25'),
(111, '01-47', 'Camu Camu', 'Camu Camu', 1, 27, 'prodcut_img_111.JPG', 'kg', 1, 9, '2020-06-24 08:15:59', '2020-06-24 08:15:59'),
(112, '01-48', 'Guayaba', 'Guayaba', 1, 27, 'prodcut_img_112.jpg', 'kg', 1, 3.9, '2020-06-24 08:17:07', '2020-06-24 08:17:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2020-06-24 02:00:37', '2020-06-24 02:00:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2020-06-24 02:00:38', '2020-06-24 02:00:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stores`
--

CREATE TABLE `stores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `stores`
--

INSERT INTO `stores` (`id`, `name`, `description`, `district_id`, `type_id`, `logo`, `state`, `created_at`, `updated_at`) VALUES
(1, 'La Liebre', 'Tienda principal', 1, 1, 'store_logo_1.png', 1, '2020-06-23 11:47:39', '2020-06-23 11:47:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `types`
--

INSERT INTO `types` (`id`, `name`, `state`, `created_at`, `updated_at`) VALUES
(1, 'principal', 1, '2020-06-23 11:47:09', '2020-06-23 11:47:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'admin@admin.com', NULL, '$2y$10$XS.zJLmLXk.EERnWqco9V.E1fRgveDAJSNnmx4id78fh2kO6I1sWa', NULL, '2020-06-24 02:00:38', '2020-06-24 02:00:38');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aisles`
--
ALTER TABLE `aisles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_aisle_id_foreign` (`aisle_id`);

--
-- Indices de la tabla `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(250));

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_store_id_foreign` (`store_id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stores_district_id_foreign` (`district_id`),
  ADD KEY `stores_type_id_foreign` (`type_id`);

--
-- Indices de la tabla `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aisles`
--
ALTER TABLE `aisles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `stores`
--
ALTER TABLE `stores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
