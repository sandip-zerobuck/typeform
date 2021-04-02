// 16-02-2020

ALTER TABLE `company_info` ADD `about_home` LONGTEXT NULL AFTER `about`;

// 17-02-2020
ALTER TABLE `m_commission` ADD `cycle` INT NOT NULL DEFAULT '100' AFTER `name`;

ALTER TABLE `products` ADD `gst` FLOAT NOT NULL DEFAULT '0' AFTER `shortdesc`;

ALTER TABLE `order_master` DROP `state_id`, DROP `city_id`, DROP `pincode`;

ALTER TABLE `order_master` ADD `country_id` INT NOT NULL AFTER `mobile`, ADD `state_id` INT NOT NULL AFTER `country_id`, ADD `district_id` INT NOT NULL AFTER `state_id`, ADD `city_id` INT NOT NULL AFTER `district_id`, ADD `area_id` INT NOT NULL AFTER `city_id`, ADD `pincode_id` INT NOT NULL AFTER `area_id`, ADD INDEX (`country_id`), ADD INDEX (`state_id`), ADD INDEX (`district_id`), ADD INDEX (`city_id`), ADD INDEX (`area_id`), ADD INDEX (`pincode_id`);

// 18-02-2020

ALTER TABLE `temp_orderdata` ADD `gst_no` VARCHAR(255) NULL AFTER `pincode_id`;
ALTER TABLE `order_master` ADD `gst_no` VARCHAR(255) NULL AFTER `address`;

// 19-02-202

ALTER TABLE `company_info` ADD `disclaimer` LONGTEXT NULL AFTER `about_home`;
ALTER TABLE `company_info` ADD `privacy_policy` LONGTEXT NULL AFTER `disclaimer`;

// 20-02-2020

ALTER TABLE `admin_balance` ADD `user_credit_balance` DECIMAL(10,2) NULL AFTER `refer_bonus`;
ALTER TABLE `admin_balance` CHANGE `user_credit_balance` `user_credit_balance` DECIMAL(10,2) NOT NULL;

// 20-02-2020 5:12 PM

