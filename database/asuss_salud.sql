-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.22-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para asuss_salud
CREATE DATABASE IF NOT EXISTS `asuss_salud` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `asuss_salud`;

-- Volcando estructura para tabla asuss_salud.bancooxigeno_catalogo_dosis
CREATE TABLE IF NOT EXISTS `bancooxigeno_catalogo_dosis` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `estado` enum('activo','inactivo') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla asuss_salud.bancooxigeno_catalogo_dosis: ~0 rows (aproximadamente)
DELETE FROM `bancooxigeno_catalogo_dosis`;
/*!40000 ALTER TABLE `bancooxigeno_catalogo_dosis` DISABLE KEYS */;
/*!40000 ALTER TABLE `bancooxigeno_catalogo_dosis` ENABLE KEYS */;

-- Volcando estructura para tabla asuss_salud.bancooxigeno_catalogo_vacuna
CREATE TABLE IF NOT EXISTS `bancooxigeno_catalogo_vacuna` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `estado` enum('activo','inactivo') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla asuss_salud.bancooxigeno_catalogo_vacuna: ~0 rows (aproximadamente)
DELETE FROM `bancooxigeno_catalogo_vacuna`;
/*!40000 ALTER TABLE `bancooxigeno_catalogo_vacuna` DISABLE KEYS */;
/*!40000 ALTER TABLE `bancooxigeno_catalogo_vacuna` ENABLE KEYS */;

-- Volcando estructura para tabla asuss_salud.bancooxigeno_generacion
CREATE TABLE IF NOT EXISTS `bancooxigeno_generacion` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_item` bigint(20) DEFAULT NULL,
  `generador_oxigeno` enum('Si','No') DEFAULT NULL,
  `generador_capacidad_produccion` int(11) DEFAULT NULL,
  `generador_consumo_promedio` int(11) DEFAULT NULL,
  `generador_cilindros_recargados` int(11) DEFAULT NULL,
  `contrato_vigente` enum('Si','No') DEFAULT NULL,
  `empresa_contrato` varchar(255) DEFAULT NULL,
  `fecha_final_contrato` date DEFAULT NULL,
  `tanque_criogenico` enum('Si','No') DEFAULT NULL,
  `tanque_criogenico_capacidad` int(11) DEFAULT NULL,
  `tanque_criogenico_consumo` int(11) DEFAULT NULL,
  `tubos_6` enum('Si','No') DEFAULT NULL,
  `tubos_llenos_6` int(11) DEFAULT NULL,
  `tubos_vacios_6` int(11) DEFAULT NULL,
  `tubos_consumo_oxigeno_6` int(11) DEFAULT NULL,
  `tubos_8` enum('Si','No') DEFAULT NULL,
  `tubos_llenos_8` int(11) DEFAULT NULL,
  `tubos_vacios_8` int(11) DEFAULT NULL,
  `tubos_consumo_oxigeno_8` int(11) DEFAULT NULL,
  `camas_habilitadas_internacion` int(11) DEFAULT NULL,
  `camas_ocupadas_internacion` int(11) DEFAULT NULL,
  `camas_habilitadas_terapia_intermedia` int(11) DEFAULT NULL,
  `camas_ocupadas_terapia_intermedia` int(11) DEFAULT NULL,
  `camas_habilitadas_terapia_intensiva` int(11) DEFAULT NULL,
  `camas_ocupadas_terapia_intensiva` int(11) DEFAULT NULL,
  `camas_habilitadas_emergencias` int(11) DEFAULT NULL,
  `camas_ocupadas_emergencias` int(11) DEFAULT NULL,
  `pacientes_covid_referidos` int(11) DEFAULT NULL,
  `compra_servicios` enum('Si','No') DEFAULT NULL,
  `compra_camas_habilitadas_internacion` int(11) DEFAULT NULL,
  `compra_camas_ocupadas_internacion` int(11) DEFAULT NULL,
  `compra_camas_habilitadas_terapia_intermedia` int(11) DEFAULT NULL,
  `compra_camas_ocupadas_terapia_intermedia` int(11) DEFAULT NULL,
  `compra_camas_habilitadas_terapia_intensiva` int(11) DEFAULT NULL,
  `compra_camas_ocupadas_terapia_intensiva` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_bancooxigeno_generador_bancooxigeno_item1_idx` (`id_item`),
  CONSTRAINT `fk_bancooxigeno_generador_bancooxigeno_item1` FOREIGN KEY (`id_item`) REFERENCES `bancooxigeno_item` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4942 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla asuss_salud.bancooxigeno_generacion: ~0 rows (aproximadamente)
