/*
    Script used to create the tables that will be used in the beer recipe website
    Author: Jay Johnston
    Created: 15-03-2018
*/

DROP DATABASE accla;
CREATE DATABASE accla;
USE accla;

/*
    A simple users system to begin with
*/

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created DATETIME,
    modified DATETIME
);
