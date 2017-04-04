-- MySQL dump 10.13  Distrib 5.7.17, for Linux (x86_64)
--
-- Host: localhost    Database: drogueria
-- ------------------------------------------------------
-- Server version	5.7.17-0ubuntu0.16.04.1

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
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rut` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dv` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion_factura` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion_despacho` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comuna_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_24292_comuna_comuna_id_cliente` (`comuna_id`),
  KEY `clientes_deleted_at_index` (`deleted_at`),
  CONSTRAINT `fk_24292_comuna_comuna_id_cliente` FOREIGN KEY (`comuna_id`) REFERENCES `comunas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,'69110100','2','ILUSTRE MUNICIPALIDAD DE MOLINA ','INDEPENDENCIA 1926','INDEPENDENCIA 1926',173,'2017-03-23 19:48:12','2017-03-23 19:48:12',NULL),(2,'69259900','4','MUNICIPALIDAD DE LOTA','Calle Hospital Nº 81, ex Hospital Enacar - Lota Al','Calle Hospital Nº 81, ex Hospital Enacar - Lota Al',224,'2017-03-23 19:48:33','2017-03-23 19:48:33',NULL),(3,'69201000','0','Ilustre Municipalidad de Rio Bueno','Ejercito Libertador 1500','Ejercito Libertador 1500',294,'2017-03-23 20:12:39','2017-03-23 20:12:39',NULL),(4,'76018992','8','Clínica Universitaria de Concepción S.A.','Avda Jorge Alessandri # 2047','Avda Jorge Alessandri # 2047',219,'2017-03-23 20:59:06','2017-03-23 20:59:06',NULL),(5,'70931900','0','CORP MUNICIPAL DE PUNTA ARENAS PARA LA EDUCACIÓN SALUD Y AT AL MENOR','JORGE MONTT # 890','VICENTE PÉREZ BARRÍA #0762',338,'2017-03-23 21:02:17','2017-03-23 21:02:17',NULL),(6,'61602220','2','Hospital Nacimiento','Julio Hemmelmann 711','Julio Hemmelmann 711',210,'2017-03-23 21:40:01','2017-03-23 21:40:01',NULL),(7,'61607306','0','Hospital Laja','Avenida Los Rios # 800','Avenida Los Rios # 800',207,'2017-03-23 21:49:07','2017-03-23 21:49:07',NULL),(8,'61602209','1','Hospital Arauco','Caupolican S/N','Caupolican S/N',197,'2017-03-23 21:50:18','2017-03-23 21:50:18',NULL),(9,'61607304','4','Hospital Santa Barbara','Salamanca s/n','Salamanca s/n',215,'2017-03-23 21:51:01','2017-03-23 21:51:01',NULL),(10,'61606700','1','SERVICIO SALUD ACONCAGUA','San José de las Hnas. Hospitalarias Nº151','San José de las Hnas. Hospitalarias Nº151',47,'2017-03-23 21:51:33','2017-03-23 21:51:33',NULL),(11,'69090200','1','Ilustre Municipalidad de Placilla','Almirante Latorre N° 2229','Almirante Latorre N° 2229',163,'2017-03-23 21:52:06','2017-03-23 21:52:06',NULL),(12,'69170202','2','Ilustre Municipalidad de Santa Barbara','Zenteno 328 Santa Bárbara','Zenteno 328 Santa Bárbara',215,'2017-03-23 21:53:07','2017-03-23 21:53:07',NULL),(13,'61607301','k','Complejo Asistencial Dr. Victor Ríos Ruíz','AVDA.RICARDO VICUÑA 147 Los Angeles','AVDA.RICARDO VICUÑA 147 Los Angeles',208,'2017-03-23 21:53:37','2017-03-23 21:53:37',NULL),(14,'76033408','1','VELCIA DEL CARMEN BRAVO ATENAS FARMACEUTICA E.I.R.L.','MIRAFLORES # 497','MIRAFLORES # 497',158,'2017-03-23 21:54:34','2017-03-23 21:54:34',NULL),(15,'61606407','k','Hospital de Illapel','Independencia 0512','Independencia 0512',31,'2017-03-23 21:55:09','2017-03-23 21:55:09',NULL),(16,'69180900','5','Ilustre Municipalidad de Victoria','Muñoz Vargas 730','Muñoz Vargas 730',282,'2017-03-23 21:55:41','2017-03-23 21:55:41',NULL),(17,'61975800','5','HOSPITAL ANCUD SERVICIO DE SALUD CHILOÉ','ALTO LATORRE # 301','ALTO LATORRE # 301',295,'2017-03-23 21:56:44','2017-03-23 21:56:44',NULL),(18,'69264800','5','MUNICIPALIDAD DE SAN PEDRO DE LA PAZ','DIAGONAL BIO BIO   145','DIAGONAL BIO BIO   145',226,'2017-03-23 21:57:20','2017-03-23 21:57:20',NULL);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comunas`
--

DROP TABLE IF EXISTS `comunas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comunas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provincia_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_24291_provincium_provincia_id_comuna` (`provincia_id`),
  KEY `comunas_deleted_at_index` (`deleted_at`),
  CONSTRAINT `fk_24291_provincium_provincia_id_comuna` FOREIGN KEY (`provincia_id`) REFERENCES `provincia` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=346 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comunas`
--

