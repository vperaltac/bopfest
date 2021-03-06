-- MySQL dump 10.13  Distrib 5.7.26, for Linux (x86_64)
--
-- Host: localhost    Database: sibw
-- ------------------------------------------------------
-- Server version	5.7.26-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comentarios` (
  `id_evento` int(10) unsigned DEFAULT NULL,
  `id_comentario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `correo` varchar(60) NOT NULL,
  `fecha` datetime NOT NULL,
  `texto` text NOT NULL,
  `ip_usuario` varchar(30) DEFAULT NULL,
  `editado` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_comentario`),
  KEY `id_evento` (`id_evento`),
  CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_evento`) REFERENCES `eventos` (`id_evento`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentarios`
--

LOCK TABLES `comentarios` WRITE;
/*!40000 ALTER TABLE `comentarios` DISABLE KEYS */;
INSERT INTO `comentarios` VALUES (3,56,'Pedro Villar','pedro@gmail.com','2019-04-30 13:04:54','Un festival muy épico!','150.214.205.72',NULL),(2,84,'Diego García','diego@gmail.com','2019-05-28 09:29:37','dwdwadaw','150.214.205.66','Diego García'),(14,86,'Diego García','diego@gmail.com','2019-05-28 13:20:36','hola','150.214.205.66',NULL),(14,87,'Diego García','diego@gmail.com','2019-05-28 13:20:51','adios','150.214.205.66',NULL),(14,88,'Diego García','diego@gmail.com','2019-05-28 13:21:03','comentario de ejemplo','150.214.205.66',NULL),(1,89,'Diego García','diego@gmail.com','2019-05-28 13:21:32','comentario de ejemplo','150.214.205.66',NULL),(1,91,'Diego García','diego@gmail.com','2019-05-28 13:21:47','comentario 3','150.214.205.66',NULL);
/*!40000 ALTER TABLE `comentarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `etiquetas`
--

DROP TABLE IF EXISTS `etiquetas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `etiquetas` (
  `nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `etiquetas`
--

LOCK TABLES `etiquetas` WRITE;
/*!40000 ALTER TABLE `etiquetas` DISABLE KEYS */;
INSERT INTO `etiquetas` VALUES ('fest'),('pop'),('rap');
/*!40000 ALTER TABLE `etiquetas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `etiquetas_eventos`
--

DROP TABLE IF EXISTS `etiquetas_eventos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `etiquetas_eventos` (
  `id_evento` int(10) unsigned NOT NULL,
  `etiqueta` varchar(30) NOT NULL,
  PRIMARY KEY (`id_evento`,`etiqueta`),
  KEY `etiqueta` (`etiqueta`),
  CONSTRAINT `etiquetas_eventos_ibfk_1` FOREIGN KEY (`etiqueta`) REFERENCES `etiquetas` (`nombre`),
  CONSTRAINT `etiquetas_eventos_ibfk_2` FOREIGN KEY (`id_evento`) REFERENCES `eventos` (`id_evento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `etiquetas_eventos`
--

LOCK TABLES `etiquetas_eventos` WRITE;
/*!40000 ALTER TABLE `etiquetas_eventos` DISABLE KEYS */;
INSERT INTO `etiquetas_eventos` VALUES (3,'fest'),(14,'fest'),(2,'pop'),(4,'pop'),(5,'pop'),(16,'pop'),(1,'rap'),(15,'rap');
/*!40000 ALTER TABLE `etiquetas_eventos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eventos`
--

DROP TABLE IF EXISTS `eventos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eventos` (
  `id_evento` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(60) NOT NULL,
  `organizador` varchar(60) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `texto` longtext,
  `info_adicional` text,
  `fecha_modif` datetime DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `url_video` varchar(60) DEFAULT NULL,
  `publicado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_evento`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventos`
--

LOCK TABLES `eventos` WRITE;
/*!40000 ALTER TABLE `eventos` DISABLE KEYS */;
INSERT INTO `eventos` VALUES (1,'Concierto SFDK - 40 Aniversario','Organizado por Victor Peralta','2021-01-01','Más de 3 horas de show y repaso a toda su carrera. Concierto único e irrepetible.\nNUEVA UBICACIÓN - Centro Andaluz de Arte Contemporáneo - SEVILLA\n18:00 - Apertura de puertas\n19:00 - Dj Hazhe\n20:00 - R de Rumba\n21:00 - SFDK + Invitados (Más de 3 horas de show)\nCuando por caprichos del destino nos conocimos aquel verano de 1994 era impensable que en 2019 fuéramos a estar celebrando nuestros 25 años como grupo. 25 años de trabajo, de esfuerzo, de aprendizaje. 25 años de creer en nosotros y en nuestra música. De aportar nuestro granito de arena para hacer crecer y respetar un estilo musical en nuestro país. 25 años de lágrimas y alegrías. 25 años de SFDK. Un largo camino recompensado por las muestras de cariño de todas las personas que han apoyado nuestra música a lo largo de estos años. Siempre os estaremos agradecidos. Para tan marcada celebración hemos querido preparar algo muy especial: El día 16 de marzo de 2019 y en la ciudad que nos vio nacer y crecer; Sevilla, realizaremos un concierto único e irrepetible donde repasaremos toda nuestra carrera profesional, incluyendo canciones que nunca fueron tocadas en directo y donde nos rodearemos de amigos que, de una forma u otra, han sido participes y testigos de nuestra andadura musical. Quizás estemos hablando del día más especial de nuestra trayectoria. Hasta hoy.\nArtistas invitados: Kase O, Fyahbwoy, Capaz, Juaninacka, El Chojin, Kaze, R de Rumba, Sho-Hai, Hazhe, Little Pepe, Shabu One Shant, El Límite Darmo, Legendario, Gordo Master, Ose Him, Andreas Lutz, Hermanos del Groove... \',\'Para saber más acerca de este evento como ver su localización exacta y comprar entradas, diríjase a la web del organizador.','Para saber más acerca de este evento como ver su localización exacta y comprar entradas, diríjase a la web del organizador.',NULL,NULL,'https://www.youtube.com/embed/JX65DcsIXHs',1),(2,'Concierto Ruth Lorenzo','Organizado por Diego García Aurelio','2019-04-18','Ruth Lorenzo llega al Festival Mil·lenni el próximo martes 29 de marzo de 2019 a las 21:00 horas en el Teatre Coliseum de Barcelona.\nSu último disco \'Loveaholic\' es una mezcla en inglés y castellano de música rock, blues y música española. Esta mezcla hace que su último trabajo discográfico sea sofisticado y lleno de carácter, pasión y musicalidad, además de contar con el guitarrista Jeff Beck en algún tema.\nLa artista se caracteriza por tener un potente directo, un show lleno de “Power” y con una capacidad vocal extraordinaria que no deja a nadie indiferente cuando la escuchan en directo. La describimos como la diva millennial “old school” que no te puedes perder. En esta ocasión nos presenta en directo “Loveaholic” acompañado además de temas inéditos y versiones que han marcado su carrera hasta convertirse en la artista que es en la actualidad. Un derroche de amor por la música y una fiera escénica y vocal.','Concierto 29/03/2019',NULL,NULL,'https://www.youtube.com/embed/tQqTcgZvWxQ',1),(3,'Plastic Festival','Organizado por Diego García Aurelio','2019-04-30','Tercera edición de Plastic Festival, se celebrará el próximo Sábado 27 de Abril de 2019 en El Ejido (Almería). Festival pensado y organizado con el único fin de que pases toda una tarde noche sin parar de bailar. INFORMACIÓN IMPORTANTE para disfrutar del Festival. Queremos ayudar a todas y todos a disfrutar lo mejor posible de nuestra gran fiesta. Para ello os dejamos algunas de las claves de PLASTIC: - Pueden venir sin problema menores (de forma gratuita hasta 13 años) cumplimentando el formulario que puedes descargar en nuestra web y presentarlo en la entrada. - Recomendamos venir con tiempo para el acceso y así evitar colas o perderte el concierto que tanto esperas bailar. - En barras para beber y comer se utiliza nuestra propia moneda que puedes canjear una vez dentro del recinto. Lo poco que queda es inversamente proporcional a lo bien que vamos a pasarlo y la pasada de mover los pies que nos daremos.',NULL,'2019-04-30 07:37:33','2019-04-30 07:37:33','https://www.youtube.com/embed/QfzNqibXa44',1),(4,'Miriam Rodríguez','Jet Entertainment','2019-04-30','La cantante gallega MIRIAM RODRÍGUEZ, finalista de la última edición de Operación Triunfo 2017, no deja de acumular éxitos. Tras la gran acogida que ha tenido en la industria musical su primer single “Hay algo en mí” y tras cumplir uno de sus grandes sueños al formar parte del elenco de la cuarta temporada de ‘Vis a Vis’, la tercera clasificada de Operación Triunfo 2017 ha anunciado su gira por España que comenzará el próximo mes de noviembre en A Coruña, su ciudad natal.\nHaciendo un pequeño homenaje a su tierra, después de recorrer España con un total de 15 conciertos, Miriam cerrará su gira también en Galicia, concretamente en Santiago de Compostela en el mes de febrero. Durante estos conciertos, la cantante pasará por las ciudades más importantes de nuestro país como Madrid, Barcelona, Valencia o Sevilla. \nLas entradas están a la venta desde el jueves 26 de julio a las 12:00h a través de los canales habituales de Ticketmaster España; ticketmaster.es, puntos físicos de Fnac, Halcón Viajes y Viajes Carrefour, y por venta telefónica al 902.150.025. Ticketmaster España gestiona la venta en exclusiva de todos los conciertos de la gira, excepto los siguientes que los gestionan otras operadoras: A Coruña (30/11), Vigo (01/12), Zaragoza (01/02) y Santiago de Compostela (15/02). \nMiriam Rodríguez se ha mostrado de lo más feliz y emocionada por esta noticia, la cual supone un gran paso en su carrera profesional como artista. Está claro que este 2018 está siendo un año increíble para ella ya que ha podido cumplir muchos de sus grandes sueños, contando con el apoyo incondicional de sus leones -así es como se hacen llamar sus fans-. Visto lo visto, el próximo 2019 también promete para ella.','','2019-05-05 17:43:14','2019-05-05 17:43:14','https://www.youtube.com/embed/atwWYqaMhTs',1),(5,'Manuel Carrasco','Organizado por Jet Entertainment','2019-04-30','Manuel Carrasco Su inconfundible estilo, con una voz tamizada y con una gran sensibilidad para las baladas, le ha valido un amplio número de seguidores a ambos lados del Atlántico. Manuel Carrasco es, sin lugar a dudas, un compositor de historias, un artista capaz de convertir sus palabras en versos y transformar sus emociones en melodías Manuel Carrasco nació en Isla Cristina (Huelva) en 1981, teniendo como peculiar punto de partida simbólico de su carrera musical su participación en los certámenes de chirigotas y fiestas carnavalescas. \nEn 2003 estrenó Quiéreme, su primer álbum profesional y que tenía como tema principal Que corra el aire. Sin embargo, fue su segundo disco, bautizado como el cantante, el que lo encumbraría en el panorama musical español. Manuel Carrasco es una apuesta a caballo ganador y su calidad artística, su humildad y filantropía personal le llevan a lo más alto del reconocimiento artístico. \nAdemás, artistas como Miguel Poveda, Malú, Antonio Orozco, Maite Martin, India Martínez, Pastora Soler, Josemi Carmona (Ketama), entre muchos, se han subido escenario con él para acompañarle en momentos inolvidables de sus giras anteriores. El gran salto internacional de Manuel Carrasco se produjo con el lanzamiento de su cuarto álbum de estudio, Inercia, que el artista decidió grabar precisamente en Argentina en 2008. Y más recientemente, su nueva gira, Tour Bailar el Viento, le han situado en medio de una gran popularidad.','','2019-05-05 17:43:20','2019-05-05 17:43:20',NULL,1),(14,'Madrid Salvaje','Victor Peralta','2019-05-28','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus odio felis, dignissim ultricies libero et, congue mattis mi. Cras in sollicitudin velit. Sed vulputate pellentesque diam non gravida. Nullam tristique aliquet ligula, quis sollicitudin quam volutpat eget. Quisque venenatis congue malesuada. Vestibulum fringilla tellus vitae justo mollis, sit amet tristique dui faucibus. Aenean at nisi in leo aliquam aliquam ut id sem. Fusce ac sem eget ipsum pellentesque tristique. Mauris rutrum tincidunt commodo. Etiam eu diam mauris. Etiam volutpat dui consequat eros efficitur malesuada. Cras laoreet magna vitae erat accumsan condimentum. Proin ac placerat nunc.\n\nDuis quis eleifend ipsum, quis cursus sapien. Etiam vitae volutpat sapien. Aliquam malesuada sed velit ut fermentum. In velit dolor, cursus vel condimentum non, commodo ut risus. Integer fermentum risus nunc, vitae condimentum elit fringilla in. Quisque sit amet odio et purus fringilla aliquam eget ut risus. Aenean sed erat nec lorem finibus malesuada vitae non tellus.\n\nNullam euismod justo ut fermentum rutrum. Aenean euismod dolor ut cursus porta. Pellentesque iaculis massa et leo iaculis, maximus gravida diam vulputate. Cras lobortis ligula ut rutrum luctus. Sed maximus varius ultricies. Aliquam sit amet turpis vitae nisi accumsan suscipit ac et nibh. Donec feugiat libero at fringilla blandit. Pellentesque sollicitudin vel elit egestas tincidunt. Ut tempor molestie massa sed egestas. Nulla facilisi.\n\n',NULL,NULL,NULL,NULL,1),(15,'Shotta','Organizado por Víctor Peralta','2019-05-28','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus odio felis, dignissim ultricies libero et, congue mattis mi. Cras in sollicitudin velit. Sed vulputate pellentesque diam non gravida. Nullam tristique aliquet ligula, quis sollicitudin quam volutpat eget. Quisque venenatis congue malesuada. Vestibulum fringilla tellus vitae justo mollis, sit amet tristique dui faucibus. Aenean at nisi in leo aliquam aliquam ut id sem. Fusce ac sem eget ipsum pellentesque tristique. Mauris rutrum tincidunt commodo. Etiam eu diam mauris. Etiam volutpat dui consequat eros efficitur malesuada. Cras laoreet magna vitae erat accumsan condimentum. Proin ac placerat nunc.\n\nDuis quis eleifend ipsum, quis cursus sapien. Etiam vitae volutpat sapien. Aliquam malesuada sed velit ut fermentum. In velit dolor, cursus vel condimentum non, commodo ut risus. Integer fermentum risus nunc, vitae condimentum elit fringilla in. Quisque sit amet odio et purus fringilla aliquam eget ut risus. Aenean sed erat nec lorem finibus malesuada vitae non tellus.',NULL,NULL,NULL,NULL,1),(16,'Luz Casal','Organizado por Víctor Peralta','2019-05-28','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus odio felis, dignissim ultricies libero et, congue mattis mi. Cras in sollicitudin velit. Sed vulputate pellentesque diam non gravida. Nullam tristique aliquet ligula, quis sollicitudin quam volutpat eget. Quisque venenatis congue malesuada. Vestibulum fringilla tellus vitae justo mollis, sit amet tristique dui faucibus. Aenean at nisi in leo aliquam aliquam ut id sem. Fusce ac sem eget ipsum pellentesque tristique. Mauris rutrum tincidunt commodo. Etiam eu diam mauris. Etiam volutpat dui consequat eros efficitur malesuada. Cras laoreet magna vitae erat accumsan condimentum. Proin ac placerat nunc.\n\nDuis quis eleifend ipsum, quis cursus sapien. Etiam vitae volutpat sapien. Aliquam malesuada sed velit ut fermentum. In velit dolor, cursus vel condimentum non, commodo ut risus. Integer fermentum risus nunc, vitae condimentum elit fringilla in. Quisque sit amet odio et purus fringilla aliquam eget ut risus. Aenean sed erat nec lorem finibus malesuada vitae non tellus.\n\nNullam euismod justo ut fermentum rutrum. Aenean euismod dolor ut cursus porta. Pellentesque iaculis massa et leo iaculis, maximus gravida diam vulputate. Cras lobortis ligula ut rutrum luctus. Sed maximus varius ultricies. Aliquam sit amet turpis vitae nisi accumsan suscipit ac et nibh. Donec feugiat libero at fringilla blandit. Pellentesque sollicitudin vel elit egestas tincidunt. Ut tempor molestie massa sed egestas. Nulla facilisi.',NULL,NULL,NULL,NULL,1);
/*!40000 ALTER TABLE `eventos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galeria`
--

DROP TABLE IF EXISTS `galeria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `galeria` (
  `id_evento` int(10) unsigned DEFAULT NULL,
  `imagen` varchar(100) NOT NULL,
  KEY `id_evento` (`id_evento`),
  CONSTRAINT `galeria_ibfk_1` FOREIGN KEY (`id_evento`) REFERENCES `eventos` (`id_evento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galeria`
--

LOCK TABLES `galeria` WRITE;
/*!40000 ALTER TABLE `galeria` DISABLE KEYS */;
INSERT INTO `galeria` VALUES (1,'imgs/sfdk3.jpg'),(1,'imgs/sfdk4.jpg'),(2,'imgs/ruthlorenzo3.jpg'),(2,'imgs/ruthlorenzo4.jpg');
/*!40000 ALTER TABLE `galeria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imagenes_eventos`
--

DROP TABLE IF EXISTS `imagenes_eventos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imagenes_eventos` (
  `id_evento` int(10) unsigned DEFAULT NULL,
  `id_imagen` int(11) NOT NULL AUTO_INCREMENT,
  `imagen` varchar(100) NOT NULL,
  `titulo` varchar(30) NOT NULL,
  `creditos` varchar(60) DEFAULT NULL,
  UNIQUE KEY `id_imagen` (`id_imagen`),
  KEY `id_evento` (`id_evento`),
  CONSTRAINT `imagenes_eventos_ibfk_1` FOREIGN KEY (`id_evento`) REFERENCES `eventos` (`id_evento`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imagenes_eventos`
--

LOCK TABLES `imagenes_eventos` WRITE;
/*!40000 ALTER TABLE `imagenes_eventos` DISABLE KEYS */;
INSERT INTO `imagenes_eventos` VALUES (1,1,'imgs/5ced32e696d421.34022614.jpeg','Zatu y Acción Sanchez','Recuperado de https://www.spotify.com'),(1,2,'imgs/5cec87d7c36415.45288295.jpg','Cartel del concierto','https://www.wegow.com'),(2,3,'imgs/ruthlorenzo0.jpg','Foto 1 de Ruth Lorenzo','Recuperado de http://www.ruthlorenzo.com'),(2,4,'imgs/ruthlorenzo1.jpg','Foto 2 de Ruth Lorenzo','Recuperado de http://www.ruthlorenzo.com'),(3,5,'imgs/plastic-festival.jpg','Foto 1 de Plastic Festival','Recuperado de https://www.spotify.com'),(3,6,'imgs/plastic-festival2.jpg','Foto 2 de Plastic Festival','Recuperado de https://www.spotify.com'),(4,7,'imgs/miriam1.jpg','Foto 1 Miriam Rodríguez','Recuperado de elconfidencial.es'),(4,8,'imgs/miriam2.jpg','Foto 2 Miriam Rodríguez','Recuperado de produceme.es'),(5,9,'imgs/manuel-carrasco1.jpg','Foto 1 Manuel Carrasco','Recuperado de huelvahoy.com'),(5,10,'imgs/manuel-carrasco2.jpg','Foto 2 Manuel Carrasco','Recuperado de lasprovincias.es'),(14,21,'imgs/5ced34e560dff9.10192722.jpg','titulo1','creditos1'),(14,22,'imgs/5ced34e5684a09.61507901.png','titulo2','creditos2'),(15,23,'imgs/5ced37f4ca6945.80243729.jpeg','Cartel del concierto','recuperado de www.wegow.com'),(16,24,'imgs/5ced3996055e27.82654726.jpg','titulo1','creditos1'),(16,25,'imgs/5ced3996071ca1.41123190.jpg','titulo2','creditos2');
/*!40000 ALTER TABLE `imagenes_eventos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `palabras_prohibidas`
--

DROP TABLE IF EXISTS `palabras_prohibidas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `palabras_prohibidas` (
  `palabra` varchar(30) NOT NULL,
  PRIMARY KEY (`palabra`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `palabras_prohibidas`
--

LOCK TABLES `palabras_prohibidas` WRITE;
/*!40000 ALTER TABLE `palabras_prohibidas` DISABLE KEYS */;
INSERT INTO `palabras_prohibidas` VALUES ('caballo'),('casa'),('furgoneta');
/*!40000 ALTER TABLE `palabras_prohibidas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `polaroids`
--

DROP TABLE IF EXISTS `polaroids`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `polaroids` (
  `imagen` varchar(100) NOT NULL,
  `titulo` varchar(30) NOT NULL,
  `id_evento` int(10) unsigned DEFAULT NULL,
  KEY `id_evento` (`id_evento`),
  CONSTRAINT `polaroids_ibfk_1` FOREIGN KEY (`id_evento`) REFERENCES `eventos` (`id_evento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `polaroids`
--

LOCK TABLES `polaroids` WRITE;
/*!40000 ALTER TABLE `polaroids` DISABLE KEYS */;
INSERT INTO `polaroids` VALUES ('imgs/sfdk1-evento.jpeg','SFDK',1),('imgs/ruthlorenzo.jpg','Ruth Lorenzo',2),('imgs/manuel-carrasco.jpg','Manuel Carrasco',5),('imgs/plastic-festival.jpg','Plastic Festival',3),('imgs/miriam.jpg','Miriam Rodríguez',4),('imgs/5ced34e3d7fe56.10578519.png','Madrid Salvaje',14),('imgs/5ced37f4c76a22.62056720.jpg','Shotta',15),('imgs/5ced39960359d2.90785185.jpg','Luz Casal',16);
/*!40000 ALTER TABLE `polaroids` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `passwd` char(60) NOT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (19,'Diego García','diego@gmail.com','$2y$10$4bwIKW.FPBYDMOCXYxp7GeQGTcOMniT0zOloB0XK9FAqjtC9HfKyC','superusuario'),(24,'Victor Peralta','registrado@gmail.com','$2y$10$QOHfeijtIRnhBygH/tENj.5lowM8q/jHKaUJ0jr/Q55DwXqs9770u','registrado'),(25,'Julian Cifuentes','moderador@gmail.com','$2y$10$I0hsfSEpR4T97NqL8eJVge69OEYuNB864BKDkOPNm1iOfzhOZsu4e','moderador'),(26,'Claudia Caballero','gestor@gmail.com','$2y$10$x7TgRwBLusE4gVDOYJ.2tu1GCRG.AqLV2wPSYODEu8MPTEwKOs9CC','gestor'),(27,'Alejandro','ch3rokee8@gmail.com','$2y$10$du.kDpgdKsJim8QEPbGyCO0YAW0s/kGD.mND8LejUQx.eJ/PurunK','registrado');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-28 13:45:39
