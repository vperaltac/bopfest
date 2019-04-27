-- MySQL dump 10.13  Distrib 5.7.25, for Linux (x86_64)
--
-- Host: localhost    Database: sibw
-- ------------------------------------------------------
-- Server version	5.7.25-0ubuntu0.18.04.2

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
  PRIMARY KEY (`id_comentario`),
  KEY `id_evento` (`id_evento`),
  CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_evento`) REFERENCES `eventos` (`id_evento`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentarios`
--

LOCK TABLES `comentarios` WRITE;
/*!40000 ALTER TABLE `comentarios` DISABLE KEYS */;
INSERT INTO `comentarios` VALUES (1,7,'Diego García','diegogarcia.correo@gmail.com','2019-04-19 13:24:59','Me encanta SFDK, me muero de ganas de que llegue el día del concierto!'),(1,8,'Víctor Peralta','victorperalta@correo.ugr.es','2019-04-19 13:25:45','Yo asistí a su concierto en Barcelona durante la misma gira y fue una experiencia inolvidable, lo recomiendo 100%.'),(2,9,'Víctor Peralta','victorperalta@correo.ugr.es','2019-04-19 13:28:00','Yo asistí a su concierto en Barcelona durante la misma gira y fue una experiencia inolvidable, lo recomiendo 100%.'),(2,10,'Diego García','diegogarcia.correo@gmail.com','2019-04-19 13:28:00','Me encanta Ruth Lorenzo, me muero de ganas de que llegue el día del concierto!'),(1,11,'Víctor Peralta','victorperalta.correo@gmail.com','2019-04-19 18:15:16','Menuda mierda de concierto, no pago más por esta chusta en mi vida hermano'),(1,12,'Víctor Peralta','victorperalta.correo@gmail.com','2019-04-19 18:15:17','Menuda mierda de concierto, no pago más por esta chusta en mi vida hermano'),(1,13,'Víctor Peralta','victorperalta.correo@gmail.com','2019-04-19 18:15:30','Menuda mierda de concierto, no pago más por esta chusta en mi vida hermano'),(1,14,'Víctor Peralta','victorperalta.correo@gmail.com','2019-04-19 18:16:30','Menuda mierda de concierto, no pago más por esta chusta en mi vida hermano'),(2,16,'Javier Perez','javiperez@gmail.com','2019-04-22 23:03:52','texto texto texto'),(1,27,'Víctor Peralta','victorperalta.correo@gmail.com','2019-04-22 23:22:26','nuevo nuevo nuevo nuevo nuevo'),(1,28,'Víctor Peralta','victorperalta.correo@gmail.com','2019-04-22 23:22:39','nuevo nuevo nuevo nuevo nuevo'),(1,29,'Víctor Peralta','victorperalta.correo@gmail.com','2019-04-22 23:23:00','nuevo nuevo nuevo nuevo nuevo'),(1,30,'Víctor Peralta','victorperalta.correo@gmail.com','2019-04-22 23:27:56','nuevo nuevo nuevo nuevo nuevo');
/*!40000 ALTER TABLE `comentarios` ENABLE KEYS */;
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
  `twitter` varchar(60) DEFAULT NULL,
  `facebook` varchar(60) DEFAULT NULL,
  `fecha_modif` datetime DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_evento`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventos`
--

