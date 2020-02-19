-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2020 at 03:54 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `svjk`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `register_user` ()  BEGIN
    SELECT *  FROM tutors;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_or_insert` ()  begin
  IF EXISTS (select * from users where username = 'something') THEN
    update users set id= 'some' where username = 'something';
 ELSE 
insert into users (username) values ('something');
  END IF;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp1` (IN `name` VARCHAR(255))  BEGIN
	UPDATE Location SET Location = "smg1";
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `address_proofs`
--

CREATE TABLE `address_proofs` (
  `address_proof_id` int(11) NOT NULL,
  `address_proof_name` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address_proofs`
--

INSERT INTO `address_proofs` (`address_proof_id`, `address_proof_name`) VALUES
(1, 'Aadhar'),
(2, 'Voter ID');

-- --------------------------------------------------------

--
-- Table structure for table `area_list`
--

CREATE TABLE `area_list` (
  `area_id` int(11) NOT NULL,
  `area_name` varchar(300) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `blockdate`
--

CREATE TABLE `blockdate` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blockdate`
--

INSERT INTO `blockdate` (`ID`, `UserID`, `date`) VALUES
(7, 55, '2019-05-03'),
(8, 55, '2019-05-14'),
(9, 55, '2019-05-17'),
(10, 55, '2019-05-18'),
(11, 55, '2019-05-23'),
(12, 55, '2019-03-20'),
(13, 55, '2019-05-24'),
(14, 55, '2019-05-02'),
(15, 55, '2019-05-02'),
(16, 55, '2019-05-31'),
(17, 55, '2019-05-08'),
(18, 50, '2019-05-09'),
(19, 50, '2019-05-10'),
(20, 50, '2019-05-10'),
(21, 49, '2019-06-01'),
(22, 54, '2019-04-11'),
(23, 54, '2019-05-17'),
(24, 55, '2019-06-05'),
(25, 54, '2019-04-18'),
(26, 54, '2019-05-14'),
(27, 54, '2019-05-31'),
(28, 54, '2019-05-31'),
(29, 54, '2019-04-26'),
(30, 54, '2019-05-24'),
(31, 54, '2019-05-31'),
(32, 54, '2019-05-24'),
(33, 54, '2019-05-31'),
(34, 54, '2019-05-31'),
(35, 54, '2019-05-22'),
(36, 54, '2019-04-30'),
(37, 54, '2019-04-11'),
(38, 54, '2019-06-04'),
(39, 54, '2019-05-23'),
(40, 54, '2019-05-27'),
(41, 54, '2019-05-27'),
(42, 54, '2019-04-26'),
(43, 54, '2019-05-31'),
(44, 54, '2019-05-29'),
(45, 52, '2019-05-28'),
(46, 52, '2019-05-27'),
(47, 54, '2019-05-31'),
(48, 54, '2019-05-22'),
(49, 52, '2019-05-28'),
(50, 52, '2019-05-28'),
(51, 54, '2019-05-24'),
(52, 54, '2019-05-30'),
(53, 54, '2019-06-04'),
(54, 54, '2019-05-31'),
(55, 54, '2019-06-19'),
(56, 54, '2019-06-04'),
(57, 54, '2019-06-19'),
(58, 54, '2019-05-31'),
(59, 54, '2019-06-19'),
(60, 54, '2019-05-31'),
(61, 54, '2019-06-19'),
(62, 54, '2019-07-11'),
(63, 54, '2019-07-11'),
(64, 54, '2019-07-01');

-- --------------------------------------------------------

--
-- Table structure for table `boards`
--

CREATE TABLE `boards` (
  `id` int(11) NOT NULL,
  `board_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `boards`
--

INSERT INTO `boards` (`id`, `board_name`) VALUES
(1, 'CBSE'),
(2, 'ICSE'),
(3, 'IB/CGSE'),
(4, 'State'),
(5, 'CBSE'),
(6, 'ICSE'),
(7, 'IB/CGSE'),
(8, 'State');

-- --------------------------------------------------------

--
-- Table structure for table `boardstaught`
--

CREATE TABLE `boardstaught` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `Boards` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `boardstaught`
--

INSERT INTO `boardstaught` (`ID`, `UserID`, `Boards`) VALUES
(1, 55, 'IB/IGSE'),
(2, 55, 'CBSE'),
(3, 55, 'IB/IGSE'),
(4, 55, 'CBSE'),
(5, 55, 'IB/IGSE'),
(6, 55, 'CBSE'),
(7, 55, 'IB/IGSE'),
(8, 55, 'CBSE'),
(9, 55, 'IB/IGSE'),
(10, 55, 'CBSE'),
(11, 55, 'IB/IGSE'),
(12, 55, 'CBSE'),
(13, 55, 'IB/IGSE'),
(14, 55, 'CBSE'),
(15, 55, 'IB/IGSE'),
(16, 55, 'CBSE'),
(17, 55, 'IB/IGSE'),
(18, 55, 'State'),
(19, 55, 'IB/IGSE'),
(20, 55, 'State'),
(21, 55, 'IB/IGSE'),
(22, 55, 'CBSE');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `city_name` varchar(50) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city_name`, `state_id`) VALUES
(2, 'Belgaum', 1),
(1, 'Bengaluru', 1),
(3, 'Bijapur', 1),
(9, 'Chitoor', 4),
(4, 'Gulbarga', 1),
(6, 'Hyderabad', 4),
(7, 'Secundrabad', 4),
(5, 'Shimuga', 1),
(8, 'Vijaywada', 4);

-- --------------------------------------------------------

--
-- Table structure for table `city_list`
--

CREATE TABLE `city_list` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(250) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `class_name` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `class_name`) VALUES
(1, 'KG Class'),
(2, '1-4th Primary'),
(3, '5-7th Middle Class'),
(4, '8-10th High School'),
(5, '11-12th Pre-University College'),
(6, 'College (Degree)'),
(7, 'Post Graduate (PG)'),
(8, 'Entrance Exams (IIT/NEET etc)'),
(9, 'Programming Languages (C, C++, Java)'),
(10, 'Natural Languages (Kannada, Hind)');

-- --------------------------------------------------------

--
-- Table structure for table `classes2`
--

