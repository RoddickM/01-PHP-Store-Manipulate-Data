CREATE TABLE IF NOT EXISTS shop
(
    item_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    item_name VARCHAR(100) NOT NULL,
    item_desc VARCHAR(200) NOT NULL,
    item_img VARCHAR(40) NOT NULL,
    item_price DECIMAL(4,2) NOT NULL,
    PRIMARY KEY (item_id)
);

INSERT INTO `shop`(`item_name`, `item_desc`, `item_img`, `item_price`) VALUES 
('DPDD Textbook', 'Textbook for DPDD T-LEVEL course', 'images/DPDD_textbook.png', 25.00),
('DBS and DSS Textbook', 'Textbook for DBS and DSS T-LEVEL course', 'images/DBS_textbook.png', 25.00)
('Python Textbook', 'Textbook for Python', 'images/Python_TextBook.png', 25.00)
('Excel Textbook', 'Textbook for Excel', 'images/Excel_TextBook.png', 25.00)