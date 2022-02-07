-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2022 at 06:51 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpdasar`
--

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `umur` int(3) NOT NULL,
  `kelamin` varchar(15) NOT NULL,
  `kontak` char(12) NOT NULL,
  `image` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`id`, `nama`, `umur`, `kelamin`, `kontak`, `image`) VALUES
(1, 'Lee Yunsang-ah', 26, 'Perempuan', '082546223899', 'img1.png'),
(2, 'Stacey Serrano', 27, 'Perempuan', '085455212338', 'img2.png'),
(3, 'Sondra Hogan', 25, 'Perempuan', '081295443867', 'img3.png'),
(4, 'Kyoko Ishibashi', 22, 'Perempuan', '089884754895', 'img4.png'),
(5, 'Mingyu Yee', 24, 'Perempuan', '082456293898', 'img5.png'),
(6, 'Heidi Mcmahon', 25, 'Perempuan', '087463445335', 'img6.png'),
(7, 'Augusta Wright', 23, 'Perempuan', '081234223212', 'img7.png'),
(8, 'Sun Yee', 24, 'Perempuan', '085768434923', 'img8.png'),
(9, 'Samon Sisai', 21, 'Perempuan', '089554679332', 'img9.png'),
(10, 'Allexandra Collier', 24, 'Perempuan', '085667312558', 'img10.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$RHdrde/JCYA3zXk7.H/uCOuLXokPTgruy9Vfuuq51aO3y8Etek1IG'),
(2, 'imron', '$2y$10$qw6vBtS2MaAMlVNpljnTlurOtLLT.iSD1tJMfsAS6Y9SWGbkRA/42'),
(3, 'luhur', '$2y$10$Coszvb6dBXFOZ3hgsRuaMO8E9VDvrgL23O4q701QtwqZ0xjAoMLVK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `model`
--
ALTER TABLE `model`
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
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
