-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2021 at 01:23 PM
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
(3, 1, 'long_text', 0, 1, '0000-00-00 00:00:00', '2021-04-03 15:55:59'),
(4, 2, 'short_text', 3, 0, '0000-00-00 00:00:00', '2021-04-05 13:37:57'),
(5, 2, 'short_text', 4, 0, '0000-00-00 00:00:00', '2021-04-05 13:37:57'),
(6, 2, 'long_text', 0, 2, '0000-00-00 00:00:00', '2021-04-05 13:37:57'),
(7, 2, 'short_text', 5, 0, '0000-00-00 00:00:00', '2021-04-05 13:37:57'),
(8, 3, 'short_text', 6, 0, '0000-00-00 00:00:00', '2021-04-05 13:43:24'),
(9, 3, 'short_text', 7, 0, '0000-00-00 00:00:00', '2021-04-05 13:43:24'),
(10, 3, 'short_text', 8, 0, '0000-00-00 00:00:00', '2021-04-05 13:43:24'),
(11, 3, 'short_text', 9, 0, '0000-00-00 00:00:00', '2021-04-05 13:43:24'),
(12, 3, 'long_text', 0, 3, '0000-00-00 00:00:00', '2021-04-05 13:43:24'),
(13, 3, 'short_text', 10, 0, '0000-00-00 00:00:00', '2021-04-05 13:43:24'),
(14, 4, 'short_text', 11, 0, '0000-00-00 00:00:00', '2021-04-05 16:50:23'),
(15, 4, 'short_text', 12, 0, '0000-00-00 00:00:00', '2021-04-05 16:50:23'),
(16, 4, 'short_text', 13, 0, '0000-00-00 00:00:00', '2021-04-05 16:50:23'),
(17, 4, 'long_text', 0, 4, '0000-00-00 00:00:00', '2021-04-05 16:50:23'),
(18, 5, 'short_text', 14, 0, '0000-00-00 00:00:00', '2021-04-05 16:51:52'),
(19, 5, 'short_text', 15, 0, '0000-00-00 00:00:00', '2021-04-05 16:51:52'),
(20, 5, 'long_text', 0, 5, '0000-00-00 00:00:00', '2021-04-05 16:51:52'),
(21, 6, 'short_text', 16, 0, '0000-00-00 00:00:00', '2021-04-05 16:52:45');

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
(1, 'c4ca4238a0b923820dcc509a6f75849b', 'Contact Form', 1, '2021-04-03 12:25:59', '2021-04-03 15:55:59'),
(2, 'c81e728d9d4c2f636f067f89cc14862c', 'New Form', 1, '2021-04-05 10:07:57', '2021-04-05 13:37:57'),
(3, 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'Sample Form', 1, '2021-04-05 10:13:24', '2021-04-05 13:43:24'),
(4, 'a87ff679a2f3e71d9181a67b7542122c', 'Contact Form', 1, '2021-04-05 13:20:23', '2021-04-05 16:50:23'),
(5, 'e4da3b7fbbce2345d7772b0674a318d5', 'Contact Form', 1, '2021-04-05 13:21:52', '2021-04-05 16:51:52'),
(6, '1679091c5a880faf6fb5e6087eb1b2dc', 'Contact Form', 1, '2021-04-05 13:22:45', '2021-04-05 16:52:45');

-- --------------------------------------------------------

--
-- Table structure for table `long_text`
--

CREATE TABLE `long_text` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `required_field` enum('yes','no') NOT NULL DEFAULT 'no',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `long_text`
--

INSERT INTO `long_text` (`id`, `name`, `value`, `required_field`, `created_at`, `updated_at`) VALUES
(1, 'Your Address', NULL, 'no', '0000-00-00 00:00:00', '2021-04-03 15:55:59'),
(2, 'Address', NULL, '', '0000-00-00 00:00:00', '2021-04-05 13:37:57'),
(3, 'Address', NULL, 'yes', '0000-00-00 00:00:00', '2021-04-05 13:43:24'),
(4, 'Message', 'Type your answer here...', 'no', '0000-00-00 00:00:00', '2021-04-05 16:50:23'),
(5, 'Message', 'Type your answer here...', 'no', '0000-00-00 00:00:00', '2021-04-05 16:51:52');

-- --------------------------------------------------------

--
-- Table structure for table `response_master`
--

