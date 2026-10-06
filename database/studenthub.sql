CREATE DATABASE studenthub;

USE studenthub;


-- =========================
-- STUDENTS TABLE
-- =========================

CREATE TABLE students (

    id INT AUTO_INCREMENT PRIMARY KEY,

    name VARCHAR(100) NOT NULL,

    email VARCHAR(100) NOT NULL UNIQUE,

    mobile VARCHAR(15) NOT NULL,

    course VARCHAR(100) NOT NULL,

    year VARCHAR(20) NOT NULL,

    gender VARCHAR(20) NOT NULL,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);


-- =========================
-- EVENTS TABLE
-- =========================

CREATE TABLE events (

    id INT AUTO_INCREMENT PRIMARY KEY,

    title VARCHAR(150) NOT NULL,

    description TEXT,

    event_date DATE NOT NULL,

    venue VARCHAR(150),

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);


-- =========================
-- REGISTRATIONS TABLE
-- =========================

CREATE TABLE registrations (

    id INT AUTO_INCREMENT PRIMARY KEY,

    student_id INT NOT NULL,

    event_id INT NOT NULL,

    registered_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (student_id)
        REFERENCES students(id)
        ON DELETE CASCADE,

    FOREIGN KEY (event_id)
        REFERENCES events(id)
        ON DELETE CASCADE

);