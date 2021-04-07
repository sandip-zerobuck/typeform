CREATE TABLE `users` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `username` varchar(255) DEFAULT NULL,
 `email` varchar(255) DEFAULT NULL,
 `password` varchar(255) DEFAULT NULL,
 `status` int(11) NOT NULL DEFAULT 1,
 `created_at` datetime NOT NULL,
 `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `welcome_screen` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `form_master_id` int(11) NOT NULL,
 `details` text DEFAULT NULL,
 `button_text` varchar(255) DEFAULT NULL,
 `created_at` datetime NOT NULL,
 `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
 PRIMARY KEY (`id`),
 KEY `form_create_id` (`form_master_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `end_screen` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `form_master_id` int(11) NOT NULL,
 `details` text DEFAULT NULL,
 `button_text` varchar(255) DEFAULT NULL,
 `created_at` datetime NOT NULL,
 `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
 PRIMARY KEY (`id`),
 KEY `form_create_id` (`form_master_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;