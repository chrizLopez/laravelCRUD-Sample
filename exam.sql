-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2018 at 12:54 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `persons`
--

CREATE TABLE `persons` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persons`
--

INSERT INTO `persons` (`id`, `name`, `email_address`, `password`, `gender`, `description`) VALUES
(1, 'Ariana Grande', 'ariana@gmail.com', '$2y$10$Y001n6RDItAl411QnBW2t.FIuh4f0xCGZ1NCsmcVfIS5DmMAelzp6', 'Female', 'A singer in the US'),
(2, 'Naruto Uzumaki', 'naruto@email.com', '$2y$10$QCKMcWQCAgV435LpRyfcp.gqpITTiSkkU3hc89bz6j2Kg83TFtcG.', 'Male', 'A ninja in hidden village of Leaf named Konoha'),
(3, 'Christian Jee Yamba', 'yambachristianjee@gmail.com', '$2y$10$RfR.tHyQcWlCuDOqlyvHDuo6Y2DaQs5IMqdgDoDsy5Ke1ppcLSNv.', 'Male', 'A web developer'),
(4, 'JB Bucog', 'jb@ymail.com', '$2y$10$TQv96GvXT99xMM2EKdCSP.QmFkMWlvCFuhXUTlugXssJ0UP3fW01a', 'Female', 'A Mobile developer'),
(5, 'Airen Janica', 'janicamazing@google.com', '$2y$10$h.OR/2BGEmRSHF9y9S36FefZCgruqbDoFKzZEn/x6gz03zrlDydXS', 'Female', 'An intern in SOPI');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `persons`
--
ALTER TABLE `persons`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `persons`
--
ALTER TABLE `persons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
