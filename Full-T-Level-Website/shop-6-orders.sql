-- (A) ORDERS TABLE
CREATE TABLE `orders` (
    `oid` bigint(20) NOT NULL,
    `date` datetime NOT NULL DEFAULT current_timestamp(),
    `name` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `orders`
    ADD PRIMARY KEY (`oid`),
    ADD KEY `name` (`name`),
    ADD KEY `email` (`email`),
    ADD KEY `date` (`date`);

ALTER TABLE `orders`
    MODIFY `oid` bigint(20) NOT NULL AUTO_INCREMENT;
-- (B) ORDERS ITEMS TABLE
CREATE TABLE `orders_items` (
    `oid` bigint(20) NOT NULL,
    `pid` bigint(20) NOT NULL,
    `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `orders_items`
    ADD PRIMARY KEY (`oid`,`pid`);