-- MariaDB dump 10.19  Distrib 10.6.12-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: produccion_aluxsa
-- ------------------------------------------------------
-- Server version	10.6.12-MariaDB-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `aluminio_utilizado`
--

DROP TABLE IF EXISTS `aluminio_utilizado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aluminio_utilizado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Aluminio_kg` float NOT NULL COMMENT 'Aluminio a producir',
  `Fecha` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aluminio_utilizado`
--

LOCK TABLES `aluminio_utilizado` WRITE;
/*!40000 ALTER TABLE `aluminio_utilizado` DISABLE KEYS */;
/*!40000 ALTER TABLE `aluminio_utilizado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consumos`
--

DROP TABLE IF EXISTS `consumos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consumos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `concepto` varchar(20) NOT NULL,
  `cantidad` float NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consumos`
--

LOCK TABLES `consumos` WRITE;
/*!40000 ALTER TABLE `consumos` DISABLE KEYS */;
INSERT INTO `consumos` VALUES (1,'Fundente',2,'2023-03-01'),(2,'Silicio',15,'2023-03-01'),(3,'Clavos',20,'2023-03-01'),(6,'Fundente',45,'2023-03-06'),(7,'Silicio',16,'2023-03-06'),(9,'Silicio',23,'2023-03-07'),(10,'Guante Calcetin',2,'2023-03-16');
/*!40000 ALTER TABLE `consumos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `costos_consumos`
--

DROP TABLE IF EXISTS `costos_consumos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `costos_consumos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_consumos` int(11) NOT NULL,
  `precio_unitario` float NOT NULL,
  `total` float NOT NULL,
  `fecha_precio` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `costos_consumos_id_consumos_fk` (`id_consumos`),
  CONSTRAINT `costos_consumos_id_consumos_fk` FOREIGN KEY (`id_consumos`) REFERENCES `consumos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `costos_consumos`
--

