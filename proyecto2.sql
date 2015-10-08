-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 04-04-2014 a las 01:52:41
-- Versión del servidor: 5.1.41
-- Versión de PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `proyecto2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autobuses`
--

CREATE TABLE IF NOT EXISTS `autobuses` (
  `Idproducto` int(4) NOT NULL AUTO_INCREMENT,
  `viaje` varchar(15) NOT NULL,
  `origen` text NOT NULL,
  `destino` text NOT NULL,
  `tiemviaje` varchar(15) NOT NULL,
  `hrsalida` varchar(15) NOT NULL,
  `fesalida` date NOT NULL,
  `precioboleto` int(15) NOT NULL,
  `numautobus` int(15) NOT NULL,
  `lineaautobus` text NOT NULL,
  `Foto` varchar(15) NOT NULL,
  `Cantidadexistente` int(3) NOT NULL,
  PRIMARY KEY (`Idproducto`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `autobuses`
--

INSERT INTO `autobuses` (`Idproducto`, `viaje`, `origen`, `destino`, `tiemviaje`, `hrsalida`, `fesalida`, `precioboleto`, `numautobus`, `lineaautobus`, `Foto`, `Cantidadexistente`) VALUES
(1, 'Viaje 1', 'Puebla', 'Vercruz', '3 Horas', '9:00 am', '2014-04-04', 100, 4, 'Correcaminos', 'foto/1.jpg', 13),
(2, 'Viaje 2', 'Mexico', 'Tlaxcala', '4 Horas', '6:00 am', '2014-04-05', 150, 4, 'Estrella Roja', 'foto/2.jpg', 13),
(3, 'Viaje 3', 'Baja California', 'Yucatan', '12 Horas', '5:00 am', '2014-04-03', 900, 6, 'Surianos', 'foto/3.jpg', 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `IdCliente` int(15) NOT NULL,
  `Nombre` text NOT NULL,
  `Direccion` varchar(15) NOT NULL,
  `RFC` varchar(15) NOT NULL,
  `CP` int(15) NOT NULL,
  `Correo` varchar(15) NOT NULL,
  `Telefono` int(15) NOT NULL,
  PRIMARY KEY (`IdCliente`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`IdCliente`, `Nombre`, `Direccion`, `RFC`, `CP`, `Correo`, `Telefono`) VALUES
(1, 'Carmen', 'Chachapa', '2134213fghfgh', 72320, 'carmen@live.net', 2566789),
(2, 'Elias', 'Chapultepec', 'ghgr45ggh6', 73456, 'Elias@live.net', 6785432),
(3, 'Jesus', 'Amalucan', '6ghtt432ssdfv', 67890, 'jesus@live.net', 6734214),
(4, 'Patricia', 'Alamos', '4567jhnbvb32', 56732, 'paty@live.net', 4532344),
(5, 'Marcelina', '6 Norte Col. Al', 'moalarma010158', 89034, 'marce@gmail.com', 2807954),
(6, 'Irais', 'Bambu 2 Col. El', 'mecoira030680', 98567, 'irais@gemail.co', 6034675);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallesventa`
--

CREATE TABLE IF NOT EXISTS `detallesventa` (
  `Iddetalles` int(4) NOT NULL AUTO_INCREMENT,
  `Idventa` int(4) NOT NULL,
  `Idproducto` int(4) NOT NULL,
  `Precio` float NOT NULL,
  `Cantidad` int(4) NOT NULL,
  `Origen` varchar(15) NOT NULL,
  `Destino` varchar(15) NOT NULL,
  PRIMARY KEY (`Iddetalles`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `detallesventa`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE IF NOT EXISTS `factura` (
  `Idfactura` int(11) NOT NULL AUTO_INCREMENT,
  `Fechaexpedicion` date NOT NULL,
  `Lugarexpedicion` varchar(30) NOT NULL,
  `Idventa` int(4) NOT NULL,
  `Idpago` varchar(15) NOT NULL,
  PRIMARY KEY (`Idfactura`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `factura`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formapago`
--

CREATE TABLE IF NOT EXISTS `formapago` (
  `Idpago` int(4) NOT NULL AUTO_INCREMENT,
  `Formapago` varchar(15) NOT NULL,
  PRIMARY KEY (`Idpago`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla `formapago`
--

INSERT INTO `formapago` (`Idpago`, `Formapago`) VALUES
(1, 'Efectivo'),
(2, 'Tarjeta Debito'),
(3, 'Tarjeta Debito'),
(4, 'Transaccion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE IF NOT EXISTS `registro` (
  `Idvendedor` int(4) NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(15) NOT NULL,
  `Contrasena` varchar(15) NOT NULL,
  `Correo` varchar(15) NOT NULL,
  `Foto` varchar(15) NOT NULL,
  `Nombre` text NOT NULL,
  `ApellidoMaterno` text NOT NULL,
  `ApellidoPaterno` text NOT NULL,
  `IdDepartamento` int(15) NOT NULL,
  PRIMARY KEY (`Idvendedor`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcar la base de datos para la tabla `registro`
--

INSERT INTO `registro` (`Idvendedor`, `Usuario`, `Contrasena`, `Correo`, `Foto`, `Nombre`, `ApellidoMaterno`, `ApellidoPaterno`, `IdDepartamento`) VALUES
(1, 'Pedro', '123', 'pedro@live.net', 'foto/2.jpg', 'Pedro', 'Miranda', 'Tobom', 1),
(2, 'Maribel', '321', 'maribel@live.ne', 'foto/1.jpg', 'Maribel', 'Guerra', 'Abascal', 2),
(3, 'Felix', '456', 'felix@hotmail.c', 'foto/3.jpg', 'Felix', 'Capilla', 'Palacio', 3),
(4, 'Angye', '654', 'Angye@live.net', 'foto/4.jpg', 'Angelica', 'Serrano', 'Hernandez', 4),
(5, 'Francisco', '789', 'francisco@live.', 'foto/5.jpg', 'Francisco', 'Pacheco', 'Gonzalez', 5),
(6, 'Pablo', '987', 'pablo@live.net', 'foto/6.jpg', 'Pablo', 'Moguel', 'Zarate', 1),
(7, 'Isabel', '098', 'isabel@live.net', 'foto/7.jpg', 'Isabel', 'Carranco', 'Pineda', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE IF NOT EXISTS `venta` (
  `Idventa` int(4) NOT NULL AUTO_INCREMENT,
  `Idvendedor` int(4) NOT NULL,
  `Idcliente` int(4) NOT NULL,
  `Fechaventa` date NOT NULL,
  PRIMARY KEY (`Idventa`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `venta`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
