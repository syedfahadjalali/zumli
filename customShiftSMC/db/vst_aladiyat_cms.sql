-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 28, 2014 at 04:33 PM
-- Server version: 5.5.37-cll
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `faditekd_aladiyat`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE IF NOT EXISTS `about_us` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `fax_number` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `web` varchar(50) NOT NULL,
  `po_box` varchar(100) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `title`, `phone_number`, `fax_number`, `email`, `web`, `po_box`, `description`) VALUES
(1, 'Al Adiyat Magazine', '+971 4 342 9999', '+971 4 342 2121', 'it@dubairacinginfo.ae', ' www.aladiyat.ae', ' P.O.Box 53300, Dubai, UAE', 'Al Adiyat Magazine is the leading horseracing magazine in the UAE which is funded and supported by the Dubai Government. The weekly magazine which as named by HH, Sheikh Mohammed Bin Rashid Al Maktoum , delivers comprehensive and unrivalled coverage of racing and all other equestrian discipline in both Arabic and English since it inception on 4th November,1994 . With renowned international correspondents, Al Adiyat covers the news from all the major horseracing nations of the world. In addition, Al Adiyat provides in-depth coverage of horseracing, endurance, show jumping & polo, and proved to be highly popular all over the country\n      Al Adiyat is the only publication which carries the official UAE race card .The paper published weekly during the racing industry in the UAE. The magazine enjoys a wide distribution circle which covers , Government organizations in Dubai , racing and equestrian clubs , major hotels and can also be picked up from All EPPCO fuel stations in Dubai and  the northern Emirates , beside special arrangement for distribution in Abu-Dhabi and Al Ain .\n');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `about_us_a`
--

