-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando datos para la tabla cronograma.actividades: ~2 rows (aproximadamente)
INSERT INTO `actividades` (`id`, `descripcion`, `fecha_inicio`, `fecha_fin`, `colaborador_id`, `estado_id`, `created_at`, `updated_at`) VALUES
	(1, 'Encuesta de satisfacción con el servicio', '2023-08-20', '2023-08-20', 1, 1, '2023-08-21 23:44:17', '2023-08-21 23:44:17'),
	(2, 'Visita de seguimiento del proyecto', '2023-08-21', '2023-08-21', 1, 1, '2023-08-22 00:25:10', '2023-08-22 00:25:10');

-- Volcando datos para la tabla cronograma.colaboradores: ~0 rows (aproximadamente)
INSERT INTO `colaboradores` (`id`, `identificacion`, `nombres`, `apellidos`, `direccion`, `telefono`, `email`, `created_at`, `updated_at`) VALUES
	(1, '1065890328', 'Lorenzo', 'Geliz Cotera', 'Calle 32 N 12-87', '3189000976', 'lorenzogeliz@gmail.com', '2023-08-21 23:35:19', '2023-08-21 23:35:19');

-- Volcando datos para la tabla cronograma.estados: ~0 rows (aproximadamente)
INSERT INTO `estados` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
	(1, 'COMPLETADO', NULL, NULL),
	(2, 'PENDIENTE', NULL, NULL);

-- Volcando datos para la tabla cronograma.failed_jobs: ~0 rows (aproximadamente)

-- Volcando datos para la tabla cronograma.migrations: ~6 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2023_08_19_205423_create_colaboradores_table', 2),
	(5, '2023_08_19_205520_create_estados_table', 2),
	(6, '2023_08_19_205615_create_actividades_table', 2);

-- Volcando datos para la tabla cronograma.password_resets: ~0 rows (aproximadamente)

-- Volcando datos para la tabla cronograma.users: ~0 rows (aproximadamente)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Lorenzo Antonio', 'lorenzogeliz@gmail.com', NULL, '$2y$10$Z8JH4lrVbQ81mGJDDnCgiu6NVSn/3H2cFQ.Yg6V3Z.VfkMjcNK1LG', NULL, '2023-08-20 02:42:55', '2023-08-20 02:42:55');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
