-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-02-2024 a las 15:14:02
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
-- Base de datos: `tesisyanami`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_asesor`
--

CREATE TABLE `tb_asesor` (
  `ID` int(11) NOT NULL,
  `DNI` varchar(8) NOT NULL,
  `Nombres` varchar(255) NOT NULL,
  `Apellidos` varchar(255) NOT NULL,
  `Especialidad` int(11) NOT NULL,
  `Celular` varchar(9) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Usuario` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Foto` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_asesor`
--

INSERT INTO `tb_asesor` (`ID`, `DNI`, `Nombres`, `Apellidos`, `Especialidad`, `Celular`, `Email`, `Usuario`, `Password`, `Foto`) VALUES
(1, '74136521', 'Frank Fitzgerald', 'Minaya Rosas de la Vega', 3, '970325135', 'minayafrank4@gmail.com', 'frank21', '$2y$10$lBbHydZgeduTjhUjd5dnC.ITOzdWkPFvjnZz.bQ4h3bpS3JS9GYEy', 'frank.png'),
(2, '74136532', 'Alexander', 'Minaya Rosas de la Vega', 2, '924309626', 'minaya0209@hotmail.com', 'alex02', '$2y$10$8OdxNUyDOfM16ue8FzjsA.Yh/jhiihDCiTs.m96ZQGh.UuupojaUy', 'alexander.png'),
(3, '74136627', 'Glenn William', 'Minaya Rosas de la Vega', 1, '978741123', 'glennminaya9@gmail.com', 'glenn06', '$2y$10$Q9pRprUaYePZLWKugSmI2uMDARf/0YjWkZyTNVWVKuzXgm6WWqspK', 'glenn.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_asesor_social`
--

CREATE TABLE `tb_asesor_social` (
  `ID` int(11) NOT NULL,
  `Asesor` int(11) NOT NULL,
  `Social` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_asesor_social`
--

INSERT INTO `tb_asesor_social` (`ID`, `Asesor`, `Social`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_banco`
--

CREATE TABLE `tb_banco` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_banco`
--

INSERT INTO `tb_banco` (`ID`, `Nombre`) VALUES
(1, 'BCP'),
(2, 'Scotiabank'),
(3, 'Banco de la Nación'),
(4, 'BBVA'),
(5, 'En efectivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_cliente`
--

CREATE TABLE `tb_cliente` (
  `ID` int(11) NOT NULL,
  `DNI` varchar(8) NOT NULL,
  `Nombres` varchar(255) NOT NULL,
  `Apellidos` varchar(255) NOT NULL,
  `Celular` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_cliente`
--

INSERT INTO `tb_cliente` (`ID`, `DNI`, `Nombres`, `Apellidos`, `Celular`) VALUES
(1, '74136521', 'THGRGFR', 'GRGRG', '987456100'),
(2, '74165200', 'Efrain', 'Minaya Rosas de la Vega', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_correo_electronico`
--

CREATE TABLE `tb_correo_electronico` (
  `ID` int(11) NOT NULL,
  `Remitente` int(11) NOT NULL,
  `Destinatario` int(11) NOT NULL,
  `Asunto` varchar(255) NOT NULL,
  `Cuerpo` text NOT NULL,
  `FechaEnvio` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Favorito` char(1) NOT NULL DEFAULT '0',
  `Archivado` char(1) NOT NULL DEFAULT '0',
  `Estado` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_detalle`
--

CREATE TABLE `tb_detalle` (
  `ID` int(11) NOT NULL,
  `Venta` int(11) NOT NULL,
  `Servicio` int(11) NOT NULL,
  `PrecioVenta` decimal(18,2) NOT NULL,
  `Pago` decimal(18,2) NOT NULL,
  `Descuento` decimal(18,2) NOT NULL,
  `Banco` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_detalle`
--

INSERT INTO `tb_detalle` (`ID`, `Venta`, `Servicio`, `PrecioVenta`, `Pago`, `Descuento`, `Banco`) VALUES
(1, 1, 3, 70.00, 70.00, 0.00, 3),
(2, 2, 3, 70.00, 10.00, 0.00, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_escuela`
--

CREATE TABLE `tb_escuela` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_escuela`
--

INSERT INTO `tb_escuela` (`ID`, `Nombre`) VALUES
(1, 'Administración'),
(2, 'Administración de Empresas'),
(3, 'Administración Estratégica'),
(4, 'Administración y Marketing'),
(5, 'Administración y Negocios Internacionales'),
(6, 'Arquitectura'),
(7, 'Bromatología y Nutrición Humana'),
(8, 'Ciencias en la Gestión Educativa con mención en Pedagogía'),
(9, 'Comunicación'),
(10, 'Contabilidad'),
(11, 'Derecho'),
(12, 'Dirección de Marketing y Negocios Globales'),
(13, 'Docencia Superior e Investigación Académica'),
(14, 'Docencia Superior en Investigación'),
(15, 'Educación'),
(16, 'Educación con mención en Docencia y Gestión de la calidad'),
(17, 'Educación con mención en Pedagogía'),
(18, 'Educación Inicial'),
(19, 'Enfermería'),
(20, 'Enfermería en Emergencias y Desastres'),
(21, 'Enfermeria Intensiva'),
(22, 'Gerencia de la Educación'),
(23, 'Gerencia de Servicios de Salud'),
(24, 'Gestión Pública'),
(25, 'Ingeniería Agronómica'),
(26, 'Ingeniería Ambiental'),
(27, 'Ingeniería Civil'),
(28, 'Ingeniería de Producción y Servicios'),
(29, 'Ingeniería de Sistemas'),
(30, 'Ingeniería Pesquera'),
(31, 'Medicina'),
(32, 'Negocios Internacionales'),
(33, 'Psicología'),
(34, 'Psicología Clínica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_especialidad`
--

CREATE TABLE `tb_especialidad` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_especialidad`
--

INSERT INTO `tb_especialidad` (`ID`, `Nombre`) VALUES
(1, 'Editor y Corrector de Estilos'),
(2, 'Estadístico'),
(3, 'Metodólogo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_eventos_calendario`
--

CREATE TABLE `tb_eventos_calendario` (
  `ID` int(11) NOT NULL,
  `Evento` varchar(255) NOT NULL,
  `Color_Evento` varchar(50) NOT NULL,
  `Fecha_Inicio` varchar(20) NOT NULL,
  `Fecha_Fin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_servicio`
--

CREATE TABLE `tb_servicio` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_servicio`
--

INSERT INTO `tb_servicio` (`ID`, `Nombre`, `Descripcion`) VALUES
(1, 'Paquete de PREGRADO', 'Elaboración de proyecto y tesis cumpliendo estrictamente el esquema de la universidad de origen del tesista (PREGRADO)'),
(2, 'Paquete de POSTGRADO', 'Elaboración de proyecto y tesis cumpliendo estrictamente el esquema de la universidad de origen del tesista (POSTGRADO)'),
(3, 'Levantamiento de observaciones', 'Realizar correcciones en los puntos observados por parte del jurado revisor'),
(4, 'Reporte de turnitin', 'Ingresar el trabajo de investigación al software para saber el % de similitud'),
(5, 'Citas y referencias con normas APA', 'Realizar citas y referencias tomando en cuenta la versión de APA que maneja la universidad de origen'),
(6, 'Reducción del 21% a 39%', 'Parafrasear el trabajo en el rango del porcentaje indicado (21% a 39%)'),
(7, 'Reducción del 40% a 59%', 'Parafrasear el trabajo en el rango del porcentaje indicado (40% a 59%)'),
(8, 'Reducción del 60% a 79%', 'Parafrasear el trabajo en el rango del porcentaje indicado (60% a 79%)'),
(9, 'Reducción del 80% a más', 'Parafrasear el trabajo en el rango del porcentaje indicado (80% a más)'),
(10, 'Diapositivas de sustentación', 'Elaboración de diapositivas para la defensa de tesis'),
(11, 'Análisis estadístico con el software SPSS versión 25', 'Elaboración de la estadística descriptiva e inferencial de la tesis'),
(12, 'Análisis estadístico con discusión, conclusiones y recomendaciones', 'Elaboración de la estadística descriptiva e inferencial de la tesis, además de la discusión de resultados, conclusiones y recomendaciones'),
(13, 'Análisis estadístico con discusión, conclusiones, recomendaciones y reporte de similitud del trabajo de investigación al 20%', 'Elaboración de la estadística descriptiva e inferencial de la tesis, además de la discusión de resultados, conclusiones, recomendaciones y el reporte de similitud al 20%');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_situacion_academica`
--

CREATE TABLE `tb_situacion_academica` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_situacion_academica`
--

INSERT INTO `tb_situacion_academica` (`ID`, `Nombre`) VALUES
(1, 'Estudiante'),
(2, 'Bachiller'),
(3, 'Título Profesional'),
(4, 'Maestría'),
(5, 'Segunda Especialidad'),
(6, 'Doctorado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_social`
--

CREATE TABLE `tb_social` (
  `ID` int(11) NOT NULL,
  `Facebook` varchar(100) NOT NULL,
  `Instagram` varchar(100) NOT NULL,
  `Youtube` varchar(100) NOT NULL,
  `LinkedIn` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_social`
--

INSERT INTO `tb_social` (`ID`, `Facebook`, `Instagram`, `Youtube`, `LinkedIn`) VALUES
(1, 'https://www.facebook.com/frank.minaya.7', 'https://www.instagram.com/frank_minaya21/', '', 'https://www.linkedin.com/in/m-o-adm-frank-minaya-rosas-de-la-vega-51a36714b/'),
(2, 'https://www.facebook.com/alexanderminayarv', 'https://www.instagram.com/alexanderminayarv/', 'https://www.youtube.com/channel/UCTFqRETTVIxQX278nkkQ62Q', 'https://www.linkedin.com/in/alexanderminayarv/'),
(3, 'https://www.facebook.com/glenn.minaya.9', 'https://www.instagram.com/glennminaya0602/', '', 'https://www.linkedin.com/in/glennminaya/');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_trabajo`
--

CREATE TABLE `tb_trabajo` (
  `ID` int(11) NOT NULL,
  `Titulo` text NOT NULL,
  `Escuela` int(11) NOT NULL,
  `Universidad` int(11) NOT NULL,
  `Situacion_Academica` int(11) NOT NULL,
  `Cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_trabajo`
--

INSERT INTO `tb_trabajo` (`ID`, `Titulo`, `Escuela`, `Universidad`, `Situacion_Academica`, `Cliente`) VALUES
(1, 'rgrgrg', 1, 2, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_universidad`
--

CREATE TABLE `tb_universidad` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_universidad`
--

INSERT INTO `tb_universidad` (`ID`, `Nombre`) VALUES
(1, 'Universidad Alas Peruanas'),
(2, 'Universidad Autónoma de Ica'),
(3, 'Universidad Autónoma del Perú'),
(4, 'Universidad Católica de Trujillo Benedicto XVI'),
(5, 'Universidad César Vallejo'),
(6, 'Universidad de Lima'),
(7, 'Universidad Femenino del Sagrado Corazón'),
(8, 'Universidad Nacional de Educación Enrique Guzmán y Valle'),
(9, 'Universidad Nacional de la Amazonía Peruana'),
(10, 'Universidad Nacional de San Agustín'),
(11, 'Universidad Nacional de Trujillo'),
(12, 'Universidad Nacional del Altiplano'),
(13, 'Universidad Nacional del Callao'),
(14, 'Universidad Nacional José Faustino Sánchez Carrión'),
(15, 'Universidad Nacional Mayor de San Marcos'),
(16, 'Universidad Peruana Cayetano Heredia'),
(17, 'Universidad Privada Telesup'),
(18, 'Universidad San Pedro'),
(19, 'Universidad Señor de Sipán'),
(20, 'Universidad Tecnológica del Perú');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_venta`
--

CREATE TABLE `tb_venta` (
  `ID` int(11) NOT NULL,
  `Cliente` int(11) NOT NULL,
  `Monto` decimal(18,2) NOT NULL,
  `Fecha` date NOT NULL,
  `Estado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_venta`
--

INSERT INTO `tb_venta` (`ID`, `Cliente`, `Monto`, `Fecha`, `Estado`) VALUES
(1, 1, 70.00, '2024-01-02', 'Cancelado'),
(2, 1, 10.00, '2024-02-02', 'Pendiente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_asesor`
--
ALTER TABLE `tb_asesor`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Especialidad` (`Especialidad`);

--
-- Indices de la tabla `tb_asesor_social`
--
ALTER TABLE `tb_asesor_social`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Usuario` (`Asesor`),
  ADD KEY `Social` (`Social`);

--
-- Indices de la tabla `tb_banco`
--
ALTER TABLE `tb_banco`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tb_cliente`
--
ALTER TABLE `tb_cliente`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tb_correo_electronico`
--
ALTER TABLE `tb_correo_electronico`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Remitente` (`Remitente`),
  ADD KEY `Destinatario` (`Destinatario`);

--
-- Indices de la tabla `tb_detalle`
--
ALTER TABLE `tb_detalle`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Venta` (`Venta`),
  ADD KEY `Servicio` (`Servicio`),
  ADD KEY `Banco` (`Banco`);

--
-- Indices de la tabla `tb_escuela`
--
ALTER TABLE `tb_escuela`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Nombre` (`Nombre`);

--
-- Indices de la tabla `tb_especialidad`
--
ALTER TABLE `tb_especialidad`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tb_eventos_calendario`
--
ALTER TABLE `tb_eventos_calendario`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tb_servicio`
--
ALTER TABLE `tb_servicio`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tb_situacion_academica`
--
ALTER TABLE `tb_situacion_academica`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tb_social`
--
ALTER TABLE `tb_social`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tb_trabajo`
--
ALTER TABLE `tb_trabajo`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Escuela` (`Escuela`),
  ADD KEY `Universidad` (`Universidad`),
  ADD KEY `Situacion_Academica` (`Situacion_Academica`),
  ADD KEY `Cliente` (`Cliente`);

--
-- Indices de la tabla `tb_universidad`
--
ALTER TABLE `tb_universidad`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Nombre` (`Nombre`);

--
-- Indices de la tabla `tb_venta`
--
ALTER TABLE `tb_venta`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Cliente` (`Cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_asesor`
--
ALTER TABLE `tb_asesor`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tb_asesor_social`
--
ALTER TABLE `tb_asesor_social`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tb_banco`
--
ALTER TABLE `tb_banco`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tb_cliente`
--
ALTER TABLE `tb_cliente`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tb_correo_electronico`
--
ALTER TABLE `tb_correo_electronico`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_detalle`
--
ALTER TABLE `tb_detalle`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tb_escuela`
--
ALTER TABLE `tb_escuela`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `tb_especialidad`
--
ALTER TABLE `tb_especialidad`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tb_eventos_calendario`
--
ALTER TABLE `tb_eventos_calendario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_servicio`
--
ALTER TABLE `tb_servicio`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tb_situacion_academica`
--
ALTER TABLE `tb_situacion_academica`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tb_social`
--
ALTER TABLE `tb_social`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tb_trabajo`
--
ALTER TABLE `tb_trabajo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tb_universidad`
--
ALTER TABLE `tb_universidad`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `tb_venta`
--
ALTER TABLE `tb_venta`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb_asesor`
--
ALTER TABLE `tb_asesor`
  ADD CONSTRAINT `tb_asesor_ibfk_1` FOREIGN KEY (`Especialidad`) REFERENCES `tb_especialidad` (`ID`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_asesor_social`
--
ALTER TABLE `tb_asesor_social`
  ADD CONSTRAINT `tb_asesor_social_ibfk_1` FOREIGN KEY (`Asesor`) REFERENCES `tb_asesor` (`ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_asesor_social_ibfk_2` FOREIGN KEY (`Social`) REFERENCES `tb_social` (`ID`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_correo_electronico`
--
ALTER TABLE `tb_correo_electronico`
  ADD CONSTRAINT `tb_correo_electronico_ibfk_1` FOREIGN KEY (`Remitente`) REFERENCES `tb_asesor` (`ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_correo_electronico_ibfk_2` FOREIGN KEY (`Destinatario`) REFERENCES `tb_asesor` (`ID`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_detalle`
--
ALTER TABLE `tb_detalle`
  ADD CONSTRAINT `tb_detalle_ibfk_1` FOREIGN KEY (`Venta`) REFERENCES `tb_venta` (`ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detalle_ibfk_2` FOREIGN KEY (`Servicio`) REFERENCES `tb_servicio` (`ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detalle_ibfk_3` FOREIGN KEY (`Banco`) REFERENCES `tb_banco` (`ID`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_trabajo`
--
ALTER TABLE `tb_trabajo`
  ADD CONSTRAINT `tb_trabajo_ibfk_1` FOREIGN KEY (`Escuela`) REFERENCES `tb_escuela` (`ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_trabajo_ibfk_2` FOREIGN KEY (`Universidad`) REFERENCES `tb_universidad` (`ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_trabajo_ibfk_7` FOREIGN KEY (`Situacion_Academica`) REFERENCES `tb_situacion_academica` (`ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_trabajo_ibfk_8` FOREIGN KEY (`Cliente`) REFERENCES `tb_cliente` (`ID`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_venta`
--
ALTER TABLE `tb_venta`
  ADD CONSTRAINT `tb_venta_ibfk_1` FOREIGN KEY (`Cliente`) REFERENCES `tb_cliente` (`ID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
