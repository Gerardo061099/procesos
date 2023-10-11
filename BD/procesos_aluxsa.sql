-- MariaDB dump 10.19  Distrib 10.6.12-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: db_aluxsa
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
-- Table structure for table `area`
--

DROP TABLE IF EXISTS `area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `area`
--

LOCK TABLES `area` WRITE;
/*!40000 ALTER TABLE `area` DISABLE KEYS */;
INSERT INTO `area` VALUES (1,'Administracion'),(2,'Almacen'),(3,'Carpinteria'),(4,'Chofer'),(5,'Corte'),(6,'Desarrollo de proyectos'),(7,'Empaque'),(8,'Fundicion 1'),(9,'Fundicion 2'),(10,'Herreria'),(11,'ING. y Diseño'),(12,'Inspeccion de calidad'),(13,'Jefe de area'),(14,'Lavado'),(15,'Lija'),(16,'Limpieza'),(17,'Mantenimiento'),(18,'Pintura'),(19,'Produccion'),(20,'Recubrimiento'),(21,'Seguridad'),(22,'Tornos'),(23,'valvulas');
/*!40000 ALTER TABLE `area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consumos`
--

DROP TABLE IF EXISTS `consumos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consumos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `concepto` varchar(35) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consumos`
--

LOCK TABLES `consumos` WRITE;
/*!40000 ALTER TABLE `consumos` DISABLE KEYS */;
/*!40000 ALTER TABLE `consumos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consumos_produccion`
--

DROP TABLE IF EXISTS `consumos_produccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consumos_produccion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_id` int(11) NOT NULL,
  `consumos_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `consumos_produccion_prod_id_fk` (`prod_id`),
  KEY `consumos_produccion_consumos_id_fk` (`consumos_id`),
  KEY `consumos_produccion_area_id_fk` (`area_id`),
  CONSTRAINT `consumos_produccion_area_id_fk` FOREIGN KEY (`area_id`) REFERENCES `area` (`id`),
  CONSTRAINT `consumos_produccion_consumos_id_fk` FOREIGN KEY (`consumos_id`) REFERENCES `consumos` (`id`),
  CONSTRAINT `consumos_produccion_prod_id_fk` FOREIGN KEY (`prod_id`) REFERENCES `produccion` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consumos_produccion`
--

LOCK TABLES `consumos_produccion` WRITE;
/*!40000 ALTER TABLE `consumos_produccion` DISABLE KEYS */;
/*!40000 ALTER TABLE `consumos_produccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_consumos_p`
--

DROP TABLE IF EXISTS `detalle_consumos_p`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_consumos_p` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `consumo_id` int(11) NOT NULL,
  `cantidad` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `detalle_consumos_p_consumo_id_fk` (`consumo_id`),
  CONSTRAINT `detalle_consumos_p_consumo_id_fk` FOREIGN KEY (`consumo_id`) REFERENCES `consumos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_consumos_p`
--

LOCK TABLES `detalle_consumos_p` WRITE;
/*!40000 ALTER TABLE `detalle_consumos_p` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_consumos_p` ENABLE KEYS */;
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
  `num_empleado` int(11) DEFAULT NULL,
  `tipo_id` int(11) DEFAULT NULL,
  `status_e` binary(1) DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Num_empleado` (`num_empleado`),
  KEY `empleados_tipo_id_fk` (`tipo_id`),
  KEY `empleados_area_id_fk` (`area_id`),
  CONSTRAINT `empleados_area_id_fk` FOREIGN KEY (`area_id`) REFERENCES `area` (`id`),
  CONSTRAINT `empleados_tipo_id_fk` FOREIGN KEY (`tipo_id`) REFERENCES `tipo_empleado` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=168 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleados`
--

