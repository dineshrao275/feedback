-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2023 at 06:38 PM
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
(1, 'MCA', 'Computer Science', 'Master'),
(2, 'B.Sc. (CS)', 'Computer Science', 'Bachelor'),
(3, 'BCA', 'Computer Science', 'Bachelor'),
(4, 'B. Sc. (Microbio)', 'Computer Science', 'Bachelor'),
(5, 'B. Sc. (Biotech)', 'Computer Science', 'Bachelor'),
(6, 'B. Sc. (Bioinfo)', 'Computer Science', 'Bachelor');

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
(17, 'Komal Vaishnav', 'komal@gmail.com', 'Female', 'Associate Proffessor', '2023-04-07', 'Computer Science'),
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
  `test1` int(11) NOT NULL DEFAULT 5,
  `test2` int(11) NOT NULL DEFAULT 5,
  `test3` int(11) NOT NULL DEFAULT 5,
  `test4` int(11) NOT NULL DEFAULT 5
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `student_id`, `subject_id`, `faculty_id`, `created_at`, `updated_at`, `test1`, `test2`, `test3`, `test4`) VALUES
(1, 13, 13, 25, '2023-10-11 17:32:13', '2023-10-11 17:32:13', 3, 3, 4, 5),
(2, 13, 14, 27, '2023-10-11 17:32:13', '2023-10-11 17:32:13', 3, 5, 2, 5),
(3, 14, 13, 25, '2023-10-11 17:33:19', '2023-10-12 18:03:45', 5, 5, 5, 5),
(4, 14, 14, 27, '2023-10-11 17:33:19', '2023-10-12 18:03:45', 5, 5, 5, 5),
(5, 15, 13, 25, '2023-10-12 17:56:38', '2023-10-12 17:56:38', 5, 5, 5, 5),
(6, 15, 14, 27, '2023-10-12 17:56:38', '2023-10-12 17:56:38', 5, 5, 5, 5),
(7, 16, 13, 25, '2023-10-12 18:39:31', '2023-10-12 18:39:31', 5, 5, 5, 5),
(8, 16, 14, 27, '2023-10-12 18:39:31', '2023-10-12 18:39:31', 5, 5, 5, 5),
(9, 13, 17, 26, '2023-11-04 02:50:33', '2023-11-04 02:50:33', 5, 5, 5, 5),
(10, 13, 18, 28, '2023-11-04 02:50:33', '2023-11-04 02:50:33', 5, 5, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `erp_id` varchar(100) NOT NULL,
  `session` varchar(20) NOT NULL,
  `course_id` int(11) NOT NULL,
  `semester_year` varchar(5) NOT NULL,
  `section` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `erp_id`, `session`, `course_id`, `semester_year`, `section`) VALUES
