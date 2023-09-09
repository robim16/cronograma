-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-09-2023 a las 19:05:33
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cronograma`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `color` varchar(20) DEFAULT NULL,
  `observaciones` varchar(255) NOT NULL,
  `categoria_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `colaborador_id` bigint(20) UNSIGNED NOT NULL,
  `estado_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`id`, `descripcion`, `fecha_inicio`, `fecha_fin`, `color`, `observaciones`, `categoria_id`, `colaborador_id`, `estado_id`, `created_at`, `updated_at`) VALUES
(1, 'Encuesta de satisfacción con el servicio', '2023-08-20', '2023-08-20', '', '', 1, 1, 2, '2023-08-22 04:44:17', '2023-08-25 00:44:32'),
(2, 'Visita de seguimiento del proyecto social', '2023-08-21', '2023-08-22', '#f0e924', '', 1, 1, 1, '2023-08-22 05:25:10', '2023-08-29 21:46:17'),
(3, 'Visita de campo', '2023-08-25', '2023-08-26', '#20b661', '', 1, 1, 2, '2023-08-25 02:46:41', '2023-08-29 21:44:08'),
(5, 'encuesta a madres cabeza de hogar', '2023-08-30', '2023-08-31', '#e412f3', '', 1, 4, 1, '2023-08-25 03:34:02', '2023-09-02 03:13:02'),
(6, 'trabajo con jóvenes vulnerables', '2023-08-16', '2023-08-18', '', '', 1, 1, 1, '2023-08-28 19:14:39', '2023-08-28 19:54:14'),
(8, 'Atención a desplazados', '2023-08-02', '2023-08-04', '#ee68dc', '', 1, 2, 2, '2023-08-29 00:55:31', '2023-08-29 21:44:45'),
(9, 'Visita a madres comunitarias', '2023-09-06', '2023-09-10', '', '', 1, 2, 2, '2023-08-29 01:39:18', '2023-08-29 01:39:18'),
(10, 'Actividad recreativa con niños', '2023-09-04', '2023-09-05', '#f58319', '', 1, 2, 2, '2023-08-29 19:40:25', '2023-08-31 22:46:41'),
(12, 'Encuesta a victimas', '2023-08-23', '2023-08-24', '#eb2d2d', '', 1, 2, 2, '2023-08-29 20:31:49', '2023-08-29 21:43:31'),
(13, 'trabajo social', '2023-08-06', '2023-08-07', '#28c6e6', '', 1, 2, 2, '2023-08-30 02:11:04', '2023-08-30 02:11:04'),
(14, 'Socialización de ofertas de cursos', '2023-08-11', '2023-08-13', '#42e43f', '', 1, 3, 1, '2023-08-31 22:44:29', '2023-08-31 22:45:51'),
(15, 'Encuesta', '2023-10-04', '2023-10-08', '#000000', '', 1, 1, 2, '2023-08-31 22:47:47', '2023-08-31 22:47:47'),
(16, 'Caracterización de desplazados', '2023-08-31', '2023-09-01', NULL, '', 1, 4, 2, '2023-09-01 03:31:55', '2023-09-02 03:17:25'),
(17, 'Socialización de planes de inversión', '2023-09-02', '1970-01-01', 'null', '', 1, 3, 2, '2023-09-01 20:44:12', '2023-09-04 21:43:44'),
(18, 'Encuesta a madres comunitarias', '2023-09-12', '2023-09-13', '#cc33b8', '', 1, 3, 3, '2023-09-01 21:04:16', '2023-09-06 02:52:36'),
(19, 'Atención a desplazo', '2023-09-22', '2023-09-23', '#dc2e2e', '', 1, 3, 1, '2023-09-01 21:09:56', '2023-09-04 21:43:02'),
(21, 'Visita de inspección', '2023-09-15', '2023-09-16', '#f2aa91', '', 1, 4, 2, '2023-09-01 21:21:47', '2023-09-01 21:21:47'),
(22, 'Entregar Aplicativo de tareas', '2023-09-04', '2023-09-06', NULL, '', 1, 1, 2, '2023-09-04 22:00:33', '2023-09-04 22:00:33'),
(23, 'Ejemplo 1', '2023-09-04', '2023-09-05', '#c526a8', '', 1, 1, 2, '2023-09-04 22:05:20', '2023-09-04 22:05:20'),
(25, 'Actividades lúdicas en la orilla de río', '2023-09-07', '1970-01-01', '#d55d5d', 'se hizo la actividad', 1, 4, 3, '2023-09-08 00:24:28', '2023-09-09 19:44:47'),
(26, 'Elaboración de planes de negocio', '2023-09-08', '2023-09-09', NULL, '', 1, 4, 2, '2023-09-08 00:37:59', '2023-09-08 00:37:59'),
(27, 'Charlas sobre violencia intrafamiliar', '2023-08-28', '2023-08-29', '#3be3cf', 'charlas a jóvenes', 1, 4, 2, '2023-09-09 02:01:30', '2023-09-09 02:01:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Encuestas', 'Realización de encuestas', '2023-09-08 01:26:26', '2023-09-08 01:26:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colaboradores`
--