CREATE TABLE `response_master` (
  `id` int(11) NOT NULL,
  `form_master_id` int(11) NOT NULL,
  `access_token` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `response_master`
--

INSERT INTO `response_master` (`id`, `form_master_id`, `access_token`, `created_at`, `updated_at`) VALUES
(1, 3, 'c4ca4238a0b923820dcc509a6f75849b', '2021-04-05 12:55:02', '2021-04-05 16:25:02'),
(2, 6, 'c81e728d9d4c2f636f067f89cc14862c', '2021-04-05 13:23:01', '2021-04-05 16:53:01'),
(3, 5, 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '2021-04-05 13:23:15', '2021-04-05 16:53:15');

-- --------------------------------------------------------

--
-- Table structure for table `short_text`
--

CREATE TABLE `short_text` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `required_field` enum('yes','no') NOT NULL DEFAULT 'no',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `short_text`
--

INSERT INTO `short_text` (`id`, `name`, `value`, `required_field`, `created_at`, `updated_at`) VALUES
(1, 'Your Name', NULL, 'no', '0000-00-00 00:00:00', '2021-04-03 15:55:59'),
(2, 'Email Id', NULL, 'no', '0000-00-00 00:00:00', '2021-04-03 15:55:59'),
(3, 'Firstname', NULL, '', '0000-00-00 00:00:00', '2021-04-05 13:37:57'),
(4, 'Firstname', NULL, '', '0000-00-00 00:00:00', '2021-04-05 13:37:57'),
(5, 'Firstname', NULL, '', '0000-00-00 00:00:00', '2021-04-05 13:37:57'),
(6, 'Name', NULL, 'yes', '0000-00-00 00:00:00', '2021-04-05 13:43:24'),
(7, 'Email', NULL, 'yes', '0000-00-00 00:00:00', '2021-04-05 13:43:24'),
(8, 'Mobile', NULL, 'yes', '0000-00-00 00:00:00', '2021-04-05 13:43:24'),
(9, 'Hobby', NULL, 'yes', '0000-00-00 00:00:00', '2021-04-05 13:43:24'),
(10, 'State', NULL, 'yes', '0000-00-00 00:00:00', '2021-04-05 13:43:24'),
(11, 'Name', 'Type your answer here...', 'yes', '0000-00-00 00:00:00', '2021-04-05 16:50:23'),
(12, 'Mobile', 'Type your answer here...', 'no', '0000-00-00 00:00:00', '2021-04-05 16:50:23'),
(13, 'Email', 'Type your answer here...', 'yes', '0000-00-00 00:00:00', '2021-04-05 16:50:23'),
(14, 'Name', 'Type your answer here...', 'yes', '0000-00-00 00:00:00', '2021-04-05 16:51:52'),
(15, 'Email', 'Type your answer here...', 'no', '0000-00-00 00:00:00', '2021-04-05 16:51:52'),
(16, 'Message', 'Type your answer here...', 'no', '0000-00-00 00:00:00', '2021-04-05 16:52:45');

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

-- --------------------------------------------------------

--
-- Table structure for table `user_response`
--

CREATE TABLE `user_response` (
  `id` int(11) NOT NULL,
  `response_master_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `value` longtext DEFAULT NULL,
  `type` enum('short_text','long_text') DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_response`
--

INSERT INTO `user_response` (`id`, `response_master_id`, `name`, `value`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Name', 'sandip', 'short_text', 1, '0000-00-00 00:00:00', '2021-04-05 16:25:02'),
(2, 1, 'Email', 'sderavaliya0@gmail.com', 'short_text', 1, '0000-00-00 00:00:00', '2021-04-05 16:25:02'),
(3, 1, 'Mobile', '9664787091', 'short_text', 1, '0000-00-00 00:00:00', '2021-04-05 16:25:02'),
(4, 1, 'Hobby', 'Play', 'short_text', 1, '0000-00-00 00:00:00', '2021-04-05 16:25:02'),
(5, 1, 'Address', 'Vangadhra, Vinchhiya', 'long_text', 1, '0000-00-00 00:00:00', '2021-04-05 16:25:02'),
(6, 1, 'State', 'Gujarat', 'short_text', 1, '0000-00-00 00:00:00', '2021-04-05 16:25:02'),
(7, 2, 'Message', '', 'short_text', 1, '0000-00-00 00:00:00', '2021-04-05 16:53:01'),
(8, 3, 'Name', 'Sandip', 'short_text', 1, '0000-00-00 00:00:00', '2021-04-05 16:53:15'),
(9, 3, 'Email', '', 'short_text', 1, '0000-00-00 00:00:00', '2021-04-05 16:53:15'),
(10, 3, 'Message', '', 'long_text', 1, '0000-00-00 00:00:00', '2021-04-05 16:53:15');

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
-- Indexes for table `response_master`
--
ALTER TABLE `response_master`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_master_id` (`form_master_id`);

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
-- Indexes for table `user_response`
--
ALTER TABLE `user_response`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_master` (`response_master_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `form_create`
--
ALTER TABLE `form_create`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `form_master`
--
ALTER TABLE `form_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `long_text`
--
ALTER TABLE `long_text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `response_master`
--
ALTER TABLE `response_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `short_text`
--
ALTER TABLE `short_text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_response`
--
ALTER TABLE `user_response`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