LOCK TABLES `eventos` WRITE;
/*!40000 ALTER TABLE `eventos` DISABLE KEYS */;
INSERT INTO `eventos` VALUES (1,'Concierto SFDK - 25 Aniversario','Organizado por Wegow Technologies S.L.','2019-04-18','Más de 3 horas de show y repaso a toda su carrera. Concierto único e irrepetible.\nNUEVA UBICACIÓN - Centro Andaluz de Arte Contemporáneo - SEVILLA\n18:00 - Apertura de puertas\n19:00 - Dj Hazhe\n20:00 - R de Rumba\n21:00 - SFDK + Invitados (Más de 3 horas de show)\nCuando por caprichos del destino nos conocimos aquel verano de 1994 era impensable que en 2019 fuéramos a estar celebrando nuestros 25 años como grupo. 25 años de trabajo, de esfuerzo, de aprendizaje. 25 años de creer en nosotros y en nuestra música. De aportar nuestro granito de arena para hacer crecer y respetar un estilo musical en nuestro país. 25 años de lágrimas y alegrías. 25 años de SFDK. Un largo camino recompensado por las muestras de cariño de todas las personas que han apoyado nuestra música a lo largo de estos años. Siempre os estaremos agradecidos. Para tan marcada celebración hemos querido preparar algo muy especial: El día 16 de marzo de 2019 y en la ciudad que nos vio nacer y crecer; Sevilla, realizaremos un concierto único e irrepetible donde repasaremos toda nuestra carrera profesional, incluyendo canciones que nunca fueron tocadas en directo y donde nos rodearemos de amigos que, de una forma u otra, han sido participes y testigos de nuestra andadura musical. Quizás estemos hablando del día más especial de nuestra trayectoria. Hasta hoy.\nArtistas invitados: Kase O, Fyahbwoy, Capaz, Juaninacka, El Chojin, Kaze, R de Rumba, Sho-Hai, Hazhe, Little Pepe, Shabu One Shant, El Límite Darmo, Legendario, Gordo Master, Ose Him, Andreas Lutz, Hermanos del Groove... ','Para saber más acerca de este evento como ver su localización exacta y comprar entradas, diríjase a la web del organizador.','https://twitter.com/sfdkoficial/','https://facebook.com/sfdkoficial/',NULL,NULL),(2,'Concierto Ruth Lorenzo','Organizado por Diego García Aurelio','2019-04-18','Ruth Lorenzo llega al Festival Mil·lenni el próximo martes 29 de marzo de 2019 a las 21:00 horas en el Teatre Coliseum de Barcelona.\nSu último disco \'Loveaholic\' es una mezcla en inglés y castellano de música rock, blues y música española. Esta mezcla hace que su último trabajo discográfico sea sofisticado y lleno de carácter, pasión y musicalidad, además de contar con el guitarrista Jeff Beck en algún tema.\nLa artista se caracteriza por tener un potente directo, un show lleno de “Power” y con una capacidad vocal extraordinaria que no deja a nadie indiferente cuando la escuchan en directo. La describimos como la diva millennial “old school” que no te puedes perder. En esta ocasión nos presenta en directo “Loveaholic” acompañado además de temas inéditos y versiones que han marcado su carrera hasta convertirse en la artista que es en la actualidad. Un derroche de amor por la música y una fiera escénica y vocal','Concierto 29/03/2019',NULL,NULL,NULL,NULL),(6,'Titulo','CHerokee','2019-04-22','texto texto texto texto texto nuevo nuevo nuevo',NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `eventos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imagenes_eventos`
--

DROP TABLE IF EXISTS `imagenes_eventos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imagenes_eventos` (
  `id_evento` int(10) unsigned DEFAULT NULL,
  `imagen` varchar(100) NOT NULL,
  `titulo` varchar(30) NOT NULL,
  `creditos` varchar(60) DEFAULT NULL,
  KEY `id_evento` (`id_evento`),
  CONSTRAINT `imagenes_eventos_ibfk_1` FOREIGN KEY (`id_evento`) REFERENCES `eventos` (`id_evento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imagenes_eventos`
--

LOCK TABLES `imagenes_eventos` WRITE;
/*!40000 ALTER TABLE `imagenes_eventos` DISABLE KEYS */;
INSERT INTO `imagenes_eventos` VALUES (1,'imgs/sfdk1.jpeg','Zatu y Acción Sanchez','Recuperado de https://www.spotify.com'),(1,'imgs/sfdk2.jpg','Cartel del concierto','https://www.wegow.com'),(2,'imgs/ruthlorenzo0.jpg','Foto 1 de Ruth Lorenzo','Recuperado de http://www.ruthlorenzo.com'),(2,'imgs/ruthlorenzo1.jpg','Foto 2 de Ruth Lorenzo','Recuperado de http://www.ruthlorenzo.com');
/*!40000 ALTER TABLE `imagenes_eventos` ENABLE KEYS */;
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
  `etiqueta` varchar(30) DEFAULT NULL,
  KEY `id_evento` (`id_evento`),
  CONSTRAINT `polaroids_ibfk_1` FOREIGN KEY (`id_evento`) REFERENCES `eventos` (`id_evento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `polaroids`
--

LOCK TABLES `polaroids` WRITE;
/*!40000 ALTER TABLE `polaroids` DISABLE KEYS */;
INSERT INTO `polaroids` VALUES ('imgs/sfdk1-evento.jpeg','SFDK',1,'rap'),('imgs/ruthlorenzo.jpg','Ruth Lorenzo',2,'pop'),('imgs/plastic-festival.jpg','Plastic Festival',NULL,NULL),('imgs/miriam.jpg','Miriam Rodríguez',NULL,NULL),('imgs/manuel-carrasco.jpg','Manuel Carrasco',NULL,NULL),('imgs/bely-basarte.jpg','Bely Basarte',NULL,NULL),('imgs/luz-casal.jpg','Luz Casal',NULL,NULL),('imgs/shotta.jpg','Shotta',NULL,NULL),('imgs/madrid-salvaje.png','Festival Madrid Salvaje',NULL,NULL);
/*!40000 ALTER TABLE `polaroids` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-04-27 17:08:32
