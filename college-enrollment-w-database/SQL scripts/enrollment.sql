CREATE TABLE IF NOT EXISTS college_enrollment
(
	studentID INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(25) NOT NULL,
    last_name VARCHAR(25) NOT NULL,
    address VARCHAR(25) NOT NULL,
    email VARCHAR(25) NOT NULL UNIQUE,
    phone_number INT NOT NULL UNIQUE,
    course_type VARCHAR(25) NOT NULL,
    course_level VARCHAR(25) NOT NULL,
    comments VARCHAR(200) NOT NULL,
);
