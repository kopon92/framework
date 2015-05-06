-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-05-2015 a las 22:46:47
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `agency`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `advertise`
--

CREATE TABLE IF NOT EXISTS `advertise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `desc` text,
  `users_id` int(11) NOT NULL,
  `foto1` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `advertise_users` (`users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL,
  `tipo` char(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hotels`
--

CREATE TABLE IF NOT EXISTS `hotels` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `ciutat` varchar(25) DEFAULT NULL,
  `categoria` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categoria` (`categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagaments`
--

CREATE TABLE IF NOT EXISTS `pagaments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idreserva` int(11) DEFAULT NULL,
  `pagament_quant` decimal(8,2) DEFAULT NULL,
  `pagament_data` date DEFAULT NULL,
  `tipus` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idreserva` (`idreserva`),
  KEY `tipus` (`tipus`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plans`
--

CREATE TABLE IF NOT EXISTS `plans` (
  `id` int(11) NOT NULL,
  `descrip` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserves`
--

CREATE TABLE IF NOT EXISTS `reserves` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `idusuari` int(11) DEFAULT NULL,
  `status` varchar(15) NOT NULL,
  `preu` decimal(8,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idusuari` (`idusuari`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rols`
--

CREATE TABLE IF NOT EXISTS `rols` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descrip` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `rols`
--

INSERT INTO `rols` (`id`, `descrip`) VALUES
(1, 'Admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `serveis`
--

CREATE TABLE IF NOT EXISTS `serveis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nplaces` int(11) NOT NULL,
  `preu` decimal(8,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `serveis_reservats`
--

CREATE TABLE IF NOT EXISTS `serveis_reservats` (
  `idservei` int(11) NOT NULL DEFAULT '0',
  `idreserva` int(11) NOT NULL DEFAULT '0',
  `data_inicial` date DEFAULT NULL,
  `data_final` date DEFAULT NULL,
  PRIMARY KEY (`idservei`,`idreserva`),
  KEY `idreserva` (`idreserva`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `sessions_users` (`users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipus_pagament`
--

CREATE TABLE IF NOT EXISTS `tipus_pagament` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipus` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `password`) VALUES
(1, 'admin', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuaris`
--

CREATE TABLE IF NOT EXISTS `usuaris` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `cognoms` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `idrol` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idrol` (`idrol`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `usuaris`
--

INSERT INTO `usuaris` (`id`, `nom`, `cognoms`, `email`, `password`, `idrol`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 1),
(10, 'a', 'a', 'a', 'a', NULL),
(12, 'eeee', 'eeeeeee', 'eeeee', 'eeeeee', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vols`
--

CREATE TABLE IF NOT EXISTS `vols` (
  `id` int(11) NOT NULL,
  `dest` varchar(25) NOT NULL,
  `aeroport` varchar(25) DEFAULT NULL,
  `codi_aeri` char(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `advertise`
--
ALTER TABLE `advertise`
  ADD CONSTRAINT `advertise_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `hotels`
--
ALTER TABLE `hotels`
  ADD CONSTRAINT `hotels_ibfk_1` FOREIGN KEY (`id`) REFERENCES `serveis` (`id`),
  ADD CONSTRAINT `hotels_ibfk_2` FOREIGN KEY (`categoria`) REFERENCES `categories` (`id`);

--
-- Filtros para la tabla `pagaments`
--
ALTER TABLE `pagaments`
  ADD CONSTRAINT `pagaments_ibfk_1` FOREIGN KEY (`idreserva`) REFERENCES `reserves` (`id`),
  ADD CONSTRAINT `pagaments_ibfk_2` FOREIGN KEY (`tipus`) REFERENCES `tipus_pagament` (`id`);

--
-- Filtros para la tabla `plans`
--
ALTER TABLE `plans`
  ADD CONSTRAINT `plans_ibfk_1` FOREIGN KEY (`id`) REFERENCES `serveis` (`id`);

--
-- Filtros para la tabla `reserves`
--
ALTER TABLE `reserves`
  ADD CONSTRAINT `reserves_ibfk_1` FOREIGN KEY (`idusuari`) REFERENCES `usuaris` (`id`);

--
-- Filtros para la tabla `serveis_reservats`
--
ALTER TABLE `serveis_reservats`
  ADD CONSTRAINT `serveis_reservats_ibfk_1` FOREIGN KEY (`idservei`) REFERENCES `serveis` (`id`),
  ADD CONSTRAINT `serveis_reservats_ibfk_2` FOREIGN KEY (`idreserva`) REFERENCES `reserves` (`id`);

--
-- Filtros para la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `usuaris`
--
ALTER TABLE `usuaris`
  ADD CONSTRAINT `usuaris_ibfk_1` FOREIGN KEY (`idrol`) REFERENCES `rols` (`id`);

--
-- Filtros para la tabla `vols`
--
ALTER TABLE `vols`
  ADD CONSTRAINT `vols_ibfk_1` FOREIGN KEY (`id`) REFERENCES `serveis` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
