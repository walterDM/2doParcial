-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-11-2020 a las 17:59:53
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `parcialwm`
--
CREATE DATABASE IF NOT EXISTS `parcialwm` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `parcialwm`;

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `insertPelis`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertPelis` (IN `titulo` VARCHAR(100), IN `anio` INT, IN `puntaje` INT, IN `duracion` INT, IN `genero` VARCHAR(50), IN `descripcion` VARCHAR(200), IN `imagen` VARCHAR(200), IN `tipoImagen` VARCHAR(20))  begin
   INSERT INTO movies values(00,titulo,anio,puntaje,duracion,genero,descripcion,imagen,tipoImagen);
 end$$

--
-- Funciones
--
DROP FUNCTION IF EXISTS `cantPelis`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `cantPelis` () RETURNS INT(11) begin
   declare cantidad int;
   Select count(idMovies) into cantidad from Movies;
   return cantidad;
 end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movies`
--

DROP TABLE IF EXISTS `movies`;
CREATE TABLE `movies` (
  `idMovies` int(11) NOT NULL,
  `titulo` varchar(250) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `anio` int(11) NOT NULL,
  `puntaje` int(11) NOT NULL,
  `Duracion` int(11) NOT NULL,
  `genero` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `tipoImagen` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `movies`
--

INSERT INTO `movies` (`idMovies`, `titulo`, `anio`, `puntaje`, `Duracion`, `genero`, `descripcion`, `imagen`, `tipoImagen`) VALUES
(1, 'Onward', 2020, 4, 103, 'animacion/aventura', 'Ambientado en un mundo de fantasÃ­a suburbana, dos hermanos elfos adolescentes, Ian y Barley Lightfood, se embarcan en una aventura en la que se proponen descubrir si existe aÃºn algo de magia en el mundo que les permita pasar un Ãºltimo dÃ­a con su padre, que falleciÃ³ cuando ellos eran aÃºn muy pequeÃ±os como para poder recordarlo.', 'https://image.tmdb.org/t/p/w185_and_h278_bestv2/u13GDCH7oGpz75xIclzwGeBwCXR.jpg', 'carousel'),
(2, 'Sonic. La pelicula', 2020, 5, 100, 'Accion/Aventura', 'Sonic, el famoso erizo azul de SEGA vivirÃ¡ su primera aventura en la pantalla grande. En esta adaptaciÃ³n cinematogrÃ¡fica basada en la conocida saga de videojuegos podremos ver a los personajes icÃ³nicos de la franquicia. Su protagonista serÃ¡ Sonic, el erizo con la habilidad de correr a la velocidad del sonido y que, junto con sus amigos el zorro Tails y el equidna Knuckles, combaten con el malvado Doctor Eggman, que siempre estÃ¡ tratando de dominar el mundo y apoderarse de las esmeraldas del caos.', 'https://image.tmdb.org/t/p/w185_and_h278_bestv2/jYbANSoj6qGTbDkstq9J5Vy8fRF.jpg', 'carousel'),
(3, 'Los juegos del hambre: Sinsajo. Parte 2', 2015, 5, 135, 'accion/aventura/ciencia Ficcion', 'Los juegos del hambre: Sinsajo. Parte 2â€ nos trae la impactante conclusiÃ³n de la franquicia, en la que Katniss Everdeen (Jennifer Lawrence) se da cuenta de que ya no sÃ³lo estÃ¡ en juego su supervivencia, sino tambiÃ©n el futuro. Con Panem sumida en una guerra a gran escala, Katniss tendrÃ¡ que plantar cara al presidente Snow (Donald Sutherland) en el enfrentamiento final. Katniss, acompaÃ±ada por un grupo de sus mejores amigos, que incluye a Gale (Liam Hemsworth), Finnick (Sam Claflin) y Peeta (Josh Hutcherson), emprende una misiÃ³n con la unidad del Distrito 13, en la que arriesgan sus vidas para liberar a los ciudadanos de Panem y orquestan un intento de asesinato del presidente Snow, cada vez mÃ¡s obsesionado con destruirla. Las trampas mortales, los enemigos y las decisiones morales que aguardan a Katniss la pondrÃ¡n en mayores aprietos que ninguna arena de Los Juegos del Hambre.', 'https://es.web.img2.acsta.net/pictures/15/10/05/09/45/058912.jpg', 'recomendada'),
(4, 'Sniper: Assassins End', 2020, 3, 95, 'accion', 'Special Ops sniper Brandon Beckett is set up as the primary suspect for the murder of a foreign dignitary on the eve of signing a high-profile trade agreement with the United States. Narrowly escaping death, Beckett realizes that there may be a dark operative working within the government, and partners with the only person whom he can trust: his father, legendary sniper Sgt. Thomas Beckett. Both Becketts are on the run from the CIA, Russian mercenaries and Lady Death, a Yakuza-trained assassin with sniper skills that rival both legendary sharpshooters.', 'https://image.tmdb.org/t/p/w185_and_h278_bestv2/20TZbCFTCyfTwkDJ3F060elYaKX.jpg', 'recomendada'),
(7, 'Avengers: Endgame', 2019, 4, 182, 'Acción/Fantasia', 'Tras los sucesos de â€œVengadores: Infinity Warâ€, los superhÃ©roes que sobrevivieron a Thanos se reunen para poner en prÃ¡ctica un plan definitivo que podrÃ­a acabar con el villano definitivamente. No saben si funcionarÃ¡, pero es su Ãºnica oportunidad de intentarlo. Cuarta entrega de la saga â€œVengadoresâ€', 'https://image.tmdb.org/t/p/w185_and_h278_bestv2/qwLbQSeFy6ht8skBtao7lAZjsDo.jpg', 'poster'),
(8, 'Joker', 2019, 5, 121, 'Crimen/Drama', 'Situada en los aÃ±os 80â€². Un cÃ³mico fallido es arrastrado a la locura, convirtiendo su vida en una vorÃ¡gine de caos y delincuencia que poco a poco lo llevarÃ¡ a ser el psicÃ³pata criminal mÃ¡s famoso de Gotham.', 'https://image.tmdb.org/t/p/w185_and_h278_bestv2/v0eQLbzT6sWelfApuYsEkYpzufl.jpg', 'carousel'),
(9, 'El Rey León', 2019, 5, 118, 'Drama/Aventura', 'Un remake del clÃ¡sico animado de Disney de 1994 â€˜El rey leÃ³nâ€™ que estarÃ¡ dirigido por Jon Favreu. Simba (Donald Glover) es el hijo del rey de los leones, Mufasa, y heredero de todo el reino. Pero cuando su padre es brutalmente asesinado por su tÃ­o Scar, decidirÃ¡ huir, dejando vÃ­a libre para que su tÃ­o tome el puesto de su padre como lÃ­der de la manada. En su camino, Simba se encuentra con el suricato TimÃ³n y el jabalÃ­ Pumba, que le enseÃ±arÃ¡n a vivir la vida sin preocupaciones. Pero el joven leÃ³n se verÃ¡ obligado a decidir entre su vida libre de problemas o su destino como rey.', 'https://image.tmdb.org/t/p/w185_and_h278_bestv2/vEuDJgzrnkhmyBdtlO7hYCZ5Z9P.jpg', 'recomendada'),
(10, 'John Wick 3: Parabellum', 2019, 4, 131, 'Acción/Crimen', 'John Wick (Keanu Reeves) regresa a la acciÃ³n, solo que esta vez con una recompensa de 14 millones de dÃ³lares sobre su cabeza y con un ejÃ©rcito de mercenarios intentando darle caza. Tras asesinar a uno de los miembros del gremio de asesinos al que pertenecÃ­a, Wick es expulsado de la organizaciÃ³n, pasando a convertirse en el centro de atenciÃ³n de multitud de asesinos a sueldo que esperan detrÃ¡s de cada esquina para tratar de deshacerse de Ã©l.', 'https://image.tmdb.org/t/p/w185_and_h278_bestv2/38d32uG1x7iiN2jdK0cRX0Bk423.jpg', 'carousel'),
(11, 'It: Capítulo 2', 2019, 4, 90, 'Drama/Terror', '27 aÃ±os despuÃ©s, los ex-miembros del Club de los Perdedores, que crecieron y se mudaron lejos de Derry, vuelven a unirse tras una devastadora llamada telefÃ³nica.', 'https://image.tmdb.org/t/p/w185_and_h278_bestv2/pxw6j2AwlUsw5iS4fCxPoCP0jPh.jpg', 'poster'),
(12, 'Aquaman', 2018, 4, 144, 'Acción/Aventura', 'Un icono durante mÃ¡s de 70 aÃ±os, Aquaman (Jason Momoa) es el Rey de los Siete Mares. Este reacio gobernante de Atlantis se encuentra atrapado entre los constantes estragos causados al mar por los habitantes de la superficie y los atlantes buscando rebelarse. Pese a todo estÃ¡ decidido a proteger el mundo entero.', 'https://image.tmdb.org/t/p/w185_and_h278_bestv2/czjwK6F3Db4rWyuETdCaZOO8chx.jpg', 'poster'),
(13, '1917', 2019, 4, 119, 'Bélico/Guerra', 'Nos encontramos en el aÃ±o 1917. La Guerra Mundial amenazaba con cambiar, para siempre, el orden mundial. Ante la amenaza que se cernÃ­a, Estados Unidos decidiÃ³ entrar en el conflicto con el objetivo de desequilibrar la balanza que caracterizaba a la contienda.', 'https://image.tmdb.org/t/p/w185_and_h278_bestv2/Aqr1jDwGb1IfAB6Lh1fNx7AbEZE.jpg', 'poster'),
(14, 'Deadpool 2', 2018, 5, 95, 'Acción/Aventura/Comedia', 'DespuÃ©s de sobrevivir a un ataque bovino casi mortal, el desfigurado chef de una cafeterÃ­a (Wade Wilson) lucha por cumplir su sueÃ±o de convertirse en el barman mÃ¡s caliente de Mayberry mientras aprende a lidiar con su perdido sentido del gusto. Buscando algo de picante para su vida, asÃ­ como un condensador de fluzo, Wade deberÃ¡ luchar contra ninjas, la yakuza y un grupo sexualmente agresivos de canes, mientras recorre el mundo para descubrir la importancia de la familia, la amistad y el sabor, encontrando un nuevo gusto por la aventura y logrando el codiciado tÃ­tulo de taza de cafÃ© de â€œMejor amante del mundoâ€.', 'https://image.tmdb.org/t/p/w185_and_h278_bestv2/to0spRl1CMDvyUbOnbb4fTk3VAd.jpg', 'poster'),
(15, 'Godzilla: Rey de los monstruos', 2019, 4, 132, 'Acción/Fantasía', 'â€œGodzilla: Rey de los Monstruosâ€ sigue los heroÃ­cos esfuerzos de los criptozoÃ³logos de la agencia Monarch mientras tratan de enfrentrarse contra un grupo de enormes monstruos, incluyendo el propio Godzilla. Entre todos intentan resistir a las embestidas de Mothra, Rodan o del Ãºltimo nÃ©mesis de la humanidad: King Ghidorah. Estas ancianas criaturas harÃ¡n todo lo posible por sobrevivir, poniendo en riesgo la existencia del ser humano en el planeta.', 'https://image.tmdb.org/t/p/w185_and_h278_bestv2/jLi7P6iWr7euFKTRd8UR11fkIXa.jpg', 'poster'),
(16, 'X-Men: Dark Phoenix', 2019, 3, 114, 'Acción/Ciencia Ficción', 'Durante una misiÃ³n de rescate en el espacio, Jean casi muere al ser alcanzada por una misteriosa fuerza cÃ³smica. Cuando regresa a casa, esta fuerza no solo la ha hecho infinitamente mÃ¡s poderosa, sino tambiÃ©n mucho mÃ¡s inestable. Mientras lucha con la entidad que habita en su interior, Jean desata sus poderes de formas que no puede controlar ni comprender. Jean cae en una espiral fuera de control haciendo daÃ±o a aquellos que mÃ¡s ama y empieza a destruir los lazos que mantienen unidos a los X-Men. Mientras su familia se desmorona, deben encontrar la forma de unirse, no sÃ³lo para salvar el alma de Jean, sino tambiÃ©n para salvar el planeta de unos alienÃ­genas que quieren transformar esta fuerza en un arma y conquistar la galaxia.', 'https://image.tmdb.org/t/p/w185_and_h278_bestv2/rdByKDkfyVuVSrkllzxKYXiZmTd.jpg', 'poster'),
(17, 'Venom', 2018, 4, 112, 'Acción/Ciencia Ficción', 'Eddie Brock (Tom Hardy) es un consolidado periodista y astuto reportero que estÃ¡ investigando una empresa llamada FundaciÃ³n Vida. Esta fundaciÃ³n, dirigida por el eminente cientÃ­fico Carlton Drake (Riz Ahmed), estÃ¡ ejecutando secretamente experimentos ilegales en seres humanos y realizando pruebas que involucran formas de vida extraterrestres y amorfas conocidas como simbiontes. Durante una visita furtiva a la central, el periodista quedarÃ¡ infectado por un simbionte. ComenzarÃ¡ entonces a experimentar cambios en su cuerpo que no entiende, y escucharÃ¡ una voz interior, la del simbionte Venom, que le dirÃ¡ lo que tiene que hacer. Cuando Brock adquiera los poderes del simbionte que le usa como huÃ©sped, Venom tomarÃ¡ posesiÃ³n de su cuerpo, convirtiÃ©ndole en un despiadado y peligroso sÃºpervillano.', 'https://image.tmdb.org/t/p/w185_and_h278_bestv2/yIzHw6az7SHEjxaVYy3hMd1Vyc.jpg', 'poster'),
(18, 'John Wick 2: Pacto de sangre', 2017, 4, 122, 'Acción/Crimen', 'John Wick es forzado a salir del retiro por un ex asociado buscando tomar control del gremio internacional de asesinos. Obligado por un juramento de sangre, Wick viaja a Roma, donde lucharÃ¡ contra algunos de los asesinos mÃ¡s mortales del mundo.', 'https://image.tmdb.org/t/p/w185_and_h278_bestv2/bUie6wrbHEThBhpKoPbqZ6KQrU6.jpg', 'poster'),
(19, 'werewolf', 2019, 3, 88, 'terror', 'Un grupo de niños liberados de un campo de concentración nazi tienen que afrontar el hambre y la sed y lidiar con unos perros agresivos en una mansión abandonada en el bosque.', 'https://image.tmdb.org/t/p/w185_and_h278_bestv2/dc49Gx6SrVpzgTJ10s5VHipywGo.jpg', 'poster');

--
-- Disparadores `movies`
--
DROP TRIGGER IF EXISTS `peliculasEliminadas_AD`;
DELIMITER $$
CREATE TRIGGER `peliculasEliminadas_AD` AFTER DELETE ON `movies` FOR EACH ROW INSERT INTO movies_eliminadas VALUES(OLD.idMovies,OLD.titulo,OLD.anio,OLD.puntaje,OLD.Duracion,OLD.genero,OLD.descripcion,OLD.imagen,OLD.tipoImagen,current_user(),now())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movies_eliminadas`
--

DROP TABLE IF EXISTS `movies_eliminadas`;
CREATE TABLE `movies_eliminadas` (
  `idMovies` int(11) NOT NULL,
  `titulo` varchar(250) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `anio` int(11) NOT NULL,
  `puntaje` int(11) NOT NULL,
  `Duracion` int(11) NOT NULL,
  `genero` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `tipoImagen` varchar(20) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `Fecha_Eliminacion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `movies_eliminadas`
--

INSERT INTO `movies_eliminadas` (`idMovies`, `titulo`, `anio`, `puntaje`, `Duracion`, `genero`, `descripcion`, `imagen`, `tipoImagen`, `usuario`, `Fecha_Eliminacion`) VALUES
(20, 'Jungleland', 2020, 4, 98, 'accion', 'Un boxeador y su manager deben viajar por todo el país para un último combate, pero un inesperado compañero de viaje expone las grietas en su relación a lo largo del camino.', 'https://image.tmdb.org/t/p/w185_and_h278_bestv2/hJIqDuugvXGMFKL9YlBzrogE2gg.jpg', 'recomendada', 'root@localhost', '2020-11-12 13:58:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

DROP TABLE IF EXISTS `permisos`;
CREATE TABLE `permisos` (
  `idPermiso` int(11) NOT NULL,
  `nombreP` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`idPermiso`, `nombreP`) VALUES
(0, 'visitante'),
(1, 'Admin'),
(2, 'Moderador'),
(3, 'Editor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nombreUser` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `idPermiso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombreUser`, `pass`, `idPermiso`) VALUES
(1, 'Administrador', '12345', 1),
(2, 'Moderador', '1234', 2),
(3, 'Editor', '4321', 3),
(4, 'visitante', '123456', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`idMovies`);

--
-- Indices de la tabla `movies_eliminadas`
--
ALTER TABLE `movies_eliminadas`
  ADD PRIMARY KEY (`idMovies`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`idPermiso`),
  ADD UNIQUE KEY `idPermiso` (`idPermiso`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `fk_permiso` (`idPermiso`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `movies`
--
ALTER TABLE `movies`
  MODIFY `idMovies` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `movies_eliminadas`
--
ALTER TABLE `movies_eliminadas`
  MODIFY `idMovies` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_permiso` FOREIGN KEY (`idPermiso`) REFERENCES `permisos` (`idPermiso`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
