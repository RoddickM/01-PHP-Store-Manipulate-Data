CREATE TABLE IF NOT EXISTS  client (
	clientID INT PRIMARY KEY,
    title VARCHAR(10),
    forename VARCHAR(25),
    surname VARCHAR(25),
    address1 VARCHAR(25),
    address2 VARCHAR(25),
    town VARCHAR(25),
    post_code VARCHAR(10),
    phone_number VARCHAR(11) UNIQUE,
    mobile_number VARCHAR(11) UNIQUE,
    date_of_birth DATE
);

CREATE TABLE IF NOT EXISTS  car_details (
	car_details_ID INT PRIMARY KEY,
    car_regional_number INT UNIQUE,
    car_make VARCHAR(25),
    car_manufacturer_code INT,
    car_manufacturer_name VARCHAR(25),
    model_code INT,
    model_name VARCHAR(25)
);

CREATE TABLE IF NOT EXISTS car_rental_details(
	car_rental_id INT PRIMARY KEY,
    rental_daily_cost DECIMAL,
    loan_date DATE,
    return_date DATE,
    car_returned BOOLEAN
);

ALTER TABLE client
MODIFY forename VARCHAR(25) NOT NULL,
MODIFY surname VARCHAR(25) NOT NULL,
MODIFY address1 VARCHAR(25) NOT NULL,
MODIFY address2 VARCHAR(25) NOT NULL,
MODIFY town VARCHAR(25) NOT NULL,
MODIFY post_code VARCHAR(10) NOT NULL,
MODIFY mobile_number VARCHAR(11) UNIQUE NOT NULL,
MODIFY date_of_birth DATE NOT NULL

ALTER TABLE car_details
MODIFY car_regional_number INT NOT NULL,
MODIFY car_make VARCHAR(25) NOT NULL,
MODIFY car_manufacturer_code INT NOT NULL,
MODIFY car_manufacturer_name VARCHAR(25) NOT NULL,
MODIFY model_code INT NOT NULL,
MODIFY model_name VARCHAR(25) NOT NULL

ALTER TABLE car_rental_details
MODIFY rental_daily_cost DECIMAL NOT NULL,
MODIFY loan_date DATE NOT NULL,
MODIFY return_date DATE NOT NULL,
MODIFY car_returned BOOLEAN NOT NULL,

INSERT INTO client (clientID, title, forename, surname, address1, address2, town, post_code, phone_number, mobile_number, date_of_birth) VALUES 
(0, "Mr", "Roddick", "Mujib", "21 Robert Stree", "Lancaster", "Manchester", "M23 4TH", NULL, 08754382032, 2004-10-30),
(1, "Mr", "Roddic", "Muji", "42 Robert Stree", "Lancaster", "Manchester", "M3 4TH", NULL, 08754382532, 2004-01-30),
(2, "Mr", "Roddi", "Muj", "12 Robert Stree", "Lancaster", "Manchester", "M23 4TH", NULL, 08754382222, 2004-01-30),
(3, "Mr", "Rodd", "Mu", "41 Robert Stree", "Lancaster", "Manchester", "M23 4123H", NULL, 08754384332, 2004-02-30),
(4, "Mr", "Rod", "Hasi", "103 Robert Stree", "Lancaster", "Manchester", "M24535 4TH", NULL, 08758482032, 2004-03-30),
(5, "Mr", "Ro", "Kio", "321 Robert Stree", "Lancaster", "Manchester", "M23 42222", NULL, 08754382432, 2004-10-31),
(6, "Mr", "Meme", "MAMA", "26435 Robert Stree", "Lancaster", "Manchester", "M535 4TH", NULL, 08773382032, 2004-10-30),
(7, "Mr", "Mal", "kkame", "2235 Robert Stree", "Lancaster", "Manchester", "M243343 4TH", NULL, 05354382122, 2014-10-30),
(8, "Mr", "Mamyu", "", "12353 Robert Stree", "Lancaster", "Manchester", "M2532 46435H", NULL, 08754382074, 2002-12-30),
(9, "Mr", "Konoshiro", "Mujib", "2341 Robert Stree", "Lancaster", "Manchester", "MGSFG3 4TH", NULL, 08723382032, 2004-07-30)

INSERT INTO car_details (car_details_ID, car_regional_number, car_make, car_manufacturer_code, car_manufacturer_name, model_code, model_name) VALUES
(0, 1234, "Fiesta", 2353, "Ford", 1332, "Fiesta"),
(1, 1234, "Focus", 2353, "Ford", 1332, "Focus"),
(2, 1234, "Escort", 2353, "Ford", 1332, "Escrot"),
(3, 1234, "Mondeo", 2353, "Ford", 1332, "Mondeo"),
(4, 1234, "Taurus", 2353, "Ford", 1332, "Taurus"), 
(5, 1234, "GT", 2353, "Ford", 1332, "GT"),
(6, 1234, "Mustang", 2353, "Ford", 1332, "Mustang"),
(7, 1234, "Bronco", 2353, "Ford", 1332, "Bronco"),
(8, 1234, "Edge", 2353, "Ford", 1332, "Edge"),
(9, 1234, "Equator", 2353, "Ford", 1332, "Fiesta")

INSERT INTO car_rental_details (car_rental_id, rental_daily_cost, loan_date, return_date, car_returned) VALUES
(0, 50, 2021-05-05, 2028-05-05, TRUE),
(1, 50, 2021-05-05, 2028-05-05, TRUE),
(2, 50, 2021-05-05, 2028-05-05, TRUE),
(3, 50, 2021-05-05, 2028-05-05, TRUE),
(4, 50, 2021-05-05, 2028-05-05, FALSE),
(5, 50, 2021-05-05, 2028-05-05, TRUE),
(6, 50, 2021-05-05, 2028-05-05, TRUE),
(7, 50, 2021-05-05, 2028-05-05, TRUE),
(8, 50, 2021-05-05, 2028-05-05, TRUE),
(9, 50, 2021-05-05, 2028-05-05, FALSE)

UPDATE client SET date_of_birth='2004-01-01'
UPDATE car_rental_details SET loan_date='2005-01-01'
UPDATE car_rental_details SET return_date='2022-01-01'

UPDATE car_rental_details SET return_date=DATE_ADD(return_date, INTERVAL -3 DAY)

DELETE FROM `car_details` WHERE `car_details_ID` = 0;
INSERT INTO car_details (car_details_ID, car_regional_number, car_make, car_manufacturer_code, car_manufacturer_name, model_code, model_name) VALUES
(0, 1234, "Ord", 2353, "Ford", 1332, "Ord")

DELETE FROM `car_details` WHERE `car_details_ID` = 9;

SELECT car_make FROM 'car_details'

SELECT model_name FROM car_details

SELECT model_name, car_rental_details.rental_daily_cost 
FROM car_details 
INNER JOIN car_rental_details 
ON car_details.car_details_ID = car_rental_details.car_rental_id

SELECT model_name, car_rental_details.rental_daily_cost 
FROM car_details 
INNER JOIN car_rental_details 
ON car_details.car_details_ID = car_rental_details.car_rental_id
ORDER BY car_rental_details.rental_daily_cost

SELECT model_name, car_rental_details.rental_daily_cost 
FROM car_details 
INNER JOIN car_rental_details 
ON car_details.car_details_ID = car_rental_details.car_rental_id
ORDER BY car_rental_details.rental_daily_cost DESC

SELECT model_name, car_rental_details.rental_daily_cost 
FROM car_details 
INNER JOIN car_rental_details 
ON car_details.car_details_ID = car_rental_details.car_rental_id
WHERE car_rental_details.rental_daily_cost < 100