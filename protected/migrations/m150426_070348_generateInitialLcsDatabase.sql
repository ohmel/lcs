-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2015 at 09:06 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lcs_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `authassignment`
--

CREATE TABLE IF NOT EXISTS `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `authitem`
--

CREATE TABLE IF NOT EXISTS `authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `authitemchild`
--

CREATE TABLE IF NOT EXISTS `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lcs_course`
--

CREATE TABLE IF NOT EXISTS `lcs_course` (
  `course_id` int(100) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(100) NOT NULL,
  `course_description` text NOT NULL,
  `course_status` int(3) NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `lcs_course`
--

INSERT INTO `lcs_course` (`course_id`, `course_name`, `course_description`, `course_status`) VALUES
(0, 'No Course', 'No course', 1),
(1, 'BS in Computer Science', 'Programming major', 1),
(2, 'BS in Information Technology', 'BS in Information Technology', 1),
(3, 'BS in Accountancy', 'BS in Accountancy', 1),
(4, 'BS in Business Management', 'BS in Business Management', 1),
(5, 'BS in Tourism', 'BS in Tourism', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lcs_level`
--

CREATE TABLE IF NOT EXISTS `lcs_level` (
  `level_id` int(100) NOT NULL AUTO_INCREMENT,
  `level_name` varchar(50) NOT NULL,
  `level_description` text NOT NULL,
  `level_type` int(3) NOT NULL COMMENT '0 = not College 1=College',
  PRIMARY KEY (`level_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `lcs_level`
--

INSERT INTO `lcs_level` (`level_id`, `level_name`, `level_description`, `level_type`) VALUES
(1, 'Nursery', 'Pre-School Level', 0),
(2, 'Kindergarten', 'Pre-school Level', 0),
(3, 'Prepatory', 'Pre-school Level', 0),
(4, 'Grade 1', 'Grade School', 0),
(5, 'Grade 2', 'Grade School', 0),
(6, 'Grade 3', 'Grade School', 0),
(7, 'Grade 4', 'Grade School', 0),
(8, 'Grade 5', 'Grade School', 0),
(9, 'Grade 6', 'Grade School', 0),
(10, '1st Year High School', 'High School', 0),
(11, '2nd Year High School', 'High School', 0),
(12, '3rd Year High School', 'High School', 0),
(13, '4th Year High School', 'High School', 0),
(14, '1st Year College', 'College', 1),
(15, '2nd Year College', 'College', 1),
(16, '3rd Year College', 'College', 1),
(17, '4th Year College', 'College', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lcs_question_answers`
--

CREATE TABLE IF NOT EXISTS `lcs_question_answers` (
  `answer_id` int(100) NOT NULL AUTO_INCREMENT,
  `answer` text NOT NULL,
  `answer_correct` int(3) NOT NULL,
  `question_id` int(11) NOT NULL,
  PRIMARY KEY (`answer_id`),
  KEY `question_id` (`question_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `lcs_question_answers`
--

INSERT INTO `lcs_question_answers` (`answer_id`, `answer`, `answer_correct`, `question_id`) VALUES
(1, '16', 0, 1),
(2, '25', 0, 1),
(3, '27', 1, 1),
(4, '30', 0, 1),
(5, 'Paguirigan', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `lcs_student`
--

CREATE TABLE IF NOT EXISTS `lcs_student` (
  `student_id` int(100) NOT NULL AUTO_INCREMENT,
  `student_number` varchar(50) NOT NULL,
  `level_id` int(100) NOT NULL,
  `student_firstname` varchar(50) NOT NULL,
  `student_lastname` varchar(50) NOT NULL,
  `student_middlename` varchar(50) NOT NULL,
  `student_gender` varchar(10) NOT NULL,
  `student_birthdate` date NOT NULL,
  `student_age` varchar(3) NOT NULL,
  `student_complexion` varchar(20) NOT NULL,
  `student_eye_color` varchar(20) NOT NULL,
  `student_height` varchar(20) NOT NULL,
  `student_religion` varchar(20) NOT NULL,
  `course_id` int(11) NOT NULL,
  `student_status` int(3) NOT NULL COMMENT '0=inactive, 1=active, 3=dropout, 4=kickedout, 5=awol',
  `student_bloodtype` varchar(10) NOT NULL,
  `student_nationality` varchar(20) NOT NULL,
  `student_language` varchar(20) NOT NULL,
  PRIMARY KEY (`student_id`),
  UNIQUE KEY `student_number` (`student_number`),
  KEY `course_id` (`course_id`),
  KEY `level_id` (`level_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `lcs_student`
--

INSERT INTO `lcs_student` (`student_id`, `student_number`, `level_id`, `student_firstname`, `student_lastname`, `student_middlename`, `student_gender`, `student_birthdate`, `student_age`, `student_complexion`, `student_eye_color`, `student_height`, `student_religion`, `course_id`, `student_status`, `student_bloodtype`, `student_nationality`, `student_language`) VALUES
(1, '2005-100102', 10, 'Ohmel', 'Paguirigan', 'Cunanan', 'male', '1988-02-16', '27', 'brown', 'black', '5''6''''', 'Christian', 1, 0, 'O+', 'Filipino', 'Tagalog, English'),
(2, 'Not Issued Yet', 15, 'Jesm', 'Paguirigan', 'Cunanan', 'Male', '2015-04-28', '22', 'Brown', 'Black', '5''4''''', 'Christian', 2, 0, 'O+', 'asdfsad', 'sadfsadfasdf'),
(9, 'sadfasd Not Issued Yet', 5, 'sadfasd', 'sadfasdf', 'eafsdfzxczx', 'Male', '2015-04-07', '12', 'sdf', 'sadfsa', 'saf', 'sadfasd', 0, 0, 'asf', 'sdfas', 'sdafsdf'),
(10, 'sadf Not Issued Yet', 4, 'sadf', 'sadfsadf', 'sadfadsf', 'Male', '2015-04-21', '12', 'sadf', 'sadfas', 'sadfsda', 'asdfsda', 0, 0, 'sadfsdaf', 'sadf', 'sdaf'),
(11, 'Ace Not Issued Yet', 14, 'Ace', 'Amalejo', 'Middle Name', 'Male', '2015-05-06', '12', 'Brown', 'Black', '5''4''''', 'Christian', 2, 0, 'O+', 'Filipino', 'English, Tagalog');

-- --------------------------------------------------------

--
-- Table structure for table `lcs_student_address`
--

CREATE TABLE IF NOT EXISTS `lcs_student_address` (
  `address_id` int(100) NOT NULL AUTO_INCREMENT,
  `address_details` text NOT NULL,
  `address_street` varchar(50) NOT NULL,
  `address_province` varchar(50) NOT NULL,
  `address_city` varchar(50) NOT NULL,
  `address_country` varchar(50) NOT NULL,
  `address_zip` varchar(10) NOT NULL,
  `student_id` int(100) NOT NULL,
  PRIMARY KEY (`address_id`),
  UNIQUE KEY `student_id` (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `lcs_student_address`
--

INSERT INTO `lcs_student_address` (`address_id`, `address_details`, `address_street`, `address_province`, `address_city`, `address_country`, `address_zip`, `student_id`) VALUES
(1, 'Blk 29 San Lorenzo Ruiz', 'Blk 29', 'Rizal', 'Taytay', 'Philippines', '1920', 1),
(2, 'sadfasdf', 'safdasf', 'asdfsd', 'sadfsadf', 'sadf', '21', 2),
(3, 'asfasdf', 'sadfasd', 'safasd', 'fsadf', 'sadfsadf', '112', 9),
(4, 'sadf', 'sadf', 'sadf', 'sdaf', 'sadf', '123', 10),
(5, 'Lot 3 San Sebastian', 'Malibay St.', 'Metro Manila', 'Pasay City', 'Philippines', '1409', 11);

-- --------------------------------------------------------

--
-- Table structure for table `lcs_student_contact_details`
--

CREATE TABLE IF NOT EXISTS `lcs_student_contact_details` (
  `contact_id` int(100) NOT NULL AUTO_INCREMENT,
  `contact_name` varchar(100) NOT NULL,
  `contact_relationship` varchar(20) NOT NULL,
  `contact_mobile` varchar(50) NOT NULL,
  `contact_tel` varchar(50) NOT NULL,
  `contact_address` text NOT NULL,
  `student_id` int(100) NOT NULL,
  PRIMARY KEY (`contact_id`),
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `lcs_student_contact_details`
--

INSERT INTO `lcs_student_contact_details` (`contact_id`, `contact_name`, `contact_relationship`, `contact_mobile`, `contact_tel`, `contact_address`, `student_id`) VALUES
(1, 'Cynthia Paguirigan', 'Mother', '09198999095', '6429163', 'Blk 29 lot 8 san juan homes taytay rizal', 1),
(2, 'sadf', 'Mother', 'na', 'na', 'sdfadsf', 10),
(3, 'Mama', 'Mother', '32432432', 'na', 'Mama', 11);

-- --------------------------------------------------------

--
-- Table structure for table `lcs_student_educational_background`
--

CREATE TABLE IF NOT EXISTS `lcs_student_educational_background` (
  `educ_id` int(100) NOT NULL AUTO_INCREMENT,
  `educ_school_name` varchar(100) NOT NULL,
  `educ_school_type` varchar(50) NOT NULL,
  `educ_school_address` text NOT NULL,
  `educ_years_attended` varchar(5) DEFAULT NULL,
  `educ_fromto_date` varchar(20) DEFAULT NULL,
  `educ_extracurricular` text,
  `educ_position` varchar(50) DEFAULT NULL,
  `educ_achievements` text,
  `student_id` int(100) NOT NULL,
  PRIMARY KEY (`educ_id`),
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `lcs_student_educational_background`
--

INSERT INTO `lcs_student_educational_background` (`educ_id`, `educ_school_name`, `educ_school_type`, `educ_school_address`, `educ_years_attended`, `educ_fromto_date`, `educ_extracurricular`, `educ_position`, `educ_achievements`, `student_id`) VALUES
(1, 'Rizal High School Sagad', 'High School', 'Sagad Pasig City', '4', '2001 - 2005', 'COCC', 'Private', 'Nothing', 1),
(2, 'asfdsdf', 'High School', 'asfsaf', '12', '1234', 'asfdsdf', 'sadfsaf', 'sadfasdf', 2),
(3, 'sadfsdaf', 'High School', 'sdafsadf', '2', '1234', 'sdfasdf', 'sadf', 'sadfsdaf', 10),
(4, 'Baclaran High school', 'High School', 'Baclaran', '4', '2000 - 2005', NULL, NULL, NULL, 11);

-- --------------------------------------------------------

--
-- Table structure for table `lcs_student_requirements`
--

CREATE TABLE IF NOT EXISTS `lcs_student_requirements` (
  `requirement_id` int(100) NOT NULL AUTO_INCREMENT,
  `requirement_doc` varchar(100) NOT NULL,
  `requirement_date_passed` date NOT NULL,
  `requirement_remarks` text NOT NULL,
  `student_id` int(100) NOT NULL,
  PRIMARY KEY (`requirement_id`),
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `lcs_student_requirements`
--

INSERT INTO `lcs_student_requirements` (`requirement_id`, `requirement_doc`, `requirement_date_passed`, `requirement_remarks`, `student_id`) VALUES
(1, 'Report Card', '2015-04-06', 'High School Report Card', 1),
(2, 'Good Moral', '2015-04-06', 'High School Issue', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lcs_student_skills`
--

CREATE TABLE IF NOT EXISTS `lcs_student_skills` (
  `skill_id` int(100) NOT NULL AUTO_INCREMENT,
  `skill_name` varchar(50) NOT NULL,
  `student_id` int(100) NOT NULL,
  PRIMARY KEY (`skill_id`),
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `lcs_student_skills`
--

INSERT INTO `lcs_student_skills` (`skill_id`, `skill_name`, `student_id`) VALUES
(1, 'writing', 1),
(2, 'coding', 1),
(3, 'singing', 1),
(4, 'speech', 1),
(5, 'playing guitar', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lcs_tests`
--

CREATE TABLE IF NOT EXISTS `lcs_tests` (
  `test_id` int(100) NOT NULL AUTO_INCREMENT,
  `test_name` varchar(50) NOT NULL,
  `test_description` text NOT NULL,
  `test_status` int(3) NOT NULL,
  PRIMARY KEY (`test_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `lcs_tests`
--

INSERT INTO `lcs_tests` (`test_id`, `test_name`, `test_description`, `test_status`) VALUES
(1, 'Exam 1', 'EXam 1', 1),
(2, 'Exam 2', 'sadfasfsfdsa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lcs_tests_questions`
--

CREATE TABLE IF NOT EXISTS `lcs_tests_questions` (
  `question_id` int(100) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `question_type` varchar(20) NOT NULL,
  `question_status` int(3) NOT NULL,
  `test_id` int(100) NOT NULL,
  PRIMARY KEY (`question_id`),
  KEY `test_id` (`test_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `lcs_tests_questions`
--

INSERT INTO `lcs_tests_questions` (`question_id`, `question`, `question_type`, `question_status`, `test_id`) VALUES
(1, 'How old is ohmel?', 'Multiple Choice', 1, 1),
(2, 'What''s ohmel''s lastname?', 'Fill Blanks', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lcs_users`
--

CREATE TABLE IF NOT EXISTS `lcs_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `user_fullname` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `user_password` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `user_type` varchar(64) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `user_status` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_id`),
  KEY `user_name` (`user_name`),
  KEY `user_password` (`user_password`),
  KEY `app_users_FKIndex1` (`user_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `lcs_users`
--

INSERT INTO `lcs_users` (`user_id`, `user_name`, `user_fullname`, `user_password`, `user_type`, `user_status`) VALUES
(1, 'admin', 'Administrator', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 1),
(2, 'dev', 'Developer', 'dev', 'Administrator', 1),
(3, 'Registrar', 'Ohmel Paguirigan', '46de1ff5ea1cab6b9c2e2e8c867a4d28', 'User', 0),
(4, 'jesm', 'Jesm Paguirigan', 'c4eb55770fa22491d13fa72a0b67d9b9', 'User', 1),
(5, 'jesm', 'Jesm Paguirigan', 'c4eb55770fa22491d13fa72a0b67d9b9', 'User', 1),
(6, 'jesm', 'Jesm Paguirigan', 'c4eb55770fa22491d13fa72a0b67d9b9', 'User', 1),
(7, 'ace', 'Ace Amalejo', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'Administrator', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `authassignment`
--
ALTER TABLE `authassignment`
  ADD CONSTRAINT `authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `authitemchild`
--
ALTER TABLE `authitemchild`
  ADD CONSTRAINT `authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lcs_question_answers`
--
ALTER TABLE `lcs_question_answers`
  ADD CONSTRAINT `question` FOREIGN KEY (`question_id`) REFERENCES `lcs_tests_questions` (`question_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lcs_student`
--
ALTER TABLE `lcs_student`
  ADD CONSTRAINT `lcs_student_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `lcs_course` (`course_id`),
  ADD CONSTRAINT `level` FOREIGN KEY (`level_id`) REFERENCES `lcs_level` (`level_id`);

--
-- Constraints for table `lcs_student_address`
--
ALTER TABLE `lcs_student_address`
  ADD CONSTRAINT `lcs_student_address_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `lcs_student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lcs_student_contact_details`
--
ALTER TABLE `lcs_student_contact_details`
  ADD CONSTRAINT `lcs_student_contact_details_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `lcs_student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lcs_student_educational_background`
--
ALTER TABLE `lcs_student_educational_background`
  ADD CONSTRAINT `lcs_student_educational_background_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `lcs_student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lcs_student_requirements`
--
ALTER TABLE `lcs_student_requirements`
  ADD CONSTRAINT `lcs_student_requirements_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `lcs_student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lcs_student_skills`
--
ALTER TABLE `lcs_student_skills`
  ADD CONSTRAINT `skill` FOREIGN KEY (`student_id`) REFERENCES `lcs_student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lcs_tests_questions`
--
ALTER TABLE `lcs_tests_questions`
  ADD CONSTRAINT `tests` FOREIGN KEY (`test_id`) REFERENCES `lcs_tests` (`test_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
