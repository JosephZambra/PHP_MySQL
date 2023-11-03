-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-11-2023 a las 01:49:09
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
-- Base de datos: `crm_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito_usuario`
--

CREATE TABLE `carrito_usuario` (
  `id_CarritoUsuario` int(11) NOT NULL,
  `id_SessionUsuario` varchar(255) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `valor` float DEFAULT NULL,
  `comprado` varchar(2) DEFAULT NULL,
  `id_venta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carrito_usuario`
--

INSERT INTO `carrito_usuario` (`id_CarritoUsuario`, `id_SessionUsuario`, `id_usuario`, `id_producto`, `cantidad`, `valor`, `comprado`, `id_venta`) VALUES
(24, '1h8p76clf1hb0n2odeo7kaiq6a', 1111, 5, 1, 7000000, 'SI', 1),
(25, '1h8p76clf1hb0n2odeo7kaiq6a', 1111, 3, 1, 12000000, 'SI', 1),
(26, '1h8p76clf1hb0n2odeo7kaiq6a', 1111, 1, 1, 1200, 'SI', 2),
(29, 'dnjeh3dar7mdidburhi5khjonf', 12345, 4, 1, 5000000, 'SI', 3),
(30, 'dnjeh3dar7mdidburhi5khjonf', 12345, 5, 1, 7000000, 'SI', 3),
(31, 'dnjeh3dar7mdidburhi5khjonf', 12345, 3, 1, 12000000, 'SI', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase_producto`
--

CREATE TABLE `clase_producto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clase_producto`
--

INSERT INTO `clase_producto` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Aplicativo', 'Aplicacion de seguridad'),
(2, 'Base de Datos', 'Gestor de base de datos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos_clientes`
--

CREATE TABLE `contactos_clientes` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `servicio` varchar(20) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `registro_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `contactos_clientes`
--

INSERT INTO `contactos_clientes` (`id`, `usuario_id`, `fecha`, `hora`, `tipo`, `servicio`, `descripcion`, `registro_id`) VALUES
(11, 1234567, '2021-02-02', '10:57:00', 'VISITA', 'INQUIETUD', 'Inquietud sobre las instalaciones previamente realizadas.', 77);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `clase` int(11) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `imagen` varchar(120) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `cantidad`, `clase`, `precio`, `estado`, `fecha_creacion`, `id_usuario`, `imagen`) VALUES
(1, 'Prueba1', 'Prueba de registro de producto', 2, 2, 1200, 'ACTIVO', '2023-10-18', 1, ''),
(3, 'Software', 'Software para la gestión de empleados.', 5, 1, 12000000, 'ACTIVO', '2023-11-01', 1111, ''),
(4, 'Servidor', 'Servidor para gestionar el inventario.', 7, 1, 5000000, 'ACTIVO', '2023-11-01', 1111, ''),
(5, 'Servidor en la nube', 'Servidor con base de datos en la nube para gestionar inventario', 11, 2, 7000000, 'ACTIVO', '2023-11-01', 1111, ''),
(6, 'Servidor2', 'Servidor para gestionar el inventario2.', 2, 2, 20000000, 'ACTIVO', '2023-11-01', 1111, 'Servidor_Base_de_datos.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuarios`
--

CREATE TABLE `tipo_usuarios` (
  `codigo_tip` int(11) NOT NULL DEFAULT 0,
  `nombre_tip` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_usuarios`
--

INSERT INTO `tipo_usuarios` (`codigo_tip`, `nombre_tip`) VALUES
(1, 'Administrador'),
(2, 'Usuario'),
(0, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `documento` int(11) DEFAULT NULL,
  `nombre` varchar(150) DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `correo` varchar(75) DEFAULT NULL,
  `fecha_n` date DEFAULT NULL,
  `imagen_perfil` varchar(150) DEFAULT '',
  `estado` varchar(20) DEFAULT NULL,
  `tipo_usuario` int(11) DEFAULT NULL,
  `usuario_pass` varchar(250) DEFAULT NULL,
  `fecha_c` date DEFAULT NULL,
  `apellidos` varchar(150) DEFAULT NULL,
  `serv_cliente` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `documento`, `nombre`, `direccion`, `telefono`, `correo`, `fecha_n`, `imagen_perfil`, `estado`, `tipo_usuario`, `usuario_pass`, `fecha_c`, `apellidos`, `serv_cliente`) VALUES
(15, 1111, 'Prueba', 'carrera 1 usuario 2 #23-24', 1234567890, 'usuario1@correo.com', '2020-10-31', '', 'ACTIVO', 1, '$2y$10$vGv7gt7Kn7dioTbqysr4a.2nvcpDO4bLUIYEb5psTPNmELJp9DZpq', '2023-11-01', 'Usuario', 'NO'),
(18, 77, 'Luka', 'carrera 1 usuario 2 #23-24', 123456789, 'luka@gmail.com', '2001-09-27', '', 'ACTIVO', 1, '$2y$10$va.x1W2WMt1Ldk.ZHCmVSuBFvgtN27TyQBoG5qWLstLvhxyace1ga', '2023-11-02', 'Alberto', 'SI'),
(19, 12345, 'Cliente 1', 'carrera 1 usuario 2 #23-24', 2345613, 'cliente@gmail.com', '1999-01-04', '', 'ACTIVO', 0, '$2y$10$QyDN0DddrFbl9ag1FGRSWO2DYEtAdi7TdwRIrvfxoM5c279Bz8wYG', '2023-11-02', 'Apellido Cliente', 'SI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_session` varchar(150) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `total_venta` float DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `id_usuario`, `id_session`, `cantidad`, `total_venta`, `fecha`, `hora`) VALUES
(1, 1111, '1h8p76clf1hb0n2odeo7kaiq6a', 2, 19000000, '2023-11-02', '16:28:22'),
(2, 1111, '1h8p76clf1hb0n2odeo7kaiq6a', 1, 1200, '2023-11-02', '16:28:47'),
(3, 12345, 'dnjeh3dar7mdidburhi5khjonf', 3, 24000000, '2023-11-02', '19:29:30');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito_usuario`
--
ALTER TABLE `carrito_usuario`
  ADD PRIMARY KEY (`id_CarritoUsuario`);

--
-- Indices de la tabla `clase_producto`
--
ALTER TABLE `clase_producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contactos_clientes`
--
ALTER TABLE `contactos_clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `documento` (`documento`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito_usuario`
--
ALTER TABLE `carrito_usuario`
  MODIFY `id_CarritoUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `clase_producto`
--
ALTER TABLE `clase_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `contactos_clientes`
--
ALTER TABLE `contactos_clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
