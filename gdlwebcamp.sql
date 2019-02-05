-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 05-02-2019 a las 11:46:00
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
CREATE DATABASE IF NOT EXISTS `gdlwebcamp` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `gdlwebcamp`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `password` varchar(60) NOT NULL,
  `nivel` int(1) NOT NULL DEFAULT '0',
  `editado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_admin`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id_admin`, `usuario`, `nombre`, `password`, `nivel`, `editado`) VALUES
(1, 'admin', 'Luis Alfredo Cortes Yañez', '$2y$12$0B2XCYTeHvqOhFZuR70eD.ZunHRdPlAp9eoG4B8/BFw547T7XfLTa', 1, '2018-12-15 17:35:11'),
(4, 'edbed', 'Eduardo Berdel', '$2y$12$kXbq5JUOqqZxIT5WS/yK3uwdyVTq.kSxy7/urwVtp39aFHHfKcswG', 0, '2018-12-15 17:35:40'),
(7, 'lacy', 'Luis Alfredo', '$2y$12$Lq1T0biTQiLKQy75R5uLF.WovUGNNZFfmoly.qDAOjqA9dfEbkTJq', 0, '0000-00-00 00:00:00'),
(12, 'admin_lacy', 'Alfredo Cortes', '$2y$12$9bdXOsRPveluyZfhHn1RpOT7ybZoM4b3/NvrXnlYxeECIONrmQSbK', 0, '0000-00-00 00:00:00'),
(15, 'elokalo', 'Luis Alfredo', '$2y$12$lPZM4a17zTZ9dVm5sKZxWOJxI3A/B0u6zP13z1wRmIT5BJS9jxL4W', 1, '2018-12-15 17:23:04'),
(16, 'paimon', 'Paimon', '$2y$12$ojhCeili0C/lm78EuO7jAOC0dr.PnywGGJGTxgtCSlTQSigK/GyXe', 0, '2018-12-15 16:16:46'),
(21, 'coloco', 'Aquiles Brinco', '$2y$12$rXoyI/uKs1JIgDVLtHjO9udzx7THLdvjVRtX/aoABTKTaR4kRoQkG', 1, '2018-12-15 17:07:42'),
(24, 'eli', 'Elisa', '$2y$12$4D1bjY4VMmVzDQE3JI7kFOUqAn3ovNPhip7R/QVj5v2NQk424RGym', 1, '2018-12-17 20:23:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_evento`
--

