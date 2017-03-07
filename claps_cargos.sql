-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 07-03-2017 a las 16:15:44
-- Versión del servidor: 5.5.49-0+deb8u1
-- Versión de PHP: 5.6.27-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `CADIP2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `claps_cargos`
--

CREATE TABLE IF NOT EXISTS `claps_cargos` (
`id` int(255) NOT NULL,
  `cargo` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `claps_cargos`
--

INSERT INTO `claps_cargos` (`id`, `cargo`) VALUES
(1, 'Lider de Comunidad'),
(2, 'UBCH'),
(3, 'Una Mujer'),
(4, 'Frente Francisco de Miranda'),
(5, 'Lider Consejo COmunal'),
(6, 'Milicia');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `claps_cargos`
--
ALTER TABLE `claps_cargos`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `claps_cargos`
--
ALTER TABLE `claps_cargos`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
