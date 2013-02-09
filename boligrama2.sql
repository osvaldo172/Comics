-- MySQL dump 10.13  Distrib 5.1.66, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: boligrama2
-- ------------------------------------------------------
-- Server version	5.1.66-0ubuntu0.11.10.2

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
-- Table structure for table `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alumnos` (
  `matricula` int(11) NOT NULL COMMENT '		',
  `contrasenia` varchar(45) COLLATE latin1_danish_ci NOT NULL,
  `correo` varchar(45) COLLATE latin1_danish_ci NOT NULL,
  `creditos` int(11) NOT NULL,
  `licenciaturas_idlicenciaturas` int(11) NOT NULL,
  PRIMARY KEY (`matricula`),
  KEY `fk_alumnos_licenciaturas1_idx` (`licenciaturas_idlicenciaturas`),
  CONSTRAINT `fk_alumnos_licenciaturas1` FOREIGN KEY (`licenciaturas_idlicenciaturas`) REFERENCES `licenciaturas` (`idlicenciaturas`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumnos`
--

LOCK TABLES `alumnos` WRITE;
/*!40000 ALTER TABLE `alumnos` DISABLE KEYS */;
INSERT INTO `alumnos` VALUES (207309978,'nallely','anjudark89@gmail.com',0,1),(207310034,'123','luisa.207310034@gmail.com',0,1),(207341483,'osvaldo172','osvaldo172@hotmail.com',0,1);
/*!40000 ALTER TABLE `alumnos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `divisiones`
--

DROP TABLE IF EXISTS `divisiones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `divisiones` (
  `idDivisiones` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE latin1_danish_ci NOT NULL,
  PRIMARY KEY (`idDivisiones`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `divisiones`
--

LOCK TABLES `divisiones` WRITE;
/*!40000 ALTER TABLE `divisiones` DISABLE KEYS */;
INSERT INTO `divisiones` VALUES (1,'CBI'),(2,'CBS'),(3,'CSH');
/*!40000 ALTER TABLE `divisiones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `licenciaturas`
--

DROP TABLE IF EXISTS `licenciaturas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `licenciaturas` (
  `idlicenciaturas` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE latin1_danish_ci NOT NULL,
  `creditos` int(11) NOT NULL,
  `divisiones_iddivisiones` int(11) NOT NULL,
  PRIMARY KEY (`idlicenciaturas`),
  KEY `fk_licenciaturas_divisiones_idx` (`divisiones_iddivisiones`),
  CONSTRAINT `fk_licenciaturas_divisiones` FOREIGN KEY (`divisiones_iddivisiones`) REFERENCES `divisiones` (`idDivisiones`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `licenciaturas`
--

LOCK TABLES `licenciaturas` WRITE;
/*!40000 ALTER TABLE `licenciaturas` DISABLE KEYS */;
INSERT INTO `licenciaturas` VALUES (1,'Computacion',443,1),(2,'Electronica ',443,1),(3,'Matematicas',400,1),(4,'Filosofia',420,3),(5,'Biologia',539,2),(6,'Administracion',454,3),(7,'Antropologia',476,3);
/*!40000 ALTER TABLE `licenciaturas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seriacion`
--

DROP TABLE IF EXISTS `seriacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seriacion` (
  `ueas_idueas` int(11) NOT NULL,
  `uea_seriada` int(11) NOT NULL,
  PRIMARY KEY (`ueas_idueas`,`uea_seriada`),
  CONSTRAINT `fk_seriacion_ueas1` FOREIGN KEY (`ueas_idueas`) REFERENCES `ueas` (`idueas`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seriacion`
--

LOCK TABLES `seriacion` WRITE;
/*!40000 ALTER TABLE `seriacion` DISABLE KEYS */;
INSERT INTO `seriacion` VALUES (211012,214007),(211013,211014),(212208,212413),(212321,212353),(212321,215105),(212352,212354),(212352,212355),(212353,213252),(212354,215103),(212354,215104),(212355,215106),(212410,212412),(212412,215114),(212413,215108),(212427,212444),(212427,213193),(212427,213196),(212444,212208),(212444,215107),(212444,215111),(213024,213025),(213024,214007),(213025,231173),(213032,212427),(213033,211012),(213033,213024),(213035,213040),(213035,213274),(213038,213039),(213039,213040),(213039,213274),(213040,213191),(213104,213228),(213104,213230),(213191,213193),(213191,213194),(213194,213141),(213197,213198),(213221,213104),(213230,212321),(213230,212410),(213244,221192),(213250,213251),(213274,213221),(213274,213256),(214009,212444),(215003,213032),(215003,215109),(215109,212427),(215111,212352),(215114,215102),(215114,215103),(221175,221178),(221175,221181),(221177,221180),(221180,213244),(221182,221193),(221183,221187),(221185,221189),(221187,221195),(221192,221198),(221193,221196),(221194,221197),(221195,221199),(221201,221198),(224188,221191),(225564,225565),(225565,225566),(230025,230026),(230026,234121),(230028,230027),(230028,231202),(230029,230031),(230029,230032),(230030,211012),(230031,230025),(230032,230025),(231170,231171),(231171,231172),(231173,231174),(231175,231176),(231176,231179),(231176,231183),(231176,231223),(231178,231180),(231178,231181),(231178,231183),(231178,231224),(231178,231239),(231179,231203),(231179,231224),(231180,231222),(231180,231239),(231181,231184),(231202,231243),(231203,231181),(231211,231240),(231212,231175),(231212,231177),(231221,231181),(231223,231228),(231224,231203),(231232,231202),(231240,231241),(231241,231178),(231241,231221),(231243,231244),(231244,231236),(234121,231246),(235133,231221),(235133,231232);
/*!40000 ALTER TABLE `seriacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ueas`
--

DROP TABLE IF EXISTS `ueas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ueas` (
  `idueas` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE latin1_danish_ci NOT NULL,
  `division` varchar(45) COLLATE latin1_danish_ci NOT NULL,
  `creditos` int(11) NOT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`idueas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ueas`
--

LOCK TABLES `ueas` WRITE;
/*!40000 ALTER TABLE `ueas` DISABLE KEYS */;
INSERT INTO `ueas` VALUES (101,'Optativa','CSH',8,0),(102,'Optativa','CSH',8,0),(103,'Optativa','CSH',8,0),(104,'Optativa','CSH',8,0),(111,'Optativa','CSH',8,0),(112,'Optativa','CSH',8,0),(113,'Optativa','CSH',8,0),(114,'Optativa','CSH',8,0),(121,'Optativa','CSH',8,0),(122,'Optativa','CSH',8,0),(123,'Optativa','CSH',8,0),(124,'Optativa','CSH',8,0),(181,'Optativa','CSH',8,0),(182,'Optativa','CSH',8,0),(183,'Optativa','CSH',8,0),(184,'Optativa','CSH',8,0),(191,'Optativa','CSH',8,0),(192,'Optativa','CSH',8,0),(193,'Optativa','CSH',8,0),(194,'Optativa','CSH',8,0),(251,'Optativa 1','CBS',9,0),(252,'Optativa 2','CBS',9,0),(253,'Optativa 3','CBS',9,0),(281,'Temas selectos 1','CSH',8,0),(291,'Temas selectos 2','CSH',8,0),(301,'Seminario de investigacion 1','CSH',8,0),(312,'Seminario de investigacion 2','CSH',8,0),(323,'Seminario de unvestigacion 3','CSH',8,0),(111111,'Optativa','CBI',9,NULL),(210001,'Metodo experimental','CBI',9,NULL),(211012,'Fundamentos de fisica','CBS',9,0),(211013,'Mecanica y fluidos','CBI',9,NULL),(211014,'Ondas y rotaciones','CBI',9,NULL),(212208,'Estructura de datos ','CBI',9,NULL),(212321,'Teor matemat de la comput','CBI',9,NULL),(212352,'Compiladores','CBI',11,NULL),(212353,'Analisis de algoritmos','CBI',9,NULL),(212354,'Sistemas operativos','CBI',11,NULL),(212355,'Analisis y diseño de sistemas de computo','CBI',11,NULL),(212410,'Dieseño logico','CBI',11,NULL),(212412,'Arquitectura de computadoras','CBI',9,NULL),(212413,'Introduccion al diseño de bases de datos','CBI',11,NULL),(212427,'Introd a la programacion','CBI',6,NULL),(212444,'Programacion avanzada','CBI',12,NULL),(213024,'Matematicas 2','CBS',11,0),(213025,'Matematicas 3','CBS',11,0),(213032,'Fundamentos matematicos de la comp','CBI',9,NULL),(213033,'Matematicas 1','CBS',11,0),(213035,'Algebra lineal palicada 1','CBI',9,NULL),(213038,'Calculo diferencial','CBI',11,NULL),(213039,'Calculo integral','CBI',11,NULL),(213040,'Calculo de varias variables 1','CBI',11,NULL),(213104,'Algebra 1','CBI',9,NULL),(213141,'Estadistica y diseño de experimentos','CBI',9,NULL),(213191,'Ecuaciones diferenciales ordinarias 1','CBI',9,NULL),(213193,'Metodos numericos','CBI',9,NULL),(213194,'Probabilidad aplicada','CBI',9,NULL),(213196,'Introd a la program en admon','CBI',11,NULL),(213197,'Proyecto de investigacion 1','CBI',12,NULL),(213198,'Proyecto de investigacion 2','CBI',18,NULL),(213221,'Matematicas finitas','CBI',9,NULL),(213228,'Analisis combinatorio','CBI',9,NULL),(213230,'Logica','CBI',9,NULL),(213244,'Estadistica 1','CSH',9,0),(213250,'Inteligencia artificial','CBI',9,NULL),(213251,'T sel de inteligencia artific','CBI',12,NULL),(213252,'T sel de ciencias de la comput','CBI',9,NULL),(213256,'Programacion lineal','CBI',9,NULL),(213274,'Algebra lineal aplicada 2','CBI',9,NULL),(214007,'Fisicoquimica 1','CBS',10,0),(214009,'Estructura de la materia','CBI',9,NULL),(215003,'Int a las ciencias de la comput','CBI',9,NULL),(215102,'Redes de computadoras','CBI',12,NULL),(215103,'Sistemas distribuidos','CBI',12,NULL),(215104,'Computacion en paralelo','CBI',12,NULL),(215105,'Graficas por computadoras','CBI',9,NULL),(215106,'Ing de software','CBI',12,NULL),(215107,'Lenguajes de programacion','CBI',12,NULL),(215108,'T sel de bases de datos','CBI',12,NULL),(215109,'Sociedad y las c de la comp','CBI',9,NULL),(215111,'Programacion de sistemas 1','CBI',9,NULL),(215114,'Redes de telecomunicaciones','CBI',9,NULL),(221175,'Administracion general','CSH',9,0),(221176,'Historia general de la empresa y sociedad org','CSH',8,0),(221177,'Modelacion cuantitativa en las organizaciones','CSH',9,0),(221178,'Teoria administrativa','CSH',9,0),(221179,'Organizacion del trabajo y comportamiento hum','CSH',8,0),(221180,'Modelacion cuantitativa en las organizaciones','CSH',9,0),(221181,'Teoria de la organizacion','CSH',8,0),(221182,'Sociedad de consumo, desarrollo tecnologico y','CSH',8,0),(221183,'Informacion financiera','CSH',9,0),(221185,'Comportamiento en las organizaciones','CSH',9,0),(221186,'Accion estatal y gestion social','CSH',8,0),(221187,'Contabilidad administrativa','CSH',9,0),(221188,'Informatica','CSH',8,0),(221189,'Direccion y administracion de personal','CSH',9,0),(221190,'Etica y responsabilidad social','CSH',8,0),(221191,'Fundamentos de politica economica','CSH',8,0),(221192,'Analisis de decisiones','CSH',8,0),(221193,'Marketing 1','CSH',9,0),(221194,'Gestion y control estrategicos 1','CSH',8,0),(221195,'Administracion financiera 1','CSH',9,0),(221196,'Marketing 2','CSH',9,0),(221197,'Gestion y control estrategicos 2','CSH',9,0),(221198,'Administracion de operaciones','CSH',8,0),(221199,'Administracion financiera 2','CSH',9,0),(221200,'Problemas filosoficos y civilizacion occident','CSH',8,0),(221201,'Derecho 1','CSH',8,0),(221202,'Derecho 2','CSH',8,0),(222222,'Optativa','CBI',9,NULL),(224188,'Introduccion a la microeconomia','CSH',8,0),(225035,'Teoria y problemas sociopoliticos contemporan','CSH',8,0),(225036,'Historia contemporanea de Mexico','CSH',8,0),(225037,'Argumentacion y conocimiento','CSH',8,0),(225564,'Ingles intermedio 1','CSH',10,0),(225565,'Ingles intermedio 2','CSH',10,0),(225566,'Ingles intermedio 3','CSH',10,0),(230025,'Bioquímica 2','CBS',14,0),(230026,'Bioquimica 3','CBS',14,0),(230027,'Biologia celular','CBS',11,0),(230028,'Biologia general','CBS',12,0),(230029,'Quimica general','CBS',14,0),(230030,'Introduccion a la computacion','CBS',6,0),(230031,'Quimica organica I','CBS',15,0),(230032,'Bioquimica 1','CBS',14,0),(231170,'Seminario de investigacion 1','CBS',11,0),(231171,'Seminario de investigacion 2','CBS',11,0),(231172,'Seminario de investigacion 3','CBS',11,0),(231173,'Biometria 1','CBS',10,0),(231174,'Biometria 2','CBS',11,0),(231175,'Botanica 2','CBS',11,0),(231176,'Botanica 3','CBS',11,0),(231177,'Micologia','CBS',11,0),(231178,'Zoologia 4','CBS',11,0),(231179,'Tipos de vegetacion en Mexico','CBS',8,0),(231180,'Biologia tisular','CBS',11,0),(231181,'Zoogeografia de Mexico','CBS',8,0),(231183,'Sistematica','CBS',11,0),(231184,'Bioconservacion','CBS',8,0),(231202,'Ecologia 1','CBS',10,0),(231203,'Fitogeografia de Mexico','CBS',8,0),(231211,'Zoologia 1','CBS',11,0),(231212,'Botanica 1','CBS',11,0),(231221,'Paleontologia','CBS',11,0),(231222,'Anatomia comparativa de vertebrados','CBS',11,0),(231223,'Anatomia vegetal','CBS',11,0),(231224,'Biogeografia','CBS',8,0),(231226,'Climatologia','CBS',7,0),(231228,'Fisiologia vegeta','CBS',11,0),(231232,'Edafologia','CBS',11,0),(231236,'Manejo de Ecosistemas','CBS',11,0),(231239,'Fisiologia de vertebrados','CBS',11,0),(231240,'Zoologia 2','CBS',11,0),(231241,'Zoologia 3','CBS',11,0),(231243,'Ecologia 2 poblaciones','CBS',11,0),(231244,'Ecologia 3 comunidades','CBS',11,0),(231246,'Evolucion','CBS',12,0),(234121,'Genetica general','CBS',11,0),(235133,'Geologia','CBS',11,0),(333333,'Optativa','CBI',9,NULL),(444444,'Optativa','CBI',9,NULL),(555555,'Optativa','CBI',9,NULL);
/*!40000 ALTER TABLE `ueas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ueas_cursadas`
--

DROP TABLE IF EXISTS `ueas_cursadas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ueas_cursadas` (
  `alumnos_matricula` int(11) NOT NULL,
  `iduea` int(11) NOT NULL,
  PRIMARY KEY (`alumnos_matricula`,`iduea`),
  KEY `fk_ueas_has_alumnos_alumnos1` (`alumnos_matricula`),
  CONSTRAINT `fk_ueas_has_alumnos_alumnos1` FOREIGN KEY (`alumnos_matricula`) REFERENCES `alumnos` (`matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ueas_cursadas`
--

LOCK TABLES `ueas_cursadas` WRITE;
/*!40000 ALTER TABLE `ueas_cursadas` DISABLE KEYS */;
INSERT INTO `ueas_cursadas` VALUES (207310034,211013),(207310034,213038),(207341483,210001),(207341483,213038),(207341483,215003);
/*!40000 ALTER TABLE `ueas_cursadas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ueas_licenciaturas`
--

DROP TABLE IF EXISTS `ueas_licenciaturas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ueas_licenciaturas` (
  `ueas_idueas` int(11) NOT NULL,
  `licenciaturas_idlicenciaturas` int(11) NOT NULL,
  `trimestre` int(11) NOT NULL,
  PRIMARY KEY (`ueas_idueas`,`licenciaturas_idlicenciaturas`),
  KEY `fk_ueas_licenciaturas_ueas1_idx` (`ueas_idueas`),
  KEY `fk_ueas_licenciaturas_licenciaturas1` (`licenciaturas_idlicenciaturas`),
  CONSTRAINT `fk_ueas_licenciaturas_licenciaturas1` FOREIGN KEY (`licenciaturas_idlicenciaturas`) REFERENCES `licenciaturas` (`idlicenciaturas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ueas_licenciaturas_ueas1` FOREIGN KEY (`ueas_idueas`) REFERENCES `ueas` (`idueas`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ueas_licenciaturas`
--

LOCK TABLES `ueas_licenciaturas` WRITE;
/*!40000 ALTER TABLE `ueas_licenciaturas` DISABLE KEYS */;
INSERT INTO `ueas_licenciaturas` VALUES (101,6,10),(102,6,10),(103,6,10),(104,6,10),(111,6,11),(112,6,11),(113,6,11),(114,6,11),(121,6,12),(122,6,12),(123,6,12),(124,6,12),(181,6,8),(182,6,8),(183,6,8),(184,6,8),(191,6,9),(192,6,9),(193,6,9),(194,6,9),(251,5,10),(252,5,11),(253,5,12),(281,6,8),(291,6,9),(301,6,10),(312,6,11),(323,6,12),(111111,1,3),(210001,1,2),(211012,5,2),(211013,1,1),(211014,1,2),(212208,1,7),(212321,1,9),(212352,1,8),(212353,1,10),(212354,1,10),(212355,1,9),(212410,1,8),(212412,1,9),(212413,1,9),(212427,1,4),(212444,1,6),(213024,5,2),(213025,5,3),(213032,1,3),(213033,5,1),(213035,1,3),(213038,1,1),(213039,1,2),(213040,1,4),(213104,1,6),(213141,1,8),(213191,1,5),(213193,1,6),(213194,1,7),(213196,1,5),(213197,1,11),(213198,1,12),(213221,1,5),(213228,1,8),(213230,1,7),(213244,6,4),(213250,1,9),(213251,1,10),(213252,1,12),(213256,1,5),(213274,1,4),(214009,1,3),(215003,1,1),(215102,1,11),(215103,1,11),(215104,1,11),(215105,1,8),(215106,1,11),(215107,1,7),(215108,1,10),(215109,1,2),(215111,1,7),(215114,1,10),(221175,6,1),(221176,6,1),(221177,6,2),(221178,6,2),(221179,6,2),(221180,6,3),(221181,6,3),(221182,6,3),(221183,6,3),(221185,6,4),(221186,6,4),(221187,6,4),(221188,6,1),(221189,6,5),(221190,6,5),(221191,6,5),(221192,6,5),(221193,6,6),(221194,6,6),(221195,6,6),(221196,6,7),(221197,6,7),(221198,6,7),(221199,6,7),(221200,6,7),(221201,6,1),(221202,6,6),(222222,1,4),(224188,6,2),(225035,6,1),(225036,6,2),(225037,6,3),(225564,6,4),(225565,6,5),(225566,6,6),(230025,5,3),(230026,5,4),(230027,5,3),(230028,5,1),(230029,5,1),(230030,5,1),(230031,5,2),(230032,5,2),(231170,5,10),(231171,5,11),(231172,5,12),(231173,5,4),(231174,5,5),(231175,5,5),(231176,5,6),(231177,5,6),(231178,5,7),(231179,5,7),(231180,5,8),(231181,5,11),(231183,5,9),(231184,5,12),(231202,5,9),(231203,5,10),(231211,5,4),(231212,5,4),(231221,5,8),(231222,5,9),(231223,5,7),(231224,5,8),(231226,5,7),(231228,5,8),(231232,5,7),(231236,5,12),(231239,5,9),(231240,5,5),(231241,5,6),(231243,5,10),(231244,5,11),(231246,5,6),(234121,5,5),(235133,5,6),(333333,1,6),(444444,1,12),(555555,1,12);
/*!40000 ALTER TABLE `ueas_licenciaturas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-12-04 19:50:30