INSERT INTO `about_us_a` (`id`, `title`, `phone_number`, `fax_number`, `email`, `web`, `po_box`, `description`) VALUES
(1, 'آل Adiyat مجلة', '+971 4 342 9999', '+971 4 342 2121', 'it@dubairacinginfo.ae', ' www.aladiyat.ae', 'صندوق بريد 53300، دبي، الإمارات العربية المتحدة', 'آل Adiyat مجلة هي مجلة سباق الخيل الرائدة في دولة الإمارات العربية المتحدة الذي تموله وتدعمه حكومة دبي. المجلة الأسبوعية التي كما يسميه صاحب السمو الشيخ محمد بن راشد آل مكتوم، يسلم التغطية واسعة النطاق والتي لا تضاهى من السباق والفروسية عن الانضباط الأخرى باللغتين العربية والإنجليزية لأنه إنشائها على 4 نوفمبر 1994. مع المراسلين الدوليين المشهورين، آل Adiyat يغطي الأخبار من جميع الأمم لسباقات الخيول الكبرى في العالم. بالإضافة إلى ذلك، توفر شركة Adiyat تغطية متعمقة لسباق الخيل، والتحمل، وقفز الحواجز والبولو، وثبت أن بشعبية كبيرة في جميع أنحاء البلاد \r\n       آل Adiyat هو نشر الوحيد الذي يحمل بطاقة سباق الإمارات. ورقة رسمية نشرت أسبوعيا خلال صناعة السباق في الإمارات. تتمتع مجلة دائرة واسعة التوزيع التي تغطي من المؤسسات الحكومية في دبي، وسباق الفروسية والأندية الرياضية والفنادق الكبرى ويمكن أيضا أن تكون التقطت من جميع محطات الوقود ايبكو في دبي والإمارات الشمالية، بجانب ترتيبات خاصة للتوزيع في أبوظبي و العين.');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `image`, `email`, `password`, `super_admin`) VALUES
(1, 'Adil', '', 'test@demo.com', '123456', 1),
(2, 'Adil', '', 'adil@visualsparks.com', '123adil', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `app_images`
--

INSERT INTO `app_images` (`id`, `post_id`, `post_type`, `image`) VALUES
(1, 1, 4, '1.jpg'),
(2, 4, 1, '2.jpg'),
(3, 2, 2, '3.jpg'),
(4, 4, 4, 'race_course3.jpg'),
(5, 4, 4, 'race_course1.jpg'),
(6, 4, 4, 'race_course2.jpg'),
(7, 1, 11, 'about_us_1.jpg'),
(8, 1, 11, 'about_us_2.jpg'),
(9, 5, 2, 'columnists_544001ef177a3.jpg'),
(10, 6, 2, 'columnists_544001f5774f1.jpg'),
(11, 2, 12, 'race_course_track_544291a549c62.jpg'),
(12, 2, 12, 'race_course_track_544291a549cbb.jpg'),
(13, 6, 4, 'race_courses_5442a5091e968.jpg'),
(14, 6, 4, 'race_courses_5442a5091e9d0.jpg'),
(15, 3, 12, 'race_course_track_5442b4d62753c.jpg'),
(16, 3, 12, 'race_course_track_5442b4d62759c.jpg'),
(17, 3, 12, 'race_course_track_5442b4d6275f6.jpg'),
(18, 7, 4, 'race_courses_5446be4811420.jpg'),
(19, 8, 4, 'race_courses_5446c12b48f33.jpg'),
(20, 10, 4, 'race_courses_5446c36c757f6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `columnists`
--

CREATE TABLE IF NOT EXISTS `columnists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `thumbnail_image` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `columnists`
--

INSERT INTO `columnists` (`id`, `name`, `birthdate`, `thumbnail_image`, `description`, `data`) VALUES
(8, 'DThomson3', '0000-00-00', 'columnists_5443cdf9920f0.jpg', '', ''),
(9, 'Godfrey Nick', '0000-00-00', 'columnists_5443ce1fb50f9.jpg', '', ''),
(10, 'Harry', '0000-00-00', 'columnists_5443ce405e3f4.jpg', '', ''),
(11, 'HowardWright', '0000-00-00', 'columnists_5443ce502a25d.jpg', '', ''),
(12, 'John Berry', '0000-00-00', 'columnists_5443ce63466a0.png', '', ''),
(13, 'Patrick Cummings', '0000-00-00', 'columnists_5443ce74f351f.jpg', '', ''),
(14, 'SAM', '0000-00-00', 'columnists_5443ce869e1b1.jpg', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `columnists_a`
--

CREATE TABLE IF NOT EXISTS `columnists_a` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `thumbnail_image` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `columnists_a`
--

INSERT INTO `columnists_a` (`id`, `name`, `birthdate`, `thumbnail_image`, `description`, `data`) VALUES
(12, 'جون بيري', '0000-00-00', 'columnists_5443ce63466a0.png', '', ''),
(14, 'SAM', '0000-00-00', 'columnists_5443ce869e1b1.jpg', '', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `columnists_articles`
--

INSERT INTO `columnists_articles` (`id`, `columnists_id`, `title`, `description`, `article_date`, `thumbnail_image`, `data`) VALUES
(6, 12, 'John Berry Article', 'The ERA publishes the Akhbar Al Khail, an industry racing periodical, on a weekly basis during the racing season. â€œThe Akhbarâ€ provides information for industry participants, including general notices, handicap ratings, Stewardsâ€™ Reports, Rule amendments, the Veterinary List and the Startersâ€™ List.', '2014-09-11', 'columnists_articles_5443cf1fe98c6.png', ''),
(7, 8, 'D Thomson Article', 'A CLASH between\r\nlast weekâ€™s Group\r\nOne winning milers\r\nKingman and Toronado in next\r\nmonthâ€™s Sussex Stakes moved\r\na step closer on Sunday when\r\nconnections confirmed both colts\r\nare being aimed at the Goodwood\r\nhighlight, the scene of many\r\nmemorable duels in the past.\r\nImpressive St Jamesâ€™s Palace\r\nwinner Kingman has had a much\r\nbusier first half to the season\r\nthan the year-older Toronado,\r\nbut trainer John Gosden has\r\nconfirmed the Sussex is the first of\r\nthree further options for him over\r\nthe next four months, all of which\r\nhe hopes the colt can take up.', '2014-09-19', 'columnists_articles_5443cf96dd6c0.jpg', 'N/A');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `columnists_articles_a`
--

INSERT INTO `columnists_articles_a` (`id`, `columnists_id`, `title`, `description`, `article_date`, `thumbnail_image`, `data`) VALUES
(1, 12, 'جون بيري المادة', 'وERA تنشر الأخبار شارع الخيل، وسباق دورية الصناعة، على أساس أسبوعي خلال موسم السباقات. â € œThe Akhbarâ €؟ يوفر معلومات للمشاركين الصناعة، بما في ذلك إشعارات العامة، تصنيفات الإعاقة، Stewardsâ € ™ تقارير، المادة تعديلات، قائمة البيطري وStartersâ € ™ قائمة.', '2014-09-11', 'columnists_articles_5443cf1fe98c6.png', 'N/A');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `generaldetails`
--

INSERT INTO `generaldetails` (`id`, `e_about`, `website`, `e_credits`, `e_copyright`, `a_about`, `a_credits`, `a_copyright`) VALUES
(1, 'Al Adiyat Magazine is the leading horseracing magazine in the UAE which is funded and supported by the Dubai Government. The weekly magazine which as named by HH, Sheikh Mohammed Bin Rashid Al Maktoum , delivers comprehensive and unrivalled coverage of racing and all other equestrian discipline in both Arabic and English since it inception on 4th November,1994 . With renowned international correspondents, Al Adiyat covers the news from all the major horseracing nations of the world. In addition, Al Adiyat provides in-depth coverage of horseracing, endurance, show jumping & polo, and proved to be highly popular all over the country\n      Al Adiyat is the only publication which carries the official UAE race card .The paper published weekly during the racing industry in the UAE. The magazine enjoys a wide distribution circle which covers , Government organizations in Dubai , racing and equestrian clubs , major hotels and can also be picked up from All EPPCO fuel stations in Dubai and  the northern Emirates , beside special arrangement for distribution in Abu-Dhabi and Al Ain .', 'http://emiratesracing.com/', 'Visual Sparks Technologies LLC\n Tel: +971 (4) 4567445 \nFax: +971 (4) 4317900 \nMob: +971 50 5940424 \nEmail: adil@visualsparks.com', 'Copyright Â© 2010 Emirates Racing Authority. All Rights Reserved.', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `general_news`
--

CREATE TABLE IF NOT EXISTS `general_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `review_text` varchar(30) NOT NULL,
  `thumbnail_image` varchar(100) NOT NULL,
  `news_details_description` text NOT NULL,
  `news_date` date NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='any news related to horse races will come into this table...' AUTO_INCREMENT=12 ;

--
-- Dumping data for table `general_news`
--

INSERT INTO `general_news` (`id`, `title`, `review_text`, `thumbnail_image`, `news_details_description`, `news_date`, `data`) VALUES
(9, 'Toronado blows rivals away', 'Toronado blows rivals away', 'news_544f95e5742bc.png', '2014-09-10', '0000-00-00', 'N/A'),
(10, '', '', 'news_544fa7f94a985.png', '', '0000-00-00', ''),
(11, '', '', 'news_544fa82da11a9.png', '', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `general_news_a`
--

CREATE TABLE IF NOT EXISTS `general_news_a` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `review_text` varchar(50) NOT NULL,
  `thumbnail_image` varchar(100) NOT NULL,
  `news_details_description` text NOT NULL,
  `news_date` date NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `general_news_a`
--

INSERT INTO `general_news_a` (`id`, `title`, `review_text`, `thumbnail_image`, `news_details_description`, `news_date`, `data`) VALUES
(4, 'الأخبار', 'مراجعة ', '1.jpg', 'هذه هي بعض التفاصيل ', '2014-10-21', 'هذه هي بعض التفاصيل '),
(5, '', '', 'news_544f95e5742bc.png', '', '0000-00-00', ''),
(6, '', '', 'news_544f97c3b9ad4.png', '', '0000-00-00', '');

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `publications`
--

INSERT INTO `publications` (`id`, `name`, `issue_date`, `pdf_link`) VALUES
(1, 'Issue 534', '2014-10-08', 'http://aladiyat.witsapplication.com/aladiyat/images/pdf/magazines/Issue_534/Al_Adiyat_Issue_534_Eng.pdf'),
(2, 'Issue 535', '2014-10-01', 'http://aladiyat.witsapplication.com/aladiyat/images/pdf/magazines/Issue_535/Al_Adiyat_Issue_535_E.pdf'),
(3, 'Issue 536', '2014-10-18', 'http://aladiyat.witsapplication.com/aladiyat/images/pdf/magazines/Issue_536/Al_Adiyat_Issue_536_Eng_web.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `publications_a`
--

CREATE TABLE IF NOT EXISTS `publications_a` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `issue_date` date NOT NULL,
  `pdf_link` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `publications_a`
--

INSERT INTO `publications_a` (`id`, `name`, `issue_date`, `pdf_link`) VALUES
(1, 'القضية 534', '2014-10-08', 'http://aladiyat.witsapplication.com/aladiyat/images/pdf/magazines/Issue_534/Al_Adiya_Issue_534_Arab.pdf'),
(2, 'القضية 535', '2014-10-01', '"http://aladiyat.witsapplication.com/aladiyat/images/pdf/magazines/Issue_535/Al_Adiyat_Issue-535_A.pdf'),
(3, 'القضية 536', '2014-10-18', 'http://aladiyat.witsapplication.com/aladiyat/images/pdf/magazines/Issue_536/Al_Adiyat_Issue_536_arb.pdf');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `race`
--

INSERT INTO `race` (`id`, `race_course_id`, `race_title`, `description`, `race_start_time`, `date_record_entered`, `data`, `race_end_time`, `race_held_date`, `Weather`, `track_condition`, `safety_limit`, `rail_position`, `race_status`) VALUES
(6, 6, 'The Curragh Race', 'This race is test race', '11:30:00', '2014-10-19', 'http://aladiyat.witsapplication.com/aladiyat/images/pdf/race_cards/R2E.pdf', '12:00:00', '2014-10-20', 'Good', 'Good', 0, 'Good', 0),
(7, 6, 'Hard Core Race in Medyan', 'This race is to check calender', '00:20:14', '2014-10-19', 'http://aladiyat.witsapplication.com/aladiyat/images/pdf/race_cards/R3E.pdf', '13:30:00', '2014-08-03', 'Moderate', 'Good', 0, '1', 0),
(8, 6, 'This is racing mania challege', 'This is test race that is going to happen in decemeber', '14:00:00', '2014-10-19', 'http://aladiyat.witsapplication.com/aladiyat/images/pdf/race_cards/R1E.pdf', '14:30:00', '2014-12-01', 'Windy', 'Moderate', 1, '1', 0),
(9, 4, 'Race 1 1400ft', 'the details will be provided soon...', '10:20:00', '2014-10-19', 'http://aladiyat.witsapplication.com/aladiyat/images/pdf/race_cards/R1E.pdf', '10:50:00', '2014-11-19', 'normal', '1', 1, '1', 0),
(11, 10, 'Race1 1400 t', '', '20:00:00', '2014-10-25', 'http://aladiyat.witsapplication.com/aladiyat/images/pdf/race_cards/R1E.pdf', '20:30:00', '2014-08-10', '', '', 0, '', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `race_a`
--

INSERT INTO `race_a` (`id`, `race_course_id`, `race_title`, `description`, `race_start_time`, `date_record_entered`, `data`, `race_end_time`, `race_held_date`, `weather`, `track_condition`, `safety_limit`, `rail_position`, `race_status`) VALUES
(1, 4, 'وادي القمر سباق المنافسة على اللقب', 'وسيتم توفير التفاصيل قريبا ...', '10:20:00', '2014-10-21', 'http://aladiyat.witsapplication.com/aladiyat/images/pdf/race_cards/R1E.pdf', '10:50:00', '2014-10-21', 'طبيعي', '1', 1, '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `race_course`
--

CREATE TABLE IF NOT EXISTS `race_course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `color_code` varchar(7) NOT NULL,
  `thumbnail_image` varchar(100) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `cover_image` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `record_date` date NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `race_course`
--

INSERT INTO `race_course` (`id`, `name`, `color_code`, `thumbnail_image`, `latitude`, `longitude`, `city`, `country`, `cover_image`, `description`, `record_date`, `data`) VALUES
(4, 'Meydan', '#BCA9F5', 'race_courses_thumb_544c15a0b89ee.png', 25.1893, 55.2516, 'Medan', 'U.A.E', 'columnists_cover_544c15af66989.png', 'About Meydan Racecourse  The Meydan Grandstand and Racecourse will serve as a major business and conference district and a conduit for lifestyle, entertainment and sports. It extends 1.6km on a linear, â€˜land scraperâ€™ plane that has a full capacity accommodating up to 60,000 people.  Crowned by a dramatic, cantilevered Crescent Roof that features curved solar and titanium panels that maximize the buildingâ€™s energy consumption efficiency, the iconic Meydan Grandstand is a unique and â€˜intelligentâ€™ development that is equipped with hospitality facilities that offer world-class services for discerning horsemen, patrons, travellers and guests alike.   It houses the worldâ€™s first five-star trackside hotel; The Meydan, which offers unobstructed views of the racetracks, and also houses an exciting mix of food and beverage establishments, a covered car park for up to 8,600 cars, the Meydan Museum and Gallery, an IMAX Theatre and the Meydan Marina. The Dubai Racing Club and Emirates Racing Authority and the new Meydan Freezone Corporation offices will also be located within the Grandstand facility.  Opening for the racing season on January 28, 2010, the Meydan Grandstand and Racecourse will however best be known for being the new home of the widely anticipated 18th Dubai World Cup to be held on March 30. Prize money for the meeting has also been upped to US$ 27.25 million to attract the best race horses in the world.  Corporations and high net worth individuals will be right in the thick of all the action from one of 78 exclusive Meydan Grandstand Corporate Suites which will offer guests unparalleled views, levels of luxury, customer comfort and integrated technology to create what will be the ultimate horseracing experience.  Born from the vision of His Highness Sheikh Mohammed bin Rashid Al Maktoum, UAE Vice President and Prime Minister and Ruler of Dubai, the Meydan Grandstand and Racecourse is culmination of what will be the definitive benchmark for any global sporting destination.  Committee  Mr Saeed H Al-Tayer, Chairman Mr Ahmad Abdulla Al Shaikh Mr Malih Lahej Al Basti     Key facts  Size of Racecourse district: 67 million sq ft  The Meydan Hotel: Will adjoin the Grandstand, with over 95% of the 290 rooms and suites having a direct, unobstructed view of the racetrack  Grandstand capacity: 20,000 tiered seating and over 60,000 capacity for the Grandstand  Total Grandstand building length: 1.6km, including the Boathouse and receiving barns  Total car park wingspan (in the shape of a falcon): 1.3km  Car park capacity: Up to 8,600 cars  Tracks: 1750m (8.75 furlongs) All-weather Tapeta surface and 2400m (12 furlongs) Turf tracks   Other features surrounding the Grandstand will include:   Facilities include world-class horseracing facilities such as receiving barns and stables for horses, all-weather surface practice track, jockey and horsemenâ€™s lounges, amongst others.', '2014-10-17', ''),
(10, 'Abu Dhabi', '#1FFF22', 'race_courses_thumb_544c17462dca0.png', 25.1893, 55.2516, '', '', 'columnists_cover_544c1757927e5.png', 'About Abu Dhabi Equestrian Club  Originally founded as a riding club by The President, His Highness Sheikh Zayed bin Sultan Al Nahyan, in 1976. The grass surfaced racetrack was laid down in 1980 with open racing beginning in 1991.Prior to this the Club staged private meetings for Arabian horses to coincide with important occasions. In 1994, following instructions by His Highness The President , the club was completely modernised with the construction of a new fibreturf grass racetrack and the installation of floodlights to enable racing to take place after sunset. Other facilities have also been added to the club including new air conditioned stable blocks and equine swimming pool. A state of the art 5000 seater grandstand, which includes corporate hospitality boxes, VIP suites and administration offices, is available for the 2011/2012 season.  Committee  His Highness Sheikh Mansour bin Zayed Al Nahyan, Chairman Mr Adnan Sultan Saif Mr Mohsin Mafuz Dr Jaber Bittar', '2014-10-21', '');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `race_course_a`
--

INSERT INTO `race_course_a` (`id`, `name`, `color_code`, `thumbnail_image`, `latitude`, `longitude`, `city`, `country`, `cover_image`, `description`, `record_date`, `data`) VALUES
(4, 'مون فالى', '#BCA9F5', 'race_courses_thumb_544c15a0b89ee.png', 31.5497, 74.3436, 'ميدان', 'U.A.E', 'columnists_cover_544c15af66989.png', 'مرحبا بكم في ميدان، وجهة لرجال الأعمال والرياضة ونمط الحياة التي يتشكل قلب دبي.', '2014-10-20', ''),
(6, 'لاهور نادي سباق', '#00FF80', 'race_courses_thumb_544c162977bf3.png', 31.5497, 74.3436, 'لاهور', 'باكستان', 'columnists_cover_544c163a65f44.png', 'لاهور سباق نادي، في لاهور، البنجاب، باكستان، هو ناد تعنى برياضة سباق الخيل، التي أنشئت في عام 1924 عندما كان لاهور جزءا من إقليم البنجاب في الهند. النادي البريطاني مسجلة كشركة. بعض قدامى المحاربين يدعي أنه يعود تاريخه الى عام 1874، ولكن بالرغم من وجود سباقات الخيول في لاهور خلال تلك الفترة سجل رسمي من النادي الحالي لا يعود حتى الآن. وقد تأسس البنك بتاريخ 18 كانون الثاني 1924.The النادي ميدان سباق الخيل كان في البداية في سجن الطريق، لاهور، الموقع الحالي للجيلاني بارك. في عام 1976، طلبت حكومة ذو الفقار علي بوتو النادي للتحرك سباقات بعيدا عن مسار الطريق سجن، لكنه بقي هناك حتى عام 1980، عندما اضطر للم تعقد لمدة خمسة عشر شهرا leave.Races، ولكن في سبتمبر 1981 النادي أعاد برنامج السباقات على مسار جديد في كوت Lakhpat التي يبلغ طولها 2،254 متر. منذ ذلك الحين، اكتسبت قوة وتنظم الآن، من بين أجناس أخرى، فإن باكستان ديربي.', '2014-10-20', ''),
(7, '', '', 'race_courses_544f9bf2679c0.png', 3243240, 3423430, '', '', 'race_courses_544f9bf2679c0.png', '', '0000-00-00', ''),
(10, '', '', 'race_courses_544fa996bf556.png', 12.2121, 22.1212, '', '', 'race_courses_544fa996bf556.png', '', '0000-00-00', ''),
(11, '', '', 'race_courses_544fbf0ac04db.png', 12.2222, 12.1111, '', '', 'race_courses_544fbf0ac04db.png', '', '0000-00-00', ''),
(12, '', '', 'race_courses_544fc12b9c2f8.png', 23.3434, 21312300, '', '', 'race_courses_544fc12b9c2f8.png', '', '0000-00-00', ''),
(13, '', '', 'race_courses_544fc36a93c55.png', 230, 212, '', '', 'race_courses_544fc36a93c55.png', '', '0000-00-00', ''),
(14, '', '', 'race_courses_544fc465d6fda.png', 230, 120, '', '', 'race_courses_544fc465d6fda.png', '', '0000-00-00', '');

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
-- Table structure for table `race_course_contact`
--

CREATE TABLE IF NOT EXISTS `race_course_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `race_course_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `sub_title` varchar(100) NOT NULL,
  `post_office` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `web_address` varchar(50) NOT NULL,
  `image_map` varchar(50) NOT NULL,
  `record_date` datetime NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `race_course_contact`
--

INSERT INTO `race_course_contact` (`id`, `race_course_id`, `title`, `sub_title`, `post_office`, `phone`, `fax`, `email_address`, `web_address`, `image_map`, `record_date`, `data`) VALUES
(1, 4, 'title', 'sub title', 'post office', ' +971 4 342 9999', '+971 4 342 2121', ' it@dubairacinginfo.ae', ' www.aladiyat.ae', '2.jpg', '2014-10-23 00:00:00', 'http://dl.dropboxusercontent.com/u/37098169/Course%20Brochures/AND101.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `race_course_contact_a`
--

CREATE TABLE IF NOT EXISTS `race_course_contact_a` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `race_course_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `sub_title` varchar(100) NOT NULL,
  `post_office` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `web_address` varchar(50) NOT NULL,
  `image_map` varchar(100) NOT NULL,
  `record_date` date NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `race_course_contact_a`
--

INSERT INTO `race_course_contact_a` (`id`, `race_course_id`, `title`, `sub_title`, `post_office`, `phone`, `fax`, `email_address`, `web_address`, `image_map`, `record_date`, `data`) VALUES
(1, 4, 'عنوان', 'العنوان الفرعي', 'مكتب البريد', ' +971 4 342 9999', '+971 4 342 2121', ' it@dubairacinginfo.ae', ' www.aladiyat.ae', '2.jpg', '2014-10-15', 'http://dl.dropboxusercontent.com/u/37098169/Course%20Brochures/AND101.pdf');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

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

--
-- Dumping data for table `race_course_entry_a`
--

INSERT INTO `race_course_entry_a` (`id`, `entry_title`, `race_course_id`, `admission`, `dress_code`, `program_of_events`, `competitions`, `food_beverages`, `contact_details`, `record_date`, `data`) VALUES
(3, 'عنوان الدخول', 4, 'القبول', 'اللباس', 'برنامج الأحداث', 'المسابقات', 'المشروبات الغذائية', 'تفاصيل الاتصال', '2014-10-20 00:00:00', 'http://dl.dropboxusercontent.com/u/37098169/Course%20Brochures/AND101.pdf');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `race_course_offers`
--

INSERT INTO `race_course_offers` (`id`, `race_course_id`, `thumbnail_image`, `offer_name`, `offer_description`, `post_date`, `valid_date`, `data`) VALUES
(1, 2, '1.jpg', 'offer 1', 'alkfjafdjlkajfdljas', '2014-09-18', '2014-09-19', 'http://dl.dropboxusercontent.com/u/37098169/Course%20Brochures/AND101.pdf'),
(2, 2, '2.jpg', 'offer 2', 'afdadfafdadf ', '2014-09-18', '2014-09-19', 'http://dl.dropboxusercontent.com/u/37098169/Course%20Brochures/AND101.pdf');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `race_course_track`
--

INSERT INTO `race_course_track` (`id`, `race_course_id`, `track_title`, `thumbnail_image`, `track_specification`, `record_date`, `data`) VALUES
(2, 4, 'Moon Vally track', 'Abu_Dabi.png', 'the destination for business, sport and lifestyle that is shaping the heart of Dubai. ', '2014-10-17 08:36:34', 'http://dl.dropboxusercontent.com/u/37098169/Course%20Brochures/AND101.pdf'),
(3, 6, 'Lahore Race Club Title', 'Al_Ain.png', 'Lahore Race Club Specifications... ', '2014-10-18 00:00:00', 'http://dl.dropboxusercontent.com/u/37098169/Course%20Brochures/AND101.pdf'),
(4, 7, 'The Track at Meydan Racecourse', 'race_course_track_5446bf0f268c7.png', 'Track Specifications\r\n\r\nMeydan Main Track\r\n\r\nALL-WEATHER TRACK\r\n\r\nLeft Handed\r\nOval Distance: 1750 meters (8Â¾ furlongs)\r\nChute:\r\n1500 meters\r\n1600 meters\r\nWidth: 25 meters (approx. 82ft)\r\nBanking on the turns: 6%\r\nBanking on the straightaway: 1%\r\nDistance from final turn to finish line: 400m (2 furlongs)\r\nTURF TRACK\r\n\r\nLeft Handed\r\nOval Distance: 2400 meters (12 furlongs)\r\nChute:\r\n1200 meters\r\n2000 meters\r\nWidth: 30 meters (approx. 98ft)\r\nBanking on the turns: 5%\r\nBanking on the straightaway: 1.5%\r\nDistance from final turn to finish line: 450m (2.25 furlongs)', '2014-10-21 00:00:00', ''),
(7, 10, ' The Track at Sharjah Equestrian and Racing Club', 'race_course_track_5446c41591013.png', 'Left handed dirt/sand track of 1600 metres with a 1200 metre straight.', '2014-10-21 00:00:00', '');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `race_course_track_a`
--

INSERT INTO `race_course_track_a` (`id`, `race_course_id`, `track_title`, `thumbnail_image`, `track_specification`, `record_date`, `data`) VALUES
(1, 4, 'وادي القمر المسار', 'Abu_Dabi.png', 'وجهة لرجال الأعمال والرياضة ونمط الحياة التي يتشكل قلب دبي.', '2014-10-20', 'http://dl.dropboxusercontent.com/u/37098169/Course%20Brochures/AND101.pdf'),
(2, 6, 'لاهور سباق نادي العنوان', 'Al_Ain.png', 'لاهور نادي سباق المواصفات ...', '2014-10-20', 'http://dl.dropboxusercontent.com/u/37098169/Course...');

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