DELETE FROM `bancooxigeno_generacion`;
/*!40000 ALTER TABLE `bancooxigeno_generacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `bancooxigeno_generacion` ENABLE KEYS */;

-- Volcando estructura para tabla asuss_salud.bancooxigeno_item
CREATE TABLE IF NOT EXISTS `bancooxigeno_item` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_establecimiento` bigint(20) DEFAULT NULL,
  `id_usuario` bigint(20) DEFAULT NULL,
  `codigo` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `control` varchar(255) DEFAULT NULL,
  `estado` enum('Abierto','Cerrado') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_bancooxigeno_item_catalogo_establecimiento1_idx` (`id_establecimiento`),
  KEY `fk_bancooxigeno_item_users1_idx` (`id_usuario`),
  CONSTRAINT `fk_bancooxigeno_item_catalogo_establecimiento1` FOREIGN KEY (`id_establecimiento`) REFERENCES `catalogo_establecimiento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_bancooxigeno_item_users1` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4887 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla asuss_salud.bancooxigeno_item: ~0 rows (aproximadamente)
DELETE FROM `bancooxigeno_item`;
/*!40000 ALTER TABLE `bancooxigeno_item` DISABLE KEYS */;
/*!40000 ALTER TABLE `bancooxigeno_item` ENABLE KEYS */;

-- Volcando estructura para tabla asuss_salud.bancooxigeno_vacunacion
CREATE TABLE IF NOT EXISTS `bancooxigeno_vacunacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_item` bigint(20) DEFAULT NULL,
  `id_vacuna` bigint(20) DEFAULT NULL,
  `id_dosis` bigint(20) DEFAULT NULL,
  `cantidad_recibida` bigint(20) DEFAULT NULL,
  `cantidad_usada` bigint(20) DEFAULT NULL,
  `mujeres_gestantes` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_bancooxigeno_vacunacion_bancooxigeno_item1_idx` (`id_item`),
  KEY `fk_bancooxigeno_vacunacion_bancooxigeno_catalogo_dosis1_idx` (`id_dosis`),
  KEY `fk_bancooxigeno_vacunacion_bacooxigeno_catalogo_vacuna1_idx` (`id_vacuna`),
  CONSTRAINT `fk_bancooxigeno_vacunacion_bacooxigeno_catalogo_vacuna1` FOREIGN KEY (`id_vacuna`) REFERENCES `bancooxigeno_catalogo_vacuna` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_bancooxigeno_vacunacion_bancooxigeno_catalogo_dosis1` FOREIGN KEY (`id_dosis`) REFERENCES `bancooxigeno_catalogo_dosis` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_bancooxigeno_vacunacion_bancooxigeno_item1` FOREIGN KEY (`id_item`) REFERENCES `bancooxigeno_item` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla asuss_salud.bancooxigeno_vacunacion: ~0 rows (aproximadamente)
DELETE FROM `bancooxigeno_vacunacion`;
/*!40000 ALTER TABLE `bancooxigeno_vacunacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `bancooxigeno_vacunacion` ENABLE KEYS */;

-- Volcando estructura para vista asuss_salud.banco_oxigeno_reporte_departamento_totales
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `banco_oxigeno_reporte_departamento_totales` (
	`departamento` VARCHAR(255) NULL COLLATE 'utf8mb4_unicode_ci',
	`fecha` DATE NULL,
	`tubos_totales_6` DECIMAL(33,0) NULL,
	`tubos_llenos_6` DECIMAL(32,0) NULL,
	`tubos_vacios_6` DECIMAL(32,0) NULL,
	`tubos_totales_8` DECIMAL(33,0) NULL,
	`tubos_llenos_8` DECIMAL(32,0) NULL,
	`tubos_vacios_8` DECIMAL(32,0) NULL
) ENGINE=MyISAM;