CREATE TABLE `classes2` (
  `ID` int(11) NOT NULL,
  `Subject` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `StudentID` int(11) DEFAULT NULL,
  `TimeSlot` int(11) DEFAULT NULL,
  `Duration` varchar(255) DEFAULT NULL,
  `ClassStartTime` datetime DEFAULT NULL,
  `ClassEndTime` datetime DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `Date` date NOT NULL,
  `Display` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes2`
--

INSERT INTO `classes2` (`ID`, `Subject`, `UserID`, `StudentID`, `TimeSlot`, `Duration`, `ClassStartTime`, `ClassEndTime`, `Status`, `Date`, `Display`) VALUES
(6, 2, 47, 1, 3, '3', '2019-03-25 17:55:21', '2019-03-25 17:58:26', 3, '2019-03-28', 1),
(7, 2, 47, 2, 3, '0', '2019-03-26 21:27:26', '2019-03-26 21:27:39', 5, '2019-03-30', 1),
(8, 2, 55, 3, 3, '16', '2019-04-26 22:12:27', '2019-04-28 01:16:44', 3, '2019-03-31', 0),
(9, 1, 49, 2, 2, '0', '2019-03-26 11:31:25', '2019-03-26 11:32:22', 3, '2019-04-11', 1),
(10, 2, 50, 2, 2, '2', '2019-03-26 12:40:03', '2019-03-26 12:42:22', 3, '2019-03-26', 1),
(11, 1, 45, 1, 1, '0', '2019-03-27 05:47:47', '2019-03-27 05:48:46', 3, '2019-03-26', 1),
(12, 3, 50, 1, 3, '11', '2019-04-29 15:14:13', '2019-04-29 15:25:55', 3, '2019-03-27', 1),
(13, 3, 45, 2, 2, '1', '2019-03-27 01:47:16', '2019-03-27 01:48:40', 3, '2019-03-28', 1),
(20, 1, 45, 1, 1, NULL, NULL, NULL, 5, '2019-03-28', 1),
(21, 1, 45, 1, 1, NULL, NULL, NULL, 5, '2019-04-04', 1),
(22, 1, 55, 1, 1, '0', '2019-04-26 22:32:02', '2019-04-26 22:32:08', 3, '2019-04-04', 0),
(23, 2, 55, 6, 1, '0', '2019-04-02 20:55:05', '2019-04-02 20:55:26', 3, '2019-04-20', 0),
(24, 2, 45, 6, 1, NULL, NULL, NULL, 5, '2019-04-28', 1),
(25, 1, 55, 6, 1, '0', '2019-04-26 22:14:15', '2019-04-26 22:14:22', 3, '2019-04-14', 0),
(26, 2, 54, 1, 1, '4', '2019-04-02 20:59:38', '2019-04-02 21:04:17', 3, '2019-04-21', 0),
(27, 1, 45, 1, 1, NULL, NULL, NULL, 5, '2019-04-13', 1),
(28, 1, 55, 1, 1, '0', '2019-04-16 12:58:19', '2019-04-16 12:58:25', 3, '2019-04-13', 0),
(29, 1, 55, 2, 1, '0', '2019-04-14 03:50:18', '2019-04-14 03:51:15', 3, '2019-04-30', 0),
(30, 2, 55, 1, 2, '1', '2019-04-19 00:32:36', '2019-04-19 00:34:00', 3, '2019-04-30', 0),
(31, 3, 55, 1, 7, '0', '2019-04-26 03:54:10', '2019-04-26 03:54:33', 3, '2019-05-01', 1),
(32, 2, 55, 3, 15, '0', '2019-04-26 03:57:05', '2019-04-26 03:57:11', 3, '2019-04-15', 0),
(33, 1, 55, 1, 12, '2', '2019-04-26 03:48:48', '2019-04-26 03:51:23', 3, '2019-04-15', 0),
(34, 1, 57, 1, 1, NULL, NULL, NULL, 5, '2019-04-30', 1),
(35, 1, 57, 1, 1, NULL, NULL, NULL, 5, '2019-04-30', 1),
(36, 1, 57, 1, 1, NULL, NULL, NULL, 5, '2019-04-30', 1),
(37, 1, 57, 1, 1, NULL, NULL, NULL, 5, '2019-04-30', 1),
(38, 1, 57, 2, 3, NULL, NULL, NULL, 5, '2019-04-10', 1),
(39, 1, 57, 2, 3, NULL, NULL, NULL, 5, '2019-04-10', 1),
(40, 1, 47, 1, 1, NULL, NULL, NULL, 5, '2019-04-30', 1),
(41, 1, 47, 1, 1, NULL, NULL, NULL, 5, '2019-04-30', 1),
(42, 2, 55, 1, 1, '0', '2019-04-26 22:05:24', '2019-04-26 22:05:25', 3, '2019-04-01', 0),
(43, 1, 47, 1, 1, NULL, NULL, NULL, 5, '2019-04-28', 1),
(44, 1, 54, 1, 1, '8', '2019-05-13 13:20:46', '2019-05-13 13:29:40', 3, '2019-04-14', 0),
(45, 1, 54, 1, 1, '11', '2019-06-03 14:30:14', '2019-06-03 14:41:26', 3, '2019-04-14', 1),
(46, 1, 54, 1, 1, '2', '2019-05-08 19:29:49', '2019-05-08 19:32:13', 3, '2019-04-14', 0),
(47, 1, 54, 1, 1, '0', '2019-05-13 14:34:16', '2019-05-13 14:34:22', 3, '2019-04-14', 0),
(48, 1, 54, 1, 1, '0', '2019-06-04 14:50:04', '2019-06-04 14:50:44', 3, '2019-04-21', 1),
(49, 1, 55, 1, 1, '0', '2019-04-27 10:53:21', '2019-04-27 10:53:29', 3, '2019-05-02', 1),
(50, 1, 57, 1, 1, NULL, NULL, NULL, 5, '2019-04-21', 1),
(51, 1, 55, 1, 1, '0', '2019-05-01 03:06:50', '2019-05-01 03:07:21', 3, '2019-04-30', 0),
(52, 1, 55, 1, 1, '37', '2019-05-01 02:06:12', '2019-05-01 02:44:08', 3, '2019-04-30', 1),
(53, 1, 55, 1, 1, '1', '2019-05-01 03:18:22', '2019-05-01 03:19:40', 3, '2019-04-30', 1),
(54, 1, 59, 1, 1, '0', '2019-04-29 14:39:34', '2019-04-29 14:39:41', 3, '2019-04-28', 1),
(55, 1, 59, 1, 1, '0', '2019-04-29 14:36:51', '2019-04-29 14:36:58', 3, '2019-04-28', 1),
(56, 1, 50, 5, 13, '21', '2019-04-29 14:51:36', '2019-04-29 15:12:50', 3, '2019-04-29', 1),
(57, 1, 54, 1, 1, '0', '2019-06-06 11:19:33', '2019-06-06 11:20:02', 3, '2019-04-30', 1),
(58, 1, 50, 1, 1, NULL, '2019-04-29 15:27:03', NULL, 3, '2019-05-02', 1),
(59, 1, 55, 1, 1, '0', '2019-05-01 03:11:49', '2019-05-01 03:12:19', 3, '2019-05-25', 1),
(60, 1, 55, 1, 1, '0', '2019-05-01 03:14:37', '2019-05-01 03:14:50', 3, '2019-05-12', 1),
(61, 1, 55, 4, 1, '0', '2019-05-01 03:29:46', '2019-05-01 03:30:04', 3, '2019-05-30', 1),
(62, 1, 55, 4, 1, '11', '2019-05-03 10:38:52', '2019-05-03 10:49:54', 3, '2019-05-30', 1),
(63, 1, 55, 1, 1, '0', '2019-05-01 03:25:43', '2019-05-01 03:26:05', 3, '2019-05-19', 1),
(64, 1, 54, 1, 10, '2', '2019-05-20 11:20:04', '2019-05-20 11:22:47', 3, '2019-05-02', 1),
(65, 1, 54, 5, 11, '0', '2019-06-06 13:13:44', '2019-06-06 13:14:02', 3, '2019-05-02', 1),
(66, 2, 54, 1, 1, '0', '2019-05-08 19:33:39', '2019-05-08 19:34:28', 3, '2019-06-01', 0),
(67, 1, 50, 1, 13, '1', '2019-05-02 16:13:54', '2019-05-02 16:14:54', 3, '2019-05-02', 1),
(68, 1, 50, 1, 1, '0', '2019-05-02 16:17:13', '2019-05-02 16:17:13', 3, '2019-05-02', 1),
(69, 1, 50, 1, 14, '4', '2019-05-02 16:19:37', '2019-05-02 16:24:18', 3, '2019-05-02', 1),
(70, 2, 50, 4, 13, '25', '2019-05-07 13:52:56', '2019-05-07 14:18:10', 3, '2019-05-02', 1),
(71, 3, 60, 6, 14, '0', '2019-05-02 16:34:06', '2019-05-02 16:34:50', 3, '2019-05-02', 1),
(72, 1, 60, 6, 13, NULL, NULL, NULL, 1, '2019-05-02', 1),
(73, 1, 54, 1, 13, '0', '2019-06-06 20:07:15', '2019-06-06 20:08:06', 3, '2019-05-07', 1),
(74, 4, 50, 6, 15, '1', '2019-05-07 18:27:16', '2019-05-07 18:29:11', 3, '2019-05-07', 1),
(75, 2, 57, 1, 14, NULL, NULL, NULL, 5, '2019-05-07', 1),
(76, 1, 54, 4, 14, '3', '2019-06-06 20:28:03', '2019-06-06 20:31:37', 3, '2019-05-07', 0),
(77, 1, 54, 1, 14, '1', '2019-05-08 19:42:19', '2019-05-08 19:43:59', 3, '2019-05-07', 0),
(78, 1, 50, 1, 13, '18', '2019-05-08 17:29:46', '2019-05-08 17:48:38', 3, '2019-05-08', 1),
(79, 3, 50, 6, 15, NULL, NULL, NULL, 5, '2019-05-08', 1),
(80, 1, 55, 1, 1, '4', '2019-05-11 13:45:09', '2019-05-11 13:49:09', 3, '2019-06-30', 1),
(81, 1, 55, 6, 1, '0', '2019-05-11 13:49:40', '2019-05-11 13:49:58', 3, '2019-07-31', 1),
(82, 1, 55, 1, 1, '2', '2019-05-11 13:51:34', '2019-05-11 13:53:50', 3, '2019-07-18', 1),
(83, 1, 49, 1, 1, '2', '2019-05-11 23:44:09', '2019-05-11 23:46:53', 3, '2019-05-11', 1),
(84, 1, 49, 7, 1, '0', '2019-05-11 23:49:49', '2019-05-11 23:50:08', 3, '2019-05-19', 1),
(85, 1, 55, 7, 1, '1', '2019-05-12 01:56:42', '2019-05-12 01:58:24', 3, '2019-05-12', 1),
(86, 1, 55, 5, 9, '9', '2019-05-12 02:00:12', '2019-05-12 02:09:27', 3, '2019-05-12', 1),
(87, 1, 55, 7, 1, '5', '2019-05-13 04:50:44', '2019-05-13 04:56:34', 3, '2019-06-19', 1),
(88, 3, 55, 5, 1, '25', '2019-05-13 04:58:21', '2019-05-13 05:23:34', 3, '2019-05-13', 1),
(89, 1, 55, 1, 1, '0', '2019-05-13 16:03:23', '2019-05-13 16:03:26', 3, '2019-07-18', 1),
(90, 1, 55, 1, 1, '0', '2019-05-13 16:05:11', '2019-05-13 16:05:13', 3, '2019-05-13', 1),
(91, 1, 55, 1, 1, '0', '2019-05-13 21:59:08', '2019-05-13 21:59:10', 3, '2019-05-13', 1),
(92, 1, 55, 1, 8, '0', '2019-05-20 10:01:54', '2019-05-20 10:02:24', 3, '2019-07-15', 1),
(93, 2, 55, 3, 12, '5', '2019-05-21 02:55:30', '2019-05-21 03:01:09', 3, '2019-05-10', 0),
(94, 1, 55, 8, 1, '0', '2019-05-24 17:26:56', '2019-05-24 17:26:59', 3, '2019-05-25', 0),
(95, 1, 55, 8, 9, NULL, NULL, NULL, 5, '2019-05-25', 1),
(96, 4, 54, 1, 13, NULL, NULL, NULL, 4, '2019-05-30', 1),
(97, 4, 54, 1, 13, '0', '2019-05-30 14:47:30', '2019-05-30 14:47:41', 3, '2019-05-30', 1),
(98, 1, 54, 6, 13, '1', '2019-06-06 20:15:48', '2019-06-06 20:17:09', 3, '2019-05-15', 1),
(99, 4, 47, 1, 1, NULL, NULL, NULL, 5, '2019-05-17', 1),
(100, 4, 47, 1, 14, NULL, NULL, NULL, 5, '2019-05-04', 1),
(101, 1, 52, 1, 1, NULL, NULL, NULL, 5, '2019-05-03', 1),
(102, 1, 55, 1, 14, NULL, NULL, NULL, 5, '2019-06-19', 1),
(103, 4, 49, 3, 12, NULL, NULL, NULL, 5, '2019-06-14', 1),
(104, 1, 55, 1, 1, NULL, NULL, NULL, 5, '2019-06-14', 1),
(105, 5, 49, 6, 10, NULL, NULL, NULL, 5, '2019-06-20', 1),
(106, 1, 55, 1, 1, NULL, NULL, NULL, 5, '2019-06-28', 1),
(107, 1, 54, 1, 13, '7', '2019-06-06 20:33:24', '2019-06-06 20:40:26', 3, '2019-06-06', 1),
(108, 3, 60, 4, 9, NULL, NULL, NULL, 5, '2019-06-07', 1),
(109, 1, 54, 1, 14, '4', '2019-06-06 21:45:18', '2019-06-06 21:49:19', 3, '2019-06-06', 1),
(110, 2, 54, 7, 13, NULL, NULL, NULL, 5, '2019-06-06', 1),
(111, 1, 54, 3, 1, '6', '2019-06-06 21:51:25', '2019-06-06 21:57:48', 3, '2019-06-06', 1),
(112, 5, 54, 6, 1, '14', '2019-06-06 22:03:44', '2019-06-06 22:18:26', 3, '2019-06-06', 1),
(113, 10, 54, 6, 15, '0', '2019-06-07 17:54:35', '2019-06-07 17:55:03', 3, '2019-06-07', 1),
(114, 1, 54, 6, 12, '23', '2019-06-08 12:49:20', '2019-06-08 13:13:13', 3, '2019-06-08', 1),
(115, 1, 54, 6, 1, '4', '2019-06-08 14:01:44', '2019-06-08 14:05:49', 3, '2019-06-08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `classestaught`
--

CREATE TABLE `classestaught` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `ClassNames` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classestaught`
--

INSERT INTO `classestaught` (`ID`, `UserID`, `ClassNames`) VALUES
(3, 55, 'Class VI to VIII'),
(4, 55, 'Class I to V'),
(5, 55, 'Class VI to VIII'),
(6, 55, 'Class I to V'),
(7, 55, 'Class VI to VIII'),
(8, 55, 'Class I to V'),
(9, 55, 'Class VI to VIII'),
(10, 55, 'Class I to V'),
(11, 55, 'Class VI to VIII'),
(12, 55, 'Class I to V'),
(13, 55, 'Class VI to VIII'),
(14, 55, 'Class I to V'),
(15, 55, 'Class IX to X'),
(16, 55, 'Class XI to XII'),
(17, 55, 'Class IX to X'),
(18, 55, 'Class XI to XII'),
(19, 55, 'Class VI to VIII'),
(20, 55, 'Class I to V');

-- --------------------------------------------------------

--
-- Table structure for table `classstatus`
--

CREATE TABLE `classstatus` (
  `ID` int(11) NOT NULL,
  `Status` varchar(255) DEFAULT NULL,
  `D_Description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classstatus`
--

INSERT INTO `classstatus` (`ID`, `Status`, `D_Description`) VALUES
(1, 'Approved', 'When parent OTP is done'),
(2, 'Started', 'Class Started'),
(3, 'Ended', 'Class ended'),
(4, 'Publish_Started', 'Go Live'),
(5, 'Alloted', 'Class is alloted to the tutor'),
(6, 'Block_Day', 'Tutor has blocked the day');

-- --------------------------------------------------------

--
-- Table structure for table `classsubjectstaught`
--

CREATE TABLE `classsubjectstaught` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `ClassNames` varchar(255) DEFAULT NULL,
  `Subjects` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classsubjectstaught`
--

INSERT INTO `classsubjectstaught` (`ID`, `UserID`, `ClassNames`, `Subjects`) VALUES
(27, 55, 'Class I to V', 'Hindi'),
(28, 55, 'Class I to V', 'EVS/Social Studies'),
(29, 55, 'Class VI to VIII', 'Science'),
(30, 55, 'Class VI to VIII', 'Social Studies'),
(31, 55, 'Class IX to X', 'Science'),
(32, 55, 'Class IX to X', 'Social Studies'),
(33, 55, 'Class XI to XII', 'Business Studies'),
(34, 55, 'Class XI to XII', 'Computer Science'),
(35, 55, 'Class I to V', 'Hindi'),
(36, 55, 'Class I to V', 'EVS/Social Studies'),
(37, 55, 'Class VI to VIII', 'Science'),
(38, 55, 'Class VI to VIII', 'Social Studies'),
(39, 55, 'Class IX to X', 'Science'),
(40, 55, 'Class IX to X', 'Social Studies'),
(41, 55, 'Class XI to XII', 'Business Studies'),
(42, 55, 'Class XI to XII', 'Computer Science'),
(43, 55, 'Class I to V', 'All subjects'),
(44, 55, 'Class VI to VIII', 'Science'),
(45, 55, 'Class VI to VIII', 'English'),
(46, 55, 'Class IX to X', 'English'),
(47, 55, 'Class IX to X', 'Mathematics'),
(48, 55, 'Class XI to XII', 'Physics'),
(49, 55, 'Class XI to XII', 'English');

-- --------------------------------------------------------

--
-- Table structure for table `classtimeslots`
--

CREATE TABLE `classtimeslots` (
  `ID` int(11) NOT NULL,
  `StartTime` varchar(255) DEFAULT NULL,
  `EndTime` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classtimeslots`
--

INSERT INTO `classtimeslots` (`ID`, `StartTime`, `EndTime`) VALUES
(1, '6am', '7am'),
(2, '7am', '8am'),
(3, '8am', '9am'),
(4, '9am', '10am'),
(5, '10am', '11am'),
(6, '11am', '12pm'),
(7, '12pm', '1pm'),
(8, '1pm', '2pm'),
(9, '2pm', '3pm'),
(10, '3pm', '4pm'),
(11, '4pm', '5pm'),
(12, '5pm', '6pm'),
(13, '6pm', '7pm'),
(14, '7pm', '8pm'),
(15, '8pm', '9pm');

-- --------------------------------------------------------

--
-- Table structure for table `classvideos`
--

CREATE TABLE `classvideos` (
  `ID` int(11) NOT NULL,
  `ClassID` int(11) DEFAULT NULL,
  `StreamUrl` varchar(255) DEFAULT NULL,
  `VideoUrl` varchar(255) DEFAULT NULL,
  `VideoID` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classvideos`
--

INSERT INTO `classvideos` (`ID`, `ClassID`, `StreamUrl`, `VideoUrl`, `VideoID`) VALUES
(32, 7, 'http://139.59.86.32:8080/live/o27LtUt.m3u8', 'http://139.59.86.32:8080/recorded/o27LtUt.mp4', 'o27LtUt'),
(33, 12, 'http://139.59.86.32:8080/live/pn3aXFR.m3u8', 'http://139.59.86.32:8080/recorded/pn3aXFR.mp4', 'pn3aXFR'),
(34, 9, 'http://139.59.86.32:8080/live/kJL0HtD.m3u8', 'http://139.59.86.32:8080/recorded/kJL0HtD.mp4', 'kJL0HtD'),
(35, 10, 'http://139.59.86.32:8080/live/zVLNbH2.m3u8', 'http://139.59.86.32:8080/recorded/zVLNbH2.mp4', 'zVLNbH2'),
(36, 13, 'http://139.59.86.32:8080/live/TBkYIMJ.m3u8', 'http://139.59.86.32:8080/recorded/TBkYIMJ.mp4', 'TBkYIMJ'),
(37, 6, 'http://139.59.86.32:8080/live/BBKwmy8.m3u8', 'http://139.59.86.32:8080/recorded/BBKwmy8.mp4', 'BBKwmy8'),
(38, 8, 'http://139.59.86.32:8080/live/PP1c9Ga.m3u8', 'http://139.59.86.32:8080/recorded/PP1c9Ga.mp4', 'PP1c9Ga'),
(39, 8, 'http://139.59.86.32:8080/live/rsHDK5M.m3u8', 'http://139.59.86.32:8080/recorded/rsHDK5M.mp4', 'rsHDK5M'),
(40, 11, 'http://139.59.86.32:8080/live/wsYNBVU.m3u8', 'http://139.59.86.32:8080/recorded/wsYNBVU.mp4', 'wsYNBVU'),
(41, 22, 'http://139.59.86.32:8080/live/UndKQQX.m3u8', 'http://139.59.86.32:8080/recorded/UndKQQX.mp4', 'UndKQQX'),
(42, 23, 'http://139.59.86.32:8080/live/TuOfIUF.m3u8', 'http://139.59.86.32:8080/recorded/TuOfIUF.mp4', 'TuOfIUF'),
(43, 25, 'http://139.59.86.32:8080/live/ERZtMFs.m3u8', 'http://139.59.86.32:8080/recorded/ERZtMFs.mp4', 'ERZtMFs'),
(44, 26, 'http://139.59.86.32:8080/live/OxFpD1B.m3u8', 'http://139.59.86.32:8080/recorded/OxFpD1B.mp4', 'OxFpD1B'),
(45, 29, 'http://139.59.86.32:8080/live/gMQyicx.m3u8', 'http://139.59.86.32:8080/recorded/gMQyicx.mp4', 'gMQyicx'),
(46, 28, 'http://139.59.86.32:8080/live/rY2sJFS.m3u8', 'http://139.59.86.32:8080/recorded/rY2sJFS.mp4', 'rY2sJFS'),
(47, 30, 'http://139.59.86.32:8080/live/lxLdVYt.m3u8', 'http://139.59.86.32:8080/recorded/lxLdVYt.mp4', 'lxLdVYt'),
(48, 33, 'http://139.59.86.32:8080/live/vfdQWOx.m3u8', 'http://139.59.86.32:8080/recorded/vfdQWOx.mp4', 'vfdQWOx'),
(49, 31, 'http://139.59.86.32:8080/live/oGJCLYF.m3u8', 'http://139.59.86.32:8080/recorded/oGJCLYF.mp4', 'oGJCLYF'),
(50, 32, 'http://139.59.86.32:8080/live/qPQ1wSX.m3u8', 'http://139.59.86.32:8080/recorded/qPQ1wSX.mp4', 'qPQ1wSX'),
(51, 42, 'http://139.59.86.32:8080/live/KbE4rXq.m3u8', 'http://139.59.86.32:8080/recorded/KbE4rXq.mp4', 'KbE4rXq'),
(52, 8, 'http://139.59.86.32:8080/live/vm0LweF.m3u8', 'http://139.59.86.32:8080/recorded/vm0LweF.mp4', 'vm0LweF'),
(53, 8, 'http://139.59.86.32:8080/live/Ad5Y4Do.m3u8', 'http://139.59.86.32:8080/recorded/Ad5Y4Do.mp4', 'Ad5Y4Do'),
(54, 25, 'http://139.59.86.32:8080/live/XguEXSp.m3u8', 'http://139.59.86.32:8080/recorded/XguEXSp.mp4', 'XguEXSp'),
(55, 22, 'http://139.59.86.32:8080/live/kDDI069.m3u8', 'http://139.59.86.32:8080/recorded/kDDI069.mp4', 'kDDI069'),
(56, 49, 'http://139.59.86.32:8080/live/2aiaGbI.m3u8', 'http://139.59.86.32:8080/recorded/2aiaGbI.mp4', '2aiaGbI'),
(57, 55, 'http://139.59.86.32:8080/live/SAMKVf1.m3u8', 'http://139.59.86.32:8080/recorded/SAMKVf1.mp4', 'SAMKVf1'),
(58, 54, 'http://139.59.86.32:8080/live/V2PaiVG.m3u8', 'http://139.59.86.32:8080/recorded/V2PaiVG.mp4', 'V2PaiVG'),
(59, 56, 'http://139.59.86.32:8080/live/JoxkxfO.m3u8', 'http://139.59.86.32:8080/recorded/JoxkxfO.mp4', 'JoxkxfO'),
(60, 12, 'http://139.59.86.32:8080/live/vzZCCCW.m3u8', 'http://139.59.86.32:8080/recorded/vzZCCCW.mp4', 'vzZCCCW'),
(61, 58, 'http://139.59.86.32:8080/live/PHP58uc.m3u8', 'http://139.59.86.32:8080/recorded/PHP58uc.mp4', 'PHP58uc'),
(62, 53, 'http://139.59.86.32:8080/live/3LgngS3.m3u8', 'http://139.59.86.32:8080/recorded/3LgngS3.mp4', '3LgngS3'),
(63, 52, 'http://139.59.86.32:8080/live/ksaVP1Y.m3u8', 'http://139.59.86.32:8080/recorded/ksaVP1Y.mp4', 'ksaVP1Y'),
(64, 51, 'http://139.59.86.32:8080/live/qPCSQVB.m3u8', 'http://139.59.86.32:8080/recorded/qPCSQVB.mp4', 'qPCSQVB'),
(65, 59, 'http://139.59.86.32:8080/live/klhrkwe.m3u8', 'http://139.59.86.32:8080/recorded/klhrkwe.mp4', 'klhrkwe'),
(66, 60, 'http://139.59.86.32:8080/live/QrNZySJ.m3u8', 'http://139.59.86.32:8080/recorded/QrNZySJ.mp4', 'QrNZySJ'),
(67, 53, 'http://139.59.86.32:8080/live/5HaCiWI.m3u8', 'http://139.59.86.32:8080/recorded/5HaCiWI.mp4', '5HaCiWI'),
(68, 63, 'http://139.59.86.32:8080/live/vsRl5Dg.m3u8', 'http://139.59.86.32:8080/recorded/vsRl5Dg.mp4', 'vsRl5Dg'),
(69, 61, 'http://139.59.86.32:8080/live/LDTFdC2.m3u8', 'http://139.59.86.32:8080/recorded/LDTFdC2.mp4', 'LDTFdC2'),
(70, 67, 'http://139.59.86.32:8080/live/2K8cdsd.m3u8', 'http://139.59.86.32:8080/recorded/2K8cdsd.mp4', '2K8cdsd'),
(71, 68, 'http://139.59.86.32:8080/live/LEXxFQi.m3u8', 'http://139.59.86.32:8080/recorded/LEXxFQi.mp4', 'LEXxFQi'),
(72, 69, 'http://139.59.86.32:8080/live/z79ojRG.m3u8', 'http://139.59.86.32:8080/recorded/z79ojRG.mp4', 'z79ojRG'),
(73, 71, 'http://139.59.86.32:8080/live/UGfccic.m3u8', 'http://139.59.86.32:8080/recorded/UGfccic.mp4', 'UGfccic'),
(74, 62, 'http://139.59.86.32:8080/live/wd5Yl0u.m3u8', 'http://139.59.86.32:8080/recorded/wd5Yl0u.mp4', 'wd5Yl0u'),
(75, 70, 'http://139.59.86.32:8080/live/EtjrsVZ.m3u8', 'http://139.59.86.32:8080/recorded/EtjrsVZ.mp4', 'EtjrsVZ'),
(76, 74, 'http://139.59.86.32:8080/live/pc1BPqx.m3u8', 'http://139.59.86.32:8080/recorded/pc1BPqx.mp4', 'pc1BPqx'),
(77, 78, 'http://139.59.86.32:8080/live/pCtbMAQ.m3u8', 'http://139.59.86.32:8080/recorded/pCtbMAQ.mp4', 'pCtbMAQ'),
(78, 46, 'http://139.59.86.32:8080/live/GSQzCZH.m3u8', 'http://139.59.86.32:8080/recorded/GSQzCZH.mp4', 'GSQzCZH'),
(79, 66, 'http://139.59.86.32:8080/live/740sd94.m3u8', 'http://139.59.86.32:8080/recorded/740sd94.mp4', '740sd94'),
(80, 77, 'http://139.59.86.32:8080/live/QyN2fu7.m3u8', 'http://139.59.86.32:8080/recorded/QyN2fu7.mp4', 'QyN2fu7'),
(81, 80, 'http://139.59.86.32:8080/live/JJ0FrAh.m3u8', 'http://139.59.86.32:8080/recorded/JJ0FrAh.mp4', 'JJ0FrAh'),
(82, 81, 'http://139.59.86.32:8080/live/X8oudUC.m3u8', 'http://139.59.86.32:8080/recorded/X8oudUC.mp4', 'X8oudUC'),
(83, 82, 'http://139.59.86.32:8080/live/l0ahyjL.m3u8', 'http://139.59.86.32:8080/recorded/l0ahyjL.mp4', 'l0ahyjL'),
(84, 83, 'http://139.59.86.32:8080/live/GttcP2k.m3u8', 'http://139.59.86.32:8080/recorded/GttcP2k.mp4', 'GttcP2k'),
(85, 84, 'http://139.59.86.32:8080/live/vw54GiC.m3u8', 'http://139.59.86.32:8080/recorded/vw54GiC.mp4', 'vw54GiC'),
(86, 85, 'http://139.59.86.32:8080/live/umJhpIE.m3u8', 'http://139.59.86.32:8080/recorded/umJhpIE.mp4', 'umJhpIE'),
(87, 86, 'http://139.59.86.32:8080/live/eNG0pUJ.m3u8', 'http://139.59.86.32:8080/recorded/eNG0pUJ.mp4', 'eNG0pUJ'),
(88, 87, 'http://139.59.86.32:8080/live/AbU8B48.m3u8', 'http://139.59.86.32:8080/recorded/AbU8B48.mp4', 'AbU8B48'),
(89, 88, 'http://139.59.86.32:8080/live/BQ2Q4WE.m3u8', 'http://139.59.86.32:8080/recorded/BQ2Q4WE.mp4', 'BQ2Q4WE'),
(90, 44, 'http://139.59.86.32:8080/live/FPBF3dC.m3u8', 'http://139.59.86.32:8080/recorded/FPBF3dC.mp4', 'FPBF3dC'),
(91, 47, 'http://139.59.86.32:8080/live/Sbpn9H3.m3u8', 'http://139.59.86.32:8080/recorded/Sbpn9H3.mp4', 'Sbpn9H3'),
(92, 76, 'http://139.59.86.32:8080/live/kFqNM1G.m3u8', 'http://139.59.86.32:8080/recorded/kFqNM1G.mp4', 'kFqNM1G'),
(93, 89, 'http://139.59.86.32:8080/live/56eOgW4.m3u8', 'http://139.59.86.32:8080/recorded/56eOgW4.mp4', '56eOgW4'),
(94, 90, 'http://139.59.86.32:8080/live/dMGkFlE.m3u8', 'http://139.59.86.32:8080/recorded/dMGkFlE.mp4', 'dMGkFlE'),
(95, 91, 'http://139.59.86.32:8080/live/R125n0e.m3u8', 'http://139.59.86.32:8080/recorded/R125n0e.mp4', 'R125n0e'),
(96, 92, 'http://139.59.86.32:8080/live/o5Ez46e.m3u8', 'http://139.59.86.32:8080/recorded/o5Ez46e.mp4', 'o5Ez46e'),
(97, 64, 'http://139.59.86.32:8080/live/S0bgVzo.m3u8', 'http://139.59.86.32:8080/recorded/S0bgVzo.mp4', 'S0bgVzo'),
(98, 93, 'http://139.59.86.32:8080/live/RY37dbv.m3u8', 'http://139.59.86.32:8080/recorded/RY37dbv.mp4', 'RY37dbv'),
(99, 94, 'http://139.59.86.32:8080/live/rLtwORl.m3u8', 'http://139.59.86.32:8080/recorded/rLtwORl.mp4', 'rLtwORl'),
(100, 97, 'http://139.59.86.32:8080/live/vZqod93.m3u8', 'http://139.59.86.32:8080/recorded/vZqod93.mp4', 'vZqod93'),
(101, 45, 'http://139.59.86.32:8080/live/LVoU1eT.m3u8', 'http://139.59.86.32:8080/recorded/LVoU1eT.mp4', 'LVoU1eT'),
(102, 48, 'http://139.59.86.32:8080/live/NcmghyO.m3u8', 'http://139.59.86.32:8080/recorded/NcmghyO.mp4', 'NcmghyO'),
(103, 57, 'http://139.59.86.32:8080/live/81z5cPk.m3u8', 'http://139.59.86.32:8080/recorded/81z5cPk.mp4', '81z5cPk'),
(104, 65, 'http://139.59.86.32:8080/live/OSLgMIE.m3u8', 'http://139.59.86.32:8080/recorded/OSLgMIE.mp4', 'OSLgMIE'),
(105, 73, 'http://139.59.86.32:8080/live/awAssaK.m3u8', 'http://139.59.86.32:8080/recorded/awAssaK.mp4', 'awAssaK'),
(106, 98, 'http://139.59.86.32:8080/live/8CF5VeK.m3u8', 'http://139.59.86.32:8080/recorded/8CF5VeK.mp4', '8CF5VeK'),
(107, 76, 'http://139.59.86.32:8080/live/mSkn1nR.m3u8', 'http://139.59.86.32:8080/recorded/mSkn1nR.mp4', 'mSkn1nR'),
(108, 107, 'http://139.59.86.32:8080/live/v4Y4Y8R.m3u8', 'http://139.59.86.32:8080/recorded/v4Y4Y8R.mp4', 'v4Y4Y8R'),
(109, 109, 'http://139.59.86.32:8080/live/Rh2hq3X.m3u8', 'http://139.59.86.32:8080/recorded/Rh2hq3X.mp4', 'Rh2hq3X'),
(110, 111, 'http://139.59.86.32:8080/live/MoTlVjY.m3u8', 'http://139.59.86.32:8080/recorded/MoTlVjY.mp4', 'MoTlVjY'),
(111, 112, 'http://139.59.86.32:8080/live/siv9PGc.m3u8', 'http://139.59.86.32:8080/recorded/siv9PGc.mp4', 'siv9PGc'),
(112, 113, 'http://139.59.86.32:8080/live/WSchi8m.m3u8', 'http://139.59.86.32:8080/recorded/WSchi8m.mp4', 'WSchi8m'),
(113, 114, 'http://139.59.86.32:8080/live/xYrg9bZ.m3u8', 'http://139.59.86.32:8080/recorded/xYrg9bZ.mp4', 'xYrg9bZ'),
(114, 115, 'http://139.59.86.32:8080/live/Zw3ozVc.m3u8', 'http://139.59.86.32:8080/recorded/Zw3ozVc.mp4', 'Zw3ozVc');

-- --------------------------------------------------------

--
-- Table structure for table `class_studying`
--

CREATE TABLE `class_studying` (
  `class_studying_id` int(11) NOT NULL,
  `class_studying_name` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_studying`
--

INSERT INTO `class_studying` (`class_studying_id`, `class_studying_name`) VALUES
(1, 'LKG'),
(2, 'UKG'),
(3, 'Class 1'),
(4, 'Class 2'),
(5, 'Class 3'),
(6, 'Class 4'),
(7, 'Class 5'),
(8, 'Class 7'),
(9, 'Class 8'),
(10, 'Class 9'),
(11, 'Class 10'),
(12, 'Class 11'),
(13, 'Class 12'),
(14, 'Degree/Graduation'),
(15, 'Post Graduation'),
(16, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_name`) VALUES
(4, 'India'),
(6, 'UK'),
(5, 'US');

-- --------------------------------------------------------

--
-- Table structure for table `country_list`
--

CREATE TABLE `country_list` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(350) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `creditsperclass`
--

CREATE TABLE `creditsperclass` (
  `ID` int(11) NOT NULL,
  `Credits` float DEFAULT NULL,
  `ClassID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `creditsperclass`
--

INSERT INTO `creditsperclass` (`ID`, `Credits`, `ClassID`) VALUES
(33, 0, 22),
(34, 0, 22),
(35, 0, 49),
(36, 214.67, 8),
(37, 214.67, 8),
(38, 214.67, 8),
(39, 214.8, 8),
(40, 216.4, 8),
(41, 216.53, 8),
(42, NULL, 55),
(43, NULL, 54),
(44, 0, 56),
(45, 0, 12),
(46, 2.47, 52),
(47, 0, 51),
(48, 0, 59),
(49, 0, 60),
(50, 0.07, 53),
(51, 0, 63),
(52, 0, 61),
(53, 0, 67),
(54, 0, 68),
(55, 0, 69),
(56, NULL, 71),
(57, 0.73, 62),
(58, 0, 70),
(59, 0, 74),
(60, 0, 78),
(61, 0, 46),
(62, 0, 66),
(63, 0, 77),
(64, 0.27, 80),
(65, 0.27, 80),
(66, 0, 81),
(67, 0, 81),
(68, 0.13, 82),
(69, 0.13, 82),
(70, 0, 83),
(71, 0, 84),
(72, 0.07, 85),
(73, 0.6, 86),
(74, 0.33, 87),
(75, 1.67, 88),
(76, 0, 44),
(77, 0, 47),
(78, 0, 89),
(79, 0, 90),
(80, 0, 91),
(81, 0, 92),
(82, 0, 64),
(83, 0.33, 93),
(84, 0, 94),
(85, 0, 97),
(86, 0.73, 45),
(87, 0, 48),
(88, 0, 57),
(89, 0, 65),
(90, 0, 73),
(91, 0.07, 98),
(92, 0.2, 76),
(93, 0.47, 107),
(94, 0.27, 109),
(95, 0.4, 111),
(96, 0.93, 112),
(97, 0, 113),
(98, 1.53, 114),
(99, 0.27, 115);

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `experience_id` int(11) NOT NULL,
  `experience_name` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`experience_id`, `experience_name`) VALUES
(1, '0'),
(2, '1'),
(3, '2'),
(4, '3'),
(5, '4'),
(6, '5'),
(7, '6'),
(8, '7'),
(9, '8'),
(10, '9'),
(11, '10'),
(12, '11'),
(13, '12'),
(14, '13'),
(15, '14'),
(16, '15'),
(17, '16'),
(18, '17'),
(19, '18'),
(20, '19'),
(21, '20'),
(22, '21'),
(23, '22'),
(24, '23'),
(25, '24'),
(26, '25'),
(27, '26'),
(28, '27'),
(29, '28'),
(30, '29'),
(31, '30'),
(32, '31'),
(33, '32'),
(34, '33'),
(35, '34'),
(36, '35'),
(37, '36');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `gender_id` int(11) NOT NULL,
  `gender_name` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`gender_id`, `gender_name`) VALUES
(1, 'Male'),
(2, 'Female'),
(3, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `job_types`
--

CREATE TABLE `job_types` (
  `job_type_id` int(11) NOT NULL,
  `job_type_name` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_types`
--

INSERT INTO `job_types` (`job_type_id`, `job_type_name`) VALUES
(1, 'Full-Time'),
(2, 'Part-Time');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `languages_id` int(11) NOT NULL,
  `languages_name` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`languages_id`, `languages_name`) VALUES
(1, 'Kannada'),
(2, 'Hindi'),
(3, 'English'),
(4, 'Telugu'),
(5, 'Tamil'),
(6, 'Malayalam');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `ID` int(11) NOT NULL,
  `Longitude` varchar(255) DEFAULT NULL,
  `Latitude` varchar(255) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`ID`, `Longitude`, `Latitude`, `UserID`) VALUES
(17, '-122.08400000000002', '37.421998333333335', 55);

-- --------------------------------------------------------

--
-- Table structure for table `qualification`
--

CREATE TABLE `qualification` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `Qualification` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qualification`
--

INSERT INTO `qualification` (`ID`, `UserID`, `Qualification`) VALUES
(1, 55, 'q1'),
(2, 55, 'q2'),
(3, 55, 'q3'),
(4, 55, 'z2'),
(5, 55, ''),
(6, 55, ''),
(7, 55, 'z2'),
(8, 55, ''),
(9, 55, ''),
(10, 55, 'q1'),
(11, 55, 'q2'),
(12, 55, 'q3');

-- --------------------------------------------------------

--
-- Table structure for table `qualifications`
--

CREATE TABLE `qualifications` (
  `qualification_id` int(11) NOT NULL,
  `qualification_name` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qualifications`
--

INSERT INTO `qualifications` (`qualification_id`, `qualification_name`) VALUES
(1, 'SSLC'),
(2, 'PUC'),
(3, 'DEGREE'),
(4, 'PG'),
(5, 'Doctorate'),
(6, 'POST Doctral'),
(7, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `state_name` varchar(50) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state_name`, `country_id`) VALUES
(4, 'Andhra Pradesh', 4),
(2, 'Delhi', 4),
(1, 'Karnataka', 4),
(5, 'Kerala', 4),
(3, 'Maharashtra', 4),
(11, 'Tamilnadu', 4);

-- --------------------------------------------------------

--
-- Table structure for table `state_list`
--

CREATE TABLE `state_list` (
  `state_id` int(11) NOT NULL,
  `state_name` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `ParentName` varchar(255) DEFAULT NULL,
  `StudentMobileNumber` varchar(13) DEFAULT NULL,
  `ParentMobileNumber` varchar(13) DEFAULT NULL,
  `Subject` int(11) DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `board_id` int(11) DEFAULT NULL,
  `student_location` varchar(500) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `std_lat` decimal(10,6) DEFAULT NULL,
  `std_lng` decimal(10,6) DEFAULT NULL,
  `teaching_mode_id` int(11) DEFAULT NULL,
  `classtimeslots_id` int(11) DEFAULT NULL,
  `class_studying_id` int(11) DEFAULT NULL,
  `std_created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `std_updated_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `pwd` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`ID`, `Name`, `ParentName`, `StudentMobileNumber`, `ParentMobileNumber`, `Subject`, `gender_id`, `board_id`, `student_location`, `email`, `std_lat`, `std_lng`, `teaching_mode_id`, `classtimeslots_id`, `class_studying_id`, `std_created_date`, `std_updated_date`, `pwd`) VALUES
(1, 'Ashwin Kuthrapalli', 'ABC', '1111', '2222', 1, 1, 1, 'Jalahalli', NULL, NULL, NULL, NULL, NULL, 0, '2020-01-13 18:26:59', '2020-01-13 18:26:59', NULL),
(2, 'Ramraj Rao', 'DEF', '9999', '8888', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-01-13 18:26:59', '2020-01-13 18:26:59', NULL),
(3, 'Ramesh NV', 'KKK', '5555', '6666', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-01-13 18:26:59', '2020-01-13 18:26:59', NULL),
(4, 'kiran JD', 'kiran JD', '9283472937', '92837492333', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-01-13 18:26:59', '2020-01-13 18:26:59', NULL),
(5, 'kiran JD', 'kiran JD', '9283472937', '92837492333', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-01-13 18:26:59', '2020-01-13 18:26:59', NULL),
(6, 'Ramesh', 'Shivram', '9980376476', '9980376476', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-01-13 18:26:59', '2020-01-13 18:26:59', NULL),
(7, 'that guy', 'Sukshith S', '9880604765', '9880604765', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-01-13 18:26:59', '2020-01-13 18:26:59', NULL),
(8, 'Kiran Murthy JD', 'Kiran Murthy JD', '9880604765', '9880604765', 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-01-13 18:26:59', '2020-01-13 18:26:59', NULL),
(9, 'bbb', NULL, '5657676767', NULL, NULL, NULL, NULL, NULL, 'aaa@gmail.com', NULL, NULL, NULL, NULL, NULL, '2020-02-11 11:29:34', '2020-02-11 11:29:34', 'dfgdgf'),
(10, 'priyanka', NULL, '', NULL, NULL, NULL, NULL, NULL, 'prabhakar.gts@gmail.com', NULL, NULL, NULL, NULL, NULL, '2020-02-11 18:04:04', '2020-02-11 18:04:04', '123'),
(11, 'SWAMI VIVEKANANDA JNANA KENDRA', NULL, '5657676761', NULL, NULL, NULL, NULL, NULL, 'prabhakar.gts2@gmail.com', NULL, NULL, NULL, NULL, NULL, '2020-02-11 18:05:58', '2020-02-11 18:05:58', '123'),
(12, 'SWAMI VIVEKANANDA JNANA KENDRA', NULL, '5657676711', NULL, NULL, NULL, NULL, NULL, 'prabhakar.gts5@gmail.com', NULL, NULL, NULL, NULL, NULL, '2020-02-11 19:50:35', '2020-02-11 19:50:35', '111'),
(13, 'SWAMI VIVEKANANDA JNANA KENDRA', NULL, '5657676722', NULL, NULL, NULL, NULL, NULL, 'prabhakar.gts33@gmail.com', NULL, NULL, NULL, NULL, NULL, '2020-02-11 19:55:19', '2020-02-11 19:55:19', '111'),
(14, 'SWAMI VIVEKANANDA JNANA KENDRA', NULL, '5657676723', NULL, NULL, NULL, NULL, NULL, 'prabhakar.gts32@gmail.com', NULL, NULL, NULL, NULL, NULL, '2020-02-11 19:55:45', '2020-02-11 19:55:45', '111'),
(15, 'aaaa1', NULL, '5456565776', NULL, NULL, NULL, NULL, NULL, 'aaaa1@gmail.com', NULL, NULL, NULL, NULL, NULL, '2020-02-13 08:58:03', '2020-02-13 08:58:03', '123'),
(16, 'rrrr', NULL, '5654645654', NULL, NULL, NULL, NULL, NULL, 'ffdf@gamil.com', NULL, NULL, NULL, NULL, NULL, '2020-02-13 09:33:20', '2020-02-13 09:33:20', '123'),
(17, 'ddd', NULL, '3344345454', NULL, NULL, NULL, NULL, NULL, 'ddd@test.com', NULL, NULL, NULL, NULL, NULL, '2020-02-13 09:54:20', '2020-02-13 09:54:20', '123');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `classnames_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject`, `classnames_id`) VALUES
(1, 'Science', 2),
(2, 'Biology', 2),
(3, 'Mathematics', 2),
(4, 'English', 2),
(5, 'Hindi', 2),
(6, 'EVS/Social Studies', 2),
(7, 'Social Studies', 2),
(8, 'Physics', 2),
(9, 'Chemistry', 2),
(10, 'Accounts', 2),
(11, 'Economics', 2),
(12, 'Business Studies', 2),
(13, 'Computer Science', 2),
(14, 'math', 2);

-- --------------------------------------------------------

--
-- Table structure for table `svjk_staff`
--

CREATE TABLE `svjk_staff` (
  `svjk_staff_id` int(11) NOT NULL,
  `svjk_staff_name` varchar(250) DEFAULT NULL,
  `svjk_staff_user` varchar(250) DEFAULT NULL,
  `svjk_staff_password` varchar(250) DEFAULT NULL,
  `svjk_staff_phone` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `svjk_staff`
--

INSERT INTO `svjk_staff` (`svjk_staff_id`, `svjk_staff_name`, `svjk_staff_user`, `svjk_staff_password`, `svjk_staff_phone`) VALUES
(1, 'doddanna', 'dodd@svjk', '12345', '9739981327');

-- --------------------------------------------------------

--
-- Table structure for table `teaching_mediums`
--

CREATE TABLE `teaching_mediums` (
  `id` int(11) NOT NULL,
  `teaching_medium_name` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teaching_mediums`
--

INSERT INTO `teaching_mediums` (`id`, `teaching_medium_name`) VALUES
(1, 'Kannada'),
(2, 'English'),
(3, 'Hindi'),
(4, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `teaching_modes`
--

CREATE TABLE `teaching_modes` (
  `id` int(11) NOT NULL,
  `teaching_mode_name` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teaching_modes`
--

INSERT INTO `teaching_modes` (`id`, `teaching_mode_name`) VALUES
(1, 'Private Coaching (Home Tuition)'),
(2, 'Online Coaching'),
(3, 'Center Coaching (Institute)'),
(4, 'Tutor\'s Home');

-- --------------------------------------------------------

--
-- Table structure for table `tutors`
--

CREATE TABLE `tutors` (
  `tutor_id` int(11) NOT NULL,
  `tutor_name` varchar(300) DEFAULT NULL,
  `tutor_phone` varchar(15) DEFAULT NULL,
  `tutor_email` varchar(50) DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `tutor_dob` date DEFAULT NULL,
  `tutor_location` varchar(500) DEFAULT NULL,
  `tutor_profile_image` varchar(350) DEFAULT NULL,
  `tutor_age` int(11) DEFAULT NULL,
  `qualification_id` int(11) DEFAULT NULL,
  `boards_id` int(11) DEFAULT NULL,
  `classnames_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `teaching_mode_id` int(11) DEFAULT NULL,
  `teaching_medium_id` int(11) DEFAULT NULL,
  `job_type_id` int(11) DEFAULT NULL,
  `permanent_address` varchar(500) DEFAULT NULL,
  `address_proof_id` int(11) DEFAULT NULL,
  `proof_id_number` int(11) DEFAULT NULL,
  `address_proof_front` varchar(500) DEFAULT NULL,
  `address_proof_back` varchar(500) DEFAULT NULL,
  `experience_id` int(11) DEFAULT NULL,
  `institution_name` varchar(500) DEFAULT NULL,
  `tutor_designation` varchar(300) DEFAULT NULL,
  `tutor_salary` int(11) DEFAULT NULL,
  `languages_id` int(11) DEFAULT NULL,
  `question1_answer` text,
  `question2_answer` text,
  `question3_answer` text,
  `tutor_lat` decimal(10,6) DEFAULT NULL,
  `tutor_lng` decimal(10,6) DEFAULT NULL,
  `city_id` int(10) DEFAULT NULL,
  `tutor_desired_city` varchar(250) DEFAULT NULL,
  `tutor_svjk_score` int(11) DEFAULT NULL,
  `tutor_rating` int(11) DEFAULT NULL,
  `passport_status` int(11) DEFAULT NULL,
  `tutor_specialization` text,
  `teaching_certification` varchar(500) DEFAULT NULL,
  `criminal_cases_complaints` varchar(250) DEFAULT NULL,
  `tutor_created_datetime` datetime DEFAULT CURRENT_TIMESTAMP,
  `tutor_updated_datetime` datetime DEFAULT CURRENT_TIMESTAMP,
  `pwd` varchar(20) DEFAULT NULL,
  `address_line1` varchar(50) DEFAULT NULL,
  `address_line2` varchar(50) DEFAULT NULL,
  `job_timings` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutors`
--

INSERT INTO `tutors` (`tutor_id`, `tutor_name`, `tutor_phone`, `tutor_email`, `gender_id`, `tutor_dob`, `tutor_location`, `tutor_profile_image`, `tutor_age`, `qualification_id`, `boards_id`, `classnames_id`, `subject_id`, `teaching_mode_id`, `teaching_medium_id`, `job_type_id`, `permanent_address`, `address_proof_id`, `proof_id_number`, `address_proof_front`, `address_proof_back`, `experience_id`, `institution_name`, `tutor_designation`, `tutor_salary`, `languages_id`, `question1_answer`, `question2_answer`, `question3_answer`, `tutor_lat`, `tutor_lng`, `city_id`, `tutor_desired_city`, `tutor_svjk_score`, `tutor_rating`, `passport_status`, `tutor_specialization`, `teaching_certification`, `criminal_cases_complaints`, `tutor_created_datetime`, `tutor_updated_datetime`, `pwd`, `address_line1`, `address_line2`, `job_timings`) VALUES
(1, 'Doddanna D', '9739981327', 'chawannaikd@gmail.com', 1, '1996-01-01', 'Jalahalli Cross', 'photo.jpg', NULL, 4, NULL, NULL, NULL, NULL, NULL, 1, 'Jalahalli Cross', 1, 2147483647, 'uDemyJSCertificate.pdf', NULL, 8, 'oss', 'my designation', 98489, 1, 'answer1', 'answer2', 'answer3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-28 18:48:47', '2020-02-01 21:41:52', NULL, NULL, NULL, NULL),
(2, 'Prabhakar', '9731263208', 'prabhakar.gts@gmail.com', 1, '1996-01-01', 'hebbal', NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, 2, 'hebbal', 1, 2147483647, 'Lt.jpg', NULL, 36, 'company name', 'my designation', 2147483647, 5, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-28 20:07:36', '2020-02-10 16:11:58', NULL, NULL, NULL, NULL),
(41, 'AAAAA', '8888888888', 'aaa@gmail.com', NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-12 04:38:10', '2020-02-12 04:38:10', '111', 'gfgfgkkk bbb', 'fgdfgf hhh nnn', ''),
(42, 'qqq1', '5657676768', 'qqq@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-13 14:10:21', '2020-02-13 14:10:21', '123', NULL, NULL, NULL),
(43, 'qqq2', '9739981328', 'qqq2gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-13 14:11:24', '2020-02-13 14:11:24', '111', NULL, NULL, NULL),
(44, 'ddd', '3344345454', 'ddd@test.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-13 15:26:35', '2020-02-13 15:26:35', '123', NULL, NULL, NULL),
(45, 'eee', '4546565656', 'eee@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-13 18:58:10', '2020-02-13 18:58:10', '111', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tutor_boards`
--

CREATE TABLE `tutor_boards` (
  `id` bigint(11) NOT NULL,
  `tutor_id` int(11) DEFAULT NULL,
  `board_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutor_boards`
--

INSERT INTO `tutor_boards` (`id`, `tutor_id`, `board_id`) VALUES
(158, 41, 3),
(159, 41, 4),
(160, 41, 5),
(161, 41, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tutor_classes`
--

CREATE TABLE `tutor_classes` (
  `id` bigint(20) NOT NULL,
  `tutor_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutor_classes`
--

INSERT INTO `tutor_classes` (`id`, `tutor_id`, `class_id`) VALUES
(152, 41, 1),
(153, 41, 2),
(154, 41, 3),
(155, 41, 4),
(156, 41, 5),
(157, 41, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tutor_performance`
--

CREATE TABLE `tutor_performance` (
  `tutor_performance_id` int(11) NOT NULL,
  `tutor_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `hours_taught` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tutor_selected_boards`
--

CREATE TABLE `tutor_selected_boards` (
  `tutor_selected_boards_id` int(11) NOT NULL,
  `tutor_id` varchar(250) DEFAULT NULL,
  `boards_id` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutor_selected_boards`
--

INSERT INTO `tutor_selected_boards` (`tutor_selected_boards_id`, `tutor_id`, `boards_id`) VALUES
(1, '1', '1'),
(2, '1', '7'),
(3, '2', '2'),
(4, '2', '8');

-- --------------------------------------------------------

--
-- Table structure for table `tutor_selected_class`
--

CREATE TABLE `tutor_selected_class` (
  `tutor_selected_class_id` int(11) NOT NULL,
  `tutor_id` varchar(250) DEFAULT NULL,
  `classnames_id` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutor_selected_class`
--

INSERT INTO `tutor_selected_class` (`tutor_selected_class_id`, `tutor_id`, `classnames_id`) VALUES
(1, '1', '1'),
(2, '1', '5'),
(3, '1', '8'),
(4, '1', '9'),
(5, '2', '1'),
(6, '2', '5');

-- --------------------------------------------------------

--
-- Table structure for table `tutor_selected_languages_known`
--

CREATE TABLE `tutor_selected_languages_known` (
  `tutor_selected_languages_known_id` int(11) NOT NULL,
  `tutor_id` varchar(250) DEFAULT NULL,
  `languages_id` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutor_selected_languages_known`
--

INSERT INTO `tutor_selected_languages_known` (`tutor_selected_languages_known_id`, `tutor_id`, `languages_id`) VALUES
(1, '1', '1'),
(2, '1', '2'),
(3, '1', '6');

-- --------------------------------------------------------

--
-- Table structure for table `tutor_selected_subjects`
--

CREATE TABLE `tutor_selected_subjects` (
  `tutor_selected_subjects_id` int(11) NOT NULL,
  `tutor_id` varchar(250) DEFAULT NULL,
  `subject_id` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutor_selected_subjects`
--

INSERT INTO `tutor_selected_subjects` (`tutor_selected_subjects_id`, `tutor_id`, `subject_id`) VALUES
(1, '1', '4'),
(2, '1', '6'),
(3, '1', '10'),
(4, '1', '13'),
(5, '2', '1'),
(6, '2', '12');

-- --------------------------------------------------------

--
-- Table structure for table `tutor_selected_teaching_medium`
--

CREATE TABLE `tutor_selected_teaching_medium` (
  `tutor_selected_teaching_medium_id` int(11) NOT NULL,
  `tutor_id` varchar(250) DEFAULT NULL,
  `teaching_medium_id` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutor_selected_teaching_medium`
--

INSERT INTO `tutor_selected_teaching_medium` (`tutor_selected_teaching_medium_id`, `tutor_id`, `teaching_medium_id`) VALUES
(1, '1', '2'),
(2, '2', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tutor_selected_teaching_mode`
--

CREATE TABLE `tutor_selected_teaching_mode` (
  `tutor_selected_teaching_mode_id` int(11) NOT NULL,
  `tutor_id` varchar(250) DEFAULT NULL,
  `teaching_mode_id` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutor_selected_teaching_mode`
--

INSERT INTO `tutor_selected_teaching_mode` (`tutor_selected_teaching_mode_id`, `tutor_id`, `teaching_mode_id`) VALUES
(1, '1', '1'),
(2, '1', '4'),
(3, '2', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tutor_subjects`
--

CREATE TABLE `tutor_subjects` (
  `id` bigint(20) NOT NULL,
  `tutor_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutor_subjects`
--

INSERT INTO `tutor_subjects` (`id`, `tutor_id`, `subject_id`) VALUES
(67, 41, 1),
(68, 41, 3),
(69, 41, 4),
(70, 41, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tutor_teaching_mediums`
--

CREATE TABLE `tutor_teaching_mediums` (
  `id` bigint(20) NOT NULL,
  `tutor_id` int(11) DEFAULT NULL,
  `teaching_medium_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutor_teaching_mediums`
--

INSERT INTO `tutor_teaching_mediums` (`id`, `tutor_id`, `teaching_medium_id`) VALUES
(19, 41, 2),
(20, 41, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tutor_teaching_modes`
--

CREATE TABLE `tutor_teaching_modes` (
  `id` bigint(20) NOT NULL,
  `tutor_id` int(11) DEFAULT NULL,
  `teaching_mode_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutor_teaching_modes`
--

INSERT INTO `tutor_teaching_modes` (`id`, `tutor_id`, `teaching_mode_id`) VALUES
(42, 41, 1),
(43, 41, 2),
(44, 41, 4);

-- --------------------------------------------------------

--
-- Table structure for table `useraboutme`
--

CREATE TABLE `useraboutme` (
  `ID` int(11) NOT NULL,
  `Age` int(11) DEFAULT NULL,
  `Profession` varchar(255) DEFAULT NULL,
  `Experience` varchar(255) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `Introduction` varchar(255) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `Gender` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `useraboutme`
--

INSERT INTO `useraboutme` (`ID`, `Age`, `Profession`, `Experience`, `Price`, `Introduction`, `UserID`, `Gender`) VALUES
(17, 56, 'schoolTeacher', '', 6000, 'myself, me and all of me', 55, 'male');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Mobile` varchar(13) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `UserType` int(11) DEFAULT NULL,
  `Status` char(1) DEFAULT NULL,
  `Location` varchar(255) DEFAULT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `ZonalHead` int(11) DEFAULT NULL,
  `Credits` int(11) DEFAULT NULL,
  `teaching_mode_id` int(11) DEFAULT NULL,
  `CreditRate` float DEFAULT NULL,
  `user_created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_updated_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Name`, `Mobile`, `Email`, `UserType`, `Status`, `Location`, `uuid`, `ZonalHead`, `Credits`, `teaching_mode_id`, `CreditRate`, `user_created_date`, `user_updated_date`) VALUES
(47, 'Sunil Kulkarn', '+916360397206', '', 2, NULL, NULL, 'bpOy69YSXNeGV6ombZosLGQn3hg2', 54, 345, NULL, 0, '2020-01-13 18:37:59', '2020-01-13 18:37:59'),
(49, 'sukshith sukki', '', 'sukshithzone@gmail.com', 3, NULL, NULL, 'IAS2uDFQbSeZOAedOXMTLtBuD472', 55, 652, NULL, 0, '2020-01-13 18:37:59', '2020-01-13 18:37:59'),
(50, 'Prabhakara S', '+919731263208', 'null', 3, NULL, NULL, 'hZjuqiSylNh6nJze4ffenns6Tac2', 55, NULL, NULL, 0, '2020-01-13 18:37:59', '2020-01-13 18:37:59'),
(52, 'Sunil Kulkarni', '', 'sunilkulkarni139@gmail.com', 3, NULL, NULL, 'H2Z0Fi90FDW5iWvLckR3idbBP1M2', 54, 645, NULL, 0, '2020-01-13 18:37:59', '2020-01-13 18:37:59'),
(54, 'Prabhakar Shetty', '+null', 'prabhakar.gts@gmail.com', 2, NULL, NULL, 'rgyrX9mqODTvDTRZrw5DbuLWsKD3', 0, 652, NULL, 4, '2020-01-13 18:37:59', '2020-01-13 18:37:59'),
(55, 'Kiran Jd', '+919880604765', 'kiranjd8@gmail.com', 2, NULL, NULL, 'KHgNr9iCSMZ0hFsk7AYsdagAzgD2', 0, 54, NULL, 4, '2020-01-13 18:37:59', '2020-01-13 18:37:59'),
(56, 'Jagadeesh D', '+919902195645', 'jagadeeshd9@gmail.com', 3, NULL, NULL, 'vFNlB7dPgQgYkvAuqo7YTW1GO622', 54, 645, NULL, 0, '2020-01-13 18:37:59', '2020-01-13 18:37:59'),
(57, 'Bhat Vivek', '', 'vivekbhat9076@gmail.com', 3, NULL, NULL, 'fzGTWtQHYlbDdNZZ4Ac9QXJ6Zzz1', 54, 645, NULL, 0, '2020-01-13 18:37:59', '2020-01-13 18:37:59'),
(58, 'kiran', '9987234732', 'k@k.com', NULL, NULL, NULL, 'klasfjlasdsdnfldsa', NULL, NULL, NULL, NULL, '2020-01-13 18:37:59', '2020-01-13 18:37:59'),
(59, 'Mahantesh Prince', '+null', 'mahanteshath@gmail.com', NULL, NULL, NULL, 'zC2WwyJTx5aMHtH7CVs7Zxrq9E22', NULL, NULL, NULL, NULL, '2020-01-13 18:37:59', '2020-01-13 18:37:59'),
(60, 'Dhanush Kumar G ', '+917338436405', 'null', NULL, NULL, NULL, 'u6Z1Rj0JjeOlu521vZHLloDIF1C3', NULL, NULL, NULL, NULL, '2020-01-13 18:37:59', '2020-01-13 18:37:59'),
(61, 'Priyanka gowda', '+917019929104', 'null', NULL, NULL, NULL, 'LEvtvlpJVgUd0FLBF1G5MWymXBW2', NULL, NULL, NULL, NULL, '2020-01-13 18:37:59', '2020-01-13 18:37:59');

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `ID` int(11) NOT NULL,
  `UserType` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`ID`, `UserType`) VALUES
(1, 'Admin'),
(2, 'Zonal Head'),
(3, 'Tutor'),
(4, 'Student/Parent'),
(5, 'Institute'),
(6, 'Super Admin');

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE `zones` (
  `ID` int(11) NOT NULL,
  `ZoneName` varchar(255) DEFAULT NULL,
  `ZonalHead` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`ID`, `ZoneName`, `ZonalHead`) VALUES
(1, 'test', 50),
(2, 'kk', NULL),
(3, 'test2', 54),
(4, 'tst3', 47),
(5, 'test5', NULL),
(6, 'test9', NULL),
(7, 'test10', NULL),
(8, 'Hennur', 47),
(9, 'kk', NULL),
(10, 'kk', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address_proofs`
--
ALTER TABLE `address_proofs`
  ADD PRIMARY KEY (`address_proof_id`);

--
-- Indexes for table `area_list`
--
ALTER TABLE `area_list`
  ADD PRIMARY KEY (`area_id`);

--
-- Indexes for table `blockdate`
--
ALTER TABLE `blockdate`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `boards`
--
ALTER TABLE `boards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boardstaught`
--
ALTER TABLE `boardstaught`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UC_city_name_state_id` (`city_name`,`state_id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `city_list`
--
ALTER TABLE `city_list`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes2`
--
ALTER TABLE `classes2`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Subject` (`Subject`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `StudentID` (`StudentID`),
  ADD KEY `TimeSlot` (`TimeSlot`),
  ADD KEY `Status` (`Status`);

--
-- Indexes for table `classestaught`
--
ALTER TABLE `classestaught`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `ClassNames` (`ClassNames`);

--
-- Indexes for table `classstatus`
--
ALTER TABLE `classstatus`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `classsubjectstaught`
--
ALTER TABLE `classsubjectstaught`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `ClassNames` (`ClassNames`),
  ADD KEY `Subjects` (`Subjects`);

--
-- Indexes for table `classtimeslots`
--
ALTER TABLE `classtimeslots`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `classvideos`
--
ALTER TABLE `classvideos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ClassID` (`ClassID`);

--
-- Indexes for table `class_studying`
--
ALTER TABLE `class_studying`
  ADD PRIMARY KEY (`class_studying_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UC_country_name` (`country_name`);

--
-- Indexes for table `country_list`
--
ALTER TABLE `country_list`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `creditsperclass`
--
ALTER TABLE `creditsperclass`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ClassID` (`ClassID`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`experience_id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`gender_id`);

--
-- Indexes for table `job_types`
--
ALTER TABLE `job_types`
  ADD PRIMARY KEY (`job_type_id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`languages_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `qualification`
--
ALTER TABLE `qualification`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `qualifications`
--
ALTER TABLE `qualifications`
  ADD PRIMARY KEY (`qualification_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UC_state_name_country_id` (`state_name`,`country_id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `state_list`
--
ALTER TABLE `state_list`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Subject` (`Subject`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `svjk_staff`
--
ALTER TABLE `svjk_staff`
  ADD PRIMARY KEY (`svjk_staff_id`);

--
-- Indexes for table `teaching_mediums`
--
ALTER TABLE `teaching_mediums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teaching_modes`
--
ALTER TABLE `teaching_modes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutors`
--
ALTER TABLE `tutors`
  ADD PRIMARY KEY (`tutor_id`),
  ADD UNIQUE KEY `unique_email` (`tutor_email`),
  ADD UNIQUE KEY `unique_phone` (`tutor_phone`);

--
-- Indexes for table `tutor_boards`
--
ALTER TABLE `tutor_boards`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UC_tutor_id_board_id` (`tutor_id`,`board_id`),
  ADD KEY `board_id` (`board_id`);

--
-- Indexes for table `tutor_classes`
--
ALTER TABLE `tutor_classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UC_tutor_id_class_id` (`tutor_id`,`class_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `tutor_performance`
--
ALTER TABLE `tutor_performance`
  ADD PRIMARY KEY (`tutor_performance_id`);

--
-- Indexes for table `tutor_selected_boards`
--
ALTER TABLE `tutor_selected_boards`
  ADD PRIMARY KEY (`tutor_selected_boards_id`);

--
-- Indexes for table `tutor_selected_class`
--
ALTER TABLE `tutor_selected_class`
  ADD PRIMARY KEY (`tutor_selected_class_id`);

--
-- Indexes for table `tutor_selected_languages_known`
--
ALTER TABLE `tutor_selected_languages_known`
  ADD PRIMARY KEY (`tutor_selected_languages_known_id`);

--
-- Indexes for table `tutor_selected_subjects`
--
ALTER TABLE `tutor_selected_subjects`
  ADD PRIMARY KEY (`tutor_selected_subjects_id`);

--
-- Indexes for table `tutor_selected_teaching_medium`
--
ALTER TABLE `tutor_selected_teaching_medium`
  ADD PRIMARY KEY (`tutor_selected_teaching_medium_id`);

--
-- Indexes for table `tutor_selected_teaching_mode`
--
ALTER TABLE `tutor_selected_teaching_mode`
  ADD PRIMARY KEY (`tutor_selected_teaching_mode_id`);

--
-- Indexes for table `tutor_subjects`
--
ALTER TABLE `tutor_subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UC_tutor_id_subject_id` (`tutor_id`,`subject_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `tutor_teaching_mediums`
--
ALTER TABLE `tutor_teaching_mediums`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UC_tutor_id_teaching_medium_id` (`tutor_id`,`teaching_medium_id`),
  ADD KEY `teaching_medium_id` (`teaching_medium_id`);

--
-- Indexes for table `tutor_teaching_modes`
--
ALTER TABLE `tutor_teaching_modes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UC_tutor_id_teaching_mode_id` (`tutor_id`,`teaching_mode_id`),
  ADD KEY `teaching_mode_id` (`teaching_mode_id`);

--
-- Indexes for table `useraboutme`
--
ALTER TABLE `useraboutme`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_userId` (`UserID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserType` (`UserType`),
  ADD KEY `Users_ibfk_2` (`ZonalHead`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `zones`
--
ALTER TABLE `zones`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ZonalHead` (`ZonalHead`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address_proofs`
--
ALTER TABLE `address_proofs`
  MODIFY `address_proof_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `area_list`
--
ALTER TABLE `area_list`
  MODIFY `area_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blockdate`
--
ALTER TABLE `blockdate`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `boards`
--
ALTER TABLE `boards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `boardstaught`
--
ALTER TABLE `boardstaught`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `city_list`
--
ALTER TABLE `city_list`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `classes2`
--
ALTER TABLE `classes2`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `classestaught`
--
ALTER TABLE `classestaught`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `classsubjectstaught`
--
ALTER TABLE `classsubjectstaught`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `classtimeslots`
--
ALTER TABLE `classtimeslots`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `classvideos`
--
ALTER TABLE `classvideos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `class_studying`
--
ALTER TABLE `class_studying`
  MODIFY `class_studying_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `country_list`
--
ALTER TABLE `country_list`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `creditsperclass`
--
ALTER TABLE `creditsperclass`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `experience_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `gender_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `job_types`
--
ALTER TABLE `job_types`
  MODIFY `job_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `languages_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `qualification`
--
ALTER TABLE `qualification`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `qualifications`
--
ALTER TABLE `qualifications`
  MODIFY `qualification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `state_list`
--
ALTER TABLE `state_list`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `svjk_staff`
--
ALTER TABLE `svjk_staff`
  MODIFY `svjk_staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teaching_mediums`
--
ALTER TABLE `teaching_mediums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teaching_modes`
--
ALTER TABLE `teaching_modes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tutors`
--
ALTER TABLE `tutors`
  MODIFY `tutor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tutor_boards`
--
ALTER TABLE `tutor_boards`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `tutor_classes`
--
ALTER TABLE `tutor_classes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `tutor_performance`
--
ALTER TABLE `tutor_performance`
  MODIFY `tutor_performance_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tutor_selected_boards`
--
ALTER TABLE `tutor_selected_boards`
  MODIFY `tutor_selected_boards_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tutor_selected_class`
--
ALTER TABLE `tutor_selected_class`
  MODIFY `tutor_selected_class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tutor_selected_languages_known`
--
ALTER TABLE `tutor_selected_languages_known`
  MODIFY `tutor_selected_languages_known_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tutor_selected_subjects`
--
ALTER TABLE `tutor_selected_subjects`
  MODIFY `tutor_selected_subjects_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tutor_selected_teaching_medium`
--
ALTER TABLE `tutor_selected_teaching_medium`
  MODIFY `tutor_selected_teaching_medium_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tutor_selected_teaching_mode`
--
ALTER TABLE `tutor_selected_teaching_mode`
  MODIFY `tutor_selected_teaching_mode_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tutor_subjects`
--
ALTER TABLE `tutor_subjects`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `tutor_teaching_mediums`
--
ALTER TABLE `tutor_teaching_mediums`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tutor_teaching_modes`
--
ALTER TABLE `tutor_teaching_modes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `useraboutme`
--
ALTER TABLE `useraboutme`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `zones`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blockdate`
--
ALTER TABLE `blockdate`
  ADD CONSTRAINT `BlockDate_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`ID`);

--
-- Constraints for table `boardstaught`
--
ALTER TABLE `boardstaught`
  ADD CONSTRAINT `BoardsTaught_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`ID`);

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`);

--
-- Constraints for table `classestaught`
--
ALTER TABLE `classestaught`
  ADD CONSTRAINT `ClassesTaught_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`ID`);

--
-- Constraints for table `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `states_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`);

--
-- Constraints for table `tutor_boards`
--
ALTER TABLE `tutor_boards`
  ADD CONSTRAINT `tutor_boards_ibfk_1` FOREIGN KEY (`board_id`) REFERENCES `boards` (`ID`);

--
-- Constraints for table `tutor_classes`
--
ALTER TABLE `tutor_classes`
  ADD CONSTRAINT `tutor_classes_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`);

--
-- Constraints for table `tutor_subjects`
--
ALTER TABLE `tutor_subjects`
  ADD CONSTRAINT `tutor_subjects_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`ID`);

--
-- Constraints for table `tutor_teaching_mediums`
--
ALTER TABLE `tutor_teaching_mediums`
  ADD CONSTRAINT `tutor_teaching_mediums_ibfk_1` FOREIGN KEY (`teaching_medium_id`) REFERENCES `teaching_mediums` (`id`);

--
-- Constraints for table `tutor_teaching_modes`
--
ALTER TABLE `tutor_teaching_modes`
  ADD CONSTRAINT `tutor_teaching_modes_ibfk_1` FOREIGN KEY (`teaching_mode_id`) REFERENCES `teaching_modes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;