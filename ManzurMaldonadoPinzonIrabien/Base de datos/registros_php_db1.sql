-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-05-2025 a las 03:05:32
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
  `contrasenia` varchar(255) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `edad` int(11) DEFAULT NULL,
  `nacionalidad` varchar(100) DEFAULT NULL,
  `sexo` enum('Masculino','Femenino','Otro') DEFAULT NULL,
  `es_admin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `correo`, `contrasenia`, `nombre`, `edad`, `nacionalidad`, `sexo`, `es_admin`) VALUES
(1, 'admin@admin.com', '$2y$10$nCiV9Rezn5oZZyxSH5Fh/O//V50RXyZgtk6UzXk78HfVZUT.Em8C.', 'Admin', NULL, NULL, NULL, 1),
(3, 'mateo@gmail.com', '$2y$10$bja3SO/HQcki6Rbfl9BXiOv.6Rnewsvo6C9CUSfwhNHNSGY/Kv9ne', 'Mateo Pinzon', 33, 'Argentino', 'Otro', 0),
(4, 'victor@gmail.com', '$2y$10$Icg.cv1hQVeUT4pHY0vSK.Hn9BBPLmkkuCRW3kNVgX1qxvjZCiRja', 'Victor', NULL, NULL, NULL, 0),
(5, 'mario@gmail.com', '$2y$10$s5v5079eEOInRJNwmGeTnOpYEnQlmMJib0sO1Nkix3sqZvicwEhpS', 'Mario', 21, 'Mexicana', 'Femenino', 0),
(6, 'ale@gmail.com', '$2y$10$aKmSLA769/JMm216jOqT3.RVMZllv5mBjhykxCaH8URza42AjbRtO', 'Ale', 82, 'Mexicana', 'Femenino', 0),
(7, 'luis@gmail.com', '$2y$10$8S6e22ddACWS5jkaBGbQh.4ApR/LnlTqS7MtTxI0vHISfONanPWrK', 'Luis Mario Gei', 55, 'Argentino', 'Femenino', 0),
(8, 'giloxon99@gmail.com', '$2y$10$oCym7MDVFuE2vrm4XWAU3OM9u8MIlHHaSBRTrBxY9AJ1s8NXmQsuq', 'Gildardo Maldonado', NULL, NULL, NULL, 0),
(11, 'volvemosaintentar@volvemosaintentar.com', 'intentar', 'Inténtalo', NULL, NULL, NULL, 0),
(13, 'nervioso@nervioso.com', '$2y$10$g9cHjErQAotiiBxznCW4.ueWRkss60bQhalx7AzI2waHKagQyEQB6', 'nervioso', 25, 'Mexicano', 'Masculino', 0),
(14, '123@123.com', '$2y$10$VGL1E38k6X1a4SyZnFE1/.kjIividL5zL.Epgoi3lQBeplbH/mpxC', 'lol', 23, 'mexicana', 'Masculino', 0),
(15, 'llorando@llorando.com', '$2y$10$O4Izs.IkMZIzdP4mKn2oJ.0dR.SKFzzklEuNS9eq8kE2ZOLATV0py', 'llorar', 25, 'Gringo', 'Femenino', 0),
(16, 'intento@intento.com', 'intento', 'intento', NULL, NULL, NULL, 0),
(17, 'chale@chale.com', '$2y$10$W.7JBB4GTUZnS9xFoqndfO/8tWqHvBcISQVjy5kIajc51pItZJ26y', 'chale', 25, 'mexicana', 'Masculino', 0),
(18, 'ohrayos@ohrayos.com', '$2y$10$CGhXJnAsNiIVljPw2WQbZu.y0y605UyzvE58Q6lsdRywgIzdOu3Ai', 'ohrayos', 25, 'reprobado', 'Masculino', 0),
(21, 'correo@correo.com', '$2y$10$Dy9/1VaVgpE3IwS4vbNOYOZ4Tv5KzqubHcsbEPgWhiYNvZWwnD45W', 'correo', NULL, NULL, NULL, 0),
(23, 'puchaina@demo.com', '$2y$10$9/Mo1w/xmCt6.oE5MH7iheLVcT5juxGycZb33OSPd78x47qCB3cTC', 'puchaina', NULL, NULL, NULL, 0),
(25, '1234@1234.com', '$2y$10$8hgdp3z.G4A8wCLSelmlw.1W0fUgL1KjEdukJceOxw4Yl5iY6DI/W', 'Gildardo otra vez', NULL, NULL, NULL, 0),
(26, 'estoynervioso@nervioso.com', '$2y$10$IKbeMHQXJeRNWo8frxOCT.dmdQtsLqO6TWBDZhQo/TeFtEQCmyFRO', 'Nervioso', NULL, NULL, NULL, 0),
(27, 'verificacion@verificacion.com', '$2y$10$IOSWMHe.puSGce8qXrgxiOAedGJRUGjTm219ZhbWAy4685e9Jm8rm', 'Verificación', NULL, NULL, NULL, 0),
(28, 'estoyprobando@prueba.com', '$2y$10$UelSbT4mVzfwDKSSPUROYeKGh9wwe.3Piu9.R/aLclEPuPLwdWR.q', 'estoyprobando', NULL, NULL, NULL, 0),
(29, 'admin2@admin2.com', '$2y$10$Kc9fV1zwUeCRJhWOC1Z7hOjCgXgE/X/oDRq9iHEQMCtP1rZMgZC5W', 'Admin2', NULL, NULL, NULL, 1),
(30, 'luispeniche@luis.com', '$2y$10$VsZWilGzCujqDja3R3SLJORxt5Ass1xgdRMlBTUDfcNKxbwqO9pjO', 'Luis Peniche', NULL, NULL, NULL, 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
