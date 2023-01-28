
-- winter2023_surveys-01262023.sql

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';
DROP TABLE IF EXISTS `winter2023_questions`;
CREATE TABLE `winter2023_questions` (
  `QuestionID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `SurveyID` int(10) unsigned DEFAULT '0',
  `Question` text,
  `Description` text,
  `DateAdded` datetime DEFAULT NULL,
  `LastUpdated` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE 
CURRENT_TIMESTAMP,
  PRIMARY KEY (`QuestionID`),
  KEY `SurveyID_index` (`SurveyID`),
  CONSTRAINT `winter2023_questions_ibfk_1` FOREIGN KEY (`SurveyID`) REFERENCES 
`winter2023_surveys` (`SurveyID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `winter2023_questions` (`QuestionID`, `SurveyID`, `Question`, `Description`, 
`DateAdded`, `LastUpdated`) VALUES
(1, 1, 'Do You Like Our Website?', 'We really want to know!', '2018-07-16 
15:17:13', '2018-07-16 22:17:13'),
(2, 1, 'Do You Like Cookies?', 'We like cookies!', '2018-07-16 15:17:13',
'2018-07-16 22:17:13'),
(3, 1, 'Favorite Toppings?', 'We like chocolate!', '2018-07-16 15:17:13',
'2018-07-16 22:17:13');
DROP TABLE IF EXISTS `winter2023_surveys`;
CREATE TABLE `winter2023_surveys` (
  `SurveyID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `AdminID` int(10) unsigned DEFAULT '0',
  `Title` varchar(255) DEFAULT '',
  `Description` text,
  `DateAdded` datetime DEFAULT NULL,
  `LastUpdated` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE 
CURRENT_TIMESTAMP,
  `TimesViewed` int(11) DEFAULT '0',
  `Status` int(11) DEFAULT '0',
  PRIMARY KEY (`SurveyID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `winter2023_surveys` (`SurveyID`, `AdminID`, `Title`, `Description`, 
`DateAdded`, `LastUpdated`, `TimesViewed`, `Status`) VALUES
(1, 1, 'Our First Survey', 'Description of Survey', '2018-07-16 
15:17:13', '2018-07-16 22:17:13', 0, 0);
-- 2019-04-25 21:37:12
