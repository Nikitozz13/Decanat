-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.25a


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema decanat
--

CREATE DATABASE IF NOT EXISTS decanat;
USE decanat;

--
-- Definition of table `disciplines`
--

DROP TABLE IF EXISTS `disciplines`;
CREATE TABLE `disciplines` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `disciplines`
--

/*!40000 ALTER TABLE `disciplines` DISABLE KEYS */;
INSERT INTO `disciplines` (`id`,`name`) VALUES 
 (1,'Программирование'),
 (2,'Матанализ'),
 (3,'Физра'),
 (4,'Цветоведение'),
 (5,'Проектирование');
/*!40000 ALTER TABLE `disciplines` ENABLE KEYS */;


--
-- Definition of table `education_forms`
--

DROP TABLE IF EXISTS `education_forms`;
CREATE TABLE `education_forms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `education_forms`
--

/*!40000 ALTER TABLE `education_forms` DISABLE KEYS */;
INSERT INTO `education_forms` (`id`,`name`) VALUES 
 (1,'Очная'),
 (2,'Заочная'),
 (3,'Вечерняя');
/*!40000 ALTER TABLE `education_forms` ENABLE KEYS */;


--
-- Definition of table `exams`
--

DROP TABLE IF EXISTS `exams`;
CREATE TABLE `exams` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `discipline_id` int(10) unsigned NOT NULL,
  `teacher_id` int(10) unsigned NOT NULL,
  `datetime` datetime NOT NULL,
  `auditory` int(10) unsigned DEFAULT NULL,
  `type` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `disc_id` (`discipline_id`),
  KEY `teacher_id` (`teacher_id`),
  CONSTRAINT `disc_id` FOREIGN KEY (`discipline_id`) REFERENCES `disciplines` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `teacher_id` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exams`
--

/*!40000 ALTER TABLE `exams` DISABLE KEYS */;
/*!40000 ALTER TABLE `exams` ENABLE KEYS */;


--
-- Definition of table `exams_students`
--

DROP TABLE IF EXISTS `exams_students`;
CREATE TABLE `exams_students` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(10) unsigned NOT NULL,
  `exam_id` int(10) unsigned NOT NULL,
  `mark` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `student` (`student_id`),
  KEY `exam` (`exam_id`),
  CONSTRAINT `exam` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `student` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exams_students`
--

/*!40000 ALTER TABLE `exams_students` DISABLE KEYS */;
/*!40000 ALTER TABLE `exams_students` ENABLE KEYS */;


--
-- Definition of table `faculties`
--

DROP TABLE IF EXISTS `faculties`;
CREATE TABLE `faculties` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faculties`
--

/*!40000 ALTER TABLE `faculties` DISABLE KEYS */;
INSERT INTO `faculties` (`id`,`name`) VALUES 
 (1,'ИВТ'),
 (2,'Худ. Граф');
/*!40000 ALTER TABLE `faculties` ENABLE KEYS */;


--
-- Definition of table `group_students`
--

DROP TABLE IF EXISTS `group_students`;
CREATE TABLE `group_students` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `student_id` (`student_id`),
  KEY `group_id` (`group_id`),
  CONSTRAINT `group_id` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `student_id` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `group_students`
--

/*!40000 ALTER TABLE `group_students` DISABLE KEYS */;
INSERT INTO `group_students` (`id`,`student_id`,`group_id`) VALUES 
 (1,1,1),
 (2,2,1),
 (3,3,1),
 (4,4,2),
 (5,6,4);
/*!40000 ALTER TABLE `group_students` ENABLE KEYS */;


--
-- Definition of table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `number` int(10) unsigned NOT NULL,
  `education_form` int(10) unsigned NOT NULL,
  `entrant_year` date DEFAULT NULL,
  `speciality_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `speciality_id` (`speciality_id`),
  KEY `edu_form_id` (`education_form`),
  CONSTRAINT `edu_form_id` FOREIGN KEY (`education_form`) REFERENCES `education_forms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `speciality_id` FOREIGN KEY (`speciality_id`) REFERENCES `specialities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` (`id`,`number`,`education_form`,`entrant_year`,`speciality_id`) VALUES 
 (1,23,1,'2011-09-01',1),
 (2,13,1,'2012-09-01',1),
 (4,23,1,'2011-09-01',3),
 (5,24,1,'2011-09-01',2);
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;