DROP TABLE IF EXISTS `categoria_evento`;
CREATE TABLE IF NOT EXISTS `categoria_evento` (
  `id_categoria` tinyint(10) NOT NULL AUTO_INCREMENT,
  `cat_evento` varchar(50) NOT NULL,
  `icono` varchar(25) NOT NULL,
  `editado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria_evento`
--

INSERT INTO `categoria_evento` (`id_categoria`, `cat_evento`, `icono`, `editado`) VALUES
(1, 'Seminarios', 'fa fa-university', '2018-12-17 20:17:05'),
(2, 'Conferencias', 'fa fa-comment', '2018-12-17 20:17:05'),
(3, 'Talleres', 'fa fa-code', '2018-12-17 20:17:05'),
(4, 'Mentorías', 'fas fa-address-card', '2018-12-17 20:17:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

DROP TABLE IF EXISTS `eventos`;
CREATE TABLE IF NOT EXISTS `eventos` (
  `evento_id` tinyint(10) NOT NULL AUTO_INCREMENT,
  `nombre_evento` varchar(80) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `fecha_evento` date NOT NULL,
  `hora_evento` time NOT NULL,
  `id_cat_evento` tinyint(10) NOT NULL,
  `id_inv` tinyint(4) NOT NULL,
  `clave` varchar(10) DEFAULT NULL,
  `editado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`evento_id`),
  KEY `id_cat_evento` (`id_cat_evento`),
  KEY `id_inv` (`id_inv`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `id_cat_evento`, `id_inv`, `clave`, `editado`) VALUES
(1, 'Responsive Web Design', '2016-12-09', '10:00:00', 3, 1, 'taller_01', '2018-12-18 20:24:27'),
(2, 'Flexbox', '2016-12-09', '12:00:00', 3, 2, 'taller_02', '0000-00-00 00:00:00'),
(3, 'HTML5 y CSS3', '2016-12-09', '14:00:00', 3, 3, 'taller_03', '0000-00-00 00:00:00'),
(4, 'Drupal', '2016-12-09', '17:00:00', 3, 4, 'taller_04', '0000-00-00 00:00:00'),
(5, 'WordPress', '2016-12-09', '19:00:00', 3, 5, 'taller_05', '0000-00-00 00:00:00'),
(6, 'Como ser freelancer', '2016-12-09', '10:00:00', 2, 6, 'conf_01', '0000-00-00 00:00:00'),
(7, 'Tecnologías del Futuro', '2016-12-09', '17:00:00', 2, 1, 'conf_02', '0000-00-00 00:00:00'),
(8, 'Seguridad en la Web', '2016-12-09', '19:00:00', 2, 2, 'conf_03', '0000-00-00 00:00:00'),
(9, 'Diseño UI y UX para móviles', '2016-12-09', '10:00:00', 1, 6, 'sem_01', '0000-00-00 00:00:00'),
(10, 'AngularJS', '2016-12-10', '10:00:00', 3, 1, 'taller_06', '0000-00-00 00:00:00'),
(11, 'PHP y MySQL', '2016-12-10', '12:00:00', 3, 2, 'taller_07', '0000-00-00 00:00:00'),
(12, 'JavaScript Avanzado', '2016-12-10', '14:00:00', 3, 3, 'taller_08', '0000-00-00 00:00:00'),
(13, 'SEO en Google', '2016-12-10', '17:00:00', 3, 4, 'taller_09', '0000-00-00 00:00:00'),
(14, 'De Photoshop a HTML5 y CSS3', '2016-12-10', '19:00:00', 3, 5, 'taller_10', '0000-00-00 00:00:00'),
(15, 'PHP Intermedio y Avanzado', '2016-12-10', '21:00:00', 3, 6, 'taller_11', '0000-00-00 00:00:00'),
(16, 'Como crear una tienda online que venda millones en pocos dí­as', '2016-12-10', '10:00:00', 2, 6, 'conf_04', '0000-00-00 00:00:00'),
(17, 'Los mejores lugares para encontrar trabajo', '2016-12-10', '17:00:00', 2, 1, 'conf_05', '0000-00-00 00:00:00'),
(18, 'Pasos para crear un negocio rentable ', '2016-12-10', '19:00:00', 2, 2, 'conf_06', '0000-00-00 00:00:00'),
(19, 'Aprende a Programar en una mañana', '2016-12-10', '10:00:00', 1, 3, 'sem_02', '0000-00-00 00:00:00'),
(20, 'Diseño UI y UX para móviles', '2016-12-10', '17:00:00', 1, 5, 'sem_03', '0000-00-00 00:00:00'),
(21, 'Laravel', '2016-12-11', '10:00:00', 3, 1, 'taller_12', '0000-00-00 00:00:00'),
(22, 'Crea tu propia API', '2016-12-11', '12:00:00', 3, 2, 'taller_13', '0000-00-00 00:00:00'),
(23, 'JavaScript y jQuery', '2016-12-11', '14:00:00', 3, 3, 'taller_14', '0000-00-00 00:00:00'),
(24, 'Creando Plantillas para WordPress', '2016-12-11', '17:00:00', 3, 4, 'taller_15', '0000-00-00 00:00:00'),
(25, 'Tiendas Virtuales en Magento', '2016-12-11', '19:00:00', 3, 5, 'taller_16', '0000-00-00 00:00:00'),
(26, 'Como hacer Marketing en línea', '2016-12-11', '10:00:00', 2, 6, 'conf_07', '0000-00-00 00:00:00'),
(27, '¿Con que lenguaje debo empezar?', '2016-12-11', '17:00:00', 2, 2, 'conf_08', '0000-00-00 00:00:00'),
(28, 'Frameworks y librerias Open Source', '2016-12-11', '19:00:00', 2, 3, 'conf_09', '0000-00-00 00:00:00'),
(29, 'Creando una App en Android en una mañana', '2016-12-11', '10:00:00', 1, 4, 'sem_04', '0000-00-00 00:00:00'),
(30, 'Creando una App en iOS en una tarde', '2016-12-11', '17:00:00', 1, 1, 'sem_05', '0000-00-00 00:00:00'),
(31, 'Angular 5', '2016-12-11', '12:00:00', 3, 5, 'null', '2018-12-17 20:27:38'),
(34, 'SQL Avanzado', '2016-12-09', '13:00:00', 1, 2, 'null', '0000-00-00 00:00:00'),
(35, 'Git y Github', '2016-12-09', '11:00:00', 4, 7, NULL, NULL),
(36, 'GNU Linux', '2016-12-10', '11:00:00', 4, 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invitados`
--

DROP TABLE IF EXISTS `invitados`;
CREATE TABLE IF NOT EXISTS `invitados` (
  `invitado_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nombre_invitado` varchar(30) NOT NULL,
  `apellido_invitado` varchar(30) NOT NULL,
  `descripcion` text NOT NULL,
  `url_imagen` varchar(50) NOT NULL,
  PRIMARY KEY (`invitado_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `invitados`
--

INSERT INTO `invitados` (`invitado_id`, `nombre_invitado`, `apellido_invitado`, `descripcion`, `url_imagen`) VALUES
(1, 'Rafael', 'Bautista', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'invitado1.jpg'),
(2, 'Shari', 'Herrera', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'invitado2.jpg'),
(3, 'Gregorio', 'Sanchez', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'invitado3.jpg'),
(4, 'Susana', 'Rivera', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'invitado4.jpg'),
(5, 'Harold', 'Garcia', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'invitado5.jpg'),
(6, 'Susan', 'Sanchez', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'invitado6.jpg'),
(7, 'Luis Alfredo', 'Cortés', 'mi biografia personal', 'foto_diploma_2.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regalos`
--

DROP TABLE IF EXISTS `regalos`;
CREATE TABLE IF NOT EXISTS `regalos` (
  `id_regalo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_regalo` varchar(50) NOT NULL,
  PRIMARY KEY (`id_regalo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `regalos`
--

INSERT INTO `regalos` (`id_regalo`, `nombre_regalo`) VALUES
(1, 'Pulsera'),
(2, 'Etiquetas'),
(3, 'Plumas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrados`
--

DROP TABLE IF EXISTS `registrados`;
CREATE TABLE IF NOT EXISTS `registrados` (
  `id_registrado` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_registrado` varchar(50) NOT NULL,
  `apellido_registrado` varchar(50) NOT NULL,
  `email_registrado` varchar(100) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `pases_articulos` longtext NOT NULL,
  `talleres_registrados` longtext NOT NULL,
  `regalo` int(11) NOT NULL,
  `total_pagado` varchar(50) NOT NULL,
  `pagado` int(1) NOT NULL DEFAULT '0',
  `fecha_edicion` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_registrado`),
  KEY `regalo` (`regalo`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `registrados`
--

INSERT INTO `registrados` (`id_registrado`, `nombre_registrado`, `apellido_registrado`, `email_registrado`, `fecha_registro`, `pases_articulos`, `talleres_registrados`, `regalo`, `total_pagado`, `pagado`, `fecha_edicion`) VALUES
(1, 'Luis Alfredo', 'Cortes', 'elokalo@hotmail.com', '2018-12-19 18:47:45', '{\"un_dia\":0,\"pase_completo\":1,\"dos_dias\":0,\"camisas\":1,\"etiquetas\":1}', '{\"eventos\":[\"34\",\"6\",\"7\",\"8\",\"2\",\"3\",\"10\",\"11\",\"12\",\"13\",\"14\",\"15\",\"26\",\"27\",\"28\"]}', 1, '61.3', 0, NULL),
(2, 'Eduardo', 'Berdel', 'berdeleduardo@gmail.com', '2018-12-19 19:04:29', '{\"un_dia\":2,\"pase_completo\":0,\"dos_dias\":0,\"camisas\":3,\"etiquetas\":3}', '{\"eventos\":[\"34\",\"6\",\"7\",\"8\",\"2\"]}', 3, '93.9', 1, '2018-12-20 16:35:36'),
(3, 'Alfredo', 'Cortes', 'luisalfredo@netcloudservices.mx', '2018-12-20 09:36:49', '{\"un_dia\":1,\"pase_completo\":0,\"dos_dias\":0}', '{\"eventos\":[\"6\",\"7\",\"8\"]}', 1, '30', 1, NULL),
(6, 'Aquiles', 'Brinco', 'correo@gmail.com', '2018-12-21 12:39:16', '{\"un_dia\":0,\"pase_completo\":0,\"dos_dias\":1,\"camisas\":3}', '{\"eventos\":[\"9\",\"34\",\"16\",\"17\",\"18\"]}', 2, '72.9', 1, NULL),
(7, 'Ejemplo', 'Numero', '', '2018-12-18 13:15:03', '{\"un_dia\":1,\"pase_completo\":0,\"dos_dias\":0,\"camisas\":2,\"etiquetas\":2}', '{\"eventos\":[\"1\",\"2\",\"3\",\"4\"]}', 1, '52.6', 1, NULL),
(8, 'Kakashi', 'Hatake', 'correo@gmail.com', '2018-12-20 16:20:57', '{\"un_dia\":0,\"pase_completo\":0,\"dos_dias\":1,\"camisas\":2}', '{\"eventos\":[\"34\",\"6\",\"7\",\"8\",\"35\",\"10\",\"11\",\"12\",\"13\",\"36\"]}', 2, '63.6', 1, '2018-12-20 22:22:42');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`id_cat_evento`) REFERENCES `categoria_evento` (`id_categoria`),
  ADD CONSTRAINT `eventos_ibfk_2` FOREIGN KEY (`id_inv`) REFERENCES `invitados` (`invitado_id`);

--
-- Filtros para la tabla `registrados`
--
ALTER TABLE `registrados`
  ADD CONSTRAINT `registrados_ibfk_1` FOREIGN KEY (`regalo`) REFERENCES `regalos` (`id_regalo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
