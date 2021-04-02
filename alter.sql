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