CREATE DATABASE  IF NOT EXISTS `travel` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `travel`;
-- MySQL dump 10.13  Distrib 5.6.24, for osx10.8 (x86_64)
--
-- Host: 127.0.0.1    Database: travel
-- ------------------------------------------------------
-- Server version	5.5.42

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
-- Table structure for table `availability`
--

DROP TABLE IF EXISTS `availability`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `availability` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime DEFAULT NULL,
  `guide_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `guide_id_idx` (`guide_id`),
  CONSTRAINT `guide_id` FOREIGN KEY (`guide_id`) REFERENCES `guides` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `availability`
--

LOCK TABLES `availability` WRITE;
/*!40000 ALTER TABLE `availability` DISABLE KEYS */;
INSERT INTO `availability` VALUES (1,'2015-08-29 00:00:00',1),(2,'2015-08-30 00:00:00',1),(3,'2015-08-31 00:00:00',1),(4,'2015-09-02 00:00:00',2),(5,'2015-09-03 00:00:00',2),(6,'2015-09-02 00:00:00',3),(7,'2015-09-03 00:00:00',3),(8,'2015-09-06 00:00:00',3),(9,'2015-09-09 00:00:00',3),(10,'2015-09-10 00:00:00',3),(11,'2015-09-02 00:00:00',4),(12,'2015-09-03 00:00:00',5),(13,'2015-09-04 00:00:00',5),(14,'2015-09-01 00:00:00',6);
/*!40000 ALTER TABLE `availability` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `guides`
--

DROP TABLE IF EXISTS `guides`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `guides` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `description` text,
  `rating` smallint(6) DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `dob` datetime DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guides`
--

