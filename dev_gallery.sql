-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2021 at 04:03 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dev_gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` char(50) NOT NULL,
  `description` text NOT NULL,
  `img_name` text NOT NULL,
  `img_order` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`id`, `title`, `description`, `img_name`, `img_order`, `user_id`, `created_at`) VALUES
(1, 'JavaScript', 'Hello my friends', 'JavaScript.60c603622950a6.10459568.png', 1, 1, '2021-06-13 18:08:50'),
(2, 'JavaScript', 'Hello my friends', 'JavaScript.60c6038daa70b3.79312513.png', 2, 1, '2021-06-13 18:09:33'),
(3, 'JavaScript', 'Hello my friends', 'JavaScript.60c60398c47986.45311061.png', 3, 1, '2021-06-13 18:09:44'),
(4, 'JavaScript', 'Hello my friends', 'JavaScript.60c6043d9b8067.51274872.png', 4, 1, '2021-06-13 18:12:29'),
(5, 'JavaScript', 'Hello my friends', 'JavaScript.60c60447b07d66.24622392.png', 5, 1, '2021-06-13 18:12:39'),
(6, 'JavaScript', 'Hello my friends', 'JavaScript.60c60c36e9aad5.89867156.png', 6, 2, '2021-06-13 18:46:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` char(30) NOT NULL,
  `username` char(30) NOT NULL,
  `email` char(30) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `cpass` char(15) NOT NULL,
  `city` char(15) NOT NULL,
  `country` text NOT NULL,
  `zipcode` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `pass`, `cpass`, `city`, `country`, `zipcode`) VALUES
(1, 'John Smith', 'john21', 'example@gmail.com', '$2y$10$YrH1xO//wyxo3YcXiKZ5teQJUzO8jYZ3vZNXsTKRXGCm0ZdrgrQfy', '1234', 'London', 'United Kingdom', '90818'),
(2, 'John Doe', 'johndoe', 'example1@gmail.com', '$2y$10$al.xiJ3/8ee9gejizIZ3Ie9kCtB.JmAflXmDrU.i0ikfQnOCDSCaq', '1234', 'London', 'United Kingdom', '90818');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
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
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