CREATE TABLE `merchant_commission_history` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `merchant_id` int(11) NOT NULL,
 `amount` decimal(10,2) NOT NULL,
 `turnover` decimal(10,2) NOT NULL,
 `commission` decimal(10,2) NOT NULL,
 `discount` decimal(10,2) NOT NULL,
 `description` varchar(255) DEFAULT NULL,
 `date` varchar(255) NOT NULL,
 `status` int(11) NOT NULL DEFAULT '1',
 PRIMARY KEY (`id`),
 KEY `merchant_id` (`merchant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1

// 21-02-2020

ALTER TABLE `admin_wallet` ADD `payment_method` INT NOT NULL DEFAULT '1' COMMENT '1= Offline, 2= Online' AFTER `updated_at`, ADD `txt_no` VARCHAR(255) NULL AFTER `payment_method`, ADD `payment_status` INT NOT NULL DEFAULT '0' COMMENT '0= Pendding, 1= Success, 2 = Cancel' AFTER `txt_no`;

// 22-02-2020

ALTER TABLE `deal_product` ADD `position` INT NOT NULL DEFAULT '1' COMMENT '1=Sidebar, 2=middel' AFTER `product_id`;

CREATE TABLE `merchant_pay_history` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `merchant_id` int(11) NOT NULL,
 `amount` decimal(10,2) NOT NULL,
 `turnover` decimal(10,2) NOT NULL,
 `commission` decimal(10,2) NOT NULL,
 `discount` decimal(10,2) NOT NULL,
 `description` varchar(255) NOT NULL,
 `txt_no` varchar(255) DEFAULT NULL,
 `payment_status` int(11) NOT NULL DEFAULT '0' COMMENT '0=Pendding, 1=Active, 2=Cancel',
 `date` varchar(255) DEFAULT NULL,
 `status` int(11) NOT NULL DEFAULT '1',
 PRIMARY KEY (`id`),
 KEY `merchant_id` (`merchant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1

// 25-02-2020

ALTER TABLE `clickrate` ADD `discount` VARCHAR(20) NOT NULL AFTER `rate`, ADD `final_rate` VARCHAR(20) NOT NULL AFTER `discount`, ADD `gst` VARCHAR(20) NOT NULL AFTER `final_rate`, ADD `net_amount` VARCHAR(20) NOT NULL AFTER `gst`;

// 26-02-2020

ALTER TABLE `product_location` ADD CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `products`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;

// 28-02-2020

CREATE TABLE `shop_banner` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(255) NOT NULL,
 `position` int(11) NOT NULL DEFAULT '1' COMMENT '1= Top',
 `status` int(11) NOT NULL DEFAULT '1' COMMENT '1=Active,2=Inactive',
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1

ALTER TABLE `shop_banner` ADD `image` VARCHAR(255) NULL AFTER `position`;

ALTER TABLE `merchant_commission_history` ADD `txt_no` VARCHAR(255) NULL AFTER `date`;

ALTER TABLE `merchant_user` ADD `shop_time` VARCHAR(255) NULL AFTER `shopname`;

CREATE TABLE `m_discount_user` (
 `id` int(11) NOT NULL,
 `merchant_user_id` int(11) DEFAULT NULL,
 `percentage` int(11) DEFAULT NULL,
 `user` int(11) DEFAULT NULL,
 `users_remaining` int(11) DEFAULT NULL,
 `amount_limit` int(11) DEFAULT NULL,
 `limit_status` int(11) DEFAULT NULL,
 `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1


ALTER TABLE `m_discount` ADD `merchant_user_id` INT NOT NULL AFTER `commission_id`, ADD INDEX (`merchant_user_id`);

// 02-03-2020

ALTER TABLE `linkmaster` ADD `file` VARCHAR(255) NULL AFTER `link`;

ALTER TABLE `linkmaster` ADD `link_file` INT NOT NULL DEFAULT '1' COMMENT '1=Link, 2=File' AFTER `file`;

ALTER TABLE `linkmaster` CHANGE `link` `link` VARCHAR(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL;


// 04-03-2020

ALTER TABLE `merchant_pay_offline` ADD `accept_status` INT NOT NULL DEFAULT '0' COMMENT '0=not_accept, 1=Accepted' AFTER `status`;

ALTER TABLE `merchant_pay_history` ADD `accept_status` INT NOT NULL DEFAULT '0' COMMENT '0=not_accept, 1=Accepted' AFTER `status`;

// 05-03-2020

CREATE TABLE `product_image` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `product_id` int(11) NOT NULL,
 `image` varchar(255) DEFAULT NULL,
 `status` int(11) NOT NULL DEFAULT '1',
 PRIMARY KEY (`id`),
 KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1

// 

ALTER TABLE `orderproductmaster` ADD CONSTRAINT `order_id` FOREIGN KEY (`order_id`) REFERENCES `order_master`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `cart` ADD CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `products`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `cart` ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `usermaster`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `merchant_pay_history` ADD CONSTRAINT `merchant_id` FOREIGN KEY (`merchant_id`) REFERENCES `merchant_user`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;

// 12-03-2020

ALTER TABLE `products` ADD `required_coin` INT NOT NULL DEFAULT '0' AFTER `coin`;


ALTER TABLE `temp_orderdata` ADD `required_coin` INT NOT NULL DEFAULT '0' AFTER `coin`;

// 31-03-2020

CREATE TABLE `daily_task` (
 `id` int(11) NOT NULL,
 `user_id` int(11) DEFAULT NULL,
 `ads_type` int(11) DEFAULT NULL COMMENT '1=Image, 2=Video, 3=Link',
 `total_task` int(11) NOT NULL DEFAULT '0',
 `remaining_task` int(11) NOT NULL DEFAULT '0',
 `task_date` varchar(255) DEFAULT NULL,
 PRIMARY KEY (`id`),
 KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1

// 11-04-2020

CREATE TABLE `user_level_income` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `level` int(11) NOT NULL DEFAULT '0',
 `signup_bouns_percentage` int(11) NOT NULL DEFAULT '0',
 `income_bouns_percentage` int(11) NOT NULL DEFAULT '0',
 `status` int(11) NOT NULL DEFAULT '0',
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1

// 20-04-2020

ALTER TABLE `walletmaster` ADD `ads_type` INT NOT NULL DEFAULT '0' COMMENT '1=Image, 2=Link, 3,=Video' AFTER `status`;

// 24-04-2020

ALTER TABLE `walletmaster` ADD `user_credit_coin_status` INT NOT NULL DEFAULT '0' AFTER `ads_type`;

// 02-05-2020

CREATE TABLE `covid_update` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(255) DEFAULT NULL,
 `confirmed` int(11) NOT NULL DEFAULT '0',
 `recovered` int(11) NOT NULL DEFAULT '0',
 `deceased` int(11) NOT NULL DEFAULT '0',
 `created_date` datetime NOT NULL,
 `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
 `status` int(11) NOT NULL DEFAULT '1',
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1

// 08-05-2020

CREATE TABLE `daily_bonus` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(255) NOT NULL,
 `coin` decimal(10,2) NOT NULL,
 `status` int(11) NOT NULL DEFAULT '1' COMMENT '1=Active, 0=Inactive',
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1

CREATE TABLE `daily_bonus_collect` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `daily_bonus_id` int(11) NOT NULL,
 `user_id` int(11) NOT NULL,
 `at_date` date NOT NULL,
 `status` int(11) NOT NULL DEFAULT '1' COMMENT '1=active, 0=Inactive',
 PRIMARY KEY (`id`),
 KEY `daily_bonus_id` (`daily_bonus_id`),
 KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1

ALTER TABLE `ads` ADD `link` VARCHAR(255) NULL AFTER `name`;
ALTER TABLE `shop_banner` ADD `link` VARCHAR(255) NULL AFTER `name`;
ALTER TABLE `slider` ADD `link` VARCHAR(255) NULL AFTER `name`;

// 13-05-2020

ALTER TABLE `imagemaster` ADD `alert_status` INT NOT NULL DEFAULT '0' COMMENT '0=Not Alert, 1= Alert' AFTER `status`;

ALTER TABLE `linkmaster` ADD `alert_status` INT NOT NULL DEFAULT '0' COMMENT '0=Not Alert, 1= Alert' AFTER `status`;

ALTER TABLE `videomaster` ADD `alert_status` INT NOT NULL DEFAULT '0' COMMENT '0=Not Alert, 1= Alert' AFTER `status`;

CREATE TABLE `ads_alert_limit` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `image` float NOT NULL DEFAULT '0',
 `link` float NOT NULL DEFAULT '0',
 `video` float NOT NULL DEFAULT '0',
 `status` int(11) NOT NULL DEFAULT '1',
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1

INSERT INTO `ads_alert_limit` (`id`, `image`, `link`, `video`, `status`) VALUES (NULL, '50', '50', '50', '1');

ALTER TABLE `products_category` ADD `free_product_status` INT NOT NULL DEFAULT '0' COMMENT '1=Active, 0=Inactive' AFTER `status`;

// 15-05-2020

CREATE TABLE `coin_to_cash_limit` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(255) DEFAULT NULL,
 `coin` decimal(10,2) NOT NULL,
 `cash` decimal(10,2) NOT NULL,
 `created_date` date NOT NULL,
 `status` int(11) NOT NULL DEFAULT '1',
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1

CREATE TABLE `coin_to_cash` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `userid` int(11) NOT NULL,
 `coin_to_cash_limit_id` int(11) NOT NULL,
 `name` varchar(255) DEFAULT NULL,
 `payment_details` varchar(255) DEFAULT NULL,
 `status` int(11) NOT NULL DEFAULT '2' COMMENT '0=Cancel, 1=Success, 2=Pendding',
 `created_date` varchar(255) DEFAULT NULL,
 `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY (`id`),
 KEY `userid` (`userid`),
 KEY `coin_to_cash_limit_id` (`coin_to_cash_limit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1

ALTER TABLE `coin_to_cash` ADD `payment_status` INT NOT NULL DEFAULT '0' AFTER `status`;

CREATE TABLE `applinkmaster` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `country_id` varchar(255) NOT NULL,
 `state_id` varchar(255) NOT NULL,
 `district_id` varchar(255) DEFAULT '0',
 `city_id` varchar(255) NOT NULL,
 `area_id` varchar(255) NOT NULL,
 `pincode_id` varchar(255) NOT NULL,
 `age` varchar(255) NOT NULL DEFAULT '0',
 `age_max` varchar(255) NOT NULL DEFAULT '0',
 `name` varchar(255) NOT NULL,
 `link` varchar(255) DEFAULT NULL,
 `coin` int(11) NOT NULL,
 `click` int(11) NOT NULL,
 `remaining_click` int(11) NOT NULL DEFAULT '0',
 `timer` int(11) NOT NULL,
 `start_date` date DEFAULT NULL,
 `last_date` date DEFAULT NULL,
 `amount` varchar(255) DEFAULT NULL,
 `message` text,
 `date_status` int(11) NOT NULL DEFAULT '0',
 `payment_status` int(11) NOT NULL DEFAULT '0',
 `ads_id` int(11) NOT NULL DEFAULT '0',
 `transaction_id` varchar(255) DEFAULT NULL,
 `ads_user_status` int(11) NOT NULL DEFAULT '0',
 `non_user_id` int(11) DEFAULT NULL,
 `non_user_status` int(11) NOT NULL DEFAULT '0',
 `temp_status` int(11) NOT NULL DEFAULT '0' COMMENT '0=No-delete, 1=Delete',
 `payment_method` int(11) NOT NULL DEFAULT '0' COMMENT '1=Online, 2=Offline',
 `offline_payment_id` int(11) NOT NULL,
 `status` int(11) NOT NULL DEFAULT '1' COMMENT '0=inactive,1=Active,2=Pendding, 3=ads_user, 5=cancel, 6=non-user',
 `alert_status` int(11) NOT NULL DEFAULT '0' COMMENT '0=Not Alert, 1= Alert',
 `note` text,
 PRIMARY KEY (`id`),
 KEY `country_id` (`country_id`),
 KEY `state_id` (`state_id`),
 KEY `city_id` (`city_id`),
 KEY `area_id` (`area_id`),
 KEY `pincode_id` (`pincode_id`),
 KEY `non_user_id` (`non_user_id`),
 KEY `offline_payment_id` (`offline_payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1

// 16-05-2020


ALTER TABLE `report` ADD `applink_id` INT NULL AFTER `link_id`, ADD INDEX (`applink_id`);

ALTER TABLE `report` CHANGE `status_for_click` `status_for_click` INT(11) NULL DEFAULT '0' COMMENT '1=image,2=video,3=link, 4= App ink';

ALTER TABLE `clickrate` CHANGE `ads_type` `ads_type` INT(11) NOT NULL DEFAULT '0' COMMENT '1=Image, 2=Video, 3=Link, 4=App Link';

ALTER TABLE `coin_rate` ADD `applink` INT NOT NULL DEFAULT '0' AFTER `video`;

ALTER TABLE `daily_task` CHANGE `ads_type` `ads_type` INT(11) NULL DEFAULT NULL COMMENT '1=Image, 2=Video, 3=Link, 4=App Link';

ALTER TABLE `walletmaster` ADD `applink_id` INT NOT NULL DEFAULT '0' AFTER `link_id`, ADD INDEX (`applink_id`);

ALTER TABLE `walletmaster` CHANGE `ads_type` `ads_type` INT(11) NOT NULL DEFAULT '0' COMMENT '1=Image, 2=Link, 3,=Video, 4 App link';

INSERT INTO `clickrate` (`id`, `click`, `rate`, `discount`, `final_rate`, `gst`, `net_amount`, `ads_type`, `status`) VALUES ('0', '1', '2', '30', '', '18', '', '4', '1');

ALTER TABLE `ads_alert_limit` ADD `applink` FLOAT NOT NULL DEFAULT '0' AFTER `video`;

// 02-06-2020

ALTER TABLE `products` ADD `out_of_delivery_charge` DECIMAL(10,2) NOT NULL AFTER `delivery_charge`;