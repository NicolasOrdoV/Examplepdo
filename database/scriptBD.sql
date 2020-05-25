-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-05-2020 a las 00:14:07
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `examplepdo`
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movie_rental`
--

CREATE TABLE `movie_rental` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `rental_id` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rentals`
--

CREATE TABLE `rentals` (
  `id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'Cliente', 1),
(2, 'Administrador', 1),
(3, 'Empleado', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `statuses`
--

CREATE TABLE `statuses` (
  `id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `type_status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `statuses`
--

INSERT INTO `statuses` (`id`, `status`, `type_status_id`) VALUES
(1, 'Activo', 3),
(2, 'Inactivo', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `type_status`
--

CREATE TABLE `type_status` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `type_status`
--

INSERT INTO `type_status` (`id`, `name`) VALUES
(1, 'General'),
(2, 'Peliculas'),
(3, 'Usuarios');

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
  ADD KEY `movie_ibfk_1` (`movie_id`),
  ADD KEY `rental_ibfk_1` (`rental_id`);

--
-- Indices de la tabla `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status_ibfk_1` (`status_id`),
  ADD KEY `users_rlfk_1` (`user_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indices de la tabla `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_status_ibfk_1` (`type_status_id`);

--
-- Indices de la tabla `type_status`
--
ALTER TABLE `type_status`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `category_movie`
--
ALTER TABLE `category_movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `movie_rental`
--
ALTER TABLE `movie_rental`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rentals`
--
ALTER TABLE `rentals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `type_status`
--
ALTER TABLE `type_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `category_movie`
--
ALTER TABLE `category_movie`
  ADD CONSTRAINT `category_movie_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `category_movie_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `category_movie_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `movies_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `movie_rental`
--
ALTER TABLE `movie_rental`
  ADD CONSTRAINT `movie_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`),
  ADD CONSTRAINT `rental_ibfk_1` FOREIGN KEY (`rental_id`) REFERENCES `rentals` (`id`);

--
-- Filtros para la tabla `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `status_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`),
  ADD CONSTRAINT `users_rlfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `statuses`
--
ALTER TABLE `statuses`
  ADD CONSTRAINT `type_status_ibfk_1` FOREIGN KEY (`type_status_id`) REFERENCES `type_status` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`) ON UPDATE CASCADE;
COMMIT;