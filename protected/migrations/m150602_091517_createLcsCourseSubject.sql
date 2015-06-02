CREATE TABLE IF NOT EXISTS `lcs_course_subjects` (
  `subject_id` int(100) NOT NULL AUTO_INCREMENT,
  `course_id` int(100) NOT NULL,
  `pre_subject_id` int(100) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `subject_description` text NOT NULL,
  `subject_status` int(3) NOT NULL,
  `subject_type` varchar(20) NOT NULL,
  PRIMARY KEY (`subject_id`),
  KEY `course_id` (`course_id`,`pre_subject_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lcs_course_subjects`
--
ALTER TABLE `lcs_course_subjects`
  ADD CONSTRAINT `course` FOREIGN KEY (`course_id`) REFERENCES `lcs_course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;