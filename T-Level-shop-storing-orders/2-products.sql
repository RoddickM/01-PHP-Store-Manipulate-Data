-- (A) PRODUCTS TABLE
CREATE TABLE `products` (
    `pid` bigint(20) NOT NULL,
    `name` varchar(255) NOT NULL,
    `image` varchar(255) NOT NULL,
    `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `products`
    ADD PRIMARY KEY (`pid`);
ALTER TABLE `products`
    MODIFY `pid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
-- (B) T LEVEL PRODUCTS
INSERT INTO `products` (`pid`, `name`, `image`, `price`) VALUES
(1, 'Digital Design Production Development Textbook ', 'DPDD_textbook.JPG', '24.99'),
(2, 'Digital Business Services Textbook', 'DBS_textbook.JPG', '24.99'),
(3, 'TLevel Hoody', 't_level_hoody.JPG', '29.99'),
(4, 'TLevel Polo', 't_level_polo.JPG', '14.99');