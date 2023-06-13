-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-06-2023 a las 17:33:52
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cartbasic1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id` int(50) NOT NULL,
  `total` float(10,5) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `fechaPedido` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id`, `total`, `usuario`, `fechaPedido`) VALUES
(1, 0.00000, 'Pepe', '2023-03-01 03:33:08'),
(2, 70.00000, 'Pepe', '2023-03-01 03:36:50'),
(3, 88.00000, 'PabloA', '2023-03-01 04:02:31'),
(4, 20.00000, 'Aguza', '2023-03-01 04:07:35'),
(5, 62.00000, 'PabloA', '2023-03-01 04:20:44'),
(6, 108.00000, 'opd', '2023-03-01 22:16:23'),
(7, 50.00000, 'Fernando', '2023-06-11 22:47:40'),
(8, 50.00000, 'PabloA', '2023-06-11 22:55:41'),
(9, 50.00000, 'PacoL', '2023-06-12 17:26:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `client_email` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cart`
--

INSERT INTO `cart` (`id`, `client_email`, `created_at`) VALUES
(1, 'pepe@p.com', '2023-03-01 03:00:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cart_product`
--

CREATE TABLE `cart_product` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `q` float DEFAULT NULL,
  `cart_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cart_product`
--

INSERT INTO `cart_product` (`id`, `product_id`, `q`, `cart_id`) VALUES
(1, 1, 1, 1),
(2, 3, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase`
--

CREATE TABLE `clase` (
  `id` int(255) NOT NULL,
  `nivel` varchar(50) NOT NULL,
  `localizacion` varchar(50) NOT NULL,
  `numParticipantes` int(50) NOT NULL,
  `maxParticipantes` int(50) NOT NULL,
  `idtrabajador` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clase`
--

INSERT INTO `clase` (`id`, `nivel`, `localizacion`, `numParticipantes`, `maxParticipantes`, `idtrabajador`) VALUES
(1, 'Intermedio', 'playa zahara', 7, 20, 9),
(2, 'Avanzado', 'playa cuba', 1, 20, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productosub`
--

CREATE TABLE `productosub` (
  `id` int(2) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` int(2) NOT NULL,
  `imagen` text DEFAULT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productosub`
--

INSERT INTO `productosub` (`id`, `nombre`, `precio`, `imagen`, `descripcion`) VALUES
(1, 'Aletas', 50, 'imagenes/Andersub.jpg', 'Aletas en muy buen estado y nuevas'),
(2, 'respirador', 50, 'imagenes/Andersub.jpg', 'Respirador bueno muy recomendado por profesionales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `nombre` varchar(255) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nombre`, `contraseña`, `correo`, `admin`, `id`) VALUES
('PabloA', 'con1234', 'pablo@gmail.com', 1, 1),
('Pepe', 'pepe1234', 'a@a.com', 0, 2),
('Juan', 'juan1234', 'juan@a.com', 0, 3),
('Antonio', 'antonio1234', 'a@a.com', 0, 4),
('Ale', 'ale1234', 'ale@a.com', 0, 5),
('Aguza', 'agu1234', 'a@a.com', 0, 6),
('opd', 'opd1234', 'o@o.com', 0, 7),
('PacoL', 'owo', 'p@gmail.com', 0, 8),
('Onwo', 'Onwo', 'Onwo@gmail.com', 2, 9),
('Dios', 'tarde7dias', 'dios@gmail.com', 0, 10),
('Fernando', 'fer1234', 'fer@gmail.com', 2, 11),
('Fran', 'fran', 'fran@gmail.com', 2, 12);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cart_product`
--
ALTER TABLE `cart_product`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clase`
--
ALTER TABLE `clase`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productosub`
--
ALTER TABLE `productosub`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cart_product`
--
ALTER TABLE `cart_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `clase`
--
ALTER TABLE `clase`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `productosub`
--
ALTER TABLE `productosub`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
