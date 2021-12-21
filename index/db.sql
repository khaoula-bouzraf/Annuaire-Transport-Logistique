
/*Table structure for table `addons` */

DROP TABLE IF EXISTS `addons`;

CREATE TABLE `addons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `unique_identifier` varchar(255) NOT NULL,
  `version` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `addons` */

/*Table structure for table `amenities` */

DROP TABLE IF EXISTS `amenities`;

CREATE TABLE `amenities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `amenities` */

/*Table structure for table `beauty_service` */

DROP TABLE IF EXISTS `beauty_service`;

CREATE TABLE `beauty_service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `listing_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `service_times` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `beauty_service` */

/*Table structure for table `blog_comments` */

DROP TABLE IF EXISTS `blog_comments`;

CREATE TABLE `blog_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `blog_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `under_comment_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT '0' COMMENT '0 == main comment, 0 != under comment',
  `added_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `blog_comments` */

/*Table structure for table `blogs` */

DROP TABLE IF EXISTS `blogs`;

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blog_text` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `blog_thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blog_cover` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `added_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `blogs` */

/*Table structure for table `booking` */

DROP TABLE IF EXISTS `booking`;

CREATE TABLE `booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `requester_id` int(11) NOT NULL,
  `listing_id` int(11) NOT NULL,
  `booking_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `additional_information` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `listing_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `booking` */

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) DEFAULT 0,
  `icon_class` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `category` */

insert  into `category`(`id`,`parent`,`icon_class`,`name`,`slug`,`thumbnail`) values 
(1,0,'fas fa-address-book','sdhghsdgh','sdhghsdgh','b78e7f68e359e04ff832d83b9ae02a68.jpg');

/*Table structure for table `ci_sessions` */

DROP TABLE IF EXISTS `ci_sessions`;

CREATE TABLE `ci_sessions` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) NOT NULL DEFAULT 0,
  `data` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `ci_sessions` */

insert  into `ci_sessions`(`id`,`ip_address`,`timestamp`,`data`) values 
('5uv4ban042l1r68kp4pj369tojgmq31c','127.0.0.1',1622008321,'__ci_last_regenerate|i:1622008321;is_logged_in|i:1;user_id|s:1:\"1\";role_id|s:1:\"1\";role|s:5:\"Admin\";name|s:5:\"admin\";admin_login|s:1:\"1\";'),
('0237d8vlku50pc9lmor3fsp4ql1j8p5c','127.0.0.1',1622008730,'__ci_last_regenerate|i:1622008730;is_logged_in|i:1;user_id|s:1:\"1\";role_id|s:1:\"1\";role|s:5:\"Admin\";name|s:5:\"admin\";admin_login|s:1:\"1\";'),
('890k85doid885n6qns2oo5uuvnnubs2r','127.0.0.1',1622009135,'__ci_last_regenerate|i:1622009135;is_logged_in|i:1;user_id|s:1:\"1\";role_id|s:1:\"1\";role|s:5:\"Admin\";name|s:5:\"admin\";admin_login|s:1:\"1\";'),
('3b2pfbdf2uqs174gj5ahtcu96ldg026m','127.0.0.1',1622010042,'__ci_last_regenerate|i:1622010042;is_logged_in|i:1;user_id|s:1:\"1\";role_id|s:1:\"1\";role|s:5:\"Admin\";name|s:5:\"admin\";admin_login|s:1:\"1\";'),
('t6t5nj09eufbv45pkh6ou6omrnojq7u7','127.0.0.1',1622010354,'__ci_last_regenerate|i:1622010354;is_logged_in|i:1;user_id|s:1:\"1\";role_id|s:1:\"1\";role|s:5:\"Admin\";name|s:5:\"admin\";admin_login|s:1:\"1\";'),
('fhmjq13crvfckh2b26hqpajif78hfe84','127.0.0.1',1622010747,'__ci_last_regenerate|i:1622010747;is_logged_in|i:1;user_id|s:1:\"1\";role_id|s:1:\"1\";role|s:5:\"Admin\";name|s:5:\"admin\";admin_login|s:1:\"1\";'),
('afgs5bp0dop0nlv49m20h5k32sva3asm','127.0.0.1',1622011153,'__ci_last_regenerate|i:1622011153;is_logged_in|i:1;user_id|s:1:\"1\";role_id|s:1:\"1\";role|s:5:\"Admin\";name|s:5:\"admin\";admin_login|s:1:\"1\";'),
('107i9nigk7a79obn7v2q8jurtoc2citt','127.0.0.1',1622011153,'__ci_last_regenerate|i:1622011153;is_logged_in|i:1;user_id|s:1:\"1\";role_id|s:1:\"1\";role|s:5:\"Admin\";name|s:5:\"admin\";admin_login|s:1:\"1\";'),
('4qk6f48o8ofl088851dgos3c1mvudcc1','127.0.0.1',1622048983,'__ci_last_regenerate|i:1622048983;is_logged_in|i:1;user_id|s:1:\"1\";role_id|s:1:\"1\";role|s:5:\"Admin\";name|s:5:\"admin\";admin_login|s:1:\"1\";'),
('eh3b4hi3o58eb0h008gdppte1cj7cd8e','127.0.0.1',1622049668,'__ci_last_regenerate|i:1622049668;is_logged_in|i:1;user_id|s:1:\"1\";role_id|s:1:\"1\";role|s:5:\"Admin\";name|s:5:\"admin\";admin_login|s:1:\"1\";'),
('7mialvirli6saed9frp0vik623shfg05','127.0.0.1',1622050020,'__ci_last_regenerate|i:1622050020;is_logged_in|i:1;user_id|s:1:\"1\";role_id|s:1:\"1\";role|s:5:\"Admin\";name|s:5:\"admin\";admin_login|s:1:\"1\";'),
('sl6ghq3pietluqfa5bqo73jnq3uofovu','127.0.0.1',1622050594,'__ci_last_regenerate|i:1622050315;is_logged_in|i:1;user_id|s:1:\"1\";role_id|s:1:\"1\";role|s:5:\"Admin\";name|s:5:\"admin\";admin_login|s:1:\"1\";');

/*Table structure for table `city` */

DROP TABLE IF EXISTS `city`;

CREATE TABLE `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `city` */

