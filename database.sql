CREATE DATABASE IF NOT EXISTS alarms;
USE alarms;

CREATE TABLE equipments (
    equipment_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    serial_number VARCHAR(100) UNIQUE NOT NULL,
    type ENUM('Tensão', 'Corrente', 'Óleo') NOT NULL,
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE alarms (
    alarm_id INT AUTO_INCREMENT PRIMARY KEY,
    description TEXT NOT NULL,
    classification ENUM('urgente', 'emergente', 'ordinario') NOT NULL,
    equipment_id INT NOT NULL,
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (equipment_id) REFERENCES equipments(equipment_id) ON DELETE CASCADE
);

CREATE TABLE alarms_activated (
    alarms_activated_id INT AUTO_INCREMENT PRIMARY KEY,
    alarm_id INT NOT NULL,
    input_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    departure_date TIMESTAMP NULL,
    status ENUM('Ativo', 'Resolvido') NOT NULL DEFAULT 'Ativo',
    FOREIGN KEY (alarm_id) REFERENCES alarms(alarm_id) ON DELETE CASCADE
);

CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);
