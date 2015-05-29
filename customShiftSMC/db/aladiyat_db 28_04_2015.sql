-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2015 at 10:26 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `aladiyat_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE IF NOT EXISTS `about_us` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `fax_number` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `web` varchar(50) NOT NULL,
  `po_box` varchar(100) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `thumbnail_image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `title`, `phone_number`, `fax_number`, `email`, `web`, `po_box`, `description`, `thumbnail_image`) VALUES
(1, 'Al Adiyat Magazine ', '', '', '', '', '', 'Al Adiyat Magazine is the leading horseracing magazine in the UAE which is funded and supported by the Dubai Government. The weekly magazine which as named by HH, Sheikh Mohammed Bin Rashid Al Maktoum , delivers comprehensive and unrivalled coverage of racing and all other equestrian discipline in both Arabic and English since it inception on 4th November,1994 .\r\n With renowned international correspondents, Al Adiyat covers the news from all the major horseracing nations of the world. In addition, Al Adiyat provides in-depth coverage of horseracing, endurance, show jumping & polo, and proved to be highly popular all over the country.     Al Adiyat is the only publication which carries the official UAE race card.\r\nThe paper published weekly during the racing industry in the UAE. The magazine enjoys a wide distribution circle which covers , Government organizations in Dubai , racing and equestrian clubs , major hotels and can also be picked up from All EPPCO fuel stations in Dubai and  the northern Emirates , beside special arrangement for distribution in Abu-Dhabi and Al Ain .', 'aboutus_547483d8836c1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `about_us_a`
--

CREATE TABLE IF NOT EXISTS `about_us_a` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `fax_number` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `web` varchar(50) NOT NULL,
  `po_box` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `thumbnail_image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `about_us_a`
--

INSERT INTO `about_us_a` (`id`, `title`, `phone_number`, `fax_number`, `email`, `web`, `po_box`, `description`, `thumbnail_image`) VALUES
(1, ' مركز معلومات دبى لسباق الخيل ', '+971 4 3429999', '+971 4 342 2121', 'it@dubairacinginfo.ae', 'http://www.aladiyat.ae', '53300', 'مركز معلومات دبى لسباق الخيل مركز معلومات دبى لسباق الخيل مركز معلومات دبى لسباق الخيل مركز معلومات دبى لسباق الخيل مركز معلومات دبى لسباق الخيل مركز معلومات دبى لسباق الخيل مركز معلومات دبى لسباق الخيل مركز معلومات دبى لسباق الخيل مركز معلومات دبى لسباق الخيل مركز معلومات دبى لسباق الخيل مركز معلومات دبى لسباق الخيل مركز معلومات دبى لسباق الخيل مركز معلومات دبى لسباق الخيل مركز معلومات دبى لسباق الخيل مركز معلومات دبى لسباق الخيل مركز معلومات دبى لسباق الخيل مركز معلومات دبى لسباق الخيل مركز معلومات دبى لسباق الخيل مركز معلومات دبى لسباق الخيل مركز معلومات دبى لسباق الخيل مركز معلومات دبى لسباق الخيل مركز معلومات دبى لسباق الخيل مركز معلومات دبى لسباق الخيل مركز معلومات دبى لسباق الخيل مركز معلومات دبى لسباق الخيل مركز معلومات دبى لسباق الخيل مركز معلومات دبى لسباق الخيل مركز معلومات دبى لسباق الخيل مركز معلومات دبى لسباق الخيل مركز معلومات دبى لسباق الخيل مركز معلومات دبى لسباق الخيل مركز معلومات دبى لسباق الخيل مركز معلومات دبى لسباق الخيل مركز معلومات دبى لسباق الخيل مركز معلومات دبى لسباق الخيل مركز معلومات دبى لسباق الخيل مركز معلومات دبى لسباق الخيل مركز معلومات دبى لسباق الخيل مركز معلومات دبى لسباق الخيل مركز معلومات دبى لسباق الخيل مركز معلومات دبى لسباق الخيل مركز معلومات دبى لسباق الخيل مركز معلومات دبى لسباق الخيل مركز معلومات دبى لسباق الخيل مركز معلومات دبى لسباق الخيل مركز معلومات دبى لسباق الخيل مركز معلومات دبى لسباق الخيل مركز معلومات دبى لسباق الخيل مركز معلومات دبى لسباق الخيل مركز معلومات دبى لسباق الخيل مركز معلومات دبى لسباق الخيل مركز معلومات دبى لسباق الخيل مركز معلومات دبى لسباق الخيل مركز معلومات دبى لسباق الخيل مركز معلومات دبى لسباق الخيل مركز معلومات دبى لسباق الخيل ', 'aboutus_547483d8836c1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `super_admin` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `image`, `email`, `password`, `super_admin`) VALUES
(1, 'Adil', '', 'test@demo.com', 'dxb@vst$$432', 1),
(2, 'Adil', '', 'adil@visualsparks.com', 'dxb@vst$$432', 0),
(3, 'aladiyat', '', 'aladiyat@gmail.com', 'dxb@vst$$alad', 0),
(4, 'Shafeer Ummer', '', 'shafeer@dubairacinginfo.ae', 'pinky007', 0),
(5, 'DHRIC', '', 'it@dubairacinginfo.ae', 'dhric123', 0),
(6, 'usama', '', 'usama@dubairacinginfo.ae', 'semsem', 0);

-- --------------------------------------------------------

--
-- Table structure for table `app_images`
--

CREATE TABLE IF NOT EXISTS `app_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `post_type` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=257 ;

--
-- Dumping data for table `app_images`
--

INSERT INTO `app_images` (`id`, `post_id`, `post_type`, `image`) VALUES
(222, 2, 8, 'race_course_races_553a1d5d1a718.jpg'),
(223, 24, 3, '3_553a6b5269f6b.jpg'),
(224, 24, 3, '3_553bf3dc4ab47.jpg'),
(225, 25, 3, '3_553c019650d94.jpg'),
(226, 27, 3, '3_553c01b815f13.jpg'),
(227, 25, 3, '3_553c0644b3275.jpg'),
(228, 1, 11, '11_553d647e5aa0d.jpg'),
(229, 30, 3, '3_553e11501da7b.jpg'),
(230, 31, 3, 'columnists_articles_553e10f51f62b.jpg'),
(231, 24, 3, 'columnists_articles_553e118cf2198.jpg'),
(232, 25, 3, 'columnists_articles_553e12de9b9eb.jpg'),
(233, 52, 8, 'race_course_races_553e145f6ebe7.jpg'),
(234, 4, 8, 'race_course_races_553e178eb505a.jpg'),
(235, 32, 3, 'columnists_articles_553e22906adc0.jpg'),
(236, 33, 3, 'columnists_articles_553e22906adc0.jpg'),
(237, 33, 3, 'columnists_articles_553e22907744c.jpg'),
(238, 34, 3, 'columnists_articles_553e22906adc0.jpg'),
(239, 34, 3, 'columnists_articles_553e22907744c.jpg'),
(240, 34, 3, 'columnists_articles_553e229093fc6.jpg'),
(241, 35, 3, 'columnists_articles_553e39d398b3a.jpg'),
(242, 35, 3, 'columnists_articles_553e39d398b58.jpg'),
(243, 176, 1, 'news_553e8e1db9eca.jpg'),
(244, 176, 1, 'news_553e8e1db9ee6.jpg'),
(245, 176, 1, 'news_553e8e1db9efd.jpg'),
(246, 177, 1, 'news_553e8fdf9f8ed.jpg'),
(247, 177, 1, 'news_553e8fdf9f909.jpg'),
(248, 178, 1, 'news_553e909a2fdd8.jpg'),
(249, 178, 1, 'news_553e909a2fdf5.jpg'),
(250, 179, 1, 'news_553e912e7883b.jpg'),
(251, 179, 1, 'news_553e912e78858.jpg'),
(252, 179, 1, 'news_553e912e78870.jpg'),
(253, 180, 1, 'news_553e91b330afa.jpg'),
(254, 180, 1, 'news_553e91b330b17.jpg'),
(255, 180, 1, 'news_553e91b330b2f.jpg'),
(256, 181, 1, 'news_553e92218d210.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `app_images_a`
--

CREATE TABLE IF NOT EXISTS `app_images_a` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `post_type` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `app_images_a`
--

INSERT INTO `app_images_a` (`id`, `post_id`, `post_type`, `image`) VALUES
(1, 24, 3, '3_553e982c7ecfb.jpg'),
(3, 23, 3, '3_553e3a72ca409.jpg'),
(4, 159, 1, 'news_553e92ca79541.jpg'),
(5, 159, 1, 'news_553e92ca7955f.jpg'),
(6, 160, 1, 'news_553e93464b82c.jpg'),
(7, 162, 1, 'news_553e94bb6227c.jpg'),
(8, 162, 1, 'news_553e94bb62292.jpg'),
(9, 163, 1, 'news_553e951c02aa8.jpg'),
(10, 163, 1, 'news_553e951c02ac5.jpg'),
(11, 24, 3, '3_553e9839afe51.jpg'),
(12, 157, 1, '1_553e9a72821e1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `columnists`
--

CREATE TABLE IF NOT EXISTS `columnists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `thumbnail_image` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `data` text NOT NULL,
  `location` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

-- --------------------------------------------------------

--
-- Table structure for table `columnists_a`
--

CREATE TABLE IF NOT EXISTS `columnists_a` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `thumbnail_image` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `data` text NOT NULL,
  `location` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `columnists_a`
--

INSERT INTO `columnists_a` (`id`, `name`, `thumbnail_image`, `description`, `data`, `location`) VALUES
(26, 'حسن البلوشي', 'columnists_thumb_55388c5b15e44.png', '', '', 'عمان');

-- --------------------------------------------------------

--
-- Table structure for table `columnists_articles`
--

CREATE TABLE IF NOT EXISTS `columnists_articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `columnists_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `article_date` date NOT NULL,
  `thumbnail_image` varchar(100) NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

-- --------------------------------------------------------

--
-- Table structure for table `columnists_articles_a`
--

CREATE TABLE IF NOT EXISTS `columnists_articles_a` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `columnists_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `article_date` date NOT NULL,
  `thumbnail_image` varchar(100) NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE IF NOT EXISTS `contact_us` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` varchar(50) NOT NULL,
  `fax` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `thumbnail_image` varchar(100) NOT NULL,
  `latitude` varchar(20) NOT NULL,
  `longitude` varchar(29) NOT NULL,
  `sender_email` varchar(50) NOT NULL,
  `sender_password` varchar(50) NOT NULL,
  `reciver_email` varchar(50) NOT NULL,
  `smtp` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `phone`, `fax`, `email`, `address`, `thumbnail_image`, `latitude`, `longitude`, `sender_email`, `sender_password`, `reciver_email`, `smtp`) VALUES
(4, '+971 4 3429999', '009714 3422121', 'it@dubairacinginfo.ae', 'P.O.Box 53300, Dubai, UAE', 'contactus_553d644981308.jpg', '25.189172', '55.251719', 'AlAdiyat English', 'http://www.aladiyat.ae/ar', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us_a`
--

CREATE TABLE IF NOT EXISTS `contact_us_a` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` varchar(50) NOT NULL,
  `fax` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `thumbnail_image` varchar(100) NOT NULL,
  `latitude` varchar(20) NOT NULL,
  `longitude` varchar(29) NOT NULL,
  `sender_email` varchar(50) NOT NULL,
  `sender_password` varchar(50) NOT NULL,
  `reciver_email` varchar(50) NOT NULL,
  `smtp` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `contact_us_a`
--

INSERT INTO `contact_us_a` (`id`, `phone`, `fax`, `email`, `address`, `thumbnail_image`, `latitude`, `longitude`, `sender_email`, `sender_password`, `reciver_email`, `smtp`) VALUES
(4, '00971 4 3429999', '00971 4 3422121', '4242@gmail.com', 'دبى', 'contactus_553d644981308.jpg', '25.189172', '55.251719', 'AlAdiyat', 'http://www.aladiyat.ae', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `emailsettings`
--

CREATE TABLE IF NOT EXISTS `emailsettings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `EmailTo` varchar(200) NOT NULL,
  `EmailCC` varchar(200) NOT NULL,
  `EmailBack` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `emailsettings`
--

INSERT INTO `emailsettings` (`id`, `EmailTo`, `EmailCC`, `EmailBack`) VALUES
(1, 'syed.fahad@visualsparks.com', 'Email sent successfully', 'Sorry, system was unable to sent email message due to System error.');

-- --------------------------------------------------------

--
-- Table structure for table `emailsettings_a`
--

CREATE TABLE IF NOT EXISTS `emailsettings_a` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `EmailTo` varchar(200) CHARACTER SET utf8 NOT NULL,
  `EmailCC` varchar(200) CHARACTER SET utf8 NOT NULL,
  `EmailBack` varchar(200) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `emailsettings_a`
--

INSERT INTO `emailsettings_a` (`id`, `EmailTo`, `EmailCC`, `EmailBack`) VALUES
(1, 'sohail.mahboob@visualsparks.com', 'يوجد خطأ', 'البريد الإلكتروني المرسلة بنجاح');

-- --------------------------------------------------------

--
-- Table structure for table `generaldetails`
--

CREATE TABLE IF NOT EXISTS `generaldetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `e_about` text NOT NULL,
  `website` varchar(255) NOT NULL,
  `e_credits` text NOT NULL,
  `e_copyright` text NOT NULL,
  `a_about` text NOT NULL,
  `a_credits` text NOT NULL,
  `a_copyright` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `generaldetails`
--

INSERT INTO `generaldetails` (`id`, `e_about`, `website`, `e_credits`, `e_copyright`, `a_about`, `a_credits`, `a_copyright`) VALUES
(1, 'AlAdiyat is best racing agency and organization. World class horses are available for race. from last several years AlAdiyat is a racing champion. etc etc. this is for testing either i is fetching record or not', 'http://www.aladiyat.ae', 'AlAdiyat is best racing organization', 'Copyright 2015, Dubai Horse Racing Information Centre. All Rights Reserved..', 'مركز معلومات دبى لسباق الخيل ', 'مركز معلومات دبى لسباق الخيل ', 'مركز معلومات دبى لسباق الخيل ');

-- --------------------------------------------------------

--
-- Table structure for table `general_news`
--

CREATE TABLE IF NOT EXISTS `general_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `review_text` varchar(30) NOT NULL,
  `thumbnail_image` varchar(100) NOT NULL,
  `news_details_description` text NOT NULL,
  `news_date` date NOT NULL,
  `data` text NOT NULL,
  `news_cata` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='any news related to horse races will come into this table...' AUTO_INCREMENT=183 ;

--
-- Dumping data for table `general_news`
--

INSERT INTO `general_news` (`id`, `title`, `review_text`, `thumbnail_image`, `news_details_description`, `news_date`, `data`, `news_cata`) VALUES
(182, 'asdsadsadsa', '', 'news_553e9f2f8611b.jpg', '<p><span style="color:#FF0000"><span style="font-family:tahoma,geneva,sans-serif; font-size:11.9999990463257px">This is the great&nbsp;</span><span style="font-family:tahoma,geneva,sans-serif; font-size:11.9999990463257px">This is the great&nbsp;</span><span style="font-family:tahoma,geneva,sans-serif; font-size:11.9999990463257px">This is the great</span></span><span style="color:rgb(0, 0, 0); font-family:tahoma,geneva,sans-serif; font-size:11.9999990463257px">&nbsp;</span><span style="color:rgb(0, 0, 0); font-family:tahoma,geneva,sans-serif; font-size:11.9999990463257px">This is the great&nbsp;</span><span style="color:rgb(0, 0, 0); font-family:tahoma,geneva,sans-serif; font-size:11.9999990463257px">This is the great&nbsp;</span><span style="color:rgb(0, 0, 0); font-family:tahoma,geneva,sans-serif; font-size:11.9999990463257px">This is the <span style="font-size:24px">great&nbsp;</span></span><span style="color:rgb(0, 0, 0); font-family:tahoma,geneva,sans-serif; font-size:11.9999990463257px"><span style="font-size:24px">This</span> is the great&nbsp;</span><span style="color:rgb(0, 0, 0); font-family:tahoma,geneva,sans-serif; font-size:11.9999990463257px">This is the great&nbsp;</span><span style="color:rgb(0, 0, 0); font-family:tahoma,geneva,sans-serif; font-size:11.9999990463257px"><span style="background-color:#FF0000">This is the great&nbsp;</span></span><span style="color:rgb(0, 0, 0); font-family:tahoma,geneva,sans-serif; font-size:11.9999990463257px">This is the great&nbsp;</span><span style="color:rgb(0, 0, 0); font-family:tahoma,geneva,sans-serif; font-size:11.9999990463257px">This is the great&nbsp;</span><span style="color:rgb(0, 0, 0); font-family:tahoma,geneva,sans-serif; font-size:11.9999990463257px">This is the great&nbsp;</span><span style="color:rgb(0, 0, 0); font-family:tahoma,geneva,sans-serif; font-size:11.9999990463257px">This is the great&nbsp;</span><span style="color:rgb(0, 0, 0); font-family:tahoma,geneva,sans-serif; font-size:11.9999990463257px">This is the great&nbsp;</span><span style="color:rgb(0, 0, 0); font-family:tahoma,geneva,sans-serif; font-size:11.9999990463257px">This is the great&nbsp;</span><span style="color:rgb(0, 0, 0); font-family:tahoma,geneva,sans-serif; font-size:11.9999990463257px">This is the great&nbsp;</span><span style="color:rgb(0, 0, 0); font-family:tahoma,geneva,sans-serif; font-size:11.9999990463257px">This is the great&nbsp;</span><span style="color:rgb(0, 0, 0); font-family:tahoma,geneva,sans-serif; font-size:11.9999990463257px">This is the great&nbsp;</span><span style="color:rgb(0, 0, 0); font-family:tahoma,geneva,sans-serif; font-size:11.9999990463257px">This is the great&nbsp;</span><span style="color:rgb(0, 0, 0); font-family:tahoma,geneva,sans-serif; font-size:11.9999990463257px">This is the great&nbsp;</span><span style="color:rgb(0, 0, 0); font-family:tahoma,geneva,sans-serif; font-size:11.9999990463257px">This is the great&nbsp;</span><span style="color:rgb(0, 0, 0); font-family:tahoma,geneva,sans-serif; font-size:11.9999990463257px">This is the great&nbsp;</span><span style="color:rgb(0, 0, 0); font-family:tahoma,geneva,sans-serif; font-size:11.9999990463257px">This is the great&nbsp;</span><span style="color:rgb(0, 0, 0); font-family:tahoma,geneva,sans-serif; font-size:11.9999990463257px">This is the great&nbsp;</span><span style="color:rgb(0, 0, 0); font-family:tahoma,geneva,sans-serif; font-size:11.9999990463257px">This is the great&nbsp;</span><span style="color:rgb(0, 0, 0); font-family:tahoma,geneva,sans-serif; font-size:11.9999990463257px">This is the great&nbsp;</span><span style="color:rgb(0, 0, 0); font-family:tahoma,geneva,sans-serif; font-size:11.9999990463257px">This is the great&nbsp;</span><span style="color:rgb(0, 0, 0); font-family:tahoma,geneva,sans-serif; font-size:11.9999990463257px">This is the great&nbsp;</span></p>\r\n', '2015-04-30', '', 'News');

-- --------------------------------------------------------

--
-- Table structure for table `general_news_a`
--

CREATE TABLE IF NOT EXISTS `general_news_a` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(70) NOT NULL,
  `review_text` varchar(50) NOT NULL,
  `thumbnail_image` varchar(100) NOT NULL,
  `news_details_description` mediumtext NOT NULL,
  `news_date` date NOT NULL,
  `data` text NOT NULL,
  `news_cata` text CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=165 ;

--
-- Dumping data for table `general_news_a`
--

INSERT INTO `general_news_a` (`id`, `title`, `review_text`, `thumbnail_image`, `news_details_description`, `news_date`, `data`, `news_cata`) VALUES
(164, 'ية الأصيلة (جروب1) والذي تبلغ القيمة الإجمالية لجو', '', 'news_553e9f88dc3a1.jpg', '<p style="text-align: right;"><span style="color:#FF8C00"><span style="font-size:16px"><span style="font-family:tahoma,geneva,sans-serif">توّج الجواد &laquo;إتس فار فروم اوفر&raquo; لخلفان حمد القبيسي، بلقب بطولة الإمارات في الشوط الرابع للخيول العربية الأصيلة (جروب1) والذي تبلغ القيمة الإجمالية لجوائزه المالية مليون درهم.</span></span></span></p>\r\n\r\n<p style="text-align: right;"><span style="color:#FF8C00"><span style="font-size:16px"><span style="font-family:tahoma,geneva,sans-serif">توّج الجواد &laquo;إتس فار فروم اوفر&raquo; لخلفان حمد القبيسي، بلقب بطولة الإمارات في الشوط الرابع للخيول العربية الأصيلة (جروب1) والذي تبلغ القيمة الإجمالية لجوائزه المالية مليون درهم.</span></span></span></p>\r\n\r\n<p style="text-align: right;"><span style="color:#FF8C00"><span style="font-size:16px"><span style="font-family:tahoma,geneva,sans-serif">توّج الجواد &laquo;إتس فار فروم اوفر&raquo; لخلفان حمد القبيسي، بلقب بطولة الإمارات في الشوط الرابع للخيول العربية الأصيلة (جروب1) والذي تبلغ القيمة الإجمالية لجوائزه المالية مليون درهم.</span></span></span></p>\r\n', '2015-04-24', '', 'News');

-- --------------------------------------------------------

--
-- Table structure for table `horse`
--

CREATE TABLE IF NOT EXISTS `horse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `breeder` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `horse_owner`
--

CREATE TABLE IF NOT EXISTS `horse_owner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `horse_trainer`
--

CREATE TABLE IF NOT EXISTS `horse_trainer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE IF NOT EXISTS `player` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `player_name` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `thumbnail_image` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `data` text NOT NULL,
  `weight` int(11) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `agent` varchar(110) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`id`, `player_name`, `age`, `city`, `country`, `thumbnail_image`, `description`, `data`, `weight`, `phone`, `email`, `agent`) VALUES
(1, 'player 1', 19, 'some_city', 'some_country', '1 (1).jpg', 'some description', 'some datra', 0, '0', '0', '0'),
(2, 'palyer_2', 20, 'some_city', 'some_country_1', '1 (2).jpg', 'some description 1', 'some data 1', 0, '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `publications`
--

CREATE TABLE IF NOT EXISTS `publications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `issue_date` date NOT NULL,
  `pdf_link` varchar(300) NOT NULL,
  `cover_image` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

-- --------------------------------------------------------

--
-- Table structure for table `publications_a`
--

CREATE TABLE IF NOT EXISTS `publications_a` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `issue_date` date NOT NULL,
  `pdf_link` varchar(300) NOT NULL,
  `cover_image` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

-- --------------------------------------------------------

--
-- Table structure for table `pushnotifications`
--

CREATE TABLE IF NOT EXISTS `pushnotifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pushTitle` varchar(500) CHARACTER SET utf8 NOT NULL,
  `pushMsg` varchar(5000) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `pushnotifications`
--

INSERT INTO `pushnotifications` (`id`, `pushTitle`, `pushMsg`) VALUES
(17, 'new competition in jebel ali', 'new competition in jebel ali'),
(20, 'test rubia english', 'If at first you don’t succeed, give up’ is a motto, that has served me well through nearly 48 years of earthly existence. So it is perhaps just as well I am not the trainer of Prince Bishop, because plainly he would not have won the world’s richest race on Saturday.'),
(24, 'خــيول محمـد بن سـعود القاسـمي تخطف الاضـــواء في ', 'خــيول محمـد بن سـعود القاسـمي تخطف الاضـــواء في الدورة لثالثـة عشرة لبطـولة عجمان ل');

-- --------------------------------------------------------

--
-- Table structure for table `race`
--

CREATE TABLE IF NOT EXISTS `race` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `race_course_id` int(11) NOT NULL,
  `race_title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `race_start_time` time NOT NULL,
  `date_record_entered` date NOT NULL,
  `data` text NOT NULL,
  `race_end_time` time NOT NULL,
  `race_held_date` date NOT NULL,
  `Weather` varchar(20) NOT NULL,
  `track_condition` varchar(30) NOT NULL,
  `safety_limit` int(11) NOT NULL,
  `rail_position` varchar(10) NOT NULL,
  `race_status` int(11) NOT NULL COMMENT 'Case1: Race Done - Results Available Case 2: Race Done - Result Not Available Case 3: Race Not Done',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `race`
--

INSERT INTO `race` (`id`, `race_course_id`, `race_title`, `description`, `race_start_time`, `date_record_entered`, `data`, `race_end_time`, `race_held_date`, `Weather`, `track_condition`, `safety_limit`, `rail_position`, `race_status`) VALUES
(6, 53, 'eng', 'gjjjjjjjjjjjjjjjjh', '01:01:00', '2015-04-28', '', '14:01:00', '2015-04-30', 'hgfhfhg', 'mnnbmbmmnb', 0, 'jhgh', 0);

-- --------------------------------------------------------

--
-- Table structure for table `race_a`
--

CREATE TABLE IF NOT EXISTS `race_a` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `race_course_id` int(11) NOT NULL,
  `race_title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `race_start_time` time NOT NULL,
  `date_record_entered` date NOT NULL,
  `data` text NOT NULL,
  `race_end_time` time NOT NULL,
  `race_held_date` date NOT NULL,
  `weather` varchar(30) NOT NULL,
  `track_condition` varchar(30) NOT NULL,
  `safety_limit` int(11) NOT NULL,
  `rail_position` varchar(10) NOT NULL,
  `race_status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `race_a`
--

INSERT INTO `race_a` (`id`, `race_course_id`, `race_title`, `description`, `race_start_time`, `date_record_entered`, `data`, `race_end_time`, `race_held_date`, `weather`, `track_condition`, `safety_limit`, `rail_position`, `race_status`) VALUES
(54, 46, 'arabic', 'jgjgjgjggjgj', '01:01:00', '2015-04-28', '', '01:00:00', '2015-04-23', 'hh', 'hg', 0, 'hkh', 0);

-- --------------------------------------------------------

--
-- Table structure for table `race_course`
--

CREATE TABLE IF NOT EXISTS `race_course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `color_code` varchar(7) NOT NULL,
  `thumbnail_image` varchar(100) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `cover_image` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `record_date` date NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `race_course`
--

INSERT INTO `race_course` (`id`, `name`, `color_code`, `thumbnail_image`, `latitude`, `longitude`, `city`, `country`, `cover_image`, `description`, `record_date`, `data`) VALUES
(53, 'Meydan', 'Blue', 'race_courses_553f255fed764.jpg', 2, 21, '12', '212', 'race_courses_553f255fed764.jpg', '321321', '2015-04-28', '');

-- --------------------------------------------------------

--
-- Table structure for table `race_course_a`
--

CREATE TABLE IF NOT EXISTS `race_course_a` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `color_code` varchar(7) NOT NULL,
  `thumbnail_image` varchar(100) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `cover_image` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `record_date` date NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `race_course_a`
--

INSERT INTO `race_course_a` (`id`, `name`, `color_code`, `thumbnail_image`, `latitude`, `longitude`, `city`, `country`, `cover_image`, `description`, `record_date`, `data`) VALUES
(46, 'جبل على', 'Yellow', 'race_courses_553f276f7a994.jpg', 12.2536, 50.1256, 'wqe', 'eqw', 'race_courses_553f276f7a994.jpg', 'qweqweqweqw', '2015-04-28', '');

-- --------------------------------------------------------

--
-- Table structure for table `race_course_articles`
--

CREATE TABLE IF NOT EXISTS `race_course_articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `race_course_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `thumbnail_image` varchar(100) NOT NULL,
  `article_date` date NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `race_course_articles`
--

INSERT INTO `race_course_articles` (`id`, `race_course_id`, `title`, `description`, `thumbnail_image`, `article_date`, `data`) VALUES
(1, 2, 'article1', 'af;laldjaldfjlajdslfjalfdjladsjflasf', '1.jpg', '2014-09-17', 'http://dl.dropboxusercontent.com/u/37098169/Course%20Brochures/AND101.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `race_course_colors`
--

CREATE TABLE IF NOT EXISTS `race_course_colors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `color_name` varchar(25) DEFAULT NULL,
  `color_code` varchar(10) DEFAULT NULL,
  `order_by` int(11) DEFAULT '999',
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `race_course_colors`
--

INSERT INTO `race_course_colors` (`id`, `color_name`, `color_code`, `order_by`) VALUES
(1, 'Blue', '#0000FF', 999),
(2, 'Green', '#008000', 999),
(3, 'Yellow', '#FFFF00', 999),
(4, 'Red', '#FF0000', 999),
(5, 'Purple', '#800080', 999);

-- --------------------------------------------------------

--
-- Table structure for table `race_course_contact`
--

CREATE TABLE IF NOT EXISTS `race_course_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `race_course_id` int(11) NOT NULL,
  `latitude` varchar(20) NOT NULL,
  `longitude` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `web_address` varchar(50) NOT NULL,
  `record_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `race_course_contact`
--

INSERT INTO `race_course_contact` (`id`, `race_course_id`, `latitude`, `longitude`, `address`, `phone`, `fax`, `email_address`, `web_address`, `record_date`) VALUES
(1, 53, '25.2365', '55.23658', 'FFFFFFFFFFFFFFFFFFFFFFFF', '+971502601836', '+971502601836', 'test@test.com', '', '2015-04-28 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `race_course_contact_a`
--

CREATE TABLE IF NOT EXISTS `race_course_contact_a` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `race_course_id` int(11) NOT NULL,
  `latitude` varchar(20) NOT NULL,
  `longitude` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `web_address` varchar(50) NOT NULL,
  `record_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `race_course_contact_a`
--

INSERT INTO `race_course_contact_a` (`id`, `race_course_id`, `latitude`, `longitude`, `address`, `phone`, `fax`, `email_address`, `web_address`, `record_date`) VALUES
(33, 46, '25.25147', '55.251487', 'JJJJJJJJJJJ', '+971502601836', '+971502601836', 'test@test.com', '', '2015-04-28');

-- --------------------------------------------------------

--
-- Table structure for table `race_course_entry`
--

CREATE TABLE IF NOT EXISTS `race_course_entry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entry_title` varchar(50) NOT NULL,
  `race_course_id` int(11) NOT NULL,
  `admission` varchar(250) NOT NULL,
  `dress_code` varchar(100) NOT NULL,
  `program_of_events` varchar(250) NOT NULL,
  `competitions` varchar(250) NOT NULL,
  `food_beverages` varchar(250) NOT NULL,
  `contact_details` varchar(100) NOT NULL,
  `record_date` datetime NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `race_course_entry`
--

INSERT INTO `race_course_entry` (`id`, `entry_title`, `race_course_id`, `admission`, `dress_code`, `program_of_events`, `competitions`, `food_beverages`, `contact_details`, `record_date`, `data`) VALUES
(4, 'entry title', 1, 'admission', 'dress code', 'program of events', 'competitions', 'food beverages', 'contact details', '2014-10-10 00:00:00', 'http://dl.dropboxusercontent.com/u/37098169/Course%20Brochures/AND101.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `race_course_entry_a`
--

CREATE TABLE IF NOT EXISTS `race_course_entry_a` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entry_title` varchar(50) NOT NULL,
  `race_course_id` int(11) NOT NULL,
  `admission` varchar(250) NOT NULL,
  `dress_code` varchar(100) NOT NULL,
  `program_of_events` varchar(250) NOT NULL,
  `competitions` varchar(250) NOT NULL,
  `food_beverages` varchar(250) NOT NULL,
  `contact_details` varchar(100) NOT NULL,
  `record_date` datetime NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `race_course_offers`
--

CREATE TABLE IF NOT EXISTS `race_course_offers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `race_course_id` int(11) NOT NULL,
  `thumbnail_image` varchar(100) NOT NULL,
  `offer_name` varchar(50) NOT NULL,
  `offer_description` text NOT NULL,
  `post_date` date NOT NULL,
  `valid_date` date NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `race_course_offers`
--

INSERT INTO `race_course_offers` (`id`, `race_course_id`, `thumbnail_image`, `offer_name`, `offer_description`, `post_date`, `valid_date`, `data`) VALUES
(1, 2, '1.jpg', 'offer 1', 'alkfjafdjlkajfdljas', '2014-09-18', '2014-09-19', 'http://dl.dropboxusercontent.com/u/37098169/Course%20Brochures/AND101.pdf'),
(2, 2, '2.jpg', 'offer 2', 'afdadfafdadf ', '2014-09-18', '2014-09-19', 'http://dl.dropboxusercontent.com/u/37098169/Course%20Brochures/AND101.pdf'),
(3, 20, 'race_course_offers_5469cdc71f022.jpg', 'Testing race course offer name', 'This is testing race course offer description.', '2014-11-26', '2014-11-29', '');

-- --------------------------------------------------------

--
-- Table structure for table `race_course_track`
--

CREATE TABLE IF NOT EXISTS `race_course_track` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `race_course_id` int(11) NOT NULL,
  `track_title` varchar(50) NOT NULL,
  `thumbnail_image` varchar(100) NOT NULL,
  `track_specification` text NOT NULL,
  `record_date` datetime NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Table structure for table `race_course_track_a`
--

CREATE TABLE IF NOT EXISTS `race_course_track_a` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `race_course_id` int(11) NOT NULL,
  `track_title` varchar(100) NOT NULL,
  `thumbnail_image` varchar(100) NOT NULL,
  `track_specification` text NOT NULL,
  `record_date` date NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

-- --------------------------------------------------------

--
-- Table structure for table `regid`
--

CREATE TABLE IF NOT EXISTS `regid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `regid` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=519 ;

--
-- Dumping data for table `regid`
--

INSERT INTO `regid` (`id`, `regid`) VALUES
(4, 'APA91bFtWudLQ1POXcw6X0aCnM9tGB2UxuICjNDc8ryOcIWCSKRDQm18yJ68JPYeQvOuMC667fxCCMh9QqFyAwm_M62UVkqmtqSH_HoCLrOTPo9fmzdlj0DIJaPLqciVjimADDhBmhDqsUfDHw21cGl-XTXM7-xvhg'),
(5, 'APA91bELKvdf0xX5B_EvoryZDGFp-mHeQvaco7z__FgnMQWImmS7kmZulmgQbpDYUPPYAceCh8ocbxDQjn6ZPryJH_hONpnZgBK-TzDb4P60nGyjNyv1tiLiwJBeC9QSFXWVGcn7qKPhjCC5OwbAyMx9VtdQttxdDA'),
(7, 'APA91bELKvdf0xX5B_EvoryZDGFp-mHeQvaco7z__FgnMQWImmS7kmZulmgQbpDYUPPYAceCh8ocbxDQjn6ZPryJH_hONpnZgBK-TzDb4P60nGyjNyv1tiLiwJBeC9QSFXWVGcn7qKPhjCC5OwbAyMx9VtdQttxdDA'),
(10, 'APA91bEsHvC2F9hPNCC6ZwBQmjh5PliqaEo6xMvNav_RKP7VD27uM0QuewaOk0d6NmHfhQxAQSKBZzlj2oBGcvcYwRPbKMp_jwkXITXZ4vy0V5v5JWT1bJ9PXv49g6geeS0jh1qiz3xv5DGilJfxJrLUlh7s75R5Og'),
(12, 'APA91bFpVduFr70kRwOLKMXqr0nQLqiPxZ2BgjqEWKs85qE9tEoROSFEpCwV4uh5Go4lr-SOZMbrF7MwBq1U-iC8_L4bASURRrNYdYS4vAmLoe_qi_ae3an081PdN8eWbi60PftGWYsbrbBCrVCcvpqoK7SpIr5IJw'),
(13, 'APA91bGc6B0TS5r20kg8Vc5mR_9yGsasQnnLIVcgXOnOt0vWmct_Rh9g1wUlYACvMh7sQ_RKAUNcPAkwrncAkYIlfPqr97gQqzYwOG39tj2jHUe3IcaeGmRF3jwTCq4TK7EXleiee7oXzIzMsHN7XlmHm9_LrfJFPA'),
(15, 'APA91bGi2fzDmJFAkdDGWN9JrqZtUT_D1Of216PunEpGuCqGh0Ckpea74IKKgqYDdrHf0QBgBLgR7uxJ1U6e0mCm2SVK7mmvH1IgaIo9GWW2RsCbRv9Mxb9oXfqsARst0IZ74WZgLnc4AwqApl4HfOL2tL0eHl6JQQ'),
(40, 'APA91bGc6B0TS5r20kg8Vc5mR_9yGsasQnnLIVcgXOnOt0vWmct_Rh9g1wUlYACvMh7sQ_RKAUNcPAkwrncAkYIlfPqr97gQqzYwOG39tj2jHUe3IcaeGmRF3jwTCq4TK7EXleiee7oXzIzMsHN7XlmHm9_LrfJFPA'),
(41, 'APA91bGrQKiWUCgcDHgLf-uUrIaU-WY2QIifjpZ33g5Kd1Ubox4Uy9IrPMeXOROJgs1NBAEhvTE-BYVnQI-f-pVGzvp3BbB4qWnovBUEz0cJTmMzYznxUAr4zPx8PstvrH9bLdjkHzvVjyqErzWpmDwwpKnJaBt70A'),
(42, 'APA91bG3ImVkk1CRQa_8bafxVQbQ7wQppxdnWce5M_DXr7kgjz0yffqJPzWdzx2qSjftA6RTzRZ8OjjwGJjFG1aC1_eKSOhuzn6tZ_WfTsGLPfowU7T-w-VaXg5i9Om6BW7C_9mj718TYO78nFQI_-1HiXDtVPRDgA'),
(43, 'APA91bFRHUaRmVAD_y2J0zetY_ST1MSRI0p0DE0EiK7XSQ-T282TIYntpGCBB6gQ-uyro83Ci8SUwPTFRAxhpvzzHxkrN1QBkT77kD3ws3a_TdMZr_9Uqg_rkGLPjWTIG-3RgDQMeBeipE0eGsCUV74pYjOThLXjcw'),
(44, 'APA91bGvZMWKlVS6ACca0bA7v7S3xfTFUBjcMFq7ezs-O9qoPfZvuXUDf94XDsFS4gZGZSa7kMiLmwY9hkK008UbLLHSEqLS7hXWXAJFvPHEu-f6qN_N5qgXrZ95awybqtjvlLCKwkNC--Bzo0nyjBwA3pHZ0c8wbA'),
(45, 'APA91bFmdlOyLnLdwDpjVAM3FJQlrjaZNyiZekQFgqu5rNLwIfrB-zlzRDOluxnwHkwSw0CdDHFTi0on-fJutuuakgl2KQ_PwPsxhZFF5vZH94etSYwRMgYRyDu5d7rCKFWS45pCcvqDZBJn7G5OgAMFysJbvB_sZg'),
(142, 'APA91bGc6B0TS5r20kg8Vc5mR_9yGsasQnnLIVcgXOnOt0vWmct_Rh9g1wUlYACvMh7sQ_RKAUNcPAkwrncAkYIlfPqr97gQqzYwOG39tj2jHUe3IcaeGmRF3jwTCq4TK7EXleiee7oXzIzMsHN7XlmHm9_LrfJFPA'),
(149, 'APA91bHVXmdo7M4Se2XM0Ao4sNCvOBN5XYPWm42JRtbr8xa-fwQECmXEqZMiTFNThmY4eMAV4HFY6qLz89wM0MPD-Jb4L9mzVUmc72dpfTmcI4lTo0E7RoX3xUS-ebELjrlMcTPilANjB28EGtXRvSqKHeMB_PUmEQ'),
(150, 'APA91bHRc8Ob2uQXRx-yViUoS-PqxOO8G_TE7UOVOC5rcxY7DtfVaQWPRX5BRojqg-wagTc6jlHz4IkJTYRtqI6HynCPKL5pHTGu0T3BYzhg698plOIirjy1z36BsH_GU7QcG5uDds9oZwApGWAKs4q7m8yNsKc97g'),
(151, 'APA91bGc6B0TS5r20kg8Vc5mR_9yGsasQnnLIVcgXOnOt0vWmct_Rh9g1wUlYACvMh7sQ_RKAUNcPAkwrncAkYIlfPqr97gQqzYwOG39tj2jHUe3IcaeGmRF3jwTCq4TK7EXleiee7oXzIzMsHN7XlmHm9_LrfJFPA'),
(234, 'APA91bFxUjHe-n65q5KwEIB7XFNyDQUzHeGj1BwTjKWhdcve99z8J_bLYUCQrZfKFPuYLtCDE7WHtEsObFvVvkTZ3fBQT7FOAbcy1Mr35CrbP9Go8BdsIbJ_kQRavVTLlxCGSSxaioUi1BzGljgGnd9X_IxUyszhsQ'),
(238, 'APA91bHsROCDBo3z7uXd5pmagovWayWXK_uhTShh8BcOHlcX9H6zuVVtLBDi0bdi1zDPMzfUMqpIgTT5jaaZQ4EZY8epB9SDCLihGNtdwH8MTbwPrcd1xzt-F1fjXRl-jOuSy3MzQiw0OLVCB_BKHUx83LQOaphLtw'),
(257, 'APA91bFdNtwnqdqfwfXNEFwVj2LDKMo_2RI2DwQLKygmtKjzFXyElE7twViYqYW7hNVMfhl1RJH6kGM4kC0LDTCfgKrWlymPHgwK_ZSIGLtVJsksKV3ZNHNj4QA9GVmlnClBack0x1E2_uowZNiWcDqMhQnZPfWB5Q'),
(284, 'APA91bGNVGMuPdECRmLcKS9lYGF3hdIWRiLschOPcRQDHzftjafs9uzIxxPpQHp9SpIiCv9R8p7-yfVqsaF4ihSb1p4iV-SUKMK4Fmdq73oz5Or6sFegZRLcQJBzFMhrxggXFbyT37_d5Uzf0j9iCyUuORoVCBt-tg'),
(300, 'APA91bHkt4aJXtumPC2tg_tCUttPazme3Tma5-Krz8CtHlEcBTDG6aOkeXmt6MADu2C2VmqbbBYbxFLoUd1K9n_Vc3M-gdWh_BuThpndybJHvEMI9efBQLtp1lP2ppFIQWW0BBis0YLqrqgCKg4DI01k1zblxYOjAw'),
(306, 'APA91bEZRG48_c0Tvkh0XnQk94kVoP3WaQ8F2JpZxqS_3P_t6hqW77vyoeFCJU3qcziDntcf575hrx46uldMeLu1G9GV62Y21ALr0pTgd1BX0YChYT7wlIr8pE5azMbZf8DnDxbJM-x6m5vR3-jML5VuToTpEsOdcQ'),
(316, 'APA91bFSQF0xZPJ5rwhO70z89ygzTriZ6n97pjQ3N172sxi_LCzOrg6bDOW2ILIUTzaF2_YHN0riov6T3ZjIbECXzvQWk0LXuLke5Eb9p-EPjta-vIg93fM76UZ0vb0h8JgbqsS3Ut5KyurbC1cnxY-0T7XPL6Tyng'),
(331, 'APA91bEmNMAvjdMq4QPUkpoAyDIEbv_-f-DXshXjNXT2V_DulfucQFe7Qt6ODn2bp_l4snUEITYdyvWLW5V56uS_S4N_PoxtXPEyK8_q6oSS0vbg30FU8xWB1PcqZmb9bqeAbNTpEs0byg0PbJdvB2mpd4iZ5CDWEQ'),
(333, 'APA91bHJk7wEZxz27h438ETTB6cPENfqpKUEBcU7NJWN3-1hjm60fmRIdubCEbYfOr7hjyDIrEVOiGXLZTLPi8OR3ABAofY2kkHtoSAuBWPJfrzWJlZ7BeNj9kYNFV108JDA--ANH2n69-JwRHQJBkLbTHCzHW8zoQ'),
(337, 'APA91bFCyChZmz0na03CxQiX59F0v0PFeM-DJxNAQk-tTULBVlA5E83IWosyRfIrg5gutkXFKYm4T3o7LxvHlp9WI5D0seCzJ9-d2dJmmphNsH08CZwrQp6Cz9gOnXDGQNu3AGxsGee0qoICc7T3-yWHtxt_CcxesQ'),
(338, 'APA91bEbzASypv0sk4NH40TCvKGJHritopzQxPYEvzffoVGgkzci8mrEM_fHplouh-3RdwSGYkqB-K6wM2aRnQUrxCZR2uUIgqXwT-ItMay8j2JDkoieol1rSDMKZiswqImEkjDguq1ZoKe-AS261YvxRdJCrmOqSg'),
(339, 'APA91bFji6eXN3yQMha5aIkt_lAHHZdbygZB0sp4KDS1yLMdZ_cBKEwaKAO_MoIcaIiN5UgCXFNWgtu3dg7p1LZOqGqzIX0QryZ-TfLX7yVa_YFlGwg4McyuwVgKVX50aJ0gOFth68B1Mf8qQ18j0WCpdXH91mvG-w'),
(374, 'APA91bEdVG6WIvuYbnIYFFTyFfKtY0Lj8VJvETUC9qF0JYNVzel9WKrbr6vMcvcvdCJfl25A32dA7kxbZY_QFf3qgDoYZE53io-iwm29o9uLCxLsIB6q4HBlpW9eFSR8SdBB8WRFt0bT3OwMoEfGur_oXFH7-lLETg'),
(453, 'APA91bGIj2fpQBtDRJGcpG7cAHsUII7ZuC679y2ZG0jLPKgzT_sO8wd8qxUrpybOOBVhCmCzKGzg_gRltA2sulqQkpe7kshqbUNMb34XjeT1Fccw29PO8QL4BLAd6HtYvzxqcLokAPjsBcPypQ7uYrr18tFE9Rd6QQ'),
(454, 'APA91bGGhA4on2rkRCFK3c3r6BlOiVUbivRBKlC30oNIsoOJh_PEYRqKUH6LuYIXCgWsds3Z2OsC9cLPDsOGdun_KI7tseBzIKq7lAb_zJTkZIDjwbcTI4ISGPegTWy_MTEGAX1yg-zJFQ1AVFOn4ufUGLWkUzPDkA'),
(484, 'APA91bGXlilboxdvjyo5Ja2eDVA1ytz42kmHYKZQ1_XlUszwltiq3iT7y71Gc-H3k3iCVVbRdjJ-azJolS9tG9Py_XmU1ryvXNysFqBhBfDuKzwOVWpqup4BkNEEbQpmaJ_F0hoKnRz3dgi9O5Nh-DCX2arT5iGncw'),
(485, 'APA91bGXlilboxdvjyo5Ja2eDVA1ytz42kmHYKZQ1_XlUszwltiq3iT7y71Gc-H3k3iCVVbRdjJ-azJolS9tG9Py_XmU1ryvXNysFqBhBfDuKzwOVWpqup4BkNEEbQpmaJ_F0hoKnRz3dgi9O5Nh-DCX2arT5iGncw'),
(486, 'APA91bGXlilboxdvjyo5Ja2eDVA1ytz42kmHYKZQ1_XlUszwltiq3iT7y71Gc-H3k3iCVVbRdjJ-azJolS9tG9Py_XmU1ryvXNysFqBhBfDuKzwOVWpqup4BkNEEbQpmaJ_F0hoKnRz3dgi9O5Nh-DCX2arT5iGncw'),
(487, 'APA91bGXlilboxdvjyo5Ja2eDVA1ytz42kmHYKZQ1_XlUszwltiq3iT7y71Gc-H3k3iCVVbRdjJ-azJolS9tG9Py_XmU1ryvXNysFqBhBfDuKzwOVWpqup4BkNEEbQpmaJ_F0hoKnRz3dgi9O5Nh-DCX2arT5iGncw'),
(488, 'APA91bE7GWsF-KCOZchRGBIbnewKHCeFVc5M_K6Js9BK0Ix9p5L4MkmJZksUR8CYiWs5R_qD8embUz61xO0VgQSVRAa_HDQoOkQdxDlAkaXhk1Po0PGnvJxg2Zo2UJbwSaf0HZGoS4WGcrGzkhnsRrlPBFyoEz-aHA'),
(489, 'APA91bGXlilboxdvjyo5Ja2eDVA1ytz42kmHYKZQ1_XlUszwltiq3iT7y71Gc-H3k3iCVVbRdjJ-azJolS9tG9Py_XmU1ryvXNysFqBhBfDuKzwOVWpqup4BkNEEbQpmaJ_F0hoKnRz3dgi9O5Nh-DCX2arT5iGncw'),
(490, 'APA91bGXlilboxdvjyo5Ja2eDVA1ytz42kmHYKZQ1_XlUszwltiq3iT7y71Gc-H3k3iCVVbRdjJ-azJolS9tG9Py_XmU1ryvXNysFqBhBfDuKzwOVWpqup4BkNEEbQpmaJ_F0hoKnRz3dgi9O5Nh-DCX2arT5iGncw'),
(491, 'APA91bGXlilboxdvjyo5Ja2eDVA1ytz42kmHYKZQ1_XlUszwltiq3iT7y71Gc-H3k3iCVVbRdjJ-azJolS9tG9Py_XmU1ryvXNysFqBhBfDuKzwOVWpqup4BkNEEbQpmaJ_F0hoKnRz3dgi9O5Nh-DCX2arT5iGncw'),
(492, 'APA91bGXlilboxdvjyo5Ja2eDVA1ytz42kmHYKZQ1_XlUszwltiq3iT7y71Gc-H3k3iCVVbRdjJ-azJolS9tG9Py_XmU1ryvXNysFqBhBfDuKzwOVWpqup4BkNEEbQpmaJ_F0hoKnRz3dgi9O5Nh-DCX2arT5iGncw'),
(493, 'APA91bGXlilboxdvjyo5Ja2eDVA1ytz42kmHYKZQ1_XlUszwltiq3iT7y71Gc-H3k3iCVVbRdjJ-azJolS9tG9Py_XmU1ryvXNysFqBhBfDuKzwOVWpqup4BkNEEbQpmaJ_F0hoKnRz3dgi9O5Nh-DCX2arT5iGncw'),
(494, 'APA91bGXlilboxdvjyo5Ja2eDVA1ytz42kmHYKZQ1_XlUszwltiq3iT7y71Gc-H3k3iCVVbRdjJ-azJolS9tG9Py_XmU1ryvXNysFqBhBfDuKzwOVWpqup4BkNEEbQpmaJ_F0hoKnRz3dgi9O5Nh-DCX2arT5iGncw'),
(495, 'APA91bGXlilboxdvjyo5Ja2eDVA1ytz42kmHYKZQ1_XlUszwltiq3iT7y71Gc-H3k3iCVVbRdjJ-azJolS9tG9Py_XmU1ryvXNysFqBhBfDuKzwOVWpqup4BkNEEbQpmaJ_F0hoKnRz3dgi9O5Nh-DCX2arT5iGncw'),
(496, 'APA91bGXlilboxdvjyo5Ja2eDVA1ytz42kmHYKZQ1_XlUszwltiq3iT7y71Gc-H3k3iCVVbRdjJ-azJolS9tG9Py_XmU1ryvXNysFqBhBfDuKzwOVWpqup4BkNEEbQpmaJ_F0hoKnRz3dgi9O5Nh-DCX2arT5iGncw'),
(497, 'APA91bGXlilboxdvjyo5Ja2eDVA1ytz42kmHYKZQ1_XlUszwltiq3iT7y71Gc-H3k3iCVVbRdjJ-azJolS9tG9Py_XmU1ryvXNysFqBhBfDuKzwOVWpqup4BkNEEbQpmaJ_F0hoKnRz3dgi9O5Nh-DCX2arT5iGncw'),
(498, 'APA91bGXlilboxdvjyo5Ja2eDVA1ytz42kmHYKZQ1_XlUszwltiq3iT7y71Gc-H3k3iCVVbRdjJ-azJolS9tG9Py_XmU1ryvXNysFqBhBfDuKzwOVWpqup4BkNEEbQpmaJ_F0hoKnRz3dgi9O5Nh-DCX2arT5iGncw'),
(499, 'APA91bGXlilboxdvjyo5Ja2eDVA1ytz42kmHYKZQ1_XlUszwltiq3iT7y71Gc-H3k3iCVVbRdjJ-azJolS9tG9Py_XmU1ryvXNysFqBhBfDuKzwOVWpqup4BkNEEbQpmaJ_F0hoKnRz3dgi9O5Nh-DCX2arT5iGncw'),
(500, 'APA91bGXlilboxdvjyo5Ja2eDVA1ytz42kmHYKZQ1_XlUszwltiq3iT7y71Gc-H3k3iCVVbRdjJ-azJolS9tG9Py_XmU1ryvXNysFqBhBfDuKzwOVWpqup4BkNEEbQpmaJ_F0hoKnRz3dgi9O5Nh-DCX2arT5iGncw'),
(501, 'APA91bGXlilboxdvjyo5Ja2eDVA1ytz42kmHYKZQ1_XlUszwltiq3iT7y71Gc-H3k3iCVVbRdjJ-azJolS9tG9Py_XmU1ryvXNysFqBhBfDuKzwOVWpqup4BkNEEbQpmaJ_F0hoKnRz3dgi9O5Nh-DCX2arT5iGncw'),
(502, 'APA91bGXlilboxdvjyo5Ja2eDVA1ytz42kmHYKZQ1_XlUszwltiq3iT7y71Gc-H3k3iCVVbRdjJ-azJolS9tG9Py_XmU1ryvXNysFqBhBfDuKzwOVWpqup4BkNEEbQpmaJ_F0hoKnRz3dgi9O5Nh-DCX2arT5iGncw'),
(503, 'APA91bGXlilboxdvjyo5Ja2eDVA1ytz42kmHYKZQ1_XlUszwltiq3iT7y71Gc-H3k3iCVVbRdjJ-azJolS9tG9Py_XmU1ryvXNysFqBhBfDuKzwOVWpqup4BkNEEbQpmaJ_F0hoKnRz3dgi9O5Nh-DCX2arT5iGncw'),
(504, 'APA91bGXlilboxdvjyo5Ja2eDVA1ytz42kmHYKZQ1_XlUszwltiq3iT7y71Gc-H3k3iCVVbRdjJ-azJolS9tG9Py_XmU1ryvXNysFqBhBfDuKzwOVWpqup4BkNEEbQpmaJ_F0hoKnRz3dgi9O5Nh-DCX2arT5iGncw'),
(505, 'APA91bGXlilboxdvjyo5Ja2eDVA1ytz42kmHYKZQ1_XlUszwltiq3iT7y71Gc-H3k3iCVVbRdjJ-azJolS9tG9Py_XmU1ryvXNysFqBhBfDuKzwOVWpqup4BkNEEbQpmaJ_F0hoKnRz3dgi9O5Nh-DCX2arT5iGncw'),
(506, 'APA91bGXlilboxdvjyo5Ja2eDVA1ytz42kmHYKZQ1_XlUszwltiq3iT7y71Gc-H3k3iCVVbRdjJ-azJolS9tG9Py_XmU1ryvXNysFqBhBfDuKzwOVWpqup4BkNEEbQpmaJ_F0hoKnRz3dgi9O5Nh-DCX2arT5iGncw'),
(507, 'APA91bGXlilboxdvjyo5Ja2eDVA1ytz42kmHYKZQ1_XlUszwltiq3iT7y71Gc-H3k3iCVVbRdjJ-azJolS9tG9Py_XmU1ryvXNysFqBhBfDuKzwOVWpqup4BkNEEbQpmaJ_F0hoKnRz3dgi9O5Nh-DCX2arT5iGncw'),
(508, 'APA91bGXlilboxdvjyo5Ja2eDVA1ytz42kmHYKZQ1_XlUszwltiq3iT7y71Gc-H3k3iCVVbRdjJ-azJolS9tG9Py_XmU1ryvXNysFqBhBfDuKzwOVWpqup4BkNEEbQpmaJ_F0hoKnRz3dgi9O5Nh-DCX2arT5iGncw'),
(509, 'APA91bGXlilboxdvjyo5Ja2eDVA1ytz42kmHYKZQ1_XlUszwltiq3iT7y71Gc-H3k3iCVVbRdjJ-azJolS9tG9Py_XmU1ryvXNysFqBhBfDuKzwOVWpqup4BkNEEbQpmaJ_F0hoKnRz3dgi9O5Nh-DCX2arT5iGncw'),
(510, 'APA91bGXlilboxdvjyo5Ja2eDVA1ytz42kmHYKZQ1_XlUszwltiq3iT7y71Gc-H3k3iCVVbRdjJ-azJolS9tG9Py_XmU1ryvXNysFqBhBfDuKzwOVWpqup4BkNEEbQpmaJ_F0hoKnRz3dgi9O5Nh-DCX2arT5iGncw'),
(511, 'APA91bGXlilboxdvjyo5Ja2eDVA1ytz42kmHYKZQ1_XlUszwltiq3iT7y71Gc-H3k3iCVVbRdjJ-azJolS9tG9Py_XmU1ryvXNysFqBhBfDuKzwOVWpqup4BkNEEbQpmaJ_F0hoKnRz3dgi9O5Nh-DCX2arT5iGncw'),
(512, 'APA91bGXlilboxdvjyo5Ja2eDVA1ytz42kmHYKZQ1_XlUszwltiq3iT7y71Gc-H3k3iCVVbRdjJ-azJolS9tG9Py_XmU1ryvXNysFqBhBfDuKzwOVWpqup4BkNEEbQpmaJ_F0hoKnRz3dgi9O5Nh-DCX2arT5iGncw'),
(513, 'APA91bGXlilboxdvjyo5Ja2eDVA1ytz42kmHYKZQ1_XlUszwltiq3iT7y71Gc-H3k3iCVVbRdjJ-azJolS9tG9Py_XmU1ryvXNysFqBhBfDuKzwOVWpqup4BkNEEbQpmaJ_F0hoKnRz3dgi9O5Nh-DCX2arT5iGncw'),
(514, 'APA91bGXlilboxdvjyo5Ja2eDVA1ytz42kmHYKZQ1_XlUszwltiq3iT7y71Gc-H3k3iCVVbRdjJ-azJolS9tG9Py_XmU1ryvXNysFqBhBfDuKzwOVWpqup4BkNEEbQpmaJ_F0hoKnRz3dgi9O5Nh-DCX2arT5iGncw'),
(515, 'APA91bFeA_CVtWTApvrB6d6wf6DE5MIs4maG1svp4B5CbSo_7IwDBJcwyHViNgpcqpDbNPScMpe3-CsTbjjrjcB6nOgs5IIKPyjC3mRrAuodzpGT23N5g7DTOiI-1a_9ZqhA-2yvOSAPZ5w1QL7QlsWLNYnk3VOUfA'),
(516, 'APA91bH1ZreAcZzFX1j78JrKOLFAH3zzxi2d8XPrHkkf1tUaEF4f-AW7n_WgpzxB7PHb-ihQ7nhK9LqFqqQWaJtcAPH85fBY6AfSML0h8WMHy7wSCFqP8TqNgxDiKrxtLJbMpJbRhmH2NMJXDz1yhWc5MDJJOrJy3w'),
(518, 'APA91bG0pMLQY6e_i32Vl4X0EQm_qLHI4949O-osUaeVfvk18YiVAYPkXHwCwtFodqQjAJQaMeQNcEoZ4bPqBtgxR8AgrRKeQ52bGdVaoubCdctax9XdwFhDqZWGZ1jiUWFBpXcCONwHBrKQTvZnkk1qYw7eDwEzpg');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE IF NOT EXISTS `result` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `race_id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `distance_covered` float NOT NULL,
  `time_to_cover_distance` float NOT NULL,
  `position` int(11) NOT NULL,
  `data` text NOT NULL,
  `date` datetime NOT NULL,
  `horse_id` int(11) NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `race_id`, `player_id`, `distance_covered`, `time_to_cover_distance`, `position`, `data`, `date`, `horse_id`, `trainer_id`, `owner_id`) VALUES
(1, 1, 1, 10.9, 2, 2, 'result pdf file link', '2014-09-11 00:00:00', 0, 0, 0),
(4, 1, 2, 15, 2, 2, 'adfadfadf', '2014-09-18 00:00:00', 0, 0, 0),
(5, 2, 1, 32, 23, 23, 'dsafafaf', '2014-09-12 00:00:00', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE IF NOT EXISTS `social_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `image` text NOT NULL,
  `url` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `social_links`
--

INSERT INTO `social_links` (`id`, `name`, `image`, `url`) VALUES
(1, 'Facebook', '', 'https://www.facebook.com/aladiyat'),
(2, 'Twitter', '', 'https://twitter.com/aladiyatuae'),
(5, 'Linkedin', '', 'http://www.linkedin.com');

-- --------------------------------------------------------

--
-- Table structure for table `social_links_a`
--

CREATE TABLE IF NOT EXISTS `social_links_a` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `image` text NOT NULL,
  `url` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `social_links_a`
--

INSERT INTO `social_links_a` (`id`, `name`, `image`, `url`) VALUES
(1, 'Facebook', 'asdasdas', 'https://www.facebook.com/learn.arabic'),
(2, 'Twitter', 'asdasd', 'Arabic Url'),
(5, 'Linkedin', 'asdasd', 'Arabic URL');

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE IF NOT EXISTS `sponsors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `image` varchar(500) NOT NULL,
  `url` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `sponsors`
--

INSERT INTO `sponsors` (`id`, `name`, `image`, `url`) VALUES
(18, 'Emirates Racing Association', 'news_551966f0c3a17.jpg', 'www.emiratesracing.com'),
(19, 'Jebel Ali Race Course', 'news_55196761bd0ef.jpg', 'http://www.dubairealestatecentre.com/'),
(20, 'Dubai Racing Club', 'news_551967adb5718.jpg', 'www.dubairacingclub.com'),
(21, 'Al Ain Equestrian Club', 'news_551967eeeae5d.jpg', 'www.aesgc.com'),
(22, 'Emirates Eque Federation', 'news_5519680d6195a.jpg', 'www.eef.ae'),
(23, 'Sharjah Equestrian & Racing Club', 'news_551968814a72e.jpg', 'www.serc.ae'),
(24, 'Shadwell', 'news_551968b2c4d16.jpg', 'www.shadwellstud.com'),
(25, 'Dubai Racing Channel', 'news_55196909694b8.jpg', 'www.dmi.ae/dubairacing'),
(28, 'Abu Dhabi Equestrian Club', 'news_55196a0ba675b.jpg', 'www.adec-web.com'),
(33, 'Save from You Tube', 'news_5537415c6eec3.png', 'http://en.savefrom.net/?rmode=false');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
