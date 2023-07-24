-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: csv_database
-- ------------------------------------------------------
-- Server version	5.6.51

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `contacts_m`
--

DROP TABLE IF EXISTS `contacts_m`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contacts_m` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `creation_time` datetime DEFAULT NULL,
  `modification_time` datetime DEFAULT NULL,
  `salutation` varchar(50) DEFAULT NULL,
  `first_name` varchar(80) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `date_of_birth_string` varchar(80) DEFAULT NULL,
  `date_of_birth_int` bigint(20) DEFAULT NULL,
  `country` varchar(60) DEFAULT NULL,
  `country_int` int(11) DEFAULT NULL,
  `email` varchar(320) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `language1_string` varchar(60) DEFAULT NULL,
  `language1_int` int(11) DEFAULT NULL,
  `language2_string` varchar(60) DEFAULT NULL,
  `language2_int` int(11) DEFAULT NULL,
  `language3_string` varchar(60) DEFAULT NULL,
  `language3_int` int(11) DEFAULT NULL,
  `language4_string` varchar(60) DEFAULT NULL,
  `language4_int` int(11) DEFAULT NULL,
  `language5_string` varchar(60) DEFAULT NULL,
  `language5_int` int(11) DEFAULT NULL,
  `language6_string` varchar(60) DEFAULT NULL,
  `language6_int` int(11) DEFAULT NULL,
  `language7_string` varchar(60) DEFAULT NULL,
  `language7_int` int(11) DEFAULT NULL,
  `language8_string` varchar(60) DEFAULT NULL,
  `language8_int` int(11) DEFAULT NULL,
  `creation_time_int` bigint(20) DEFAULT NULL,
  `modification_time_int` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts_m`
--

