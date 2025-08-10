-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-07-2025 a las 23:22:33
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `digitalrp_electronicos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `imagen_url` varchar(255) DEFAULT NULL,
  `precio_compra` decimal(10,2) NOT NULL,
  `precio_venta` decimal(10,2) NOT NULL,
  `stock` int(11) DEFAULT 0,
  `categoria` varchar(50) DEFAULT NULL,
  `proveedor` varchar(100) DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `marca`, `descripcion`, `imagen_url`, `precio_compra`, `precio_venta`, `stock`, `categoria`, `proveedor`, `fecha_creacion`) VALUES
(1, 'Pistola Masajeadora con accesorios', 'JT-720', 'Masajeadora portátil con múltiples accesorios', 'imagenes/jt720.jpg', 25000.00, 40000.00, 1, 'salud', 'SEISA', '2025-07-28 21:21:25'),
(2, 'Joystick inalámbrico 3 en 1 (PC/PS2/PS3)', 'SJ-A1009SF', 'Joystick compatible con múltiples consolas', 'imagenes/joystick.jpg', 18000.00, 32000.00, 1, 'gaming', 'SEISA', '2025-07-28 21:21:25'),
(3, 'Auriculares Tranyoo Tipo C', 'T-R19C', 'Auriculares con conector Tipo C y micrófono', 'imagenes/tr19c.jpg', 7500.00, 15000.00, 1, 'audio', 'SEISA', '2025-07-28 21:21:25'),
(4, 'Auriculares Tranyoo Tipo C', 'T-R18C', 'Auriculares con conector Tipo C', 'imagenes/tr18c.jpg', 8000.00, 15000.00, 1, 'audio', 'SEISA', '2025-07-28 21:21:25'),
(5, 'Parlante Portátil Bluetooth', '6110', 'Mini parlante bluetooth recargable', 'imagenes/6110.jpg', 21000.00, 35000.00, 1, 'audio', 'SEISA', '2025-07-28 21:21:25'),
(6, 'Parlante Portátil Bluetooth', 'T6531', 'Parlante con luz LED y gran sonido', 'imagenes/t6531.jpg', 31160.00, 50000.00, 1, 'audio', 'SEISA', '2025-07-28 21:21:25'),
(7, 'Auricular Bluetooth con oreja de gato', 'EJ-S28PRO', 'Auriculares con diseño de gato y luces LED', 'imagenes/gato.jpg', 32800.00, 60000.00, 1, 'audio', 'SEISA', '2025-07-28 21:21:25'),
(8, 'Brazalete Sport para Celular', 'YX-B03', 'Brazalete para correr con ajuste de velcro', 'imagenes/brazalete.jpg', 2460.00, 10000.00, 1, 'varios', 'SEISA', '2025-07-28 21:21:25'),
(9, 'Mono Auricular Metal Bluetooth', 'M12', 'Auricular manos libres tipo metal', 'imagenes/m12.jpg', 7000.00, 15000.00, 1, 'audio', 'SEISA', '2025-07-28 21:21:25'),
(10, 'Cable HDMI mallado con filtro', 'DN-N515', 'Cable HDMI resistente con filtro y mallado', 'imagenes/hdmi.jpg', 7000.00, 15000.00, 1, 'electronica', 'SEISA', '2025-07-28 21:21:25'),
(11, 'Cable HDMI XCFH5001', 'XCFH5001', 'Cable HDMI largo con filtro', 'imagenes/xcfh5001.jpg', 14000.00, 22000.00, 1, 'electronica', 'SEISA', '2025-07-28 21:21:25'),
(12, 'Cable HDMI DN-N616', 'DN-N616', 'Cable HDMI básico para video HD', 'imagenes/dn616.jpg', 15000.00, 25000.00, 1, 'electronica', 'SEISA', '2025-07-28 21:21:25'),
(13, 'Mouse óptico USB', 'DN-N702', 'Mouse con cable y sensor óptico', 'imagenes/mouse1.jpg', 6200.00, 12000.00, 1, 'perisfericos', 'SEISA', '2025-07-28 21:21:25'),
(14, 'Parlante portátil recargable', 'T-816', 'Parlante con batería de larga duración', 'imagenes/t816.jpg', 32000.00, 52000.00, 1, 'audio', 'SEISA', '2025-07-28 21:21:25'),
(15, 'Mouse óptico USB con cable', 'JSY-2DY', 'Mouse ergonómico con cable', 'imagenes/mouse2.jpg', 6200.00, 12000.00, 1, 'perisfericos', 'SEISA', '2025-07-28 21:21:25'),
(16, 'Auricular Bluetooth baja ruido', 'ANC887BT', 'Audífonos bluetooth con cancelación pasiva', 'imagenes/anc887.jpg', 65000.00, 110000.00, 1, 'audio', 'SEISA', '2025-07-28 21:21:25');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
