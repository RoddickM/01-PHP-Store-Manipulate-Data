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