/*Table structure for table `claimed_listing` */

DROP TABLE IF EXISTS `claimed_listing`;

CREATE TABLE `claimed_listing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `listing_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `additional_information` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `claimed_listing` */

/*Table structure for table `comment` */

DROP TABLE IF EXISTS `comment`;

CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `listing_id` int(11) DEFAULT NULL,
  `reply_to` int(11) DEFAULT NULL,
  `comment` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `comment` */

/*Table structure for table `country` */

DROP TABLE IF EXISTS `country`;

CREATE TABLE `country` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dial_code` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency_name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency_symbol` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency_code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=242 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `country` */

insert  into `country`(`id`,`name`,`code`,`dial_code`,`currency_name`,`currency_symbol`,`currency_code`) values 
(1,'Afghanistan','AF','+93','Afghan afghani','؋','AFN'),
(2,'Aland Islands','AX','+358','','',''),
(3,'Albania','AL','+355','Albanian lek','L','ALL'),
(4,'Algeria','DZ','+213','Algerian dinar','د.ج','DZD'),
(5,'AmericanSamoa','AS','+1684','','',''),
(6,'Andorra','AD','+376','Euro','€','EUR'),
(7,'Angola','AO','+244','Angolan kwanza','Kz','AOA'),
(8,'Anguilla','AI','+1264','East Caribbean dolla','$','XCD'),
(9,'Antarctica','AQ','+672','','',''),
(10,'Antigua and Barbuda','AG','+1268','East Caribbean dolla','$','XCD'),
(11,'Argentina','AR','+54','Argentine peso','$','ARS'),
(12,'Armenia','AM','+374','Armenian dram','','AMD'),
(13,'Aruba','AW','+297','Aruban florin','ƒ','AWG'),
(14,'Australia','AU','+61','Australian dollar','$','AUD'),
(15,'Austria','AT','+43','Euro','€','EUR'),
(16,'Azerbaijan','AZ','+994','Azerbaijani manat','','AZN'),
(17,'Bahamas','BS','+1242','','',''),
(18,'Bahrain','BH','+973','Bahraini dinar','.د.ب','BHD'),
(19,'Bangladesh','BD','+880','Bangladeshi taka','৳','BDT'),
(20,'Barbados','BB','+1246','Barbadian dollar','$','BBD'),
(21,'Belarus','BY','+375','Belarusian ruble','Br','BYR'),
(22,'Belgium','BE','+32','Euro','€','EUR'),
(23,'Belize','BZ','+501','Belize dollar','$','BZD'),
(24,'Benin','BJ','+229','West African CFA fra','Fr','XOF'),
(25,'Bermuda','BM','+1441','Bermudian dollar','$','BMD'),
(26,'Bhutan','BT','+975','Bhutanese ngultrum','Nu.','BTN'),
(27,'Bolivia, Plurination','BO','+591','','',''),
(28,'Bosnia and Herzegovi','BA','+387','','',''),
(29,'Botswana','BW','+267','Botswana pula','P','BWP'),
(30,'Brazil','BR','+55','Brazilian real','R$','BRL'),
(31,'British Indian Ocean','IO','+246','','',''),
(32,'Brunei Darussalam','BN','+673','','',''),
(33,'Bulgaria','BG','+359','Bulgarian lev','лв','BGN'),
(34,'Burkina Faso','BF','+226','West African CFA fra','Fr','XOF'),
(35,'Burundi','BI','+257','Burundian franc','Fr','BIF'),
(36,'Cambodia','KH','+855','Cambodian riel','៛','KHR'),
(37,'Cameroon','CM','+237','Central African CFA ','Fr','XAF'),
(38,'Canada','CA','+1','Canadian dollar','$','CAD'),
(39,'Cape Verde','CV','+238','Cape Verdean escudo','Esc or $','CVE'),
(40,'Cayman Islands','KY','+ 345','Cayman Islands dolla','$','KYD'),
(41,'Central African Repu','CF','+236','','',''),
(42,'Chad','TD','+235','Central African CFA ','Fr','XAF'),
(43,'Chile','CL','+56','Chilean peso','$','CLP'),
(44,'China','CN','+86','Chinese yuan','¥ or 元','CNY'),
(45,'Christmas Island','CX','+61','','',''),
(46,'Cocos (Keeling) Isla','CC','+61','','',''),
(47,'Colombia','CO','+57','Colombian peso','$','COP'),
(48,'Comoros','KM','+269','Comorian franc','Fr','KMF'),
(49,'Congo','CG','+242','','',''),
(50,'Congo, The Democrati','CD','+243','','',''),
(51,'Cook Islands','CK','+682','New Zealand dollar','$','NZD'),
(52,'Costa Rica','CR','+506','Costa Rican colón','₡','CRC'),
(53,'Cote d\'Ivoire','CI','+225','West African CFA fra','Fr','XOF'),
(54,'Croatia','HR','+385','Croatian kuna','kn','HRK'),
(55,'Cuba','CU','+53','Cuban convertible pe','$','CUC'),
(56,'Cyprus','CY','+357','Euro','€','EUR'),
(57,'Czech Republic','CZ','+420','Czech koruna','Kč','CZK'),
(58,'Denmark','DK','+45','Danish krone','kr','DKK'),
(59,'Djibouti','DJ','+253','Djiboutian franc','Fr','DJF'),
(60,'Dominica','DM','+1767','East Caribbean dolla','$','XCD'),
(61,'Dominican Republic','DO','+1849','Dominican peso','$','DOP'),
(62,'Ecuador','EC','+593','United States dollar','$','USD'),
(63,'Egypt','EG','+20','Egyptian pound','£ or ج.م','EGP'),
(64,'El Salvador','SV','+503','United States dollar','$','USD'),
(65,'Equatorial Guinea','GQ','+240','Central African CFA ','Fr','XAF'),
(66,'Eritrea','ER','+291','Eritrean nakfa','Nfk','ERN'),
(67,'Estonia','EE','+372','Euro','€','EUR'),
(68,'Ethiopia','ET','+251','Ethiopian birr','Br','ETB'),
(69,'Falkland Islands (Ma','FK','+500','','',''),
(70,'Faroe Islands','FO','+298','Danish krone','kr','DKK'),
(71,'Fiji','FJ','+679','Fijian dollar','$','FJD'),
(72,'Finland','FI','+358','Euro','€','EUR'),
(73,'France','FR','+33','Euro','€','EUR'),
(74,'French Guiana','GF','+594','','',''),
(75,'French Polynesia','PF','+689','CFP franc','Fr','XPF'),
(76,'Gabon','GA','+241','Central African CFA ','Fr','XAF'),
(77,'Gambia','GM','+220','','',''),
(78,'Georgia','GE','+995','Georgian lari','ლ','GEL'),
(79,'Germany','DE','+49','Euro','€','EUR'),
(80,'Ghana','GH','+233','Ghana cedi','₵','GHS'),
(81,'Gibraltar','GI','+350','Gibraltar pound','£','GIP'),
(82,'Greece','GR','+30','Euro','€','EUR'),
(83,'Greenland','GL','+299','','',''),
(84,'Grenada','GD','+1473','East Caribbean dolla','$','XCD'),
(85,'Guadeloupe','GP','+590','','',''),
(86,'Guam','GU','+1671','','',''),
(87,'Guatemala','GT','+502','Guatemalan quetzal','Q','GTQ'),
(88,'Guernsey','GG','+44','British pound','£','GBP'),
(89,'Guinea','GN','+224','Guinean franc','Fr','GNF'),
(90,'Guinea-Bissau','GW','+245','West African CFA fra','Fr','XOF'),
(91,'Guyana','GY','+595','Guyanese dollar','$','GYD'),
(92,'Haiti','HT','+509','Haitian gourde','G','HTG'),
(93,'Holy See (Vatican Ci','VA','+379','','',''),
(94,'Honduras','HN','+504','Honduran lempira','L','HNL'),
(95,'Hong Kong','HK','+852','Hong Kong dollar','$','HKD'),
(96,'Hungary','HU','+36','Hungarian forint','Ft','HUF'),
(97,'Iceland','IS','+354','Icelandic króna','kr','ISK'),
(98,'India','IN','+91','Indian rupee','₹','INR'),
(99,'Indonesia','ID','+62','Indonesian rupiah','Rp','IDR'),
(100,'Iran, Islamic Republ','IR','+98','','',''),
(101,'Iraq','IQ','+964','Iraqi dinar','ع.د','IQD'),
(102,'Ireland','IE','+353','Euro','€','EUR'),
(103,'Isle of Man','IM','+44','British pound','£','GBP'),
(104,'Israel','IL','+972','Israeli new shekel','₪','ILS'),
(105,'Italy','IT','+39','Euro','€','EUR'),
(106,'Jamaica','JM','+1876','Jamaican dollar','$','JMD'),
(107,'Japan','JP','+81','Japanese yen','¥','JPY'),
(108,'Jersey','JE','+44','British pound','£','GBP'),
(109,'Jordan','JO','+962','Jordanian dinar','د.ا','JOD'),
(110,'Kazakhstan','KZ','+7 7','Kazakhstani tenge','','KZT'),
(111,'Kenya','KE','+254','Kenyan shilling','Sh','KES'),
(112,'Kiribati','KI','+686','Australian dollar','$','AUD'),
(113,'Korea, Democratic Pe','KP','+850','','',''),
(114,'Korea, Republic of S','KR','+82','','',''),
(115,'Kuwait','KW','+965','Kuwaiti dinar','د.ك','KWD'),
(116,'Kyrgyzstan','KG','+996','Kyrgyzstani som','лв','KGS'),
(117,'Laos','LA','+856','Lao kip','₭','LAK'),
(118,'Latvia','LV','+371','Euro','€','EUR'),
(119,'Lebanon','LB','+961','Lebanese pound','ل.ل','LBP'),
(120,'Lesotho','LS','+266','Lesotho loti','L','LSL'),
(121,'Liberia','LR','+231','Liberian dollar','$','LRD'),
(122,'Libyan Arab Jamahiri','LY','+218','','',''),
(123,'Liechtenstein','LI','+423','Swiss franc','Fr','CHF'),
(124,'Lithuania','LT','+370','Euro','€','EUR'),
(125,'Luxembourg','LU','+352','Euro','€','EUR'),
(126,'Macao','MO','+853','','',''),
(127,'Macedonia','MK','+389','','',''),
(128,'Madagascar','MG','+261','Malagasy ariary','Ar','MGA'),
(129,'Malawi','MW','+265','Malawian kwacha','MK','MWK'),
(130,'Malaysia','MY','+60','Malaysian ringgit','RM','MYR'),
(131,'Maldives','MV','+960','Maldivian rufiyaa','.ރ','MVR'),
(132,'Mali','ML','+223','West African CFA fra','Fr','XOF'),
(133,'Malta','MT','+356','Euro','€','EUR'),
(134,'Marshall Islands','MH','+692','United States dollar','$','USD'),
(135,'Martinique','MQ','+596','','',''),
(136,'Mauritania','MR','+222','Mauritanian ouguiya','UM','MRO'),
(137,'Mauritius','MU','+230','Mauritian rupee','₨','MUR'),
(138,'Mayotte','YT','+262','','',''),
(139,'Mexico','MX','+52','Mexican peso','$','MXN'),
(140,'Micronesia, Federate','FM','+691','','',''),
(141,'Moldova','MD','+373','Moldovan leu','L','MDL'),
(142,'Monaco','MC','+377','Euro','€','EUR'),
(143,'Mongolia','MN','+976','Mongolian tögrög','₮','MNT'),
(144,'Montenegro','ME','+382','Euro','€','EUR'),
(145,'Montserrat','MS','+1664','East Caribbean dolla','$','XCD'),
(146,'Morocco','MA','+212','Moroccan dirham','د.م.','MAD'),
(147,'Mozambique','MZ','+258','Mozambican metical','MT','MZN'),
(148,'Myanmar','MM','+95','Burmese kyat','Ks','MMK'),
(149,'Namibia','NA','+264','Namibian dollar','$','NAD'),
(150,'Nauru','NR','+674','Australian dollar','$','AUD'),
(151,'Nepal','NP','+977','Nepalese rupee','₨','NPR'),
(152,'Netherlands','NL','+31','Euro','€','EUR'),
(153,'Netherlands Antilles','AN','+599','','',''),
(154,'New Caledonia','NC','+687','CFP franc','Fr','XPF'),
(155,'New Zealand','NZ','+64','New Zealand dollar','$','NZD'),
(156,'Nicaragua','NI','+505','Nicaraguan córdoba','C$','NIO'),
(157,'Niger','NE','+227','West African CFA fra','Fr','XOF'),
(158,'Nigeria','NG','+234','Nigerian naira','₦','NGN'),
(159,'Niue','NU','+683','New Zealand dollar','$','NZD'),
(160,'Norfolk Island','NF','+672','','',''),
(161,'Northern Mariana Isl','MP','+1670','','',''),
(162,'Norway','NO','+47','Norwegian krone','kr','NOK'),
(163,'Oman','OM','+968','Omani rial','ر.ع.','OMR'),
(164,'Pakistan','PK','+92','Pakistani rupee','₨','PKR'),
(165,'Palau','PW','+680','Palauan dollar','$',''),
(166,'Palestinian Territor','PS','+970','','',''),
(167,'Panama','PA','+507','Panamanian balboa','B/.','PAB'),
(168,'Papua New Guinea','PG','+675','Papua New Guinean ki','K','PGK'),
(169,'Paraguay','PY','+595','Paraguayan guaraní','₲','PYG'),
(170,'Peru','PE','+51','Peruvian nuevo sol','S/.','PEN'),
(171,'Philippines','PH','+63','Philippine peso','₱','PHP'),
(172,'Pitcairn','PN','+872','','',''),
(173,'Poland','PL','+48','Polish z?oty','zł','PLN'),
(174,'Portugal','PT','+351','Euro','€','EUR'),
(175,'Puerto Rico','PR','+1939','','',''),
(176,'Qatar','QA','+974','Qatari riyal','ر.ق','QAR'),
(177,'Romania','RO','+40','Romanian leu','lei','RON'),
(178,'Russia','RU','+7','Russian ruble','','RUB'),
(179,'Rwanda','RW','+250','Rwandan franc','Fr','RWF'),
(180,'Reunion','RE','+262','','',''),
(181,'Saint Barthelemy','BL','+590','','',''),
(182,'Saint Helena, Ascens','SH','+290','','',''),
(183,'Saint Kitts and Nevi','KN','+1869','','',''),
(184,'Saint Lucia','LC','+1758','East Caribbean dolla','$','XCD'),
(185,'Saint Martin','MF','+590','','',''),
(186,'Saint Pierre and Miq','PM','+508','','',''),
(187,'Saint Vincent and th','VC','+1784','','',''),
(188,'Samoa','WS','+685','Samoan t?l?','T','WST'),
(189,'San Marino','SM','+378','Euro','€','EUR'),
(190,'Sao Tome and Princip','ST','+239','','',''),
(191,'Saudi Arabia','SA','+966','Saudi riyal','ر.س','SAR'),
(192,'Senegal','SN','+221','West African CFA fra','Fr','XOF'),
(193,'Serbia','RS','+381','Serbian dinar','дин. or din.','RSD'),
(194,'Seychelles','SC','+248','Seychellois rupee','₨','SCR'),
(195,'Sierra Leone','SL','+232','Sierra Leonean leone','Le','SLL'),
(196,'Singapore','SG','+65','Brunei dollar','$','BND'),
(197,'Slovakia','SK','+421','Euro','€','EUR'),
(198,'Slovenia','SI','+386','Euro','€','EUR'),
(199,'Solomon Islands','SB','+677','Solomon Islands doll','$','SBD'),
(200,'Somalia','SO','+252','Somali shilling','Sh','SOS'),
(201,'South Africa','ZA','+27','South African rand','R','ZAR'),
(202,'South Georgia and th','GS','+500','','',''),
(203,'Spain','ES','+34','Euro','€','EUR'),
(204,'Sri Lanka','LK','+94','Sri Lankan rupee','Rs or රු','LKR'),
(205,'Sudan','SD','+249','Sudanese pound','ج.س.','SDG'),
(206,'Suriname','SR','+597','Surinamese dollar','$','SRD'),
(207,'Svalbard and Jan May','SJ','+47','','',''),
(208,'Swaziland','SZ','+268','Swazi lilangeni','L','SZL'),
(209,'Sweden','SE','+46','Swedish krona','kr','SEK'),
(210,'Switzerland','CH','+41','Swiss franc','Fr','CHF'),
(211,'Syrian Arab Republic','SY','+963','','',''),
(212,'Taiwan','TW','+886','New Taiwan dollar','$','TWD'),
(213,'Tajikistan','TJ','+992','Tajikistani somoni','ЅМ','TJS'),
(214,'Tanzania, United Rep','TZ','+255','','',''),
(215,'Thailand','TH','+66','Thai baht','฿','THB'),
(216,'Timor-Leste','TL','+670','','',''),
(217,'Togo','TG','+228','West African CFA fra','Fr','XOF'),
(218,'Tokelau','TK','+690','','',''),
(219,'Tonga','TO','+676','Tongan pa?anga','T$','TOP'),
(220,'Trinidad and Tobago','TT','+1868','Trinidad and Tobago ','$','TTD'),
(221,'Tunisia','TN','+216','Tunisian dinar','د.ت','TND'),
(222,'Turkey','TR','+90','Turkish lira','','TRY'),
(223,'Turkmenistan','TM','+993','Turkmenistan manat','m','TMT'),
(224,'Turks and Caicos Isl','TC','+1649','','',''),
(225,'Tuvalu','TV','+688','Australian dollar','$','AUD'),
(226,'Uganda','UG','+256','Ugandan shilling','Sh','UGX'),
(227,'Ukraine','UA','+380','Ukrainian hryvnia','₴','UAH'),
(228,'United Arab Emirates','AE','+971','United Arab Emirates','د.إ','AED'),
(229,'United Kingdom','GB','+44','British pound','£','GBP'),
(230,'United States','US','+1','United States dollar','$','USD'),
(231,'Uruguay','UY','+598','Uruguayan peso','$','UYU'),
(232,'Uzbekistan','UZ','+998','Uzbekistani som','','UZS'),
(233,'Vanuatu','VU','+678','Vanuatu vatu','Vt','VUV'),
(234,'Venezuela, Bolivaria','VE','+58','','',''),
(235,'Vietnam','VN','+84','Vietnamese ??ng','₫','VND'),
(236,'Virgin Islands, Brit','VG','+1284','','',''),
(237,'Virgin Islands, U.S.','VI','+1340','','',''),
(238,'Wallis and Futuna','WF','+681','CFP franc','Fr','XPF'),
(239,'Yemen','YE','+967','Yemeni rial','﷼','YER'),
(240,'Zambia','ZM','+260','Zambian kwacha','ZK','ZMW'),
(241,'Zimbabwe','ZW','+263','Botswana pula','P','BWP');

