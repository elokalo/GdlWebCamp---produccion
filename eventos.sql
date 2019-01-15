-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 26-11-2018 a las 19:14:23
-- Versión del servidor: 5.7.23
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gdlwebcamp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

DROP TABLE IF EXISTS `eventos`;
CREATE TABLE IF NOT EXISTS `eventos` (
  `evento_id` tinyint(10) NOT NULL AUTO_INCREMENT,
  `nombre_evento` varchar(80) NOT NULL,
  `fecha_evento` date NOT NULL,
  `hora_evento` time NOT NULL,
  `id_cat_evento` tinyint(10) NOT NULL,
  `id_inv` tinyint(4) NOT NULL,
  `clave` varchar(10) NOT NULL,
  PRIMARY KEY (`evento_id`),
  KEY `id_cat_evento` (`id_cat_evento`),
  KEY `id_inv` (`id_inv`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `id_cat_evento`, `id_inv`, `clave`) VALUES
(1, 'Responsive Web Design', '2016-12-09', '10:00:00', 3, 1, 'taller_01'),
(2, 'Flexbox', '2016-12-09', '12:00:00', 3, 2, 'taller_02'),
(3, 'HTML5 y CSS3', '2016-12-09', '14:00:00', 3, 3, 'taller_03'),
(4, 'Drupal', '2016-12-09', '17:00:00', 3, 4, 'taller_04'),
(5, 'WordPress', '2016-12-09', '19:00:00', 3, 5, 'taller_05'),
(6, 'Como ser freelancer', '2016-12-09', '10:00:00', 2, 6, 'conf_01'),
(7, 'Tecnologías del Futuro', '2016-12-09', '17:00:00', 2, 1, 'conf_02'),
(8, 'Seguridad en la Web', '2016-12-09', '19:00:00', 2, 2, 'conf_03'),
(9, 'Diseño UI y UX para móviles', '2016-12-09', '10:00:00', 1, 6, 'sem_01'),
(10, 'AngularJS', '2016-12-10', '10:00:00', 3, 1, 'taller_06'),
(11, 'PHP y MySQL', '2016-12-10', '12:00:00', 3, 2, 'taller_07'),
(12, 'JavaScript Avanzado', '2016-12-10', '14:00:00', 3, 3, 'taller_08'),
(13, 'SEO en Google', '2016-12-10', '17:00:00', 3, 4, 'taller_09'),
(14, 'De Photoshop a HTML5 y CSS3', '2016-12-10', '19:00:00', 3, 5, 'taller_10'),
(15, 'PHP Intermedio y Avanzado', '2016-12-10', '21:00:00', 3, 6, 'taller_11'),
(16, 'Como crear una tienda online que venda millones en pocos días', '2016-12-10', '10:00:00', 2, 6, 'conf_04'),
(17, 'Los mejores lugares para encontrar trabajo', '2016-12-10', '17:00:00', 2, 1, 'conf_05'),
(18, 'Pasos para crear un negocio rentable ', '2016-12-10', '19:00:00', 2, 2, 'conf_06'),
(19, 'Aprende a Programar en una mañana', '2016-12-10', '10:00:00', 1, 3, 'sem_02'),
(20, 'Diseño UI y UX para móviles', '2016-12-10', '17:00:00', 1, 5, 'sem_03'),
(21, 'Laravel', '2016-12-11', '10:00:00', 3, 1, 'taller_12'),
(22, 'Crea tu propia API', '2016-12-11', '12:00:00', 3, 2, 'taller_13'),
(23, 'JavaScript y jQuery', '2016-12-11', '14:00:00', 3, 3, 'taller_14'),
(24, 'Creando Plantillas para WordPress', '2016-12-11', '17:00:00', 3, 4, 'taller_15'),
(25, 'Tiendas Virtuales en Magento', '2016-12-11', '19:00:00', 3, 5, 'taller_16'),
(26, 'Como hacer Marketing en línea', '2016-12-11', '10:00:00', 2, 6, 'conf_07'),
(27, '¿Con que lenguaje debo empezar?', '2016-12-11', '17:00:00', 2, 2, 'conf_08'),
(28, 'Frameworks y librerias Open Source', '2016-12-11', '19:00:00', 2, 3, 'conf_09'),
(29, 'Creando una App en Android en una mañana', '2016-12-11', '10:00:00', 1, 4, 'sem_04'),
(30, 'Creando una App en iOS en una tarde', '2016-12-11', '17:00:00', 1, 1, 'sem_05');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`id_cat_evento`) REFERENCES `categoria_evento` (`id_categoria`),
  ADD CONSTRAINT `eventos_ibfk_2` FOREIGN KEY (`id_inv`) REFERENCES `invitados` (`invitado_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
