-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2023 at 08:56 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `accreditation`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(10) NOT NULL,
  `PASSWORD` varchar(100) DEFAULT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `PASSWORD`, `email`) VALUES
('admin', 'admin', 'accreditation.portal.nsu@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `admin_acess`
--

CREATE TABLE `admin_acess` (
  `name` varchar(10) NOT NULL,
  `PASSWORD` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_acess`
--

INSERT INTO `admin_acess` (`name`, `PASSWORD`) VALUES
('Not ok', ':)');

-- --------------------------------------------------------

--
-- Table structure for table `assessment`
--

CREATE TABLE `assessment` (
  `st_id` bigint(10) NOT NULL,
  `section` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assessment`
--

INSERT INTO `assessment` (`st_id`, `section`) VALUES
(1520056042, 'CSE231.1 Spring 2023'),
(1520337042, 'CSE231.1 Spring 2023'),
(2015989642, 'CSE231.1 Spring 2023');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `section` varchar(50) NOT NULL,
  `observe` text DEFAULT NULL,
  `recommend` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`section`, `observe`, `recommend`) VALUES
('CSE231.1 Spring 2023', 'The student has performed well in all CO\'s.', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `code` varchar(7) NOT NULL,
  `title` varchar(50) NOT NULL,
  `credit` int(1) NOT NULL,
  `department` varchar(4) NOT NULL,
  `coordinator` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`code`, `title`, `credit`, `department`, `coordinator`) VALUES
('CSE115', 'Programming language I', 3, 'ECE', 'Hsm'),
('CSE115L', 'Programming language I Lab', 1, 'ECE', 'Hsm '),
('CSE173', 'Discrete Mathematics', 3, 'ECE', 'MR1 '),
('CSE225', 'Data Structures and Algorithms	', 3, 'ECE', 'Afn1 '),
('CSE231', 'Digital Logic design', 3, 'ECE', 'MR1'),
('CSE231L', 'Digital Logic design Lab', 0, 'ECE', 'MR1'),
('CSE273 ', 'Theory of computation                         ', 3, 'ECE', NULL),
('CSE311', 'Database Systems', 3, 'ECE', NULL),
('CSE311L', 'Database Systems Lab', 3, 'ECE', 'afn1'),
('CSE332', 'Computer Organization and Architecture', 3, 'ECE', 'MU3'),
('CSE332L', 'Computer Organization and Architecture Lab', 0, 'ECE', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `co_aprove`
--

CREATE TABLE `co_aprove` (
  `section` varchar(50) NOT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `co_aprove`
--

INSERT INTO `co_aprove` (`section`, `status`) VALUES
('CSE115.2 Spring 2023', 'Approve'),
('CSE231.1 Spring 2023', 'Disapprove');

-- --------------------------------------------------------

--
-- Table structure for table `co_con`
--

CREATE TABLE `co_con` (
  `section` varchar(50) NOT NULL,
  `co` varchar(4) NOT NULL,
  `exam` varchar(20) NOT NULL,
  `wt` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `co_full_marks`
--

CREATE TABLE `co_full_marks` (
  `section` varchar(50) NOT NULL,
  `id` int(10) NOT NULL,
  `co` varchar(6) NOT NULL,
  `tot` float DEFAULT NULL,
  `mark` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `co_full_marks`
--

INSERT INTO `co_full_marks` (`section`, `id`, `co`, `tot`, `mark`) VALUES
('CSE231.1 Spring 2023', 1520056042, 'CO1', 40, 34),
('CSE231.1 Spring 2023', 1520056042, 'CO2', 25, 21.21),
('CSE231.1 Spring 2023', 1520056042, 'CO3', 35, 35),
('CSE231.1 Spring 2023', 1520337042, 'CO1', 40, 33),
('CSE231.1 Spring 2023', 1520337042, 'CO2', 25, 19.66),
('CSE231.1 Spring 2023', 1520337042, 'CO3', 35, 32.67),
('CSE231.1 Spring 2023', 2015989642, 'CO1', 40, 32),
('CSE231.1 Spring 2023', 2015989642, 'CO2', 25, 16.03),
('CSE231.1 Spring 2023', 2015989642, 'CO3', 35, 31.5);

-- --------------------------------------------------------

--
-- Table structure for table `co_id`
--

CREATE TABLE `co_id` (
  `code` varchar(8) NOT NULL,
  `title` varchar(4) NOT NULL,
  `Description` varchar(100) DEFAULT NULL,
  `PO` varchar(2) DEFAULT NULL,
  `bloom` varchar(50) DEFAULT NULL,
  `method` varchar(50) DEFAULT NULL,
  `tool` text DEFAULT NULL,
  `wt` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `co_id`
--

INSERT INTO `co_id` (`code`, `title`, `Description`, `PO`, `bloom`, `method`, `tool`, `wt`) VALUES
('CSE115 ', 'CO1', 'valo', 'a', 'asdas', 'adsada', 'adasd', 0),
('CSE115 ', 'CO2', NULL, NULL, NULL, '', NULL, 5),
('CSE115 ', 'CO3', NULL, NULL, NULL, '', NULL, 10),
('CSE115 ', 'CO4', NULL, NULL, NULL, '', NULL, 35),
('CSE115 ', 'CO5', NULL, NULL, NULL, '', NULL, 25),
('CSE115 ', 'CO6', NULL, NULL, NULL, '', NULL, 15),
('CSE115 ', 'CO7', NULL, NULL, NULL, '', NULL, 5),
('CSE115L', 'CO1', NULL, NULL, NULL, '', NULL, 10),
('CSE115L', 'CO2', NULL, NULL, NULL, '', NULL, 5),
('CSE115L', 'CO3', NULL, NULL, NULL, '', NULL, 20),
('CSE115L', 'CO4', NULL, NULL, NULL, '', NULL, 15),
('CSE115L', 'CO5', NULL, NULL, NULL, '', NULL, 5),
('CSE115L', 'CO6', NULL, NULL, NULL, '', NULL, 10),
('CSE115L', 'CO7', NULL, NULL, NULL, '', NULL, 35),
('CSE173', 'CO1', 'Construct mathematical arguments using propositions, predicates, logical connectives, quantifiers, a', 'a', 'asdasd', 'fgnfgmfm', 'fghfg fm', 10),
('CSE173', 'CO2', 'Select appropriate proof methods (e.g. direct proof, proof by contradiction, proof by contraposition', 'a', 'asdsa', 'ngfnfgn', 'gfhfghfg', 5),
('CSE173', 'CO3', 'Identify the types and properties of sets, relations, functions, graphs, and trees and prove simple ', 'c', 'asda', 'gfnmfgmfg', 'fghfgmf', 30),
('CSE173', 'CO4', 'Describe recursive function, sequence, or the sum of a series using recurrence relation and solve th', 'c', 'sad', 'gnfgngfnfg', 'gfhfghf', 20),
('CSE173', 'CO5', 'Prove basic properties of number theoretic operations (e.g. congruence, mod, GCD, and LCM) and apply', 'a', 'asdasda', 'asdsagbfdndg', 'fghfhgfnfg', 15),
('CSE173', 'CO6', 'Apply mathematical induction to prove properties of mathematical objects, series, etc.', 'b', 'dasffg', 'gfjfjfjf', 'gfjfgjf', 5),
('CSE173', 'CO7', 'Apply the knowledge of summation notation and basic counting techniques to solve simple mathematical', 'b', 'jfgjfgj', 'nfgnfgn', 'fgmfmfgj', 15),
('CSE225', 'CO1', 'Identify abstract data structures design techniques.', 'a', 'Cognitive/ Apply', 'Lectures/notes', 'mid, final', 40),
('CSE225', 'CO2', 'Use more advanced data structures for appropriate problems.', 'a', 'Cognitive/ Analyse', 'Lectures/notes', 'ASN-1', 10),
('CSE225', 'CO3', 'Apply appropriate data structures to solve real world problems.', 'c', 'Cognitive/ Apply', 'Lectures/notes', 'mid, final', 25),
('CSE225', 'CO4', 'Use programming tools to write and debug codes for abstract data types.', 'e', 'Psychomotor/ Precision', 'Lectures/notes/lab', 'Lab Mid, Lab Final', 25),
('CSE231', 'CO1', 'Identify abstract data structures design techniques.', 'a', 'Cognitive/ Apply', 'Lectures/notes', 'mid, final', 40),
('CSE231', 'CO2', 'Use more advanced data structures for appropriate problems.', 'a', 'Cognitive/ Analyse', 'Lectures/notes', 'ASN-1', 25),
('CSE231', 'CO3', 'Apply appropriate data structures to solve real world problems.', 'c', 'Cognitive/ Apply', 'Lectures/notes', 'mid, final', 35);

-- --------------------------------------------------------

--
-- Table structure for table `co_marks`
--

CREATE TABLE `co_marks` (
  `section` varchar(50) NOT NULL,
  `id` int(10) NOT NULL,
  `co` varchar(4) NOT NULL,
  `exam` varchar(20) NOT NULL,
  `wt` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `co_marks`
--

INSERT INTO `co_marks` (`section`, `id`, `co`, `exam`, `wt`) VALUES
('CSE231.1 Spring 2023', 1520056042, 'CO1', 'Q1', 10),
('CSE231.1 Spring 2023', 1520056042, 'CO1', 'Q3', 19),
('CSE231.1 Spring 2023', 1520056042, 'CO1', 'VIVA2', 5),
('CSE231.1 Spring 2023', 1520056042, 'CO2', 'Final1', 69),
('CSE231.1 Spring 2023', 1520056042, 'CO2', 'MID1', 42),
('CSE231.1 Spring 2023', 1520056042, 'CO2', 'Q2', 12),
('CSE231.1 Spring 2023', 1520056042, 'CO3', 'Assignment1', 10),
('CSE231.1 Spring 2023', 1520056042, 'CO3', 'Q4', 20),
('CSE231.1 Spring 2023', 1520337042, 'CO1', 'Q1', 9),
('CSE231.1 Spring 2023', 1520337042, 'CO1', 'Q3', 17),
('CSE231.1 Spring 2023', 1520337042, 'CO1', 'VIVA2', 7),
('CSE231.1 Spring 2023', 1520337042, 'CO2', 'Final1', 64),
('CSE231.1 Spring 2023', 1520337042, 'CO2', 'MID1', 40),
('CSE231.1 Spring 2023', 1520337042, 'CO2', 'Q2', 10),
('CSE231.1 Spring 2023', 1520337042, 'CO3', 'Assignment1', 10),
('CSE231.1 Spring 2023', 1520337042, 'CO3', 'Q4', 18),
('CSE231.1 Spring 2023', 2015989642, 'CO1', 'Q1', 9),
('CSE231.1 Spring 2023', 2015989642, 'CO1', 'Q3', 13),
('CSE231.1 Spring 2023', 2015989642, 'CO1', 'VIVA2', 10),
('CSE231.1 Spring 2023', 2015989642, 'CO2', 'Final1', 49),
('CSE231.1 Spring 2023', 2015989642, 'CO2', 'MID1', 37),
('CSE231.1 Spring 2023', 2015989642, 'CO2', 'Q2', 7),
('CSE231.1 Spring 2023', 2015989642, 'CO3', 'Assignment1', 10),
('CSE231.1 Spring 2023', 2015989642, 'CO3', 'Q4', 17);

-- --------------------------------------------------------

--
-- Table structure for table `curve`
--

CREATE TABLE `curve` (
  `section` varchar(50) NOT NULL,
  `method` varchar(10) NOT NULL,
  `ceil` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `curve`
--

INSERT INTO `curve` (`section`, `method`, `ceil`) VALUES
('CSE231.1 Spring 2023', '2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `deadline`
--

CREATE TABLE `deadline` (
  `dep` varchar(3) DEFAULT NULL,
  `semester` varchar(20) DEFAULT NULL,
  `s_date` date DEFAULT NULL,
  `e_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deadline`
--

INSERT INTO `deadline` (`dep`, `semester`, `s_date`, `e_date`) VALUES
('ECE', 'Spring 2023', '2023-04-25', '2023-06-25');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dep` varchar(4) NOT NULL,
  `dep_name` varchar(50) NOT NULL,
  `c_initial` varchar(6) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dep`, `dep_name`, `c_initial`, `name`) VALUES
('BBA', 'Department of Business & Economics', 'FAh ', 'Fardin Ahmed'),
('ECE', 'Department of Electrical & Computer Engineering', 'Rjp ', 'DR. Rajesh Palit'),
('ESM', 'Environment Management System', NULL, NULL),
('HIS', 'Department of History and Philosophy', 'MHS ', 'Mobarak Hossain'),
('MAT', 'Department of Mathematics & Physics', 'Mth ', 'Dr. Mohammad Sahadet Hossain');

-- --------------------------------------------------------

--
-- Table structure for table `exam_co`
--

CREATE TABLE `exam_co` (
  `section` varchar(50) NOT NULL,
  `exam` varchar(20) NOT NULL,
  `co` varchar(5) DEFAULT NULL,
  `mark` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_co`
--

INSERT INTO `exam_co` (`section`, `exam`, `co`, `mark`) VALUES
('CSE115.2 Spring 2023', 'Assignment1', 'CO2', 10),
('CSE115.2 Spring 2023', 'Final1', 'CO6', 100),
('CSE115.2 Spring 2023', 'MID1', 'CO3', 50),
('CSE115.2 Spring 2023', 'MID2', 'CO3', 50),
('CSE115.2 Spring 2023', 'Project1', 'CO4', 50),
('CSE115.2 Spring 2023', 'Q1', 'CO1', 10),
('CSE115.2 Spring 2023', 'Q2', 'NONE', 15),
('CSE115.2 Spring 2023', 'Q3', 'CO5', 20),
('CSE115.2 Spring 2023', 'Q4', 'CO7', 15),
('CSE231.1 Spring 2023', 'Assignment1', 'CO3', 10),
('CSE231.1 Spring 2023', 'Final1', 'CO2', 80),
('CSE231.1 Spring 2023', 'MID1', 'CO2', 50),
('CSE231.1 Spring 2023', 'Q1', 'CO1', 10),
('CSE231.1 Spring 2023', 'Q2', 'CO2', 15),
('CSE231.1 Spring 2023', 'Q3', 'CO1', 20),
('CSE231.1 Spring 2023', 'Q4', 'CO3', 20),
('CSE231.1 Spring 2023', 'VIVA1', 'NONE', 5),
('CSE231.1 Spring 2023', 'VIVA2', 'CO1', 10);

-- --------------------------------------------------------

--
-- Table structure for table `exam_detail`
--

CREATE TABLE `exam_detail` (
  `section` varchar(50) NOT NULL,
  `exam` varchar(20) NOT NULL,
  `total` int(11) DEFAULT NULL,
  `best` int(2) DEFAULT NULL,
  `percentage` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_detail`
--

INSERT INTO `exam_detail` (`section`, `exam`, `total`, `best`, `percentage`) VALUES
('CSE231.1 Spring 2023', 'Assignment', 1, 1, 5),
('CSE231.1 Spring 2023', 'Attendence', NULL, NULL, 5),
('CSE231.1 Spring 2023', 'Final', 1, 1, 30),
('CSE231.1 Spring 2023', 'LAB', NULL, NULL, 10),
('CSE231.1 Spring 2023', 'MID', 1, 1, 25),
('CSE231.1 Spring 2023', 'Quiz', 4, 4, 20),
('CSE231.1 Spring 2023', 'VIVA', 2, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `initial` varchar(6) NOT NULL,
  `name` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `department` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`initial`, `name`, `PASSWORD`, `phone_number`, `email`, `birthday`, `department`) VALUES
('AAM', 'Al Amin Hossain', '81dc9bdb52d04dc20036dbd8313ed055', 1958464544, 'alhossain@gmail.com', '1992-02-29', 'MAT'),
('Afn1', 'Ahmed Fahmid', '81dc9bdb52d04dc20036dbd8313ed055', 1338745899, 'fahmid@northsouth.edu', '1997-02-27', 'ECE'),
('AHS', 'Abdullah Hossain', 'c07d9b16ceb96f5705e2176cc6f16c0a', 1965784584, 'shafqatur.rahman@northsouth.edu', '1987-11-17', 'ENG'),
('Ara2', 'DR. AHSANUR RAHMAN', '81dc9bdb52d04dc20036dbd8313ed055', 24324525, 'ahsanur.rahman@northsouth.edu', '1985-03-29', 'ECE'),
('FAh', 'Fardin Ahmed', '81b073de9370ea873f548e31b8adc081', 1347483640, 'fardin.ahmed02@northsouth.edu', '1998-07-09', 'BBA'),
('Fkh', 'Farukh Hossain', '81dc9bdb52d04dc20036dbd8313ed055', 1565786899, 'farukh.hossain@northsouth.edu', '1998-03-17', 'HIS'),
('Fzm', 'Farzana Mohsin', 'a499ed13c9007c35d00c89ed4b9d20ac', 2147483640, 'farzana@northsouth.edu', '1995-12-22', 'ENG'),
('Hsm', 'MD. SHAHRIAR HUSSAIN', 'd54cd08cb4980bfea9552583d35bbcb6', 1778742555, 'shariar@northsouth.edu', '1996-06-21', 'ECE'),
('MHS', 'Mobarak Hossain', '81dc9bdb52d04dc20036dbd8313ed055', 1796969699, 'mobarak@gmail.com', '2023-01-30', 'HIS'),
('MHT', 'Mofakkhor Hossai', '81dc9bdb52d04dc20036dbd8313ed055', 1347677355, 'toki@gmail.com', '1987-08-21', 'BBA'),
('MN', 'Muhammad Nasiruddin', '81dc9bdb52d04dc20036dbd8313ed055', 1558746819, 'nassiruddin@northsouth.edu', '1996-05-25', 'BBA'),
('MR1', 'Mahdi Redwan', '81dc9bdb52d04dc20036dbd8313ed055', 1357876356, 'mahdi.redwan@northsouth.edu', '2023-02-10', 'ECE'),
('MR2', 'Moksedur Rahman', '81dc9bdb52d04dc20036dbd8313ed055', 2147483647, 'moksed@ymail.com', '2023-02-13', 'MAT'),
('Mth', 'Dr. Mohammad Sahadet Hossain', '81dc9bdb52d04dc20036dbd8313ed055', 255668200, 'mohammad.hossain@northsouth.edu', '1985-03-29', 'MAT'),
('MU3', 'Mofis Uddin', '81dc9bdb52d04dc20036dbd8313ed055', 1943878533, 'mof@gmail.com', '1993-11-25', 'ECE'),
('Rjp', 'DR. Rajesh Palit', '81dc9bdb52d04dc20036dbd8313ed055', 1719557447, 'rajesh.palit@northsouth.edu', '1985-11-20', 'ECE'),
('rkz', 'Dr. M. Rokonuzzaman', '81dc9bdb52d04dc20036dbd8313ed055', 1694204967, 'm.rokonuzzaman@northsouth.edu', '1969-07-09', 'ECE'),
('TI2', 'Tarvir Islam', '6639432e1f0f05e23f944cff8fb5d43d', 1367435454, 'tanvir@northsouth.edu', '1985-07-25', 'ENV'),
('Tmp', 'Temporary Faculty', '81dc9bdb52d04dc20036dbd8313ed055', 1934853855, 'temporar@northsouth.edu', '1999-11-25', 'ECE');

-- --------------------------------------------------------

--
-- Table structure for table `full_marks`
--

CREATE TABLE `full_marks` (
  `section` varchar(50) NOT NULL,
  `id` bigint(10) NOT NULL,
  `i_mark` float DEFAULT NULL,
  `method` varchar(20) DEFAULT NULL,
  `c_mark` float DEFAULT NULL,
  `grade` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `full_marks`
--

INSERT INTO `full_marks` (`section`, `id`, `i_mark`, `method`, `c_mark`, `grade`) VALUES
('CSE231.1 Spring 2023', 1520056042, 88.38, '+Two Grade', 95, 'A'),
('CSE231.1 Spring 2023', 1520337042, 83.83, '+Two Grade', 90, 'A-'),
('CSE231.1 Spring 2023', 2015989642, 74.21, '+Two Grade', 81, 'B-');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `section` varchar(50) NOT NULL,
  `id` bigint(10) NOT NULL,
  `exam` varchar(20) NOT NULL,
  `mark` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`section`, `id`, `exam`, `mark`) VALUES
('CSE231.1 Spring 2023', 1520056042, 'Assignment', 5),
('CSE231.1 Spring 2023', 1520056042, 'Assignment1', 10),
('CSE231.1 Spring 2023', 1520056042, 'Attendance', 5),
('CSE231.1 Spring 2023', 1520056042, 'Final', 25.88),
('CSE231.1 Spring 2023', 1520056042, 'Final1', 69),
('CSE231.1 Spring 2023', 1520056042, 'LAB', 9),
('CSE231.1 Spring 2023', 1520056042, 'MID', 21),
('CSE231.1 Spring 2023', 1520056042, 'MID1', 42),
('CSE231.1 Spring 2023', 1520056042, 'Q1', 10),
('CSE231.1 Spring 2023', 1520056042, 'Q2', 12),
('CSE231.1 Spring 2023', 1520056042, 'Q3', 19),
('CSE231.1 Spring 2023', 1520056042, 'Q4', 20),
('CSE231.1 Spring 2023', 1520056042, 'QUIZ', 18.75),
('CSE231.1 Spring 2023', 1520056042, 'VIVA', 3.75),
('CSE231.1 Spring 2023', 1520056042, 'VIVA1', 5),
('CSE231.1 Spring 2023', 1520056042, 'VIVA2', 5),
('CSE231.1 Spring 2023', 1520337042, 'Assignment', 5),
('CSE231.1 Spring 2023', 1520337042, 'Assignment1', 10),
('CSE231.1 Spring 2023', 1520337042, 'Attendance', 5),
('CSE231.1 Spring 2023', 1520337042, 'Final', 24),
('CSE231.1 Spring 2023', 1520337042, 'Final1', 64),
('CSE231.1 Spring 2023', 1520337042, 'LAB', 9),
('CSE231.1 Spring 2023', 1520337042, 'MID', 20),
('CSE231.1 Spring 2023', 1520337042, 'MID1', 40),
('CSE231.1 Spring 2023', 1520337042, 'Q1', 9),
('CSE231.1 Spring 2023', 1520337042, 'Q2', 10),
('CSE231.1 Spring 2023', 1520337042, 'Q3', 17),
('CSE231.1 Spring 2023', 1520337042, 'Q4', 18),
('CSE231.1 Spring 2023', 1520337042, 'QUIZ', 16.58),
('CSE231.1 Spring 2023', 1520337042, 'VIVA', 4.25),
('CSE231.1 Spring 2023', 1520337042, 'VIVA1', 5),
('CSE231.1 Spring 2023', 1520337042, 'VIVA2', 7),
('CSE231.1 Spring 2023', 2015989642, 'Assignment', 5),
('CSE231.1 Spring 2023', 2015989642, 'Assignment1', 10),
('CSE231.1 Spring 2023', 2015989642, 'Attendance', 4.5),
('CSE231.1 Spring 2023', 2015989642, 'Final', 18.38),
('CSE231.1 Spring 2023', 2015989642, 'Final1', 49),
('CSE231.1 Spring 2023', 2015989642, 'LAB', 10),
('CSE231.1 Spring 2023', 2015989642, 'MID', 18.5),
('CSE231.1 Spring 2023', 2015989642, 'MID1', 37),
('CSE231.1 Spring 2023', 2015989642, 'Q1', 9),
('CSE231.1 Spring 2023', 2015989642, 'Q2', 7),
('CSE231.1 Spring 2023', 2015989642, 'Q3', 13),
('CSE231.1 Spring 2023', 2015989642, 'Q4', 17),
('CSE231.1 Spring 2023', 2015989642, 'QUIZ', 14.33),
('CSE231.1 Spring 2023', 2015989642, 'VIVA', 3.5),
('CSE231.1 Spring 2023', 2015989642, 'VIVA1', 2),
('CSE231.1 Spring 2023', 2015989642, 'VIVA2', 10);

-- --------------------------------------------------------

--
-- Table structure for table `pass`
--

CREATE TABLE `pass` (
  `email` varchar(50) DEFAULT NULL,
  `code` int(6) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pass`
--

INSERT INTO `pass` (`email`, `code`, `start_time`, `end_time`) VALUES
('fardin.ahmed02@northsouth.edu', 575625, '01:22:11', '01:32:11');

-- --------------------------------------------------------

--
-- Table structure for table `po`
--

CREATE TABLE `po` (
  `section` varchar(50) NOT NULL,
  `id` bigint(10) NOT NULL,
  `po` varchar(1) NOT NULL,
  `mark` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `po`
--

INSERT INTO `po` (`section`, `id`, `po`, `mark`) VALUES
('CSE231.1 Spring 2023', 1520056042, 'a', 84.92),
('CSE231.1 Spring 2023', 1520056042, 'c', 100),
('CSE231.1 Spring 2023', 1520337042, 'a', 80.57),
('CSE231.1 Spring 2023', 1520337042, 'c', 93.34),
('CSE231.1 Spring 2023', 2015989642, 'a', 72.06),
('CSE231.1 Spring 2023', 2015989642, 'c', 90);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `section` varchar(50) NOT NULL,
  `link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`section`, `link`) VALUES
('CSE115.2 Spring 2023', 'https://drive.google.com/drive/folders/14qZ-FS2m_sYlAEmdWja5jgB3FvjiQ9D5?usp=share_link'),
('CSE231.1 Spring 2023', 'https://drive.google.com/drive/folders/14qZ-FS2m_sYlAEmdWja5jgB3FvjiQ9D5?usp=share_link');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `c_code` varchar(8) NOT NULL,
  `section` int(3) NOT NULL,
  `semester` varchar(11) NOT NULL,
  `room` varchar(8) DEFAULT NULL,
  `time` varchar(25) DEFAULT NULL,
  `seat` int(3) DEFAULT NULL,
  `fac_id` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`c_code`, `section`, `semester`, `room`, `time`, `seat`, `fac_id`) VALUES
('CSE115', 1, 'Spring 2023', 'NAC990', 'ST 10:20 AM - 11:20 AM', 40, NULL),
('CSE115', 2, 'Spring 2023', 'SAC207', 'ST 09:10 AM - 10:10 AM', 35, 'Tmp'),
('CSE115', 3, 'Spring 2023', 'SAC204', 'ST 09:10 AM - 10:10 AM', 40, NULL),
('CSE115', 4, 'Spring 2023', 'SAC310', 'ST 10:20 AM - 11:20 AM', 40, NULL),
('CSE115', 5, 'Fall 2020', NULL, NULL, NULL, 'Tmp'),
('CSE115', 5, 'Spring 2023', 'SAC206', 'ST 11:30 AM - 12:30 PM', 37, NULL),
('CSE115', 5, 'Summer 2020', NULL, NULL, NULL, NULL),
('CSE115', 6, 'Spring 2023', 'SAC308', 'ST 08:00 AM - 09:00 AM', 40, NULL),
('CSE115', 7, 'Spring 2023', 'NAC992', 'MW 10:20 AM - 11:20 AM', 40, 'HSM'),
('CSE115', 8, 'Spring 2023', 'SAC307', 'ST 08:00 AM - 09:00 AM', 35, NULL),
('CSE115', 9, 'Spring 2023', 'SAC307', 'ST 12:40 PM - 01:40 PM', 40, NULL),
('CSE115', 10, 'Spring 2023', 'SAC308', 'RA 09:10 AM - 10:10 AM', 40, NULL),
('CSE115', 11, 'Spring 2023', 'SAC308', 'RA 10:20 AM - 11:20 AM', 40, NULL),
('CSE115', 12, 'Spring 2023', 'SAC205', 'ST 01:50 PM - 02:50 PM', 35, NULL),
('CSE115', 13, 'Spring 2023', 'SAC513', 'ST 01:50 PM - 02:50 PM', 35, NULL),
('CSE115', 14, 'Spring 2023', 'SAC207', 'RA 09:10 AM - 10:10 AM', 35, NULL),
('CSE115', 15, 'Spring 2023', 'SAC205', 'RA 10:20 AM - 11:20 AM', 35, NULL),
('CSE115', 16, 'Spring 2023', 'NAC991', 'MW 09:10 AM - 10:10 AM', 35, NULL),
('CSE115', 17, 'Spring 2023', 'NAC991', 'MW 11:30 AM - 12:30 PM', 40, NULL),
('CSE115', 18, 'Spring 2023', 'SAC207', 'ST 10:20 AM - 11:20 AM', 35, NULL),
('CSE115', 19, 'Spring 2023', 'SAC511', 'ST 12:40 PM - 01:40 PM', 35, NULL),
('CSE115', 20, 'Spring 2023', 'NAC201', 'RA 08:00 AM - 09:00 AM', 35, NULL),
('CSE115L', 1, 'Spring 2023', 'LIB602', 'ST 12:40 PM - 01:40 PM', 35, NULL),
('CSE115L', 2, 'Spring 2023', 'LIB602', 'ST 08:00 AM - 09:00 AM', 35, NULL),
('CSE115L', 3, 'Spring 2023', 'LIB605', 'ST 12:40 PM - 01:40 PM', 35, NULL),
('CSE115L', 4, 'Spring 2023', 'LIB605', 'ST 01:50 PM - 02:50 PM', 35, NULL),
('CSE115L', 5, 'Spring 2023', 'LIB605', 'ST 03:00 PM - 04:00 PM', 35, NULL),
('CSE115L', 6, 'Spring 2023', 'LIB603', 'ST 09:10 AM - 10:10 AM', 35, NULL),
('CSE115L', 7, 'Spring 2023', 'LIB602', 'MW 09:10 AM - 10:10 AM', 35, NULL),
('CSE115L', 8, 'Spring 2023', 'LIB602', 'ST 09:10 AM - 10:10 AM', 35, NULL),
('CSE115L', 9, 'Spring 2023', 'LIB603', 'ST 01:50 PM - 02:50 PM', 38, NULL),
('CSE115L', 10, 'Spring 2023', 'LIB602', 'RA 11:30 AM - 12:30 PM', 38, NULL),
('CSE115L', 11, 'Spring 2023', 'LIB603', 'RA 12:40 PM - 01:40 PM', 40, NULL),
('CSE115L', 12, 'Spring 2023', 'LIB603', 'ST 10:20 AM - 11:20 AM', 38, NULL),
('CSE115L', 13, 'Spring 2023', 'LIB603', 'ST 03:00 PM - 04:00 PM', 40, NULL),
('CSE115L', 14, 'Spring 2023', 'LIB604', 'RA 11:30 AM - 12:30 PM', 38, NULL),
('CSE115L', 15, 'Spring 2023', 'LIB604', 'RA 12:40 PM - 01:40 PM', 38, NULL),
('CSE115L', 16, 'Spring 2023', 'LIB602', 'MW 10:20 AM - 11:20 AM', 38, NULL),
('CSE115L', 17, 'Spring 2023', 'LIB603', 'MW 12:40 PM - 01:40 PM', 38, NULL),
('CSE115L', 18, 'Spring 2023', 'LIB602', 'ST 11:30 AM - 12:30 PM', 38, NULL),
('CSE115L', 19, 'Spring 2023', 'LIB611', 'ST 01:50 PM - 02:50 PM', 38, NULL),
('CSE173', 1, 'Spring 2023', 'SAC204', 'ST 12:40 PM - 01:40 PM', 38, NULL),
('CSE173', 2, 'Spring 2023', 'SAC204', 'ST 01:50 PM - 02:50 PM', 38, NULL),
('CSE173', 3, 'Spring 2023', 'SAC310', 'ST 04:10 PM - 05:10 PM', 40, 'Tmp'),
('CSE173', 4, 'Spring 2023', 'NAC215', 'ST 09:10 AM - 10:10 AM', 38, 'Tmp'),
('CSE173', 5, 'Spring 2023', 'NAC992', 'MW 09:10 AM - 10:10 AM', 38, NULL),
('CSE173', 6, 'Spring 2023', 'SAC311', 'MW 11:30 AM - 12:30 PM', 40, NULL),
('CSE173', 7, 'Spring 2023', 'SAC206', 'RA 08:00 AM - 09:00 AM', 38, NULL),
('CSE173', 8, 'Spring 2023', 'SAC206', 'RA 09:10 AM - 10:10 AM', 38, NULL),
('CSE173', 9, 'Spring 2023', 'SAC204', 'RA 12:40 PM - 01:40 PM', 38, NULL),
('CSE173', 10, 'Spring 2023', 'SAC204', 'RA 08:00 AM - 09:00 AM', 38, NULL),
('CSE173', 11, 'Spring 2023', 'SAC204', 'RA 10:20 AM - 11:20 AM', 38, NULL),
('CSE173', 12, 'Spring 2023', 'SAC801A', 'RA 09:10 AM - 10:10 AM', 38, NULL),
('CSE173', 13, 'Spring 2023', 'NAC990', 'MW 09:10 AM - 10:10 AM', 38, NULL),
('CSE173', 14, 'Spring 2023', 'SAC311', 'RA 08:00 AM - 09:00 AM', 40, NULL),
('CSE173', 15, 'Spring 2023', 'SAC205', 'RA 09:10 AM - 10:10 AM', 38, NULL),
('CSE173', 16, 'Spring 2023', 'NAC619A', 'MW 12:40 PM - 01:40 PM', 38, NULL),
('CSE231', 1, 'Spring 2023', 'NAC302', 'ST 01:50 PM - 02:50 PM', 35, 'Tmp');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `Serial` int(1) NOT NULL,
  `season` varchar(6) NOT NULL,
  `year` int(4) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`Serial`, `season`, `year`, `start`, `end`) VALUES
(3, 'Fall', 2020, '2020-09-22', '2020-12-20'),
(1, 'Spring', 2020, '2020-01-12', '2020-04-12'),
(1, 'Spring', 2023, '2023-01-07', '2023-06-27'),
(2, 'Summer', 2020, '2020-04-13', '2020-09-22');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` bigint(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `phone_number`, `email`) VALUES
(1010318042, 'Zidney Rahman  ', 1733323482, 'rahman.zidneyr@northsouth.edu'),
(1010319042, 'Zillur Rahman', 1338746899, 'rahman.zillur@northsouth.edu'),
(1011318042, 'Samsur Rahman  ', 1780155527, 'rahman.samsur@northsouth.edu'),
(1220218642, 'Mohammad  Shohan Hossain', 1338746819, 'shohan.hossain@northsouth.edu'),
(1220228642, 'Mohammad Aslam Hossain  ', 1823036617, 'aslam.hossain@northsouth.edu'),
(1221228642, ' Asma Hossain  ', 1829626554, 'asma.hossain@northsouth.edu'),
(1420116042, 'Sharmina Islam Surmi  ', 1338742555, 'sharmina.surmi@northsouth.edu'),
(1420126042, 'Shila Islam Sumi  ', 1869641178, 'shila.sumi@northsouth.edu'),
(1421426042, ' Sumi Akter  ', 1758396998, 'akter.sumi@northsouth.edu'),
(1430759042, 'Arnab Rezvi', 1738746899, 'arnab.rezvi@northsouth.edu'),
(1430769042, 'Asif Mohammad Rijvee ', 1780798188, 'asif.rijvee@northsouth.edu'),
(1431769042, 'Asif Iqbal', 1870283147, 'asif.iqbal@northsouth.edu'),
(1510656042, 'Sharif Ahamed', 1565746899, 'sharif.ahmed@northsouth.edu'),
(1510688042, 'Ishrat Jahan Diya  ', 1778117608, 'ishrat.jahandiya@northsouth.edu'),
(1510712042, 'Labib Md. Rashid  ', 1806920326, 'labib.rashid@northsouth.edu'),
(1510720042, 'Hasib Al Muhaimin  ', 1733932986, 'hasib.muhaimin@northsouth.edu'),
(1510730042, 'Hasibul Muhaimin  ', 1737596642, 'hasibul.muhaimin@northsouth.edu'),
(1510756042, 'Saif Ahmed  ', 1873362353, 'saif.ahmed@northsouth.edu'),
(1510903042, 'Safin Mahmud  ', 1872134554, 'safin.mahmud@northsouth.edu'),
(1510913042, 'Sifa Mahmud  ', 1800312109, 'sifa.mahmud@northsouth.edu'),
(1510963042, 'Muhammad Abeer Tahmeed  ', 1768221238, '1510963042@northsouth.edu'),
(1510973042, 'Muhammad Abrar  ', 1770691599, 'abrar.muhammad@northsouth.edu'),
(1511075042, ' Kazi Fahim ', 1891470702, 'fahim.kazi@northsouth.edu'),
(1511085042, 'Sk. Fahim Mushfiq  ', 1768775291, 'fahim.mushfiq@northsouth.edu'),
(1511175042, ' Kazi Farhana', 1823803220, 'farhana.kazi@northsouth.edu'),
(1511317042, 'Resalat Amin  ', 1851076551, 'resalat.amin@northsouth.edu'),
(1511327042, 'Ruhul Amin  ', 1763451981, 'ruhul.amin@northsouth.edu'),
(1511327043, 'Ruhul Mollah', 1843121876, 'ruhul.mollah@northsouth.edu'),
(1511353042, 'Mobin Islam  ', 1840021439, 'mobin.islam@northsouth.edu'),
(1511363042, 'Mobin Aftab', 1886156966, 'mobin.aftab@northsouth.edu'),
(1511383042, 'Md. Monzurul Islam  ', 1893630229, 'monzurul.islam@northsouth.edu'),
(1511410042, 'Md. Nazmul Islam  ', 1864892106, 'md.nazmul@northsouth.edu'),
(1511420042, ' Nazma Islam  ', 1802378664, 'nazma.islaml@northsouth.edu'),
(1511520042, ' Nazul Islam  ', 1755280269, 'nazmul.islaml@northsouth.edu'),
(1511602042, 'Fariha Islam  ', 1729360075, 'fariha.islam15@northsouth.edu'),
(1511612042, 'Fariha Diba  ', 1723994484, 'fariha.diba@northsouth.edu'),
(1511622042, 'Farrah Diba  ', 1755750696, 'farrah.diba@northsouth.edu'),
(1511698042, 'Neha Mahjeerin', 1843102559, 'neha.mahjeerin@northsouth.edu'),
(1511704042, 'Md. Rifatul Islam Rifat  ', 1781928846, 'rifatulislam.rifat@northsouth.edu'),
(1511712042, 'Labiba  Faiza', 1800683138, 'labiba.faiza@northsouth.edu'),
(1511730042, 'Asif Muhaimin  ', 1809451380, 'asif.muhaimin@northsouth.edu'),
(1511756042, 'Saiful Ahmed  ', 1815144210, 'saiful.ahmed@northsouth.edu'),
(1511804042, 'Rifa Islam ', 1805031834, 'rifa.islam@northsouth.edu'),
(1511814042, 'Rifat Sami', 1813418927, 'rifat.sami@northsouth.edu'),
(1511885042, 'Jabid Hasan Pappu  ', 1844202791, 'jabid.pappu@northsouth.edu'),
(1511886042, 'Sadman Safi', 1715518013, 'sadman.safi@northsouth.edu'),
(1511895042, 'Kowser Pappu  ', 1883979909, 'kowser.pappu@northsouth.edu'),
(1511912042, 'Sadvan Sarwar  ', 1717378285, 'sadvan.sarwar@northsouth.edu'),
(1511913042, 'Sila Mahmud  ', 1804913983, 'sila.mahmud@northsouth.edu'),
(1511932042, 'Sadman Sarwar  ', 1825341314, 'sadman.sarwar@northsouth.edu'),
(1511942042, 'Nadim Sarwar  ', 1755306789, 'nadim.sarwar@northsouth.edu'),
(1511944042, 'Md. Mahmudul Haque  ', 1822573757, '1511944642@northsouth.edu'),
(1511952042, 'Saif Sarwar  ', 1823260750, 'saif.sarwar@northsouth.edu'),
(1511954042, 'MIlu Haque  ', 1856495075, 'milu.haque@northsouth.edu'),
(1511955042, 'Mila Haque  ', 1727143171, 'mila.haque@northsouth.edu'),
(1512080042, 'Hamdan Kaiser  ', 1833178561, 'hamdan.kaiser@northsouth.edu'),
(1512090042, 'Karima Kaiser  ', 1837570008, 'karima.kaiser@northsouth.edu'),
(1512091042, 'Karima Marzan', 1734449804, 'karima.marzan@northsouth.edu'),
(1512092042, 'Adiba Marzan', 1827479509, 'adiba.marzan@northsouth.edu'),
(1513216042, 'Fairooz Alam  ', 1705739943, 'fairooz.alam@northsouth.edu'),
(1513252042, 'IradSakib', 1791135712, 'irad.sakib@northsouth.edu'),
(1513253042, 'Sayef Sarkar Eashan  ', 1747926865, 'sayef.eashan@northsouth.edu'),
(1513271042, 'Safi Alam', 1775270675, 'safi.alam@northsouth.edu'),
(1513272042, 'Shamima Alam', 1823685249, 'shamima.alam@northsouth.edu'),
(1513276042, 'Faria Alam', 1883232717, 'faria.alam@northsouth.edu'),
(1513283042, 'Syed  Eashan  ', 1862588627, 'syed.eashan@northsouth.edu'),
(1520054042, 'Maruf Ahmed  ', 1756684990, 'maruf.ahmed@northsouth.edu'),
(1520056042, 'Nabiha Rashid', 1867218513, 'nabiha.rashid@northsouth.edu'),
(1520064042, 'Marufur Rashid', 1888258604, 'marufur.rashid@northsouth.edu'),
(1520265042, 'Samira Mahmood  ', 1772249793, 'samira.mahmood@northsouth.edu'),
(1520285042, 'Sumi Mahmood  ', 1806267250, 'sumi.mahmood@northsouth.edu'),
(1520286042, 'Somi Kaiser  ', 1736290011, 'somi.kaiser@northsouth.edu'),
(1520337042, 'Saifullah Kaiser  ', 1870322189, 'saifullah.kaiser@northsouth.edu'),
(1520725042, 'Farhan Israk Yen  ', 1897438195, 'farhan.yen@northsouth.edu'),
(1520734042, 'Farhan Ishraq', 1722791681, 'farhan.ishraq@northsouth.edu'),
(1520735042, 'Farhan Morshed', 1818900789, 'farhan.morshed@northsouth.edu'),
(2011938642, 'Asif Hasnain', 1813233166, 'hasnain.asif@northsouth.edu'),
(2012088642, 'Rifa Totini', 1795957719, 'rifa.totini@northsouth.edu'),
(2012370642, 'Mustafizur Rahman', 1524324525, 'mustafiz@northsouth.edu'),
(2015987642, 'Humaira Jesmine', 1799384178, 'jesmine.humaira@northsouth.edu'),
(2015988642, 'Humaira Shanta', 1893936807, 'shanta.humaira@northsouth.edu'),
(2015989642, 'Humaira Samita', 1836834798, 'samita.humaira@northsouth.edu'),
(2016987642, 'Md. Nurul Islam Sarker', 1849120666, 'sarker.nurul@northsouth.edu'),
(2016988642, 'Md. Nurul Islam Nahid', 1899637660, 'nahid.nurul@northsouth.edu'),
(2016989642, ' Nurul Haider', 1702438045, 'haider.nurul@northsouth.edu'),
(2017987642, 'Rabeya Brgum', 1786468822, 'begum.rabeya@northsouth.edu'),
(2017988642, 'Rabeya Parveen', 1705322177, 'parveen.rabeya@northsouth.edu'),
(2017999642, 'Rabeya Mehjabin', 1752316310, 'mehjabin.rabeya@northsouth.edu'),
(2018987642, 'Asif Muhammad Yousuf', 1735709852, 'yousuf.asif@northsouth.edu'),
(2018988642, 'Asif Shahriar', 1809744246, 'shahriar.asif@northsouth.edu'),
(2019987642, 'Tarana Binte Syed', 1746385938, 'tarana.binte@northsouth.edu'),
(2019988642, 'Rifa Binte Syed', 1789429281, 'rifa.binte@northsouth.edu'),
(2021987642, 'Ashiq Khan', 1791826251, 'khan.ashiq@northsouth.edu'),
(2021988642, 'Zim Khan', 1877164778, 'khan.zim@northsouth.edu'),
(2022987642, 'Iftekhar Adnan', 1757536330, 'adnan.iftekhar@northsouth.edu'),
(2022988642, 'Iftekhar Ahmed', 1720750040, 'ahmed.iftekhar@northsouth.edu'),
(2023987642, 'Asif Miandad', 1745836303, 'miandad.asif@northsouth.edu'),
(2023988642, 'Asif Iqbal', 1808666365, 'iqbal.asif@northsouth.edu'),
(2024987642, 'Tahamina Nasrin', 1750867275, 'tahamina.nasrin@northsouth.edu'),
(2024988642, 'Tahamina Chaity', 1881938237, 'tahamina.chaity@northsouth.edu'),
(2025987642, 'Sadia Akbar', 1720192931, 'sadia.akabar@northsouth.edu'),
(2025988642, 'Saad Islam', 1778144569, 'saad.islam@northsouth.edu'),
(2026987642, 'Bushra Tanzim', 1815897301, 'bushra.tanzim@northsouth.edu'),
(2026988642, ' Tanzim Hoque', 1811855338, 'hoque.tanzim@northsouth.edu'),
(2027987642, 'Tasfia Islam', 1871812208, 'islam.tasfia@northsouth.edu'),
(2027988642, 'Alvina Islam', 1719412043, 'islam.alvina@northsouth.edu'),
(2028987642, 'Mahdi Ahmed', 1779976204, 'ahmed.mahdi@northsouth.edu'),
(2028988642, 'Mahdi Sourav', 1867291787, 'saurav.mahdi@northsouth.edu'),
(2029987642, 'Tahsin Rehnuma', 1845759051, 'rehnuma.tahsin@northsouth.edu'),
(2029988642, 'Tahsina Shafia', 1847820641, 'shafia.tahsina@northsouth.edu'),
(2030987642, 'Masbul Haider', 1727484751, 'haider.masbul@northsouth.edu'),
(2030988642, 'Ovi Alam', 1746917834, 'alam.ovi@northsouth.edu'),
(2031989642, 'Azam Shah', 1888757177, 'shah.azam@northsouth.edu'),
(2112988642, 'Iftekhar Rashid', 1810228457, 'rashid.iftekhar@northsouth.edu'),
(2123988642, 'Asif Kamal', 1745404803, 'kamal.asif@northsouth.edu'),
(2134988642, 'Tahamina Sultana', 1709811441, 'tahamina.sultana@northsouth.edu'),
(2219088642, 'Niamul Saad', 1803070625, 'saad.niamul@northsouth.edu'),
(2226988642, ' Tanzim Raftaar', 1775810992, 'raftaar.tanzim@northsouth.edu'),
(2237988642, 'OisheeIslam', 1765058706, 'islam.oishee@northsouth.edu'),
(2312288642, 'Tahsina Ferdous', 1840623675, 'ferdous.tahsina@northsouth.edu'),
(2312988642, 'Siham Shahriar', 1884737411, 'shahriar.siham@northsouth.edu'),
(2318988642, 'Mahdi Shovon', 1844204438, 'shovon.mahdi@northsouth.edu');

-- --------------------------------------------------------

--
-- Table structure for table `student_id`
--

CREATE TABLE `student_id` (
  `code` varchar(8) NOT NULL,
  `section` int(3) DEFAULT NULL,
  `semester` varchar(11) NOT NULL,
  `sl` int(100) NOT NULL,
  `st_id` int(10) NOT NULL,
  `st_name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_id`
--

INSERT INTO `student_id` (`code`, `section`, `semester`, `sl`, `st_id`, `st_name`, `email`) VALUES
('CSE115 ', 1, 'Spring 2023', 1, 1010318042, 'Zidney Rahman  ', 'rahman.zidneyr@northsouth.edu'),
('CSE115 ', 1, 'Spring 2023', 2, 1010319042, 'Zillur Rahman  ', 'rahman.zillur@northsouth.edu'),
('CSE115 ', 1, 'Spring 2023', 3, 1220218642, 'Mohammad Shohan Hossain  ', 'shohan.hossain@northsouth.edu'),
('CSE115 ', 2, 'Spring 2023', 1, 1220228642, 'Mohammad Aslam Hossain  ', 'aslam.hossain@northsouth.edu'),
('CSE115 ', 1, 'Spring 2023', 4, 1420116042, 'Sharmina Islam Surmi  ', 'sharmina.surmi@northsouth.edu'),
('CSE115 ', 2, 'Spring 2023', 2, 1420126042, 'Shila Islam Sumi  ', 'shila.sumi@northsouth.edu'),
('CSE115 ', 1, 'Spring 2023', 5, 1430759042, 'Arnab Rezvi  ', 'arnab.rezvi@northsouth.edu'),
('CSE115 ', 2, 'Spring 2023', 3, 1430769042, 'Asif Mohammad Rijvee ', 'asif.rijvee@northsouth.edu'),
('CSE115 ', 1, 'Spring 2023', 6, 1510656042, 'Sharif Ahamed  ', 'sharif.ahmed@northsouth.edu'),
('CSE115 ', 1, 'Spring 2023', 7, 1510688042, 'Ishrat Jahan Diya  ', 'ishrat.jahandiya@northsouth.edu'),
('CSE115 ', 1, 'Spring 2023', 8, 1510712042, 'Labib Md. Rashid  ', 'labib.rashid@northsouth.edu'),
('CSE115 ', 1, 'Spring 2023', 9, 1510720042, 'Hasib Al Muhaimin  ', 'hasib.muhaimin@northsouth.edu'),
('CSE115 ', 2, 'Spring 2023', 4, 1510730042, 'Hasibul Muhaimin  ', 'hasibul.muhaimin@northsouth.edu'),
('CSE115 ', 2, 'Spring 2023', 5, 1510756042, 'Saif Ahmed  ', 'saif.ahmed@northsouth.edu'),
('CSE115 ', 1, 'Spring 2023', 10, 1510903042, 'Safin Mahmud  ', 'safin.mahmud@northsouth.edu'),
('CSE115 ', 2, 'Spring 2023', 6, 1510913042, 'Sifa Mahmud  ', 'sifa.mahmud@northsouth.edu'),
('CSE115 ', 1, 'Spring 2023', 11, 1510963042, 'Muhammad Abeer Tahmeed  ', '1510963042@northsouth.edu'),
('CSE115 ', 2, 'Spring 2023', 7, 1510973042, 'Muhammad Abrar  ', 'abrar.muhammad@northsouth.edu'),
('CSE115 ', 2, 'Spring 2023', 8, 1511075042, ' Kazi Fahim ', 'fahim.kazi@northsouth.edu'),
('CSE115 ', 1, 'Spring 2023', 12, 1511085042, 'Sk. Fahim Mushfiq  ', 'fahim.mushfiq@northsouth.edu'),
('CSE115 ', 1, 'Spring 2023', 13, 1511317042, 'Resalat Amin  ', 'resalat.amin@northsouth.edu'),
('CSE115 ', 2, 'Spring 2023', 9, 1511327042, 'Ruhul Amin  ', 'ruhul.amin@northsouth.edu'),
('CSE115 ', 2, 'Spring 2023', 10, 1511353042, 'Mobin Islam  ', 'mobin.islam@northsouth.edu'),
('CSE115 ', 1, 'Spring 2023', 14, 1511383042, 'Md. Monzurul Islam  ', 'monzurul.islam@northsouth.edu'),
('CSE115 ', 1, 'Spring 2023', 15, 1511410042, 'Md. Nazmul Islam  ', 'md.nazmul@northsouth.edu'),
('CSE115 ', 2, 'Spring 2023', 11, 1511420042, ' Nazma Islam  ', 'nazma.islaml@northsouth.edu'),
('CSE115 ', 1, 'Spring 2023', 16, 1511602042, 'Fariha Islam  ', 'fariha.islam15@northsouth.edu'),
('CSE115 ', 2, 'Spring 2023', 12, 1511612042, 'Fariha Diba  ', 'fariha.diba@northsouth.edu'),
('CSE115 ', 1, 'Spring 2023', 17, 1511704042, 'Md. Rifatul Islam Rifat  ', 'rifatulislam.rifat@northsouth.edu'),
('CSE115 ', 2, 'Spring 2023', 13, 1511804042, 'Rifa Islam ', 'rifa.islam@northsouth.edu'),
('CSE115 ', 1, 'Spring 2023', 18, 1511885042, 'Jabid Hasan Pappu  ', 'jabid.pappu@northsouth.edu'),
('CSE115 ', 2, 'Spring 2023', 14, 1511895042, 'Kowser Pappu  ', 'kowser.pappu@northsouth.edu'),
('CSE115 ', 1, 'Spring 2023', 19, 1511912042, 'Sadvan Sarwar  Sopon', 'sadvan.sarwar@northsouth.edu'),
('CSE115 ', 2, 'Spring 2023', 15, 1511932042, 'Sadman Sarwar  ', 'sadman.sarwar@northsouth.edu'),
('CSE115 ', 1, 'Spring 2023', 20, 1511944042, 'Md. Mahmudul Haque  ', '1511944642@northsouth.edu'),
('CSE115 ', 1, 'Spring 2023', 21, 1512080042, 'Hamdan Kaiser  ', 'hamdan.kaiser@northsouth.edu'),
('CSE115 ', 2, 'Spring 2023', 16, 1512090042, 'Karima Kaiser  ', 'karima.kaiser@northsouth.edu'),
('CSE115 ', 1, 'Spring 2023', 22, 1513216042, 'Fairooz Alam  ', 'fairooz.alam@northsouth.edu'),
('CSE115 ', 1, 'Spring 2023', 23, 1513253042, 'Sayef Sarkar Eashan  ', 'sayef.eashan@northsouth.edu'),
('CSE115 ', 2, 'Spring 2023', 17, 1513276042, 'Faria Alam', 'faria.alam@northsouth.edu'),
('CSE115 ', 2, 'Spring 2023', 18, 1513283042, 'Syed  Eashan  ', 'syed.eashan@northsouth.edu'),
('CSE115 ', 1, 'Spring 2023', 24, 1520054042, 'Maruf Ahmed  ', 'maruf.ahmed@northsouth.edu'),
('CSE115 ', 2, 'Spring 2023', 19, 1520064042, 'Marufur Rashid', 'marufur.rashid@northsouth.edu'),
('CSE115 ', 1, 'Spring 2023', 25, 1520265042, 'Samira Mahmood  ', 'samira.mahmood@northsouth.edu'),
('CSE115 ', 2, 'Spring 2023', 20, 1520285042, 'Sumi Mahmood  ', 'sumi.mahmood@northsouth.edu'),
('CSE115 ', 1, 'Spring 2023', 26, 1520725042, 'Farhan Yen  ', 'farhan.yen@northsouth.edu'),
('CSE115 ', 2, 'Spring 2023', 21, 1520735042, 'Farhan Morshed', 'farhan.morshed@northsouth.edu'),
('CSE115 ', 2, 'Spring 2023', 22, 2015987642, 'Humaira Jesmine', 'jesmine.humaira@northsouth.edu'),
('CSE115 ', 2, 'Spring 2023', 23, 2016987642, 'Md. Nurul Islam Sarker', 'sarker.nurul@northsouth.edu'),
('CSE115 ', 2, 'Spring 2023', 24, 2017987642, 'Rabeya Brgum', 'begum.rabeya@northsouth.edu'),
('CSE115 ', 2, 'Spring 2023', 25, 2018987642, 'Asif Muhammad Yousuf', 'yousuf.asif@northsouth.edu'),
('CSE115 ', 2, 'Spring 2023', 26, 2019987642, 'Tarana Binte Syed', 'tarana.binte@northsouth.edu'),
('CSE115 ', 2, 'Spring 2023', 27, 2021987642, 'Ashiq Khan', 'khan.ashiq@northsouth.edu'),
('CSE115 ', 2, 'Spring 2023', 28, 2022987642, 'Iftekhar Adnan', 'adnan.iftekhar@northsouth.edu'),
('CSE115 ', 2, 'Spring 2023', 29, 2023987642, 'Asif Miandad', 'miandad.asif@northsouth.edu'),
('CSE115 ', 2, 'Spring 2023', 30, 2024987642, 'Tahamina Nasrin', 'tahamina.nasrin@northsouth.edu'),
('CSE115 ', 2, 'Spring 2023', 31, 2025987642, 'Sadia Akbar', 'sadia.akabar@northsouth.edu'),
('CSE115 ', 2, 'Spring 2023', 32, 2026987642, 'Bushra Tanzim', 'bushra.tanzim@northsouth.edu'),
('CSE115 ', 2, 'Spring 2023', 33, 2027987642, 'Tasfia Islam', 'islam.tasfia@northsouth.edu'),
('CSE115 ', 2, 'Spring 2023', 34, 2028987642, 'Mahdi Ahmed', 'ahmed.mahdi@northsouth.edu'),
('CSE115 ', 1, 'Spring 2023', 27, 2147483647, 'Mahdi Shovon', 'shovon.mahdi@northsouth.edu'),
('CSE173 ', 4, 'Spring 2023', 1, 1520056042, 'Nabiha Rashid', 'nabiha.rashid@northsouth.edu'),
('CSE173 ', 4, 'Spring 2023', 2, 1520337042, 'Saifullah Kaiser  ', 'saifullah.kaiser@northsouth.edu'),
('CSE173 ', 4, 'Spring 2023', 3, 2015989642, 'Humaira Samita', 'samita.humaira@northsouth.edu'),
('CSE231 ', 1, 'Spring 2023', 1, 1520056042, 'Nabiha Rashid', 'nabiha.rashid@northsouth.edu'),
('CSE231 ', 1, 'Spring 2023', 2, 1520337042, 'Saifullah Kaiser  ', 'saifullah.kaiser@northsouth.edu'),
('CSE231 ', 1, 'Spring 2023', 3, 2015989642, 'Humaira Samita', 'samita.humaira@northsouth.edu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`name`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `admin_acess`
--
ALTER TABLE `admin_acess`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `assessment`
--
ALTER TABLE `assessment`
  ADD PRIMARY KEY (`st_id`,`section`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`section`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `co_aprove`
--
ALTER TABLE `co_aprove`
  ADD PRIMARY KEY (`section`);

--
-- Indexes for table `co_con`
--
ALTER TABLE `co_con`
  ADD PRIMARY KEY (`section`,`co`,`exam`);

--
-- Indexes for table `co_full_marks`
--
ALTER TABLE `co_full_marks`
  ADD PRIMARY KEY (`section`,`id`,`co`);

--
-- Indexes for table `co_id`
--
ALTER TABLE `co_id`
  ADD PRIMARY KEY (`code`,`title`);

--
-- Indexes for table `co_marks`
--
ALTER TABLE `co_marks`
  ADD PRIMARY KEY (`section`,`id`,`co`,`exam`);

--
-- Indexes for table `curve`
--
ALTER TABLE `curve`
  ADD PRIMARY KEY (`section`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dep`);

--
-- Indexes for table `exam_co`
--
ALTER TABLE `exam_co`
  ADD PRIMARY KEY (`section`,`exam`);

--
-- Indexes for table `exam_detail`
--
ALTER TABLE `exam_detail`
  ADD PRIMARY KEY (`section`,`exam`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`initial`),
  ADD UNIQUE KEY `phone_number` (`phone_number`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `full_marks`
--
ALTER TABLE `full_marks`
  ADD PRIMARY KEY (`section`,`id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`section`,`id`,`exam`);

--
-- Indexes for table `po`
--
ALTER TABLE `po`
  ADD PRIMARY KEY (`section`,`id`,`po`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`section`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`c_code`,`section`,`semester`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`season`,`year`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone_number` (`phone_number`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `student_id`
--
ALTER TABLE `student_id`
  ADD PRIMARY KEY (`code`,`semester`,`st_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