/*Table structure for table `currency` */

DROP TABLE IF EXISTS `currency`;

CREATE TABLE `currency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `symbol` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `paypal_supported` int(11) NOT NULL DEFAULT 0,
  `stripe_supported` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `currency` */

insert  into `currency`(`id`,`name`,`code`,`symbol`,`paypal_supported`,`stripe_supported`) values 
(1,'Leke','ALL','Lek',0,1),
(2,'Dollars','USD','$',1,1),
(3,'Afghanis','AFN','؋',0,1),
(4,'Pesos','ARS','$',0,1),
(5,'Guilders','AWG','ƒ',0,1),
(6,'Dollars','AUD','$',1,1),
(7,'New Manats','AZN','ман',0,1),
(8,'Dollars','BSD','$',0,1),
(9,'Dollars','BBD','$',0,1),
(10,'Rubles','BYR','p.',0,0),
(11,'Euro','EUR','€',1,1),
(12,'Dollars','BZD','BZ$',0,1),
(13,'Dollars','BMD','$',0,1),
(14,'Bolivianos','BOB','$b',0,1),
(15,'Convertible Marka','BAM','KM',0,1),
(16,'Pula','BWP','P',0,1),
(17,'Leva','BGN','лв',0,1),
(18,'Reais','BRL','R$',1,1),
(19,'Pounds','GBP','£',1,1),
(20,'Dollars','BND','$',0,1),
(21,'Riels','KHR','៛',0,1),
(22,'Dollars','CAD','$',1,1),
(23,'Dollars','KYD','$',0,1),
(24,'Pesos','CLP','$',0,1),
(25,'Yuan Renminbi','CNY','¥',0,1),
(26,'Pesos','COP','$',0,1),
(27,'Colón','CRC','₡',0,1),
(28,'Kuna','HRK','kn',0,1),
(29,'Pesos','CUP','₱',0,0),
(30,'Koruny','CZK','Kč',1,1),
(31,'Kroner','DKK','kr',1,1),
(32,'Pesos','DOP ','RD$',0,1),
(33,'Dollars','XCD','$',0,1),
(34,'Pounds','EGP','£',0,1),
(35,'Colones','SVC','$',0,0),
(36,'Pounds','FKP','£',0,1),
(37,'Dollars','FJD','$',0,1),
(38,'Cedis','GHC','¢',0,0),
(39,'Pounds','GIP','£',0,1),
(40,'Quetzales','GTQ','Q',0,1),
(41,'Pounds','GGP','£',0,0),
(42,'Dollars','GYD','$',0,1),
(43,'Lempiras','HNL','L',0,1),
(44,'Dollars','HKD','$',1,1),
(45,'Forint','HUF','Ft',1,1),
(46,'Kronur','ISK','kr',0,1),
(47,'Rupees','INR','Rs',1,1),
(48,'Rupiahs','IDR','Rp',0,1),
(49,'Rials','IRR','﷼',0,0),
(50,'Pounds','IMP','£',0,0),
(51,'New Shekels','ILS','₪',1,1),
(52,'Dollars','JMD','J$',0,1),
(53,'Yen','JPY','¥',1,1),
(54,'Pounds','JEP','£',0,0),
(55,'Tenge','KZT','лв',0,1),
(56,'Won','KPW','₩',0,0),
(57,'Won','KRW','₩',0,1),
(58,'Soms','KGS','лв',0,1),
(59,'Kips','LAK','₭',0,1),
(60,'Lati','LVL','Ls',0,0),
(61,'Pounds','LBP','£',0,1),
(62,'Dollars','LRD','$',0,1),
(63,'Switzerland Francs','CHF','CHF',1,1),
(64,'Litai','LTL','Lt',0,0),
(65,'Denars','MKD','ден',0,1),
(66,'Ringgits','MYR','RM',1,1),
(67,'Rupees','MUR','₨',0,1),
(68,'Pesos','MXN','$',1,1),
(69,'Tugriks','MNT','₮',0,1),
(70,'Meticais','MZN','MT',0,1),
(71,'Dollars','NAD','$',0,1),
(72,'Rupees','NPR','₨',0,1),
(73,'Guilders','ANG','ƒ',0,1),
(74,'Dollars','NZD','$',1,1),
(75,'Cordobas','NIO','C$',0,1),
(76,'Nairas','NGN','₦',0,1),
(77,'Krone','NOK','kr',1,1),
(78,'Rials','OMR','﷼',0,0),
(79,'Rupees','PKR','₨',0,1),
(80,'Balboa','PAB','B/.',0,1),
(81,'Guarani','PYG','Gs',0,1),
(82,'Nuevos Soles','PEN','S/.',0,1),
(83,'Pesos','PHP','Php',1,1),
(84,'Zlotych','PLN','zł',1,1),
(85,'Rials','QAR','﷼',0,1),
(86,'New Lei','RON','lei',0,1),
(87,'Rubles','RUB','руб',0,1),
(88,'Pounds','SHP','£',0,1),
(89,'Riyals','SAR','﷼',0,1),
(90,'Dinars','RSD','Дин.',0,1),
(91,'Rupees','SCR','₨',0,1),
(92,'Dollars','SGD','$',1,1),
(93,'Dollars','SBD','$',0,1),
(94,'Shillings','SOS','S',0,1),
(95,'Rand','ZAR','R',0,1),
(96,'Rupees','LKR','₨',0,1),
(97,'Kronor','SEK','kr',1,1),
(98,'Dollars','SRD','$',0,1),
(99,'Pounds','SYP','£',0,0),
(100,'New Dollars','TWD','NT$',1,1),
(101,'Baht','THB','฿',1,1),
(102,'Dollars','TTD','TT$',0,1),
(103,'Lira','TRY','TL',0,1),
(104,'Liras','TRL','£',0,0),
(105,'Dollars','TVD','$',0,0),
(106,'Hryvnia','UAH','₴',0,1),
(107,'Pesos','UYU','$U',0,1),
(108,'Sums','UZS','лв',0,1),
(109,'Bolivares Fuertes','VEF','Bs',0,0),
(110,'Dong','VND','₫',0,1),
(111,'Rials','YER','﷼',0,1),
(112,'Zimbabwe Dollars','ZWD','Z$',0,0);

/*Table structure for table `food_menu` */

DROP TABLE IF EXISTS `food_menu`;

CREATE TABLE `food_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `listing_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `items` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `food_menu` */

/*Table structure for table `frontend_settings` */

DROP TABLE IF EXISTS `frontend_settings`;

CREATE TABLE `frontend_settings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `frontend_settings` */

