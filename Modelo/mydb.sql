-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 10-11-2022 a las 23:04:59
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mydb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

DROP TABLE IF EXISTS `citas`;
CREATE TABLE IF NOT EXISTS `citas` (
  `id_citas` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `id_tipo_citas` int(11) NOT NULL,
  `id_mascota` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  PRIMARY KEY (`id_citas`),
  KEY `fk_Citas_Tipo_citas1_idx` (`id_tipo_citas`),
  KEY `fk_Citas_Mascota1_idx` (`id_mascota`),
  KEY `fk_Citas_Estado1_idx` (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

DROP TABLE IF EXISTS `estado`;
CREATE TABLE IF NOT EXISTS `estado` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `nombre`) VALUES
(1, 'inactivo'),
(2, 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascota`
--

DROP TABLE IF EXISTS `mascota`;
CREATE TABLE IF NOT EXISTS `mascota` (
  `id_mascota` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `edad` int(11) NOT NULL,
  `raza` varchar(45) NOT NULL,
  `color` varchar(45) NOT NULL,
  `id_tipo_animal` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_mascota`),
  KEY `fk_Mascota_Tipo_animal1_idx` (`id_tipo_animal`),
  KEY `fk_Mascota_Estado1_idx` (`id_estado`),
  KEY `fk_Mascota_Usuario1_idx` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_animal`
--

DROP TABLE IF EXISTS `tipo_animal`;
CREATE TABLE IF NOT EXISTS `tipo_animal` (
  `id_tipo_animal` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_tipo_animal`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_animal`
--

INSERT INTO `tipo_animal` (`id_tipo_animal`, `nombre`) VALUES
(1, 'perro'),
(2, 'gato'),
(3, 'loro'),
(4, 'pez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_citas`
--

DROP TABLE IF EXISTS `tipo_citas`;
CREATE TABLE IF NOT EXISTS `tipo_citas` (
  `id_tipo_citas` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_tipo_citas`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_citas`
--

INSERT INTO `tipo_citas` (`id_tipo_citas`, `nombre`) VALUES
(1, 'corte de pelo'),
(2, 'vacuna'),
(5, 'revision'),
(7, 'cirugia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
CREATE TABLE IF NOT EXISTS `tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_tipo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo_usuario`, `nombre`) VALUES
(1, 'admin'),
(2, 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `contrasena` varchar(45) NOT NULL,
  `id_tipo_usuario` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `fk_Usuario_Tipo_usuario1_idx` (`id_tipo_usuario`),
  KEY `fk_Usuario_Estado1_idx` (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `correo`, `contrasena`, `id_tipo_usuario`, `id_estado`) VALUES
(6, 'admin', 'admin@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 2);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `fk_Citas_Estado1` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Citas_Mascota1` FOREIGN KEY (`id_mascota`) REFERENCES `mascota` (`id_mascota`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Citas_Tipo_citas1` FOREIGN KEY (`id_tipo_citas`) REFERENCES `tipo_citas` (`id_tipo_citas`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD CONSTRAINT `fk_Mascota_Estado1` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Mascota_Tipo_animal1` FOREIGN KEY (`id_tipo_animal`) REFERENCES `tipo_animal` (`id_tipo_animal`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Mascota_Usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_Usuario_Estado1` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Usuario_Tipo_usuario1` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