LOCK TABLES `empleados` WRITE;
/*!40000 ALTER TABLE `empleados` DISABLE KEYS */;
INSERT INTO `empleados` VALUES (1,'Leonardo Daniel','Garcia Campos',16,1,'1',8),(2,'Rene','Garcia Ferreyra',NULL,1,'0',8),(3,'Carlos','Zavala Ramirez',60,1,'1',8),(4,'Osvaldo','Coroy Garcia',NULL,1,'0',8),(5,'Rigoberto','Mendoza Ortiz',178,1,'1',8),(6,'Jose Luis','Soto Hinojosa',NULL,1,'0',8),(7,'Ezequiel','Quiroz Garcia',174,1,'1',8),(8,'Cesar Alexander','Ramirez Maya',156,1,'1',8),(9,'Ramiro','Ramirez Rodriguez',112,1,'1',8),(10,'Jose David','Gonzalez Fernandez',139,1,'1',8),(11,'Floriberto','Diaz Isaac',130,1,'1',8),(12,'Alejandro','Venegas Gonzalez',59,1,'1',9),(13,'Francisco Javier','Venegas Ortiz',100,1,'1',9),(14,'Walfred','Davila Reyes',137,1,'1',9),(15,'Brayan','Cruz Escobedo',183,1,'1',9),(16,'Rolando','Reyes Garcia',142,1,'1',5),(17,'Ivan','Aguilar Ramirez',106,1,'1',15),(18,'Juan Jesus','Aguilar Bustamante',120,1,'1',15),(19,'Alfonso','Ambrosio Enriquez',NULL,1,'0',15),(20,'Anastacio Aquileo','Zavala Rodriguez',63,1,'1',15),(21,'Jaime','Zavala Ramirez',62,1,'1',8),(22,'Jorge Ulises','Ortiz Monjardin',NULL,1,'0',15),(23,'Alan','Rosas Navarrete',NULL,1,'0',15),(24,'Zabdiel','Estañon Ortega',NULL,1,'1',15),(25,'Carlos','Peña Sanchez',NULL,1,'0',15),(26,'Alfonso','Cordova Terrones',NULL,1,'0',15),(27,'Joel Enrique','Enriquez Sosa',157,1,'1',15),(28,'Roberto','Coroy Enriquez',NULL,1,'0',15),(29,'Ramiro','Campos Alvarado',126,1,'1',15),(30,'Gabriel','Romero Perez',52,1,'1',22),(31,'Alejandro','Mora Terrones',36,1,'1',22),(32,'Gonzalo','Rocha Hernandez',51,1,'1',22),(33,'Mauricio','Bautista Patricio',147,1,'1',22),(34,'Aldo Alejandro','Estrada Quiroz',154,1,'1',22),(35,'Jahir de Jesus','Escalante Ramirez',NULL,1,'0',22),(36,'Cristian','Rendon',NULL,1,'0',22),(37,'Victor','Anastacio Pablo',1,1,'1',14),(38,'Fernando','Palacios Ferreyra',NULL,1,'0',14),(39,'Edgar Ivan','Carmona Gonzalez',NULL,1,'0',14),(40,'Luis Angel','Ricardo Ramirez',73,1,'1',20),(41,'Samuel Eduardo','Cuevas Garces',7,1,'1',20),(42,'Rogelio','Peralta Mendoza',38,1,'1',20),(43,'Samuel','Nolasco Ramirez',136,1,'1',20),(44,'Miguel','Nolasco Mendoza',37,1,'1',20),(45,'Jose Angel','Reyes Perez',179,1,'1',20),(46,'Edgar','Ramirez Puentes',NULL,1,'0',20),(47,'Raul','Vazquez Mendoza',NULL,1,'0',20),(48,'Roberto Carlos','Herrera Villavicencio',NULL,1,'0',20),(49,'Alexis','Ramirez Puentes',NULL,1,'0',20),(50,'Jorge','Franco Ruiz',161,1,'1',23),(51,'Angel','Rocha Hernandez',123,1,'1',18),(52,'Carlos Arturo','Martinez Brito',NULL,1,'0',18),(53,'David','Peña Velazquez',NULL,1,'0',18),(54,'Gustavo','Mendoza Ortiz',180,1,'1',18),(55,'Veronica','Lara Peña',163,1,'1',19),(56,'Miriam','Aguilar Ramirez',140,1,'1',19),(57,'Juan Carlos','Santiago Cordova',127,1,'1',7),(58,'Jonathan','Gonzalez Hernandez',132,1,'1',7),(59,'Ana Laura','Coroy Lara',143,1,'1',7),(60,'Elena','Zavala Ramirez',80,1,'1',12),(61,'Agustina','Arias Martinez',2,1,'1',12),(62,'Florencia','Juarez Diaz',28,1,'1',12),(63,'Fernando','Castillo Flores',NULL,1,'0',12),(64,'Yoltic Fernando','Linares Rodriguez',NULL,2,'0',12),(65,'Francisco','Ramos Ramirez',NULL,1,'0',12),(66,'Paz','Puentes Ramirez',152,1,'1',2),(67,'Julio Cesar','Rojas Moran',113,1,'1',17),(69,'Berenice','Arias Martinez',168,1,'0',16),(70,'Cecilia','Castillo Morales',5,1,'1',1),(71,'Andrea Fabiola','Cazares Becerril',99,1,'1',1),(72,'Cesar Armando','Dominguez Solorzano',NULL,1,'0',1),(74,'Cristobal','Hernandez Rodriguez',NULL,1,'0',1),(75,'Angel Isabi','Sandoval Lopez',54,1,'1',11),(77,'Juana Itzel','Sandoval Lopez',55,1,'1',11),(78,'Julieta','Noyola Mendez',151,1,'1',11),(79,'Brenda','Romero Cortes',144,1,'1',11),(80,'Gerardo','Jimenez Castillo',177,1,'1',11),(81,'Edilberto','Hernandez Peña',22,1,'1',10),(82,'Guillermo','Hernandez Peña',23,1,'1',3),(83,'Miguel Angel','Arias Martinez',173,1,'0',6),(84,'Victor Jose','Barberi Marban',NULL,1,'0',21),(85,'Juan Pablo','Leyva Moreno',162,1,'1',21),(86,'Jose','Jimenez Lopez',97,1,'1',21),(87,'Geronimo','Reyes Carmona',45,1,'1',4),(88,'Maria de los Angeles','Perez Peña',40,1,'1',13),(89,'Daniel','Ruiz Perez',105,1,'1',13),(90,'Carlos','Días Isaac',10,1,'1',8),(91,'Daniel','Ambrosio Juarez',76,1,'1',8),(92,'Antonio','García Campos',64,1,'1',8),(93,'Jonathan','Aguilar Ramirez',176,1,'1',15),(94,'Oscar','Molina Nolasco',182,1,'1',14),(104,'Cesar','Zavala Ramirez',215,1,'1',8),(147,'Gabriel','Juarez Hernandez',NULL,1,'1',22);
/*!40000 ALTER TABLE `empleados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materia_prima`
--

DROP TABLE IF EXISTS `materia_prima`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `materia_prima` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materia_prima`
--

LOCK TABLES `materia_prima` WRITE;
/*!40000 ALTER TABLE `materia_prima` DISABLE KEYS */;
INSERT INTO `materia_prima` VALUES (1,'Lingote Virgen'),(2,'Placa');
/*!40000 ALTER TABLE `materia_prima` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materia_prima_produccion`
--

DROP TABLE IF EXISTS `materia_prima_produccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `materia_prima_produccion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_id` int(11) NOT NULL,
  `m_p_id` int(11) NOT NULL,
  `area_id` int(11) DEFAULT NULL,
  `peso_kg` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `materia_prima_produccion_prod_id_fk` (`prod_id`),
  KEY `materia_prima_produccion_m_p_id_fk` (`m_p_id`),
  KEY `materia_prima_produccion_area_id_fk` (`area_id`),
  CONSTRAINT `materia_prima_produccion_area_id_fk` FOREIGN KEY (`area_id`) REFERENCES `area` (`id`),
  CONSTRAINT `materia_prima_produccion_m_p_id_fk` FOREIGN KEY (`m_p_id`) REFERENCES `materia_prima` (`id`),
  CONSTRAINT `materia_prima_produccion_prod_id_fk` FOREIGN KEY (`prod_id`) REFERENCES `produccion` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materia_prima_produccion`
--

LOCK TABLES `materia_prima_produccion` WRITE;
/*!40000 ALTER TABLE `materia_prima_produccion` DISABLE KEYS */;
INSERT INTO `materia_prima_produccion` VALUES (1,66,1,8,206.32);
/*!40000 ALTER TABLE `materia_prima_produccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permiso_role`
--

DROP TABLE IF EXISTS `permiso_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permiso_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permiso_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `permiso_role_permiso_id_fk` (`permiso_id`),
  KEY `permiso_role_role_id_fk` (`role_id`),
  CONSTRAINT `permiso_role_permiso_id_fk` FOREIGN KEY (`permiso_id`) REFERENCES `permisos` (`id`),
  CONSTRAINT `permiso_role_role_id_fk` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permiso_role`
--

LOCK TABLES `permiso_role` WRITE;
/*!40000 ALTER TABLE `permiso_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `permiso_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permisos`
--

DROP TABLE IF EXISTS `permisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permisos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module` varchar(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permisos`
--

LOCK TABLES `permisos` WRITE;
/*!40000 ALTER TABLE `permisos` DISABLE KEYS */;
/*!40000 ALTER TABLE `permisos` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `piezas`
--

LOCK TABLES `piezas` WRITE;
/*!40000 ALTER TABLE `piezas` DISABLE KEYS */;
INSERT INTO `piezas` VALUES (17,'1H12/4D'),(32,'BO204'),(82,'BSD13'),(83,'BSD14'),(79,'BSD16'),(62,'BSD21'),(5,'BUD12'),(60,'BUDI3'),(58,'CIH1/2L'),(54,'CIH1/2LD'),(59,'CIH1/3D'),(61,'CIH1/6'),(56,'CIH1/6D'),(29,'CIH1/9'),(11,'CIHY4'),(13,'CIHY5'),(72,'COMN03'),(34,'COMN23'),(35,'COMN3'),(76,'COMN4'),(36,'COMN5'),(75,'COMN6'),(7,'COMNO1'),(57,'COMNO14'),(3,'COMNO2'),(9,'COMNO3'),(15,'COMNO4'),(55,'COMNO6'),(22,'COMP15'),(23,'COMP16'),(25,'COMP2'),(78,'COMP4'),(20,'COMP5'),(27,'COMP6'),(6,'CRD03'),(41,'DS202'),(37,'DS203'),(67,'DU202'),(18,'FRD24'),(14,'FRD32'),(1,'FRD36'),(16,'FRD63'),(64,'FS003'),(44,'FSC03'),(50,'FSOO3'),(39,'FUL03'),(48,'FUL04'),(42,'FULO3'),(31,'IH1'),(30,'IH1/2'),(28,'IH1/3'),(52,'IH1/3D'),(24,'IH1/4'),(4,'IH1/6DD'),(10,'IH1/6O'),(38,'IH1F'),(12,'IH1FD'),(81,'IH2/4'),(8,'IH2/4D'),(74,'IU102'),(77,'MJ'),(40,'MJ554'),(73,'MJ603'),(47,'MJS54'),(68,'MND07'),(21,'PD04'),(65,'PS004'),(45,'PSC04'),(51,'PSOO4'),(69,'PU'),(66,'PU000'),(85,'PU002'),(80,'TFUL04'),(84,'TPUD44'),(2,'TPUD46'),(71,'TRUD22'),(70,'TRUD45'),(33,'TRUD46'),(46,'TRUD64'),(26,'TSO13'),(53,'TU003'),(43,'TUC03'),(49,'TUOO3'),(63,'ZC002');
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
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `piezas_por_empleados_id_fk_1` (`id_emp`),
  KEY `piezas_por_empleados_id_fk_2` (`id_pz`),
  CONSTRAINT `piezas_por_empleados_id_fk_1` FOREIGN KEY (`id_emp`) REFERENCES `empleados` (`id`),
  CONSTRAINT `piezas_por_empleados_id_fk_2` FOREIGN KEY (`id_pz`) REFERENCES `piezas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=177 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `piezas_por_empleados`
--

LOCK TABLES `piezas_por_empleados` WRITE;
/*!40000 ALTER TABLE `piezas_por_empleados` DISABLE KEYS */;
INSERT INTO `piezas_por_empleados` VALUES (1,90,16,10,0,'2023-02-22'),(2,90,2,15,0,'2023-02-22'),(3,2,3,69,3,'2023-02-22'),(4,11,4,9,5,'2023-02-22'),(5,11,5,25,0,'2023-02-22'),(6,11,6,6,2,'2023-02-22'),(7,9,7,99,5,'2023-02-22'),(8,4,17,17,2,'2023-02-22'),(9,4,9,13,0,'2023-02-22'),(10,4,10,15,2,'2023-02-22'),(11,7,14,19,2,'2023-02-22'),(12,7,15,20,0,'2023-02-22'),(13,7,18,6,0,'2023-02-22'),(14,8,11,15,1,'2023-02-22'),(15,8,12,8,0,'2023-02-22'),(16,8,13,27,0,'2023-02-22'),(17,2,7,10,6,'2023-04-27'),(18,15,17,37,1,'2023-04-27'),(19,76,20,53,0,'2023-04-27'),(20,2,21,4,0,'2023-04-27'),(25,1,25,58,0,'2023-04-28'),(26,4,26,10,2,'2023-04-28'),(27,2,27,43,5,'2023-05-02'),(28,2,28,26,0,'2023-05-02'),(29,2,29,20,0,'2023-05-02'),(30,2,24,14,2,'2023-05-02'),(31,2,30,5,0,'2023-05-02'),(32,90,31,2,0,'2023-05-02'),(33,90,32,8,0,'2023-05-02'),(34,91,24,20,0,'2023-05-15'),(35,90,33,25,8,'2023-07-19'),(36,11,34,32,0,'2023-07-19'),(37,1,35,15,3,'2023-07-19'),(38,4,36,34,5,'2023-07-19'),(39,90,37,10,0,'2023-07-31'),(40,90,38,16,0,'2023-07-31'),(41,3,39,20,1,'2023-07-31'),(42,3,40,18,0,'2023-07-31'),(43,1,41,8,2,'2023-07-31'),(44,1,14,12,0,'2023-07-31'),(45,1,5,2,1,'2023-07-31'),(46,2,42,5,0,'2023-07-31'),(47,9,43,10,0,'2023-07-31'),(48,9,44,6,0,'2023-07-31'),(49,8,35,40,0,'2023-07-31'),(50,91,45,15,0,'2023-07-31'),(51,91,30,24,1,'2023-07-31'),(52,4,37,10,0,'2023-07-31'),(53,4,37,10,0,'2023-07-31'),(54,4,46,15,0,'2023-08-23'),(55,3,46,15,0,'2023-08-23'),(56,90,46,20,5,'2023-08-23'),(57,11,46,34,3,'2023-08-23'),(58,1,46,22,8,'2023-08-23'),(59,90,37,10,0,'2023-08-24'),(60,90,38,16,0,'2023-08-24'),(61,3,39,20,1,'2023-08-24'),(62,3,47,18,0,'2023-08-24'),(63,1,41,8,2,'2023-08-24'),(64,1,14,12,0,'2023-08-24'),(65,1,5,2,1,'2023-08-24'),(66,2,48,5,0,'2023-08-24'),(67,9,49,10,0,'2023-08-24'),(68,9,50,6,0,'2023-08-24'),(69,91,51,15,0,'2023-08-24'),(71,90,52,11,1,'2023-08-28'),(72,90,41,4,1,'2023-08-28'),(73,90,53,7,0,'2023-08-28'),(74,90,54,36,0,'2023-08-29'),(75,3,55,80,1,'2023-08-29'),(76,2,56,108,2,'2023-08-29'),(77,2,57,22,0,'2023-08-29'),(78,11,58,31,0,'2023-08-29'),(79,9,53,6,0,'2023-08-29'),(80,1,37,10,5,'2023-08-29'),(82,8,59,47,0,'2023-08-29'),(83,8,59,47,0,'2023-08-29'),(84,3,60,22,1,'2023-08-29'),(85,2,61,31,2,'2023-08-29'),(86,9,62,23,4,'2023-08-29'),(87,9,14,7,1,'2023-08-29'),(88,9,63,17,0,'2023-08-29'),(89,90,37,10,0,'2023-08-30'),(90,90,38,16,0,'2023-08-30'),(91,3,39,20,1,'2023-08-30'),(92,3,47,18,0,'2023-08-30'),(93,1,41,8,2,'2023-08-30'),(94,1,14,12,0,'2023-08-30'),(95,1,5,2,1,'2023-08-30'),(96,2,48,5,0,'2023-08-30'),(97,9,53,10,0,'2023-08-30'),(98,9,64,6,0,'2023-08-30'),(99,8,35,40,0,'2023-08-30'),(100,91,65,15,0,'2023-08-30'),(108,7,66,40,0,'2023-08-30'),(109,7,67,8,0,'2023-08-30'),(110,7,68,8,4,'2023-08-30'),(114,1,37,20,0,'2023-08-31'),(115,4,71,32,2,'2023-08-31'),(116,90,37,10,0,'2023-09-04'),(117,90,38,16,0,'2023-09-04'),(118,3,39,20,1,'2023-09-04'),(119,3,47,18,0,'2023-09-04'),(120,1,41,8,2,'2023-09-04'),(121,1,14,12,0,'2023-09-04'),(122,1,5,2,1,'2023-09-04'),(123,2,48,5,0,'2023-09-04'),(124,9,53,10,0,'2023-09-04'),(125,91,65,15,0,'2023-09-04'),(126,91,30,24,1,'2023-09-04'),(128,8,35,40,0,'2023-09-04'),(136,7,66,40,0,'2023-09-04'),(138,9,64,6,0,'2023-09-04'),(139,3,71,23,0,'2023-09-05'),(140,3,35,16,2,'2023-09-05'),(142,92,72,22,3,'2023-09-06'),(143,90,41,8,2,'2023-09-06'),(144,90,14,12,0,'2023-09-06'),(145,90,5,2,1,'2023-09-06'),(146,9,73,10,1,'2023-09-07'),(147,10,66,40,0,'2023-09-07'),(148,3,74,4,0,'2023-09-07'),(149,90,75,66,4,'2023-09-11'),(150,90,52,9,0,'2023-09-11'),(151,90,76,7,3,'2023-09-11'),(152,9,77,10,1,'2023-09-11'),(153,90,76,15,0,'2023-09-13'),(176,90,78,40,0,'2023-09-27');
/*!40000 ALTER TABLE `piezas_por_empleados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `precios_consumos`
--

