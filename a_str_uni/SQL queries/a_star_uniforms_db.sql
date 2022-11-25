CREATE TABLE `a_star_products` (
  `product_id` int PRIMARY KEY,
  `school_id` int,
  `supplier_id` int,
  `name` varchar(20),
  `size` varchar(20),
  `price` decimal,
  `availability` boolean
);

CREATE TABLE `a_star_users` (
  `user_id` int PRIMARY KEY,
  `first_name` varchar(20),
  `last_name` varchar(20),
  `address_line_1` varchar(20),
  `address_line_2` varchar(20),
  `postcode` varchar(20),
  `phone_number` varchar(20),
  `email` varchar(20)
);

CREATE TABLE `a_star_orders` (
  `order_id` int PRIMARY KEY,
  `user_id` int,
  `product_id` int,
  `order_qty` int,
  `total` decimal
);

CREATE TABLE `booking_system` (
  `booking_id` int PRIMARY KEY,
  `user_id` int,
  `booking_time` time,
  `booking_date` datetime,
  `booking_comments` varchar(50),
  `booked_on` timestamp
);

CREATE TABLE `school` (
  `school_id` int PRIMARY KEY,
  `school_name` varchar(30),
  `school_type` varchar(20)
);

CREATE TABLE `supplier` (
  `supplier_id` int PRIMARY KEY,
  `supplier_name` varchar(20),
  `supplier_tel_num` varchar(20)
);

ALTER TABLE `a_star_products` ADD FOREIGN KEY (`school_id`) REFERENCES `school` (`school_id`);

ALTER TABLE `a_star_products` ADD FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`);

ALTER TABLE `a_star_orders` ADD FOREIGN KEY (`user_id`) REFERENCES `a_star_users` (`user_id`);

ALTER TABLE `a_star_orders` ADD FOREIGN KEY (`product_id`) REFERENCES `a_star_products` (`product_id`);

ALTER TABLE `booking_system` ADD FOREIGN KEY (`user_id`) REFERENCES `a_star_users` (`user_id`);
