-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: playing_cards
-- ------------------------------------------------------
-- Server version	5.5.48-log

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
-- Table structure for table `card_state`
--

DROP TABLE IF EXISTS `card_state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `card_state` (
  `cs_id` int(11) NOT NULL AUTO_INCREMENT,
  `card_id` varchar(10) DEFAULT NULL,
  `idx_container` int(11) DEFAULT NULL,
  `container` varchar(45) DEFAULT NULL,
  `game_id` int(11) DEFAULT NULL,
  `idx_board` int(11) DEFAULT NULL,
  PRIMARY KEY (`cs_id`)
) ENGINE=InnoDB AUTO_INCREMENT=524 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `card_state`
--

LOCK TABLES `card_state` WRITE;
/*!40000 ALTER TABLE `card_state` DISABLE KEYS */;
INSERT INTO `card_state` VALUES (420,'ac',0,'clubs',4,6),(421,'ah',0,'hearts',4,29),(422,'9h',0,'hearts',4,38),(423,'10h',0,'hearts',4,31),(424,'as',0,'spades',4,14),(425,'10c',0,'board',4,41),(426,'10d',0,'board',4,45),(427,'10s',0,'board',4,39),(428,'2c',0,'board',4,33),(429,'2d',0,'board',4,30),(430,'2h',0,'board',4,50),(431,'2s',0,'board',4,28),(432,'3c',0,'board',4,32),(433,'3d',0,'board',4,44),(434,'3h',0,'board',4,0),(435,'3s',0,'board',4,27),(436,'4c',0,'board',4,17),(437,'4d',0,'board',4,12),(438,'4h',0,'board',4,4),(439,'4s',0,'board',4,36),(440,'5c',0,'board',4,8),(441,'5d',0,'board',4,46),(442,'5h',0,'board',4,40),(443,'5s',0,'board',4,21),(444,'6c',0,'board',4,15),(445,'6d',0,'board',4,25),(446,'6h',0,'board',4,24),(447,'6s',0,'board',4,10),(448,'7c',0,'board',4,23),(449,'7d',0,'board',4,11),(450,'7h',0,'board',4,2),(451,'7s',0,'board',4,20),(452,'8c',0,'board',4,42),(453,'8d',0,'board',4,51),(454,'8h',0,'board',4,49),(455,'8s',0,'board',4,37),(456,'9c',0,'board',4,16),(457,'9d',0,'board',4,7),(458,'9s',0,'board',4,43),(459,'ad',0,'board',4,22),(460,'jc',0,'board',4,19),(461,'jd',0,'board',4,9),(462,'jh',0,'board',4,1),(463,'js',0,'board',4,5),(464,'kc',0,'clubs',4,13),(465,'kd',0,'board',4,26),(466,'kh',0,'board',4,18),(467,'ks',0,'board',4,34),(468,'qc',0,'board',4,3),(469,'qd',0,'board',4,35),(470,'qh',0,'board',4,48),(471,'qs',0,'board',4,47),(472,'4c',0,'clubs',13,2),(473,'2c',0,'clubs',13,3),(474,'kc',0,'clubs',13,7),(475,'8c',0,'clubs',13,13),(476,'3c',0,'clubs',13,16),(477,'7c',0,'clubs',13,21),(478,'jc',0,'clubs',13,31),(479,'10c',0,'clubs',13,34),(480,'5c',0,'clubs',13,36),(481,'6c',0,'clubs',13,38),(482,'qc',0,'clubs',13,41),(483,'ac',0,'clubs',13,47),(484,'4h',0,'hearts',13,0),(485,'6h',0,'hearts',13,4),(486,'qh',0,'hearts',13,6),(487,'5h',0,'hearts',13,10),(488,'jh',0,'hearts',13,11),(489,'10h',0,'hearts',13,14),(490,'ah',0,'hearts',13,8),(491,'7h',0,'hearts',13,19),(492,'3h',0,'hearts',13,28),(493,'8h',0,'hearts',13,15),(494,'9h',0,'hearts',13,37),(495,'kh',0,'hearts',13,30),(496,'3s',0,'spades',13,1),(497,'9s',0,'spades',13,12),(498,'8s',0,'spades',13,9),(499,'4s',0,'spades',13,18),(500,'as',0,'spades',13,22),(501,'7s',0,'spades',13,26),(502,'qs',0,'spades',13,27),(503,'2s',0,'spades',13,29),(504,'5s',0,'spades',13,33),(505,'ks',0,'spades',13,23),(506,'js',0,'spades',13,35),(507,'10s',0,'spades',13,42),(508,'6s',0,'spades',13,40),(509,'4d',0,'diamonds',13,17),(510,'3d',0,'diamonds',13,20),(511,'8d',0,'diamonds',13,24),(512,'2d',0,'diamonds',13,25),(513,'6d',0,'diamonds',13,32),(514,'5d',0,'diamonds',13,39),(515,'9d',0,'diamonds',13,5),(516,'qd',0,'diamonds',13,44),(517,'7d',0,'diamonds',13,45),(518,'10d',0,'diamonds',13,43),(519,'kd',0,'diamonds',13,46),(520,'2h',0,'board',13,51),(521,'9c',0,'board',13,48),(522,'ad',0,'board',13,49),(523,'jd',0,'board',13,50);
/*!40000 ALTER TABLE `card_state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cards`
--

DROP TABLE IF EXISTS `cards`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cards` (
  `c_id` varchar(10) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `suit` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cards`
--

LOCK TABLES `cards` WRITE;
/*!40000 ALTER TABLE `cards` DISABLE KEYS */;
INSERT INTO `cards` VALUES ('10c','/resources/10_of_clubs.png','clubs'),('10d','/resources/10_of_diamonds.png','diamonds'),('10h','/resources/10_of_hearts.png','hearts'),('10s','/resources/10_of_spades.png','spades'),('2c','/resources/2_of_clubs.png','clubs'),('2d','/resources/2_of_diamonds.png','diamonds'),('2h','/resources/2_of_hearts.png','hearts'),('2s','/resources/2_of_spades.png','spades'),('3c','/resources/3_of_clubs.png','clubs'),('3d','/resources/3_of_diamonds.png','diamonds'),('3h','/resources/3_of_hearts.png','hearts'),('3s','/resources/3_of_spades.png','spades'),('4c','/resources/4_of_clubs.png','clubs'),('4d','/resources/4_of_diamonds.png','diamonds'),('4h','/resources/4_of_hearts.png','hearts'),('4s','/resources/4_of_spades.png','spades'),('5c','/resources/5_of_clubs.png','clubs'),('5d','/resources/5_of_diamonds.png','diamonds'),('5h','/resources/5_of_hearts.png','hearts'),('5s','/resources/5_of_spades.png','spades'),('6c','/resources/6_of_clubs.png','clubs'),('6d','/resources/6_of_diamonds.png','diamonds'),('6h','/resources/6_of_hearts.png','hearts'),('6s','/resources/6_of_spades.png','spades'),('7c','/resources/7_of_clubs.png','clubs'),('7d','/resources/7_of_diamonds.png','diamonds'),('7h','/resources/7_of_hearts.png','hearts'),('7s','/resources/7_of_spades.png','spades'),('8c','/resources/8_of_clubs.png','clubs'),('8d','/resources/8_of_diamonds.png','diamonds'),('8h','/resources/8_of_hearts.png','hearts'),('8s','/resources/8_of_spades.png','spades'),('9c','/resources/9_of_clubs.png','clubs'),('9d','/resources/9_of_diamonds.png','diamonds'),('9h','/resources/9_of_hearts.png','hearts'),('9s','/resources/9_of_spades.png','spades'),('ac','/resources/ace_of_clubs.png','clubs'),('ad','/resources/ace_of_diamonds.png','diamonds'),('ah','/resources/ace_of_hearts.png','hearts'),('as','/resources/ace_of_spades2.png','spades'),('jc','/resources/jack_of_clubs2.png','clubs'),('jd','/resources/jack_of_diamonds2.png','diamonds'),('jh','/resources/jack_of_hearts2.png','hearts'),('js','/resources/jack_of_spades2.png','spades'),('kc','/resources/king_of_clubs2.png','clubs'),('kd','/resources/king_of_diamonds2.png','diamonds'),('kh','/resources/king_of_hearts2.png','hearts'),('ks','/resources/king_of_spades2.png','spades'),('qc','/resources/queen_of_clubs2.png','clubs'),('qd','/resources/queen_of_diamonds2.png','diamonds'),('qh','/resources/queen_of_hearts2.png','hearts'),('qs','/resources/queen_of_spades2.png','spades');
/*!40000 ALTER TABLE `cards` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `game`
--

DROP TABLE IF EXISTS `game`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `game` (
  `g_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `completed` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`g_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `game`
--

LOCK TABLES `game` WRITE;
/*!40000 ALTER TABLE `game` DISABLE KEYS */;
INSERT INTO `game` VALUES (4,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1),(13,1,'2017-11-28 23:22:31','0000-00-00 00:00:00',1),(14,1,'2017-11-28 23:30:21','0000-00-00 00:00:00',0);
/*!40000 ALTER TABLE `game` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'sandeep','pawarsandeep@live.com','sandeep');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-11-29  5:47:21
