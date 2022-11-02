CREATE TABLE IF NOT EXISTS shop
(
    item_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    item_name VARCHAR(20) NOT NULL,
    item_desc VARCHAR(200) NOT NULL,
    item_img VARCHAR(40) NOT NULL,
    item_price DECIMAL(4,2) NOT NULL,
    PRIMARY KEY (item_id)
);