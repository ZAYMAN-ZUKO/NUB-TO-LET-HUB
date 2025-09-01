CREATE DATABASE IF NOT EXISTS nub_tolet;
USE nub_tolet;

CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(50) NOT NULL,
    role VARCHAR(10) NOT NULL,
    student_id VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (name,email,password,role,student_id) VALUES
('Nahim','nahim@gmail.com','1844','admin',NULL),
('Mamun','mamun@gmail.com','1834','admin',NULL),
('Nabila','nabila@gmail.com','nabila123','student','41230301869'),
('Masrur','masrur@gmail.com','masrur123','student','41230301844'),
('Ontor','ontor@gmail.com','1234','owner',NULL),
('Riyad','riyad@gmail.com','1234','owner',NULL);

CREATE TABLE listings (
    listing_id INT AUTO_INCREMENT PRIMARY KEY,
    owner_id INT NOT NULL,
    title VARCHAR(150) NOT NULL,
    description TEXT,
    rent DECIMAL(10,2) NOT NULL,
    rooms INT,
    facilities VARCHAR(255),
    location VARCHAR(150),
    distance_from_university FLOAT,
    available TINYINT(1) DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (owner_id) REFERENCES users(user_id)
);

INSERT INTO listings (owner_id,title,description,rent,rooms,facilities,location,distance_from_university,available) VALUES
(5,'2 BHK Flat - Bachelor Allowed','Spacious flat with Wi-Fi and AC',12000,2,'Wi-Fi, AC, Attached Bath','Kawla Bazar',1.5,1),
(6,'1 Room for Bachelor','Single room near NUB campus',6000,1,'Wi-Fi, Attached Bath','Boisakhi Mor',2.0,1);

CREATE TABLE rent_requests (
    request_id INT AUTO_INCREMENT PRIMARY KEY,
    listing_id INT NOT NULL,
    student_id INT NOT NULL,
    status VARCHAR(10) DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (listing_id) REFERENCES listings(listing_id),
    FOREIGN KEY (student_id) REFERENCES users(user_id)
);

INSERT INTO rent_requests (listing_id, student_id,status) VALUES
(1,3,'pending'),
(2,4,'approved');

CREATE TABLE reviews (
    review_id INT AUTO_INCREMENT PRIMARY KEY,
    listing_id INT NOT NULL,
    student_id INT NOT NULL,
    rating INT,
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (listing_id) REFERENCES listings(listing_id),
    FOREIGN KEY (student_id) REFERENCES users(user_id)
);

INSERT INTO reviews (listing_id,student_id,rating,comment) VALUES
(1,3,5,'Very spacious and well-maintained flat.'),
(2,4,4,'Good location but a bit small.');

CREATE TABLE complaints (
    complaint_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    message TEXT NOT NULL,
    status VARCHAR(10) DEFAULT 'open',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

INSERT INTO complaints (user_id,message,status) VALUES
(3,'Listing photo is not clear', 'open'),
(4,'Owner delayed response', 'closed');
