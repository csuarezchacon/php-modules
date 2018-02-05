-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 05-02-2018 a las 13:23:34
-- Versión del servidor: 5.7.21-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `matasanos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `patient`
--

CREATE TABLE `patient` (
  `pat_id` int(11) NOT NULL,
  `pat_fname` varchar(50) NOT NULL,
  `pat_lname` varchar(50) NOT NULL,
  `pat_rut` varchar(9) NOT NULL,
  `pat_rut_dv` varchar(1) NOT NULL,
  `pat_age` int(11) NOT NULL,
  `pat_sex` varchar(10) NOT NULL,
  `bet_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `patient`
--

INSERT INTO `patient` (`pat_id`, `pat_fname`, `pat_lname`, `pat_rut`, `pat_rut_dv`, `pat_age`, `pat_sex`, `bet_id`) VALUES
(2, '1', '1', '1', '1', 1, '1', 1),
(4, '3', '3', '3', '3', 3, '3', 1),
(9, '4', '4', '4', '4', 4, '4', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`pat_id`),
  ADD UNIQUE KEY `pat_rut` (`pat_rut`),
  ADD KEY `FK_patient_benefit_type_id` (`bet_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `patient`
--
ALTER TABLE `patient`
  MODIFY `pat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `FK_patient_benefit_type_id` FOREIGN KEY (`bet_id`) REFERENCES `benefit_type` (`bet_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
