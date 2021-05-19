-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-05-2021 a las 07:25:46
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `culturaydeportes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listas`
--

CREATE TABLE `listas` (
  `id` int(10) NOT NULL,
  `carrera` varchar(50) NOT NULL,
  `lista` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `listas`
--

INSERT INTO `listas` (`id`, `carrera`, `lista`) VALUES
(1, 'TECNOLOGIAS DE LA INFORMCION Y COMUNICACION', 'curso_c++6.pdf'),
(2, 'TECNOLOGIAS DE LA INFORMCION Y COMUNICACION', 'Delitos_informáticos1.pdf'),
(3, 'TECNOLOGIAS DE LA INFORMCION Y COMUNICACION', 'rfc.pdf'),
(4, 'TECNOLOGIAS DE LA INFORMCION Y COMUNICACION', 'start_up.pdf'),
(5, 'DESARROLLO DE NEGOCIOS', 'curso_c++7.pdf'),
(6, 'DESARROLLO DE NEGOCIOS', 'Delitos_informáticos2.pdf'),
(7, 'DESARROLLO DE NEGOCIOS', 'guia_de_medicion_de_tierra_ed2.pdf'),
(8, 'AGRICULTURA SUSTENTABLE Y PROTEGIDA', 'constancia_CITECER.pdf'),
(9, 'AGRICULTURA SUSTENTABLE Y PROTEGIDA', 'ertificado_talent_land_asistencia.pdf'),
(10, 'AGRICULTURA SUSTENTABLE Y PROTEGIDA', 'Páginas_web_(marzo)_Constancia.pdf'),
(11, 'AGRICULTURA SUSTENTABLE Y PROTEGIDA', 'RamiroAltamirano-Intro+to+IoE+espanol-Certificate.pdf');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `listas`
--
ALTER TABLE `listas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `listas`
--
ALTER TABLE `listas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
