-- MySQL dump 10.13  Distrib 5.7.24, for Win64 (x86_64)
--
-- Host: localhost    Database: produccion_f1
-- ------------------------------------------------------
-- Server version	5.7.24

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
-- Table structure for table `aluminio_utilizado`
--

DROP TABLE IF EXISTS `aluminio_utilizado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aluminio_utilizado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Aluminio_kg` float NOT NULL COMMENT 'Aluminio a producir',
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consumos`
--

LOCK TABLES `consumos` WRITE;
/*!40000 ALTER TABLE `consumos` DISABLE KEYS */;
INSERT INTO `consumos` VALUES (1,'Fundente',2,'2022-11-15'),(2,'Silisio',15,'2022-11-15'),(3,'Separador',10,'2022-11-15'),(4,'Silisio',10,'2022-11-14'),(5,'Fundente',25,'2022-11-14'),(6,'Separador',8,'2022-11-14'),(7,'Cubetas',22,'2022-11-16'),(8,'Fundente',15,'2022-11-16'),(9,'Separador',20,'2022-11-16'),(10,'Franela',2,'2022-11-16'),(11,'Guante Carnaza',2,'2022-11-16'),(12,'Fundente',20,'2022-11-17'),(13,'Separador',15,'2022-11-17'),(14,'Cubetas',17,'2022-11-17'),(15,'Silisio',42,'2020-01-08'),(16,'Fundente',40,'2020-01-08'),(17,'Separador',212,'2020-01-08');
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
  KEY `consumos_idconsumos_fk` (`id_consumos`),
  CONSTRAINT `consumos_idconsumos_fk` FOREIGN KEY (`id_consumos`) REFERENCES `consumos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
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
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleados`
--

LOCK TABLES `empleados` WRITE;
/*!40000 ALTER TABLE `empleados` DISABLE KEYS */;
INSERT INTO `empleados` VALUES (1,'Leonardo Daniel','Garcia Campos',1,'Fundicion 1'),(2,'Rene','Garcia Ferreyra',2,'Fundicion 1'),(3,'Carlos','Zavala Ramirez',3,'Fundicion 1'),(4,'Osvaldo','Coroy Garcia',4,'Fundicion 1'),(5,'Rigoberto','Mendoza Ortiz',5,'Fundicion 1'),(6,'Jose Luis','Soto Hinojosa',6,'Fundicion 1'),(7,'Ezequiel','Quiroz Garcia',7,'Fundicion 1'),(8,'Cesar Alexander','Ramirez Maya',8,'Fundicion 1'),(9,'Ramiro','Ramirez Rodriguez',9,'Fundicion 1'),(10,'Jose David','Gonzalez Fernandez',10,'Fundicion 1'),(11,'Floriberto','Diaz Isaac',11,'Fundicion 1'),(12,'Alejandro','Venegas Gonzalez',12,'Fundicion 2'),(13,'Francisco Javier','Venegas Ortiz',13,'Fundicion 2'),(14,'Walfred','Davila Reyes',14,'Fundicion 2'),(15,'Brayan','Cruz Escobedo',15,'Fundicion 2'),(16,'Rolando','Reyes Garcia',16,'Corte'),(17,'Ivan','Aguilar Ramirez',17,'Lija'),(18,'Juan Jesus','Aguilar Bustamante',18,'Lija'),(19,'Alfonso','Ambrosio Enriquez',19,'Lija'),(20,'Anastacio Aquileo','Zavala Rodriguez',20,'Lija'),(21,'Jaime','Zavala Ramirez',21,'Lija'),(22,'Jorge Ulises','Ortiz Monjardin',22,'Lija'),(23,'Alan','Rosas Navarrete',23,'Lija'),(24,'Zabdiel','Estañon Ortega',24,'Lija'),(25,'Carlos','Peña Sanchez',25,'Lija'),(26,'Alfonso','Cordova Terrones',26,'Lija'),(27,'Joel Enrique','Enriquez Sosa',27,'Lija'),(28,'Roberto','Coroy Enriquez',28,'Lija'),(29,'Ramiro','Campos Alvarado',29,'Lija'),(30,'Gabriel','Romero Perez',30,'Tornos'),(31,'Alejandro','Mora Terrones',31,'Tornos'),(32,'Gonzalo','Rocha Hernandez',32,'Tornos'),(33,'Mauricio','Bautista Patricio',33,'Tornos'),(34,'Aldo Alejandro','Estrada Quiroz',34,'Tornos'),(35,'Jahir de Jesus','Escalante Ramirez',35,'Tornos'),(36,'Cristian','Rendon',36,'Tornos'),(37,'Victor','Anastacio Pablo',37,'Lavado'),(38,'Fernando','Palacios Ferreyra',38,'Lavado'),(39,'Edgar Ivan','Carmona Gonzalez',39,'Lavado'),(43,'Luis Angel','Ricardo Ramirez',40,'Recubrimiento'),(44,'Samuel Eduardo','Cuevas Garces',41,'Recubrimiento'),(45,'Rogelio','Peralta Mendoza',42,'Recubrimiento'),(46,'Samuel','Nolasco Ramirez',43,'Recubrimiento'),(47,'Miguel','Nolasco Mendoza',44,'Recubrimiento'),(48,'Jose Angel','Reyes Perez',45,'Recubrimiento'),(49,'Edgar','Ramirez Puentes',46,'Recubrimiento'),(50,'Raul','Vazquez Mendoza',47,'Recubrimiento'),(51,'Roberto Carlos','Herrera Villavicencio',48,'Recubrimiento'),(52,'Alexis','Ramirez Puentes',49,'Recubrimiento'),(53,'Jorge','Franco Ruiz',50,'Valvulas'),(57,'Angel','Rocha Hernandez',51,'Pintura'),(58,'Carlos Arturo','Martinez Brito',52,'Pintura'),(59,'David','Peña Velazquez',53,'Pintura'),(60,'Gustavo','Mendoza Ortiz',54,'Pintura'),(61,'Veronica','Lara Peña',55,'Produccion'),(62,'Miriam','Aguilar Ramirez',56,'Produccion'),(63,'Juan Carlos','Santiago Cordova',57,'Empaque'),(64,'Jonathan','Gonzalez Hernandez',58,'Empaque'),(65,'Ana Laura','Coroy Lara',59,'Empaque'),(66,'Elena','Zavala Ramirez',60,'Inspeccion de Calidad'),(67,'Agustina','Arias Martinez',61,'Inspeccion de Calidad'),(68,'Florencia','Juarez Diaz',62,'Inspeccion de Calidad'),(69,'Fernando','Castillo Flores',63,'Inspeccion de Calidad'),(70,'Yoltic Fernando','Linares Rodriguez',64,'Inspeccion de Calidad'),(71,'Francisco','Ramos Ramirez',65,'Inspeccion de Calidad'),(72,'Paz','Puentes Ramirez',66,'Almacen'),(73,'Julio Cesar','Rojas Moran',67,'Mantenimiento'),(74,'Gabriel','Rosas Lopez',68,'Mantenimiento'),(75,'Berenice','Arias Martinez',69,'Limpieza'),(76,'Cecilia','Castillo Morales',70,'Administracion'),(77,'Andrea Fabiola','Cazares Becerril',71,'Administracion'),(78,'Cesar Armando','Dominguez Solorzano',72,'Administracion'),(79,'Celia','Hernandez Rodriguez',73,'Administracion'),(80,'Cristobal','Hernandez Rodriguez',74,'Administracion'),(81,'Angel Isabi','Sandoval Lopez 1',75,'ING. y Diseño'),(82,'Angel Isabi','Sandoval Lopez 2',76,'ING. y Diseño'),(83,'Juana Itzel','Sandoval Lopez',77,'ING. y Diseño'),(84,'Julieta','Noyola Mendez',78,'ING. y Diseño'),(85,'Brenda','Romero Cortes',79,'ING. y Diseño'),(86,'Gerardo','Jimenez Castillo',80,'ING. y Diseño'),(87,'Edilberto','Hernandez Peña',81,'Herreria'),(88,'Guillermo','Hernandez Peña',82,'Carpinteria'),(89,'Miguel Angel','Arias Martinez',83,'Desarrollo de Proyectos'),(90,'Victor Jose','Barberi Marban',84,'Seguridad'),(91,'Juan Pablo','Leyva Moreno',85,'Seguridad'),(92,'Jose','Jimenez Lopez',86,'Seguridad'),(93,'Geronimo','Reyes Carmona',87,'Chofer'),(94,'Maria de los Angeles','Perez Peña',88,'Jefe de Area'),(95,'Daniel','Ruiz Perez',89,'Jefe de Area');
/*!40000 ALTER TABLE `empleados` ENABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `piezas`
--

LOCK TABLES `piezas` WRITE;
/*!40000 ALTER TABLE `piezas` DISABLE KEYS */;
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
  `Fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_pz` (`id_pz`),
  KEY `id_emp` (`id_emp`,`id_pz`),
  CONSTRAINT `piezas_por_empleados_ibfk_1` FOREIGN KEY (`id_emp`) REFERENCES `empleados` (`id`),
  CONSTRAINT `piezas_por_empleados_ibfk_2` FOREIGN KEY (`id_pz`) REFERENCES `piezas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `piezas_por_empleados`