-- Volcando estructura para vista asuss_salud.banco_oxigeno_reporte_ente_departamento
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `banco_oxigeno_reporte_ente_departamento` (
	`ente_gestor` TEXT NULL COLLATE 'utf8mb4_unicode_ci',
	`id_departamento` BIGINT(20) NULL,
	`fecha` DATE NULL,
	`tubos_totales_6` DECIMAL(33,0) NULL,
	`tubos_llenos_6` DECIMAL(32,0) NULL,
	`tubos_vacios_6` DECIMAL(32,0) NULL,
	`tubos_totales_8` DECIMAL(33,0) NULL,
	`tubos_llenos_8` DECIMAL(32,0) NULL,
	`tubos_vacios_8` DECIMAL(32,0) NULL
) ENGINE=MyISAM;

-- Volcando estructura para vista asuss_salud.camas_tubos_disponibles
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `camas_tubos_disponibles` (
	`ente_gestor` TEXT NULL COLLATE 'utf8mb4_unicode_ci',
	`departamento` VARCHAR(255) NULL COLLATE 'utf8mb4_unicode_ci',
	`establecimiento` VARCHAR(255) NULL COLLATE 'utf8mb4_unicode_ci',
	`fecha` DATE NULL,
	`camas_habilitadas_terapia_intensiva` INT(11) NOT NULL,
	`camas_ocupadas_terapia_intensiva` INT(11) NOT NULL,
	`camas_disponibles_terapia_intensiva` BIGINT(12) NOT NULL,
	`tubos_disponibles_6` INT(11) NOT NULL,
	`tubos_disponibles_8` INT(11) NOT NULL
) ENGINE=MyISAM;

-- Volcando estructura para tabla asuss_salud.catalogo_departamento
CREATE TABLE IF NOT EXISTS `catalogo_departamento` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla asuss_salud.catalogo_departamento: ~0 rows (aproximadamente)
DELETE FROM `catalogo_departamento`;
/*!40000 ALTER TABLE `catalogo_departamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `catalogo_departamento` ENABLE KEYS */;

-- Volcando estructura para tabla asuss_salud.catalogo_entidad
CREATE TABLE IF NOT EXISTS `catalogo_entidad` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_subsector` bigint(20) DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_catalogo_entidad_catalogo_entidad_subsector1_idx` (`id_subsector`),
  CONSTRAINT `fk_catalogo_entidad_catalogo_entidad_subsector1` FOREIGN KEY (`id_subsector`) REFERENCES `catalogo_entidad_subsector` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla asuss_salud.catalogo_entidad: ~0 rows (aproximadamente)
DELETE FROM `catalogo_entidad`;
/*!40000 ALTER TABLE `catalogo_entidad` DISABLE KEYS */;
/*!40000 ALTER TABLE `catalogo_entidad` ENABLE KEYS */;

-- Volcando estructura para tabla asuss_salud.catalogo_entidad_subsector
CREATE TABLE IF NOT EXISTS `catalogo_entidad_subsector` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla asuss_salud.catalogo_entidad_subsector: ~0 rows (aproximadamente)
DELETE FROM `catalogo_entidad_subsector`;
/*!40000 ALTER TABLE `catalogo_entidad_subsector` DISABLE KEYS */;
/*!40000 ALTER TABLE `catalogo_entidad_subsector` ENABLE KEYS */;

