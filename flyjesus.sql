-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2025 at 10:23 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flyjesus`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_id` varchar(100) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_id`, `category_name`) VALUES
(3, 'FLY-M100', 'FLY-M CHAIRPERSON'),
(4, 'FLY-M110', 'FLY-M TREASURER'),
(5, 'FLY-M120', 'FLY-M SECRETARY'),
(6, 'FLY-M130', 'FLY-M VICE CHAIRPERSON'),
(7, 'FLY-M140', 'FLY-M DESCIPLESHIP LEADER'),
(8, 'FLY-M150 ', 'FLY-M WORSHIP'),
(9, 'FLY-M160 ', 'FLY-M INTERCESSION'),
(10, 'FLY-M170 ', 'FLY-M WEFLFARE');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `department_id` varchar(100) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `year` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_id`, `department_name`, `year`) VALUES
(1, 'FLY_M1000', 'LAMBS MINISRY', '1987-01-02'),
(2, 'FLY_M1100', 'JUNIOR RADICALS', '2017-01-01'),
(3, 'FLY_M1200', 'BREACH REPAIRERS', '2005-01-01'),
(4, 'FLY_M1300', 'ALUMNI', '2015-01-31'),
(5, 'FLY_M1400', 'STREET FOR CHRIST', '2024-04-09'),
(6, 'FLY_M1500', 'MTCs AND TVETs', '2024-12-31'),
(7, 'FLY_M1600', 'FLY-M GENERAL(ALL)', '1987-01-31'),
(8, 'FLY_M1700', 'MTCs AND TVETs', '2024-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `department_assoc` varchar(100) NOT NULL,
  `event_title` varchar(100) NOT NULL,
  `event_description` varchar(255) NOT NULL,
  `venue` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `department_assoc`, `event_title`, `event_description`, `venue`, `date`, `photo`) VALUES
(4, 'LAMBS MINISRY', 'CROSSOVER RADICAL KESHA', '                    fedfdd', 'KICC Aphitheathre Hall', '2025-01-24', '6777b79e8a77f_Kesha_1.jpg'),
(8, 'LAMBS MINISRY', 'RESTORATION RADICAL KESHA NOVEMBER EDITION', '                    hjkl', 'CHRISCO CCC, Near Green Park', '2025-01-12', '6779a262eba8d_founders_2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `department_assoc` varchar(100) NOT NULL,
  `photo_one` varchar(100) NOT NULL,
  `photo_two` varchar(100) NOT NULL,
  `photo_three` varchar(100) NOT NULL,
  `photo_four` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `department_assoc`, `photo_one`, `photo_two`, `photo_three`, `photo_four`) VALUES
(2, 'LAMBS MINISRY', 'Kesha_4.jpg', 'Kesha_2.jpg', 'Kesha_1.jpg', 'Kesha_3.jpg'),
(3, 'BREACH REPAIRERS', '1736023543_about2.jpeg', '1736023543_about2.jpeg', '1736023543_founders_2.jpg', '1736023543_founders_1.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `leaders`
--

CREATE TABLE `leaders` (
  `id` int(11) NOT NULL,
  `department` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `phone_number` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leaders`
--

INSERT INTO `leaders` (`id`, `department`, `fullname`, `position`, `phone_number`) VALUES
(1, 'Lambs Ministry', 'Keziah Neema', 'Chairperson', 702499324),
(2, 'Fly-M Media', 'GIDEON KIPLANGAT', 'Chairperson', 702499324),
(3, 'Lambs Ministry', 'Dcn. Daniel Kiteme', 'Chairperson', 721233443),
(4, 'Fly-M Chairperson', 'Eldr. Cleophas Kosgei', 'Chairperson', 729001702),
(5, 'FLY-M Discipleship', 'Dcn. Amugune Wilberforce', 'Chairperson', 786789345),
(6, 'FLY-M Worship', 'Dcns. Joy Amugune', 'Chairperson', 716897456);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `user_type`) VALUES
(1, 'FLY-M', 'Administrator', 'FLY-M Admin', 'ministryflym@gmail.com', 'cbc5e31c9a53efe17038de1096896371', 'admin'),
(2, 'GIDEON', 'KIPLANGAT', 'FLY-M Support', 'gideonkiplangat4@gmail.com', '75120fcfb267943b38b74078224a5360', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaders`
--
ALTER TABLE `leaders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `leaders`
--
ALTER TABLE `leaders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