insert  into `frontend_settings`(`id`,`type`,`description`) values 
(1,'banner_title','Atlas Business Directory Listing'),
(2,'banner_sub_title','Subtitle Of Atlas Directory Listing'),
(3,'about_us','<p>About us</p>\r\n\r\n<h1> iddfuifuiduif</h1>'),
(4,'terms_and_condition','<p>Terms and conditions</p>\r\n'),
(5,'privacy_policy','<p>Privacy Poilicy</p>\r\n'),
(6,'social_links','{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\",\"google\":\"\",\"instagram\":\"\",\"pinterest\":\"\"}'),
(7,'slogan','Find your local places, you love most to roam around.'),
(8,'faq','<p>Faq</p>\r\n'),
(9,'cookie_note','This Website Uses Cookies To Personalize Content And Analyse Traffic In Order To Offer You A Better Experience.'),
(10,'cookie_status','1'),
(11,'cookie_policy','<h1>Cookie policy</h1>\r\n\r\n<ol>\r\n	<li>Cookies are small text files that can be used by websites to make a user&#39;s experience more efficient.</li>\r\n	<li>The law states that we can store cookies on your device if they are strictly necessary for the operation of this site. For all other types of cookies we need your permission.</li>\r\n	<li>This site uses different types of cookies. Some cookies are placed by third party services that appear on our pages.</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n');

