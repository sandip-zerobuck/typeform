-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2021 at 01:22 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `typeform`
--

-- --------------------------------------------------------

--
-- Table structure for table `form_create`
--

CREATE TABLE `form_create` (
  `id` int(11) NOT NULL,
  `form_master_id` int(11) NOT NULL,
  `type` enum('short_text','long_text') NOT NULL,
  `short_text_id` int(11) NOT NULL,
  `long_text_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `form_create`
--

INSERT INTO `form_create` (`id`, `form_master_id`, `type`, `short_text_id`, `long_text_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'short_text', 1, 0, '0000-00-00 00:00:00', '2021-04-03 15:55:59'),
(2, 1, 'short_text', 2, 0, '0000-00-00 00:00:00', '2021-04-03 15:55:59'),
(3, 1, 'long_text', 0, 1, '0000-00-00 00:00:00', '2021-04-03 15:55:59');

-- --------------------------------------------------------

--
-- Table structure for table `form_master`
--

CREATE TABLE `form_master` (
  `id` int(11) NOT NULL,
  `access_token` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `form_master`
--

INSERT INTO `form_master` (`id`, `access_token`, `name`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'c4ca4238a0b923820dcc509a6f75849b', 'Contact Form', 1, '2021-04-03 12:25:59', '2021-04-03 15:55:59');

-- --------------------------------------------------------

--
-- Table structure for table `long_text`
--

CREATE TABLE `long_text` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `long_text`
--

INSERT INTO `long_text` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(1, 'Your Address', NULL, '0000-00-00 00:00:00', '2021-04-03 15:55:59');

-- --------------------------------------------------------

--
-- Table structure for table `short_text`
--

CREATE TABLE `short_text` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `short_text`
--

INSERT INTO `short_text` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(1, 'Your Name', NULL, '0000-00-00 00:00:00', '2021-04-03 15:55:59'),
(2, 'Email Id', NULL, '0000-00-00 00:00:00', '2021-04-03 15:55:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, 'sandip', 'sandip.zerobuck@gmail.com', '202cb962ac59075b964b07152d234b70', 1, '2021-04-02 12:32:20', '2021-04-02 16:02:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `form_create`
--
ALTER TABLE `form_create`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_master_id` (`form_master_id`),
  ADD KEY `short_text_id` (`short_text_id`),
  ADD KEY `long_text_id` (`long_text_id`);

--
-- Indexes for table `form_master`
--
ALTER TABLE `form_master`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `long_text`
--
ALTER TABLE `long_text`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `short_text`
--
ALTER TABLE `short_text`
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
-- AUTO_INCREMENT for table `form_create`
--
ALTER TABLE `form_create`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `form_master`
--
ALTER TABLE `form_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `long_text`
--
ALTER TABLE `long_text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `short_text`
--
ALTER TABLE `short_text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
