-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 17-01-2022 a las 03:59:25
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pruebaUsco`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id_cursos` int(11) NOT NULL,
  `nombre_curso` varchar(100) NOT NULL,
  `id_profesor` int(11) NOT NULL,
  `estado_curso` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id_cursos`, `nombre_curso`, `id_profesor`, `estado_curso`) VALUES
(1, 'Introducción a la Ingería', 4, '1'),
(2, 'Fundamentos de Programación 2', 3, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos_estudiante`
--

CREATE TABLE `cursos_estudiante` (
  `id_cursoEstudiante` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `id_estudiante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cursos_estudiante`
--

INSERT INTO `cursos_estudiante` (`id_cursoEstudiante`, `id_curso`, `id_estudiante`) VALUES
(20, 2, 1),
(21, 2, 2),
(22, 2, 3),
(23, 2, 4),
(24, 1, 1),
(25, 1, 2),
(26, 1, 3),
(27, 1, 4),
(28, 1, 6),
(29, 1, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id_estudiante` int(11) NOT NULL,
  `nombre_estudiante` varchar(100) NOT NULL,
  `identificacion_estudiante` varchar(20) NOT NULL,
  `codigo_estudiante` varchar(20) NOT NULL,
  `estado_estudiante` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id_estudiante`, `nombre_estudiante`, `identificacion_estudiante`, `codigo_estudiante`, `estado_estudiante`) VALUES
(1, 'Carlos Calero', '104521444', 'CD-2015', 1),
(2, 'Andrea Gonzales', '1022451', 'CD-20152', 1),
(3, 'Karla Sandoval', '120114', 'CD-20212', 1),
(4, 'Nelson Jimenez', '365210', 'CD-20181', 1),
(5, 'Carolina Buendía', '124511', 'CD-20142', 1),
(6, 'Alvaro Arbelaez', '254122', 'CD-20112', 1),
(7, 'Andrea Corona', '21544', 'CD-20102', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `id_profesor` int(11) NOT NULL,
  `nombre_profesor` varchar(100) NOT NULL,
  `cedula_profesor` varchar(20) NOT NULL,
  `telefono_profesor` varchar(20) NOT NULL,
  `codigo_profesor` varchar(20) NOT NULL,
  `estado_profesor` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`id_profesor`, `nombre_profesor`, `cedula_profesor`, `telefono_profesor`, `codigo_profesor`, `estado_profesor`) VALUES
(1, 'Euripides Triana', '21541', '3102144', 'CD-124', 1),
(2, 'Eduardo Santos', '214552', '321454', 'CD-5412', 1),
(3, 'Luis gregorio Sandoval', '124556', '445454', 'CD-25544', 1),
(4, 'Patricia Rincon', '2544', '315454', 'CD-5445', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salones`
--

CREATE TABLE `salones` (
  `id_salones` int(11) NOT NULL,
  `nombre_salon` varchar(50) NOT NULL,
  `estado_salon` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `salones`
--

INSERT INTO `salones` (`id_salones`, `nombre_salon`, `estado_salon`) VALUES
(1, '201', 1),
(2, '214', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salon_curso`
--

CREATE TABLE `salon_curso` (
  `id_salon_curso` int(11) NOT NULL,
  `id_salon` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora_ingreso` time NOT NULL,
  `hora_salida` time NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `salon_curso`
--

INSERT INTO `salon_curso` (`id_salon_curso`, `id_salon`, `id_curso`, `fecha`, `hora_ingreso`, `hora_salida`, `estado`) VALUES
(1, 1, 1, '2022-01-18', '07:00:00', '10:00:00', 1),
(2, 2, 2, '2022-01-18', '07:00:00', '10:00:00', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_cursos`),
  ADD KEY `fk_cursos_id_profesor` (`id_profesor`);

--
-- Indices de la tabla `cursos_estudiante`
--
ALTER TABLE `cursos_estudiante`
  ADD PRIMARY KEY (`id_cursoEstudiante`),
  ADD KEY `fk_cursos_alumno_id_curso` (`id_curso`),
  ADD KEY `fk_curso_alumno_id_alumno` (`id_estudiante`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id_estudiante`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`id_profesor`);

--
-- Indices de la tabla `salones`
--
ALTER TABLE `salones`
  ADD PRIMARY KEY (`id_salones`);

--
-- Indices de la tabla `salon_curso`
--
ALTER TABLE `salon_curso`
  ADD PRIMARY KEY (`id_salon_curso`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_cursos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cursos_estudiante`
--
ALTER TABLE `cursos_estudiante`
  MODIFY `id_cursoEstudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id_estudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
  MODIFY `id_profesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `salones`
--
ALTER TABLE `salones`
  MODIFY `id_salones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `salon_curso`
--
ALTER TABLE `salon_curso`
  MODIFY `id_salon_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `fk_cursos_id_profesor` FOREIGN KEY (`id_profesor`) REFERENCES `profesor` (`id_profesor`);

--
-- Filtros para la tabla `cursos_estudiante`
--
ALTER TABLE `cursos_estudiante`
  ADD CONSTRAINT `fk_curso_alumno_id_alumno` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiantes` (`id_estudiante`),
  ADD CONSTRAINT `fk_cursos_alumno_id_curso` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_cursos`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
