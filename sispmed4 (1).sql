-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-10-2020 a las 01:43:56
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sispmed4`
--
CREATE DATABASE IF NOT EXISTS `sispmed4` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sispmed4`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acompanantes`
--

CREATE TABLE `acompanantes` (
  `id` int(2) NOT NULL,
  `tipoId` char(3) NOT NULL,
  `nIdAcom` char(15) NOT NULL,
  `pApe` char(15) NOT NULL,
  `sApe` char(15) NOT NULL,
  `pNom` char(15) NOT NULL,
  `sNom` char(15) NOT NULL,
  `edad` int(3) NOT NULL,
  `telAcom` char(10) NOT NULL,
  `mailAcom` varchar(30) DEFAULT NULL,
  `parPac` varchar(30) NOT NULL,
  `nIdPac` char(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `acompanantes`
--

INSERT INTO `acompanantes` (`id`, `tipoId`, `nIdAcom`, `pApe`, `sApe`, `pNom`, `sNom`, `edad`, `telAcom`, `mailAcom`, `parPac`, `nIdPac`, `created_at`, `updated_at`) VALUES
(1, 'CC', '100234567', 'Agudelo', 'Echeverry', 'Rubiel', 'Alberto', 26, '7896621', 'areagudelo@hotmail.com', 'Primo', '1015274506', NULL, NULL),
(2, 'CC', '1098742647', 'Alvarez', 'Puerta', 'Jhon', 'Alexander', 29, '3123245632', 'ajpalvarez@hotmail.com', 'Primo', '1015274506', NULL, NULL),
(3, 'CC', '41789264', 'Arango', 'Alvarez', 'Alejandra', 'Maria', 39, '3126784563', 'maaarango@hotmail.com', 'Sobrina', '1015274506', NULL, NULL),
(4, 'CC', '67524367', 'Atehortua', 'Agudelo', 'Johana', 'Alexandra', 30, '3217894567', 'ajaatehortua@gmail.com', 'Tia', '1016274506', NULL, NULL),
(5, 'CC', '1008764533', 'Barrientos', 'Gonzalez', 'Jhon', 'Jairo', 22, '3202298876', 'jjgbarrientos@gmail.com', 'Sobrino', '1017274506', NULL, NULL),
(6, 'CC', '1029485678', 'Cardona', 'Loaiza', 'Daniel', '', 25, '4345567', 'dlcardona@gmail.com', 'Amigo', '1018274506', NULL, NULL),
(7, 'CC', '78756432', 'Giraldo', 'Perez', 'Lina', 'Marcela', 35, '3219087637', 'mlpgiraldo@hotmail.com', 'Amiga0', '1019274506', NULL, NULL),
(8, 'CC', '1002369852', 'Perez', 'Perecin', 'Pepito', 'Juanito', 24, '3256487596', 'pjpp@gmail.com', 'Primo', '1016274506', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda`
--

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora_inicio` varchar(10) NOT NULL,
  `hora_final` varchar(10) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `agenda`
--

INSERT INTO `agenda` (`id`, `usuario_id`, `fecha`, `hora_inicio`, `hora_final`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES
(1, 4, '2020-08-10', '00:00:00', '00:00:00', 'agenda andres', 1, '2020-08-10 08:00:36', '2020-08-10 08:00:36'),
(2, 2, '2020-08-18', '20:00', '20:00', 'cita prueba', 1, '2020-08-19 00:42:04', '2020-08-19 00:42:04'),
(3, 2, '2020-08-19', '13:00', '14:00', 'asdasdasd', 1, '2020-08-19 00:43:42', '2020-08-19 00:43:42'),
(4, 4, '2020-08-19', '02:00', '03:00', 'Cita', 1, '2020-08-19 00:44:32', '2020-08-19 00:44:32'),
(5, 3, '2020-08-18', '04:00', '05:00', 'mnbmn', 1, '2020-08-19 01:01:10', '2020-08-19 01:01:10'),
(6, 3, '2020-08-20', '13:00', '14:00', 'sadas', 1, '2020-08-21 00:23:49', '2020-08-21 00:23:49'),
(7, 4, '2020-09-09', '15:06:00', '15:50:00', 'jj', 1, '2020-09-09 20:06:00', '2020-09-09 20:06:00'),
(8, 1, '2020-09-09', '17:00:00', '17:30:00', 'assdd', 1, '2020-09-09 20:43:16', '2020-09-09 20:43:16'),
(9, 2, '2020-09-09', '23:02:00', '23:32:00', 'prueba', 1, '2020-09-09 20:54:52', '2020-09-09 20:54:52'),
(10, 2, '2020-09-09', '14:00:00', '14:30:00', ',fhasdjlfkjasdlkjfaklds', 1, '2020-09-09 20:57:45', '2020-09-09 20:57:45'),
(11, 3, '2020-09-10', '01:00:00', '01:30:00', '159753', 1, '2020-09-09 21:03:22', '2020-09-09 21:03:22'),
(12, 2, '2020-09-11', '03:00:00', '03:30:00', '44', 1, '2020-09-09 21:50:04', '2020-09-09 21:50:04'),
(13, 3, '2020-09-18', '13:00:00', '13:30:00', 'Ascddd', 1, '2020-09-18 15:39:00', '2020-09-18 15:39:00'),
(14, 2, '2020-10-08', '04:00:00', '04:30:00', 'lkaksdkdsd', 1, '2020-10-03 00:05:35', '2020-10-03 00:05:35'),
(15, 3, '2020-10-08', '23:00:00', '23:30:00', 'kklklask', 1, '2020-10-03 00:07:05', '2020-10-03 00:07:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `id` int(2) NOT NULL,
  `nomCar` varchar(20) NOT NULL,
  `salCar` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`id`, `nomCar`, `salCar`) VALUES
(1, 'Enfermera', 1500000),
(2, 'Cardiologo', 4500000),
(3, 'Enfermera Jefe', 2500000),
(4, 'Secretaria', 1200000),
(5, 'Director', 5000000),
(6, 'Auxiliar', 1000000),
(7, 'CargoPru', 500000),
(8, 'Prueba', 50000),
(9, 'Prueba2', 78999),
(10, 'Pruba5', 170000),
(11, 'pppp', 123456),
(12, 'Prueba1', 1555000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_insumos`
--

