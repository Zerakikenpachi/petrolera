-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2018 a las 17:19:06
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `petrolera`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idpersona` int(11) NOT NULL,
  `cedula_persona` varchar(10) NOT NULL,
  `nombre_persona` varchar(90) NOT NULL,
  `cargo_persona` varchar(30) NOT NULL,
  `correo_persona` varchar(120) NOT NULL,
  `fecha_ingreso` varchar(45) NOT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `contrasena` varchar(45) DEFAULT NULL,
  `rol` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idpersona`, `cedula_persona`, `nombre_persona`, `cargo_persona`, `correo_persona`, `fecha_ingreso`, `usuario`, `contrasena`, `rol`) VALUES
(7, '1040555', 'Luis Angel', 'cualquiera', 'dasdasda@fsdfs.com', '11/20/2018', 'luis', 'luis', 'Administrador de Reportes'),
(8, '1040111', 'Victor Mercado', 'alguno por ahí', 'victor@oil.com', '11/13/2018', 'victor', 'victor', 'Proveedor'),
(9, '1040222', 'David Quinto', 'jum ni se', 'david@oil.com', '11/27/2018', 'david', 'david', 'Empleado'),
(10, '1040333', 'Luisa Arboleda', 'no se', 'luisa@oil.com', '11/21/2018', 'luisa', 'luisa', 'Administrador de Reportes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prueba_reporte`
--

CREATE TABLE `prueba_reporte` (
  `idprueba_reporte` int(11) NOT NULL,
  `id_reporte_incidente` int(11) DEFAULT NULL,
  `tipo` varchar(100) DEFAULT NULL,
  `contenido` longblob,
  `nombre` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `prueba_reporte`
--

INSERT INTO `prueba_reporte` (`idprueba_reporte`, `id_reporte_incidente`, `tipo`, `contenido`, `nombre`) VALUES
(32, 15, 'text/plain', 0x4573746520657320656c207265706f727465206465204c7569730d0a0d0a7365206361793f20706f7220626f626f, 'Reporte de Luis.txt');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_incidente`
--

CREATE TABLE `reporte_incidente` (
  `id_reporte_incidente` int(11) NOT NULL,
  `nombre_reportero` varchar(90) NOT NULL,
  `cedula_reportero` varchar(10) NOT NULL,
  `fecha_reporte` varchar(45) NOT NULL,
  `nombre_pers_impl` varchar(90) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `tipo_incidente` varchar(60) NOT NULL,
  `categoria_incidente` varchar(60) NOT NULL,
  `cedula_implicado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reporte_incidente`
--

INSERT INTO `reporte_incidente` (`id_reporte_incidente`, `nombre_reportero`, `cedula_reportero`, `fecha_reporte`, `nombre_pers_impl`, `descripcion`, `tipo_incidente`, `categoria_incidente`, `cedula_implicado`) VALUES
(15, 'Luis Angel', '1040555', '11/22/2018', 'Luis Angel', 'me caí de la silla', 'accidente', 'Medio', '1040111');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idpersona`),
  ADD UNIQUE KEY `cedula_persona_UNIQUE` (`cedula_persona`);

--
-- Indices de la tabla `prueba_reporte`
--
ALTER TABLE `prueba_reporte`
  ADD PRIMARY KEY (`idprueba_reporte`),
  ADD KEY `reporte_prueba_idx` (`id_reporte_incidente`);

--
-- Indices de la tabla `reporte_incidente`
--
ALTER TABLE `reporte_incidente`
  ADD PRIMARY KEY (`id_reporte_incidente`),
  ADD KEY `reporte_persona_idx` (`cedula_reportero`),
  ADD KEY `reporte_implicado_idx` (`cedula_implicado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idpersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `prueba_reporte`
--
ALTER TABLE `prueba_reporte`
  MODIFY `idprueba_reporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT de la tabla `reporte_incidente`
--
ALTER TABLE `reporte_incidente`
  MODIFY `id_reporte_incidente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `prueba_reporte`
--
ALTER TABLE `prueba_reporte`
  ADD CONSTRAINT `reporte_prueba` FOREIGN KEY (`id_reporte_incidente`) REFERENCES `reporte_incidente` (`id_reporte_incidente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `reporte_incidente`
--
ALTER TABLE `reporte_incidente`
  ADD CONSTRAINT `reporte_implicado` FOREIGN KEY (`cedula_implicado`) REFERENCES `persona` (`cedula_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `reporte_persona` FOREIGN KEY (`cedula_reportero`) REFERENCES `persona` (`cedula_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