LOCK TABLES `guides` WRITE;
/*!40000 ALTER TABLE `guides` DISABLE KEYS */;
INSERT INTO `guides` VALUES (1,'Sue Su','I don\'t really know what I\'m talking about most of the time.',5,'1980 Zanker Rd, San Jose, CA','sue.png',100,'1997-11-28 00:00:00','4087020692','suesu@gmail.com','22843bcc1e4bf833879a6af91b78c014','2015-08-28 13:53:55','2015-08-31 19:57:17'),(2,'Sourabh Pal','Public restrooms are great places to meet strangers.',1,'3708 Laguna Ave, Palo Alto','sourabh.png',1,'1988-05-23 00:00:00','6099370629','sourabh@gmail.com','a1ccf92f07ad5d86fa2d41e5fd1ad142','2015-08-28 14:51:13',NULL),(3,'Ray Oleaga','See the world and have a good time!',5,'Providence, RI','ray.png',40.44,'1986-09-25 00:00:00',NULL,'ray@gmail.com','c7c7661ef885a3f37dd18bdca92a2d20','2015-08-28 14:51:27',NULL),(4,'Ron Sim','Come back to me.',3,'Fremont, CA','ron.png',88.88,'1984-06-24 00:00:00',NULL,'ron@gmail.com','d03cc02a01c51b8cee222972393d707b','2015-08-28 14:51:41',NULL),(5,'Lan Nguyen','Bun Bo Hue',4,'Redwood City, CA','lan.png',999.99,'1982-06-21 00:00:00','4084827159','lan@gmail.com','b26fa69b5fa46f560ee54e52c0b1e4ff','2015-08-28 14:51:55',NULL),(6,'Nick Leonard','If you pay enough I\'ll play around',2,'Long Beach, CA','nick.png',77.89,'1983-07-27 00:00:00',NULL,'nick@gmail.com','907335cec18fc90a9fee95fd9d6a2ef6','2015-08-28 20:53:49',NULL);
/*!40000 ALTER TABLE `guides` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `guide_id` int(11) DEFAULT NULL,
  `message` text,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`),
  KEY `guide_id_idx` (`guide_id`),
  CONSTRAINT `id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,NULL,0,NULL);
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `guide_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `confirmation` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`),
  KEY `id_idx` (`guide_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservations`
--

LOCK TABLES `reservations` WRITE;
/*!40000 ALTER TABLE `reservations` DISABLE KEYS */;
INSERT INTO `reservations` VALUES (1,6,2,'2015-09-09 00:00:00',NULL,NULL),(2,5,1,'2015-10-02 00:00:00',NULL,NULL),(3,7,3,'2015-09-15 00:00:00',NULL,NULL),(4,3,4,'2015-10-13 00:00:00',NULL,NULL),(5,1,5,'2015-11-13 00:00:00',NULL,NULL),(7,18,1,'2015-08-31 00:00:00',NULL,NULL),(8,19,1,'2015-08-31 00:00:00',NULL,NULL),(9,19,1,'2015-08-31 00:00:00',NULL,NULL),(10,19,1,'2015-08-31 00:00:00',NULL,NULL),(11,19,1,'2015-08-31 00:00:00',NULL,NULL),(12,16,1,'2015-08-31 00:00:00',NULL,NULL),(13,16,2,'2015-08-31 00:00:00',NULL,NULL),(14,2,2015,NULL,NULL,NULL),(15,16,2,'2015-08-31 00:00:00',NULL,NULL),(16,16,1,'2015-08-31 00:00:00',NULL,NULL),(17,3,3,'2015-08-31 00:00:00',NULL,NULL),(18,3,3,'2015-08-31 00:00:00',NULL,NULL),(19,3,3,'2015-08-31 00:00:00',NULL,NULL),(20,3,3,'2015-08-31 00:00:00',554729,'2015-08-31 14:36:19'),(21,16,4,'2015-08-31 00:00:00',845523,'2015-08-31 14:39:23'),(22,16,4,'2015-08-31 00:00:00',783264,'2015-08-31 14:39:52'),(23,16,4,'2015-08-31 00:00:00',493834,'2015-08-31 14:41:05'),(24,16,4,'2015-08-31 00:00:00',526668,'2015-08-31 14:41:16'),(25,3,2,'2015-08-31 00:00:00',324785,'2015-08-31 15:54:36'),(26,3,2,'2015-08-31 00:00:00',805075,'2015-08-31 15:55:16'),(27,3,2,'2015-08-31 00:00:00',445577,'2015-08-31 15:55:35'),(28,3,2,'2015-08-31 00:00:00',583252,'2015-08-31 15:58:20'),(29,3,2,'2015-08-31 00:00:00',654845,'2015-08-31 15:58:38'),(30,3,2,'2015-08-31 00:00:00',690615,'2015-08-31 15:58:56'),(31,3,2,'2015-08-31 00:00:00',785562,'2015-08-31 15:59:30'),(32,3,2,'2015-08-31 00:00:00',459071,'2015-08-31 16:00:50'),(33,3,2,'2015-08-31 00:00:00',242617,'2015-08-31 16:01:28'),(34,3,2,'2015-08-31 00:00:00',858184,'2015-08-31 16:03:47'),(35,3,5,'2015-08-31 00:00:00',826379,'2015-08-31 16:10:05');
/*!40000 ALTER TABLE `reservations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `guide_id` int(11) DEFAULT NULL,
  `review` text,
  `created_at` datetime DEFAULT NULL,
  `star` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (1,1,1,'Awesome!','2015-07-31 18:17:46',5),(2,2,1,'Had a great time!','2015-08-11 18:19:46',5),(3,3,1,'Best guide ever!','2015-08-20 12:17:46',5),(4,6,1,'It was a blast!','2015-08-31 08:17:46',5),(5,4,2,'Don\'t book him he sucks.','2015-06-22 13:13:40',1),(6,5,2,'I wish there was a 0 star option.','2015-06-30 18:17:46',1),(7,7,2,'It\'s okay I guess but I\'d rather be spending my dollar on candies.','2015-07-15 12:13:14',1),(8,8,2,'I think he\'s Indian.','2015-08-01 18:17:46',2),(9,2,3,'Ray is great!','2015-08-20 18:17:46',5),(10,3,4,'5 stars!!','0000-00-00 00:00:00',5);
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `alias` varchar(45) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `dob` datetime DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Sourabh Pal','sourabhp','sourabh@pal-tech.co','265e7307f55128547875ceec2d415db1','2015-08-25 09:54:33','1991-05-05 00:00:00','6099370629'),(2,'Raymon Oleaga','rayray','ray@designbuddy.com','664440b7e3cbb43132867ac382b81e9f','2015-08-25 10:04:14','1991-05-05 00:00:00','4013010680'),(3,'Sue Su','suesu','suesu@gmail.com','a12dcaa57b2bc97b60fc2015e64cbec2','2015-08-25 10:23:50','1991-05-05 00:00:00','4087020692'),(4,'Elton Malave','malave','malave@gmail.com','1a77eb1d1d0cbb1692e9e2610e6954e2','2015-08-25 17:15:02','1991-05-05 00:00:00',NULL),(5,'Helena Custard','helena','helena@gmail.com','2876838571fae268c28e0de99839a89c','2015-08-25 17:26:54','1991-05-05 00:00:00',NULL),(6,'Sabina Casady','sabina','sabina@gmail.com','5ee17fb9841f93b214c88734685309a7','2015-08-25 17:29:22','1991-05-05 00:00:00',NULL),(7,'Francene Widell','francene','francene@gmail.com','bd420085dbd5fd23ab459ac902ea8715','2015-08-25 17:41:00','1991-05-05 00:00:00',NULL),(8,'Chris Baker','chris','chris@gmail.com','6c6d9676f341c3d8240a90e09e8ba6e4','2015-08-26 09:02:07','1991-05-05 00:00:00',NULL),(16,'Jessica Davidson','jessica','jessica@gmail.com','8a694c8394dc7ed50f4bec4eb259fc29','2015-08-26 10:07:06','2015-08-11 00:00:00',NULL),(17,'Ivan Cometa','van','van@gmail.com','a74db3b169d723241f58b1d611100a0a','2015-08-26 10:39:58','1992-05-24 00:00:00',NULL),(18,'Jimmy','jimmy','jimmy@gmail.com','b4cc28efc75478348b9f628acd7ef716','2015-08-26 12:48:36','1986-05-20 00:00:00',NULL),(19,'New user','newuser','newuser@gmail.com','4c2fcf1567cfcc8611ec257249414179','2015-08-26 12:57:37','1992-09-26 00:00:00',NULL),(20,'New User 2','newuser2','newuser2@gmail.com','5707ac2e31ca28b8d4616c136c89f7e2','2015-08-26 13:16:26','1989-09-25 00:00:00',NULL),(21,'New User 3','newuser3','newuser3@gmail.com','1ec3a6624cc2806737fd3486cd39a176','2015-08-26 13:50:02','1988-10-12 00:00:00',NULL),(22,'Isaac Lee',NULL,'isaac@gmail.com','72026ce930053a12b3b40dd0ecdfa495','2015-08-31 13:19:14','1974-07-21 00:00:00',NULL);
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

-- Dump completed on 2015-08-31 20:12:44