/*Table structure for table `hotel_room_specification` */

DROP TABLE IF EXISTS `hotel_room_specification`;

CREATE TABLE `hotel_room_specification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `listing_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amenities` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `hotel_room_specification` */

/*Table structure for table `listing` */

DROP TABLE IF EXISTS `listing`;

CREATE TABLE `listing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `categories` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `amenities` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `photos` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `video_url` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `video_provider` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tags` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `social` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pending',
  `listing_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `listing_thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `listing_cover` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_meta_tags` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_added` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_modified` int(11) DEFAULT NULL,
  `is_featured` int(11) NOT NULL DEFAULT 0,
  `google_analytics_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `listing` */

/*Table structure for table `package` */

DROP TABLE IF EXISTS `package`;

CREATE TABLE `package` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `validity` int(11) NOT NULL DEFAULT 0 COMMENT 'validity should be in days',
  `ability_to_add_video` int(11) NOT NULL DEFAULT 0,
  `ability_to_add_contact_form` int(11) NOT NULL DEFAULT 0,
  `number_of_photos` int(11) NOT NULL DEFAULT 0,
  `number_of_tags` int(11) NOT NULL DEFAULT 0,
  `number_of_categories` int(11) NOT NULL DEFAULT 0,
  `is_recommended` int(11) NOT NULL DEFAULT 0,
  `package_type` int(11) NOT NULL DEFAULT 0,
  `number_of_listings` int(11) NOT NULL DEFAULT 0,
  `featured` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `package` */

/*Table structure for table `package_purchased_history` */

DROP TABLE IF EXISTS `package_purchased_history`;

CREATE TABLE `package_purchased_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `package_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `expired_date` int(11) DEFAULT NULL,
  `amount_paid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `purchase_date` int(11) DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `package_purchased_history` */

