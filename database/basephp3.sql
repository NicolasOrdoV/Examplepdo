-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-06-2020 a las 02:55:13
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `basephp3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `status_id`) VALUES
(5, 'Comedia', 1),
(6, 'Terror', 1),
(7, 'Aventura', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category_movie`
--

CREATE TABLE `category_movie` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `category_movie`
--

INSERT INTO `category_movie` (`id`, `movie_id`, `category_id`, `status_id`) VALUES
(49, 18, 6, 1),
(51, 18, 5, 1),
(56, 18, 7, 1),
(57, 24, 5, 1),
(58, 24, 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `movies`
--

INSERT INTO `movies` (`id`, `name`, `description`, `user_id`, `status_id`) VALUES
(18, 'test1', 'testdes1', 14, 1),
(24, 'peli1', 'des1', 14, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movie_rental`
--

CREATE TABLE `movie_rental` (
  `id` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `rental_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `movie_rental`
--

INSERT INTO `movie_rental` (`id`, `unit_price`, `movie_id`, `rental_id`) VALUES
(12, 12000, 18, 16),
(13, 12000, 24, 16),
(15, 12000, 18, 16),
(18, 50000, 18, 17),
(19, 10000, 18, 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rentals`
--

CREATE TABLE `rentals` (
  `id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `total` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rentals`
--

INSERT INTO `rentals` (`id`, `start_date`, `end_date`, `total`, `status_id`, `user_id`) VALUES
(16, '2020-06-12', '2020-06-30', 36000, 1, 14),
(17, '2020-06-24', '2020-07-09', 60000, 1, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `status_id`) VALUES
(1, 'Administrador', 1),
(2, 'Empleado', 1),
(3, 'Cliente', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `statutes`
--

CREATE TABLE `statutes` (
  `id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `type_status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `statutes`
--

INSERT INTO `statutes` (`id`, `status`, `type_status_id`) VALUES
(1, 'Activo', 1),
(2, 'Inactivo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `type_statutes`
--

CREATE TABLE `type_statutes` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `type_statutes`
--

INSERT INTO `type_statutes` (`id`, `name`) VALUES
(1, 'type 1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status_id` int(11) NOT NULL,
  `rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `status_id`, `rol_id`) VALUES
(14, 'user 01', 'ej1@ej.com', '123', 1, 1),
(18, 'jeison', 'jeariza86@misena.edu.co', '123', 1, 1),
(19, 'jeison', 'prueba1@gmail.com', '123', 1, 2),
(20, 'jeison', 'prueba2@gmail.com', '123', 1, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indices de la tabla `category_movie`
--
ALTER TABLE `category_movie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indices de la tabla `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indices de la tabla `movie_rental`
--
ALTER TABLE `movie_rental`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`),
  ADD KEY `rental_id` (`rental_id`);

--
-- Indices de la tabla `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indices de la tabla `statutes`
--
ALTER TABLE `statutes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_status_id` (`type_status_id`);

--
-- Indices de la tabla `type_statutes`
--
ALTER TABLE `type_statutes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `rol_id` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `category_movie`
--
ALTER TABLE `category_movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `movie_rental`
--
ALTER TABLE `movie_rental`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `rentals`
--
ALTER TABLE `rentals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `statutes`
--
ALTER TABLE `statutes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `type_statutes`
--
ALTER TABLE `type_statutes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `statutes` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `category_movie`
--
ALTER TABLE `category_movie`
  ADD CONSTRAINT `category_movie_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `category_movie_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `category_movie_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `statutes` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `movies_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `statutes` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `movie_rental`
--
ALTER TABLE `movie_rental`
  ADD CONSTRAINT `movie_rental_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `movie_rental_ibfk_2` FOREIGN KEY (`rental_id`) REFERENCES `rentals` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `rentals_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `statutes` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `rentals_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `statutes` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `statutes`
--
ALTER TABLE `statutes`
  ADD CONSTRAINT `statutes_ibfk_1` FOREIGN KEY (`type_status_id`) REFERENCES `type_statutes` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `statutes` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
