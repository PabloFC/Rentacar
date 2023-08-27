-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-12-2021 a las 18:51:57
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `concesionario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asiste`
--

CREATE TABLE `asiste` (
  `dni_cliente` varchar(9) NOT NULL,
  `codigo_evento` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asiste`
--

INSERT INTO `asiste` (`dni_cliente`, `codigo_evento`) VALUES
('11111111a', 5),
('11111111a', 6),
('11111111a', 7),
('11111111a', 9),
('11111111a', 10),
('11111111b', 5),
('11111111b', 6),
('11111111b', 7),
('11345678a', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `dni` varchar(9) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(150) NOT NULL,
  `nombre_usuario` varchar(20) DEFAULT NULL,
  `contraseña` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`dni`, `nombre`, `apellidos`, `nombre_usuario`, `contraseña`) VALUES
('11111111a', 'Pablo', 'Fuentes Candel', 'pablo', 'pablo'),
('11111111b', 'Guillermo', 'Ferres Sanchez', 'guillermo', 'guillermo'),
('11111113c', 'Rosario Maria', 'Vargas Plata', 'rosario', 'rosario'),
('11111114d', 'Daniel', 'Lopez Lozano', 'daniel', 'daniel'),
('11111115f', 'Naiara', 'Martinez Vargas', 'naiara', 'naiara'),
('1111116h', 'Juan', 'Fidalgo Palomino', 'juan', 'juan'),
('11322678a', 'Valentina', 'Romero Pedregal', 'valentina', 'valentina'),
('11345678a', 'Alejandra', 'Astica Rodriguez', 'alejandra', 'alejandra'),
('1156789X', 'Cristiano', 'Ronaldo de Asis', 'cristiano', 'cristiano'),
('12111115f', 'Ana ', 'Valenciaga Bayer', 'ana', 'ana'),
('12111115g', 'Borja', 'Molina Zea', 'borja', 'borja'),
('22211111a', 'Alejandro', 'Gil Ruiz', 'alejandro', 'alejandro'),
('23226781f', 'David', 'Serrano Moreno', 'david', 'david'),
('23447801f', 'antonia', 'antonia', 'antonia', 'antonia'),
('3456789X', 'Angel', 'Humberto Janeiro', 'angel', 'angel'),
('45456781f', 'Paula', 'Salinas Delgado', 'paula', 'paula'),
('64467939C', 'Estefania', 'Aragon Damas', 'estefania', 'estefania'),
('66666666F', 'Narcisa', 'Lujan Bautista', 'narcisa', 'narcisa'),
('88888888H', 'Gonzalo', 'Duque Diaz', 'gonzalo', 'gonzalo'),
('90763525M', 'Manuel', 'Marcos Guerrero', 'manuel', 'manuel'),
('99999999I', 'Ivan', 'Gomez Montesinos', 'ivan', 'ivan');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coche`
--

CREATE TABLE `coche` (
  `matricula` varchar(7) NOT NULL,
  `modelo` varchar(20) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `fecha_compra` date NOT NULL,
  `precio_dia` double(6,2) NOT NULL,
  `descripcion` varchar(5000) NOT NULL,
  `caballos` int(3) NOT NULL,
  `asientos` int(1) NOT NULL,
  `marca` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `coche`
--

INSERT INTO `coche` (`matricula`, `modelo`, `tipo`, `foto`, `fecha_compra`, `precio_dia`, `descripcion`, `caballos`, `asientos`, `marca`) VALUES
('0447TVF', 'Mustang', 'Clásico', 'ford_mustang.jpg', '2021-09-16', 200.00, 'Ford creó el primer y hasta ahora único GT500 Super Snake 1967 en su día a petición de Goodyear, como vehículo de demostración. Este contaba con un motor V8 427 (7.0 litros) procedente de un Ford GT40 mk II que entregaba 527 CV (520 hp), lo que a finales de los años sesenta era un auténtica salvajada. Las intenciones iniciales no eran la de fabricarlo, pero Don McCain, un distribuidor de Shelby se interesó por el modelo y se estudió la posibilidad de fabricar algunos ejemplares. Sin embargo, su elevadísimo precio provocó que estos planes fueran desestimados.', 527, 2, 7),
('1111PFC', 'SL300', 'Clásico', 'mercedesSL300.jpg', '2021-10-05', 200.00, 'El Mercedes 300SL de 1.952 supuso la vuelta de la marca de la estrella a la competición después de la II Guerra mundial. Su nombre hace referencia a su motor de 3.000 c.c. y las siglas SL son el acrónimo de  Sport Leicht, Deportivo Ligeroen Alemán.  Su liviano chasis de aluminio, el bloque de 175 CV y una velocidad punta de 290 km/h le llevaron a la victoria en importantes competiciones como las 24 horas de LeMans o la Carrera Panamericana.  Max Hoffman, importador de Mercedes en Estados Unidos en aquella época, propuso llevar el coche a las cadenas de producción, de forma que el Mercedes 300SL de calle (código W198) fue presentado en el Salón de Nueva York de 1.954.', 175, 2, 6),
('2222PFC', '911', 'Deportivo', 'porsche911.jpg', '2021-10-20', 200.00, 'El Porsche 911 es el deportivo más importante de la historia de Porsche. Su origen se remonta a 1963 y, durante todos estos años se ha convertido en un icono automovilístico de los deportivos europeos. Actualmente se fabrica la octava generación, presentada en 2018, con código 992. Desde su nacimiento, ha mantenido intacta su filosofía: un deportivo de 2+2 plazas, con motor trasero de seis cilindros enfrentados de tipo bóxer, o para ser más exactos, de tipo flat-six.\r\nContra todo pronóstico, el 911 mantiene versiones con caja de cambios manual aunque mayoritariamente se venden con el maravilloso cambio automático PDK, que mejora en prestaciones y consumos a la caja manual pero le quitan ese punto de implicación para el conductor que significa pisar el tercer pedal y cambiar de marcha por uno mismo.', 199, 4, 8),
('3333PFC', 'Amg GT', 'Deportivo', 'mercedesAmg.jpg', '2020-10-04', 200.00, 'El GT es la variante de entrada. La pieza central es el nuevo V8 biturbo con designación interna M178 de 3982 cm³ (4 litros) desarrollado específicamente para el GT, que responde instantáneamente con una potencia extrema desde bajas revoluciones y ofrece un rendimiento excepcional. Cifras máximas como de cero a 100 km/h (62 mph) en 3,8 segundos y una velocidad máxima de 310 km/h (193 mph), combinadas con la extraordinaria dinámica de conducción, se traducirán en vueltas extremadamente rápidas en la pista. Desarrolla una potencia máxima de 462 CV (456 HP; 340 kW) y ruedas de 19 pulgadas (48,3 cm).\r\n\r\n', 462, 4, 6),
('3480TYG', '720s', 'Deportivo', 'mclaren720s.jpg', '2019-10-02', 200.00, 'El motor del McLaren 720S, como en su predecesor, sigue siendo un V8 twin-turbo de 4.0 litros que en esta ocasión alcanza ya los 720 CV de potencia. De ahí viene precisamente su nombre. Más allá de su potencia, resulta especialmente interesante que nos fijemos en que sobre la báscula solo marcará 1.283 kilogramos, de manera que la relación entre potencia y peso es ciertamente muy favorable. En cuanto a sus prestaciones, acelera de 0 a 100 km/h en solo 2,9 segundos.\r\n\r\nEn cuanto al resto de prestaciones declaradas, el McLaren 720S completa el 0 a 200 km/h en 7,8 segundos y alcanza una punta de 341 km/h. Respecto a su frenada, es capaz de detenerse por completo desde los 200 km/h en 4,6 segundos y cubriendo 117 metros.', 720, 2, 5),
('3863ZRP', '812', 'Deportivo', 'ferrari812.jpg', '2021-08-10', 200.00, 'El Ferrari 812 es el Ferrari de serie más potente de la historia y es el tope de la gama Ferrari. Monta un motor V12 a 65º en posición delantero-central que desarrolla 800 CV a 8.500 rpm y un para máximo de 718 Nm, cifras increíbles para un motor atmosférico (sin turbos) de 6,5 litros de cilindrada. Su arquitectura trans-axle le permite un reparto perfecto de masas entre ambos ejes.\r\nEl Ferrari 812 cuenta con dirección a las 4 ruedas y con la primera asistencia eléctrica al volante de la historia de la marca. A pesar de tratarse de un tracción trasera, es capaz de acelerar de 0 a 100 km/h en 2,9 segundos, alcanzando los 200 km/h en menos de 8 y una velocidad máxima de 340 km/h.\r\n\r\n', 800, 2, 2),
('4444PFC', 'Cayenne S', 'Todoterreno', 'porsche_cayenne.jpg', '2020-09-08', 200.00, 'El Porsche Cayenne S equipa un motor V6 de 2.9 litros de cilindrada con doble turbo y 324 kW (440 cv) de potencia máxima, y un par máximo de 550 Nm. El paso de 0 a 100 km/h se produce en 5,2 segundos (4,9 s. con Performance Start) alcanzando una velocidad máxima de 265 km/h.', 440, 9, 8),
('5555PFC', 'Velar', 'Todoterreno', 'RangeRoverVelar.jpg', '2021-10-23', 200.00, 'El Range Rover Velar es un SUV con filosofía de todoterreno, disponible únicamente con 5 plazas. Entre sus rivales, los SUV de lujo en tamaño mediano, cabría mencionar a algunos SUV premium medianos como el Audi Q5, el Mercedes GLC, el BMW X3, o incluso el Porsche Macan.\r\n\r\nEl carácter diferencial del Velar puede llegar de su diseño robusto, pero elegante, de la distinción que ofrece Land Rover en aquellos productos de la gama Range Rover y, sobre todo, de su carácter y apariencia tecnológica y un habitáculo de una altísima calidad. También puede jugar a su favor el hecho de que se erija como una alternativa más espaciosa y amplia al Evoque, o una alternativa más modesta y contenida que el Range Rover Sport, dos productos muy importantes para la marca.', 211, 5, 4),
('6666PFC', 'Urus', 'Todoterreno', 'lamborghini_urus.jpg', '2020-07-08', 200.00, 'El Lamborghini Urus sólo se ofrece en una única motorización que consiste en un V8 de 4 litros sobrealimentado por medio de dos turbocompresores y que desarrolla una potencia máxima de 650 CV a 6.000 rpm junto a un par motor de 850 Nm a 2.250 Nm. El apartado mecánico se completa con una caja de cambios automática por convertidor de par de 8 relaciones, tracción integral con distribución del par trasero activo, un sistema antibalanceo activo, cuatro ruedas directrices y frenos carbocerámicos de 440 mm en el eje delantero y 370 mm en el posterior.\r\n\r\nCon todo ello consigue unas cifras impresionantes, como un 0 a 100 km/h en 3,6 segundos o una velocidad máxima de 305 km/h, propias de un superdeportivo y no de un SUV.', 650, 5, 3),
('7777PFC', 'Q5', 'Todoterreno', 'Audi-Q5-Sportback_2021.jpg', '2021-02-10', 200.00, 'Después del restyling de la segunda generación del Q5, la gente de Audi nos presenta la que es su versión más deportiva, el Audi SQ5 TDI, que sí, es un diésel, pero con 340 CV, un descomunal par motor y que sólo necesita 5,1 segundos para hacer el 0 a 100 km/h. No obstante, este SUV premium cuenta con un increíble arsenal tecnológico para asegurar su buena dinámica en carretera.', 340, 5, 1),
('8888PFC', '250 GTO', 'Clásico', 'ferrari250GTO.jpg', '2018-10-09', 200.00, 'El 250 GTO fue la cima del desarrollo de la serie 250 GT en su formato de competición, al mismo tiempo que seguía siendo un coche utilizable en la calle. Hizo su primera aparición pública en la conferencia de prensa anual de pretemporada que se celebró en enero de 1962, donde fue el único modelo expuesto que tenía motor delantero, pues el resto de monoplazas y vehículos de competición tenían una configuración de motor central.', 102, 2, 2),
('9999PFC', '550 ', 'Clásico', 'porsche_550.jpg', '2021-08-04', 200.00, 'El Porsche 550 es un pequeño deportivo biplaza de tracción trasera y de extrema ligereza. No dispone de ningún tipo de techo, de ahí la denominación \"Spyder\". Por su buena aerodinámica, con una potencia de 110 CV, le permiten alcanzar los 220 km/h (137 mph). Su motor bóxer de cuatro cilindros de aspiración natural enfriado por aire cuenta con una cilindrada de 1498 cm³ (1,5 L) y esta alimentado por dos carburadores de doble cuerpo Solex 40 PJJ-4. Tiene una distribución con doble árbol de levas a la cabeza y dos válvulas por cilindro. La caja de cambios es manual con 4 velocidades.', 110, 2, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `codigo` int(4) NOT NULL,
  `titular` varchar(100) NOT NULL,
  `contenido` varchar(10000) NOT NULL,
  `foto` varchar(150) NOT NULL,
  `precio_evento` double(6,2) DEFAULT NULL,
  `aforo` int(2) DEFAULT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`codigo`, `titular`, `contenido`, `foto`, `precio_evento`, `aforo`, `fecha`) VALUES
(5, 'Exposición de coches clásicos.', 'Ven y disfruta de los coches que marcaron una época y que siempre quisiste conducir.<br />\r\nEn este evento habrá una fiesta de bienvenida con un dj y barra libre de cervezas y vino durante las dos primeras horas, además habrá un fotógrafo con el que te harás fotones con nuestros coches. ¿Te lo vas a perder?<br />\r\n', 'clasicos_evento.jpg', 12.00, 30, '2021-12-18'),
(6, '¡Ven a disfrutar de un curso de conducción!', 'Ven y disfruta de los mejores todoterrenos del momento.\r\nEn este evento habrá un sorteo en la que el ganador podrá conducir el todoterreno que elija durante un día, además habrá un fotógrafo con el que te sacará fotones con nuestros coches.\r\n¿Te lo vas a perder?', 'Audi-Q5-Sportback_2021.jpg', 100.00, 20, '2022-01-09'),
(7, 'Ruta costa tropical de Granada', '¿Quieres disfrutar los mejores paisajes costeros disfrutando del coche de tus sueños?<br />\r\n<br />\r\nDisfruta conduciendo un superdeportivo por las increíbles carreteras granadinas.  Conduce uno de estos superdeportivos a un precio único, podrás llevar de copiloto a quien tú quieras, por supuesto la ruta será íntima, y reservada, previa desinfección de cada uno de los vehículos.<br />\r\n<br />\r\nLa duración de la ruta es de 6 horas aproximadamente y un recorrido de 200 kilómetros!!!', 'ruta_costa.jpg', 150.00, 4, '2022-01-15'),
(9, 'Exposición de Todoterrenos', 'Ven y disfruta de los mejores todoterrenos del momento.<br />\r\nEn este evento habrá un sorteo  en la que el ganador podrá conducir el todoterreno que elija durante un día, además habrá un fotógrafo con el que te sacará fotones con nuestros coches. <br />\r\n¿Te lo vas a perder?', 'todoterrenos_evento.jpg', 10.00, 50, '2022-01-22'),
(10, '¿Quieres participar en un día de tandas?', 'Forma parte de nuestra comunidad y comparte tu pasión por el deporte de motor y coches con los compañeros. <br />\r\nTodo el equipo del circuito aseguran que pases un dia estupendo y te sentirás en casa! <br />\r\n<br />\r\nSe celebrará en el circuito de Guadix con 6 horas de pit lane abierto, catering disponible bajo petición. ', 'tanda_evento.jpg', 200.00, 20, '2022-01-29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `codigo` int(3) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `foto_logo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`codigo`, `nombre`, `foto_logo`) VALUES
(1, 'Audi', 'Audi_logo.jpg'),
(2, 'Ferrari', 'ferrari_logo.jpg'),
(3, 'Lamborghini', 'lamborghini_logo.png'),
(4, 'Land Rover', 'landrover_logo.png'),
(5, 'Mclaren', 'mclaren_logo.png'),
(6, 'Mercedes', 'mercedes_logo.jpg'),
(7, 'Ford', 'mustang_logo.jpg'),
(8, 'Porsche', 'porsche_logo.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia`
--

CREATE TABLE `noticia` (
  `codigo` int(4) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `subtitulo` varchar(200) NOT NULL,
  `contenido` varchar(10000) NOT NULL,
  `foto` varchar(150) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `noticia`
--

INSERT INTO `noticia` (`codigo`, `titulo`, `subtitulo`, `contenido`, `foto`, `fecha`) VALUES
(6, '¿Cómo saber si tengo multas pendientes?', 'Es gratis y muy sencillo. ¡Te lo contamos!', 'Seguro que alguna vez te has preguntado si debes tener alguna multa pendiente por pagar, ya sea de velocidad, de estacionamiento, o cualquier otra infracción, y quizás piensas que no ha llegado el aviso de notificación. Hay una manera muy fàcil de consultar si tienes alguna sanción pendiente en la DGT. ¡Te lo contamos a continuación!.\r\n\r\nDejar pasar el pago de una multa, voluntaria o involuntariamente, puede conllevar serios problemas. Pasados los plazos para recurrir y pagar la multa, llegarán los embargos, de cuentas bancarias o bienes en propiedad.\r\nSi crees que has podido cometer una infracción pero no has recibido ningún aviso, o simplemente quieres asegurarte de que no tienes ninguna multa pendiente, la Dirección General de Tráfico (DGT) te puede informar de forma gratuita online o mediante SMS.\r\n\r\nPuedes saber si tienes multas por la matrícula del coche en la página web de la DGT, en este enlace. Aquí podrás ver las notificaciones de procedimientos sancionadores de la DGT, de Tráfico de Cataluña, País Vasco y de más de 900 ayuntamientos. En el apartado “acceso al servicio sin certificado” podrás introducir el número de matrícula del vehículo para comprobar si existe alguna infracción pendiente.\r\n\r\nEn la misma web también puedes buscar sanciones con el número de tu DNI y la letra, o con un certificado digital o el DNI electrónico.\r\n\r\nOtra opción es darse de alta en la Dirección Electrónica Vial (DEV). Es un servicio gratuito que permite recibir en el correo electrónico o mediante SMS notificaciones de multas, comunicados de la DGT.\r\nEn este artículo, cómo cambiar la dirección en el carnet de conducir, te explicamos cómo debes actualizar tu dirección para recibir correctamente las notificaciones de la DGT. Recordarte que, desde 2009, todas las notificaciones de sanciones se publican en el Tablón Edictal de Sanciones (TESTRA), por lo que, si no tienes actualizada la dirección de tu domicilio y no te llega la la sanción, no quedas exento de pagar una multa, ya que, mediante el tablón, se dan por notificadas. Así que te recomendamos que le eches un ojo de vez en cuando.\r\n\r\nTienes 20 días naturales desde que se publica la sanción para consultar el edicto. Durante ese tiempo la DGT lo mantiene en estado “vigente”, pudiendo prorrogar el plazo si el tablón no estuviera accesible por motivos técnicos. Pasados esos 20 días, o el periodo de vigencia, el edicto pasa al estado “no vigente”, y se entiende que ya ha sido notificado. Entonces podrás pagar, presentar alegaciones o recurrir, según el plazo fijado en el edicto.', 'multa_noticia.jpg', '2020-06-09'),
(24, '¿Es cierto que pueden multarte por pasar con el semáforo en ámbar a rojo?', 'Los semáforos plantean dudas a muchos conductores, que en ocasiones se ven sorprendidos  por un cambio repentino de las luces.', 'Todos hemos observado como en muchas ocasiones, al cambiar la luz del semáforo de verde a ámbar o amarillo, algún conductor ha acelerado para pasar antes de que cambie a rojo.<br />\r\n Es probable que tú, estimado lector, lo haya hecho alguna vez, incluso. Aunque muchas personas consideran que esto es legítimo, pues el ámbar sirve principalmente para anticipar el paso al rojo y, por tanto, la detención, no es eso lo que dice el Reglamento General de Circulación.<br />\r\n Dicha ley, en su artículo 146 sobre Semáforos circulares para vehículos, aclara de esta manera el significado de las luces y flechas de los mismos:<br />\r\n<br />\r\n a) Una luz roja no intermitente prohíbe el paso.<br />\r\n b) Una luz roja intermitente, o dos luces rojas alternativamente intermitentes, prohíben temporalmente el paso a los vehículos antes de un paso a nivel.<br />\r\n c) Una luz amarilla no intermitente significa que los vehículos deben detenerse.<br />\r\n d) Una luz amarilla intermitente o dos luces amarillas alternativamente intermitentes obligan a los conductores a extremar la precaución y, en su caso, ceder el paso. <br />\r\n<br />\r\nEs decir, un semáforo con una luz ámbar o amarilla fija es equivalente a la luz roja y el conductor deberá detenerse sin traspasar la línea. Con una excepción, que esta situación se produzca cuando el vehículo se encuentra tan cerca del semáforo que frenar para detenerse genere una situación de peligro. En ese caso, el conductor estará legitimado para continuar.', 'semaforo_noticia.jpg', '2021-11-27'),
(27, 'Nuevos Mercedes GLE y GLE Coupé diésel, ahora con batería de 48 voltios', 'Estrenan hibridación ligera y etiqueta Eco.', 'Mercedes ha presentado una nueva versión diésel con hibridación ligera de los modelos GLE y GLE Coupé, que estarán a la venta desde el mes de noviembre en la red de la marca. <br />\r\nEstos coches disponen del motor diésel de cuatro cilindros y dos litros turboalimentado con una potencia de 272 CV y consumen una media de entre 6,1 y 7,5 litros WLTP dependiendo de los acabados y accesorios montados y del número de plazas ya que el GLE puede tener 5 o 7 plazas, no así el GLE Coupé que ofrece solo 5. Ambos recurren a un sistema Mild Hybrid que les permitirá obtener en España la etiqueta Eco de la DGT. <br />\r\nEstos coches incorporan también, como novedad, un sistema de transmisión a las cuatro ruedas con un embrague multidisco controlado electrónicamente que, en lugar de ofrecer un reparto fijo del par al 50% entre ambos ejes, permite un reparto adaptado a las condiciones de adherencia de cada eje de entre el 0 y el 100% del par. Gracias a ello se consigue una mejor estabilidad sobre firmes deslizantes y, al mismo tiempo, se mejora el comportamiento dinámico en curva al incorporar el sistema un control dinámico de la trazada mediante vectorización del par, lo que elimina el subviraje.<br />\r\nMercedes sostiene que el consumo se ha reducido gracias al sistema de hibridación ligera que cuenta con una batería de 48 voltios y un motor eléctrico de 15 kw que, además de arrancar el motor de gasolina y desconectarlo a muy baja velocidad para “adelantar” el efecto del stop/start, permite disponer de un “overboost” de 200 Nm de par en las aceleraciones. El precio del GLE en España es de 70.546 euros mientras que el GLE Coupé no figura en la web de la marca, al menos momentáneamente.', 'mercedesGLE.jpg', '2021-11-28'),
(28, 'El Porsche 718 Cayman GT4 RS está a puntito de caramelo: así ruge en Nürburgring', 'La versión más evolucionada del Porsche 718 Cayman GT4 está a la vuelta de la esquina.', 'Como señala el Director de Modelos GT, Andreas Preuninger, “durante el desarrollo, hemos dado al 718 Cayman GT4 RS todas aquellas características genuinas de un RS: construcción ligera, más carga aerodinámica, mayor potencia y, por supuesto, una respuesta más inmediata a las solicitudes del conductor. Nuestros clientes pueden esperar<br />\r\nun auténtico vehículo para disfrutar al volante”.<br />\r\n<br />\r\n A nivel estético cabe esperar un paquete aerodinámico más agresivo, con un alerón de tremendas proporciones. Bajo el capó, es todo una incógnita, aunque los primeros rumores apuntan al motor de seis cilindros y 4.0 litros de Porsche con hasta 500 CV (372 kW). Por supuesto,bajo la piel tendrá numerosos ajustes en frenos, suspensiones, dirección…', 'Porsche-718.jpg', '2021-10-22'),
(29, 'El Gobierno confirma el pago por uso de las autovías', 'El 75% de los españoles en contra de este \'peaje\'.', 'El pago por uso de las autovías iba a llegar tarde o temprano. El Gobierno acaba de confirmar que los conductores tendremos que pagar por usar las autovías. <br />\r\nHa sido el secretario general de Infraestructuras, Sergio Vázquez, quien se ha encargado de decirlo en un foro en el que ha participado en Galicia, y que ha corroborado después la Ministra de Transportes, Raquel Sánchez, tras la reunión del Consejo de Ministros. \"No le llamaría peaje. Hablamos de que vamos a implantar un sistema de tarificación. Y no le llamaría peaje porque la gente cuando habla de peaje piensa en unas tarifas similares a las que de las autopistas que se paguen hoy. No tiene sentido que haya este vacío y que el mantenimiento y la conservación de la infraestructura se siga sufragando con los impuestos de todos los españoles que tiene necesidades más urgentes como son las políticas sociales\", ha explicado Sergio Vázquez, como portavoz del Gobierno. <br />\r\n<br />\r\nLa Ministra Raquel Sánchez ha dicho que el sistema de tarificación podría estar listo en pocos meses. El pasado mes de mayo ya os hablamos sobre esta medida polémica cuando el Gobierno la propuso a la Comisión Europea dentro del Plan de Recuperación, Transformación y Resiliencia de España. Su objetivo es que los ciudadanos paguen un peaje simbólico por el uso de autopistas y autovías para financiar la conservación de las carreteras, una medida con la que el Ejecutivo calcula que podría recibir 1.500 millones de ingresos. Podría entrar en vigor a partir del año 2024 y se habla de un coste de un céntimo por kilómetro, aunque el Ejecutivo afirma que la tarificación de la red viaria todavía está en estudio y debe consensuarse con las Comunidades Autónomas.', 'autopista_noticia.jpg', '2021-10-19'),
(31, '¿Es el Ford Mustang el último deportivo purista?', 'El Ford Mustang es de los pocos coupés con motor V8 atmosférico y de propulsión que queda. Un auténtico purista al que podría quedarle poco.', 'En muchas ocasiones hemos hablado de las cualidades que hacen a un coche deportivo. Lo cierto es que no hay una fórmula mágica para conseguirlo y hay usuarios que dan más importancia a unas virtudes que a otras, es un tema bastante subjetivo. <br />\r\nSin embargo, casi todos coinciden en que las sensaciones tienen que estar por encima del resto y que debe ser un vehículo que se compre con el corazón más que con la cabeza.<br />\r\n Siguiendo eso, el Ford Mustang estaría dentro de la definición. Recientemente pudimos probar el Ford Mustang GT en su carrocería Fastback de techo rígido y se confirmaron todas nuestras sospechas. <br />\r\nEs probablemente de los modelos más puristas que podemos encontrar en el mercado actual, probablemente el último deportivo de estas características que se vaya a fabricar. Al fin y al cabo, no quedan coupés de grandes dimensiones con un V8 atmosférico en posición delantera y propulsión. Además de ofrecer la opción a montar cambio manual… De hecho, lo más destacable del Mustang es el V8 «Coyote» de 5.0 litros, que desarrolla 450 CV y 529 Nm de par en esta versión.<br />\r\nGracias a él se consiguen unas prestaciones interesantes, aunque es más destacable la personalidad que se consigue. El sonido es simplemente sublime, el tacto del cambio manual es exquisito y que sea propulsión ya completa el conjunto.<br />\r\nNo es el más rápido, ni el más preciso, ni el más fácil ni conducir; pero siempre consigue sacar una sonrisa. Como dijimos al principio, quien compra un Ford Mustang lo hace más con el corazón que con la cabeza. <br />\r\nEs un coche que consume mucho, que dinámicamente tiene algunas taras, con carencias en cuanto a tecnología y una calidad bastante justa. Sin embargo, todo eso se olvida haciendo kilómetros con él y disfrutando de estar ante una especie en peligro de extinción. Además, con un precio de partida de 50.470 euros, hay muy pocos con su nivel de potencia o de sensaciones a la venta (por no decir ninguno). ¿El último deportivo purista antes de que la electrificación lo inunde todo? Probablemente…', 'ford-mustang-gt-v8-prueba-02.jpg', '2021-09-07'),
(33, 'Land Rover Discovery estrena nuevo acabado culmen: Metropolitan', 'El Land Rover Discovery acoge un nuevo acabado llamado Metropolitan, el cual sustituye y mejora al anterior R-Dynamic HSE en el pináculo de la gama.', 'La nueva edición Metropolitan representa la cúspide de la familia Discovery y mejora la práctica terminación R-Dynamic HSE, con los detalles de la parrilla en Bright Atlas y las letras “Discovery” en el frontal. <br />\r\nEsto se complementa con las inserciones del paragolpes inferior en Hakuba Silver, las llantas de aleación de 22 pulgadas con pulido a espejo con detalles en Gloss Grey y las pinzas de freno en Black Land Rover. Lógicamente, siendo el nuevo exponente de la familia Discovery, el techo panorámico deslizante para ambas filas de asientos viene como dotación de fábrica. Y, hablando del equipamiento de serie, el nuevo Land Rover Discovery Metropolitan ofrece a la clientela un Head-Up Display (HUD), volante con función de calefacción, climatizador de cuatro zonas, una base de carga inalámbrica para teléfonos móviles y una nevera en la consola central.<br />\r\nEsta última también se ha actualizado con un nuevo acabado: Titanium Mesh. Por último, el pack R-Dynamic viene de serie, e incorpora un techo en contraste en Gloss Black. Por supuesto la lista de equipamiento opcional es tan extensa y variada como saldo tengas en tu cuenta corriente. <br />\r\nEl lanzamiento de la edición Metropolitan ofrece un nuevo nivel de apariencia exquisita al Land Rover Discovery. <br />\r\nEste modelo de edición especial representa el vehículo más emblemático de la gama y destaca la apariencia de la especificación. R-Dynamic con las mejoras de diseño exterior y una serie de tecnologías que mejoran la comodidad”, ha declarado Finbar McFall, director de producto. <br />\r\nEl Discovery ya está disponible en la red oficial de concesionarios de Land Rover desde 74.100 euros, con el acabado Metropolitan partiendo en 108.750 euros.<br />\r\n', 'Land-Rover-Discovery-Metropolitan-2021-3.jpg', '2021-08-27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `codigo` int(4) NOT NULL,
  `dni_cliente` varchar(9) NOT NULL,
  `matricula_coche` varchar(7) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `precio_total` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`codigo`, `dni_cliente`, `matricula_coche`, `fecha_inicio`, `fecha_fin`, `precio_total`) VALUES
(1, '11111111a', '1111PFC', '2021-11-10', '2021-11-12', 400.00),
(15, '11111111a', '5555PFC', '2021-11-12', '2021-11-14', 400.00),
(16, '23447801f', '2222PFC', '2021-11-12', '2021-11-15', 600.00),
(17, '11345678a', '4444PFC', '2021-11-26', '2021-11-28', 400.00),
(21, '11345678a', '3480TYG', '2021-11-30', '2021-12-06', 1200.00),
(27, '11345678a', '0447TVF', '2021-11-04', '2021-11-08', 800.00),
(29, '11111111b', '6666PFC', '2021-11-26', '2021-11-28', 400.00),
(30, '11111111a', '2222PFC', '2021-11-09', '2021-11-11', 400.00),
(31, '11111111b', '5555PFC', '2021-11-20', '2021-11-23', 600.00),
(35, '11111111a', '0447TVF', '2021-11-21', '2021-11-23', 400.00),
(36, '11111111b', '3863ZRP', '2021-11-22', '2021-11-25', 600.00),
(37, '11111111a', '6666PFC', '2021-11-24', '2021-11-28', 800.00),
(38, '11111111a', '8888PFC', '2021-11-25', '2021-11-26', 200.00),
(40, '11111111a', '5555PFC', '2021-11-28', '2021-11-29', 200.00),
(45, '11111111a', '2222PFC', '2021-12-08', '2021-12-09', 200.00);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asiste`
--
ALTER TABLE `asiste`
  ADD PRIMARY KEY (`dni_cliente`,`codigo_evento`),
  ADD KEY `ce_asiste_evento` (`codigo_evento`),
  ADD KEY `dni_cliente` (`dni_cliente`) USING BTREE;

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`dni`),
  ADD UNIQUE KEY `nombre_usuario` (`nombre_usuario`);

--
-- Indices de la tabla `coche`
--
ALTER TABLE `coche`
  ADD PRIMARY KEY (`matricula`),
  ADD UNIQUE KEY `modelo` (`modelo`),
  ADD KEY `marca` (`marca`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`codigo`),
  ADD UNIQUE KEY `UniqueReserva` (`matricula_coche`,`fecha_inicio`),
  ADD KEY `ce_reserva_dni` (`dni_cliente`),
  ADD KEY `matricula_coche` (`matricula_coche`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `codigo` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `codigo` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `noticia`
--
ALTER TABLE `noticia`
  MODIFY `codigo` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `codigo` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asiste`
--
ALTER TABLE `asiste`
  ADD CONSTRAINT `ce_asiste_dni` FOREIGN KEY (`dni_cliente`) REFERENCES `cliente` (`dni`),
  ADD CONSTRAINT `ce_asiste_evento` FOREIGN KEY (`codigo_evento`) REFERENCES `evento` (`codigo`);

--
-- Filtros para la tabla `coche`
--
ALTER TABLE `coche`
  ADD CONSTRAINT `coche_ibfk_1` FOREIGN KEY (`marca`) REFERENCES `marca` (`codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `ce_reserva_coche` FOREIGN KEY (`matricula_coche`) REFERENCES `coche` (`matricula`),
  ADD CONSTRAINT `ce_reserva_dni` FOREIGN KEY (`dni_cliente`) REFERENCES `cliente` (`dni`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
