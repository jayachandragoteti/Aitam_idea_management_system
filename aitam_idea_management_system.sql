-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2020 at 08:37 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aitam_idea_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `project_proposals`
--

CREATE TABLE `project_proposals` (
  `sno` int(11) NOT NULL,
  `id_number` varchar(225) NOT NULL,
  `proposal_id` varchar(225) NOT NULL,
  `project_title` varchar(225) NOT NULL,
  `estimated_amunt` varchar(11) NOT NULL,
  `project_file` varchar(225) NOT NULL,
  `project_description` varchar(225) NOT NULL,
  `status` varchar(225) NOT NULL,
  `datm` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_proposals`
--

INSERT INTO `project_proposals` (`sno`, `id_number`, `proposal_id`, `project_title`, `estimated_amunt`, `project_file`, `project_description`, `status`, `datm`) VALUES
(1, '18A51A0515', 'AIM91762OV', 'E-out pass system', '10000', 'AIM91762OV.pdf', 'E-out pass system', 'PENDING', '2020-05-02 10:44:52'),
(2, '18A51A0515', 'AIM1898IO', 'AIM system', '10000', 'AIM1898IO.pdf', 'AIM system', 'PENDING', '2020-05-02 10:45:18'),
(3, '18A51A0515', 'AIM32753XC', 'AIM', '111111', 'AIM32753XC.pdf', 'hello ', 'PENDING', '2020-05-02 10:45:41'),
(4, '18A51A0515', 'AIM64468', '', '', '', '', 'PENDING', '2020-05-02 16:49:37');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `sno` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `id_number` varchar(226) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `login_type` varchar(225) NOT NULL,
  `branch` varchar(225) NOT NULL,
  `section` varchar(225) NOT NULL,
  `datm` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`sno`, `name`, `id_number`, `phone`, `email`, `password`, `login_type`, `branch`, `section`, `datm`) VALUES
(3, 'GOTETI JAYACHANDRA MOHAN LAKSHMI NARASIMHA MURTHY', '18A51A0515', '9491694195', 'gotetijayachandra@gmail.com', 'suhas2018', 'student', '', '', '2020-05-02 17:49:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `project_proposals`
--
ALTER TABLE `project_proposals`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `proposal_id` (`proposal_id`),
  ADD UNIQUE KEY `project_file` (`project_file`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `id_number` (`id_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `project_proposals`
--
ALTER TABLE `project_proposals`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