(1, 'AAKANKSHA PANDEY', '15250805320', '2023-2024', 1, 'I', 'A'),
(2, 'AARTI BHADE', '15250804943', '2023-2024', 1, 'I', 'A'),
(3, 'AAYUSHI PATIDAR', '15250805389', '2023-2024', 1, 'I', 'A'),
(4, 'ABHISHEK YADAV', '15250805399', '2023-2024', 1, 'I', 'A'),
(5, 'ADARSH KUMAWAT', '15250805347', '2023-2024', 1, 'I', 'A'),
(6, 'ADITYA VISHWAKARMA', '15250805359', '2023-2024', 1, 'I', 'A'),
(7, 'AISHWARYA BHATT', '15250804965', '2023-2024', 1, 'I', 'A'),
(8, 'AJAY RAJAK', '15250805310', '2023-2024', 1, 'I', 'A'),
(9, 'ALOK SHARMA', '15250805390', '2023-2024', 1, 'I', 'A'),
(10, 'AMBIKA PANWAR', '15250804985', '2023-2024', 1, 'I', 'A'),
(11, 'AMIT SHARMA', '15250805269', '2023-2024', 1, 'I', 'A'),
(12, 'ANNU KUMARI', '15250805278', '2023-2024', 1, 'I', 'A'),
(13, 'ANURAG DWIVEDI', '15250805363', '2023-2024', 1, 'I', 'A'),
(14, 'ARYAN MEWADA', '15250805093', '2023-2024', 1, 'I', 'A'),
(15, 'ASTHA MALAKAR', '15250804955', '2023-2024', 1, 'I', 'A'),
(16, 'AYUSHI DUBEY', '15250805349', '2023-2024', 1, 'I', 'A'),
(17, 'BANVAREE LAL DANGI', '15250805356', '2023-2024', 1, 'I', 'A'),
(18, 'BHARAT DUBEY', '15250805252', '2023-2024', 1, 'I', 'A'),
(19, 'CHAITANY KUMAR DABAKRA', '15250805368', '2023-2024', 1, 'I', 'A'),
(20, 'CHRISTIAN NISHANT RAJUBHAI', '15250805191', '2023-2024', 1, 'I', 'A'),
(21, 'DEEPAK GUPTA', '15250805398', '2023-2024', 1, 'I', 'A'),
(22, 'DEEPAK PARIHAR', '15250805343', '2023-2024', 1, 'I', 'A'),
(23, 'DEEPAK SEN', '15250805362', '2023-2024', 1, 'I', 'A'),
(24, 'DEEPANSHU RATHORE', '15250805351', '2023-2024', 1, 'I', 'A'),
(25, 'DEEPESH CHOUDHARY', '15250805245', '2023-2024', 1, 'I', 'A'),
(26, 'DEEPIKA CHHLOTRE', '15250804957', '2023-2024', 1, 'I', 'A'),
(27, 'DEEPISHA SISODIYA', '15250804984', '2023-2024', 1, 'I', 'A'),
(28, 'DEVENDRA YADAV', '15250805301', '2023-2024', 1, 'I', 'A'),
(29, 'DIPIKA YADAV', '15250805214', '2023-2024', 1, 'I', 'A'),
(30, 'DISHA JOSHI', '15250804983', '2023-2024', 1, 'I', 'A'),
(31, 'DIVYA SOLIYA', '15250805292', '2023-2024', 1, 'I', 'A'),
(32, 'DIVYESH GUPTA', '15250805367', '2023-2024', 1, 'I', 'A'),
(33, 'DURGESH UJJAINKAR', '15250805300', '2023-2024', 1, 'I', 'A'),
(34, 'GARVIT GOYAL', '15250804964', '2023-2024', 1, 'I', 'A'),
(35, 'GAURAV TARE', '15250804960', '2023-2024', 1, 'I', 'A'),
(36, 'GOURAV SEN', '15250805397', '2023-2024', 1, 'I', 'A'),
(37, 'GOVIND YADAV', '15250805353', '2023-2024', 1, 'I', 'A'),
(38, 'HARSH CHOUHAN', '15250805283', '2023-2024', 1, 'I', 'A'),
(39, 'HARSHITA KESHKAR', '15250805247', '2023-2024', 1, 'I', 'A'),
(40, 'HARSHITA PATIL', '15250805288', '2023-2024', 1, 'I', 'A'),
(41, 'HINA BISEN', '15250805312', '2023-2024', 1, 'I', 'A'),
(42, 'INDRAJEET KHATARKAR', '15250805357', '2023-2024', 1, 'I', 'A'),
(43, 'ISHA MALIK', '15250805150', '2023-2024', 1, 'I', 'A'),
(44, 'JAYA JAIN', '15250805259', '2023-2024', 1, 'I', 'A'),
(45, 'KAIVALYANSHI CHAUBEY', '15250805231', '2023-2024', 1, 'I', 'A'),
(46, 'KAVITA CHOUHAN', '15250805265', '2023-2024', 1, 'I', 'A'),
(47, 'KAVITA RAJPUT', '15250805249', '2023-2024', 1, 'I', 'A'),
(48, 'KHUSHBOO CHOUDHARY', '15250805273', '2023-2024', 1, 'I', 'A'),
(49, 'KHUSHBOO MAHESHWARI', '15250805263', '2023-2024', 1, 'I', 'A'),
(50, 'KHUSHI GUPTA', '15250805285', '2023-2024', 1, 'I', 'A'),
(51, 'KHUSHI SONI', '15250805063', '2023-2024', 1, 'I', 'A'),
(52, 'KIRTI JAT', '15250805281', '2023-2024', 1, 'I', 'A'),
(53, 'KRISHNA GOUR', '15250805374', '2023-2024', 1, 'I', 'A'),
(54, 'KUNDAN PATIDAR', '15250805327', '2023-2024', 1, 'I', 'A'),
(55, 'LAKHAN DHANOTIYA', '15250805321', '2023-2024', 1, 'I', 'A'),
(56, 'MADHURI PAL', '15250805204', '2023-2024', 1, 'I', 'A'),
(57, 'MAHIMA RAGHUVANSHI', '15250805331', '2023-2024', 1, 'I', 'A'),
(58, 'MANAVATA BARVE', '15250805246', '2023-2024', 1, 'I', 'A'),
(59, 'MANISH KUMAR PATIDAR', '15250804958', '2023-2024', 1, 'I', 'A'),
(60, 'MANJREE PALIWAL', '15250805223', '2023-2024', 1, 'I', 'A'),
(61, 'MOHIT YADAV', '15250805295', '2023-2024', 1, 'I', 'A'),
(62, 'MONISH BISWAS', '15250805329', '2023-2024', 1, 'I', 'A'),
(63, 'MUSKAN THAKUR', '15250805282', '2023-2024', 1, 'I', 'A'),
(64, 'NANDINI KARMA', '15250805286', '2023-2024', 1, 'I', 'A'),
(65, 'NEELAM SONI', '15250805291', '2023-2024', 1, 'I', 'A'),
(66, 'NEERAJ SINGH', '15250805046', '2023-2024', 1, 'I', 'A'),
(67, 'NIDHI KUSHWAHA', '15250805328', '2023-2024', 1, 'I', 'A'),
(68, 'NIDHI NAGESHWAR', '15250804986', '2023-2024', 1, 'I', 'A'),
(69, 'NIKITA GANDHARE', '15250804941', '2023-2024', 1, 'I', 'B'),
(70, 'NILESH', '15250804959', '2023-2024', 1, 'I', 'B'),
(71, 'NITIN JAIN', '15250805345', '2023-2024', 1, 'I', 'B'),
(72, 'NITIN KUMAR SINGH', '15250804947', '2023-2024', 1, 'I', 'B'),
(73, 'PALAK RATHORE', '15250804940', '2023-2024', 1, 'I', 'B'),
(74, 'PIYUSH JAIN', '15250805371', '2023-2024', 1, 'I', 'B'),
(75, 'PRACHI MANDLOI', '15250805272', '2023-2024', 1, 'I', 'B'),
(76, 'PRASHANT VISHWAKARMA', '15250805304', '2023-2024', 1, 'I', 'B'),
(77, 'PRATEEK SISODIYA', '15250805393', '2023-2024', 1, 'I', 'B'),
(78, 'PRATYUSH RAJPUT', '15250805317', '2023-2024', 1, 'I', 'B'),
(79, 'PREETI YADAV', '15250805257', '2023-2024', 1, 'I', 'B'),
(80, 'PRIYANKA RATHORE', '15250805401', '2023-2024', 1, 'I', 'B'),
(81, 'PRIYANSHU PATIDAR', '15250805299', '2023-2024', 1, 'I', 'B'),
(82, 'RAGHAV PALIWAL', '15250805307', '2023-2024', 1, 'I', 'B'),
(83, 'RAHUL NAGAR', '15250805229', '2023-2024', 1, 'I', 'B'),
(84, 'RAHUL PATIDAR', '15250805354', '2023-2024', 1, 'I', 'B'),
(85, 'RAMPAL SINGH', '15250805298', '2023-2024', 1, 'I', 'B'),
(86, 'RAVI SHARMA', '15250805378', '2023-2024', 1, 'I', 'B'),
(87, 'RIJWANA KAJI', '15250805372', '2023-2024', 1, 'I', 'B'),
(88, 'RISHABH MANDAL', '15250805066', '2023-2024', 1, 'I', 'B'),
(89, 'RISHABH RAGHUWANSHI', '15250805364', '2023-2024', 1, 'I', 'B'),
(90, 'RITESH PRAJAPATI', '15250805211', '2023-2024', 1, 'I', 'B'),
(91, 'RITIK PATEKAR', '15250804961', '2023-2024', 1, 'I', 'B'),
(92, 'ROHINI SONWANE', '15250805381', '2023-2024', 1, 'I', 'B'),
(93, 'RUPALI GUPTA', '15250805346', '2023-2024', 1, 'I', 'B'),
(94, 'SABA FATIMA', '15250805344', '2023-2024', 1, 'I', 'B'),
(95, 'SAHIL TALWAR', '15250804949', '2023-2024', 1, 'I', 'B'),
(96, 'SAHIL VERMA', '15250804982', '2023-2024', 1, 'I', 'B'),
(97, 'SAKSHI MANEKAR', '15250805260', '2023-2024', 1, 'I', 'B'),
(98, 'SAKSHI NIKUM', '15250804962', '2023-2024', 1, 'I', 'B'),
(99, 'SAKSHI PUROHIT', '15250805284', '2023-2024', 1, 'I', 'B'),
(100, 'SAKSHI YADAV', '15250805373', '2023-2024', 1, 'I', 'B'),
(101, 'SALONI JAISWAL', '15250804980', '2023-2024', 1, 'I', 'B'),
(102, 'SANDEEP NAGAR', '15250805358', '2023-2024', 1, 'I', 'B'),
(103, 'SANDHYA JATTHAP', '15250805297', '2023-2024', 1, 'I', 'B'),
(104, 'SANJANA SOLANKI', '15250805271', '2023-2024', 1, 'I', 'B'),
(105, 'SANSKRITI DUBEY', '15250805387', '2023-2024', 1, 'I', 'B'),
(106, 'SATYAM PANWAR', '15250805190', '2023-2024', 1, 'I', 'B'),
(107, 'SATYENDA SINGH GOUR', '15250805296', '2023-2024', 1, 'I', 'B'),
(108, 'SHAMBHAVI DAGAONKAR', '15250805352', '2023-2024', 1, 'I', 'B'),
(109, 'SHIKSHA SHARMA', '15250805402', '2023-2024', 1, 'I', 'B'),
(110, 'SHIVAM KUMAR', '15250805232', '2023-2024', 1, 'I', 'B'),
(111, 'SHIVANI GUPTA', '15250804942', '2023-2024', 1, 'I', 'B'),
(112, 'SHIVANI TIWARI', '15250805326', '2023-2024', 1, 'I', 'B'),
(113, 'SHIVANSH BHARGAVA', '15250805289', '2023-2024', 1, 'I', 'B'),
(114, 'SHRADDHA SHARMA', '15250805322', '2023-2024', 1, 'I', 'B'),
(115, 'SHUBHAM JAISWAL', '15250805360', '2023-2024', 1, 'I', 'B'),
(116, 'SHUBHANGI TOMAR', '15250804951', '2023-2024', 1, 'I', 'B'),
(117, 'SNEHA KALA', '15250804950', '2023-2024', 1, 'I', 'B'),
(118, 'SNEHA TIWARI', '15250805324', '2023-2024', 1, 'I', 'B'),
(119, 'SOMJIYANI SANDIP SHANTILAL', '15250804954', '2023-2024', 1, 'I', 'B'),
(120, 'SOMYA SOLANKI', '15250805385', '2023-2024', 1, 'I', 'B'),
(121, 'SONAKSHI CHOUKSEY', '15250804978', '2023-2024', 1, 'I', 'B'),
(122, 'SONAL SHUKLA', '15250804979', '2023-2024', 1, 'I', 'B'),
(123, 'SONALI PACHORE', '15250804952', '2023-2024', 1, 'I', 'B'),
(124, 'SONAM DUBEY', '15250805384', '2023-2024', 1, 'I', 'B'),
(125, 'SUNDARAM PARMAR', '15250805262', '2023-2024', 1, 'I', 'B'),
(126, 'SURAJ MANDAL', '15250805400', '2023-2024', 1, 'I', 'B'),
(127, 'TANISHA RATHOD', '15250805277', '2023-2024', 1, 'I', 'B'),
(128, 'TRIBHUVAN PATHAK', '15250805323', '2023-2024', 1, 'I', 'B'),
(129, 'VIKASH DHAKAR', '15250804981', '2023-2024', 1, 'I', 'B'),
(130, 'VIPUL VICTOR MINJ', '15250804953', '2023-2024', 1, 'I', 'B'),
(131, 'VISHAL PATIDAR', '15250805305', '2023-2024', 1, 'I', 'B'),
(132, 'VISHAL SONI', '15250805213', '2023-2024', 1, 'I', 'B'),
(133, 'YASH RATORE', '15250805370', '2023-2024', 1, 'I', 'B'),
(134, 'YASH SINGH', '15250804956', '2023-2024', 1, 'I', 'B'),
(135, 'YOGIDAS BAIRAGI', '15250805189', '2023-2024', 1, 'I', 'B'),
(136, 'AKASH PRAJAPAT', '11130707067', '2023-2024', 2, 'I', 'A'),
(137, 'ANAS HUSSAIN', '11130706663', '2023-2024', 2, 'I', 'A'),
(138, 'ANJALI UPADHYAY', '11130706339', '2023-2024', 2, 'I', 'A'),
(139, 'ARPIT GIRI', '11130706837', '2023-2024', 2, 'I', 'A'),
(140, 'ARYAN BHAYAL', '11130706636', '2023-2024', 2, 'I', 'A'),
(141, 'DEV SACHAR', '11130706544', '2023-2024', 2, 'I', 'A'),
(142, 'DURGESH NANDINI BHARSIYA', '11130706543', '2023-2024', 2, 'I', 'A'),
(143, 'HARSHWARDHAN TANWAR', '11130306408', '2023-2024', 2, 'I', 'A'),
(144, 'KRISH GORECHA', '11130707028', '2023-2024', 2, 'I', 'A'),
(145, 'KULDEEP PARIHAR', '11130706834', '2023-2024', 2, 'I', 'A'),
(146, 'NIKHIL PRAJAPAT', '11130706950', '2023-2024', 2, 'I', 'A'),
(147, 'RITISHA SATPUDA', '11130706664', '2023-2024', 2, 'I', 'A'),
(148, 'RUDRESH MALI', '11130706662', '2023-2024', 2, 'I', 'A'),
(149, 'SACHIN TAWDE', '11130706451', '2023-2024', 2, 'I', 'A'),
(150, 'SONAM BHADORIYA', '11130706555', '2023-2024', 2, 'I', 'A'),
(151, 'VIKASH PRAJAPATI', '11130706814', '2023-2024', 2, 'I', 'A'),
(152, 'VRANDA SHARMA', '11130706541', '2023-2024', 2, 'I', 'A'),
(153, 'AAKASH CHOUHAN', '11120606741', '2023-2024', 3, 'I', 'A'),
(154, 'AARUSHI ASAWA', '11120606630', '2023-2024', 3, 'I', 'A'),
(155, 'AASHUTOSH DAWAR', '11120606629', '2023-2024', 3, 'I', 'A'),
(156, 'ABHAY CHOUDHARY', '11120606797', '2023-2024', 3, 'I', 'A'),
(157, 'ABHINAV BILLORE', '11120606430', '2023-2024', 3, 'I', 'A'),
(158, 'ABHISHEK RAGHUVANSHI', '11120606732', '2023-2024', 3, 'I', 'A'),
(159, 'ADARSH GUPTA', '11120606666', '2023-2024', 3, 'I', 'A'),
(160, 'ADITI SOLANKI', '11120606647', '2023-2024', 3, 'I', 'A'),
(161, 'ADITYA DUBEY', '11120606567', '2023-2024', 3, 'I', 'A'),
(162, 'ADITYA MANDOWARA', '11120606734', '2023-2024', 3, 'I', 'A'),
(163, 'ADITYA TAK', '11120606565', '2023-2024', 3, 'I', 'A'),
(164, 'AKSHARA KUMAWAT', '11120607005', '2023-2024', 3, 'I', 'A'),
(165, 'ALEFIYA SUWASARAWALA', '11120606315', '2023-2024', 3, 'I', 'A'),
(166, 'AMAN KUMAR SHARMA', '11120607073', '2023-2024', 3, 'I', 'A'),
(167, 'AMISHA RATHORE', '11120606792', '2023-2024', 3, 'I', 'A'),
(168, 'ANISHA WARE', '11120606793', '2023-2024', 3, 'I', 'A'),
(169, 'ANSHIKA GEHLOT', '11120606984', '2023-2024', 3, 'I', 'A'),
(170, 'ANSHIKA SONI', '11120607011', '2023-2024', 3, 'I', 'A'),
(171, 'ANUSHKA NANDANE', '11120606379', '2023-2024', 3, 'I', 'A'),
(172, 'ANVESHA VERMA', '11120607006', '2023-2024', 3, 'I', 'A'),
(173, 'ARYAN GOUR', '11120606314', '2023-2024', 3, 'I', 'A'),
(174, 'ARYAN MANDLIYA', '11120606378', '2023-2024', 3, 'I', 'A'),
(175, 'ARYAN RATHORE', '11120606747', '2023-2024', 3, 'I', 'A'),
(176, 'ASTHA BHAWSAR', '11120606364', '2023-2024', 3, 'I', 'A'),
(177, 'ASTHA SINGH', '11120606452', '2023-2024', 3, 'I', 'A'),
(178, 'ATHARV THAKUR', '11120607051', '2023-2024', 3, 'I', 'A'),
(179, 'AYUSH KASHYAP', '11120606351', '2023-2024', 3, 'I', 'A'),
(180, 'AYUSHI TANWAR', '11120606794', '2023-2024', 3, 'I', 'A'),
(181, 'AYUSHMAN SINGH SOLANKI', '11120606947', '2023-2024', 3, 'I', 'A'),
(182, 'BHAVESH MALVIYA', '11120607059', '2023-2024', 3, 'I', 'A'),
(183, 'BHAVYA KASLIWAL', '11120606645', '2023-2024', 3, 'I', 'A'),
(184, 'CHETNA BUNDELA', '11120606327', '2023-2024', 3, 'I', 'A'),
(185, 'CHITRANSH SHRIVASTAV', '11120606356', '2023-2024', 3, 'I', 'A'),
(186, 'DEEPENDRA SINGH TOMAR', '11120606559', '2023-2024', 3, 'I', 'A'),
(187, 'DIKSHA KOTHARE', '11120606764', '2023-2024', 3, 'I', 'A'),
(188, 'DISHA H. JAIN', '11120607039', '2023-2024', 3, 'I', 'A'),
(189, 'DISHA V. JAIN', '11120606774', '2023-2024', 3, 'I', 'A'),
(190, 'DIYA BHANDARI', '11120606566', '2023-2024', 3, 'I', 'A'),
(191, 'EKAS CHHABRA', '11120607045', '2023-2024', 3, 'I', 'A'),
(192, 'GEETANSH SIYOTA', '11120606804', '2023-2024', 3, 'I', 'A'),
(193, 'GOURAV BINGLE', '11120607066', '2023-2024', 3, 'I', 'A'),
(194, 'GOURAV TAWDE', '11120606796', '2023-2024', 3, 'I', 'A'),
(195, 'HARMEET SINGH SIDDHU', '11120606607', '2023-2024', 3, 'I', 'A'),
(196, 'HARSH SINGH CHOUHAN', '11120607021', '2023-2024', 3, 'I', 'A'),
(197, 'HARSH TIWARI', '11120606389', '2023-2024', 3, 'I', 'A'),
(198, 'HARSHA KRIPLANI', '11120606806', '2023-2024', 3, 'I', 'A'),
(199, 'HARSHIT CHATURVEDI', '11120606579', '2023-2024', 3, 'I', 'A'),
(200, 'HARSHIT SONI', '11120607060', '2023-2024', 3, 'I', 'A'),
(201, 'HIMANSHI MODI', '11120606316', '2023-2024', 3, 'I', 'A'),
(202, 'HIMANSHI VIJAYVARGIYA', '11120606329', '2023-2024', 3, 'I', 'A'),
(203, 'HIYA CHANDNAWAT', '11120606563', '2023-2024', 3, 'I', 'A'),
(204, 'JANHVI HIRANI', '11120606335', '2023-2024', 3, 'I', 'A'),
(205, 'JATIN SEN', '11120606736', '2023-2024', 3, 'I', 'A'),
(206, 'JITESH CHANDA', '11120606745', '2023-2024', 3, 'I', 'A'),
(207, 'KANAK WAGH', '11120606656', '2023-2024', 3, 'I', 'A'),
(208, 'KARTIK BUNDELE', '11120607055', '2023-2024', 3, 'I', 'A'),
(209, 'KASHISH KHATRI', '11120607002', '2023-2024', 3, 'I', 'A'),
(210, 'KESHAV PARMAR', '11120606980', '2023-2024', 3, 'I', 'A'),
(211, 'KIRTI KUKREJA', '11120606380', '2023-2024', 3, 'I', 'A'),
(212, 'KISHANLAL JADHV', '11120606803', '2023-2024', 3, 'I', 'A'),
(213, 'KRISH PARIKH', '11120606321', '2023-2024', 3, 'I', 'A'),
(214, 'KUNAL SAHU', '11120606919', '2023-2024', 3, 'I', 'A'),
(215, 'LAVESH ARORA', '11120607040', '2023-2024', 3, 'I', 'A'),
(216, 'LOVE KUSHWAH', '11120607007', '2023-2024', 3, 'I', 'A'),
(217, 'LUCKY PANWAR', '11120606985', '2023-2024', 3, 'I', 'A'),
(218, 'MAHI JAIN', '11120606365', '2023-2024', 3, 'I', 'B'),
(219, 'MEET JAJU', '11120606317', '2023-2024', 3, 'I', 'B'),
(220, 'MEET PATIDAR', '11120606749', '2023-2024', 3, 'I', 'B'),
(221, 'MOHAMMED', '11120606560', '2023-2024', 3, 'I', 'B'),
(222, 'MOHAMMED CHANDBHAI WALA', '11120606557', '2023-2024', 3, 'I', 'B'),
(223, 'MUKUL RATHORE', '11120606352', '2023-2024', 3, 'I', 'B'),
(224, 'MUSKAAN WADHWANI', '11120607003', '2023-2024', 3, 'I', 'B'),
(225, 'MUSKAN MARU', '11120606578', '2023-2024', 3, 'I', 'B'),
(226, 'NAYAN TALUKDAR', '11120606999', '2023-2024', 3, 'I', 'B'),
(227, 'NEHA VISHWAKARMA', '11120606628', '2023-2024', 3, 'I', 'B'),
(228, 'NISHANT SUNIL YADAV', '11120606648', '2023-2024', 3, 'I', 'B'),
(229, 'NISHCHAY SHARMA', '11120606644', '2023-2024', 3, 'I', 'B'),
(230, 'NISHI PARASHAR', '11120606739', '2023-2024', 3, 'I', 'B'),
(231, 'PALAK KOTHARE', '11120606802', '2023-2024', 3, 'I', 'B'),
(232, 'PARIDHI JAIN', '11120606795', '2023-2024', 3, 'I', 'B'),
(233, 'PIYUSH D. SHARMA', '11120606805', '2023-2024', 3, 'I', 'B'),
(234, 'PIYUSH J. SHARMA', '11120606325', '2023-2024', 3, 'I', 'B'),
(235, 'PIYUSH PATIDAR', '11120606743', '2023-2024', 3, 'I', 'B'),
(236, 'POORVA PARYANI', '11120606730', '2023-2024', 3, 'I', 'B'),
(237, 'PRAKHAR PAL', '11120606782', '2023-2024', 3, 'I', 'B'),
(238, 'PRANAV SHARMA', '11120606608', '2023-2024', 3, 'I', 'B'),
(239, 'PRATHAM SOLANKI', '11120606770', '2023-2024', 3, 'I', 'B'),
(240, 'PRATYUSH SARMANDAL', '11120607012', '2023-2024', 3, 'I', 'B'),
(241, 'PRIYAMVADA JOSHI', '11120606431', '2023-2024', 3, 'I', 'B'),
(242, 'RASHIKA MAURYA', '11120606338', '2023-2024', 3, 'I', 'B'),
(243, 'RISHI SACHDEV', '11120606613', '2023-2024', 3, 'I', 'B'),
(244, 'RITIK JAIN', '11120606449', '2023-2024', 3, 'I', 'B'),
(245, 'RITIKA RITHALIYA', '11120606558', '2023-2024', 3, 'I', 'B'),
(246, 'ROHAN SAKHLA', '11120606723', '2023-2024', 3, 'I', 'B'),
(247, 'RONAK KALA', '11120606807', '2023-2024', 3, 'I', 'B'),
(248, 'RONAK SONGARE', '11120607001', '2023-2024', 3, 'I', 'B'),
(249, 'ROSHANI RATHOD', '11120606667', '2023-2024', 3, 'I', 'B'),
(250, 'ROSHNI NAYAK', '11120606983', '2023-2024', 3, 'I', 'B'),
(251, 'RUDHRAKSH MISHRA', '11120606631', '2023-2024', 3, 'I', 'B'),
(252, 'SAMARTH PANDE', '11120606440', '2023-2024', 3, 'I', 'B'),
(253, 'SHAKTI MALVIYA', '11120606798', '2023-2024', 3, 'I', 'B'),
(254, 'SHIKSHA MALVIYA', '11120606309', '2023-2024', 3, 'I', 'B'),
(255, 'SHIVAM MAHESHWARI', '11120606669', '2023-2024', 3, 'I', 'B'),
(256, 'SHIVAM SAHU', '11120606916', '2023-2024', 3, 'I', 'B'),
(257, 'SHRABANI BERA', '11120607004', '2023-2024', 3, 'I', 'B'),
(258, 'SHRADDHA THAKUR', '11120606649', '2023-2024', 3, 'I', 'B'),
(259, 'SHUBHAM BISANI', '11120606650', '2023-2024', 3, 'I', 'B'),
(260, 'SHUBHAM GOUD', '11120606778', '2023-2024', 3, 'I', 'B'),
(261, 'SIMRAN DHANKANI', '11120606665', '2023-2024', 3, 'I', 'B'),
(262, 'SIMRAN SINGH KAMKAR', '11120606786', '2023-2024', 3, 'I', 'B'),
(263, 'SNEHAL PUNDLIK', '11120606455', '2023-2024', 3, 'I', 'B'),
(264, 'SONAL RAJPUT', '11120606657', '2023-2024', 3, 'I', 'B'),
(265, 'SONAM TRIVEDI', '11120606800', '2023-2024', 3, 'I', 'B'),
(266, 'SUJAL SHARMA', '11120606646', '2023-2024', 3, 'I', 'B'),
(267, 'SUKHJYOT SINGH GURUDATTA', '11120606428', '2023-2024', 3, 'I', 'B'),
(268, 'SUMIT YADAV', '11120606727', '2023-2024', 3, 'I', 'B'),
(269, 'TANISHK YADAV', '11120606998', '2023-2024', 3, 'I', 'B'),
(270, 'UPASANA SHUKLA', '11120606561', '2023-2024', 3, 'I', 'B'),
(271, 'VANSHRAJ BHATIYA', '11120607054', '2023-2024', 3, 'I', 'B'),
(272, 'VEDIKA CHOUHAN', '11120606810', '2023-2024', 3, 'I', 'B'),
(273, 'VIDHYA VERMA', '11120607053', '2023-2024', 3, 'I', 'B'),
(274, 'VIKAS SOLANKI', '11120606799', '2023-2024', 3, 'I', 'B'),
(275, 'VIVEK KUMRAWAT', '11120606801', '2023-2024', 3, 'I', 'B'),
(276, 'YASH PISE', '11120607052', '2023-2024', 3, 'I', 'B'),
(277, 'YUVRAJ SANGTANI', '11120606432', '2023-2024', 3, 'I', 'B'),
(278, 'ALKA VISHVAKARMA', '11151606819', '2023-2024', 4, 'I', 'A'),
(279, 'KAMANSHRI VANI', '11151606842', '2023-2024', 4, 'I', 'A'),
(280, 'KHUSHI RAJPUT', '11151606606', '2023-2024', 4, 'I', 'A'),
(281, 'LISHA SONI', '11151606948', '2023-2024', 4, 'I', 'A'),
(282, 'NANDANI MISHRA', '11151606845', '2023-2024', 4, 'I', 'A'),
(283, 'NIHARIKA SINGH', '11151606840', '2023-2024', 4, 'I', 'A'),
(284, 'SHUBHAM CHANDRAVANSHI', '11151607056', '2023-2024', 4, 'I', 'A'),
(285, 'SHWETA AMZARE', '11151606850', '2023-2024', 4, 'I', 'A'),
(286, 'SUPRIYA KASHYAP', '11151607023', '2023-2024', 4, 'I', 'A'),
(287, 'YOGINI MARU', '11151606585', '2023-2024', 4, 'I', 'A'),
(288, 'AADARSH GOUD', '11171407038', '2023-2024', 5, 'I', 'A'),
(289, 'ADITI SEN', '11171407074', '2023-2024', 5, 'I', 'A'),
(290, 'ANANTMAAN SHAH', '11171406823', '2023-2024', 5, 'I', 'A'),
(291, 'ANJELA SHARMA', '11171407024', '2023-2024', 5, 'I', 'A'),
(292, 'ANUSHKA BADGUJAR', '11171407027', '2023-2024', 5, 'I', 'A'),
(293, 'ARPITA BADGUJAR', '11171407026', '2023-2024', 5, 'I', 'A'),
(294, 'GANGA MARU', '11171406658', '2023-2024', 5, 'I', 'A'),
(295, 'KHUSHI NAYAK', '11171407025', '2023-2024', 5, 'I', 'A'),
(296, 'MAHIMA MARU', '11171406651', '2023-2024', 5, 'I', 'A'),
(297, 'MO. HUSSAIN KHAN', '11171406643', '2023-2024', 5, 'I', 'A'),
(298, 'MUSKAN RATHOD', '11171406660', '2023-2024', 5, 'I', 'A'),
(299, 'NARINDAR KAUR', '11151607058', '2023-2024', 5, 'I', 'A'),
(300, 'NIHARIKA PANWAR', '11171406655', '2023-2024', 5, 'I', 'A'),
(301, 'PIYUSH JADHAW', '11171407068', '2023-2024', 5, 'I', 'A'),
(302, 'PRIYA CHOUDHARY', '11171407022', '2023-2024', 5, 'I', 'A'),
(303, 'SHRASTI YADAV', '11171406586', '2023-2024', 5, 'I', 'A'),
(304, 'SHREYA SHRIVASTAV', '11171406659', '2023-2024', 5, 'I', 'A'),
(305, 'SUMIT PAGARE', '11171406853', '2023-2024', 5, 'I', 'A'),
(306, 'VEDIKA PAWAR', '11171406661', '2023-2024', 5, 'I', 'A'),
(307, 'VENYA AGRAWAL', '11171406627', '2023-2024', 5, 'I', 'A'),
(308, 'AKANSHA SANKHALA', '11161306587', '2023-2024', 6, 'I', 'A'),
(309, 'PRIYANSHI GAWANDE', '11130706556', '2023-2024', 6, 'I', 'A');

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
(1, 'Business Studies', 'MBA201', 'A', 3, 30, 'I'),
(2, 'Programming With C', 'BCA201', 'A', 1, 5, 'I'),
(6, 'Financial Studies', 'MBA203', 'B', 7, 5, 'II'),
(12, 'Foreign Trade', 'MBA401', 'B', 8, 32, 'IV'),
(13, 'Operating System', 'BCA105', 'A', 2, 6, 'I'),
(14, 'Java Practical Lab', 'BCA106', 'A', 1, 27, 'I'),
(15, 'Foreign Trade', 'MBA101', 'A', 3, 30, 'I'),
(16, 'Foreign Reserve', 'MBAFT102', 'B', 8, 31, 'I'),
(17, 'Basic Python', 'MCA101', 'A', 9, 26, 'I'),
(18, 'Operating System', 'MCA102', 'A', 9, 28, 'I');

-- --------------------------------------------------------

--
-- Table structure for table `suggestions`
--

CREATE TABLE `suggestions` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `suggestion` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suggestions`
--

INSERT INTO `suggestions` (`id`, `student_id`, `suggestion`, `created_at`, `updated_at`) VALUES
(1, 14, 'xayaa', '2023-10-12 12:33:45', '2023-10-12 12:33:45'),
(2, 16, 'bbhh', '2023-10-12 13:09:31', '2023-10-12 13:09:31');

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
(33, 'Test1', 'test1'),
(34, 'Test2', 'test2'),
(35, 'Test3', 'test3'),
(36, 'Test4', 'test4');

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
(1, 'admin', 'dineshrao@gmail.com', '9876543122', '$2y$10$4eWTa34A000W9d6GbU6Qje7He47R8WroqicMSEneeM3dpRw76ErIq', 'user'),
(11, 'dinesh', 'dinesh@gmail.com', '8290667849', '$2y$10$Ptytpy6DVYkYVOI5r.n0U.MZnhMk7eX1w/Eumn.nCDnqa7GScDJea', 'super_user');

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
-- Indexes for table `suggestions`
--
ALTER TABLE `suggestions`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=310;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `suggestions`
--
ALTER TABLE `suggestions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;