-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-08-2020 a las 19:04:07
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
-- Base de datos: `examplepdo`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `addCategories` (`_name` VARCHAR(100), `_statusId` INT)  BEGIN
INSERT into categories(name,status_id) VALUES (_name,_statusId);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addCategory_Movie` (IN `_movieId` INT, IN `_categoryId` INT, IN `_statusId` INT)  BEGIN
INSERT into category_movie (movie_id,category_id,status_id) VALUES (_movieId,_categoryId,_statusId);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addMovies` (IN `_name` VARCHAR(100), IN `_description` VARCHAR(100), IN `_userId` INT, IN `_statusId` INT)  BEGIN
INSERT INTO movies(name,description,user_id,status_id) VALUES (_name,_description,_userId,_statusId);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addUsers` (IN `_name` VARCHAR(100), IN `_email` VARCHAR(100), IN `_password` VARCHAR(100), IN `_statusId` INT, IN `_rolId` INT)  BEGIN
INSERT INTO users(name,email,password,status_id,rol_id) VALUES (_name,_email,_password,_statusId,_rolId);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `readUsers` (`_name` VARCHAR(100), `_email` VARCHAR(100), `_password` VARCHAR(100), `_statusId` INT, `_rolId` INT)  BEGIN
SELECT u.*, s.status as status,r.name as role FROM users u INNER JOIN  statuses s ON s.id=u._statusiId INNER JOIN roles r ON r.id = u._rolId ORDER BY u.id ASC;
END$$

DELIMITER ;

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
(5, 'Terror', 1),
(6, 'Accion', 1),
(7, 'comedia', 1),
(8, 'Ciencia ficcion', 1),
(9, 'animada', 1),
(10, 'miedo', 1);

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
(1, 26, 5, 1),
(2, 26, 6, 1),
(3, 27, 8, 1),
(4, 28, 7, 1),
(5, 29, 6, 1),
(6, 29, 5, 1),
(7, 30, 9, 1),
(8, 31, 10, 1),
(9, 32, 9, 1),
(10, 33, 9, 1),
(11, 34, 10, 1),
(12, 35, 8, 1),
(13, 36, 8, 1),
(14, 37, 8, 1),
(15, 38, 9, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `movies`
--

INSERT INTO `movies` (`id`, `name`, `img`, `description`, `user_id`, `status_id`) VALUES
(26, 'Saw', 'CERTIFICADO.png', 'Película sangrienta apta para mayores de 15 años', 14, 1),
(35, 'jeison', 'movies.png', 'rgd', 14, 1),
(36, 'prueba', 'jason-icon.png', 's', 14, 1),
(37, 'prueba', 'CERTIFICADO.png', 'dh', 14, 1),
(38, 'prueba', 'movies.png', 'gs', 14, 1);

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

--
-- Volcado de datos para la tabla `movie_rental`
--

INSERT INTO `movie_rental` (`id`, `movie_id`, `rental_id`, `unit_price`) VALUES
(1, 28, 6, 13000),
(2, 26, 7, 13000),
(3, 27, 7, 13000);

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

--
-- Volcado de datos para la tabla `rentals`
--

INSERT INTO `rentals` (`id`, `start_date`, `end_date`, `status_id`, `total`, `user_id`) VALUES
(6, '2020-05-29', '2020-06-03', 1, 13000, 14),
(7, '2020-05-31', '2020-06-02', 1, 12222, 14);

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
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `status_id`, `rol_id`) VALUES
(14, 'Jeison', 'jeison@gmail.com', '123', 1, 1),
(18, 'nohora', 'nohora@gmail.com', '123', 1, 2),
(19, 'santiago', 'santiago@gmail.com', '123', 1, 3),
(20, 'miguel', 'miguel@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 1, 2),
(21, 'jeison', 'jeariza86@misena.edu.co', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 1, 2);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `category_movie`
--
ALTER TABLE `category_movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `movie_rental`
--
ALTER TABLE `movie_rental`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `rentals`
--
ALTER TABLE `rentals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `type_status`
--
ALTER TABLE `type_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
