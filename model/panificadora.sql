-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-09-2022 a las 20:42:52
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `panificadora`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumos`
--

CREATE TABLE `insumos` (
  `id_ins` int(10) UNSIGNED NOT NULL COMMENT 'Id del insumo',
  `des_ins` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Descripción del insumo',
  `id_uni` int(10) UNSIGNED NOT NULL COMMENT 'Id de la unidad de medida',
  `exi_min` smallint(5) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Existencia mínima',
  `exi_max` smallint(5) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Existencia máxima',
  `can_disp` smallint(5) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Cantidad disponible'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla que contiene información de los insumos utilizados';

--
-- Volcado de datos para la tabla `insumos`
--

INSERT INTO `insumos` (`id_ins`, `des_ins`, `id_uni`, `exi_min`, `exi_max`, `can_disp`) VALUES
(32, 'HARINA DE TRIGO', 21, 10, 80, 50),
(33, 'CHOCOLATE', 21, 10, 80, 50),
(36, 'NARANJA', 21, 10, 20, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `panes`
--

CREATE TABLE `panes` (
  `id_pan` int(10) UNSIGNED NOT NULL COMMENT 'Id del pan',
  `des_pan` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Descripción del pan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla que contiene la información de los panes';

--
-- Volcado de datos para la tabla `panes`
--

INSERT INTO `panes` (`id_pan`, `des_pan`) VALUES
(53, 'SALADO'),
(54, 'AZUCARADO'),
(55, 'PAN DE TRIGO'),
(56, 'CAMALEON'),
(58, 'PAN DE BIGO'),
(59, 'PAN DE GLUTEN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `panes_insumos`
--

CREATE TABLE `panes_insumos` (
  `id_panins` int(10) UNSIGNED NOT NULL COMMENT 'Id del registro',
  `id_pan` int(10) UNSIGNED NOT NULL COMMENT 'Id del pan',
  `id_ins` int(10) UNSIGNED NOT NULL COMMENT 'Id del insumo',
  `can_ins` decimal(20,2) UNSIGNED NOT NULL DEFAULT 0.00 COMMENT 'Cantidad utilizada del insumo',
  `id_uni` int(10) UNSIGNED NOT NULL COMMENT 'Unidad de medida'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla que contiene información de los insumos utilizados para elaborar un tipo de pan específico';

--
-- Volcado de datos para la tabla `panes_insumos`
--

INSERT INTO `panes_insumos` (`id_panins`, `id_pan`, `id_ins`, `can_ins`, `id_uni`) VALUES
(26, 53, 33, '10.00', 20),
(27, 53, 33, '5.00', 21),
(28, 56, 32, '12.00', 21),
(29, 55, 33, '2.00', 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tandas`
--

CREATE TABLE `tandas` (
  `id_tan` int(10) UNSIGNED NOT NULL COMMENT 'Id de la tanda',
  `fec_tan` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha de elaboración',
  `id_pan` int(10) UNSIGNED NOT NULL COMMENT 'Id del pan',
  `can_pie` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Cantidad de piezas de la tanda'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla que contiene información de las tandas de pan a hornear';

--
-- Volcado de datos para la tabla `tandas`
--

INSERT INTO `tandas` (`id_tan`, `fec_tan`, `id_pan`, `can_pie`) VALUES
(19, '2022-08-31 14:32:00', 53, 10),
(20, '2022-09-08 19:12:00', 55, 16),
(22, '2022-09-15 14:40:00', 55, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidades`
--

CREATE TABLE `unidades` (
  `id_uni` int(10) UNSIGNED NOT NULL COMMENT 'Id de la unidad',
  `des_uni` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Descripción de la unidad'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla que contiene información de las unidades de medida';

--
-- Volcado de datos para la tabla `unidades`
--

INSERT INTO `unidades` (`id_uni`, `des_uni`) VALUES
(20, 'KILO'),
(21, 'GRAMO'),
(25, 'LITRO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `clave` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `email`, `clave`) VALUES
(22, 'yurimar', 'yurimar2003@gmail.com', '$2y$10$ppDMWzjuECXCR/7gQGO/je3gsFEl7pslOfsF3vwXtGIrXhMUPgeZO'),
(26, 'Santiago Guerrero', 'nearbore803@gmail.com', '$2y$10$inYl6WzezaEvzNPKjaYibOZACXR3nSe/q/dYi4MKlrVdXpPc/Abqe');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `insumos`
--
ALTER TABLE `insumos`
  ADD PRIMARY KEY (`id_ins`),
  ADD KEY `FK_insumos_unidades` (`id_uni`);

--
-- Indices de la tabla `panes`
--
ALTER TABLE `panes`
  ADD PRIMARY KEY (`id_pan`);

--
-- Indices de la tabla `panes_insumos`
--
ALTER TABLE `panes_insumos`
  ADD PRIMARY KEY (`id_panins`),
  ADD KEY `FK_panes_insumos_panes` (`id_pan`),
  ADD KEY `FK_panes_insumos_insumos` (`id_ins`),
  ADD KEY `FK_panes_insumos_unidades` (`id_uni`);

--
-- Indices de la tabla `tandas`
--
ALTER TABLE `tandas`
  ADD PRIMARY KEY (`id_tan`),
  ADD KEY `FK_tandas_panes` (`id_pan`);

--
-- Indices de la tabla `unidades`
--
ALTER TABLE `unidades`
  ADD PRIMARY KEY (`id_uni`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `insumos`
--
ALTER TABLE `insumos`
  MODIFY `id_ins` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Id del insumo', AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `panes`
--
ALTER TABLE `panes`
  MODIFY `id_pan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Id del pan', AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `panes_insumos`
--
ALTER TABLE `panes_insumos`
  MODIFY `id_panins` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Id del registro', AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `tandas`
--
ALTER TABLE `tandas`
  MODIFY `id_tan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Id de la tanda', AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `unidades`
--
ALTER TABLE `unidades`
  MODIFY `id_uni` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Id de la unidad', AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `insumos`
--
ALTER TABLE `insumos`
  ADD CONSTRAINT `FK_insumos_unidades` FOREIGN KEY (`id_uni`) REFERENCES `unidades` (`id_uni`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `panes_insumos`
--
ALTER TABLE `panes_insumos`
  ADD CONSTRAINT `FK_panes_insumos_insumos` FOREIGN KEY (`id_ins`) REFERENCES `insumos` (`id_ins`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_panes_insumos_panes` FOREIGN KEY (`id_pan`) REFERENCES `panes` (`id_pan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_panes_insumos_unidades` FOREIGN KEY (`id_uni`) REFERENCES `unidades` (`id_uni`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tandas`
--
ALTER TABLE `tandas`
  ADD CONSTRAINT `FK_tandas_panes` FOREIGN KEY (`id_pan`) REFERENCES `panes` (`id_pan`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