-- Volcando estructura para tabla asuss_salud.catalogo_establecimiento
CREATE TABLE IF NOT EXISTS `catalogo_establecimiento` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_tipo` bigint(20) DEFAULT NULL,
  `id_nivel` bigint(20) DEFAULT NULL,
  `id_entidad` bigint(20) DEFAULT NULL,
  `id_municipio` bigint(20) DEFAULT NULL,
  `id_departamento` bigint(20) DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` enum('Activo','Inactivo') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_catalogo_establecimiento_catalogo_entidad1_idx` (`id_entidad`),
  KEY `fk_catalogo_establecimiento_catalogo_tipo_establecimiento1_idx` (`id_tipo`),
  KEY `fk_catalogo_establecimiento_catalogo_nivel_establecimiento1_idx` (`id_nivel`),
  KEY `fk_catalogo_establecimiento_catalogo_municipio1_idx` (`id_municipio`),
  KEY `fk_catalogo_establecimiento_catalogo_departamento1_idx` (`id_departamento`),
  CONSTRAINT `fk_catalogo_establecimiento_catalogo_departamento1` FOREIGN KEY (`id_departamento`) REFERENCES `catalogo_departamento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_catalogo_establecimiento_catalogo_entidad1` FOREIGN KEY (`id_entidad`) REFERENCES `catalogo_entidad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_catalogo_establecimiento_catalogo_municipio1` FOREIGN KEY (`id_municipio`) REFERENCES `catalogo_municipio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_catalogo_establecimiento_catalogo_nivel_establecimiento1` FOREIGN KEY (`id_nivel`) REFERENCES `catalogo_nivel_establecimiento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_catalogo_establecimiento_catalogo_tipo_establecimiento1` FOREIGN KEY (`id_tipo`) REFERENCES `catalogo_tipo_establecimiento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla asuss_salud.catalogo_establecimiento: ~0 rows (aproximadamente)
DELETE FROM `catalogo_establecimiento`;
/*!40000 ALTER TABLE `catalogo_establecimiento` DISABLE KEYS */;
/*!40000 ALTER TABLE `catalogo_establecimiento` ENABLE KEYS */;

-- Volcando estructura para tabla asuss_salud.catalogo_municipio
CREATE TABLE IF NOT EXISTS `catalogo_municipio` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_departamento` bigint(20) DEFAULT NULL,
  `id_provincia` bigint(20) DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_catalogo_municipio_catalogo_departamento1_idx` (`id_departamento`),
  KEY `fk_catalogo_municipio_catalogo_provincia1_idx` (`id_provincia`),
  CONSTRAINT `fk_catalogo_municipio_catalogo_departamento1` FOREIGN KEY (`id_departamento`) REFERENCES `catalogo_departamento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_catalogo_municipio_catalogo_provincia1` FOREIGN KEY (`id_provincia`) REFERENCES `catalogo_provincia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=340 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla asuss_salud.catalogo_municipio: ~0 rows (aproximadamente)
DELETE FROM `catalogo_municipio`;
/*!40000 ALTER TABLE `catalogo_municipio` DISABLE KEYS */;
/*!40000 ALTER TABLE `catalogo_municipio` ENABLE KEYS */;

-- Volcando estructura para tabla asuss_salud.catalogo_nivel_establecimiento
CREATE TABLE IF NOT EXISTS `catalogo_nivel_establecimiento` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla asuss_salud.catalogo_nivel_establecimiento: ~0 rows (aproximadamente)
DELETE FROM `catalogo_nivel_establecimiento`;
/*!40000 ALTER TABLE `catalogo_nivel_establecimiento` DISABLE KEYS */;
/*!40000 ALTER TABLE `catalogo_nivel_establecimiento` ENABLE KEYS */;

-- Volcando estructura para tabla asuss_salud.catalogo_provincia
CREATE TABLE IF NOT EXISTS `catalogo_provincia` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_departamento` bigint(20) DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_catalogo_provincia_catalogo_departamento1_idx` (`id_departamento`),
  CONSTRAINT `fk_catalogo_provincia_catalogo_departamento1` FOREIGN KEY (`id_departamento`) REFERENCES `catalogo_departamento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla asuss_salud.catalogo_provincia: ~0 rows (aproximadamente)
DELETE FROM `catalogo_provincia`;
/*!40000 ALTER TABLE `catalogo_provincia` DISABLE KEYS */;
/*!40000 ALTER TABLE `catalogo_provincia` ENABLE KEYS */;

-- Volcando estructura para tabla asuss_salud.catalogo_tipo_establecimiento
CREATE TABLE IF NOT EXISTS `catalogo_tipo_establecimiento` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla asuss_salud.catalogo_tipo_establecimiento: ~0 rows (aproximadamente)
DELETE FROM `catalogo_tipo_establecimiento`;
/*!40000 ALTER TABLE `catalogo_tipo_establecimiento` DISABLE KEYS */;
/*!40000 ALTER TABLE `catalogo_tipo_establecimiento` ENABLE KEYS */;

