-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-11-2024 a las 13:42:59
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `alquilerautos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id` int(11) NOT NULL,
  `fecha_reserva` date NOT NULL,
  `cant_dias` int(11) NOT NULL,
  `id_vehiculo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id`, `fecha_reserva`, `cant_dias`, `id_vehiculo`) VALUES
(1, '2024-10-15', 10, 1),
(2, '2024-10-25', 13, 3),
(3, '2024-03-03', 10, 12),
(5, '2024-11-13', 11, 1),
(6, '2024-11-27', 10, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` char(60) NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `tipo` varchar(10) NOT NULL DEFAULT 'usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `telefono`, `tipo`) VALUES
(1, 'Roberto Muñoz', 'rmunioz@gmail.com', '$2y$10$MEYmBXaAgxYUnqx.GwukTOHguK98j/ptByXwjmEDJhCKN5xA09Dw2', 249456784, 'usuario'),
(2, 'Jose Lopez', 'jlopez@gmail.com', '$2y$10$6AVyKDBZ2z1pxrdopnyuQea26DWv8F1Y/6OzMLxfxeDEUPgygKAHi', 2494347698, 'usuario'),
(3, 'Juan Perez', 'jperez@gmail.com', '$2y$10$wq/G9hNlLjE5FvcwyQXUmu9NUIQHZxc4iObMrLwKk/NmoqWsUgEji', 2494358769, 'admin'),
(4, 'webadmin', 'web@admin.com', '$2y$10$cfzlXxRXnK68L1vaiA7kFevNDVuipAcyOD/vKHKaT47/gutPeNpBq', 2494765809, 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id` int(11) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `modelo` int(11) NOT NULL,
  `matricula` varchar(10) NOT NULL,
  `precio_dia` decimal(10,0) NOT NULL,
  `imagen` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id`, `marca`, `modelo`, `matricula`, `precio_dia`, `imagen`) VALUES
(1, 'FERRARI', 2019, 'AD456ZQ', 125, 'https://thrillofdriving.net/wp-content/uploads/2022/09/sf90-red.jpg'),
(3, 'TESLA', 2020, 'SG754RE', 100, 'https://st.automobilemag.com/uploads/sites/11/2017/11/2020-Tesla-Roadster-Above.jpg'),
(8, 'PORSCHE', 2020, 'TR487UF', 145, 'https://th.bing.com/th/id/OIP.Zt5SDgQ3g_akLbH4lVGz6gAAAA?rs=1&pid=ImgDetMain'),
(9, 'LAMBORGHINI', 2023, 'TV739XL', 190, 'https://th.bing.com/th/id/OIP.JT5eTZv0R4gKfRG3RaSOfwAAAA?rs=1&pid=ImgDetMain'),
(11, 'ASTON MARTIN', 2021, 'ER391DS', 110, 'https://th.bing.com/th/id/OIP.6cQfNk5wvIYZCm5N6nYqAQAAAA?rs=1&pid=ImgDetMain'),
(12, 'ROLLS-ROYCE', 2020, 'DH487MZ', 158, 'https://static1.hotcarsimages.com/wordpress/wp-content/uploads/2022/06/2022-Rolls-Royce-Boat-Tail.jpg'),
(13, 'MASERATI', 2023, 'GA741FC', 220, 'https://th.bing.com/th/id/OIP.tBcZ4cF8gTq5QLTvOsmRygAAAA?rs=1&pid=ImgDetMain');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_vehiculo` (`id_vehiculo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculos` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
