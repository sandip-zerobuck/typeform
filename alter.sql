CREATE TABLE `draw` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(255) DEFAULT NULL,
 `image` varchar(255) DEFAULT NULL,
 `participat_user` int(11) DEFAULT NULL,
 `remingn_user` int(11) DEFAULT NULL,
 `draw_date` date DEFAULT NULL,
 `draw_active_date` date DEFAULT NULL,
 `crated_at` datetime DEFAULT NULL,
 `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
 `status` int(11) NOT NULL DEFAULT '0' COMMENT '1=Accep, 2=Inactive',
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `module` (`id`, `name`, `created_at`, `updated_at`, `status`) VALUES (NULL, 'draw', '2020-05-14 05:46:14', CURRENT_TIMESTAMP, '1');

ALTER TABLE `draw` ADD `required_task` INT NULL AFTER `remingn_user`;

ALTER TABLE `draw` ADD `short_details` LONGTEXT NULL AFTER `draw_date`;

CREATE TABLE `draw_participation_user` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `draw_id` int(11) NOT NULL,
 `user_id` int(11) NOT NULL,
 `crated_at` datetime DEFAULT NULL,
 `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY (`id`),
 KEY `draw_id` (`draw_id`),
 KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `draw_participation_user` ADD CONSTRAINT `draw_id` 
FOREIGN KEY (`draw_id`) REFERENCES `draw`(`id`) ON DELETE CASCADE ON UPDATE CASCADE; 
ALTER TABLE `draw_participation_user` ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) 
REFERENCES `usermaster`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;

# 08-07-2020

CREATE TABLE `draw_result` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `draw_id` int(11) NOT NULL,
 `user_id` int(11) NOT NULL,
 `rank_no` int(11) NOT NULL,
 `crated_at` datetime NOT NULL,
 `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
 PRIMARY KEY (`id`),
 KEY `draw_id` (`draw_id`),
 KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

# 09-08-2020

ALTER TABLE `draw_result` ADD `name` VARCHAR(255) NULL AFTER `rank_no`;

ALTER TABLE `draw` ADD `winners_user` INT NOT NULL DEFAULT '0' AFTER `remingn_user`;

ALTER TABLE `draw_result` CHANGE `crated_at` `created_at` DATETIME NOT NULL;

CREATE TABLE `draw_required_task` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `draw_id` int(11) NOT NULL,
 `user_id` int(11) NOT NULL,
 `required_task` int(11) NOT NULL DEFAULT '0',
 `created_at` datetime DEFAULT NULL,
 `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY (`id`),
 KEY `draw_id` (`draw_id`),
 KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `draw` ADD `token` VARCHAR(255) NULL AFTER `status`;

# 11-07-2020

ALTER TABLE `draw_required_task` ADD `complate_status` INT NOT NULL DEFAULT '0' AFTER `updated_at`;

# 13-07-2020

ALTER TABLE `draw` CHANGE `remingn_user` `remingn_user` INT(11) NULL DEFAULT '0';