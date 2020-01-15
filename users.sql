-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2020 at 09:03 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my-api`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `sex` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `middle_name`, `last_name`, `date_of_birth`, `sex`, `address`, `email`, `contact`) VALUES
(1, 'collette', 'belinda', 'james', '2020-01-15', 'female', '43, colla belinda close, lagos', 'virgil@yahoo.com', '+5837368294'),
(2, 'lucas', 'ivar', 'nicholas', '1990-01-21', 'male', '43, lucas ivar avenue, madrid', 'lucas@yahoo.com', '+5837366789'),
(3, 'ade', '', 'dayo', '2020-01-01', 'male', '54, adedayo street, oshogbo', 'ade@yahoo.com', '+87894898949'),
(4, 'charles', 'evans', 'lawrence', '2020-01-08', 'male', '75, charles evans road, ekiti', 'charles@gmail.com', '+78948985983'),
(5, 'beatrice', '', 'michaels', '2020-01-09', 'female', '94, road estate, lagos', 'beatmichaels@yahoo.com', '+898634989543'),
(6, 'loveth', 'eunice', 'patrick', '2020-01-22', 'female', '98, patrick way, abeokuta', 'loveth@gmail.com', '+84883040599'),
(7, 'aisha', 'sheridan', 'yinka', '2020-01-27', 'female', '97, sheridan lane, new york', 'aiyinka@yahoo.com', '+9849898498'),
(8, 'johnson', 'jackson', 'richardson', '2020-01-12', 'male', '756, sons estate, lagos', 'sonssonsandsons@gmail.com', '+98785784455');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
