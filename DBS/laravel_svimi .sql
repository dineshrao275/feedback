-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2023 at 06:25 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_svimi`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `department`, `type`) VALUES
(3, 'Master of Business Administration (Financial Management)', 'Management', 'Master'),
(5, 'Bachelor of Computer Application (BCA)', 'Computer Science', 'Bachelor'),
(7, 'Bachelor Of Business Administration', 'Management', 'Bachelor'),
(8, 'Master of Business Administration (Foreign Trade)', 'Management', 'Master'),
(9, 'Master of Computer Application', 'Computer Science', 'Master'),
(10, 'Bachelor of Science(IT)', 'Computer Science', 'Bachelor'),
(11, 'Bachelor of Science(CS)', 'Computer Science', 'Bachelor');

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `doj` date NOT NULL,
  `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `name`, `email`, `gender`, `designation`, `doj`, `department`) VALUES
(5, 'Krishna Kant Mehta', 'krishna@gmail.com', 'Male', 'Associate Proffessor', '2014-06-11', 'Management'),
(6, 'Sagun Gupta', 'Sagun@gmail.com', 'Female', 'Associate Proffessor', '2013-06-13', 'Management'),
(10, 'Manish Soni', 'manish@gmail.com', 'Male', 'Associate Proffessor', '2023-04-05', 'Computer Science'),
(17, 'Komal Vaishnav', 'komal@gmail.com', 'Female', 'Proffessor', '2023-04-07', 'Computer Science'),
(18, 'Ajinkya Khurana', 'Ajinkya@gmail.com', 'Male', 'Associate Proffessor', '2023-04-07', 'Computer Science'),
(24, 'Prof. (Dr.) George Thomas', 'director@svimi.org', 'Male', 'Proffessor and Director', '2018-01-22', 'Management'),
(25, 'Dr. Kshama Paithankar', 'kshama.paithankar@svimi.org', 'Female', 'Proffessor', '2012-08-09', 'Computer Science'),
(26, 'Dr. Ekta Agrawal', 'ekta.agrawal@svimi.org', 'Female', 'Associate Proffessor', '2005-08-22', 'Computer Science'),
(27, 'Dr. Jitendra Jain', 'jitendra.jain@svimi.org', 'Male', 'Associate Proffessor', '2007-06-18', 'Computer Science'),
(28, 'Ms. Ruchira Muchhal', 'ruchira.muchhal@svimi.org', 'Female', 'Assistant Proffessor', '2014-08-01', 'Computer Science'),
(30, 'Dr. Arpit Tiwari', 'arpit.tiwari@svimi.org', 'Male', 'Assistant Proffessor', '2018-08-16', 'Management'),
(31, 'Dr. Mohini Thattey', 'mohinithattey@svimi.org', 'Female', 'Assistant Proffessor', '2021-09-27', 'Management');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `hello_pramod` int(11) DEFAULT 5,
  `test1` int(11) NOT NULL DEFAULT 5,
  `test2` int(11) NOT NULL DEFAULT 5,
  `test3` int(11) NOT NULL DEFAULT 5,
  `test4` int(11) NOT NULL DEFAULT 5,
  `test5` int(11) NOT NULL DEFAULT 5
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `student_id`, `subject_id`, `faculty_id`, `created_at`, `updated_at`, `hello_pramod`, `test1`, `test2`, `test3`, `test4`, `test5`) VALUES
(1, 1, 17, 26, '2023-07-27 11:11:53', '2023-07-27 11:11:53', 5, 5, 5, 5, 5, 5),
(2, 1, 18, 28, '2023-07-27 11:11:57', '2023-07-27 11:11:57', 5, 5, 5, 5, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `enrollment` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `course` int(11) NOT NULL,
  `semester_year` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `session` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `enrollment`, `name`, `course`, `semester_year`, `section`, `session`) VALUES
(1, '0807CA211020', 'Dinesh Rao', 9, 'I', 'A', '2022-2023'),
(2, '0807CA211022', 'Saroj Mehta', 5, 'II', 'A', '2022-2023'),
(3, '0807CA231221', 'Pooja Bhatiya', 5, 'II', 'A', '2022-2023'),
(4, '0807MG211023', 'Mudita Chouhan', 5, 'I', 'A', '2022-2023'),
(5, 'Abc123412345', 'abc', 3, 'II', 'A', '2022-2023'),
(6, '1234567890qw', '123wer', 3, 'II', 'A', '2022-2023'),
(7, '9876543210p1', 'qwertyu', 3, 'II', 'A', '2022-2023'),
(8, '1234509876po', '123ewq', 3, 'II', 'A', '2022-2023'),
(9, 'mnbvcxzasdfg', 'mnb', 3, 'II', 'A', '2022-2023'),
(10, 'ABcmnblkjase', 'adidas', 5, 'I', 'A', '2022-2023'),
(11, '1234qw432112', 'qwerty', 5, 'I', 'A', '2022-2023'),
(12, '1234re123456', 'Shri kant', 5, 'I', 'A', '2022-2023');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `course_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `semester_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `code`, `section`, `course_id`, `faculty_id`, `semester_year`) VALUES
(1, 'Business Studies', 'MBA201', 'A', 3, 30, 'II'),
(2, 'Programming With C', 'BCA201', 'A', 5, 17, 'II'),
(6, 'Financial Studies', 'MBA203', 'B', 7, 5, 'I'),
(12, 'Foreign Trade', 'MBA401', 'B', 8, 32, 'IV'),
(13, 'Operating System Practical Lab', 'BCA105', 'A', 5, 25, 'I'),
(14, 'Java Practical Lab', 'BCA106', 'A', 5, 27, 'I'),
(15, 'Foreign Trade', 'MBA101', 'B', 5, 30, 'I'),
(16, 'Foreign Reserve', 'MBAFT102', 'B', 8, 31, 'I'),
(17, 'Basic Python', 'MCA101', 'A', 9, 26, 'I'),
(18, 'Operating System', 'MCA102', 'A', 9, 28, 'I');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `database_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `database_name`) VALUES
(23, 'Hello Pramod', 'hello_pramod'),
(24, 'Test1', 'test1'),
(25, 'Test2', 'test2'),
(26, 'Test3', 'test3'),
(27, 'Test4', 'test4'),
(28, 'Test5', 'test5');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT '$2y$10$4eWTa34A000W9d6GbU6Qje7He47R8WroqicMSEneeM3dpRw76ErIq',
  `type` enum('super_user','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `contact`, `password`, `type`) VALUES
(1, 'admin', 'dineshrao@gmail.com', '9876543123', '$2y$10$4eWTa34A000W9d6GbU6Qje7He47R8WroqicMSEneeM3dpRw76ErIq', 'user'),
(11, 'dinesh', 'dinesh@gmail.com', '8290667849', '$2y$10$3NmSEg48.CuPaHTmNuYbP.R6uB9bZWhYLOdH4aS3x/XVyopdcBMAi', 'super_user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
