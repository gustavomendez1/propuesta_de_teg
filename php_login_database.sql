-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-08-2021 a las 17:01:49
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `php_login_database`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrarse`
--

CREATE TABLE `registrarse` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellido` varchar(40) NOT NULL,
  `Edad` varchar(4) NOT NULL,
  `Telefono` varchar(12) NOT NULL,
  `Direccion` varchar(400) NOT NULL,
  `Sexo` varchar(1) NOT NULL,
  `tipocedula` varchar(1) NOT NULL,
  `ci` varchar(12) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(200) NOT NULL,
  `fechanac` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `registrarse`
--

INSERT INTO `registrarse` (`id`, `nombre`, `apellido`, `Edad`, `Telefono`, `Direccion`, `Sexo`, `tipocedula`, `ci`, `email`, `password`, `fechanac`) VALUES
(4, 'Armando', 'Jose', '21', '0426345372', 'La Dolorita', 'M', 'V', '27482828', 'pavaguera@hotmail.com', '$2y$10$wbzWgXnw3Yl7ARDxoBBvL.vWqDQJ9LcAxOMF5UWFMatyd3BVA9Dai', '02/04/2002'),
(5, 'Gabriel', 'Botto', '17', '04263453444', 'La Dolorita', 'M', 'V', '27536178', 'hello.hola@gmail.com', '$2y$10$zl/Q4me3Ty7x4bOmgokfwe1mmIuXmGsPuScdv3x.LXJmUQgZli6b6', '04/07/2000'),
(6, 'Gabriel', 'Montilla', '21', '0426345372', 'La Rebolleda', 'M', 'V', '23457667', 'gabo.men@gmail.com', '$2y$10$4EyQyXQ7PXt6A.oDvQHL1e3YNVQ5eTfTXNYcT38YrZAzqeVLqhhTG', '02/04/2002'),
(7, 'Gabriel', 'Botto', '21', '0426345372', 'La Dolorita', 'M', 'V', '27482828', 'zzz@mail.com', '$2y$10$pmXp.h.NbaD9lxadX22Bte7gknntDWAZHAI.cjFqOnXbcITcvgRQy', '02/04/2002');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `registrarse`
--
ALTER TABLE `registrarse`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `registrarse`
--
ALTER TABLE `registrarse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
