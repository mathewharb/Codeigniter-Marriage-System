-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2017 at 03:20 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `churchms`
--
CREATE DATABASE IF NOT EXISTS `churchms` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `churchms`;

-- --------------------------------------------------------

--
-- Table structure for table `church_details`
--

CREATE TABLE `church_details` (
  `id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `notifications` varchar(50) NOT NULL,
  `impediments` varchar(200) NOT NULL,
  `marriage_date` date NOT NULL,
  `priest` varchar(200) NOT NULL,
  `witnesses` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `church_details`
--

INSERT INTO `church_details` (`id`, `user_id`, `notifications`, `impediments`, `marriage_date`, `priest`, `witnesses`) VALUES
(3, 3, 'bans', 'test', '2017-04-04', 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `spouse_details`
--

CREATE TABLE `spouse_details` (
  `id` int(11) NOT NULL,
  `user_id` int(50) NOT NULL,
  `user_role_id` int(50) NOT NULL,
  `username` varchar(200) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(200) NOT NULL,
  `married_to` varchar(200) NOT NULL,
  `avatar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spouse_details`
--

INSERT INTO `spouse_details` (`id`, `user_id`, `user_role_id`, `username`, `first_name`, `middle_name`, `last_name`, `gender`, `dob`, `address`, `married_to`, `avatar`) VALUES
(15, 14, 2, 'C004', 'James', '', 'Bass', 'male', '1965-04-05', 'test', 'test', 'http://[::1]/churchms/uploads/Koala1.jpg'),
(16, 3, 2, 'test', 'Test Record', '', 'test', 'female', '2017-04-12', 'test', '', 'http://[::1]/churchms/uploads/Koala2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `spouse_parental`
--

CREATE TABLE `spouse_parental` (
  `id` int(11) NOT NULL,
  `user_id` int(50) NOT NULL,
  `mans_parents` varchar(200) NOT NULL,
  `address_one` varchar(200) NOT NULL,
  `womans_parents` varchar(200) NOT NULL,
  `address_two` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spouse_parental`
--

INSERT INTO `spouse_parental` (`id`, `user_id`, `mans_parents`, `address_one`, `womans_parents`, `address_two`) VALUES
(4, 14, 'test parent one', '', 'test parent  two', ''),
(5, 3, 'Test Mans Parent', 'test address', 'Test Womans parents', 'test address');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(50) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Marriage'),
(7, 'Baptism');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_role_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `username`, `password`, `user_role_id`) VALUES
(1, 'Administrator', 'admin@stthereses.org', 'admin', 1),
(3, 'Test Record', 'test', 'admin', 2),
(10, 'amie njie', 'harbexpress', 'admin', 2),
(11, 'amie njie', 'amie', 'admin', 2),
(12, 'test with number', 'c001', 'admin', 2),
(13, 'Another test', 'C002', 'admin', 2),
(14, 'James Bass', 'C004', 'admin', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `church_details`
--
ALTER TABLE `church_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spouse_details`
--
ALTER TABLE `spouse_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spouse_parental`
--
ALTER TABLE `spouse_parental`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `church_details`
--
ALTER TABLE `church_details`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `spouse_details`
--
ALTER TABLE `spouse_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `spouse_parental`
--
ALTER TABLE `spouse_parental`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
