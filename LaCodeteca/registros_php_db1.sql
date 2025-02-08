-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-12-2024 a las 22:33:47
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `registros_php_db1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `libro` varchar(255) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id`, `titulo`, `autor`, `descripcion`, `libro`, `imagen`) VALUES
(1, 'El poder de los hábitos', 'Charles Duhigg', 'Cómo los hábitos influyen en nuestra vida personal y profesional.', 'poder_habitos.pdf', 'poder_habitos.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nacionalidades`
--

CREATE TABLE `nacionalidades` (
  `id` int(11) NOT NULL,
  `nacionalidad` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `nacionalidades`
--

INSERT INTO `nacionalidades` (`id`, `nacionalidad`) VALUES
(1, '<br /><b>Warning</b>:  Trying to access array offset on value of type null in <b>C:xampphtdocsLaCode');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `contrasenia` varchar(200) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `edad` int(11) DEFAULT NULL,
  `nacionalidad` varchar(100) DEFAULT NULL,
  `sexo` enum('Masculino','Femenino','Otro') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `correo`, `contrasenia`, `nombre`, `edad`, `nacionalidad`, `sexo`) VALUES
(1, 'admin@admin.com', 'admin', 'Admin', NULL, NULL, NULL),
(2, 'prueba@gmail.com', 'prueba', 'Prueba', NULL, NULL, NULL),
(3, 'mateo@gmail.com', '$2y$10$bja3SO/HQcki6Rbfl9BXiOv.6Rnewsvo6C9CUSfwhNHNSGY/Kv9ne', 'Mateo Pinzon', 33, 'Argentino', 'Otro'),
(4, 'victor@gmail.com', '$2y$10$Icg.cv1hQVeUT4pHY0vSK.Hn9BBPLmkkuCRW3kNVgX1qxvjZCiRja', 'Victor', NULL, NULL, NULL),
(5, 'mario@gmail.com', '$2y$10$s5v5079eEOInRJNwmGeTnOpYEnQlmMJib0sO1Nkix3sqZvicwEhpS', 'Mario', 21, 'Mexicana', 'Femenino'),
(6, 'ale@gmail.com', '$2y$10$aKmSLA769/JMm216jOqT3.RVMZllv5mBjhykxCaH8URza42AjbRtO', 'Ale', 82, 'Mexicana', 'Femenino'),
(7, 'luis@gmail.com', '$2y$10$8S6e22ddACWS5jkaBGbQh.4ApR/LnlTqS7MtTxI0vHISfONanPWrK', 'Luis Mario Gei', 55, 'Argentino', 'Femenino'),
(8, 'giloxon99@gmail.com', '$2y$10$oCym7MDVFuE2vrm4XWAU3OM9u8MIlHHaSBRTrBxY9AJ1s8NXmQsuq', 'Gildardo Maldonado', NULL, NULL, NULL),
(9, 'demo@demo.com', 'demo', 'Gil demo', NULL, NULL, NULL),
(10, 'hola@hola.com', 'hola', 'Me llamo hola', NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `nacionalidades`
--
ALTER TABLE `nacionalidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `nacionalidades`
--
ALTER TABLE `nacionalidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
