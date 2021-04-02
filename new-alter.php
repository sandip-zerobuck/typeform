// 16-06-2020

CREATE TABLE `courier` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(255) DEFAULT NULL,
 `status` int(11) NOT NULL DEFAULT '1',
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1

ALTER TABLE `courier` ADD `created_at` DATETIME NULL AFTER `status`;

ALTER TABLE `order_master` ADD `courier_id` INT NOT NULL AFTER `order_date`, ADD `tracking_id` VARCHAR(255) NULL AFTER `courier_id`, ADD INDEX (`courier_id`);