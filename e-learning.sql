-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 22, 2022 at 10:24 AM
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
-- Database: `e-learning`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `CourseId` int(11) NOT NULL,
  `CourseName` text NOT NULL,
  `Description` text NOT NULL,
  `Duration` text NOT NULL,
  `Time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`CourseId`, `CourseName`, `Description`, `Duration`, `Time`) VALUES
(1, 'ICS', 'Everything related to computers', '4 years', 0),
(2, 'International Studies', 'Culture and Diplomacy', '4 years', 0);

-- --------------------------------------------------------

--
-- Table structure for table `enrolments`
--

CREATE TABLE `enrolments` (
  `EnrolmentId` int(11) NOT NULL,
  `CourseId` int(11) NOT NULL,
  `TraineeId` int(11) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enrolments`
--

INSERT INTO `enrolments` (`EnrolmentId`, `CourseId`, `TraineeId`, `Time`) VALUES
(1, 1, 2, '2022-08-21 14:30:53'),
(2, 1, 2, '2022-08-21 14:35:00');

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `RegistrationId` int(11) NOT NULL,
  `UnitId` int(11) NOT NULL,
  `TraineeId` int(11) NOT NULL,
  `Status` text NOT NULL,
  `Time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`RegistrationId`, `UnitId`, `TraineeId`, `Status`, `Time`) VALUES
(1, 1, 2, 'Approved', '2022-08-21 20:56:16'),
(2, 1, 2, 'Approved', '2022-08-22 00:39:05');

-- --------------------------------------------------------

--
-- Table structure for table `trainer_answers`
--

CREATE TABLE `trainer_answers` (
  `AnswerId` int(11) NOT NULL,
  `TrainerId` int(11) NOT NULL,
  `Answer1` text NOT NULL,
  `Answer2` text NOT NULL,
  `Answer3` text NOT NULL,
  `Answer4` text NOT NULL,
  `Answer5` text NOT NULL,
  `Answer6` text NOT NULL,
  `Answer7` text NOT NULL,
  `Answer8` text NOT NULL,
  `Answer9` text NOT NULL,
  `Answer10` text NOT NULL,
  `Time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `trainer_questions`
--

CREATE TABLE `trainer_questions` (
  `QuestionId` int(11) NOT NULL,
  `Question` int(11) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `trainer_status`
--

CREATE TABLE `trainer_status` (
  `StatusId` int(11) NOT NULL,
  `TrainerId` int(11) NOT NULL,
  `CanLogin` int(11) NOT NULL,
  `ChancesLeft` int(11) NOT NULL,
  `Score` int(11) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `UnitId` int(11) NOT NULL,
  `CourseId` int(11) NOT NULL,
  `TrainerId` int(11) NOT NULL,
  `UnitName` text NOT NULL,
  `Duration` text NOT NULL,
  `Description` text NOT NULL,
  `Time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`UnitId`, `CourseId`, `TrainerId`, `UnitName`, `Duration`, `Description`, `Time`) VALUES
(1, 2, 0, 'Calculus II', '1 semester', 'Requires fundamentals of Discrete Mathematics', '2022-08-22 02:29:09'),
(2, 1, 0, 'Calculus', '3 months', 'Basic algebra needed', '2022-08-22 02:34:37'),
(3, 1, 0, 'Computer Graphics', '2 months', 'Very good for ICS students', '2022-08-22 02:33:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserId` int(11) NOT NULL,
  `FirstName` text NOT NULL,
  `LastName` text NOT NULL,
  `Email` text NOT NULL,
  `Password` text NOT NULL,
  `Type` text NOT NULL,
  `Skills` text NOT NULL,
  `Suspended` int(11) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `FirstName`, `LastName`, `Email`, `Password`, `Type`, `Skills`, `Suspended`, `Time`) VALUES
(1, 'Salomon', 'Metre Kulondwa', 'salomon.kulondwa@gmail.com', 'e1bb723b0c64bc4035fad998c422e345', 'Trainer', 'Programming', 0, '2022-08-20 16:22:46'),
(2, 'Steve', 'Bulonza', 'steveb@gmail.com', '7fe354a52a8e2d9a771cd618cf444cf6', 'Trainee', 'Marketing. Music.', 0, '2022-08-22 00:07:38'),
(3, 'Patientent', 'Bagenda', 'pbag@gmail.com', '181ab8328bbd9875c8f13278968930fe', 'Admin', 'Adminstrative skills. Informatics. Marketing', 0, '2022-08-21 12:55:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`CourseId`);

--
-- Indexes for table `enrolments`
--
ALTER TABLE `enrolments`
  ADD PRIMARY KEY (`EnrolmentId`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`RegistrationId`);

--
-- Indexes for table `trainer_answers`
--
ALTER TABLE `trainer_answers`
  ADD PRIMARY KEY (`AnswerId`);

--
-- Indexes for table `trainer_questions`
--
ALTER TABLE `trainer_questions`
  ADD PRIMARY KEY (`QuestionId`);

--
-- Indexes for table `trainer_status`
--
ALTER TABLE `trainer_status`
  ADD PRIMARY KEY (`StatusId`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`UnitId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `CourseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `enrolments`
--
ALTER TABLE `enrolments`
  MODIFY `EnrolmentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `RegistrationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trainer_answers`
--
ALTER TABLE `trainer_answers`
  MODIFY `AnswerId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trainer_questions`
--
ALTER TABLE `trainer_questions`
  MODIFY `QuestionId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trainer_status`
--
ALTER TABLE `trainer_status`
  MODIFY `StatusId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `UnitId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