LOCK TABLES `costos_consumos` WRITE;
/*!40000 ALTER TABLE `costos_consumos` DISABLE KEYS */;
/*!40000 ALTER TABLE `costos_consumos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleados`
--

DROP TABLE IF EXISTS `empleados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empleados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `Apellidos` varchar(100) NOT NULL,
  `Num_empleado` int(5) NOT NULL COMMENT 'Numero del empleado',
  `Area` varchar(31) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Num_empleado` (`Num_empleado`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleados`
--

LOCK TABLES `empleados` WRITE;
/*!40000 ALTER TABLE `empleados` DISABLE KEYS */;
INSERT INTO `empleados` VALUES (1,'Leonardo Daniel','Garcia Campos',10,'Fundicion 1'),(2,'Rene','Garcia Ferreyra',13,'Fundicion 1'),(3,'Carlos','Zavala Ramirez',3,'Fundicion 1'),(4,'Osvaldo','Coroy Garcia',1,'Fundicion 1'),(5,'Rigoberto','Mendoza Ortiz',64,'Fundicion 1'),(6,'Jose Luis','Soto Hinojosa',202,'Fundicion 1'),(7,'Ezequiel','Quiroz Garcia',201,'Fundicion 2'),(8,'Cesar Alexander','Ramirez Maya',12,'Fundicion 1'),(9,'Ramiro','Ramirez Rodriguez',15,'Fundicion 1'),(10,'Jose David','Gonzalez Fernandez',101,'Fundicion 1'),(11,'Floriberto','Diaz Isaac',5,'Fundicion 1'),(12,'Alejandro','Venegas Gonzalez',59,'Fundicion 2'),(13,'Francisco Javier','Venegas Ortiz',100,'Fundicion 2'),(14,'Walfred','Davila Reyes',137,'Fundicion 2'),(15,'Brayan','Cruz Escobedo',155,'Fundicion 2'),(16,'Rolando','Reyes Garcia',16,'Corte'),(17,'Ivan','Aguilar Ramirez',17,'Lija'),(18,'Juan Jesus','Aguilar Bustamante',18,'Lija'),(19,'Alfonso','Ambrosio Enriquez',19,'Lija'),(20,'Anastacio Aquileo','Zavala Rodriguez',20,'Lija'),(21,'Jaime','Zavala Ramirez',21,'Fundicion 1'),(22,'Jorge Ulises','Ortiz Monjardin',22,'Lija'),(23,'Alan','Rosas Navarrete',23,'Lija'),(24,'Zabdiel','Estañon Ortega',24,'Lija'),(25,'Carlos','Peña Sanchez',25,'Lija'),(26,'Alfonso','Cordova Terrones',26,'Lija'),(27,'Joel Enrique','Enriquez Sosa',27,'Lija'),(28,'Roberto','Coroy Enriquez',28,'Lija'),(29,'Ramiro','Campos Alvarado',29,'Lija'),(30,'Gabriel','Romero Perez',30,'Tornos'),(31,'Alejandro','Mora Terrones',31,'Tornos'),(32,'Gonzalo','Rocha Hernandez',32,'Tornos'),(33,'Mauricio','Bautista Patricio',33,'Tornos'),(34,'Aldo Alejandro','Estrada Quiroz',34,'Tornos'),(35,'Jahir de Jesus','Escalante Ramirez',35,'Tornos'),(36,'Cristian','Rendon',36,'Tornos'),(37,'Victor','Anastacio Pablo',37,'Lavado'),(38,'Fernando','Palacios Ferreyra',38,'Lavado'),(39,'Edgar Ivan','Carmona Gonzalez',39,'Lavado'),(40,'Luis Angel','Ricardo Ramirez',40,'Recubrimiento'),(41,'Samuel Eduardo','Cuevas Garces',41,'Recubrimiento'),(42,'Rogelio','Peralta Mendoza',42,'Recubrimiento'),(43,'Samuel','Nolasco Ramirez',43,'Recubrimiento'),(44,'Miguel','Nolasco Mendoza',44,'Recubrimiento'),(45,'Jose Angel','Reyes Perez',45,'Recubrimiento'),(46,'Edgar','Ramirez Puentes',46,'Recubrimiento'),(47,'Raul','Vazquez Mendoza',47,'Recubrimiento'),(48,'Roberto Carlos','Herrera Villavicencio',48,'Recubrimiento'),(49,'Alexis','Ramirez Puentes',49,'Recubrimiento'),(50,'Jorge','Franco Ruiz',50,'Valvulas'),(51,'Angel','Rocha Hernandez',51,'Pintura'),(52,'Carlos Arturo','Martinez Brito',52,'Pintura'),(53,'David','Peña Velazquez',53,'Pintura'),(54,'Gustavo','Mendoza Ortiz',54,'Pintura'),(55,'Veronica','Lara Peña',55,'Produccion'),(56,'Miriam','Aguilar Ramirez',56,'Produccion'),(57,'Juan Carlos','Santiago Cordova',57,'Empaque'),(58,'Jonathan','Gonzalez Hernandez',58,'Empaque'),(59,'Ana Laura','Coroy Lara',599,'Empaque'),(60,'Elena','Zavala Ramirez',60,'Inspeccion de Calidad'),(61,'Agustina','Arias Martinez',61,'Inspeccion de Calidad'),(62,'Florencia','Juarez Diaz',62,'Inspeccion de Calidad'),(63,'Fernando','Castillo Flores',63,'Inspeccion de Calidad'),(64,'Yoltic Fernando','Linares Rodriguez',640,'Inspeccion de Calidad'),(65,'Francisco','Ramos Ramirez',65,'Inspeccion de Calidad'),(66,'Paz','Puentes Ramirez',66,'Almacen'),(67,'Julio Cesar','Rojas Moran',67,'Mantenimiento'),(68,'Gabriel','Rosas Lopez',68,'Mantenimiento'),(69,'Berenice','Arias Martinez',69,'Limpieza'),(70,'Cecilia','Castillo Morales',70,'Administracion'),(71,'Andrea Fabiola','Cazares Becerril',71,'Administracion'),(72,'Cesar Armando','Dominguez Solorzano',72,'Administracion'),(73,'Celia','Hernandez Rodriguez',73,'Administracion'),(74,'Cristobal','Hernandez Rodriguez',74,'Administracion'),(75,'Angel Isabi','Sandoval Lopez 1',75,'ING. y Diseño'),(76,'Angel Isabi','Sandoval Lopez 2',0,'ING. y Diseño'),(77,'Juana Itzel','Sandoval Lopez',77,'ING. y Diseño'),(78,'Julieta','Noyola Mendez',78,'ING. y Diseño'),(79,'Brenda','Romero Cortes',79,'ING. y Diseño'),(80,'Gerardo','Jimenez Castillo',80,'ING. y Diseño'),(81,'Edilberto','Hernandez Peña',81,'Herreria'),(82,'Guillermo','Hernandez Peña',82,'Carpinteria'),(83,'Miguel Angel','Arias Martinez',83,'Desarrollo de Proyectos'),(84,'Victor Jose','Barberi Marban',84,'Seguridad'),(85,'Juan Pablo','Leyva Moreno',85,'Seguridad'),(86,'Jose','Jimenez Lopez',86,'Seguridad'),(87,'Geronimo','Reyes Carmona',87,'Chofer'),(88,'Maria de los Angeles','Perez Peña',88,'Jefe de Area'),(89,'Daniel','Ruiz Perez',89,'Jefe de Area'),(90,'Carlos','Días Isaac',2,'Fundición 1'),(91,'Daniel','Ambrosio Juarez',76,'Fundición 1'),(92,'Antonio','García Campos',300,'Fundición 1');
/*!40000 ALTER TABLE `empleados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perdidas`
--

DROP TABLE IF EXISTS `perdidas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perdidas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(56) NOT NULL,
  `Cantidad_kg` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perdidas`
--

LOCK TABLES `perdidas` WRITE;
/*!40000 ALTER TABLE `perdidas` DISABLE KEYS */;
/*!40000 ALTER TABLE `perdidas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `piezas`
--

DROP TABLE IF EXISTS `piezas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `piezas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clave` varchar(35) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `clave` (`clave`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `piezas`
--

LOCK TABLES `piezas` WRITE;
/*!40000 ALTER TABLE `piezas` DISABLE KEYS */;
INSERT INTO `piezas` VALUES (17,'1H12/4D'),(5,'BUD12'),(11,'CIHY4'),(13,'CIHY5'),(7,'COMNO1'),(3,'COMNO2'),(9,'COMNO3'),(15,'COMNO4'),(6,'CRD03'),(18,'FRD24'),(14,'FRD32'),(1,'FRD36'),(16,'FRD63'),(4,'IH1/6DD'),(10,'IH1/6O'),(12,'IH1FD'),(8,'IH2/4D'),(2,'TPUD46');
/*!40000 ALTER TABLE `piezas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `piezas_por_empleados`
--

DROP TABLE IF EXISTS `piezas_por_empleados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `piezas_por_empleados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_emp` int(11) NOT NULL,
  `id_pz` int(11) NOT NULL,
  `Aceptadas` int(9) NOT NULL COMMENT 'Piezas aceptadas del empleado',
  `Rechazadas` int(9) NOT NULL COMMENT 'Piezas rechazadas del empleado',
  `Fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `piezas_por_empleados_id_fk_1` (`id_emp`),
  KEY `piezas_por_empleados_id_fk_2` (`id_pz`),
  CONSTRAINT `piezas_por_empleados_id_fk_1` FOREIGN KEY (`id_emp`) REFERENCES `empleados` (`id`),
  CONSTRAINT `piezas_por_empleados_id_fk_2` FOREIGN KEY (`id_pz`) REFERENCES `piezas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `piezas_por_empleados`
--

LOCK TABLES `piezas_por_empleados` WRITE;
/*!40000 ALTER TABLE `piezas_por_empleados` DISABLE KEYS */;
INSERT INTO `piezas_por_empleados` VALUES (1,90,16,10,0,'2023-02-22 17:45:54'),(2,90,2,15,0,'2023-02-22 18:00:15'),(3,2,3,69,3,'2023-02-22 18:01:40'),(4,11,4,9,5,'2023-02-22 18:03:05'),(5,11,5,25,0,'2023-02-22 18:03:35'),(6,11,6,6,2,'2023-02-22 18:04:11'),(7,9,7,99,5,'2023-02-22 18:05:40'),(8,4,17,17,2,'2023-02-22 18:06:17'),(9,4,9,13,0,'2023-02-22 18:06:50'),(10,4,10,15,2,'2023-02-22 18:07:26'),(11,7,14,19,2,'2023-02-22 18:09:02'),(12,7,15,20,0,'2023-02-22 18:09:24'),(13,7,18,6,0,'2023-02-22 18:09:41'),(14,8,11,15,1,'2023-02-22 18:10:33'),(15,8,12,8,0,'2023-02-22 18:10:52'),(16,8,13,27,0,'2023-02-22 18:11:44');
/*!40000 ALTER TABLE `piezas_por_empleados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `placa_utilizada`
--

DROP TABLE IF EXISTS `placa_utilizada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `placa_utilizada` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Placa_kg` float NOT NULL,
  `Fecha` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `placa_utilizada`
--

LOCK TABLES `placa_utilizada` WRITE;
/*!40000 ALTER TABLE `placa_utilizada` DISABLE KEYS */;
/*!40000 ALTER TABLE `placa_utilizada` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `remanente`
--

DROP TABLE IF EXISTS `remanente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `remanente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Lingote` float NOT NULL,
  `Goteo` float NOT NULL,
  `Pza_rechazada` float NOT NULL,
  `Coladas` int(11) NOT NULL,
  `Tipo` varchar(11) NOT NULL,
  `Fecha` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `remanente`
--

LOCK TABLES `remanente` WRITE;
/*!40000 ALTER TABLE `remanente` DISABLE KEYS */;
/*!40000 ALTER TABLE `remanente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resumen_f1`
--

DROP TABLE IF EXISTS `resumen_f1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resumen_f1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produccion` float NOT NULL,
  `mano_obra` float NOT NULL,
  `insumos` float NOT NULL,
  `total` float NOT NULL,
  `fecha_in` date NOT NULL,
  `fecha_fn` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resumen_f1`
--

LOCK TABLES `resumen_f1` WRITE;
/*!40000 ALTER TABLE `resumen_f1` DISABLE KEYS */;
/*!40000 ALTER TABLE `resumen_f1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resumen_produccion`
--

DROP TABLE IF EXISTS `resumen_produccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resumen_produccion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Concepto` varchar(35) NOT NULL,
  `Cantidad` float NOT NULL,
  `Precio_unitario` float NOT NULL,
  `Total` float NOT NULL,
  `Fecha` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resumen_produccion`
--

LOCK TABLES `resumen_produccion` WRITE;
/*!40000 ALTER TABLE `resumen_produccion` DISABLE KEYS */;
/*!40000 ALTER TABLE `resumen_produccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `Active` tinyint(1) NOT NULL DEFAULT 1,
  `Create_at` date NOT NULL,
  `Update_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_nombre_uk` (`Nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin',1,'2023-02-16','2023-03-09'),(2,'Supervisor',1,'2023-02-17','2023-03-09'),(3,'Usuario normal',1,'2023-03-09','2023-03-27');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salarios`
--

DROP TABLE IF EXISTS `salarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_em` int(11) NOT NULL,
  `salario` double NOT NULL,
  `fecha_in` date NOT NULL,
  `fecha_fn` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `salarios_id_emp_fk` (`id_em`),
  CONSTRAINT `salarios_id_emp_fk` FOREIGN KEY (`id_em`) REFERENCES `empleados` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salarios`
--

LOCK TABLES `salarios` WRITE;
/*!40000 ALTER TABLE `salarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `salarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `total_produccion`
--

DROP TABLE IF EXISTS `total_produccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `total_produccion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total_piezas` int(20) NOT NULL,
  `total_aceptadas` int(20) NOT NULL,
  `total_rechazadas` int(20) NOT NULL,
  `kg_aceptados` float NOT NULL,
  `kg_rechazados` float NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `total_produccion`
--

LOCK TABLES `total_produccion` WRITE;
/*!40000 ALTER TABLE `total_produccion` DISABLE KEYS */;
/*!40000 ALTER TABLE `total_produccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(80) NOT NULL,
  `Apellidos` varchar(150) NOT NULL,
  `user` varchar(45) NOT NULL,
  `pass` varchar(256) NOT NULL,
  `Numero_empleado` int(4) NOT NULL,
  `id_role` int(11) DEFAULT NULL,
  `Create_at` date NOT NULL,
  `Update_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuarios_idrole_fk` (`id_role`),
  CONSTRAINT `usuarios_idrole_fk` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Gerardo','Jiménez Castillo','gera_casz@aluxsa.com','$2y$10$woyVcAiZJKN9IVy5lnE8heOd/wmarg1.EbkvKXWGy.6ttXID1ev/W',177,1,'2023-02-28','2023-03-09'),(9,'usuario','prueba','usuario_prueba@aluxsa.com','$2y$10$adfZEvN0YAFZIA6mp2GPr.weGhGdYYAigX2raSjhE5iwdrQk4zrLq',600,3,'2023-03-09','2023-03-27'),(10,'usuario','prueba','usuarioprueba@aluxsa.com','$2y$10$2ggXx0euBv2fY1blClcuhO8803evYAlXGVqgBa6o/5ZLLZPEiWXZK',600,NULL,'2023-03-27',NULL);
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

-- Dump completed on 2023-03-27 11:30:01