LOCK TABLES `contacts_m` WRITE;
/*!40000 ALTER TABLE `contacts_m` DISABLE KEYS */;
INSERT INTO `contacts_m` VALUES (1,'2025-01-23 10:23:56','2025-01-23 10:23:56','Herr','Albrecht','Baumgartl','01.01.2001',0,'Deutschland',83,'ab@w3work.de','1111111111','',0,'',0,'',0,'',0,'',0,'',0,'',0,'',0,222236,222236),(2,'2025-01-23 10:23:56','2025-01-23 10:23:56','Frau','Aline','KÃ¶hler','01.02.2002',0,'Deutschland',83,'ak@w3work.de','2222222222','',0,'',0,'',0,'',0,'',0,'',0,'',0,'',0,222236,222236),(3,'2025-01-23 10:23:56','2025-01-23 10:23:56','Frau','Antje','PÃ¶nitz','01.03.2003',0,'Deutschland',83,'ap@w3work.de','3333333333','',0,'',0,'',0,'',0,'',0,'',0,'',0,'',0,222236,222236),(4,'2025-01-23 10:23:56','2025-01-23 10:23:56','Frau','Daniela','Steinberg','01.04.2004',0,'Deutschland',83,'ds@w3work.de','4444444444','',0,'',0,'',0,'',0,'',0,'',0,'',0,'',0,222236,222236),(5,'2025-01-23 10:23:56','2025-01-23 10:23:56','Frau','Diana','Wagner','01.05.2005',0,'Deutschland',83,'dw@w3work.de','5555555555','',0,'',0,'',0,'',0,'',0,'',0,'',0,'',0,222236,222236);
/*!40000 ALTER TABLE `contacts_m` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countries_m`
--

DROP TABLE IF EXISTS `countries_m`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `countries_m` (
  `id_co` bigint(20) NOT NULL AUTO_INCREMENT,
  `code` varchar(3) DEFAULT NULL,
  `name_en` varchar(100) DEFAULT NULL,
  `name_de` varchar(100) DEFAULT NULL,
  `name_it` varchar(100) DEFAULT NULL,
  `name_es` varchar(100) DEFAULT NULL,
  `name_fr` varchar(100) DEFAULT NULL,
  `name_ru` varchar(100) DEFAULT NULL,
  `dictionary` text,
  PRIMARY KEY (`id_co`)
) ENGINE=InnoDB AUTO_INCREMENT=253 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries_m`
--

LOCK TABLES `countries_m` WRITE;
/*!40000 ALTER TABLE `countries_m` DISABLE KEYS */;
INSERT INTO `countries_m` VALUES (1,'AF','Afghanistan','Afghanistan',NULL,NULL,NULL,NULL,NULL),(2,'AX','Aland Islands','Aland Islands',NULL,NULL,NULL,NULL,NULL),(3,'AL','Albania','Albanien',NULL,NULL,NULL,NULL,NULL),(4,'DZ','Algeria','Algerien',NULL,NULL,NULL,NULL,NULL),(5,'AS','American Samoa','Amerikanischen Samoa-Inseln',NULL,NULL,NULL,NULL,NULL),(6,'AD','Andorra','Andorra',NULL,NULL,NULL,NULL,NULL),(7,'AO','Angola','Angola',NULL,NULL,NULL,NULL,NULL),(8,'AI','Anguilla','Anguilla',NULL,NULL,NULL,NULL,NULL),(9,'AQ','Antarctica','Antarktis',NULL,NULL,NULL,NULL,NULL),(10,'AG','Antigua and Barbuda','Antigua und Barbuda',NULL,NULL,NULL,NULL,NULL),(11,'AR','Argentina','Argentinien',NULL,NULL,NULL,NULL,NULL),(12,'AM','Armenia','Armenien',NULL,NULL,NULL,NULL,NULL),(13,'AW','Aruba','Aruba',NULL,NULL,NULL,NULL,NULL),(14,'AU','Australia','Australien',NULL,NULL,NULL,NULL,NULL),(15,'AT','Austria','Ã–sterreich',NULL,NULL,NULL,NULL,NULL),(16,'AZ','Azerbaijan','Aserbaidschan',NULL,NULL,NULL,NULL,NULL),(17,'BS','Bahamas','Bahamas',NULL,NULL,NULL,NULL,NULL),(18,'BH','Bahrain','Bahrain',NULL,NULL,NULL,NULL,NULL),(19,'BD','Bangladesh','Bangladesch',NULL,NULL,NULL,NULL,NULL),(20,'BB','Barbados','Barbados',NULL,NULL,NULL,NULL,NULL),(21,'BY','Belarus','WeiÃŸrussland',NULL,NULL,NULL,NULL,NULL),(22,'BE','Belgium','Belgien',NULL,NULL,NULL,NULL,NULL),(23,'BZ','Belize','Belize',NULL,NULL,NULL,NULL,NULL),(24,'BJ','Benin','Benin',NULL,NULL,NULL,NULL,NULL),(25,'BM','Bermuda','Bermuda',NULL,NULL,NULL,NULL,NULL),(26,'BT','Bhutan','Bhutan',NULL,NULL,NULL,NULL,NULL),(27,'BO','Bolivia','Bolivien',NULL,NULL,NULL,NULL,NULL),(28,'BQ','Bonaire, Sint Eustatius and Saba','Bonaire, Sint Eustatius und Saba',NULL,NULL,NULL,NULL,NULL),(29,'BA','Bosnia and Herzegovina','Bosnien und Herzegowina',NULL,NULL,NULL,NULL,NULL),(30,'BW','Botswana','Botswana',NULL,NULL,NULL,NULL,NULL),(31,'BV','Bouvet Island','Bouvet Island',NULL,NULL,NULL,NULL,NULL),(32,'BR','Brazil','Brasilien',NULL,NULL,NULL,NULL,NULL),(33,'IO','British Indian Ocean Territory','Britisches Territorium des Indischen Ozeans',NULL,NULL,NULL,NULL,NULL),(34,'BN','Brunei Darussalam','Brunei Darussalam',NULL,NULL,NULL,NULL,NULL),(35,'BG','Bulgaria','Bulgarien',NULL,NULL,NULL,NULL,NULL),(36,'BF','Burkina Faso','Burkina Faso',NULL,NULL,NULL,NULL,NULL),(37,'BI','Burundi','Burundi',NULL,NULL,NULL,NULL,NULL),(38,'KH','Cambodia','Kambodscha',NULL,NULL,NULL,NULL,NULL),(39,'CM','Cameroon','Kamerun',NULL,NULL,NULL,NULL,NULL),(40,'CA','Canada','Kanada',NULL,NULL,NULL,NULL,NULL),(41,'CV','Cape Verde','Kap Verde',NULL,NULL,NULL,NULL,NULL),(42,'KY','Cayman Islands','Cayman Inseln',NULL,NULL,NULL,NULL,NULL),(43,'CF','Central African Republic','Zentralafrikanische Republik',NULL,NULL,NULL,NULL,NULL),(44,'TD','Chad','Tschad',NULL,NULL,NULL,NULL,NULL),(45,'CL','Chile','Chile',NULL,NULL,NULL,NULL,NULL),(46,'CN','China','China',NULL,NULL,NULL,NULL,NULL),(47,'CX','Christmas Island','Weihnachtsinsel',NULL,NULL,NULL,NULL,NULL),(48,'CC','Cocos (Keeling) Islands','Kokosinseln (Keelinginseln)',NULL,NULL,NULL,NULL,NULL),(49,'CO','Colombia','Kolumbien',NULL,NULL,NULL,NULL,NULL),(50,'KM','Comoros','Komoren',NULL,NULL,NULL,NULL,NULL),(51,'CG','Congo','Kongo',NULL,NULL,NULL,NULL,NULL),(52,'CD','Congo, Democratic Republic of the Congo','Kongo, Demokratische Republik Kongo',NULL,NULL,NULL,NULL,NULL),(53,'CK','Cook Islands','Cookinseln',NULL,NULL,NULL,NULL,NULL),(54,'CR','Costa Rica','Costa Rica',NULL,NULL,NULL,NULL,NULL),(55,'CI','Cote D\'Ivoire','ElfenbeinkÃ¼ste',NULL,NULL,NULL,NULL,NULL),(56,'HR','Croatia','Kroatien',NULL,NULL,NULL,NULL,NULL),(57,'CU','Cuba','Kuba',NULL,NULL,NULL,NULL,NULL),(58,'CW','Curacao','Curacao',NULL,NULL,NULL,NULL,NULL),(59,'CY','Cyprus','Zypern',NULL,NULL,NULL,NULL,NULL),(60,'CZ','Czech Republic','Tschechien',NULL,NULL,NULL,NULL,NULL),(61,'DK','Denmark','DÃ¤nemark',NULL,NULL,NULL,NULL,NULL),(62,'DJ','Djibouti','Dschibuti',NULL,NULL,NULL,NULL,NULL),(63,'DM','Dominica','Dominica',NULL,NULL,NULL,NULL,NULL),(64,'DO','Dominican Republic','Dominikanische Republik',NULL,NULL,NULL,NULL,NULL),(65,'EC','Ecuador','Ecuador',NULL,NULL,NULL,NULL,NULL),(66,'EG','Egypt','Ã„gypten',NULL,NULL,NULL,NULL,NULL),(67,'SV','El Salvador','El Salvador',NULL,NULL,NULL,NULL,NULL),(68,'GQ','Equatorial Guinea','Ã„quatorialguinea',NULL,NULL,NULL,NULL,NULL),(69,'ER','Eritrea','Eritrea',NULL,NULL,NULL,NULL,NULL),(70,'EE','Estonia','Estland',NULL,NULL,NULL,NULL,NULL),(71,'ET','Ethiopia','Ã„thiopien',NULL,NULL,NULL,NULL,NULL),(72,'FK','Falkland Islands (Malvinas)','Falklandinseln (Malvinas)',NULL,NULL,NULL,NULL,NULL),(73,'FO','Faroe Islands','FÃ¤rÃ¶er Inseln',NULL,NULL,NULL,NULL,NULL),(74,'FJ','Fiji','Fidschi',NULL,NULL,NULL,NULL,NULL),(75,'FI','Finland','Finnland',NULL,NULL,NULL,NULL,NULL),(76,'FR','France','Frankreich',NULL,NULL,NULL,NULL,NULL),(77,'GF','French Guiana','FranzÃ¶sisch-Guayana',NULL,NULL,NULL,NULL,NULL),(78,'PF','French Polynesia','FranzÃ¶sisch Polynesien',NULL,NULL,NULL,NULL,NULL),(79,'TF','French Southern Territories','SÃ¼dfranzÃ¶sische Territorien',NULL,NULL,NULL,NULL,NULL),(80,'GA','Gabon','Gabun',NULL,NULL,NULL,NULL,NULL),(81,'GM','Gambia','Gambia',NULL,NULL,NULL,NULL,NULL),(82,'GE','Georgia','Georgia',NULL,NULL,NULL,NULL,NULL),(83,'DE','Germany','Deutschland',NULL,NULL,NULL,NULL,NULL),(84,'GH','Ghana','Ghana',NULL,NULL,NULL,NULL,NULL),(85,'GI','Gibraltar','Gibraltar',NULL,NULL,NULL,NULL,NULL),(86,'GR','Greece','Griechenland',NULL,NULL,NULL,NULL,NULL),(87,'GL','Greenland','GrÃ¶nland',NULL,NULL,NULL,NULL,NULL),(88,'GD','Grenada','Grenada',NULL,NULL,NULL,NULL,NULL),(89,'GP','Guadeloupe','Guadeloupe',NULL,NULL,NULL,NULL,NULL),(90,'GU','Guam','Guam',NULL,NULL,NULL,NULL,NULL),(91,'GT','Guatemala','Guatemala',NULL,NULL,NULL,NULL,NULL),(92,'GG','Guernsey','Guernsey',NULL,NULL,NULL,NULL,NULL),(93,'GN','Guinea','Guinea',NULL,NULL,NULL,NULL,NULL),(94,'GW','Guinea-Bissau','Guinea-Bissau',NULL,NULL,NULL,NULL,NULL),(95,'GY','Guyana','Guyana',NULL,NULL,NULL,NULL,NULL),(96,'HT','Haiti','Haiti',NULL,NULL,NULL,NULL,NULL),(97,'HM','Heard Island and Mcdonald Islands','Heard Island und McDonald Islands',NULL,NULL,NULL,NULL,NULL),(98,'VA','Holy See (Vatican City State)','Heiliger Stuhl (Staat der Vatikanstadt)',NULL,NULL,NULL,NULL,NULL),(99,'HN','Honduras','Honduras',NULL,NULL,NULL,NULL,NULL),(100,'HK','Hong Kong','Hongkong',NULL,NULL,NULL,NULL,NULL),(101,'HU','Hungary','Ungarn',NULL,NULL,NULL,NULL,NULL),(102,'IS','Iceland','Island',NULL,NULL,NULL,NULL,NULL),(103,'IN','India','Indien',NULL,NULL,NULL,NULL,NULL),(104,'ID','Indonesia','Indonesien',NULL,NULL,NULL,NULL,NULL),(105,'IR','Iran, Islamic Republic of','Iran, Islamische Republik',NULL,NULL,NULL,NULL,NULL),(106,'IQ','Iraq','Irak',NULL,NULL,NULL,NULL,NULL),(107,'IE','Ireland','Irland',NULL,NULL,NULL,NULL,NULL),(108,'IM','Isle of Man','Isle of Man',NULL,NULL,NULL,NULL,NULL),(109,'IL','Israel','Israel',NULL,NULL,NULL,NULL,NULL),(110,'IT','Italy','Italien',NULL,NULL,NULL,NULL,NULL),(111,'JM','Jamaica','Jamaika',NULL,NULL,NULL,NULL,NULL),(112,'JP','Japan','Japan',NULL,NULL,NULL,NULL,NULL),(113,'JE','Jersey','Jersey',NULL,NULL,NULL,NULL,NULL),(114,'JO','Jordan','Jordanien',NULL,NULL,NULL,NULL,NULL),(115,'KZ','Kazakhstan','Kasachstan',NULL,NULL,NULL,NULL,NULL),(116,'KE','Kenya','Kenia',NULL,NULL,NULL,NULL,NULL),(117,'KI','Kiribati','Kiribati',NULL,NULL,NULL,NULL,NULL),(118,'KP','Korea, Democratic People\'s Republic of','Korea, Demokratische Volksrepublik',NULL,NULL,NULL,NULL,NULL),(119,'KR','Korea, Republic of','Korea, Republik von',NULL,NULL,NULL,NULL,NULL),(120,'XK','Kosovo','Kosovo',NULL,NULL,NULL,NULL,NULL),(121,'KW','Kuwait','Kuwait',NULL,NULL,NULL,NULL,NULL),(122,'KG','Kyrgyzstan','Kirgisistan',NULL,NULL,NULL,NULL,NULL),(123,'LA','Lao People\'s Democratic Republic','Demokratische Volksrepublik Laos',NULL,NULL,NULL,NULL,NULL),(124,'LV','Latvia','Lettland',NULL,NULL,NULL,NULL,NULL),(125,'LB','Lebanon','Libanon',NULL,NULL,NULL,NULL,NULL),(126,'LS','Lesotho','Lesotho',NULL,NULL,NULL,NULL,NULL),(127,'LR','Liberia','Liberia',NULL,NULL,NULL,NULL,NULL),(128,'LY','Libyan Arab Jamahiriya','Libyscher arabischer Jamahiriya',NULL,NULL,NULL,NULL,NULL),(129,'LI','Liechtenstein','Liechtenstein',NULL,NULL,NULL,NULL,NULL),(130,'LT','Lithuania','Litauen',NULL,NULL,NULL,NULL,NULL),(131,'LU','Luxembourg','Luxemburg',NULL,NULL,NULL,NULL,NULL),(132,'MO','Macao','Macao',NULL,NULL,NULL,NULL,NULL),(133,'MK','Macedonia, the Former Yugoslav Republic of','Mazedonien, die ehemalige jugoslawische Republik',NULL,NULL,NULL,NULL,NULL),(134,'MG','Madagascar','Madagaskar',NULL,NULL,NULL,NULL,NULL),(135,'MW','Malawi','Malawi',NULL,NULL,NULL,NULL,NULL),(136,'MY','Malaysia','Malaysia',NULL,NULL,NULL,NULL,NULL),(137,'MV','Maldives','Malediven',NULL,NULL,NULL,NULL,NULL),(138,'ML','Mali','Mali',NULL,NULL,NULL,NULL,NULL),(139,'MT','Malta','Malta',NULL,NULL,NULL,NULL,NULL),(140,'MH','Marshall Islands','Marshallinseln',NULL,NULL,NULL,NULL,NULL),(141,'MQ','Martinique','Martinique',NULL,NULL,NULL,NULL,NULL),(142,'MR','Mauritania','Mauretanien',NULL,NULL,NULL,NULL,NULL),(143,'MU','Mauritius','Mauritius',NULL,NULL,NULL,NULL,NULL),(144,'YT','Mayotte','Mayotte',NULL,NULL,NULL,NULL,NULL),(145,'MX','Mexico','Mexiko',NULL,NULL,NULL,NULL,NULL),(146,'FM','Micronesia, Federated States of','Mikronesien, FÃ¶derierte Staaten von',NULL,NULL,NULL,NULL,NULL),(147,'MD','Moldova, Republic of','Moldawien, Republik',NULL,NULL,NULL,NULL,NULL),(148,'MC','Monaco','Monaco',NULL,NULL,NULL,NULL,NULL),(149,'MN','Mongolia','Mongolei',NULL,NULL,NULL,NULL,NULL),(150,'ME','Montenegro','Montenegro',NULL,NULL,NULL,NULL,NULL),(151,'MS','Montserrat','Montserrat',NULL,NULL,NULL,NULL,NULL),(152,'MA','Morocco','Marokko',NULL,NULL,NULL,NULL,NULL),(153,'MZ','Mozambique','Mosambik',NULL,NULL,NULL,NULL,NULL),(154,'MM','Myanmar','Myanmar',NULL,NULL,NULL,NULL,NULL),(155,'NA','Namibia','Namibia',NULL,NULL,NULL,NULL,NULL),(156,'NR','Nauru','Nauru',NULL,NULL,NULL,NULL,NULL),(157,'NP','Nepal','Nepal',NULL,NULL,NULL,NULL,NULL),(158,'NL','Netherlands','Niederlande',NULL,NULL,NULL,NULL,NULL),(159,'AN','Netherlands Antilles','NiederlÃ¤ndische Antillen',NULL,NULL,NULL,NULL,NULL),(160,'NC','New Caledonia','Neu-Kaledonien',NULL,NULL,NULL,NULL,NULL),(161,'NZ','New Zealand','Neuseeland',NULL,NULL,NULL,NULL,NULL),(162,'NI','Nicaragua','Nicaragua',NULL,NULL,NULL,NULL,NULL),(163,'NE','Niger','Niger',NULL,NULL,NULL,NULL,NULL),(164,'NG','Nigeria','Nigeria',NULL,NULL,NULL,NULL,NULL),(165,'NU','Niue','Niue',NULL,NULL,NULL,NULL,NULL),(166,'NF','Norfolk Island','Norfolkinsel',NULL,NULL,NULL,NULL,NULL),(167,'MP','Northern Mariana Islands','NÃ¶rdliche Marianneninseln',NULL,NULL,NULL,NULL,NULL),(168,'NO','Norway','Norwegen',NULL,NULL,NULL,NULL,NULL),(169,'OM','Oman','Oman',NULL,NULL,NULL,NULL,NULL),(170,'PK','Pakistan','Pakistan',NULL,NULL,NULL,NULL,NULL),(171,'PW','Palau','Palau',NULL,NULL,NULL,NULL,NULL),(172,'PS','Palestinian Territory, Occupied','Besetzte palÃ¤stinensische Gebiete',NULL,NULL,NULL,NULL,NULL),(173,'PA','Panama','Panama',NULL,NULL,NULL,NULL,NULL),(174,'PG','Papua New Guinea','Papua Neu-Guinea',NULL,NULL,NULL,NULL,NULL),(175,'PY','Paraguay','Paraguay',NULL,NULL,NULL,NULL,NULL),(176,'PE','Peru','Peru',NULL,NULL,NULL,NULL,NULL),(177,'PH','Philippines','Philippinen',NULL,NULL,NULL,NULL,NULL),(178,'PN','Pitcairn','Pitcairn',NULL,NULL,NULL,NULL,NULL),(179,'PL','Poland','Polen',NULL,NULL,NULL,NULL,NULL),(180,'PT','Portugal','Portugal',NULL,NULL,NULL,NULL,NULL),(181,'PR','Puerto Rico','Puerto Rico',NULL,NULL,NULL,NULL,NULL),(182,'QA','Qatar','Katar',NULL,NULL,NULL,NULL,NULL),(183,'RE','Reunion','Wiedervereinigung',NULL,NULL,NULL,NULL,NULL),(184,'RO','Romania','RumÃ¤nien',NULL,NULL,NULL,NULL,NULL),(185,'RU','Russian Federation','Russische FÃ¶deration',NULL,NULL,NULL,NULL,NULL),(186,'RW','Rwanda','Ruanda',NULL,NULL,NULL,NULL,NULL),(187,'BL','Saint Barthelemy','Heiliger Barthelemy',NULL,NULL,NULL,NULL,NULL),(188,'SH','Saint Helena','Heilige Helena',NULL,NULL,NULL,NULL,NULL),(189,'KN','Saint Kitts and Nevis','St. Kitts und Nevis',NULL,NULL,NULL,NULL,NULL),(190,'LC','Saint Lucia','St. Lucia',NULL,NULL,NULL,NULL,NULL),(191,'MF','Saint Martin','Sankt Martin',NULL,NULL,NULL,NULL,NULL),(192,'PM','Saint Pierre and Miquelon','Saint Pierre und Miquelon',NULL,NULL,NULL,NULL,NULL),(193,'VC','Saint Vincent and the Grenadines','St. Vincent und die Grenadinen',NULL,NULL,NULL,NULL,NULL),(194,'WS','Samoa','Samoa',NULL,NULL,NULL,NULL,NULL),(195,'SM','San Marino','San Marino',NULL,NULL,NULL,NULL,NULL),(196,'ST','Sao Tome and Principe','Sao Tome und Principe',NULL,NULL,NULL,NULL,NULL),(197,'SA','Saudi Arabia','Saudi-Arabien',NULL,NULL,NULL,NULL,NULL),(198,'SN','Senegal','Senegal',NULL,NULL,NULL,NULL,NULL),(199,'RS','Serbia','Serbien',NULL,NULL,NULL,NULL,NULL),(200,'CS','Serbia and Montenegro','Serbien und Montenegro',NULL,NULL,NULL,NULL,NULL),(201,'SC','Seychelles','Seychellen',NULL,NULL,NULL,NULL,NULL),(202,'SL','Sierra Leone','Sierra Leone',NULL,NULL,NULL,NULL,NULL),(203,'SG','Singapore','Singapur',NULL,NULL,NULL,NULL,NULL),(204,'SX','Sint Maarten','St. Martin',NULL,NULL,NULL,NULL,NULL),(205,'SK','Slovakia','Slowakei',NULL,NULL,NULL,NULL,NULL),(206,'SI','Slovenia','Slowenien',NULL,NULL,NULL,NULL,NULL),(207,'SB','Solomon Islands','Salomon-Inseln',NULL,NULL,NULL,NULL,NULL),(208,'SO','Somalia','Somalia',NULL,NULL,NULL,NULL,NULL),(209,'ZA','South Africa','SÃ¼dafrika',NULL,NULL,NULL,NULL,NULL),(210,'GS','South Georgia and the South Sandwich Islands','SÃ¼d-Georgien und die sÃ¼dlichen Sandwich-Inseln',NULL,NULL,NULL,NULL,NULL),(211,'SS','South Sudan','SÃ¼dsudan',NULL,NULL,NULL,NULL,NULL),(212,'ES','Spain','Spanien',NULL,NULL,NULL,NULL,NULL),(213,'LK','Sri Lanka','Sri Lanka',NULL,NULL,NULL,NULL,NULL),(214,'SD','Sudan','Sudan',NULL,NULL,NULL,NULL,NULL),(215,'SR','Suriname','Suriname',NULL,NULL,NULL,NULL,NULL),(216,'SJ','Svalbard and Jan Mayen','Spitzbergen und Jan Mayen',NULL,NULL,NULL,NULL,NULL),(217,'SZ','Swaziland','Swasiland',NULL,NULL,NULL,NULL,NULL),(218,'SE','Sweden','Schweden',NULL,NULL,NULL,NULL,NULL),(219,'CH','Switzerland','Schweiz',NULL,NULL,NULL,NULL,NULL),(220,'SY','Syrian Arab Republic','Syrische Arabische Republik',NULL,NULL,NULL,NULL,NULL),(221,'TW','Taiwan, Province of China','Taiwan, Provinz Chinas',NULL,NULL,NULL,NULL,NULL),(222,'TJ','Tajikistan','Tadschikistan',NULL,NULL,NULL,NULL,NULL),(223,'TZ','Tanzania, United Republic of','Tansania, Vereinigte Republik',NULL,NULL,NULL,NULL,NULL),(224,'TH','Thailand','Thailand',NULL,NULL,NULL,NULL,NULL),(225,'TL','Timor-Leste','Timor-Leste',NULL,NULL,NULL,NULL,NULL),(226,'TG','Togo','Gehen',NULL,NULL,NULL,NULL,NULL),(227,'TK','Tokelau','Tokelau',NULL,NULL,NULL,NULL,NULL),(228,'TO','Tonga','Tonga',NULL,NULL,NULL,NULL,NULL),(229,'TT','Trinidad and Tobago','Trinidad und Tobago',NULL,NULL,NULL,NULL,NULL),(230,'TN','Tunisia','Tunesien',NULL,NULL,NULL,NULL,NULL),(231,'TR','Turkey','TÃ¼rkei',NULL,NULL,NULL,NULL,NULL),(232,'TM','Turkmenistan','Turkmenistan',NULL,NULL,NULL,NULL,NULL),(233,'TC','Turks and Caicos Islands','Turks- und Caicosinseln',NULL,NULL,NULL,NULL,NULL),(234,'TV','Tuvalu','Tuvalu',NULL,NULL,NULL,NULL,NULL),(235,'UG','Uganda','Uganda',NULL,NULL,NULL,NULL,NULL),(236,'UA','Ukraine','Ukraine',NULL,NULL,NULL,NULL,NULL),(237,'AE','United Arab Emirates','Vereinigte Arabische Emirate',NULL,NULL,NULL,NULL,NULL),(238,'GB','United Kingdom','Vereinigtes KÃ¶nigreich',NULL,NULL,NULL,NULL,NULL),(239,'US','United States','Vereinigte Staaten',NULL,NULL,NULL,NULL,NULL),(240,'UM','United States Minor Outlying Islands','Kleinere abgelegene Inseln der Vereinigten Staaten',NULL,NULL,NULL,NULL,NULL),(241,'UY','Uruguay','Uruguay',NULL,NULL,NULL,NULL,NULL),(242,'UZ','Uzbekistan','Usbekistan',NULL,NULL,NULL,NULL,NULL),(243,'VU','Vanuatu','Vanuatu',NULL,NULL,NULL,NULL,NULL),(244,'VE','Venezuela','Venezuela',NULL,NULL,NULL,NULL,NULL),(245,'VN','Viet Nam','Vietnam',NULL,NULL,NULL,NULL,NULL),(246,'VG','Virgin Islands, British','Virgin Inseln, Britisch',NULL,NULL,NULL,NULL,NULL),(247,'VI','Virgin Islands, U.s.','Jungferninseln, USA',NULL,NULL,NULL,NULL,NULL),(248,'WF','Wallis and Futuna','Wallis und Futuna',NULL,NULL,NULL,NULL,NULL),(249,'EH','Western Sahara','Westsahara',NULL,NULL,NULL,NULL,NULL),(250,'YE','Yemen','Jemen',NULL,NULL,NULL,NULL,NULL),(251,'ZM','Zambia','Sambia',NULL,NULL,NULL,NULL,NULL),(252,'ZW','Zimbabwe','Zimbabwe',NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `countries_m` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `languages_m`
--

DROP TABLE IF EXISTS `languages_m`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `languages_m` (
  `id_lan` bigint(20) NOT NULL AUTO_INCREMENT,
  `iso639_1` varchar(8) DEFAULT NULL,
  `iso639_2t` varchar(8) DEFAULT NULL,
  `name_en` varchar(100) DEFAULT NULL,
  `name_de` varchar(100) DEFAULT NULL,
  `name_it` varchar(100) DEFAULT NULL,
  `name_es` varchar(100) DEFAULT NULL,
  `name_fr` varchar(100) DEFAULT NULL,
  `name_ru` varchar(100) DEFAULT NULL,
  `dictionary` text,
  PRIMARY KEY (`id_lan`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `languages_m`
--

LOCK TABLES `languages_m` WRITE;
/*!40000 ALTER TABLE `languages_m` DISABLE KEYS */;
INSERT INTO `languages_m` VALUES (1,'ab','abk','Abkhazian','Abkhazian','Abkhazian','AbÄ¥aza','Abkhaze','ÐÐ±Ñ…Ð°Ð·ÑŒÐºÐ°',''),(2,'en','eng','English','Englisch','Inglese','English','English','English',''),(3,'de','deu','German','Deutsch','Tedesco','German','German','German',''),(4,'it','ita','Italian','Italienisch','Italiano','Italian','Italian','Italian',''),(5,'es','spa','Spanish','Spanisch','Spagnolo','Spanish','Spanish','Spanish',''),(6,'fr','fra','French','FranzÃ¶sisch','Francese','French','French','French',''),(7,'ru','rus','Russian','Russisch','Russo','Russian','Russian','Russian','');
/*!40000 ALTER TABLE `languages_m` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'csv_database'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-01-25 11:28:11
