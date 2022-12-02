-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-02-2022 a las 16:18:19
-- Versión del servidor: 8.0.28
-- Versión de PHP: 8.1.2

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
  `idambiente` int NOT NULL,
  `idcompetencia` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ambientes`
--

CREATE TABLE `ambientes` (
  `idambiente` int NOT NULL,
  `ambiente` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `competencias`
--

CREATE TABLE `competencias` (
  `idcompetencia` int NOT NULL,
  `competencia` varchar(30) NOT NULL,
  `duracion` int NOT NULL,
  `idinstructor` int NOT NULL,
  `idjornada` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dias`
--

CREATE TABLE `dias` (
  `iddia` int NOT NULL,
  `dia` varchar(15) NOT NULL,
  `hora` int DEFAULT NULL,
  `idhorario` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha/competencia`
--

CREATE TABLE `ficha/competencia` (
  `idficha` int NOT NULL,
  `idcompetencia` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fichas`
--

CREATE TABLE `fichas` (
  `idficha` int NOT NULL,
  `ficha` varchar(30) NOT NULL,
  `inico` date NOT NULL,
  `final` date NOT NULL,
  `idprograma` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `idhorario` int NOT NULL,
  `horario` varchar(50) NOT NULL,
  `iddia` int NOT NULL,
  `idjornada` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instructor`
--

CREATE TABLE `instructor` (
  `idinstructor` int NOT NULL,
  `id` int NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `telefono` int NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instructor/competencia`
--

CREATE TABLE `instructor/competencia` (
  `idinstructro` int NOT NULL,
  `idcompetencia` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instructor/ficha`
--

CREATE TABLE `instructor/ficha` (
  `idinstructor` int NOT NULL,
  `idficha` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jornada`
--

CREATE TABLE `jornada` (
  `idjornada` int NOT NULL,
  `jornada` varchar(15) NOT NULL,
  `iddia` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programas`
--

CREATE TABLE `programas` (
  `idprograma` int NOT NULL,
  `programa` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nivel` varchar(15) NOT NULL,
  `horas_productivas` int NOT NULL,
  `horas_lectivas` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados`
--

CREATE TABLE `resultados` (
  `idresultado` int NOT NULL,
  `resultado` varchar(50) NOT NULL,
  `idcompetencia` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  ADD PRIMARY KEY (`idinstructro`,`idcompetencia`),
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
-- AUTO_INCREMENT de la tabla `competencias`
--
ALTER TABLE `competencias`
  MODIFY `idcompetencia` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `dias`
--
ALTER TABLE `dias`
  MODIFY `iddia` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `idhorario` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jornada`
--
ALTER TABLE `jornada`
  MODIFY `idjornada` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `resultados`
--
ALTER TABLE `resultados`
  MODIFY `idresultado` int NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ambiente/competencia`
--
ALTER TABLE `ambiente/competencia`
  ADD CONSTRAINT `ambiente/competencia_ibfk_1` FOREIGN KEY (`idambiente`) REFERENCES `ambientes` (`idambiente`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `ambiente/competencia_ibfk_2` FOREIGN KEY (`idcompetencia`) REFERENCES `competencias` (`idcompetencia`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `competencias`
--
ALTER TABLE `competencias`
  ADD CONSTRAINT `competencias_ibfk_1` FOREIGN KEY (`idinstructor`) REFERENCES `instructor` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `competencias_ibfk_2` FOREIGN KEY (`idjornada`) REFERENCES `jornada` (`idjornada`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `dias`
--
ALTER TABLE `dias`
  ADD CONSTRAINT `dias_ibfk_1` FOREIGN KEY (`idhorario`) REFERENCES `horario` (`idhorario`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `ficha/competencia`
--
ALTER TABLE `ficha/competencia`
  ADD CONSTRAINT `fk_cod_comp` FOREIGN KEY (`idcompetencia`) REFERENCES `competencias` (`idcompetencia`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_idcompetencia` FOREIGN KEY (`idcompetencia`) REFERENCES `competencias` (`idcompetencia`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `fichas`
--
ALTER TABLE `fichas`
  ADD CONSTRAINT `fichas_ibfk_1` FOREIGN KEY (`idprograma`) REFERENCES `programas` (`idprograma`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `horario_ibfk_1` FOREIGN KEY (`iddia`) REFERENCES `dias` (`iddia`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `horario_ibfk_2` FOREIGN KEY (`idjornada`) REFERENCES `jornada` (`idjornada`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `instructor/competencia`
--
ALTER TABLE `instructor/competencia`
  ADD CONSTRAINT `instructor/competencia_ibfk_1` FOREIGN KEY (`idinstructro`) REFERENCES `instructor` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `instructor/competencia_ibfk_2` FOREIGN KEY (`idcompetencia`) REFERENCES `competencias` (`idcompetencia`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `instructor/ficha`
--
ALTER TABLE `instructor/ficha`
  ADD CONSTRAINT `fk_idficha` FOREIGN KEY (`idficha`) REFERENCES `fichas` (`idficha`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_indinstructor` FOREIGN KEY (`idinstructor`) REFERENCES `instructor` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `jornada`
--
ALTER TABLE `jornada`
  ADD CONSTRAINT `jornada_ibfk_1` FOREIGN KEY (`iddia`) REFERENCES `dias` (`iddia`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `resultados`
--
ALTER TABLE `resultados`
  ADD CONSTRAINT `resultados_ibfk_1` FOREIGN KEY (`idcompetencia`) REFERENCES `competencias` (`idcompetencia`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
