-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2021 at 10:25 AM
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
-- Table structure for table `end_screen`
--

CREATE TABLE `end_screen` (
  `id` int(11) NOT NULL,
  `form_master_id` int(11) NOT NULL,
  `details` text DEFAULT NULL,
  `button_text` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `end_screen`
--

INSERT INTO `end_screen` (`id`, `form_master_id`, `details`, `button_text`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tanks you..', 'Submit', '0000-00-00 00:00:00', '2021-04-07 13:29:37');

-- --------------------------------------------------------

--
-- Table structure for table `form_create`
--

CREATE TABLE `form_create` (
  `id` int(11) NOT NULL,
  `form_master_id` int(11) NOT NULL,
  `type` enum('short_text','long_text','yesorno_text') NOT NULL,
  `content_id` int(11) NOT NULL,
  `short_text_id` int(11) NOT NULL,
  `long_text_id` int(11) NOT NULL,
  `yesorno_text_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `form_create`
--

INSERT INTO `form_create` (`id`, `form_master_id`, `type`, `content_id`, `short_text_id`, `long_text_id`, `yesorno_text_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'short_text', 1, 0, 0, 0, '0000-00-00 00:00:00', '2021-04-07 13:29:37'),
(2, 1, 'short_text', 2, 0, 0, 0, '0000-00-00 00:00:00', '2021-04-07 13:29:37'),
(3, 1, 'short_text', 3, 0, 0, 0, '0000-00-00 00:00:00', '2021-04-07 13:29:37'),
(4, 1, 'short_text', 4, 0, 0, 0, '0000-00-00 00:00:00', '2021-04-07 13:29:37'),
(5, 1, 'yesorno_text', 1, 0, 0, 0, '0000-00-00 00:00:00', '2021-04-07 13:29:37'),
(6, 1, 'long_text', 1, 0, 0, 0, '0000-00-00 00:00:00', '2021-04-07 13:29:37');

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
(1, 'c4ca4238a0b923820dcc509a6f75849b', 'Contact Form', 1, '2021-04-07 09:59:37', '2021-04-07 13:29:37');

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
(1, 'Message', 'Your Message', 'yes', '0000-00-00 00:00:00', '2021-04-07 13:29:37');

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
(1, 1, 'c4ca4238a0b923820dcc509a6f75849b', 'read', '2021-04-07 10:03:39', '2021-04-07 13:33:39');

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
(1, 'First Name', 'Your name..', 'no', '0000-00-00 00:00:00', '2021-04-07 13:29:37'),
(2, 'Last Name', 'Your last name..', 'no', '0000-00-00 00:00:00', '2021-04-07 13:29:37'),
(3, 'Email', 'Your Email id', 'no', '0000-00-00 00:00:00', '2021-04-07 13:29:37'),
(4, 'Mobile', 'Your Mobile number', 'no', '0000-00-00 00:00:00', '2021-04-07 13:29:37');

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
(1, 1, 'First Name', 'Sandip', 'short_text', 1, '0000-00-00 00:00:00', '2021-04-07 13:33:39'),
(2, 1, 'Last Name', 'Dervaliya', 'short_text', 1, '0000-00-00 00:00:00', '2021-04-07 13:33:39'),
(3, 1, 'Email', 'sderavaliya0@gmail.com', 'short_text', 1, '0000-00-00 00:00:00', '2021-04-07 13:33:39'),
(4, 1, 'Mobile', '09825958214', 'short_text', 1, '0000-00-00 00:00:00', '2021-04-07 13:33:39'),
(5, 1, 'Are you old 18+?', 'yes', 'yesorno_text', 1, '0000-00-00 00:00:00', '2021-04-07 13:33:39'),
(6, 1, 'Message', 'this is test message.', 'long_text', 1, '0000-00-00 00:00:00', '2021-04-07 13:33:39');

-- --------------------------------------------------------

--
-- Table structure for table `welcome_screen`
--

CREATE TABLE `welcome_screen` (
  `id` int(11) NOT NULL,
  `form_master_id` int(11) NOT NULL,
  `details` text DEFAULT NULL,
  `button_text` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `welcome_screen`
--

INSERT INTO `welcome_screen` (`id`, `form_master_id`, `details`, `button_text`, `created_at`, `updated_at`) VALUES
(1, 1, 'Welcome to the zerobuck ', 'Start', '0000-00-00 00:00:00', '2021-04-07 13:29:37');

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
(1, 'Are you old 18+?', 'Select any one Yes or No', 'no', '0000-00-00 00:00:00', '2021-04-07 13:29:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `end_screen`
--
ALTER TABLE `end_screen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_create_id` (`form_master_id`);

--
-- Indexes for table `form_create`
--
ALTER TABLE `form_create`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_master_id` (`form_master_id`),
  ADD KEY `short_text_id` (`short_text_id`),
  ADD KEY `long_text_id` (`long_text_id`),
  ADD KEY `yesorno_text_id` (`yesorno_text_id`),
  ADD KEY `content_id` (`content_id`);

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
-- Indexes for table `welcome_screen`
--
ALTER TABLE `welcome_screen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_create_id` (`form_master_id`);

--
-- Indexes for table `yesorno_text`
--
ALTER TABLE `yesorno_text`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `end_screen`
--
ALTER TABLE `end_screen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `form_create`
--
ALTER TABLE `form_create`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- AUTO_INCREMENT for table `response_master`
--
ALTER TABLE `response_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `short_text`
--
ALTER TABLE `short_text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_response`
--
ALTER TABLE `user_response`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `welcome_screen`
--
ALTER TABLE `welcome_screen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `yesorno_text`
--
ALTER TABLE `yesorno_text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