--

LOCK TABLES `piezas_por_empleados` WRITE;
/*!40000 ALTER TABLE `piezas_por_empleados` DISABLE KEYS */;
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
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `placa_utilizada`
--

LOCK TABLES `placa_utilizada` WRITE;
/*!40000 ALTER TABLE `placa_utilizada` DISABLE KEYS */;
/*!40000 ALTER TABLE `placa_utilizada` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `remanente1`
--

DROP TABLE IF EXISTS `remanente1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `remanente1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Lingote` int(11) NOT NULL,
  `Goteo` int(11) NOT NULL,
  `Pza_rechazada` int(11) NOT NULL,
  `Coladas` int(11) NOT NULL,
  `tipo_remanente` int(11) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `remanente_tipo_fk` (`tipo_remanente`),
  CONSTRAINT `remanente_tipo_fk` FOREIGN KEY (`tipo_remanente`) REFERENCES `tipo_remanente` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `remanente1`
--

LOCK TABLES `remanente1` WRITE;
/*!40000 ALTER TABLE `remanente1` DISABLE KEYS */;
INSERT INTO `remanente1` VALUES (1,53,115,19,128,1,'2020-01-08'),(2,65,118,59,0,2,'2020-01-08');
/*!40000 ALTER TABLE `remanente1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resumen_consumos`
--

DROP TABLE IF EXISTS `resumen_consumos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resumen_consumos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(35) NOT NULL,
  `Cantidad` float NOT NULL,
  `Precio_unitario` float NOT NULL,
  `Total` float NOT NULL,
  `Fecha` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resumen_consumos`
--

LOCK TABLES `resumen_consumos` WRITE;
/*!40000 ALTER TABLE `resumen_consumos` DISABLE KEYS */;
/*!40000 ALTER TABLE `resumen_consumos` ENABLE KEYS */;
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
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resumen_produccion`
--

LOCK TABLES `resumen_produccion` WRITE;
/*!40000 ALTER TABLE `resumen_produccion` DISABLE KEYS */;
/*!40000 ALTER TABLE `resumen_produccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `create_at` date NOT NULL,
  `update_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'administrador',1,'2022-11-16',NULL),(3,'Administrador Fundicion 1',1,'2022-11-16',NULL);
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_remanente`
--

DROP TABLE IF EXISTS `tipo_remanente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_remanente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_remanente`
--

LOCK TABLES `tipo_remanente` WRITE;
/*!40000 ALTER TABLE `tipo_remanente` DISABLE KEYS */;
INSERT INTO `tipo_remanente` VALUES (1,'Utilizado'),(2,'Sobrante');
/*!40000 ALTER TABLE `tipo_remanente` ENABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
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
  `name_user` varchar(45) NOT NULL,
  `password_user` varchar(256) NOT NULL,
  `numero_empleado` int(11) NOT NULL,
  `id_role` int(11) DEFAULT '0',
  `fecha_registro` date NOT NULL,
  `to_update` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `numero_empleado` (`numero_empleado`),
  KEY `usuarios_idrole_fk` (`id_role`),
  CONSTRAINT `usuarios_idrole_fk` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Gerardo','Jimenez Castillo','gerardo@1','f300b4d9f7ea2616eb1d9c80d22ee01db15f7aa4',0,1,'2022-11-16',NULL);
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

-- Dump completed on 2022-12-06 14:59:06