/*Table structure for table `product_details` */

DROP TABLE IF EXISTS `product_details`;

CREATE TABLE `product_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `listing_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `variant` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `product_details` */

/*Table structure for table `reported_listing` */

DROP TABLE IF EXISTS `reported_listing`;

CREATE TABLE `reported_listing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `listing_id` int(11) NOT NULL DEFAULT 0,
  `reporter_id` int(11) NOT NULL DEFAULT 0,
  `report` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date_added` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `reported_listing` */

/*Table structure for table `review` */

DROP TABLE IF EXISTS `review`;

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `listing_id` int(11) DEFAULT NULL,
  `reviewer_id` int(11) DEFAULT NULL,
  `review_comment` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `review_rating` int(11) DEFAULT NULL,
  `timestamp` int(11) DEFAULT NULL,
  PRIMARY KEY (`review_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `review` */

/*Table structure for table `review_wise_quality` */

DROP TABLE IF EXISTS `review_wise_quality`;

CREATE TABLE `review_wise_quality` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rating_from` float DEFAULT NULL,
  `rating_to` float DEFAULT NULL,
  `quality` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `review_wise_quality` */

insert  into `review_wise_quality`(`id`,`rating_from`,`rating_to`,`quality`) values 
(1,1,1.5,'Bad!!'),
(2,1.6,2.8,'Not Bad'),
(3,2.9,3.4,'So So'),
(4,3.5,4.5,'Good'),
(5,4.6,5,'Awesome');

/*Table structure for table `role` */

DROP TABLE IF EXISTS `role`;

CREATE TABLE `role` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `role` */

insert  into `role`(`id`,`name`) values 
(1,'Admin'),
(2,'User');

/*Table structure for table `settings` */

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `settings` */

insert  into `settings`(`id`,`type`,`description`) values 
(1,'website_title','site'),
(2,'system_title','ATLAS Directory Listing CMS'),
(4,'system_email','creativeitem@example.com'),
(5,'address','New York'),
(6,'phone','1234567890'),
(7,'vat_percentage',NULL),
(8,'country_id','73'),
(9,'text_align',NULL),
(10,'currency_position','left'),
(11,'language','francais'),
(12,'purchase_code','your-purchase-code'),
(13,'timezone','Africa/Casablanca'),
(14,'paypal','[{\"active\":\"1\",\"mode\":\"sandbox\",\"sandbox_client_id\":\"AZDxjDScFpQtjWTOUtWKbyN_bDt4OgqaF4eYXlewfBP4-8aqX3PiV8e1GWU6liB2CUXlkA59kJXE7M6R\",\"production_client_id\":\"1234\"}]'),
(15,'stripe','[{\"active\":\"1\",\"testmode\":\"on\",\"public_key\":\"pk_test_c6VvBEbwHFdulFZ62q1IQrar\",\"secret_key\":\"sk_test_9IMkiM6Ykxr1LCe2dJ3PgaxS\",\"public_live_key\":\"pk_live_xxxxxxxxxxxxxxxxxxxxxxxx\",\"secret_live_key\":\"sk_live_xxxxxxxxxxxxxxxxxxxxxxxx\"}]'),
(18,'system_currency','USD'),
(19,'paypal_currency','USD'),
(20,'stripe_currency','USD'),
(21,'youtube_api_key',''),
(22,'vimeo_api_key',''),
(23,'protocol','smtp'),
(24,'smtp_host','ssl://smtp.googlemail.com'),
(25,'smtp_port','465'),
(26,'smtp_user','your-email-address'),
(27,'smtp_pass','your-email-password'),
(28,'social_links','{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}'),
(29,'about',''),
(30,'term_and_condition',''),
(31,'privacy_policy',''),
(32,'faq',''),
(35,'footer_text',''),
(36,'footer_link',''),
(37,'version','2.5'),
(38,'meta_keyword','business'),
(39,'meta_description','Atlas business directory listing'),
(40,'map_access_token',''),
(41,'max_zoom_level','18'),
(42,'min_zoom_listings_page','2'),
(43,'min_zoom_directory_page','2'),
(44,'default_location','40.702210, -74.015880'),
(45,'active_map','openstreetmap'),
(46,'recaptcha_sitekey','xxxxxxxxxxxxxxxxxxxxxxxxxxxx'),
(47,'recaptcha_secretkey','xxxxxxxxxxxxxxxxxxxxxxxxxxxx');

/*Table structure for table `time_configuration` */

DROP TABLE IF EXISTS `time_configuration`;

CREATE TABLE `time_configuration` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `listing_id` int(11) DEFAULT NULL,
  `saturday` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sunday` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `monday` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tuesday` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `wednesday` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thursday` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `friday` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `time_configuration` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `address` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `social` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `about` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `role_id` int(11) DEFAULT NULL,
  `wishlists` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `verification_code` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_verified` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `user` */

insert  into `user`(`id`,`name`,`email`,`address`,`phone`,`website`,`social`,`about`,`password`,`role_id`,`wishlists`,`verification_code`,`is_verified`) values 
(1,'admin','admin@admin.com',NULL,'','','{\"facebook\":\"\",\"twitter\":\"\",\"linkedin\":\"\"}',NULL,'9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684',1,'[]',NULL,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