DROP TABLE IF EXISTS `precios_consumos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `precios_consumos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `consumo_id` int(11) NOT NULL,
  `precion` float NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `precios_consumos_consumo_id_fk` (`consumo_id`),
  CONSTRAINT `precios_consumos_consumo_id_fk` FOREIGN KEY (`consumo_id`) REFERENCES `consumos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `precios_consumos`
--

LOCK TABLES `precios_consumos` WRITE;
/*!40000 ALTER TABLE `precios_consumos` DISABLE KEYS */;
/*!40000 ALTER TABLE `precios_consumos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produccion`
--

DROP TABLE IF EXISTS `produccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produccion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_produccion` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produccion`
--

LOCK TABLES `produccion` WRITE;
/*!40000 ALTER TABLE `produccion` DISABLE KEYS */;
INSERT INTO `produccion` VALUES (1,'2023-06-14'),(2,'2023-06-19'),(4,'2023-06-20'),(9,'2023-06-21'),(15,'2023-06-22'),(16,'2023-06-26'),(17,'2023-06-27'),(18,'2023-06-29'),(19,'2023-07-03'),(20,'2023-07-04'),(21,'2023-07-06'),(22,'2023-07-07'),(23,'2023-07-10'),(24,'2023-07-11'),(25,'2023-07-12'),(26,'2023-07-13'),(27,'2023-07-16'),(28,'2023-07-17'),(29,'2023-07-18'),(30,'2023-07-19'),(31,'2023-07-20'),(32,'2023-07-21'),(33,'2023-07-24'),(35,'2023-07-25'),(38,'2023-07-26'),(39,'2023-07-27'),(41,'2023-07-31'),(42,'2023-08-01'),(43,'2023-08-02'),(44,'2023-08-07'),(45,'2023-08-22'),(46,'2023-08-23'),(47,'2023-08-24'),(48,'2023-08-28'),(49,'2023-08-29'),(50,'2023-08-30'),(51,'2023-08-31'),(52,'2023-09-04'),(53,'2023-09-05'),(54,'2023-09-06'),(55,'2023-09-07'),(56,'2023-09-11'),(57,'2023-09-12'),(58,'2023-09-13'),(59,'2023-09-18'),(60,'2023-09-19'),(61,'2023-09-20'),(62,'2023-09-21'),(63,'2023-09-25'),(64,'2023-09-26'),(65,'2023-09-27'),(66,'2023-09-28'),(67,'2023-09-29'),(68,'2023-10-02'),(69,'2023-10-04'),(70,'2023-10-06');
/*!40000 ALTER TABLE `produccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produccion_Total`
--

DROP TABLE IF EXISTS `produccion_Total`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produccion_Total` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produccion_kg` float NOT NULL,
  `valor_aplicado` float NOT NULL,
  `id_prod` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `produccion_total_id_prod_fk` (`id_prod`),
  CONSTRAINT `produccion_total_id_prod_fk` FOREIGN KEY (`id_prod`) REFERENCES `produccion` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produccion_Total`
--

LOCK TABLES `produccion_Total` WRITE;
/*!40000 ALTER TABLE `produccion_Total` DISABLE KEYS */;
/*!40000 ALTER TABLE `produccion_Total` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `remanente`
--

DROP TABLE IF EXISTS `remanente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `remanente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `remanente`
--

LOCK TABLES `remanente` WRITE;
/*!40000 ALTER TABLE `remanente` DISABLE KEYS */;
INSERT INTO `remanente` VALUES (1,'Lingote Retorno'),(2,'Pza Rechazada'),(3,'Gota'),(4,'Coladas');
/*!40000 ALTER TABLE `remanente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `remanente_produccion`
--

DROP TABLE IF EXISTS `remanente_produccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `remanente_produccion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_id` int(11) NOT NULL,
  `remanente_id` int(11) NOT NULL,
  `area_id` int(11) DEFAULT NULL,
  `descripcion` varchar(45) NOT NULL,
  `peso_kg` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `remanente_produccion_prod_id_fk` (`prod_id`),
  KEY `remanente_produccion_remanente_id_fk` (`remanente_id`),
  KEY `remanente_produccion_id_fk` (`area_id`),
  CONSTRAINT `remanente_produccion_id_fk` FOREIGN KEY (`area_id`) REFERENCES `area` (`id`),
  CONSTRAINT `remanente_produccion_prod_id_fk` FOREIGN KEY (`prod_id`) REFERENCES `produccion` (`id`),
  CONSTRAINT `remanente_produccion_remanente_id_fk` FOREIGN KEY (`remanente_id`) REFERENCES `remanente` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `remanente_produccion`
--

LOCK TABLES `remanente_produccion` WRITE;
/*!40000 ALTER TABLE `remanente_produccion` DISABLE KEYS */;
INSERT INTO `remanente_produccion` VALUES (1,65,5,8,'',0),(2,65,6,8,'',0),(3,65,7,8,'',0),(4,66,1,8,'utilizado',312.45),(5,66,2,8,'utilizado',342.65),(6,66,3,8,'utilizado',200.32),(7,66,4,8,'utilizado',134.26),(8,67,1,8,'utilizado',335.15),(9,67,2,8,'utilizado',125.62),(10,67,3,8,'utilizado',200.35),(11,67,4,8,'utilizado',100);
/*!40000 ALTER TABLE `remanente_produccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resumen_produccion`
--

DROP TABLE IF EXISTS `resumen_produccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resumen_produccion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `concepto` varchar(16) NOT NULL,
  `precio` float NOT NULL,
  `area_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `resumen_produccion_area_id_fk` (`area_id`),
  CONSTRAINT `resumen_produccion_area_id_fk` FOREIGN KEY (`area_id`) REFERENCES `area` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
INSERT INTO `roles` VALUES (1,'Administrador',1,'2023-02-16','2023-04-24'),(2,'Supervisor',1,'2023-02-17','2023-03-09'),(3,'Usuario normal',0,'2023-03-09','2023-07-12');
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
-- Table structure for table `tipo_empleado`
--

DROP TABLE IF EXISTS `tipo_empleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_empleado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_empleado` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_empleado`
--

LOCK TABLES `tipo_empleado` WRITE;
/*!40000 ALTER TABLE `tipo_empleado` DISABLE KEYS */;
INSERT INTO `tipo_empleado` VALUES (1,'Trabajador'),(2,'Practicante');
/*!40000 ALTER TABLE `tipo_empleado` ENABLE KEYS */;
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
INSERT INTO `usuarios` VALUES (1,'Gerardo','Jiménez Castillo','gerardo_casz@aluxsa.com','$2y$10$woyVcAiZJKN9IVy5lnE8heOd/wmarg1.EbkvKXWGy.6ttXID1ev/W',177,1,'2023-02-28','2023-04-24'),(9,'usuario','prueba','usuario_prueba@aluxsa.com','$2y$10$QbfdYEQ.8UuyhYYxfA8tpOOgsZQdHdpTH6u895yG70I1cUshY1g.q',600,3,'2023-03-09','2023-07-12'),(10,'usuario','prueba','usuarioprueba@aluxsa.com','$2y$10$2ggXx0euBv2fY1blClcuhO8803evYAlXGVqgBa6o/5ZLLZPEiWXZK',600,NULL,'2023-03-27',NULL);
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

-- Dump completed on 2023-10-11 12:41:01
