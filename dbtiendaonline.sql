-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-08-2021 a las 18:04:53
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
(67, 40, 3),
(68, 40, 1),
(69, 40, 2),
(72, 26, 1),
(73, 26, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `categorias_id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`categorias_id`, `nombre`) VALUES
(1, 'ropa mujer'),
(2, 'blusas'),
(3, 'vestidos'),
(4, 'accesorios mujer'),
(5, 'bolsas'),
(6, 'joyeria'),
(7, 'ropa hombre'),
(8, 'camisas'),
(9, 'sudaderas'),
(10, 'accesorios hombre'),
(11, 'sombreros'),
(12, 'joyeria');

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
  `fk_inventario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`pk_compra`, `fecha`, `precio_total`, `descuento`, `fk_usuario`, `fk_inventario`) VALUES
(27, '2021-08-12 02:49:35', '350.000', NULL, 26, 1),
(28, '2021-08-12 02:49:43', '350.000', NULL, 26, 2),
(29, '2021-08-12 02:54:51', '350.000', NULL, 26, 1),
(30, '2021-08-12 02:54:55', '350.000', NULL, 26, 2),
(31, '2021-08-12 03:01:15', '350.000', NULL, 26, 1),
(32, '2021-08-12 03:01:18', '350.000', NULL, 26, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `pk_inventario` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT 0,
  `nombre_producto` varchar(25) DEFAULT NULL,
  `precio` decimal(6,3) DEFAULT NULL,
  `fk_usuario` int(11) DEFAULT NULL,
  `img_producto` varchar(200) DEFAULT NULL,
  `categorias_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`pk_inventario`, `cantidad`, `nombre_producto`, `precio`, `fk_usuario`, `img_producto`, `categorias_id`) VALUES
(1, 1, 'Vestido Artesanal', '350.000', NULL, '../imagenes/8476.jpg', 0),
(2, 1, 'Blusa Artesanal', '350.000', NULL, '../imagenes/218.jpg', 0),
(3, 1, 'Vestido Artesanal', '350.000', NULL, '../imagenes/6714.jpg', 0),
(4, 1, 'Blusa Artesanal', '350.000', NULL, '../imagenes/5531.jpg', 0),
(5, 1, 'Vestido Artesanal', '350.000', NULL, '../imagenes/8178.jpg', 0),
(6, 1, 'Blusa Artesanal', '350.000', NULL, '../imagenes/9428.jpg', 0),
(7, 1, 'Blusa Artesanal', '350.000', NULL, '../imagenes/8556.jpg', 0),
(8, 1, 'Blusa Artesanal', '350.000', NULL, '../imagenes/2734.jpg', 0),
(9, 1, 'Vestido Artesanal', '350.000', NULL, '../imagenes/5676.jpg', 0),
(10, 1, 'Blusa Artesanal', '350.000', NULL, '../imagenes/9473.jpg', 0),
(11, 1, 'Vestido Artesanal', '350.000', NULL, '../imagenes/5271.jpg', 0),
(12, 1, 'Blusa Artesanal', '350.000', NULL, '../imagenes/3973.jpg', 0),
(47, 1, 'blusa azul artesanal', '150.000', NULL, '../imagenes/1149.jpg', 0),
(48, 1, 'blusa artesanal negra', '150.000', NULL, '../imagenes/4821.jpg', 0),
(49, 1, 'vestido artesanal naranja', '150.000', NULL, '../imagenes/4351.jpg', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonos`
--

CREATE TABLE `telefonos` (
  `pk_telefonos` int(11) NOT NULL,
  `numero` int(10) DEFAULT NULL,
  `fk_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(2, 2, 'Usuario cliente'),
(3, 3, 'Usuario Empleado');

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
(26, 'Carlos', 'Deniz Garcia', 'cadege23@gmail.com', 'darckar23', '                                                  ', 2),
(39, 'Admin', 'User', 'admin@gmail.com', 'admin', 'Launa la maria\r\n#15', 1),
(40, 'pepe', 'papas', 'pepepapas@gmail.com', 'pepepapas', NULL, 2),
(41, 'pedro', 'perez', 'barrales@gmail.com', 'barrales', '                        Launa la maria\r\n#15       ', 2),
(42, 'carlos', 'villa', 'carlosvilla@gmail.com', 'carlos', NULL, 2),
(43, 'alejandro', 'perez', 'alejandroperez@gmail.com', 'ale', '                                                La', 2),
(44, 'carlos', 'contreras', 'carloscontreras@gmail.com', 'carlos', NULL, 2),
(45, 'raul', 'perez rodriguez', 'reaulperez@gmail.com', 'raul', '                        Launa la maria\r\n#15       ', 1);

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
  ADD PRIMARY KEY (`categorias_id`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`pk_compra`),
  ADD KEY `fk_usuario` (`fk_usuario`),
  ADD KEY `fk_inventario` (`fk_inventario`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`pk_inventario`),
  ADD KEY `fk_usuario` (`fk_usuario`);

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
  MODIFY `pk_carrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `categorias_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `pk_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `pk_inventario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `telefonos`
--
ALTER TABLE `telefonos`
  MODIFY `pk_telefonos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `pk_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `pk_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
