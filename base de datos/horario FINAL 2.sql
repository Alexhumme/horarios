-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-12-2022 a las 16:56:34
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `horario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ambiente/competencia`
--

CREATE TABLE `ambiente/competencia` (
  `idambiente` int(11) NOT NULL,
  `idcompetencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ambientes`
--

CREATE TABLE `ambientes` (
  `idambiente` int(11) NOT NULL,
  `ambiente` varchar(30) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `ambientes`
--

INSERT INTO `ambientes` (`idambiente`, `ambiente`) VALUES
(1, 'ambiente 1'),
(2, 'ambiente 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion`
--

CREATE TABLE `asignacion` (
  `idasignacion` int(11) NOT NULL,
  `semana` int(11) NOT NULL,
  `dia` int(11) NOT NULL,
  `hora_inicio` int(11) NOT NULL,
  `idresultado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `competencias`
--

CREATE TABLE `competencias` (
  `idcompetencia` int(11) NOT NULL,
  `competencia` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `duracion` int(11) NOT NULL,
  `idinstructor` int(11) DEFAULT NULL,
  `idjornada` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `competencias`
--

INSERT INTO `competencias` (`idcompetencia`, `competencia`, `duracion`, `idinstructor`, `idjornada`) VALUES
(1, 'comunicacion', 20, NULL, NULL),
(2, 'ingles', 15, NULL, NULL),
(3, 'salud', 22, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dias`
--

CREATE TABLE `dias` (
  `iddia` int(11) NOT NULL,
  `dia` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `hora` int(11) DEFAULT NULL,
  `idhorario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha/competencia`
--

CREATE TABLE `ficha/competencia` (
  `idficha` int(11) NOT NULL,
  `idcompetencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fichas`
--

CREATE TABLE `fichas` (
  `idficha` int(11) NOT NULL,
  `ficha` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `inico` date NOT NULL,
  `final` date NOT NULL,
  `idprograma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `idhorario` int(11) NOT NULL,
  `horario` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `iddia` int(11) NOT NULL,
  `idjornada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instructor`
--

CREATE TABLE `instructor` (
  `idinstructor` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` int(12) NOT NULL,
  `email` varchar(30) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `instructor`
--

INSERT INTO `instructor` (`idinstructor`, `id`, `nombre`, `apellido`, `telefono`, `email`) VALUES
(1, 1, 'instructor 1', 'de instructor', 300000000, 'i1@gmail.com'),
(2, 2, 'instructora 2', 'de instructor', 300111111, 'i2@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instructor/competencia`
--

CREATE TABLE `instructor/competencia` (
  `idinstructor` int(11) NOT NULL,
  `idcompetencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `instructor/competencia`
--

INSERT INTO `instructor/competencia` (`idinstructor`, `idcompetencia`) VALUES
(1, 1),
(1, 2),
(2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instructor/ficha`
--

CREATE TABLE `instructor/ficha` (
  `idinstructor` int(11) NOT NULL,
  `idficha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jornada`
--

CREATE TABLE `jornada` (
  `idjornada` int(11) NOT NULL,
  `jornada` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `iddia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programas`
--

CREATE TABLE `programas` (
  `idprograma` int(11) NOT NULL,
  `programa` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `nivel` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `horas_productivas` int(11) NOT NULL,
  `horas_lectivas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `programas`
--

INSERT INTO `programas` (`idprograma`, `programa`, `nivel`, `horas_productivas`, `horas_lectivas`) VALUES
(1, 'programacion de software', 'tecnico', 80, 80),
(2, 'cocina', 'tecnologico', 75, 33);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados`
--

CREATE TABLE `resultados` (
  `idresultado` int(11) NOT NULL,
  `resultado` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `idcompetencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ambiente/competencia`
--
ALTER TABLE `ambiente/competencia`
  ADD PRIMARY KEY (`idambiente`,`idcompetencia`),
  ADD KEY `idcompetencia` (`idcompetencia`);

--
-- Indices de la tabla `ambientes`
--
ALTER TABLE `ambientes`
  ADD PRIMARY KEY (`idambiente`);

--
-- Indices de la tabla `asignacion`
--
ALTER TABLE `asignacion`
  ADD PRIMARY KEY (`idasignacion`);

--
-- Indices de la tabla `competencias`
--
ALTER TABLE `competencias`
  ADD PRIMARY KEY (`idcompetencia`),
  ADD KEY `idinstructor` (`idinstructor`),
  ADD KEY `idjornada` (`idjornada`);

--
-- Indices de la tabla `dias`
--
ALTER TABLE `dias`
  ADD PRIMARY KEY (`iddia`),
  ADD KEY `idhorario` (`idhorario`);

--
-- Indices de la tabla `ficha/competencia`
--
ALTER TABLE `ficha/competencia`
  ADD PRIMARY KEY (`idficha`,`idcompetencia`),
  ADD KEY `fk_cod_comp` (`idcompetencia`);

--
-- Indices de la tabla `fichas`
--
ALTER TABLE `fichas`
  ADD PRIMARY KEY (`idficha`),
  ADD KEY `idprograma` (`idprograma`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`idhorario`),
  ADD KEY `iddia` (`iddia`),
  ADD KEY `idjornada` (`idjornada`);

--
-- Indices de la tabla `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `instructor/competencia`
--
ALTER TABLE `instructor/competencia`
  ADD PRIMARY KEY (`idinstructor`,`idcompetencia`),
  ADD KEY `idcompetencia` (`idcompetencia`);

--
-- Indices de la tabla `instructor/ficha`
--
ALTER TABLE `instructor/ficha`
  ADD PRIMARY KEY (`idinstructor`,`idficha`),
  ADD KEY `fk_idficha` (`idficha`);

--
-- Indices de la tabla `jornada`
--
ALTER TABLE `jornada`
  ADD PRIMARY KEY (`idjornada`),
  ADD KEY `iddia` (`iddia`);

--
-- Indices de la tabla `programas`
--
ALTER TABLE `programas`
  ADD PRIMARY KEY (`idprograma`);

--
-- Indices de la tabla `resultados`
--
ALTER TABLE `resultados`
  ADD PRIMARY KEY (`idresultado`),
  ADD KEY `idcompetencia` (`idcompetencia`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignacion`
--
ALTER TABLE `asignacion`
  MODIFY `idasignacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `competencias`
--
ALTER TABLE `competencias`
  MODIFY `idcompetencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `dias`
--
ALTER TABLE `dias`
  MODIFY `iddia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `idhorario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jornada`
--
ALTER TABLE `jornada`
  MODIFY `idjornada` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `resultados`
--
ALTER TABLE `resultados`
  MODIFY `idresultado` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ambiente/competencia`
--
ALTER TABLE `ambiente/competencia`
  ADD CONSTRAINT `ambiente/competencia_ibfk_1` FOREIGN KEY (`idambiente`) REFERENCES `ambientes` (`idambiente`),
  ADD CONSTRAINT `ambiente/competencia_ibfk_2` FOREIGN KEY (`idcompetencia`) REFERENCES `competencias` (`idcompetencia`);

--
-- Filtros para la tabla `competencias`
--
ALTER TABLE `competencias`
  ADD CONSTRAINT `competencias_ibfk_1` FOREIGN KEY (`idinstructor`) REFERENCES `instructor` (`id`),
  ADD CONSTRAINT `competencias_ibfk_2` FOREIGN KEY (`idjornada`) REFERENCES `jornada` (`idjornada`);

--
-- Filtros para la tabla `dias`
--
ALTER TABLE `dias`
  ADD CONSTRAINT `dias_ibfk_1` FOREIGN KEY (`idhorario`) REFERENCES `horario` (`idhorario`);

--
-- Filtros para la tabla `ficha/competencia`
--
ALTER TABLE `ficha/competencia`
  ADD CONSTRAINT `fk_cod_comp` FOREIGN KEY (`idcompetencia`) REFERENCES `competencias` (`idcompetencia`),
  ADD CONSTRAINT `fk_idcompetencia` FOREIGN KEY (`idcompetencia`) REFERENCES `competencias` (`idcompetencia`);

--
-- Filtros para la tabla `fichas`
--
ALTER TABLE `fichas`
  ADD CONSTRAINT `fichas_ibfk_1` FOREIGN KEY (`idprograma`) REFERENCES `programas` (`idprograma`);

--
-- Filtros para la tabla `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `horario_ibfk_1` FOREIGN KEY (`iddia`) REFERENCES `dias` (`iddia`),
  ADD CONSTRAINT `horario_ibfk_2` FOREIGN KEY (`idjornada`) REFERENCES `jornada` (`idjornada`);

--
-- Filtros para la tabla `instructor/competencia`
--
ALTER TABLE `instructor/competencia`
  ADD CONSTRAINT `instructor/competencia_ibfk_1` FOREIGN KEY (`idinstructor`) REFERENCES `instructor` (`id`),
  ADD CONSTRAINT `instructor/competencia_ibfk_2` FOREIGN KEY (`idcompetencia`) REFERENCES `competencias` (`idcompetencia`);

--
-- Filtros para la tabla `instructor/ficha`
--
ALTER TABLE `instructor/ficha`
  ADD CONSTRAINT `fk_idficha` FOREIGN KEY (`idficha`) REFERENCES `fichas` (`idficha`),
  ADD CONSTRAINT `fk_indinstructor` FOREIGN KEY (`idinstructor`) REFERENCES `instructor` (`id`);

--
-- Filtros para la tabla `jornada`
--
ALTER TABLE `jornada`
  ADD CONSTRAINT `jornada_ibfk_1` FOREIGN KEY (`iddia`) REFERENCES `dias` (`iddia`);

--
-- Filtros para la tabla `resultados`
--
ALTER TABLE `resultados`
  ADD CONSTRAINT `resultados_ibfk_1` FOREIGN KEY (`idcompetencia`) REFERENCES `competencias` (`idcompetencia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