--
-- Definition of table `people`
--

DROP TABLE IF EXISTS `people`;
CREATE TABLE `people` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `birthday` date DEFAULT NULL,
  `sex` varchar(7) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `people`
--

/*!40000 ALTER TABLE `people` DISABLE KEYS */;
INSERT INTO `people` (`id`,`first_name`,`last_name`,`birthday`,`sex`) VALUES 
 (1,'Антон','Стрелов','1993-11-02','М'),
 (2,'Никита','Старосельцев',NULL,'М'),
 (3,'Дмитрий','Елкин',NULL,'М'),
 (4,'Анастасия','Белкина',NULL,'Ж'),
 (5,'Денис','ТриПакетаЗабыл фамилию',NULL,'М'),
 (6,'Светлана Николаевна','Водолад',NULL,'Ж');
/*!40000 ALTER TABLE `people` ENABLE KEYS */;


--
-- Definition of table `secretaries`
--

DROP TABLE IF EXISTS `secretaries`;
CREATE TABLE `secretaries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `person_id` int(10) unsigned NOT NULL,
  `faculty_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `person` (`person_id`),
  KEY `fac` (`faculty_id`),
  CONSTRAINT `fac` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `person` FOREIGN KEY (`person_id`) REFERENCES `people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `secretaries`
--

/*!40000 ALTER TABLE `secretaries` DISABLE KEYS */;
INSERT INTO `secretaries` (`id`,`person_id`,`faculty_id`) VALUES 
 (1,6,1);
/*!40000 ALTER TABLE `secretaries` ENABLE KEYS */;


--
-- Definition of table `specialities`
--

DROP TABLE IF EXISTS `specialities`;
CREATE TABLE `specialities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `code` varchar(45) DEFAULT NULL,
  `duration` int(10) unsigned NOT NULL,
  `faculty_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `faculty_id` (`faculty_id`),
  CONSTRAINT `faculty_id` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `specialities`
--

/*!40000 ALTER TABLE `specialities` DISABLE KEYS */;
INSERT INTO `specialities` (`id`,`name`,`code`,`duration`,`faculty_id`) VALUES 
 (1,'МОиАИС',NULL,4,1),
 (2,'Информационная безопасность',NULL,4,1),
 (3,'Архитектуры',NULL,5,2);
/*!40000 ALTER TABLE `specialities` ENABLE KEYS */;


--
-- Definition of table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `personal_number` int(10) unsigned NOT NULL,
  `person_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `person_id` (`person_id`),
  KEY `Students_to_groups` (`group_id`),
  CONSTRAINT `person_id` FOREIGN KEY (`person_id`) REFERENCES `people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Students_to_groups` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` (`id`,`personal_number`,`person_id`,`group_id`) VALUES 
 (1,111,1,1),
 (2,222,2,1),
 (3,333,3,1),
 (4,123,5,5),
 (6,32314,4,4);
/*!40000 ALTER TABLE `students` ENABLE KEYS */;


--
-- Definition of table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
CREATE TABLE `teachers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `person_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pers` (`person_id`),
  CONSTRAINT `pers` FOREIGN KEY (`person_id`) REFERENCES `people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teachers`
--

/*!40000 ALTER TABLE `teachers` DISABLE KEYS */;
/*!40000 ALTER TABLE `teachers` ENABLE KEYS */;


--
-- Definition of table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `secretary_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `secretary_id` (`secretary_id`),
  CONSTRAINT `secretary_id` FOREIGN KEY (`secretary_id`) REFERENCES `secretaries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`,`login`,`password`,`secretary_id`) VALUES 
 (1,'snvd','qwerty',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