CREATE TABLE `colaboradores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `identificacion` varchar(255) NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `colaboradores`
--

INSERT INTO `colaboradores` (`id`, `identificacion`, `nombres`, `apellidos`, `direccion`, `telefono`, `email`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '1065890328', 'Lorenzo', 'Geliz Cotera', 'Calle 32 N 12-87', '3189000976', 'lorenzogelizcotera@gmail.com', 1, '2023-08-22 04:35:19', '2023-09-04 20:58:25'),
(2, '1069000321', 'Tatiana', 'Mendoza', 'Calle 43 N 21-98', '3789005498', 'tatiana.mendoza@gmail.com', 7, '2023-08-29 00:45:54', '2023-08-29 00:45:54'),
(3, '1090387278', 'Mario', 'Jaramillo Bustos', 'Calle 54 N 32-87', '3230906578', 'mario.jaramillo@gmail.com', 2, '2023-08-30 21:25:34', '2023-08-30 21:25:34'),
(4, '1803303033', 'Juan Diego', 'Redondo Robles', 'Calle 28 N 43-21', '3547813465', 'carteagajimenez@gmail.com', 12, '2023-09-01 02:05:20', '2023-09-01 03:09:24'),
(5, '1089450333', 'Marta', 'Zamora Téllez', 'Calle 54 N 31-65', '3189007693', 'marta.zamora@gmail.com', 14, '2023-09-07 02:21:37', '2023-09-07 02:21:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'FINALIZADO', NULL, NULL),
(2, 'PENDIENTE', NULL, NULL),
(3, 'EN PROCESO', NULL, NULL),
(4, 'VENCIDO', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(1, 'default', '{\"uuid\":\"197bf0f7-4a2d-40eb-a8f4-2c28df1e6f8e\",\"displayName\":\"App\\\\Jobs\\\\ActividadEmailJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\ActividadEmailJob\",\"command\":\"O:26:\\\"App\\\\Jobs\\\\ActividadEmailJob\\\":12:{s:7:\\\"\\u0000*\\u0000user\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:22:\\\"App\\\\Models\\\\Colaborador\\\";s:2:\\\"id\\\";i:4;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:10:\\\"\\u0000*\\u0000details\\\";a:1:{s:9:\\\"actividad\\\";a:5:{s:3:\\\"msj\\\";s:40:\\\"Usted tiene una nueva actividad asignada\\\";s:11:\\\"colaborador\\\";s:25:\\\"Juan Diego Redondo Robles\\\";s:9:\\\"actividad\\\";s:33:\\\"Elaboración de planes de negocio\\\";s:5:\\\"fecha\\\";s:10:\\\"2023-09-08\\\";s:3:\\\"url\\\";s:53:\\\"http:\\/\\/localhost\\/cronograma\\/public\\/admin\\/actividad\\/26\\\";}}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1694115479, 1694115479);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2023_08_19_205423_create_colaboradores_table', 2),
(5, '2023_08_19_205520_create_estados_table', 2),
(6, '2023_08_19_205615_create_actividades_table', 2),
(7, '2023_08_31_200914_create_notifications_table', 3),
(8, '2023_09_06_215845_create_jobs_table', 4),
(9, '2023_09_07_195257_create_categorias_table', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('28914225-587c-433b-969f-b5a5adaa32d8', 'App\\Notifications\\ActividadAsignada', 'App\\Models\\Colaborador', 1, '{\"data\":{\"actividad\":{\"msj\":\"Usted tiene una nueva actividad asignada\",\"colaborador\":\"Lorenzo Geliz Cotera\",\"actividad\":\"Encuesta a adultos mayores\",\"fecha\":\"2023-09-07\",\"url\":\"http:\\/\\/localhost\\/cronograma\\/public\\/admin\\/actividad\\/24\"}}}', NULL, '2023-09-07 02:01:36', '2023-09-07 02:01:36'),
('3b1d9001-ddb9-421c-8380-54a7b9adf998', 'App\\Notifications\\ActividadAsignada', 'App\\Models\\Colaborador', 3, '{\"data\":{\"actividad\":{\"msj\":\"Usted tiene una nueva actividad asignada\",\"colaborador\":\"Mario Jaramillo Bustos\",\"actividad\":{\"descripcion\":\"Atenci\\u00f3n a desplazados\",\"colaborador_id\":\"3\",\"estado_id\":\"2\",\"fecha_inicio\":\"2023-09-22\",\"fecha_fin\":\"2023-09-23\",\"color\":\"#dc2e2e\",\"updated_at\":\"2023-09-01T16:09:56.000000Z\",\"created_at\":\"2023-09-01T16:09:56.000000Z\",\"id\":19},\"url\":\"http:\\/\\/localhost\\/cronograma\\/public\\/admin\\/actividad\\/19\"}}}', NULL, '2023-09-01 21:10:01', '2023-09-01 21:10:01'),
('58448699-2d23-4a9b-b1c2-9ab968bff829', 'App\\Notifications\\ActividadAsignada', 'App\\Models\\Colaborador', 4, '{\"data\":{\"actividad\":{\"msj\":\"Usted tiene una nueva actividad asignada\",\"colaborador\":\"Juan Diego Redondo Robles\",\"actividad\":\"Charlas sobre violencia intrafamiliar\",\"fecha\":\"2023-08-28\",\"url\":\"http:\\/\\/localhost\\/cronograma\\/public\\/admin\\/actividad\\/27\"}}}', NULL, '2023-09-09 02:01:59', '2023-09-09 02:01:59'),
('5de19cb7-8fbc-465f-89a1-a747cb8a689b', 'App\\Notifications\\ActividadAsignada', 'App\\Models\\Colaborador', 1, '{\"data\":{\"actividad\":{\"msj\":\"Usted tiene una nueva actividad asignada\",\"colaborador\":\"Lorenzo Geliz Cotera\",\"actividad\":\"Ejemplo 1\",\"fecha\":\"2023-09-04\",\"url\":\"http:\\/\\/localhost\\/cronograma\\/public\\/admin\\/actividad\\/23\"}}}', NULL, '2023-09-04 22:05:27', '2023-09-04 22:05:27'),
('72f8f576-4caf-4191-8b1c-6f67f960e67d', 'App\\Notifications\\ActividadAsignada', 'App\\Models\\Colaborador', 1, '{\"data\":{\"actividad\":{\"msj\":\"Usted tiene una nueva actividad asignada\",\"colaborador\":\"Lorenzo Geliz Cotera\",\"actividad\":\"Entregar Aplicativo de tareas\",\"fecha\":\"2023-09-04\",\"url\":\"http:\\/\\/localhost\\/cronograma\\/public\\/admin\\/actividad\\/22\"}}}', NULL, '2023-09-04 22:01:46', '2023-09-04 22:01:46'),
('a17bff9d-e87b-408b-bd96-b8492f90c1e1', 'App\\Notifications\\ActividadAsignada', 'App\\Models\\Colaborador', 4, '{\"data\":{\"actividad\":{\"msj\":\"Usted tiene una nueva actividad asignada\",\"colaborador\":\"Juan Diego Redondo Robles\",\"actividad\":\"Actividades l\\u00fadicas en la orilla de r\\u00edo\",\"fecha\":\"2023-09-07\",\"url\":\"http:\\/\\/localhost\\/cronograma\\/public\\/admin\\/actividad\\/25\"}}}', NULL, '2023-09-08 00:25:06', '2023-09-08 00:25:06'),
('e91621d6-22d5-4755-8c0f-6baf08b882f7', 'App\\Notifications\\ActividadAsignada', 'App\\Models\\Colaborador', 4, '{\"data\":{\"actividad\":{\"msj\":\"Usted tiene una nueva actividad asignada\",\"colaborador\":\"Juan Diego Redondo Robles\",\"actividad\":\"Visita de inspecci\\u00f3n\",\"fecha\":\"2023-09-15\",\"url\":\"http:\\/\\/localhost\\/cronograma\\/public\\/admin\\/actividad\\/21\"}}}', NULL, '2023-09-01 21:21:52', '2023-09-01 21:21:52'),
('ed4b5d80-e2ba-4e66-a860-1c53d5876769', 'App\\Notifications\\ActividadAsignada', 'App\\Models\\Colaborador', 4, '{\"data\":{\"actividad\":{\"msj\":\"Usted tiene una nueva actividad asignada\",\"colaborador\":\"Juan Diego Redondo Robles\",\"actividad\":\"encuesta a madres cabeza de hogar\",\"fecha\":\"2023-08-30\",\"url\":\"http:\\/\\/localhost\\/cronograma\\/public\\/admin\\/actividad\\/5\"}}}', NULL, '2023-09-02 03:13:10', '2023-09-02 03:13:10'),
('fb98db5e-902d-44a2-822e-8305183c826b', 'App\\Notifications\\ActividadAsignada', 'App\\Models\\Colaborador', 3, '{\"data\":{\"actividad\":{\"msj\":\"Usted tiene una nueva actividad asignada\",\"colaborador\":\"Mario Jaramillo Bustos\",\"actividad\":{\"descripcion\":\"Socializaci\\u00f3n de planes de inversi\\u00f3n\",\"fecha_inicio\":\"2023-09-01\",\"fecha_fin\":\"2023-09-01\",\"colaborador_id\":\"3\",\"estado_id\":\"2\",\"updated_at\":\"2023-09-01T15:44:12.000000Z\",\"created_at\":\"2023-09-01T15:44:12.000000Z\",\"id\":17},\"url\":\"http:\\/\\/localhost\\/cronograma\\/public\\/admin\\/actividad\\/17\"}}}', NULL, '2023-09-01 20:44:45', '2023-09-01 20:44:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'Usuario con rol administrador', NULL, NULL),
(2, 'Colaborador', 'Usuario que realiza actividades', '2023-08-30 20:14:22', '2023-08-30 20:14:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Lorenzo', 'lorenzogelizcotera@gmail.com', NULL, '$2y$10$12ZWCbyvJ3vuQndjKsEu9.OyAkcjvABgJzAXUzQsj2j6WUCS5esku', NULL, '2023-08-20 07:42:55', '2023-09-04 20:58:25'),
(2, 2, 'Mario', 'mario.jaramillo@gmail.com', NULL, '$2y$10$12ZWCbyvJ3vuQndjKsEu9.OyAkcjvABgJzAXUzQsj2j6WUCS5esku', NULL, '2023-08-30 21:25:34', '2023-08-30 21:25:34'),
(7, 2, 'Tatiana', 'tatiana.mendoza@gmail.com\r\n', NULL, '$2y$10$Z8JH4lrVbQ81mGJDDnCgiu6NVSn/3H2cFQ.Yg6V3Z.VfkMjcNK1LG', NULL, '2023-08-30 16:34:41', NULL),
(12, 2, 'Juan Diego', 'carteagajimenez@gmail.com', NULL, '$2y$10$WswlXRBfQrq0uxlS94JitOnOixzvcsCymHbiO2BiRZq.nATqXvpaK', NULL, '2023-09-01 02:05:20', '2023-09-01 03:09:23'),
(14, 2, 'Marta', 'marta.zamora@gmail.com', NULL, '$2y$10$a6Mh//wxt4qX4pKoxiRYwe5BHNoHBl9F31I2PXvUu4P7Zx79tzZMC', NULL, '2023-09-07 02:21:37', '2023-09-07 02:21:37');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `actividades_colaborador_id_foreign` (`colaborador_id`),
  ADD KEY `actividades_estado_id_foreign` (`estado_id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `colaboradores`
--
ALTER TABLE `colaboradores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `colaboradores_email_unique` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `colaboradores`
--
ALTER TABLE `colaboradores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD CONSTRAINT `actividades_colaborador_id_foreign` FOREIGN KEY (`colaborador_id`) REFERENCES `colaboradores` (`id`),
  ADD CONSTRAINT `actividades_estado_id_foreign` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`),
  ADD CONSTRAINT `actividades_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);

--
-- Filtros para la tabla `colaboradores`
--
ALTER TABLE `colaboradores`
  ADD CONSTRAINT `colaboradores_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