-- Volcando estructura para tabla asuss_salud.correlativo
CREATE TABLE IF NOT EXISTS `correlativo` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `modulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submodulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla asuss_salud.correlativo: ~0 rows (aproximadamente)
DELETE FROM `correlativo`;
/*!40000 ALTER TABLE `correlativo` DISABLE KEYS */;
/*!40000 ALTER TABLE `correlativo` ENABLE KEYS */;

-- Volcando estructura para tabla asuss_salud.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla asuss_salud.failed_jobs: ~0 rows (aproximadamente)
DELETE FROM `failed_jobs`;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Volcando estructura para tabla asuss_salud.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla asuss_salud.migrations: ~0 rows (aproximadamente)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla asuss_salud.model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla asuss_salud.model_has_permissions: ~0 rows (aproximadamente)
DELETE FROM `model_has_permissions`;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;

-- Volcando estructura para tabla asuss_salud.model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla asuss_salud.model_has_roles: ~0 rows (aproximadamente)
DELETE FROM `model_has_roles`;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;

-- Volcando estructura para tabla asuss_salud.module
CREATE TABLE IF NOT EXISTS `module` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `estado` enum('Activo','Inactivo') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla asuss_salud.module: ~0 rows (aproximadamente)
DELETE FROM `module`;
/*!40000 ALTER TABLE `module` DISABLE KEYS */;
/*!40000 ALTER TABLE `module` ENABLE KEYS */;

-- Volcando estructura para tabla asuss_salud.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla asuss_salud.password_resets: ~0 rows (aproximadamente)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Volcando estructura para tabla asuss_salud.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla asuss_salud.permissions: ~0 rows (aproximadamente)
DELETE FROM `permissions`;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Volcando estructura para vista asuss_salud.reporte_mae_camas
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `reporte_mae_camas` (
	`departamento` VARCHAR(255) NULL COLLATE 'utf8mb4_unicode_ci',
	`total_camas_uti_habilitadas` DECIMAL(32,0) NULL,
	`total_camas_uti_ocupadas` DECIMAL(32,0) NULL,
	`total_camas_habilitadas_compra` DECIMAL(32,0) NULL,
	`total_camas_ocupadas_compra` DECIMAL(32,0) NULL
) ENGINE=MyISAM;

-- Volcando estructura para vista asuss_salud.reporte_mae_oxigeno
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `reporte_mae_oxigeno` (
	`departamento` VARCHAR(255) NULL COLLATE 'utf8mb4_unicode_ci',
	`tubos_llenos` DECIMAL(33,0) NULL,
	`tubos_vacios` DECIMAL(33,0) NULL
) ENGINE=MyISAM;

-- Volcando estructura para tabla asuss_salud.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla asuss_salud.roles: ~0 rows (aproximadamente)
DELETE FROM `roles`;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Volcando estructura para tabla asuss_salud.role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla asuss_salud.role_has_permissions: ~0 rows (aproximadamente)
DELETE FROM `role_has_permissions`;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;

-- Volcando estructura para vista asuss_salud.score_oxigeno_disponible
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `score_oxigeno_disponible` (
	`fecha` DATE NULL,
	`nombre` VARCHAR(255) NULL COLLATE 'utf8mb4_unicode_ci',
	`oxigeno` DECIMAL(35,0) NULL
) ENGINE=MyISAM;

-- Volcando estructura para tabla asuss_salud.submodule
CREATE TABLE IF NOT EXISTS `submodule` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_module` bigint(20) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `root` tinyint(1) DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `newtab` tinyint(1) DEFAULT NULL,
  `submenu` tinyint(4) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `estado` enum('Activo','Inactivo') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_submodule_module1_idx` (`id_module`),
  CONSTRAINT `fk_submodule_module1` FOREIGN KEY (`id_module`) REFERENCES `module` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla asuss_salud.submodule: ~0 rows (aproximadamente)
DELETE FROM `submodule`;
/*!40000 ALTER TABLE `submodule` DISABLE KEYS */;
/*!40000 ALTER TABLE `submodule` ENABLE KEYS */;

-- Volcando estructura para tabla asuss_salud.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` enum('Activo','Inactivo') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=196 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla asuss_salud.users: ~0 rows (aproximadamente)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Volcando estructura para tabla asuss_salud.users_module
CREATE TABLE IF NOT EXISTS `users_module` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_user` bigint(20) DEFAULT NULL,
  `id_module` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_users_modules_users1_idx` (`id_user`),
  KEY `fk_users_module_module1_idx` (`id_module`),
  CONSTRAINT `fk_users_module_module1` FOREIGN KEY (`id_module`) REFERENCES `module` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_modules_users1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=188 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla asuss_salud.users_module: ~0 rows (aproximadamente)
