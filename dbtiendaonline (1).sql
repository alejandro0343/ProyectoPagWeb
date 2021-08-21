-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-08-2021 a las 22:12:39
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbtiendaonline`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_and_return_inventario` (IN `cantidad` INT, IN `nombre_producto` VARCHAR(25), IN `precio` DECIMAL(6,3), IN `fk_usuario` INT, IN `img_producto` VARCHAR(200), OUT `numero` INT)  BEGIN
INSERT INTO inventario VALUES(
        null,
    	cantidad,
    nombre_producto,
        precio,
        fk_usuario,
        img_producto
    );
    
    SELECT COUNT(pk_inventario) INTO numero FROM inventario;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Add_inventario` (IN `cantidad` INT, IN `nombre_producto` INT, IN `precio` INT, IN `fk_usuario` INT, IN `img_producto` INT)  BEGIN
INSERT INTO inventario VALUES(
        null,
    cantidad,
    nombre_producto,
        precio,
        fk_usuario,
        img_producto
    );
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `pk_carrito` int(11) NOT NULL,
  `fk_usuario` int(11) DEFAULT NULL,
  `fk_producto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`pk_carrito`, `fk_usuario`, `fk_producto`) VALUES
(1, 20, 1),
(2, 20, 1),
(3, 20, 1),
(11, 26, 1),
(12, 26, 1),
(13, 26, 1),
(14, 34, 8),
(15, 1, 24),
(16, 26, 32),
(17, 1, 32),
(18, 1, 32),
(19, 1, 33),
(20, 1, 32),
(21, 1, 32),
(22, 1, 32),
(23, 1, 32);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `pk_categorias` int(11) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`pk_categorias`, `descripcion`) VALUES
(1, 'ropa mujer'),
(2, 'ropa hombre'),
(3, 'accesorios mujer'),
(4, 'accesorios hombre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `pk_compra` int(11) NOT NULL,
  `fecha` datetime DEFAULT current_timestamp(),
  `precio_total` decimal(6,3) DEFAULT NULL,
  `descuento` decimal(6,3) DEFAULT NULL,
  `fk_usuario` int(11) NOT NULL,
  `fk_productos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`pk_compra`, `fecha`, `precio_total`, `descuento`, `fk_usuario`, `fk_productos`) VALUES
(1, '2021-08-05 01:49:11', '999.999', NULL, 20, 1),
(2, '2021-08-05 01:49:17', '999.999', NULL, 20, 1),
(3, '2021-08-06 11:36:56', '999.999', NULL, 26, 1),
(4, '2021-08-06 11:37:05', '999.999', NULL, 26, 1),
(5, '2021-08-06 11:37:12', '332.000', NULL, 26, 3),
(6, '2021-08-06 11:37:13', '332.000', NULL, 26, 3),
(7, '2021-08-10 01:20:50', '999.999', NULL, 26, 1),
(8, '2021-08-09 22:19:04', '1.000', NULL, 34, 8),
(9, '2021-08-09 22:34:16', '1.000', NULL, 34, 8),
(10, '2021-08-11 12:01:54', '250.000', NULL, 1, 24),
(11, '2021-08-19 13:35:52', '250.000', NULL, 1, 32),
(12, '2021-08-19 13:36:21', '250.000', NULL, 1, 32);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `pk_productos` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT 0,
  `nombre_producto` varchar(25) DEFAULT NULL,
  `precio` decimal(6,3) DEFAULT NULL,
  `fk_usuario` int(11) DEFAULT NULL,
  `img_producto` varchar(200) DEFAULT NULL,
  `fk_categorias` int(11) NOT NULL,
  `fk_subcategorias` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`pk_productos`, `cantidad`, `nombre_producto`, `precio`, `fk_usuario`, `img_producto`, `fk_categorias`, `fk_subcategorias`) VALUES
(1, 1, 'Blusa Roja - Artesanal', '350.000', NULL, '../imagenes/16.jpg', 1, 1),
(2, 1, 'Blusa Blanca - Artesanal', '350.000', NULL, '../imagenes/4116.jpg', 1, 1),
(3, 1, 'Blusa Tricolor - Artesana', '350.000', NULL, '../imagenes/4755.jpg', 1, 1),
(4, 1, 'Blusa Blanca manga larga ', '350.000', NULL, '../imagenes/7058.jpg', 1, 1),
(5, 1, 'Blusa Azul Marino bordado', '350.000', NULL, '../imagenes/4481.jpg', 1, 1),
(6, 1, 'Blusa Azul Marino bordado', '350.000', NULL, '../imagenes/5849.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategorias`
--

CREATE TABLE `subcategorias` (
  `pk_subcategorias` int(11) NOT NULL,
  `descripcionsub` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `subcategorias`
--

INSERT INTO `subcategorias` (`pk_subcategorias`, `descripcionsub`) VALUES
(1, 'blusas'),
(2, 'vestidos'),
(3, 'bolsas'),
(4, 'joyeria mujer'),
(5, 'camisas'),
(6, 'sudaderas y sarapes'),
(7, 'sombreros'),
(8, 'joyeria hombre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonos`
--

CREATE TABLE `telefonos` (
  `pk_telefonos` int(11) NOT NULL,
  `numero` int(10) DEFAULT NULL,
  `fk_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `telefonos`
--

INSERT INTO `telefonos` (`pk_telefonos`, `numero`, `fk_usuario`) VALUES
(1, 2147483647, 1),
(2, 2147483647, 1),
(3, 2147483647, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `pk_tipo_usuario` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `descripccion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`pk_tipo_usuario`, `tipo`, `descripccion`) VALUES
(1, 1, 'admin'),
(2, 2, 'Usuario comun');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `pk_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(25) NOT NULL,
  `apellido_usuario` varchar(25) DEFAULT NULL,
  `correo` varchar(25) NOT NULL,
  `PASSWORD` varchar(25) NOT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `fk_tipo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`pk_usuario`, `nombre_usuario`, `apellido_usuario`, `correo`, `PASSWORD`, `direccion`, `fk_tipo_usuario`) VALUES
(1, 'Admin', 'User', 'admin@gmail.com', 'admin', '                        laguna la maria #15       ', 1),
(26, 'DENIZ GARCIA', 'CARLOS', 'cadege23@gmail.com', 'darckar23', '                                                  ', 2),
(39, 'bryant', 'DG', 'bryant123@gmail.com', 'bryant123', '', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`pk_carrito`),
  ADD KEY `fk_usuario` (`fk_usuario`),
  ADD KEY `fk_producto` (`fk_producto`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`pk_categorias`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`pk_compra`),
  ADD KEY `fk_usuario` (`fk_usuario`),
  ADD KEY `fk_inventario` (`fk_productos`),
  ADD KEY `fk_productos` (`fk_productos`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`pk_productos`),
  ADD KEY `fk_usuario` (`fk_usuario`),
  ADD KEY `fk_categorias` (`fk_categorias`),
  ADD KEY `fk_subcategorias` (`fk_subcategorias`);

--
-- Indices de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD PRIMARY KEY (`pk_subcategorias`);

--
-- Indices de la tabla `telefonos`
--
ALTER TABLE `telefonos`
  ADD PRIMARY KEY (`pk_telefonos`),
  ADD KEY `fk_usuario` (`fk_usuario`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`pk_tipo_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`pk_usuario`),
  ADD KEY `fk_tipo_usuario` (`fk_tipo_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `pk_carrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `pk_categorias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `pk_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `pk_productos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  MODIFY `pk_subcategorias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `telefonos`
--
ALTER TABLE `telefonos`
  MODIFY `pk_telefonos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `pk_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `pk_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