CREATE TABLE `categorias_insumos` (
  `id` int(2) NOT NULL,
  `nomCate` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias_insumos`
--

INSERT INTO `categorias_insumos` (`id`, `nomCate`) VALUES
(1, 'Analgésicos'),
(2, 'Antiácidos'),
(3, 'Antialérgicos'),
(7, 'Antidepresivos'),
(4, 'Antidiarreicos'),
(5, 'Antiinfecciosos'),
(6, 'Antiinflamatorios'),
(8, 'Antipiréticos'),
(9, 'Antitusivos'),
(10, 'Laxantes'),
(11, 'Mucolíticos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id_cita` int(3) NOT NULL,
  `codCita` char(10) NOT NULL,
  `fecIni` datetime DEFAULT NULL,
  `fecFin` datetime DEFAULT NULL,
  `descr` varchar(100) DEFAULT NULL,
  `obs` varchar(100) DEFAULT NULL,
  `estCita` char(10) DEFAULT NULL,
  `nIdPac` char(15) NOT NULL,
  `nIdAcom` char(15) DEFAULT NULL,
  `nomSede` char(15) NOT NULL,
  `nomIPS` varchar(20) NOT NULL,
  `nomProc` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id_cita`, `codCita`, `fecIni`, `fecFin`, `descr`, `obs`, `estCita`, `nIdPac`, `nIdAcom`, `nomSede`, `nomIPS`, `nomProc`) VALUES
(1, 'CIT001', '2020-07-02 19:01:11', '2020-07-02 19:31:11', 'CITA CONTROL', 'NINGUNA', 'ASIGNADA', '1015274506', '100234567', 'Sede Centro', 'COMPENSAR', 'Control');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convenios`
--

CREATE TABLE `convenios` (
  `id` int(2) NOT NULL,
  `codConv` char(10) NOT NULL,
  `fecAper` date NOT NULL,
  `nomIPS` varchar(20) NOT NULL,
  `nomConv` varchar(20) NOT NULL,
  `resolu` varchar(20) NOT NULL,
  `objConv` varchar(50) NOT NULL,
  `durConv` int(2) NOT NULL,
  `cosConv` int(10) NOT NULL,
  `estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `convenios`
--

INSERT INTO `convenios` (`id`, `codConv`, `fecAper`, `nomIPS`, `nomConv`, `resolu`, `objConv`, `durConv`, `cosConv`, `estado`) VALUES
(1, 'CONV001', '2020-01-01', 'COMPENSAR', 'Conv. Compensar', 'Reso. 234 de 2020', 'PSAM', 12, 125000, 1),
(2, 'CONV002', '2019-02-01', 'Sanitas', 'Conv. Sanitas', 'Reso. 123 de 2019', 'Prestación de servicios de cardiología', 5, 40000000, 0),
(3, 'CONV003', '2017-03-01', 'Cafesalud', 'Conv. Cafesalud', 'Reso. 345 de 2017', 'Prestación de servicios de cardiología', 7, 60000000, 0),
(4, 'CONV004', '2018-06-01', 'Salud Total', 'Conv. SaludTotal', 'Reso. 987 de 2018', 'Prestación de servicios de cardiología', 6, 45000000, 1),
(5, 'CONV005', '2020-05-01', 'Salud Colmena', 'Conv. Colmena', 'Reso. 768 de 2020', 'Prestación de servicios de cardiología', 9, 90000000, 1),
(6, 'CONV225', '2020-08-26', 'PRUEBA3', 'CONVenio prueba3', 'asjdlfkajsioj1', 'Convenio de prueba', 6, 600000, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(2) NOT NULL,
  `tipoId` char(3) NOT NULL,
  `nIdEmp` char(15) NOT NULL,
  `pApe` char(15) NOT NULL,
  `sApe` char(15) NOT NULL,
  `pNom` char(15) NOT NULL,
  `sNom` char(15) DEFAULT NULL,
  `genero` char(1) NOT NULL,
  `fecNac` date DEFAULT NULL,
  `edad` int(2) DEFAULT NULL,
  `arl` varchar(20) NOT NULL,
  `eps` varchar(20) NOT NULL,
  `rh` char(3) NOT NULL,
  `dirRes` varchar(30) NOT NULL,
  `ciuRes` varchar(30) NOT NULL,
  `telEmp` char(10) NOT NULL,
  `emailEmp` varchar(30) NOT NULL,
  `eCivil` char(10) DEFAULT NULL,
  `nivlEdu` varchar(20) NOT NULL,
  `fecIng` date DEFAULT NULL,
  `nomCar` varchar(20) NOT NULL,
  `nomSede` char(15) NOT NULL,
  `estado` enum('1','0') NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `tipoId`, `nIdEmp`, `pApe`, `sApe`, `pNom`, `sNom`, `genero`, `fecNac`, `edad`, `arl`, `eps`, `rh`, `dirRes`, `ciuRes`, `telEmp`, `emailEmp`, `eCivil`, `nivlEdu`, `fecIng`, `nomCar`, `nomSede`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'CC', '1001234567', 'Ceron', 'Diaz', 'Julio', 'Enrique', 'M', '1980-04-19', 40, 'SURA', 'COMPENSAR', 'O+', 'Calle 63A # 23-45', 'Bogota', '3209874562', 'jecdiaz@gmail.com', 'Casado', 'Profesional', '2017-08-10', 'Enfermera', 'Sede Centro', '1', NULL, NULL),
(2, 'CC', '1020394859', 'Acosta', 'Ruiz', 'Dana', 'Marcela', 'F', '1998-05-20', 22, 'Colmena', 'Sanitas', 'A+', 'Carrera 80 # 45-12', 'Bogota', '3134563745', 'dmaruiz@gmail.com', 'Soltera', 'Tecnologo', '2019-12-13', 'Enfermera', 'Sede Chapinero', '1', NULL, NULL),
(3, 'CC', '1023456789', 'Alvarez', 'Vega', 'Brayan', 'Duvan', 'M', '1993-06-17', 28, 'Sura', 'Colsubsidio', 'O+', 'Calle 13 # 45-17', 'Bogota', '3216756789', 'bdavega@gmail.com', 'Soltero', 'Tecnologo', '2020-01-15', 'Jefe', 'Sede Sur', '1', NULL, NULL),
(4, 'CC', '1014274506', 'Fonseca', 'Mosquera', 'Andres', 'Felipe', 'M', '1996-02-15', 24, 'Colmena', 'Compensar', 'O+', 'Calle 64C #112A-20', 'Bogota', '3133653643', 'affmosquera@gmail.com', 'Ninguno', 'Tecnologo', '2020-03-02', 'Secretaria', 'Sede Norte', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `id_fact` int(3) NOT NULL,
  `codFact` char(10) NOT NULL,
  `fecFact` datetime DEFAULT NULL,
  `concep` varchar(50) DEFAULT NULL,
  `valor` int(10) NOT NULL,
  `codCita` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos`
--

CREATE TABLE `gastos` (
  `id` int(2) NOT NULL,
  `codGasto` char(10) NOT NULL,
  `fecGasto` date NOT NULL,
  `forPago` char(15) NOT NULL,
  `concep` varchar(50) NOT NULL,
  `valor` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `gastos`
--

INSERT INTO `gastos` (`id`, `codGasto`, `fecGasto`, `forPago`, `concep`, `valor`, `created_at`, `updated_at`) VALUES
(1, '001', '2020-08-26', 'Tarjeta', 'Concepto modificado e', 12000, NULL, NULL),
(2, '002', '2020-08-26', 'Efectivo', 'Otro', 11000, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hc`
--

CREATE TABLE `hc` (
  `id_consulta` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `nIdPac` char(15) NOT NULL,
  `nIdAcom` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumos`
--

CREATE TABLE `insumos` (
  `id` int(3) NOT NULL,
  `codIns` char(10) NOT NULL,
  `nomIns` varchar(20) NOT NULL,
  `labora` varchar(20) NOT NULL,
  `concen` char(10) NOT NULL,
  `pres` char(15) NOT NULL,
  `unid` char(15) NOT NULL,
  `precioU` int(10) NOT NULL DEFAULT 0,
  `fecVen` date DEFAULT NULL,
  `nomCate` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `insumos`
--

INSERT INTO `insumos` (`id`, `codIns`, `nomIns`, `labora`, `concen`, `pres`, `unid`, `precioU`, `fecVen`, `nomCate`, `created_at`, `updated_at`) VALUES
(1, '43975487', 'Acetaminofen', 'Hof fman', '500mg', 'Pastillas', 'sobre x100', 13050, '2021-08-23', 'Analgésicos', NULL, NULL),
(2, '34875436', 'Ibuprofeno', 'Pfizer', '800mg', 'Pastillas', 'sobre x50', 11400, '2022-01-17', 'Analgésicos', NULL, NULL),
(3, '84759374', 'Dolex forte', 'Abbvie', '65mg', 'Pastillas', 'sobre x14', 19100, '2023-11-24', 'Analgésicos', NULL, NULL),
(4, '48754365', 'Advil max', 'J y J', '400mg', 'Pastillas', 'sobre x16', 20100, '2021-08-30', 'Analgésicos', NULL, NULL),
(5, '39478576', 'Advil ultra', 'Sanofi', '200mg', 'Pastillas', 'sobre x10', 13450, '2023-12-10', 'Analgésicos', NULL, NULL),
(6, '34846575', 'Ponstan', 'Merck', '220mg', 'Pastillas', 'sobre x15', 28400, '2021-05-28', 'Analgésicos', NULL, NULL),
(7, '37847823', 'Benzetacil', 'Novartis', '2,5ml', 'Liquido', 'liquido x5ml', 19536, '2022-06-19', 'Antialérgicos', NULL, NULL),
(8, '23409355', 'Azitromicina', 'Gilead Sciences', '500mg', 'Pastillas', 'sobre x3', 11450, '2023-07-05', 'Antialérgicos', NULL, NULL),
(9, '18375748', 'Aspirina', 'Glaxo Smitnkline', '81mg', 'Pastillas', 'sobre x28', 11020, '2021-02-22', 'Antialérgicos', NULL, NULL),
(10, '18274874', 'Clorfeniramina', 'Amgen', '5ml', 'Jarabe', 'jarabe x120ml', 3040, '2022-07-13', 'Antialérgicos', NULL, NULL),
(11, '23473875', 'Sulfato de magnesio', 'Hof fman', '500ml', 'Liquido', 'liquido x500ml', 3150, '2021-12-12', 'Antialérgicos', NULL, NULL),
(12, '38943745', 'Amoxicilina', 'Pfizer', '500mg', 'Pastillas', 'sobre x50', 22900, '2023-12-30', 'Laxantes', NULL, NULL),
(13, '43895744', 'Tiamina', 'Abbvie', '30mg', 'Pastillas', 'sobre x250', 76850, '2021-11-26', 'Laxantes', NULL, NULL),
(14, '23847835', 'Ampicilina', 'J y J', '500mg', 'Pastillas', 'sobre x100', 54550, '2022-08-29', 'Laxantes', NULL, NULL),
(15, '64873589', 'Cefacilina', 'Sanofi', '500mg', 'Pastillas', 'sobre x10', 8500, '2023-12-18', 'Laxantes', NULL, NULL),
(16, '23434535', 'Amitriptilina', 'Merck', '25mg', 'Pastillas', 'sobre x30', 7750, '2021-08-20', 'Antipiréticos', NULL, NULL),
(17, '27346745', 'Omeprazol', 'Novartis', '20mg', 'Pastillas', 'sobre x14', 7900, '2022-04-27', 'Antitusivos', NULL, NULL),
(18, '24873257', 'Mylanta', 'Gilead Sciences', '240ml', 'Liquido', 'jarabe x240ml', 32500, '2023-10-15', 'Antitusivos', NULL, NULL),
(19, '37564385', 'Diclofenaco', 'Glaxo Smitnkline', '100mg', 'Pastillas', 'sobre x20', 12600, '2021-02-22', 'Antitusivos', NULL, NULL),
(20, '74675944', 'Complejo B', 'Amgen', '90mg', 'Pastillas', 'sobre x30', 26099, '2023-03-15', 'Antitusivos', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kardex`
--

CREATE TABLE `kardex` (
  `id` int(3) NOT NULL,
  `codIns` char(10) NOT NULL,
  `entradas` int(4) NOT NULL,
  `salidas` int(4) NOT NULL,
  `stock` int(5) NOT NULL,
  `precioU` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Disparadores `kardex`
--
DELIMITER $$
CREATE TRIGGER `REVISA_PRECIO_BU` BEFORE UPDATE ON `kardex` FOR EACH ROW BEGIN 
		IF(NEW.precioU<0) THEN 
			SET NEW.precioU=0;
		ELSEIF(NEW.precioU>1000000) THEN
			SET NEW.precioU=10000;
		END IF;
	END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos_insumos`
--

CREATE TABLE `movimientos_insumos` (
  `id_movi` int(3) NOT NULL,
  `codMovi` char(10) NOT NULL,
  `fecMovi` date DEFAULT NULL,
  `codIns` char(10) NOT NULL,
  `nomIns` varchar(20) NOT NULL,
  `tipo` char(10) NOT NULL,
  `cantidad` int(2) NOT NULL,
  `concep` varchar(50) NOT NULL,
  `nIdEmp` char(15) NOT NULL,
  `nIdProv` char(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(2) NOT NULL,
  `tipoId` char(3) NOT NULL,
  `nIdPac` char(15) NOT NULL,
  `pApe` char(15) NOT NULL,
  `sApe` char(15) NOT NULL,
  `pNom` char(15) NOT NULL,
  `sNom` char(15) DEFAULT NULL,
  `genero` char(1) DEFAULT NULL,
  `fNaci` date DEFAULT NULL,
  `edad` int(3) DEFAULT NULL,
  `regimen` char(15) NOT NULL,
  `rh` char(3) DEFAULT NULL,
  `ciudad` varchar(25) DEFAULT NULL,
  `dirResi` varchar(30) DEFAULT NULL,
  `telPac` char(10) NOT NULL,
  `emailPac` varchar(30) DEFAULT NULL,
  `eCivil` char(10) DEFAULT NULL,
  `nomSede` char(15) NOT NULL,
  `nomIPS` varchar(20) NOT NULL,
  `estado` char(10) NOT NULL DEFAULT 'Activo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id`, `tipoId`, `nIdPac`, `pApe`, `sApe`, `pNom`, `sNom`, `genero`, `fNaci`, `edad`, `regimen`, `rh`, `ciudad`, `dirResi`, `telPac`, `emailPac`, `eCivil`, `nomSede`, `nomIPS`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'CC', '1015274506', 'Badillo', 'Perez', 'Rosario', 'Juana', 'F', '1979-12-09', 41, 'Contributivo', 'O+', 'Bogota', 'Calle 1 #23-45', '4678890', 'jrpbadillo@gmail.com', 'Soltera', 'Sede Centro', 'COMPENSAR', 'Inactivo', NULL, NULL),
(2, 'CC', '1016274506', 'Rincon', 'Teatin', 'Agustin', 'Juan', 'M', '1993-01-20', 27, 'Contributivo', 'O+', 'Bogota', 'CALLE 2 #34-56', '7898876', 'jatrincon@gmail.com', 'Soltero', 'Sede Norte', 'Cafesalud', 'Inactivo', NULL, NULL),
(3, 'CC', '1017274506', 'Gonzalez', 'Badillo', 'Fredy', 'Juan', 'M', '1990-05-19', 30, 'Contributivo', 'A+', 'Bogota', 'Carrera 3 # 45-67', '4567781', 'jfbgonzalez@gmail.com', 'Soltero', 'Sede Sur', 'Salud Total', 'Inactivo', NULL, NULL),
(4, 'CC', '1018274506', 'Teatin', 'Rincon', 'Juana', 'Rosario', 'M', '1979-09-30', 41, 'Subsidiado', 'O+', 'Tunja', 'Carrera 4 # 56-78', '3208871321', 'rjrteatin@gmail.com', 'Casado', 'Sede Centro', 'COMPENSAR', 'Inactivo', NULL, NULL),
(5, 'CC', '1019274506', 'Perez', 'Gonzalez', 'Juan', 'Agustin', 'M', '1982-12-12', 38, 'Contributivo', 'O+', 'Bogota', 'Tranversal 53 # 67-89', '4356678', 'ajgperez@gmail.com', 'Casado', 'Sede Centro', 'PRUEBA3', 'Activo', NULL, NULL),
(6, 'CC', '1020274506', 'Ceron', 'Alvarez', 'Julio', 'Duvan', 'M', '2000-05-22', 20, 'Contributivo', 'A-', 'Bogota', 'Calle 143 # 12-23', '3209878909', 'cajduvan@mail.com', 'Soltero', 'Sede Chapinero', 'Salud Total', 'Activo', NULL, NULL),
(7, 'CC', '1000987267', 'asdlkfj', 'ape2', 'pnom', 'snom', 'm', '1990-01-07', 30, 'Contributivo', 'o+', 'bogota', 'calle 123 4k', '7656678', 'angie.199642@gmail.com', 'SOltero', 'Sede Chapinero', 'Sanitas', 'Activo', NULL, NULL),
(8, 'CC', '10009872c72', 'asdlkfj20', 'jjkjds', 'kjashf20', 'kashdkf', 'M', '1990-01-08', 30, 'Contributivo', 'o+', 'bogota', 'calle 123 4k', '7656678', 'angie.1aa99642@gmail.com', 'SOltero', 'Sede Chapinero', 'Sanitas', 'Activo', NULL, NULL),
(10, 'CC', '1014725836', 'Perez', 'Perecin', 'Pepito', 'Juanito', 'M', '2020-08-27', 24, 'Subsidiado', 'O+', 'Bogotá', 'Calle 123 # 15-63', '3415896354', 'andrespipefon@gmail.com', 'Soltero', 'Sede Centro', 'COMPENSAR', 'Activo', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procedimientos`
--

CREATE TABLE `procedimientos` (
  `id` int(3) NOT NULL,
  `codProc` char(10) NOT NULL,
  `nomProc` varchar(30) NOT NULL,
  `conProc` varchar(50) DEFAULT NULL,
  `valProc` int(15) NOT NULL,
  `estado` int(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `procedimientos`
--

INSERT INTO `procedimientos` (`id`, `codProc`, `nomProc`, `conProc`, `valProc`, `estado`, `created_at`, `updated_at`) VALUES
(2, 'PROC001', 'Control', 'Nim', 20000, 0, NULL, NULL),
(3, 'PROC002', 'Exámen', 'Estar en ayunas', 25000, 0, NULL, NULL),
(4, 'PROC003', 'Cita', 'Ninguna', 15000, 0, NULL, NULL),
(5, 'PROC004', 'Prueba holder', 'Ropa comoda', 30000, 0, NULL, NULL),
(6, 'PROC005', 'Prueba pascal', 'Ropa comoda', 35000, 0, NULL, NULL),
(7, 'PROC2020', 'Prueba CRUD', 'Aquí van las pre condiciones', 28000, 1, NULL, NULL),
(9, 'PROC20202', 'Prueba CRUD', 'jkghjhg', 28000, 1, NULL, NULL),
(10, 'PROC006', 'Prueba CRUD', 'Pre condiciones del procedimiento', 29000, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_prov` int(2) NOT NULL,
  `tipoId` char(3) NOT NULL,
  `nIdProv` char(15) NOT NULL,
  `rSocial` varchar(20) NOT NULL,
  `contProv` varchar(20) NOT NULL,
  `telProv` char(10) NOT NULL,
  `mailProv` varchar(30) NOT NULL,
  `dirProv` varchar(30) NOT NULL,
  `ciuProv` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_prov`, `tipoId`, `nIdProv`, `rSocial`, `contProv`, `telProv`, `mailProv`, `dirProv`, `ciuProv`, `created_at`, `updated_at`) VALUES
(1, 'CC', '1014274505', 'PROVEEDOR 1', 'Carlos Perez', '3133456789', 'proveedor1@gmail.com', 'Calle 27 # 12-21', 'Bogot?', NULL, NULL),
(2, 'CC', '1014274506', ' PROVEEDOR 2', 'Juan Juarez', '3209867859', 'proveedor2@gmail.com', 'Carrera 30 # 12-20', 'Bogot?', NULL, NULL),
(3, 'CC', '1014274507', 'PROVEEDOR 3', 'Bolillo Gomez', '3112634758', 'proveedor3@gmail.com', 'Transversal 24 # 89-08', 'Bogot?', NULL, NULL),
(4, 'CC', '1014274508', 'PROVEEDOR 4', 'Pacho Maturana', '3509890976', 'proveedor4@gmail.com', 'Calle 89 #100-98', 'Bogot?', NULL, NULL),
(5, 'CC', '1014274509', 'PROVEEDOR 5', 'Pacho Sinfortuna', '3209906531', 'proveedor4@gmail.com', 'Carrera 24 # 30-90', 'Bogot?', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recaudos`
--

CREATE TABLE `recaudos` (
  `id` int(2) NOT NULL,
  `codReca` char(10) NOT NULL,
  `fecReca` date DEFAULT NULL,
  `concep` varchar(50) DEFAULT NULL,
  `valor` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `recaudos`
--

INSERT INTO `recaudos` (`id`, `codReca`, `fecReca`, `concep`, `valor`, `created_at`, `updated_at`) VALUES
(1, '001', '2020-08-25', 'Recaudo de prueba', 25000, NULL, NULL),
(2, '002', '2020-08-26', 'Recaudo de prueba 2', 26000, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(1) NOT NULL,
  `nomRol` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nomRol`) VALUES
(1, 'Administrador'),
(3, 'Enfermera'),
(4, 'Jefe'),
(2, 'Medico'),
(5, 'Secretaria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sedes`
--

CREATE TABLE `sedes` (
  `id` int(2) NOT NULL,
  `nomSede` char(15) NOT NULL,
  `dirSede` varchar(30) NOT NULL,
  `telSede` char(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sedes`
--

INSERT INTO `sedes` (`id`, `nomSede`, `dirSede`, `telSede`, `created_at`, `updated_at`, `estado`) VALUES
(1, 'Sede Sur', 'Calle 120 Sur # 12-24', '3456788', '2020-09-24 06:28:50', '2020-09-24 06:28:54', 1),
(2, 'Sede Centro', 'Calle 12 # 8-12', '3467899', '2020-09-24 06:28:54', NULL, 0),
(3, 'Sede Chapinero', 'Calle 57 # 13-34', '7896645', '2020-08-19 01:07:00', '2020-08-19 01:07:17', 0),
(4, 'Sede Norte', 'Calle 145 # 40-20', '6554431', '2020-08-20 05:00:39', '2020-08-21 05:00:38', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifas`
--

CREATE TABLE `tarifas` (
  `id_tari` int(2) NOT NULL,
  `codTari` char(10) NOT NULL,
  `nomTari` varchar(20) NOT NULL,
  `valor` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tarifas`
--

INSERT INTO `tarifas` (`id_tari`, `codTari`, `nomTari`, `valor`) VALUES
(1, 'TARI001', 'Tarifa control', 50000),
(2, 'TARI002', 'Tarifa ex?men', 70000),
(3, 'TARI003', 'Tarifa cita', 25000),
(4, 'TARI004', 'Tarifa holder', 110000),
(5, 'TARI005', 'Tarifa pascal', 80000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_id`
--

CREATE TABLE `tipos_id` (
  `id` int(1) NOT NULL,
  `tipoId` char(3) NOT NULL,
  `nomTipo` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipos_id`
--

INSERT INTO `tipos_id` (`id`, `tipoId`, `nomTipo`) VALUES
(1, 'RC', 'Registro Civil'),
(2, 'TI', 'Tarjeta de identidad'),
(3, 'CC', 'Cédula de ciudadanía'),
(4, 'CE', 'Cédula de extranjería'),
(5, 'PA', 'Pasaporte'),
(6, 'MS', 'Menor sin identificacion'),
(7, 'AS', 'Adulto sin identificacion'),
(8, 'PR', 'Prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cargo` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nIdEmp` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `estado` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `cargo`, `nIdEmp`, `created_at`, `updated_at`, `estado`) VALUES
(1, 'Andres Fonseca', 'affonseca605@misena.edu.co', NULL, '$2y$10$OK/K6gV9J.4Lqu6x5iCR2O/c24SLNoiVe/uPoEHfnWMZ89UhIN0Oe', 'XP37r0yNLM1sk1HpkPnGSdtPhU026sjTniS0rwAaWtSlogrHfhH6mEx4RiZL', 'Enfermera', '', '2020-09-08 02:30:48', '2020-09-21 19:48:16', '0'),
(2, 'Julio Ceron', 'julio@sispmed.com', NULL, '$2y$10$Fa/LRFyt5gij4bUAgqhdaOoduza/QlPOK0sxEn8Y51mD8x/0eZhOC', NULL, 'Enfermera', '', '2020-09-18 14:38:21', '2020-10-17 00:52:36', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usua` int(2) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `nomRol` char(15) NOT NULL,
  `nIdEmp` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usua`, `usuario`, `password`, `estado`, `nomRol`, `nIdEmp`) VALUES
(2, 'andres.fonseca', '4ndr35f0n53c4', 0, 'Secretaria', '1014274506'),
(4, 'brayan.alvarez', 'br4y4n4lv4r3z', 0, 'Jefe', '1023456789'),
(3, 'dana.acosta', 'd4n44c05t4', 0, 'Enfermera', '1020394859'),
(1, 'julio.ceron', 'jul10c3r0n', 0, 'Medico', '1001234567');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acompanantes`
--
ALTER TABLE `acompanantes`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `nIdAcom` (`nIdAcom`),
  ADD KEY `nIdPac` (`nIdPac`),
  ADD KEY `acompanantes_ibfk_1` (`tipoId`);

--
-- Indices de la tabla `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `nomCar` (`nomCar`);

--
-- Indices de la tabla `categorias_insumos`
--
ALTER TABLE `categorias_insumos`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `nomCate` (`nomCate`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`codCita`),
  ADD UNIQUE KEY `id_cita` (`id_cita`),
  ADD KEY `nIdPac` (`nIdPac`),
  ADD KEY `nIdAcom` (`nIdAcom`),
  ADD KEY `nomSede` (`nomSede`),
  ADD KEY `nomIPS` (`nomIPS`),
  ADD KEY `nomProc` (`nomProc`);

--
-- Indices de la tabla `convenios`
--
ALTER TABLE `convenios`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `nomIPS` (`nomIPS`),
  ADD UNIQUE KEY `codConv` (`codConv`),
  ADD UNIQUE KEY `resolu` (`resolu`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `nIdEmp` (`nIdEmp`),
  ADD KEY `tipoId` (`tipoId`),
  ADD KEY `nomCar` (`nomCar`),
  ADD KEY `nomSede` (`nomSede`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`codFact`),
  ADD UNIQUE KEY `id_fact` (`id_fact`),
  ADD KEY `codCita` (`codCita`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `hc`
--
ALTER TABLE `hc`
  ADD PRIMARY KEY (`id_consulta`),
  ADD KEY `consulta_paciente` (`nIdPac`),
  ADD KEY `consulta_paciente_acompanante` (`nIdAcom`);

--
-- Indices de la tabla `insumos`
--
ALTER TABLE `insumos`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `codIns` (`codIns`),
  ADD KEY `insumos_ibfk_1` (`nomCate`);

--
-- Indices de la tabla `kardex`
--
ALTER TABLE `kardex`
  ADD PRIMARY KEY (`id`),
  ADD KEY `codIns` (`codIns`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `movimientos_insumos`
--
ALTER TABLE `movimientos_insumos`
  ADD PRIMARY KEY (`codMovi`),
  ADD UNIQUE KEY `id_movi` (`id_movi`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `nIdPac` (`nIdPac`) USING BTREE,
  ADD KEY `tipoId` (`tipoId`),
  ADD KEY `nomSede` (`nomSede`),
  ADD KEY `nomIPS` (`nomIPS`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `procedimientos`
--
ALTER TABLE `procedimientos`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `codProc` (`codProc`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`nIdProv`),
  ADD UNIQUE KEY `id_prov` (`id_prov`),
  ADD KEY `tipoId` (`tipoId`);

--
-- Indices de la tabla `recaudos`
--
ALTER TABLE `recaudos`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `nomRol` (`nomRol`);

--
-- Indices de la tabla `sedes`
--
ALTER TABLE `sedes`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `nomSede` (`nomSede`) USING BTREE;

--
-- Indices de la tabla `tarifas`
--
ALTER TABLE `tarifas`
  ADD PRIMARY KEY (`id_tari`) USING BTREE,
  ADD UNIQUE KEY `nomTari` (`nomTari`) USING BTREE;

--
-- Indices de la tabla `tipos_id`
--
ALTER TABLE `tipos_id`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `tipoId` (`tipoId`) USING BTREE;

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario`),
  ADD UNIQUE KEY `id_usua` (`id_usua`),
  ADD KEY `nomRol` (`nomRol`),
  ADD KEY `nIdEmp` (`nIdEmp`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acompanantes`
--
ALTER TABLE `acompanantes`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `categorias_insumos`
--
ALTER TABLE `categorias_insumos`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id_cita` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `convenios`
--
ALTER TABLE `convenios`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id_fact` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `gastos`
--
ALTER TABLE `gastos`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `hc`
--
ALTER TABLE `hc`
  MODIFY `id_consulta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `insumos`
--
ALTER TABLE `insumos`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `kardex`
--
ALTER TABLE `kardex`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `movimientos_insumos`
--
ALTER TABLE `movimientos_insumos`
  MODIFY `id_movi` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `procedimientos`
--
ALTER TABLE `procedimientos`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_prov` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `recaudos`
--
ALTER TABLE `recaudos`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `sedes`
--
ALTER TABLE `sedes`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tarifas`
--
ALTER TABLE `tarifas`
  MODIFY `id_tari` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipos_id`
--
ALTER TABLE `tipos_id`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usua` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acompanantes`
--
ALTER TABLE `acompanantes`
  ADD CONSTRAINT `acompanante_tipoId` FOREIGN KEY (`tipoId`) REFERENCES `tipos_id` (`tipoId`),
  ADD CONSTRAINT `acompanantes_ibfk_2` FOREIGN KEY (`nIdPac`) REFERENCES `pacientes` (`nIdPac`);

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`nIdPac`) REFERENCES `pacientes` (`nIdPac`),
  ADD CONSTRAINT `citas_ibfk_2` FOREIGN KEY (`nIdAcom`) REFERENCES `acompanantes` (`nIdAcom`),
  ADD CONSTRAINT `citas_ibfk_3` FOREIGN KEY (`nomSede`) REFERENCES `sedes` (`nomSede`),
  ADD CONSTRAINT `citas_ibfk_4` FOREIGN KEY (`nomIPS`) REFERENCES `convenios` (`nomIPS`),
  ADD CONSTRAINT `citas_ibfk_5` FOREIGN KEY (`nomProc`) REFERENCES `procedimientos` (`nomProc`);

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`tipoId`) REFERENCES `tipos_id` (`tipoId`),
  ADD CONSTRAINT `empleados_ibfk_3` FOREIGN KEY (`nomSede`) REFERENCES `sedes` (`nomSede`),
  ADD CONSTRAINT `empleados_ibfk_4` FOREIGN KEY (`nomCar`) REFERENCES `roles` (`nomRol`);

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `facturas_ibfk_1` FOREIGN KEY (`codCita`) REFERENCES `citas` (`codCita`);

--
-- Filtros para la tabla `hc`
--
ALTER TABLE `hc`
  ADD CONSTRAINT `consulta_paciente` FOREIGN KEY (`nIdPac`) REFERENCES `pacientes` (`nIdPac`),
  ADD CONSTRAINT `consulta_paciente_acompanante` FOREIGN KEY (`nIdAcom`) REFERENCES `acompanantes` (`nIdAcom`);

--
-- Filtros para la tabla `insumos`
--
ALTER TABLE `insumos`
  ADD CONSTRAINT `insumos_ibfk_1` FOREIGN KEY (`nomCate`) REFERENCES `categorias_insumos` (`nomCate`);

--
-- Filtros para la tabla `kardex`
--
ALTER TABLE `kardex`
  ADD CONSTRAINT `kardex_ibfk_1` FOREIGN KEY (`codIns`) REFERENCES `insumos` (`codIns`);

--
-- Filtros para la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `pacientes_ibfk_1` FOREIGN KEY (`tipoId`) REFERENCES `tipos_id` (`tipoId`),
  ADD CONSTRAINT `pacientes_ibfk_2` FOREIGN KEY (`nomSede`) REFERENCES `sedes` (`nomSede`),
  ADD CONSTRAINT `pacientes_ibfk_3` FOREIGN KEY (`nomIPS`) REFERENCES `convenios` (`nomIPS`);

--
-- Filtros para la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD CONSTRAINT `proveedores_ibfk_1` FOREIGN KEY (`tipoId`) REFERENCES `tipos_id` (`tipoId`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`nomRol`) REFERENCES `roles` (`nomRol`),
  ADD CONSTRAINT `usuarios_ibfk_3` FOREIGN KEY (`nIdEmp`) REFERENCES `empleados` (`nIdEmp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
