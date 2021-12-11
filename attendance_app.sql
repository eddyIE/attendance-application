-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2021 at 03:06 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `absence_reason`
--

CREATE TABLE `absence_reason` (
  `id` varchar(36) NOT NULL,
  `reason` text NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_user` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_user` varchar(50) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `academic_director`
--

CREATE TABLE `academic_director` (
  `id` varchar(36) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone_number` varchar(13) NOT NULL,
  `address` varchar(1000) DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `created_user` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_user` varchar(50) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` varchar(36) NOT NULL,
  `student_id` varchar(36) NOT NULL,
  `lesson_id` varchar(36) NOT NULL,
  `absence_reason_id` varchar(36) NOT NULL,
  `status` int(11) NOT NULL,
  `created_user` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_user` varchar(50) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` varchar(36) NOT NULL,
  `name` varchar(100) NOT NULL,
  `lecturer_id` varchar(36) NOT NULL,
  `subject_id` varchar(36) NOT NULL,
  `credit_hours` int(11) NOT NULL,
  `created_user` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_user` varchar(50) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT NULL,
  `full_text_search` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `course_student_rel`
--

CREATE TABLE `course_student_rel` (
  `id` varchar(36) NOT NULL,
  `student_id` varchar(36) NOT NULL,
  `course_id` varchar(36) NOT NULL,
  `created_user` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_user` varchar(50) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE `lecturer` (
  `id` varchar(36) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone_number` varchar(13) NOT NULL,
  `title` varchar(100) NOT NULL,
  `address` varchar(1000) DEFAULT NULL,
  `gender` tinyint(1) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `created_user` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_user` varchar(50) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT NULL,
  `full_text_search` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lecturer_course_rel`
--

CREATE TABLE `lecturer_course_rel` (
  `id` varchar(36) NOT NULL,
  `lecturer_id` varchar(36) NOT NULL,
  `course_id` varchar(36) NOT NULL,
  `type` int(11) DEFAULT NULL,
  `created_user` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_user` varchar(50) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE `lesson` (
  `id` varchar(36) NOT NULL,
  `lecturer_id` varchar(36) NOT NULL,
  `course_id` varchar(36) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `created_user` varchar(36) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_user` varchar(36) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT NULL,
  `note` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` varchar(36) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone_number` varchar(13) DEFAULT NULL,
  `address` varchar(1000) DEFAULT NULL,
  `dob` date NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `created_user` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_user` varchar(50) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT 0,
  `class` varchar(36) DEFAULT NULL,
  `parent` varchar(36) DEFAULT NULL,
  `full_text_search` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` varchar(36) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_user` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_user` varchar(50) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absence_reason`
--
ALTER TABLE `absence_reason`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `academic_director`
--
ALTER TABLE `academic_director`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_atd_student_id` (`student_id`) USING BTREE,
  ADD KEY `FK_atd_lesson_id` (`lesson_id`) USING BTREE,
  ADD KEY `FK_atd_abscene_reason_id` (`absence_reason_id`) USING BTREE;

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_course_lecturer_id` (`lecturer_id`) USING BTREE,
  ADD KEY `FK_course_subject_id` (`subject_id`) USING BTREE;

--
-- Indexes for table `course_student_rel`
--
ALTER TABLE `course_student_rel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_csr_student_id` (`student_id`) USING BTREE,
  ADD KEY `FK_csr_course_id` (`course_id`) USING BTREE;

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecturer_course_rel`
--
ALTER TABLE `lecturer_course_rel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_lcr_lecturer_id` (`lecturer_id`) USING BTREE,
  ADD KEY `FK_lcr_course_id` (`course_id`) USING BTREE;

--
-- Indexes for table `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_lesson_lecturer_id` (`lecturer_id`),
  ADD KEY `FK_lesson_course_id` (`course_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `FK_abscene_reason_id` FOREIGN KEY (`absence_reason_id`) REFERENCES `absence_reason` (`id`),
  ADD CONSTRAINT `FK_lesson_id` FOREIGN KEY (`lesson_id`) REFERENCES `lesson` (`id`),
  ADD CONSTRAINT `FK_student_id` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `FK_lecturer_id` FOREIGN KEY (`lecturer_id`) REFERENCES `lecturer` (`id`),
  ADD CONSTRAINT `FK_subject_id` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`);

--
-- Constraints for table `course_student_rel`
--
ALTER TABLE `course_student_rel`
  ADD CONSTRAINT `FK_course_id` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`),
  ADD CONSTRAINT `FK_coursestudent_id` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`);

--
-- Constraints for table `lecturer_course_rel`
--
ALTER TABLE `lecturer_course_rel`
  ADD CONSTRAINT `FK_courserel_id` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`),
  ADD CONSTRAINT `FK_lecturerrel_id` FOREIGN KEY (`lecturer_id`) REFERENCES `lecturer` (`id`);

--
-- Constraints for table `lesson`
--
ALTER TABLE `lesson`
  ADD CONSTRAINT `FK_lesson_course_id` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`),
  ADD CONSTRAINT `FK_lesson_lecturer_id` FOREIGN KEY (`lecturer_id`) REFERENCES `lecturer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
