-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2021 at 01:30 PM
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
  `type` enum('short_text','long_text','yesorno_text') NOT NULL,
  `short_text_id` int(11) NOT NULL,
  `long_text_id` int(11) NOT NULL,
  `yesorno_text_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `form_create`
--

INSERT INTO `form_create` (`id`, `form_master_id`, `type`, `short_text_id`, `long_text_id`, `yesorno_text_id`, `created_at`, `updated_at`) VALUES
(1, 3, 'short_text', 1, 0, 0, '0000-00-00 00:00:00', '2021-04-06 16:57:47'),
(2, 3, 'short_text', 2, 0, 0, '0000-00-00 00:00:00', '2021-04-06 16:57:47'),
(3, 3, 'short_text', 3, 0, 0, '0000-00-00 00:00:00', '2021-04-06 16:57:47'),
(4, 3, 'yesorno_text', 0, 0, 1, '0000-00-00 00:00:00', '2021-04-06 16:57:47'),
(5, 3, 'long_text', 0, 1, 0, '0000-00-00 00:00:00', '2021-04-06 16:57:47');

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
(3, 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'Contact Form', 1, '2021-04-06 13:27:47', '2021-04-06 16:57:47');

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
(1, 'Address', 'Type your Address', 'no', '0000-00-00 00:00:00', '2021-04-06 16:57:47');

-- --------------------------------------------------------

--
-- Table structure for table `response_master`
--

CREATE TABLE `response_master` (
  `id` int(11) NOT NULL,
  `form_master_id` int(11) NOT NULL,
  `access_token` varchar(255) NOT NULL,
  `read_mark` enum('read','not_read') NOT NULL DEFAULT 'not_read',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `response_master`
--

INSERT INTO `response_master` (`id`, `form_master_id`, `access_token`, `read_mark`, `created_at`, `updated_at`) VALUES
(1, 3, 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'read', '2021-04-06 13:28:19', '2021-04-06 16:58:19');

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
(1, 'Name', 'Type your name', 'no', '0000-00-00 00:00:00', '2021-04-06 16:57:47'),
(2, 'Email', 'Type your Email', 'no', '0000-00-00 00:00:00', '2021-04-06 16:57:47'),
(3, 'Mobile Number', 'Type your Mobile Number', 'no', '0000-00-00 00:00:00', '2021-04-06 16:57:47');

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
  `type` enum('short_text','long_text','yesorno_text') DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_response`
--

INSERT INTO `user_response` (`id`, `response_master_id`, `name`, `value`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Name', 'sandip Dervaliya', 'short_text', 1, '0000-00-00 00:00:00', '2021-04-06 16:58:19'),
(2, 1, 'Email', 'sderavaliya0@gmail.com', 'short_text', 1, '0000-00-00 00:00:00', '2021-04-06 16:58:19'),
(3, 1, 'Mobile Number', '09825958214', 'short_text', 1, '0000-00-00 00:00:00', '2021-04-06 16:58:19'),
(4, 1, 'Are you old 18+ ?', 'yes', 'yesorno_text', 1, '0000-00-00 00:00:00', '2021-04-06 16:58:19'),
(5, 1, 'Address', 'Vangadhra', 'long_text', 1, '0000-00-00 00:00:00', '2021-04-06 16:58:19');

-- --------------------------------------------------------

--
-- Table structure for table `yesorno_text`
--

CREATE TABLE `yesorno_text` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `required_field` enum('yes','no') NOT NULL DEFAULT 'no',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `yesorno_text`
--

INSERT INTO `yesorno_text` (`id`, `name`, `value`, `required_field`, `created_at`, `updated_at`) VALUES
(1, 'Are you old 18+ ?', 'Select any one Yes or No', 'no', '0000-00-00 00:00:00', '2021-04-06 16:57:47');

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
  ADD KEY `long_text_id` (`long_text_id`),
  ADD KEY `yesorno_text_id` (`yesorno_text_id`);

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
-- Indexes for table `yesorno_text`
--
ALTER TABLE `yesorno_text`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `form_create`
--
ALTER TABLE `form_create`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `form_master`
--
ALTER TABLE `form_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `long_text`
--
ALTER TABLE `long_text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `response_master`
--
ALTER TABLE `response_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `short_text`
--
ALTER TABLE `short_text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_response`
--
ALTER TABLE `user_response`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `yesorno_text`
--
ALTER TABLE `yesorno_text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
