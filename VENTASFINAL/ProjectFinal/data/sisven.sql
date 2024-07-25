-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-07-2024 a las 21:08:35
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sisven`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `ruc` varchar(11) NOT NULL,
  `dircliente` varchar(64) NOT NULL,
  `telcliente` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idCliente`, `nombre`, `ruc`, `dircliente`, `telcliente`) VALUES
(2353, 'MARIA ROSAS', '3948549', 'TIABAYA', '987546324'),
(2354, 'JUAN ZAPATA', '375643939', 'PAUCARPATA', '987453621'),
(2355, 'MANUEL LEIVA', '9873643527', 'CERCADO', '987564345'),
(2356, 'ROSA CONDORI', '847563748', 'HUNTER', '987564233'),
(2357, 'MARIA TORRES', '986756435', 'AV. LIMA', '985647374'),
(2358, 'LAURA FUENTES', '869785849', 'AV. COLONIAL', '968746465'),
(2359, 'CAMILA PALOMINO', '968675844', 'CIUDAD BLANCA', '986534637'),
(2360, 'ANA HUAMAN', '867548493', 'AV. MARISCAL CASTILLA', '985764637'),
(2361, 'NICKI ESTRADA', '857576854', 'AV. COLOMBIA', '985768584'),
(2362, 'GUILLERMO SIFUENTES', '948589494', 'SOCABAYA', '957473882');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `idCompra` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `idProveedor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallecompras`
--

CREATE TABLE `detallecompras` (
  `idDetalleCompra` int(11) NOT NULL,
  `idCompra` int(11) DEFAULT NULL,
  `idProducto` int(11) DEFAULT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventas`
--

CREATE TABLE `detalleventas` (
  `idDetalleVenta` int(11) NOT NULL,
  `idVenta` int(11) DEFAULT NULL,
  `idProducto` int(11) DEFAULT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `idDocumento` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `num_actual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`idDocumento`, `nombre`, `num_actual`) VALUES
(1, 'FACTURA DE VENTA', 0),
(2, 'BOLETA DE VENTA', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `idEmpleado` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `telefono` varchar(9) DEFAULT NULL,
  `direccion` varchar(128) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`idEmpleado`, `nombre`, `telefono`, `direccion`, `usuario`, `password`) VALUES
(12356, 'YOJAN', '943567659', 'ATALAYA', 'yojan', '$2y$10$JMQuGsDWYVVIchPTLF0yGOX6joOtGe74RdrFkDlzng4ir95Q7h/By');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineas`
--

CREATE TABLE `lineas` (
  `idLinea` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `lineas`
--

INSERT INTO `lineas` (`idLinea`, `nombre`) VALUES
(1, 'ABARROTES'),
(2, 'LIMPIEZA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProducto` int(11) NOT NULL,
  `nomproducto` varchar(50) NOT NULL,
  `unimed` varchar(15) NOT NULL,
  `stock` int(11) NOT NULL,
  `preuni` decimal(10,4) NOT NULL,
  `cosuni` decimal(10,4) NOT NULL,
  `idLinea` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProducto`, `nomproducto`, `unimed`, `stock`, `preuni`, `cosuni`, `idLinea`) VALUES
(1, 'ARROZ EXTRA', 'KG', 100, '4.8000', '3.8000', 1),
(2, 'AZUCAR RUBIA', 'KG', 150, '170.0000', '155.0000', 2),
(3, 'ACEITE VEGETAL', 'LT', 150, '11.7000', '8.9000', NULL),
(4, 'ARROZ EXTRA SUPERIOR PAISANA', 'BOLSA 5 KG', 120, '23.8000', '18.5000', NULL),
(5, 'ACEITE VEGETAL PRIMOR PREMIUN', 'LT', 100, '12.5000', '10.5000', NULL),
(6, 'SOYA ', 'KG', 56, '4.0000', '3.5000', 3),
(7, 'HARINA PREPARADA BLANCA FLOR', 'KG', 120, '4.8000', '3.5000', NULL),
(8, 'ACEITE DE OLIVA IMPORTADO', 'LT', 120, '15.4000', '12.3000', NULL),
(9, 'MAZAMORRA ', 'G', 124, '3.6000', '4.0000', NULL),
(10, 'LECHE GLORIA', 'ML', 203, '3.5000', '3.3000', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `idProveedor` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `idLinea` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`idProveedor`, `nombre`, `idLinea`) VALUES
(0, 'JACK', 2),
(1, 'PEDRO ORTEGA', 2),
(2, 'JAVIER ESTEBAN', 2),
(3, 'JOSE', 2),
(6, 'JACK PEREDO VILCA', 1),
(7, 'MARIA ESTRADA', 2),
(8, 'CARLOS', 1),
(9, 'ESTABAN GARCIA', 2),
(10, 'JUAN TORRES', 1),
(11, 'XIMENA GRANDA', 2),
(12, 'LUIS TORRES', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmp2`
--

CREATE TABLE `tmp2` (
  `id` int(11) DEFAULT NULL,
  `idproducto` int(11) DEFAULT NULL,
  `unimed` varchar(10) DEFAULT NULL,
  `cant` decimal(5,2) DEFAULT NULL,
  `preuni` decimal(5,0) DEFAULT NULL,
  `cosuni` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `idVenta` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `idCliente` int(11) DEFAULT NULL,
  `idEmpleado` int(11) DEFAULT NULL,
  `idDocumento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`idVenta`, `fecha`, `idCliente`, `idEmpleado`, `idDocumento`) VALUES
(13, '0000-00-00', 2362, 0, 0),
(14, '0000-00-00', 2362, 0, 0),
(15, '0000-00-00', 2362, 0, 0),
(16, '0000-00-00', 2362, 0, 0),
(17, '0000-00-00', 2362, 0, 0),
(18, '0000-00-00', 2362, 0, 0),
(19, '0000-00-00', 2362, 0, 0),
(20, '2023-08-07', 2362, 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`idCompra`),
  ADD KEY `idProveedor` (`idProveedor`);

--
-- Indices de la tabla `detallecompras`
--
ALTER TABLE `detallecompras`
  ADD PRIMARY KEY (`idDetalleCompra`);

--
-- Indices de la tabla `detalleventas`
--
ALTER TABLE `detalleventas`
  ADD PRIMARY KEY (`idDetalleVenta`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`idDocumento`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`idEmpleado`);

--
-- Indices de la tabla `lineas`
--
ALTER TABLE `lineas`
  ADD PRIMARY KEY (`idLinea`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProducto`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`idProveedor`),
  ADD KEY `proveedores_ibfk_1` (`idLinea`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`idVenta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2363;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `idEmpleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12357;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `idVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`idProveedor`) REFERENCES `proveedores` (`idProveedor`);

--
-- Filtros para la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD CONSTRAINT `proveedores_ibfk_1` FOREIGN KEY (`idLinea`) REFERENCES `lineas` (`idLinea`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