DELETE FROM `users_module`;
/*!40000 ALTER TABLE `users_module` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_module` ENABLE KEYS */;

-- Volcando estructura para tabla asuss_salud.users_submodule
CREATE TABLE IF NOT EXISTS `users_submodule` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_user` bigint(20) DEFAULT NULL,
  `id_submodule` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_users_submodule_users1_idx` (`id_user`),
  KEY `fk_users_submodule_submodule1_idx` (`id_submodule`),
  CONSTRAINT `fk_users_submodule_submodule1` FOREIGN KEY (`id_submodule`) REFERENCES `submodule` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_submodule_users1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=188 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla asuss_salud.users_submodule: ~0 rows (aproximadamente)
DELETE FROM `users_submodule`;
/*!40000 ALTER TABLE `users_submodule` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_submodule` ENABLE KEYS */;

-- Volcando estructura para tabla asuss_salud.usuario_establecimiento
CREATE TABLE IF NOT EXISTS `usuario_establecimiento` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_establecimiento` bigint(20) DEFAULT NULL,
  `id_usuario` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_table1_catalogo_establecimiento1_idx` (`id_establecimiento`),
  KEY `fk_table1_users1_idx` (`id_usuario`),
  CONSTRAINT `fk_table1_catalogo_establecimiento10` FOREIGN KEY (`id_establecimiento`) REFERENCES `catalogo_establecimiento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_table1_users10` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla asuss_salud.usuario_establecimiento: ~0 rows (aproximadamente)
DELETE FROM `usuario_establecimiento`;
/*!40000 ALTER TABLE `usuario_establecimiento` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario_establecimiento` ENABLE KEYS */;

-- Volcando estructura para vista asuss_salud.banco_oxigeno_reporte_departamento_totales
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `banco_oxigeno_reporte_departamento_totales`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `banco_oxigeno_reporte_departamento_totales` AS select `cd`.`nombre` AS `departamento`,`bi`.`fecha` AS `fecha`,if(sum(`bg`.`tubos_llenos_6`) + sum(`bg`.`tubos_vacios_6`) > 0,sum(`bg`.`tubos_llenos_6`) + sum(`bg`.`tubos_vacios_6`),0) AS `tubos_totales_6`,if(sum(`bg`.`tubos_llenos_6`),sum(`bg`.`tubos_llenos_6`),0) AS `tubos_llenos_6`,if(sum(`bg`.`tubos_vacios_6`),sum(`bg`.`tubos_vacios_6`),0) AS `tubos_vacios_6`,if(sum(`bg`.`tubos_llenos_8`) + sum(`bg`.`tubos_vacios_8`) > 0,sum(`bg`.`tubos_llenos_8`) + sum(`bg`.`tubos_vacios_8`),0) AS `tubos_totales_8`,if(sum(`bg`.`tubos_llenos_8`),sum(`bg`.`tubos_llenos_8`),0) AS `tubos_llenos_8`,if(sum(`bg`.`tubos_vacios_8`),sum(`bg`.`tubos_vacios_8`),0) AS `tubos_vacios_8` from (((`asuss_salud`.`bancooxigeno_item` `bi` left join `asuss_salud`.`bancooxigeno_generacion` `bg` on(`bg`.`id_item` = `bi`.`id`)) left join `asuss_salud`.`catalogo_establecimiento` `ces` on(`ces`.`id` = `bi`.`id_establecimiento`)) left join `asuss_salud`.`catalogo_departamento` `cd` on(`cd`.`id` = `ces`.`id_departamento`)) group by `cd`.`nombre`,`bi`.`fecha` ;

