-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-10-2023 a las 03:09:00
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `usuariosbd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `documento_per` varchar(15) NOT NULL,
  `nombre_per` varchar(30) NOT NULL,
  `apellido_per` varchar(30) NOT NULL,
  `fechanacimiento` date NOT NULL,
  `email_per` varchar(100) NOT NULL,
  `telefono_per` varchar(15) NOT NULL,
  `foto_per` varchar(100) NOT NULL,
  `estado_per` varchar(10) NOT NULL,
  `password_per` varchar(250) NOT NULL,
  `codigo_tip` int(11) NOT NULL,
  `codigo_sem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`documento_per`, `nombre_per`, `apellido_per`, `fechanacimiento`, `email_per`, `telefono_per`, `foto_per`, `estado_per`, `password_per`, `codigo_tip`, `codigo_sem`) VALUES
('1234567', 'Prueba1', 'Apellido', '2020-12-01', 'correo@correo.com', '777007', '', 'ACTIVO', '$2y$10$50Pdgkydhxay1UNuF9osnucgdMz4eXMbxgTClWpmMiUYWOxRqXpn2', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programas`
--

CREATE TABLE `programas` (
  `codigo_pro` int(11) NOT NULL,
  `nombre_pro` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `programas`
--

INSERT INTO `programas` (`codigo_pro`, `nombre_pro`) VALUES
(1, 'Sistemas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `semilleros`
--

CREATE TABLE `semilleros` (
  `codigo_sem` int(11) NOT NULL,
  `nombre_sem` varchar(150) NOT NULL,
  `fechacreacion_sem` date DEFAULT NULL,
  `estado_sem` varchar(25) DEFAULT NULL,
  `codigo_pro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `semilleros`
--

INSERT INTO `semilleros` (`codigo_sem`, `nombre_sem`, `fechacreacion_sem`, `estado_sem`, `codigo_pro`) VALUES
(1, 'Primer Semillero', '2023-10-03', 'ACTIVO', 1),
(2, 'Segundo Semillero', '2023-10-03', 'ACTIVO', 1),
(3, 'Tercer Semillero', '2023-10-03', 'ACTIVO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipopersonas`
--

CREATE TABLE `tipopersonas` (
  `codigo_tip` int(11) NOT NULL,
  `nombre_tip` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipopersonas`
--

INSERT INTO `tipopersonas` (`codigo_tip`, `nombre_tip`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`documento_per`),
  ADD KEY `codigo_tip` (`codigo_tip`),
  ADD KEY `codigo_sem` (`codigo_sem`);

--
-- Indices de la tabla `programas`
--
ALTER TABLE `programas`
  ADD PRIMARY KEY (`codigo_pro`);

--
-- Indices de la tabla `semilleros`
--
ALTER TABLE `semilleros`
  ADD PRIMARY KEY (`codigo_sem`),
  ADD KEY `codigo_pro` (`codigo_pro`);

--
-- Indices de la tabla `tipopersonas`
--
ALTER TABLE `tipopersonas`
  ADD PRIMARY KEY (`codigo_tip`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `programas`
--
ALTER TABLE `programas`
  MODIFY `codigo_pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `semilleros`
--
ALTER TABLE `semilleros`
  MODIFY `codigo_sem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipopersonas`
--
ALTER TABLE `tipopersonas`
  MODIFY `codigo_tip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `personas_ibfk_1` FOREIGN KEY (`codigo_tip`) REFERENCES `tipopersonas` (`codigo_tip`),
  ADD CONSTRAINT `personas_ibfk_2` FOREIGN KEY (`codigo_sem`) REFERENCES `semilleros` (`codigo_sem`);

--
-- Filtros para la tabla `semilleros`
--
ALTER TABLE `semilleros`
  ADD CONSTRAINT `semilleros_ibfk_1` FOREIGN KEY (`codigo_pro`) REFERENCES `programas` (`codigo_pro`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