LOCK TABLES `comunas` WRITE;
/*!40000 ALTER TABLE `comunas` DISABLE KEYS */;
INSERT INTO `comunas` VALUES (1,'Arica',1,NULL,NULL,NULL),(2,'Camarones',1,NULL,NULL,NULL),(3,'General Lagos',2,NULL,NULL,NULL),(4,'Putre',2,NULL,NULL,NULL),(5,'Alto Hospicio',3,NULL,NULL,NULL),(6,'Iquique',3,NULL,NULL,NULL),(7,'Camiña',4,NULL,NULL,NULL),(8,'Colchane',4,NULL,NULL,NULL),(9,'Huara',4,NULL,NULL,NULL),(10,'Pica',4,NULL,NULL,NULL),(11,'Pozo Almonte',4,NULL,NULL,NULL),(12,'Antofagasta',5,NULL,NULL,NULL),(13,'Mejillones',5,NULL,NULL,NULL),(14,'Sierra Gorda',5,NULL,NULL,NULL),(15,'Taltal',5,NULL,NULL,NULL),(16,'Calama',6,NULL,NULL,NULL),(17,'Ollague',6,NULL,NULL,NULL),(18,'San Pedro de Atacama',6,NULL,NULL,NULL),(19,'María Elena',7,NULL,NULL,NULL),(20,'Tocopilla',7,NULL,NULL,NULL),(21,'Chañaral',8,NULL,NULL,NULL),(22,'Diego de Almagro',8,NULL,NULL,NULL),(23,'Caldera',9,NULL,NULL,NULL),(24,'Copiapó',9,NULL,NULL,NULL),(25,'Tierra Amarilla',9,NULL,NULL,NULL),(26,'Alto del Carmen',10,NULL,NULL,NULL),(27,'Freirina',10,NULL,NULL,NULL),(28,'Huasco',10,NULL,NULL,NULL),(29,'Vallenar',10,NULL,NULL,NULL),(30,'Canela',11,NULL,NULL,NULL),(31,'Illapel',11,NULL,NULL,NULL),(32,'Los Vilos',11,NULL,NULL,NULL),(33,'Salamanca',11,NULL,NULL,NULL),(34,'Andacollo',12,NULL,NULL,NULL),(35,'Coquimbo',12,NULL,NULL,NULL),(36,'La Higuera',12,NULL,NULL,NULL),(37,'La Serena',12,NULL,NULL,NULL),(38,'Paihuaco',12,NULL,NULL,NULL),(39,'Vicuña',12,NULL,NULL,NULL),(40,'Combarbalá',13,NULL,NULL,NULL),(41,'Monte Patria',13,NULL,NULL,NULL),(42,'Ovalle',13,NULL,NULL,NULL),(43,'Punitaqui',13,NULL,NULL,NULL),(44,'Río Hurtado',13,NULL,NULL,NULL),(45,'Isla de Pascua',14,NULL,NULL,NULL),(46,'Calle Larga',15,NULL,NULL,NULL),(47,'Los Andes',15,NULL,NULL,NULL),(48,'Rinconada',15,NULL,NULL,NULL),(49,'San Esteban',15,NULL,NULL,NULL),(50,'La Ligua',16,NULL,NULL,NULL),(51,'Papudo',16,NULL,NULL,NULL),(52,'Petorca',16,NULL,NULL,NULL),(53,'Zapallar',16,NULL,NULL,NULL),(54,'Hijuelas',17,NULL,NULL,NULL),(55,'La Calera',17,NULL,NULL,NULL),(56,'La Cruz',17,NULL,NULL,NULL),(57,'Limache',17,NULL,NULL,NULL),(58,'Nogales',17,NULL,NULL,NULL),(59,'Olmué',17,NULL,NULL,NULL),(60,'Quillota',17,NULL,NULL,NULL),(61,'Algarrobo',18,NULL,NULL,NULL),(62,'Cartagena',18,NULL,NULL,NULL),(63,'El Quisco',18,NULL,NULL,NULL),(64,'El Tabo',18,NULL,NULL,NULL),(65,'San Antonio',18,NULL,NULL,NULL),(66,'Santo Domingo',18,NULL,NULL,NULL),(67,'Catemu',19,NULL,NULL,NULL),(68,'Llay Llay',19,NULL,NULL,NULL),(69,'Panquehue',19,NULL,NULL,NULL),(70,'Putaendo',19,NULL,NULL,NULL),(71,'San Felipe',19,NULL,NULL,NULL),(72,'Santa María',19,NULL,NULL,NULL),(73,'Casablanca',20,NULL,NULL,NULL),(74,'Concón',20,NULL,NULL,NULL),(75,'Juan Fernández',20,NULL,NULL,NULL),(76,'Puchuncaví',20,NULL,NULL,NULL),(77,'Quilpué',20,NULL,NULL,NULL),(78,'Quintero',20,NULL,NULL,NULL),(79,'Valparaíso',20,NULL,NULL,NULL),(80,'Villa Alemana',20,NULL,NULL,NULL),(81,'Viña del Mar',20,NULL,NULL,NULL),(82,'Colina',21,NULL,NULL,NULL),(83,'Lampa',21,NULL,NULL,NULL),(84,'Tiltil',21,NULL,NULL,NULL),(85,'Pirque',22,NULL,NULL,NULL),(86,'Puente Alto',22,NULL,NULL,NULL),(87,'San José de Maipo',22,NULL,NULL,NULL),(88,'Buin',23,NULL,NULL,NULL),(89,'Calera de Tango',23,NULL,NULL,NULL),(90,'Paine',23,NULL,NULL,NULL),(91,'San Bernardo',23,NULL,NULL,NULL),(92,'Alhué',24,NULL,NULL,NULL),(93,'Curacaví',24,NULL,NULL,NULL),(94,'María Pinto',24,NULL,NULL,NULL),(95,'Melipilla',24,NULL,NULL,NULL),(96,'San Pedro',24,NULL,NULL,NULL),(97,'Cerrillos',25,NULL,NULL,NULL),(98,'Cerro Navia',25,NULL,NULL,NULL),(99,'Conchalí',25,NULL,NULL,NULL),(100,'El Bosque',25,NULL,NULL,NULL),(101,'Estación Central',25,NULL,NULL,NULL),(102,'Huechuraba',25,NULL,NULL,NULL),(103,'Independencia',25,NULL,NULL,NULL),(104,'La Cisterna',25,NULL,NULL,NULL),(105,'La Granja',25,NULL,NULL,NULL),(106,'La Florida',25,NULL,NULL,NULL),(107,'La Pintana',25,NULL,NULL,NULL),(108,'La Reina',25,NULL,NULL,NULL),(109,'Las Condes',25,NULL,NULL,NULL),(110,'Lo Barnechea',25,NULL,NULL,NULL),(111,'Lo Espejo',25,NULL,NULL,NULL),(112,'Lo Prado',25,NULL,NULL,NULL),(113,'Macul',25,NULL,NULL,NULL),(114,'Maipú',25,NULL,NULL,NULL),(115,'Ñuñoa',25,NULL,NULL,NULL),(116,'Pedro Aguirre Cerda',25,NULL,NULL,NULL),(117,'Peñalolén',25,NULL,NULL,NULL),(118,'Providencia',25,NULL,NULL,NULL),(119,'Pudahuel',25,NULL,NULL,NULL),(120,'Quilicura',25,NULL,NULL,NULL),(121,'Quinta Normal',25,NULL,NULL,NULL),(122,'Recoleta',25,NULL,NULL,NULL),(123,'Renca',25,NULL,NULL,NULL),(124,'San Miguel',25,NULL,NULL,NULL),(125,'San Joaquín',25,NULL,NULL,NULL),(126,'San Ramón',25,NULL,NULL,NULL),(127,'Santiago',25,NULL,NULL,NULL),(128,'Vitacura',25,NULL,NULL,NULL),(129,'El Monte',26,NULL,NULL,NULL),(130,'Isla de Maipo',26,NULL,NULL,NULL),(131,'Padre Hurtado',26,NULL,NULL,NULL),(132,'Peñaflor',26,NULL,NULL,NULL),(133,'Talagante',26,NULL,NULL,NULL),(134,'Codegua',27,NULL,NULL,NULL),(135,'Coínco',27,NULL,NULL,NULL),(136,'Coltauco',27,NULL,NULL,NULL),(137,'Doñihue',27,NULL,NULL,NULL),(138,'Graneros',27,NULL,NULL,NULL),(139,'Las Cabras',27,NULL,NULL,NULL),(140,'Machalí',27,NULL,NULL,NULL),(141,'Malloa',27,NULL,NULL,NULL),(142,'Mostazal',27,NULL,NULL,NULL),(143,'Olivar',27,NULL,NULL,NULL),(144,'Peumo',27,NULL,NULL,NULL),(145,'Pichidegua',27,NULL,NULL,NULL),(146,'Quinta de Tilcoco',27,NULL,NULL,NULL),(147,'Rancagua',27,NULL,NULL,NULL),(148,'Rengo',27,NULL,NULL,NULL),(149,'Requínoa',27,NULL,NULL,NULL),(150,'San Vicente de Tagua Tagua',27,NULL,NULL,NULL),(151,'La Estrella',28,NULL,NULL,NULL),(152,'Litueche',28,NULL,NULL,NULL),(153,'Marchihue',28,NULL,NULL,NULL),(154,'Navidad',28,NULL,NULL,NULL),(155,'Peredones',28,NULL,NULL,NULL),(156,'Pichilemu',28,NULL,NULL,NULL),(157,'Chépica',29,NULL,NULL,NULL),(158,'Chimbarongo',29,NULL,NULL,NULL),(159,'Lolol',29,NULL,NULL,NULL),(160,'Nancagua',29,NULL,NULL,NULL),(161,'Palmilla',29,NULL,NULL,NULL),(162,'Peralillo',29,NULL,NULL,NULL),(163,'Placilla',29,NULL,NULL,NULL),(164,'Pumanque',29,NULL,NULL,NULL),(165,'San Fernando',29,NULL,NULL,NULL),(166,'Santa Cruz',29,NULL,NULL,NULL),(167,'Cauquenes',30,NULL,NULL,NULL),(168,'Chanco',30,NULL,NULL,NULL),(169,'Pelluhue',30,NULL,NULL,NULL),(170,'Curicó',31,NULL,NULL,NULL),(171,'Hualañé',31,NULL,NULL,NULL),(172,'Licantén',31,NULL,NULL,NULL),(173,'Molina',31,NULL,NULL,NULL),(174,'Rauco',31,NULL,NULL,NULL),(175,'Romeral',31,NULL,NULL,NULL),(176,'Sagrada Familia',31,NULL,NULL,NULL),(177,'Teno',31,NULL,NULL,NULL),(178,'Vichuquén',31,NULL,NULL,NULL),(179,'Colbún',32,NULL,NULL,NULL),(180,'Linares',32,NULL,NULL,NULL),(181,'Longaví',32,NULL,NULL,NULL),(182,'Parral',32,NULL,NULL,NULL),(183,'Retiro',32,NULL,NULL,NULL),(184,'San Javier',32,NULL,NULL,NULL),(185,'Villa Alegre',32,NULL,NULL,NULL),(186,'Yerbas Buenas',32,NULL,NULL,NULL),(187,'Constitución',33,NULL,NULL,NULL),(188,'Curepto',33,NULL,NULL,NULL),(189,'Empedrado',33,NULL,NULL,NULL),(190,'Maule',33,NULL,NULL,NULL),(191,'Pelarco',33,NULL,NULL,NULL),(192,'Pencahue',33,NULL,NULL,NULL),(193,'Río Claro',33,NULL,NULL,NULL),(194,'San Clemente',33,NULL,NULL,NULL),(195,'San Rafael',33,NULL,NULL,NULL),(196,'Talca',33,NULL,NULL,NULL),(197,'Arauco',34,NULL,NULL,NULL),(198,'Cañete',34,NULL,NULL,NULL),(199,'Contulmo',34,NULL,NULL,NULL),(200,'Curanilahue',34,NULL,NULL,NULL),(201,'Lebu',34,NULL,NULL,NULL),(202,'Los Álamos',34,NULL,NULL,NULL),(203,'Tirúa',34,NULL,NULL,NULL),(204,'Alto Biobío',35,NULL,NULL,NULL),(205,'Antuco',35,NULL,NULL,NULL),(206,'Cabrero',35,NULL,NULL,NULL),(207,'Laja',35,NULL,NULL,NULL),(208,'Los Ángeles',35,NULL,NULL,NULL),(209,'Mulchén',35,NULL,NULL,NULL),(210,'Nacimiento',35,NULL,NULL,NULL),(211,'Negrete',35,NULL,NULL,NULL),(212,'Quilaco',35,NULL,NULL,NULL),(213,'Quilleco',35,NULL,NULL,NULL),(214,'San Rosendo',35,NULL,NULL,NULL),(215,'Santa Bárbara',35,NULL,NULL,NULL),(216,'Tucapel',35,NULL,NULL,NULL),(217,'Yumbel',35,NULL,NULL,NULL),(218,'Chiguayante',36,NULL,NULL,NULL),(219,'Concepción',36,NULL,NULL,NULL),(220,'Coronel',36,NULL,NULL,NULL),(221,'Florida',36,NULL,NULL,NULL),(222,'Hualpén',36,NULL,NULL,NULL),(223,'Hualqui',36,NULL,NULL,NULL),(224,'Lota',36,NULL,NULL,NULL),(225,'Penco',36,NULL,NULL,NULL),(226,'San Pedro de La Paz',36,NULL,NULL,NULL),(227,'Santa Juana',36,NULL,NULL,NULL),(228,'Talcahuano',36,NULL,NULL,NULL),(229,'Tomé',36,NULL,NULL,NULL),(230,'Bulnes',37,NULL,NULL,NULL),(231,'Chillán',37,NULL,NULL,NULL),(232,'Chillán Viejo',37,NULL,NULL,NULL),(233,'Cobquecura',37,NULL,NULL,NULL),(234,'Coelemu',37,NULL,NULL,NULL),(235,'Coihueco',37,NULL,NULL,NULL),(236,'El Carmen',37,NULL,NULL,NULL),(237,'Ninhue',37,NULL,NULL,NULL),(238,'Ñiquen',37,NULL,NULL,NULL),(239,'Pemuco',37,NULL,NULL,NULL),(240,'Pinto',37,NULL,NULL,NULL),(241,'Portezuelo',37,NULL,NULL,NULL),(242,'Quillón',37,NULL,NULL,NULL),(243,'Quirihue',37,NULL,NULL,NULL),(244,'Ránquil',37,NULL,NULL,NULL),(245,'San Carlos',37,NULL,NULL,NULL),(246,'San Fabián',37,NULL,NULL,NULL),(247,'San Ignacio',37,NULL,NULL,NULL),(248,'San Nicolás',37,NULL,NULL,NULL),(249,'Treguaco',37,NULL,NULL,NULL),(250,'Yungay',37,NULL,NULL,NULL),(251,'Carahue',38,NULL,NULL,NULL),(252,'Cholchol',38,NULL,NULL,NULL),(253,'Cunco',38,NULL,NULL,NULL),(254,'Curarrehue',38,NULL,NULL,NULL),(255,'Freire',38,NULL,NULL,NULL),(256,'Galvarino',38,NULL,NULL,NULL),(257,'Gorbea',38,NULL,NULL,NULL),(258,'Lautaro',38,NULL,NULL,NULL),(259,'Loncoche',38,NULL,NULL,NULL),(260,'Melipeuco',38,NULL,NULL,NULL),(261,'Nueva Imperial',38,NULL,NULL,NULL),(262,'Padre Las Casas',38,NULL,NULL,NULL),(263,'Perquenco',38,NULL,NULL,NULL),(264,'Pitrufquén',38,NULL,NULL,NULL),(265,'Pucón',38,NULL,NULL,NULL),(266,'Saavedra',38,NULL,NULL,NULL),(267,'Temuco',38,NULL,NULL,NULL),(268,'Teodoro Schmidt',38,NULL,NULL,NULL),(269,'Toltén',38,NULL,NULL,NULL),(270,'Vilcún',38,NULL,NULL,NULL),(271,'Villarrica',38,NULL,NULL,NULL),(272,'Angol',39,NULL,NULL,NULL),(273,'Collipulli',39,NULL,NULL,NULL),(274,'Curacautín',39,NULL,NULL,NULL),(275,'Ercilla',39,NULL,NULL,NULL),(276,'Lonquimay',39,NULL,NULL,NULL),(277,'Los Sauces',39,NULL,NULL,NULL),(278,'Lumaco',39,NULL,NULL,NULL),(279,'Purén',39,NULL,NULL,NULL),(280,'Renaico',39,NULL,NULL,NULL),(281,'Traiguén',39,NULL,NULL,NULL),(282,'Victoria',39,NULL,NULL,NULL),(283,'Corral',40,NULL,NULL,NULL),(284,'Lanco',40,NULL,NULL,NULL),(285,'Los Lagos',40,NULL,NULL,NULL),(286,'Máfil',40,NULL,NULL,NULL),(287,'Mariquina',40,NULL,NULL,NULL),(288,'Paillaco',40,NULL,NULL,NULL),(289,'Panguipulli',40,NULL,NULL,NULL),(290,'Valdivia',40,NULL,NULL,NULL),(291,'Futrono',41,NULL,NULL,NULL),(292,'La Unión',41,NULL,NULL,NULL),(293,'Lago Ranco',41,NULL,NULL,NULL),(294,'Río Bueno',41,NULL,NULL,NULL),(295,'Ancud',42,NULL,NULL,NULL),(296,'Castro',42,NULL,NULL,NULL),(297,'Chonchi',42,NULL,NULL,NULL),(298,'Curaco de Vélez',42,NULL,NULL,NULL),(299,'Dalcahue',42,NULL,NULL,NULL),(300,'Puqueldón',42,NULL,NULL,NULL),(301,'Queilén',42,NULL,NULL,NULL),(302,'Quemchi',42,NULL,NULL,NULL),(303,'Quellón',42,NULL,NULL,NULL),(304,'Quinchao',42,NULL,NULL,NULL),(305,'Calbuco',43,NULL,NULL,NULL),(306,'Cochamó',43,NULL,NULL,NULL),(307,'Fresia',43,NULL,NULL,NULL),(308,'Frutillar',43,NULL,NULL,NULL),(309,'Llanquihue',43,NULL,NULL,NULL),(310,'Los Muermos',43,NULL,NULL,NULL),(311,'Maullín',43,NULL,NULL,NULL),(312,'Puerto Montt',43,NULL,NULL,NULL),(313,'Puerto Varas',43,NULL,NULL,NULL),(314,'Osorno',44,NULL,NULL,NULL),(315,'Puero Octay',44,NULL,NULL,NULL),(316,'Purranque',44,NULL,NULL,NULL),(317,'Puyehue',44,NULL,NULL,NULL),(318,'Río Negro',44,NULL,NULL,NULL),(319,'San Juan de la Costa',44,NULL,NULL,NULL),(320,'San Pablo',44,NULL,NULL,NULL),(321,'Chaitén',45,NULL,NULL,NULL),(322,'Futaleufú',45,NULL,NULL,NULL),(323,'Hualaihué',45,NULL,NULL,NULL),(324,'Palena',45,NULL,NULL,NULL),(325,'Aisén',46,NULL,NULL,NULL),(326,'Cisnes',46,NULL,NULL,NULL),(327,'Guaitecas',46,NULL,NULL,NULL),(328,'Cochrane',47,NULL,NULL,NULL),(329,'O\'higgins',47,NULL,NULL,NULL),(330,'Tortel',47,NULL,NULL,NULL),(331,'Coihaique',48,NULL,NULL,NULL),(332,'Lago Verde',48,NULL,NULL,NULL),(333,'Chile Chico',49,NULL,NULL,NULL),(334,'Río Ibáñez',49,NULL,NULL,NULL),(335,'Antártica',50,NULL,NULL,NULL),(336,'Cabo de Hornos',50,NULL,NULL,NULL),(337,'Laguna Blanca',51,NULL,NULL,NULL),(338,'Punta Arenas',51,NULL,NULL,NULL),(339,'Río Verde',51,NULL,NULL,NULL),(340,'San Gregorio',51,NULL,NULL,NULL),(341,'Porvenir',52,NULL,NULL,NULL),(342,'Primavera',52,NULL,NULL,NULL),(343,'Timaukel',52,NULL,NULL,NULL),(344,'Natales',53,NULL,NULL,NULL),(345,'Torres del Paine',53,NULL,NULL,NULL);
/*!40000 ALTER TABLE `comunas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacto_clientes`
--

DROP TABLE IF EXISTS `contacto_clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacto_clientes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cliente_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_24299_cliente_cliente_id_contacto_cliente` (`cliente_id`),
  KEY `contacto_clientes_deleted_at_index` (`deleted_at`),
  CONSTRAINT `fk_24299_cliente_cliente_id_contacto_cliente` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacto_clientes`
--

LOCK TABLES `contacto_clientes` WRITE;
/*!40000 ALTER TABLE `contacto_clientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `contacto_clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacto_proveedors`
--

DROP TABLE IF EXISTS `contacto_proveedors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacto_proveedors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proveedor_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_24314_proveedor_proveedor_id_contacto_proveedor` (`proveedor_id`),
  KEY `contacto_proveedors_deleted_at_index` (`deleted_at`),
  CONSTRAINT `fk_24314_proveedor_proveedor_id_contacto_proveedor` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedors` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacto_proveedors`
--

LOCK TABLES `contacto_proveedors` WRITE;
/*!40000 ALTER TABLE `contacto_proveedors` DISABLE KEYS */;
/*!40000 ALTER TABLE `contacto_proveedors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facturas`
--

DROP TABLE IF EXISTS `facturas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facturas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `folio` int(11) DEFAULT NULL,
  `vendedor_id` int(10) unsigned DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `cliente_id` int(10) unsigned DEFAULT NULL,
  `producto_id` int(10) unsigned DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `precio` decimal(15,2) DEFAULT NULL,
  `condicion_pago` int(11) DEFAULT NULL,
  `estado_pago` tinyint(4) DEFAULT '1',
  `documento_valido` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_24289_user_vendedor_id_factura` (`vendedor_id`),
  KEY `fk_24299_cliente_cliente_id_factura` (`cliente_id`),
  KEY `fk_24334_producto_producto_id_factura` (`producto_id`),
  KEY `facturas_deleted_at_index` (`deleted_at`),
  CONSTRAINT `fk_24289_user_vendedor_id_factura` FOREIGN KEY (`vendedor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_24299_cliente_cliente_id_factura` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_24334_producto_producto_id_factura` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facturas`
--

LOCK TABLES `facturas` WRITE;
/*!40000 ALTER TABLE `facturas` DISABLE KEYS */;
/*!40000 ALTER TABLE `facturas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `itemsocs`
--

DROP TABLE IF EXISTS `itemsocs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `itemsocs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `folio_id` int(10) unsigned DEFAULT NULL,
  `producto_id` int(10) unsigned DEFAULT NULL,
  `presentancion_id` int(10) unsigned DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio_unidad` decimal(15,2) DEFAULT NULL,
  `observaciones` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_24885_proveedoroc_folio_id_itemsoc` (`folio_id`),
  KEY `fk_24334_producto_producto_id_itemsoc` (`producto_id`),
  KEY `fk_24333_presentacionfarmacologica_presentancion_i` (`presentancion_id`),
  KEY `itemsocs_deleted_at_index` (`deleted_at`),
  CONSTRAINT `fk_24333_presentacionfarmacologica_presentancion_i` FOREIGN KEY (`presentancion_id`) REFERENCES `presentacion_farmacologicas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_24334_producto_producto_id_itemsoc` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_24885_proveedoroc_folio_id_itemsoc` FOREIGN KEY (`folio_id`) REFERENCES `proveedorocs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `itemsocs`
--

LOCK TABLES `itemsocs` WRITE;
/*!40000 ALTER TABLE `itemsocs` DISABLE KEYS */;
INSERT INTO `itemsocs` VALUES (1,3,6,2,500,770.00,'','2017-04-04 00:49:04','2017-04-04 00:49:04',NULL);
/*!40000 ALTER TABLE `itemsocs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `laboratorios`
--

DROP TABLE IF EXISTS `laboratorios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `laboratorios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rut` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dv` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ciudad_id` int(10) unsigned DEFAULT NULL,
  `telefono` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_24292_comuna_ciudad_id_laboratorio` (`ciudad_id`),
  KEY `laboratorios_deleted_at_index` (`deleted_at`),
  CONSTRAINT `fk_24292_comuna_ciudad_id_laboratorio` FOREIGN KEY (`ciudad_id`) REFERENCES `comunas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laboratorios`
--

LOCK TABLES `laboratorios` WRITE;
/*!40000 ALTER TABLE `laboratorios` DISABLE KEYS */;
/*!40000 ALTER TABLE `laboratorios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_100000_create_password_resets_table',1),(2,'2017_03_22_183126_create_roles_table',1),(3,'2017_03_22_183127_create_users_table',1),(4,'2017_03_22_183458_update_1490207698_users_table',1),(5,'2017_03_22_183835_update_1490207915_users_table',1),(6,'2017_03_22_184302_create_regions_table',1),(7,'2017_03_22_184626_create_provincias_table',1),(8,'2017_03_22_184844_create_comunas_table',1),(9,'2017_03_22_192513_create_clientes_table',1),(10,'2017_03_22_194951_create_contacto_clientes_table',1),(11,'2017_03_22_195530_create_proveedors_table',1),(12,'2017_03_22_200310_create_contacto_proveedors_table',1),(13,'2017_03_22_202154_create_laboratorios_table',1),(14,'2017_03_22_203252_create_modo_usos_table',1),(15,'2017_03_22_203653_create_presentacion_farmacologicas_table',1),(16,'2017_03_22_204028_create_productos_table',1),(17,'2017_03_22_204337_update_1490215417_productos_table',1),(18,'2017_03_22_204511_update_1490215511_productos_table',1),(19,'2017_03_22_205102_create_facturas_table',1),(20,'2017_03_22_205849_update_1490216329_facturas_table',1),(21,'2017_03_23_195209_update_1490298729_productos_table',2),(22,'2017_03_24_174429_create_proveedorocs_table',3),(23,'2017_03_24_185303_create_itemsocs_table',4),(24,'2017_03_24_185555_update_1490381755_proveedorocs_table',5),(25,'2017_03_24_193457_create_recepcionmercaderias_table',6),(26,'2017_03_24_194220_update_1490384540_recepcionmercaderias_table',7);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modo_usos`
--

DROP TABLE IF EXISTS `modo_usos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modo_usos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uso` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `modo_usos_deleted_at_index` (`deleted_at`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modo_usos`
--

LOCK TABLES `modo_usos` WRITE;
/*!40000 ALTER TABLE `modo_usos` DISABLE KEYS */;
INSERT INTO `modo_usos` VALUES (1,'GEL ORAL','2017-03-23 22:03:20','2017-03-23 22:03:20',NULL),(2,'GTS ÓTICAS','2017-03-23 22:03:36','2017-03-23 22:03:36',NULL);
/*!40000 ALTER TABLE `modo_usos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES ('admin@admin.com','$2y$10$yRNcjWo2Wt2fGaSydGr2OOawZ8S.eQEF0pah4uMpapQ0DiodbTPH.','2017-03-23 01:02:41');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `presentacion_farmacologicas`
--

DROP TABLE IF EXISTS `presentacion_farmacologicas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `presentacion_farmacologicas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_corto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `presentacion_farmacologicas_deleted_at_index` (`deleted_at`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `presentacion_farmacologicas`
--

LOCK TABLES `presentacion_farmacologicas` WRITE;
/*!40000 ALTER TABLE `presentacion_farmacologicas` DISABLE KEYS */;
INSERT INTO `presentacion_farmacologicas` VALUES (1,'sobre','sob','2017-03-23 22:04:49','2017-03-23 22:04:49',NULL),(2,'frasco','fco','2017-03-23 22:05:02','2017-03-23 22:05:02',NULL),(3,'ampolla','amp','2017-03-23 22:05:26','2017-03-23 22:05:26',NULL),(4,'cápsula','cap','2017-03-23 22:05:37','2017-03-23 22:05:37',NULL),(5,'comprimido','comp','2017-03-23 22:05:50','2017-03-23 23:15:54',NULL),(6,'unidad','und','2017-03-23 22:06:23','2017-03-23 22:06:23',NULL),(7,'pomo','pomo','2017-03-23 22:06:45','2017-03-23 22:06:45',NULL),(8,'comprimido recubierto','cmpr','2017-03-23 22:07:21','2017-03-23 22:07:21',NULL),(9,'caja','caja','2017-03-23 22:07:27','2017-03-23 22:07:27',NULL);
/*!40000 ALTER TABLE `presentacion_farmacologicas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `precio_bodega` decimal(15,2) DEFAULT NULL,
  `concentracion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `laboratorio_id` int(10) unsigned DEFAULT NULL,
  `presentacion_id` int(10) unsigned DEFAULT NULL,
  `modo_uso_id` int(10) unsigned DEFAULT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unidad_envase` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `productos_deleted_at_index` (`deleted_at`),
  KEY `fk_24328_laboratorio_laboratorio_id_producto` (`laboratorio_id`),
  KEY `fk_24333_presentacionfarmacologica_presentacion_id` (`presentacion_id`),
  KEY `fk_24332_modouso_modo_uso_id_producto` (`modo_uso_id`),
  CONSTRAINT `fk_24328_laboratorio_laboratorio_id_producto` FOREIGN KEY (`laboratorio_id`) REFERENCES `laboratorios` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_24332_modouso_modo_uso_id_producto` FOREIGN KEY (`modo_uso_id`) REFERENCES `modo_usos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_24333_presentacionfarmacologica_presentacion_id` FOREIGN KEY (`presentacion_id`) REFERENCES `presentacion_farmacologicas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,475.00,'250mg','2017-03-23 22:59:03','2017-03-23 23:04:25',NULL,NULL,4,NULL,'bioflora',6),(2,2900.00,'2%','2017-03-23 23:00:04','2017-03-23 23:00:04',NULL,NULL,2,1,'dimecaina',1),(3,310.00,'90','2017-03-23 23:04:01','2017-03-23 23:04:01',NULL,NULL,1,NULL,'T.R.O.',10),(4,12000.00,'','2017-03-23 23:05:05','2017-03-23 23:05:05',NULL,NULL,2,2,'Ciprodex',1),(5,430.00,'100mg','2017-03-23 23:06:05','2017-03-23 23:06:05',NULL,NULL,3,NULL,'Ketoprofeno',6),(6,39.00,'30mg','2017-03-23 23:10:52','2017-03-23 23:10:52',NULL,NULL,4,NULL,'polivitaminico',30),(7,12.60,'20mg','2017-03-23 23:11:26','2017-03-23 23:11:26',NULL,NULL,5,NULL,'lovastatina',1046),(8,8.90,'40 mg','2017-03-23 23:11:54','2017-03-23 23:11:54',NULL,NULL,5,NULL,'propanolol',1000),(9,20.00,'0,25 mg','2017-03-23 23:13:35','2017-03-23 23:13:35',NULL,NULL,5,NULL,'digoxina',1000),(10,25900.00,'500mg/5ml','2017-03-23 23:14:23','2017-03-23 23:14:23',NULL,NULL,2,NULL,'adroxef',1),(11,4.50,'4 mg','2017-03-23 23:14:54','2017-03-23 23:14:54',NULL,NULL,5,NULL,'clorfenamina',997),(12,1029.00,'800mg','2017-03-23 23:15:23','2017-03-23 23:15:34',NULL,NULL,5,NULL,'eurovir',NULL),(13,245.00,'25mg/2ml','2017-03-23 23:16:45','2017-03-23 23:16:45',NULL,NULL,3,NULL,'clorpromazina',NULL),(14,12.00,'10mg','2017-03-23 23:17:44','2017-03-23 23:17:44',NULL,NULL,5,NULL,'isosorbide',1000),(15,390.00,'50 mg','2017-03-23 23:18:35','2017-03-23 23:18:35',NULL,NULL,5,NULL,'azatioprina',100),(16,39.00,'160/800','2017-03-23 23:20:45','2017-03-23 23:20:45',NULL,NULL,5,NULL,'cotrimoxazol forte',NULL),(17,495.00,'100 mg','2017-03-23 23:22:11','2017-03-23 23:22:11',NULL,NULL,5,NULL,'largactil',19),(18,260.00,'10gr','2017-03-23 23:28:08','2017-03-23 23:28:08',NULL,NULL,6,NULL,'carbón activado',NULL),(19,64.67,'3 mg','2017-03-23 23:29:20','2017-03-23 23:29:20',NULL,NULL,4,NULL,'melatonina',30),(20,11.00,'1 mg','2017-03-23 23:30:15','2017-03-23 23:30:15',NULL,NULL,5,NULL,'folacid',1000),(21,30.00,'7,5 mg','2017-03-23 23:30:55','2017-03-23 23:30:55',NULL,NULL,8,NULL,'zoperil',30),(22,500.00,'250 mg','2017-03-23 23:31:23','2017-03-23 23:31:23',NULL,NULL,4,NULL,'elixine',20),(23,17350.00,'5 ml','2017-03-23 23:33:46','2017-03-23 23:33:46',NULL,NULL,2,NULL,'micopirox 8%',1),(24,175.00,'','2017-03-23 23:34:32','2017-03-23 23:34:32',NULL,NULL,4,NULL,'ferranem',30),(25,825.00,'','2017-03-23 23:36:37','2017-03-23 23:36:37',NULL,NULL,7,NULL,'bengue',1);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedorocs`
--

DROP TABLE IF EXISTS `proveedorocs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proveedorocs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `folio` int(11) DEFAULT NULL,
  `proveedor_id` int(10) unsigned DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `observaciones` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `fk_24314_proveedor_proveedor_id_proveedoroc` (`proveedor_id`),
  KEY `proveedorocs_deleted_at_index` (`deleted_at`),
  CONSTRAINT `fk_24314_proveedor_proveedor_id_proveedoroc` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedors` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedorocs`
--

LOCK TABLES `proveedorocs` WRITE;
/*!40000 ALTER TABLE `proveedorocs` DISABLE KEYS */;
INSERT INTO `proveedorocs` VALUES (1,1,10,'2017-03-24','2017-03-24 21:54:22','2017-03-24 21:57:29',NULL,'Pedido para abastecer bla bla bla!'),(2,2,2,'2017-04-03','2017-04-03 23:00:42','2017-04-03 23:00:42',NULL,'Pedido solicitado a vender Juanito Pérez '),(3,3,9,'2017-04-03','2017-04-03 23:14:17','2017-04-03 23:14:17',NULL,'Compra de 3000 polivitaminicos, pago 60 dias.'),(4,4,8,'2017-04-04','2017-04-04 00:20:10','2017-04-04 00:20:10',NULL,'Una observación');
/*!40000 ALTER TABLE `proveedorocs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedors`
--

DROP TABLE IF EXISTS `proveedors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proveedors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rut` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dv` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comuna_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_24292_comuna_comuna_id_proveedor` (`comuna_id`),
  KEY `proveedors_deleted_at_index` (`deleted_at`),
  CONSTRAINT `fk_24292_comuna_comuna_id_proveedor` FOREIGN KEY (`comuna_id`) REFERENCES `comunas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedors`
--

LOCK TABLES `proveedors` WRITE;
/*!40000 ALTER TABLE `proveedors` DISABLE KEYS */;
INSERT INTO `proveedors` VALUES (1,'chemopharma S.A.','96026000','7','av américo vespucio # 01260','+56 2 24446600','chemopharma@chemofarma.cl',120,'2017-03-24 18:56:29','2017-03-24 18:56:29',NULL),(2,'instituto sanitas s.a.','90073000','4','av américo vespucio # 01260','+56 2 24446600','sanitas@sanitas.cl',120,'2017-03-24 18:59:06','2017-03-24 18:59:06',NULL),(3,'drogueria global pharma spa','76389383','9','av las américas # 173','+56 2 28384400','',97,'2017-03-24 19:01:21','2017-03-24 19:01:21',NULL),(4,'farmacéutica caribean ltda','76830090','9','américo vespucio # 1385, módulo 7','+56 2 26639300','contacto@caribeanpharma.cl',120,'2017-03-24 19:02:49','2017-03-24 19:02:49',NULL),(5,'opko chile s.a.','76669630','9','agustinas # 640, piso 10','+56 2 27130700','',127,'2017-03-24 19:05:04','2017-03-24 19:05:04',NULL),(6,'farmacéutica insuval s.a.','77768990','8','caupolicán # 1281','+56 41 2185520','info@insuval.cl',219,'2017-03-24 19:06:36','2017-03-24 19:06:36',NULL),(7,'labofar e.i.r.l.','76174812','2','av santa teresa # 899','+56 34 2460336','',47,'2017-03-24 19:13:59','2017-03-24 19:13:59',NULL),(8,'laboratorios saval s.a.','91650000','9','av presidente eduardo frei montalva # 4600','+56 2 7073000','lab@saval.cl',123,'2017-03-24 19:15:07','2017-03-24 19:15:07',NULL),(9,'sercofar s.a.','76630750','7','san francisco # 1599','+56 2 5568223','',127,'2017-03-24 19:15:54','2017-03-24 19:15:54',NULL),(10,'bayer s.a.','91537000','4','av andres bello # 2457, piso 27, of 2101','+56 2 25208200','',127,'2017-03-24 19:16:57','2017-03-24 19:16:57',NULL),(11,'droguería farma central spa.','76330149','4','av la montana # 1571','+56 2 26981958','facturacion@farmacentral.cl',83,'2017-03-24 19:18:29','2017-03-24 19:18:29',NULL),(12,'medbiotec spa.','76280494','8','av santa teresa # 899','+56 34 2460336','contacto@medbiotec.cl',47,'2017-03-24 19:26:17','2017-03-24 19:26:17',NULL),(13,'farmaceutica novasur ltda','76192826','0','vergara # 55','+56 45 2990554','',272,'2017-03-24 19:32:46','2017-03-24 19:32:46',NULL);
/*!40000 ALTER TABLE `proveedors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provincia`
--

DROP TABLE IF EXISTS `provincia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provincia` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_24290_region_region_id_provincium` (`region_id`),
  KEY `provincias_deleted_at_index` (`deleted_at`),
  CONSTRAINT `fk_24290_region_region_id_provincium` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provincia`
--

LOCK TABLES `provincia` WRITE;
/*!40000 ALTER TABLE `provincia` DISABLE KEYS */;
INSERT INTO `provincia` VALUES (1,'Arica',1,NULL,NULL,NULL),(2,'Parinacota',1,NULL,NULL,NULL),(3,'Iquique',2,NULL,NULL,NULL),(4,'El Tamarugal',2,NULL,NULL,NULL),(5,'Antofagasta',3,NULL,NULL,NULL),(6,'El Loa',3,NULL,NULL,NULL),(7,'Tocopilla',3,NULL,NULL,NULL),(8,'Chañaral',4,NULL,NULL,NULL),(9,'Copiapó',4,NULL,NULL,NULL),(10,'Huasco',4,NULL,NULL,NULL),(11,'Choapa',5,NULL,NULL,NULL),(12,'Elqui',5,NULL,NULL,NULL),(13,'Limarí',5,NULL,NULL,NULL),(14,'Isla de Pascua',6,NULL,NULL,NULL),(15,'Los Andes',6,NULL,NULL,NULL),(16,'Petorca',6,NULL,NULL,NULL),(17,'Quillota',6,NULL,NULL,NULL),(18,'San Antonio',6,NULL,NULL,NULL),(19,'San Felipe de Aconcagua',6,NULL,NULL,NULL),(20,'Valparaiso',6,NULL,NULL,NULL),(21,'Chacabuco',7,NULL,NULL,NULL),(22,'Cordillera',7,NULL,NULL,NULL),(23,'Maipo',7,NULL,NULL,NULL),(24,'Melipilla',7,NULL,NULL,NULL),(25,'Santiago',7,NULL,NULL,NULL),(26,'Talagante',7,NULL,NULL,NULL),(27,'Cachapoal',8,NULL,NULL,NULL),(28,'Cardenal Caro',8,NULL,NULL,NULL),(29,'Colchagua',8,NULL,NULL,NULL),(30,'Cauquenes',9,NULL,NULL,NULL),(31,'Curicó',9,NULL,NULL,NULL),(32,'Linares',9,NULL,NULL,NULL),(33,'Talca',9,NULL,NULL,NULL),(34,'Arauco',10,NULL,NULL,NULL),(35,'Bio Bío',10,NULL,NULL,NULL),(36,'Concepción',10,NULL,NULL,NULL),(37,'Ñuble',10,NULL,NULL,NULL),(38,'Cautín',11,NULL,NULL,NULL),(39,'Malleco',11,NULL,NULL,NULL),(40,'Valdivia',12,NULL,NULL,NULL),(41,'Ranco',12,NULL,NULL,NULL),(42,'Chiloé',13,NULL,NULL,NULL),(43,'Llanquihue',13,NULL,NULL,NULL),(44,'Osorno',13,NULL,NULL,NULL),(45,'Palena',13,NULL,NULL,NULL),(46,'Aisén',14,NULL,NULL,NULL),(47,'Capitán Prat',14,NULL,NULL,NULL),(48,'Coihaique',14,NULL,NULL,NULL),(49,'General Carrera',14,NULL,NULL,NULL),(50,'Antártica Chilena',15,NULL,NULL,NULL),(51,'Magallanes',15,NULL,NULL,NULL),(52,'Tierra del Fuego',15,NULL,NULL,NULL),(53,'Última Esperanza',15,NULL,NULL,NULL);
/*!40000 ALTER TABLE `provincia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recepcionmercaderias`
--

DROP TABLE IF EXISTS `recepcionmercaderias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recepcionmercaderias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `proveedor_id` int(10) unsigned DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `producto_id` int(10) unsigned DEFAULT NULL,
  `lote` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_vencimiento` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_24885_proveedoroc_proveedor_id_recepcionmercade` (`proveedor_id`),
  KEY `fk_24334_producto_producto_id_recepcionmercaderium` (`producto_id`),
  KEY `recepcionmercaderias_deleted_at_index` (`deleted_at`),
  CONSTRAINT `fk_24334_producto_producto_id_recepcionmercaderium` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_24885_proveedoroc_proveedor_id_recepcionmercade` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedorocs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recepcionmercaderias`
--

LOCK TABLES `recepcionmercaderias` WRITE;
/*!40000 ALTER TABLE `recepcionmercaderias` DISABLE KEYS */;
INSERT INTO `recepcionmercaderias` VALUES (1,3,'2017-04-04',6,'l3784','23/2018','2017-04-04 00:50:13','2017-04-04 00:50:13',NULL,500);
/*!40000 ALTER TABLE `recepcionmercaderias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `regions`
--

DROP TABLE IF EXISTS `regions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `regions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ordinal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `regions_deleted_at_index` (`deleted_at`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regions`
--

LOCK TABLES `regions` WRITE;
/*!40000 ALTER TABLE `regions` DISABLE KEYS */;
INSERT INTO `regions` VALUES (1,'Arica y Parinacota','XV',NULL,NULL,NULL),(2,'Tarapacá','I',NULL,NULL,NULL),(3,'Antofagasta','II',NULL,NULL,NULL),(4,'Atacama','III',NULL,NULL,NULL),(5,'Coquimbo','IV',NULL,NULL,NULL),(6,'Valparaiso','V',NULL,NULL,NULL),(7,'Metropolitana de Santiago','RM',NULL,NULL,NULL),(8,'Libertador General Bernardo O\'Higgins','VI',NULL,NULL,NULL),(9,'Maule','VII',NULL,NULL,NULL),(10,'Biobío','VIII',NULL,NULL,NULL),(11,'La Araucanía','IX',NULL,NULL,NULL),(12,'Los Ríos','XIV',NULL,NULL,NULL),(13,'Los Lagos','X',NULL,NULL,NULL),(14,'Aisén del General Carlos Ibáñez del Campo','XI',NULL,NULL,NULL),(15,'Magallanes y de la Antártica Chilena','XII',NULL,NULL,NULL);
/*!40000 ALTER TABLE `regions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Administrador (puede crear otros usuarios)','2017-03-23 00:59:26','2017-03-23 00:59:26'),(3,'Vendedor','2017-03-23 00:59:26','2017-03-23 00:59:26'),(4,'Finanzas','2017-03-23 00:59:26','2017-03-23 00:59:26'),(5,'Bodega','2017-03-23 00:59:26','2017-03-23 00:59:26');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) unsigned DEFAULT NULL,
  `remember_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rut` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dv` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cuenta_banco` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cuenta_tipo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_24288_role_role_id_user` (`role_id`),
  CONSTRAINT `fk_24288_role_role_id_user` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Jonathan Isla','jisla@drogueriaconcepcion.cl','$2y$10$S9BsfS9mGQhLMWwQMlWOMeoL9XI0.nCrJfOME3KNvb/cDdmX6d02O',1,'5qF87yCqoeiioGkpMjMcuuWIkNq6UJFeZqvcW1GhYR29WtmPvgREiqZbKjvV','2017-03-23 00:59:26','2017-03-23 01:06:12','16760351','3','16760351','Cuenta Rut'),(2,'Verónica Sepúlveda','vsepulveda@drogueriaconcepcion.cl','$2y$10$l66UAi8RSHD09fKI1107x.a89Db2/Iy732atFYdt7UFv9B2cF6GXK',4,NULL,'2017-03-23 22:00:14','2017-03-23 22:00:14','9518909','1','9518909','Cuenta Rut');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-04 11:32:16