-- Volcando estructura para vista asuss_salud.banco_oxigeno_reporte_ente_departamento
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `banco_oxigeno_reporte_ente_departamento`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `banco_oxigeno_reporte_ente_departamento` AS select `cen`.`descripcion` AS `ente_gestor`,`ces`.`id_departamento` AS `id_departamento`,`bi`.`fecha` AS `fecha`,if(sum(`bg`.`tubos_llenos_6`) + sum(`bg`.`tubos_vacios_6`) > 0,sum(`bg`.`tubos_llenos_6`) + sum(`bg`.`tubos_vacios_6`),0) AS `tubos_totales_6`,if(sum(`bg`.`tubos_llenos_6`) > 0,sum(`bg`.`tubos_llenos_6`),0) AS `tubos_llenos_6`,if(sum(`bg`.`tubos_vacios_6`) > 0,sum(`bg`.`tubos_vacios_6`),0) AS `tubos_vacios_6`,if(sum(`bg`.`tubos_llenos_8`) + sum(`bg`.`tubos_vacios_8`) > 0,sum(`bg`.`tubos_llenos_8`) + sum(`bg`.`tubos_vacios_8`),0) AS `tubos_totales_8`,if(sum(`bg`.`tubos_llenos_8`) > 0,sum(`bg`.`tubos_llenos_8`),0) AS `tubos_llenos_8`,if(sum(`bg`.`tubos_vacios_8`) > 0,sum(`bg`.`tubos_vacios_8`),0) AS `tubos_vacios_8` from ((((`asuss_salud`.`bancooxigeno_item` `bi` left join `asuss_salud`.`bancooxigeno_generacion` `bg` on(`bg`.`id_item` = `bi`.`id`)) left join `asuss_salud`.`catalogo_establecimiento` `ces` on(`ces`.`id` = `bi`.`id_establecimiento`)) left join `asuss_salud`.`catalogo_departamento` `cd` on(`cd`.`id` = `ces`.`id_departamento`)) left join `asuss_salud`.`catalogo_entidad` `cen` on(`cen`.`id` = `ces`.`id_entidad`)) group by `cen`.`descripcion`,`ces`.`id_departamento`,`bi`.`fecha` ;

-- Volcando estructura para vista asuss_salud.camas_tubos_disponibles
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `camas_tubos_disponibles`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `camas_tubos_disponibles` AS select `cen`.`descripcion` AS `ente_gestor`,`cd`.`nombre` AS `departamento`,`ce`.`nombre` AS `establecimiento`,`bi`.`fecha` AS `fecha`,ifnull(`bg`.`camas_habilitadas_terapia_intensiva`,0) AS `camas_habilitadas_terapia_intensiva`,ifnull(`bg`.`camas_ocupadas_terapia_intensiva`,0) AS `camas_ocupadas_terapia_intensiva`,ifnull(`bg`.`camas_habilitadas_terapia_intensiva`,0) - ifnull(`bg`.`camas_ocupadas_terapia_intensiva`,0) AS `camas_disponibles_terapia_intensiva`,ifnull(`bg`.`tubos_llenos_6`,0) AS `tubos_disponibles_6`,ifnull(`bg`.`tubos_llenos_8`,0) AS `tubos_disponibles_8` from ((((`asuss_salud`.`bancooxigeno_item` `bi` left join `asuss_salud`.`bancooxigeno_generacion` `bg` on(`bg`.`id_item` = `bi`.`id`)) left join `asuss_salud`.`catalogo_establecimiento` `ce` on(`ce`.`id` = `bi`.`id_establecimiento`)) left join `asuss_salud`.`catalogo_departamento` `cd` on(`cd`.`id` = `ce`.`id_departamento`)) left join `asuss_salud`.`catalogo_entidad` `cen` on(`cen`.`id` = `ce`.`id_entidad`)) order by `cen`.`nombre`,`cd`.`nombre`,`ce`.`nombre` ;

