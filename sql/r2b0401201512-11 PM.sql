# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.6.22)
# Database: r2b
# Generation Time: 2015-04-01 16:11:05 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`id`, `category_name`)
VALUES
	(1,'project'),
	(2,'featured');

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table clients
# ------------------------------------------------------------

DROP TABLE IF EXISTS `clients`;

CREATE TABLE `clients` (
  `id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `thumbnail_image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;

INSERT INTO `clients` (`id`, `title`, `thumbnail_image`)
VALUES
	(2,'Herbal Essences','herbal_essences'),
	(3,'Maybelline','maybelline'),
	(4,'Ralph Lauren','ralph_lauren'),
	(5,'DBA','dba'),
	(6,'Elizabeth Arden','elizabeth_arden'),
	(7,'MAC','mac'),
	(8,'Uniqlo','uniqlo'),
	(9,'Olay','olay'),
	(10,'Goodskin Labs','goodskin_labs'),
	(11,'Calvin Klein','calvin_klein'),
	(13,'Tiffany','tiffany'),
	(14,'DVF','dvf'),
	(16,'H&M','hm'),
	(17,'Giorgio Armani','giorgio_armani'),
	(18,'Tom Ford','tom_ford'),
	(19,'BVLGARI','bvlgari'),
	(20,'Yves Saint Laurent','yves_saint_laurent'),
	(22,'Nine West','nine_west'),
	(24,'Viktor & Ralph','viktor_rolph'),
	(25,'Chanel','chanel'),
	(26,'7 For All Mankind','7_for_all_mankind'),
	(28,'Roxy','roxy'),
	(29,'L\'Oreal','loreal'),
	(30,'The Limited','the_limited'),
	(31,'Lancome','lancome'),
	(32,'MAKE UP FOR EVER','make_up_for_ever'),
	(33,'Chaps','chaps');

/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table links
# ------------------------------------------------------------

DROP TABLE IF EXISTS `links`;

CREATE TABLE `links` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `label` varchar(50) DEFAULT NULL,
  `href` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `links` WRITE;
/*!40000 ALTER TABLE `links` DISABLE KEYS */;

INSERT INTO `links` (`id`, `label`, `href`)
VALUES
	(1,'iTunes','https://itunes.apple.com/us/app/vfiles-smashion!/id932517078?mt=8'),
	(2,'Google Play','https://play.google.com/store/apps/details?id=com.vfiles.smashion&hl=en'),
	(4,'Visit Site','http://bcacampaign.com/'),
	(5,'See Experience','http://staging.click3x.com/kmart/kmart_shoppable-video/'),
	(6,'Visit Site','http://www.peanutbutter.com/yippee/funbutton/index.php'),
	(8,'VFILES','http://vfiles.com'),
	(9,'Visit Site','http://www.gamut.media/');

/*!40000 ALTER TABLE `links` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table media
# ------------------------------------------------------------

DROP TABLE IF EXISTS `media`;

CREATE TABLE `media` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `description` text,
  `filename` varchar(100) DEFAULT NULL,
  `media_type_id` int(2) DEFAULT NULL,
  `href` varchar(400) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;

INSERT INTO `media` (`id`, `title`, `description`, `filename`, `media_type_id`, `href`)
VALUES
	(4,NULL,NULL,'smashion_header',1,NULL),
	(5,NULL,NULL,'bca_header',1,NULL),
	(7,NULL,NULL,'kmart_video_header',1,NULL),
	(10,NULL,NULL,'VFILES_CS_FINAL',2,NULL),
	(11,NULL,NULL,'BCA2014_Trailer_Final',2,NULL),
	(15,NULL,NULL,'mufe_header',1,NULL),
	(16,NULL,NULL,'MakeUpForever',2,NULL),
	(19,NULL,NULL,'roxy_header',1,NULL),
	(20,NULL,NULL,'Roxy_01',2,NULL),
	(62,NULL,NULL,'Welcome_to_VFILES_1',2,NULL),
	(75,NULL,NULL,'kmart',2,NULL);

/*!40000 ALTER TABLE `media` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table media_types
# ------------------------------------------------------------

DROP TABLE IF EXISTS `media_types`;

CREATE TABLE `media_types` (
  `id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `media_type_name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `media_types` WRITE;
/*!40000 ALTER TABLE `media_types` DISABLE KEYS */;

INSERT INTO `media_types` (`id`, `media_type_name`)
VALUES
	(1,'jpg'),
	(2,'video'),
	(3,'gif');

/*!40000 ALTER TABLE `media_types` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table module_media_lu
# ------------------------------------------------------------

DROP TABLE IF EXISTS `module_media_lu`;

CREATE TABLE `module_media_lu` (
  `module_id` int(4) DEFAULT NULL,
  `media_id` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `module_media_lu` WRITE;
/*!40000 ALTER TABLE `module_media_lu` DISABLE KEYS */;

INSERT INTO `module_media_lu` (`module_id`, `media_id`)
VALUES
	(4,4),
	(5,5),
	(7,7),
	(10,10),
	(11,11),
	(15,15),
	(16,16),
	(19,19),
	(20,20),
	(62,62),
	(64,75);

/*!40000 ALTER TABLE `module_media_lu` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table module_types
# ------------------------------------------------------------

DROP TABLE IF EXISTS `module_types`;

CREATE TABLE `module_types` (
  `id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `module_type_name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `module_types` WRITE;
/*!40000 ALTER TABLE `module_types` DISABLE KEYS */;

INSERT INTO `module_types` (`id`, `module_type_name`)
VALUES
	(1,'banner-image'),
	(2,'banner-video'),
	(3,'detail-left'),
	(4,'detail-right'),
	(5,'gallery');

/*!40000 ALTER TABLE `module_types` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table modules
# ------------------------------------------------------------

DROP TABLE IF EXISTS `modules`;

CREATE TABLE `modules` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `module_type_id` int(2) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `heading` varchar(100) DEFAULT NULL,
  `subhead` varchar(200) DEFAULT NULL,
  `blurb` varchar(400) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `modules` WRITE;
/*!40000 ALTER TABLE `modules` DISABLE KEYS */;

INSERT INTO `modules` (`id`, `module_type_id`, `title`, `heading`, `subhead`, `blurb`, `description`)
VALUES
	(4,1,NULL,NULL,NULL,NULL,NULL),
	(5,1,NULL,NULL,NULL,NULL,NULL),
	(7,1,NULL,NULL,NULL,NULL,NULL),
	(10,2,'Watch Case Study',NULL,NULL,NULL,NULL),
	(11,2,'Watch Trailer',NULL,NULL,NULL,NULL),
	(15,1,NULL,NULL,NULL,NULL,NULL),
	(16,2,NULL,NULL,NULL,NULL,NULL),
	(19,1,NULL,NULL,NULL,NULL,NULL),
	(20,2,NULL,NULL,NULL,NULL,NULL),
	(62,2,'Watch Video',NULL,'About VFILES',NULL,NULL),
	(64,2,'Watch Case Study',NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `modules` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table project_category_lu
# ------------------------------------------------------------

DROP TABLE IF EXISTS `project_category_lu`;

CREATE TABLE `project_category_lu` (
  `project_id` int(4) DEFAULT NULL,
  `category_id` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `project_category_lu` WRITE;
/*!40000 ALTER TABLE `project_category_lu` DISABLE KEYS */;

INSERT INTO `project_category_lu` (`project_id`, `category_id`)
VALUES
	(4,1),
	(5,1),
	(9,1),
	(11,1),
	(7,1),
	(5,2),
	(4,2),
	(11,2);

/*!40000 ALTER TABLE `project_category_lu` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table project_link_lu
# ------------------------------------------------------------

DROP TABLE IF EXISTS `project_link_lu`;

CREATE TABLE `project_link_lu` (
  `link_id` int(4) DEFAULT NULL,
  `project_id` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `project_link_lu` WRITE;
/*!40000 ALTER TABLE `project_link_lu` DISABLE KEYS */;

INSERT INTO `project_link_lu` (`link_id`, `project_id`)
VALUES
	(1,4),
	(2,4),
	(4,5),
	(5,7),
	(8,4);

/*!40000 ALTER TABLE `project_link_lu` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table project_module_lu
# ------------------------------------------------------------

DROP TABLE IF EXISTS `project_module_lu`;

CREATE TABLE `project_module_lu` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int(4) DEFAULT NULL,
  `module_id` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `project_module_lu` WRITE;
/*!40000 ALTER TABLE `project_module_lu` DISABLE KEYS */;

INSERT INTO `project_module_lu` (`id`, `project_id`, `module_id`)
VALUES
	(4,4,4),
	(5,5,5),
	(7,7,7),
	(10,4,10),
	(11,5,11),
	(15,9,15),
	(16,9,16),
	(19,11,19),
	(20,11,20),
	(62,4,62),
	(64,7,64);

/*!40000 ALTER TABLE `project_module_lu` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table projects
# ------------------------------------------------------------

DROP TABLE IF EXISTS `projects`;

CREATE TABLE `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order` int(11) DEFAULT NULL,
  `slug` varchar(50) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `heading` varchar(200) DEFAULT NULL,
  `subhead` varchar(200) DEFAULT NULL,
  `blurb` varchar(500) DEFAULT NULL,
  `description` text,
  `thumbnail_image` varchar(100) DEFAULT NULL,
  `client_logo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;

INSERT INTO `projects` (`id`, `order`, `slug`, `title`, `heading`, `subhead`, `blurb`, `description`, `thumbnail_image`, `client_logo`)
VALUES
	(4,3,'vfiles-smashion','VFILES','VFILES Smashion\nShop. Play. Share.','Working with one of the most influential digital platforms in today’s fashion realm, Raison D’Être collaborated with VFILES to conceptualize and develop a unique mobile gaming application.','Shop. Play. Share.</p><p>Working with one of the most influential digital platforms\nin today’s fashion realm, Raison D’Être collaborated with\nVFILES to conceptualize and develop a unique mobile\ngaming','Challenged with navigating the highly competitive gaming category to develop VFILES’ first game, we were tasked with developing an addictive game that not only required a complementary identity to the VFILES brand, but maintained industry relevance and incorporated innovative storytelling. Our solution? SMASHION!, a gaming application featuring custom models and designer outfits for an authentic front row fashion experience, which allows players to join their favorite supermodels on a Fashion Week adventure.</p>\n\n<p class=\"credits\">\n<span class=\"description-label\">Client:</span>VFILES \n<span class=\"description-label\">Credits:</span>Raison D’Être\n<span class=\"description-label\">Platforms:</span> Mobile - iOS and Android','smashion','vfiles'),
	(5,1,'bca-campaign','The Estée Lauder Companies','The Estée Lauder Companies Breast Cancer Awareness Campaign','In 2014 we were challenged by our client The Estée Lauder Companies, to create a 360 campaign that would inspire audiences to join the important conversation about breast cancer awareness.','Raison D’Être, our beauty & fashion division, along with Click 3X collaborated with The Estée Lauder','In 2014 we were challenged by our client The Estée Lauder Companies, to create a 360 campaign that would inspire audiences to join the important conversation about breast cancer awareness.\n\nOur response was to leverage the power of storytelling across the digital and social landscape by amplifying video content, and tailoring the topics of conversation to connect to a wider audience. With the call-to-action: “Hear our stories. Share yours,” we worked with Click3x Director Jonathan Yi to bring together individuals, their families and supporters to capture a two-way conversation. Through authentic narrative and hours of moving footage, audiences learned that cancer is not a solitary struggle; it affects all of us. The hours of moving footage led to the creation of a campaign trailer and 27-minute documentary.\n\nAdditionally, we created a global experience brought to life on BCACampaign.com. Users around the world visited the website, which was translated into 15 different languages, to share stories, photos, videos and opinions resulting in an aggregated live feed that engaged a global audience. The resulting metrics were astounding - 1,000,000 YouTube views, 2,000,000 social media impressions, and 16,000 moments of engagement demonstrating the power of storytelling to transcend space, time and location.</p>\n\n<p class=\"credits\">\n<span class=\"description-label\">Client:</span>The Estée Lauder Companies Breast Cancer Awareness Campaign\n<span class=\"description-label\">Credits:</span>Raison D’Être, Click3X\n<span class=\"description-label\">Platforms:</span>Broadcast, Print, Digital and Social Media','bca','bca'),
	(7,7,'kmart-video','Kmart','KMART Fashion','Social and Shoppable Video',NULL,'Raison D’Être working with DraftFCB Chicago, created an HTML5 based, cross-platform shoppable video for their client, KMart. Built around the music video for ‘Burning Hearts’ by MNDR, users are given multiple points during the video to pause playback and click on various hot spots on the actors located in the frame. Each hotspot loads a model window containing information on the fashions the actors are wearing, loaded directly from KMart’s e-commerce API. Users can then add to their KMart.com shopping carts from the site, and can share the product links. Using YouTube’s API, the full site experience is available on all recent versions of desktop browsers and tablets.</p>\n\n<p class=\"credits\">\n<span class=\"description-label\">Client:</span>Kmart\n<span class=\"description-label\">Credits:</span>DraftFCB Chicago, Raison D’Être\n<span class=\"description-label\">Platforms:</span>Desktop, Tablet and Mobile','kmart_video','kmart'),
	(9,9,'mufe','Make Up For Ever','Make Up For Ever','Augmented Reality Tutorial Video',NULL,'Make Up For Ever approached us with this unique challenge: create a point-of-sale experience to engage consumers and help them make the best purchase decisions.\n\nIn response, we utilized the tools of augmented reality technology to create a iOS and Android mobile application allowing consumers to scan a product image to learn about four different blush-application techniques.\n\nThe campaign was featured in kiosks throughout Sephora stores nationwide. The process was nothing to blush about. We designed copy and trigger images, shot and edited video portions of engagement, and developed the mobile application for consumers, bringing the experience to life. All media and video content was shot in-house, providing high-quality content. Overall, the project certainly added an innovative tint to the traditional point-of-sale experience.\n</p>\n\n<p class=\"credits\">\n<span class=\"description-label\">Client:</span>Make Up For Ever\n<span class=\"description-label\">Credits:</span>Raison D’Être, Click3X\n<span class=\"description-label\">Platforms:</span>Mobile - iOS and Android','mufe','mufe'),
	(11,4,'roxy','Roxy','Roxy “Dare Yourself” Campaign','Raison D’Être was asked by Digital Brand Architects to create a Facebook based user generated content based contest for ROXY that would increase Facebook likes and generate global buzz.',NULL,'The “Dare Yourself” campaign was created, inviting young women around the world between the ages of 18-28 to submit photo and video content answering why they should be the new face of Roxy using the call-to-action #roxydares. To further extend user engagement, our team aggregated the UGC to create an inspirational video for users to share across Roxy’s social media platforms. The contest was translated into 11 languages and launched in over 40 countries throughout North America, Latin America, North Asia, South Asia, Europe, Africa, and the Middle East, offering an epic adventure for the five winning women.\n\nThe greatest adventure of all? Solving our challenge with over 600,000 additional Facebook likes on the Roxy fan page! Just the way we dare to like it.</p>\n\n<p class=\"credits\">\n<span class=\"description-label\">Client:</span>Roxy\n<span class=\"description-label\">Credits:</span>Raison D’Être\n<span class=\"description-label\">Platforms:</span>Social Media - Facebook','roxy','roxy');

/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
