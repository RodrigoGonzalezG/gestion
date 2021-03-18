-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-03-2021 a las 18:21:08
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `control_gestion`
--
CREATE DATABASE IF NOT EXISTS `control_gestion` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `control_gestion`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_area`
--

CREATE TABLE `cat_area` (
  `IdArea` int(5) NOT NULL,
  `NombreArea` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `Activo` varchar(2) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cat_area`
--

INSERT INTO `cat_area` (`IdArea`, `NombreArea`, `Activo`) VALUES
(0, 'Pendiente', 'No'),
(1, 'Subsecretario', 'Si'),
(2, 'Secretario Particular', 'No'),
(3, 'Coordinación de Planeacion y Recuperacion de Espacios Publicos', 'No'),
(4, 'Coordinacion de Asuntos Juridicos y Enlace Interinstitucional', 'No'),
(5, 'Direccion de Programas de Alcaldias', 'Si'),
(6, 'Subdireccion de Establecimientos Mercantiles', 'Si'),
(7, 'Direccion de Ordenamiento y Seguimiento al Comercio en Via Publica', 'Si'),
(8, 'Subdireccion de Seguimiento al Reordenamiento del Comercio en la Via Publica', 'No'),
(9, 'Subdireccion de Estudios, Proyectos y Analisis del Comercio en la Via Publica', 'No'),
(10, 'J.U.D. de Enlace Administrativo', 'Si'),
(11, 'Oficina de Informacion Publica', 'No'),
(12, 'Subdirección de Sistemas de Informacion', 'No'),
(13, 'Oficialia de partes', 'Si'),
(14, 'Subdirección Seguimiento al Reordenamiento', 'No'),
(15, 'Asesora de la Secretaria de Gobierno', 'No'),
(16, 'Coordinacion Juridica y Normativa', 'Si'),
(17, 'Direccion General de Ordenamiento de la Via Publica del Centro Historico', 'Si'),
(18, 'Direccion de Cabilos y Enlace con Alcaldias', 'Si'),
(19, 'Peticiones de Informacion', 'Si'),
(20, 'Asesor de la Secretaría de Gobierno', 'Si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_atencion`
--

CREATE TABLE `cat_atencion` (
  `IdAtencion` int(5) NOT NULL,
  `TipoAtencion` varchar(60) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cat_atencion`
--

INSERT INTO `cat_atencion` (`IdAtencion`, `TipoAtencion`) VALUES
(1, 'Atencion'),
(2, 'SEGUIMIENTO'),
(3, 'CONOCIMIENTO'),
(4, 'NOTAS ENLACE LEGISTATIVO'),
(5, 'ARCHIVO'),
(6, 'ACUERDO CON EL SUBSECRETARIO'),
(7, 'ASISTIR'),
(8, 'OTRO'),
(9, 'CONTESTAR DIRECTAMENTE AL INTERESADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_usuario`
--

CREATE TABLE `cat_usuario` (
  `idUsuario` int(5) NOT NULL,
  `Nombre` varchar(160) COLLATE utf8_spanish_ci NOT NULL,
  `UserName` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Password` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `Activo` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `FkArea` int(5) NOT NULL,
  `TipoUser` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(90) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cat_usuario`
--

INSERT INTO `cat_usuario` (`idUsuario`, `Nombre`, `UserName`, `Password`, `Activo`, `FkArea`, `TipoUser`, `correo`) VALUES
(2, 'Administrador', 'admin', 'admin', 'Si', 13, 'Administrador', 'Admin@hotmail.com'),
(3, 'Silvia Aburto', 'saburtor', 'sar69', 'Si', 13, 'Administrador', 'sissy691@hotmail.com'),
(4, 'Leonardo Ortiz', 'ORROLEON', '3746573L', 'Si', 13, 'Administrador', ''),
(5, 'Jesus Valdez San Vicente', 'Jesus', '1992', 'No', 13, 'Administrador', ''),
(6, 'VIRGINIA IBAÑEZ ZEPEDA', 'DIRECCION', 'DPA', 'Si', 5, 'Captura', ''),
(7, 'VERONICA MADRID ALCALA', 'Veronica', '2726', 'Si', 18, 'Captura', 'rcostay@secgob.cdmx.gob.mx'),
(8, 'HAYDE FERNANDEZ AYALA', 'Hayde', '2107', 'Si', 18, 'Captura', 'rcostay@secgob.cdmx.gob.mx'),
(9, 'MARIA DEL CARMEN OLIVERA REYES', 'CarmenO', 'seermo03', 'Si', 16, 'Captura', 'carmenoli_reyes@live.com'),
(10, 'CAROLINA ROMERO ROMERO', 'Simjang-Romero', 'Rami1987', 'Si', 10, 'Captura', 'ymalagonm@cdmx.gob.mx'),
(11, 'MA FERNANDA SANTOS GARCIA', 'mafer', '35913971', 'Si', 13, 'Administrador', 'maryfer.sec.gob@gmail.com'),
(12, 'JOSE CARLOS HUICOCHEA NEGRETE', 'CarlosSubse', 'Subse', 'Si', 19, 'Captura', 'carlos.huicochea.negrete@gmail.com'),
(13, 'CARMEN ALICIA RENTERIA GUTIERREZ', 'Sistemas', 'Sisco2019', 'Si', 5, 'Captura', 'aliscar8597@gmail.com'),
(14, 'MARIA TERESA RAMIREZ MIRANDA', 'Tere Ramirez', 'natalia', 'Si', 7, 'Captura', 'mdiaz@secgob.cdmx.gob.mx'),
(15, 'Maria Fernanda Santos Garcia', 'mafersubsecretario', '35913971', 'Si', 1, 'Captura', ''),
(16, 'Maria Fernanda Santos Garcia', 'maferjuridicos', '35913971', 'No', 4, 'Captura', ''),
(17, 'Maria Fernanda Santos Garcia', 'maferalcaldias', '35913971', 'Si', 5, 'Captura', ''),
(18, 'Maria Fernanda Santos Garcia', 'maferordenamiento', '35913971', 'Si', 7, 'Captura', ''),
(19, 'Maria Fernanda Santos Garcia', 'maferreordenamiento', '35913971', 'No', 8, 'Captura', ''),
(20, 'Maria Fernanda Santos Garcia', 'maferhistorico', '35913971', 'Si', 17, 'Captura', ''),
(21, 'Maria Fernanda Santos Garcia', 'mafercabildos', '35913971', 'Si', 18, 'Captura', ''),
(22, 'ROSARIO DURAN DE LA TRINIDAD', 'SUBDIRECCION DE ANALISIS', 'vila1812', 'Si', 7, 'Consulta', 'vila1812@gmail.com'),
(23, 'EDGAR MARTINEZ LOPEZ', 'Fredy', 'Huerta', 'Si', 7, 'Consulta', ''),
(24, 'CESAR LUNA OSEGUERA', 'Cesar', 'chicharito', 'Si', 13, 'Administrador', 'chicharito.moon.21@gmail.com'),
(25, 'Guadalupe Espinosa Rodríguez', 'Lupita', 'lupita2', 'Si', 13, 'Administrador', 'espinosag325@gmail.com'),
(26, 'Wendy', 'wendy', 'SSPARVP1824', 'Si', 13, 'Administrador', ''),
(27, 'Trinidad Pantoja', 'centrohistorico', 'DESCARGA2020', 'No', 17, 'Captura', ''),
(28, 'TRINIDAD PANTOJA', 'hilario', 'DESCARGA2020', 'Si', 20, 'Captura', ''),
(29, 'Mariela  Pulido Morales', 'Mariela', 'bioma186', 'Si', 17, 'Captura', ''),
(30, 'Raul Beltran', 'CUCO1960', '1960', 'Si', 0, 'Administrador', 'beltranveleza@gmail.com'),
(31, 'KARLA GUADALUPE LUNA MEDINA', 'SSEM', 'SsEM2020', 'Si', 5, 'Captura', ''),
(32, 'ADRIANA ALEJANDRA OLIVARES HERNANDEZ', 'alejandra olivares', 'IIAC', 'Si', 16, 'Captura', 'adrianaalejandra.olivares@gmail.com'),
(33, 'SAMANTA ADALI SEGOVIA ARROYO', 'SAM', 'DPA', 'Si', 13, 'Consulta', 'samileo2@yahoo.com.mx'),
(34, 'MONICA DIAZ LEZAMA', 'monicadiaz', 'SecGob1824', 'Si', 7, 'Captura', 'jessica.rrios2@gmail.com'),
(35, 'Janette Zacarias ', 'Janette', 'ximeldita', 'Si', 17, 'Captura', ''),
(36, 'Elizabeth Chavez Gonzalez', 'elizabeth', 'IIAC', 'Si', 16, 'Captura', 'elychg75@hotmail.com'),
(37, 'KARLA CHAVEZ', 'JUDAD', 'JUDAD2020', 'Si', 17, 'Consulta', 'yokarch_1225@yahoo.com.mx');

-- --------------------------------------------------------

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `digitalizados`
--

CREATE TABLE `digitalizados` (
  `fkTurno` int(5) DEFAULT NULL,
  `Ruta` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `NombreArchivo` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  `TipoArchivo` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `AArchvio` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `digitalizados`
--

INSERT INTO `digitalizados` (`fkTurno`, `Ruta`, `NombreArchivo`, `TipoArchivo`, `AArchvio`) VALUES
(23979, '/adjunto/V.T. 2.pdf', 'V.T. 2.pdf', 'O', 13),
(23980, '/adjunto/VOL. 3.pdf', 'VOL. 3.pdf', 'O', 13),
(23978, '/adjunto/V.T. 1.pdf', 'V.T. 1.pdf', 'O', 13),
(23981, '/adjunto/V.T. 4.pdf', 'V.T. 4.pdf', 'O', 13),
(23980, '/adjunto/VOL. 3.pdf', 'VOL. 3.pdf', 'O', 13),
(23987, '/adjunto/V.T-10.pdf', 'V.T-10.pdf', 'O', 13),
(23984, '/adjunto/vol. 7.pdf', 'vol. 7.pdf', 'O', 13),
(23979, '/adjunto/004 A OFIC. ELECTRONICO .pdf', '004 A OFIC. ELECTRONICO .pdf', 'R', 13),
(23988, '/adjunto/0011A.pdf', '0011A.pdf', 'O', 13),
(23989, '/adjunto/0012A.pdf', '0012A.pdf', 'O', 13),
(23990, '/adjunto/0013A.pdf', '0013A.pdf', 'O', 13),
(23991, '/adjunto/0014A.pdf', '0014A.pdf', 'O', 13),
(23994, '/adjunto/0017A.pdf', '0017A.pdf', 'O', 13),
(23996, '/adjunto/0019A.pdf', '0019A.pdf', 'O', 13),
(23995, '/adjunto/0018A.pdf', '0018A.pdf', 'O', 13),
(23986, '/adjunto/V.T.9.pdf', 'V.T.9.pdf', 'O', 13),
(23997, '/adjunto/0020A.pdf', '0020A.pdf', 'O', 13),
(23998, '/adjunto/0021A.pdf', '0021A.pdf', 'O', 13),
(23999, '/adjunto/0022A.pdf', '0022A.pdf', 'O', 13),
(23993, '/adjunto/vol.  16.pdf', 'vol.  16.pdf', 'O', 13),
(24000, '/adjunto/0023A.pdf', '0023A.pdf', 'O', 13),
(23982, '/adjunto/V.T.5.pdf', 'V.T.5.pdf', 'O', 13),
(23983, '/adjunto/V.T.6.pdf', 'V.T.6.pdf', 'O', 13),
(23985, '/adjunto/V.T.8.pdf', 'V.T.8.pdf', 'O', 13),
(24001, '/adjunto/0024A.pdf', '0024A.pdf', 'O', 13),
(24002, '/adjunto/0025A.pdf', '0025A.pdf', 'O', 13),
(24003, '/adjunto/0026A.pdf', '0026A.pdf', 'O', 13),
(24004, '/adjunto/0027A.pdf', '0027A.pdf', 'O', 13),
(24005, '/adjunto/0028A.pdf', '0028A.pdf', 'O', 13),
(24006, '/adjunto/0029A.pdf', '0029A.pdf', 'O', 13),
(24007, '/adjunto/0030A.pdf', '0030A.pdf', 'O', 13),
(24008, '/adjunto/0031A.pdf', '0031A.pdf', 'O', 13),
(24009, '/adjunto/0032A.pdf', '0032A.pdf', 'O', 13),
(24011, '/adjunto/0034A.pdf', '0034A.pdf', 'O', 13),
(23989, '/adjunto/S SG SSPARVP DOSCVP SOCVP 001 2021.pdf', 'S SG SSPARVP DOSCVP SOCVP 001 2021.pdf', 'R', 7),
(23981, '/adjunto/OFO_014 VT 001  C. ANÓNIMO..pdf', 'OFO_014 VT 001  C. ANÓNIMO..pdf', 'R', 17),
(23983, '/adjunto/OFO_012_VT 009 C. ANÓNIMO..pdf', 'OFO_012_VT 009 C. ANÓNIMO..pdf', 'R', 17),
(23984, '/adjunto/OFO_017_VT 012 C. SUSANA ARIAS VARGAS..pdf', 'OFO_017_VT 012 C. SUSANA ARIAS VARGAS..pdf', 'R', 17),
(23985, '/adjunto/OFO _015 VT 011 C. CARIDAD AGUILAR DORANTES..pdf', 'OFO _015 VT 011 C. CARIDAD AGUILAR DORANTES..pdf', 'R', 17),
(23986, '/adjunto/OFO_013_ VT 010 C. ANÓNIMO..pdf', 'OFO_013_ VT 010 C. ANÓNIMO..pdf', 'R', 17),
(23990, '/adjunto/OFO_016 VT_013 C. LILIANA CASTILLO TELLO..pdf', 'OFO_016 VT_013 C. LILIANA CASTILLO TELLO..pdf', 'R', 17),
(23998, '/adjunto/OFO_018_VT 014 C. SALO..pdf', 'OFO_018_VT 014 C. SALO..pdf', 'R', 17),
(24000, '/adjunto/OFO _019_VT 016 C. ANÓNIMO..pdf', 'OFO _019_VT 016 C. ANÓNIMO..pdf', 'R', 17),
(24001, '/adjunto/OFO_020_VT 017 C. BLANCA VIRIDIANA RODRÍGUEZ GUTIÉRREZ.pdf', 'OFO_020_VT 017 C. BLANCA VIRIDIANA RODRÍGUEZ GUTIÉRREZ.pdf', 'R', 17),
(24013, '/adjunto/0036A.pdf', '0036A.pdf', 'O', 13),
(24014, '/adjunto/0037A.pdf', '0037A.pdf', 'O', 13),
(24015, '/adjunto/0038A.pdf', '0038A.pdf', 'O', 13),
(24016, '/adjunto/0039A.pdf', '0039A.pdf', 'O', 13),
(24017, '/adjunto/0040A.pdf', '0040A.pdf', 'O', 13),
(24018, '/adjunto/0041A.pdf', '0041A.pdf', 'O', 13),
(24020, '/adjunto/0043A.pdf', '0043A.pdf', 'O', 13),
(24021, '/adjunto/0044A.pdf', '0044A.pdf', 'O', 13),
(24022, '/adjunto/0045A.pdf', '0045A.pdf', 'O', 13),
(24023, '/adjunto/0046A.pdf', '0046A.pdf', 'O', 13),
(24024, '/adjunto/0047A.pdf', '0047A.pdf', 'O', 13),
(24025, '/adjunto/0048A.pdf', '0048A.pdf', 'O', 13),
(24026, '/adjunto/0049A.pdf', '0049A.pdf', 'O', 13),
(24027, '/adjunto/0050A.pdf', '0050A.pdf', 'O', 13),
(23982, '/adjunto/R SG SSPARVP DOSCVP 005 2021.pdf', 'R SG SSPARVP DOSCVP 005 2021.pdf', 'R', 7),
(23988, '/adjunto/S SGSSPARVP DOSCVP 006 2021.pdf', 'S SGSSPARVP DOSCVP 006 2021.pdf', 'R', 7),
(24008, '/adjunto/S SG SSPARVP DOSCVP SOCVP 003 2021.pdf', 'S SG SSPARVP DOSCVP SOCVP 003 2021.pdf', 'R', 7),
(24009, '/adjunto/R SG SSPARVP DOSCVP SOCVP 002 2021.pdf', 'R SG SSPARVP DOSCVP SOCVP 002 2021.pdf', 'R', 7),
(23989, '/adjunto/R SG SSPARVP DOSCVP SOCVP 005 2021.pdf', 'R SG SSPARVP DOSCVP SOCVP 005 2021.pdf', 'R', 7),
(23992, '/adjunto/0015AA.pdf', '0015AA.pdf', 'O', 13),
(24020, '/adjunto/OFO_028_VT 024 C. AZUCENA MARÍA FERNANDEZ ISLAS MIER.pdf', 'OFO_028_VT 024 C. AZUCENA MARÍA FERNANDEZ ISLAS MIER.pdf', 'R', 17),
(24023, '/adjunto/R SG SSPARVP DOSCVP SOCVP 004 2021.pdf', 'R SG SSPARVP DOSCVP SOCVP 004 2021.pdf', 'R', 7),
(24027, '/adjunto/OFO_029_VT  027  C. RAUL MORALES SALINAS SUAC 140121639565.pdf', 'OFO_029_VT  027  C. RAUL MORALES SALINAS SUAC 140121639565.pdf', 'R', 17),
(24008, '/adjunto/R SG SSPARVP DOSCVP SOCVP 007 2021.pdf', 'R SG SSPARVP DOSCVP SOCVP 007 2021.pdf', 'R', 7),
(24010, '/adjunto/0033AA.pdf', '0033AA.pdf', 'O', 13),
(23978, '/adjunto/1-2021.pdf', '1-2021.pdf', 'R', 10),
(24019, '/adjunto/V.T. 42.pdf', 'V.T. 42.pdf', 'R', 20),
(24007, '/adjunto/RESP. VOL. 030.pdf', 'RESP. VOL. 030.pdf', 'R', 5),
(24012, '/adjunto/0035AA.pdf', '0035AA.pdf', 'O', 13),
(24008, '/adjunto/R SG SSPARVP DOSCVP SOCVP 011 2021.pdf', 'R SG SSPARVP DOSCVP SOCVP 011 2021.pdf', 'R', 7),
(23987, '/adjunto/Oficio SG.SSPARVP.DPA.308.2020.pdf', 'Oficio SG.SSPARVP.DPA.308.2020.pdf', 'R', 5),
(23987, '/adjunto/Zimbra_DPA.308.2020.pdf', 'Zimbra_DPA.308.2020.pdf', 'R', 5),
(23997, '/adjunto/010 A ELECTRONICO .pdf', '010 A ELECTRONICO .pdf', 'R', 5),
(23999, '/adjunto/OFICIO SG.SSPARVP.DPA.012.2021.pdf', 'OFICIO SG.SSPARVP.DPA.012.2021.pdf', 'R', 5),
(23999, '/adjunto/Zimbra_DPA.012.2021.pdf', 'Zimbra_DPA.012.2021.pdf', 'R', 5),
(24011, '/adjunto/034 A ELECTRONICO .pdf', '034 A ELECTRONICO .pdf', 'R', 5),
(24018, '/adjunto/NI 12 2021 DPA.pdf', 'NI 12 2021 DPA.pdf', 'R', 5),
(24021, '/adjunto/NI 11 2021 DPA.pdf', 'NI 11 2021 DPA.pdf', 'R', 5),
(24006, '/adjunto/S SG SSPARVP DOSCVP SACVP 024 2021.pdf', 'S SG SSPARVP DOSCVP SACVP 024 2021.pdf', 'R', 7),
(24024, '/adjunto/Oficio    06     10-03-2021-113515.pdf', 'Oficio    06     10-03-2021-113515.pdf', 'R', 16),
(24025, '/adjunto/Oficio    08     10-03-2021-113547.pdf', 'Oficio    08     10-03-2021-113547.pdf', 'R', 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modificaciones_tdetalle`
--

CREATE TABLE `modificaciones_tdetalle` (
  `IdDetalle` int(5) NOT NULL,
  `FkTurno` int(5) NOT NULL,
  `TurnadoA` int(5) NOT NULL,
  `Respuesta` varchar(1200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Anexo` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Observaciones` varchar(1200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Usuario` int(5) DEFAULT NULL,
  `Fecha_Hora` datetime DEFAULT NULL,
  `Ip_usuario` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modificaciones_turno`
--

CREATE TABLE `modificaciones_turno` (
  `IdTurno` int(5) NOT NULL,
  `NumTurno` int(15) DEFAULT NULL,
  `Fecha_registro` date DEFAULT NULL,
  `NumOficio` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL,
  `FkAtencion` int(5) DEFAULT NULL,
  `Estatus` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `FechaDocumento` date DEFAULT NULL,
  `FechaRecibido` date DEFAULT NULL,
  `FechaLimite` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `VoSg` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `VoSalida` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Remitente` varchar(254) COLLATE utf8_spanish_ci DEFAULT NULL,
  `CargoRemitente` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Promotor` varchar(254) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Asunto` varchar(1300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `OtroAtencion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `eValidado` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `FkResponsable` int(5) DEFAULT NULL,
  `Clasificacion` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Usuario` int(5) DEFAULT NULL,
  `Fecha_Hora` datetime DEFAULT NULL,
  `Ip_usuario` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `responsable_area`
--

CREATE TABLE `responsable_area` (
  `IdResponsable` int(5) NOT NULL,
  `FkArea` int(5) DEFAULT NULL,
  `NombreResponsable` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `CargoResponsable` varchar(254) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Activo` varchar(2) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `responsable_area`
--

INSERT INTO `responsable_area` (`IdResponsable`, `FkArea`, `NombreResponsable`, `CargoResponsable`, `Activo`) VALUES
(0, 0, 'Pendiente', 'Pendiente', '1'),
(1, 1, 'José Augusto Ibarra  Velázquez', 'Subsecretario de Programas Delegacionales y Reordenamiento de la Vía Pública', '0'),
(2, 2, 'Irving Gabriel Paredes Rangel', 'Secretario particular', '0'),
(3, 5, 'Juan Jóse Méndez Larios', 'Director De Programas Delegacionales', '0'),
(4, 4, 'Enrique Del Valle Sandoval', 'Coordinador De Asuntos Jurídicos Y Enlace Interinstitucional', '0'),
(5, 9, 'Abel Noriega Varela', 'Subdirector De Estudios, Proyectos Y Análisis Del Comercio En Vía Pública', '0'),
(6, 12, 'Ernesto Martínez Torres', 'Subdirector De Sistemas De Información', '0'),
(7, 6, 'Elizabeth Peña López', 'Subdirectora De Estableciemientos Mercantiles', '0'),
(8, 0, 'Irwin Carballo Molina', 'J.U.D. Delegacional Zona Norte', '0'),
(9, 0, 'Malagón Torres Ricardo', 'J.U.D. Delegacional Zona Sur', '0'),
(10, 0, 'Rafaela Vargas Rangel', 'J.U.D. De Establecimientos Mercantiles Y Espectáculos Públicos', '0'),
(11, 1, 'Lic. José de Jesus Adam Fernandez', 'Subsecretario de Programas Delegacionales y Reordenamiento de la Vía Pública', '0'),
(12, 1, 'José Francisco García Acevedo', 'Subsecretario de Programas Delegacionales y Reordenamiento de la Vía Pública', '0'),
(13, 6, 'García Robledo Rodrigo', 'Subdirector De Estableciemientos Mercantiles', '0'),
(14, 12, 'Rogelio Charrez Bahena', 'Subdirector De Sistemas De Información', '0'),
(15, 5, 'Liliana Dehesa Aquino', 'Directora De Programas Delegacionales', '0'),
(16, 10, 'Karina Ramírez Contreras', 'J.U.D. Enlace Administrativo', '0'),
(17, 7, 'Herbert Olivera Sánchez', 'Director De Reordenamiento Del Comercio En Vía Pública', '0'),
(18, 0, 'Maciel Cruz Avila', 'Pendiente', '0'),
(19, 2, 'Iván Moisés Aparicio Camacho', 'Secretario particular', '0'),
(20, 10, 'Genoveva Moreno Galindo', 'J.U.D. Enlace Administrativo', '0'),
(21, 5, 'Claudia Guadalupe Vazquez Martinez', 'Directora De Programas Delegacionales', '0'),
(22, 2, 'Adolfo Elwes Fernández', 'Secretario Particular', '0'),
(23, 1, 'Martín Israel Guevara Montiel', 'Subsecretario de Programas Delegacionales y Reordenamiento de la Vía Pública', '0'),
(24, 12, 'Mario Alberto Rodríguez Gutiérrez', 'Subdirector De Sistemas De Información', '0'),
(25, 2, 'Montserrat Flores Díaz Del Castillo', 'Secretaria Particular', '0'),
(26, 1, 'Avelino Méndez Rangel ', 'Susbsecretario de Programas de Alcaldías y Reordenamiento de la Vía Pública', '1'),
(27, 16, 'Manuel Ortega Guzmán', 'Coordinador Jurídico', '0'),
(28, 17, 'Oswaldo Montoya Alfaro', 'Director General de Ordenamiento de la Vía Pública del Centro Histórico', '1'),
(29, 5, 'Samanta Adalí Arroyo Segovia', 'Directora de Programas de Alcaldías', '1'),
(30, 7, 'Mónica Gabriela Lezama Díaz', 'Directora de Ordenamiento y Seguimiento al Comercio en Vía Pública', '1'),
(31, 18, 'Ramón Ayube Costa', 'Director de Cabildos y Enlace con Alcaldías', '1'),
(32, 10, 'Telésforo Alvarado Carmona', 'J.U.D. de Enlace Administrativo', '0'),
(33, 19, 'José Carlos Negrete Huicochea', 'Peticiones de Información', '1'),
(34, 20, 'Hilario Nolasco', 'Asesor de la Secretaría de Gobierno', '1'),
(35, 5, 'Rodrigo', 'Empleado', '0'),
(36, 16, 'IXCHEL IRALIA ANGUIANO CASTREJON', 'COORDINADORA JURIDICA Y NORMATIVA ', '1'),
(37, 10, 'Jessica Reyna Ceja Bautista', 'J.U.D de Enlace Administrativo', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento_detalle`
--

CREATE TABLE `seguimiento_detalle` (
  `IdSeguimiento` int(5) NOT NULL,
  `FkDetalle` int(5) NOT NULL,
  `Seguimiento` varchar(700) COLLATE utf8_spanish_ci NOT NULL,
  `FechaCapturo` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `seguimiento_detalle`
--

INSERT INTO `seguimiento_detalle` (`IdSeguimiento`, `FkDetalle`, `Seguimiento`, `FechaCapturo`) VALUES
(3085, 10292, 'SE ENVIO OFICIO SG/SSPARVP/002/2021, DE FECHA 05/01/2021, DIRIGIDO A LA LIC. TEREWSA MONROY RAMIREZ, DIR. GRAL. DEL INSTITUTO DE VERIFICACION ADMINISTRATIVA DE LA CDMX. INVEA, POR MEDIO DEL CUAL SE LE SOLICITA SE LLEVE A CABO LA VERIFICACION ADMINISTRATIVA AL ESTABLECIMIENTO MERCANTIL EL ANGEL DE LA NOCHE, UBICADO EN PALMAS 3 COL. AZTAHUACAN ALCALDIA IZTAPALAPA. TPH', '2021-01-12'),
(3106, 10295, 'CONCLUIDO', '2021-01-28'),
(3108, 10339, 'CONCLUIDO, SE TOMA DE CONOCIMIENTO ', '2021-02-11'),
(3109, 10302, 'CONCLUIDO', '2021-02-11'),
(3111, 10325, 'CONCLUIDO', '2021-02-11'),
(3112, 10340, 'CONCLUIDO', '2021-02-12'),
(3113, 10324, 'CONCLUIDO', '2021-02-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turno`
--

CREATE TABLE `turno` (
  `IdTurno` int(5) NOT NULL,
  `NumTurno` int(15) DEFAULT NULL,
  `Fecha_registro` date DEFAULT NULL,
  `NumOficio` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL,
  `FkAtencion` int(5) DEFAULT NULL,
  `Estatus` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `FechaDocumento` date DEFAULT NULL,
  `FechaRecibido` date DEFAULT NULL,
  `FechaLimite` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `VoSg` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `VoSalida` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Remitente` varchar(254) COLLATE utf8_spanish_ci DEFAULT NULL,
  `CargoRemitente` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Promotor` varchar(254) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Asunto` varchar(1300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `OtroAtencion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `eValidado` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `FkResponsable` int(5) NOT NULL,
  `Clasificacion` varchar(60) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `turno`
--

INSERT INTO `turno` (`IdTurno`, `NumTurno`, `Fecha_registro`, `NumOficio`, `FkAtencion`, `Estatus`, `FechaDocumento`, `FechaRecibido`, `FechaLimite`, `VoSg`, `VoSalida`, `Remitente`, `CargoRemitente`, `Promotor`, `Asunto`, `OtroAtencion`, `eValidado`, `FkResponsable`, `Clasificacion`) VALUES
(23978, 1, '2021-01-05', 'SCG/OICSG/AI/724/2020', 1, 'Urgente', '2020-12-28', '2021-01-05', '2021-01-11', '', '', 'C. BLANCA VIRIDIANA RODRIGUEZ GUTIERREZ ', 'JEFA DE UNIDAD DEPARTAMENTAL DE INVESTIGACION EN EL ORGANO INTERNO DE CONTROL ', 'EN LA SECRETARIA DE GOBIERNO DE LA CIUDAD DE MEXICO ', 'EXPEDIENTE CI/SGOB/D/259/2020, SOLICITUD DE INFORMACION, SOLICITA QUE EN UN TERMINO QUE NO EXCEDA DE CINCO DIAS HABILES INFORME LOS LINEAMIENTOS DEL PREMIO DE ADMINISTRACION PUBLICA ESTIMULOS Y RECOMPENSA, NORBRE, CARGO Y AREA DE ADSCRIPCION DEL SERVIDO PUBLICO, ENCARGADO DE REALIZAR EL REGISTRO DE ASPIRANTES AL PREMIO, NOMBRE , CARGO Y AREA DE LOS SERVIDORES PUBLICOS ACREDORES AL PREMIO, Y CRITERIO EMPLEADO PARA DETERMINAR ENTRE TODOS LOS PARTICIPANTES A LOS SERVIDORES PUBLICOS ACREDORES DEL PREMIO ', '', 'En proceso', 26, 'Normal'),
(23979, 2, '2021-01-05', 'CCSJCDMX/DEyP/E/361/12-2020', 1, 'Normal', '2020-12-23', '2021-01-05', '', '7276', '5326', 'LIC. GRACIANO CRUZ SORIANO ', 'DIRECTOR JURIDICO DEL CONSEJO CIUDADANO DE LA CIUDAD DE MEXICO ', '', 'SOLICITA SE LLEVE A CABO OPERATIVO LA NOCHE ES DE TODOS EN EL ESTABLECIMIENTO MERCANTIL DENOMINADO BAR EL ANGEL DE LA NOCHE, UBICADO EN PALMAS NO. 3 ENTRE LAS CALLES EJERCITO NACIONAL Y BUENAVISTA COLONIA SANTA MARIA AZTAHUACAN ALCALDIA IZTAPALAPA. C.P. 09010, QUE OPERA DE MARTES A DOMINGO DE LAS 16.00 HORAS HASTA LAS 05:00 HORAS DEL DIA SIGUIENTE, ', '', 'En proceso', 26, 'Normal'),
(23980, 3, '2021-01-05', 'S/N', 1, 'Urgente', '2021-01-04', '2021-01-05', '', '2', '0002', 'M.D. DAVID NUÑEZ RUBIO', 'ABOGADO ', 'DESPACHO JURIDICO REFORMA 100', 'EL M.D. DAVID NUÑEZ RUBIO, APODERADO LEGAL DE LOS ACTORES EN EL JUICIO LABORAL 5392/08, TRABAJADORES ACTIVOS EN EL GOBIERNO DE LA CIUDAD DE MEXICO , ADSCRITOS A LA ALCALDIA GUSTAVO A. MADERO, DENUNCIA LA RESPONSABILIDAD DE LOS TITULARES DE LA DIRECCION GENERAL DE ADMINISTRACION , DIRECCION GENERAL DE ASUNTOS JURIDICOS Y DE GOBIERNO  DE LA ALCALDIA GUSTAVO A MADERO POR IRREGULARIDADES E ILICITOS COMETIDOS DEL 27 DE NOVIEMBRE DE 2018 AL 4 DE DICIEMBRE DE 2020 EN EL MARCO DE LA EJECUCION Y CUMPLIMIENTO DE UN LAUDO FIRME DICTADO EN EL EXPEDIENTE 5392/2008', '', 'En proceso', 26, 'Normal'),
(23981, 4, '2021-01-06', 'SUAC- 131220609558', 1, 'Normal', '2020-12-13', '2021-01-06', '', '', '', 'SISTEMA UNIFICADO DE ATENCION CIUDADANA', '', 'SECRETARIA DE GOBIERNO ', 'SUAC-131220609558 DE FECHA 13/12/2020 VICTORIA REFIERE QUE EN EL METRO PINO SUAREZ ESTA INVADIDO DE AMBULANTES A TODAS HORAS Y SOLO  HAY UNA ENTRADA Y SALIDA DE LA LINEA 1 DEL METRO  ', '', 'En proceso', 26, 'Normal'),
(23982, 5, '2021-01-08', 'SUAC-191220615934', 1, 'Normal', '2020-12-19', '2021-01-04', '', '', '', 'SISTEMA UNIFICADO DE ATENCION CIUDADANA ', 'ABOGADO ', 'SISTEMA UNIFICADO DE ATENCION CIUDADAN', 'SE QUEJA  DE CIERRE DE CENTROS COMERCIALES YA QYE ELLA TRABAJA EN UNO DE ELLOS,  REFIERE QUE EN LA COLONIA FELIPE ANGELES DE LA ALCALDIA IZTAPALA SE PUSO UN TIANGUIS COMPLETO SIN TOMAR NADA DE SANA DISTANCIA Y CON PRODUCTOS NO ESENCIALES Y NO SE HIZO NADA POR RETIRARLOS.', '', 'En proceso', 26, 'Normal'),
(23983, 6, '2021-01-08', 'SUAC-191220616282', 1, 'Normal', '2020-12-19', '2021-01-04', '', '', '', 'SISTEMA UNIFICADO DE ATENCION CIUDADANA ', '', 'SISTEMA UNIFICADO DE ATENCION CIUDADANA ', 'VICTORIA, SOLICITA EL CIERRE DEL CENTRO DE LA CDMX. LO HAGA AL 100% PORQUE MUCHOS LOCALES SE PONEN A VENDER A PUERTA CERRADA Y ESO Y NADA ES LO MISMO CONSIDERA QUE LA SOLUCION ES QUE SE CIERRE EL ACCESO PARA TODOS LOS PEATONES , QUE NADIE PUEDA INGRESAR AL CUADRANTE DEL CENTRO DE ESTA MANERA NI TRABAJADORES NI COMPRADORES ESTARN RECORRIENDO LAS CALLES PROVOCANDO MAS CONTAGIOS.', '', 'En proceso', 26, 'Normal'),
(23984, 7, '2021-01-08', 'SUAC-221220618315', 1, 'Normal', '2020-12-22', '2021-01-04', '', '', '', 'SISTEMA UNIFICADO DE ATENCION CIUDADANA ', '', 'SISTEMA UNIFICADO DE ATENCION CIUDADANA ', 'SUSANA ARIAS VARGAS, SOLICITA EL RETIRO DE COMERCIO INFORMAL EN LA CALLE DE BERRIOZABAL CONSIDERADA CALLE MODELO  ENTRE GONZALEZ ORTEGA Y VIDAL ALCOCER. 1a y 2a. CALLES DE FELIPE BERRIOZABAL ALCALDIA CUAUHTEMOC. ', '', 'En proceso', 26, 'Normal'),
(23985, 8, '2021-01-08', 'SUAC-221220618394', 1, 'Normal', '2020-12-22', '2021-01-04', '', '', '', 'SISTEMA UNIFICADO DE ATENCION CIUDADANA ', '', 'SISTEMA UNIFICADO DE ATENCION CIUDADANA', 'CARIDAD AGUILAR DORANTES, CON CORREO ELECTRONICO cary_df@hotmail.com CON NUMERO DE CELULAR 5513895248,  SOLICITA LIBERACION DE LAS CALLES DE PEÑE Y PEÑA Y MANUEL DOBLADO POR LA INVASION DE COMERCIO AMBULANTE ', '', 'En proceso', 26, 'Normal'),
(23986, 9, '2021-01-08', 'SUAC-281220621982', 1, 'Normal', '2020-12-28', '2021-01-04', '', '', '', 'SISTEMA UNIFICADO DE ATENCION CIUDADANA ', '', 'SISTEMA UNIFICADO DE ATENCION CIUDADANA ', 'VICTORIA CON CORREO ELECTRONICO abielgonzalezsevilla@gmail.com, DENUNCIA SOBRE DANIEL CAMPOS PLANCARTE , QUEIN LE ESTA NEGANDO EL ACCESO Y EL RETIRO DE UNOS COMERCIANTES, RESPECTO DE UN INMUEBLE QUE PROPIEDAD FEDERAL DEL CUAL TIENE LA CONCESION OTORGADA Y PUBLICADA EN EL DIARIO OFICIAL DE LA FEDERACION. TIENE TODA LA DOCUMENTACION EN ORDEN SE QUEJA QUE NO LE PERMITE INGRESAR NI TAPIAR EL INMUEBLE, REFIERE QUE FUE AMENAZADO DE PONERLO A DISPOSICION DEL MINISTERIO PUBLICA EL ECHO SUCEDIO EN LAS CALLES DE RODRIGUERZ PUEBLA Y MIGUEL ALEMAN JUSTO DONDE PASA EL METROBUS ENFRENTE DEL MERCADO ABELARDO RODRIGUEZ.', '', 'En proceso', 26, 'Normal'),
(23987, 10, '2021-01-08', 'DGGyAJ/DERA/SMCVP/JUDVP/0330/2020', 1, 'Normal', '2021-12-07', '2021-01-09', '', '', '', 'VICTOR CALVO SALAZAR ', 'JEFE DE UNIDAD DEPARTAMENTAL DE VIA PUBLICA', 'ALCALDIA MIGUEL HIDALGO ', 'SOLICITA LO ANTES POSIBLE TODOS LOS MOVIMIENTOS (ALTAS, BAJAS, ACTUALIZACIONES PENDIENTES DE PAGO, PAGOS VIGENTES ETC.) QUE SE REALIZARON DENTRO DE LA PLATAFORMA DEL SITEMA DE COMERCIO EN VIA PUBLICA SISCOVIP, DESDE OCTUBRE 2018 A LA FECHA COORESPONDIENTES A LA ALCALDIA MIGUEL HIDALGO . ', '', 'En proceso', 26, 'Normal'),
(23988, 11, '2021-01-11', 'S/N', 1, 'Normal', '2021-01-11', '2021-01-11', '', '', '', 'CONDOMINIO PLAZA TULYEHUACO', '', '', 'SOLICITAN APOYO E INTERVENCION PARA SOLUCIONAR EL PROBLEMA DEL COMERCIO INFORMAL QUE SE INSTALAN EN LA PERIFERIA DE DICHA PLAZA, UBICADA EN CALLE DE AV. TLAHUAC 1577, COL. LOS MIRASOLES, ALCALDIA IZTAPALAPA. ', '', 'En proceso', 30, 'Normal'),
(23989, 12, '2021-01-11', 'DGRDC-021571-2020', 1, 'Normal', '2020-12-30', '2021-01-11', '', '42', '35', 'MARIA DE, ROCIO VILCHIS ESPINOSA', 'DIRECTORA GENERAL DE RESOLUCION A LA DEMANDA CIUDADANA', 'JEFATURA DE GOBIERNO DE LA CDMX', 'SOLICITUD DE LA C. DIANA MARIA CAMARGO TREVIÑO, A FIN DE SOLUCIONAR EL CONFLICTO DERIVADO POR LA ASIGNACION DE UN ESPACIO COMERCIAL, OCUPADO SUPUESTAMENTE POR UN GRUPO DE MUJERES DE LA TERCERA EDAD DURANTE 18 AÑOS, EL CUAL SEGUN INDICA, FUE OTORGADO A PERSONAS AJENAS A TRAVES DE IRREGULARIDADES POR PARTE DE PERSONAL QUE LABORA EN LA ALCALDIA CUAJIMALPA. *sar', '', 'En proceso', 26, 'Normal'),
(23990, 13, '2021-01-11', 'DGRDC-021166-2020', 1, 'Normal', '2020-12-21', '2021-01-11', '', '51', '44', 'MARIA DEL ROCIO VILCHIS ESPINOSA', 'DIRECTORA GENERAL DE RESOLUCION A LA DEMANDA CIUDADANA', 'JEFATURA DE GOBIERNO DE LA CDMX', 'SOLICITUD DE LA C. LILIANA CASTILLO TELLO, QUIEN COMO COMERCIANTE ESTABLECIDO, MANIFIESTA INCONFORMIDAD POR EL CIERRE DEL COMERCIO FORMAL, PERO EL AMBULANTAJE SIGUE SIN CONTROL EN EL CENTRO HISTORICO. *sar', '', 'En proceso', 26, 'Normal'),
(23991, 14, '2021-01-11', 'NOTA INFORMATIVA ', 1, 'Normal', '2021-01-11', '2021-01-11', '', '', '', 'SERGIO ESPINOSA BALLESTEROS ', 'SUBDIRECTOR DE ANALISIS DEL COMERCIO EN VIA PUBLICA ', 'SUBSECRETARIA DE PROGRAMAS DE ALCALDIAS Y REORDENAMIENTO DE LA VIA PUBLICA ', 'SE INFORMA LO REFERENTE A LA PRESENCIA DE POLICIA DE TRANSITO DE LA CIUDAD DE MEXICO Y DEL MUNICIPIO DE CIUDAD NEZAHUACOYOTL DEL ESTADO DE MEXICO, EN LA CALLE 7 DEL MARTES 5 AL DOMINGO 9 DE ENERO DEL AÑO EN CURSO. *sar', '', 'En proceso', 26, 'Normal'),
(23992, 15, '2021-01-12', 'XOCH13-DPC/003/2021', 2, 'Normal', '2021-01-11', '2021-01-12', '', '', '', 'ANA LOURDES RODRIGUEZ SANDOVAL', 'DIRECTORA DE GESTION INTEGRAL DE RIESGOS Y PROTECCION CIVIL', 'ALCALDIA XOCHIMILCO ', 'REITERA AL DIRECTOR EJECUTIVO DE LA AGENCIA DE SEGURIDAD, ENERGIA Y AMBIENTE, SE LLEVE A CABO UNA IMPLEMENTACION DE MEDIDAS Y ACCIONES PENDIENTES A INHIBIR, PROHIBIR, ERRADICAR Y/O DESMANTELAR LAS ACTIVIDADES CLANDESTINAS POR VENTA DE TRASIEGO, ALMACENAJE DE CILINDROS PORTATILES DE GAS Y PIPAS DE GAS L.P. (EN REFERENCIA AL VOLANTE DE TURNO 1567 DEL 2020) *sar', '', 'En proceso', 26, 'Normal'),
(23993, 16, '2021-01-12', 'SG/SSPARVP/DGOVPCH/005/2020', 1, 'Normal', '2021-01-11', '2021-01-12', '', '', '', 'DANIEL CAMPOS PLANCARTE', 'DIRECTOR GENERAL DE ORDENAMIENTO DE LA VIA PUBLICA DEL CENTRO HISTORICO', 'SUBSECRETARIA DE PROGRAMAS DE ALCALDIAS Y REORDENAMIENTO DE LA VIA PUBLICA', 'EN ATENCION AL OF. SG/SSPARVP/679/2020, ENVIA INFORME DE ACTIVIDADES CORRESPONDIENTE AL MES DE DICIEMBRE DE 2020, ASI COMO INFORME PORMENORIZADO DE ENERO A NOVIEMBRE, RESPECTO A LOS AVANCES DE LAS ACCIONES: 1. REORDENAMIENTO DE COMERCIO EN LA VIA PUBLICA DE CORREDORES Y AVENIDAS. 2. PROYECTO CONDESA MARCONI. 3. CENSO DE COMERCIANTES EN LOS PERIMETROS A Y B DEL CENTRO HISTORICO. 4. PLAZAS COMERCIALES. *sar', '', 'En proceso', 26, 'Normal'),
(23994, 17, '2021-01-12', 'AAO/DGSU/DOS/CSL/001/2021', 1, 'Normal', '2021-01-08', '2021-01-12', '', '', '', 'MARIA DE JESUS LEONOR NUÑEZ LEAL ', 'COORDINADORA DE SERVICIOS DE LIMPIA', 'ALCALDIA ALVARO OBREGON ', 'EN ATENCION AL OF. SG/SSPARVP/DPA/288/2020, INFORMA LA MANERA EN QUE SE LLEVARA A CABO LA RECOLECCION DE RESIDUOS SOLIDOS EN LOS EDIFICIOS URBANOS DE LA COMISION NACIONAL DE LOS DERECHOS HUMANOS. (EL ACUSE DE RECIBO DE ESTE DOCUMENTO SE RECIBIO CON EL FOLIO 0015) *sar', '', 'En proceso', 29, 'Normal'),
(23995, 18, '2021-01-13', 'NOTA INFORMATIVA 001', 1, 'Normal', '2021-01-08', '2021-01-13', '', '', '', 'SAMANTA A. SEGOVIA ARROYO', 'DIRECTORA DE PROGRAMA DE ALCALDIAS', 'SUBSECRETARIA DE PROGRAMAS DE ALCALDIAS Y REORDENAMIENTO DE LA VIA PUBLICA ', 'INSPECCION OCULAR A ESTABLECIMIENTOS MERCANTILES EN LAS CALLES PROLONGACION DIVISION DEL NORTE, GUADALUPE I. RAMIREZ, PEDRO RAMIREZ DEL CASTILLO E IGNACIO ALDAMA, DE LA LA ALCALDIA XOCHIMILCO. (EN REFERENCIA LA VOLANTE DE TURNO 1342 DEL AÑO 2020) *sar', '', 'En proceso', 26, 'Normal'),
(23996, 19, '2021-01-13', 'NOTA INFORMATIVA 2', 1, 'Normal', '2021-01-11', '2021-01-13', '', '', '', 'SAMANTA A. SEGOVIA ARROYO', 'DIRECTORA DE PROGRAMAS DE ALCALDIAS', 'SUBSECRETARIA DE PROGRAMAS DE ALCALDIAS Y REORDENAMIENTO DE LA VIA PUBLICA ', 'INFORMA QUE DESDE EL 1 DE ENERO DE 2021, EL SISTEMA DE COMERCIO EN VIA PUBLICA (SISCOVIP) SE ENCUENTR EN CORRECTO FUNCIONAMIENTO. SE LLEVO A CABO LA ACTUALIZACION DE LA CUOTA FIJADA OR EL ART. 304 DEL CODIGO FISCAL E IMPUESTO LOCAL DE MORA DADO POR LA SECRETARIA DE FINANZAS EN LA GACETA DEL 30 DE DICIEMBRE DEL 2020, ASI COMO EL INDICE NACIONAL DE PRECIOS PUBLICADO POR INEGI EL 7 DE ENERO. *sar', '', 'En proceso', 26, 'Normal'),
(23997, 20, '2021-01-14', 'SUAC-311220624825', 1, 'Normal', '2020-12-31', '2021-01-14', '', '', '', 'SISTEMA UNIFICADO DE ATENCION CIUDADANA', '', 'SECRETARIA DE GOBIERNO DE LA CIUDAD DE MEXICO ', 'SE MANIFIESTA QUE LA PERFUMERIA FRAICHE DE CALLE TACUBA, SIGUE LABORANDO A PUERTA CERRADA EN HORARIO NORMAL CON SU PERSONAL SIN UNIFORME A PESAR DEL SEMAFORO ROJO Y SIN LAS MEDIDAS DE SEGURIDAD MINIMAS PARA EL CLIENTE Y EL PERSONAL.  *sar', '', 'En proceso', 26, 'Normal'),
(23998, 21, '2021-01-14', 'SUAC-060121630078', 1, 'Normal', '2021-01-06', '2021-01-14', '', '', '', 'SISTEMA UNIFICADO DE ATENCION CIUDADANA', '', 'SECRETARIA DE GOBIERNO DE LA CIUDAD DE MEXICO ', 'MANIFIESTA INCONFORMIDAD PORQUE NO LE PERMITEN ABRIR SU NEGOCIO QUE TIENE DESDE HACE 30 AÑOS, UBICADO EN AV. 20 DE NOVIEMBRE, Y LOS NEGOCIOS ALREDEDOR DE LA CATEDRAL, CALLE DE ARGENTINA, ANILLO DE CIRCUNVALACION, MANUEL DOBLADO, SE ENCUENTRAN ABIERTOS, OCASIONANDO CÚMULO DE PERSONAS QUE PUEDEN PROPAGAR EL CONTAGIO.  *sar', '', 'En proceso', 26, 'Normal'),
(23999, 22, '2021-01-15', 'DGGAJ/0025/2021', 1, 'Normal', '2021-01-14', '2021-01-15', '', '', '', 'JORGE JUAREZ GRANDE', 'DIRECTOR GENERAL DE GOBIERNO Y ASUNTOS JURIDICOS', 'ALCALDIA COYOACAN', 'SOLICITA SE GENERE UN USUARIO AL C CARLOS VAZQUEZ VAZQUEZ, ADSCRITO AL AREA DE VIA PUBLICA. CON EL CUAL PUEDA HACER ALTAS, TENIENDO POR ENTENDIDO QUE ES LO QUE SE CONOCE COMO USUARIO CON NIVEL 3.  *sar', '', 'En proceso', 29, 'Normal'),
(24000, 23, '2021-01-18', 'SUAC-060121630179', 1, 'Normal', '2021-01-06', '2021-01-18', '', '', '', 'SISTEMA UNIFICADO DE ATENCION CIUDADANA', '', 'SITEMA UNIFICADO DE ATENCION CIUDADANA', 'SOLICITA  SE ATIENDA SU PETICION REFERENTE A LA CANTIDAD DE PUESTOS QUE ESTAN LABORANDO A FUERA DE LA PLAZA DE LA TECNOLOGIA, LO CUAL ES UN RIESGO EN RELACION A  TEMAS DEL COVID', '', 'En proceso', 26, 'Normal'),
(24001, 24, '2021-01-19', 'SCG/OICSG/AI/746/2020', 1, 'Normal', '2020-12-30', '2021-01-19', '', '', '', 'BLANCA VIRIDINA RODRIGUEZ GUITIERREZ', 'JEFA DE UNIDAD DEPARTAMENTAL DE INVESTIGACION EN EL ORGANO INTERNO DE CONTROL EN LA SECRETARIA DE GOBIERNO DE LA CIUDAD DE MEXICO', 'SECRETARIA DE LA CONTRALORIA GENERAL', 'SOLICITA INFORME A ESTA UNIDAD, NOMBRE Y CARGO DE LOS SERVIDORES PUBLICOS QUE PARTICIPARON EN EL RETIRO DE COMERCIANTES EL DIA 23 DE OCTUBRE DEL 2020 EN LA CALLE DE MANUEL DOBLADO, ALCALDIA CUAUHTEMOC', '', 'En proceso', 26, 'Normal'),
(24002, 25, '2021-01-19', 'NOTA INFORMATIVA CALLE 7', 3, 'Normal', '2021-01-18', '2021-01-19', '', '', '', 'SERGIO ESPINOSA BALLESTEROS', 'SUBDIRECTOR DE ANALISIS DE COMERCIO EN VIA PUBLICA', 'SUBSECRETARIA DE PROGRAMAS DE ALCALDIAS Y REORDENAMIENTO DE LA VIA PUBLICA', 'SE LE INFORMA SOBRE LA PRESENCIA E LA POLICIA DE TRANSITO DE LA CIUDAD DE MEXICO Y DEL MUNICIPIO DE CIUDAD NEZAHUALCOYOTL ESTADO DE MEXICO , EN LA CALLE 7, DE LUNES 11 AL DOMINGO 17 DE ENERO DEL AÑO EN CURSO , CON UN HORARIO DE 3:00 A 7:00 AM', '', 'En proceso', 26, 'Normal'),
(24003, 26, '2021-01-19', 'NOTA INFORMATIVA', 3, 'Normal', '2021-01-19', '2021-01-19', '', '', '', 'SERGIO ESPINOSA BALLESTEROS', 'SUBDIRECTOR DE ANALISIS DEL COMERCIO EN VIA PUBLICA', 'SUBSECRETARIA DE PROGRAMAS DE ALCALDIAS Y REORDENAMIENTO DE LA VIA PUBLICA', 'SE INFORMA EL SEGUIMIENTO A LOS ACUERDOS TOMADOS EN LA MESA DE TRABAJO DEL DÍA 16 DE DICIEMBRE DEL AÑO EN CURSO INMEDIATO ANTERIOR, EL DIA DE AYER 18 DEL MES Y AÑO EN CURSO, ACUDÍ A LA REUNIÓN PROGRAMADA A LAS 12:00 CON LA FUNCIONARIA LIC ELEONORA CONTRERAS VILLASEÑOR Y EL C JOSE LUIS BRAVO RECODER, DE LA COORDINADORA POR LA RECONSTRUCCIÓN , QUIEN NO ACUDIO . EL C MENCIONO A LAS 8:36 DEL DIA E AYER, VIA MENSAJE, EL CUAL SOLICITABA LA POSIBILIDAD DE REPROGRAMAR ESTA REUNION PARA OTRO DIA , LO CUAL LE INFORMO QUE LO IBA A CONSULTAR', '', 'En proceso', 26, 'Normal'),
(24004, 27, '2021-01-20', 'FC/UCTFR/001/2020', 3, 'Normal', '2021-01-20', '2021-01-20', '', '', '', 'JOSE SANCHEZ JUAREZ', '', '', 'LA UNION DE COMERCIANTES EN TIANGUIS FERIAS Y ROMERIAS AC , LE INFORMA QUE LUEGO DEL SISMO DEL 19 DE SEPTIEMBRE DE 2017 TUVIERON UN ACUERDO CON LAS AUTORIDADES DE LA ALCALDIA  PARA INSTALARSE EL DIA SABADO EBN LA CALLE ALVARO GALVEZ Y FUENTE, RETORNO 803 FRENTE A LA ESCUELA PRIMARIA FRAY EUSEBIO Y FRANCISCO KINO, ANTE LA CONCLUSION DE LA OBRA DE REESTRUCTURACION Y REMODELACION DE LAQ UNIDAD HABITACIONAL MULTIFAMILIARES, A APARTIR DE LA SIGUIENTE SEMANA SE INSTALARAN EN AV 8 MZ XIII ESQUINA ALVARO GALVEZ Y FUENTE DE LA UNIDAD HABITACIONAL MULTIFAMILIARES', '', 'En proceso', 26, 'Normal'),
(24005, 28, '2021-01-20', 'FC/UCTFR/002/2020', 3, 'Normal', '2021-01-20', '2021-01-20', '', '', '', 'JOSE SANCHEZ JUAREZ', '', '', 'LA ORGANIZACIÓN DE COMERCIANTES TIANGUISTAS  LA CUAL REPRESENTA, LE EXPRESAN SU RECONOCIMIENTO Y LO FELICITAN POR SU EXCELENTE DESEMPEÑO EN EL TEMA DE LA PANDEMIA , POCOS SERVIDORES PÚBLICOS TIENEN EL CONOCIMIENTO DEL COMERCIO EN LOS TIANGUIS Y LA SENSIBILIDAD PARA CONCERTAR CON TODOS LOS SECTORES ECONÓMICOS DE LA CIUDAD, SIN MAS , SE PONEN A SUS ORDENES.', '', 'En proceso', 26, 'Normal'),
(24006, 29, '2021-01-21', 'CORREO ELECTRONICO', 1, 'Normal', '2020-12-31', '2021-01-21', '', '', '', 'JUDITH PEREZ', '', '', 'SE COMUNICAN POR ESTE MEDIO PARA DARLE A CONOCER LA SITUACION QUE SE PRESENTA CON EL COMERCIO EN VIA PUBLICA EN EL PERIMETRO DE LAS UNIDADES HABITACIONALES TOREO I Y TOREO II', '', 'En proceso', 26, 'Normal'),
(24007, 30, '2021-01-21', 'SG/DGPDI/009/2021', 1, 'Normal', '2021-01-18', '2021-01-21', '2021-01-27', '', '', 'ERNESTO CABRERA BRUGADA', 'DIRECTOR GENERAL DE PLANEACION Y DESARROLLO INSTITUCIONAL EN LA SECRETARIA DE GOBIERNO', 'SECRETARIA DE GOBIERNO DE LA CIUDAD DE MEXICO ', 'POR ESTE CONDUCTO , SOLICITA SU COLABORACION A EFECTO DE QUE GIRE SUS APRECIABLES INSTRUCCIONES A QUIEN CORRESPONDA A FIN DE QUE EN UN PLAZO NO MAYOR A 5 DIAS HABILES, REMITA A ESTA UNIDAD ADMINISTRATIVA, EL PROGRAMA DE TRABAJO 2021', '', 'En proceso', 26, 'Normal'),
(24008, 31, '2021-01-21', 'CORREO ELECTRONICO', 1, 'Normal', '2021-01-18', '2021-01-21', '', '', '', 'CAYETANO ARANDA MOLINA', '', '', 'SOLICITA SU INTERVENCION PARA QUE SE REUBIQUEN A COMERCIANTES QUE TODOS LOS DOMINGOS COLOCAN AFUERA DEL DOMICILIO DEL C  CAYETANO ARANDA MOLINA , UN PUESTO SEMIFIJO QUE PREPARA CARNITAS Y CHICHARRON', '', 'En proceso', 26, 'Normal'),
(24009, 32, '2021-01-21', 'CIORREO ELECTRONICO', 1, 'Normal', '2020-12-28', '2021-01-21', '', '', '', 'ERNESTO RODRIGUEZ', '', '', 'SE REPORTA NUEVAMENTE ROMERIA EN CUAUTEPEC, BARRIO ALTO, PLAZA HIDALGO , ALCALDIA GUSTAVO A MADERO, ROMERIA QUE SE SABE SE MANTIENE POR CORRUPCION  DESDE HACE AÑOS, QUE MUESTRA FALTA DE RESPECTO A LA GENTE Y AL GOBIERNO, LOS DIRIGENTES SON UN GREMIO INDEPENDIENTE Y MENCIONAN QUE A ESTA PLAZA NO ENTRA NI EL GOBIERNO, NI LA POLICIA, PERO POR REDES SOCIALES SE PRESUME COMPLICIDAD CON FUNCIONARIOS DE LA ALCALDIA  ', '', 'En proceso', 26, 'Normal'),
(24010, 33, '2021-01-22', 'S/R', 1, 'Normal', '2021-01-14', '2021-01-22', '', '', '', 'BERENICE GOMEZ MORAN', '', '', 'SOLICITA UNA CITA PRESENCIAL O VIRTUAL PARA TRATAR ASUNTOS RELACIONADOS CON COMERCIANTES INDEPENDIENTES DEL CENTRO HISTORICO, *sar', '', 'En proceso', 26, 'Normal'),
(24011, 34, '2021-01-22', 'INVEACDMX/DG/DEVA/DVSC/043/2021', 1, 'Normal', '2021-01-21', '2021-01-22', '', '', '', 'UBALDO ARELLANO SANCHEZ', 'DIRECTOR DE VERIFICACION, SEGURIDAD Y CLAUSURAS DEL AMBITO CENTRAL', 'INSTITUTO DE VERIFICACION ADMINISTRATIVA', 'EN ATENCION AL OFICIO SG/SSPARVP/0611/2020, SOBRE EL PARTICULAR, LE INFORMO QUE EL DIA 5 DE NOVIEMBRE DE 2020, PERSONAL ESPECIALIZADO EN FUNCIONES DE VERIFICACION  ADSCRITO A ESE INSTITUTO, ACUDIO A LOS INMUEBLES DE MERITO CON EL FIN DE REALIZAR UNA INSPECCION OCULAR , SEÑALANDO QUE EN LOS TRES ESTABLECIMIENTOS REFERIDOS, EXISTEN SELLOS DE SUSPENCION DE ACTIVIDADES POR PARTE DE LA ALCALDIA XOCHIMILCO (RELACIONADO CON VOLANTE DE TURNO 1342 DEL 2020)', '', 'En proceso', 26, 'Normal'),
(24012, 35, '2021-01-25', 'AMH/DGGAJ/DERA/SEMEP/AQD/0043/2021', 1, 'Normal', '2021-01-05', '2021-01-25', '', '', '', 'ARGEL QUINTERO DIAZ', 'SUBDIRECTOR DE ESTABLECIMIENTOS MERCANTILES Y ESPECTACULOS PUBLICOS', 'ALCALDIA MIGUEL HIDALGO ', 'ENVIA PADRON DE ESTABLECIMIENTOS MERCANTILES E INFORME DE LA PLAZAS COMERCIALES QUE SE ENCUENTRAN DENTRO DE ESA DEMARCACION. CORRESPONDIENTE AL MES DE DICIEMBRE DEL 2020. RESPECTO AL INFORME DEL PADRON DE ESTABLECIMIENTOS MERCANTILES Y ESPECTACULOS PUBLICOS, NO HUBO REGISTRO PARA EL MES DE OCTUBRE. *sar', '', 'En proceso', 26, 'Normal'),
(24013, 36, '2021-01-25', 'SG/DGJyEL/PA/CPCCDMX/00010.18/2021', 1, 'Normal', '2021-01-19', '2021-01-25', '', '', '', 'LUIS GUSTAVO VELA SANCHEZ', 'DIRECTOR GENERAL JURIDICO Y DE ENLACE LEGISLATIVO', 'SECRETARIA DE GOBIERNO ', 'OFICIO MDPRTA/CSP/0243/2021, SUSCRITO POR LA DIP. MARGARITA SALDAÑA HERNANDEZ, PRESIDENTA DE LA MESA DIRECTIVA DEL CONGRESO DE LA CIUDAD DE MEXICO, MEDIANTE EL CUAL RESOLVIO APROBAR EL PUNTO DE ACUERDO PARA QUE LA SECRETARIA DE SALUD Y LA SECRETARIA DE ADMINISTRACION Y FINANZAS Y A LAS 16 ALCALDIAS DE LA CDMX, REALICEN LAS ACCIONES ADMINISTRATIVAS Y PRESUPUESTALES NECESARIAS PARA SUSCRIBIR UN CONVENIO DE CONCERTACION CON EL SECTOR PRIVADO Y/O SOCIAL, CON LA FINALIAD DE OTORGAR FACILIDADES PARA LA RENTA DE EQUIPOS Y SUMINISTRAR DE MANERA GRATUITA RECARGAS DE OXIGENO MEDICINAL, ASI COMO ESTABLECER Y HABILITAR CENTROS DE DISTRIBUCION DE OXIGENO MEDICINAL SUFICIENTE. *sar', '', 'En proceso', 26, 'Normal'),
(24014, 37, '2021-01-25', 'SEDUVI/CGDU/DPDUS/154/2020', 1, 'Normal', '2020-12-11', '2021-01-25', '', '', '', 'RAUL HERNANDEZ PICHARDO ', 'DIRECTOR DE PLANEACION DEL DESARROLLO URBANO SOSTENIBLE', 'COODINACION GENERAL DE DESARROLLO URBANO ', 'EN REFERENCIA AL O. SG/SSPARVP/0147/2020, DE FECHA 13 DE FEBRERO DEL 2020, INFORMA LO REFERENTE AL DESTINO DEL ESPACIO PUBLICO DE APROXIMADAMENTE 2,000 M2., SOBRE LA CARRETERA PICACHO-AJUSCO, A LA ALTURA DEL No. 203, COL. AMPLIACION FUENTES DEL PEDREGAL, 14110, ALCALDIA TLALPAN. *sar', '', 'En proceso', 26, 'Normal'),
(24015, 38, '2021-02-10', 'DGGA/1465/2020', 1, 'Normal', '2020-11-30', '2021-01-27', '', '', '', 'ANDRES SANCHEZ CRUZ', 'DIRECTOR GENERAL DE GOBIERNO Y ASUNTOS JURIDICOS ', 'MILPA ALTA', 'EN ATENCION AL OF. SSPDyRVP/035-12/2013, ENVIA PADRON DE ESTABLECIMIENTOS MERCANTILES DE MARZO-OCTUBRE 2020. ASIMISMO DJURANTE LOS MESES MARZO-OCTUBRE 2020, NO SE REGISTRARON ESTABLECIMIENTOS QUE OPEREN MQUINAS DE VIDEOJUEGOS. REFERENTE A LAS SOLICITUDES DE LA PARA LA PRSENTACION DE ESPECTACULOS PUBLICOS, DURANTE LOS MESES Y AÑO  MENCIONADOS, UNICAMENTE SE HA OTORGADO UNA AUTORIZACION. ', '', 'En proceso', 0, 'Normal'),
(24016, 39, '2021-02-10', 'DGGA/1464/2020', 3, 'Normal', '2020-11-30', '2021-01-27', '', '', '', 'ANDRES SANCHEZ CRUZ', 'DIRECTOR GENERAL DE GOBIERNO Y ASUNTOS JURIDICOS ', 'MILPA ALTA', 'EN ATENCION AL OF. SSPDyRVP/783.11/2016, DE FECHA 19 DE NOVIEMBRE DE 2016, ENVIA CD QUE CONTIENE EL PADRON ACTUALIZADO DE LOS ESTABLECIMIENTOS MERCANTILES DE MARZO-OCTUBRE 2020. ASIMISMO DJURANTE LOS MESES MARZO-OCTUBRE 2020.', '', 'En proceso', 29, 'Normal'),
(24017, 40, '2021-02-10', 'DGGA/1470/2020', 3, 'Normal', '2020-11-30', '2021-01-27', '', '', '', 'ANDRES SANCHEZ CRUZ', 'DIRECTOR GENERAL DE GOBIERNO Y ASUNTOS JURIDICOS ', 'MILPA ALTA', 'EN ATENCION AL OF. SSPDYRVP/SEM/038/2009 Y SSPDYRVP/SEM/38/041/2009, INFORMA QUE DURANTE LOS MESES DE MARZO Y A OCTUBRE DE 2020, NO SE RECIBIERON AVISOD DE APERTURA DE PLAZAS COMERCIALES Y/O CENTROS COMERCIALES, ASI COMO REGISTRO DE MAQUINAS DE VIDEO JUEGOS. RESPECTO A ESPECTACULOS PUBLICOS DE HACE DE CONOCIMIENTO QUE SOLO SE OTORGO UNA AUTORIZACION. ', '', 'En proceso', 29, 'Normal'),
(24018, 41, '2021-02-10', 'DGODU/0100/2021', 1, 'Normal', '2021-01-26', '2021-01-27', '', '', '', 'HECTOR RAUL VAZQUEZ VARGAS ', 'DIRECTOR GENERAL DE OBRAS Y DESARROLLO URBANO ', 'COYOACAN', 'SE CONVOCA A LA PRIMERA SESION ORDINARIA DEL SUBCOMITE DE OBRAS 2021, A REALIZARSE EL VIERNES 29 DE ENERO DEL AÑO EN CURSO, A LAS 13:00 HRS., EN LA SALA DE JUNTAS DE ESA DIRECCION GENERAL, SITA EN CALZ. DE TLALPAN NO. 3370, COL. VIEJO EJIDO DE SANTA URSULA COAPA. SE ANEXA CD. ', '', 'En proceso', 0, 'Normal'),
(24019, 42, '2021-02-10', 'SAF/DGPI/DEIIETI/119/2021', 3, 'Normal', '2021-01-26', '2021-01-27', '', '', '', 'LUIS FRANCISCO ORTIZ BERNAL', 'DIRECTOR EJECUTIVO DE INVENTARIO INMOBILIARIO, ESTUDIOS TECNICOS Y DE INFORMACION ', 'DIRECCION GENERAL DE PATRIMONIO INMOBILIARIO', 'EN ATENCION AL OF. SG/SSPARVP/333/2020, ENVIA INFORMACION CON RESPECTO A LA SITUACION JURIDICA QUE GUARDAN LOS INMUEBLES UBICADOS EN: CALLE DE HAVRE Y HAMBURGO NOS. 21 Y 23, COL. JUAREZ. Y CALLE REGINA NO. 97, COL. CENTRO. ', '', 'En proceso', 0, 'Normal'),
(24020, 43, '2021-02-10', 'DGRDC-000220/2021', 1, 'Normal', '2021-01-22', '2021-01-27', '', '', '', 'MARIA DEL ROCIO VILCHIS ESPINOSA', 'DIRECTORA GENERAL DE RESOLUCION A LA DEMANDA CIUDADANA', 'JEFATURA DE GOBIERNO DE LA CIUDAD DE MEXICO', 'LUIS RICARDO BAEZA FERREIRA, SUBDIRECTOR DE CONTROL Y GESTIONAL DOCUMENTAL DE LA SUBSECRETARIA DE GOBIERNO, REMITE PARA ATENCION PROCEDENTE COPIA DEL CORREO ELECTRONICO RECIBIDO DE LA CUENTA DE JEFATURA DE GOBIERNO, SIGNADO POR AZUCENA MARIA FERNANDA ISLAS MIER, MEDIANTE LE CUAL REMITE PROPUESTA PARA QUE PUEDAN TRABAJAR LOS EMPRESARIOS DEL CORREDOR MADERO, MONTE DE PIEDAD Y LOS PARTALES, CENTRO HISTORICO. ', '', 'En proceso', 30, 'Normal'),
(24021, 44, '2021-02-10', 'AIZT-DOM/025/2021', 7, 'Normal', '2021-01-28', '2021-01-29', '', '', '', 'RUBI MAETZIN GOMEZ ESPINOSA', 'DIRECTORA DE OBRAS Y MANTENIMIENTO Y SECRETARIO TECNICO DEL SUCOMITE DE OBRAS', ' IZTACALCO', 'INVITACION A LA PRIMERA SESION ORDINARIA DEL SUBCOMITE DE OBRAS DEL AÑO 2021, EL 20 DE ENERO A LA 13:00 HRS., MEDIANTE LA PLATAFORMA \"ZOOM\" SE ANEXA CD', '', 'En proceso', 29, 'Normal'),
(24022, 45, '2021-02-10', 'AC/DGG/107/2021', 2, 'Normal', '2021-01-25', '2021-01-29', '', '', '', 'SALVADOR SANTIAGO SALAZAR', 'DIRECTOR GENERAL DE GOBIERNO  ', ' CUAUHTEMOC', 'EN ATENCION AL OF. SG/SSPARVP/DSCVP/004/2021, INFORMA LAS ACCIONES REALIZADAS EN LA IMPLEMENTACION DE LAS MEDIDAS SANITARIAS, DE ACUERDO AL PUNTO DE ACUERDO PARA EXHORTAR LA HOMOLOGACION DE LA CAMPAÑA \"RETO IZTAPALAPA CERO CONTAGIOS\"', '', 'En proceso', 30, 'Normal'),
(24023, 46, '2021-02-10', 'S/R', 1, 'Normal', '2021-01-29', '2021-02-02', '', '', '', 'RAFAEL GARCIA PEREZ', '', '', 'POR ESTE MEDIO SE LE INFORMA  QU MIEMBROS DE LA ORGANIZACIÓN  SANTA FE AC LA CUAL REPRESENTA A LAS SRAS MARIA ELENA ROJAS GUTIERREZ Y PAOLA CRISTEL ALARCON ROJAS, HAN SIDO OBJETO DE ACOSO Y ACTOS DE DE OSTIGAMIENTO POR PARTE DE LA SRA GRISEL VELAZQUEZ HERRERA MIEMBRO DE LA ORGANIZACION DE COMERCIANTES \"MUJERES POR UN HOGAR DIGNO , OBRERA AC\" Y AL MISMO TIEMPO LA SRA GRISEL ES FUNCIONARIA PUBLICA DE LA ALCALDIA CUAUHTEMOC', '', 'En proceso', 0, 'Normal'),
(24024, 47, '2021-02-10', '477/2021', 1, 'Normal', '2021-01-30', '2021-02-02', '', '', '', 'MAYRA TERESA HERNANDEZ BEATO', 'LA ACTUARIA DEL JUZGADO PRIMERO DE DISTRITO DE AMPARO EN MATERIA PENAL EN LA CIUDAD DE MEXICO', 'PODER JUDICIAL DE LA FEDERACION', 'EN LOS AUTOS DEL JUICIO DE AMPARO 71/2021-VII PROMOVIDO POR JAVIER ULISES ALCANTARA LEE A FAVOR DE JAHEL VERONICA LOPEZ MORENO', '', 'En proceso', 0, 'Normal'),
(24025, 48, '2021-02-10', '492/2021', 1, 'Normal', '2021-01-30', '2021-02-02', '', '', '', 'MAYRA TERESA HERNANDEZ BEATO', 'LA ACTUARIA DEL JUZGADO PRIMERO DE DISTRITO DE AMPARO EN MATERIA PENAL EN LA CIUDAD DE MEXICO', 'PODER JUDICIAL DE LA FEDERACION', 'EN LOS AUTOS DEL JUICIO DE AMPARO 71/2021-VII B PROMOVIDO POR JAVIER ULISES ALCANTARA LEE A FAVOR DE JAHEL VERONICA LOPEZ MORENO', '', 'En proceso', 0, 'Normal'),
(24026, 49, '2021-02-10', 'CACH/008/2021', 1, 'Normal', '2021-02-02', '2021-02-03', '', '', '', 'NORMA LUCERO PEREZ CORTES', 'COORDINADORA DE ADMINISTRACION DE CAPITAL HUMANO EN LA SECRETARIA DE GOBIERNO', 'DIRECCION GENERAL DE ADMINISTRACION Y FINANZAS ', 'EN ATENCION A LA CIRCULAR SAF/DGAP/022/2021 SE LE SOLICITA REMITAN LA INFORMACION TODOS LOS MIERCOLES ANTES DE LAS 13:00 HRA, EL ARCHIVO DEBERA ENVIARSE DE MANERA FISICA Y MEDIO MAGNETICO', '', 'En proceso', 0, 'Normal'),
(24027, 50, '2021-02-10', 'SUAC-140121639565', 1, 'Normal', '2021-01-14', '2021-02-03', '', '', '', 'SISTEMA UNIFICADO DE ATENCION CIUDADANA', '', 'SITEMA UNIFICADO DE ATENCION CIUDADANA', 'SOLICITA AUTORIZACIÓN PARA QUE LE SEA PERMITIDO CONTINUAR LABORANDO  EN EL PUESTO UBICADO EN LA CALLE DE REPÚBLICA DE NICARAGUA Y REPÚBLICA DE ARGENTINA , COLONIA CENTRO, EN LA CUAL OFRECE EL SERVICIO DE CORTE DE CABELLO, TINTES, LUCES, LO ANTERIOR DEBIDO A QUE EN ESTE ESPACIO LABORAN LOS INTEGRANTES DE SU FAMILIA', '', 'En proceso', 0, 'Normal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turno_detalle`
--

CREATE TABLE `turno_detalle` (
  `IdDetalle` int(5) NOT NULL,
  `FkTurno` int(5) NOT NULL,
  `TurnadoA` int(5) NOT NULL,
  `Respuesta` varchar(1200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Anexo` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Observaciones` varchar(1200) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `turno_detalle`
--

INSERT INTO `turno_detalle` (`IdDetalle`, `FkTurno`, `TurnadoA`, `Respuesta`, `Anexo`, `Observaciones`) VALUES
(10291, 23978, 10, 'SE BRINDA ATENCIÓN CON OFICIO JUDEA/013/2021.', '', ''),
(10292, 23979, 5, 'se da respúesta con el oficio  SG/SSPARVP/004/2021', '', ''),
(10293, 23980, 16, '', '', ''),
(10294, 23981, 17, 'SE DIO RESPUESTAS CON OFICIO 014 V. T. 001 ANÓNIMO DONDE SE LE INFORMO QUE PERSONAL OPERATIVO ADSCRITO A ESTA DIRECCIÓN GENERAL, DENTRO DEL AMBITO DE SU COMPETENCIA, EN DISTINTAS FECHAS  SE HA CONSTITUIDO A AL ESXPLANDA DONDE SE UBICA EL METRO PINO SUÁREZ; REALIZANDO DE MANERA CONSTANTE RECORRIDOS Y EL RETIRO DE OBSTÁCULOS QUE IMPIDEN EL USO A DECUADO DE LA VÍA PUBLICA. OFO_014 VT 001 C. ANÓNIMO', '', ''),
(10295, 23982, 7, 'MEDIANTE OFICIO SG/SSPARVP/DOSCVP/005/2021 DIRIGIDO A LA PETICIONARIA, EN EL QUE SE LE INFORMA QUE DE MANERA CONJUNTA CON LA ALCALDÍA IZTAPALAPA SE ATENDIÓ SU PETICIÓN, SE REALIZARON RECORRIDOS EN EL TIANGUIS POR ELLA REFERIDO A FIN DE OBSERVAR QUE LOS OFERENTES CUMPLAN CON LAS RECOMENDACIONES SANITARIAS PARA EVITAR EL CONTAGIO Y PROPAGACIÓN DE COVID-19', '', ''),
(10296, 23983, 17, 'SE DIO RESPUESTA QUE CON FECHA 21 DE DICIEMBRE DEL 2021, SU PÚBLICO ENLA GACETA OFICIAL DE LA CIDUDAD DE MÉXICO. EL TRIGÉSIMO SÉPTIMO AVISO POR EL QUE ELCOMITE DE MONITOREO ESTABLECE MEDIDAS EXTRAORDINARIAS DE PROTECCIÓN A LA SALUD PARA DISMINUIR LA CURVA DE CONTAGIOS, DERIVA DE QUE LA CIUDAD SE ENCUENTRA EN SEMAFORO  ROJO DE MÁXIMA ALERTA PRO LAMERGENCIA COVID-19. OFO_012_VT 009 C. ANÓNIMO.', '', ''),
(10298, 23985, 17, 'SE DIO RESPUESTA CON OFICIO 15_VT 011 , DONDE S ELE INFORMA QUE PERSONAL OPERATIVO ADSCRITO A ESTA DIRECCIÓN GENERAL, DENTRO DEL ÁMBITO DE SU COMPETENCIA, EN DISTINTAS FECHAS, SE HA CONSTITUIDO EN LAS CALLES  DE PEÑA Y PEÑA Y MANUEL DOBLADO, REALIZANDO DE MANERA CONSTANTE RECORRIDOS YEL RETIRO DE OBSTÁCULOS QUE IMPIDEN EL USO ADECUADO DE  LA VÍA PÚBLICA EN EL CENTRO HISTÓRICO. FO _015 VT 011 C. CARIDAD AGUILAR DORANTES\r\n', '', ''),
(10299, 23986, 17, 'SE DIO RESPUESTA CON OFICIO OFO_013_ VT 010 C. ANÓNIMO, DONDE SE LE SUGUIERE QUE DIRIJA SU PETICIÓN A  LA SECRETARIA DE AMINISTRACIÓN Y FINANZAS, A TRAVÉS DE L ADIRECCIÓN GENERAL DE PATRIMONIO INMOBILIARIO, \r\nOFO_013_ VT 010 C. ANÓNIMO', '', ''),
(10300, 23987, 5, 'FUE ATENDIDO EL 16 DE DICIEMBRE 2020, MEDIANTE OFICIO SG/SSPARVP/DPA/308/2020, ENVIADO POR CORREO ELECTRÓNICO', '', ''),
(10301, 23988, 7, 'MEDIANTE OFICIO SG/SSPARVP/DOSCVP/006/2021 DIRIGIDO A ROGELIO DEL CASTILLO BRIKER, DIRECTOR DE GOBIERNO EN LA ALCALDÍA IZTAPALAPA EN EL QUE SE SOLICITÓ AGENDAR UNA REUNIÓN DE TRABAJO A FIN DE DARLE ATENCIÓN CONJUNTA A LA PETICIÓN CIUDADANA. ', '', ''),
(10302, 23989, 7, 'MEDIANTE OFICIO SG/SSPARVP/DOSCVP/SOCVP/001/2021 DIRIGIDO A LA PETICIONARIA POR MEDIO DEL CUAL SE LE SOLICITA HAGA LLEGAR EL PERMISO DE OPERACION SISCOVIP, PARA PODER SOLICITAR MESA DE TRABAJO CON EL  DIRECTOR DE GOBIERNO DE LA ALCALDIA CUAJIMALPA. CON OFICIO SG/SSPARVP/DOSCVP/SOCVP/005/2021 DIRIGIDO A LA PETICIONARIA EN EL QUE SE LE INFORMA QUE AL NO PRESENTAR SOPORTE DOCUMENTAL SOBRE SU CLAVE SISCOVIP, SE LE INVITA A QUE SE DIRIJA A LA ALCALDÍA PARA SU ATENCIÓN. ', '', ''),
(10303, 23990, 17, 'SE LE DIO RESPUESTA CON  OFICIO FO_016 VT_013 C. LILIANA CASTILLO TELLO, DONDE SE LE INDICA QUE ESTA DIRECCIÓN GENERAL DE NTO DE LAS ATIBUCIONES ASIGNADAS ESTA, DÍA CON DÍA REALIZA RECORRIDOS EN LOS PERÓMETROS \"A\" Y \"B\" DEL CENTRO HISTÓRICO A EFECTO DE RETIRAR EL COMERCIO INFORMAL DE LA VÍA PÚBLICA.OFO_016 VT_013 C. LILIANA CASTILLO TELLO.', '', ''),
(10304, 23991, 1, 'SE TOMO CONOCIMIENTO Y SE ARCHIVA EN EL EXPEDIENTE CALLE 7 2021', '', ''),
(10305, 23984, 17, 'SE DIO RESPUESTA CON OFICIO 17_VT 012 , DONDE S ELE INFORMA QUE PERSONAL OPERATIVO ADSCRITO A ESTA DIRECCIÓN GENERAL, DENTRO DEL ÁMBITO DE SU COMPETENCIA, EN DISTINTAS FECHAS, SE HA CONSTITUIDO A LA CALLE DE BERRIOZÁBAL ENTRE CALLE DE GONZÁLEZ, PEÑA Y PEÑA Y CIRCUNVALACIÓN REALIZANDO DE MANERA CONSTANTE RECORRIDOS YEL RETIRO DE OBSTÁCULOS QUE IMPIDEN EL USO ADECUADO DE  LA VÍA PÚBLICA EN EL CENTRO HISTÓRICO. OFO_017_VT 012 C. SUSANA ARIAS VARGAS.', '', ''),
(10306, 23992, 5, 'PARA CONOCIMIENTO ', '', ''),
(10308, 23994, 5, 'PORA CONOCIMIENTO E INTEGRACION DE LA RESPUESTA A DERECHOS HUMANOS SIGNADA POR EL C. AVELINO MENDEZ RANGEL.', '', ''),
(10309, 23995, 1, 'SE TOMÓ CONOCIMIENTO Y SE ARCHIVA EN LA CARPETA DE LA DIRECCION DE PROGRAMAS DE ALCALDIAS Y REORDENAMIENTO - SECCION INSPECCION OCULAR/2021', '', ''),
(10310, 23996, 1, 'SE TOMÓ CONOCIMIENTO, Y SE ARCHIVA EN LA CARPETA DE DIRECCION DE PROGRAMAS DE ALCALDIAS - SISCOVIP /2021', '', ''),
(10312, 23998, 17, 'SE DIO RESPUESTA CON OFICIO OFO_018_VT 014 C. SALO; DONDE SE LE INFORMA QUE PERSONAL OPERATIVO ADSCRITO A ESTA DIRECCIÓN GENERAL, DENTRO DEL ÁMBITO DE SU COMPETENCIA, EN DISTINTAS FECHAS, Y HORARIOS SE HA CONSTITUIDO EN DIVERSAS ARTERIAS QUE COMPONEN EL CENTRO HISTÓRICO, REALIZANDO DE MANERA CONSTANTE RECORRIDOS YEL RETIRO DE OBSTÁCULOS QUE IMPIDEN EL USO ADECUADO DE  LA VÍA PÚBLICA EN LOS PERIMETROS \"A\" Y \"B\", Y CON ELLO, EVITAR QUE SE GENERE  CONGLOMERACIONES. OFO_018_VT 014 C. SALO.\r\n', '', ''),
(10313, 23997, 5, 'SE RECANALIZO LA RESPUESTA CON EL INSTITUTO DE VERIFICACION ADMINISTRATIVA. MEDIANTE OFICIO SG/SSPARVP/010/2021', '', ''),
(10314, 23999, 5, 'Se da respuesta mediante el oficio  SG/SSPARVP/DPA/012/2021', '', ''),
(10315, 23993, 5, 'PARA CONOCIMIENTO E INTEGRACION DEL INFORME DE LA SUBSECRETARIA ', '', ''),
(10316, 24000, 17, 'SEDIO RESPUESTA CON OFICIO OFO _019_VT 016 C. ANÓNIMO; DONDE SE LE INFORMA QUE PERSONAL OPERATIVO ADSCRITO A ESTA DIRECCIÓN GENERAL, DENTRO DEL ÁMBITO DE SU COMPETENCIA, EN DISTINTAS FECHAS Y  HORARIOS \r\n SE HA CONSTITUIDO AL EXTERIOR DE LA DENOMINADA \"PLAZA DE LA TECNOLOGIA\", UBICADA EN AVENIDA LÁZARA CARDENAS ESQUINA URUGUAY, EN ELCENTRO HISTÓRICO, REALIZANDO DE MANERA CONSTANTE RECORRIDOS YEL RETIRO DE OBSTÁCULOS QUE IMPIDEN EL USO ADECUADO DE  LA VÍA PÚBLICA ENLOS PERÍMETROS \"A\" y \"B\" Y CON ELLO, EVITAR QUE SE GENEREN CONGLOMERACIÓNES.', '', ''),
(10317, 24001, 17, 'SE DIO RESPUESTA CON OFICIO OFO_020_VT 017 , DONDE SE LE DA LA INFORMACIÓN SOLICITADA DE LOS SERVIDORES PÚBLICOS QUE PARTICIPARON EN LE OPERATICO DEL DÍA 23 DE OCTUBRE DEL 2020. OFO_020_VT 017 C. BLANCA VIRIDIANA RODRÍGUEZ GUTIÉRREZ', '', ''),
(10318, 24002, 1, 'SE TOMO CONOCIMIENTO Y SE ARCHIVA EN LA CALLE 7 ', '', ''),
(10319, 24003, 1, 'SE TOMO CONOCIMIENTO  SE ARCHIVA EN CARPETA DE DOSCVP (SERGIO ESPINOSA BALLESTEROS)', '', ''),
(10320, 24004, 1, 'SE TOMO CONOCIMIENTO Y SE ARCHIVA EN LA CARPETA DE COPIAS DE CONOCIMIENTO 2021', '', ''),
(10321, 24005, 1, 'SE TOMA CONOCIMIENTO  Y SE ARCHIVA EN CARPETA DE COPIAS DE CONOCIMIENTO 2021', '', ''),
(10322, 24006, 7, 'MEDIANTE OFICIO SG/SSPARVP/DOSCVP/SACVP/024/2021 DIRIGIDO A LA PETICIONARIA EN LA QUE SE LE INFORMA QUE SU PETICIÓN SE TURNÓ A LA ALCALDÍA MIGUEL HIDALGO.', '', ''),
(10323, 24007, 5, 'SE ENVIA RESPUESTA DE MANERA ELECTRONICA SG/SSPARVP/DPA/014/2021 DE FECHA 15 DE FEBRERO DE 2021.', '', ''),
(10324, 24008, 7, 'MEDIANTE OFICIO SG/SSPARVP/DOSCVP/SOCVP/003/2021 DIRIGIDO AL PETICIONARIO EN EL QUE SE LE SOLICITA REMITA VÍA CORREO ELECTRÓNICO LA DIRECCIÓN COMPLETA PARA DARLE ATENCIÓN Y SEGUIMIENTO  A SU PETICIÓN. CON OFICIO SG/SSPARVP/DOSCVP/SOCVP/007/2021 DIRIGIDO AL PETICIONARIO SE LE INFORMA QUE AL NO CONTAR CON LA INFORMACIÓN REQUERIDA DE SU PARTE. CON OFICIO SG/SSPARVP/DOSCVP/SOCVP/011/2021 SE LE DA RESPUESTA FINAL AL PETICIONARIO, SE DA POR CONLCUIDA SU PETICIÓN ANTE ESTA DEPENDENCIA.  ', '', ''),
(10325, 24009, 7, 'MEDIANTE OFICIO SG/SSPARVP/DOSCVP/SOCVP/032/2021 DIRIGIDO AL PETICIONARIO EN EL QUE SE LE INFORMA LA RESPUESTA PROPORCIONADA POR PERSONAL DE LA ALCALDÍA GAM, DANDO POR CONCLUIDA SU SOLICITUD ANTE ESTA DEPENDENCIA. ', '', ''),
(10327, 24011, 5, 'RELACIONADO CON VT. 1342/2020 (XOCHI13-2721/2020)\r\nSE DA RESPUESTA CON OFICIO 034/2021 DE FECHA 21/01/2021', '', ''),
(10328, 24012, 5, 'se toma conocimiento y se integra al padrón respectivo.', '', ''),
(10330, 24014, 16, '', '', ''),
(10331, 24013, 18, '', '', ''),
(10332, 24015, 5, 'SE TOMA CONOCIMIENTO', '', ''),
(10333, 24016, 5, 'SE TOMA CONOCIMIENTO', '', ''),
(10334, 24017, 5, 'SE TOMA CONOCIMIENTO', '', ''),
(10335, 24018, 5, 'SE ATIENDE EN TIEMPO Y FORMA Y SE PREPARA NOTA INFORTIVA NO. 012 DE LA ATENCIÓN BRINDADA ', '', ''),
(10336, 24019, 20, 'Se toma conocimiento', '', ''),
(10337, 24020, 17, 'SE LE DO RESPUESTA CON OFICIO OFO_028_VT 024 C. AZUCENA MARÍA FERNANDEZ ISLAS MIER DONDE SE LE DA A CONOCER EL SEMAFORO EPIDEMEOLOGICO DE CIUDAD DE MEXICO, ASI COMO LAS MEDIDAS DE PROTECCION A LA SALUD QUE DEBEN OBSERVARSE DERIVADO DE LA EMERGENCIA SANITARIA, POR COVID -19.', '', ''),
(10338, 24021, 5, 'SE DA RESPUESTA CON NOTA INFORMATIVA NO. 11', '', ''),
(10339, 24022, 7, 'SE TOMA DE CONOCIMIENTO ', '', ''),
(10340, 24023, 7, 'MEDIANTE OFICIO SG/SSPARVP/DOSCVP/SOCVP/004/2021 SE LE INFORMA QUE CON RELACIÓN A SU PETICIÓN, SE ENTABLÓ COMUNICACIÓN CON PERSONAL DE LA ALCALDÍA CUAUHTÉMOC, QUIENES REFIRIERON QUE NO SE PUEDEN OTORGAR NUEVOS ESPACIOS PARA EJERCER EL COMERCIO EN VÍA PÚBLICA. POR LO QUE SE DA POR CONLCUIDA SU ATENCIÓN ANTE ESTA DEPENDENCIA. ', '', ''),
(10341, 24024, 16, 'Se envío oficio con Desahogo de Respuesta dirigido a Mayra Teresa Hernández Juzgado Primero\r\nSG/SSPARVP/CJYN/006/2021', '', ''),
(10342, 24025, 16, 'SG/SSPARVP/CJYN/008/2021      \r\nSe envío oficio a Mayra Teresa Hernández a Juzgado Primero', '', ''),
(10343, 24026, 10, 'SE TOMA CONOCIMIENTO.', '', ''),
(10344, 24027, 17, 'SE RESPONDIO CON OFICIO FO_029_VT 027 C. RAUL MORALES SALINAS . DONDE SE LE HACE SABER QUE DENTRO DE LAS ATRIBUCIONES DE ESTA DIRECCIÓN NO SE ENCUENTRA LA DE EMITIR AUTORIZACIONES, PERMISOS O SIMILARES PARA EL USO DE LA VÍA PÚBLICA.', '', ''),
(10374, 24010, 17, 'MEDIANTE OFICIO SG/SSPARVP/DGOVPCH/053/2021, DE FECHA 22 DE FEBRERO DEL 2021 SE REMITE LA RESPUESTA A LA C. BERENICE GOMEZ MORAN, EN  EL CUAL SE LE  INFORMA QUE AL NO ADVERTIRSE DEL CONTENIDO QUE SE TRATE DE ALGUN TEMA RELACIONACO CON LAS ATRIBUCIONES CORRESPONDIENTES A ESTA AREA ADMINISTRATIVA NO ES POSIBLE ACORDAR FAVORABLEMENTE SU PETICION DE UNA REUNION VIRTUAL O PRESENCIAL . (se vincula con el volante de turno No. 111)', '', '');

-- --------------------------------------------------------

--
-- Estructura para la vista `datosturno`
--
DROP TABLE IF EXISTS `datosturno`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `datosturno`  AS  select `turno`.`NumTurno` AS `NumTurno`,`turno`.`Clasificacion` AS `Clasificacion`,`turno`.`Promotor` AS `Promotor`,`turno`.`Fecha_registro` AS `Fecha_registro`,`turno`.`eValidado` AS `eValidado`,`turno`.`NumOficio` AS `NumOficio`,`turno`.`FkAtencion` AS `FkAtencion`,`turno`.`Estatus` AS `Estatus`,`turno`.`IdTurno` AS `IdTurno`,`turno`.`FechaDocumento` AS `FechaDocumento`,`turno`.`FechaRecibido` AS `FechaRecibido`,`turno`.`FechaLimite` AS `FechaLimite`,`turno`.`VoSg` AS `VoSg`,`turno`.`VoSalida` AS `VoSalida`,`turno`.`Remitente` AS `Remitente`,`turno`.`CargoRemitente` AS `CargoRemitente`,`turno`.`Asunto` AS `Asunto`,`turno`.`OtroAtencion` AS `OtroAtencion`,`turno`.`FkResponsable` AS `FkResponsable`,`cat_atencion`.`IdAtencion` AS `IdAtencion`,`cat_atencion`.`TipoAtencion` AS `TipoAtencion`,`responsable_area`.`NombreResponsable` AS `NombreResponsable` from ((`turno` join `cat_atencion` on((`turno`.`FkAtencion` = `cat_atencion`.`IdAtencion`))) join `responsable_area` on((`turno`.`FkResponsable` = `responsable_area`.`IdResponsable`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `reporte`
--
DROP TABLE IF EXISTS `reporte`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `reporte`  AS  select `turno`.`IdTurno` AS `IdTurno`,`turno`.`NumTurno` AS `NumTurno`,`turno`.`Fecha_registro` AS `Fecha_registro`,`turno`.`NumOficio` AS `NumOficio`,`turno`.`FkAtencion` AS `FkAtencion`,`turno`.`Estatus` AS `Estatus`,`turno`.`FechaDocumento` AS `FechaDocumento`,`turno`.`FechaRecibido` AS `FechaRecibido`,`turno`.`FechaLimite` AS `FechaLimite`,`turno`.`VoSg` AS `VoSg`,`turno`.`VoSalida` AS `VoSalida`,`turno`.`Remitente` AS `Remitente`,`turno`.`CargoRemitente` AS `CargoRemitente`,`turno`.`Promotor` AS `Promotor`,`turno`.`Asunto` AS `Asunto`,`turno`.`OtroAtencion` AS `OtroAtencion`,`turno`.`eValidado` AS `eValidado`,`turno_detalle`.`FkTurno` AS `FkTurno`,`turno_detalle`.`Observaciones` AS `Observaciones`,`turno_detalle`.`TurnadoA` AS `TurnadoA`,`responsable_area`.`NombreResponsable` AS `NombreResponsable`,`responsable_area`.`CargoResponsable` AS `CargoResponsable`,`turno`.`FkResponsable` AS `FkResponsable`,`turno_detalle`.`Respuesta` AS `Respuesta`,`turno_detalle`.`Anexo` AS `Anexo`,`cat_area`.`IdArea` AS `IdArea`,`cat_area`.`NombreArea` AS `NombreArea`,`cat_area`.`Activo` AS `Activo`,`cat_atencion`.`IdAtencion` AS `IdAtencion`,`cat_atencion`.`TipoAtencion` AS `TipoAtencion` from ((((`turno` join `turno_detalle` on((`turno`.`IdTurno` = `turno_detalle`.`FkTurno`))) join `cat_area` on((`turno_detalle`.`TurnadoA` = `cat_area`.`IdArea`))) join `cat_atencion` on((`turno`.`FkAtencion` = `cat_atencion`.`IdAtencion`))) join `responsable_area` on((`turno`.`FkResponsable` = `responsable_area`.`IdResponsable`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `reportea`
--
DROP TABLE IF EXISTS `reportea`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `reportea`  AS  select `turno`.`IdTurno` AS `IdTurno`,`turno`.`Clasificacion` AS `Clasificacion`,`turno`.`NumTurno` AS `NumTurno`,`turno`.`Fecha_registro` AS `Fecha_registro`,`turno`.`NumOficio` AS `NumOficio`,`turno`.`FkAtencion` AS `FkAtencion`,`turno`.`Estatus` AS `Estatus`,`turno`.`FechaDocumento` AS `FechaDocumento`,`turno`.`FechaRecibido` AS `FechaRecibido`,`turno`.`FechaLimite` AS `FechaLimite`,`turno`.`VoSg` AS `VoSg`,`turno`.`VoSalida` AS `VoSalida`,`turno`.`Remitente` AS `Remitente`,`turno`.`CargoRemitente` AS `CargoRemitente`,`turno`.`Promotor` AS `Promotor`,`turno`.`Asunto` AS `Asunto`,`turno`.`OtroAtencion` AS `OtroAtencion`,`turno`.`eValidado` AS `eValidado`,`turno`.`FkResponsable` AS `FkResponsable`,`responsable_area`.`NombreResponsable` AS `NombreResponsable`,`cat_atencion`.`IdAtencion` AS `IdAtencion`,`cat_atencion`.`TipoAtencion` AS `TipoAtencion` from ((`turno` join `cat_atencion` on((`turno`.`FkAtencion` = `cat_atencion`.`IdAtencion`))) join `responsable_area` on((`turno`.`FkResponsable` = `responsable_area`.`IdResponsable`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `reporteb`
--
DROP TABLE IF EXISTS `reporteb`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `reporteb`  AS  select `turno_detalle`.`FkTurno` AS `FkTurno`,`turno_detalle`.`Observaciones` AS `Observaciones`,`turno_detalle`.`TurnadoA` AS `TurnadoA`,`turno_detalle`.`Respuesta` AS `Respuesta`,`turno_detalle`.`Anexo` AS `Anexo`,`cat_area`.`IdArea` AS `IdArea`,`cat_area`.`NombreArea` AS `NombreArea`,`cat_area`.`Activo` AS `Activo` from (`turno_detalle` join `cat_area` on((`turno_detalle`.`TurnadoA` = `cat_area`.`IdArea`))) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cat_area`
--
ALTER TABLE `cat_area`
  ADD PRIMARY KEY (`IdArea`);

--
-- Indices de la tabla `cat_atencion`
--
ALTER TABLE `cat_atencion`
  ADD PRIMARY KEY (`IdAtencion`);

--
-- Indices de la tabla `cat_usuario`
--
ALTER TABLE `cat_usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `FkArea` (`FkArea`);

--
-- Indices de la tabla `digitalizados`
--
ALTER TABLE `digitalizados`
  ADD KEY `fkTurno` (`fkTurno`),
  ADD KEY `AArchvio` (`AArchvio`);

--
-- Indices de la tabla `modificaciones_tdetalle`
--
ALTER TABLE `modificaciones_tdetalle`
  ADD PRIMARY KEY (`IdDetalle`),
  ADD KEY `FkTurno` (`FkTurno`),
  ADD KEY `TurnadoA` (`TurnadoA`);

--
-- Indices de la tabla `modificaciones_turno`
--
ALTER TABLE `modificaciones_turno`
  ADD PRIMARY KEY (`IdTurno`),
  ADD KEY `FkAtencion` (`FkAtencion`);

--
-- Indices de la tabla `responsable_area`
--
ALTER TABLE `responsable_area`
  ADD PRIMARY KEY (`IdResponsable`),
  ADD KEY `FkArea` (`FkArea`);

--
-- Indices de la tabla `seguimiento_detalle`
--
ALTER TABLE `seguimiento_detalle`
  ADD PRIMARY KEY (`IdSeguimiento`),
  ADD KEY `FkDetalle` (`FkDetalle`);

--
-- Indices de la tabla `turno`
--
ALTER TABLE `turno`
  ADD PRIMARY KEY (`IdTurno`),
  ADD KEY `FkAtencion` (`FkAtencion`);

--
-- Indices de la tabla `turno_detalle`
--
ALTER TABLE `turno_detalle`
  ADD PRIMARY KEY (`IdDetalle`),
  ADD KEY `FkTurno` (`FkTurno`),
  ADD KEY `TurnadoA` (`TurnadoA`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cat_usuario`
--
ALTER TABLE `cat_usuario`
  ADD CONSTRAINT `cat_usuario_ibfk_1` FOREIGN KEY (`FkArea`) REFERENCES `cat_area` (`IdArea`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `digitalizados`
--
ALTER TABLE `digitalizados`
  ADD CONSTRAINT `digitalizados_ibfk_1` FOREIGN KEY (`fkTurno`) REFERENCES `turno` (`IdTurno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `digitalizados_ibfk_2` FOREIGN KEY (`AArchvio`) REFERENCES `cat_area` (`IdArea`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `responsable_area`
--
ALTER TABLE `responsable_area`
  ADD CONSTRAINT `responsable_area_ibfk_1` FOREIGN KEY (`FkArea`) REFERENCES `cat_area` (`IdArea`);

--
-- Filtros para la tabla `seguimiento_detalle`
--
ALTER TABLE `seguimiento_detalle`
  ADD CONSTRAINT `seguimiento_detalle_ibfk_1` FOREIGN KEY (`FkDetalle`) REFERENCES `turno_detalle` (`IdDetalle`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `turno`
--
ALTER TABLE `turno`
  ADD CONSTRAINT `turno_ibfk_1` FOREIGN KEY (`FkAtencion`) REFERENCES `cat_atencion` (`IdAtencion`);

--
-- Filtros para la tabla `turno_detalle`
--
ALTER TABLE `turno_detalle`
  ADD CONSTRAINT `turno_detalle_ibfk_1` FOREIGN KEY (`FkTurno`) REFERENCES `turno` (`IdTurno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `turno_detalle_ibfk_2` FOREIGN KEY (`TurnadoA`) REFERENCES `cat_area` (`IdArea`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