-- Volcando estructura para vista asuss_salud.reporte_mae_camas
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `reporte_mae_camas`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `reporte_mae_camas` AS select `cd`.`nombre` AS `departamento`,if(sum(`bg`.`camas_habilitadas_terapia_intensiva`) is null,0,sum(`bg`.`camas_habilitadas_terapia_intensiva`)) AS `total_camas_uti_habilitadas`,if(sum(`bg`.`camas_ocupadas_terapia_intensiva`) is null,0,sum(`bg`.`camas_ocupadas_terapia_intensiva`)) AS `total_camas_uti_ocupadas`,if(sum(`bg`.`compra_camas_habilitadas_terapia_intensiva`) is null,0,sum(`bg`.`compra_camas_habilitadas_terapia_intensiva`)) AS `total_camas_habilitadas_compra`,if(sum(`bg`.`compra_camas_ocupadas_terapia_intensiva`) is null,0,sum(`bg`.`compra_camas_ocupadas_terapia_intensiva`)) AS `total_camas_ocupadas_compra` from (((`asuss_salud`.`bancooxigeno_item` `bi` left join `asuss_salud`.`bancooxigeno_generacion` `bg` on(`bg`.`id_item` = `bi`.`id`)) left join `asuss_salud`.`catalogo_establecimiento` `ce` on(`ce`.`id` = `bi`.`id_establecimiento`)) left join `asuss_salud`.`catalogo_departamento` `cd` on(`cd`.`id` = `ce`.`id_departamento`)) where `bi`.`fecha` = curdate() - interval 1 day group by `cd`.`nombre` ;

-- Volcando estructura para vista asuss_salud.reporte_mae_oxigeno
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `reporte_mae_oxigeno`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `reporte_mae_oxigeno` AS select `cd`.`nombre` AS `departamento`,if(sum(`bg`.`tubos_llenos_6`) is null,0,sum(`bg`.`tubos_llenos_6`)) + if(sum(`bg`.`tubos_llenos_8`) is null,0,sum(`bg`.`tubos_llenos_8`)) AS `tubos_llenos`,if(sum(`bg`.`tubos_vacios_6`) is null,0,sum(`bg`.`tubos_vacios_6`)) + if(sum(`bg`.`tubos_vacios_8`) is null,0,sum(`bg`.`tubos_vacios_8`)) AS `tubos_vacios` from (((`asuss_salud`.`bancooxigeno_item` `bi` left join `asuss_salud`.`bancooxigeno_generacion` `bg` on(`bg`.`id_item` = `bi`.`id`)) left join `asuss_salud`.`catalogo_establecimiento` `ce` on(`ce`.`id` = `bi`.`id_establecimiento`)) left join `asuss_salud`.`catalogo_departamento` `cd` on(`cd`.`id` = `ce`.`id_departamento`)) where `bi`.`fecha` = curdate() - interval 1 day group by `cd`.`nombre` ;

-- Volcando estructura para vista asuss_salud.score_oxigeno_disponible
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `score_oxigeno_disponible`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `score_oxigeno_disponible` AS select curdate() - interval 1 day AS `fecha`,`cen`.`nombre` AS `nombre`,sum(ifnull(`bg`.`tubos_llenos_6`,0) + ifnull(`bg`.`tubos_vacios_6`,0) + ifnull(`bg`.`tubos_llenos_8`,0) + ifnull(`bg`.`tubos_vacios_8`,0)) AS `oxigeno` from (((`asuss_salud`.`bancooxigeno_item` `bi` left join `asuss_salud`.`bancooxigeno_generacion` `bg` on(`bg`.`id_item` = `bi`.`id`)) left join `asuss_salud`.`catalogo_establecimiento` `ce` on(`ce`.`id` = `bi`.`id_establecimiento`)) left join `asuss_salud`.`catalogo_entidad` `cen` on(`cen`.`id` = `ce`.`id_entidad`)) where `bi`.`fecha` = curdate() - interval 1 day group by `cen`.`nombre` order by sum(ifnull(`bg`.`tubos_llenos_6`,0) + ifnull(`bg`.`tubos_vacios_6`,0) + ifnull(`bg`.`tubos_llenos_8`,0) + ifnull(`bg`.`tubos_vacios_8`,0)) desc ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
